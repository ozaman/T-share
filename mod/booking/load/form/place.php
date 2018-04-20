
  <style>
   .div-all-palce{
	 padding:5px;   border-radius: 15px; border: 1px solid #ddd;background-color:#F6F6F6;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ;
	 
 }
 
 
 </style>

  <?
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[shop] = $db->select_query("SELECT * FROM shopping_product  WHERE id='".$arr[project][program]."' ");
		$arr[shop] = $db->fetch($res[shop]);



 $day_now =  date('D');
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
  $res[shop_time] = $db->select_query("SELECT * FROM  shopping_open_time where product_id=".$arr[project][program]." and product_day = '$day_now'     ");
 $arr[shop_time] = $db->fetch($res[shop_time]) ;
if($arr[shop_time][open_always] == 1){
$start_h =  "00";
$start_m =  "00";
$finish_h =  "23";
$finish_m =  "59";
$arr[shop][start_time] = $start_h.":".$start_m;
$arr[shop][finish_time] = $finish_h.":".$finish_m;
$time_show_open = "เปิดตลอด 24 ชั่วโมง";
}else{
$start_h =  $arr[shop_time][start_h];
$start_m =  $arr[shop_time][start_m];
$finish_h =  $arr[shop_time][finish_h];
$finish_m =  $arr[shop_time][finish_m];
$arr[shop][start_time] = $start_h.":".$start_m;
$arr[shop][finish_time] = $finish_h.":".$finish_m;

$time_show_open = $arr[shop][start_time]." - ".$arr[shop][finish_time];
}


?>



<div  class="div-all-palce"  > 

<!--<img src="images/shop_logo/<? echo $arr[shop][logo_code];?>_pic.jpg" width="100%"  alt="" style=" border-radius: 10px; border: 1px solid #ddd; margin-bottom:5px; margin-top:5px;display: none;" />-->

 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
       
      <td class="font-2">
      <span class="font-28" style="color:<?=$arr[shop][text_color]?>"><b><? echo $arr[shop][$place_shopping];?></span>
      </td>
 
    </tr>
    <tr>
 <td class="font-24" style="display: none;"><i class="fa  fa-clock-o" style="width:20px; color:#999999;"  ></i><b><? echo $time_show_open;?></td>
    </tr>
  </tbody>
</table> 

 <?  include ("mod/booking/load/form/phone.php");?>

<!--<div style="background-color:#FFF; padding:3PX; margin-top:5px; border-top:1px  dotted #666666;">
<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td width="33%" class="font-22"><span id="shop_sub_menu_map_<?=$arr[project][id]?>"><i class="fa  fa-map-marker" style="width:10px;color:<?=$main_color?>" ></i>  นำทาง</span></td>
      <td width="33%" class="font-22"><span id="shop_sub_menu_pic_<?=$arr[project][id]?>"><i class="fa   fa-photo" style="width:20px;color:<?=$main_color?>" ></i> รูปภาพ</span></td>
      <td width="33%" class="font-22"><span  id="shop_sub_menu_price_<?=$arr[project][id]?>"><i class="fa  fa-folder-open" style="width:18px;color:<?=$main_color?>" ></i>  รายได้</span></td>
    </tr>
  </tbody>
</table>

</div>--> 

  </div>
  
   
  
<script>
$('#shop_sub_menu_map_<?=$arr[project][id]?>').click(function(){  


	$('.bottom_popup').hide();
	console.log('lat '+$('#lat').val());
	console.log('lng '+$('#lng').val());

/*  $( "#load_mod_popup_4" ).toggle();
  
  var url_load_<?=$arr[project][id]?>= "load_page_mod_4.php?name=booking/popup&file=map&shop_id=<?=$arr[project][program]?>";
  
  
  url_load_<?=$arr[project][id]?>=url_load_<?=$arr[project][id]?>+"&lat="+document.getElementById('lat').value;
 url_load_<?=$arr[project][id]?>=url_load_<?=$arr[project][id]?>+"&lng="+document.getElementById('lng').value;
  
$('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_<?=$arr[project][id]?>); */
 
	  
	 
	  
	  $( "#main_load_mod_popup_map" ).toggle();
	  var url_load_<?=$arr[project][id]?>= "load_page_map.php?name=booking/popup&file=map&shop_id=<?=$arr[project][program]?>";
	  url_load_<?=$arr[project][id]?>=url_load_<?=$arr[project][id]?>+"&lat="+document.getElementById('lat').value;
 	  url_load_<?=$arr[project][id]?>=url_load_<?=$arr[project][id]?>+"&lng="+document.getElementById('lng').value;
  $('#load_mod_popup_map').html(load_main_mod);
  $('#load_mod_popup_map').load(url_load_<?=$arr[project][id]?>); 

 	});
	
	
	///
	$('#shop_sub_menu_pic_<?=$arr[project][id]?>').click(function(){  

 $( "#main_load_mod_popup_4" ).toggle();
 
  var url_load_<?=$arr[project][id]?>= "load_page_mod_4.php?name=booking/popup&file=pic&shop_id=<?=$arr[project][program]?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_<?=$arr[project][id]?>); 
	  

 	});
	
	
	
		///
		
 
 
 
		
	$('#shop_sub_menu_price_<?=$arr[project][id]?>').click(function(){  
 

 $( "#main_load_mod_popup_4" ).toggle();
 
 
 
 
 
  var url_load_<?=$arr[project][id]?>= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=<?=$arr[project][program]?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_<?=$arr[project][id]?>); 
  
 	});
 
</script>


