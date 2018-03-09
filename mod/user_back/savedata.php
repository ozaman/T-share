 
<?
 
 
 



if($_GET[type]=="selectcar"){


$db->connectdb(DB_NAME_DATA, DB_USERNAME, DB_PASSWORD);
$res[car_history] = $db->select_query("SELECT * FROM history_use_car WHERE drivername='".$_GET[id] ."'  order by id desc limit 1   "); 
$arr[car_history] = $db->fetch($res[car_history]);

 $arr[car_history][type];

 /*
         $db->update_db('history_use_car', array(
		 "drivername" => "$_GET[id]",
            "car_number" => "$_POST[car_number]",
			"type" => "$_POST[type]",
              "update_date" => "" . TIMESTAMP . ""
        ), " id=$_GET[id] ");
        $db->closedb();
		date('Y-m-d')
		*/

		$db->add_db('history_use_car',array(
 		  "start_time"=>"".TIMESTAMP."",
		  "finish_time"=>"".TIMESTAMP."",
		  
		 "drivername" => "$_GET[id]",
            "car_number" => "$_POST[car_number]",
			"type" => "$_POST[type]",
			 "transfer_date"=>"".date('Y-m-d')."",
 
   "post_date"=>"".TIMESTAMP."",
			"update_date"=>"".TIMESTAMP.""
		));

        $db->closedb();
		 
		?>
 
              <div class="alert alert-success alert-dismissible" style="margin-top:0px; margin-bottom: 10px; padding:5px;  font-size:20px; height:40px; " id="save">
                     <div style="margin-top:-0px; "><i class="fa fa-automobile"></i>  บันทึกข้อมูลสำเร็จ</div>
              </div>
			  
<? if($_POST[type]=='start'){ ?>
<script>
 $('#car_number').attr('disabled', true);

</script>

<? } ?>

<? if($_POST[type]=='stop'){ ?>
<script>
 $('#car_number').attr('disabled', false);

</script>

<? } ?>
			  
 
 <script>
 setTimeout(function(){ 
   $('#index_load_car_use').show(); 
 
  $('#index_load_car_use').load('go.php?name=user&file=car_used&type=text'); 
$('#index_load_car_use_select').load('go.php?name=user&file=car_used&type=select'); 
 
 }, 1000);
 
 
 setTimeout(function(){ 
 
 $('#save').fadeOut(3000);
 
 }, 1000);
 
  $('#index_load_car_use').addClass('tab_alert');
  
  setTimeout(function(){  
  $('#index_load_car_use').removeClass('tab_alert');
 
 }, 3000);
 
 
 
 
 </script>
		<?
}

?>








<?
if($_GET[type]=="password"){
 
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
         $db->update_db(TB_driver, array(
            "password" => "$_POST[newpassword]",
              "update_date" => "" . TIMESTAMP . ""
        ), " id=$_GET[id] ");
        $db->closedb();
		?>
		  
              <div class="alert alert-success alert-dismissible" style="margin-top:5px; margin-bottom:-10px; padding:5px; " id="save">
                     <i class="icon fa fa-check"></i>  บันทึกรหัสผ่านสำเร็จ
              </div>
 
 <script>
 setTimeout(function(){ 
 $('#save').fadeOut(2000);
 
 }, 1000);
 
 
 
 </script>
 <script>
 setTimeout(function () {
   window.location.href = "logout.php"; //will redirect to your blog page (an ex: blog.html)
}, 4000); //w
 
 </script>
		<?
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
               "password" => "$_POST[password]",
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
		  
              <div class="alert alert-success alert-dismissible"  id="save">
                     <i class="fa fa-check"></i>  บันทึกข้อมูลส่วนตัวสำเร็จ 
              </div>
 
 <script>
 setTimeout(function(){ 
 $('#save').fadeOut(3000);
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
		  
              <div class="alert alert-success alert-dismissible"  id="save">
                     <i class="fa fa-check"></i>  บันทึกข้อมูลส่วนตัวสำเร็จ
              </div>
 
 <script>
 setTimeout(function(){ 
 $('#save').fadeOut(3000);
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
