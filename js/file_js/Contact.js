//alert();

var ContactTb = function () {
    var _this = this;

    return {
        table: $('#Contact-table'),
        oTable: {}, // datatable object
        options: {
            // "dom": "ti",
            //"bSort": false,
            "responsive": true,
            "bJQueryUI": true,
            "bSort": false,
            "bPaginate": true,
            "sPaginationType": "full_numbers",
            "iDisplayLength": 10,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
            },
            //"sScrollX": "200%",
            ajax: {
                "url": getBaseUrl("admin/Contact/Contact_Select"),
                "data": function (payload) {

                },
                "dataSrc": "records", // returned object name that contains the actual data
                "type": "post"
            },

            "columns": [
                { "data": "CONTACT_ID", "title": "م." },
                { "data": "USER_ID", "title": "رقم الهوية" },
                { "data": "USERNAME", "title": "الاسم "},
                { "data": "EMAIL", "title": "الايميل   "},
                { "data": "PHONE", "title": "رقم الجوال  "  },
                {
                    "data": "MSG_TEXT" ,
                    "title": "الوصف",
                },
                {
                    "data": null,
                    "title": "خيارات",
                    "render":function(data ,type, row  , mate){
                        return '<button data-toggle="tooltip" title="تعديل" type="button" class="btn btn-success btn-sm circle-btn edit-con"><i class="fa fa-pencil"></i></button> '+'' +
                            '<button data-toggle="tooltip" title="حذف"type="button" class="btn btn-danger btn-sm circle-btn delete-con"><i class="fa fa-trash"></i></button>'+'' +
                            '<button type="button" class="btn btn-small btn-primary circle-btn reply-con"><i class="fa fa-reply"> </i> </button>' ;
                        // <a href="admin/Consult/Reply"'+data.CON_SEQ +'>
                    }
                }
            ],
            "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {

                if (aData.ISACTIVE == 0) {
                    $('td', nRow).css('background-color', '#f2dede');
                    $(nRow).addClass('wobble-vertical');

                } else {
                    $('td', nRow).css('background-color', '#dff0d8');
                    $(nRow).addClass('wobble-vertical');

                }
            }
        },
        refresh: function () {
            this.oTable.api().ajax.reload();
        },
        init: function () {
            var _this = this;
            if (this.table.length == 1) {
                this.oTable = this.table.dataTable(this.options)
                    .on('preXhr.dt', function (e, settings, data) {

                    })
                    .on('error.dt', function (e, settings, techNote, message) {

                    });

                // put event code here


              
                var CON_SEQ;
                $(document).on('click', '.delete-con', function (data, callbak) {
                    $('#ConfirmModal').modal('show');
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    CON_SEQ = x.CON_SEQ = x['CON_SEQ'];
                });
                $("#yes").click(function (e) {
                    e.preventDefault();
                    if ($(this).hasClass('test')) {
                        jQuery.ajax({
                            type: "post",
                            url: 'admin/Consult/Con_Delete',
                            data: {
                                'CON_SEQ' :CON_SEQ
                            },
                            dataType: 'json',
                            success: function (data) {
                                m.toast(data);
                                rebind_con_table(data)
                                $('#ConfirmModal').modal('hide');

                            }

                        })
                    }
                });

                $(document).on('click', '#search', function () {
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    //var x = $('#ACTION').val();
                    ContactTb.refresh();

                });



            }
        },

    }
}();


ContactTb.init();


var rebind_Contact_table = function (result) {
  //  $(form).find('input').val('');
  ContactTb.refresh();
    }

