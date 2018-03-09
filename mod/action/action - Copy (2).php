<?
 
//echo $_POST[data_id];
 
if($_POST[data_sv] == 'cn'){
	$db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}else{
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}

$res[vc] = $db->select_query("SELECT  invoice  FROM ".TB_order."  where id='".$_POST[data_id]."'  limit 1");
$arr[vc] = $db->fetch($res[vc]);
 

if($_POST[col_name] == "driver_topoint"){
	////////////////////////////////////////////  
	////// งานรวม
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$db->update_db(TB_transfer_report_all,array(
			"driver_topoint"=>"0",
			"driver_topoint_date"=>"".time()."",	
		)," id='".$_POST[data_id]."' ");
		$db->closedb ();
	
	
 if($_POST[data_sv] == 'cn'){
	$db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}else{
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}

		  	$db->update_db('web_transfer_report',array(
			"driver_topoint"=>"0",
			"driver_topoint_date"=>"".time()."",	
		)," id='".$_POST[data_report_id]."' ");
 
  		$db->update_db(TB_order,array(
			"driver_topoint"=>"0",
			"driver_topoint_date"=>"".time()."",	
		)," invoice='".$_POST[data_vc]."' ");
		$db->closedb ();
		
		
		
		?>
		 <script type="text/javascript">
$('#iconchk_s1_<?=$_POST[data_id]?>').attr("src", "images/yes.png");
$('#checkstep_1_<?=$_POST[data_id]?>').addClass("checkinstep_active");

$('#tab_to_<?=$_POST[data_id]?>').removeClass("tab_alert");
$('#tab_pickup_<?=$_POST[data_id]?>').addClass("tab_alert");

//$('#btn_topoint<?=$_POST[data_id]?>').addClass("tab_alert");

$('#mapto_<?=$_POST[data_id];?>').load('load/page/loading_mini.php');
 
	var url_map<?=$_POST[data_id];?> = "popup.php?name=map&file=view&sv=<?=$_POST[data_sv];?>&bookid=<?=$_POST[data_id];?>&type=driver_topoint";
$('#mapto_<?=$_POST[data_id];?>').load(url_map<?=$_POST[data_id];?>);
 
</script>
		<?
		//*/
}

if($_POST[col_name] == "driver_pickup"){
	//////////////////////////////////////////// ó Database Edit
 
	
////////////////// เจอแขก
		if($_POST[data_val] == 1){
				
		////// งานรวม
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$db->update_db(TB_transfer_report_all,array(
			"driver_pickup"=>"0",
			"driver_pickup_date"=>"".time()."",	
		)," id='".$_POST[data_id]."' ");
		$db->closedb ();
		
if($_POST[data_sv] == 'cn'){
$db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}else{
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}

			$db->update_db('web_transfer_report',array(
			"driver_pickup"=>"0",
			"driver_pickup_date"=>"".time()."",	
		)," id='".$_POST[data_report_id]."' ");
 
 	
			$db->update_db(TB_order,array(
			"driver_pickup"=>"0",
			"driver_pickup_date"=>"".time()."",	
)," invoice='".$_POST[data_vc]."' ");

		$db->closedb ();
		
		
		}else{	
		
////////////////// ไม่เจอแขก
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$db->update_db(TB_transfer_report_all,array(
			"driver_pickup"=>"2",
			"driver_pickup_date"=>"".time()."",	
		)," id='".$_POST[data_id]."' ");
		$db->closedb ();
		

if($_POST[data_sv] == 'cn'){
$db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}else{
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}

			$db->update_db('web_transfer_report',array(
			"driver_pickup"=>"2",
			"driver_pickup_date"=>"".time()."",	
		)," id='".$_POST[data_report_id]."' ");
 
		$db->update_db(TB_order,array(
 			"driver_pickup"=>"2",
			"driver_pickup_date"=>"".time()."",
			"driver_remark"=>"".$_POST[driver_remark_noguest]."",	
		)," invoice='".$_POST[data_vc]."' ");
				
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
$('#iconchk_s2_<?=$_POST[data_id]?>').attr("src", "images/yes.png");
$('#checkstep_2_<?=$_POST[data_id]?>').addClass("checkinstep_active");

$('#tab_pickup_<?=$_POST[data_id]?>').removeClass("tab_alert");
$('#tab_complete_<?=$_POST[data_id]?>').addClass("tab_alert");


$('#mappickup_<?=$_POST[data_id];?>').load('load/page/loading_mini.php');
 
 	var url_map<?=$_POST[data_id];?> = "popup.php?name=map&file=view&sv=<?=$_POST[data_sv];?>&bookid=<?=$_POST[data_id];?>&type=driver_pickup&data_val=<?=$_POST[data_val];?>";
$('#mappickup_<?=$_POST[data_id];?>').load(url_map<?=$_POST[data_id];?>);

$('#show_price<?=$_POST[data_id]?>').show();
 
		</script>
		
		<?
		//*/
}

if($_POST[col_name] == "driver_complete"){
	//////////////////////////////////////////// ó Database Edit
 ?>
 
 <script>

$('#iconchk_s3_<?=$_POST[data_id]?>').attr("src", "images/yes.png");
$('#checkstep_3_<?=$_POST[data_id]?>').addClass("checkinstep_active");

$('#tab_complete_<?=$_POST[data_id]?>').removeClass("tab_alert");

$('#mapcomplete_<?=$_POST[data_id];?>').load('load/page/loading_mini.php');


 	var url_map<?=$_POST[data_id];?> = "popup.php?name=map&file=view&sv=<?=$_POST[data_sv];?>&bookid=<?=$_POST[data_id];?>&type=driver_complete&data_val=<?=$_POST[data_val];?>";
$('#mapcomplete_<?=$_POST[data_id];?>').load(url_map<?=$_POST[data_id];?>);

$('#show_price<?=$_POST[data_id]?>').show();
 
 
		</script>
 <?
	//include "admin/admin/car/driver/user/share.php";
	//*
		////// งานรวม
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$db->update_db(TB_transfer_report_all,array(
			"driver_complete"=>"0",
			"driver_complete_date"=>"".time()."",
		)," id='".$_POST[data_id]."' ");
		$db->closedb ();
		
 
 if($_POST[data_sv] == 'cn'){
$db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}else{
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}
 		$db->update_db('web_transfer_report',array(
			"driver_complete"=>"0",
			"driver_complete_date"=>"".time()."",
		)," id='".$_POST[data_report_id]."' ");
 
 	
			$db->update_db(TB_order,array(
			"driver_complete"=>"0",
			"driver_complete_date"=>"".time()."",
)," invoice='".$_POST[data_vc]."' ");

		$db->closedb ();
 
 
		
}

/*
$_POST[col_name] = "driver_pickup";
$_POST[data_sv] = "TH";
$_POST[data_id] = "250644";
*/
//include "action_share.php";

$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$db->update_db(TB_transfer_report_all,array(
			"driver_lastpoint_date"=>"".time()."" 
		)," id='".$_POST[data_id]."' ");
		$db->closedb ();
?>
<br />
  
 
<iframe src="popup.php?name=action&file=share&col_name=<?=$_POST[col_name];?>&data_vc=<?=$_POST[data_vc];?>&data_id=<?=$_POST[data_id];?>&data_report_id=<?=$_POST[data_report_id];?>"  ></iframe>
 