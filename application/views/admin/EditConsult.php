<div class="row">
    <div class="col-md-12">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bubble font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase"> تعديل الاستشارة </span>
                </div>

            </div>
            <div class="portlet-body form">

                <form class="form-horizontal" role="form"  action="<?php echo base_url("admin/Consult/Save"); ?> ">
                    <div class="form-body">


                        <input type = "hidden" id="" name="" >
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">نوع الاستشارة</label>
                                <div class="col-md-5">
                                    <select class="form-control">
                                        <option selected>اختر...</option>
                                        <option value="1" selected >قانوني</option>
                                        <option value="2"> ترفيهي</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">نوع الاستشارة</label>
                                <div class="col-md-5">
                                    <select class="form-control">
                                        <option selected>اختر...</option>
                                        <option value="1" selected >قانوني</option>
                                        <option value="2"> ترفيهي</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> الاسم </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="" placeholder="الاسم " value="محمد محمود">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> رقم الجوال </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="" placeholder="رقم الجوال" value="059000000">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> الايميل </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="" placeholder=" الايميل"  value="m@m.com">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> الوصف </label>
                                <div class="col-md-5">
                                    <textarea class="form-control" rows="5"> الوصف الوصف الوصف الوصف الوصف الوصف</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">المرفق</label>
                                <div class="col-md-5">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">الخصوصية</label>
                                <div class="col-md-5">
                                    <input type="checkbox" class="custom-file-input" id="inputGroupFile01" checked>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">تعديل</button>
                                <button type="button" class="btn default">إلغاء</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

