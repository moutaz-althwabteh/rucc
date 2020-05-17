<script src="assets/js/file_js/model.js" type="text/javascript"></script>

<script>
  $("#btnSaveModel" ).click(function(e) {
        e.preventDefault();
        uploadImage();
    });

    function uploadImage() {
        if (typeof FormData !== 'undefined') {
            // send the formData
            var formData = new FormData( $("#SaveMod")[0] );
            $.ajax({
                url : 'admin/Model/Save',  // Controller URL
                type : 'POST',
                data : formData,
                async : false,
                cache : false,
                contentType : false,
                processData : false,
                success : function (data,form) {
                    m.toast(data);
                    rebind_Mod_table();
                }
            });

        }
    }

</script>
