 
 <script>
 
 
 
 
 
$('#btn_show_hide_checkin_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-up" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;ซ่อน</span>');
 
 
 
  $('#btn_show_hide_checkin_<?=$arr[project][invoice];?>').click(function() {
	  
 
 
 ///// tool status
 var tool_status = $( "#table_show_hide_checkin_<?=$arr[project][invoice];?>" ).is(":hidden");
 
// $("#table_show_hide_checkin_<?=$arr[project][invoice];?>" ).show(); 
 
 if(tool_status==true){
	 
$("#table_show_hide_checkin_<?=$arr[project][invoice];?>" ).show(); 

 $('#btn_show_hide_checkin_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-up" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;ซ่อน</span>');
 
	 
 } else {
	 
	$("#table_show_hide_checkin_<?=$arr[project][invoice];?>" ).hide();  
	
 $('#btn_show_hide_checkin_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-down" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;แสดง</span>');
	
	 
 }
 
 
  });
 </script>
 
 
 
 
<div  class="box-bottom-line"  style="padding-top:10px;" 
><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td height="30" class="font-28 "><font color="<?=$text_topic_color?>" ><b> ข้อมูลการเช็คอิน</font></td>
      <td width="70" valign="top"><div id="btn_show_hide_checkin_<?=$arr[project][invoice];?>" class="font-24"></div></td>
    </tr>
  </tbody>
</table>
</div>




<table width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_hide_checkin_<?=$arr[project][invoice];?>">
 
  <? if($data_user_class<>'Staxi'){ ?>
  <tr id="booking_topoint_<?=$arr[project][id]?>" style="display:nones">
    <td width="100" class="font-22"><button id="complete_booking_data_<?=$arr[project][id]?>" type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px "><span class="font-22"><i class="fa  fa-map-marker" style="width:20px;"  ></i> แจ้งถึงแล้ว</button></td>
    <td class="font-22"><? if($arr[project][driver_topoint]==1 and  $arr[project][driver_complete]==0){ ?>
     
 
     
      <script> 
   $("#complete_booking_data_<?=$arr[project][id]?>").removeClass('disabledbutton');
	  
   </script>
      <? } ?>
      <span  id="time_complete_booking_data_<?=$arr[project][id]?>">
        <? if($arr[project][driver_complete]==1){ ?>
        <script>
		$("#complete_booking_data_<?=$arr[project][id]?>").removeClass('btn-info');
	 $("#complete_booking_data_<?=$arr[project][id]?>").addClass('disabledbutton-gray');

  </script>
        <i class="fa   fa-check-circle " style="width:20px; color:#39B54A"></i> <b>
        <?=$date = date('H:i:s',  $arr[project][driver_complete_date]);?>
        <? }  else {?>
        <i class="fa  fa-spinner fa-spin 6x" style="width:20px;color:#FF0000"></i> รอดำเนินการ
        <? } ?>
      </span></td>
  </tr>
  
  
  <tr style="display:nones">
  
    <td width="100" class="font-22"><button  class="btn disabledbutton-gray " style="width:100%;text-align:left;padding:5px "><span class="font-22"><i class="fa  fa-user" style="width:20px;"  ></i>ลงทะเบียน</span></button></td>
    <td class="font-22"><? if($arr[project][driver_topoint]==1 and  $arr[project][driver_complete]==0){ ?>
      <script> 
   $("#complete_booking_data_<?=$arr[project][id]?>").removeClass('disabledbutton');
	  
      </script>
      <? } ?>
      <span  id="time_complete_booking_data_<?=$arr[project][id]?>">
        <? if($arr[project][driver_complete]==1){ ?>
        <script>
		$("#complete_booking_data_<?=$arr[project][id]?>").removeClass('btn-info');
	 $("#complete_booking_data_<?=$arr[project][id]?>").addClass('disabledbutton-gray');

      </script>
        <i class="fa   fa-check-circle " style="width:20px; color:#39B54A"></i> <b>
        <?=$date = date('H:i:s',  $arr[project][driver_complete_date]);?>
        <? }  else {?>
        <i class="fa  fa-spinner fa-spin 6x" style="width:20px;color:#FF0000"></i> รอดำเนินการ
        <? } ?>
      </span></td>
  </tr>
  <tr id="tr_booking_payment_<?=$arr[project][id]?>" style="display:none">
    <td class="font-22"><button id="payment_booking_data_<?=$arr[project][id]?>" type="button" class="btn  btn-success"  style="width:100%;text-align:left;padding:5px "><span  id="text_payment_booking_data_<?=$arr[project][id]?>" class="font-22"><i class="fa  fa-folder-open"  style="width:20px;" ></i> รับเงิน</span></button></td>
    <td class="font-22"><span  id="time_payment_booking_data_<?=$arr[project][id]?>">
    
    
    
    
      <? if($arr[project][status]=='CONFIRM' and $arr[project][driver_complete]==1 ){ ?>
      <script> 
   $("#tr_booking_payment_<?=$arr[project][id]?>").show();
   
   
   
   
   
	  
	  </script>
      
      
      
      
      
      
      
      
      
      
      <? } ?>
      <? if($arr[project][payment_status]=='2' ){ ?> 
      
        <script>
	$("#text_payment_booking_data_<?=$arr[project][id]?>").html('<i class="fa  fa-folder-open"  style="width:20px;" ></i> รับเงินแล้ว</span>');


		$("#payment_booking_data_<?=$arr[project][id]?>").removeClass('btn-success');
	 $("#payment_booking_data_<?=$arr[project][id]?>").addClass('disabledbutton-gray');

</script>
  


      <i class="fa   fa-check-circle " style="width:20px; color:#39B54A"></i> <b>
      <?=$date = date('H:i:s',  $arr[project][driver_payment_date]);?>
      <?  } ?>
      <? if($arr[project][payment_status]=='0' ){ ?>
      <i class="fa  fa-spinner fa-spin 6x" style="width:20px;color:#FF0000"></i> รอดำเนินการ
      <?  } ?>
    </span></td>
  </tr>
  <? } ?>
  <? if($data_user_class=='taxi'){ ?>
  <? } ?>
</table>






            <script>
		 
 

		 
  $("#topoint_booking_data_<?=$arr[project][id]?>").click(function(){ 
  
 
  
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่ามารับแขกขึ้นรถแล้ว",
	type: "success",
		showCancelButton: true,
		confirmButtonColor: '#5CB85C',
		confirmButtonText: 'ใช่',
		cancelButtonText: "ไม่ใช่",
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
	 
	
////swal("ยืนยัน", "success");



////


 
 


  var url_<?=$arr[project][id]?> = "popup.php?name=booking&file=savedata&action=topoint&type=driver&id=<?=$arr[project][id]?>";
  
 
 url_<?=$arr[project][id]?> =url_<?=$arr[project][id]?>+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
 url_<?=$arr[project][id]?> =url_<?=$arr[project][id]?>+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 
  
 
 $('#booking_action').load(url_<?=$arr[project][id]?>); 
 
 
///  $('#status_<?=$arr[project][id]?>').html('<font style="font-size:22; color:#FF0000"><b>ยกเลิก</font>'); 
 
 
 $('#booking_topoint_<?=$arr[project][id]?>').show();
 

 
  $("#topoint_booking_data_<?=$arr[project][id]?>").addClass('disabledbutton');
 
 $("#time_topoint_booking_data_<?=$arr[project][id]?>").html('<i class="fa   fa-check-circle " style="width:20px; color:#39B54A"></i><b> <?=$date = date('H:i:s');?>');
 
 $("#complete_booking_data_<?=$arr[project][id]?>").removeClass('disabledbutton');
 
    
   
	//  alert('dd');
    } else {
  //    swal("Cancelled", "", "error");
    }
	});
	   
  
  
 

  
  
  
  
  
  
  
  
  
 

		 });
		 
 

		 
		 
		 </script>      
            
            <script>
		 
 

		 
  $("#complete_booking_data_<?=$arr[project][id]?>").click(function(){ 
  
 
  
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่ามาถึงสถานที่ส่งแขกแล้ว",
	type: "info",
		showCancelButton: true,
		confirmButtonColor: '#5BC0DE',
		confirmButtonText: 'ใช่',
		cancelButtonText: "ไม่ใช่",
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
	 
	
////swal("ยืนยัน", "success");



////


 
 

  var url_<?=$arr[project][id]?> = "popup.php?name=booking&file=savedata&action=complete&type=driver&id=<?=$arr[project][id]?>";
  
 
 url_<?=$arr[project][id]?> =url_<?=$arr[project][id]?>+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
 url_<?=$arr[project][id]?> =url_<?=$arr[project][id]?>+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 
  
 
 $('#booking_action').load(url_<?=$arr[project][id]?>); 
 
 
///  $('#status_<?=$arr[project][id]?>').html('<font style="font-size:22; color:#FF0000"><b>ยกเลิก</font>'); 
 
 
 $('#booking_topoint_<?=$arr[project][id]?>').show();
 

 
 		$("#complete_booking_data_<?=$arr[project][id]?>").removeClass('btn-info');
	 $("#complete_booking_data_<?=$arr[project][id]?>").addClass('disabledbutton-gray');
 
  
///  $("#complete_booking_data_<?=$arr[project][id]?>").addClass('disabledbutton');
 
 $("#time_complete_booking_data_<?=$arr[project][id]?>").html('<i class="fa   fa-check-circle " style="width:20px; color:#39B54A"></i><b> <?=$date = date('H:i:s');?>');

    
   
	//  alert('dd');
    } else {
  //    swal("Cancelled", "", "error");
  
  
  
  
    }
	
	
	
	
	
	
	
	
	});
	   
  
  
 

  
  
  
  
  
  
  
  
  
 

		 });
		 
 

		 
		 
		 </script>      
            
                <script>
		 
 

		 
  $("#payment_booking_data_<?=$arr[project][id]?>").click(function(){ 
  
 
  
	   swal({
		title: "<font style='font-size:28px'><b> กรอกรหัสรับเงิน 6 หลัก",
		text: "<font style='font-size:22px'>ที่คุณได้รับ",
 
	
	
	
 
  type: "input",
 
  animation: "slide-from-top",
  
 
  
  inputPlaceholder: "กรอกรหัสรับเงิน",
	
 
	html: true,
		showCancelButton: true,
		confirmButtonColor: '#39B54A',
		confirmButtonText: 'ยืนยัน',
		cancelButtonText: "ยกเลิก",
		closeOnConfirm: true,
		closeOnCancel: true,
		
		
 
  showCancelButton: true,
  closeOnConfirm: false,
  animation: false
 
		
		
		
 
	},
	
	
	
	/*
	
	
	
	
	function(isConfirm){
    if (isConfirm){
		
 $('#text_payment_booking_data_<?=$arr[project][id]?>').html('<font color="#ffffff" ><i class="fa fa-thumbs-up"></i>   รับเงินแล้ว</span>'); 
 
  $("#time_payment_booking_data_<?=$arr[project][id]?>").show();
 
		
 $("#time_payment_booking_data_<?=$arr[project][id]?>").html('<i class="fa   fa-check-circle " style="width:20px; color:#39B54A"></i><b> <?=$date = date('H:i:s');?>');
		
		$("#payment_booking_data_<?=$arr[project][id]?>").removeClass('btn-success');
	 $("#payment_booking_data_<?=$arr[project][id]?>").addClass('disabledbutton-gray');
	
	


	
	
////swal("ยืนยัน", "success");
 
////


 
 
 
  var url_<?=$arr[project][id]?> = "popup.php?name=booking&file=savedata&action=payment&type=driver&id=<?=$arr[project][id]?>";
  
 
 url_<?=$arr[project][id]?> =url_<?=$arr[project][id]?>+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
 url_<?=$arr[project][id]?> =url_<?=$arr[project][id]?>+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 
  
 
 $('#booking_action').load(url_<?=$arr[project][id]?>); 
 
 
 
	//  alert('dd');
    } else {
  //    swal("Cancelled", "", "error");
    }
	});
	   
  
  
 

  
  
  
  */
  
  
  
  
  
 function(inputValue){
  if (inputValue === false) return false;
  
  if (inputValue === "") {
    swal.showInputError("กรุณากรอกรหัสรับเงิน!");
    return false
  }
  
  
  
swal({
	
	 type: 'success',
  title: "ยืนยันการรับเงิน",
 text: "ขอบคุณค่ะ",
  timer: 2000,
  showConfirmButton: false
});

  /*

  swal("Nice!", "You wrote: " + inputValue, "success");
  
   swal("ยืนยัน", "success");
   
   

   
   */
   
   
   		
 $('#text_payment_booking_data_<?=$arr[project][id]?>').html('<font color="#000000" ><i class="fa fa-thumbs-up"></i>   รับเงินแล้ว</span>'); 
 
  $("#time_payment_booking_data_<?=$arr[project][id]?>").show();
 
		
 $("#time_payment_booking_data_<?=$arr[project][id]?>").html('<i class="fa   fa-check-circle " style="width:20px; color:#39B54A"></i><b> <?=$date = date('H:i:s');?>');
		
		
		 
	 	$("#payment_booking_data_<?=$arr[project][id]?>").removeClass('btn-success');
	 $("#payment_booking_data_<?=$arr[project][id]?>").addClass('disabledbutton-gray');
	
	

 
	
////swal("ยืนยัน", "success");
 
////


 
 
 
  var url_<?=$arr[project][id]?> = "popup.php?name=booking&file=savedata&action=receive&type=driver&id=<?=$arr[project][id]?>";
  
 
 url_<?=$arr[project][id]?> =url_<?=$arr[project][id]?>+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
 url_<?=$arr[project][id]?> =url_<?=$arr[project][id]?>+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
   
   
   
    $('#booking_action').load(url_<?=$arr[project][id]?>); 
   
  /// alert(<?=$arr[project][id]?>);
   
 
  
});

		 });
		 
 

		 
		 
		 </script>      
  
