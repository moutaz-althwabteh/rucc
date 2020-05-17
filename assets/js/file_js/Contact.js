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
                    "data": null,
                    "title": "",
                    "render":function(data ,type, row  , mate){
                      if(row.IS_READ==0){
                          return '<lable class="badge badge-secondary">لم يشاهد</lable>';
                      }else{
                        return '<lable class="badge badge-success">تمت المشاهدة</lable>';
                      }
                    }
                },
                {
                    "data": null,
                    "title": "خيارات",
                    "render":function(data ,type, row  , mate){
                        return'<button data-toggle="tooltip" title="حذف"type="button" class="btn btn-danger btn-sm circle-btn delete-con"><i class="fa fa-trash"></i></button>'+''+
                                '<a href="admin/Contact/'+row.CONTACT_ID+'" class="btn btn-primary btn-sm circle-btn"><i class="fa fa-edit"></i><a/>'
                    }
                }
            ],
            "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {

               
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


              
                var CONTACT_ID;
                $(document).on('click', '.delete-con', function (data, callbak) {
                    $('#ConfirmModal').modal('show');
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    CONTACT_ID = x.CON_SEQ = x['CONTACT_ID'];
                });
                $("#yes").click(function (e) {
                    e.preventDefault();
                    if ($(this).hasClass('test')) {
                        jQuery.ajax({
                            type: "post",
                            url: 'admin/Contact/CONT_DELETE',
                            data: {
                                'CONTACT_ID' :CONTACT_ID
                            },
                            dataType: 'json',
                            success: function (data) {
                                m.toast(data);
                                rebind_Contact_table(data)
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
  ContactTb.refresh();
    }

