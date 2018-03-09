<?php @header ('Content-type: text/html; charset=utf-8'); 
@session_start();
require_once("mainfileadmin.php");
$PHP_SELF = "index.php";
GETMODULE($_GET[name],$_GET[file]);
/// include "js/control.php" ;	
 $ok_button_color="#2AC1B5";
$no_button_color="#F50202";

include("css/maincss_admin.php");


?>  


    
<? //  include "load/loading/page_sub.php" ; ?>
 <?   include ("".$MODPATHFILE."");?>   
 

<style>
.modal {
  text-align: center;
  padding: 0!important;
}

.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px;
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}

.modal-backdrop {
   background-color: #ffffff;
}
</style>
  <style type="text/css">
 a:link {
  text-decoration: none!important; 
 
   
  
}
a:visited {
  text-decoration: none!important;
 
}
a:hover {
  text-decoration: none!important;
 
}
a:active {
  text-decoration: none!important;
    
}
div a {
	
	color:<?=$main_color_dark?>!important;
}
 
  </style>
  <style type="text/css">
 a:link {
  text-decoration: none!important;
}
a:visited {
  text-decoration: none!important;
}
a:hover {
  text-decoration: none!important;
}
a:active {
  text-decoration: none!important;
}






 .div-menu-topic-2{
	 padding:10px;   border-radius: 8px; border: 0px solid #ddd;background-color:<?=$main_color?>;     margin-bottom: 5px; box-shadow: 0px  0px 10px #DADADA  ; margin-top:-15px;
 	 
 }
 
  .div-menu-topic-2 a{ color:#FFF!important; font-size:30px!important; font-weight:normal;
 
 	 
 }
 





 
 </style>