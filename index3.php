<?php   
   //header("Location: https://www.welovetaxi.com/app/demo/"); /* Redirect browser */
   //exit();
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
   //   $_GET[lang]='th';
   require_once ("includes/lang/chat.php");
    // echo $_SESSION['data_user_id'];
   if($_SESSION['data_user_id'] == ''){
   ?> 
<script>
   window.location = "signin.php";
</script> 
<?
   }
   // include('../js/jquery.cookie.js');
   //echo $_COOKIE['lng'];
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="ui-mobile landscape min-width-320px min-width-480px min-width-768px min-width-1024px">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>ระบบจัดการงานคนขับรถ</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <meta name="format-detection" content="telephone=no">
      <meta name="theme-color" content="<?=$main_color?>" />
      <!--<style type="text/css">
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
         </style>-->
   </head>
   <body >
      <script src="voice/src/recorder.js"></script>
      <script src="voice/src/Fr.voice.js"></script>
      <script src="voice/js/jquery.js"></script>
      <script src="voice/js/app.js"></script>
      <script src="js/jquery-main.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
      <!-- <script src="js/jquery.cookie.js"></script> -->
      <?  include "load/loading/page_main.php" ; ?>
      <!-- <link rel="stylesheet" href="bootstrap/font_bank/css/thbanklogos.min.css" id="stylesheet">-->
      <div style="width:100%; top:0; bottom:0; position:absolute; background-color:#F6F6F6;" id="myelement">
         <!-- Content -->
         <table width="100%"  border="0" cellspacing="0" cellpadding="0">
            <tr>
               <td>
                  <? //include ("".$MODPATHFILE."");?>
                  <? include "js/control.php" ;	
                     ?> 
                  <script> 
                     window.scrollTo(0,1);
                  </script>
                  <?  include "load/page/index.php" ;
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
                     }
                     elseif(chkBrowser("Firefox")==1){
                     $chk="Firefox";
                     	// Firefox
                     }
                     elseif(chkBrowser("Chrome")==1){
                     $chk="Chrome";
                     }
                     elseif(chkBrowser("Chrome")==0 && chkBrowser("Safari")==1){
                     $chk="Safari";
                     	// Safari
                     }
                     elseif(chkBrowser("Opera")==1){
                     $chk="Opera";
                     	// Opera
                     }elseif(chkBrowser("Netscape")==1)
                     {
                     $chk="Netscape";
                     	// Netscape
                     }
                     else{
                     	// Other
                     }
                     ///echo $chk;
                     ?>
               </td>
            </tr>
         </table>
         <?  //include ("google/gps/check.php");?><br />
         <? //  include "load/popup/shopping_place.php" ;?>
         <?  include "load/page/bottoms.php" ;?>
         <?  include "load/popup.php" ;?>
         <?  include "load/popup_show.php" ;?>
         <?  //include "load/popup_gps.php" ;?>
         <?  include "load/popup_check_car.php" ;?>
         <?  include "load/popup_alert.php" ;?>
         <?  include "load/popup/action/all.php" ;?>
         <?  include "load/popup/action/1.php" ;?>
         <?  include "load/popup/action/2.php" ;?>
         <?  include "load/popup/action/map_popup.php" ;?>
         <?  include "load/popup/action/3.php" ;?>
         <?  include "load/popup/action/4.php" ;?>
         <?  include "load/popup/action/5.php" ;?>
         <?  include "load/popup/action/6.php" ;?>
         <?  include "load/popup/action/7.php" ;?>
         <?  include "load/popup/action/photo_popup.php" ;?>
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
      <style>
         @media screen and (max-width: 320px) {
         .font-18{
         font-size : 10px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-20{
         font-size : 12px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-22{
         font-size : 14px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-24{
         font-size : 16px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-26{
         font-size : 18px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-28{
         font-size : 20px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-30{
         font-size : 22px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-32{
         font-size : 24px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-34{
         font-size : 26px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-36{
         font-size : 28px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-38{
         font-size : 30px !important;
         font-family: 'Arial', sans-serif;
         }
         .text-resize{
         color : #fff;
         }
         }
      </style>
      <style>
         .css-full-popup {
         position: fixed;
         left: 0px;
         top: 0px; 
         bottom:0;
         width: 100%;
         height: 100%;
         z-index: 9999; 
         overflow-y:hidden ; padding:0px; background-color:#FFFFFF;
         }
         .back-full-popup
         { 
         font-size:22px;   padding:10px;  color:#FFFFF;  width:100%; background-color:<?=$maincolor?>;      
         border-top: 0px solid #000000; margin-bottom: 0px;  
         top:  0; position:fixed;
         z-index: 1; 
         }
      </style>
      <div  class="modal fade" id="popup_load_chat" role="dialog"   aria-labelledby="myModalLabel"  style="width:100%; "  >
         <? //  include ("load/page/back_popup.php");?>
         <center>
         <div class="modal-dialog" style="width:100%; padding:0px; margin-left:0px; "  >
            <!-- Modal  class="modal fade" content-->
            <div id="load_data_chat" style="width:100%px; padding:0px " >
            </div>
         </div>
      </div>
      <div style="width: 100%;height: 100%;position: fixed;top: 0px; display: none; background-color: #0000008f;z-index: 99999;opacity: 1;padding: 15px 10px;overflow-y: auto;" id="dialog_custom">
         <div class="w3-animate-bottom" style="background-color: #fff;margin-top: 10px;border-radius: 10px;box-shadow: 1px 1px 7px #3a3939;">
            <i class="fa fa-times" aria-hidden="true" style="position: absolute;
               color: #5a5858;
               right: 10px;
               font-size: 40px;
               z-index: 9000;
               margin-top : 5px;" id="close_dialog_custom" onclick="$('#dialog_custom').hide();"></i>
            <div id="body_dialog_custom_load" >
            </div>
         </div>
      </div>
      
      <div id="material_dialog" style="width: 100%;height: 100%;position:  fixed;z-index: 99999;background-color: #00000057;top: 0px;left: 0px;display: none;">
         <div class="modal-dialog w3-animate-bottom" style="background-color: #fff; top:20px;" >
            <div class="modal-content">
               <div class="modal-header" style="padding: 10px;">
                  <h4 class="modal-title" id="dialoglLabel">Add Department</h4>
               </div>
               <div class="modal-body" id="load_modal_body">
               </div>
               <div class="modal-footer" style="padding: 7px 5px;margin-top: 5px;">
                  <button type="button" class="btn btn-dialog font-22 text-cap" onclick="$('#material_dialog').hide();" id="cancel_dialog"><?=t_close;?></button>
                  <button type="button" class="btn btn-dialog font-22 text-cap" onclick="$('#material_dialog').hide();" id="ok_dialog" style="display: none;"><?=t_ok;?></button>
               </div>
            </div>
            <!-- modal-content -->
         </div>
      </div>
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
<?php 
   $lng_map = $google_map_api_lng;
   ?>
<script async defer
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&libraries=places&language=<?=$lng_map;?>&v=<?=time();?>"></script>
<?  include ("bootstrap/css/css.php");?> 
<!-- <script src="https://www.welovetaxi.com/app/booking2/files/js/jquery.cookie.js"></script> -->
<script src="dist/js/app.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script> -->
<script src="http://103.13.30.65:3000/socket.io/socket.io.js"></script>
<!-- <script src="socket.io/socket.io.js"></script> -->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script >
   //alert("<?=$final_tt;?>");
      function language(lng) {
       console.log(lng);
   //    $.cookie("lng", lng, { path: '/' });
   		setCookie("lng", lng, 1);
       window.location.reload();
      }
   //      console.log('asasasas')
</script>