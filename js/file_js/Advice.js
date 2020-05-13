
var AdvTb = function () {
    var _this = this;

    return {
        table: $('#Adv-table'),
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
                "url": getBaseUrl("admin/Advice/load_Advice"),
                "data": function (payload) {

                },
                "dataSrc": "records", // returned object name that contains the actual data
                "type": "post"
            },

            "columns": [
                { "data": "R", "title": "م." },
                { "data": "TITLE", "title": "العنوان "},
                // { "data": "DESCRIPTION", "title": "تفاصيل النصيحة  "},
                {
                    "data": null,
                    "title": "خيارات",
                    "render":function(data){
                        return '<button data-toggle="tooltip" title="تعديل" type="button" class="btn btn-success btn-sm circle-btn edit-adv"><i class="fa fa-pencil"></i></button> '+'' +
                            '<button data-toggle="tooltip" title="حذف"type="button" class="btn btn-danger btn-sm circle-btn delete-adv"><i class="fa fa-trash"></i></button>' ;
                    }
                }
            ],
            
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
           

                $(document).on('click', '.edit-adv', function () {
                    var data = _this.oTable.api().row($(this).parent().parent()).data();
                    $("#TITLE").val(data.TITLE);
                    $(".summernote").summernote("code", data.DESCRIPTION);
                    $("#ADV_SEQ").val(data.ADV_SEQ);
                    $('#SaveAdv').goto('-60', 400);
                    $("#img_adv").attr("src","./uploads/"+data.IMAGE_ADV);
                    $("#img_adv").removeAttr("hidden");
                });

                var ADV_SEQ;
                $(document).on('click', '.delete-adv', function (data, callbak) {
                    $('#ConfirmModal').modal('show');
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    ADV_SEQ = x.ADV_SEQ = x['ADV_SEQ'];
                });
                $("#yes").click(function (e) {
                    e.preventDefault();
                    if ($(this).hasClass('test')) {
                        jQuery.ajax({
                            type: "post",
                            url: 'admin/Advice/Delete_Advice',
                            data: {
                                'ADV_SEQ' :ADV_SEQ
                            },
                            dataType: 'json',
                            success: function (data) {
                                m.toast(data);
                                rebind_adv_table(data, $('#SaveAdv'))
                                $('#ConfirmModal').modal('hide');

                            }

                        })
                    }
                });

                $(document).on('click', '#search', function () {
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    //var x = $('#ACTION').val();
                    AdvTb.refresh();

                });



            }
        },

    }
}();


AdvTb.init();


var rebind_adv_table = function (result, form) {
    $("form").find('input').val('');
    $(".summernote").summernote("code","");
    $("#img_adv").attr("hidden","hidden");
    AdvTb.refresh();
    }

