<script src="assets/js/file_js/Book.js" type="text/javascript"></script>

<script>
    $("#btnSaveBook" ).click(function(e) {
        e.preventDefault();
        uploadImage();
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
                    BookTb.refresh();
                }
            });

        }
    }



</script>
