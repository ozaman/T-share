 <?

if($_GET[action]=="check_driver_topoint"){  
	
	/////
     $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        /*$db->update_db('order_booking', array(
 	
 "date_".$_GET[type] => "" . TIMESTAMP . "" ,
 "check_".$_GET[type] => "0",  
  "update_date" => "" . TIMESTAMP . ""
		)," id='".$_GET[id]."' ");*/
		
$db->update_db('order_booking', array(
 $_GET[type].'_date' => "" . TIMESTAMP . "" ,
 $_GET[type] => "1",  
 "check_".$_GET[type] => "1",  
 $_GET[type]."_lat" => $_GET[lat],  
 $_GET[type]."_lng" => $_GET[lng],  
  "update_date" => "" . TIMESTAMP . "")," id='".$_GET[id]."' ");
		$db->closedb ();
 
	////
	
		
 $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
		
$res[project] = $db->select_query("SELECT id,drivername,program FROM  order_booking  where  id='".$_GET[id]."' ");
$arr[project] = $db->fetch($res[project]);
  
  
$res[place] = $db->select_query("SELECT topic_th FROM  shopping_product  where  id='".$arr[project][program]."' ");
$arr[place] = $db->fetch($res[place]);
  
		 
 
  ////// สร้างไฟล์
$folder_xml="../data/xml";
$newvc = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<update>\n";
 
///$newvc .= "<id>".$arr[chatlast][id]."</id>\n";
$newvc .= "<status>1</status>\n";
$newvc .= "<time>".time()."</time>\n";
$newvc .= "<date>".date("H:i:s")."</date>\n";

$newvc .= "<driver>".$arr[project][drivername]."</driver>\n"; 
$newvc .= "<place>".$arr[project][program]."</place>\n"; 
$newvc .= "<placename>".$arr[place][topic_th]."</placename>\n"; 


$newvc .= "<type>".$_GET[action]."</type>\n"; 
$newvc .= "<id>".$_GET[id]."</id>\n"; 

$newvc .= "</update>";
 

@unlink("$folder_xml/taxi/status/".$arr[project][drivername].".xml");
@$fd = @fopen("$folder_xml/taxi/status/".$arr[project][drivername].".xml", "a+");
@fputs($fd, $newvc . "");
@fclose($fd);

		
 
 $arr[project][id]=$_GET[id];
	
 
		
	?>
 
    
 <script type="text/javascript">
 
 
  var url_driver_topoint_<? echo $arr[project][id];?>= "popup.php?name=booking/load/form&file=checkin_status&id=<? echo $arr[project][id];?>&type=check_<?=$_GET[type]?>&time=<?=TIMESTAMP?>&status=1";
  
  
 $('#status_<?=$_GET[type]?>_<?=$arr[project][id]?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> โหลดข้อมูล');
  
 $('#status_<?=$_GET[type]?>_<?=$arr[project][id]?>').load(url_driver_topoint_<? echo $arr[project][id];?>); 
 
 
 $('#iconchk_<?=$_GET[type]?>_<?=$arr[project][id];?>').attr("src", "images/yes.png");  
 
 $("#number_<?=$_GET[type]?>_<?=$arr[project][id];?>").removeClass('step-booking');
  
 $("#number_<?=$_GET[type]?>_<?=$arr[project][id];?>").addClass('step-booking-active');
 
 
 
$("#box_<?=$_GET[type]?>_<?=$arr[project][id]?>").addClass('disabledbutton-checkin');

$("#btn_<?=$_GET[type]?>_<?=$arr[project][id]?>").css('background-color','#666666');

$("#btn_guest_receive_<?=$arr[project][id]?>").css('background-color','#3b5998');
   
	$.ajax({
	    url: '../data/fileupload/store/driver_topoint_<?=$arr[project][id]?>.jpg',
	    type:'HEAD',
	    error: function()
	    {
	        console.log('Error file');
	    },
	    success: function()
	    {
	        //file exists
	        console.log('success file');
	        $('#photo_driver_topoint_<?=$arr[project][id]?>').css('color','#3b5998');
	 		$('#photo_driver_topoint_<?=$arr[project][id]?>').css('border','2px solid #3b5998');
	 		$('#photo_driver_topoint_<?=$arr[project][id]?>').attr('onclick','ViewPhoto("<?=$arr[project][id]?>","driver_topoint","<?=TIMESTAMP;?>");');
	    }
	});
 
 $('#topoint_check_click').val(1);

 $("#step_guest_receive_<? echo $arr[project][id];?>").show();
 
 $("#box_driver_topoint_<?=$arr[project][id];?>").removeClass('border-alert');
</script>
    
 <? } 

if($_GET[action]=="check_guest_receive"){
	
	$data['check_guest_receive'] = 1;
	$data['guest_receive_date'] = TIMESTAMP;
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	
	$db->update_db('order_booking',$data,'id = "'.$_GET[id].'" ');
	?>
	<script>
	var url_guest_receive= "popup.php?name=booking/load/form&file=checkin_status&id=<? echo $_GET[id];?>&type=check_guest_receive&time=<?=TIMESTAMP;?>&status=1";
 	$('#status_guest_receive_<?=$_GET[id];?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> โหลดข้อมูล');
 	
 	$('#status_guest_receive_<?=$_GET[id];?>').load(url_guest_receive);
	
	$('#iconchk_<?=$_GET[type]?>_<?=$_GET[id];?>').attr("src", "images/yes.png");  
 
 	$("#number_<?=$_GET[type]?>_<?=$_GET[id];?>").removeClass('step-booking');
  
 	$("#number_<?=$_GET[type]?>_<?=$_GET[id];?>").addClass('step-booking-active');
 
	$("#box_<?=$_GET[type]?>_<?=$_GET[id];?>").addClass('disabledbutton-checkin');
	
	
	$("#btn_<?=$_GET[type]?>_<?=$_GET[id];?>").css('background-color','#666666');

//	$("#btn_guest_register_<?=$arr[project][id]?>").css('background-color','#3b5998');
	
	$.ajax({
    url: '../data/fileupload/store/guest_receive_<?=$_GET[id];?>.jpg',
    type:'HEAD',
    error: function()
    {
        console.log('Error file');
    },
    success: function()
    {
        //file exists
        console.log('success file');
        $('#photo_guest_receive_<?=$_GET[id]?>').css('color','#3b5998');
 		$('#photo_guest_receive_<?=$_GET[id]?>').css('border','2px solid #3b5998');
 		$('#photo_guest_receive_<?=$_GET[id];?>').attr('onclick','ViewPhoto("<?=$_GET[id]?>","guest_receive","<?=TIMESTAMP;?>")');
    }
	});
	
 	$("#step_guest_register_<? echo $_GET[id];?>").show();
 	
 	$("#box_guest_receive_<?=$_GET[id];?>").removeClass('border-alert');	
 	
 	$('#guest_receive_check_click').val(1);
 	
	</script>
<? }

if($_GET[action]=="check_guest_register"){
	
	$data['check_guest_register'] = 1;
	$data['guest_register_date'] = TIMESTAMP;
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	
	$db->update_db('order_booking',$data,'id = "'.$_GET[id].'" ');
	?>
	<script>
	var url_guest_receive= "popup.php?name=booking/load/form&file=checkin_status&id=<? echo $_GET[id];?>&type=check_guest_register&time=<?=TIMESTAMP;?>&status=1";
	$('#status_guest_register_<?=$_GET[id];?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> โหลดข้อมูล');
 	$('#status_guest_register_<?=$_GET[id];?>').load(url_guest_receive);
	
	$('#iconchk_<?=$_GET[type]?>_<?=$_GET[id];?>').attr("src", "images/yes.png");  
 
 	$("#number_<?=$_GET[type]?>_<?=$_GET[id];?>").removeClass('step-booking');
  
 	$("#number_<?=$_GET[type]?>_<?=$_GET[id];?>").addClass('step-booking-active');
 
	$("#box_<?=$_GET[type]?>_<?=$_GET[id];?>").addClass('disabledbutton-checkin');
	
	$("#btn_<?=$_GET[type]?>_<?=$_GET[id]?>").css('background-color','#666666');

//	$("#btn_driver_pay_report_<?=$arr[project][id]?>").css('background-color','#3b5998');
	
	$.ajax({
    url: '../data/fileupload/store/guest_register_<?=$_GET[id];?>.jpg',
    type:'HEAD',
    error: function()
    {
        console.log('Error file');
    },
    success: function()
    {
        //file exists
        console.log('success file');
        $('#photo_guest_register_<?=$_GET[id]?>').css('color','#3b5998');
 		$('#photo_guest_register_<?=$_GET[id]?>').css('border','2px solid #3b5998');
 		$('#photo_guest_register_<?=$_GET[id];?>').attr('onclick','ViewPhoto("<?=$_GET[id]?>","guest_register","<?=TIMESTAMP;?>")');
    }
	});
	
	$("#step_driver_pay_report_<? echo $_GET[id];?>").show();
 
 	$("#box_guest_register_<?=$_GET[id];?>").removeClass('border-alert');	
		
	</script>
<?
}

if($_GET[action]=="check_driver_pay_report"){
	
	$data['check_driver_pay_report'] = 1;
	$data['driver_pay_report_date'] = TIMESTAMP;
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	
	$db->update_db('order_booking',$data,'id = "'.$_GET[id].'" ');
	?>
	<script>
	var url_guest_receive= "popup.php?name=booking/load/form&file=checkin_status&id=<? echo $_GET[id];?>&type=check_driver_pay_report&time=<?=TIMESTAMP;?>&status=1";
	$('#status_driver_pay_report_<?=$_GET[id];?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> โหลดข้อมูล');
 	$('#status_driver_pay_report_<?=$_GET[id];?>').load(url_guest_receive);
	
	$('#iconchk_<?=$_GET[type]?>_<?=$_GET[id];?>').attr("src", "images/yes.png");  
 
 	$("#number_<?=$_GET[type]?>_<?=$_GET[id];?>").removeClass('step-booking');
  
 	$("#number_<?=$_GET[type]?>_<?=$_GET[id];?>").addClass('step-booking-active');
 
	$("#box_<?=$_GET[type]?>_<?=$_GET[id];?>").addClass('disabledbutton-checkin');

	$("#btn_<?=$_GET[type]?>_<?=$_GET[id]?>").css('background-color','#666666');

//	$("#btn_driver_pay_report_<?=$arr[project][id]?>").css('background-color','#666666');
	
	$.ajax({
    url: '../data/fileupload/store/driver_pay_report_<?=$_GET[id];?>.jpg',
    type:'HEAD',
    error: function()
    {
        console.log('Error file');
    },
    success: function()
    {
        //file exists
        console.log('success file');
        $('#photo_driver_pay_report_<?=$_GET[id];?>').css('color','#3b5998');
 		$('#photo_driver_pay_report_<?=$_GET[id];?>').css('border','2px solid #3b5998');
 		$('#photo_driver_pay_report_<?=$_GET[id];?>').attr('onclick','ViewPhoto("<?=$_GET[id]?>","driver_pay_report","<?=TIMESTAMP;?>")');
    }
	});

	$("#box_driver_pay_report_<?=$_GET[id];?>").removeClass('border-alert');	
		
	$('#driver_pay_report_check_click').val(1);
		
	</script>
<?
}

if($_GET[op]=='cancel' ){
 
 
 $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
 $db->update_db('order_booking', array(
  
 "status" => "CANCEL",
 "cancel_type" => $_GET[cancel_type],
  "booking_edit" => "1", 
 
            "update_date" => "" . TIMESTAMP . ""
		)," id='".$_GET[id]."' ");
 
		
		
 ///// /history
  $db->add_db('history_edit', array(
 "vc_id" => "$_GET[id]",
 "status" => "CANCEL",
 "cancel_type" => $_GET[cancel_type],
 
  "user_class" => "driver",
 
    "posted" => "$_SESSION[data_user_id]",
            "post_date" => "" . TIMESTAMP . "",
            "update_date" => "" . TIMESTAMP . ""
			
	
        ));
        $db->closedb();

 $arr[project][id]=$_GET[id];

	?>
    
 
    <script>
	
 $("#main_sub_booking_div_<?=$arr[project][id]?>").hide();
 
 $("#action_status_<?=$arr[project][id]?>").hide();
 
 
   var url_check_status_<?=$arr[project][id]?> = "go.php?name=booking/update&file=status_check&id=<?=$arr[project][id]?>&type=<?=$_GET[cancel_type];?>&status=CANCEL";
 $('#update_status_<?=$arr[project][id]?>').load(url_check_status_<?=$arr[project][id]?>);
 
	</script>
    
    
    
    
<? }  

if($_GET[action]=='approve_pay_driver_admin'){
	
	$data[order_id] = $_POST[order_id];
	$data[invoice] = $_POST[invoice];
	$data[total_price] = $_POST[price];
	$data[type] = $_POST[type];
	$data[status] = 1;
	$data[last_update] = time();
	$data[posted] = $_COOKIE[app_remember_user];
	
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$data[result] = $db->add_db("pay_history_driver_shopping",$data); 
	
	echo json_encode($data);
	?>
	<script>
		$('#tr_btn_<?=$_POST[type];?>_pay_<?=$_POST[order_id];?>').hide();
		$('#pay_<?=$_POST[type];?>_admin_<?=$_POST[order_id];?>').css('background-color','#59AA47');
		$('#txt_pay_<?=$_POST[type];?>_<?=$_POST[order_id];?>').html('<font color="#59AA47;"><b>จ่ายแล้ว</b></font>');
		$('#price_<?=$_POST[type];?>_time_payment_<?=$_POST[order_id];?>').html('<span><i class="fa  fa-clock-o " style="width:22px;" ></i>&nbsp;<?=date("H:i:s",time());?></span>');
	</script>
	<?
}

if($_GET[action]=='approve_pay_driver_taxi'){
	
	$data[driver_approve] = 1;
	$data[driver_approve_pay_date] = time();
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	$data[result] = $db->update_db("pay_history_driver_shopping",$data,"order_id = '".$_POST[order_id]."' and type = '".$_POST[type]."' and status = 1 "); 
	echo json_encode($data);
	?>
	<script>
		$('#tr_btn_<?=$_POST[type];?>_approve_<?=$_POST[order_id];?>').hide();
		$('#pay_<?=$_POST[type];?>_taxi_<?=$_POST[order_id];?>').css('background-color','#59AA47');
		
		$('#txt_pay_<?=$_POST[type];?>_<?=$_POST[order_id];?>').html('<font color="#59AA47;"><b>ได้รับเงินแล้ว</b></font>');
		$('#price_<?=$_POST[type];?>_time_payment_<?=$_POST[order_id];?>').html('<span><i class="fa  fa-clock-o " style="width:22px;" ></i>&nbsp;<?=date("H:i:s",time());?></span>');
		
		$('#pay_<?=$_POST[type];?>_taxi_<?=$_POST[order_id];?>').css('background-color','#59AA47');
	</script>
	<?
}

?>