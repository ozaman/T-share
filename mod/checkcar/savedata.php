<?
if($_GET[type]=="usecar"){  ?>

 

<?

 


 
if($_GET[usecar]=='start'){

$use='เริ่มใช้รถ';
}
if($_GET[usecar]=='finish'){

$use='เลิกใช้รถ';
}

 
///echo $use;

$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$db->add_db('driver_use_car',array(
 		
		
		 	"type"=>"$_GET[usecar]", 
			 
			"posted"=>"$_SESSION[admin_user]",
			"post_date"=>"".TIMESTAMP."",
						
			"car_number"=>"$_GET[car]", 
			"drivername"=>"$_GET[drivername]", 			
				
			////
			"check_water"=>"$_GET[check_water]",
			"check_rain"=>"$_GET[check_rain]",
			"check_rubber"=>"$_GET[check_rubber]",
			"check_oil"=>"$_GET[check_oil]",			
			
			////
		  	"lat" => "$_GET[lat]",
		  	"lng" => "$_GET[lng]",		
			
			"mile" => "$_GET[check_mile]",		
			"mile_use" => "$_GET[check_mile_use]",		   		   
		   
		 	"start_time"=>"".TIMESTAMP.""
			//"finish_time"=>"$_POST[finish_time]" 			
 	

	
		));
        $db->closedb();
		
		
 
 
 ///// update user
		 
		 $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
         $db->update_db(TB_driver, array(
            "car_number_use" => "$_GET[car]",
			 "status_usecar" => "$_GET[usecar]",
			
              "update_date_usercar" => "" . TIMESTAMP . ""
        ), " id=$_GET[drivername] ");
        $db->closedb();
		
		
		
		
		
		?>
		  
              <div class="alert alert-success alert-dismissible" style="margin-top:5px; margin-bottom:-10px; padding:5px; " id="save">
                     <i class="fa fa-check"></i>  บันทึกข้อมูลการ <?=$use?> สำเร็จ
              </div>
 
 <script>
 setTimeout(function(){ 
 $('#save').fadeOut(2000);
 }, 1000);
 
 
 
 
  setTimeout(function(){ 
$( "#load_data_manage_work_show" ).toggle();
 }, 3000);
 
 
 
 
   var url_car = "go.php?name=checkcar/load&file=start&type=usecar&drivername=<?=$user_id;?>&usecar=start";
   
  
 $("#load_status_use_car").load(url_car);
 
 
 
 
 
   var url_car_main_start = "go.php?name=checkcar/load&file=main&type=usecar&drivername=<?=$user_id;?>&usecar=start";   
  
 $("#load_main_use_car").load(url_car_main_start);
 
 
 
 
 
 </script>
		<?
}

?> 

 


<?
if($_GET[type]=="repair"){

/*
@mkdir("pic/carwash/".TIMESTAMP."", 0777);

@copy ($_FILES['pic_file_1']['tmp_name'] , "pic/carwash/".TIMESTAMP."/1.png" ); 
@copy ($_FILES['pic_file_2']['tmp_name'] , "pic/carwash/".TIMESTAMP."/2.png" ); 
@copy ($_FILES['pic_file_3']['tmp_name'] , "pic/carwash/".TIMESTAMP."/3.png" ); 
@copy ($_FILES['pic_file_4']['tmp_name'] , "pic/carwash/".TIMESTAMP."/4.png" ); 
@copy ($_FILES['pic_file_5']['tmp_name'] , "pic/carwash/".TIMESTAMP."/5.png" ); 

*/
 
 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$db->add_db('driver_send_repair',array(
 
			"type"=>"1",
			"detail"=>"$_POST[detail]",
			
			"driver_id"=>"".$user_id."",
			
			"car_id"=>"$_POST[car]",
  
			"posted"=>"$_SESSION[admin_user]",

			"post_date"=>"".TIMESTAMP."",

			"update_date"=>"".TIMESTAMP.""

		));
        $db->closedb();
		?>
		  
              <div class="alert alert-success alert-dismissible" style="margin-top:5px; margin-bottom:-10px; padding:5px; " id="save">
                     <i class="icon fa fa-check"></i>  ส่งข้อมูลการแจ้งซ่อมสำเร็จ
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
if($_GET[type]=="carcare"){

/*
@mkdir("pic/carwash/".TIMESTAMP."", 0777);

@copy ($_FILES['pic_file_1']['tmp_name'] , "pic/carwash/".TIMESTAMP."/1.png" ); 
@copy ($_FILES['pic_file_2']['tmp_name'] , "pic/carwash/".TIMESTAMP."/2.png" ); 
@copy ($_FILES['pic_file_3']['tmp_name'] , "pic/carwash/".TIMESTAMP."/3.png" ); 
@copy ($_FILES['pic_file_4']['tmp_name'] , "pic/carwash/".TIMESTAMP."/4.png" ); 
@copy ($_FILES['pic_file_5']['tmp_name'] , "pic/carwash/".TIMESTAMP."/5.png" ); 

*/
 
 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$db->add_db('driver_send_carcare',array(
 
			"type"=>"1",
			"detail"=>"$_POST[detail]",
			
			"rubber"=>"$_POST[rubber]",
			"water"=>"$_POST[water]",
			"rain"=>"$_POST[rain]",
			"oil"=>"$_POST[oil]",
 
  
			"driver_id"=>"".$user_id."",
			
			"car_id"=>"$_POST[car]",
  
			"posted"=>"$_SESSION[admin_user]",

			"post_date"=>"".TIMESTAMP."",

			"update_date"=>"".TIMESTAMP.""

		));
        $db->closedb();
		
		
 
		 

 	
		?>
		  
              <div class="alert alert-success alert-dismissible" style="margin-top:5px; margin-bottom:-10px; padding:5px; " id="save">
                     <i class="icon fa fa-check"></i>  ส่งข้อมูลการแจ้งซ่อมสำเร็จ
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
		  
              <div class="alert alert-danger alert-dismissible" style="margin-top:5px; margin-bottom: 10px; padding:5px;  margin-left:20px; margin-right:22px;" id="save">
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
		  
              <div class="alert alert-danger alert-dismissible" style="margin-top:5px; margin-bottom:-10px; padding:5px; " id="save">
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
		  
              <div class="alert alert-danger alert-dismissible" style="margin-top:5px; margin-bottom: 0px; padding:5px; " id="save">
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
		  
              <div class="alert alert-danger alert-dismissible" style="margin-top:5px; margin-bottom:-10px; padding:5px; " id="save">
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
		  
              <div class="alert alert-danger alert-dismissible" style="margin-top:5px; margin-bottom:-10px; padding:5px; " id="save">
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
