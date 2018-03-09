<?
$btn_main_w='30';
$btn_main_h='30';
$btn_li_z='22';



?>   
 
 

<style>

.top-menu-shop{
    border-radius: 50%; background-color:#00808B; display:block;
 
    padding: 5px; 
    width: 36px;
    height: 36px; 
	text-align: justify; color:#FFFFFF;    font-size:20px; font-weight:bold; margin-top:-3px;  
	border: solid 3px #FFFFFF;
 
}



 @-webkit-keyframes DIV-BORDER-STEP-SHOP {
	 
    0%   {  }
    50%  {border: solid 3px<?=$main_color?> }
    100% { }
}

 @-moz-keyframes DIV-BORDER-STEP-SHOP {
 
    0%   {  }
    50%  {border: solid 3px <?=$main_color?> }
    100% { }
}



.top-menu-shop-alert{
    border-radius: 50%; background-color:#00808B; display:block;
 
    padding: 5px; 
    width: 36px;
    height: 36px; 
	text-align: justify; color:#FFFFFF;    font-size:20px; font-weight:bold; margin-top:-3px;  
	border: solid 3px #FFFFFF;
	
		   -moz-animation: DIV-BORDER-STEP-SHOP 1s infinite;
	  
 
    -webkit-animation: DIV-BORDER-STEP-SHOP 1s infinite;
	
	
 
}





</style>
 
 
<div class="navbar-custom-menu" style=" padding:0px; "  >WE LOVE TAXI</div>
 
       
<script>
  
	////  
 
			 $(document).ready(function(){
			 
	///$('#top_menu_today_booking_new_msg').click();		
	
	 	});
	
	 
 
$('#top_menu_add_new_booking').click(function(){  
  $( "#alert_show_shopping_place" ).toggle();
 
 
 /*
 
  $( "#load_mod_popup" ).toggle();
 
 
 
  var url_load= "load_page_mod.php?name=shop&file=main&shop_id=<?=$arr[project][program]?>";
  
  url_load=url_load+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
 url_load=url_load+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
  
  
  
  $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
	  


 */
 
 
 	});
 
 
  
$('#top_menu_add_new_booking_text').click(function(){  
 
  $( "#alert_show_shopping_place" ).toggle();
 
 	});
	
	
	
	
	
	
	
$('#top_menu_today_booking').click(function(){  


 
 $( "#load_mod_popup" ).toggle();
	
  var url_load = "load_page_mod.php?name=booking/load&file=work_all&driver=<?=$user_id?>&day=<? echo date('Y-m-d');?>&type=auto";
 
 $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
  
   $("#load_booking_data").html('');
  });
  
  
  	
$('#top_menu_today_booking_text').click(function(){  

 

 
 $( "#load_mod_popup" ).toggle();
	
  var url_load = "load_page_mod.php?name=booking/load&file=work_all&driver=<?=$user_id?>&day=<? echo date('Y-m-d');?>&type=auto";
 
 $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
  
    
 
  
  
   $("#load_booking_data").html('');
  });
  
  
	
	
	
	
	
	
	
					
 </script>  
 
 
  


 
 
<script>
 
  
  
  
   $('[data-toggle="popovernew"]').popover();   
 
///	 $('[data-toggle="popovernew"]').popover('show');
 
</script>
 






