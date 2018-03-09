 
  
<? if(1==0){ ?>


 <script>
swal({   

  showCancelButton: true,   
  confirmButtonColor: "#DD6B55",   
  confirmButtonText: "ถูกต้อง",   
  cancelButtonText: "ไม่ถูกต้อง", 
  closeOnConfirm: false,
  closeOnCancel: false,
  showLoaderOnConfirm: true,

title: "ตรวจสอบเวลาและสถานที่", 
  text: "เวลา <?php echo date('H:i:s'); ?><iframe src='popup.php?name=action&file=check_location&col_name=<?=$_POST[col_name];?>&data_id=<?=$_POST[data_id];?>&data_sv=<?=$_POST[data_sv];?>'  ></iframe>",  
   html: true 
    },
 
 function(){   setTimeout(function(){     
 swal( { 
title: "ตรวจสอบเวลาและสถานที่", 
  text: "เวลา <?php echo date('H:i:s'); ?><iframe src='popup.php?name=action&file=check_location&col_name=<?=$_POST[col_name];?>&data_id=<?=$_POST[data_id];?>&data_sv=<?=$_POST[data_sv];?>'  ></iframe>",  
   html: true   }
  );   
 
 
 }, 2000);
   /////// action
   /*
   function(isConfirm){
    if (isConfirm){
		type: "success",
		
      swal("ระบบบันทึกตำแหน่งของคุณสำเร็จ", "success");
	 
	 
    } 
	
	
	else {
	
	 //   $('body').css({overflow:'auto'});
      swal("Amend", "Your imaginary file is safe :)", "error");
	CancelButtonColor: "#000000";
	 
     }
   
   */
   
   
   
   });
 
 
 </script>
 
 
 
 <? } ?>
 
 
<?
 
if($_POST[data_sv] == 'cn'){
	$db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}else{
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}

if($_POST[col_name] == "driver_topoint"){
	//////////////////////////////////////////// ó Database Edit
 
	//include "admin/admin/car/driver/user/share.php";
	//*
 
		$db->update_db(TB_order,array(
			//"driver_topoint"=>"1",
			"driver_topoint"=>"1",
			"driver_topoint_date"=>"".time()."",	
		)," id='".$_POST[data_id]."' ");
		$db->closedb ();
		?>
		<script type="text/javascript">
$('#iconchk_s1').attr("src", "images/yes.png");
$('#checkstep_1').addClass("checkinstep_active");

$('#tab_to_<?=$_POST[data_id]?>').removeClass("tab_alert");
$('#tab_pickup_<?=$_POST[data_id]?>').addClass("tab_alert");

$('#btn_topoint<?=$_POST[data_id]?>').addClass("tab_alert");


 
	var url_map<?=$_POST[data_id];?> = "popup.php?name=map&file=view&sv=<?=$_POST[data_sv];?>&bookid=<?=$_POST[data_id];?>&type=driver_topoint";
$('#mapto_<?=$_POST[data_id];?>').load(url_map<?=$_POST[data_id];?>);
 
</script>
		
		<?
		//*/
}

if($_POST[col_name] == "driver_pickup"){
	//////////////////////////////////////////// ó Database Edit
 
	
	//*
		if($_POST[data_val] == 1){
 
			$db->update_db(TB_order,array(
			//"driver_pickup"=>"1",
			"driver_pickup"=>"0",
			"driver_pickup_date"=>"".time()."",	
			)," id='".$_POST[data_id]."' ");
		$db->closedb ();
		}else{	
		$db->update_db(TB_order,array(
			//"driver_pickup"=>"2",
			"driver_pickup"=>"0",
			"driver_pickup_date"=>"".time()."",
			"driver_remark"=>"".$_POST[driver_remark_noguest]."",	
		)," id='".$_POST[data_id]."' ");
		
		
		/////
		$db->add_db('web_driver_send_remark',array(

			"vc"=>"$_POST[data_id]",
			"type"=>"$_POST[driver_remark]",
			"detail"=>"$_POST[driver_remark_detail]",
			"invoice"=>"$_POST[data_vc]",
			
			
			"server"=>"$_POST[data_sv]",
			  
			"posted"=>"$_SESSION[admin_user]",

			"post_date"=>"".TIMESTAMP."",

			"update_date"=>"".TIMESTAMP.""

 

		));
		
		
		$db->closedb ();
		////
		}
		?>
		<script>
$('#iconchk_s2').attr("src", "images/yes.png");
$('#checkstep_2').addClass("checkinstep_active");

$('#tab_pickup_<?=$_POST[data_id]?>').removeClass("tab_alert");
$('#tab_complete_<?=$_POST[data_id]?>').addClass("tab_alert");
 
 	var url_map<?=$_POST[data_id];?> = "popup.php?name=map&file=view&sv=<?=$_POST[data_sv];?>&bookid=<?=$_POST[data_id];?>&type=driver_pickup&data_val=<?=$_POST[data_val];?>";
$('#mappickup_<?=$_POST[data_id];?>').load(url_map<?=$_POST[data_id];?>);
 
		</script>
		
		<?
		//*/
}

if($_POST[col_name] == "driver_complete"){
	//////////////////////////////////////////// ó Database Edit
 ?>
 
 <script>

$('#iconchk_s3').attr("src", "images/yes.png");
$('#checkstep_3').addClass("checkinstep_active");

$('#tab_complete_<?=$_POST[data_id]?>').removeClass("tab_alert");

 	var url_map<?=$_POST[data_id];?> = "popup.php?name=map&file=view&sv=<?=$_POST[data_sv];?>&bookid=<?=$_POST[data_id];?>&type=driver_complete&data_val=<?=$_POST[data_val];?>";
$('#mapcomplete_<?=$_POST[data_id];?>').load(url_map<?=$_POST[data_id];?>);
 
 
		</script>
 <?
	//include "admin/admin/car/driver/user/share.php";
	//*

		$db->update_db(TB_order,array(
			//"driver_complete"=>"1",
			"driver_complete"=>"1",
			"driver_complete_date"=>"".time()."",
		)," id='".$_POST[data_id]."' ");
		$db->closedb ();
		//*/
 
		
}

/*
$_POST[col_name] = "driver_pickup";
$_POST[data_sv] = "TH";
$_POST[data_id] = "250644";
*/
//include "action_share.php";

?>
<br />
 <style>
 iframe {
 
  
    border: none;
    top: 0; right: 0;
    bottom: 0; left: 0;
    width: 100%;
    height: 400px;;
}
 
 </style>
 
<iframe src="popup.php?name=action&file=share&col_name=<?=$_POST[col_name];?>&data_id=<?=$_POST[data_id];?>&data_sv=<?=$_POST[data_sv];?>"  ></iframe>
 