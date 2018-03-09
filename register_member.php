<?php   
@ob_start();
@session_start();
header ('Content-type: text/html; charset=utf-8'); 
 
require_once("mainfile.php");

$PHP_SELF = "popup.php";
GETMODULE($_GET[name],$_GET[file]);
 require_once("css/maincss.php");
 
 
 
 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
		 //$db->del(TB_transfer_report_all,"transfer_date<'2016-09-01' and transfer_date>'2016-10-31'  "); 
	///	$db->del('acc_2017_06',"transfer_date NOT LIKE '%2017-06%'  "); 
		
 ///$db->del('transfer_report_all',"transfer_date NOT LIKE '%2017-06%' and ondate NOT LIKE '%2017-06%'   "); 
 
 
 
$_GET[lang]='th';
require_once ("includes/lang/chat.php");
 
 
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
}
body {
	background-color: #f6f6f6;
}
-->
</style></head>
<body >
 
   		<script src="voice/src/recorder.js"></script>
		<script src="voice/src/Fr.voice.js"></script>
    <script src="voice/js/jquery.js"></script>
		<script src="voice/js/app.js"></script>
<script src="js/jquery-main.js"></script> 
<? //  include "load/loading/page_main.php" ; ?>
 
<div style="width:100%; top:0; bottom:0; position:absolute; background-color:#F6F6F6;" id="myelement">

<!-- Content -->
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><? //include ("".$MODPATHFILE."");?>
	<? include "js/control.php" ;	
	
	
	?> 
 
<script> 

 window.scrollTo(0,1);
</script>
	 	
 
	
		
			
 <? include ("".$MODPATHFILE.""); ?>
			
 
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
</table>   



</div>
<!-- End Content -->

 


<style>
.btnstatus{ box-shadow: 1px 1px 5px #999999; border:0px solid #FFFFFF; 
border-radius: 5px;padding:5px; height:40px; font-size:14px; width:100px; margin-right:15px; background-color:#367FA9;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF;

}
.btnstatus:hover{

background-color:#999999;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF; border:0px solid #FFFFFF; 
}

.btnstatus-active{ box-shadow: 1px 1px 5px #999999; border:0px solid #FFFFFF; 
border-radius: 5px;padding:5px; height:40px; font-size:14px; width:100px; margin-right:15px; background-color:#367FA9;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF;

}


.btn-modal-ok{ box-shadow: 1px 1px 5px #999999; border:0px solid #FFFFFF; 
border-radius: 5px;padding:5px; font-size:20px; width:120px; background-color:<?=$ok_button_color?>;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF

}
.btn-modal-ok:hover{

background-color:#999999;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF
}

.btn-modal-no{ box-shadow: 1px 1px 5px #999999; border:0px solid #FFFFFF; 
border-radius: 5px;padding:5px; font-size:20px;  width:120px; background-color:<?=$no_button_color?>;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF
}

.btn-modal-no:hover{
background-color:#999999;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF
}
 
</style> 

<style>
.modal-title{


}
  .modal-backdrop {
   display: none;  
}

.modal.fade:not(.in) .modal-dialog {
box-shadow:none;  top:0;
    background-color:#FFFFFF
    -webkit-transform: translate3d(-50%, 0, 0);
    transform: translate3d(-50%, 0, 0);  
 
}
 
 
 
.modal {
box-shadow:none;
    background-color:#FFFFFF; z-index:99999;   
 
 
}
.modal {
box-shadow:none; top:0;
    background-color:#FFFFFF; z-index:99999;   
	
	
 
}

.modal-dialog { top:30px;
 

}
.modal-content {
 box-shadow:none;  border:none;     

}
body.modal-open { 
  padding-right: 0 !important; 
 
}
body.modal-open {
    overflow: visible;
    position: absolute;
    width: 100%;
    height:100%; background-color:#000000;
}

 


 </style>

<div  class="modal fade" id="popup_load_chat" role="dialog"   aria-labelledby="myModalLabel"  style="width:100%; "  >
 <? //  include ("load/page/back_popup.php");?><center>
 <div class="modal-dialog" style="width:100%; padding:0px; margin-left:0px; "  >  

            <!-- Modal  class="modal fade" content-->
          <div id="load_data_chat" style="width:100%px; padding:0px " >
				
				
				</div>
				
				 </div>   </div>
 
</body>
</html>


 

    <script src="js/camera/binaryajax.js"></script> 
                 <script src="js/camera/exif.js"></script>
				 
				 

				 

				  <script>
var elem = document.getElementById("load_data_chat");
if (elem.requestFullscreen) {
  elem.requestFullscreen();
}
 
				  addEventListener("clicks", function() {
    var el = document.documentElement,
      rfs = el.requestFullscreen
        || el.webkitRequestFullScreen
        || el.mozRequestFullScreen
        || el.msRequestFullscreen 
    ;

    rfs.call(el);
});
   </script>
 

 
 
	
   <?  //  include ("mod/load/show/popup/preview_map.php");?>
   
   
    <style>
	.main-page-loader-index {
	position: fixed;  
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 999999999;  
	 background-color:#333333;
	
	
}
</style>
<div class="main-page-loader-index" id="load+page_index" style="display:none">
   
   
   <div id="floatingCirclesG">
	<div class="f_circleG" id="frotateG_01"></div>
	<div class="f_circleG" id="frotateG_02"></div>
	<div class="f_circleG" id="frotateG_03"></div>
	<div class="f_circleG" id="frotateG_04"></div>
	<div class="f_circleG" id="frotateG_05"></div>
	<div class="f_circleG" id="frotateG_06"></div>
	<div class="f_circleG" id="frotateG_07"></div>
	<div class="f_circleG" id="frotateG_08"></div>
</div>
</div>

<style>
#floatingCirclesG{
	position:relative; top:40%;
	width:125px;
	height:125px;
	margin:auto;
	transform:scale(0.8);
		-o-transform:scale(0.8);
		-ms-transform:scale(0.8);
		-webkit-transform:scale(0.8);
		-moz-transform:scale(0.8);
}

.f_circleG{
	position:absolute;
	background-color:rgb(255,255,255);
	height:22px;
	width:22px;
	border-radius:12px;
		-o-border-radius:12px;
		-ms-border-radius:12px;
		-webkit-border-radius:12px;
		-moz-border-radius:12px;
	animation-name:f_fadeG;
		-o-animation-name:f_fadeG;
		-ms-animation-name:f_fadeG;
		-webkit-animation-name:f_fadeG;
		-moz-animation-name:f_fadeG;
	animation-duration:1.2s;
		-o-animation-duration:1.2s;
		-ms-animation-duration:1.2s;
		-webkit-animation-duration:1.2s;
		-moz-animation-duration:1.2s;
	animation-iteration-count:infinite;
		-o-animation-iteration-count:infinite;
		-ms-animation-iteration-count:infinite;
		-webkit-animation-iteration-count:infinite;
		-moz-animation-iteration-count:infinite;
	animation-direction:normal;
		-o-animation-direction:normal;
		-ms-animation-direction:normal;
		-webkit-animation-direction:normal;
		-moz-animation-direction:normal;
}

#frotateG_01{
	left:0;
	top:51px;
	animation-delay:0.45s;
		-o-animation-delay:0.45s;
		-ms-animation-delay:0.45s;
		-webkit-animation-delay:0.45s;
		-moz-animation-delay:0.45s;
}

#frotateG_02{
	left:15px;
	top:15px;
	animation-delay:0.6s;
		-o-animation-delay:0.6s;
		-ms-animation-delay:0.6s;
		-webkit-animation-delay:0.6s;
		-moz-animation-delay:0.6s;
}

#frotateG_03{
	left:51px;
	top:0;
	animation-delay:0.75s;
		-o-animation-delay:0.75s;
		-ms-animation-delay:0.75s;
		-webkit-animation-delay:0.75s;
		-moz-animation-delay:0.75s;
}

#frotateG_04{
	right:15px;
	top:15px;
	animation-delay:0.9s;
		-o-animation-delay:0.9s;
		-ms-animation-delay:0.9s;
		-webkit-animation-delay:0.9s;
		-moz-animation-delay:0.9s;
}

#frotateG_05{
	right:0;
	top:51px;
	animation-delay:1.05s;
		-o-animation-delay:1.05s;
		-ms-animation-delay:1.05s;
		-webkit-animation-delay:1.05s;
		-moz-animation-delay:1.05s;
}

#frotateG_06{
	right:15px;
	bottom:15px;
	animation-delay:1.2s;
		-o-animation-delay:1.2s;
		-ms-animation-delay:1.2s;
		-webkit-animation-delay:1.2s;
		-moz-animation-delay:1.2s;
}

#frotateG_07{
	left:51px;
	bottom:0;
	animation-delay:1.35s;
		-o-animation-delay:1.35s;
		-ms-animation-delay:1.35s;
		-webkit-animation-delay:1.35s;
		-moz-animation-delay:1.35s;
}

#frotateG_08{
	left:15px;
	bottom:15px;
	animation-delay:1.5s;
		-o-animation-delay:1.5s;
		-ms-animation-delay:1.5s;
		-webkit-animation-delay:1.5s;
		-moz-animation-delay:1.5s;
}


@keyframes f_fadeG{
	0%{
		background-color: #FF9900;
	}

	100%{
		background-color:rgb(255,255,255);
	}
}

@-o-keyframes f_fadeG{
	0%{
		background-color:rgb(47,148,173);
	}

	100%{
		background-color:rgb(255,255,255);
	}
}

@-ms-keyframes f_fadeG{
	0%{
		background-color:rgb(47,148,173);
	}

	100%{
		background-color:rgb(255,255,255);
	}
}

@-webkit-keyframes f_fadeG{
	0%{
		background-color:rgb(47,148,173);
	}

	100%{
		background-color:rgb(255,255,255);
	}
}

@-moz-keyframes f_fadeG{
	0%{
		background-color:rgb(47,148,173);
	}

	100%{
		background-color:rgb(255,255,255);
	}
}
 
 
 
 
 #firstDropdown .dropdown-backdrop {
    display:none;
}
 
 
 
 body  { font-size:36px
	 
	 
	 
 }
 
 
 
 
 </style>
 
 <? ///  include "mod/livechat/auto_create_user.php" ;?>
 
 
 
 <style type="text/css">
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


</style>      <?  include ("bootstrap/css/css.php");?>     <script src="js/camera/binaryajax.js"></script> 
                 <script src="js/camera/exif.js"></script>