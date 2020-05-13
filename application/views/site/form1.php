<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>

    <style>
        #drop-area {
            border: 2px dashed #ccc;
            border-radius: 8px;
            margin: 10px auto;
            padding: 20px;
        }
        #drop-area.highlight {
            border-color: purple;
        }
        p {
            margin-top: 0;
        }
        .my-form {
            margin-bottom: 10px;
        }
        #gallery {
            margin-top: 10px;
        }
        #gallery img {
            width: 150px;
            margin-bottom: 10px;
            margin-right: 10px;
            vertical-align: middle;
        }
        .button {
            display: inline-block;
            padding: 10px;
            background: #ccc;
            cursor: pointer;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .button:hover {
            background: #ddd;
        }
        #fileElem {
            display: none;
        }
    </style>

</head>
<body>

<section class="consultation-one">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-title">
                    <i class="fa fa-legal"></i> استشارة قانونية
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">نوع المعاملة أو الاستشارة</label>
                    <select name="select" class="form-control" id="select1">
                        <option value="1">اختر</option>
                        <option value="2">استشارة فنية</option>
                        <option value="3">استشارة تقنية</option>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">رقم الجوال</label>
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="">البريد الالكتروني</label>
                    <input type="text" class="form-control">
                </div>
            </div>

            <div class="clearfix"></div>


            <div class="col-md-12">
                <div class="form-group">
                    <label for="">كتابة الموضوع</label>
                    <textarea name="subject" id="subject" rows="10" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for=""> مرفقات الاستشارة</label>
                    <!-- <button class="btn- btn-primary btn-xs"><i class="fa fa-plus"></i></button> -->

                    <div id="drop-area">
                        <form class="my-form">
                            <input type="file" id="fileElem" multiple accept="image/*" onchange="handleFiles(this.files)">
                            <label class="button" for="fileElem">قم باختيار الملفات المرفقة</label>
                        </form>
                        <progress id="progress-bar" max=100 value=0></progress>
                        <div id="gallery"></div>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="">خصوصية النشر</label>
                    <div class="checkbox1">
                        <label class="pure-material-checkbox">
                            <input type="checkbox">
                            <span>السماح بنشر الاستشارة</span>
                        </label>

                        <label class="pure-material-checkbox">
                            <input type="checkbox">
                            <span>غير مسموح بنشر الاستشارة</span>
                        </label>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <button class="btn btn-success btn-xl"><i class="fa fa-check"></i> ارسال الطلب</button>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>