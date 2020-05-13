
<br>
<br>
<br>
        <section class="consultations-list">
            <div class="container">
                <div class="row">
                    <div class="row">
                    <input type="hidden" name="per_page" value="">
                        <?php for ($i = 0 ; $i < count($All_Mod["records"]) ; $i++){ ?>
                        <div class="col-md-4">
                            <div class="template-item template-in-section">
                                <div class="template">
                                    <div class="template-icon">
                                        <i class="fa fa-legal"></i>
                                    </div>
                                    <div class="template-name">
                                        <h4><?php echo $All_Mod["records"][$i]['MODEL_TITLE'] ?></h4>
                                    </div>
                                </div>

                                <div class="template-category">

                                    <p><span>التصنيف: </span> <?php echo $All_Mod["records"][$i]['CAT_DESC'] ?></p>
                                </div>
                                <div class="template-actions">
                                    <a data-fancybox="" data-type="iframe" data-src="<?php echo base_url("./uploads/".$All_Mod["records"][$i]['ATTCHMENT']);?>" href="javascript:;" class="btn btn-sm btn-default"> <i class="fa fa-file"></i> عرض النموذج</a>
                                </div>

                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="pagination">
							<p><?php echo $this->pagination->create_links(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
