
var UserTb = function () {
    var _this = this;

    return {
        table: $('#User-table'),
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
                "url": getBaseUrl("admin/User/load_User"),
                "data": function (payload) {

                },
                "dataSrc": "records", // returned object name that contains the actual data
                "type": "post"
            },

            "columns": [
                { "data": "ID_NUM", "title": "رقم الهوية" },
                { "data": "FULL_NAME", "title": "الاسم بالكامل "},
                { "data": "EMAIL", "title": "البريد الالكتروني  "},
                { "data": "MOBILE", "title": "موبايل"  },
                {
                    "data": null,
                    "title": "خيارات",
                    "render":function(data){
                        return '<button data-toggle="tooltip" title="تعديل" type="button" class="btn btn-success btn-sm circle-btn edit-user"><i class="fa fa-pencil"></i></button> ' +
                            '<button data-toggle="tooltip" title="نوع المستخدم" type="button" class="btn btn-success btn-sm circle-btn type-user"><i class="fa fa-user"></i></button> '+'' +
                            '<button data-toggle="tooltip" title="حذف"type="button" class="btn btn-danger btn-sm circle-btn delete-user"><i class="fa fa-trash"></i></button>'+
                            (data.ISACTIVE==0?"<button type='button' class='btn btn-small btn-primary circle-btn active_user'><i class='fa fa-check'></i> اعتماد</button>":"") ;
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
                $(document).on('click', '.active_user', function (data, callbak) {
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    var  SEQ = x.SEQ = x['SEQ'];
                    jQuery.ajax({
                        type: "post",
                        url: 'admin/User/Active_User',
                        data: {
                            'SEQ': SEQ,
                        },
                        dataType: 'json',
                        success: function (data) {
                            success : m.toast(data);
                            rebind_user_table(data, $("#SaveUser"));

                        }
                    })
                });

                $(document).on('click', '.type-user', function (data, callbak) {
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    var  SEQ = x.SEQ = x['SEQ'];
                    jQuery.ajax({
                        type: "post",
                        url: 'admin/User/change',
                        data: {
                            'SEQ': SEQ,
                        },
                        dataType: 'json',
                        success: function (data) {
                            success : m.toast(data);
                            rebind_user_table(data, $("#SaveUser"));

                        }
                    })
                });

                $(document).on('click', '.edit-user', function () {
                    var data = _this.oTable.api().row($(this).parent().parent()).data();
                    Util.bindInputs("#SaveUser", data, '');
                    $('#SaveUser').goto('-60', 400);
                });

                var ID_NUM;
                $(document).on('click', '.delete-user', function (data, callbak) {
                    $('#ConfirmModal').modal('show');
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    SEQ = x.SEQ = x['SEQ'];
                });
                $("#yes").click(function (e) {
                    e.preventDefault();
                    if ($(this).hasClass('test')) {
                        jQuery.ajax({
                            type: "post",
                            url: 'admin/User/Delete_User',
                            data: {
                                'SEQ' :SEQ
                            },
                            dataType: 'json',
                            success: function (data) {
                                m.toast(data);
                                rebind_user_table(data, $('#SaveUser'))
                                $('#ConfirmModal').modal('hide');

                            }

                        })
                    }
                });

                $(document).on('click', '#search', function () {
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    //var x = $('#ACTION').val();
                    UserTb.refresh();

                });



            }
        },

    }
}();


UserTb.init();


var rebind_user_table = function (result, form) {
    $(form).find('input').val('');
    UserTb.refresh();
    }

