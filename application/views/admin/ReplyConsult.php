<div class="row">
    <div class="col-md-12">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bubble font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase"> الرد على الاستشارة </span>
                </div>

            </div>
            <div class="">

                <form method="post" id="SaveReply" data-toggle="ajaxform" class="form-horizontal"
                      action="<?php echo base_url("admin/Consult/ReplySave"); ?> "
                      data-acallback="">
                    <div class="form-body">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> الإستشارة </label>
                                <div class="col-md-5">
                                    <input type="hidden" id="CON_SEQ" name="CON_SEQ" value='<?php  echo $GET_CON[0]["CON_SEQ"] ?>'/>
                                    <input type="text" class="form-control" id="" placeholder=" " value= "<?php echo $GET_CON[0]['CON_NAME'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> وصف الاستشارة </label>
                                <div class="col-md-5">
                                    <textarea class="form-control" rows="5"><?php echo $GET_CON[0]['CON_DESC']; ?></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> رقم الجوال </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="" placeholder="رقم الجوال" value= "<?php echo $GET_CON[0]['MOBILE']?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> الرد على الاستشارة </label>
                                <div class="col-md-5">
                                    <textarea class="form-control" rows="5" id="REPLY" name="REPLY"><?php echo $GET_CON[0]['REPLY']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="" class="btn green">رد</button>
                                <button type="button" class="btn green" id="active">اعتماد</button>
                                <button type="button" class="btn default">إلغاء</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


