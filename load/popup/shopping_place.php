 
<style>
	.css-full-popup {
	position: fixed;
	left: 0px;
	top: 0px; 
 
	bottom:0;
	width: 100%;
	height: 100%;
	z-index: 9999; 
	overflow-y:hidden ; padding:0px; background-color:#FFFFFF; padding:10px; 
  
}

.back-full-popup
{ 
font-size:22px;   padding:10px;  color:#FFFFF;  width:100%; background-color:<?=$maincolor?>;      
 border-top: 0px solid #000000; margin-bottom: 0px;  
  top:  0; position:fixed;
    z-index: 1; 
 
}
 
 
 
 
</style>
 
 
<div class="css-full-popup"  id="alert_show_shopping_place" style="display:none; position:fixed; overflow-y: auto ;overflow-x: none ; padding:0px; margin-top:45px; "> 
 
        <div class="back-full-popup"> 
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div class="button-close-popup-mod-0" ><?=$popup_icon_left_arow;?></div></td>
  <td   ><div style="font-size:22px; color:#FFFFFF " id="text_mod_topic_action_0" class="text-topic-action-mod-0">เลือกสถานที่ช็อปปิ้ง</div></td>
    <td width="50" align="right"   ><div style="font-size:22px; color:#FFFFFF " id="head_full_popup_icon"></div></td>
  </tr>
</table>
</div>
 
   <div style="padding:10px;">
  
       <?
 
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[project] = $db->select_query("SELECT * FROM shopping_product   WHERE id = 1  ");
while($arr[project] = $db->fetch($res[project])){
 
 ?>
 
 
 
 <div style="padding-bottom:10px; padding-top:10px; border-bottom:1px solid #DADADA;    <? if( $arr[project][status]==0){?>
 
 
 opacity:0.4;   pointer-events: none;   
 
 <? } ?>
 
  
   ">
   <table width="100%" border="0" cellspacing="2" cellpadding="2">
     <tbody>
    <tr>
      <td colspan="2" style="border-bottom : 2px solid #DADADA;" >
      
<b>  <span class="font-28" style="color:<?=$arr[project][text_color]?>"><? echo $arr[project][topic_th];?></span><br>
        
        
        <span class="font-28" style="color:#333333"><b><? echo $arr[project][topic_en];?></span>  
        
        
         </td>
      </tr>
    <tr>
      <td width="100" class="font-22"><strong>เปิดบริการ</strong></td>
      <td><span class="font-22">ทุกวัน <b>(<? echo $arr[project][start_time];?> - <? echo $arr[project][finish_time];?>)</span></td>
    </tr>
    <tr>
<td class="font-22"><strong>ค่าตอบแทน</strong></td>
      <td><span id="shop_alert_menu_price_<?=$arr[project][id]?>" class="font-22"> <i class="fa fa-calculator" style="font-size:16px; color:<?=$arr[project][text_color]?>; width:20px;"></i>  ดูค่าตอบแทน</b></span></td>
    </tr>
    <tr>
<td class="font-22"><strong>ตำแหน่งที่ตั้ง</strong></td>
      <td><span id="shop_alert_menu_map_<?=$arr[project][id]?>" class="font-22"> <i class="fa fa-map-marker" style="font-size:20px; color:<?=$arr[project][text_color]?>; width:20px;"></i>แผนที่</b></span></td>
    </tr>
    <tr>
<td class="font-22"><strong>สอบถาม</strong></td>
      <td>
 
 
 
 
 <script> 
      
 $('#shop_alert_menu_map_<?=$arr[project][id]?>').click(function(){  

 $( "#load_mod_popup_4" ).toggle();
	
 
  var url_load_<?=$arr[project][id]?>= "load_page_mod_4.php?name=booking/popup&file=map&shop_id=<?=$arr[project][id]?>&lat=<?=$arr[project][lat]?>&lng=<?=$arr[shop][project]?>&type=stop";
  
    
  url_load_<?=$arr[project][id]?>=url_load_<?=$arr[project][id]?>+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
 url_load_<?=$arr[project][id]?>=url_load_<?=$arr[project][id]?>+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
  
  
  $('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_<?=$arr[project][id]?>); 
	  

 	});
      
      </script>
      
      
 <?
  
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[sale] = $db->select_query("SELECT * FROM  shopping_contact where product_id=".$arr[project][id]." and type='phone'  and usertype='sale'  ORDER BY id  ");
                      
 	while($arr[sale] = $db->fetch($res[sale])){  
	
 
 ?>
                  
                  
      
       <a href="tel:<?=$arr[sale][phone]?>"  id="booking_edit_<?=$arr[project][id]?>"  style="color:#333333"  >
      
<span id="shop_alert_menu_call_<?=$arr[project][id]?>" class="font-22"> <i class="fa fa-phone-square" style="font-size:18px; color:<?=$arr[project][text_color]?>; width:20px;"></i>การตลาด (<?=$arr[sale][name]?>)</b></span></a>


<? } ?>
      

      
      
      
      
      </td>
    </tr>
    <tr>
      <td class="font-22"><strong>ดาวน์โหลด</strong></td>
      <td>
	  
	              
        <a href="../data/fileupload/doc_place/<? echo $arr[project][logo_code];?>.jpg"   download="<? echo $arr[project][name];?>"  style="color:#333333"  > <span id="shop_alert_menu_call_<?=$arr[project][id]?>2" class="font-22"> <i class="fa fa-download" style="font-size:18px; color:<?=$arr[project][text_color]?>; width:20px;"></i> โบร์ชัวร์</span></a>
     </td>
    </tr>
    <tr>
      <td class="font-22"><strong>สถานะ</strong></td>
      <td id="status_open_<? echo $arr[project][id];?>" class="font-26">เปิดให้บริการ</td>
    </tr>
    <tr >
      <td class="font-22"><strong>เหลือเวลา</strong></td>
      <td id="time_open_<? echo $arr[project][id];?>" class="font-26">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="tab_alert "  style="font-size:26px">
      
      	<script>
 setInterval(function() {
 var url_check_data_time_<? echo $arr[project][id];?> = "go.php?name=booking/load&file=time_open&id=<? echo $arr[project][id];?>";
 
 $('#time_open_<? echo $arr[project][id];?>').load(url_check_data_time_<? echo $arr[project][id];?>);

  
}, 1000); // 60000 milliseconds = one minute
 
	</script>
      
      
      
      
      <div id="btn_open_<? echo $arr[project][id];?>">
      
      <button id="menu_add_new_booking_text_<? echo $arr[project][id];?>" type="button tab_alert" class="btn  btn-info "  style="width:100%;text-align:center;padding:5px; background-color:<?=$main_color?> "   ><span class="font-30"><i class="fa  fa-shopping-cart" style="width:20px;"  ></i><b>&nbsp; ไปช็อปปิ้ง</b></button>
      
      </div>
      
      
      
       <div id="btn_close_<? echo $arr[project][id];?>" style=" display:nones">
      
            <button id="menu_close_new_booking_text_<? echo $arr[project][id];?>" type="button" class="btn  btn-info "  style="width:100%;text-align:center;padding:5px; background-color:#666666; border:none; display:nones "><span class="font-30"><i class="fa  fa-warning" style="width:20px; color:#ECE365"  ></i><b>&nbsp; ปิดให้บริการ</button>
        </div>
      
      
      
      </td>
      </tr>
  </tbody>
</table>











</div> 
 
       <script> 
 
 
 
 
 		///
	$('#shop_alert_menu_price_<?=$arr[project][id]?>').click(function(){  
	
 
	

 $( "#load_mod_popup_4" ).toggle();
 
  var url_load_<?=$arr[project][id]?>= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=<?=$arr[project][id]?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_<?=$arr[project][id]?>); 
  
 

 	});
 
 
  
 
 /////////////
 
$('#menu_add_new_booking_<? echo $arr[project][id];?>').click(function(){  


 $( "#alert_show_shopping_place" ).hide();


 $( "#load_mod_popup" ).toggle();
 
	
  var url_load = "load_page_mod.php?name=booking&file=new_easy&driver=<?=$user_id?>&place=<? echo $arr[project][id];?>";
 
 $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
 
  });
  
  
$('#menu_add_new_booking_text_<? echo $arr[project][id];?>').click(function(){  
  
  
$( "#alert_show_shopping_place" ).hide();


 $( "#load_mod_popup_3" ).toggle();
  

  
  
	var url_load = "load_page_mod_3.php?name=booking/step&file=booking&driver=<?=$user_id?>&place=<? echo $arr[project][id];?>";
 
  $('#load_mod_popup_3').html(load_main_mod);


///  $( "#main_index_load_page" ).toggle();
  
 
 
  $('#load_mod_popup_3').load(url_load); 
  
  
  



 
	

 
  });
  
  
 
 
        </script>
 
 <? } ?>
     
     
     
     
         </div>
 
 
 
 
 
    </div>
   </div>
</div>
 
 
 
 
 
<script>
    	$(".button-close-popup-mod-0").click(function(){   
 
 $( "#alert_show_shopping_place" ).hide();
 
  });

</script>