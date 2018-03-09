<style>
body {
    margin : 0;
}

.outer-password_send {
    position: absolute; margin-left: 0px; margin-top: 0px; display:table; top:0; left:0;  
    width: 100%; /* This could be ANY width */
    height: 100%; /* This could be ANY height */
   z-index:99999;  
	background: url('images/bg-popup.png');  
}

.inner-password_send {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
}

.centered-password_send {
    display: inline-block;
    text-align: center; width:100%;
   
 
 
}

</style>
 
 
<div id="alert_show_popup_password_send" style="display:none;z-index:99999;  ">
<div class="outer-password_send" >
   <div class="inner-password_send">
     <div class="centered-password_send"><center>
     
   <img src="images/close-popup.png" width="50" height="50" alt="" style="margin-top:-5px; position:absolute; z-index:9;  margin-left:100px; margin-top:-25px; cursor:pointer" id="btn_close_alert_popup_password_send"/>
                 
                 
                 
       <div id="load_form_main" class="login-box-body" style="padding:15px; margin-bottom:10px ; background-color:#FFFFFF;border: solid 0px #999999;box-shadow: 0 0 10px 3px #666666;border-radius: 15px; width:280px; display:nones ">
       
       

       
       
 
<div id="load_form">

    <form method="post" action="" id="edit_form" name="edit_form"  enctype="multipart/form-data" >
 
                   
                   
 <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td style="text-align:left; font-size:20px; font-weight:bold"><i class="fa  fa-unlock-alt"></i>&nbsp;&nbsp;<b>เลือกวิธีรับรหัสผ่าน</b> </td>
      </tr>
    <tr>
      <td style="color:#0000000"> <input type="checkbox" name="chk_remem" id="chk_remem"      >
			  
			  <input type="hidden" name="remember" id="remember" value="<?=$remember;?>" />	
			  
     
			<font style="font-size: 20px ">&nbsp;<i class="fa fa-phone">&nbsp; เบอร์โทรศัพท์มือถือ</font></td>
      </tr>
      
          <tr>
      <td valign="bottom" style="color:#000000"><input type="checkbox" name="chk_remem" id="chk_remem"      >
			  
			  <input type="hidden" name="remember" id="remember" value="<?=$remember;?>" />	
			  
     
			<font style="font-size: 20px ">&nbsp;<i class="fa fa-envelope-o"></i>&nbsp;อีเมล์</font></td>
      </tr>
      
      
 
  </tbody>
</table>

                   
     
  
		 
 
 
 
 
 
  
     
 
  	
  
  <div id="send_password_send" style="display:none "></div>
 </form> 

        </div>
 
  <button type="button" id="submit_password_send" class="btn btn-block " style="background-color:#17B3B2; color:#FFFFFF;font-size: 26px; margin-top:10px;">รับรหัสผ่าน</button>
		
 
    </form>
</div>
     
    <!-- /.social-auth-links -->

 
<div id="sendlogin"> </div>
  </div>

      
 
 

</div>
     
 
    </div>
   </div>
</div>
 
 </div>
 
<script>

 
 /// check login

$("#submit_password_send").click(function(){ 
 
 
if(document.getElementById('newpassword_send').value=="") {
alert('กรุณากรอกชื่อผู้ใช้งาน เบอร์โทรศัพท์ หรือ อีเมล์'); 
document.getElementById('newpassword_send').focus() ; 
return false ;
}
  $('#send_password_send').show();
  $('#send_password_send').html('<i class="fa fa-refresh fa-spin 2x" ></i>');

 $.post('popup.php?name=login&file=password_send',$('#edit_form').serialize(),function(response){
   $('#send_password_send').html(response);
  });
 

 });
 ////
 
 
 
 
 ////




 $("#btn_close_alert_popup_password_send").click(function(){   
 
 
 $( "#alert_show_popup_password_send" ).fadeOut();
 
  });

</script>