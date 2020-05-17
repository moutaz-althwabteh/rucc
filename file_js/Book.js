
var BookTb = function () {
    var _this = this;

    return {
        table: $('#Book-table'),
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
                "url": getBaseUrl("admin/Book/load_Book"),
                "data": function (payload) {

                },
                "dataSrc": "records", // returned object name that contains the actual data
                "type": "post"
            },
            "columns": [
                { "data": "BOOK_SEQ", "title": "م." },
                {
                    "data": null,
                    "title": "",
                    "render":function(data){
                        return '<a target="_balnk" href="uploads/'+data.BOOK_IMG+'"><img class="img-circle" src="uploads/'+data.BOOK_IMG+'" width="30" higth="25"></a>'
                    }
                },
                { "data": "BOOK_NAME", "title": "اسم الكتاب "},
                { "data": "TYPE_DESC", "title": "نوع الكتاب "},
                { "data": "DESCRIPTION", "title": "الوصف "},
                { "data": "AUTHOR", "title": "مؤلف الكتاب "},
                {
                    "data": null,
                    "title": "الكتاب",
                    "render":function(data){
                        return '<a target="_blank" href="uploads/'+data.BOOK_ATTCHMENT+'">تحميل</a>'
                    }
                },
                {
                    "data": null,
                    "title": "خيارات",
                    "render":function(data){
                        return '<button data-toggle="tooltip" title="تعديل" type="button" class="btn btn-success btn-sm circle-btn edit-book"><i class="fa fa-pencil"></i></button> '+'' +
                            '<button data-toggle="tooltip" title="حذف"type="button" class="btn btn-danger btn-sm circle-btn delete-book"><i class="fa fa-trash"></i></button>';
                          ///  (data.ISACTIVE==0?"<button type='button' class='btn btn-small btn-primary circle-btn active_book'><i class='fa fa-check'></i> اعتماد</button>":"") ;
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
                $(document).on('click', '.active_book', function (data, callbak) {
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    var  BOOK_SEQ = x.BOOK_SEQ = x['BOOK_SEQ'];
                    jQuery.ajax({
                        type: "post",
                        url: 'admin/Book/Active_Book',
                        data: {
                            'BOOK_SEQ': BOOK_SEQ,
                        },
                        dataType: 'json',
                        success: function (data) {
                            success : m.toast(data);
                            rebind_book_table(data, $("#SaveBookForm"));

                        }
                    })
                });

       

                $(document).on('click','.download-attach',function(e){
                    var y = _this.oTable.api().row($(this).parent().parent()).data();
                    var BOOK_SEQ =  y.BOOK_SEQ = y['BOOK_SEQ'];

                    jQuery.ajax({
                        type: "post",
                        url:'admin/Book/attachment_get',
                        data : {
                            'BOOK_SEQ': BOOK_SEQ
                        },
                        dataType: 'json',
                        success : function (data) {
                            $.each(data, function () {
                                var res = data[0]['ATTACHMENT'];
                                e.preventDefault();  //stop the browser from following
                                if (res){
                                    window.location = 'uploads/'+res;
                                }
                            })
                        }
                    });

                });



                $(document).on('click', '.edit-book', function () {
                    var data = _this.oTable.api().row($(this).parent().parent()).data();
                    Util.bindInputs("#SaveBookForm", data, '');
                    $("html, body").animate({scrollTop: 0}, 1000);
                });

                var BOOK_SEQ;
                $(document).on('click', '.delete-book', function (data, callbak) {
                    $('#ConfirmModal').modal('show');
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    BOOK_SEQ = x.BOOK_SEQ = x['BOOK_SEQ'];
                });
                $("#yes").click(function (e) {
                    e.preventDefault();
                    if ($(this).hasClass('test')) {
                        jQuery.ajax({
                            type: "post",
                            url: 'admin/Book/Delete_Book',
                            data: {
                                'BOOK_SEQ' :BOOK_SEQ
                            },
                            dataType: 'json',
                            success: function (data) {
                                m.toast(data);
                                rebind_book_table(data, $('#SaveBookForm'))
                                $('#ConfirmModal').modal('hide');
                            }
                        })
                    }
                });

                $(document).on('click', '#search', function () {
                    var x = _this.oTable.api().row($(this).parent().parent()).data();
                    //var x = $('#ACTION').val();
                    BookTb.refresh();

                });
            }
        },

    }
}();

BookTb.init();

var rebind_book_table = function (result, form) {
    $('form').find('input').val('');
    BookTb.refresh();
    }


var BCatTb = function () {
	var _this = this;

	return {
		table: $('#CatB-table'),
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
				"url": getBaseUrl("admin/CatBook/load_CatBook"),
				"data": function (payload) {

				},
				"dataSrc": "records", // returned object name that contains the actual data
				"type": "post"
			},

			"columns": [
				{ "data": "SEQ", "title": "م." },
				{ "data": "BOOK_CAT", "title": "اسم التصنيف"},

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
					var  SEQ = x.SEQ = x['SEQ'];
					jQuery.ajax({
						type: "post",
						url: 'admin/CatBook/Active_Cat',
						data: {
							'SEQ': SEQ,
						},
						dataType: 'json',
						success: function (data) {
							success : m.toast(data);
							rebind_Bcat_table(data, $("#SaveCatBook"));

						}
					})
				});

				$(document).on('click', '.edit-cat', function () {
					var data = _this.oTable.api().row($(this).parent().parent()).data();
					// Util.bindInputs("#SaveCatBook", data, '');
					$('#SaveCatBook').goto('-60', 400);
				});

				var SEQ;
				$(document).on('click', '.delete-cat', function (data, callbak) {
					$('#ConfirmModal').modal('show');
					var x = _this.oTable.api().row($(this).parent().parent()).data();
					SEQ = x.SEQ = x['SEQ'];
				});
				$("#yes").click(function (e) {
					e.preventDefault();
					if ($(this).hasClass('test')) {
						jQuery.ajax({
							type: "post",
							url: 'admin/CatBook/Delete_Cat',
							data: {
								'SEQ' :SEQ
							},
							dataType: 'json',
							success: function (data) {
								m.toast(data);
								rebind_Bcat_table(data, $('#SaveCatBook'))
								$('#ConfirmModal').modal('hide');

							}

						})
					}
				});

				$(document).on('click', '#search', function () {
					var x = _this.oTable.api().row($(this).parent().parent()).data();
					//var x = $('#ACTION').val();
					BCatTb.refresh();

				});



			}
		},

	}
}();


BCatTb.init();


var rebind_Bcat_table = function (result, form) {
	$(form).find('input').val('');
	BCatTb.refresh();
}

