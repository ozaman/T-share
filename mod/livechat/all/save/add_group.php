

<?
 
if($_GET[type]=="del_group"){ 
 
 $db->connectdb(DB_NAME_CHAT_CONTACT, DB_USERNAME, DB_PASSWORD);
 $db->del('history_add_group'," add_time='".$_GET[time]."' "); 
 
 }
?>









<?

 //// เช็คการสร้างกลุ่ม

if($_GET[type]=="add_group"){ 
/// echo $_GET[id];
 //echo $_GET[action];
 
 
 
 
?>
 
 


<?
 

$db->connectdb(DB_NAME_CHAT_CONTACT, DB_USERNAME, DB_PASSWORD);
 
 
 if($_GET[action]=="add"){ 
 
		$db->add_db('history_add_group',array(
 		  
 	 "chat_id" => "$_GET[id]",
      "add_time" => "$_GET[time]",
 
   "post_date"=>"".TIMESTAMP.""
		 
		));
		
		}
		

 


		
		
	 if($_GET[action]=="delete"){ 			
		
				$db->del('history_add_group'," chat_id='".$_GET[id]."' "); 
		
		
			}
		
	$db->connectdb(DB_NAME_CHAT_CONTACT, DB_USERNAME, DB_PASSWORD);	
	
	
 $sum_user = $db->num_rows('history_add_group',"id","add_time='".$_GET[time]."'");

 $res[chat] = $db->select_query("SELECT * FROM  history_add_group where add_time='".$_GET[time]."'  ORDER BY chat_id ASC ");
 

while($arr[chat] = $db->fetch($res[chat])){


 
 $arr[chat][chat_id];
 $res[chatuser] = $db->select_query("SELECT * FROM  chat_group where id=".$arr[chat][chat_id]."  ORDER BY name DESC ");
 

$arr[chatuser] = $db->fetch($res[chatuser]);

		 
		?> 
		
  <?

  
$filename = "../data/images/logo//".$arr[chatuser][company].".jpg";
if (file_exists($filename)) { // Ǩͺ
?>

<img src="../data/images/logo/<?=$arr[chatuser][company];?>.jpg?v=<?=time()?>" width="55" height="55" border="0" class="mainpic_index"  style="border:solid 1px; border-color:<?=$main_color?>;border-radius:0px; margin-top:5px;" />

 	
		
	    <? }else { ?>
 
 
				<img src="../data/images/nologo.png" width="55" height="55" border="0" class="mainpic_index"  style="border:solid 1px; border-color:#DADADA;border-radius:5px;" />
		
		
        <?
}
?>
		
		
		
		
		
 
 





<? } ?>
   
   
   

 
  <script>

document.getElementById('all_user').value='<?=$sum_user?>';

</script>
 
 <? if($sum_user > 0 ){?>
 
 <div style="padding-top:5px; font-size:16px; color:#006699"><b>จำนวนเอเย่นต์ที่่เลือก <?=$sum_user?> คน</div>
 
 
 
 
  <script>
  $('#show_btn_add_group').show();  
 
 $('#td_btn_add_group').html('<button class="input-group-addon" style="background-color:<?=$main_color?>; width:50px;" id="btn_add_group"><i class="fa  fa-plus" style="font-size:24px; color:#FFFFFF"></i></button>');  
 
  </script>
  
  
 <? } ?>
 
 
  <? if($sum_user == 0 ){?>
 
 <div style="padding-top:5px; font-size:16px; color:#FF0000">กรุณาเลือกสมาชิกร่วมกลุ่ม</div>
 
   <script>
   
   $('#show_btn_add_group').hide();  
 
 $('#td_btn_add_group').html('<button class="input-group-addon" style="background-color:#999999; width:50px;cursor: not-allowed;" id="btn_add_group"><i class="fa  fa-plus" style="font-size:24px; color:#FFFFFF"></i></button>');  
 
  </script>
 <? } ?>
 
 
 
 <script>
 
 $('#load_data_add_new_group').html('<button class="input-group-addon" style="background-color:#000000; width:50px;" id="btn_add_group"><i class="fa  fa-plus" style="font-size:24px; color:#FFFFFF"></i></button>');  
 
 
 /*
 
 </script>
		<?
}

?>


 

<?
if($_GET[type]=="save_add_group"){

$owner_id=4;

$db->connectdb(DB_NAME_CHAT_CONTACT, DB_USERNAME, DB_PASSWORD);	
 
//// add group 

 $db->add_db('chat_group',array( 	 
 	 "name" => "$_POST[group_name]",
  	"owner_id" => $owner_id,
	"user" => "$_POST[all_user]",
   /// "class_name" => $arr[chatuser][class_name], 
  	 "post_date"=>"".TIMESTAMP.""
		 
 ));


$db->connectdb(DB_NAME_CHAT_CONTACT, DB_USERNAME, DB_PASSWORD);	
 
$tablename      = 'chat_group';
$next_increment     = 0;
$qShowStatus        = "SHOW TABLE STATUS LIKE '$tablename'";
$qShowStatusResult  = mysql_query($qShowStatus) or die ( "Query failed: " . mysql_error() . "<br/>" . $qShowStatus );
$row = mysql_fetch_assoc($qShowStatusResult);
$lass_id = $row['Auto_increment'];
 
////
 
$res[chat] = $db->select_query("SELECT * FROM  history_add_group where add_time='".$_GET[time]."'  ORDER BY chat_id ASC "); 
while($arr[chat] = $db->fetch($res[chat])){

 
//// ข้อมูล user
$res[chatuser] = $db->select_query("SELECT * FROM  chat_user where id=".$arr[chat][chat_id]."  ORDER BY name DESC ");
$arr[chatuser] = $db->fetch($res[chatuser]);


/// add data
 
 $db->add_db('all_list_group_user',array( 	
 
 	"group_id" => $lass_id,	
  	"chat_id" => $arr[chat][chat_id],
    "class_name" => $arr[chatuser][class_name], 
  	 "post_date"=>"".TIMESTAMP.""
		 
		));



}
	 
}

?>










<?
if($_GET[type]=="network"){
 
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
         $db->update_db(TB_driver, array(
            "email" => "$_POST[email]",
			 "skype_id" => "$_POST[skype_id]",
			 "zello_id" => "$_POST[zello_id]",
			          "wechat_id" => "$_POST[wechat_id]",
			 "whatsapp_id" => "$_POST[whatsapp_id]",
            "line_id" => "$_POST[line_id]",
              "update_date" => "" . TIMESTAMP . ""
        ), " id=$_GET[id] ");
 $db->closedb();
 ?>
		  
              <div class="alert alert-success alert-dismissible" style="margin-top:5px; margin-bottom:-10px; padding:5px; " id="save">
                     <i class="icon fa fa-check"></i>  บันทึกข้อมูลช่องทางการติดต่อสื่อสารสำเร็จ
              </div>
  <?  if($_POST[line_id]<>""){ ?> <script type="text/javascript"> $('#line_id').removeClass("tab_alert");</script> <? } ;?> 
    <?  if($_POST[wechat_id]<>""){ ?> <script type="text/javascript"> $('#wechat_id').removeClass("tab_alert");</script> <? } ;?> 
 
 <script>
 setTimeout(function(){ 
 $('#save').fadeOut(2000);
 }, 1000);
 
 </script>
		<?
}

?> 

<?
if($_GET[type]=="user"){
 
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
         $db->update_db(TB_driver, array(
               "password" => "" . $_POST[password] . "",
                  "name_en" => "$_POST[name_en]",
            "name" => "$_POST[name]",
            "nickname" => "$_POST[nickname]",
            "idcard" => "$_POST[idcard]",
            "iddriving" => "$_POST[iddriving]",
 
            "phone" => "$_POST[phone]",
            "contact" => "$_POST[contact]",
            "address" => "$_POST[address]",
 
            "update_date" => "" . TIMESTAMP . ""
        ), " id=$_GET[id] ");
        $db->closedb();
		?>
		  
              <div class="alert alert-success alert-dismissible" style="margin-top:5px; margin-bottom: 10px; padding:5px;  margin-left:20px; margin-right:22px;" id="save">
                     <i class="icon fa fa-check"></i>  บันทึกข้อมูลส่วนตัวสำเร็จ
              </div>
 
 <script>
 setTimeout(function(){ 
 $('#save').fadeOut(2000);
 }, 1000);
 
 </script>
		<?
}

?> 


<?
if($_GET[type]=="bank"){
 
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
         $db->update_db(TB_driver, array(
            "pay_bank_name" => "$_POST[pay_bank_name]",
			 "pay_bank" => "$_POST[pay_bank]",
			 "pay_bank_sub" => "$_POST[pay_bank_sub]",
			          "pay_bank_number" => "$_POST[pay_bank_number]",
               "update_date" => "" . TIMESTAMP . ""
        ), " id=$_GET[id] ");
        $db->closedb();
		?>
		  
              <div class="alert alert-success alert-dismissible" style="margin-top:5px; margin-bottom:-10px; padding:5px; " id="save">
                     <i class="icon fa fa-check"></i>  บันทึกข้อมูลธนาคารสำเร็จ
              </div>
 
 <script>
 setTimeout(function(){ 
 $('#save').fadeOut(2000);
 }, 1000);
 
 </script>
		<?
}

?> 


<?
if($_GET[type]=="phone_add"){
 
$db->add_db('contact_phone_driver',array(
		"phone"=>"$_POST[phone]",
		"name"=>"$_POST[name]",
		"type"=>"$_POST[type]",
		"driver_id"=>$user_id,
  "post_date"=>"".TIMESTAMP."",
			"update_date"=>"".TIMESTAMP.""
 
		));

        $db->closedb();
		?>
		  
              <div class="alert alert-success alert-dismissible" style="margin-top:5px; margin-bottom: 0px; padding:5px; " id="save">
                     <i class="icon fa fa-check"></i>  บันทึกข้อมูลสำเร็จ
              </div>
 
 <script>
 setTimeout(function(){ 
 $('#save').fadeOut(2000);
 	   var url_phone = "go.php?name=load/phone&file=all";
	$('#load_phone_data').show();
	$('#load_phone_data').load('load/page/loading.php');
 $('#load_phone_data').load(url_phone); 
 }, 2000);
 
 </script>
		<?
}

?> 





<?
if($_GET[type]=="phone_edit"){
 
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
         $db->update_db('contact_phone_driver', array(
		"phone"=>"$_POST[phone]",
		"name"=>"$_POST[name]",
		"type"=>"$_POST[type]",
 
			"update_date"=>"".TIMESTAMP.""
			
        ), " id=$_POST[id] ");
        $db->closedb();
		?>
		  
              <div class="alert alert-success alert-dismissible" style="margin-top:5px; margin-bottom:-10px; padding:5px; " id="save">
                     <i class="icon fa fa-check"></i>  แก้ไขบันทึกข้อมูลสำเร็จ
              </div>
<script>
 setTimeout(function(){ 
 $('#save').fadeOut(2000);
 	   var url_phone = "go.php?name=load/phone&file=all";
	$('#load_phone_data').show();
	$('#load_phone_data').load('load/page/loading.php');
 $('#load_phone_data').load(url_phone); 
 }, 2000);
 
 </script>
		<?
}

?> 


<?
if($_GET[type]=="phone_delete"){
 
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
$db->del('contact_phone_driver'," id='".$_GET[id]."' "); 
 
        $db->closedb();
		?>
		  
              <div class="alert alert-success alert-dismissible" style="margin-top:5px; margin-bottom:-10px; padding:5px; " id="save">
                     <i class="icon fa fa-check"></i>  ลบข้อมูลสำเร็จ
              </div>
<script>
 setTimeout(function(){ 
 $('#save').fadeOut(2000);
 	   var url_phone = "go.php?name=load/phone&file=all";
	$('#load_phone_data').show();
	$('#load_phone_data').load('load/page/loading.php');
 $('#load_phone_data').load(url_phone); 
 }, 2000);
 
 </script>
		<?
}

?> 



<?
if($_GET[type]=="card"){
 
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
         $db->update_db(TB_driver, array(
            "idcard_finish" => "$_POST[idcard_finish]",
			 "idcard" => "$_POST[idcard]",
			  "iddriving_finish" => "$_POST[iddriving_finish]",
			 "iddriving" => "$_POST[iddriving]",
			 
 
               "update_date" => "" . TIMESTAMP . ""
        ), " id=$_GET[id] ");
        $db->closedb();
		?>
		  
              <div class="alert alert-success alert-dismissible" style="margin-top:5px; margin-bottom:-10px; padding:5px; " id="save">
                     <i class="icon fa fa-check"></i>  บันทึกข้อมูลสำเร็จ
              </div>
 
 <script>
 setTimeout(function(){ 
 $('#save').fadeOut(2000);
 }, 1000);
 
 </script>
		<?
}

?> 
<?
include("xml/update/id.php");
?>
