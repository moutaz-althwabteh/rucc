<div class="breadcrumb-website">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb breadcrumb-fill0">
                        <div class="col-md-12">
                            <ol>
                                <li><a href="#"><i class="fa fa-home"></i></a></li>
                                <li><a href="#">الاستشارات</a></li>
                                <li class="active">الاستشارات القانونية</li>
                            </ol>
                        </div>


                    </div>

                </div>

            </div>
        </div>

        <section class="consultations-list">
            <div class="container">
                <div class="row">
                    <div class="row">

                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="width: 12%;">تاريخ الاستشارة</th>
                                        <th>عنوان الاستشارة</th>
                                        <th>حالة الرد</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    // var_dump($All_Con);
                                        foreach ($All_Con as $con) {
                                          ?>
                                             <tr>
                                                <th scope="row">1</th>
                                                <td><?php echo $con["ADD_DT"] ?></td>
                                                <td><?php echo $con["CON_NAME"] ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-default answered"><i class="fa fa-check"></i> تم الرد</a>
                                                </td>
                                            </tr>
                                          <?php
                                        }
                                    ?>
                                   
                                   
                                </tbody>
                            </table>
                        </div>

                    </div>



                </div>
            </div>
        </section>