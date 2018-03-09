 
<?
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projectdriver] = $db->select_query("SELECT name,nickname FROM web_driver WHERE id='".$arr[project][drivername]."'    "); 
$arr[projectdriver] = $db->fetch($res[projectdriver]);
?>

 
 
 <script>
 
 
 
 
 
$('#btn_show_hide_driver_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-up" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;ซ่อน</span>');
 
 
 
  $('#btn_show_hide_driver_<?=$arr[project][invoice];?>').click(function() {
 
 ///// tool status
 var tool_status = $( "#table_show_hide_driver_<?=$arr[project][invoice];?>" ).is(":hidden");
 
// $("#table_show_hide_driver_<?=$arr[project][invoice];?>" ).show(); 
 
 if(tool_status==true){
	 
$("#table_show_hide_driver_<?=$arr[project][invoice];?>" ).show(); 

 $('#btn_show_hide_driver_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-up" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;ซ่อน</span>');
 
	 
 } else {
	 
	$("#table_show_hide_driver_<?=$arr[project][invoice];?>" ).hide();  
	
 $('#btn_show_hide_driver_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-down" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;แสดง</span>');
	
	 
 }
 
 
  });
 </script>
 
 
 
 
<div  class="box-bottom-line"  style="padding-top:10px;" 
><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td height="30" class="font-28 "><font color="<?=$text_topic_color?>" ><b> ข้อมูลรถและคนขับ</font></td>
      <td width="70" valign="top"><div id="btn_show_hide_driver_<?=$arr[project][invoice];?>" class="font-24"></div></td>
    </tr>
  </tbody>
</table>
</div>
 



<table width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_hide_driver_<?=$arr[project][invoice];?>">
 
  <tr>
    <td width="120"  class="font-22"><font color="#333333"></font><b>ชื่อคนขับ</td>
    <td colspan="3" class="font-22">
	<?=$arr[projectdriver][name];?>&nbsp; (<?=$arr[projectdriver][nickname];?>)
      &nbsp;&nbsp;</td>
  </tr>
  <tbody>
    <tr>
      <td  class="font-22"><font color="#333333"><b>ประเภท</td>
      <td width="60" class="font-22"><?=$arr[project][car_type];?>
        &nbsp;&nbsp;</td>
      <td width="30"  class="font-22"><font color="#333333"><b>สี</td>
      <td class="font-22"><?=$arr[project][car_color];?></td>
    </tr>
    <tr>
      <td    class="font-22"><font color="#333333"><b>ทะเบียน</td>
      <td colspan="3" class="font-22"><?=$arr[project][car_plate];?></td>
    </tr>
    <? if($data_user_class<>'Staxi'){ ?>
    <? } ?>
    <? if($data_user_class=='taxi'){ ?>
    <? } ?>
  </tbody>
</table>
