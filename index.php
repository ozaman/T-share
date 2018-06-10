
<?php
//header("Location: https://www.welovetaxi.com/app/demo/"); /* Redirect browser */
//exit();
@ob_start();
@session_start();
header('Content-type: text/html; charset=utf-8');
require_once("mainfile.php");
$PHP_SELF = "popup.php";
GETMODULE($_GET[name], $_GET[file]);
require_once("css/maincss.php");
$db->connectdb(DB_NAME_DATA, DB_USERNAME, DB_PASSWORD);

if ($_SESSION['data_user_id'] == '') {
    ?> 
    <script>
        window.location = "signin.php";
    </script> 
    <?
}
?>
<script>
 var detect_mb = "<?=$detectname;?>";
 var class_user = "<?=$data_user_class;?>";
 var username = "<?=$_SESSION['data_user_name'];?>";
 console.log(detect_mb+" : "+class_user+" : "+username);
 if(detect_mb == "Android"){
 	 showMessage(class_user,username);
 }

 
 function showMessage(txt,username) {
 				if (typeof Android !== 'undefined') {
					Android.showToast(txt,username);
//					alert(13);
				}
                
        }  

</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="ui-mobile landscape min-width-320px min-width-480px min-width-768px min-width-1024px">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title>T-Share</title>
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
                <meta name="format-detection" content="telephone=no">
                    <meta name="theme-color" content="<?= $main_color ?>" />
                    <link rel="stylesheet" href="front_bank/css/thbanklogos.min.css" id="stylesheet">
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
                            <? include "load/loading/page_main.php"; ?>
                            <!-- <link rel="stylesheet" href="bootstrap/font_bank/css/thbanklogos.min.css" id="stylesheet">-->
                            <div style="width:100%; top:0; bottom:0; position:absolute; background-color:#F6F6F6;" id="myelement">
                                <!-- Content -->
                                <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td>
                                            <? //include ("".$MODPATHFILE."");?>
                                            <? include "js/control.php";
                                            ?> 
                                            <script>
        window.scrollTo(0, 1);
                                            </script>
                                            <? include "load/page/index.php"; ?> 
                                        </td>
                                    </tr>
                                </table>
                                <? include ("mod/livechat/config.php"); ?>
                                <? //include ("google/gps/check.php");?>
                                <? //  include "load/popup/shopping_place.php" ;?>
                                <? include "load/page/bottoms.php"; ?>
                                <? include "load/popup.php"; ?>
                                <? include "load/popup_show.php"; ?>
                                <? //include "load/popup_gps.php" ;?>
                                <? include "load/popup_check_car.php"; ?>
                                <? include "load/popup_alert.php"; ?>
                                <? include "load/popup/action/all.php"; ?>
                                <? include "load/popup/action/1.php"; ?>
                                <? include "load/popup/action/2.php"; ?>
                                <? include "load/popup/action/map_popup.php"; ?>
                                <? include "load/popup/action/3.php"; ?>
                                <? include "load/popup/action/4.php"; ?>
                                <? include "load/popup/action/5.php"; ?>
                                <? include "load/popup/action/6.php"; ?>
                                <? include "load/popup/action/7.php"; ?>
                                <? include "load/popup/action/photo_popup.php"; ?>
                                <? include "load/popup/action/clean_popup.php"; ?>
                                <!-- <div id="popup_extra" style="display: none;" >
                                 <div class="css-full-popup w3-animate-right" id="load_popup_extra" style="position:fixed;overflow-y: scroll;-webkit-overflow-scrolling: touch;z-index: 99999;"></div>
                                 </div>-->
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
                                               border-radius: 5px;padding:5px; font-size:20px; width:120px; background-color:<?= $ok_button_color ?>;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF
                                }
                                .btn-modal-ok:hover{
                                    background-color:#999999;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF
                                }
                                .btn-modal-no{ box-shadow: 1px 1px 5px #999999; border:0px solid #FFFFFF; 
                                               border-radius: 5px;padding:5px; font-size:20px;  width:120px; background-color:<?= $no_button_color ?>;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF
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
                                        /*color : #fff;*/
                                        color : #333333;
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
                            </style>
                            <style>
                                .btn-primary{
                                    background-color: <?= $main_color; ?> !important;
                                }
                                .btn-cus{
                                    padding: 8px 16px !important;
                                    font-size: 18px !important;
                                    line-height: 1.3333333 !important;
                                    border-radius: 6px !important;
                                    min-width: 100px;
                                }
                                .modal.fade .modal-dialog {
                                    opacity: 0;
                                    -webkit-transform: scale(0.1);
                                    -ms-transform: scale(0.1);
                                    -o-transform: scale(0.1);
                                    transform: scale(0.1);
                                    -webkit-transition: all 0.3s ease;
                                    -moz-transition: all 0.3s ease;
                                    -o-transition: all 0.3s ease;
                                    transition: all 0.3s ease;
                                }
                                .modal.fade.in .modal-dialog {
                                    opacity: 1;
                                    -webkit-transform: scale(1);
                                    -ms-transform: scale(1);
                                    -o-transform: scale(1);
                                    transform: scale(1);
                                    -webkit-transform: translate3d(0%, 0, 0);
                                    -ms-transform: translate3d(0%, 0, 0);
                                    -o-transform: translate3d(0%, 0, 0);
                                    transform: translate3d(0%, 0, 0);
                                }
                                /* DIALOG CONTENT */
                                .modal-content {
                                    border: none;
                                    border-radius: 2px;
                                    -webkit-box-shadow: 0 40px 77px rgba(0, 0, 0, 0.22), 0 27px 24px rgba(0, 0, 0, 0.2);
                                    -moz-box-shadow: 0 40px 77px rgba(0, 0, 0, 0.22), 0 27px 24px rgba(0, 0, 0, 0.2);
                                    box-shadow: 0 40px 77px rgba(0, 0, 0, 0.22), 0 27px 24px rgba(0, 0, 0, 0.2);
                                }
                                /* DIALOG HEADER */
                                .modal-header {
                                    min-height: 16px;
                                    padding: 24px;
                                    border-bottom: none;
                                }
                                .modal-title {
                                    font-weight: 500;
                                    font-size: 21px;
                                }
                                /* DIALOG BODY */
                                .modal-body {
                                    padding: 0 24px;
                                }
                                .modal-body p {
                                    font-weight: 400;
                                    font-size: 14px;
                                    color: #212121;
                                }
                                .modal-body .lead {
                                    font-weight: 300;
                                    font-size: 16px;
                                    color: #757575;
                                }
                                .modal-body p:last-child,
                                .modal-body .lead:last-child {
                                    margin-bottom: 0;
                                }
                                /* DIALOG FOOTER */
                                .modal-footer {
                                    margin-top: 24px;
                                    padding: 8px 0;
                                    border-top: none;
                                }
                                .modal-footer .btn {
                                    height: 36px;
                                    margin-right: 8px;
                                    padding: 8px 10px;
                                    border: none;
                                    border-radius: 0;
                                    text-transform: uppercase;
                                    font-weight: 500;
                                    color: #009688;
                                    background-color: #fff;
                                }
                                .modal-footer .btn:focus {
                                    outline: none;
                                    box-shadow: none;
                                }
                                .modal-footer .btn:focus,
                                .modal-footer .btn:hover {
                                    color: #00796B;
                                }
                                .modal-footer .btn + .btn {
                                    margin-left: 0;
                                }
                                .modal-footer .btn + .btn:last-child {
                                    margin-left: -4px;
                                }
                                /* ----- v CAN BE DELETED v ----- */
                                .demo {
                                    padding-top: 60px;
                                    padding-bottom: 110px;
                                }
                                .btn-demo {
                                    margin: 15px;
                                    padding: 10px 15px;
                                    border-radius: 0;
                                    font-size: 16px;
                                    background-color: #FFFFFF;
                                }
                                .btn-demo:focus {
                                    outline: none;
                                }
                                .demo-footer {
                                    position: fixed;
                                    bottom: 0;
                                    width: 100%;
                                    padding: 15px;
                                    background-color: #212121;
                                    text-align: center;
                                }
                                .demo-footer > a {
                                    text-decoration: none;
                                    font-weight: bold;
                                    font-size: 16px;
                                    color: #fff;
                                }
                                #load_modal_body{
                                    overflow : scroll;
                                    max-height: 500px;
                                }
                                @media screen and (max-height: 568px) {
                                    #load_modal_body{
                                        overflow : scroll;
                                        max-height: 400px;
                                    }
                                }
                            </style>
                            <style>
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
                            </style>

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
                            <div id="material_dialog" style="width: 100%;height: 100%;position:  fixed;z-index: 99999;background-color: rgba(0, 0, 0, 0.80);top: 0px;left: 0px;display: none;">
                                <div class="modal-dialog w3-animate-bottom" style="background-color: #fff; top:5px;" >
                                    <div class="modal-content">
                                        <div class="modal-header" style="padding: 10px;">
                                            <h4 class="modal-title font-26" id="dialoglLabel" >Add Department</h4>
                                        </div>
                                        <div class="modal-body" id="load_modal_body" style="-webkit-overflow-scrolling: touch;">
                                        </div>
                                        <div class="modal-footer" style="padding: 7px 5px;margin-top: 5px;">
                                            <button type="button" class="btn btn-dialog font-22 text-cap" onclick="$('#material_dialog').hide();" id="cancel_dialog"><?= t_close; ?></button>
                                            <button type="button" class="btn btn-dialog font-22 text-cap" onclick="$('#material_dialog').hide();" id="ok_dialog" style="display: none;"><?= t_ok; ?></button>
                                        </div>
                                    </div>
                                    <!-- modal-content -->
                                </div>
                            </div>
                            <div id="material_alert" style="width: 100%;height: 100%;position:  fixed;z-index: 99999;background-color: rgba(0, 0, 0, 0.80);top: 0px;left: 0px;display: none;">
                                <div class="modal-dialog" style="background-color: #fff; top:20px;animation: showSweetAlert 0.4s;" >
                                    <div class="modal-content">
                                        <div class="modal-body" id="load_modal_body" style="-webkit-overflow-scrolling: touch;">
                                        </div>
                                        <div class="modal-footer" style="padding: 7px 5px;margin-top: 5px;">
                                            <button type="button" class="btn btn-dialog font-22 text-cap" onclick="$('#material_alert').hide();" id="cancel_alert"><?= t_close; ?></button>
                                            <button type="button" class="btn btn-dialog font-22 text-cap" onclick="$('#material_alert').hide();" id="ok_alert"><?= t_ok; ?></button>
                                        </div>
                                    </div>
                                    <!-- modal-content -->
                                </div>
                            </div>
                        </body>
                        </html>
                        <script src="js/camera/binaryajax.js"></script> 
                        <script src="js/camera/exif.js"></script>
                        <?php
                        $lng_map = $google_map_api_lng;
                        ?>
                        <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&libraries=places&language=<?= $lng_map; ?>&v=<?= time(); ?>"></script>
                        <? include ("bootstrap/css/css.php"); ?> 
                        <script src="dist/js/app.js"></script>
                        <script >
                                                //alert("<?= $final_tt; ?>");
                                                function language(lng) {
                                                    console.log(lng);
                                                    //    $.cookie("lng", lng, { path: '/' });
                                                    setCookie("lng", lng, 1);
                                                    window.location.reload();
                                                }
                                                //      console.log('asasasas')
                                                function GohomePage() {
                                                    hidepopup();
                                                    console.log('GohomePage Run');
                                                    $('#load_mod_data').html(load_main_mod);
                                                    $('#load_mod_data').html(load_main_mod);
                                                    //   $('#navload_topic').html('ไปที่หน้า๿ร฿');
                                                    //    $('#load_mod_data').load('go.php');
                                                    window.location = "index.php";
                                                }
                                                function addCommas(nStr)
                                                {
                                                    nStr += '';
                                                    x = nStr.split('.');
                                                    x1 = x[0];
                                                    x2 = x.length > 1 ? '.' + x[1] : '';
                                                    var rgx = /(\d+)(\d{3})/;
                                                    while (rgx.test(x1)) {
                                                        x1 = x1.replace(rgx, '$1' + ',' + '$2');
                                                    }
                                                    return x1 + x2;
                                                }
                                                var check_new_user = '<?=$_GET[check_new_user];?>';
//                                                alert(check_new_user);
                                                if(check_new_user!=""){
													$( "#main_load_mod_popup" ).toggle();
										          	var url_load = "load_page_mod.php?name=user&file=index&check_new_user="+check_new_user;
										         	$('#load_mod_popup').html(load_main_mod);
										          	$('#load_mod_popup').load(url_load); 
										          	
												}
                                                
                        </script>
                        <style>
                            #loader {
                                bottom: 0;
                                height: 175px;
                                left: 0;
                                margin: auto;
                                position: absolute;
                                right: 0;
                                top: 0;
                                width: 175px;
                            }
                            #loader {
                                bottom: 0;
                                height: 175px;
                                left: 0;
                                margin: auto;
                                position: absolute;
                                right: 0;
                                top: 0;
                                width: 175px;
                            }
                            #loader .dot {
                                bottom: 0;
                                height: 100%;
                                left: 0;
                                margin: auto;
                                position: absolute;
                                right: 0;
                                top: 0;
                                width: 87.5px;
                            }
                            #loader .dot::before {
                                border-radius: 100%;
                                content: "";
                                height: 87.5px;
                                left: 0;
                                position: absolute;
                                right: 0;
                                top: 0;
                                transform: scale(0);
                                width: 87.5px;
                            }
                            #loader .dot:nth-child(7n+1) {
                                transform: rotate(45deg);
                            }
                            #loader .dot:nth-child(7n+1)::before {
                                animation: 0.8s linear 0.1s normal none infinite running load;
                                background: #00ff80 none repeat scroll 0 0;
                            }
                            #loader .dot:nth-child(7n+2) {
                                transform: rotate(90deg);
                            }
                            #loader .dot:nth-child(7n+2)::before {
                                animation: 0.8s linear 0.2s normal none infinite running load;
                                background: #00ffea none repeat scroll 0 0;
                            }
                            #loader .dot:nth-child(7n+3) {
                                transform: rotate(135deg);
                            }
                            #loader .dot:nth-child(7n+3)::before {
                                animation: 0.8s linear 0.3s normal none infinite running load;
                                background: #00aaff none repeat scroll 0 0;
                            }
                            #loader .dot:nth-child(7n+4) {
                                transform: rotate(180deg);
                            }
                            #loader .dot:nth-child(7n+4)::before {
                                animation: 0.8s linear 0.4s normal none infinite running load;
                                background: #0040ff none repeat scroll 0 0;
                            }
                            #loader .dot:nth-child(7n+5) {
                                transform: rotate(225deg);
                            }
                            #loader .dot:nth-child(7n+5)::before {
                                animation: 0.8s linear 0.5s normal none infinite running load;
                                background: #2a00ff none repeat scroll 0 0;
                            }
                            #loader .dot:nth-child(7n+6) {
                                transform: rotate(270deg);
                            }
                            #loader .dot:nth-child(7n+6)::before {
                                animation: 0.8s linear 0.6s normal none infinite running load;
                                background: #9500ff none repeat scroll 0 0;
                            }
                            #loader .dot:nth-child(7n+7) {
                                transform: rotate(315deg);
                            }
                            #loader .dot:nth-child(7n+7)::before {
                                animation: 0.8s linear 0.7s normal none infinite running load;
                                background: magenta none repeat scroll 0 0;
                            }
                            #loader .dot:nth-child(7n+8) {
                                transform: rotate(360deg);
                            }
                            #loader .dot:nth-child(7n+8)::before {
                                animation: 0.8s linear 0.8s normal none infinite running load;
                                background: #ff0095 none repeat scroll 0 0;
                            }
                            #loader .lading {
                                background-image: url("../images/loading.gif");
                                background-position: 50% 50%;
                                background-repeat: no-repeat;
                                bottom: -40px;
                                height: 20px;
                                left: 0;
                                position: absolute;
                                right: 0;
                                width: 180px;
                            }
                            @keyframes load {
                                100% {
                                    opacity: 0;
                                    transform: scale(1);
                                }
                            }
                            @keyframes load {
                                100% {
                                    opacity: 0;
                                    transform: scale(1);
                                }
                            }
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
                                border-bottom: dashed 1px #3b5998 !important;
                                font-size: 22px !important;
                                padding: 10px !important;
                                color: #333333 !important;
                                width: 100% !important;
                                border-top: 0px solid #000000 !important;
                                margin-bottom: 0px!important;
                                top: 0 !important;
                                position: fixed !important;
                                background: #e8e8e8 !important;
                            }
                            .close-small-popup{
                                font-size:22px;
                                color:#333 !important;
                            }
                            .text_small_popup{
                                color:#333 !important;
                            }
                            /*pop up*/
                            .main_load_mod_popup{
                                color: #333;
                            }
                            .main_load_mod_popup_1{
                                color: #333;
                            }
                            .main_load_mod_popup_2{
                                color: #333;
                            }
                            .main_load_mod_popup_3{
                                color: #333;
                            }
                            .main_load_mod_popup_4{
                                color: #333;
                            }
                            .main_load_mod_popup_5{
                                color: #333;
                            }
                            .button-close-popup-mod-1{
                                color: #333333;
                            }
                            .button-close-popup-mod-2{
                                color: #333333;
                            }
                            .button-close-popup-mod-3{
                                color: #333333;
                            }
                            .button-close-popup-mod-4{
                                color: #333333;
                            }
                            .button-close-popup-mod-5{
                                color: #333333;
                            }
                            .fa-home{
                                font-size:30px;
                            }
                            .button-close-popup-mod{
                                color: #333333;
                            }
                            .text_mod_topic_action_1{
                                font-size:22px;
                                color: #333333;
                            }
                            .text_mod_topic_action_2{
                                font-size:22px;
                                color: #333333;
                            }
                            .text_mod_topic_action_3{
                                font-size:22px;
                                color: #333333;
                            }
                            .text_mod_topic_action_4{
                                font-size:22px;
                                color: #333333;
                            }
                            .text_mod_topic_action_5{
                                font-size:22px;
                                color: #333333;
                            }
                            .text_mod_topic_action_6{
                                font-size:22px;
                                color: #333333;
                            }
                            /*****END*****/
                        </style>
                        <div class="container">
                            <div class="row">
                                <div id="loader">
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                    <div class="lading"></div>
                                </div>
                            </div>
                        </div>