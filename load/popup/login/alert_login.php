<style>
   body {
   margin : 0;
   }
   .outer-login {
   position: fixed ; margin-left: 0px; margin-top: 0px; display:table; top:0; left:0;  
   width: 100%; /* This could be ANY width */
   height: 100%; /* This could be ANY height */
   z-index:99999;  
   /*	background: url('images/bg-popup.png');  */ background-color:#FFF;
   animation: showSweetAlert 0.3s;
   }
   .inner-login {
   display: table-cell;
   vertical-align: top;
   text-align: center;
   }
   .centered-login {
   display: inline-block;
   text-align: center; width:100%;
   }
   .back-full-popup
   { 
   font-size:22px;   padding:10px;  color:#FFFFF;  width:100%; background-color:<?=$maincolor?>;      
   border-top: 0px solid #000000; margin-bottom: 0px;  
   top:  0; position:fixed;
   z-index: 1; 
   }
   input:-webkit-autofill,
   input:-webkit-autofill:hover,
   input:-webkit-autofill:focus,
   input:-webkit-autofill:active {
   transition: background-color 50000s ease-in-out 0s, color 5000s ease-in-out 0s; -webkit-box-shadow: 0 0 0px 1000px white inset;
   }
   /* The container */
   .container {
   display: block;
   position: relative;
   padding-left: 30px;
   /* margin-bottom: 12px;*/
   cursor: pointer;
   -webkit-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
   }
   /* Hide the browser's default checkbox */
   .container input {
   position: absolute;
   opacity: 0;
   cursor: pointer;
   }
   /* Create a custom checkbox */
   .checkmark {
   position: absolute;
   top: 0;
   left: 0;
   height: 25px;
   width: 25px;
   background-color: #eee;
   border-radius : 5px;
   }
   /* On mouse-over, add a grey background color */
   .container:hover input ~ .checkmark {
   background-color: #ccc;
   }
   /* When the checkbox is checked, add a blue background */
   .container input:checked ~ .checkmark {
   /*    background-color: #2196F3;*/
   background-color: #3b5998;
   }
   /* Create the checkmark/indicator (hidden when not checked) */
   .checkmark:after {
   content: "";
   position: absolute;
   display: none;
   }
   /* Show the checkmark when checked */
   .container input:checked ~ .checkmark:after {
   display: block;
   }
   /* Style the checkmark/indicator */
   .container .checkmark:after {
   left: 8px;
   top: 3px;
   width: 10px;
   height: 16px;
   border: solid white;
   border-width: 0 3px 3px 0;
   -webkit-transform: rotate(45deg);
   -ms-transform: rotate(45deg);
   transform: rotate(45deg);
   }
</style>
<style>
                                             .radio-password { width:25px; height:25px; box-shadow:none; margin-top:10xp; background:none; border-radius:25px}
                                             .radio-password:hover { width:25px; height:25px; box-shadow:none; margin-top:10xp; background:none;  border-radius:25px}
                                          </style>
<?
   $popup_icon_left_arow='<i class="fa fa-close" style="font-size:24px; color:#FFFFFF "></i>';
   ?>
<div id="alert_show_popup_login" style="display:none;z-index:99999;  ">
   <div class="outer-login" >
      <div class="inner-login">
         <div class="centered-login">
            <center>
            <div class="back-full-popup" >
               <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                     <td width="40"   >
                        <div class="button-close-popup-mod" ><?=$popup_icon_left_arow;?></div>
                     </td>
                     <td   >
                        <div style=" color:#FFFFFF " id="text_mod_topic_action" class="text-topic-action-mod font-28"><?=t_log_in;?></div>
                     </td>
                     <td width="50" align="right"   >
                        <div style="font-size:22px; color:#FFFFFF " id="head_full_popup_icon"><i class="fa fa-sign-in" style=" font-size:26px;"  ></i></div>
                     </td>
                  </tr>
               </table>
            </div>
            <div id="load_form_main" class="login-box-body" style="padding:15px; margin-bottom:10px ; background-color:#FFFFFF;border: solid 0px #999999;box-shadow: 0 0 0px 0px #666666;border-radius: 15px; width:100%; display:nones; margin-top:50px; ">
               <div id="load_form">
                  <form method="post" id="login_form"  enctype="multipart/form-data" >
                  	
                     <div class="form-group has-feedback" style="display:none" >
                        <select class="form-control"  name="login_type" id="login_type"  style="text-align:left; font-size:16px; font-weight:bold; height:40px;">
                           <option value="" >--เลือกประเภทผู้ใช้งาน--</option>
                           <option value="driver" <?  if($arr[project][payment_type]== 'driver'){ echo "selected=selected";} ?>>คนขับรถ</option>
                           <option value="counter" <?  if($arr[project][payment_type]== 'counter'){ echo "selected=selected";} ?>>เคาน์เตอร์ทัวร์-โรงแรม</option>
                           <option value="admin" <?  if($arr[project][payment_type]== 'admin'){ echo "selected=selected";} ?>>ผู้ดูแลระบบ</option>
                        </select>
                     </div>
                     <div style="text-align:left; font-size:18px; font-weight:bold"><?=t_username;?></div>
                     <div class="form-group has-feedback" >
                        <?
                           if($_GET['autologin']) {
                           	$user = $_GET[user];
                          } 
                           else {
                           	$user = $_COOKIE['app_remember_user'];
                           	} ?>
                           	<input name="loginusername" class="form-control" id="loginusername"  maxlength="7" style="font-size:18px ; height:40px; border-radius:20px; text-transform:uppercase;background-color:#fff" value="<?=$user;?>" placeholder="<?=Username;?>" autocomplete="off">
                        <span class="glyphicon glyphicon-user form-control-feedback" style="display: none;"></span>
                     </div>
                     <div style="text-align:left; font-size:18px; font-weight:bold"><?=t_password;?></div>
                     <div class="form-group has-feedback">
                        <?
                           if($_GET['autologin']) {
                           	$pass = $_GET['pass'];
                  			 } else {
                  			 $pass = $_COOKIE['app_remember_pass'];	
                  			 } ?>
                  		<input name="loginpassword"  id="loginpassword"  type="password" class="form-control"  style="font-size:18px ; height:40px;border-radius:20px"   value="<?=$pass;?>" placeholder="<?=t_password;?>" autocomplete="off">         	     
                        <div id="check_view_pass" class="glyphicon glyphicon-eye-open form-control-feedback" style="padding-right: 25px;font-size: 18px;top: 3px;pointer-events: unset;" onclick="viewPassword();" role="0" ></div>
                     </div>
                     <div class="form-group has-feedback">
                        <div style="width:100%; background-color:#FFFFFF; margin-top:-10px; ">
                           <table  border="0" cellspacing="0" cellpadding="0" style="width:100%; background-color:#FFFFFF ">
                              <tr>
                                 <td style="background-color:#FFFFFF "  >
                                 
                                  <?
                                             if($_COOKIE['app_remember_pass']) {
                                                 $remember = 1;
                                                $chk_remem = "checked='checked'";
                                             } else {
                                                $remember = 0;
                                             }
                                             ?> 
                                    <div style="margin-top: 5px;padding: 0px 5px;">
                                       <label class="container">
                                         <span class="font-btn-18" style="text-transform: capitalize;" ><?=t_remember_me;?></span>
                                          
                                          <input type="checkbox" name="chk_remem" id="chk_remem" class="checkbox_broken"  <?=$chk_remem;?>    >
                                           <span class="checkmark"></span>
                                          <input type="hidden" name="remember" id="remember" value="<?=$remember;?>" />	
                                          &nbsp;
                                          
                                       </label>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td style="background-color:#FFFFFF "> 
                                    <button type="button" id="submit_login" class="btn btn-repair waves-effect font-26" style=" width: 100%; background-color: #3b5998; border-radius:  25px;margin-top:15px;text-transform: capitalize;" ><?=t_log_in;?></button>
                                 </td>
                              </tr>
                              <tr>
                                 <td style="background-color:#FFFFFF "><button type="button" id="forget_inform_login" class="btn btn-repair waves-effect font-26" 
                                    style=" width: 100%; background-color: #666666; border-radius:  25px;margin-top:15px;text-transform: capitalize;"><?=t_forgot_password;?></button></td>
                              </tr>
                           </table>
                        </div>
                     </div>
					<input type="hidden" value="<?=$_GET['autologin'];?>" name="check_new_user" id="check_new_user" />
					<!--<input type="hidden" value="1" name="check_new_user" id="check_new_user" />-->
                  </form>
               </div>
               <!-- /.social-auth-links -->
               <div id="sendlogin"> </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $('#forget_inform_login').click(function (){
   	$('#btn_login_password').click();
   });
</script>
<script>

   ////////////// keyup
   $('#loginusername').on('keyup', function(e) { 
   ///alert('Key pressed: ' + e.keyCode);
    if (e.keyCode === 13) {
   $("#submit_login").click();
    }
   });
   ////////////// keyup
   $('#loginpassword').on('keyup', function(e) { 
    if (e.keyCode === 13) {
   $("#submit_login").click();
    }
   });
   $("#submit_login").click(function(){ 

   /*
   if(document.getElementById('login_type').value=="") {
   alert('กรุณาเลือกประเภทผู้ใช้งาน'); 
   document.getElementById('login_type').focus() ; 
   return false ;
   }
   */
   if(document.getElementById('loginusername').value=="") {
   alert('กรุณากรอกชื่อผู้ใช้งาน'); 
   document.getElementById('loginusername').focus() ; 
   return false ;
   }
   if(document.getElementById('loginpassword').value=="") {
   alert("กรุณากรอกรหัสผ่าน") ;
   document.getElementById('loginpassword').focus() ;
    return false ;
   }
    $.post('signin_check.php',$('#login_form').serialize(),function(response){
    	
      $('#sendlogin').html(response);
     });
    });
    $(".button-close-popup-mod").click(function(){   
    $( "#alert_show_popup_login" ).hide();
     });
</script>
<script>
	function viewPassword(){
		
		var check = $('#check_view_pass').attr('role');
		console.log('view '+check);
		if(check==0){
			$('#loginpassword').attr('type','text');
			$('#check_view_pass').attr('role','1');
			$('#check_view_pass').removeClass('glyphicon-eye-open');
			$('#check_view_pass').addClass('glyphicon-eye-close');
		}else{
			$('#loginpassword').attr('type','password');
			$('#check_view_pass').attr('role','0');
			$('#check_view_pass').removeClass('glyphicon-eye-close');
			$('#check_view_pass').addClass('glyphicon-eye-open');
		}
	
		
	}
</script>