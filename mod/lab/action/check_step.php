
<table width="100%" cellpadding="3">
  <tr>
    <td width="100%" valign="top"><div id="tab_to_<?=$arr[project][id];?>" style="margin-bottom:5px; padding:5px; border-bottom:  solid 2px #CDCDCD ; ">
        <table width="100%"  border="0" cellspacing="2" cellpadding="2" style="border-bottom: solid 0px #999999;  " >
          <tr>
            <td width="45" ><div class="checkinstep" id="checkstep_1_<?=$arr[project][id];?>">
                <center>
                  <b>1</b>
                </center>
              </div>
                <div  style="position:absolute; margin-top:-30px; margin-left: -10px;"><img src="images/no.png"  align="absmiddle"  id="iconchk_s1_<?=$arr[project][id];?>"   /></div></td>
            <td width="120" valign="middle"><? 
if($arr[project][driver_topoint] == 1){ $text_status = "check";$btn_status = "success  btn-block btn-md btnstatus approve"; ?>
                <script>
$('#iconchk_s1_<?=$arr[project][id];?>').attr("src", "images/yes.png");
$('#checkstep_1_<?=$arr[project][id];?>').addClass("checkinstep_active");
		 		</script>
                <script type="text/javascript">
 // $(document).ready(function(){
	var url_map<?=$arr[project][id];?> = "popup.php?name=map&file=view&sv=<?=$arr[project][server];?>&bookid=<?=$arr[project][id];?>&type=driver_topoint&data_val=<?=$arr[project][driver_topoint];?>";
$('#mapto_<?=$arr[project][id];?>').load(url_map<?=$arr[project][id];?>);
 // });
  
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
 <button style="color: #fffbfb;" class="btnstatus" data-target="#popup_topoint_<?=$arr[project][id];?>" data-toggle="modal" data-backdrop="static" data-keyboard="false" data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>"   data_report_id="<?=$arr[project][report_id];?>"  data_order_id="<?=$arr[project][orderid];?>" data_carno="<?=$arr[project][carno];?>"  data_drivername="<?=$arr[project][drivername];?>"  data_sv="<?=$arr[project][server];?>" col_name="driver_topoint"  id="btn_topoint<?=$arr[project][id];?>" <? if($arr[project][driver_topoint] > 0){ ?> disableds="disabled"  <? } ?> > ถึงสถานที่รับ </button> </td>
            <td><div id="mapto_<?=$arr[project][id];?>" > </div></td>
          </tr>
        </table>
    </div></td>
  </tr>
  <tr>
    <td colspan="2" valign="top" id="sub_see_guest<?=$arr[project][id];?>" style="display: none<? if($arr[project][driver_topoint] > 0){ echo "1"; } ?>"><div id="tab_pickup_<?=$arr[project][id];?>" style="margin-bottom:5px; padding:5px; border-bottom:  solid 2px #CDCDCD ; ">
        <? if($arr[project][driver_pickup] == 0 and $arr[project][driver_topoint] ==1){ ?>
        <script>
	  $('#tab_pickup_<?=$arr[project][id];?>').addClass("tab_alert");
	  </script>
        <? } ?>
        <table width="100%"  border="0" cellspacing="2" cellpadding="2" style="border-bottom: solid  0px #999999; margin-bottom:0px; ">
          <tr>
            <td width="45" ><div class="checkinstep" id="checkstep_2_<?=$arr[project][id];?>">
                <center>
                  <b>2</b>
                </center>
              </div>
                <div  style="position:absolute; margin-top:-30px; margin-left: -10px;"><img src="images/no.png"  align="absmiddle" id="iconchk_s2_<?=$arr[project][id];?>"    /></div></td>
            <td width="120" valign="middle"><?
if($arr[project][driver_topoint] > 0){
	if($arr[project][driver_pickup] > 0){
?>
                <script>
$('#iconchk_s2_<?=$arr[project][id];?>').attr("src", "images/yes.png");
$('#checkstep_2_<?=$arr[project][id];?>').addClass("checkinstep_active");
 $('#tab_pickup_<?=$arr[project][id];?>').removeClass("tab_alert");
 </script>
                <table  cellpadding="0" cellspacing="0">
                  <tr id="tr_btn_pickup1<?=$arr[project][id];?>"  style="display: none<? if($arr[project][driver_pickup] == 1){ ?> 1  <? } ?>">
                    <td><button style=" color: #fffbfb;" class="btnstatus"  data-target="#popup_chk_guest_<?=$arr[project][id];?>" data-toggle="modal" data-backdrop="static" data-keyboard="false"   data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>"   data_report_id="<?=$arr[project][report_id];?>"  data_carno="<?=$arr[project][carno];?>"  data_drivername="<?=$arr[project][drivername];?>"   col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>1" data_val="1"  <? if($arr[project][driver_pickup] == 1){ ?> disableds="disabled"  <? } ?> > เช็คชื่อแขก</button></td>
                  </tr>
                  <tr height="5" id="cc_tr_pickup<?=$arr[project][id];?>" <? if($arr[project][driver_pickup] > 0){ ?> style="display: none"  <? } ?> ></tr>
                  <tr id="tr_btn_pickup2<?=$arr[project][id];?>"  style="display: none<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>">
                    <td><button style="background-color: #ff2b2b; color: #fffbfb;" class="btnstatus" data-target="#popup_chk_guest_<?=$arr[project][id];?>" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>"   data_report_id="<?=$arr[project][report_id];?>"  col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>2" data_val="2" <? if($arr[project][driver_pickup] == 2){ ?> disableds="disabled"  <? } ?> > ไม่เจอแขก</button></td>
                  </tr>
                </table>
                <?		
	}else{
?>
                <table  cellpadding="0" cellspacing="0">
                  <tr id="tr_btn_pickup1<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 1){ ?> 1  <? } ?>">
                    <td><button style=" color: #fffbfb;" class="btnstatus" data-target="#popup_chk_guest_<?=$arr[project][id];?>" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>"   data_report_id="<?=$arr[project][report_id];?>"  data_carno="<?=$arr[project][carno];?>"  data_drivername="<?=$arr[project][drivername];?>"   col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>1" data_val="1"  > เช็คชื่อแขก</button></td>
                  </tr>
                  <tr height="5" id="cc_tr_pickup<?=$arr[project][id];?>" <? if($arr[project][driver_pickup] > 0){ ?> style="display: none"  <? } ?> ></tr>
                  <tr id="tr_btn_pickup2<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>">
                    <td><button style="background-color: #ff2b2b; color: #fffbfb;" class="btnstatus"  data-target="#popup_chk_no_guest_<?=$arr[project][id];?>" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>"   data_report_id="<?=$arr[project][report_id];?>"  col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>2" data_val="2"  > ไม่เจอแขก</button></td>
                  </tr>
                </table>
                <?		
	}
?>
                <? }
else{ ?>
                <table  cellpadding="0" cellspacing="0">
                  <tr id="tr_btn_pickup1<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 1){ ?> 1  <? } ?>">
                    <td>
 
<button style=" color: #fffbfb;" class="btnstatus"  data-target="#popup_chk_guest_<?=$arr[project][id];?>" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>"   data_report_id="<?=$arr[project][report_id];?>"  data_carno="<?=$arr[project][carno];?>"  data_drivername="<?=$arr[project][drivername];?>"   col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>1" data_val="1" <? if($arr[project][driver_pickup] == 1){ ?> disableds="disabled"  <? } ?> > เช็คชื่อแขก</button></td>
                  </tr>
                  <tr height="5" id="cc_tr_pickup<?=$arr[project][id];?>" <? if($arr[project][driver_pickup] > 0){ ?> style="display: none"  <? } ?> ></tr>
                  <tr id="tr_btn_pickup2<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>">
                    <td><button style="background-color: #ff2b2b; color: #fffbfb;" class="btnstatus" data-target="#popup_chk_no_guest_<?=$arr[project][id];?>" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>"   data_report_id="<?=$arr[project][report_id];?>"  col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>2" data_val="2" <? if($arr[project][driver_pickup] == 2){ ?> disableds="disabled"  <? } ?> > ไม่เจอแขก</button></td>
                  </tr>
                </table>
                <? } ?>
				<? if(1==0){ ?>
                <div  id="no_guest<?=$arr[project][id];?>"  style=" display:none<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>">
                  <button type="button" class="btn btn-default"  style=" padding:5px; "   data-toggle="modal" data-backdrop="static" data-keyboard="false" >สาเหตุไม่พบแขก</button>
            </div> 
			<? } ?>
			</td>
            <td><div id="mappickup_<?=$arr[project][id];?>"></div>
                <? if($arr[project][driver_pickup] != 0 && $arr[project][driver_pickup] != ''){ ?>
                <? if($arr[project][driver_pickup] == 2){ $txt_pick_g = "ไม่เจอแขก"; }else{ $txt_pick_g = "เช็คชื่อแขก";   }?>
                <script type="text/javascript">
 $('#iconchk_s2_<?=$arr[project][id];?>').attr("src", "images/yes.png");
$('#checkstep_2_<?=$arr[project][id];?>').addClass("checkinstep_active");
 $('#tab_pickup_<?=$arr[project][id];?>').removeClass("tab_alert");
 
 //$(document).ready(function(){
	var url_map<?=$arr[project][id];?> = "popup.php?name=map&file=view&sv=<?=$arr[project][server];?>&bookid=<?=$arr[project][id];?>&type=driver_pickup&data_val=<?=$arr[project][driver_topoint];?>";
$('#mappickup_<?=$arr[project][id];?>').load(url_map<?=$arr[project][id];?>);

  // $('#show_price<?=$arr[project][id];?>').show();
 // });
  </script>
                <?	
		}
		?></td>
          </tr>
        </table>
    </div></td>
  </tr>
  <tr id="sub_complete<?=$arr[project][id];?>"  style="display: none">
    <td colspan="2"><div id="tab_complete_<?=$arr[project][id];?>" style="margin-bottom:5px; padding:5px; border-bottom:  solid 2px #CDCDCD ; ">
        <table width="100%"  border="0" cellspacing="2" cellpadding="2" style="border-bottom: solid 0px #999999; margin-bottom:0px; ">
          <tr>
            <td width="45" ><div class="checkinstep" id="checkstep_3_<?=$arr[project][id];?>">
                <center>
                  <b>3</b>
                </center>
              </div>
                <div  style="position:absolute; margin-top:-30px; margin-left: -10px;"><img src="images/no.png"  align="absmiddle" id="iconchk_s3_<?=$arr[project][id];?>"></div></td>
            <td width="120" valign="middle"><button style=" color: #fffbfb;" class="btnstatus"  data-target="#popup_complete_<?=$arr[project][id];?>" data-toggle="modal" data-backdrop="static" data-keyboard="false"   data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>"   data_report_id="<?=$arr[project][report_id];?>"  col_name="driver_complete" id="btn_complete<?=$arr[project][id];?>" <? if($arr[project][driver_complete] > 0){ ?> disableds="disabled"  <? } ?> > <span></span> ถึงสถานที่ส่ง</button></td>
            <td><div id="mapcomplete_<?=$arr[project][id];?>"></div>
                <? if($arr[project][driver_complete] != 0 && $arr[project][driver_complete] != ''){ ?>
                <script>
$('#iconchk_s3_<?=$arr[project][id];?>').attr("src", "images/yes.png");
$('#checkstep_3_<?=$arr[project][id];?>').addClass("checkinstep_active");

 $('#tab_complete_<?=$arr[project][id];?>').removeClass("tab_alert");
 


		 		</script>
 <script type="text/javascript">
 $(document).ready(function(){
 
	var url_map<?=$arr[project][id];?> = "popup.php?name=map&file=view&sv=<?=$arr[project][server];?>&bookid=<?=$arr[project][id];?>&type=driver_complete&data_val=<?=$arr[project][driver_complete];?>";
$('#mapcomplete_<?=$arr[project][id];?>').load(url_map<?=$arr[project][id];?>);
   $('#show_price<?=$arr[project][id];?>').show();
  });
  </script>
  
                <? } ?>
            </td>
          </tr>
        </table>
    </div></td>
  </tr>
</table>

<SCRIPT>
$( document ).ready(function() {
 	var url_price<?=$arr[project][id];?> = "popup.php?name=load/show&file=price&bookid=<?=$arr[project][id];?>";
$('#show_price<?=$arr[project][id];?>').load(url_price<?=$arr[project][id];?>);

});
</SCRIPT>

<div id="show_price<?=$arr[project][id];?>" style="display:none ">
 
</div>

 <div id="show_data_res<?=$arr[project][id];?>" style="display:none"> </div>
 
 <iframe id="uploadtarget" name="uploadtarget" src="" style="width:1px;height:1px;border:0"></iframe>