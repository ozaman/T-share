<style>
body {
    margin : 0;
}

.outer-container-send {
    position: absolute; margin-left: 0px; margin-top: 0px; display:table; top:0; left:0;  
    width: 100%; /* This could be ANY width */
    height: 100%; /* This could be ANY height */
   z-index:999999;  
	background: url('images/bg-popup.png');  
}

.inner-container-send {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
}

.centered-content-send {
    display: inline-block;
    text-align: left; width:80%;
   
 
    border : 3px solid #FFFFFF;  
	z-index:99999; background-color:#FFFFFF;   -moz-border-radius:10px;
  -webkit-border-radius:3px;

 border-radius: 15px; height:160px; padding:10px; width:300px;  
}

</style>

 
<div id="alert_show_send_password" style="display:nones;z-index:9999999;  ">
<div class="outer-container-send" >
   <div class="inner-container-send"> 
     <div class="centered-content-send">
     <div>
     
     
    <img src="images/close-popup.png" width="50" height="50" alt="" style="margin-top:-5px; position:absolute; z-index:9;  margin-left:250px; margin-top:-25px; cursor:pointer" id="btn_close_alert_popup_send"/>

<div   style="border:none; color:#000000; font-size:16px; "><center><span class="font-24"><b> เลือกวิธีรับรหัสผ่าน</b></span>



  
  <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
    
          <td width="30"><input name="chk_send_password"  type="radio" class="radio-password" id="chk_send_email" checked="checked"     ></td>
      <td width="100"  style="font-size:22px;">อีเมล์</td>

    
      <td width="30"><input class="radio-password"  type="radio" name="chk_send_password" id="chk_send_sms"     ></td>
      <td class="font-22"  style="font-size:22px;">SMS</td>
    </tr>
  </tbody>
</table>


<script>
  $('#chk_send_email').click(function() {
  $("#send_password_to" ).val('email'); 
 
});


  $('#chk_send_sms').click(function() {
  $("#send_password_to" ).val('sms'); 
 
});

</script>


 

  <input type="hidden" name="send_password_to" id="send_password_to" value="email" />	



 <button type="button" id="submit_password_send" class="btn btn-block " style="background-color:#17B3B2; color:#FFFFFF;font-size: 26px">ส่งรหัสผ่าน</button>





 </center></font></b>  </div> 

  
 
 

</div>
     
<br>
 
     </div>
   </div>
</div>
 
 </div>
 
<script>
    	$("#btn_close_alert_popup_send").click(function(){   
 
   $( "#alert_show_send_password" ).hide();
   
   
   $('#signin_load_popup').html('');
   
 
  });
  
  
  
  

</script>

