<?php @header ('Content-type: text/html; charset=utf-8'); 
@session_start();
require_once("mainfile.php");
$PHP_SELF = "index.php";
GETMODULE($_GET[name],$_GET[file]);
 //require_once("js/control.php");
 
?>    

 
 
  
 
  
  <script>
  
 
  $('.back-full-popup-button').click(function(){   
  
  document.getElementById('check_data_chat_now').value=0;
 
  
   $( "#load_data_manage_work" ).toggle();
   
   
    $( "#load_data_manage_work" ).html('');
	
	
	$( "#show_main_tool_bottom" ).show();
	
 

     	});
		
	 
  </script>
 
 
 
  



<style>
.disabledbutton {
   pointer-events: none; 
    opacity: 0.5;
}
</style>


 
 
 

 
<FORM name="myform_regiter" id="myform_regiter"   enctype="multipart/form-data" >





 <input class="form-control" type="hidden" name="check_step_1" id="check_step_1"  required="true" onkeypress="PasswordEnter(this,event)"   value="0" >
  <input class="form-control" type="hidden" name="check_step_2" id="check_step_2"  required="true" onkeypress="PasswordEnter(this,event)"   value="0" >
   <input class="form-control" type="hidden" name="check_step_3" id="check_step_3"  required="true" onkeypress="PasswordEnter(this,event)"   value="0" >
 
 





 

 
 
  <div id="new-tabs-1"  style="margin-top:0px; border:none; padding:10px;">

  <?  include ("mod/register/profile_new.php");?>
       <script src="js/camera/binaryajax.js"></script> 
                 <script src="js/camera/exif.js"></script>     
                 
                 
                 </div>