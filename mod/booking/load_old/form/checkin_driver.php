 
 <style>


.step-booking {
    border-radius: 50%; background-color: #FF9933;
 
    padding: 10px; 
    width: 60px;
    height: 60px; 
	text-align: justify; color:#FFFFFF;   font-size:30px; font-weight:bold;   text-align:center; margin-left:-5px;
	border: solid 3px #F6F6F6;
	 box-shadow: 0 0 10px 3px #E8E6E6;   
	   background: #f39c12 !important;
 
 
  color: #fff;
}


.step-booking-small {
    border-radius: 50%; background-color: #FF9933;
 
    padding: 5px; 
    width: 40px;
    height: 40px; 
	text-align: justify; color:#FFFFFF;   font-size:20px; font-weight:bold; margin-top:-10px; text-align:center;
	border: solid 4px #FFFFFF;
 
	   background: #f39c12 !important;
 
 
  color: #fff;
}



.step-booking-small-no {
    border-radius: 50%; background-color: #FF9933;
 
    padding: 5px; 
    width: 40px;
    height: 40px; 
	text-align: justify; color:#FFFFFF;   font-size:20px; font-weight:bold; margin-top:-10px; text-align:center;
	border: solid 4px #FFFFFF;
 
	   background: #999999 !important;
 
 
  color: #fff;
}



.step-booking-active {
 
	text-align: justify; color:#FFFFFF;   
	border: solid 1px <?=$main_color?>; background-color:#F6F6F6;
 
 
 
  color: #fff;
}




.step-booking1 {    border-radius: 50%; background-color: #FF9933;
 
    padding: 10px; 
    width: 60px;
    height: 60px; 
	text-align: justify; color:#FFFFFF;   font-size:30px; font-weight:bold;   text-align:center;
	border: solid 4px #FFFFFF;
	 box-shadow: 0 0 0px 0px #E8E6E6;   
	   background: #f39c12 !important;
 
 
  color: #fff;
}
 </style>
 
 
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


<div id="step_topoint">

<table width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_hide_checkin_<?=$arr[project][invoice];?>">
 
 
  <tr id="booking_topoint_<?=$arr[project][id]?>" style="display:nones">
    <td class="font-22">
      <table width="100%" border="0" cellspacing="2" cellpadding="0">
        <tbody>
          <tr>
            <td width="65" rowspan="2"><div class="step-booking"  id="number_step_1">1</div> </td>
            <td><button id="btn_data_topoint_<?=$arr[project][id]?>" type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:<?=$main_color?> "><span class="font-26"><i class="fa  fa-map-marker" style="width:20px;"  ></i> ถึงสถานที่ส่งแขก</button></td>
          </tr>
          <tr>
            <td>
              <div id="load_data_topoint_<?=$arr[project][id]?>" style="font-size:24px;color:#3333">
                
                <i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000; font-size:20px;"></i><span style="color:#3333; font-size:20px;"> รอดำเนินการ</span>
                
              </div> 
              
            </td>
          </tr>
        </tbody>
    </table>
  </div>
    
    
    
<div id="step_register" style="display:none; border-top: solid 2px #dadada; magin-top:10px;">
  <table width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_hide_checkin_<?=$arr[project][invoice];?>">
 
 
  <tr id="booking_topoint_<?=$arr[project][id]?>" style="display:nones">
    <td class="font-22">
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tbody>
          <tr>
            <td width="65" rowspan="2"><div class="step-booking"  id="number_step_1">2</div> </td>
            <td><div id="btn_data_register_<?=$arr[project][id]?>"   class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:#F6F6F6 ; color:#333333; border:none"><span class="font-26"><i class="fa  fa-user" style="width:20px;"  ></i> ลงทะเบียนแขก</div></td>
          </tr>
          <tr>
            <td>
              <div id="load_register_topoint_<?=$arr[project][id]?>" style="font-size:28px;color:#3333">
                
                <i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000; font-size:20px;"></i><span style="color:#3333; font-size:20px;"> รอดำเนินการ</span>
                
              </div> 
              
            </td>
          </tr>
        </tbody>
    </table>
    
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    </td>
  </tr>
 
 
</table>






        
            
            <script>
		 
 

		 
  $("#btn_data_topoint_<?=$arr[project][id]?>").click(function(){ 
  
 
  
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
	 
 
 

  var url_<?=$arr[project][id]?> = "popup.php?name=booking&file=savedata&action=topoint&type=driver&id=<?=$arr[project][id]?>";
  
 
 url_<?=$arr[project][id]?> =url_<?=$arr[project][id]?>+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
 url_<?=$arr[project][id]?> =url_<?=$arr[project][id]?>+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 
  
 /*
 $('#booking_action').load(url_<?=$arr[project][id]?>); 
 
 
///  $('#status_<?=$arr[project][id]?>').html('<font style="font-size:22; color:#FF0000"><b>ยกเลิก</font>'); 
 
 
 $('#booking_topoint_<?=$arr[project][id]?>').show();
 

 $("#complete_booking_data_<?=$arr[project][id]?>").removeClass('btn-info');
	 $("#complete_booking_data_<?=$arr[project][id]?>").addClass('disabledbutton-gray');
 
  
///  


*/

$("#btn_data_topoint_<?=$arr[project][id]?>").removeClass('btn-info');

$("#btn_data_topoint_<?=$arr[project][id]?>").addClass('disabledbutton-gray');
 
 
 
 $("#load_data_topoint_<?=$arr[project][id]?>").html('<i class="fa   fa-check-circle " style="width:20px; color:#39B54A"></i><b> <?=$date = date('H:i:s');?>');




 $('#step_register').show();
    
   
	//  alert('dd');
    } else {
  //    swal("Cancelled", "", "error");
  
  
  
  
    }
	
	
	
	
	
	
	
	
	});
	   
  
  
 

  
  
  
  
  
  
  
  
  
 

		 });
		 
 

		 
		 
		 </script>      
            
            
