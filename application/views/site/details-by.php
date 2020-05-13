
<br>
<br>
<section class="consultations-list">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <div class="consultation-item">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>الاستشارة</th>
                                <th>نوعها</th>
                                <th>التفاصيل</th>
                                <th>الخصوصية</th>
                                <th>الرد</th>
                                <th>المستشار</th>
                                <th>الحالة</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $num = 0;
                            foreach ($All_Con_By as $row) {
                                $num++; ?>
                                <tr>
                                    <th><?php echo $row['CON_NAME'] ?></th>
                                    <th><?php echo $row['CON_TYPE'] ?></th>
                                    <th><?php echo $row['CON_DESC'] ?></th>
                                    <th><?php echo $row['PRIVACY'] == 1 ? 'غير مسموح بالنشر': 'مسموح بالنشر' ;?></th>
                                    <th><?php echo $row['REPLY'] ?></th>
                                    <th><?php echo $row['USER_REPLY']?></th>
                                    <th><?php echo  $row['ISACTIVE'] == 1 ? 'مغلق': 'مفتوح' ; ?></th></tr>

                            <?php }  ?>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


