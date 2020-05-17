<div class="breadcrumb-website">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb breadcrumb-fill0">
                        <div class="col-md-6">
                            <ol>
                                <li><a href="/"><i class="fa fa-home"></i></a></li>
                                <li><a href="/">الاستشارات</a></li>
                                <li class="active">الاستشارات القانونية</li>
                            </ol>
                        </div>

                        <div class="section-actions">

                            <div class="col-md-3" style="float: left;">
                                <div class="input-group"> <input class="form-control" placeholder="بحث عن عقود ومعاملات..."> <span class="input-group-btn"> <button class="btn btn-default" type="button"><i class="fa fa-search"></i> بحث</button> </span> </div>

                            </div>
                            <div class="col-md-2" style="float: left;">
                                <select name="type" id="type" class="form-control">
                                    <option value="">اختر</option>
                                    
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
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
                            <span class="pagination-inner">
                            <?php echo $this->pagination->create_links(); ?>
                            </span>
                        </div>
                    </div>
                </div>
          
            </div>
        </section>
