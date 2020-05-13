
var CatTb = function () {
    var _this = this;

    return {
        table: $('#Cat-table'),
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
                "url": getBaseUrl("admin/Category/load_Category"),
                "data": function (payload) {

                },
                "dataSrc": "records", // returned object name that contains the actual data
                "type": "post"
            },

            "columns": [
                { "data": "CAT_SEQ", "title": "م." },
                { "data": "CAT_NAME", "title": "اسم التصنيف"},
                { "data": "CAT_DESC", "title": "وصف التصنيف "},
                { "data": "PARENT", "title": " متفرع من "  },
                {
                    "data": null,
                    "title": "خيارات",
                    "render":function(data){
                        return '<button data-toggle="tooltip" title="تعديل" type="button" class="btn btn-success btn-sm circle-btn edit-cat"><i class="fa fa-pencil"></i></button> '+'' +
                            '<button data-toggle="tooltip" title="حذف"type="button" class="btn btn-danger btn-sm circle-btn delete-cat"><i class="fa fa-trash"></i></button>'+
                            (data.ISACTIVE==0?"<button type='button' class='btn btn-small btn-primary circle-btn active_cat'><i class='fa fa-check'></i> اعتماد</button>":"") ;
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
                $(document).on('click', '.active_cat', function (data, callbak) {
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    var  CAT_SEQ = x.CAT_SEQ = x['CAT_SEQ'];
                    jQuery.ajax({
                        type: "post",
                        url: 'admin/Category/Active_Category',
                        data: {
                            'CAT_SEQ': CAT_SEQ,
                        },
                        dataType: 'json',
                        success: function (data) {
                            success : m.toast(data);
                            rebind_cat_table(data, $("#SaveCat"));

                        }
                    })
                });

                $(document).on('click', '.edit-cat', function () {
                    var data = _this.oTable.api().row($(this).parent().parent()).data();
                    Util.bindInputs("#SaveCat", data, '');
                    $('#SaveCat').goto('-60', 400);
                });

                var CAT_SEQ;
                $(document).on('click', '.delete-cat', function (data, callbak) {
                    $('#ConfirmModal').modal('show');
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    CAT_SEQ = x.CAT_SEQ = x['CAT_SEQ'];
                });
                $("#yes").click(function (e) {
                    e.preventDefault();
                    if ($(this).hasClass('test')) {
                        jQuery.ajax({
                            type: "post",
                            url: 'admin/Category/Delete_Category',
                            data: {
                                'CAT_SEQ' :CAT_SEQ
                            },
                            dataType: 'json',
                            success: function (data) {
                                m.toast(data);
                                rebind_cat_table(data, $('#SaveCat'))
                                $('#ConfirmModal').modal('hide');

                            }

                        })
                    }
                });

                $(document).on('click', '#search', function () {
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    //var x = $('#ACTION').val();
                    CatTb.refresh();

                });



            }
        },

    }
}();


CatTb.init();


var rebind_cat_table = function (result, form) {
    $(form).find('input').val('');
        CatTb.refresh();
    }

