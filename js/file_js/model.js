
var ModTb = function () {
    var _this = this;

    return {
        table: $('#Mod-table'),
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
                "url": getBaseUrl("admin/Model/load_Model"),
                "data": function (payload) {

                },
                "dataSrc": "records", // returned object name that contains the actual data
                "type": "post"
            },

            "columns": [
                { "data": "MODEL_SEQ", "title": "م." },
                { "data": "MODEL_TITLE", "title": "النموذج "},
                { "data": "CAT_DESC", "title": "اسم التصنيف"},
                { "data": "DESCRIPTION", "title": "وصف  "},
                {
                    "data": null,
                    "title": "خيارات",
                    "render":function(data){
                        return '<button data-toggle="tooltip" title="تعديل" type="button" class="btn btn-success btn-sm circle-btn edit-mod"><i class="fa fa-pencil"></i></button> '+'' +
                            '<button data-toggle="tooltip" title="حذف"type="button" class="btn btn-danger btn-sm circle-btn delete-mod"><i class="fa fa-trash"></i></button>'+
                            (data.ISACTIVE==0?"<button type='button' class='btn btn-small btn-primary circle-btn active_mod'><i class='fa fa-check'></i> اعتماد</button>":"") ;
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
                $(document).on('click', '.active_mod', function (data, callbak) {
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    var  MODEL_SEQ = x.MODEL_SEQ = x['MODEL_SEQ'];
                    jQuery.ajax({
                        type: "post",
                        url: 'admin/Model/Active_MODEL',
                        data: {
                            'MODEL_SEQ': MODEL_SEQ,
                        },
                        dataType: 'json',
                        success: function (data) {
                            success : m.toast(data);
                            rebind_Mod_table(data, $("#SaveMod"));

                        }
                    })
                });

                // $(document).on('change','#ATTCHMENT',function(){
                //     var file_name = $('#ATTCHMENT').val().replace(/C:\\fakepath\\/i, '')
                //     $('#filename').val(file_name);
                // });



                $(document).on('click','.download-attach',function(e){
                    var y = _this.oTable.api().row($(this).parent().parent()).data();
                    var DOC_ID =  y.DOC_ID = y['DOC_ID'];

                    jQuery.ajax({
                        type: "post",
                        url:'admin/Document_delivery/attachment_get',
                        data : {
                            'DOC_ID': DOC_ID
                        },
                        dataType: 'json',
                        success : function (data) {
                            $.each(data, function () {
                                var res = data[0]['ATTACHMENT'];
                                e.preventDefault();  //stop the browser from following
                                if (res){
                                    window.location = 'uploads/'+res;
                                }
                            })}

                    });


                });

                $(document).on('click', '.edit-mod', function () {
                    var data = _this.oTable.api().row($(this).parent().parent()).data();
                    Util.bindInputs("#SaveMod", data, '');
                    $('#SaveMod').goto('-60', 400);
                });

                var MODEL_SEQ;
                $(document).on('click', '.delete-mod', function (data, callbak) {
                    $('#ConfirmModal').modal('show');
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    MODEL_SEQ = x.MODEL_SEQ = x['MODEL_SEQ'];
                });
                $("#yes").click(function (e) {
                    e.preventDefault();
                    if ($(this).hasClass('test')) {
                        jQuery.ajax({
                            type: "post",
                            url: 'admin/Model/Delete_MODEL',
                            data: {
                                'MODEL_SEQ' :MODEL_SEQ
                            },
                            dataType: 'json',
                            success: function (data) {
                                m.toast(data);
                                rebind_Mod_table(data, $('#SaveMod'))
                                $('#ConfirmModal').modal('hide');

                            }

                        })
                    }
                });

                $(document).on('click', '#search', function () {
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    //var x = $('#ACTION').val();
                    ModTb.refresh();

                });



            }
        },

    }
}();


ModTb.init();


var rebind_Mod_table = function (result, form) {
    $(form).find('input').val('');
        ModTb.refresh();
    }

