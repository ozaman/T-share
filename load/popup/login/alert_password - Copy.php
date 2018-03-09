<style>
body {
    margin : 0;
}

.outer-password {
    position: absolute; margin-left: 0px; margin-top: 0px; display:table; top:0; left:0;  
    width: 100%; /* This could be ANY width */
    height: 100%; /* This could be ANY height */
   z-index:99999;  
	background: url('images/bg-popup.png');  
}

.inner-password {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
}

.centered-password {
    display: inline-block;
    text-align: center; width:100%;
   
 
 
}

</style>



 
<div id="alert_show_popup_password" style="display:noneห;z-index:99999;  ">
<div class="outer-password" >
   <div class="inner-password">
     <div class="centered-password"><center>
     
   <img src="images/close-popup.png" width="50" height="50" alt="" style="margin-top:-5px; position:absolute; z-index:9;  margin-left:100px; margin-top:-25px; cursor:pointer" id="btn_close_alert_popup_password"/>
                 
                 
                 
       <div id="load_form_main" class="login-box-body" style="padding:15px; margin-bottom:10px ; background-color:#FFFFFF;border: solid 0px #999999;box-shadow: 0 0 10px 3px #666666;border-radius: 15px; width:280px; display:nones ">
       
       

       
       
 
<div id="load_form">

    <form method="post" action="" id="edit_form" name="edit_form"  enctype="multipart/form-data" >
 
                   
                   
 <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td style="text-align:left; font-size:20px; font-weight:bold"><i class="fa  fa-unlock-alt"></i>&nbsp;&nbsp;<b>กรอกสิ่งที่คุณจำได้อย่างใดอย่างหนึ่ง ดังต่อไปนี้</b> </td>
      </tr>
    <tr>
      <td style="color:#FF0000">ชื่อผู้ใช้งาน เบอร์โทรศัพท์ หรือ อีเมล์</td>
      </tr>
 
  </tbody>
</table>

                   
     
 
		      <input type="text" name="newpassword" id="newpassword"   value=""  onKeyPress="return KeyCode(txt)" class="form-control"  >
     
 
		 
 
 
 
 
 
  
     
 
  	
  
  <div id="send_password" style="display:none "></div>
 </form> 

        </div>
 
  <button type="button" id="submit_password" class="btn btn-block " style="background-color:#666666; color:#FFFFFF;font-size: 26px; margin-top:10px;">ส่งรหัสผ่าน</button>
		
 
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

$("#submit_password").click(function(){ 
 
 
if(document.getElementById('newpassword').value=="") {
alert('กรุณากรอกชื่อผู้ใช้งาน เบอร์โทรศัพท์ หรือ อีเมล์'); 
document.getElementById('newpassword').focus() ; 
return false ;
}
  $('#send_password').show();
  $('#send_password').html('<i class="fa fa-refresh fa-spin 2x" ></i>');

 $.post('popup.php?name=login&file=password',$('#edit_form').serialize(),function(response){
   $('#send_password').html(response);
  });
 

 });
 ////
 
 
 
 
 ////




 $("#btn_close_alert_popup_password").click(function(){   
 
 
 $( "#alert_show_popup_password" ).fadeOut();
 
  });

</script>