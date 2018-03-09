<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="70"><table width="70" border="0" cellpadding="0"   cellspacing="0" style="border:solid 0px; border-color:#DADADA">
      <tr>
        <td width="70"><img src="../data/images/user/<?=$arr[chat][class_name];?>.png?v=<?=time()?>" width="50" height="50" border="0" class="mainpic_index"  style="border:solid 1px; border-color:#DADADA;border-radius:5px;" /></a>
         
            </td>
      </tr>
    </table></td>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td >   <div id="message_user_<?=$arr[chat][id]?>" style="font-size:14px; color:#000000; font-weight:bold ">
                              <?= $arr[chat][name] ?></div>
                        </td>
                      </tr>
                      <tr>
                        <td ><div style="display:nones; font-size:14px; padding-top:5px; " id="message_last_<?=$arr[chat][id]?>">
						
						<? if($arr[chat][id]==1){
						echo "ฉันกำลังรอคุณอยู่";
						
						}
						
						?>
						
	 	
						
						
						 <? if($arr[chat][id]==2){
						echo "คอลเซ็นเตอร์โทรหาคุณ";
						
						}
						
						?>
						
						
						 <? if($arr[chat][id]==3){
						echo "ส่งไฟล์รูปภาพ";
						
						}
						
						?>
						
								 <? if($arr[chat][id]==4){
						echo "ส่งตำแหน่ง";
						
						}
						
						?>
						
					</div>
						
						
					 </td>
                      </tr>
                    </table>&nbsp;</td>
    <td width="80" style="display:none"> <div style="padding-left:5px; font-size:12px" id="message_time_<?=$arr[chat][id]?>">		 	
					<?=$arr[chat][chattime]?>					
					</div>					 </td>
  </tr>
</table>