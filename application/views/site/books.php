<br>
<br>

<section class="consultations-list">
            <div class="container">
                <div class="row">
                    <div class="row">
                        <?php for ($i = 0 ; $i < count($All_Book["records"]) ; $i++){ ?>
                        <div class="col-md-4">
                            <div class="book-item">

                                <div class="book-content">
                                    <div class="book-cover">
                                        <img src="<?php echo base_url("./uploads/".$All_Book["records"][$i]['IMAGE']);?>" alt="صورة الكتاب">
                                    </div>
                                    <div class="book-information">
                                        <h4 class="book-name"><?php echo $All_Book["records"][$i]['BOOK_NAME'] ?></h4>
                                        <p class="auther-name"> <span>اسم الكاتب: </span><?php echo $All_Book["records"][$i]['AUTHOR'] ?></p>
                                        <a data-fancybox data-type="iframe" data-src="<?php echo base_url("./uploads/".$All_Book["records"][$i]['ATTCHMENT']);?>" href="javascript:;" class="btn btn-sm btn-success"><i class="fa fa-book"></i> عرض الكتاب</a>
                                    </div>
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





