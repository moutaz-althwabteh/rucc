<script>
$("#SaveCon").validate({
    rules:{
        CON_NAME : "required",
        CON_TYPE : "required",
        MOBILE : "required",
        EMAIL : "required",
        CON_DESC: "required"
    },
    messages: {
        CON_NAME: "عنوان الاستشارة مطلوب",
        CON_TYPE :"نوع الاستشارة مطلوب",
        MOBILE : "رقم الموبايل مطلوب",
        EMAIL : "الايميل مطلوب",
        CON_DESC :"تفاصيل الاستشارة مطلوب"
    },
    errorPlacement: function(error, element) {         
       error.insertBefore(element);
   },
  submitHandler: function(form) {
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
                }
            });
  }
});
</script>