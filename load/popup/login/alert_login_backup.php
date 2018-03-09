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


</style>

<?

 $popup_icon_left_arow='<i class="fa fa-close" style="font-size:24px; color:#FFFFFF "></i>';
?>

 
 
<div id="alert_show_popup_login" style="display:none;z-index:99999;  ">

<div class="outer-login" >
   <div class="inner-login">
     <div class="centered-login"><center>
 
           <div class="back-full-popup"> 
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div class="button-close-popup-mod" ><?=$popup_icon_left_arow;?></div></td>
  <td   ><div style="font-size:22px; color:#FFFFFF " id="text_mod_topic_action" class="text-topic-action-mod">เข้าสู่ระบบ</div></td>
    <td width="50" align="right"   ><div style="font-size:22px; color:#FFFFFF " id="head_full_popup_icon"><i class="fa fa-sign-in" style=" font-size:26px;"  ></i></div></td>
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
      
      
    
    
    
    
    
    
    
    
     
    
     <div style="text-align:left; font-size:18px; font-weight:bold">ชื่อผู้ใช้งาน</div>
      <div class="form-group has-feedback" >
      
 
      
 
      <?
if($_GET['autologin']) {
 
?> 
   <input name="loginusername"    id="loginusername" maxlength="7" style="font-size:18px ; height:40px;  text-transform:uppercase; background-color:#fff" value="<?=$_GET['user'];?>" placeholder="ชื่อผู้ใช้งาน" autocomplete="off">    
 
        
       <? } else {?>  
        

                <input name="loginusername"  class="form-control" id="loginusername"  maxlength="7" style="font-size:18px ; height:40px;  text-transform:uppercase;background-color:#fff" value="<?=$_COOKIE['app_remember_user'];?>" placeholder="ชื่อผู้ใช้งาน" autocomplete="off">
        
        
<? } ?>
        
        
        
        
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
       
     <div style="text-align:left; font-size:18px; font-weight:bold">รหัสผ่าน</div>

      <div class="form-group has-feedback">
     
     
     
     
      
      
      <?
if($_GET['autologin']) {
 
?> 


  <input name="loginpassword"  id="loginpassword"  type="password" class="form-control"  style="font-size:18px ; height:40px;"   value="<?=$_GET['pass'];?>" placeholder="รหัสผ่าน" autocomplete="off">    
      

        
            <? } else {?> 
            <input name="loginpassword"  id="loginpassword"  type="password" class="form-control"  style="font-size:18px ; height:40px;"   value="<?=$_COOKIE['app_remember_pass'];?>" placeholder="รหัสผ่าน" autocomplete="off">         
            

               
    <? } ?>    
        
 
        
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
   <div class="form-group has-feedback">
	  		<div style="width:100%; background-color:#FFFFFF; margin-top:-10px; "><table  border="0" cellspacing="0" cellpadding="0" style="width:100%; background-color:#FFFFFF ">
  <tr>
    <td style="background-color:#FFFFFF "  > <div class="checkbox icheck" style="margin-left:  0px; " >
            <label>
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

 
              <input type="checkbox" name="chk_remem" id="chk_remem" class="radio-password"  <?=$chk_remem;?>    >
			  
			  <input type="hidden" name="remember" id="remember" value="<?=$remember;?>" />	
			  
            </label>&nbsp;
			<font style="font-size: 18px ">จดจำข้อมูลเข้าสู่ระบบ</font>
          </div></td>

  </tr>
  
  <tr>
      <td style="background-color:#FFFFFF ">  <button type="button" id="submit_login" class="btn btn-block " style="background-color:#17B3B2; color:#FFFFFF;font-size: 26px">เข้าสู่ระบบ</button></td>
  
  </tr>
  
</table>
</div>
      


		
		
       
        </div>
 
	    
		
 
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
 
 
 $( "#alert_show_popup_login" ).fadeOut();
 
  });

</script>