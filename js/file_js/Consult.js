
$(document).on('click', '#active', function (data, callbak) {
    var  CON_SEQ = $('#CON_SEQ').val();
    jQuery.ajax({
        type: "post",
        url: 'admin/Consult/Con_Active',
        data: {
            'CON_SEQ': CON_SEQ,
        },
        dataType: 'json',
        success: function (data) {
            success : m.toast(data);

        }
    })
});

$(document).on('change','#ATTCHMENT',function(){
    var file_name = $('#ATTCHMENT').val().replace(/C:\\fakepath\\/i, '')
    $('#filename').val(file_name);
});

var ConTb = function () {
    var _this = this;

    return {
        table: $('#Con-table'),
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
                "url": getBaseUrl("admin/Consult/load_Con"),
                "data": function (payload) {

                },
                "dataSrc": "records", // returned object name that contains the actual data
                "type": "post"
            },

            "columns": [
                { "data": "CON_SEQ", "title": "م." },
                { "data": "CON_NAME", "title": "العنوان "},
                { "data": "CON_TYPE", "title": "نوع الاستشارة  "},
                { "data": "CON_DESC", "title": "وصف الاستشارة "  },
                {
                    "data": null ,
                    "title": "الخصوصية",
                    "render":function(data){
                        return "<input value='" + data.PRIVACY + "' type='checkbox' class='form-control' >";
                    }
                },
                {
                    "data": null,
                    "title": "خيارات",
                    "render":function(data ,type, row  , mate){
                        return '<button data-toggle="tooltip" title="حذف"type="button" class="btn btn-danger btn-sm circle-btn delete-con"><i class="fa fa-trash"></i></button>'+'' +
                            '<button type="button" class="btn btn-small btn-primary circle-btn reply-con"><i class="fa fa-reply"> </i> </button>' ;
                        // <a href="admin/Consult/Reply"'+data.CON_SEQ +'>
                        //'<button hidden data-toggle="tooltip" title="تعديل" type="button" class="btn btn-success btn-sm circle-btn edit-con"><i class="fa fa-pencil"></i></button> '+'' +
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


               $(document).on('click','.reply-con',function(data ,callbak){
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    var CON_SEQ =  x.CON_SEQ = x['CON_SEQ'];
                    window.location="admin/Consult/Reply/"+CON_SEQ;
                });

                $(document).on('click','.edit-con',function(data ,callbak){
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    var CON_SEQ =  x.CON_SEQ = x['CON_SEQ'];
                    window.location="admin/Consult/Edit/"+CON_SEQ;
                });

               /* $(document).on('click', '.reply-con', function (data, callbak) {
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    var  CON_SEQ = x.CON_SEQ = x['CON_SEQ'];
                    jQuery.ajax({
                        type: "post",
                        url: 'admin/Consult/GET_CON',
                        data: {
                            'CON_SEQ': CON_SEQ,
                        },
                        dataType: 'json',
                        success: function (data) {
                          console.log(data);

                        }
                    })
                });*/

                $(document).on('click', '.edit-adv', function () {
                    var data = _this.oTable.api().row($(this).parent().parent()).data();
                    Util.bindInputs("#SaveAdv", data, '');
                    $('#SaveAdv').goto('-60', 400);
                });

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
                    ConTb.refresh();

                });



            }
        },

    }
}();


ConTb.init();


var rebind_con_table = function (result) {
  //  $(form).find('input').val('');
    ConTb.refresh();
    }

