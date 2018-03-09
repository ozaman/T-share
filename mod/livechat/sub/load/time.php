
  <?  include ("includes/lang/chat.php");?> 
<div style="padding:20px;">

<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="50%" align="center" style="padding-right:5px;FONT-SIZE:18px;"><?=chat_hour?>&nbsp;</td>
    <td width="50%" align="center" style="padding-left:5px;FONT-SIZE:18px;"><?=chat_minute?>&nbsp;</td>
  </tr>
  <tr>
    <td style="padding-right:5px;"><span class="row">
      <select name="time_h"  id="time_h" style=" FONT-SIZE:15px;" class="form-control" >
        <? 
 
	for($adult_i=0;$adult_i< 24;$adult_i++){ ?>
        <option value="<?=$adult_i;?>" <? if($arr[newsvc][adult] == $adult_i){echo 'selected=selected';} ?>>
        <?=$adult_i;?>
        </option>
        <? 
 
} 
?>
      </select>
    </span></td>
    <td style="padding-left:5px;"><span class="row">
      <select name="time_m"  id="time_m" style=" FONT-SIZE:15px;" class="form-control" >
        <? 
 
	for($adult_i=0;$adult_i< 60;$adult_i++){ ?>
        <option value="<?=$adult_i;?>" <? if($arr[newsvc][adult] == $adult_i){echo 'selected=selected';} ?>>
        <?=$adult_i;?>
        </option>
        <? 
 
} 
?>
      </select>
    </span>


	</td>
  </tr>
  <tr>
    <td colspan="2" align="center" style="font-size:14px; color:#FF0000; padding-top:10px;"><?=chat_alert_wait_confirm?>&nbsp;</td>
    </tr>
</table>
</div>



<script>
$("#div_btn_send_time_store").hide();

 $("#time_h").change(function(){   
 
if(document.getElementById('time_h').value>0 || document.getElementById('time_m').value>0){


$("#div_btn_send_time_store").show();


}  else {


$("#div_btn_send_time_store").hide();
}

 
 
 });
 
 
 
 
 
 
  $("#time_m").change(function(){   
 
if(document.getElementById('time_h').value>0 || document.getElementById('time_m').value>0){


$("#div_btn_send_time_store").show();


}  else {


$("#div_btn_send_time_store").hide();
}

 
 
 });
 
 
 

</script>