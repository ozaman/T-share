<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="assets/onsenui/css/onsenui.css">
<link rel="stylesheet" href="assets/onsenui/css/onsen-css-components.min.css">
<script src="assets/onsenui/js/onsenui.min.js"></script>
<style>
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
/*        width: 250px;*/
        width: 250px;
        height: 350px;
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
	    bottom: 20px;
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
		.bottom-txt {
		    bottom: 10px;
		}
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
/*    	margin-top: 5px;*/
    	color: #4CAF50;
	 }
	 .no-pass{
	 	position: absolute;
    	right: 10px;
/*    	margin-top: 5px;*/
    	color: #ff0000;
	 }
</style>
</head>
<body>
	<?php 
		if($_COOKIE[app_remember_user]){
			$hasval_us = "has-val";
		}else{
			$hasval_us = "";
		}
		
		if($_COOKIE[app_remember_pass]){
			$hasval_ps = "has-val";
		}else{
			$hasval_ps = "";
		}
	?>
<ons-navigator swipeable id="myNavigator" page="page1.html"></ons-navigator>
	
	<template id="page1.html">
	<ons-page id="page1">
	<div class="limiter">
		<div class="container-login100" style="padding: 0; margin: 0px; min-height: 100%;">
			<div class="wrap-login100" style="border-radius: 0px;">
			
				<form id="form_login" method="post" enctype="multipart/form-data">
			
					<span class="login100-form-title p-b-30 p-t-20">

						<img src="assets/images/logo.png" class="img-logo" onclick="window.location = 'https://www.welovetaxi.com/app/TShare_new/material/login/';" />
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100 <?=$hasval_us;?>" type="text" name="real_username" id="real-username" autocomplete="new-password" required value="<?=$_COOKIE[app_remember_user];?>">
						<span class="focus-input100" data-placeholder="ชื่อผู้ใช้งาน"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass" onclick="seePassword();">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100 <?=$hasval_ps;?>" type="password" name="real_password" id="real-password" autocomplete="new-password" required value="<?=$_COOKIE[app_remember_pass];?>">
						<span class="focus-input100" data-placeholder="รหัสผ่าน"></span>
					</div>

					<div class="container-login100-form-btn" style="padding: 0px;">
						<div style="margin-bottom: 10px;width: 100%;">
						<button type="submit" style="display: none;">submit</button>
						<!--<ons-button modifier="large" class="button-margin button button--large pd-min" onclick="$('#form_login').submit();">เข้าสู่ระบบss</ons-button>-->
						<ons-button modifier="large" class="button-margin button button--large pd-min" onclick="submitLogin();">เข้าสู่ระบบ</ons-button>
						</div>
						<div style="width: 100%;">
						<ons-button modifier="large" onclick="fn.pushPage({'id': 'singup.html', 'title': 'singup'})" class="button-margin button button--large pd-min" style="background-color: #F7941D;">สมัครสมาชิก</ons-button>
						</div>
					</div>
					<div class="text-center bottom-txt">
						<span class="txt1">
							ลืมรหัสผ่านหรือไม่?
						</span>

						<!--<a class="txt2 link-txt" onclick="fn.pushPage({'id': 'recovery.html', 'title': 'กู้หรัสผ่าน'}, 'lift-ios')">
							กู้รหัส
						</a>-->
						<a class="txt2 link-txt" onclick="ons.notification.alert({message: 'ยังไม่เปิดให้บริการ',title:'ขออภัย',buttonLabel:'ปิด'});">
							กู้รหัส
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	</ons-page>
	</template>
	
	<template id="singup.html">
  	<ons-page id="singup">
    <ons-toolbar>
      <div class="left"><ons-back-button>กลับ</ons-back-button></div>
      <div class="center" id="page_singup">สมัครสมาชิก</div>
    </ons-toolbar>
	  <div id="body_page_singup">
	  	<?php include("application/views/page/singup_view.php"); ?>
	  </div>
  	</ons-page>
	</template>

	
	<template id="submit-alert-dialog.html">
	  <ons-alert-dialog id="submit-my-alert-dialog" modifier="rowfooter">
	    <div class="alert-dialog-title" id="submit-dialog-title">คุณแน่ใจหรือไม่</div>
	    <div class="alert-dialog-content">
	       ว่าต้องการบันทึกข้อมูลนี้
	    </div>
	    <div class="alert-dialog-footer">
	      <ons-alert-dialog-button onclick="hideAlertDialog()">ยกเลิก</ons-alert-dialog-button>
	      <ons-alert-dialog-button onclick="submitSingUp()">บันทึก</ons-alert-dialog-button>
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
	    <p style="text-align: center">
	      	<?php include("application/views/page/recovery_view.php"); ?>
	    </p>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="assets/plugin/cropit/dist/jquery.cropit.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/js/main.js"></script>
	
	<script>
		function showModal() {
		  hideAlertDialog();
		  var modal = document.querySelector('ons-modal');
		  modal.show();
		  setTimeout(function() {
		  	ons.notification.alert('This dialog was created with ons.notification');
			
		    modal.hide();
		  }, 2000);
		}

		var createAlertDialog = function() {
			var imageData = $('.image-editor').cropit('export');
			$('.hidden-image-data').val(imageData);
		  	if($('input[name="name_th"]').val()==""){

				 ons.notification.alert({message: 'กรุณากรอกชื่อจริง',title:"ข้อมูลไม่ครบ"})
				  .then(function() {
				    $('input[name="name_th"]').focus();
				  });
				
				return false;
			}
			if($('input[name="nickname"]').val()==""){

				ons.notification.alert({message: 'กรุณากรอกชื่อเล่น',title:"ข้อมูลไม่ครบ"})
				  .then(function() {
				    $('input[name="nickname"]').focus();
				  });
				return false;
			}
			if($('input[name="address"]').val()==""){

				ons.notification.alert({message: 'กรุณากรอกที่อยู่ของคุณ',title:"ข้อมูลไม่ครบ"})
				  .then(function() {
				    $('input[name="address"]').focus();
				  });
				return false;
			}
			if($('input[name="phone"]').val()==""){

				ons.notification.alert({message: 'กรุณากรอกเบอร์โทรศัพท์',title:"ข้อมูลไม่ครบ"})
				  .then(function() {
				    $('input[name="phone"]').focus();
				  });
				return false;
			}
			if($('#valid_type_plate').val()==1){

				ons.notification.alert({message: 'ทะเบียนรถนี้ถูกใช้แล้ว ไม่สามารถใช้ซ้ำได้',title:"ข้อมูลไม่ครบ"})
				  .then(function() {
				    $('input[name="plate_num"]').focus();
				  });
				return false;
			}
			if($('#valid_type_phone').val()==1){

				ons.notification.alert({message: 'เบอร์โทรนี้ถูกใช้แล้ว ไม่สามารถใช้ซ้ำได้',title:"ข้อมูลไม่ครบ"})
				  .then(function() {
				    $('input[name="plate_num"]').focus();
				  });
				return false;
			}
			if($('input[name="image-data"]').val()==""){

				ons.notification.alert({message: 'กรุณาเลือกรูปประจำตัวของคุณ',title:"ข้อมูลไม่ครบ"})
				  .then(function() {
				    $('input[name="image-data"]').focus();
				  });
				return false;
			}
			/*if($('input[name="idcard"]').val()==""){
				ons.notification.alert({message: 'กรุณากรอกเลขบัตรประจำตัวประชาชน',title:"ผิดพลาด"});
				return false;
			}else{
				
			}	*/
			if($('#valid_type_idc').val()==1){
					ons.notification.alert({message: 'เลขบัตรประชาชนของคุณไม่ถูกต้อง',title:"ผิดพลาด"});
					return false;
				}
				else if($('#valid_type_idc').val()==2){

					ons.notification.alert({message: 'เลขบัตรประชาชนของคุณถูกใช้แล้ว ไม่สามารถใช้ซ้ำได้',title:"ผิดพลาด"});
					return false;
				}
		  var dialog = document.getElementById('submit-my-alert-dialog');

		  if (dialog) {
		    dialog.show();
		  } else {
		    ons.createElement('submit-alert-dialog.html', { append: true })
		      .then(function(dialog) {
		        dialog.show();
		      });
		  }
		};

		var hideAlertDialog = function() {
		  document
		    .getElementById('submit-my-alert-dialog')
		    .hide();
		};
	</script>
	
	<script>
	var modal = document.querySelector('ons-modal');	
	window.fn = {};
		
	window.fn.pushPage = function (page, anim) {

		console.log(page)
		if(page.id=="singup.html"){
			randerSingUp();
		}
	  if (anim) {
	    document.getElementById('myNavigator').pushPage(page.id, { data: { title: page.title }, animation: anim });
	    
	  } else {
	    document.getElementById('myNavigator').pushPage(page.id, { data: { title: page.title } });
	  }
	};

	function submitLogin(){
		modal.show();
		console.log("login action");
		var data = new FormData($('#form_login')[0]);
		 console.log(data);
//		  var url_login = "../../mod/material/php_center.php?checking=login";
		  var url_login = "signin/check_signin";
			  $.ajax({
	            url: url_login, // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            cache: false,
	            contentType: false,
	            processData: false,
	            data: data,
	            type: 'post',
	            success: function(res) {
	               console.log(res);
	             	if(res.check==1){
						 var url = "index";
						 console.log(url);
						 setCookie("detect_username" ,res.data.user, 10);
						 setCookie("detect_userclass", res.data.class_user, 10);
						 setCookie("detect_user" ,res.data.id, 10);
						 setCookie("app_remember_user", res.data.user, 10);
						 setCookie("app_remember_pass", res.data.pass, 10);
 						 window.location.href = url; 
					}else{
						modal.hide();
						ons
					   		.notification.alert({message: 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',title:"ไม่สามารถเข้าสู่ระบบได้",buttonLabel:"ปิด"});
					    modal.hide();
					}
	            }
	        });
	}
	
	$(document).ready(function(){
	
	$( "#form_login" ).submit(function( event ) {
//		alert(123);
		  submitLogin();
		  event.preventDefault();
		});
		
	});
	
	var ck_see_pass = false;
	
	function seePassword(){
		if(ck_see_pass==false){
			$('#real-password').attr('type','text');
			$('.zmdi').removeClass('zmdi-eye');
			$('.zmdi').addClass('zmdi-eye-off');
			ck_see_pass = true;
		}else{
			$('#real-password').attr('type','password');
			$('.zmdi').addClass('zmdi-eye');
			$('.zmdi').removeClass('zmdi-eye-off');
			ck_see_pass = false;
		}
	}
	
	function checkIdCard(val){
		if(val.length==0){
			$('#valid_type_idc').val(0);
		}
		if(val.length>13){
			$('#idcard').val(val.slice(0,-1));
			return;
		}
		$('.checking').hide();
		console.log(val.length)
		if(val.length>=13){
			var check_corrent = checkID(val);
//			console.log(check_corrent);
			if(check_corrent==true){
				$.post("main/check_idcard",{ txt:val  },function(res){
					console.log(res);
					if(res.check == 1){
//						alert(res)
						$('#incorrent-idc').show();
						$('#corrent-idc').hide();
						$('#valid_type_idc').val(2);
					}else{
						
						$('#corrent-idc').show();
						$('#incorrent-idc').hide();
						$('#valid_type_idc').val(0);
					}
				});
			}else{
				$('#incorrent-idc').show();
				$('#corrent-idc').hide();
				$('#valid_type_idc').val(1);
			}
		}
	}
	
	function checkID(id){
		if(id.length != 13) return false;
		for(i=0, sum=0; i < 12; i++)
		sum += parseFloat(id.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id.charAt(12)))
		return false; return true;
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
	    console.log(lat+" "+lng);
	     var url = 'https://maps.google.com/maps/api/geocode/json?latlng='+position.coords.latitude+','+position.coords.longitude+'&sensor=false&language='+lng+'&key=AIzaSyCx4SLk_yKsh0FUjd6BgmEo-9B0m6z_xxM';
	console.log(url);

	$.post( url, function( data ) {

	   if(data.status=="OVER_QUERY_LIMIT"){
	      console.log('OVER_QUERY_LIMIT');
	   }else{
	      var province = data.results[data.results.length-2].address_components[0].long_name;
	      console.log(province);
	       var url = "main/get_id_province";
		   $.post( url,{txt_pv  :province} ,function( data ) {
				console.log(data);
		      var province = data[0].id;
		      var area = data[0].area;
		      console.log(data[0].name_th+" ++ "+province);
		      $('#txt-province').text(data[0].name_th);
		      $('#choose-province select').val(province);
		   });
	   }
	});
	}
	
	function randerSingUp(){
		
		getLocation();
		$.post("main/get_data_province",function(data){

			$.each(data, function( index, value ) {
//				console.log(value);
				var option = '<option value="'+value.id+'">'+value.name_th+'</option>';
				$('#choose-province select').append(option);
			});
			
		});
	}

	function validEmail(email){
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  console.log(regex.test(email));
	  if(regex.test(email)==true){
	  	$('#incorrent-email').hide();
	  	$('#corrent-email').show();
	  }else{
	  	$('#incorrent-email').show();
	  	$('#corrent-email').hide();
	  }
	}

	function readURL(input) {
	  $('#pg_upload_bar').show();
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();

	    reader.onload = function(e) {
	    	
	      $('#image_id_driver').attr('src', e.target.result);
	      $('.focus').hide();
	      $('#image_id_driver').fadeIn(500);

	    }
	    reader.readAsDataURL(input.files[0]);
	  }
	}
	
	function testUpload(){
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
        $.post("../../mod/material/user/php_user.php?action=upload",$('#form_singin').serialize(),function(res){
        	console.log(res);
        });
        
	}
	
	function submitSingUp(){	
		hideAlertDialog();	
		modal.show();
		
		var data = new FormData($('#form_singin')[0]);
//		 data.append('fileUpload', $('#imgInp')[0].files[0]);
//		var url = "../../mod/material/user/php_user.php?action=register";
		var url = "signin/register";
		
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
               if(php_script_response.result==true){

               		ons
					  .notification.alert({message: 'สมัครสมาชิกสำเร็จแล้ว',title:"สำเร็จ",buttonLabel:"กดเพื่อเข้าสู่ระบบ"})
					  .then(function() {
					    	modal.show();
					    	var data_login = {
								real_username : php_script_response.update.username,
								real_password : php_script_response.password
							};
					    	var url_login = "signin/check_signin";
					    	setTimeout(function(){ 
							  $.ajax({
					            url: url_login, // point to server-side PHP script 
					            dataType: 'json', // what to expect back from the PHP script, if anything
					            data: data_login,
					            type: 'post',
					            success: function(res) {
					               console.log(res);
					             	if(res.check==1){
										modal.show();
//										 var url = "../../index.php?check_new_user="+php_script_response.last_id;
										 var url = "index"+"?check_new_user="+php_script_response.last_id;
										 console.log(url);
										 setCookie("detect_username" ,res.data.user, 10);
										 setCookie("detect_userclass", res.data.class_user, 10);
										 setCookie("app_remember_user", res.data.user, 10);
										 setCookie("app_remember_pass", res.data.pass, 10);
				 						 window.location.href = url; 
										}
					            	}
					        	});
					        }, 500);
					  });
		    		modal.hide();
			   }else{
			   		ons
					  .notification.alert({message: 'ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่อีกครั้ง',title:"ผิดพลาด",buttonLabel:"ปิด"});
					  modal.hide();
			   }
            },
	        error: function(err){
	        	console.log(err);
	                //your code here
	        }
        });
	}
	
</script>
	<script>
	function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
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
    var user=getCookie("username");
    if (user != "") {
        alert("Welcome again " + user);
    } else {
       user = prompt("Please enter your name:","");
       if (user != "" && user != null) {
           setCookie("username", user, 30);
       }
    }
}

function validPlate(value){
		console.log(value)
//		var ck_plate = "../../mod/material/php_center.php?checking=car_plate_overlap";
		var ck_plate = "main/check_car_plate";
		$.post(ck_plate,{ txt:value  },function(res){
					console.log(res);
				 if(res.check >0){
						$('#incorrent-plate').show();
						$('#corrent-plate').hide();
					}else{
						
						$('#corrent-plate').show();
						$('#incorrent-plate').hide();
					}
					$('#valid_type_plate').val(res.check); // 0=ไม่ซ้ำ , 1=ซ้ำ
				});
			
}

function validPhoneNum(value){
		console.log(value)
		$.post("main/check_phone",{ txt:value  },function(res){
					console.log(res);
				 if(res.check >0){
						$('#incorrent-phone').show();
						$('#corrent-phone').hide();
					}else{
						
						$('#corrent-phone').show();
						$('#incorrent-phone').hide();
					}
					$('#valid_type_phone').val(res.check); // 0=ไม่ซ้ำ , 1=ซ้ำ
				});
			
}

</script>
</body>
</html>