 
 
 
 
 <?
 
 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
 
 $res[project] = $db->select_query("SELECT  FROM ap_order  where id='".$_GET[id]."'");
 $arr[project] = $db->fetch($res[project]);
 
 
 ?>
  
 <br>
<br>

 
 
 
 

 
 
 <? if($_GET[type]=='check_pickup_no_guest' ){ 

$_GET[checkin]='no';

 

?>
<form id="form_checkin"   method="post"    action="load_small.php?name=action&file=send_guest_data&id=<?=$arr[project][invoice];?>&folder=<?=$arr[project][invoice];?>&photo=no"   enctype="multipart/form-data"   target="popupuploadframe"  >
  <iframe id="popupuploadframe" name="popupuploadframe" src="" style="width:1px;height:1px;border:0"></iframe>

<script>
 $('.text-topic-action-mod-4').html("ไม่เจอแขก"); 

</script>



<script>

 
$(".btn-modal-ok").click(function(){  

 
 
 if($('#driver_remark_noguest_<?=$arr[project][invoice];?>').val() == 0){
 alert('กรุณาเลือกสาเหตุที่ไม่เจอแขก');
 
 return ;

}
 $('.text-topic-action-mod-4').htnl('ไม่เจอแขก')
 
 
 
 
 
 
 var url_checkin = "go.php?name=action&file=action "; 
  
 
 $.post(url_checkin,$('#form_checkin').serialize(),function(response){
   $('#send_data_checkin').html(response);
 
   /// upload photo
    $( "#btn_upload_photo_<?=$arr[project][invoice];?>" ).click(); 
 
 
 
    
 $("#submit_send_data_<?=$arr[project][invoice];?>" ).toggle(); 
$("#load_send_data_<?=$arr[project][invoice];?>" ).toggle(); 
 
 
   ///// close popup step 1   
/// $( "#load_data_checkin_popup" ).toggle(); 
///  $( "#load_data_checkin_popup" ).html('');
 
	///// show step 3

 ////  $( "#sub_complete<?=$arr[project][invoice];?>" ).show(); 	
 
 ///////
 
   });
  });
 
</script>
 

<div    id="popup_topoint_<?=$arr[project][invoice];?>"  > 
  <? //  include ("load/page/back_popup.php");?>
 <div   >
 
            <!-- Modal  class="modal fade" content-->
            <div class="modal-content"    > 
			 
                    <h4 class="modal-title" style="font-size:25px; height:15px;   font-family:Arial, Helvetica, sans-serif; text-transform:uppercase;border-bottom: 0px solid #e5e5e5;">
					
					
 <center><b> แน่ใจหรือไม่</b></center></h4>
 
              <div class="modal-body"  >  
		  
		<center><div style="padding:2px; font-size:20px; margin-top:10px; color:#999999;border-top: 0px solid #e5e5e5;  ">ว่าไม่เจอแขก</div>
		  
<table border="0"  style="width:100%; ">
  <tr>
    <td><div class="topictransfer">สาเหตุ</div>
      <select name="driver_remark_noguest" id="driver_remark_noguest_201493" class="form-control tab_alert">
        <option value="0">---- กรุณาเลือกสาเหตุที่ไม่เจอแขก ----</option>
                <option value="5">
          ไม่พบแขก        </option>
                <option value="8">
          เปลี่ยนสถานที่รับส่งโดยไม่แจ้ง        </option>
                <option value="9">
          ลูกค้าเปลี่ยนไฟท์บิน        </option>
                <option value="10">
          ลูกค้าไม่อยู่โรงแรม        </option>
                <option value="11">
           ข้อมูลโรงแรมไม่ถูกต้อง        </option>
                <option value="12">
          ติดต่อลูกค้าไม่ได้         </option>
                <option value="13">
          นักท่องเที่ยวนั่งรถไปเองแล้ว        </option>
              </select>
      <!-- <select name="driver_remark_noguest" id="driver_remark_noguest_<?=$arr[project][invoice];?>"  class="form-control" >
        <option value="0">---- กรุณาเลือกสาเหตุที่ไม่เจอแขก ----</option>
        <?
  $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[remark_noguest] = $db->select_query("SELECT * FROM web_driver_remark WHERE status='1' and type = '2' ");
while($arr[remark_noguest] = $db->fetch($res[remark_noguest])){
?>
        <option value="<?=$arr[remark_noguest][id];?>">
          <?=$arr[remark_noguest][topic_th];?>
        </option>
        <? } ?>
      </select> -->
      <div class="topictransfer" style="color:#FF0000; font-size:18px; display:none " id="alert_driver_remark_noguest_<?=$arr[project][invoice];?>">กรุณาเลือกสาเหตุที่ไม่เจอแขก</div>
      <script>
	  
	  
	  $('#driver_remark_noguest_<?=$arr[project][invoice];?>').addClass("tab_alert");
		
$('#driver_remark_noguest_<?=$arr[project][invoice];?>').on('change',function(){ 


 
 if($('#driver_remark_noguest_<?=$arr[project][invoice];?>').val() > 0){
		//alert(00);
		$('#alert_driver_remark_noguest_<?=$arr[project][invoice];?>').hide();
$('#driver_remark_noguest_<?=$arr[project][invoice];?>').removeClass("tab_alert");

}

 if($('#driver_remark_noguest_<?=$arr[project][invoice];?>').val() == 0){
		//alert(00);
		$('#alert_driver_remark_noguest_<?=$arr[project][invoice];?>').show();
$('#driver_remark_noguest_<?=$arr[project][invoice];?>').addClass("tab_alert");

}
		});
		</script></td>
  </tr>
  <tr>
    <td><div class="topictransfer">ระบุสาเหตุอื่น ๆ </div>
      <input class="form-control"  type="text"  name="driver_remark_detail" id="driver_remark_detail_<?=$arr[project][invoice];?>"/></td>
  </tr>
</table>
		  
        <table  style="width:100% " >
          <tr>
            <td align="center" class="gay5">
            
            
            
            <div class="topictransfer">ถ่ายภาพสถานที่รับแขก</div>
          
       
          <?  include ("mod/load/show/step/photo.php");?>
 
                
                
                <div style="padding-bottom:5px; ">
                  <div style=" display:none ">
                    <input id="btn_upload_photo_<?=$arr[project][invoice];?>" type="submit"  class="btn btn-primary"   data-backdrop="static" value="อัพโหลด">
                  </div>
              </div>
              <div style="color:#FF0000"><center>กรุณาถ่ายภาพอย่างน้อย 1 ภาพ</center></div>
            </td>
          </tr>
        </table>
		
		
              </div> 

  <br />
             <br />
             <br />
             <br />
                <div class="modal-footer" style="margin-top:-10px;">
				       <center>
                       
                      <table width="100%" border="0" cellspacing="2" cellpadding="2" style="margin-top:-10px" id="submit_send_data_<?=$arr[project][invoice];?>">
  <tbody>
    <tr>
      <td width="50%" style="padding-right:5px;"><button type="button" class="btn btn-modal-no" data-dismiss="modal" data-backdrop="static" style="width:100%" >ไม่แน่ใจ</button></td>
      <td width="50%" style="padding-left:5px;  display:none" id="td_confirm_checkpoint_<?=$arr[project][invoice];?>"> <button type="button" class="btn btn-modal-ok"   data-dismiss="modal" data-backdrop="static" id="btn_confirm_topoint_<?=$arr[project][invoice];?> "  style="width:100%" >แน่ใจ</button> </td>
    </tr>
  </tbody>
</table>


 <table width="100%" border="0" cellspacing="2" cellpadding="2" id="load_send_data_<?=$arr[project][invoice];?>" style="display:none">
  <tbody>
    <tr>
      <td align="center" style="font-size:24px;color: #FF0000; "><i class="fa fa-circle-o-notch fa-spin 4x" style="font-size:24px;color: ##FF0000; " ></i> กำลังบันทึกข้อมูล</td>
    </tr>
  </tbody>
</table>
 
                       
					 
	
 </center>   
 
 
 					 <br />
					   <br />
					   <br />
					   <br />
					    
                </div>
				
 
				
            </div>
  </div>
 
</div>	




 



</form>


 
 
<? } ?>
 
 