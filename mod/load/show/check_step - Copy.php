<iframe style="width:100%; height:300px; border:none " src='popup.php?name=action&file=check_location&col_name=<?=$_POST[col_name];?>&data_id=<?=$_POST[data_id];?>&data_sv=<?=$_POST[data_sv];?>'  ></iframe><br>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="33%" style="height:auto "><div class="clickstep_1"  id="checkstep_1"  >s</div></td>
    <td width="33%">&nbsp;</td>
    <td width="33%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
 
 

<table width="100%" cellpadding="3">
	<tr>
		<td width="100%" valign="top">
		

<table width="100%"  border="0" cellspacing="2" cellpadding="2" style="border-bottom: solid 0px #999999;  " >
  <tr>
    <td width="80" height="110" ><div class="clickstep_1"  id="checkstep_1"  ></div>
 
	
	</td>
    <td width="150" valign="middle">
<? 
if($arr[project][driver_topoint] == 1){ $text_status = "check";$btn_status = "success  btn-block btn-md btnstatus approve"; ?>
		<script>
$('#iconchk_s1').attr("src", "images/yes.png");
$('#checkstep_1').addClass("checkinstep_active");
		 		</script>
				<script type="text/javascript">
  $(document).ready(function(){
	var url_map<?=$arr[project][id];?> = "popup.php?name=map&file=view&sv=<?=$_GET[sv];?>&bookid=<?=$arr[project][id];?>&type=driver_topoint&data_val=<?=$arr[project][driver_topoint];?>";
$('#mapto_<?=$arr[project][id];?>').load(url_map<?=$arr[project][id];?>);
  });
  
</script> 
<?
}
else{$text_status = "times";$btn_status = "warning  btn-block btn-md btnstatus reject"; ?>
<script>
$('#tab_to_<?=$arr[project][id];?>').addClass("tab_alert");
</script>
<?
} 
?>
      <button style="background-color: #367FA9;width: 125px; height:30px; border:none;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>"   data_report_id="<?=$arr[project][report_id];?>" col_name="driver_topoint"  id="btn_topoint<?=$arr[project][id];?>" <? if($arr[project][driver_topoint] > 0){ ?> disabled="disabled"  <? } ?> > ถึงสถานที่รับ </button>      </td>
  <td>
 
  <div id="mapto_<?=$arr[project][id];?>" > </div>
  
  
  
  </td>
  </tr>
</table>
</div>




</td>
		
	</tr>
	<tr>
	  <td colspan="2" valign="top" id="sub_see_guest<?=$arr[project][id];?>" style="display: none<? if($arr[project][driver_topoint] > 0){ echo "1"; } ?>">
	   
	  <div id="tab_pickup_<?=$arr[project][id];?>" style="margin-bottom:5px; padding:5px; border-bottom:  solid 2px #CDCDCD ; ">
	  
	  <? if($arr[project][driver_pickup] == 0 and $arr[project][driver_topoint] ==1){ ?> 
	  <script>
	  $('#tab_pickup_<?=$arr[project][id];?>').addClass("tab_alert");
	  </script>
	     <? } ?>
	  
	  
<table width="100%"  border="0" cellspacing="2" cellpadding="2" style="border-bottom: solid  0px #999999; margin-bottom:0px; ">
  <tr>
    <td width="45" ><div class="checkinstep" id="checkstep_2">
        <center>
          <b>2</b>
        </center>
    </div>
	<div  style="position:absolute; margin-top:-30px; margin-left: -10px;"><img src="images/no.png"  align="absmiddle" id="iconchk_s2"    /></div>
	
	
	</td>
    <td width="150" valign="middle"> 
	
	
        <?
if($arr[project][driver_topoint] > 0){
	if($arr[project][driver_pickup] > 0){
?>		<script>
$('#iconchk_s2').attr("src", "images/yes.png");
$('#checkstep_2').addClass("checkinstep_active");
 $('#tab_pickup_<?=$arr[project][id];?>').removeClass("tab_alert");
 
		 		</script>
        <table  cellpadding="0" cellspacing="0">
				<tr id="tr_btn_pickup1<?=$arr[project][id];?>"  style="display: none<? if($arr[project][driver_pickup] == 1){ ?> 1  <? } ?>">
					<td><button style="background-color: #367FA9;width: 125px;height:30px; border:none;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>1" data_val="1"  data-toggle="modal" data-target="#popup_chk_guest_<?=$arr[project][id];?>"<? if($arr[project][driver_pickup] == 1){ ?> disabled="disabled"  <? } ?> > เช็คชื่อแขก</button></td>
				</tr>
				
				
				<tr height="5" id="cc_tr_pickup<?=$arr[project][id];?>" <? if($arr[project][driver_pickup] > 0){ ?> style="display: none"  <? } ?> ></tr>
				<tr id="tr_btn_pickup2<?=$arr[project][id];?>"  style="display: none<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>">
					<td><button style="background-color: #ff2b2b;width: 125px;height:30px; border:none;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>" col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>2" data_val="2" <? if($arr[project][driver_pickup] == 2){ ?> disabled="disabled"  <? } ?> > ไม่เจอแขก</button></td>
				</tr>
			</table>
<?		
	}else{
?>
 
<table  cellpadding="0" cellspacing="0">
				<tr id="tr_btn_pickup1<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 1){ ?> 1  <? } ?>">
					<td><button style="background-color: #367FA9;width: 125px;height:30px; border:none;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>1" data_val="1"   data-toggle="modal" data-target="#popup_chk_guest_<?=$arr[project][id];?>"> เช็คชื่อแขก</button></td>
				</tr>
				<tr height="5" id="cc_tr_pickup<?=$arr[project][id];?>" <? if($arr[project][driver_pickup] > 0){ ?> style="display: none"  <? } ?> ></tr>
				<tr id="tr_btn_pickup2<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>">
					<td><button style="background-color: #ff2b2b;width: 125px;height:30px; border:none;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" data_vc="<?=$arr[project][invoice];?>" col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>2" data_val="2"  > ไม่เจอแขก</button></td>
				</tr>
			</table>
<?		
	}
?>

<? }
else{ ?>
<table  cellpadding="0" cellspacing="0">
				<tr id="tr_btn_pickup1<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 1){ ?> 1  <? } ?>">
					<td><button style="background-color: #367FA9;height:30px; border:none;width: 125px;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>1" data_val="1"  data-toggle="modal" data-target="#popup_chk_guest_<?=$arr[project][id];?>" <? if($arr[project][driver_pickup] == 1){ ?> disabled="disabled"  <? } ?> > เช็คชื่อแขก</button ></td>
				</tr>
				<tr height="5" id="cc_tr_pickup<?=$arr[project][id];?>" <? if($arr[project][driver_pickup] > 0){ ?> style="display: none"  <? } ?> ></tr>
				<tr id="tr_btn_pickup2<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>">
					<td><button style="background-color: #ff2b2b;width: 125px;height:30px; border:none;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>" col_name="driver_pickup"  id="btn_pickup<?=$arr[project][id];?>2" data_val="2" <? if($arr[project][driver_pickup] == 2){ ?> disabled="disabled"  <? } ?> > ไม่เจอแขก</button></td>
				</tr>
			</table>
<? } ?>
<div  id="no_guest<?=$arr[project][id];?>"  style="width: 125px; display:none<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>"> <button type="button" class="btn btn-default" data-dismiss="modal">สาเหตุไม่พบแขก</button></div>


</td>
    <td> <div id="mappickup_<?=$arr[project][id];?>"></div>
    <? if($arr[project][driver_pickup] != 0 && $arr[project][driver_pickup] != ''){ ?>
      <? if($arr[project][driver_pickup] == 2){ $txt_pick_g = "ไม่เจอแขก"; }else{ $txt_pick_g = "เช็คชื่อแขก";   }?>
	 	   
	  
	  
	   
	  
	  <script type="text/javascript">
 $('#iconchk_s2').attr("src", "images/yes.png");
$('#checkstep_2').addClass("checkinstep_active");
 $('#tab_pickup_<?=$arr[project][id];?>').removeClass("tab_alert");
 
 $(document).ready(function(){
	var url_map<?=$arr[project][id];?> = "popup.php?name=map&file=view&sv=<?=$_GET[sv];?>&bookid=<?=$arr[project][id];?>&type=driver_pickup&data_val=<?=$arr[project][driver_topoint];?>";
$('#mappickup_<?=$arr[project][id];?>').load(url_map<?=$arr[project][id];?>);
  });
</script> 
  
        
      <?	
		}
		?></td>
  </tr>
</table>
</div>
</td>
  </tr>
	<tr id="sub_complete<?=$arr[project][id];?>"  style="display: none<? if($arr[project][driver_pickup] > 0 ){ ?> 1  <? } ?>">
	
	
	  
		<td colspan="2">
		
		  <div id="tab_complete_<?=$arr[project][id];?>" style="margin-bottom:5px; padding:5px; border-bottom:  solid 2px #CDCDCD ; ">
		
		<table width="100%"  border="0" cellspacing="2" cellpadding="2" style="border-bottom: solid 0px #999999; margin-bottom:0px; ">
		
            <tr>
              <td width="45" ><div class="checkinstep" id="checkstep_3">
                  <center>
                    <b>3</b>
                  </center>
              </div>
			  
			  <div  style="position:absolute; margin-top:-30px; margin-left: -10px;"><img src="images/no.png"  align="absmiddle" id="iconchk_s3"></div>
			  
			  </td>
              <td width="150" valign="middle"> 
                 <button style="background-color: #367FA9;width: 125px;height:30px; border:none;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" col_name="driver_complete" id="btn_complete<?=$arr[project][id];?>" <? if($arr[project][driver_complete] > 0){ ?> disabled="disabled"  <? } ?> > <span></span> ถึงสถานที่ส่ง</button></td>
              <td> 
 
  <div id="mapcomplete_<?=$arr[project][id];?>"></div>
  
  <? if($arr[project][driver_complete] != 0 && $arr[project][driver_complete] != ''){ ?>
 
				 <script>
$('#iconchk_s3').attr("src", "images/yes.png");
$('#checkstep_3').addClass("checkinstep_active");
 $('#tab_complete_<?=$arr[project][id];?>').removeClass("tab_alert");
		 		</script>
  <script type="text/javascript">
 $(document).ready(function(){
	var url_map<?=$arr[project][id];?> = "popup.php?name=map&file=view&sv=<?=$_GET[sv];?>&bookid=<?=$arr[project][id];?>&type=driver_complete&data_val=<?=$arr[project][driver_complete];?>";
$('#mapcomplete_<?=$arr[project][id];?>').load(url_map<?=$arr[project][id];?>);
  });
</script> 
		<? } ?>
</td>
	</tr>
</table>




</div>


  
      </td>
  </tr>
                     </tbody>
</table>