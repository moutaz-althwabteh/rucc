<div class="row">
    <div class="col-md-12">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user-plus"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">إدخال تصنيفات الكتب </span>
                </div>
                <div class="tools">
                    <a href="" class="fullscreen"> </a>
                    <a href="" class="collapse"> </a>
                </div>
            </div>
            <div>
                <form method="post" id="SaveCatBook" data-toggle="ajaxform" class="form-horizontal"
                      action="<?php echo base_url("admin/CatBook/Save"); ?> "
                      data-acallback="rebind_Bcat_table">
                    <div class="form-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="SEQ" name="SEQ"
                                       placeholder="اسم التصنيف">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-3 control-label">اسم التصنيف </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="BOOK_CAT" name="BOOK_CAT"
                                       placeholder="اسم التصنيف">
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
                <table class="table" id="CatB-table"></table>

            </div>
        </div>
    </div>
</div>
