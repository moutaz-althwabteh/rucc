

<section class="banner" role="banner">

    <!-- header -->
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="banner-text text-center">
                <h1><span>استشارة مجانية</span> تحدث مع اخصائي في القانون</h1>
                <p>ان مدن جنوب بالمطالبة, ذات أساسي الشرقية وبولندا تم, بحشد ثمّة من فعل. كما تكتيكاً الإمتعاض لبولندا، كل. فعل قدما أمدها ارتكبها أم, عن بحث غرّة، الأرض التحالف, تصفح الآلاف محاولات بعد بل. لكل عل وقرى الإتفاقية. بفرض أصقاع اسبوعين ٣٠
                    تعد.
                </p>
                <a href="#" class="btn btn-xl btn-success">اقرا المزيد</a>
            </div>
            <!-- banner text -->
        </div>
    </div>
</section>
<!-- banner -->
<section id="features" class="features section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 feature text-center">
                <div class="features-box">
                    <span class="icon icon-tools"></span>
                    <div class="feature-content">
                        <a href="#">
                            <h5>استشارات قانونية</h5>
                        </a>
                        <p>جهة ليرتفع وبلجيكا، في, جنوب الإحتفاظ العالمية في على, أي فقد شاسعة إحتار. من انه وتتحمّل باستخدام</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 feature text-center">
                <div class="features-box">
                    <span class="icon icon-desktop"></span>
                    <div class="feature-content">
                        <a href="#">
                            <h5>استشارات قانونية</h5>
                        </a>
                        <p>جهة ليرتفع وبلجيكا، في, جنوب الإحتفاظ العالمية في على, أي فقد شاسعة إحتار. من انه وتتحمّل باستخدام</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 feature text-center">
                <div class="features-box">
                    <span class="icon icon-lightbulb"></span>
                    <div class="feature-content">
                        <a href="#">
                            <h5>استشارات قانونية</h5>
                        </a>
                        <p>جهة ليرتفع وبلجيكا، في, جنوب الإحتفاظ العالمية في على, أي فقد شاسعة إحتار. من انه وتتحمّل باستخدام</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- features -->


<section class="guides-section" id="guides">

<div class="container">
    <div class="row">
        <div class="guides-carousel">
            <?php foreach ($All_Adv as $adv) {
                ?>
                <div class="guide-item">

<div class="guide-image">
    <img src="./uploads/<?php echo $adv["IMAGE_ADV"]; ?>" width="380" height="200" alt="صورة النصيحة">
</div>


<div class="guide-content">
    <h4 class="guide-name"><?php echo $adv["TITLE"]; ?></h4>
    <p class="publish-date"><i class="fa fa-calendar"></i> 29 مايو، 2020</p>
    <div class="guide-description">
      <?php echo $adv["DESCRIPTION"]; ?>
    </div>
</div>

</div>
                <?php
            } ?>
            

          
        </div>

    </div>
</div>

</section>


<section id="consultations">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="section-title">
                    <h3> استشارات قانونية
                    </h3>

                    <p>نعرض الاستشارات القانونية التي تم الرد عليها من خلال المركز وسمح بنشرها</p>

                </div>
            </div>

            <div class="col-md-4 text-right">
                <a href=""<?php echo base_url("Home/Consult");?>"" class="btn btn-success button-page">جميع الاستشارات</a>

            </div>
        </div>

        <div class="row">
            <div class="consultations-carousel">
                <?php
                for ($i = 0 ; $i < count($All_Con) ; $i++){?>
                <div class="col-md-4">
                    <div class="consultation-item">
                        <div class="question">
                            <h3><?php echo $All_Con[$i]['CON_NAME'] ?></h3>
                            <p><i class="fa fa-calendar"></i> 29مايو، 2020</p>
                        </div>
                        <div class="content">
                            <div class="auther">
                                <div class="image">
                                    <img src="assets/images/team-2.jpg" alt="">
                                </div>
                                <div class="content">
                                    <h5><?php echo $All_Con[$i]['USER_REPLY'] ?></h5>
                                </div>
                            </div>
                            <div class="answer">
                                <p><?php echo $All_Con[$i]['REPLY'] ?></p>
                            </div>

                            <a href="<?php echo base_url("Home/Details/".$All_Con[$i]['CON_SEQ']);?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> الاستشارة كاملة</a>

                        </div>
                    </div>

                </div>

                <?php } ?>

            </div>
        </div>
    </div>
</section>


<section class="templates-section" id="templates">
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <div class="section-title">
                    <h3> نماذج قانونية
                    </h3>
                    <p>نعرض الاستشارات القانونية التي تم الرد عليها من خلال المركز وسمح بنشرها</p>
                </div>
            </div>

            <div class="section-actions">

                <div class="col-md-3" style="float: left;">
                    <div class="input-group"> <input class="form-control" placeholder="بحث عن عقود ومعاملات..."> <span class="input-group-btn"> <button class="btn btn-default" type="button"><i class="fa fa-search"></i> بحث</button> </span> </div>

                </div>
                <div class="col-md-2" style="float: left;">
                    <select name="type" id="type" class="form-control">
                        <option value="1">اختر</option>
                        <option value="2">نماذج قانونية</option>
                        <option value="3">نماذج عقود</option>
                        <option value="4">معاملات قانونية</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="templates">
                <?php for ($i = 0 ; $i < count($All_Mod["records"]) ; $i++){ ?>
                <div class="col-md-4">
                    <div class="template-item">
                        <div class="template">
                            <div class="template-icon">
                                <i class="fa fa-legal"></i>
                            </div>
                            <div class="template-name">
                                <h4><?php echo $All_Mod["records"][$i]['MODEL_TITLE'] ?></h4>
                            </div>
                        </div>

                        <div class="template-category">

                            <p><span>التصنيف: </span><?php echo $All_Mod["records"][$i]['CAT_DESC'] ?></p>
                        </div>
                        <div class="template-actions">
                            <a data-fancybox data-type="iframe" data-src="<?php echo base_url("./uploads/".$All_Mod["records"][$i]['ATTCHMENT']);?>" href="javascript:;" class="btn btn-sm btn-default"> <i class="fa fa-file"></i> عرض النموذج</a>
                        </div>

                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="<?php echo base_url("Home/Show_templates");?>" class="btn btn-success cta-btn">عرض جميع النماذج</a>

            </div>
        </div>

    </div>
</section>


<section class="section-library" id="library">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="section-title">
                    <h3> المكتبة القانونية
                    </h3>

                    <p>نقدم لك مكتبة متكاملة من الكتب القانونية القيمة التي تساعدك على الشسمو</p>

                </div>
            </div>

            <div class="col-md-4 text-right">
                <a href="#" class="btn btn-success button-page">عرض جميع الكتب</a>

            </div>
        </div>

        <div class="row">

            <div class="books-carousel">
                <?php for ($i = 0 ; $i < count($All_Book["records"]) ; $i++){ ?>
                <div class="col-md-4">
                    <div class="book-item">

                        <div class="book-content">
                            <div class="book-cover">
                                <img src="<?php echo base_url("./uploads/".$All_Book["records"][$i]['IMAGE']);?>" alt="صورة الكتاب">
                            </div>
                            <div class="book-information">
                                <h4 class="book-name"> <?php echo $All_Book["records"][$i]['BOOK_NAME'] ?></h4>
                                <p class="auther-name"> <span>اسم الكاتب: </span>  <?php echo $All_Book["records"][$i]['AUTHOR'] ?></p>
                                <a data-fancybox data-type="iframe" data-src="<?php echo base_url("./uploads/".$All_Book["records"][$i]['ATTCHMENT']);?>" href="javascript:;" class="btn btn-sm btn-success"><i class="fa fa-book"></i> عرض الكتاب</a>

                            </div>
                        </div>

                    </div>
                </div>
                <?php  } ?>
            </div>

        </div>
    </div>
</section>
