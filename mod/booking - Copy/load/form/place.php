
  <style>
   .div-all-palce{
	 padding:5px;   border-radius: 0px; border: 1px solid #ddd;background-color:#F6F6F6;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ;
	 
 }
 
 
 </style>

  <?
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[shop] = $db->select_query("SELECT * FROM shopping_product  WHERE id='".$arr[project][program]."' ");
		$arr[shop] = $db->fetch($res[shop]);


?>



<div  class="div-all-palce"  > 
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="100" rowspan="2"> <img src="images/shop_logo/<? echo $arr[shop][logo_code];?>.png" alt="Edit" width="95" border="0" class="img-logo" >  </td>
      <td class="font-22"><span class="font-24" style="color:<?=$arr[shop][text_color]?>"><? echo $arr[shop][topic_th];?></span></td>
    </tr>
    <tr>
 <td class="font-24"><i class="fa  fa-clock-o" style="width:20px; color:#999999"  ></i><b><? echo $arr[shop][start_time];?> -  <? echo $arr[shop][finish_time];?></td>
    </tr>
  </tbody>
</table> 

 <?  include ("mod/booking/load/form/phone.php");?>

 
 
 
 
 
 
 
<div style="background-color:#FFF; padding:3PX; margin-top:5px; border-top:1px  dotted #666666; ">
<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td width="33%" class="font-22"><span id="shop_sub_menu_map_<?=$arr[project][id]?>"><i class="fa  fa-map-marker" style="width:10px;color:<?=$main_color?>" ></i>  นำทาง</span></td>
      <td width="33%" class="font-22"><span id="shop_sub_menu_pic_<?=$arr[project][id]?>"><i class="fa   fa-photo" style="width:20px;color:<?=$main_color?>" ></i> รูปภาพ</span></td>
      <td width="33%" class="font-22"><span  id="shop_sub_menu_price_<?=$arr[project][id]?>"><i class="fa  fa-folder-open" style="width:18px;color:<?=$main_color?>" ></i>  รายได้</span></td>
    </tr>
  </tbody>
</table>

</div> 

  </div>
  
   
  
<script>
$('#shop_sub_menu_map_<?=$arr[project][id]?>').click(function(){  




 
 
 
 
 
  $( "#load_mod_popup_4" ).toggle();
 


 
 
  var url_load_<?=$arr[project][id]?>= "load_page_mod_4.php?name=booking/popup&file=map&shop_id=<?=$arr[project][program]?>";
  
  url_load_<?=$arr[project][id]?>=url_load_<?=$arr[project][id]?>+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
 url_load_<?=$arr[project][id]?>=url_load_<?=$arr[project][id]?>+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
  
  
  
  $('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_<?=$arr[project][id]?>); 
	  
	 
	  
	  
	  

 	});
	
	
	///
	$('#shop_sub_menu_pic_<?=$arr[project][id]?>').click(function(){  

 $( "#load_mod_popup_4" ).toggle();
 
  var url_load_<?=$arr[project][id]?>= "load_page_mod_4.php?name=booking/popup&file=pic&shop_id=<?=$arr[project][program]?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_<?=$arr[project][id]?>); 
	  

 	});
	
	
	
		///
		
 
 
 
		
	$('#shop_sub_menu_price_<?=$arr[project][id]?>').click(function(){  
 

 $( "#load_mod_popup_4" ).toggle();
 
 
 
 
 
  var url_load_<?=$arr[project][id]?>= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=<?=$arr[project][program]?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_<?=$arr[project][id]?>); 
  
 	});
 
</script>


