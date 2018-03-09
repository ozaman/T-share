 
 <script>
 
 
 
 
 
$('#btn_show_hide_passport_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-up" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;ซ่อน</span>');
 
 
 
  $('#btn_show_hide_passport_<?=$arr[project][invoice];?>').click(function() {
 
 ///// tool status
 var tool_status = $( "#table_show_hide_passport_<?=$arr[project][invoice];?>" ).is(":hidden");
 
// $("#table_show_hide_passport_<?=$arr[project][invoice];?>" ).show(); 
 
 if(tool_status==true){
	 
$("#table_show_hide_passport_<?=$arr[project][invoice];?>" ).show(); 

 $('#btn_show_hide_passport_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-up" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;ซ่อน</span>');
 
	 
 } else {
	 
	$("#table_show_hide_passport_<?=$arr[project][invoice];?>" ).hide();  
	
 $('#btn_show_hide_passport_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-down" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;แสดง</span>');
	
	 
 }
 
 
  });
 </script>
 
 
 
 
<div  class="box-bottom-line"  style="padding-top:10px;" 
>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td height="30" class="font-28 "><font color="<?=$text_topic_color?>" ><b>ภาพถ่ายพาสปอร์ต</font></td>
      <td width="70" valign="top"><div id="btn_show_hide_passport_<?=$arr[project][invoice];?>" class="font-24"></div></td>
    </tr>
  </tbody>
</table>
</div>
 


<table width="100%" border="0" cellpadding="1" cellspacing="5" style="display:nones" id="table_show_hide_passport_<?=$arr[project][invoice];?>">
 
  <tr>
    <td  class="font-22">
 
<img src="../data/fileupload/passport/<?=$arr[project][id];?>_big.jpg?v=<?=time()?>"  width="100%"   border="0"      style="margin-top: 3px;border-radius:5px;" />
    
    </td>
  </tr>
  <tbody>
    
    
     <? if($arr[project][passport_pic]==0){ ?>
    
        <? } ?>
    
    
    
 
  </tbody>
</table>
