


 







<style>
 

.outer-content-wait{
    position:fixed; margin-left: 0px; margin-top: 0px; display: table;  top:0; left:0;   
	
 
    width: 100%; /* This could be ANY width */
    height: 100%; /* This could be ANY height */
   z-index:99999;  
	background: url('images/bg-popup.png');   overflow-y: scroll;
}

.inner-content-wait {
    display: table-cell;
    vertical-align: middle;
    text-align: center;overflow-y: scroll;
}

.centered-content-wait {
    display: inline-block;
    text-align: left; width:310px;overflow-y: scroll;
       border : 1px solid #99999;  
	z-index:99999; background-color:#FFFFFF;   -moz-border-radius:10px;
  -webkit-border-radius:3px;

 border-radius:3px; overflow-y: scroll;
}

</style>

 
<div id="alert_show_shopping_place" style="display:none;z-index:99999;  ">
<div class="outer-content-wait" >
   <div class="inner-content-wait">
     <div class="centered-content-wait">
	 <div style="overflow-y: scroll; padding:10px;">	
   
     <div class="font-28"><b><i class="fa fa-shopping-cart"></i>&nbsp;เลือกสถานที่ช็อปปิ้ง</div>
 
       <?
 
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[project] = $db->select_query("SELECT * FROM shopping_product  ORDER BY  id  ASC  ");
while($arr[project] = $db->fetch($res[project])){
 
 ?>
 
 
 
 
 
 <div style="padding-bottom:10px; padding-top:10px;      ">

  <a id="menu_add_new_booking_<? echo $arr[project][id];?>"> 
 
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="115" rowspan="3"> <img src="images/shop_logo/<? echo $arr[project][logo_code];?>.png" alt="Edit" width="105" border="0" class="img-logo" >  </td>
      <td class="font-22"><span class="font-24" style="color:<?=$arr[project][text_color]?>"><? echo $arr[project][topic_th];?></span></td>
    </tr>
    <tr>
      <td class="font-26"><b><? echo $arr[project][start_time];?> -  <? echo $arr[project][finish_time];?></td>
    </tr>
    <tr>
      <td class="font-22">
      
      <? if( $arr[project][id]==1){?>
      <font color="#39B54A">
      
      เปิดให้บริการ
      
      <script> 
 
 
 
  

$('#menu_add_new_booking_<? echo $arr[project][id];?>').click(function(){  





 $( "#load_mod_popup" ).toggle();
	
  var url_load = "load_page_mod.php?name=booking&file=new&driver=<?=$user_id?>&place=<? echo $arr[project][id];?>";
 
 $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
 
  });
  
  
 
 
  </script> 
      
     <? } ?> 
     
      <? if( $arr[project][id]==2){?>
      
      
      (เปิด 1 สิงหาคม 2560)
      
      
      
      
      <script>
	  		 
$('#menu_add_new_booking_2').click(function(){  
  
 
  
	   swal({
		title: "<font style='font-size:28px'><b> เดอะ ชิลล่า ดิวตี้ ฟรี",
		text: "<font style='font-size:22px'>เปิดให้บริการ 1 สิงหาคม 2560 ",
		type: "error",
		showCancelButton: true,
		confirmButtonColor: '#FF0000',
		confirmButtonText: 'เลือกที่อื่น',
		cancelButtonText: "ปิด",
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
	 
 $( "#alert_show_shopping_place" ).toggle();
 
 
   
	//  alert('dd');
    } else {
  //    swal("Cancelled", "", "error");
    }
	});
	   
  
  
 

  
  
  
  
  
  
  
  
  
 

		 });
		 
 

	  
	  </script>
      
      
      
      
      
     <? } ?> 
      
      
       </td>
    </tr>
  </tbody>
</table>

</a>
</div> 
 
  
 
 <? } ?>
     
     
     
     
     
 
 
 

</div>
     
 
 
    </div>
   </div>
</div>
 
 
  </div>
 
 </div>
 
 
<script>
    	$(".outer-content-wait").click(function(){   
 
  $( "#alert_show_shopping_place" ).hide();
 
  });

</script>