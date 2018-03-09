
  <?    include ("mod/booking/photo/preview_photo.php");?>

 <div id="booking_action" style="display:nones"></div>
 
 
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
		 
		 
		 
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM  order_booking  where transfer_date='".$_GET[day]."' order by id desc  ");
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
         
         
         
 

   <div class="col-md-6" style="padding:0px;"> 
   <div style="padding:5px;   border-radius: 6px; border: 1px solid #ddd;   background:<? echo $bgcolor; ?>   ">
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
          
          
          
                  
                 <li><a  href="?name=booking&file=edit&action=confirm&id=<?=$arr[project][id];?>"  style="color:#FFFFFF; font-size:22px"><i class="fa fa-edit"></i>แก้ไข</a></li>
  
 
                  
 <li><a  id="booking_confirm_<?=$arr[project][id]?>" class="font_20" style="color:#FFFFFF; font-size:22px"><i class="fa fa-check-square"></i>ยืนยันการลงทะเบียน</a></li>
                    
 <li><a id="booking_cancel_<?=$arr[project][id]?>" class="font_20" style="color:#FFFFFF; font-size:22px"><i class="fa fa-trash"></i>ยกเลิก</a></li>
 
  
 
 
                  
<li><a id="booking_payment_<?=$arr[project][id]?>" class="font_20" style="color:#FFFFFF; font-size:22px"><i class="fa fa-thumbs-up"></i>ชำระเงิน</a></li> 
   
 
 
                  </ul>
              </div></td>
      <td id="status_<?=$arr[project][id]?>"><font color=""></font>
	 
     <font style="font-size:22; color:<? 
 
 
 
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
     
     <b> <?=$status;?>
      
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
    
    
     
 
    
      <table width="100%" border="0" cellspacing="5" cellpadding="1">
        <tr>
          <td width="120"  class="font_16"><font color="#999999"><i class="fa  fa-cab"></i></font>&nbsp;<b>เลขการจอง</td>
          <td class="font_22"><B><?=$arr[project][invoice];?>
            &nbsp;&nbsp;</td>
        </tr>
        <tbody>
          <tr>
            <td  class="font_16"><font color="#999999"><i class="fa  fa-calendar"></i></font>&nbsp;<b>วันที่ </td>
            <td class="font_18"><?=$arr[project][transfer_date];?>&nbsp;&nbsp;</td>
          </tr>
          <tr>
            <td    class="font_16"><font color="#999999"><i class="fa  fa-clock-o"></i></font>&nbsp;<b>เวลาส่ง</td>
            <td class="font_18"><?=$arr[project][airout_time];?></td>
          </tr>
          <tr>
            <td  class="font_16"><font color="#999999" ><i class="fa  fa-user"></i></font>&nbsp;&nbsp;<b>จำนวนแขก</td>
            <td class="font_18"> 
              <?
 
	
	 if($arr[project][adult]>0){ ?>
ผู้ใหญ่ :
<?=$arr[project][adult];?>&nbsp;
<? } ?>
<? if($arr[project][child]>0){ ?>
เด็ก :
<?=$arr[project][child];?>
<? } ?>
 
            </span></td>
          </tr>
          <tr>
            <td class="font-16"><font color="#999999" ><i class="fa  fa-flag"></i></font>&nbsp;&nbsp;<b>สัญชาติ</td>
            <td class="font-16"><span style="height:35px;"><img src="images/flag/China.png" width="30" height="30" alt="" style="margin-top:-5px;"/>  
            
     <?
	 								  $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
                         
            
                                    $res[category] = $db->select_query("SELECT * FROM  guest_nation where id=".$arr[project][nation]."  ORDER BY id  ");
                      
                       $arr[category] = $db->fetch($res[category]) ;
					   
					   
					   
					   echo $arr[category][name];
	 
	 ?>       
         
         
         
            
            
            
            
            </span></td>
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
  