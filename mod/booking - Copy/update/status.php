 <?
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT  id,status,alert_register_confirm,alert_register_cancel,cancel_type FROM  order_booking  where  id='".$_GET[id]."' order by id desc  ");
	///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
 $arr[project] = $db->fetch($res[project]);
  
?>  <font class="font-24" style="color:<? 
 
	                   if($arr[project][status] == "CANCEL" ) { 
                          echo "#ff0000" ;
						  
						  $status="ลงทะเบียนไม่ได้";
						  
                        }
	 
                        /////////////
                        if($arr[project][status] == "NEW" ) { 
                          echo "#0099CC" ;
						  $status="ใหม่";
                        }
                        /////////////
                        if($arr[project][status] == "CONFIRM" ) {
                          echo "#339900" ;
						  
						   $status="ลงทะเบียนสำเร็จ";
                        }?>">
     
     <b> <?=$status;?></b></font>
     
<? if($arr[project][status] == "CANCEL" ) { 

 $arr[project][cancel_type]=1;

  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
                                    //$res[category] = $db->select_query("SELECT * FROM ".TB_transferplace." where pro < 4 and status = 1 ORDER BY topic ");
                                  ///  $res[category] = $db->select_query("SELECT * FROM  guest_nation  ORDER BY id  ");
								  
$res[type] = $db->select_query("SELECT * FROM  register_cancel where status=1 and id=".$arr[project][cancel_type]."  ORDER BY  id  desc");
                       
 $arr[type] = $db->fetch($res[type]); 
 
 ?>

<div class="font-20"><?= $arr[type][topic_th]?></div>



<? } ?>
	 
	 
     
     
  <?
 
   ///  if($arr[project][status] == "CONFIRM" and $arr[project][alert_register] == "0") {
    if($arr[project][status] == "CONFIRM" and $arr[project][alert_register_confirm] == "0" and $_GET[type]=='auto') {
  
   ?>  
     
 
  <script>
		/// alert(0);
 
	   swal({
		title: "<font style='font-size:28px'><b> ลงทะเบียนสำเร็จ",
		text: "<font style='font-size:22px'>กรุณาตรวจสอบรายละเอียด",
		type: "success",
		showCancelButton: true,
		
		showCancelButton: false,
		confirmButtonColor: '<?=$main_color?>',
		confirmButtonText: 'ตรวจสอบ',
		cancelButtonText: "ไม่ถูกต้อง",
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
	 
	
 
	
//swal("ยืนยัน", "success");

////

/*
  var url_<?=$arr[project][id]?> = "popup.php?name=booking&file=savedata&action=confirm&type=driver&id=<?=$arr[project][id]?>";
 
 $('#booking_action').load(url_<?=$arr[project][id]?>); 
 
  $('#status_<?=$arr[project][id]?>').html('<font style="color:#339900"  class="font-24"><b>ลงทะเบียนสำเร็จ</font>'); 
 
 
 
//

$('#booking_confirm_<?=$arr[project][id]?>').hide(); 

$('#booking_cancel_<?=$arr[project][id]?>').show(); 

$('#booking_payment_<?=$arr[project][id]?>').show(); 

*/

 
	//  alert('dd');
    } else {
      swal("Cancelled", "", "error");
    }
	});
	   
  
 	 
		 
		 </script>      
         
     
     <? 
	 
	  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('order_booking', array(

  
			  "alert_register_confirm" => "1",
			 
			 
			  "booking_edit" => "1", 
	 
         
 
            "update_date" => "" . TIMESTAMP . "",
		)," id='".$_GET[id]."' ");

	 
	 
	 
	 
	 
	 
	 
	 }
	 
	 
 
	 	
	 
	 
	 
	 
	  ?>
     
     