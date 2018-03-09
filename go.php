<?php @header ('Content-type: text/html; charset=utf-8'); 
@session_start();
require_once("mainfile.php");
 $PHP_SELF = "index.php";

 
GETMODULE($_GET[name],$_GET[file]);
/// include "js/control.php" ;	
 $ok_button_color="#2AC1B5";
$no_button_color="#F50202";

 ///require_once("css/maincss.php")
?>   



<? //  include "load/loading/page_sub.php" ; ?>
 <?  include ("".$MODPATHFILE."");?>   
 
 
 
  