
<?php
$area = $this->uri->segment(1);
$cont = $this->uri->segment(2);
$action = $this->uri->segment(3);
$this->load->model('Permission_M', 'permission');

$PARENT_ID=$this->permission->GET_NAV_PARENT($cont.'/'.$action);
$p_year = $this->session->userdata("PLAN_ID_YEAR");
$CURRENT_YEAR = $this->session->userdata("CURRENT_YEAR");
$notify = $this->load->model('Notification_M', 'notify');
?>


<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">


    <head>
        <meta charset="utf-8" />
        <base href="<?php echo base_url(); ?>"/>
        <title>Metronic | Dashboard</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
<!--        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />-->
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-toastr/toastr-rtl.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/fonts/summernote/dist/summernote.css" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout/css/themes/darkblue-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />


        <link rel="shortcut icon" href="assets\global\plugins\datatables\images\favicon.ico" /> </head>


    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">

        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <div class="page-logo">

                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>

                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>

                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">

                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
                                    <?php  $notify = $this->notify->NOTIFY_COUNT(1);?>
                                <span class="badge badge-default"> <?php echo count($notify); 
                                /// var_dump($notify);   ?>  </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                   
                                    <a href="page_user_profile_1.html">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                        <li>
											<?php
											foreach ($notify as $title)
												$cnt = count($title);
											// echo $cnt;
											for ($i = 0; $i < $cnt; $i++) {
											if ($title[$i]['COUNTER'] > 0) { ?>
										<li>
											<!--        http://localhost/Rebat/admin/Consult/Reply/1                                        <input type="hidden" class="id" value="-->
											<?php //echo $title[$i]['SEQ'];?><!--">-->
											<a href= <?php echo  $title[$i]['URL'] . "/" . $title[$i]['PK_FK']; ?>>
                                                    <span class="time"
														  STYLE="color: #01b070"><?php echo $title[$i]['COUNTER']; ?></span>

												<span class="details">
                                                       <?php echo $title[$i]['DESCRIPTION']; ?>
                                                        <span>

											</a>
										</li>

										<?php }
										} ?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

						<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
							   data-close-others="true">
								<i class="icon-bell"></i>
								<?php
								$notify_USER = $this->notify->NOTFIY_USER_ALL(1);

								?>
								<span class="badge badge-default divToRefresh"
									  id="loader"> <?php echo count($notify_USER); ?>  </span>
							</a>
							<ul class="dropdown-menu">
								<li class="external">
									<h3>
										<span class="bold"></span> الاشعارات</h3>
									<a href="page_user_profile_1.html">view all</a>
								</li>
								<?php
								foreach ($notify_USER as $notify) {
									?>
									<li>
										<ul class="dropdown-menu-list scroller" style="height: 50px;"
											data-handle-color="#637283">

											<li>
												<input type="hidden" class="id" value="<?php echo $notify['ID']; ?>">
												<a class="read">
													<span class="time" STYLE="color: #01b070"></span>
													<span class="details">
                                           <?php echo $notify['DESCRIPTION']; ?>
                                                    <span>
												</a>
											</li>
										</ul>
									</li>

								<?php }
								?>

							</ul>
						</li>


                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="assets/layouts/layout/img/avatar3_small.jpg" />
                                <span class="username username-hide-on-mobile"> Nick </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">

                                <li>
                                    <a href="page_user_login_1.html">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a href="javascript:;" class="dropdown-toggle">
                                <i class="icon-logout"></i>
                            </a>
                        </li>

                    </ul>
                </div>

            </div>

        </div>

        <div class="clearfix"> </div>
        <div class="page-container">
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">

						<?php
						$Display_Nav = $this->permission->DISPLAY_NAV(1, 0);
						foreach ($Display_Nav as $navb)
							$cnt = count($navb);
						// echo $cnt;
						for ($i = 0; $i < $cnt; $i++) {

						$openli="";
						$disp="";
						$activli="";
						if ($navb[$i]['NUM'] > 0) {
						if($PARENT_ID["P_OUT_NUM"]==$navb[$i]['SEQ']) {
							$openli = "open";
							//$disp = "display: block;";
							if ($navb[$i]['NUM'] > 0) {
								if ($navb[$i]['URL'] == $cont . "/" . $action) {
									$activli = "active";
								}
							}
						}
						?>
                        <li class="nav-item <?php echo $openli . $activli?> ">
                            <a href="<?php echo $navb[$i]['URL']; ?>" class="nav-link nav-toggle">
                                <i class="<?php echo $navb[$i]['ICON']; ?>"></i>
                                <span class="title"><?php echo $navb[$i]['TITLE']; ?> </span>
                            </a>
                            <ul class="sub-menu">
								<?php
								$SUB_NAV = $this->permission->DISPLAY_NAV(1, $navb[$i]['SEQ']);
								foreach ($SUB_NAV as $sub)
									$cnt1 = count($sub);
								for ($x = 0; $x < $cnt1; $x++) {
								$activli="";
								if ($sub[$x]['NUM'] > 0) {
								if($sub[$x]['URL']==$cont."/".$action){
									$activli="active";
								}
								?>
                                <li class="nav-item <?php echo  $activli?> ">
                                    <a href="<?php echo $sub[$x]['URL']; ?>" class="nav-link ">
                                        <span class="title"><?php echo $sub[$x]['TITLE'] ?>  </span>
                                    </a>
                                </li>
								<?php }
								}
								?>
                            </ul>
                        </li>
							<?php
						}

						} ?>
                    </ul>
                </div>

            </div>

            <div class="page-content-wrapper">
                <div class="page-content">
                    <?php
                    if (isset($subview)) {
                        $this->load->view($subview);
                    }
                    ?>
                    </div>
                </div>

            </div>


        </div>



        <div class="page-footer">
            <div class="page-footer-inner"> 2014 &copy; Metronic by keenthemes.
<!--                <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>-->
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!--[if lt IE 9]> -->

        <div id="ConfirmModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">تأكيد</h4>
                    </div>
                    <div class="modal-body">
                        <p>هل أنت متأكد من الاستمرار في العملية؟؟</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">إلغاء الأمر</button>
                        <a class="btn btn-danger test" id="yes">نعم متأكد</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>



<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
        <script src="assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
        <script src="assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-toastr/toastr.js" type="text/javascript"></script>
		<script src="assets/js/summernote/summernote.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="assets/js/file_js/js.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/datatables.all.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
                type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        <?php

        if (isset($js)) {
            $this->load->view($js);
        }
        ?>
    </body>

</html>
