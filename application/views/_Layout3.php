<?php

$this->load->model('Setting_M','Set');
$data = $this->Set->Setting_Select(1);
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?php echo base_url(); ?>"/>
    <title>مركز الاستشارات القانونية</title>
    <link rel="apple-touch-icon" sizes="180x180" href="apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/flexslider.css">
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Almarai:400,700&display=swap" rel="stylesheet">

    <style>
        .inner-content {
            padding-top: 130px;
        }
    </style>

</head>

<body>

    <header id="header" class="inner-header">
        <div class="registred-users">
            <div class="container">
                <div class="user-components">
                    <div class="user">
                        <img src="assets/images/team-2.jpg" alt="">
                        <span class="welcome-txt">أهلاً بك،</span> <span class="person-name">سعيد عبدالله العكلوك</span>
                    </div>
                    <div class="user-links">
                        <a href="#" class=""><i class="fa fa-book"></i> استشاراتي</a>
                        <a href="#" class=""><i class="fa Search fa-sign-out"></i> خروج</a>

                    </div>
                </div>

            </div>
        </div>
        <div class="header-content clearfix inner-header">
            <a class="logo" href="#">
                <img src="assets/images/logo-collage.png" alt="">
                <div class="app-name">
                    <h3>مركز الاستشارات القانونية</h3>
                    <p>كلية الرباط الجامعية</p>
                </div>

            </a>
            <nav class="navigation" role="navigation">
                <ul class="primary-nav">
                    <li><a href="#" class="nav-item active">الرئيسية</a></li>
                    <li><a href="#features" class="nav-item">خدمات المركز</a></li>
                    <li><a href="#consultations" class="nav-item">استشارات قانونية </a></li>
                    <li><a href="#templates" class="nav-item">نماذج قانونية</a></li>
                    <li><a href="#guides" class="nav-item">نصائح قانونية</a></li>
                    <li><a href="#library" class="nav-item">المكتبة القانونية</a></li>
                    <li><a href="#download" class="nav-item">اتصل بنا</a></li>
                    <li>
                        <a class="btn btn-sm btn-success" href="#"> <i class="fa fa-sign-in"></i> تسجيل الدخول</a>
                    </li>


                </ul>
            </nav>
            <a href="#" class="nav-toggle">Menu<span></span></a>
        </div>
        <!-- header content -->
    </header>


    <div class="inner-content">
       
   
        <?php
            if (isset($subview)) {
                $this->load->view($subview);
            }
            ?>

    </div>





    <footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row  text-left">
                <div class="footer-col col-md-3">
                    <h5>القائمة البريدية</h5>
                    <p>اشترك في القائمة البريدية الآن ليصلك كل جديد!</p>
                    <div class="subscribe">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="يرجى كتابة البريد الالكتروني..." name="TO_" id="TO_">
                        </div>

                        <button class="btn btn-success subscripe-btn" id="subscribe">اشترك</button>
                    </div>

                </div>
                <div class="footer-col col-md-3 col-md-offset-1">

                    <h5>بيانات الاتصال</h5>
                    <ul class="footer-contacts">
                        <li>
                            <a href="#">
                                <i class="fa fa-envelope"></i> <?php echo $data['records'][0]['EMAIL']?>
                            </a>
                        </li>



                        <li><a href="#"><i class="fa fa-phone"></i> <?php echo $data['records'][0]['PHONE']?></a></li>

                        <li>
                            <p><i class="fa fa-map-marker"></i> <?php echo $data['records'][0]['ADDRESS']?></p>
                        </li>
                    </ul>


                </div>

                <div class="footer-col col-md-2 col-md-offset-1">
                    <h5>روابط هامة</h5>
                    <ul>
                        <li><a href="#">دليل الاجراءات</a></li>
                        <li><a href="#">شكاوى ومراجعات</a></li>
                        <li><a href="#">الاصدارات المرئية</li>
                    </ul>
                </div>

                <div class="footer-col col-md-2">
                    <h5>مواقع وزارة الداخلية</h5>
                    <ul>
                        <li><a href="#">دليل الاجراءات</a></li>
                        <li><a href="#">شكاوى ومراجعات</a></li>
                        <li><a href="#">الاصدارات المرئية</li>
                    </ul>
                </div>
            </div>


        </div>
    </div>
    </div>
    <!-- footer top -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-left">
                    <p><span>جميع الحقوق محفوظة © 2020</span> <a href="#">مركز الاستشارات القانونية</a>.
                        <br> تطوير <a href="#">الادارة العامة للحاسوب ونظم المعلومات</a></p>
                </div>

                <div class="col-md-4 text-right">
                    <ul class="footer-share">
                        <li><a href="<?php echo $data['records'][0]['FB_URL']?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?php echo $data['records'][0]['TWITTER_URL']?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="<?php echo $data['records'][0]['INST_URL']?>"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="<?php echo $data['records'][0]['GOOGLE_URL']?>"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
    <!-- footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="assets/js/jquery.min.js"><\/script>')
    </script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.flexslider-min.js"></script>
    <!-- <script src="assets/js/jquery.fancybox.pack.js"></script> -->
    <script src="assets/js/jquery.fancybox.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/retina.min.js"></script>
    <script src="assets/js/modernizr.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/file_js/js.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-toastr/toastr.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
    <?php

if (isset($js)) {
    $this->load->view($js);
}
?>
    <script>
    $(document).on('click', '#subscribe', function () {
        var TO_ =$('#TO_').val();
        jQuery.ajax({
            type: "post",
            url: 'admin/Elist/send',
            data: {
                'TO_': TO_,
            },
            dataType: 'json',
            success: function (data) {
                if (data.status >= 1 ) {
                    toastr.success('تم تفعيل الخدمة');
                    toastr.options = {
                        "debug": false,
                        "positionClass": "toast-bottom-right",
                        "onclick": null,
                        "fadeIn": 300,
                        "fadeOut": 1000,
                        "timeOut": 5000,
                        "extendedTimeOut": 1000
                    }
                    $('#TO_').val('');
                }
                    else
                {
                    toastr.error('حدث خطأ في تفعيل الخدمة');
                    toastr.options = {
                        "debug": false,
                        "positionClass": "toast-bottom-right",
                        "onclick": null,
                        "fadeIn": 300,
                        "fadeOut": 1000,
                        "timeOut": 5000,
                        "extendedTimeOut": 1000
                    }
                }

            }
        });
    });
</script>
</body>

</html>