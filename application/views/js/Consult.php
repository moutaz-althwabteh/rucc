<script src="assets/js/file_js/Consult.js" type="text/javascript"></script>

<script>
  $("#btnSaveCon" ).click(function(e) {
        e.preventDefault();
        uploadImage();
    });

    function uploadImage() {
        if (typeof FormData !== 'undefined') {
            // send the formData
            var formData = new FormData( $("#SaveCon")[0] );
            $.ajax({
                url : 'admin/Consult/Save',  // Controller URL
                type : 'POST',
                data : formData,
                async : false,
                cache : false,
                contentType : false,
                processData : false,
                success : function (data,form) {
                    m.toast(data);
					ConTb.refresh();
                }
            });

        }
    }

</script>
