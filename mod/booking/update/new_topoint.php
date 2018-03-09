
    <div class="back-full-popup">
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div   id="btn_close_new_booking"><i class="fa fa-arrow-circle-left" style="font-size:22px; color:#FFFFFF "> </div></i></td>
  <td   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup">แจ้งการรับแขกขึ้นรถ</div></td>
    <td width="50" align="right"   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup_icon"><button type="button" class="btn"     data-backdrop="static" id="btn_send_gps_point" style="padding:1px; width:60px;   background-color: #FFCC00;font-size:15px; margin-top: -2px; display:none " >  <i class='fa  fa-send'></i> <?=chat_send?></button>
 </center></div></td>
  </tr>
</table>
</div>
 
 <br>
<br> 
 

 

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

,driver_complete
,driver_pickup
,driver_complete

,driver_complete_date
,driver_pickup_date
,driver_complete_date
,product_area

";

 

 
 $daywork= $_GET[day];

if($_GET[day]==''){
	
	$_GET[day] = date('Y-m-d');
	
}
		 
		 
		 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM  order_booking  where  id='".$_GET[id]."' order by id desc  ");
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
 
<div style="padding:5px;   border-radius: 6px; border: 1px solid #ddd;   background:#FFFFFF   " class="tab_alert">
     <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
     
    <td class="font_16">
    
    <div style="padding-bottom:10px; ">
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="40"><i class="fa fa-street-view" style="width:20px;font-size:34px;"></i>
      
 
    </td>
      <td id="status_<?=$arr[project][id]?>"  style="font-size:34px;"> 
        
   <b>รับแขกขึ้นรถ
        
      </td>
      </tr>
  </tbody>
</table>

              
    
    </div>
 
    

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
            <td    class="font_16"><font color="#999999"><i class="fa  fa-clock-o"></i></font>&nbsp;<b>เวลาเดินทาง</td>
            <td class="font_18">
            
            <? if($arr[project][airout_h]>0){ ?>
			
			<?=$arr[project][airout_h];?> ชั่วโมง
            
            <? } ?>
            
                        <? if($arr[project][airout_m]>0){ ?>
			
			<?=$arr[project][airout_m];?> นาที
            
            <? } ?>
            
            
            </td>
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
	 								  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
            
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


 
 <?
 
 //echo date('Y-m-d');
 
///echo date('N');
 //echo $_GET[id];
 
 
  
  
  /*
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
$res[dv] = $db->select_query("SELECT * FROM store_driver_register WHERE id='".$_GET[driver] ."'  order by id desc limit 1   "); 
$arr[dv] = $db->fetch($res[dv]);
 
 
 */
 

 
 
 
 $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
$res[dv] = $db->select_query("SELECT * FROM web_driver WHERE id='".$arr[project][drivername]."'  order by id desc limit 1   "); 
$arr[dv] = $db->fetch($res[dv]);
 
 
 
 /*
        $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $res[other] = $db->select_query("SELECT * FROM  store_carall_register   where  id=".$arr[dv][car_num]."");
		
     $arr[other] = $db->fetch($res[other]);
	 */
  
        $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $res[other] = $db->select_query("SELECT * FROM  " .TB_carall."   where  id=".$arr[dv][car_num]."");
		
     $arr[other] = $db->fetch($res[other]);	 
	 
	 
	 
	 
	 $arr[other][car_type];
		
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
  

            $res[aum]   = $db->select_query("SELECT * FROM " .TB_carall_type." WHERE id='" . $arr[other][car_type] . "' ");
            $arr[aum]   = $db->fetch($res[aum]);
 
 
 
			
			if($arr[aum][topic_en]=='Car'){
			$arr[aum][topic_en]='รถเก๋ง';
			}
			if($arr[aum][topic_en]=='Van'){
			$arr[aum][topic_en]='รถตู้';
			}
			
			
            //$res[cartype] = $db->select_query("SELECT * FROM ".TB_carall." WHERE id='".$arr[category][car_type]."' ");
            //$arr[cartype] = $db->fetch($res[cartype);
            $res[admin] = $db->select_query("SELECT * FROM " . TB_admin . " WHERE id='" . $arr[other][company] . "' ");
            $arr[admin] = $db->fetch($res[admin]);
 
         //  
  
     
?>

 
<div  style="padding-top:20px; display:none" class="font-26"><b><center>สมัครเพื่อนร่วมงานใหม่</div>
<table width="100%"  border="0" cellspacing="2" cellpadding="2" class="drivertable">
  <tr>
    <td width="40%" ><img src="../data/pic/driver/small/<?=$arr[dv][post_date];?>.jpg?v=<?=$arr[dv][update_date];?>"  width="100%"   border="0"  class="IMGSHOP"   style="margin-top:15px;border-radius:5px;" /></td>
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
	
	
	
	       $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		   
		   /*
                         
    //$res[category] = $db->select_query("SELECT * FROM ".TB_transferplace." where pro < 4 and status = 1 ORDER BY topic ");
  $res[category] = $db->select_query("SELECT * FROM web_amphur where id='".$arr[dv][driver_zone]."'     ");
                       $arr[zone] = $db->fetch($res[category]);
	 

 */





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
 
  
 
 
 
 
 
<style>
 .icon { padding-top: 20px; } 
p {
	font-family: Arial, Helvetica, sans-serif; font-size:18px;
}
 
 body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
</style>
<table width="100%" border="0" cellspacing="2" cellpadding="2" style="padding:5px;">
  <tbody>
     <tr>
       <td colspan="2"></td>
     </tr>
     
     <tr>
       <td width="100" class="font-16">ชื่อ-นามสกุล</td>
       <td class="font-20"><?=$arr[dv][name]?> (<?=$arr[dv][nickname]?>)</td>
     </tr>
     
     
     <tr style="display:none">
       <td width="100" class="font-16">ชื่อเล่น</td>
       <td class="font-20">&nbsp;</td>
     </tr>
     
          <tr>
       <td width="100" class="font-16">โทรศัพท์</td>
       <td class="font-20">
	   
	   <a href="tel:<?=$arr[dv][phone]?>">
	   
	   <?=$arr[dv][phone]?>
       </a>
       </td>
     </tr>
 
     
     
   </tbody>
 </table>  
 
 
 
 
 
 <script>
   
   $("#submit_new_register").click(function(){ 

$('#load_data_new_alert').fadeOut();
   
   });
   
  
 
 $("#btn_close_new_register").click(function(){ 
  
$('#load_data_new_alert').fadeOut();
   
   });
   
 
 
   
   </script> <br>
 
 





  <table width="100%"  border="0" cellspacing="0" cellpadding="0" style="padding-top:0px;">
     <tr>
       <td width="50%" class="pad-r-5"><a  href="?name=booking&file=all"   style="color:#FFFFFF; font-size:22px">
         <button id="submit_new_booking" type="button" class="btn btn-block btn-primary" style="width:100% ">รับทราบ</button>
       </a></td>
       <td width="50%"  class="pad-l-5"><button type="reset" id="close_new_booking"class="btn btn-block btn-default"  style="width:width:100%">ปิด</button></td>
     </tr>
  </table>
</div>
     </div>
	 
	
	   <script>
  $('#close_new_booking').click(function(){  
 
  $( "#btn_close_new_booking" ).click(); 
  });
 

			
			</script>
	  
 <? } ?>  
    
 <script>
   
   $("#submit_new_booking").click(function(){ 

$('#load_data_new_alert').fadeOut();
   
   });
   
  
 
 $("#btn_close_new_booking").click(function(){ 
  
$('#load_data_new_alert').fadeOut();
   
   });
   
 
 
   
   </script>