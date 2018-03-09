
 <?  include ("mod/livechat/all/update/check.php");?> 



<div id="load_data_chat_online_all"></div>

 
 <div style="padding-right:0px; ">
 
 
 
 	<script>
	
	//// $("#message_alert_1").html('8');
	
	 $("#top_msg").append('<div id="top_msg_1"> </div>'); 
	</script>	
 
 
<?
 
$db->connectdb(DB_NAME_CHAT, DB_USERNAME, DB_PASSWORD);  
 

$res[chat] = $db->select_query("SELECT * FROM list_message_contact where id='".$_GET[id]."' ");
$count=0;

while($arr[chat] = $db->fetch($res[chat])){

$bgcolor = ($i++ & 1) ? '' : ''; 


	//if ($count==0) { echo "<TR>"; }
	
 

?>
 <div style="background-color:<?=$bgcolor?> ; margin-top:10px; border-bottom:solid 1px; color:#E6E6E6; padding-bottom:10px;"  id="message_main_<?=$arr[chat][id]?>" >
 
 
 <table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="70"><table width="70" border="0" cellpadding="0"   cellspacing="0" style="border:solid 0px; border-color:#DADADA">
      <tr>
        <td width="70"><img src="../data/images/user/<?=$arr[chat][class_name];?>.png?v=<?=time()?>" width="50" height="50" border="0" class="mainpic_index"  style="border:solid 1px; border-color:#DADADA;border-radius:5px;" /></a>
            <? if($arr[chat][id]<3){ ?>
            <span data-toggle="tooltip" title="3 ข้อความใหม่" class="badge"   style="position:absolute; margin-left:-10px; border-radius: 20px; height:20px; width:20px; background-color:#FF0000;    ">
            <div id="message_alert_<?=$arr[chat][id]?>">
              <? } ?>
              <? if($arr[chat][id]==1){
						echo "2";
						
						}
						
						?>
              <? if($arr[chat][id]==2){
						echo "1";
						
						}
						
						?>
            </div>
            </span> </td>
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
    <td width="80"><div style="padding-left:5px; font-size:12px" id="message_time_<?=$arr[chat][id]?>">		 	
					<?=$arr[chat][chattime]?>					
					</div>					 </td>
  </tr>
</table>

 
 
 
 
 
 
 
 
 
 
 
					
		</div>			
				 
<?
}
 
$db->closedb ();
//������ʴ��������
?>
			 

