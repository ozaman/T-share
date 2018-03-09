 
 <script>
 
  
$('#btn_show_hide_price_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-up" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;ซ่อน</span>');
 
  $('#btn_show_hide_price_<?=$arr[project][invoice];?>').click(function() {
	  
 
 
 ///// tool status
 var tool_status = $( "#table_show_hide_price_<?=$arr[project][invoice];?>" ).is(":hidden");
 
// $("#table_show_hide_price_<?=$arr[project][invoice];?>" ).show(); 
 
 if(tool_status==true){
	 
$("#table_show_hide_price_<?=$arr[project][invoice];?>" ).show(); 

 $('#btn_show_hide_price_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-up" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;ซ่อน</span>');
 
	 
 } else {
	 
	$("#table_show_hide_price_<?=$arr[project][invoice];?>" ).hide();  
	
 $('#btn_show_hide_price_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-down" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;แสดง</span>');
	
	 
 }
 
 
  });
 </script>
 
 
 
<div  class="box-bottom-line"  style="padding-top:10px;" 
><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td height="30" class="font-28 "><font color="<?=$text_topic_color?>" ><b> รายได้</font></td>
      <td width="70" valign="top"><div id="btn_show_hide_price_<?=$arr[project][invoice];?>" class="font-24"></div></td>
    </tr>
  </tbody>
</table>
</div>

 

<table width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_hide_price_<?=$arr[project][invoice];?>">
  <tbody>
 
    <tr>
      <td width="120" class="font-22"><font color="#333333" ><b>รับเงิน</td>
      <td class="font-22"><?=$payment?></td>
    </tr>
    <tr>
      <td class="font-22"><font color="#333333" ><b>ค่าจอด</td>
      <td class="font-22"><?=$arr[project][price_park_total]; ?></td>
    </tr>
    <tr>
      <td class="font-22"><font color="#333333" ><b>ค่าหัว/คน</td>
      <td class="font-22"><?=$arr[project][price_person_unit]; ?>
        x
        <?=$arr[project][adult]; ?>
        =
        <?=$arr[project][price_person_unit]*$arr[project][adult] ?></td>
    </tr>
    <tr>
      <td class="font-22"><font color="#333333" ><b>รวม</td>
      <td class="font-22"><?=number_format( $arr[project][price_all_total] , 0);?></td>
    </tr>
 
  </tbody>
</table>
