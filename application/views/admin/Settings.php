<div class="row">
    <div class="col-md-12">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bubble font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">الثوابت </span>
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> العمليات
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;">  طباعة</a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="javascript:;">ترتيب</a>
                            </li>


                        </ul>
                    </div>
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
                                    <input type="text" class="form-control" id="TITLE" name="TITLE" placeholder="العنوان ">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">فيس بوك  </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="FB_URL" name="FB_URL" placeholder="فيس بوك ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">انستقرام  </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="INST_URL" name="INST_URL" placeholder=" انستقرام">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> تويتر  </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="TWITTER_URL" name="TWITTER_URL" placeholder="تويتر ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">جوجل بلس  </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="GOOGLE_URL" name="GOOGLE_URL" placeholder=" جوجل بلس">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> البريد الإلكتروني  </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="EMAIL" name="EMAIL" placeholder="البريد الإلكتروني ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> الهاتف   </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="PHONE" name="PHONE" placeholder=" الهاتف ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> الجوال   </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="MOBILE" name="MOBILE" placeholder=" الجوال ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> العنوان   </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="ADDRESS" name="ADDRESS" placeholder=" العنوان ">
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

<div class="row">
    <div class="col-md-12">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bubble font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">إدارة الثوابت </span>
                </div>
            </div>
            <div class="portlet-body form">
                <table class="table" id="Set-table">

                </table>

            </div>
        </div>
    </div>
</div>