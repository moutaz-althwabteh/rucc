<div class="row">
    <div class="col-md-12">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bubble font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">إضافة نصائح</span>
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> العمليات
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;">  طباعة</a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="javascript:;">ترتيب</a>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
            <div class="">

                <form method="post" id="SaveAdv" data-toggle="ajaxform" class="form-horizontal"
                      action=""
                      data-acallback="rebind_adv_table">
                    <div class="form-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">عنوان النصيحة</label>
                                <div class="col-md-8">
                                    <input type="hidden" class="form-control" id="ADV_SEQ" name="ADV_SEQ" placeholder="العنوان ">
                                    <input type="text" class="form-control" id="TITLE" name="TITLE" placeholder="العنوان ">
                                </div>
                            </div>
                        </div>


						<div class="col-md-12" style="height: 90%">
							<div class="form-group">
								<label class="col-md-3 control-label"> الوصف </label>
								<div class="col-md-8">
									<textarea class="summernote" id="DESCRIPTION" name="DESCRIPTION"></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-md-3 control-label">صورة </label>
								<div class="col-md-5">
                                    <input type="file" class="custom-file-input" id="IMAGE_ADV" name="IMAGE_ADV">
                                    <img src="" id="img_adv" width="150" height="150" hidden>
								</div>
							</div>
						</div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="" class="btn green"  id="btnSaveAdv">حفظ</button>
                                <button type="button" class="btn default">إلغاء</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bubble font-green-sharp"></i>
					<span class="caption-subject font-green-sharp bold uppercase">إدارة الكتب </span>
				</div>
			</div>
			<div class="portlet-body form">
				<table class="table" id="Adv-table">

				</table>

			</div>
		</div>
	</div>
</div>



<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function () {
		$('.summernote').summernote({
			height: 300,
			onPast: function (e) {
				var bt = ((e.originalEvent || e).clipboardData || window.clipboardData).getData("Text");
				e.preventDefault();
				document.execCommand('insertText', false, bt);
			}
		});
	});

</script>
