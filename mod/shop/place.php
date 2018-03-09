 
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
 
 
 
<div class="css-full-popup"  id="alert_show_shopping_place" style="display:none; position:fixed; overflow-y: auto ;overflow-x: none ; padding:10px; "> 
 
  
     
     <img src="images/close-popup.png" width="50" height="50" alt="" style="margin-top:-5px; position:absolute; margin-left:260px; margin-top:-10px; cursor:pointer" id="close_alert_show_shopping_place"/>
     
     
 
   
     <div class="font-28"><b><i class="fa fa-shopping-cart"></i>&nbsp;เลือกสถานที่ช็อปปิ้ง</div>
 
       <?
 
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[project] = $db->select_query("SELECT * FROM shopping_product  ORDER BY  id  ASC  ");
while($arr[project] = $db->fetch($res[project])){
 
 ?>
 
 
 
 
 
 <div style="padding-bottom:10px; padding-top:10px; border-bottom:1px solid #DADADA;    <? if( $arr[project][id]==2){?>
 
 
 opacity:0.4;   pointer-events: none;   
 
 <? } ?>
 
  
   ">
   <table width="100%" border="0" cellspacing="2" cellpadding="2">
     <tbody>
    <tr>
      <td width="100"> <img src="images/shop_logo/<? echo $arr[project][logo_code];?>.png" alt="Edit" width="100" border="0" class="img-logo" > </td>
      <td><span class="font-24" style="color:<?=$arr[project][text_color]?>"><? echo $arr[project][topic_th];?></span><br>

      
     <span class="font-18" style="color:#333333"><? echo $arr[project][topic_en];?></span>
      
      </td>
    </tr>
    <tr>
      <td class="font-22"><strong>เปิดบริการ</strong></td>
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

 $( "#load_mod_popup" ).toggle();
	
 
  var url_load_<?=$arr[project][id]?>= "load_page_mod.php?name=booking/popup&file=map&shop_id=<?=$arr[project][id]?>&lat=<?=$arr[project][lat]?>&lng=<?=$arr[shop][project]?>&type=stop";
  
  $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load_<?=$arr[project][id]?>); 
	  

 	});
      
      </script>
      
      
 <?
  
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[sale] = $db->select_query("SELECT * FROM  shopping_contact where product_id=".$arr[project][id]." and type='phone'  and group_type='sale'  ORDER BY id  ");
                      
 	while($arr[sale] = $db->fetch($res[sale])){  
	
 
 ?>
                  
                  
      
       <a href="tel:<?=$arr[sale][phone]?>"  id="booking_edit_<?=$arr[project][id]?>"  style="color:#333333"  >
      
<span id="shop_alert_menu_call_<?=$arr[project][id]?>" class="font-22"> <i class="fa fa-phone-square" style="font-size:18px; color:<?=$arr[project][text_color]?>; width:20px;"></i>ฝ่ายการตลาด (<?=$arr[sale][name]?>)</b></span></a>


<? } ?>
      

      
      
      
      
      </td>
    </tr>
    <tr>
      <td colspan="2"><button id="menu_add_new_booking_text_<? echo $arr[project][id];?>" type="button" class="btn  btn-info "  style="width:100%;text-align:center;padding:5px "><span class="font-36"><i class="fa  fa-shopping-cart" style="width:20px;"  ></i><b>&nbsp; ไปช็อปปิ้ง</button></td>
      </tr>
  </tbody>
</table>











</div> 
 
       <script> 
 
 
 
 
 		///
	$('#shop_alert_menu_price_<?=$arr[project][id]?>').click(function(){  
	
 
	

 $( "#load_mod_popup" ).toggle();
 
  var url_load_<?=$arr[project][id]?>= "load_page_mod.php?name=booking/popup&file=price&shop_id=<?=$arr[project][id]?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load_<?=$arr[project][id]?>); 
  

	  

 	});
 
 
 
 
 
 
 /////////////
  

$('#menu_add_new_booking_<? echo $arr[project][id];?>').click(function(){  


 $( "#alert_show_shopping_place" ).hide();


 $( "#load_mod_popup" ).toggle();
 
	
  var url_load = "load_page_mod.php?name=booking&file=new&driver=<?=$user_id?>&place=<? echo $arr[project][id];?>";
 
 $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
 
  });
  
  
  $('#menu_add_new_booking_text_<? echo $arr[project][id];?>').click(function(){  


 $( "#alert_show_shopping_place" ).hide();


 $( "#load_mod_popup" ).toggle();
 
	
  var url_load = "load_page_mod.php?name=booking&file=new&driver=<?=$user_id?>&place=<? echo $arr[project][id];?>";
 
 $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
 
  });
  
  
 
 
        </script>
 
 <? } ?>
     
     
     
     
     
 
 
 
 
 
    </div>
   </div>
</div>
 
 
 
 
 
<script>
    	$("#close_alert_show_shopping_place").click(function(){   
 
 $( "#alert_show_shopping_place" ).hide();
 
  });

</script>