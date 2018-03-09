<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <?    include ("mod/booking/photo/preview_photo.php");?>

 <div id="booking_action" style="display:nones"></div>
  <style>
 
 .div-all-work{
	 padding:5px;   border-radius: 6px; border: 1px solid #ddd;   background:<? echo $bgcolor; ?>; margin-bottom:20px; box-shadow: 0px  0px 10px #DADADA  ;
	 
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
		 
 
 
 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM   web_driver   order by id desc  ");
	///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
	while($arr[project] = $db->fetch($res[project])){  
	
 
 
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
 
  $('#status_<?=$arr[project][id]?>').html('<font style="font-size:22; color:#339900"><b>ลงทะเบียน</font>'); 
 
 
 
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
 
  $('#status_<?=$arr[project][id]?>').html('<font style="font-size:22; color:#FF0000"><b>ยกเลิก</font>'); 
 


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
         
         
         
 

   <div class="col-md-6" style="padding:0px;" > 
   <div style="padding:5px;   border-radius: 6px; border: 1px solid #ddd;   background:<? echo $bgcolor; ?>   " class="div-all-work">
     <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
     
    <td class="font_16">
    
    <div style="padding-bottom:10px; ">
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="100">
      
      
      
      
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
      
      
      
      

      
      
      <div class="btn-group">
     
                 
 
      
                  <button type="button" class="btn btn-warning font_22" style="height:40; padding-left:5px; padding-right:5px; font-size:20px " data-toggle="dropdown"><i class="fa fa-gear"></i>&nbsp;จัดการ</button>
   
                  <ul class="dropdown-menu" role="menu"  style="background-color:<?=$main_color?>">
          
          
          
                  
   <li><a  href="?name=register&file=edit&action=edit&id=<?=$arr[project][id];?>"   style="color:#FFFFFF; font-size:22px"><i class="fa fa-edit"></i>แก้ไขข้อมูล</a></li>
  
 
                  
 <li><a  id="abooking_confirm_<?=$arr[project][id]?>" class="font_20" style="color:#FFFFFF; font-size:22px"><i class="fa fa-check-square"></i>ยืนยันการสมัคร</a></li>
                    
 <li><a id="abooking_cancel_<?=$arr[project][id]?>" class="font_20" style="color:#FFFFFF; font-size:22px"><i class="fa fa-trash"></i>ยกเลิก</a></li>
 
   
 
 
                  </ul>
              </div></td>
      <td id="status_<?=$arr[project][id]?>"><font color=""></font>
	 
     <font style="font-size:20; color:<? 
 
 
 
	                   if($arr[project][status] == "CANCEL" ) { 
                          echo "#ff0000" ;
						  
						  $status="ยกเลิก";
						  
                        }
	 
                        /////////////
                        if($arr[project][status] == "NEW" ) { 
                          echo "#0099CC" ;
						  $status="ใหม่";
                        }
                        /////////////
                        if($arr[project][status] == "CONFIRM" ) {
                          echo "#339900" ;
						  
						   $status="ลงทะเบียน";
                        }?>">
     
     <b> 
	 
     
     <?  
	$arr[project][post_date];
	 
	 
	echo   $date = date('Y-m-d ',  $arr[project][post_date]);
    
  
     
      ?>
      
  &nbsp;&nbsp;    <span class="font-16" > <font color="#333333" ><? echo   $date = date('H:i:s ',  $arr[project][post_date]); ?></font></span>
      
      
      </td>
      <td width="30" id="status_<?=$arr[project][id]?>">
      
      
      
     
      
          <? if($arr[project][booking_pic]=='1'){ ?>  
          
          
          			
          
                   <i class="fa  fa-photo take-photo-icon-small"  id="button_photo_vc_<?=$arr[project][id]?>"></i>   
       
 
       
 
          
          <? } ?>
      
      
      </td>
    </tr>
  </tbody>
</table>

              
    
    </div>
 
    
    
    <b>
      <div style="font-size:14px; color:#009999; padding-bottom:10px; ">
 
    <div style="padding-bottom:3px; ">
    
    
     
     
     <?
	 
	  
        $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $res[other] = $db->select_query("SELECT * FROM  store_carall_register   where  id=".$arr[project][car_num]."");
		
     $arr[other] = $db->fetch($res[other]);
	 
	 $arr[other][car_type];
		
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
  

            $res[aum]   = $db->select_query("SELECT * FROM " .TB_carall_type." WHERE id='" . $arr[other][car_type] . "' ");
            $arr[aum]   = $db->fetch($res[aum]);
	 
	 
	 
	 
	 
	                        $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
                         //$res[category] = $db->select_query("SELECT * FROM ".TB_transferplace." where pro < 4 and status = 1 ORDER BY topic ");
                         $res[category] = $db->select_query("SELECT * FROM web_amphur where id='".$arr[project][driver_zone]."'     ");
                       $arr[zone] = $db->fetch($res[category]);
	 
	 ?>
 <table width="100%"  border="0" cellspacing="2" cellpadding="2" class="drivertable">
  <tr style="display:none">
    <td width="40%" ><img src="../data/fileupload/store/register/<?=$arr[project][code];?>_id_driver.jpg?v=<?=$arr[project][update_date];?>"  width="100%"   border="0"  class="IMGSHOP"   style="margin-top:15px;border-radius:5px;" /></td>
    <td width="60%" valign="top" style="padding-left:20px">
	  <style>
		
	.drivertable{        
        border-radius:5px; margin-top:10px; margin-bottom:10px;

   border:0px solid #999999; background-color:#FFFFFF; 
   box-shadow: 0px 1px 5px #DADADA;  }
	.tdtable  td {height:26px;}
	
	</style>
	  <br><? if($arr[other][plate_color]=="Green"){
	 
	 $plate_color="009999"; } ?>
       <? if($arr[other][plate_color]=="Yellow"){
	 
	 $plate_color="FFCC00"; } ?>
       <? if($arr[other][plate_color]=="Black"){
	 
	 $plate_color="FFFFFF"; } ?>
       <? if($arr[other][plate_color]=="Red"){
	 
	 $plate_color="FF0000"; } ?><table width="95%" cellpadding="1" cellspacing="2"  style="margin-left:0px;  margin-right: 0px; margin-bottom:5px; margin-right:10px; " >
       <?

if($_GET[company_tran] == ''){
	$_GET[company_tran] = 283;
}

if($_GET[company_tran] != ''){
	
	$company_tran = " and company = '".$_GET[company_tran]."' ";

}

if($_GET[status] != ''){
	
	$status = " and status = '".$_GET[status]."' ";

}



 

	$res[category] = $db->select_query("SELECT * FROM ".TB_admin." WHERE id='".$arr[other][company]."' ");
	$arr[category] = $db->fetch($res[category]);

	$res[car_type] = $db->select_query("SELECT * FROM ".TB_carall_type." WHERE id='".$arr[other][car_type]."' ");
	$arr[car_type] = $db->fetch($res[car_type]);
	
	
	
	       $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                         
    //$res[category] = $db->select_query("SELECT * FROM ".TB_transferplace." where pro < 4 and status = 1 ORDER BY topic ");
  $res[category] = $db->select_query("SELECT * FROM web_amphur where id='".$arr[project][driver_zone]."'     ");
                       $arr[zone] = $db->fetch($res[category]);
	 

 





	//Comment Icon
 

?>
       <? if($arr[other][plate_color]=="Green"){
	 
	 $plate_color="009999"; } ?>
       <? if($arr[other][plate_color]=="Yellow"){
	 
	 $plate_color="FFCC00"; } ?>
       <? if($arr[other][plate_color]=="Black"){
	 
	 $plate_color="FFFFFF"; } ?>
       <? if($arr[other][plate_color]=="Red"){
	 
	 $plate_color="FF0000"; } ?>
  <td width="80" align="center" bgcolor="#<?=$plate_color?>" style="border: solid 2px; color:#DADADA; padding:5px; padding-right:10px;border-radius:5px;"><font color="#<? if($arr[other][plate_color]=="Green"){
	 
	 echo "FFFFFF"; } ?>"  class="font_26"><b><? echo $arr[other][plate_num];?> <br> 
              <font   class="font_20"><? echo $arr[other][province];?></font></b></font></td>
  </tr>
  <?

 

?>
     </table>
	  <table width="100%"  border="0" cellspacing="2" cellpadding="2"  class="tdtable" >
      <tr>
        <td width="80"  class="font_14"><strong>ประเภท</strong></td>
        <td  class="font_14"><? echo "" . $arr[aum][topic_en] . " "; ?></td>
      </tr>
      <tr>
        <td class="font_14"><strong>ยี่ห้อ</strong></td>
        <td class="font_14"><?echo $arr[other][car_brand];?></td>
      </tr>
      <tr>
        <td class="font_14"><strong>รุ่น</strong></td>
        <td class="font_14"><?echo $arr[other][car_sub_brand];?></td>
      </tr>
    </table></td>
  </tr>
</table>
    <table width="100%" border="0" cellspacing="1" cellpadding="5" style="margin-top:-15px;">
  <tbody>
    <tr style="display:none">
      <td width="33%"><img src="../data/fileupload/store/register/<?=$arr[project][code];?>_id_car_1.jpg?v=<?=$arr[project][update_date];?>"  width="100%"   border="0"      style="margin-top:15px;border-radius:5px;" /></td>
      <td width="33%"><img src="../data/fileupload/store/register/<?=$arr[project][code];?>_id_car_2.jpg?v=<?=$arr[project][update_date];?>"  width="100%"   border="0"      style="margin-top:15px;border-radius:5px;" /></td>
      <td width="33%"><img src="../data/fileupload/store/register/<?=$arr[project][code];?>_id_car_3.jpg?v=<?=$arr[project][update_date];?>"  width="100%"   border="0"      style="margin-top:15px;border-radius:5px;" /></td>
    </tr>
  </tbody>
</table>
      <table width="100%" border="0" cellspacing="5" cellpadding="1">
      
        <tr>
          <td width="110"  class="font_16"><font color="#999999" class="font_16"><i class="fa  fa-user"></i></font>&nbsp;<b>ชื่อจริง</td>
          <td class="font_16"><B><?=$arr[project][name];?>
            &nbsp;&nbsp;</td>
        </tr>
                <tr>
          <td  class="font_16"><font color="#999999"><i class="fa  fa-user"></i></font>&nbsp;<b>ชื่อเล่น</td>
          <td class="font_16"><B><?=$arr[project][nickname];?>
            &nbsp;&nbsp;</td>
        </tr>
        
        <tbody>
        
          <tr>
            <td  class="font_16"><font color="#999999"><i class="fa  fa-phone"></i></font>&nbsp;<b>เบอร์โทร </td>
            <td class="font_16"><?=$arr[project][phone];?>&nbsp;&nbsp;</td>
          </tr>
          
          <tr>
            <td    class="font_16"><font color="#999999"><i class="fa  fa-map-marker"></i></font>&nbsp;<b>โซนประจำ</td>
            <td class="font_16"><?=$arr[zone][name];?></td>
          </tr>
        </tbody>
      </table>
  </div> 
      </td>
    </tr>
</table>
  
     </div>
     </div>
	 
	
	   <script>
			 $('#button_photo_vc_<?=$arr[project][id]?>').click(function(){  
 
			 $("#preview_image_album").attr("src", "../data/fileupload/register/<?=$arr[project][invoice]?>_big.jpg");
			$( "#popup_chat_preview_photo" ).toggle(); 
			 });
 
 
			
			</script>
	  
 <? } ?>  
  