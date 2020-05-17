<div class="row">
    <div class="col-md-12">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-green-sharp bold uppercase">اضافة نموذج</span>
                </div>
       
            </div>
            <div class="">

                    <form method="post" id="SaveMod" data-toggle="ajaxform" class="form-horizontal" data-acallback="rebind_Mod_table">
<!--                          action="--><?php //echo base_url("admin/Model/Save"); ?><!-- "-->

                    <div class="form-body">

                        <div class="col-md-12" hidden>
                            <div class="form-group">
                                <label class="col-md-3 control-label">عنوان النموذج</label>
                                <div class="col-md-5">
                                    <input type="hidden" class="form-control" id="MODEL_SEQ" name="MODEL_SEQ" placeholder="العنوان ">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">عنوان النموذج</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="MODEL_TITLE" name="MODEL_TITLE" placeholder="العنوان ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">التصنيف</label>
                                <div class="col-md-5">
                                    <select class="form-control" id="CAT_SEQ" name="CAT_SEQ">
                                    <?php foreach ($categories as $category) {
                                        ?>
                                        <option value="<?php echo $category["CAT_SEQ"] ?>"><?php echo  $category["CAT_NAME"] ?></option>
                                        <?php
                                    } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> الوصف </label>
                                <div class="col-md-5">
                                    <textarea class="form-control" rows="5" id="DESCRIPTION" name="DESCRIPTION"></textarea>
                                </div>
                            </div>
                        </div>





                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">المرفق</label>
                                <div class="col-md-5">
                                    <input type="file" class="custom-file-input" id="ATTCHMENT" name="ATTCHMENT">
<!--                                    <input type="text" id="filename" name="filename">-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="" class="btn green" id="btnSaveModel">حفظ</button>
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
                    <span class="caption-subject font-green-sharp bold uppercase">إدارة النماذج </span>
                </div>
            </div>
            <div class="portlet-body form">
                <table class="table" id="Mod-table">
<!--                    <thead class="thead-dark">-->
<!--                    <tr>-->
<!--                        <th scope="col">#</th>-->
<!--                        <th scope="col">النموذج</th>-->
<!--                        <th scope="col">نوعه</th>-->
<!--                        <th scope="col">الوصف</th>-->
<!--                        <th scope="col">المرفق</th>-->
<!--                        <th scope="col">الخيارات</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                    <tr>-->
<!--                        <th scope="row">1</th>-->
<!--                        <td>النموذج 1</td>-->
<!--                        <td>النوع الأول</td>-->
<!--                        <td>تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل</td>-->
<!--                        <td> الملف 1</td>-->
<!--                        <td>-->
<!--                            <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>-->
<!--                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <th scope="row">1</th>-->
<!--                        <td>النموذج 2</td>-->
<!--                        <td>النوع 2</td>-->
<!--                        <td>تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل</td>-->
<!--                        <td> الملف 2</td>-->
<!--                        <td>-->
<!--                            <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>-->
<!--                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <th scope="row">1</th>-->
<!--                        <td>النمودج 3</td>-->
<!--                        <td>النوع 3</td>-->
<!--                        <td>تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل</td>-->
<!--                        <td> الملف 3</td>-->
<!--                        <td>-->
<!--                            <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>-->
<!--                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                    </tbody>-->
                </table>

            </div>
        </div>
    </div>
</div>

