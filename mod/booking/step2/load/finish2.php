<br>

<?



?>
 
<script>

 $(".text-topic-action-mod-4" ).html("ตรวจสอบข้อมูล");
 

 
  </script> 
  
  
  
  <?
  
  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[to] = $db->select_query("SELECT * FROM   use_time  where id='".$_GET[time]."'   ");
 $arr[to] = $db->fetch($res[to]);
 
  

$res[projectcar] = $db->select_query("SELECT * FROM   web_carall  where id='".$_GET[car]."'   ");
 
 $arr[projectcar] = $db->fetch($res[projectcar]);
 
 	$res[car_type] = $db->select_query("SELECT * FROM ".TB_carall_type." WHERE id='".$arr[projectcar][car_type]."' ");
	$arr[car_type] = $db->fetch($res[car_type]);
  ?>
  
  
  
  
 <script>
        $("#edit_booking_step_1").click(function(){ 
		
$( "#time_number" ).addClass('border-alert');
		
		
	 $( "#load_mod_popup_4" ).toggle();
   
       $("#back_booking_step_2").click();
		
		});
 
 </script>
 
 
 
  <script>
        $("#edit_booking_step_2").click(function(){ 
		
	 $( "#load_mod_popup_4" ).toggle();
   
       $("#back_booking_step_3").click();
		
		});
 
 
 </script>
 
 
   <script>
        $("#edit_booking_step_3").click(function(){ 
		
 $( "#adult_number" ).addClass('border-alert');
$( "#child_number" ).addClass('border-alert');
		
		
		  $("#submit_booking_step_2").click();
		
	 $( "#load_mod_popup_4" ).toggle();
	 
	 

   
 
		
		});
 
 
 </script>
 
 
 
 
 
 
 
 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td>
      <div class="div-step-content">
      
      
      <table width="100%" border="0" cellpadding="2" cellspacing="5">
        <tbody>
          <tr>
            <td colspan="2"  class="font-28 "><table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tbody>
                <tr>
                  <td width="30"><div class="step-booking-small"  id="number_step_4"  style="margin-top:-2px;">1</div></td>
                  <td height="40" valign="top" class="font-30"><font color="<?=$text_topic_color?>" ><b>เวลาเดินทาง</td>
                  <td width="70" valign="middle" class="font-30"><span class="font-22" id="edit_booking_step_1" style="color:#FF0000"><i class="    fa fa-edit"></i>&nbsp;แก้ไข</td>
                </tr>
              </tbody>
            </table></td>
          </tr>
          <tr>
            <td width="120"  class="font-26 "><b>เวลาเดินทาง</td>
            <td class="font-26 "><? if($arr[to][time_h]>0){ ?>
              <?=$arr[to][time_h]?>
              ชั่วโมง
              <? } ?>
              <? if($arr[to][time_m]>0){ ?>
              <?=$arr[to][time_m]?>
              นาที
              <? } ?></td>
          </tr>
        </tbody>
      </table>
      
      </div>
     
      
      
      </td>
    </tr>
    <tr>
      <td>
      
         <div class="div-step-content">  
      <table width="100%" border="0" cellpadding="2" cellspacing="5">
        <tbody>
          <tr>
            <td width="120"  class="font-28 "><table width="100%" border="0" cellspacing="0" cellpadding="2"  style="border-top : 0px dotted   #999999; padding-bottom:10px;     ">
              <tbody>
                <tr>
                  <td width="30"><div class="step-booking-small"  id="number_step_"  style="margin-top:-2px;">2</div></td>
                  <td height="40" valign="top" class="font-30"><font color="<?=$text_topic_color?>" ><b>ข้อมูลรถ</td>
                  <td width="70" valign="middle" class="font-30"><span class="font-22" id="edit_booking_step_2"  style="color:#FF0000"><i class="    fa fa-edit"></i>&nbsp;แก้ไข</td>
                </tr>
              </tbody>
            </table></td>
          </tr>
          <tr>
            <td class="font-22 "><div style="border-radius: 5px; 
 
 
 border: 0px solid #ddd;  
 background:<? echo $bgcolor; ?>; margin-bottom:0px; box-shadow: 0px  0px 0px #DADADA; margin-top: 0px; margin-top:-10px;"    >
              <table width="100%" border="0" cellspacing="0" cellpadding="2"   id="div_car_<?=$arr[projectcar][id]?>2">
                <tbody>
                  <tr>
                    <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                      <tbody>
                        <tr>
                          <td width="90"  class="font-26 "><strong>ทะเบียน </strong></td>
                          <td  class="font-26 "> <? echo $arr[projectcar][plate_num];?>&nbsp;<? echo $arr[projectcar][province];?></td>
                          </tr>
                        </tbody>
                    </table></td>
                  </tr>
                </tbody>
              </table>
              </a></div></td>
          </tr>
        </tbody>
      </table>
      
      </div>
      
      
      </td>
    </tr>
    <tr>
      <td>
      
           <div class="div-step-content">
      
      <table width="100%" border="0" cellpadding="2" cellspacing="5">
        <tbody>
          <tr>
            <td width="120"  class="font-28 "><table width="100%" border="0" cellspacing="0" cellpadding="2"  style="border-top : 0px dotted   #999999;     ">
              <tbody>
                <tr>
                  <td width="30"><div class="step-booking-small"  id="number_step_2" style="margin-top:-2px;">3</div></td>
                  <td height="40" valign="top" class="font-30"><span><font color="<?=$text_topic_color?>" ><b>จำนวนแขก</b></font></span></td>
                  <td width="70" valign="middle" class="font-30"><span class="font-22" id="edit_booking_step_3"  style="color:#FF0000"><i class="    fa fa-edit"></i>&nbsp;แก้ไข</td>
                </tr>
              </tbody>
            </table></td>
          </tr>
          <tr>
            <td class="font-26 "><strong>ผู้ใหญ่</strong>
              <?=$_GET[adult]?>
              &nbsp;&nbsp;&nbsp;<strong>เด็ก</strong>
              <?=$_GET[child]?>
              &nbsp;</td>
          </tr>
        </tbody>
      </table>
      </div>
      
      
      </td>
    </tr>
    <tr>
      <td>
      
      
 
  
  
  
      
          <div class="div-step-content">
      <table width="100%" border="0" cellpadding="2" cellspacing="5">
        <tbody>
          <tr>
            <td width="120"  class="font-28 "><table width="100%" border="0" cellspacing="0" cellpadding="2"  style="border-top : 0px dotted   #999999;     ">
              <tbody>
                <tr>
                  <td width="30"><div class="step-booking-small"  id="number_step_3" style="margin-top:-2px;">4</div></td>
                  <td height="40" valign="top" class="font-30"><span><font color="<?=$text_topic_color?>" ><b>วิธีรับเงิน</b></font></span></td>
                  <td width="70" valign="middle" class="font-30"> </td>
                </tr>
              </tbody>
            </table></td>
          </tr>
          <tr>
            <td class="font-26 "><strong>รับเงินสด</strong>
  </td>
          </tr>
        </tbody>
      </table>
      
         </div>
      
      
      </td>
    </tr>
    <tr>
      <td><table width="100%"  border="0" cellspacing="0" cellpadding="0" id="button_show_finish_detail" style="display:nones; margin-top:10px;">
        <tr >
          <td width="50%"  style="display:none" ><button type="button"  id="back_booking_step_4" class="btn btn-block btn-default"  style="width:100%px "><span class="font-28"><i class="    fa fa-chevron-circle-left"></i>&nbsp;ย้อนกลับ</button></td>
          <td width="100%"  ><div class="border-alert">
            <button id="submit_booking_step_4" type="button" class="btn  btn-primary" style="width:100%; background-color:#F7941D "><span class="font-28"><i class="    fa fa-save "></i>&nbsp;บันทึกข้อมูล</button></td>
        </tr>
      </table></td>
    </tr>
  </tbody>
</table>
<script>
$("#back_booking_step_4").click(function(){ 
 $( "#load_mod_popup_4" ).toggle();
 
});


 
 
$("#submit_booking_step_4").click(function(){ 
 
 
///  $( "#load_mod_popup_4" ).toggle();

$('#load_mod_popup_4').html(load_main_mod);

   $.post('go.php?name=booking&file=savedata&action=add&type=driver&driver=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   $('#send_booking_data').html(response);
   
    });
   
   
  });
 






</script><br>
 
 
<br>
<br>
<br>
<br>
<br> 
 