
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
       
      <td class="font-2"><span class="font-28" style="color:<?=$arr[shop][text_color]?>"><b><? echo $arr[shop][topic_th];?></span>
      
      
      <br>
<span class="font-28" style="color:#333333"><b><? echo $arr[shop][topic_en];?></span>
      
      
      
      </td>
    </tr>
    <tr>
 <td class="font-24"><i class="fa  fa-clock-o" style="width:20px; color:#999999"  ></i><b><? echo $arr[shop][start_time];?> -  <? echo $arr[shop][finish_time];?></td>
    </tr>
  </tbody>
</table> 

 <?  include ("mod/booking_realtime/load/form/phone.php");?>

 
 
 
 
 
 
 
  

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


