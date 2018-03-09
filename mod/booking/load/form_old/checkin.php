 






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
 
 <style>








 

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


.step-booking {
    border-radius: 50%; background-color: #FF9933;
 
    padding: 10px; 
    width: 60px;
    height: 60px; 
	text-align: justify; color:#FFFFFF;   font-size:30px; font-weight:bold;   text-align:center; margin-left:-5px;
	border: solid 3px #F6F6F6;
	 box-shadow: 0 0 10px 3px #E8E6E6;   
	   background: #FF0000 !important;
 
  color: #fff;
}


.step-booking-active {
 
  border-radius: 50%; 
 
    padding: 10px; 
    width: 60px;
    height: 60px; 
	text-align: justify; color:#FFFFFF;   font-size:30px; font-weight:bold;   text-align:center; margin-left:-5px;
	border: solid 3px #F6F6F6;
	 box-shadow: 0 0 10px 3px #E8E6E6;   
	   background: #59AA47 !important;
 
  color: #fff;
}
 

 
 </style>
 
 
<div  class="box-bottom-line"  style="padding-top:10px;" ><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td height="30" class="font-28 "><font color="<?=$text_topic_color?>" ><b> ข้อมูลการเช็คอิน</font></td>
      <td width="80" valign="top" align="right"><div id="btn_show_hide_checkin_<?=$arr[project][invoice];?>" class="font-28 hidden-click"></div></td>
    </tr>
  </tbody>
</table>
</div>

  <style>
   .div-all-checkin{
	 padding:5px;   border-radius: 15px; border: 1px solid #ddd;background-color:#F6F6F6;     margin-bottom: 5px; margin-top:5px; box-shadow: 0px  0px 10px #DADADA  ;
	 
 }
 
 .disabledbutton-checkin {
   pointer-events: none; background-color:#FFF; color:#FFF;   border: 1px solid #88B34D;
   
}


 
 </style>

 





 

<table width="100%" border="0" cellpadding="1" cellspacing="1" id="table_show_hide_checkin_<?=$arr[project][invoice];?>">
 
 
 <tr id="step_driver_topoint_<? echo $arr[project][id];?>">
  <td class="font-22">
      
 <?  include ("mod/booking/load/form/checkin/topoint.php");?>
  
  </td>
  </tr>
  
  
  
  
 <tr id="step_guest_receive_<? echo $arr[project][id];?>" style="display:none">
 
 
    <td class="font-22">
    
    
    
     <?  include ("mod/booking/load/form/checkin/guest_receive.php");?>
    
 
    
    
    
    </td>
  </tr>
  
  
 <tr id="step_guest_register_<? echo $arr[project][id];?>" style="display:none">
    <td class="font-22">
    
     <?  include ("mod/booking/load/form/checkin/guest_register.php");?>
    
 
    </td>
  </tr>
  
  
 <tr id="step_driver_pay_report_<? echo $arr[project][id];?>" style="display:none">
    <td class="font-22">
    
     <?  include ("mod/booking/load/form/checkin/driver_pay_report.php");?>
    
 
    </td>
  </tr>
  
 
 
</table>


<style>
button,
button:active,
button:focus, 
button:hover,
.btn,
.btn:active, 
.btn:focus, 
.btn:hover{   
    outline:none !important;
}


 

</style>
 