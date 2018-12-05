<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login V2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->	
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/ultimate/flaticon.css?v=<?=$v;?>" />
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/airport/flaticon.css?v=<?=$v;?>" />
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/payment/css/fontello.css?v=<?=$v;?>" />
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/icomoon/demo-files/demo.css?v=<?=$v;?>" />
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/app/css/app-icon.css?v=<?=$v;?>" />
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/app-new/css/app-icon.css?v=<?=$v;?>" />
    <link rel="stylesheet" href="<?=base_url();?>assets/extra.main.css?v=<?=$v;?>" />
    <link rel="stylesheet" href="<?=base_url();?>assets/custom.css?v=<?=$v;?>" />
    <link rel="stylesheet" href="<?=base_url();?>assets/login/css/main.css?v=<?=$v;?>" />
    <link rel="stylesheet" href="<?=base_url();?>assets/imageViewer/imageviewer.css?v=<?=$v;?>" />
    <!-- <link href="<?=base_url();?>assets/imageViewer/easy-autocomplete.min.css" rel="stylesheet" type="text/css"> -->
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->

   <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="<?=base_url();?>assets/onsenui/css/onsenui.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/onsenui/css/onsen-css-components.css?v=<?=time()?>">
    <script src="<?=base_url();?>assets/onsenui/js/onsenui.min.js?v=<?=time()?>"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="<?=base_url();?>assets/plugin/moment.js?v=<?=time()?>"></script>
    <script src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>
    <script src="<?=base_url();?>assets/EasyAutocomplete/jquery.easy-autocomplete.min.js" type="text/javascript" ></script>
    <link rel="stylesheet" href="<?=base_url();?>assets/plugin/jquery-ui.css?v=<?=time()?>"/>
    <script src="<?=base_url();?>assets/plugin/jquery-ui.js?v=<?=time()?>"></script>
    <script src="<?=base_url();?>assets/imageViewer/imageviewer.js?v=<?=time()?>"></script>
    <script type="text/javascript">
      var base_url = '<?=base_url();?>';
    </script>
    <!--===============================================================================================-->


    <style>
      .ons-ios-scroll-fix .page:not(.page--wrapper)[shown] > .page__content {
        overflow-y: auto !important;
      }
      .txt-important{
        color: #FF1313;
        font-weight: bold;
        position: absolute;
        margin-left: 25px;
      }
      .brand-small {
        background-image: url(../../images/sprite--brandsP.png);
        background-size: 28px auto;
        background-position: 0 0;
        background-repeat: no-repeat;
        height: 28px !important;
        width: 28px !important;
      }
      .txt-upload-profile{
        background-color: #f4f4f4;
        padding: 0px 10px;
        position: absolute;
        /* bottom: 22px; */
        /*    width: 160px;*/
        margin-left: -20px;
        margin-top: -23px;
        border-top-left-radius: 5px;
      }
      .txt-upload{
        /*	border: 1px solid #eee;*/
        background-color: #f4f4f4;
        padding: 0px 10px;
        position: absolute;
        /*    right: 57px;*/
        margin-left: 85px;
        margin-top: -24px;
        border-top-left-radius: 5px;
      }
      .img-preview-show{
        margin-top: 3px;
        max-height: 150px;
        width: 240px;
      }
      .box-preview-img{
        border: 1px solid #fff;
        border-radius: 3px;
        margin: 7px;
        display: nones;
        width: 240px;
        height: 150px;
        background-color: #dedede;
        box-shadow: 1px 1px 1px #d4d4d4;
      }
      .intro{
        text-align: center;
        margin: 10px;
        padding: 0px 15px;
      }
      .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
      }

      .btn-ip {
        border: 1px solid #0076ff;
        color: #3a94fe;
        background-color: white;
        padding: 8px 20px;
        border-radius: 8px;
        font-size: 16px;
        /*  font-weight: bold;*/
      }

      .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
      }

      .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 150px !important;
        height: 170 !important;
        /*        max-height: 450px;*/
      }

      .cropit-preview-image-container {
        cursor: move;
      }

      .image-size-label {
        margin-top: 10px;
      }

      input, .export {
        display: block;
      }

      button {
        margin-top: 10px;
      }
    </style>
    <style>
      .camera {
        width: 100%;
        /*    height: 100%;*/
        /*    height: 240px;*/
        background-color: #d3d3d3;
        vertical-align: middle;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
        /*    margin: 10px;*/
      }
      .focus {
        width: 100px;
        height: 100px;
        border: 12px solid #f5f5f5;
        border-radius: 100%;
      }
      .bottom-txt{
        position: absolute;
        /*	    bottom: 5px;*/
        margin-top: 30px;
        width: 100%;
        left: 0;
      }
      .link-txt{
        color: #0076ff !important;
        font-weight: 800;
      }
      @media screen and (max-width: 320px) {
        .img-logo{
          width: 100px !important;
          margin-top: -25px;
        }
        .pd-min{
          padding: 3px;
          border-radius: 25px;
        }
        /*.bottom-txt {
            bottom: 10px;
        }*/
      }
      .img-logo{
        width: 150px;
      }
      .pd-min{

        border-radius: 25px;
      }
      .btn-show-pass i{
        font-size: 20px;
      }
      .p-l-0{
        padding-left: 0px;
      }
      .pass{
        position: absolute;
        right: 10px;
        margin-top: 5px;
        color: #4CAF50;
      }
      .no-pass{
        position: absolute;
        right: 10px;
        margin-top: 5px;
        color: #ff0000;
      }

    </style>
  </head>
  <body>
    <?php
    if ($_COOKIE[app_remember_user]) {
      $hasval_us = "has-val";
    }
    else {
      $hasval_us = "";
    }

    if ($_COOKIE[app_remember_pass]) {
      $hasval_ps = "has-val";
    }
    else {
      $hasval_ps = "";
    }

    $rand = time().generateRandomString();

    function generateRandomString($length = 10) {
      $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0,$charactersLength - 1)];
      }
      return $randomString;
    }

//    	exit();
    ?>
  <ons-navigator swipeable id="myNavigator" page="page1.html"></ons-navigator>

  <template id="page1.html">
    <ons-page id="page1">
      <div class="limiter">
        <div class="container-login100" style="padding: 0; margin: 0px; min-height: 100%;">
          <div class="wrap-login100" style="border-radius: 0px;">

            <form id="form_login" method="post" enctype="multipart/form-data">

              <span class="login100-form-title p-b-30 p-t-20">

                <img src="<?=base_url();?>assets/images/logo2.png" class="img-logo" onclick="location.reload();" />
              </span>

              <div class="wrap-input100 validate-input" >
                <span class="" style="font-size: 15px; position: absolute; margin-top: -15px;  margin-left: 2px;" >ชื่อผู้ใช้งาน</span>
                <input class="input100 <?=$hasval_us;?>" type="text" name="real_username" id="real-username" autocomplete="new-password" required value="<?=$_COOKIE[app_remember_user];?>" placeholder="ชื่อผู้ใช้ / เบอร์โทร / อีเมล">
                <span class="focus-input100" data-placeholder=""></span>

              </div>

              <div class="wrap-input100 validate-input" data-validate="Enter password">
                <span class="btn-show-pass" onclick="seePassword();">
                  <i class="zmdi zmdi-eye"></i>
                </span>
                <span class="" style="font-size: 15px; position: absolute; margin-top: -15px;  margin-left: 2px;" >รหัสผ่าน</span>
                <input class="input100 <?=$hasval_ps;?>" type="password" name="real_password" id="real-password" autocomplete="new-password" required value="<?=$_COOKIE[app_remember_pass];?>">
                <span class="focus-input100" data-placeholder=""></span>
              </div>

              <div class="container-login100-form-btn" style="padding: 0px;">
                <div style="margin-bottom: 10px;width: 100%;">
                  <button type="submit" style="display: none;">submit</button>
                  <!--<ons-button modifier="large" class="button-margin button button--large pd-min" onclick="$('#form_login').submit();">เข้าสู่ระบบss</ons-button>-->
                  <ons-button modifier="large" class="button-margin button button--large pd-min" onclick="submitLogin('form_login');">เข้าสู่ระบบ</ons-button>
                </div>
                <div style="width: 100%;">
                  <ons-button modifier="large" onclick="fn.pushPage({'id': 'singup.html', 'title': 'สมัครสมาชิก'});" class="button-margin button button--large pd-min" style="background-color: #F7941D;">สมัครสมาชิก</ons-button>
                </div>
              </div>

              <div class="text-center bottom-txt" style="    text-align: center;">
                <span class="txt1" style="font-size: 16px;">
                  ลืมรหัสผ่านหรือไม่?
                </span>

                <a class="txt2 link-txt" style="font-size: 16px;" onclick="fn.pushPage({'id': 'recovery.html', 'title': 'กู้หรัสผ่าน'}, 'lift-ios')">
                  กู้รหัส
                </a>
                <!--<a class="txt2 link-txt" onclick="ons.notification.alert({message: 'ยังไม่เปิดให้บริการ',title:'ขออภัย',buttonLabel:'ปิด'});">
                    กู้รหัส
                </a>-->
              </div>
            </form>
          </div>
        </div>
      </div>
    </ons-page>
  </template>

  <template id="singup.html">
    <ons-page id="singup" style="overflow-x: hidden;">
      <ons-toolbar>
        <div class="left"><ons-back-button>กลับ</ons-back-button></div>
        <div class="center" id="page_singup">สมัครสมาชิก</div>
      </ons-toolbar>
      <div id="body_page_singup">
        <?php include("singup2.php");?>
      </div>
    </ons-page>
  </template>

  <template id="submit-alert-dialog.html">
    <ons-alert-dialog id="submit-my-alert-dialog" modifier="rowfooter">
      <div class="alert-dialog-title" id="submit-dialog-title">คุณแน่ใจหรือไม่</div>
      <div class="alert-dialog-content">
        ว่าต้องการยืนยันการสมัคร
      </div>
      <div class="alert-dialog-footer">
        <ons-alert-dialog-button onclick="hideAlertDialog()">ยกเลิก</ons-alert-dialog-button>
        <ons-alert-dialog-button onclick="submitSingUp()">สมัคร</ons-alert-dialog-button>
      </div>
    </ons-alert-dialog>
  </template>

  <template id="recovery-dialog.html">
    <ons-alert-dialog id="submit-recovery-dialog" modifier="rowfooter">
      <div class="alert-dialog-title" id="submit-dialog-title-rcv">คุณแน่ใจหรือไม่</div>
      <div class="alert-dialog-content" >
        <span id="txt_dialog_rcv_sms">ต้องการรับรหัสผ่านทาง SMS</span>
        <span id="txt_dialog_rcv_email">ต้องการรับรหัสผ่านทาง Email</span>
        <span id="txt_dialog_rcv_line">ต้องการรับรหัสผ่านทาง Line</span>
      </div>
      <div class="alert-dialog-footer">
        <ons-alert-dialog-button onclick="$('#submit-recovery-dialog').hide();">ยกเลิก</ons-alert-dialog-button>
        <ons-alert-dialog-button onclick="submitRecovery()">ยืนยัน</ons-alert-dialog-button>
      </div>
    </ons-alert-dialog>
  </template>

  <ons-modal direction="up">
    <div style="text-align: center">
      <p style="color: #fff;">
      <ons-icon icon="md-spinner" size="28px" spin></ons-icon> Loading...
      </p>
    </div>
  </ons-modal>

  <template id="recovery.html">
    <ons-page>
      <ons-toolbar>
        <div class="left">
          <ons-back-button>กลับ</ons-back-button>
        </div>
        <div class="center"></div>
      </ons-toolbar>
      <div>
        <? include("recovery.php"); ?>
      </div>
      <script>
        ons.getScriptPage().onInit = function () {
          this.querySelector('ons-toolbar div.center').textContent = this.data.title;
        }
      </script>
    </ons-page>
  </template>

  <template id="option.html">
    <ons-page>
      <ons-toolbar>
        <div class="left">
          <ons-back-button class="option-back">กลับ</ons-back-button>
        </div>
        <div class="center"></div>
      </ons-toolbar>
      <div id="body_option">

      </div>
      <script>
        ons.getScriptPage().onInit = function () {
          this.querySelector('ons-toolbar div.center').textContent = this.data.title;
        }
      </script>
    </ons-page>
  </template>

  <div id="dropDownSelect1"></div>

  <!--===============================================================================================-->
      <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script src="../plugin/cropit/dist/jquery.cropit.js"></script>
  
  <script src="vendor/animsition/js/animsition.min.js"></script>

  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
 
  <script src="vendor/select2/select2.min.js"></script>

  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>

  <script src="vendor/countdowntime/countdowntime.js"></script>
 
  <script src="js/main.js"></script>
  <link rel="stylesheet" type="text/css" href="../../pickerdate/classic.css?v=<?=time();?>" />
  <link rel="stylesheet" type="text/css" href="../../pickerdate/classic.date.css?v=<?=time();?>" />
  <script src="../../pickerdate/picker.js?v=<?=time();?>" type="text/javascript"></script>
  <script src="../../pickerdate/picker.date.js?v=<?=time();?>" type="text/javascript"></script>  -->

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  <script>
        function showModal() {
//		  hideAlertDialog();
          var modal = document.querySelector('ons-modal');
          modal.show();
          setTimeout(function () {
            ons.notification.alert('This dialog was created with ons.notification');

            modal.hide();
          }, 2000);
        }

        var createAlertDialog = function () {
          //  var imageData = $('.image-editor').cropit('export');
          // $('.hidden-image-data').val(imageData);
          if ($('input[name="name_th"]').val() == "") {

            ons.notification.alert({message: 'กรุณากรอกชื่อจริง', title: "ข้อมูลไม่ครบ", buttonLabel: "ปิด"})
                    .then(function () {
                      $('input[name="name_th"]').focus();
                    });

            return false;
          }
          if ($('input[name="phone"]').val() == "") {

            ons.notification.alert({message: 'กรุณากรอกเบอร์โทรศัพท์', title: "ข้อมูลไม่ครบ", buttonLabel: "ปิด"})
                    .then(function () {
                      $('input[name="phone"]').focus();
                    });
            return false;
          }
          if ($('#valid_type_phone').val() == 1) {

            ons.notification.alert({message: 'เบอร์โทรนี้ถูกใช้แล้ว ไม่สามารถใช้ซ้ำได้', title: "ข้อมูลซ้ำ", buttonLabel: "ปิด"})
                    .then(function () {
                      $('input[name="plate_num"]').focus();
                    });
            return false;
          }
          var dialog = document.getElementById('submit-my-alert-dialog');

          if (dialog) {
            dialog.show();
          } else {
            ons.createElement('submit-alert-dialog.html', {append: true})
                    .then(function (dialog) {
                      dialog.show();
                    });
          }
        };

        var hideAlertDialog = function () {
          document
                  .getElementById('submit-my-alert-dialog')
                  .hide();
        };

        /*var hideRecoveryDialog = function() {
         console.log("close recovery dialog")
         document
         .getElementById('submit-recovery-dialog')
         .hide();
         };*/

        var submitRecoveryPassword = function () {
//			$('#txt_dialog_rcv').html('+++++');
          console.log($('#check_type_rcp').val());
          if ($('#check_type_rcp').val() < 0) {
            ons.notification.alert({message: 'กรุณาเลือกช่องทางการรับรหัสผ่าน', title: "ข้อมูลไม่ครบ", buttonLabel: "ปิด"})
                    .then(function () {

                    });
            return;
          }

          var dialog_rcv = document.getElementById('submit-recovery-dialog');


          if (dialog_rcv) {
            dialog_rcv.show();
            if ($('#check_type_rcp').val() == 0) {
              $('#txt_dialog_rcv_sms').show();
              $('#txt_dialog_rcv_email').hide();
              $('#txt_dialog_rcv_line').hide();
            } else if ($('#check_type_rcp').val() == 1) {
              $('#txt_dialog_rcv_sms').hide();
              $('#txt_dialog_rcv_line').hide();
              $('#txt_dialog_rcv_email').show();
            } else if ($('#check_type_rcp').val() == 2) {
              $('#txt_dialog_rcv_sms').hide();
              $('#txt_dialog_rcv_email').hide();
              $('#txt_dialog_rcv_line').show();
            }
          } else {
            ons.createElement('recovery-dialog.html', {append: true})
                    .then(function (dialog_rcv) {
                      dialog_rcv.show();
                      if ($('#check_type_rcp').val() == 0) {
                        $('#txt_dialog_rcv_sms').show();
                        $('#txt_dialog_rcv_email').hide();
                      } else if ($('#check_type_rcp').val() == 1) {
                        $('#txt_dialog_rcv_sms').hide();
                        $('#txt_dialog_rcv_email').show();
                      } else if ($('#check_type_rcp').val() == 2) {
                        $('#txt_dialog_rcv_sms').hide();
                        $('#txt_dialog_rcv_email').hide();
                        $('#txt_dialog_rcv_line').show();
                      }
                    });
          }

        };
        function submitRecovery() {
//			$('ons-back-button').click();
//			console.log($('#username_for_rcv').val());
          $('#submit-recovery-dialog').hide();
          /*ons.notification.prompt({message: 'กรุณากรอกรหัสผ่าน',title:"รหัสผ่าน",buttonLabel:"ยืนยัน"})
           .then(function(txt) {
           console.log(txt);
           });
           */

//			return;
          modal.show();

          var check_type_rcv = $('#check_type_rcp').val();
          var key = $('#username_for_rcv').val();

          console.log(check_type_rcv);
          var pos = {key: key};
          console.log('----------------')
          console.log(pos)
          $.ajax({
            url: "login/user_data", // point to server-side PHP script 
            dataType: 'json', // what to expect back from the PHP script, if anything
            data: pos,
            type: 'post',
            success: function (php_script_response) {
              console.log(php_script_response);
              var message = "ชื่อผู้ใช้ : " + php_script_response.username + "\r\n" + "รหัสผ่าน : " + php_script_response.password;
              if (check_type_rcv == 0) {
                if (php_script_response.i_use_sms == php_script_response.i_limit_sms) {
                  ons.notification.alert({message: 'ไม่สามารถรับรหัสผ่านทาง SMS ได้ เนื่องจากคุณกู้รหัสผ่านทาง SMS เกิน 3 ครั้ง กรุณาติดต่อเจ้าหน้าที่ค่ะ', title: "ขอภัย", buttonLabel: "ปิด"})
                          .then(function () {
                            modal.hide();
                          });
                  return;
                }
                var us_phone = $('#us_phone').val();
                var param = {
                  username: "0954293062",
                  password: "758837",
                  msisdn: us_phone,
                  message: message,
                  title: "TShare",
                  sender: "TShare",
//							sender : "THAIBULKSMS",
                  ScheduledDelivery: "",
                  force: "standard"
                };
//						modal.hide();
                console.log(param);
//						return;
                $.ajax({
                  url: "../sms/send_sms.php", // point to server-side PHP script 
                  dataType: 'json', // what to expect back from the PHP script, if anything
                  data: param,
                  type: 'post',
                  success: function (response) {
                    console.log(response);
                    modal.hide();
                    ons.notification.alert({message: 'ส่ง SMS รหัสผ่านไปยังเบอร์ ' + us_phone + ' แล้ว', title: "สำเร็จ", buttonLabel: "ปิด"})
                            .then(function () {
                              var push_sms_url = "login/push_sms?sms=" + php_script_response.i_use_sms + "&dv=" + php_script_response.id;
                              $.post(push_sms_url, function (res) {
                                console.log(res);
                                $('#enter_pass_box').show();
                                $('#box-channel').hide();
                                $('#btn_get_pass_again').show();
                                $('#btn_get_pass').hide();
//									  		$('ons-back-button').click();
                              });

                            });
                  }
                });
              } else if (check_type_rcv == 1) {
                var us_email = $('#us_email').val();
                var param = {
                  email: us_email,
                  username: php_script_response.username,
                  pass: php_script_response.password,
//							message : message
                };
                console.log(param);
//						return;
                $.post("../sms/mail_recovery_pass.php", param, function (res) {
                  console.log(res);
                  modal.hide();
                  ons.notification.alert({message: 'ส่งรหัสผ่านไปยังที่อยู่ ' + us_email + ' แล้ว', title: "สำเร็จ", buttonLabel: "ปิด"})
                          .then(function () {
//									   		$('ons-back-button').click();
                            $('#enter_pass_box').show();
                            $('#box-channel').hide();
                            $('#btn_get_pass_again').show();
                            $('#btn_get_pass').hide();
                          });
                });
              }
            },
            error: function (err) {
              console.log(err);
              //your code here
            }
          });
//			console.log(username);
        }

        function getPhoneByUser(val) {
          if (val == "") {
            return;
          }
          var pos = {key: val};
          // console.log(pos);
          $.ajax({
            url: "login/recovery", // point to server-side PHP script 
            dataType: 'json', // what to expect back from the PHP script, if anything
            data: pos,
            type: 'post',
            success: function (response) {
              // console.log(response);
              // return false;
              if (response != false && response != null) {
                $('#box_not_found').hide();
                $('#corrent-user').show();
                $('#box_show_pf_rcv').show();
                $('#btn_get_pass').show();
                var src = '../data/pic/driver/small/' + response.data.username + '.jpg';
                $('#txt_name_rcv').text("คุณ " + response.data.name);
                $.ajax({
                  url: src,
                  type: 'HEAD',
                  error: function ()
                  {
                    console.log('Error file');
                    $('#box_show_pf_rcv img').attr('src', base_url + 'assets/images/noimage_2.gif');
                  },
                  success: function ()
                  {
                    //file exists
                    console.log('success file');
                    $('#box_show_pf_rcv img').attr('src', src);
                  }
                });
                $('#us_phone').val(response.data.phone);
                $('#txt_phone_show').text(response.data.phone);
                if (response.data.email == "") {
                  $('#box-email').hide();
                } else {
                  $('#box-email').show();
                }
                $('#us_email').val(response.data.email);
                $('#txt_email_show').text(response.data.email);
                
                if (response.data.line_id == "") {
                  $('#box-line').hide();
                } else {
                  $('#box-line').show();
                }
                $('#us_line').val(response.data.line_id);
                $('#txt_line_show').text(response.data.line_id);
                if (response.type == 1) {
                  $('#box-channel').show();
                } else if (response.type == 2) {
                  $('#box-channel').hide();
                  $('#check_type_rcp').val(0);
                  $('#txt_btn_rcv').text("รับรหัสผ่านทาง SMS");
                } else if (response.type == 3) {
                  $('#box-channel').hide();
                  $('#check_type_rcp').val(1);
                  $('#txt_btn_rcv').text("รับรหัสผ่านทาง Email");
                }

              } else {
                $('#corrent-user').hide();
                $('#box_show_pf_rcv').hide();
                $('#box-channel').hide();
                $('#btn_get_pass').hide();
                $('#box_not_found').show();
              }

            }
          });
        }

  </script>

  <script>
    var modal = document.querySelector('ons-modal');
    window.fn = {};

    window.fn.pushPage = function (page, anim) {

      console.log(page)
      if (page.id == "singup.html") {
        randerSingUp();
      } else if (page.id == "option.html") {
        console.log("option");
        if (page.open == "car_brand") {

          $.ajax({
            url: "../../mod/material/php_center.php?query=car_brand", // point to server-side PHP script 
            dataType: 'json', // what to expect back from the PHP script, if anything
            type: 'post',
            success: function (res) {
              var d1 = [], d2 = [];
              $.each(res, function (index, value) {
                if (value.popular > 0) {
                  d1.push(value);
                } else {
                  d2.push(value);
                }
              });
              var param = {data2: d2, data1: d1};
              console.log(param);
              $.post("car_brand.php", param, function (el) {
                $('#body_option').html(el);
              });
            }
          });

        } else if (page.open == "car_type") {

          $.ajax({
            url: "../../mod/material/php_center.php?query=car_type", // point to server-side PHP script 
            dataType: 'json', // what to expect back from the PHP script, if anything
            type: 'post',
            success: function (res) {
              var param = {data: res};
              console.log(param);
              $.post("car_type.php", param, function (el) {
                $('#body_option').html(el);
              });
            }
          });

        } else if (page.open == "car_color") {
          $.ajax({
            url: "../../mod/material/php_center.php?query=car_color", // point to server-side PHP script 
            dataType: 'json', // what to expect back from the PHP script, if anything
            type: 'post',
            success: function (res) {
              var param = {data: res};
              console.log(param);
              $.post("car_color.php?plate=0", param, function (el) {
                $('#body_option').html(el);
              });
            }
          });
        } else if (page.open == "plate_color") {
          $.ajax({
            url: "../../mod/material/php_center.php?query=car_plate", // point to server-side PHP script 
            dataType: 'json', // what to expect back from the PHP script, if anything
            type: 'post',
            success: function (res) {
              var param = {data: res};
              console.log(param);
              $.post("car_plate.php", param, function (el) {
                $('#body_option').html(el);
              });
            }
          });
        } else if (page.open == "car_province") {
          $.ajax({
            url: "login/data_province", // point to server-side PHP script 
            dataType: 'json', // what to expect back from the PHP script, if anything
            type: 'post',
            success: function (res) {
              var param = {data: res};
              console.log(param);
              $.post("login/province?type=car", param, function (el) {
                $('#body_option').html(el);
              });
            }
          });
        } else if (page.open == "user_province") {
          $.ajax({
            url: "login/data_province", // point to server-side PHP script 
            dataType: 'json', // what to expect back from the PHP script, if anything
            type: 'post',
            success: function (res) {
              var param = {data: res};
              console.log(param);
              $.post("login/province?type=user", param, function (el) {
                $('#body_option').html(el);
              });
            }
          });
        }
      } else if (page.id == "recovery.html") {

        setTimeout(function () {
//			document.getElementById("username_for_rcv").focus();
          $('#username_for_rcv').focus();
          console.log('focus');
          getPhoneByUser($('#username_for_rcv').val());

        }, 700);
      }
      if (anim) {
        document.getElementById('myNavigator').pushPage(page.id, {data: {title: page.title}, animation: anim});

      } else {
        document.getElementById('myNavigator').pushPage(page.id, {data: {title: page.title}});
      }
    };

    function submitLogin(form) {
      modal.show();
      if ($('#real-username').val() == "") {
        modal.hide();
        ons.notification.alert({message: 'กรุณากรอกชื่อผู้ใช้', title: "ไม่มีชื่อผู้ใช้", buttonLabel: "ปิด"});
        return false;
      }

      if ($('#real-password').val() == "") {

        modal.hide();
        ons.notification.alert({message: 'กรุณากรอกรหัสผ่าน', title: "ไม่มีรหัสผ่าน", buttonLabel: "ปิด"});
        return false;
      }

      console.log("login action");
      var data = $('#' + form).serialize();
      console.log(data);
      var url = "login/logins?checking=login";
      $.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        // cache: false,
        // contentType: false,
        // processData: false,
        data: data,
        type: 'post',
        success: function (res) {
          console.log(res);
          // return;
          if (res.status == true) {
//						 var url = "../../index.php?check_new_user";
            // var url = "T-share";
            // console.log(url);
            setCookie("detect_username", res.data.username, 200000);
            // setCookie("detect_username", res.data.username);
            setCookie("detect_user", res.data.id, 200000);
            setCookie("detect_userclass", res.data.user_class, 200000);
            setCookie("app_remember_user", res.data.username, 200000);
            setCookie("app_remember_pass", res.data.password, 200000);
            // setCookie("pass", res.data.id);
            if (res.data.class_user == "acc") {
              window.location.href = "";
            } else if (res.data.user_class == 'monitor') {
              window.location.href = '../T-admin'
            } else {
              window.location.replace('<?=base_url();?>');
            }

          } else {
            modal.hide();
            ons
                    .notification.alert({message: res.msg, title: "ไม่สามารถเข้าสู่ระบบได้", buttonLabel: "ปิด"});
            // modal.hide();
          }
        }
      });
    }

    $(document).ready(function () {

      $("#form_login").submit(function (event) {
//		alert(123);
        submitLogin('form_login');
        event.preventDefault();
      });

    });

    var ck_see_pass = false;

    function seePassword() {
      if (ck_see_pass == false) {
        $('#real-password').attr('type', 'text');
        $('.zmdi').removeClass('zmdi-eye');
        $('.zmdi').addClass('zmdi-eye-off');
        ck_see_pass = true;
      } else {
        $('#real-password').attr('type', 'password');
        $('.zmdi').addClass('zmdi-eye');
        $('.zmdi').removeClass('zmdi-eye-off');
        ck_see_pass = false;
      }
    }

    function checkIdCard(val) {
      if (val.length == 0) {
        $('#valid_type_idc').val(0);
      }
      if (val.length > 13) {
        $('#idcard').val(val.slice(0, -1));
        return;
      }
      $('.checking').hide();
      console.log(val.length)
      if (val.length >= 13) {
        var check_corrent = checkID(val);
//			console.log(check_corrent);
        if (check_corrent == true) {
          $.post("../../mod/material/php_center.php?checking=idcard_overlap", {txt: val}, function (res) {
            console.log(res);
            if (res.check == 1) {
//						alert(res)
              $('#incorrent-idc').show();
              $('#corrent-idc').hide();
              $('#valid_type_idc').val(2);
            } else {

              $('#corrent-idc').show();
              $('#incorrent-idc').hide();
              $('#valid_type_idc').val(0);
            }
          });
        } else {
          $('#incorrent-idc').show();
          $('#corrent-idc').hide();
          $('#valid_type_idc').val(1);
        }
      }
    }

    function checkID(id) {
      if (id.length != 13)
        return false;
      for (i = 0, sum = 0; i < 12; i++)
        sum += parseFloat(id.charAt(i)) * (13 - i);
      if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12)))
        return false;
      return true;
    }

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        console.log("Geolocation is not supported by this browser.");
      }
    }

    function showPosition(position) {
      var lat = position.coords.latitude;
      var lng = position.coords.longitude;
      console.log(lat + " " + lng);
      var url = 'https://maps.google.com/maps/api/geocode/json?latlng=' + position.coords.latitude + ',' + position.coords.longitude + '&sensor=false&language=' + lng + '&key=AIzaSyCx4SLk_yKsh0FUjd6BgmEo-9B0m6z_xxM';
      console.log(url);

      $.post(url, function (data) {
        console.log(data);
        if (data.status == "OVER_QUERY_LIMIT") {
          console.log('OVER_QUERY_LIMIT');
          $('#div_position').hide();
        } else {
          var province = data.results[data.results.length - 2].address_components[0].long_name;
          console.log(province);
          var url = "login/get_id_province_only";
          $.ajax({
            url: url, // point to server-side PHP script 
            dataType: 'json', // what to expect back from the PHP script, if anything
            // cache: false,
            // contentType: false,
            // processData: false,
            data: {txt_pv: province},
            type: 'post',
            success: function (res) {
              console.log(res);

              console.log('****************')
              console.log(res)
              if (typeof res == 'undefined') {
                $('#div_position').hide();
                return;
              }
              console.log(res);
              var province = res.id;
              var area = res.area;
              var code = res.code;

              $('#txt-province').text(res.name_th);
              $('#txt_user_province').text(res.name_th);
              $('#txt_user_province').css("color", "#000");
              $('#province').val(province);
              $('#code_privince').val(code);
            }
          });
        }
      });
    }

    function randerSingUp() {

      getLocation();
      /*$.post("../../mod/material/php_center.php?query=data_province",function(data){
       
       $.each(data, function( index, value ) {
       //				console.log(value);
       var option = '<option value="'+value.id+'">'+value.name_th+'</option>';
       $('#choose-province select').append(option);
       });
       
       });*/

      // $.post("../../mod/material/php_center.php?query=em_person", function (data) {

      //   $.each(data, function (index, value) {

      //     var option = '<option value="' + value.id + '">' + value.name_th + '</option>';
      //     $('select[name="em_person"]').append(option);
      //   });

      // });

    }

    function validEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      console.log(regex.test(email));
      if (regex.test(email) == true) {
        $('#incorrent-email').hide();
        $('#corrent-email').show();
      } else {
        $('#incorrent-email').show();
        $('#corrent-email').hide();
      }
    }

    function testUpload() {
      var imageData = $('.image-editor').cropit('export');
      console.log(imageData);
      $('.hidden-image-data').val(imageData);
      /*var data = new FormData($('#form_singin')[0]);
       data.append('fileUpload', $('#imgInp')[0].files[0]);
       var url = "../../mod/material/user/php_user.php?action=upload";
       $.ajax({
       url: url, // point to server-side PHP script 
       dataType: 'json', // what to expect back from the PHP script, if anything
       cache: false,
       contentType: false,
       processData: false,
       data: data,
       type: 'post',
       success: function(php_script_response) {
       console.log(php_script_response);
       
       },
       error: function(err){
       console.log(err);
       //your code here
       }
       });*/
      $.post("../../mod/material/user/php_user.php?action=upload", $('#form_singin').serialize(), function (res) {
        console.log(res);
      });

    }

    function submitSingUp() {

      hideAlertDialog();
      modal.show();

      var data = new FormData($('#form_singin')[0]);
//		 data.append('fileUpload', $('#img_profile')[0].files[0]);
      var url = "login/register";

      $.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: 'post',
        success: function (php_script_response) {
          console.log('in case register')
          console.log(php_script_response);
          if (php_script_response.add.result == true) {

            ons
                    .notification.alert({message: 'สมัครสมาชิกสำเร็จแล้ว', title: "สำเร็จ", buttonLabel: "กดเพื่อเข้าสู่ระบบ"})
                    .then(function () {
                      modal.show();
                      var data_login = {
                        real_username: php_script_response.update.username,
                        real_password: php_script_response.update.password
                      };
                      var url_login = "login/logins";

                      $.post('../../../sms/mail.php', {data: php_script_response.add.data}, function (data) {
                        console.log(data);

                        setTimeout(function () {
                          $.ajax({
                            url: url_login, // point to server-side PHP script 
                            dataType: 'json', // what to expect back from the PHP script, if anything
                            data: data_login,
                            type: 'post',
                            success: function (res) {
                              console.log('**** mail *******')
                              // console.log(res);
                              if (res.status == true) {
                                modal.show();
                                // var url = "../../../T-share/index.php?check_new_user=" + php_script_response.last_id;
//										 var url = "https://www.welovetaxi.com/app/T-share?check_new_user="+php_script_response.last_id;
                                setCookie("detect_username", res.data.username, 200000);
                                setCookie("detect_user", res.data.id, 200000);
                                setCookie("detect_userclass", res.data.user_class, 200000);
                                setCookie("app_remember_user", res.data.username, 200000);
                                setCookie("app_remember_pass", res.data.password, 200000);
                                window.location.replace('<?=base_url();?>');
                              }
                            }
                          });
                        }, 500);

                      });
                    });
            modal.hide();
          } else {
            console.log(php_script_response.add.result)
            ons.notification.alert({message: php_script_response.add.msg, title: "ผิดพลาด", buttonLabel: "ปิด"});
            modal.hide();
          }
        },
        error: function (err) {
          console.log(err);
          //your code here
        }
      });
    }

  </script>
  <script>
    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      var expires = "expires=" + d.toGMTString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }

    function checkCookie() {
      var user = getCookie("username");
      if (user != "") {
        alert("Welcome again " + user);
      } else {
        user = prompt("Please enter your name:", "");
        if (user != "" && user != null) {
          setCookie("username", user, 30);
        }
      }
    }

    function validPlate(value) {
      console.log(value)
      $.post("../../mod/material/php_center.php?checking=car_plate_overlap", {txt: value}, function (res) {
        console.log(res);
        if (res.check == 1) {
          $('#incorrent-plate').show();
          $('#corrent-plate').hide();
        } else {

          $('#corrent-plate').show();
          $('#incorrent-plate').hide();
        }
        $('#valid_type_plate').val(res.check); // 0=ไม่ซ้ำ , 1=ซ้ำ
      });

    }

    function validPhoneNum(value) {
      console.log(value)
      if (value.length >= 10) {
        $.ajax({
          url: "login/phone_overlap", // point to server-side PHP script 
          dataType: 'json', // what to expect back from the PHP script, if anything
          data: {txt: value},
          type: 'post',
          success: function (res) {

            // $.post("login/phone_overlap", , function (res) {
            console.log(res);
            if (res.check > 0) {
              $('#incorrent-phone').show();
              $('#corrent-phone').hide();
              $('#incorrent-phone span').text('เบอร์ซ้ำ');
            } else {

              $('#corrent-phone').show();
              $('#incorrent-phone').hide();

            }
            $('#valid_type_phone').val(res.check); // 0=ไม่ซ้ำ , 1=ซ้ำ
          }
        });

      } else {
        $('#corrent-phone').hide();
        $('#incorrent-phone').hide();
//			$('#incorrent-phone span').text('ไม่ถูกต้อง');
      }
    }

    function selectCarBrand(id, ps) {
      var name = $('#item_car_brand_' + id).data('name');
      console.log(name + " " + id);

      $('#car_brand').val(id);
      $('#car_brand_txt').val(name);
      $('#txt_car_brand').text(name);
      $('ons-back-button').click();
      $('#img_car_brand_show').show();
      $('#img_car_brand_show').css('background-position', ps);

    }

    function selectCarType(id) {
      var name = $('#item_car_type_' + id).data('name');
      console.log(name + " " + id);

      $('#car_type').val(id);
      $('#txt_car_type').text(name);
      $('ons-back-button').click();
    }

    function selectCarProvince(id) {
      var name = $('#item_car_province_' + id).data('name');
      console.log(name + " " + id);

      $('#car_province').val(id);
      $('#txt_car_province').text(name);
      $('ons-back-button').click();
    }

    function selectUserProvince(id, code) {
      var name = $('#item_user_province_' + id).data('name');
      console.log(name + " " + id + " || " + code);

      $('#province').val(id);
      $('#txt_user_province').text(name);
      $('#code_privince').val(code);
      // $('ons-back-button').click();
      myNavigator.popPage();
    }

    function selectCarColor(id, val) {
      console.log(id + " " + val);
      var img = $('#item_car_color_' + id).data('img');
      $('#img_car_color_show').attr('src', "../img/" + img);

      $('#car_color').val(id);
      $('#car_color_txt').val(val);
      $('#txt_car_color').text(val);
      $('#img_car_color_show').show();
      $('ons-back-button').click();
    }

    function selectPlateColor(id, val) {
      console.log(id + " " + val);
      var img = $('#item_car_plate_' + id).data('img');
      $('#img_plate_color_show').attr('src', "../img/plate/" + img);

      $('#plate_color').val(id);
      $('#i_plate_color').val(val);
      $('#txt_plate_color').text(val);
      $('#img_plate_color_show').show();
      $('ons-back-button').click();
    }

    function performClick(elemId) {
      console.log(elemId);
      var elem = document.getElementById(elemId);
      if (elem && document.createEvent) {
        var evt = document.createEvent("MouseEvents");
        evt.initEvent("click", true, false);
        elem.dispatchEvent(evt);
      }
    }
    function clearCookieAll() {
      var cookies = $.cookie();
      for (var cookie in cookies) {
        console.log(cookie);
        if (cookie != "app_remember_user" && cookie != "app_remember_pass") {
          $.removeCookie(cookie, {
            path: '/'
          });
        }
      }
    }
    $(window).on('load', function () {
      clearCookieAll();
    });
    window.fn.popPage = function () {
      var content = document.getElementById('myNavigator');
      console.log(content)
      // content.popPage();
    };

    /*document.querySelector('ons-back-button').onClick = function(event) {
     // Reset the whole stack instead of popping 1 page
     document.querySelector('ons-navigator').resetToPage('home.html');
     };*/

  </script>
</body>
</html>