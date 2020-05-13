
<?php
$area = $this->uri->segment(1);
$cont = $this->uri->segment(2);
$action = $this->uri->segment(3);

$this->load->model('Consult_M','Con');
$data = $this->Con->GET_CON($action , 1);
//var_dump($data);

?>


        <section class="details-page">
            <article>
                <div class="container">
                    <div class="row">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="article">
                                    <p class="publish-date"><i class="fa fa-calendar"></i><?php echo $data[0]['ADD_DT']?> </p>

                                    <h3><?php echo $data[0]['CON_NAME']?> </h3>
                                    <p><?php echo $data[0]['CON_DESC']?></p>


                                    <div class="answer-card">
                                        <div class="auther">
                                            <div class="image">
                                                <img src="assets/images/team-2.jpg" alt="">
                                            </div>
                                            <div class="content">
                                                <h5><?php echo $data[0]['USER_REPLY']?></h5>
                                                <h6>محامي واستشاري دولي</h6>
                                            </div>
                                        </div>

                                        <div class="answer">
                                            <p><?php echo $data[0]['REPLY']?></p>
                                        </div>


                                    </div>

                                </div>
                            </div>
<!--                            /////////////////////////////////////////////////////////////////////////////////////////////////-->
                            <div class="col-md-4">
                                <div class="leftside">

                                    <div class="more-consultations">
                                        <h4><i class="fa fa-legal"></i> اقرأ أيضاً</h4>


                                        <div class="consultaions-leftside">
                                            <?php
                                            for ($i = 0 ; $i < count($All_Con) ; $i++){?>
                                            <div class="consul-item">
                                                <a href="#">
                                                    <p class="publish-date"><i class="fa fa-calendar"></i> 29 مايو، 2020</p>
                                                    <h5><?php echo $All_Con[$i]['CON_NAME'] ?></h5>
                                                </a>
                                            </div>
                                    <?php }?>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>
