var x = 0;
var y = 0;
var z = 0;
var a = 0;
var nav = 0;
var UserTypeTb = function () {
	var _this = this;

	return {
		table: $('#User_Type'),
		oTable: {},// datatable object
		SEQtype: "",
		CAT_SEQ: "",
		options: {
			"responsive": true,
			"bJQueryUI": true,
			"bSort": false,
			"bPaginate": true,
			"sPaginationType": "full_numbers",
			"iDisplayLength": 10,
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
			},
			ajax: {
				"url": getBaseUrl("admin/Permission/Get_User_Type"),
				"data": function (payload) {
					//     payload.SEQ = UserTypeTb.SEQ1;
				},
				"dataSrc": "records", // returned object name that contains the actual data
				"type": "post"
			},
			"columns": [


				{"data": "SEQ", "title": "متسلسل", "width": "", "visible": false, "class": "SEQQ"},
				{"data": "DESC_TYPE", "title": "العضوية", "width": ""},
				//{"data": "CAT_SEQ", "title": "تصنيف اللجنة", "width": "" ,"visible": false},
				// {"data": "COMM_TYPE", "title": "نوع اللجنة", "width": "" , "visible": false},
				{
					"data": null,
					"title": "اعطاء الصلاحيات",
					"width": "170",
					"render": function (data) {
						return '<button data-toggle="tooltip" title="منح صلاحيات" class="btn btn-success btn-sm Add-per circle-btn"><i class="fa fa-pencil"></i></button>';

					}
				}
			], "fnRowCallback": function (nRow, aData, iDisplayIndex) {

				$(nRow).addClass('wobble-vertical');

			},
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

				$(document).on('click', '.Add-per', function () {
					$('#modal_form_per').modal('show');
					//   var x = 0 ; var y =0 ; var z = 0; var a = 0; var nav = 0;
					var checkB = $("input[type=checkbox][value=" + 0 + "]");
					$("input[type=checkbox][value=" + 0 + "]").prop("checked", false);
					$(".NAV_SEQ").prop("checked", false);
					$(".SEQ1").prop("checked", false);
					if (x == 0)
						// checkB.parent().parent().next().find($("input[type=checkbox][class=add]")).prop("checked",true);
						checkB.parent().parent().next().find($('.add')).prop("checked", false);
					if (y == 0)
						checkB.parent().parent().next().find($('.EDIT')).prop("checked", false);
					if (z == 0)
						checkB.parent().parent().next().find($('.DELETE')).prop("checked", false);
					if (a == 0)
						checkB.parent().parent().next().find($('.ACTIVE')).prop("checked", false);
					var x = _this.oTable.api().row($(this).parent().parent()).data();
					SEQtype = x.SEQ = x['SEQ'];
					//   var TITLE = x.TITLE = x['TITLE'];
					CAT_SEQ = x.CAT_SEQ = x['CAT_SEQ'];
					jQuery.ajax({
						type: "post",
						url: 'admin/Permission/GET_PERMISSION',
						data: {
							'USER_TYPE_SEQ': SEQtype,
						},
						dataType: 'json',
						success: function (data) {
							var i = 0;
							// $.each(data, function () {
							//     var SUM = data['records'][3]['DELETE_'];
							//    alert(SUM);
							// })
							var len = data['records'].length;

							//alert ($('#SEQ1').val());
							for (var i = 0; i < len; i++) {
								var seq = data['records'][i]['NAV_SEQ'];
								var x = data['records'][i]['ADD_'];
								var y = data['records'][i]['EDIT'];
								var z = data['records'][i]['DELETE_'];
								var a = data['records'][i]['ACTIVE_'];

								//   console.log(x);
								var checkB = $("input[type=checkbox][value=" + seq + "]");
								$("input[type=checkbox][value=" + seq + "]").prop("checked", true);
								if (x == 1)
									// checkB.parent().parent().next().find($("input[type=checkbox][class=add]")).prop("checked",true);
									checkB.parent().parent().next().find($('.add')).prop("checked", true);
								if (y == 1)
									checkB.parent().parent().next().find($('.EDIT')).prop("checked", true);
								if (z == 1)
									checkB.parent().parent().next().find($('.DELETE')).prop("checked", true);
								if (a == 1)
									checkB.parent().parent().next().find($('.ACTIVE')).prop("checked", true);
								// alert(y.attr("type"));

								// .parent().parent().next().find($('.EDIT')).prop("checked",true);
								// $(this).parent().parent().next().find($('.add')).prop("checked",true);
								// $(this).parent().parent().next().find($('.DELETE')).prop("checked",true);
								//

								// $('.NAV_SEQ').prop("checked",true);
								// $('.EDIT').prop("checked",true);
								// $('.add').prop("checked",true);
								// $('.DELETE').prop("checked",true);
								//
								//    $('.chk input:checkbox').each(function(){
								//  if ( $('.NAV_SEQ').val() == seq) {
								//     $('.NAV_SEQ').prop("checked",true);
								//     alert($('#SEQ1').val());
								// }
								//  })
								//$(this).parent().parent().find($('.add')).prop("checked",true);
								// }
							}
						}
					})
				});

				$(document).on('click', '#Per_Save', function () {
					// var ADD = $(this).parent().parent().find($('.ADD_:checked')).val();
					//  var EDIT1 = $(this).parent().parent().find($('.EDIT:checked')).val();
					//  var DELETE = $(this).parent().parent().find($('.DELETE_:checked')).val();
					//    var ACTIVE = $('.ACTIVE_:checked').val();

					var NAV_SEQ1 = [];
					var ADD = [];
					var EDIT = [];
					var DELETE = [];
					var ACTIVE = [];
					var Add_selected;
					var Edit_selected;
					var Delete_selected;
					var Active_selected;
					$('.chk input:checked').each(function () {
						NAV_SEQ1.push($(this).val());
						// $('.t1 input:checked').each(function(){
						ADD.push($(this).parent().parent().next().find($('.add:checked')).val() === undefined ? 0 : 1);
						//   ADD.push($('.add:checked').val());
						EDIT.push($(this).parent().parent().next().find($('.EDIT:checked')).val() === undefined ? 0 : 1);
						DELETE.push($(this).parent().parent().next().find($('.DELETE:checked')).val() === undefined ? 0 : 1);
						ACTIVE.push($(this).parent().parent().next().find($('.ACTIVE:checked')).val() === undefined ? 0 : 1);
						//alert($(this).parent().parent().next().find($('.ADD_')).is('checked'));

						// });

					})
					var selected;
					Add_selected = ADD.join(',');
					Edit_selected = EDIT.join(',');
					Delete_selected = DELETE.join(',');
					Active_selected = ACTIVE.join(',');
					selected = NAV_SEQ1.join(',');

					//alert(ADD);
					// alert("Add_"+Add_selected); alert("Delete_"+Delete_selected); alert("Edit_"+Edit_selected);
					jQuery.ajax({
						type: "post",
						url: 'admin/Permission/user_per_Save',
						data: {
							//'SEQ' : 1 ,
							'USER_TYPE_SEQ': SEQtype,
							'NAV_SEQ': selected,
							'ADD_': Add_selected,
							'EDIT': Edit_selected,
							'DELETE_': Delete_selected,
							'ACTIVE_': Active_selected
						},
						dataType: 'json',
						success: function (data) {
							m.toast(data);
							UserTypeTb.refresh();
						}
					})
				});
				$(document).on('click', '#Per_Close', function () {
					// $("#modal_form_per").val(null).trigger("change");
					$('#modal_form_per').modal('hide');
				});


			}
		},
		"columnDefs": [
			{"width": "1000px", "targets": 0}
		],

	}
}();

UserTypeTb.init();

/*
var NavTb = function() {
    var _this = this;

    return {
        table: $('#permission_table'),
        oTable: {}, // datatable object
        options: {
            "dom": "ti",
            "bSort": false,
            //"serverSide": true,
            "processing": true,
            "serverSide": true,
            "responsive":true,

            ajax: {
                "url": getBaseUrl("admin/Permission/Get_All_Nav"),
                "data": function (payload) {
                    payload.SEQ = '';
                },
                "dataSrc": "records", // returned object name that contains the actual data
                "type": "post"
            },
            "columns": [
                {
                    "data": null,
                 // "title": "اعطاء الصلاحية",
                    "width": "170",
                    "render": function (data) {
                        return '<input type="checkbox"</input>';

                    }},
                {"data": "SEQ", "width": "", "visible": false},
                {"data": "TITLE", "width": "" },
                {
                    "data": null,
                   // "title": "خيارات",
                    "width":"170",
                    "render":function(data){
                        return '<span class="show_per"><i class="fa fa-plus"></i></span>';
                    }
                }



            ]

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
                // $(document).on('click','.Add-per',function(data ,callbak) {
                //     var x = _this.oTable.api().row($(this).parent().parent()).data();
                //     var SEQ = x.SEQ = x['SEQ'];
                //     alert(SEQ);
                //     jQuery.ajax({
                //         type: "post",
                //         url: 'admin/Permission/Get_All_Nav',
                //         data: {
                //             'SEQ': SEQ,
                //         },
                //         dataType: 'json',
                //         success: function (data) {
                //
                //             $i=0;
                //             $.each(data, function () {
                //                 var RW = data[0]['TILTE'];
                //                 alert(data['RW']);
                //                 $('#child').append('&nbsp;&nbsp;&nbsp;&nbsp;<li>'
                //                     + RW + '</li>');
                //                 $i++;
                //             })
                //         }
                //     })
                // });

            }
        },
        "columnDefs": [
            { "width": "1000px", "targets": 0 }
        ],

    }
}();

NavTb.init();*/
