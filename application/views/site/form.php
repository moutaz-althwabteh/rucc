<div class="breadcrumb-website">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb breadcrumb-fill0">
                        <div class="col-md-12">
                            <ol>
                                <li><a href="#"><i class="fa fa-home"></i></a></li>
                                <li><a href="#">جميع الاستشارات</a></li>
                                <li class="active">استشارة قانونية</li>
                            </ol>
                        </div>


                    </div>

                </div>

            </div>
        </div>
<section class="consultation-one">
       <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-title"> 
                    <i class="fa fa-legal"></i> استشارة قانونية
                </div>
            </div>     
        </div>
        <form method="post" id="SaveCon" data-toggle="ajaxform">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for=""> عنوان الاستشارة </label>
                    <input type="text" class="form-control" id="CON_NAME" name="CON_NAME">
                    <input type="hidden" class="form-control" id="CON_SEQ" name="CON_SEQ">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">نوع المعاملة أو الاستشارة</label>
                    <select class="form-control" id="CON_TYPE" name="CON_TYPE">
                        <option value="">اختر</option>
                        <?php 
                            foreach ($type as $t) {
                                ?>
                                <option value="<?php echo $t["CODE_ID"] ?>"><?php echo $t["DESC_AR"] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">رقم الجوال</label>
                    <input type="text" class="form-control" id="MOBILE" name="MOBILE" VALUE="">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="">البريد الالكتروني</label>
                    <input type="text" class="form-control" value="" id="EMAIL" name="EMAIL">
                </div>
            </div>

            <div class="clearfix"></div>


            <div class="col-md-12">
                <div class="form-group">
                    <label for="">كتابة الموضوع</label>
                    <textarea name="CON_DESC" id="CON_DESC" rows="10" class="form-control" ></textarea>
                </div>
            </div>

         

            <div class="col-md-12">
                <div class="form-group">
                    <label for="">خصوصية النشر</label>
                    <div class="checkbox1">
                        <label class="pure-material-checkbox">
                            <input type="checkbox" id="PRIVACY" name="PRIVACY" value="1">
                            <span>السماح بنشر الاستشارة</span>
                          </label>
                    </div>
                   
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <button type="" class="btn btn-success btn-xl" id="btnSaveCon"><i class="fa fa-check"></i> ارسال الطلب</button>
                </div>
            </div>
        </div>
        </form>
       </div>
    </section>
