<style>
   body {
   margin : 0;
   }
   .outer-password {
   position: fixed; margin-left: 0px; margin-top: 0px; display:table; top:0; left:0;  
   width: 100%; /* This could be ANY width */
   height: 100%; /* This could be ANY height */
   z-index:99999;  
   /*	background: url('images/bg-popup.png');  */ background-color:#FFF;
   animation: showSweetAlert 0.3s;
   }
   .inner-password {
   display: table-cell;
   vertical-align: top;
   text-align: center;
   }
   .centered-password {
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
</style>
<?
   $popup_icon_left_arow='<i class="fa fa-close" style="font-size:24px; color:#FFFFFF "></i>';
   ?>
<div id="alert_show_popup_password" style="display:none;z-index:99999;  ">
   <div class="outer-password" >
      <div class="inner-password">
         <div class="centered-password">
            <center>
            <div class="back-full-popup">
               <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                     <td width="40"   >
                        <div class="button-close-popup-password" ><?=$popup_icon_left_arow;?></div>
                     </td>
                     <td   >
                        <div style="font-size:22px; color:#FFFFFF " id="text_mod_topic_action" class="text-topic-action-mod"><?=t_forgot_password;?></div>
                     </td>
                     <td width="50" align="right"   >
                        <div style="font-size:22px; color:#FFFFFF " id="head_full_popup_icon"><i class="fa fa-unlock-alt" style=" font-size:26px;"  ></i></div>
                     </td>
                  </tr>
               </table>
            </div>
            <div id="load_form_data_send_password" style=" margin-top:80px;display:none">sssssssssss</div>
            <div id="load_form_main_password" class="password-box-body" style="padding:15px; margin-bottom:10px ; background-color:#FFFFFF;border: solid 0px #999999;box-shadow: 0 0 0px 0px #666666;border-radius: 15px; width:100%; display:nones; margin-top:40px; ">
               <div id="load_form">
                  <form method="post" id="password_form"  enctype="multipart/form-data" >
                     <div class="form-group has-feedback" style="display:none" >
                        <select class="form-control"  name="password_type" id="password_type"  style="text-align:left; font-size:16px; font-weight:bold; height:40px;">
                           <option value="" >--เลือกประเภทผู้ใช้งาน--</option>
                           <option value="driver" <?  if($arr[project][payment_type]== 'driver'){ echo "selected=selected";} ?>>คนขับรถ</option>
                           <option value="counter" <?  if($arr[project][payment_type]== 'counter'){ echo "selected=selected";} ?>>เคาน์เตอร์ทัวร์-โรงแรม</option>
                           <option value="admin" <?  if($arr[project][payment_type]== 'admin'){ echo "selected=selected";} ?>>ผู้ดูแลระบบ</option>
                        </select>
                     </div>
                     <?
                        if($_COOKIE['app_remember_pass']) {
                            $remember = 1;
                           $chk_remem = "checked='checked'";
                        } else {
                           $remember = 0;
                        }
                        ?> 
                     <style>
                        .radio-password { width:25px; height:25px; box-shadow:none; margin-top:10xp; background:none;}
                        .radio-password:hover { width:25px; height:25px; box-shadow:none; margin-top:10xp; background:none;}
                     </style>
                     <ul class="nav nav-tabs" style="width:100%; margin-top:10px;">
                        <li class="active" style="width:50%; text-align:center" id="btn_load_select_password"><a style="font-size:18px;" ><?=t_recovery_password;?></a></li>
                        <li style="width:50%; text-align:center" id="btn_load_select_username"><a style="font-size:18px;" ><?=t_recovery_username;?></a></li>
                     </ul>
                     <script>
                        $("#btn_load_select_password").click(function(){ 
                        $("#btn_load_select_password").addClass('active');
                        $("#btn_load_select_username").removeClass('active');
                        $("#load_chk_password_username").show();
                        $('#chk_password_username').click();
                        });
                        $("#btn_load_select_username").click(function(){ 
                        $("#btn_load_select_username").addClass('active');
                        $("#btn_load_select_password").removeClass('active');
                        $("#load_chk_password_username").hide();
                        $('#chk_password_phone').click();
                        });
                     </script>
                     <div style="text-align:left; font-size:20px; font-weight:bold; margin-top:-30px;">
                        <table width="100%" border="0" cellspacing="5" cellpadding="5" style="margin-left:-10px; ">
                           <tbody>
                              <tr  id="load_chk_password_username" >
                                 <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="1" >
                                       <tbody>
                                          <tr>
                                             <td width="30"><input class="radio-password"  type="radio" name="chk_remem" id="chk_password_username"  <?=$chk_remem;?>    ></td>
                                             <td><font style="font-size: 18px "><?=t_user_name;?></font></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="1" id="load_chk_password_phone" >
                                       <tbody>
                                          <tr>
                                             <td width="30"><input class="radio-password"  type="radio" name="chk_remem" id="chk_password_phone"      ></td>
                                             <td><font style="font-size: 18px "><?=t_use_phone_number;?></font></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="1" id="load_chk_password_phone" >
                                       <tbody>
                                          <tr>
                                             <td width="30"><input class="radio-password"  type="radio" name="chk_remem" id="chk_password_email"     ></td>
                                             <td><font style="font-size: 18px "><?=t_email;?></font></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <input type="hidden" name="send_password_type" id="send_password_type" value="username" />	
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div id="load_check_input_username" class="load_check_input">
                        <input name="password_username"  class="form-control font-24"   id="password_username" maxlength="7" style="font-size:18px ; height:40px;  text-transform: capitalize
                         ; background-color:#fff" value="" placeholder="<?=t_please_enter_username;?>" autocomplete="off">    
                     </div>
                     <div id="load_check_input_phone" class="load_check_input">
                        <input name="password_phone"  type="number" class="form-control font-24"   id="password_phone" maxlength="10" style="font-size:18px ; height:40px;  
                        text-transform: capitalize; background-color:#fff" value="" placeholder="<?=t_please_enter_phone_number;?>" autocomplete="off">    
                     </div>
                     <div id="load_check_input_email"  class="load_check_input">
                        <input name="password_email"  class="form-control font-24"   id="password_email" maxlength="1000" style="font-size:18px ; height:40px;   background-color:#fff;
                        text-transform: capitalize;" value="" placeholder="<?=t_please_enter_email;?>" autocomplete="off">    
                     </div>
                     <div id="send_password_data"> </div>
                     <div id="send_email_data"></div>
                     <span class="glyphicon glyphicon-user form-control-feedback"></span>
               </div>
               <div class="form-group has-feedback"> 
               </div>
               <div class="form-group has-feedback">
               <div style="width:100%; background-color:#FFFFFF; margin-top:-10px; ">
               <table  border="0" cellspacing="0" cellpadding="0" style="width:100%; background-color:#FFFFFF ">
               <tr>
               <td style="background-color:#FFFFFF "  > </td>
               </tr>
               <tr>
               <td style="background-color:#FFFFFF "> 
               
        <button type="button" id="submit_password" class="btn btn-repair waves-effect" style="background-color:#3b5998; color:#FFFFFF;text-transform: capitalize !important;border-radius: 25px; margin-top: 25px;width: 100%;margin-left: 0px;">
                <span class="font-24"><?=t_send_password;?></span></button></td>
               </tr>
               </table>
               </div>
               </div>
               </form>
            </div>
            <!-- /.social-auth-links -->
         </div>
      </div>
   </div>
</div>

<script>
   $(".load_check_input" ).hide(); 
       $("#load_check_input_username" ).show(); 
   //// 
   $(".back-full-popup").click(function(){ 
   $('#alert_show_popup_password').hide(); 
   });
   $('#chk_password_username').click(function() {
   $('#send_password_data').hide(); 
    $(".load_check_input" ).hide(); 
     $("#load_check_input_username" ).show(); 
    $("#send_password_type" ).val('username'); 
    $("#password_username" ).val(''); 
   });
   $('#chk_password_phone').click(function() {
    $(".load_check_input" ).hide(); 
    $('#send_password_data').hide(); 
     $("#load_check_input_phone" ).show(); 
   	 $("#send_password_type" ).val('phone'); 
   	 $("#password_phone" ).val(''); 
   });
   $('#chk_password_email').click(function() {
    $(".load_check_input" ).hide(); 
    $('#send_password_data').hide(); 
     $("#load_check_input_email" ).show(); 
   $("#send_password_type" ).val('email'); 
   $("#password_email" ).val(''); 
   });
</script>
<script>
   /// check login
   $("#submit_password").click(function(){ 
    if(document.getElementById('send_password_type').value=="username") {
    /// เวลากลับ
    if(document.getElementById('password_username').value=="") {	  
//   alert('<?=t_please_enter_username;?>');  
    swal("<?=t_please_enter_username;?>","", "error");
    document.getElementById('password_username').focus() ; 
    return false ;
   }
   }
    if(document.getElementById('send_password_type').value=="phone") {
    /// เวลากลับ
    if(document.getElementById('password_phone').value=="") {	  
   	swal("<?=t_please_enter_phone_number;?>","", "error");
    document.getElementById('password_phone').focus() ; 
    return false ;
   }
   }
    if(document.getElementById('send_password_type').value=="email") {
    /// เวลากลับ
    if(document.getElementById('password_email').value=="") {	  

   swal("<?=t_please_enter_email;?>","", "error");
    document.getElementById('password_email').focus() ; 
    return false ;
   }
   }
    	$('#send_password_data').show(); 
	    $.post('password_check.php',$('#password_form').serialize(),function(response){
	      	$('#send_password_data').html(response);
	     });
    });
</script>
<script>

	$( "#password_username" ).keyup(function() {
		if($(this).val().length>1){
			
	  	$(this).css('text-transform','uppercase');
	  	
		}else{
				$(this).css('text-transform','capitalize');
		}
	});
	
	$( "#password_phone" ).keyup(function() {
		if($(this).val().length>1){
			
	  	$(this).css('text-transform','uppercase');
	  	
		}else{
				$(this).css('text-transform','capitalize');
		}
	});
	
	
	
</script>