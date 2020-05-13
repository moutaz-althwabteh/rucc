<div class="row">
    <div class="col-md-12">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bubble font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">بيانات المستخدم</span>
                </div>

            </div>
            <div class=" ">

                <form method="post" id="SaveUser" data-toggle="ajaxform" class="form-horizontal"
                      action="<?php echo base_url("admin/User/Save"); ?> "
                      data-acallback="rebind_user_table">
                    <div class="form-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">رقم الهوية</label>
                                <div class="col-md-5">
                                    <input type="hidden" class="form-control" id="SEQ" name="SEQ" placeholder="  ">
                                    <input type="text" class="form-control" id="ID_NUM" name="ID_NUM" placeholder="رقم الهوية ">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">الاسم</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="FULL_NAME" name="FULL_NAME" placeholder="الاسم ">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">الجوال</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="MOBILE" name="MOBILE" placeholder="الجوال ">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">البريد الالكتروني </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="EMAIL" name="EMAIL" placeholder="الإيميل ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">نوع المستخدم  </label>
                                <div class="col-md-5">
                                    <select class="form-control" id="TYPE_USER" name="TYPE_USER">
										<option>اختر..</option>
                                        <?php
                                        foreach ($type as $c)
                                                echo "<option value=" . $c["TYPR"] . ">" . $c["DESC_TYPE"] . "</option>";
                                        ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">حفظ</button>
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
                    <span class="caption-subject font-green-sharp bold uppercase">إدارة المستخدمين </span>
                </div>
            </div>
            <div class="portlet-body form">
                <table class="table" id="User-table">

                </table>

            </div>
        </div>
    </div>
</div>
