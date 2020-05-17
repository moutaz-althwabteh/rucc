<div class="row">
    <div class="col-md-12">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user-plus"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">إدخال التصنيفات  </span>
                </div>
                <div class="tools">
                    <a href="" class="fullscreen"> </a>
                    <a href="" class="collapse"> </a>
                </div>
            </div>
            <div>
                <form method="post" id="SaveCat" data-toggle="ajaxform" class="form-horizontal"
                      action="<?php echo base_url("admin/Category/Save"); ?> "
                      data-acallback="rebind_cat_table">
                    <div class="form-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="CAT_SEQ" name="CAT_SEQ"
                                       placeholder="اسم التصنيف">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-3 control-label">اسم التصنيف </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="CAT_NAME" name="CAT_NAME"
                                       placeholder="اسم التصنيف">
                            </div>
                        </div>
                    </div>

                  
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">متفرع من</label>
                                <div class="col-md-5">
                                    <select class="form-control" id="PARENT" name="PARENT">
                                    <option value="0">اختر</option>
                                    <?php foreach ($categories as $category) {
                                        ?>
                                        <option value="<?php echo $category["CAT_SEQ"] ?>"><?php echo  $category["CAT_NAME"] ?></option>
                                        <?php
                                    } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="" class="btn green">حفظ</button>
                                <button type="button" class="btn default">إلغاء</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



<div class="row">
    <div class="col-md-12">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bubble font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">إدارة التصنيفات </span>
                </div>
            </div>
            <div class="portlet-body form">
                <table class="table" id="Cat-table"></table>

            </div>
        </div>
    </div>
</div>