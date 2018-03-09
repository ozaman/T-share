  <? //  include ("load/loading/page_mod.php");?> 

<style>
 
.outer-loading-mod {
    position: fixed; margin-left: 0px; margin-top: 0px; display:table; top:0; left:0;  
    width: 100%; /* This could be ANY width */
    height: 100%; /* This could be ANY height */
   z-index:9999; background:#FFF; 
 
}

.inner-loading {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
	    width: 100%; /* This could be ANY width */
    height: 100%; /* This could be ANY height */
	background:none;    
}

 .navload {
  display: block;
  background-color: #f7f7f7;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#f7f7f7), to(#e7e7e7));
  background-image: -webkit-linear-gradient(top, #f7f7f7, #e7e7e7); 
  background-image: -moz-linear-gradient(top, #f7f7f7, #e7e7e7); 
  background-image: -ms-linear-gradient(top, #f7f7f7, #e7e7e7); 
  background-image: -o-linear-gradient(top, #f7f7f7, #e7e7e7); 
color: <?=$main_color?>;
 
  width:  60px;
  height: 60px;
 
  text-align: center;
 
  border-radius: 50%;
  box-shadow: 0px 3px 8px #aaa, inset 0px 2px 3px #fff;
}


</style>


 <script>
 var load_main_mod='<div class="outer-loading-mod"   id="main_index_load_page_mod"><div class="inner-loading"><center><span  class="navload"><i class="fa fa-circle-o-notch fa-spin 4x" style="font-size:40px;   margin-top:10px " ></i></center></span><div style="font-size:14px; color:#333333; font-weight:normal;  margin-top:10px " ><center><span id="navload_topic"> โหลดข้อมูล</span></center></div></div></div>';
</script>


 <script>
 var load_main_mod_table='<br><center><span  class="navload"><i class="fa fa-circle-o-notch fa-spin 4x" style="font-size:40px;   margin-top:10px " ></i></center></span><div style="font-size:18px; color:#333333; font-weight:normal;  margin-top:10px " ><center><span id="navload_topic">กำลังส่งรหัสผ่าน</span></center></div';
</script>
 
 
<?
 
require_once("includes/config.in.php");
require_once("includes/class.mysql.php");
require_once("includes/function.in.php");
$db = New DB();


$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD); 


if($_POST[send_password_type]=='username'){
	
	
  $type='ชื่อผู้ใช้งาน';
	
 
 
$res[admin] = $db->select_query("SELECT * FROM  web_driver WHERE username='".$_POST[password_username]."'  "); 

}


if($_POST[send_password_type]=='phone'){
	
$type='เบอร์โทรศัพท์';
	
 
$res[admin] = $db->select_query("SELECT * FROM  web_driver WHERE phone='".$_POST[password_phone]."'  "); 

}


if($_POST[send_password_type]=='email'){
	
$type='อีเมล์';
	
 
$res[admin] = $db->select_query("SELECT * FROM  web_driver WHERE phone='".$_POST[password_email]."'  "); 

}
 
 $arr[admin] = $db->fetch($res[admin]);

 
 
 $arr[admin][username];
 

 
  ?>
  
    
 
  
  
  
  <? if($arr[admin][username]<>'' and $arr[admin][email]<>'' ){
	  
	  
	  
	  
	  
	    ?>
        
      <?    include ("load/popup/login/alert_send.php");?> 
        
  
  
  
  
 
  
  
  <script>
  
  
 /// alert(<?=$arr[admin][id]?>);


  
 ///$('#alert_show_send_password').show();
   
 
 
 $("#submit_password_send").click(function(){   
 
 
 
 
 
 
  if(document.getElementById('send_password_to').value=='email') {
	  
 

   
   
  $("#load_form_main_password").hide(); 
  
   $("#load_form_data_send_password").show(); 
   
   
   
 $("#load_form_data_send_password").html(load_main_mod_table);
 

   
 var url_email = "go.php?name=user/sendmail&file=email&id=<?=$arr[admin][id]?>";
	 
 $('#load_form_data_send_password').load(url_email); 
 
 

  }
  
  
 
  
    if(document.getElementById('send_password_to').value=='sms') {
 
   
   
  $("#load_form_main_password").hide(); 
  
   $("#load_form_data_send_password").show(); 
   
   
   
 $("#load_form_data_send_password").html(load_main_mod_table);
 
 
   
 var url_phone = "go.php?name=user/sendmail&file=phone&id=<?=$arr[admin][id]?>&username=<?=$arr[admin][username]?>&password=<?=$arr[admin][password]?>&phone=<?=$arr[admin][phone]?>";
 
 
  $('#load_form_data_send_password').load(url_phone); 
  
  
  
  
  
 

  }


  ////  alert($("#send_password_to" ).val());
 
  });
  
 
  
  
  	//var url = "go.php?name=user/sendmail&file=email&id=<?=$arr[admin][id]?>";
	 
 /// $('#send_email_data').load(url); 
  
 
  
  </script>
  
 
  <style>
 
 .div-all-work{
	 padding:5px;   border-radius: 10px; border: 3px solid #ddd;   background:#F6F6F6; margin-bottom:20px; margin-top:10px; box-shadow: 0px  0px 10px #DADADA  ;
	 
 }
 
 
  .div-all-palce{
	 padding:5px;   border-radius: 0px; border: 1px solid #ddd;background-color:#F6F6F6;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ;
	 
 }
 
 
 
 </style>
 
 
 
  
  
  
  <? } ?>
  
 <? if($arr[admin][username]<>'' and $arr[admin][email]==''   ){  ?>
 
 
  
  <script>
 
   
  $("#load_form_main_password").hide(); 
  
   $("#load_form_data_send_password").show(); 
   
   
   
 $("#load_form_data_send_password").html(load_main_mod_table);
 
 
   
 var url_phone = "go.php?name=user/sendmail&file=phone&id=<?=$arr[admin][id]?>&username=<?=$arr[admin][username]?>&password=<?=$arr[admin][password]?>&phone=<?=$arr[admin][phone]?>";
 
 
  $('#load_form_data_send_password').load(url_phone); 
  
  </script>
  
  
  
  
  
 
  
 <? } ?>
  
  
  
  
  <?   if($arr[admin][username]==''){  ?>
 <div style="padding:5px; background-color:#FF0000 ; margin-top:10px;border-radius: 5px; font-size:18px; "><font color="#FFFFFF"> 
  ไม่พบ<?=$type?>ในระบบ</font> </div>
 
 
	<?
}
?>
  
  
  
  <div id="signin_load_popup_send_password"></div>
  
  
 