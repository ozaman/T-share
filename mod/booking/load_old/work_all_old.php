<?
  
  if($_GET[type]=='auto'){
	
	$divtop = 50;
	
} else {
	
	$divtop = 0;
	
}
  ?>
  
  <script>
  $(".text-topic-action-mod").html('งานชอปปิ้งทั้งหมด');
  
  </script>
  
  
  
    <script>
  $(".text-topic-action-mod-2").html('งานวันที่  <?=$_GET[day]?>');
  
  </script>
  
  
  <div style="margin-top:<?=$divtop?>px;">
  
 
  
  
  <? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?>
  <?    include ("mod/booking/photo/preview_photo.php");?>


 <div id="booking_action" style="display:nones"></div>
 
  
  
 
 <style>
 
 .div-all-work{
	 padding:5px;   border-radius: 8px; border: 1px solid #ddd;   background:<? echo $bgcolor; ?>; margin-bottom:20px; box-shadow: 0px  0px 10px #DADADA  ;
	 
 }
 
 
  .div-all-palce{
	 padding:5px;   border-radius: 0px; border: 1px solid #ddd;background-color:#F6F6F6;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ;
	 
 }
 
 
 
 </style>
 
 
		<?
 
 
$select_order="
id
,invoice
,program
,orderid
,vc_id
,pickup_place
,to_place
,carno
,cartype
,drivername
,outdate

,air
,airin_time
,airout_h
,airout_m
,airout_time
,driver_remark
,total,
guest_name
,guest_phone
,server
,car_price
,agent
 
,product_name
,product_name_th
,extra_service_name_th

,name_pickup_place
,name_pickup_place_area
,name_pickup_place_province

,name_to_place
,name_to_place_area
,name_to_place_province
,read_msg

,status

,driver_topoint
,driver_pickup
,driver_complete

,driver_topoint_date
,driver_pickup_date
,driver_complete_date
,product_area

";


 
 
 
 
 $daywork= $_GET[day];

if($_GET[day]==''){
	
	$_GET[day] = date('Y-m-d');
	
}
	
 if($data_user_class=='taxi'){
	 
	 
	 $filter="and drivername=".$user_id." ";
 } else { 
	 
	 $filter=""; 
	 
 }
	
 
/// $_GET[day]='2017-07-20';

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
	 $numday_work = $db->num_rows('order_booking',"id","transfer_date='".$_GET[day]."' $filter");
 
 ?>
 
 <? if($numday_work==0){ ?>
 
 
 <div class="font-22"  style='background-color:#FFFFFF; padding:15px;border: solid 1px #DADADA '><center>
 
 <i class="fa fa-minus-circle" style="font-size:30px; color:#FF0000"></i><br>

 
 
 
 ไม่มีรายการช็อปปิ้ง</div>
 
 
 <? } ?>
 
 
 
  

 
 
 <?
 
 
  	$i=0;
	
		 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

  if($_GET[type]=='auto'){
	
	$limit = 1;
	
} else {
	
	$limit = 200;
	
}


$res[project] = $db->select_query("SELECT * FROM  order_booking  where transfer_date='".$_GET[day]."' $filter  order by  ondate_time asc limit $limit  ");
	///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
	while($arr[project] = $db->fetch($res[project])){  
	
 
 
 if($arr[project][payment_type]=='money'){
	 
	 $payment="เงินสด";
	 
 }
 
  if($arr[project][payment_type]=='bank'){
	 
	 $payment="โอนเงินเข้าบัญชี";
	 
 }
 
 
 
 
 
 $arr[type] = $db->fetch($res[type]);

 
  $bgcolor = ($i++ & 1) ?  '#A67C52'  : $main_color; 
 

	
 
	
	?>
 
    
  <script>
		 
 	 
  $("#booking_confirm_<?=$arr[project][id]?>").click(function(){ 
  ///
 
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่าต้องการยืนยันการลงทะเบียน",
		type: "success",
		showCancelButton: true,
		confirmButtonColor: '<?=$main_color?>',
		confirmButtonText: 'ใช่',
		cancelButtonText: "ไม่ใช่",
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
	 
	
 
	
//swal("ยืนยัน", "success");

////
  var url_<?=$arr[project][id]?> = "popup.php?name=booking&file=savedata&action=confirm&type=driver&id=<?=$arr[project][id]?>";
 
 $('#booking_action').load(url_<?=$arr[project][id]?>); 
 
  $('#status_<?=$arr[project][id]?>').html('<font style="color:#339900"  class="font-24"><b>ลงทะเบียนสำเร็จ</font>'); 
 
 
 
//

$('#booking_confirm_<?=$arr[project][id]?>').hide(); 

$('#booking_cancel_<?=$arr[project][id]?>').show(); 

$('#booking_payment_<?=$arr[project][id]?>').show(); 

 
	//  alert('dd');
    } else {
      swal("Cancelled", "", "error");
    }
	});
	   
  
  
 

  
  
  
  
  
  
  
  
  /////
 
		 });
		 
 

		 
		 
		 </script>      
         
         
         
         
         
 <script>
		 
 
 

		 
  $("#booking_cancel_<?=$arr[project][id]?>").click(function(){ 
  
 
  
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่าต้องการยกเลิก",
		type: "error",
		showCancelButton: true,
		confirmButtonColor: '#FF0000',
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
  var url_<?=$arr[project][id]?> = "popup.php?name=booking&file=savedata&action=cancel&type=driver&id=<?=$arr[project][id]?>";
 
 $('#booking_action').load(url_<?=$arr[project][id]?>); 
 
  $('#status_<?=$arr[project][id]?>').html('<font style="color:#FF0000"  class="font-24"><b>ลงทะเบียนไม่ได้</font>'); 
  
 ////// update status
 
  var url_check_status_<?=$arr[project][id]?> = "go.php?name=booking/update&file=status&id=<?=$arr[project][id]?>&type=stop";
 $('#update_status_<?=$arr[project][id]?>').load(url_check_status_<?=$arr[project][id]?>);

//

$('#booking_confirm_<?=$arr[project][id]?>').show(); 

$('#booking_cancel_<?=$arr[project][id]?>').hide(); 

$('#booking_payment_<?=$arr[project][id]?>').hide(); 

 
    
   
	//  alert('dd');
    } else {
  //    swal("Cancelled", "", "error");
    }
	});
	   
  
  
 

  
  
  
  
  
  
  
  
  
 

		 });
		 
 

		 
		 
		 </script>      
         
         
         
         
  
  <script>
		 
 	 
  $("#booking_payment_<?=$arr[project][id]?>").click(function(){ 
  ///
 
 
 
	   swal({
		title: "<font style='font-size:28px'><b> ยอดรวม 1,400 บาท",
		text: "<font style='font-size:22px'>ค่าจอด	800 <br>ค่าหัว/คน	200 x 3 = 600",
		type: "success",
		showCancelButton: true,
		confirmButtonColor: '<?=$main_color?>',
		confirmButtonText: 'ชำระเงิน',
		cancelButtonText: "ยกเลิก",
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
	 
	
 
	
//swal("ยืนยัน", "success");

////
  var url_<?=$arr[project][id]?> = "popup.php?name=booking&file=savedata&action=payment&type=driver&id=<?=$arr[project][id]?>&driver=<?=$arr[project][drivername]?>";
 
 $('#booking_action').load(url_<?=$arr[project][id]?>); 
 
  $('#topic_payment_status_<?=$arr[project][id]?>').html('<font style="font-size:22; color:#339900"><b>ชำระแล้ว</font>'); 
 
 
//




$('#topic_payment_status_<?=$arr[project][id]?>').show(); 

$('#booking_confirm_<?=$arr[project][id]?>').hide(); 

$('#booking_cancel_<?=$arr[project][id]?>').hide(); 

$('#booking_payment_<?=$arr[project][id]?>').hide(); 

 
	//  alert('dd');
    } else {
      swal("Cancelled", "", "error");
    }
	});
	   
  
  
 

  
  
  
  
  
  
  
  
  /////
 
		 });
		 
 

		 
		 
		 </script>      
         
         
 

   <div class="col-md-6" style="padding:0px;"> 
   <div  class="div-all-work" style=" border: 2px solid <?= $bgcolor?>;" >
     <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>

    <td class="font-22">
    
    <div style="padding-bottom:10px; ">
 <table width="100%" border="0" cellspacing="1" cellpadding="1" style="padding:5px;   border-radius: 8px; border: 1px solid #ddd;   background:#FFFDE9;    ">
  <tbody>
    <tr>
      <td width="100" style="padding-left:0px;">
      	<div class="taxnumbershow" id="cir_<?=$arr[project][id];?>" style="z-index:99999; margin-top: -30px;  margin-left:-30px; display:none  "   ><table width="100%"  border="0" cellspacing="1" cellpadding="1" style="margin-top:-5px;">
  <tr>
    <td style="font-size:24px; color:#FFFFFF; font-weight:bold "><center><?=$i;?>0</center><? //=$arr[project][server];?></td>
  </tr>
</table>
</div> 
      
 
    <? if($arr[project][status]=='CONFIRM'){ ?>  

<script>

$('#booking_confirm_<?=$arr[project][id]?>').hide(); 


</script>
 
 <? } ?>
      
      
      
      
          <? if($arr[project][status]=='CANCEL'){ ?>  

<script>

$('#booking_cancel_<?=$arr[project][id]?>').hide(); 

$('#booking_payment_<?=$arr[project][id]?>').hide(); 

</script>
 
 <? } ?>
 
 
           <? if($arr[project][status]=='NEW'){ ?>  

<script>

 

$('#booking_payment_<?=$arr[project][id]?>').hide(); 

</script>
 
 <? } ?>
      
      
      
      
      
        	 <script>
 
$('#booking_edit_<?=$arr[project][id]?>').click(function(){  

 $( "#load_mod_popup_3" ).toggle();
	
 var url_load = "load_page_mod_3.php?name=booking&file=new&type=edit&action=confirm&id=<?=$arr[project][id];?>";
 
    $('#load_mod_popup_3').html(load_main_mod);
  $('#load_mod_popup_3').load(url_load); 
  
   $("#load_booking_data").html('');
 
 	});
 
 			
 </script> 
 
 
 
  <script>
 
$('#booking_history_<?=$arr[project][id]?>').click(function(){  

 $( "#load_mod_popup_3" ).toggle();
	
 var url_load = "load_page_mod_3.php?name=booking/load/edit&file=history&type=edit&action=confirm&id=<?=$arr[project][id];?>";
 
    $('#load_mod_popup_3').html(load_main_mod);
  $('#load_mod_popup_3').load(url_load); 
  
   $("#load_booking_data").html('');
 
 	});
 
 			
 </script> 
 

      
        <? if($data_user_class<>'taxi'){ ?>
      
      
      
      
      <div class="btn-group">
     
                 
 
      
                  <button type="button" class="btn btn-warning font-22" style="height:40; padding-left:10px; padding-right:5px; font-size:20px " data-toggle="dropdown"><i class="fa fa-gear"></i>&nbsp;จัดการ</button>
   
                  <ul class="dropdown-menu" role="menu"  style="background-color:<?=$main_color?>">
                
                 <li><a  id="booking_edit_<?=$arr[project][id]?>"     style="color:#FFFFFF; font-size:22px"><i class="fa fa-edit"></i>แก้ไขข้อมูล</a></li>
  
 
                  
 <li><a  id="booking_confirm_<?=$arr[project][id]?>" class="font-22" style="color:#FFFFFF; font-size:22px"><i class="fa fa-check-square"></i>ยืนยันการลงทะเบียน</a></li>
                    
 <li><a id="booking_cancel_<?=$arr[project][id]?>" class="font-22" style="color:#FFFFFF; font-size:22px"><i class="fa fa-trash"></i>ลงทะเบียนไม่ได้</a></li>
 
  
  <li><a id="booking_history_<?=$arr[project][id]?>" class="font-22" style="color:#FFFFFF; font-size:22px"><i class="fa fa-calendar"></i>ประวัติการจัดการงาน</a></li>
 
                  
<li><a id="booking_payment_<?=$arr[project][id]?>" class="font-22" style="color:#FFFFFF; font-size:22px"><i class="fa fa-thumbs-up"></i>ชำระเงิน</a></li> 
   
 
 
                  </ul>
              </div>
              
              
       <? } 
	   else {?>       
       
       
<div class="btn-group">
     
                 
 
      
                  <button type="button" class="btn btn-warning font-22" style="height:40; padding-left:5px; padding-right:5px; font-size:20px; background-color:<?=$main_color?>; border:none " data-toggle="dropdownห"><i class="fa fa-gear fa-spin 4x"></i>&nbsp;สถานะ</button>
   
                  <ul class="dropdown-menu" role="menu"  style="background-color:<?=$main_color?>">
                
                 <li><a  id="booking_edit_<?=$arr[project][id]?>"     style="color:#FFFFFF; font-size:22px"><i class="fa fa-edit"></i>แก้ไขข้อมูล</a></li>
  
 
                  
 <li><a  id="booking_confirm_<?=$arr[project][id]?>" class="font-22" style="color:#FFFFFF; font-size:22px"><i class="fa fa-check-square"></i>ยืนยันการลงทะเบียน</a></li>
                    
 <li><a id="booking_cancel_<?=$arr[project][id]?>" class="font-22" style="color:#FFFFFF; font-size:22px"><i class="fa fa-trash"></i>ลงทะเบียนไม่ได้</a></li>
 
  
 
 
                  
<li><a id="booking_payment_<?=$arr[project][id]?>" class="font-22" style="color:#FFFFFF; font-size:22px"><i class="fa fa-thumbs-up"></i>ชำระเงิน</a></li> 
   
 
 
                  </ul>
              </div>
       
       
       
  <? } ?>     
              
              </td>
      <td id="status_<?=$arr[project][id]?>"><font color=""></font>
	 
  
     
     <div  id="update_status_<?=$arr[project][id]?>"> </div>
     
     <script>
 
  var url_check_status_<?=$arr[project][id]?> = "go.php?name=booking/update&file=status&id=<?=$arr[project][id]?>&type=stop";
 $('#update_status_<?=$arr[project][id]?>').load(url_check_status_<?=$arr[project][id]?>);
 
 
 setInterval(function() {
 //alert(0);
 var url_check_status_<?=$arr[project][id]?> = "go.php?name=booking/update&file=status&id=<?=$arr[project][id]?>&type=stop";
 $('#update_status_<?=$arr[project][id]?>').load(url_check_status_<?=$arr[project][id]?>);
 //alert(0);
  
}, 60000); // 60000 milliseconds = one minute
 
 
 
	</script>
     
     
      
      </td>
      <td width="20" id="status_<?=$arr[project][id]?>">
      
 
      
          <? if($arr[project][booking_pic]=='1'){ ?>  
          
 
                   <i class="fa  fa-photo take-photo-icon-small"  id="button_photo_vc_<?=$arr[project][id]?>"></i>   
       
 
       
 
          
          <? } ?>
      
      
      </td>
    </tr>
  </tbody>
</table>

              
    
    </div>
 
    
    
    <b>
    

 
      <?  include ("mod/booking/load/form/place.php");?>
    
    
      <div style="font-size:14px; color:#009999; padding-bottom:10px; margin-top:10px; ">
 
 
    <div id="main_data_booking_div_<?=$arr[project][id]?>"> <?  include ("mod/booking/load/form/data.php");?></div>
    
    
    
  <? if($arr[project][passport_pic]==1){ ?>
       
   <div id="main_data_booking_div_<?=$arr[project][id]?>"> <?  include ("mod/booking/load/form/passport.php");?></div>
 
  <? } ?>
    
    
    
     <div id="main_back_booking_div_<?=$arr[project][id]?>"> <?  include ("mod/booking/load/form/back.php");?></div>
    
  <div id="main_driver_booking_div_<?=$arr[project][id]?>"> <?  include ("mod/booking/load/form/driver.php");?></div>
        
        

    
    
     <div id="main_checkin_booking_div_<?=$arr[project][id]?>">
 
     
	 <?  include ("mod/booking/load/form/checkin.php");?>
 
     
     </div>
     <div id="main_price_booking_div_<?=$arr[project][id]?>" style="display:none"> <?  include ("mod/booking/load/form/price.php");?></div>
 
 
 <? if($arr[project][status]=='CONFIRM'){?>
 
  <script>  
// $("#show_register_cancel").hidden();  
  $("#main_price_booking_div_<?=$arr[project][id]?>").show();
  </script>
  
  <? } ?>
      
 
    </div> 
      </td>
    </tr>
    
    
</table>
  
     </div>
     </div>
	 
	
	   <script>
			 $('#button_photo_vc_<?=$arr[project][id]?>').click(function(){  
 
			 $("#preview_image_album").attr("src", "../data/fileupload/edit_work/<?=$arr[project][invoice]?>_big.jpg?v=<?=$arr[project][update_date]?>");
			$( "#popup_chat_preview_photo" ).toggle(); 
			 });
 
 
			</script>
	  
 <? } ?>  
  
  
 
 
            
 
            <script>
		 
 

		 
  $("#topoint_booking_data_<?=$arr[project][id]?>").click(function(){ 
  
 
  
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่ามาร           <? if($data_user_class<>'Staxi'){ ?>
     
          
              <? } ?>
          
กขึ้นรถแล้ว",
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
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่าได้รับเงินแล้ว",
		
		
	type: "info",
	
 
	
	
	
		showCancelButton: true,
		confirmButtonColor: '#39B54A',
		confirmButtonText: 'ใช่',
		cancelButtonText: "ไม่ใช่",
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
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
	   
  
  
 

  
  
  
  
  
 

		 });
		 
 
		 
		 </script>      
  </div>        <div id="tab_chk_qr" class="tab-pane fade">
	
   <?
 //include("mod/load/show/step/qr_scan.php");
  /// include("mod/load/show/step/index.html");
 ?>
    </div>