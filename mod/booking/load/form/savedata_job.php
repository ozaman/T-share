 <?php
 include('../../../../includes/class.mysql.php');

	$db = New DB();
	$db->connectdb('admin_booking','admin_MANbooking','252631MANbooking');
	
	
	mysql_query("SET NAMES utf8"); 
	mysql_query("SET character_set_results=utf-8");
	$res[project] = $db->select_query("SELECT invoice FROM  ap_order  where  invoice='".$_GET[id]."' ");
$arr[project] = $db->fetch($res[project]);

if($_GET[action]=="check_driver_topoint"){  
	
	
	
				 	$sql = 'UPDATE ap_order SET driver_topoint = 1,driver_topoint_date = "'.time().'",driver_topoint_lat = "'.$_GET[lat].'" ,driver_topoint_lng = "'.$_GET[lng].'" WHERE invoice="'.$_GET[id].'"';
						if ($db->select_query($sql) === TRUE) {
							echo "1";
						} else {
						    echo "err";
						}
				
		
	?>
 
    
 <script type="text/javascript">
 
 
  var url_driver_topoint_<? echo $arr[project][invoice];?>= "popup.php?name=booking/load/form&file=checkin_status_job&id=<? echo $arr[project][invoice];?>&type=check_<?=$_GET[type]?>&time=<?=TIMESTAMP?>&status=1";
  
  
 $('#status_<?=$_GET[type]?>_<?=$arr[project][invoice]?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> โหลดข้อมูล');
  
 $('#status_<?=$_GET[type]?>_<?=$arr[project][invoice]?>').load(url_driver_topoint_<? echo $arr[project][invoice];?>); 
 
 
 $('#iconchk_<?=$_GET[type]?>_<?=$arr[project][invoice];?>').attr("src", "images/yes.png"); 
 
 $("#number_<?=$_GET[type]?>_<?=$arr[project][invoice];?>").removeClass('step-booking');
  
 $("#number_<?=$_GET[type]?>_<?=$arr[project][invoice];?>").addClass('step-booking-active');
 
 
 
$("#box_<?=$_GET[type]?>_<?=$arr[project][invoice]?>").addClass('disabledbutton-checkin');

$("#btn_<?=$_GET[type]?>_<?=$arr[project][invoice]?>").css('background-color','#666666');

$("#btn_guest_receive_<?=$arr[project][invoice]?>").css('background-color','#3b5998');
   
$.ajax({
    url: '../data/fileupload/store/driver_topoint_<?=$arr[project][invoice]?>.jpg',
    type:'HEAD',
    error: function()
    {
        console.log('Error file');
    },
    success: function()
    {
        //file exists
        console.log('success file');
        $('#photo_driver_topoint_<?=$arr[project][invoice]?>').css('color','#3b5998');
 		$('#photo_driver_topoint_<?=$arr[project][invoice]?>').css('border','2px solid #3b5998');
 		$('#photo_driver_topoint_<?=$arr[project][invoice]?>').attr('onclick','ViewPhoto("<?=$arr[project][invoice]?>","driver_topoint","<?=TIMESTAMP;?>")');
    }
});
 
 $('#topoint_check_click').val(1);

 $("#step_guest_receive_<? echo $arr[project][invoice];?>").show();
 
 $("#box_driver_topoint_<?=$arr[project][invoice];?>").removeClass('border-alert');
</script>
    
 <? } 

if($_GET[action]=="check_guest_receive"){
	$sql = 'UPDATE ap_order SET driver_pickup = 1,driver_pickup_date = "'.time().'",driver_pickup_lat = "'.$_GET[lat].'" ,driver_pickup_lng = "'.$_GET[lng].'" WHERE invoice="'.$_GET[id].'"';
						if ($db->select_query($sql) === TRUE) {
							echo "1";
						} else {
						    echo "err";
						}
	
	?>
	<script>
	var url_guest_receive= "popup.php?name=booking/load/form&file=checkin_status_job&id=<?=$arr[project][invoice]?>&type=check_guest_receive&time=<?=TIMESTAMP;?>&status=1";
 	$('#status_guest_receive_<?=$arr[project][invoice]?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> โหลดข้อมูล');
 	
 	$('#status_guest_receive_<?=$arr[project][invoice]?>').load(url_guest_receive);
	
	$('#iconchk_<?=$_GET[type]?>_<?=$arr[project][invoice]?>').attr("src", "images/yes.png");  
 
 	$("#number_<?=$_GET[type]?>_<?=$arr[project][invoice]?>").removeClass('step-booking');
  
 	$("#number_<?=$_GET[type]?>_<?=$arr[project][invoice]?>").addClass('step-booking-active');
 
	$("#box_<?=$_GET[type]?>_<?=$arr[project][invoice]?>").addClass('disabledbutton-checkin');
	
	
	$("#btn_<?=$_GET[type]?>_<?=$arr[project][invoice]?>").css('background-color','#666666');

//	$("#btn_guest_register_<?=$_GET[id]?>").css('background-color','#3b5998');
	
	$.ajax({
    url: '../data/fileupload/store/guest_receive_<?=$arr[project][invoice]?>.jpg',
    type:'HEAD',
    error: function()
    {
        console.log('Error file');
    },
    success: function()
    {
        //file exists
        console.log('success file');
        $('#photo_guest_receive_<?=$arr[project][invoice]?>').css('color','#3b5998');
 		$('#photo_guest_receive_<?=$arr[project][invoice]?>').css('border','2px solid #3b5998');
 		$('#photo_guest_receive_<?=$arr[project][invoice]?>').attr('onclick','ViewPhoto("<?=$arr[project][invoice]?>","guest_receive","<?=TIMESTAMP;?>")');
    }
	});
	
 	$("#step_guest_register_<? echo $_GET[id];?>").show();
 	
 	$("#box_guest_receive_<?=$_GET[id];?>").removeClass('border-alert');	
 	
 	$('#guest_receive_check_click').val(1);
 	
	</script>
<? }

if($_GET[action]=="check_guest_register"){
	
	$sql = 'UPDATE ap_order SET guest_topoint = 1,guest_topoint_date = "'.time().'", guest_topoint_lat = "'.$_GET[lat].'" ,guest_topoint_lng = "'.$_GET[lng].'" WHERE invoice="'.$_GET[id].'"';
						if ($db->select_query($sql) === TRUE) {
							echo "1";
						} else {
						    echo "err";
						}
	
	?>
	<script>
	var url_guest_receive= "popup.php?name=booking/load/form&file=checkin_status_job&id=<? echo $_GET[id];?>&type=check_guest_register&time=<?=TIMESTAMP;?>&status=1";
	$('#status_guest_register_<?=$arr[project][invoice]?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> โหลดข้อมูล');
 	$('#status_guest_register_<?=$_GET[id]?>').load(url_guest_receive);
	
	$('#iconchk_<?=$_GET[type]?>_<?=$_GET[id]?>').attr("src", "images/yes.png");  
 
 	$("#number_<?=$_GET[type]?>_<?=$_GET[id]?>").removeClass('step-booking');
  
 	$("#number_<?=$_GET[type]?>_<?=$_GET[id]?>").addClass('step-booking-active');
 
	$("#box_<?=$_GET[type]?>_<?=$_GET[id]?>").addClass('disabledbutton-checkin');
	
	$("#btn_<?=$_GET[type]?>_<?=$_GET[id]?>").css('background-color','#666666');

//	$("#btn_driver_pay_report_<?=$_GET[id]?>").css('background-color','#3b5998');
	
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
	$sql = 'UPDATE ap_order SET driver_check_car = 1,driver_check_car_date = "'.time().'" WHERE invoice="'.$_GET[id].'"';
						if ($db->select_query($sql) === TRUE) {
							echo "1";
						} else {
						    echo "err";
						}
	?>
	<script>
	var url_guest_receive= "popup.php?name=booking/load/form&file=checkin_status_job&id=<? echo $_GET[id];?>&type=check_driver_pay_report&time=<?=TIMESTAMP;?>&status=1";
	$('#status_driver_pay_report_<?=$_GET[id]?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> โหลดข้อมูล');
 	$('#status_driver_pay_report_<?=$_GET[id]?>').load(url_guest_receive);
	
	$('#iconchk_<?=$_GET[type]?>_<?=$_GET[id]?>').attr("src", "images/yes.png");  
 
 	$("#number_<?=$_GET[type]?>_<?=$_GET[id]?>").removeClass('step-booking');
  
 	$("#number_<?=$_GET[type]?>_<?=$_GET[id]?>").addClass('step-booking-active');
 
	$("#box_<?=$_GET[type]?>_<?=$_GET[id]?>").addClass('disabledbutton-checkin');

	$("#btn_<?=$_GET[type]?>_<?=$_GET[id]?>").css('background-color','#666666');

//	$("#btn_driver_pay_report_<?=$_GET[id]?>").css('background-color','#666666');
	
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
        $('#photo_driver_pay_report_<?=$_GET[id]?>').css('color','#3b5998');
 		$('#photo_driver_pay_report_<?=$_GET[id]?>').css('border','2px solid #3b5998');
 		$('#photo_driver_pay_report_<?=$_GET[id]?>').attr('onclick','ViewPhoto("<?=$_GET[id]?>","driver_pay_report","<?=TIMESTAMP;?>")');
    }
	});

	$("#box_driver_pay_report_<?=$_GET[id]?>").removeClass('border-alert');	
		
	$('#driver_pay_report_check_click').val(1);
		
	</script>
<?
}
if($_GET[action]=="check_pickup_no_guest"){
	
	$sql = 'UPDATE ap_order SET driver_pickup = 2,driver_pickup_date = "'.time().'", driver_pickup_lat = "'.$_GET[lat].'" ,driver_pickup_lng = "'.$_GET[lng].'",driver_remark_noguest = "'.$_GET[remark].'",driver_other_noguest = "'.$_GET[other].'" WHERE invoice="'.$_GET[id].'"';
						if ($db->select_query($sql) === TRUE) {
							echo "1";
						} else {
						    echo "err";
						}
	
	?>
	<script>
	var url_guest_receive= "popup.php?name=booking/load/form&file=checkin_status_job&id=<? echo $_GET[id];?>&type=check_guest_register&time=<?=TIMESTAMP;?>&status=1";
	$('#status_guest_register_<?=$arr[project][invoice]?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> โหลดข้อมูล');
 	$('#status_guest_register_<?=$_GET[id]?>').load(url_guest_receive);
	
	$('#iconchk_<?=$_GET[type]?>_<?=$_GET[id]?>').attr("src", "images/yes.png");  
 
 	$("#number_<?=$_GET[type]?>_<?=$_GET[id]?>").removeClass('step-booking');
  
 	$("#number_<?=$_GET[type]?>_<?=$_GET[id]?>").addClass('step-booking-active');
 
	$("#box_<?=$_GET[type]?>_<?=$_GET[id]?>").addClass('disabledbutton-checkin');
	
	$("#btn_<?=$_GET[type]?>_<?=$_GET[id]?>").css('background-color','#666666');

//	$("#btn_driver_pay_report_<?=$_GET[id]?>").css('background-color','#3b5998');
	
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

 $_GET[id]=$_GET[id];

	?>
    
 
    <script>
	
 $("#main_sub_booking_div_<?=$_GET[id]?>").hide();
 
 $("#action_status_<?=$_GET[id]?>").hide();
 
 
   var url_check_status_<?=$_GET[id]?> = "go.php?name=booking/update&file=status_check&id=<?=$_GET[id]?>&type=<?=$_GET[cancel_type];?>&status=CANCEL";
 $('#update_status_<?=$_GET[id]?>').load(url_check_status_<?=$_GET[id]?>);
 
	</script>
    
    
    
    
<? }  ?>