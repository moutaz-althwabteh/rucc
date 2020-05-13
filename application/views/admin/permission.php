<?php
$this->load->model('Permission_M', 'permission');
$x = $this->permission->GET_SUB_NAV(0, 1);
//var_dump($x);
//return;
?>

<style xmlns="http://www.w3.org/1999/html">
	.Permissions, .Permissions ul {
		margin: 0px;
		padding: 0px;
		list-style-type: none;
	}

	.Permissions ul {
		margin-right: 20px;
	}
</style>


<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bubble font-green-sharp"></i>
					<span class="caption-subject font-green-sharp bold uppercase">صلاحيات النظام</span>
				</div>


			</div>
			<div class="">
				<div class="portlet-body form">
					<div class="row">
						<div class="col-md-12">
							<form class=" FormValid" method="post" id="RTP" data-toggle="ajaxform" action="">

								<table id="User_Type" name="User_Type" style="border: 1px; width: 100%"
									   class="table table-striped table-bordered table-hover dt-responsive dataTable">

								</table>

							</form>
						</div>


					</div>
				</div>

			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal_form_per" tabindex="-1" role="dialog"
	 aria-labelledby="exampleModalLabel" aria-hidden="true" data-acallback="rebind_follow_tool_table">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="portlet light">
							<form class=" FormValid" method="post" id="" data-toggle="ajaxform">
								<div class="portlet-body form">

									<ul class="Permissions">
										<?php

										//$Get_All_Nav=$this->load->model('Permission_M','permission');

										$Get_All_Nav = $this->permission->Get_All_Nav(0, 1);
										//var_dump($Get_All_Nav);

										$num = 1;
										foreach ($Get_All_Nav as $nav)
											$cnt = count($nav);
										for ($i = 0; $i < $cnt; $i++) {
											?>
											<li id="child" style="list-style-type: none;" class="Per">
												<div class="row">
													<div class="col-md-12">
														<div class="col-md-5">
															<label class="chk"><input class="SEQ1" name="SEQ1[]" type="checkbox" value="<?php echo $nav[$i]['SEQ'] ?>">
																<?php echo "<strong class='title' style= 'font-weight:bold; color: #00aaaa'>" . $nav[$i]['TITLE'] . "</strong>"; ?>
															</label><br>
														</div>
														<div>
															<input type="checkbox" id="ADD_" name="ADD_[]" class="add" value="0"> اضافة
															&nbsp;<input type="checkbox" id="EDIT" name="EDIT[]" class="EDIT" value="0"> تعديل
															&nbsp;<input type="checkbox" id="DELETE_" name="DELETE_[]" class="DELETE" value="0">حذف
															&nbsp;<input type="checkbox" id="ACTIVE_" class="ACTIVE" name="ACTIVE_[]" value="0"> اعتماد
														</div>
													</div>

												</div>

												<ul>
													<?php

													$data = $this->permission->GET_SUB_NAV($nav[$i]['SEQ'], 1);
													foreach ($data as $sub)
														$cntsub = count($sub);
													$num = 1;
													for ($x = 0; $x < $cntsub; $x++) {
														?>
														<li style="list-style-type: none; ">
															<div class="col-md-12">
																<div class="col-md-4">
																	<label class="chk"><input class="NAV_SEQ" name="NAV_SEQ[]" type="checkbox" value="<?php echo $sub[$x]['SEQ'] ?>"/> <?php echo $sub[$x]['TITLE'];
																		echo "<input type='hidden' name='SEQ1[]' id='SEQ1' value=" . $sub[$x]['SEQ'] . ">"; ?>
																	</label>
																</div>

																<div>
																	<div>
																		&nbsp;<input type="checkbox" id="ADD_" name="ADD_[]" class="add" value="0"> اضافة
																		&nbsp;<input type="checkbox" id="EDIT" name="EDIT[]" class="EDIT" value="0"> تعديل
																		&nbsp;<input type="checkbox" id="DELETE_" name="DELETE_[]" class="DELETE" value="0">حذف
																		&nbsp;<input type="checkbox" id="ACTIVE_" class="ACTIVE" name="ACTIVE_[]" value="0"> اعتماد
																	</div>
																</div>
															</div>
														</li>
													<?php } ?>
												</ul>
											</li>
										<?php } ?>
									</ul>

								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="Per_Save" data-dismiss="modal">حفظ الصلاحيات</button>
				<button type="button" class="btn btn-danger" id="Per_Close" data-dismiss="modal">اغلاق</button>
			</div>
		</div>
	</div>
</div>


<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<script>
	$(function(){
		$(".Permissions :checkbox").click(function(e) {
			$(this).parent().parent().parent().next().find(":checkbox").prop("checked"
				,$(this).is(":checked"));
			var checked=$(this).is(":checked");
			$(this).parents().each(function(index, element) {
				if($(this).is("ul")){
					//if(checked)
					//	$(this).prev().find(":checkbox").prop("checked",true);

					$(this).prev().find(":checkbox").prop("checked",
						$(this).find(":checked").size()>0);
				}
			});

		});
	});

	function refreshModal()
	{
		modal.location.reload(true);
	}

</script>
