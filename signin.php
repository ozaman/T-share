<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>T Share</title>
	  <?php 
	  		include "css/color/taxi.php" ;	
	       	//include "css/maincss.php" ;	
	        
	        $get_lng = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
		    $get_lng = $get_lng[0];
			$check_lng_browser = explode('-', $get_lng);
			$check_lng_browser = $check_lng_browser[0];

				if($check_lng_browser == 'ch' or $check_lng_browser == 'zh' or $check_lng_browser == 'sh'){
				 	$keep = 'cn';
				}else if($check_lng_browser == 'th'){
				 	$keep = 'th';
				}else{
				 	$keep = 'en';
				}
			
		      switch ($_COOKIE['lng']){
		    case "th":
		        //echo "PAGE th";
		        include("includes/lang/th/t_share_2.php");//include check session DE
		        $google_map_api_lng = "th";
		        break;
		    case "cn":
		        //echo "PAGE cn";
		        include("includes/lang/cn/t_share_2.php");
		        $google_map_api_lng = 'zh-CN';
		        break;
		    case "en":
		        //echo "PAGE EN";
		        include("includes/lang/en/t_share_2.php");
		        $google_map_api_lng = "en";
		        break;        
		    default:
		        //echo "PAGE EN - Setting Default";
		        include("includes/lang/".$keep."/t_share_2.php");//include EN in all other cases of different lang detection
		        $google_map_api_lng = $keep;
		        break;
		} 
      ?>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.6 -->
      <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
      <link rel="stylesheet" href="plugins/iCheck/square/green.css">
      <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <script type="text/javascript" src="js/dialog/main.js"></script>
      <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
      
	  <script>
	  $(document).ready(function(){
	  		console.log('check_browser : <?=$check_lng_browser;?> : <?=$keep;?>');
	  		var check_cook = '<?=$_COOKIE["lng"];?>';
	  		/*console.log("cookie_lng : "+check_cook);
	  		if(check_cook=='th'){
				setCookie('lng', 'th', 1, 0);
			}else if(check_cook=='en'){
				setCookie('lng', 'en', 1, 0);
			}else if(check_cook=='cn'){
				setCookie('lng', 'cn', 1, 0);
			}else{
				setCookie('lng', 'en', 1, 0);
			}*/
		});	
	  </script>
	  
      <style>
      .btn-lng{
	  	width: 35px !important;
	  	margin-right: 18px;
	  }
	  @media screen and (max-width: 320px) {
		  	.btn-lng{
		  	width: 27px !important;
		  	margin-right: 14px;
		  }
	  }
      .Absolute-Center {
		  margin: auto;
		  position: absolute;
		  top: 0; left: 0; bottom: 0; right: 0;
		}
         .btn-repair{
         /*	padding: .84rem 2.14rem;*/
         font-size: .81rem;
         -webkit-transition: all .2s ease-in-out;
         transition: all .2s ease-in-out;
         margin: .375rem;
         border: 0;
         border-radius: .125rem;
         cursor: pointer;
         text-transform: uppercase;
         white-space: normal;
         word-wrap: break-word;
         color: #fff !important;
         box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
         padding: 7px;
         }
         .waves-effect {
         position: relative;
         cursor: pointer;
         overflow: hidden;
         -webkit-user-select: none;
         -moz-user-select: none;
         -ms-user-select: none;
         user-select: none;
         -webkit-tap-highlight-color: transparent;
         z-index: 1;
         }
         .btn-other{
         width: 280px;
         border-radius : 25px;
         font-size: 24px;
         padding-left: 35px;
         text-align: left;
         }
         .div-all-btn{
         padding:5px;   
         border-radius: 25px; 
         border: 3px solid #FFFFFF;
         background-color:#F6F6F6;     
         margin-bottom: 5px;
         box-shadow: 0px  0px 10px #dadada  ; 
         font-size:24px; 
         margin-top:10px; 
         width:250px; 
         text-align: left; 
         padding-left:20px;
         }
         .img_logo{
         width: auto;
         }
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
         @media screen and (max-width: 320px) {
         /* styles for browsers larger than 960px; */
         .div-all-btn{
         padding:5px;   
         border-radius: 25px; 
         border: 3px solid #FFFFFF;
         background-color:#F6F6F6;     
         margin-bottom: 5px; 
         box-shadow: 0px  0px 10px #dadada  ; 
         font-size:20px; 
         margin-top:10px; 
         width:250px; 
         text-align: left;
         padding-left:20px;
         }
         .img_logo{
         width: 190px;
         }
         .btn-other{
         width: 250px;
         border-radius : 25px;
         font-size: 20px;
         padding-left: 35px;
         text-align: left;
         }
         }
		 .font-18{
         font-size : 12px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-20{
         font-size : 14px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-22{
         font-size : 16px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-24{
         font-size : 18px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-26{
         font-size : 20px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-28{
         font-size : 22px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-30{
         font-size : 24px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-32{
         font-size : 26px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-34{
         font-size : 28px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-36{
         font-size : 30px !important;
         font-family: 'Arial', sans-serif;
         }
         .font-38{
         font-size : 32px !important;
         font-family: 'Arial', sans-serif;
         }
      </style>
   </head>
   <body >
   	  <div align="right" style="margin-top: 5px; padding: 3px;"> 
   	  		<img src="images/icon_county/usa.ico" class="btn-lng" onclick="setCookie('lng', 'en', 1, 1);" >
   	  		<img src="images/icon_county/thai.ico" class="btn-lng" onclick="setCookie('lng', 'th', 1, 1);">
   	  		<img src="images/icon_county/china.ico" class="btn-lng" onclick="setCookie('lng', 'cn', 1, 1);">
   	  </div>	
   	
      <table width="100%"  border="0" align="center" cellpadding="2" cellspacing="2" style="max-width:350px; " class="Absolute-Center">
         <tr>
            <td align="center">
               <div class="login-box">
                  <div class="login-logo"  style="padding:0px; color:#FFFFCC;" >
                    
                     <img src="images/logo.png?v=6" class="img_logo"    style="padding-bottom:0px;margin-top:0px;"      />   
                     <div style="margin-top: 1px; z-index:1;">
                        <button   class="btn btn-repair waves-effect btn-other" style="background-color:#F7941D; color:#FFFFFF;text-transform: capitalize;"   id="btn_login_register"><i class="fa  fa-user-plus" style="padding-right: 5px;"  ></i><span >&nbsp;<?=t_register_member;?></span></button>
                        <button   class="btn btn-repair waves-effect btn-other" style="background-color:#5a78b5; color:#FFFFFF;margin-top:10px;text-transform: capitalize;"   id="btn_login_login">
                        <i class="fa fa-sign-in" style="padding-right:10px;" ></i><span >&nbsp;<?=t_log_in;?></span></button>
                        <button   class="btn btn-repair waves-effect btn-other " style="background-color:#666666; color:#FFFFFF;margin-top:10px;text-transform: capitalize;"   id="btn_login_password"><i class="fa  fa-unlock-alt" style="padding-right:10px;padding-left:2px;" ></i><span ">&nbsp;<?=t_forgot_password;?></span></button>
                        <!--<a href="tel://0935248406">0935248406 +++</a>
                        <br/>
                        <a href="zello://?add_channel">++++++++++++++++++++++++++++ZELLO</a>
                        <br/>
                        <a href="https://goldenbeachgroup.com/app/driver_master/index.php" target="_blank">Visit W3Schools</a>-->
                        <div style="display: none;">
                         <input type='file' id="imgInp"  />
  <img id="blah" src="#" alt="your image" width="100px" />
  </div>
                     </div>
                     <script>
                     function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
                        $("#btn_login_register" ).click(function() {
                        ///   window.location.href = "new_driver.php"; 
                        $("#alert_show_register").toggle();
                          setTimeout(function () {
                        }, 500); //w
                        });
                        ////////// login
                           $("#btn_login_login" ).click(function() {
                        $("#alert_show_popup_login").show(); 
                        ///window.location.href = "new_driver.php"; 
                          setTimeout(function () {
                        }, 500); //w
                        });
                        //// lost pass
                        $("#btn_login_password" ).click(function() {
                        //// alert(0);
                        $("#alert_show_popup_password").show(); 
                        $("#btn_load_select_password").click();
                         $("#load_form_main_password").show(); 
                        $("#load_form_data_send_password").hide(); 
                        ///window.location.href = "new_driver.php"; 
                          setTimeout(function () {
                        }, 500); //w
                        });
                        $("#login_logo" ).click(function() {
                        $("#load_form_main").hide();
                          setTimeout(function () {
                        $("#login_logo").attr("src", "images/applogo_action.png");
                        }, 500); //w
                           setTimeout(function () {
                        $("#login_logo").attr("src", "images/applogo.png");
                        }, 1000); //w
                            setTimeout(function () {
                        $("#login_logo").attr("src", "images/applogo_action.png");
                        }, 1500); //w
                            setTimeout(function () {
                        $("#login_logo").attr("src", "images/applogo.png");
                        }, 2000); //w
                            setTimeout(function () {
                        $("#login_logo").attr("src", "images/applogo_action.png");
                        }, 2500); //w
                        setTimeout(function () {
                        $("#login_logo").attr("src", "images/applogo.png");
                        window.location.href = "index.php?newlogin=1"; //will redirect to your blog page (an ex: blog.html)
                        }, 3000); //w
                        });
                     </script>
                  </div>
                  <!-- /.login-logo -->
                  <!-- /.login-box-body -->
               </div>
               <!-- /.login-box -->
               <!-- iCheck -->
               <script>
                  /// check login
                  /*
                   $(function () {
                     $('input').iCheck({
                       checkboxClass: 'icheckbox_square-blue',
                       radioClass: 'iradio_square-blue',
                       increaseArea: '20%' // optional
                     });
                   });
                  */
               </script>
            </td>
         </tr>
      </table>
      <? include "js/control.php" ;	?>

   </body>
</html>

<div id="signin_load_popup"></div>

   <div class="containers">

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
      .back-full-popup{
      background-color: #3b5998!important;
      }
      .btn-main-color{
      background-color: #3b5998!important;
      }
   </style>
   <?  include ("load/popup/login/alert_login.php");?>
   <?  include ("load/popup/login/alert_password.php");?>
   <?  // include ("load/popup/login/alert_password_send.php");?>
   <?  include ("load/popup/login/alert_register.php");?>
   <?  //include ("google/gps/check.php");?>
   <?
      if($_GET['autologin']) {
      ?> 
   <script>
      $("#submit_login").click();
   </script>
   <? } ?>
   <?
      if($_GET['refer']<>'') {
      ?> 
   <script>
      $("#btn_login_register" ).click();
   </script>
   <? } ?>
   <table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tbody>
         <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
         </tr>
      </tbody>
   </table>

</div>
	

<script >
//console.log("<?=$_COOKIE['lng'];?>");



function setCookie(cname,cvalue,exdays,refresh) {
	
	
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    if(refresh==1){
		window.location.href = "https://www.welovetaxi.com/app/demo/signin.php";
	}
    
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


</script>