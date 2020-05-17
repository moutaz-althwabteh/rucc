<script type="text/javascript">
$("#SaveAdv").validate({
    rules:{
        USERNAME : "required",
        USER_ID : "required",
        PHONE : "required",
        EMAIL : "required",
        MSG_TEXT: "required"
    },
    messages: {
        USERNAME: "الاسم مطلوب",
        USER_ID :"رقم الهوية مطلوب",
        PHONE : "رقم الموبايل مطلوب",
        EMAIL : "الايميل مطلوب",
        MSG_TEXT :"نص الرسالة مطلوب"
    },
    errorPlacement: function(error, element) {         
       error.insertBefore(element);
   },
  submitHandler: function(form) {
    var USERNAME = $('#USERNAME').val();
		var USER_ID = $('#USER_ID').val();
		var PHONE = $('#PHONE').val();
		var EMAIL = $('#EMAIL').val();
		var MSG_TEXT = $('#MSG_TEXT').val();

    $.ajax({
			url: 'admin/Contact/Save',
			type: 'post',
			data: {
				USER_ID: USER_ID,
				USERNAME:USERNAME ,
				PHONE:PHONE ,
				EMAIL:EMAIL ,
				MSG_TEXT:MSG_TEXT 
			},
			dataType: 'json',
			success: function (data) {
				if(data.status == 1){
					toastr.success(data.message);
					toastr.options = {
						"debug": false,
						"positionClass": "toast-bottom-right",
						"onclick": null,
						"fadeIn": 300,
						"fadeOut": 1000,
						"timeOut": 5000,
						"extendedTimeOut": 1000
					}
					$('form input').val("");
					$('form textarea').val("");
				}else {
					toastr.error(data.message);
					toastr.options = {
						"debug": false,
						"positionClass": "toast-bottom-right",
						"onclick": null,
						"fadeIn": 300,
						"fadeOut": 1000,
						"timeOut": 5000,
						"extendedTimeOut": 1000
					}
					e.preventDefault();
				}
			}
		});
  }
});



// 	$(document).ready(function () {
// 		$('#send').click(function (){
// 			alert();

	
	
// 		return false;
// 	});
// });
    </script>