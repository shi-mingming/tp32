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
   			$('#result').html(data.info).show();
   			$('#form1').resetForm();
   		}else{
   			$('#result').html(data.info).show();
   		}
   		
   	}
})