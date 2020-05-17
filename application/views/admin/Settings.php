<div class="row">
    <div class="col-md-12">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-green-sharp bold uppercase">الاعدادت العامة </span>
                </div>

            </div>
            <div class="">

                <form method="post" id="SaveSetting" data-toggle="ajaxform" class="form-horizontal"
                      action="<?php echo base_url("admin/Settings/Save"); ?> "
                      data-acallback="rebind_set_table">
                    <div class="form-body">
                        <input type="hidden" class="form-control" id="SEQ" name="SEQ">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> المؤسسة </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="TITLE" name="TITLE" value="<?php echo $setting["TITLE"] ?>" placeholder="العنوان ">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">فيس بوك  </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="<?php echo $setting["FB_URL"] ?>" id="FB_URL" name="FB_URL" placeholder="فيس بوك ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">انستقرام  </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="<?php echo $setting["INST_URL"] ?>" id="INST_URL" name="INST_URL" placeholder=" انستقرام">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> تويتر  </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="<?php echo $setting["TWITTER_URL"] ?>" id="TWITTER_URL" name="TWITTER_URL" placeholder="تويتر ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">جوجل بلس  </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="<?php echo $setting["GOOGLE_URL"] ?>" id="GOOGLE_URL" name="GOOGLE_URL" placeholder=" جوجل بلس">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> البريد الإلكتروني  </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="<?php echo $setting["EMAIL"] ?>" id="EMAIL" name="EMAIL" placeholder="البريد الإلكتروني ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> الهاتف   </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="<?php echo $setting["PHONE"] ?>" id="PHONE" name="PHONE" placeholder=" الهاتف ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> الجوال   </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="<?php echo $setting["MOBILE"] ?>" id="MOBILE" name="MOBILE" placeholder=" الجوال ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> العنوان   </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="<?php echo $setting["ADDRESS"]; ?>" id="ADDRESS" name="ADDRESS" placeholder=" العنوان ">
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

</div>
<script>
function rebind_set_table(){
    $(".blockUI").hide();
}
</script>