//用户模块表验证
$(function(){
   	 $('#userform').ajaxForm({
   		beforeSubmit: checkForm,
   		success:  complete,
   		dataType: 'json'
   	});
   	
   	function checkForm(){
   		
   	}
   	function complete(data){
   		if(data.status==1){
			$(".alert").attr("class","alert alert-success").show();
			$('#result').html(data.info);
			if(data.url){
				location.href=data.url;
			}else{
				$('#userform').resetForm();
			}
			
		}else{
			$(".alert").show();
			$('#result').html(data.info);
		}
   		
   	}
   	

   	
   	
})