<?
if($_GET[lang]=='en'){
$lang_talk='UK English Female';
}
if($_GET[lang]=='th'){
$lang_talk='Thai Female';
}

if($_GET[lang]=='cn'){
$lang_talk='Chinese Female';
}

?>


 <div  style="margin-left:10px; margin-right:10px; margin-top:10px; height:100%; overflow:auto ">
 	<input type="hidden" name="message_store" id="message_store" value=""  style="width:20px " /> 
 
 
 <?  
$db->connectdb(DB_NAME_CHAT,DB_USERNAME,DB_PASSWORD);
$res[category] = $db->select_query("SELECT * FROM  message_data_store where type=".$_GET[type]." ORDER BY id asc");
while ($arr[category] = $db->fetch($res[category])){
$bgcolor = ($i++ & 1) ? '#FFFFFF' : '#FFFDE9'; 
 ?>
    <div style="background-color:<?=$bgcolor ?>;padding-left:10px "  id="div_text_<?=$arr[category][id]?>"   class="text_class">
	<script>
	$('#div_btn_send_text_store').hide();
	$( "#text_<?=$arr[category][id]?>" ).click(function() {
	
	
	///$('.text_class').css('background-color', '<?=$bgcolor ?>');
	$('#div_btn_send_text_store').show();
	
 
  document.getElementById('message_store').value='<?=$arr[category][id]?>';
 /// $('#div_text_<?=$arr[category][id]?>').css('background-color', '#F6F6F6');
 
 
});
	
 	</script>
	
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="30" valign="top"> <input name="radiobutton" type="radio" value="<?=$arr[category][id]?>" id="text_<?=$arr[category][id]?>" style=" width:20px; box-shadow:none; margin-top:1px;"></td>
    <td width="40" valign="top" style="padding:5px;"> 
 
	<a  onclick="responsiveVoice.speak('<?=$arr[category][topic_.$_GET[lang]] ?>', '<?=$lang_talk?>', {rate: 0.9});" style="margin-left:0px; padding:5px;"><i class="fa fa-volume-up faa-pulse animated fa-4x" style="font-size:22px; color:#999999 " id="btn_sound_pickupplace"></i></a>	</td>
    <td valign="top" style="font-size:18px; padding-top:2px;" "><?=$arr[category][topic_.$_GET[lang]] ?>&nbsp;</td>
  </tr>
</table>
</div>
 
 <?
 
	   }
                      $db->closedb ();
                      ?>
 </div>