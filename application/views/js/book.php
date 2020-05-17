<script src="assets/js/file_js/Book.js" type="text/javascript"></script>

<script>
$("#SaveBookForm").validate({
    rules:{
        BOOK_NAME : "required",
        AUTHOR : "required",
        PRINT_TIME : "required",
        TYPE : "required",
        DESCRIPTION: "required",
        'IMAGE': {
            'required': {
                depends: function (element) {
                    return $('#BOOK_SEQ').val() === '';
                }
            }
        },
        'ATTCHMENT': {
            'required': {
                depends: function (element) {
                    return $('#BOOK_SEQ').val() === '';
                }
            }
        }
        
    },
    messages: {
        BOOK_NAME: "اسم الكتاب مطلوب",
        AUTHOR :"اسم المؤلف مطلوب",
        PRINT_TIME : "تاريخ الطباعة مطلوب",
        TYPE : "نوع الكتاب مطلوب",
        DESCRIPTION :"وصف الكتاب مطلوب",
        IMAGE: "صورة الكتاب مطلوب",
        ATTCHMENT: "نسخة الكتاب مطلوب"
    },
    errorPlacement: function(error, element) {         
       error.insertBefore(element);
   },
  submitHandler: function(form) {
    uploadImage();
  }
});


    function uploadImage() {
        if (typeof FormData !== 'undefined') {
            // send the formData
            var formData = new FormData( $("#SaveBookForm")[0] );
            $.ajax({
                url : 'admin/Book/Save',  // Controller URL
                type : 'POST',
                data : formData,
                async : false,
                cache : false,
                contentType : false,
                processData : false,
                success : function (data,form) {
                    m.toast(data);
                    $('form').find('input').val('');
                    BookTb.refresh();
                }
            });

        }
    }



</script>
