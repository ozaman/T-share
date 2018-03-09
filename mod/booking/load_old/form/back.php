 
 <script>
 
 
 
 
 
$('#btn_show_hide_back_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-up" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;ซ่อน</span>');
 
 
 
  $('#btn_show_hide_back_<?=$arr[project][invoice];?>').click(function() {
 
 ///// tool status
 var tool_status = $( "#table_show_hide_back_<?=$arr[project][invoice];?>" ).is(":hidden");
 
// $("#table_show_hide_back_<?=$arr[project][invoice];?>" ).show(); 
 
 if(tool_status==true){
	 
$("#table_show_hide_back_<?=$arr[project][invoice];?>" ).show(); 

 $('#btn_show_hide_back_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-up" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;ซ่อน</span>');
 
	 
 } else {
	 
	$("#table_show_hide_back_<?=$arr[project][invoice];?>" ).hide();  
	
 $('#btn_show_hide_back_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-down" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;แสดง</span>');
	
	 
 }
 
 
  });
 </script>
 
 
<div  class="box-bottom-line"  style="padding-top:10px;" ><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td height="30" class="font-28 "><font color="<?=$text_topic_color?>" ><b> ข้อมูลการส่งแขกกลับ</font></td>
      <td width="70" valign="top"><div id="btn_show_hide_back_<?=$arr[project][invoice];?>" class="font-24"></div></td>
    </tr>
  </tbody>
</table>
</div>
 
 
 
 <? if($arr[project][wait_status]<>'no') { ?>


<table width="100%" border="0" cellpadding="1" cellspacing="5" style="display:nones" id="table_show_hide_back_<?=$arr[project][invoice];?>">
 
  <tr>
    <td width="120"  class="font-22"><font color="#333333"></font><b>รอบเวลา</td>
    <td class="font-22">
	
	
	  <? 
	 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[backtime] = $db->select_query("SELECT * FROM  time_pickup_round   WHERE id = '".$arr[project][transfer_time]."'    ");
  $arr[backtime] = $db->fetch($res[backtime]);
  
  
$res[place] = $db->select_query("SELECT * FROM   web_area   WHERE id = '".$arr[project][back_to_place]."'    ");
  $arr[place] = $db->fetch($res[place]);
  
 
if($arr[project][wait_status]<>'no') { ?>  
    
   
  <?=$arr[backtime][start_h];?>:<?=$arr[backtime][start_m];?> 
   
 
   
   <?  }
   
   
  if($arr[project][wait_status]=='out'){   
 
   $arr[place][name_th]='สนามบินภูเก็ต';
   
   }
   
	
	?>
    
    
      &nbsp;&nbsp;</td>
  </tr>
  <tbody>
    <tr>
      <td  class="font-22"><font color="#333333"><b>สถานที่ส่ง</td>
      <td class="font-22"><?=$arr[place][name_th];?>
        &nbsp;&nbsp;</td>
    </tr>
    <tr>
      <td  class="font-22"><font color="#333333"><b>ผู้ให้บริการ</td>
      <td class="font-22">
      
<?  if($arr[project][wait_status]=='area') { ?>   
      โกลเด้นบีช ทัวร์
<? } ?>

<?  if($arr[project][wait_status]=='out') { ?>   
      คิงส์พาวเวอร์ ภูเก็ต
<? } ?>
      
      
      
      
      
      </td>
    </tr>
    <tr style="display:none">
      <td  class="font-22"><font color="#333333"><b>ข้อมูลรถ</td>
      <td class="font-22">
      
      รถตู้ ทะเบียน พม888
      
      
      </td>
    </tr>
    <? if($data_user_class<>'Staxi'){ ?>
    <? } ?>
    <? if($data_user_class=='taxi'){ ?>
    <? } ?>
  </tbody>
</table>


<? } ?>


 <? if($arr[project][wait_status]=='no') { ?>
 
 <div class="font-22" style="color:#FF0000" id="table_show_hide_back_<?=$arr[project][invoice];?>">
 แขกเดินทางกลับเอง </div>
 
 <? } ?>
 