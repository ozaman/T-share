  <?  include ("includes/lang/chat.php");?>  
   <? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?>
<?

if($_GET[lang]=='1'){
 $_GET[lang]='en';
}
 if($_GET[lang]=='2'){
 $_GET[lang]='th';
}
 if($_GET[lang]=='3'){
 $_GET[lang]='cn';
}



 if($_GET[lang]=='th'){
 
 $read='อ่านแล้ว'; 
 }
 
  if($_GET[lang]=='en'){
 
 $read='Read'; 
 }
 
  if($_GET[lang]=='cn'){
 
 $read='阅读';
 
 }




 if($arr[chat][comment_from]==$chat_from){
$main_block='right';
$main_msg='right';
$margin='0';

$margin_chat='0';
 
$main_info='pull-right';
$main_timestamp='pull-left';
$alert_color='#FFF799';
 $text_color='#FFFFFF';
}

 if($arr[chat][comment_from]<>$chat_from){
$main_block='left';


 $margin='10';
$main_msg='';
$main_info='pull-left';
$main_timestamp='pull-right';
$alert_color='#F7941D';

 $text_color='#333333';
}
?>
<style type="text/css">
<!--
.style_change_f {color: <?=$text_color?>;  }
-->
</style>

 
 <div class="direct-chat-msg <?=$main_msg?>"  style="display:<? if ($arr[chat][comment_from]==''){ echo 'none';} ?> ;margin-top:20px;"    > 
                  <div class="direct-chat-info clearfix" style="margin-top:5px; margin-bottom:10px; display:none" >
				     <span class="direct-chat-name <?=$main_info?>" style="text-transform:capitalize ; margin-top:5px;" ><? 
					 
 if($arr[chat][comment_from]=='customer'){
 echo  chat_user_customer; 
 }
  if($arr[chat][comment_from]=='driver'){
 echo  chat_user_driver; 
 }
   if($arr[chat][comment_from]=='callcenter'){
 echo  chat_user_callcenter; 
 }
    if($arr[chat][comment_from]=='agent'){
 echo  chat_user_agent; 
 }
 
 ?>
 </span>  
 
                    <span class="direct-chat-timestamp <?=$main_timestamp?>"> <? //=$date = date('Y-m-d ',  $arr[chat][post_date]);?>&nbsp;
		 			
					
					
					
					
	 <font color="#666666"><? //=$date = date('H:i:s',  $arr[chat][post_date]);?></font></span>
                  </div>

  <!-- รูปภาพประจำตัว -->  
<?  if($arr[chat][comment_from]=='driver'){ 


////echo $arr[chat][drivername];

   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

  $res[driver] = $db->select_query("SELECT id,post_date FROM web_driver where id='".$arr[chat][drivername]."' ORDER BY id desc limit 1"); 
 $arr[driver] = $db->fetch($res[driver]);
 
 
  $db->connectdb(DB_NAME_CHAT,DB_USERNAME,DB_PASSWORD);

///echo $arr[chat][drivername];

?>
<img class="direct-chat-img chat-img-border-<?=$main_block?>" src="../../admin/file/driver/pic/small/<?=$arr[driver][post_date];?>.jpg?v=<?=time()?>" alt="<?=$arr[chat][comment_from]?>">
<? }  
else  { ?>
<img class="direct-chat-img chat-img-border-<?=$main_block?>" src="images/icon/user/<?=$arr[chat][comment_from]?>.png?v=<?=time()?>" alt="<?=$arr[chat][comment_from]?>">
<? } ?>
<!-- จบ-->

 <!--  เช็คกรอบ --> 
<? if($arr[chat][state_type]=="share_photo" or  $arr[chat][state_type]=="share_location"){?>











 <div class="direct-chat-text-none"  style=" display: table;float:<?=$main_block?>; margin-<?=$main_block?>: <?=$margin?>px; max-width:200px; margin-left:<? if($main_block=='right'){ echo '60';} ?> px; background:none; border:none"   >
 
 
 
 
 
 
 
 
 
 
 
 
 
 
   
<? if($main_block=='right'){ ?> 
 <div style="float: left ;position: absolute; margin-left:-80px; font-size:12px; color:#333333; margin-top:-5px;"><table width="60" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:12px; color:#333333; height:18px;" align="right"><div class="read_<?=$_GET[chat_from]?>"><? if($arr[chat][read_msg]==1){ echo $read;}?> ( 2 );</div></td>
  </tr>
  <tr>
    <td align="right"><font color="#666666" style="font-size:12px;"><? //=$date = date('H:i:s',  $arr[chat][post_date]);?><?=$date = date('H:i',  $arr[chat][post_date]);?></font></td>
  </tr>
</table>
</div>

<? } ?>

 
 

 
<script>


var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=<?=$arr[chat][latitude]?>,<?=$arr[chat][longitude]?>&sensor=false";
   
$.getJSON(url, function (data<?=$arr[chat][id]?>) {

    for(var i=0;i<1;i++) {
        var adress<?=$arr[chat][id]?> = data<?=$arr[chat][id]?>.results[i].formatted_address;

	  $( "#map_address_<?=$arr[chat][id]?>" ).html(adress<?=$arr[chat][id]?>);
    }
});


</script>


 


  <? } ?>
  
   
 
  <? if($arr[chat][state_type]<>"share_photo" and $arr[chat][state_type]<>"share_location"  ){?>
  
  

 <div class="direct-chat-text"  style=" display: table;float:<?=$main_block?>; margin-<?=$main_block?>: <?=$margin?>px; max-width:200px; margin-left:<? if($main_block=='right'){ echo '60';} ?> px; left:"   >


  
<? if($main_block=='right'){ ?> 
 <div style="float: left ;position: absolute; margin-left:-80px; font-size:12px; color:#333333; margin-top:-5px;"><table width="60" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:12px; color:#333333; height:18px;" align="right"><div class="read_<?=$_GET[chat_from]?>">(2)<? if($arr[chat][read_msg]==1){ echo $read;
	echo 5;
	
	
	}?> </div></td>
  </tr>
  <tr>
    <td align="right"><font color="#666666" style="font-size:12px;"><? //=$date = date('H:i:s',  $arr[chat][post_date]);?><?=$date = date('H:i',  $arr[chat][post_date]);?></font></td>
  </tr>
</table>
</div>

<? } ?>


   
   
   
   
   

<? } ?>





 

 <!--  ข้อความ --> 
   <? if($arr[chat][comment_id]>0){ 
    $arr[chat][comment]=$arr[storechat][topic_.$_GET[lang]];
   ?> 
  <div id="translate_en_<?=$arr[chat][id]?> " style="margin-top:5px; padding-top:5px;   border-top:1px solid #C1C1C1; color:#FFFFFF;  display:none">
		<?=$arr[storechat][topic_en]?>
 </div>
 
 <div id="translate_cn_<?=$arr[chat][id]?> " style="margin-top:5px; padding-top:5px;   border-top:1px solid #C1C1C1; color:#FFFFFF;  display:none">
		<?=$arr[storechat][topic_cn]?>
 </div>
 
  <? } ?>
  
     <? if($arr[chat][state_type]=='call'){
 $res[storechatshare] = $db->select_query("SELECT topic_en,topic_th,topic_cn from message_data_store_share  where type='call' and from_part='".$arr[chat][comment_from]."' ");
$arr[storechatshare] = $db->fetch($res[storechatshare]);
 
  }   
   ?>
  
  
  
			
  <? if($arr[chat][state_type]=='flight_change'){  ?>
			 
			  
			  <i class="fa   fa-plane " style=" -webkit-transform:rotateX(180deg);
  -moz-transform:rotateX(180deg);
  -o-transform:rotateX(180deg);
  -ms-transform:rotateX(180deg); color:<?=$alert_color?>; font-size:16px"></i>
			  
			
<? } ?>
			
	<? if($arr[chat][state_type]=='before_time' or $arr[chat][state_type]=='after_time'){  ?>
			  <i class="fa fa-clock-o " style="color:<?=$alert_color?>; font-size:16px" ></i>
			
			
			
<? } ?>



 
 

	<? if($arr[chat][state_type]=='to_point'){  ?>
			  <i class="fa fa-map-marker" style="color:<?=$alert_color?>; font-size:16px" ></i>
			
<? } ?>
			
	<? if($arr[chat][state_type]=='flight_delay'){  ?>
			  <i class="fa   fa-plane " style=" -webkit-transform:rotateX(180deg);
  -moz-transform:rotateX(180deg);
  -o-transform:rotateX(180deg);
  -ms-transform:rotateX(180deg); color:<?=$alert_color?>; font-size:16px"></i>
			
<? } ?>
			
			  
			  
<? if($arr[chat][state_type]=='call'){
 $res[storechatshare] = $db->select_query("SELECT topic_en,topic_th,topic_cn from message_data_store_share  where type='call' and from_part='".$arr[chat][comment_from]."' ");
$arr[storechatshare] = $db->fetch($res[storechatshare]);
$arr[chat][comment]=$arr[storechatshare][topic_.$_GET[lang]];
?>







  <span ><i class="fa fa-phone-square" style="color:<?=$alert_color?>; font-size:16px; " ></i></span>

<?
  }   
   ?>
   
   
   
   
   
   
   
   
   
   
      <? if($arr[chat][state_type]=='voice_message'){
 
?>
 
 
 
 <script>
  //   var url_voice_<?=$arr[chat][id];?> = "<?=$chat_part?>go.php?name=livechat/sub/load&file=voice_play&vc=<?=$_GET[vc]?>&playtime=<?=$arr[chat][post_date]?>";
	 
	 
	  $("#load_voice_play_<?=$arr[chat][id];?>").html('<iframe width="80"  height="40"  frameborder="0" style="border:0" src="<?=$chat_part?>go.php?name=livechat/sub/load&file=voice_play&vc=<?=$_GET[vc]?>&playtime=<?=$arr[chat][post_date]?>" allowfullscreen></iframe>');
	 
	 
	 
	 
	 
 
 // $('#load_voice_play_<?=$arr[chat][id];?>').load(url_voice_<?=$arr[chat][id];?>);
 
 </script>

 <div id="load_voice_play_<?=$arr[chat][id];?>">
 
 </div>
 

 <?
  }   
   ?>
 <? if($arr[chat][state_type]=='share_location'){
 $res[storechatshare] = $db->select_query("SELECT topic_en,topic_th,topic_cn from message_data_store_share  where type='share_location' and from_part='".$arr[chat][comment_from]."' ");
$arr[storechatshare] = $db->fetch($res[storechatshare]);
///$arr[chat][comment]=$arr[storechatshare][topic_.$_GET[lang]]."<br>";

 

}
?>
 <? if($arr[chat][state_type]=='flight_change'){
 $res[storechatshare] = $db->select_query("SELECT topic_en,topic_th,topic_cn from message_data_store_share  where type='flight_change' and from_part='".$arr[chat][comment_from]."' ");
$arr[storechatshare] = $db->fetch($res[storechatshare]);
//$arr[chat][comment]=$arr[storechatshare][topic_.$_GET[lang]];

$arr[chat][comment]=chat_change_flight;
}
?>
 <? if($arr[chat][state_type]=='before_time'){
 $res[storechatshare] = $db->select_query("SELECT topic_en,topic_th,topic_cn from message_data_store_share  where type='before_time' and from_part='".$arr[chat][comment_from]."' ");
$arr[storechatshare] = $db->fetch($res[storechatshare]);
//$arr[chat][comment]=$arr[storechatshare][topic_.$_GET[lang]];
$arr[chat][comment]=chat_before;
}
?>
 <? if($arr[chat][state_type]=='after_time'){
 $res[storechatshare] = $db->select_query("SELECT topic_en,topic_th,topic_cn from message_data_store_share  where type='after_time' and from_part='".$arr[chat][comment_from]."' ");
$arr[storechatshare] = $db->fetch($res[storechatshare]);
// $arr[chat][comment]=$arr[storechatshare][topic_.$_GET[lang]];
$arr[chat][comment]=chat_delay;

}
?>
 <? if($arr[chat][state_type]=='to_point'){
 $res[storechatshare] = $db->select_query("SELECT topic_en,topic_th,topic_cn from message_data_store_share  where type='to_point'  ");
$arr[storechatshare] = $db->fetch($res[storechatshare]);
$arr[chat][comment]=$arr[storechatshare][topic_.$_GET[lang]];
}
?>
 <? if($arr[chat][state_type]=='flight_delay'){
 
$arr[chat][comment]=chat_flight_delay;
}
?>




<? if($arr[chat][state_type]=='chat_text'){ ?>


<script>
 $('#main_message_<?=$arr[chat][id]?>').click(function() {
 
 
 ///// tool status
 var trans_status_<?=$arr[chat][id]?> = $( "#translate_<?=$arr[chat][id]?>" ).is(":hidden");
 
 
 
 var tool_chat_status = $( "#show_chat_tool" ).is(":hidden");
 
 
 
 
 

 
 
   if(trans_status_<?=$arr[chat][id]?>==true){   
   
   
   /// alert(trans_status_<?=$arr[chat][id]?>);
   
   
    var url_trans_<?=$arr[chat][id]?> = "go.php?name=livechat/sub/load&file=trans&id=<?=$arr[chat][id]?>&vc=<?=$arr[chat][voucher]?>&from=<?=$chat_from?>&lang=<?=$_GET[lang]?>";
   
   
 
   
   
   $('#translate_<?=$arr[chat][id]?>').load(url_trans_<?=$arr[chat][id]?>);

   $( "#translate_<?=$arr[chat][id]?>" ).fadeIn();  
   
   
   
   
   
   
      } else {
	  
	  
	  $( "#translate_<?=$arr[chat][id]?>" ).hide();  
	  
	  }
 
 
 
 
 });


</script>










<div id="main_message_<?=$arr[chat][id]?>">

 <?=$arr[chat][comment]?>
 
 
 <iframe style="border:none; display:none" src="go.php?name=trans&sl=auto&tl=<?=$_GET[lang]?>&q=<?=$arr[chat][comment]?>&p=1&method=get&type=output&id=<?=$arr[chat][id]?>&vc=<?=$arr[chat][voucher]?>&from=<?=$chat_from?>&lang=<?=$_GET[lang]?>"  ></iframe>
 
 
 </div>
 
 
 
 <div id="translate_<?=$arr[chat][id]?>" style=" margin-top:5PX;padding-top:5px;border-top:1px solid <?=$text_color?>; display:none" >

<?

/*
$user_chat_load_last = new DOMDocument(); 
 @$user_chat_load_last->load( "../data/xml/translate/".$_GET[vc]."_".$arr[chat][id]."_".$chat_from.".xml" ); 
//echo $xml_load_driver;
$user_chat_xml_last = $user_chat_load_last->getElementsByTagName( "trans" ); 
foreach( $user_chat_xml_last as $load_last) 
{ 
 echo $trans_message=$load_last->getElementsByTagName('t')->item(0)->nodeValue;
 
 
	  }
*/

?>
 
 </div>
 
 
 
 <? } ?>
 
 
 
 
 
<? if($arr[chat][state_type]<>'chat_text'){ ?>


 

 <?=$arr[chat][comment]?>
 
 
 <iframe style="border:none; display:none" src="go.php?name=trans&sl=auto&tl=<?=$_GET[lang]?>&q=<?=$arr[chat][comment]?>&p=1&method=get&type=output&id=<?=$arr[chat][id]?>&vc=<?=$arr[chat][voucher]?>&from=<?=$chat_from?>&lang=<?=$_GET[lang]?>"  ></iframe>
 
 
 
 
 <? } ?>
 
 
 
 
 
 
 
 
 
 
 
 
 <? if($arr[chat][comment_id]>50000 and $arr[chat][comment_from]<>$chat_from){  ?>
 
 
 <div style="border-top: solid  1px #CDCDCD;border-bottom: solid  1px #CDCDCD; text-align:rights; margin-top:5px ; margin-bottom:5px; background-color:#F6F6F6; padding-top:5px; padding-bottom:5px;padding-left:10px;"  >
		   <i class="fa  fa-angle-double-left" style="color:<?=$main_color?>; font-size:14px" ></i>&nbsp;ขณะนี้จราจรติดขัด



</div>
 
 
 
จะใช้เวลานานเท่าไหร่ 
 
 
 
 
  <div style="border-top: solid  1px #CDCDCD;border-bottom: solid  1px #CDCDCD; text-align:rights; margin-top:5px ; margin-bottom:5px; background-color:#F6F6F6; padding-top:5px; padding-bottom:5px;padding-left:10px;"  >
		   <i class="fa  fa-angle-double-left" style="color:<?=$main_color?>; font-size:14px" ></i>&nbsp;2 ชั่วโมง ครับ
    </div>



 
 
 
<div style="border-top: solid  0px #999999; text-align:right; margin-top:5px"  >
		   <i class="fa fa-rotate-left" style="color:<?=$alert_color?>; font-size:12px" ></i><b> &nbsp;ตอบกลับ</b>



</div>
 
 <? } ?>
 
 
 
 <!--  ///////// เปลี่ยงแปลง  -->
 <? if($arr[chat][state_type]=='flight_change'){  ?>
 <br />
 <table width="100%"  border="0" cellspacing="2" cellpadding="2" style="margin-top:5px;border-top:1px solid #C1C1C1 ">
   <tr>
     <td width="80" height="20"><span class="style_change_f" style="color:<?=$text_color?>">
       <?=chat_flight_new?>
     </span></td>
     <td height="20"><span class="style_change_f" style="color:<?=$text_color?>"><span class="style_change_f" style="color:<?=$text_color?>">
       <?=$arr[chat][new_flight]?>
     </span> </span></td>
   </tr>
   <tr>
     <td height="20"><span class="style_change_f" style="color:<?=$text_color?>">
       <?=chat_date?>
     </span></td>
     <td height="20"><span class="style_change_f" style="color:<?=$text_color?>">
       <?=$arr[chat][ondate_new_flight]?>
     </span></td>
   </tr>
   <tr>
     <td height="20"><span class="style_change_f" style="color:<?=$text_color?>">
       <?=chat_time?>
     </span></td>
     <td height="20"><span class="style_change_f" style="color:<?=$text_color?>">
       <?=$arr[chat][time_new_flight_h]?>
       :
       <?=$arr[chat][time_new_flight_m]?>
     </span></td>
   </tr>
 </table>
 <table width="100%"  border="0" cellspacing="2" cellpadding="2" style="margin-top:5px;border-top:1px solid #C1C1C1 ">
  <tr>
    <td width="80" height="20"><span class="style_change_f" style="color:<?=$text_color?>">
      <?=chat_flight_old?>
    </span></td>
    <td height="20"><span class="style_change_f" style="color:<?=$text_color?>"><span class="style_change_f" style="color:<?=$text_color?>">
      <?=$arr[chat][old_flight]?>
      </span>    </span></td>
  </tr>
  <tr>
    <td height="20"><span class="style_change_f" style="color:<?=$text_color?>">
      <?=chat_date?>
    </span></td>
    <td height="20"><span class="style_change_f" style="color:<?=$text_color?>">
      <?=$arr[chat][ondate_old_flight]?>
    </span></td>
  </tr>
  <tr>
    <td height="20"><span class="style_change_f" style="color:<?=$text_color?>">
      <?=chat_time?>
    </span></td>
    <td height="20"><span class="style_change_f" style="color:<?=$text_color?>">
      <?=$arr[chat][time_old_flight_h]?>:<?=$arr[chat][time_old_flight_m]?>
    </span></td>
  </tr>
</table>

			  
 <? } ?>
			  
			  <? if($arr[chat][state_type]=='before_time' or $arr[chat][state_type]=='after_time' or $arr[chat][state_type]=='flight_delay'){  ?>
			  <div  style="margin-top:5px;border-top:1px solid #C1C1C1; padding-top:5px; ">
 
<font style="font-size:16px "> <?=$arr[chat][time_h]?> <?=chat_hour?>  <?=$arr[chat][time_m]?> <?=chat_minute?></b> </font></div>

 

			
			<? } ?>
			
	<? if($arr[chat][state_type]=='to_point'){  ?> 
 
			  			  <div  style="margin-top:5px;border-top:1px solid #C1C1C1; padding-top:5px; ">
 <center>
 <table width="160" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td valign="top"> <img src="../data/fileupload/photo/view_<?=$arr[chat][voucher];?>_<?=$arr[chat][chat_id]?>_small.jpg"     class="img-chat-pic-<?=$main_block?>" style="padding: 0px display:nonex; width:80px;border-radius:5px;"  id="button_photo_place_<?=$arr[chat][id]?>"></td>
    <td valign="top">    <img src="../data/fileupload/photo/you_<?=$arr[chat][voucher];?>_<?=$arr[chat][chat_id]?>_small.jpg"   style="padding: 0px display:nonex; width:80px; margin-left:10px;border-radius:5px;"id="button_photo_me_<?=$arr[chat][id]?>"></td>
  </tr>
</table>

 


</center>
			
			<script>
			 $('#button_photo_me_<?=$arr[chat][id]?>').click(function(){  
			 $("#preview_image_album").attr("src", "../data/fileupload/photo/you_<?=$arr[chat][voucher];?>_<?=$arr[chat][chat_id]?>_big.jpg");
			$( "#popup_chat_preview_photo" ).toggle(); 
			 });
			
			 $('#button_photo_place_<?=$arr[chat][id]?>').click(function(){  
			 $("#preview_image_album").attr("src", "../data/fileupload/photo/view_<?=$arr[chat][voucher];?>_<?=$arr[chat][chat_id]?>_big.jpg");
			$( "#popup_chat_preview_photo" ).toggle(); 
   ///  $( "#popup_chat_preview_photo" ).fadeIn(3000); 
 
 });
			
			</script>
 
 

</div>
			
<? } ?>
			
			
 
  <!--  จบ  -->  

 <!--  แสดงรูปภาพ --> 
  <?   //include ("mod/livechat/message/share.php");?> 
  <!--  จบ  -->  



  
 
			
			
			<? if($arr[chat][state_type]=="share_photo"){?>
 
			 <img src="../data/fileupload/photo/<?=$arr[chat][voucher];?>_<?=$arr[chat][chat_id]?>_small.jpg"     style="padding: 0px display:nonex" class="img-chat-pic-<?=$main_block?>" id="button_photo_<?=$arr[chat][id]?>">&nbsp;<?=$arr[chat][flight_delay]?>
			
			<script>
			 $('#button_photo_<?=$arr[chat][id]?>').click(function(){  
			 $("#preview_image_album").attr("src", "../data/fileupload/photo/<?=$arr[chat][voucher];?>_<?=$arr[chat][chat_id]?>_big.jpg");
			$( "#popup_chat_preview_photo" ).toggle(); 
   ///  $( "#popup_chat_preview_photo" ).fadeIn(3000); 

 
 });
			
			</script>
			
		    <? } ?>
			
			
			<? if($arr[chat][state_type]=="share_location"){?>
			<table width="100"  border="0" align="<?=$main_block?>" cellpadding="0" cellspacing="0" class="img-chat-map-<?=$main_block?>"    >
              <tr >
                <td id="map_address_<?=$arr[chat][id]?>" style="padding:5px; font-size:13px; font-weight:bold; color:#333333 "></td>
              </tr>
              <tr>
                <td align="center"><img src="../data/fileupload/map/<?=$arr[chat][voucher];?>_<?=$arr[chat][post_date]?>.png"   align="absmiddle"   id="button_map_<?=$arr[chat][id]?>" style=" width:150px; margin-left:5px; margin-bottom:5px; " />&nbsp;
                    <?=$arr[chat][flight_delay]?></td>
              </tr>
            </table>
			<script>
$('#button_map_<?=$arr[chat][id]?>').click(function(){  
$( "#popup_chat_preview_map" ).toggle();
  
  /// &origin=Oslo+Norway&destination=Telemark+Norway&avoid=tolls|highways
  
 ///$("#load_chat_preview_map").html('<iframe src = "https://maps.google.com/maps?q=<?=$arr[chat][latitude]?>,<?=$arr[chat][longitude]?>&hl=th;z=14&output=embed" style="width:100%; height:100%; border:none"></iframe>');
 
 
///$("#load_chat_preview_map").html('<iframe width="100%"  height="100%"  frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=<?=$google_api?>&q=<?=$arr[chat][latitude]?>,<?=$arr[chat][longitude]?>&zoom=17" allowfullscreen></iframe>');
  
 $("#load_chat_preview_map").html('<iframe width="100%"  height="100%"  frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=<?=$google_api?>&q=<?=$arr[chat][latitude]?>,<?=$arr[chat][longitude]?>&zoom=14" allowfullscreen></iframe>');
 
 // $("#load_work_preview_map").html('<iframe width="100%"  height="100%"  frameborder="0" style="border:0"  src="https://maps.google.com/maps?q=<?=$arr[chat][latitude]?>,<?=$arr[chat][longitude]?>&z=15&output=embed&key=<?=$google_api?>"></iframe>');
 
 
 
 
 // $("#button_navigater").html('<img src="images/icon_map/compass_icon.png?v=<?=time();?>" width="40" id="button_map_navigater_<?=$arr[chat][id]?>"> &nbsp;');

 ///$("#load_chat_preview_map").html('<iframe width="100%"  height="100%"  frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/view?key=<?=$google_api?>&center=<?=$arr[chat][latitude]?>,<?=$arr[chat][longitude]?>&zoom=17" allowfullscreen></iframe>');
 
 
 
 var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=<?=$arr[chat][latitude]?>,<?=$arr[chat][longitude]?>&sensor=false";
$.getJSON(url, function (data) {
    for(var i=0;i<1;i++) {
        var adress = data.results[i].formatted_address;
 
	  $( "#load_chat_preview_map_address" ).html(adress);
    }
});
 
 
 
 });
			
			$('#button_map_navigater_<?=$arr[chat][id]?>').click(function(){  
 
			});
			</script>
			
		    <? } ?>
			
			
			
			
</div>
				 
</div>
				
 
			