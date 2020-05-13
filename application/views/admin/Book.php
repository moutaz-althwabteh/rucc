<div class="row">
    <div class="col-md-12">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bubble font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">إدارة الكتب</span>
                </div>

            </div>
            <div class="">

                <form method="post" id="SaveBookForm" data-toggle="ajaxform" class="form-horizontal" data-acallback="rebind_book_table"
                      enctype="multipart/form-data" accept-charset="utf-8">
<!--                      action="--><?php //echo base_url('admin/Book/Save'); ?><!--" -->
                    <div class="form-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">اسم الكتاب </label>
                                <div class="col-md-5">
                                    <input type="hidden" class="form-control" id="BOOK_SEQ" name="BOOK_SEQ" placeholder="اسم الكتاب ">
                                    <input type="text" class="form-control" id="BOOK_NAME" name="BOOK_NAME" placeholder="اسم الكتاب ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">المؤلف </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="AUTHOR" name="AUTHOR" placeholder="مؤلف الكتاب ">
                                </div>
                            </div>
                        </div>
						<div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">تاريخ الطباعة </label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="PRINT_TIME" name="PRINT_TIME" placeholder="تاريخ الطباعة ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">نوعه</label>
                                <div class="col-md-5">
                                    <select class="form-control" id="TYPE" name="TYPE">
										<option>اختر
										</option>
										<?php
										foreach ($CatB['records'] as $c)
												echo "<option value=" . $c["SEQ"] . ">" . $c["BOOK_CAT"] . "</option>";
										?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> الوصف </label>
                                <div class="col-md-5">
                                    <textarea class="form-control" rows="5" id="DESCRIPTION" name="DESCRIPTION"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">صورة الكتاب</label>
                                <div class="col-md-5">
                                    <input type="file" class="custom-file-input" id="IMAGE" name="IMAGE">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">المرفق</label>
                                <div class="col-md-5">
                                    <input type="file" class="custom-file-input" id="ATTCHMENT" name="ATTCHMENT">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="" class="btn green" id="btnSaveBook">حفظ</button>
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
                    <span class="caption-subject font-green-sharp bold uppercase">إدارة الكتب </span>
                </div>
            </div>
            <div class="portlet-body form">
                <table class="table" id="Book-table">
<!--                    <thead class="thead-dark" id='Book-table'>-->
<!--                    <tr>-->
<!--                        <th scope="col">#</th>-->
<!--                        <th scope="col">اسم الكتاب</th>-->
<!--                        <th scope="col">وصفه</th>-->
<!--                        <th scope="col">نوعها</th>-->
<!--                        <th scope="col">المرفق</th>-->
<!--                        <th scope="col">الخيارات</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                    <tr>-->
<!--                        <th scope="row">1</th>-->
<!--                        <td>الكتاب الأول </td>-->
<!--                        <td>تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل</td>-->
<!--                        <td>النوع الأول</td>-->
<!--                        <td> الملف 1</td>-->
<!--                        <td>-->
<!--                            <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>-->
<!--                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <th scope="row">1</th>-->
<!--                        <td>الكتاب الثاني </td>-->
<!--                        <td>تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل</td>-->
<!--                        <td>النوع الثاني</td>-->
<!--                        <td> الملف 2</td>-->
<!--                        <td>-->
<!--                            <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>-->
<!--                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <th scope="row">1</th>-->
<!--                        <td>الكتاب الثالث </td>-->
<!--                        <td>تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل تفاصيل</td>-->
<!--                        <td>النوع الثالث</td>-->
<!--                        <td> الملف 3</td>-->
<!--                        <td>-->
<!--                            <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>-->
<!--                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                    </tbody>-->
                </table>

            </div>
        </div>
    </div>
</div>
