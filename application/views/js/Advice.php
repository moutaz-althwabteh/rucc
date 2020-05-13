<script src="assets/js/file_js/Advice.js" type="text/javascript"></script>

<script>
	$("#btnSaveAdv" ).click(function(e) {
		e.preventDefault();
		uploadImage();
	});

	function uploadImage() {
		if (typeof FormData !== 'undefined') {
			// send the formData
			var formData = new FormData( $("#SaveAdv")[0] );
			$.ajax({
				url : 'admin/Advice/Save',  // Controller URL
				type : 'POST',
				data : formData,
				async : false,
				cache : false,
				contentType : false,
				processData : false,
				success : function (data,form) {
					m.toast(data);
					rebind_adv_table();
				}
			});

		}
	}



</script>
