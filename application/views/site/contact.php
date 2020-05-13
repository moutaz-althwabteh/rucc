<div class="inner-content">
	<div class="breadcrumb-website">
		<div class="container">
			<div class="row">
				<div class="breadcrumb breadcrumb-fill0">
					<div class="col-md-12">
						<ol>
							<li><a href="#"><i class="fa fa-home"></i></a></li>
							<li><a href="#">الاستشارات</a></li>
							<li class="active">اتصل بنا</li>
						</ol>
					</div>


				</div>

			</div>

		</div>
	</div>

	<section class="details-page">
		<article>
			<div class="container">
				<div class="row">
					<div class="row">
						<div class="col-md-6 ">

							<div class="contact-informations">
								<h3>اتصل بنا</h3>
								<p>حتى هاربر موسكو ثم, وتقهقر المنتصرة حدة عل, التي فهرست واشتدّت أن أسر. كانت المتاخمة
									التغييرات أم وفي. ان وانتهاءً باستحداث قهر. ان ضمنها للأراضي الأوروبية ذات.
								</p>

								<div class="contact-card">
									<ul class="contact-info">
										<li class="color-one">
											<b>رقم الهاتف</b>
											<p><i class="fa fa-phone"></i> +972599981016</p>
										</li>

										<li class="color-two">
											<b>البريد الالكتروني</b>
											<p><i class="fa fa-envelope"></i> saidalakklouk@gmail.com</p>
										</li>

										<li class="color-one">
											<b>العنوان</b>
											<p><i class="fa fa-map-marker"></i> دوار انصار، عمارة الفاروق، مركز
												الاستشارات القانونية

											</p>
										</li>
									</ul>
								</div>
							</div>

						</div>

						<div class="col-md-6">
							<div class="send-message">
								<h3>ارسل رسالة لنا</h3>

								<div class="row">
									<form method="post" id="SaveAdv" data-toggle="ajaxform" action=" ">
										<div class="col-md-6">
											<div class="form-group">
												<label for="">الاسم رباعي</label>
												<input type="text" class="form-control" name="USERNAME" id="USERNAME">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="">رقم الهوية</label>
												<input type="text" class="form-control" name="USER_ID" ID="USER_ID">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="">رقم الهاتف</label>
												<input type="text" class="form-control" id="PHONE" name="PHONE">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="">البريد الالكتروني</label>
												<input type="text" class="form-control" id="EMAIL" name="EMAIL">
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<label for="">نص الرسالة</label>
												<textarea name="MSG_TEXT" id="MSG_TEXT" rows="4"
														  class="form-control"></textarea>
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<button type="" class="btn btn-block btn-lg btn-primary" id="send"><i
														class="fa fa-check"></i> ارسال الرسالة</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div> 
				</div>
			</div>
		</article>
	</section>
</div>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>


<script type="text/javascript">
	$(document).ready(function () {
		$('#send').click(function (){
			alert();
	//	$('#showDetail')
		var USERNAME = $('#USERNAME').val();
		var USER_ID = $('#USER_ID').val();
		var PHONE = $('#PHONE').val();
		var EMAIL = $('#EMAIL').val();
		var MSG_TEXT = $('#MSG_TEXT').val();

		$.ajax({
			url: 'admin/Contact/Save',
			type: 'post',
			data: {
				USER_ID: USER_ID,
				USERNAME:USERNAME ,
				PHONE:PHONE ,
				EMAIL:EMAIL ,
				MSG_TEXT:MSG_TEXT 
			},
			dataType: 'json',
			success: function (data) {
				if(data.status == 1){
					toastr.success(data.message);
					toastr.options = {
						"debug": false,
						"positionClass": "toast-bottom-right",
						"onclick": null,
						"fadeIn": 300,
						"fadeOut": 1000,
						"timeOut": 5000,
						"extendedTimeOut": 1000
					}
				}else {
					toastr.error(data.message);
					toastr.options = {
						"debug": false,
						"positionClass": "toast-bottom-right",
						"onclick": null,
						"fadeIn": 300,
						"fadeOut": 1000,
						"timeOut": 5000,
						"extendedTimeOut": 1000
					}
					e.preventDefault();
				}
			}
		});
		return false;
	});
});
    </script>







