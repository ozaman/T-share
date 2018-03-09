 
 <div style="margin-top:45px;"> 
 
 
 
<script>

  $("#text_mod_topic_action" ).html("งานตอนนี้");
 
  </script> 

  <?    include ("mod/booking_realtime/photo/preview_photo.php");?>

 <div id="booking_action" style="display:nones"></div>
 
 
 <style>
 
 .div-all-work{
	 padding:5px;   border-radius: 3px; border: 1px solid #ddd;   background:<? echo $bgcolor; ?>; margin-bottom:20px; box-shadow: 0px  0px 10px #DADADA  ;
	 
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
$res[project] = $db->select_query("SELECT * FROM  order_booking  where transfer_date='".$_GET[day]."' $filter  order by id desc limit 1  ");
	///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
	while($arr[project] = $db->fetch($res[project])){  
	
 
 
 if($arr[project][payment_type]=='money'){
	 
	 $payment="เงินสด";
	 
 }
 
  if($arr[project][payment_type]=='bank'){
	 
	 $payment="โอนเงินเข้าบัญชี";
	 
 }
 
 
 
 
 
 $arr[type] = $db->fetch($res[type]);
 
 		$bgcolor = ($i++ & 1) ? '#FFFFFF' : '#F6F6F6'; 
 
	
	
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
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่าต้องการชำระเงิน",
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
   <div  class="div-all-work">
     <table width="100%"  border="0" cellspacing="0" cellpadding="0">
       <tr>
         <td class="font-22"><div style="padding-bottom:10px; ">
           <table width="100%" border="0" cellspacing="1" cellpadding="1" style="padding:5px;   border-radius: 3px; border: 1px solid #ddd;   background:#FFFDE9;    ">
             <tbody>
               <tr>
                 <td width="100"><? if($arr[project][status]=='CONFIRM'){ ?>
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

 $( "#load_mod_popup" ).toggle();
	
 var url_load = "load_page_mod.php?name=booking&file=edit&action=confirm&id=<?=$arr[project][id];?>";
 
    $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
 
 	});
 
 			
       </script>
                   <? if($data_user_class<>'taxi'){ ?>
                   <div class="btn-group">
                     <button type="button" class="btn btn-warning font-22" style="height:40; padding-left:5px; padding-right:5px; font-size:20px " data-toggle="dropdown"><i class="fa fa-gear"></i>&nbsp;จัดการ</button>
                     <ul class="dropdown-menu" role="menu"  style="background-color:<?=$main_color?>">
                       <li><a  id="booking_edit_<?=$arr[project][id]?>"     style="color:#FFFFFF; font-size:22px"><i class="fa fa-edit"></i>แก้ไขข้อมูล</a></li>
                       <li><a  id="booking_confirm_<?=$arr[project][id]?>" class="font-22" style="color:#FFFFFF; font-size:22px"><i class="fa fa-check-square"></i>ยืนยันการลงทะเบียน</a></li>
                       <li><a id="booking_cancel_<?=$arr[project][id]?>" class="font-22" style="color:#FFFFFF; font-size:22px"><i class="fa fa-trash"></i>ลงทะเบียนไม่ได้</a></li>
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
                   <? } ?></td>
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
  
}, 5000); // 60000 milliseconds = one minute
 
 
 
	   </script></td>
                 <td width="20" id="status_<?=$arr[project][id]?>"><? if($arr[project][booking_pic]=='1'){ ?>
                   <i class="fa  fa-photo take-photo-icon-small"  id="button_photo_vc_<?=$arr[project][id]?>"></i>
                   <? } ?></td>
               </tr>
             </tbody>
           </table>
         </div>
           <b>
           <?
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[shop] = $db->select_query("SELECT * FROM shopping_product  WHERE id='".$arr[project][program]."' ");
		$arr[shop] = $db->fetch($res[shop]);


?>
           <div  class="div-all-palce"  >
             <table width="100%" border="0" cellspacing="1" cellpadding="1">
               <tbody>
                 <tr>
                   <td width="100" rowspan="2"><img src="images/shop_logo/<? echo $arr[shop][logo_code];?>.png" alt="Edit" width="95" border="0" class="img-logo" ></td>
                   <td class="font-22"><span class="font-24" style="color:<?=$arr[shop][text_color]?>"><? echo $arr[shop][topic_th];?></span></td>
                 </tr>
                 <tr>
                   <td class="font-24"><i class="fa  fa-clock-o" style="width:20px; color:#999999"  ></i><b><? echo $arr[shop][start_time];?> - <? echo $arr[shop][finish_time];?></td>
                 </tr>
               </tbody>
             </table>
             <script>
$('#shop_sub_menu_map_<?=$arr[project][id]?>').click(function(){  

 $( "#load_mod_popup" ).toggle();
	

 
  var url_load_<?=$arr[project][id]?>= "load_page_mod.php?name=booking/popup&file=map&shop_id=<?=$arr[project][program]?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load_<?=$arr[project][id]?>); 
	  

 	});
	
	
	///
	$('#shop_sub_menu_pic_<?=$arr[project][id]?>').click(function(){  

 $( "#load_mod_popup" ).toggle();
 
  var url_load_<?=$arr[project][id]?>= "load_page_mod.php?name=booking/popup&file=pic&shop_id=<?=$arr[project][program]?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load_<?=$arr[project][id]?>); 
	  

 	});
	
	
	
		///
	$('#shop_sub_menu_price_<?=$arr[project][id]?>').click(function(){  
	
	  
		
	 
	

 $( "#load_mod_popup" ).toggle();
 
  var url_load_<?=$arr[project][id]?>= "load_page_mod.php?name=booking/popup&file=price&shop_id=<?=$arr[project][program]?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load_<?=$arr[project][id]?>); 
  

	  

 	});
 
       </script>
             <div style="background-color:#FFF; padding:3PX; margin-top:5px; border-top:1px  dotted #666666; ">
               <table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#FFFFFF">
                 <tbody>
                   <tr>
                     <td width="33%" class="font-22"><span id="shop_sub_menu_map_<?=$arr[project][id]?>"><i class="fa  fa-map-marker" style="width:10px;color:<?=$main_color?>" ></i> นำทาง</span></td>
                     <td width="33%" class="font-22"><span id="shop_sub_menu_pic_<?=$arr[project][id]?>"><i class="fa   fa-photo" style="width:20px;color:<?=$main_color?>" ></i> รูปภาพ</span></td>
                     <td width="33%" class="font-22"><span  id="shop_sub_menu_price_<?=$arr[project][id]?>"><i class="fa  fa-folder-open" style="width:18px;color:<?=$main_color?>" ></i> รายได้</span></td>
                   </tr>
                 </tbody>
               </table>
             </div>
           </div>
           <div style="font-size:14px; color:#009999; padding-bottom:10px; margin-top:10px; ">
             <table width="100%" border="0" cellspacing="5" cellpadding="1">
               <tr id="booking_topoint_<?=$arr[project][id]?>" style="display:nones">
                 <td class="font-28 box-bottom-line" colspan="2" style="padding-top: 0px;"><font color="<?=$text_topic_color?>"><b> ข้อมูลช็อปปิ้ง</font></td>
               </tr>
               <tr>
                 <td width="100"  class="font-22"><font color="#333333"></font><b>เลขจอง</td>
                 <td class="font-22"><?=$arr[project][invoice];?>
                   &nbsp;&nbsp;</td>
               </tr>
               <tbody>
                 <tr>
                   <td  class="font-22"><font color="#333333"><b>วันที่ </td>
                   <td class="font-22"><?=$arr[project][transfer_date];?>
                     &nbsp;&nbsp;</td>
                 </tr>
                 <tr>
                   <td    class="font-22"><font color="#333333"><b>ใช้เวลาเดินทาง</td>
                   <td class="font-22"><? if($arr[project][airout_h]>0){ ?>
                     <?=$arr[project][airout_h];?>
                     ชั่วโมง
                     <? } ?>
                     <? if($arr[project][airout_m]>0){ ?>
                     <?=$arr[project][airout_m];?>
                     นาที
                     <? } ?></td>
                 </tr>
                 <tr>
                   <td  class="font-22"><font color="#333333" ><b>จำนวน</td>
                   <td class="font-22"><?
 
	
	 if($arr[project][adult]>0){ ?>
                     ผู้ใหญ่ :
                     <?=$arr[project][adult];?>
                     &nbsp;
                     <? } ?>
                     <? if($arr[project][child]>0){ ?>
                     เด็ก :
                     <?=$arr[project][child];?>
                     <? } ?>
                     <?
  	   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
            
                  $res[category] = $db->select_query("SELECT * FROM  web_country  where id=".$arr[project][nation]."  ORDER BY id  ");
                      
                       $arr[category] = $db->fetch($res[category]) ;
					   
  
  ?>
                     </span></td>
                 </tr>
                 <tr>
                   <td class="font-22"><font color="#333333" ><b>สัญชาติ&nbsp;<img src="images/flag/<?=$arr[category][name_en]?>.png" width="30" height="30" alt="" style="margin-top:-5px;"/></td>
                   <td class="font-22"><span style="height:35px;">
                     <?

					   
					   
					   echo $arr[category][name_th];
	 
	 ?>
                   </span></td>
                 </tr>
                 <tr id="tr_booking_topoint_<?=$arr[project][id]?>" style="display:nones">
                   <td class="font-28 box-bottom-line" colspan="2" style="padding-top:10px;"><font color="<?=$text_topic_color?>"><b> รายได้ </font></td>
                 </tr>
                 <tr>
                   <td class="font-22"><font color="#333333" ><b>รับเงิน</td>
                   <td class="font-22"><?=$payment?></td>
                 </tr>
                 <tr>
                   <td class="font-22"><font color="#333333" ><b>ค่าจอด</td>
                   <td class="font-22"><?=$arr[project][price_park]; ?></td>
                 </tr>
                 <tr>
                   <td class="font-22"><font color="#333333" ><b>ค่าหัว/คน</td>
                   <td class="font-22"><?=$arr[project][price_person]; ?>
                     x
                     <?=$arr[project][adult]; ?>
                     =
                     <?=$arr[project][price_person]*$arr[project][adult] ?></td>
                 </tr>
                 <tr>
                   <td class="font-22"><font color="#333333" ><b>รวม</td>
                   <td class="font-22"><?=number_format( $arr[project][price_total] , 0);?></td>
                 </tr>
                 <tr id="booking_topoint_<?=$arr[project][id]?>" style="display:nones">
                   <td class="font-28 box-bottom-line" colspan="2"  style="padding-top:10px;"><font color="<?=$text_topic_color?>"><b> ข้อมูลการเช็คอิน</font></td>
                 </tr>
                 <? if($data_user_class<>'Staxi'){ ?>
                 <tr id="booking_topoint_<?=$arr[project][id]?>" style="display:nones">
                   <td class="font-22"><button id="complete_booking_data_<?=$arr[project][id]?>" type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px "><span class="font-22"><i class="fa  fa-map-marker" style="width:20px;"  ></i> แจ้งถึงแล้ว</button></td>
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
                     <? if($arr[project][payment_status]=='1' ){ ?>
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
                 <tr>
                   <td colspan="2" class="font-22"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                     <tbody>
                       <tr>
                         <td width="50%"></td>
                         <td width="50%"></td>
                       </tr>
                       <tr>
                         <td width="50%" align="left" id="time_complete_booking_data_<?=$arr[project][id]?>" class="font-22"><div class="dropup"   >
                           <div class="btn  btn-default" style=" width:100%; text-align:left; padding:2px; padding-left:5px; height:40px;" data-toggle="dropdown">
                             <table width="100%" border="0" cellspacing="1" cellpadding="1">
                               <tbody>
                                 <tr>
                                   <td width="30"><i class="fa fa-phone-square" style="font-size:32px; color: #8DC63F; border:none"></i></td>
                                   <td  class="font-24"><b>โทรศัพท์</td>
                                 </tr>
                               </tbody>
                             </table>
                           </div>
                           <ul class="dropdown-menu" role="menu"  style="background-color:<?=$main_color?> ; right:0px; width:250px;  padding:5px; position:absolute    ">
                             <li style="margin-left:-15px;"><a href="tel:0935248406"  id="booking_edit_<?=$arr[project][id]?>"     style="color:#FFFFFF; font-size:20px"><i class="fa fa-phone-square"></i>ฝ่ายการตลาด (โชค)</a></li>
                             <li style="margin-left:-15px;"><a href="tel:"  id="booking_edit_<?=$arr[project][id]?>"     style="color:#FFFFFF; font-size:20px"><i class="fa fa-phone-square"></i>ฝ่ายต้อนรับ</a></li>
                           </ul>
                         </div></td>
                         <td width="50%" align="left" id="time_complete_booking_dataห_<?=$arr[project][id]?>"  ><div class="btn  btn-default" style=" width:100%; text-align:left;  padding:2px;height:40px;">
                           <table width="100%" border="0" cellspacing="1" cellpadding="1">
                             <tbody>
                               <tr>
                                 <td width="30"><img src="images/icon/top/zello.png" width="30" height="30" alt=""/></td>
                                 <td class="font-24"><b>Zello</td>
                               </tr>
                             </tbody>
                           </table>
                         </div></td>
                       </tr>
                     </tbody>
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
		 
 

		 
		 
		 </script></td>
                 </tr>
                 <? } ?>
               </tbody>
             </table>
           </div></td>
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
   <div>