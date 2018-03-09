<?php @header ('Content-type: text/html; charset=utf-8'); 
@session_start();
require_once("mainfileadmin.php");
 $PHP_SELF = "index.php";

 
GETMODULE($_GET[name],$_GET[file]);
 

 ///require_once("css/maincss.php")
?>   

<script src="js/jquery.min.js"></script>

<? //  include "load/loading/page_sub.php" ; ?>
 <?  include ("".$MODPATHFILE."");?>   
 