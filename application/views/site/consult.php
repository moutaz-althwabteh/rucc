<section class="consultations-list">
    <div class="container">
        <div class="row">
            <div class="row">
                <?php
                for ($i = 0 ; $i < count($All_Con) ; $i++){?>

                    <div class="col-md-6">
                        <div class="consultation-item">
                            <div class="question">
                                <h3><?php echo $All_Con[$i]['CON_NAME'] ?></h3>
                                <p><i class="fa fa-calendar"></i> 29مايو، 2020</p>
                            </div>
                            <div class="content">
                                <div class="auther">
                                    <div class="image">
                                        <img src="assets/images/team-2.jpg" alt="">
                                    </div>
                                    <div class="content">
                                        <h5>سعيد عبدالله</h5>
                                        <h6>محامي واستشاري دولي</h6>
                                    </div>
                                </div>
                                <div class="answer">
                                    <p><?php echo $All_Con[$i]['REPLY'] ?></p>
                                </div>

                                <a href="<?php echo base_url("Home/Details/".$All_Con[$i]['CON_SEQ']);?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> الاستشارة كاملة</a>

                            </div>
                        </div>
                    </div>

                <?php }


                ?>
            </div>
        </div>
    </div>
</section>