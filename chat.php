<?php header ('Content-type: text/html; charset=utf-8'); 
@session_start();
@ob_start();
require_once("mainfile.php");
$PHP_SELF = "popup.php";
GETMODULE($_GET[name],$_GET[file]);
 require_once("css/maincss.php");
if($_SESSION['data_user_id'] == ''){
?>
<script>
 window.location = "signin.php";
</script> 
<?
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="ui-mobile landscape min-width-320px min-width-480px min-width-768px min-width-1024px">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ระบบจัดการงานคนขับรถ</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
 
 
<style type="text/css">
<!--
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
} body {

}
-->
</style></head>
<body >
 
<script src="js/jquery-main.js"></script> 

<div style="width:100%; top:0; bottom:0; position:absolute; background-color:#F6F6F6;  overflow:hidden ; position:fixed;">

<!-- Content -->
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><? //include ("".$MODPATHFILE."");?>
	<? include "js/control.php" ;	
	
	
	?>  
 	<?  include "load/page/chat.php" ;
	
				?> 
				
				<? //  include ("google/check/popup.php");?>  
		 <?php
function chkBrowser($nameBroser){
	return preg_match("/".$nameBroser."/",$_SERVER['HTTP_USER_AGENT']);
}
?>
<?php
if(chkBrowser("MSIE")==1){
 
	$chk="IE";
	
	if(chkBrowser("MSIE 8")==1){
	echo "MSIE 8";
		// IE 8
	}elseif(chkBrowser("MSIE 7")==1){
	echo "MSIE 7";
		// IE 7	
	}elseif(chkBrowser("MSIE 6")==1){
	echo "MSIE 6";
		// IE 6	
	}else{
		// IE อื่นๆ 
	}	
}elseif(chkBrowser("Firefox")==1){
$chk="Firefox";
	// Firefox
}elseif(chkBrowser("Chrome")==1){
$chk="Chrome";


}elseif(chkBrowser("Chrome")==0 && chkBrowser("Safari")==1){

$chk="Safari";
	// Safari
}elseif(chkBrowser("Opera")==1){

$chk="Opera";
	// Opera
}elseif(chkBrowser("Netscape")==1){
$chk="Netscape";
	// Netscape
}else{
	// Other
}

///echo $chk;
?>
 
				</td>
  </tr>
</table> <br />
 

 
</div>
<!-- End Content -->
 
</body>
</html>

