


var SettTb = function () {
    var _this = this;

    return {
        table: $('#Set-table'),
        oTable: {}, // datatable object
        options: {
            // "dom": "ti",
            //"bSort": false,
           // "responsive": true,
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
                "url": getBaseUrl("admin/Settings/load_Setting"),
                "data": function (payload) {

                },
                "dataSrc": "records", // returned object name that contains the actual data
                "type": "post"
            },
            "columns": [
                { "data": "SEQ", "title": "م." ,"visible": false},
                { "data": "TITLE", "title": "المؤسسة "},
                { "data": "FB_URL", "title": "فيس بوك  "},
                { "data": "INST_URL", "title": "انستقرام  "},
                { "data": "TWITTER_URL", "title": "تويتر  "},
                { "data": "GOOGLE_URL", "title": "جوجل بلس  "},
                { "data": "EMAIL", "title": "الايميل  "},
                { "data": "PHONE", "title": "الهاتف  "},
                { "data": "MOBILE", "title": "الجوال  "},
                { "data": "ADDRESS", "title": "العنوان  "  },
                {
                    "data": null,
                    "title": "خيارات",
                    "render":function(data){
                        return '<button data-toggle="tooltip" title="تعديل" type="button" class="btn btn-success btn-sm circle-btn edit-set"><i class="fa fa-pencil"></i></button> '+'' +
                            '<button data-toggle="tooltip" title="حذف"type="button" class="btn btn-danger btn-sm circle-btn delete-set"><i class="fa fa-trash"></i></button>'+
                            (data.ISACTIVE==0?"<button type='button' class='btn btn-small btn-primary circle-btn active_set'><i class='fa fa-check'></i> اعتماد</button>":"") ;
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

                $(document).on('click', '.edit-set', function () {
                    var data = _this.oTable.api().row($(this).parent().parent()).data();
                    //console.log(data);
                    Util.bindInputs("#SaveSetting", data, '');
                    $('#SaveSetting').goto('-60', 400);
                });


                // $(document).on('click', '#search', function () {
                //     var x = _this.oTable.api().row($(this).parent().parent()).data();
                //     //var x = $('#ACTION').val();
                //     ConTb.refresh();
                //
                // });



            }
        },

    }
}();


SettTb.init();


var rebind_set_table = function (result, form) {
    //  $(form).find('input').val('');
    SettTb.refresh();
}

