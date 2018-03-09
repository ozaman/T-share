<?php @header ('Content-type: text/html; charset=utf-8'); 
@session_start();
require_once("mainfile.php");
$PHP_SELF = "index.php";
GETMODULE($_GET[name],$_GET[file]);
 //require_once("js/control.php");
 
  require_once("js/control.php");
 
  require_once("css/maincss.php");
 
?>    

<script src="js/jquery-main.js"></script> 


 
 <!-- Bootstrap 3.3.6 -->
  <?  include ("bootstrap/css/css.php");?>
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
  <!-- Theme style -->

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.css?v=<?=time()?>">
  
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
 
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css?v=<?=time()?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.css?v=<?=time()?>">
 
 
    <link href="docs/css/highlight.css" rel="stylesheet">
    <link href="dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">

 
    <link href="docs/css/highlight.css" rel="stylesheet">
    <link href="dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">

 
 
  
  <script>
  
 
  $('.back-full-popup-button').click(function(){   
  
  document.getElementById('check_data_chat_now').value=0;
 
  
   $( "#load_data_manage_work" ).toggle();
   
   
    $( "#load_data_manage_work" ).html('');
	
	
	$( "#show_main_tool_bottom" ).show();
	
 

     	});
		
	 
  </script>
 
 
  <div class="back-full-popup" style="background-color:<?=$main_color_sorf?>; position:fixed; z-index:99999; width:100%; padding-right:0px;  box-shadow: 0px 0px 10px #666666; display:nones; left:0;    ">  
  



<style>
.disabledbutton {
   pointer-events: none; 
    opacity: 0.5;
}
</style>



  <div id="register_step_1"  class="main_div_profile">
  
 
  
  
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tbody>
    <tr >
      <td width="40" align="center"  >
      
     <div id="number_register_step_1" class="stepnumber <? if($_GET[file]=='profile'){ echo 'stepnumber-active'; } ?>"><center>1</div> 
      
      </td>
      <td style="color:#FFFFFF"   class="font_18" ><b>ข้อมูลส่วนตัว</td>
  <td width="25"   class="font_18" style="color:#FFFFFF"  id="check_icon_step_1"><i class="fa fa-ban" style="font-size:20px; height:20px;color: #FFFFFF"></i></td>
    </tr>
    
  </tbody>
</table>
 
  </div>
  

  
  
  
  
   <div id="register_step_2"   class="main_div_profile disabledbutton">
   
 
  
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tbody>
    <tr>
      <td width="40" align="center"  >
      
     <div id="number_register_step_2" class="stepnumber <? if($_GET[file]=='document'){ echo 'stepnumber-active'; } ?>"><center>2</div> 
      
      </td>
      <td class="font_18" style="color:#FFFFFF"><b>เอกสารสำคัญ</td>
      <td width="25" class="font_18" style="color:#FFFFFF" id="check_icon_step_2"><i class="fa fa-ban" style="font-size:20px; height:20px; color: #FFFFFF"></i></td>
    </tr>
    
    
  </tbody>
</table>


 
  </div>
  
  
  
   <div id="register_step_3"  class="main_div_profile disabledbutton">
   
  
   
  
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tbody>
        <tr >
      <td width="40" align="center"  >
      
     <div id="number_register_step_3" class="stepnumber"><center>3</div> 
      
      </td>
      <td class="font_18" style="color:#FFFFFF"><b>ข้อมูลรถ</td>
      <td width="25" class="font_18" style="color:#FFFFFF" id="check_icon_step_3"><i class="fa fa-ban" style="font-size:20px; height:20px;color: #FFFFFF"></i></td>
      </tr>
    
    
  </tbody>
</table>

 
 
  </div>
  
  
</div>
 
 
 
 <div style="margin-top: 0px; padding:0px; overflow: hidden; width:100% ;    " id="messages">  <br>
 
 
 <div style="margin-top: 0px;">
 

 
<FORM name="myform_regiter" id="myform_regiter"   enctype="multipart/form-data" >





 <input class="form-control" type="hidden" name="check_step_1" id="check_step_1"  required="true" onkeypress="PasswordEnter(this,event)"   value="0" >
  <input class="form-control" type="hidden" name="check_step_2" id="check_step_2"  required="true" onkeypress="PasswordEnter(this,event)"   value="0" >
   <input class="form-control" type="hidden" name="check_step_3" id="check_step_3"  required="true" onkeypress="PasswordEnter(this,event)"   value="0" >
 
 


<div id="tabs"  style="margin-top: 80px; border:none; padding:0px; margin-left:0px;">

 

 
  <div id="new-tabs-1"  style="margin-top:0px; border:none">

  <?  include ("mod/register/profile.php");?>

  </div>
  
  
  <div id="new-tabs-3" style="padding-top:0px; border:none">
  
      <?  include ("mod/register/car.php");?>
 <?  // include ("mod/register/document.php");?>
  </div>
  
  
  <div id="new-tabs-2" style="padding-top:0px; border:none">
  <?  include ("mod/register/document.php");?>
  
 
     
</div>


  <div id="new-tabs-4" style="padding-top:10px; border:none">
  <?  /// include ("mod/register/document.php");?>
  
 
     
</div>


 

 <? // include ("".$MODPATHFILE.""); ?>
 
 </FORM>
 
 </div>
 
 
  </div>
 <style>



 </style>     <?  include ("bootstrap/css/css.php");?>  
 
 

<style type="text/css">
.mainpic_index {

   padding:10px;   
   
           -moz-border-radius:50%;
        -webkit-border-radius:50%;
        border-radius:50%;

   border:1px solid #FFFFFF; background-color:#FFFFFF; 
   box-shadow: 2px 1px 5px #333333; margin-right:5px; margin-bottom:5PX;max-width:400px;
    
}
.mainpic_dv {

   padding:10px;   
 

   border:1px solid #FFFFFF; background-color:#FFFFFF; 
   box-shadow: 2px 1px 5px #333333; margin-right:5px; margin-bottom:5PX;max-width:400px;
    
}

.mainpic {
   border:8px solid #FFFFFF; background-color:#FFFFFF; 
   box-shadow: 2px 1px 10px #333333; 
		
		 height:300px; width:300px;
       border-radius: 50%;
       background:url(../../admin/file/driver/pic/<?=$arr[web_driver_taxi][post_date];?>.jpg);
	       background-size: 450px ;
    background-repeat: no-repeat; background-position:center;
        }


 
-->
</style>  



  <script>
    $('html, body').animate({scrollTop:0},  'slow' );
	
	
	/*
	$( "#register_step_2" ).hide();
	$( "#register_step_3" ).hide();
*/
	
  
$( "#register_step_1" ).addClass("step-active-color");




 
$( "#new-tabs-2" ).hide();
$( "#new-tabs-3" ).hide();

//$( "#register_step_2" ).hide();

//$( "#register_step_3" ).hide();
 
   $("#register_step_1").click(function(){ 
   
    $( ".main_div_profile" ).removeClass("step-active-color");
 
   
 $( "#register_step_1" ).addClass("step-active-color");
 
 
 ///
 
   $( "#new-tabs-1" ).show();
 
 $( "#new-tabs-2" ).hide();
$( "#new-tabs-3" ).hide();

 

  $('html, body').animate({scrollTop:0},  'slow' );
//$(".messages").animate({ scrollTop: 99999 }, 3000);
 
 
 
     });
 
 </script>






<script>
 
 


//$( "#register_step_2" ).hide();

//$( "#register_step_3" ).hide();
 
   $("#register_step_2").click(function(){ 
   
 
   
   
 
   $( ".main_div_profile" ).removeClass("step-active-color"); 
   
 $( "#register_step_2" ).addClass("step-active-color");
 
 //
  $( "#new-tabs-2" ).show();
 
 $( "#new-tabs-1" ).hide();
$( "#new-tabs-3" ).hide();

  $('html, body').animate({scrollTop:0},  'slow' );

 
     });
 
 </script>

 




<script>
 
 


//$( "#register_step_2" ).hide();

//$( "#register_step_3" ).hide();
 
   $("#register_step_3").click(function(){ 
   
   $( "#new-tabs-3" ).show();
   
   
 
   $( ".main_div_profile" ).removeClass("step-active-color"); 
   
 $( "#register_step_3" ).addClass("step-active-color");
 
 //

 
 $( "#new-tabs-1" ).hide();
$( "#new-tabs-2" ).hide();

  $('html, body').animate({scrollTop:0},  'slow' );

 
     });
 
 </script>





 <?
 
 
 if($_GET[file]=='profile'){  ?>
 
   <script>
   
 
   $(document).ready(function(){
   
   
 $( "#register_step_1" ).addClass("step-active-color");
 
   });
 
 </script>
 
  <? } ?>
 
 
 
 
 <div style="display:none"> 
 <?    include ("mod/register/photo/upload_main.php");?>
  <?    include ("mod/register/photo/upload_main_select.php");?>
 </div>
 

 <?
 
 
 if($_GET[file]=='document'){  ?>
 
 
 <div style="display:none"><?  include ("mod/register/photo/upload_main.php");?>  </div>
 
   <script>
   
 
   $(document).ready(function(){
   
   
 $( "#register_step_2" ).addClass("step-active-color");
 
   });
 
 </script>
 
 <? } ?>
 
 
 
 
 
 
 
 
  <?
 
 
 if($_GET[file]=='car'){  ?>
 
   <script>
 
   $(document).ready(function(){
   
   
 $( "#register_step_3" ).addClass("step-active-color");
 
   });
 
 </script>
 
 <? } ?>
 
 
 
 
 
 
   

     <script src="js/camera/binaryajax.js"></script> 
                 <script src="js/camera/exif.js"></script>    <style type="text/css">
    a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
    </style>