<?
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
  $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE id='".$_GET[plan_setting]."' ");
 $arr[open] = $db->fetch($res[open]);
 
 
 $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE id='".$_GET[plan_id]."'  ");
 $arr[open] = $db->fetch($res[open]);
 $_GET[plan_id];
  
  
 

?>







  <script>
  

  
 
  
  
  
  
$("#btn_load_china").click(function(){ 
 
  
	 $('#plan_type_popup').val('extra');
	 
	 
$("#btn_load_china").addClass('active');

$("#btn_load_other").removeClass('active');


var url_load_price= "popup.php?name=booking/popup/load&file=list_price&shop_id=<?=$_GET[shop_id]?>&plan_setting=<?= $_GET[plan_id];?>";
///url_load_price=url_load_price+"&plan_id="+document.getElementById('price_plan_popup').value;
url_load_price=url_load_price+"&plan_type="+document.getElementById('plan_type_popup').value;


//$('#load_data_popup_price').html(load_main_icon_mod);
$('#load_data_popup_price').load(url_load_price); 
	 



 
});

///
$("#btn_load_other").click(function(){ 
 
  $('#plan_type_popup').val('all');

$("#btn_load_china").removeClass('active');

$("#btn_load_other").addClass('active');
var url_load_price= "popup.php?name=booking/popup/load&file=list_price&shop_id=<?=$_GET[shop_id]?>&plan_setting=<?= $_GET[plan_id];?>";
///url_load_price=url_load_price+"&plan_id="+document.getElementById('price_plan_popup').value;
url_load_price=url_load_price+"&plan_type="+document.getElementById('plan_type_popup').value;

//$('#load_data_popup_price').html(load_main_icon_mod);
$('#load_data_popup_price').load(url_load_price); 
	 
 
 
});


  
  
  
  
  
  
  
  

  
  
  
  
  
    $("#price_plan_popup").change(function(){ 
	   
     
    var url_load_price= "popup.php?name=booking/popup/load&file=list_price&shop_id=<?=$_GET[shop_id]?>";
 	 url_load_price=url_load_price+"&plan_setting="+document.getElementById('price_plan_popup').value;
	
	  url_load_price=url_load_price+"&plan_type="+document.getElementById('plan_type_popup').value;
 
//$('#load_data_popup_price').html(load_main_icon_mod);
 $('#load_data_popup_price').load(url_load_price); 
	 
 	 });
	 
	 
  
  </script>
   
 
  <div>
  
  <ul class="nav nav-tabs" style="width:100%; margin-top:10px; padding:0px;"> 
 
 
  <? if($arr[open][price_extra]==1){ ?>
    <li class="active" style="width:50%;  " id="btn_load_china"><a ><img src="images/flag/China.png" width="40" height="40" alt="" style="margin-top:-5px;"/><span class="font-26">&nbsp;จีน </a></li>
    
    
 <script>
 $("#btn_load_china").click();
 </script>   
    
    
    
       <? } ?> 
    
 <? if($arr[open][price_all]==1){ ?>
 
 
    
    <li style="width:50%; " id="btn_load_other"><a><img src="images/flag/Other.png" width="40" height="40" alt="" style="margin-top:-5px;"/><span class="font-26">&nbsp;ต่างชาติ </span></a></li>
    
     <? if($arr[open][price_extra]==0){ ?>
      <script>
 $("#btn_load_other").click();
 </script>   
     
     <? } ?> 
    
    <? } ?>
    
 
  </ul>

  
  
  <div id="load_data_popup_price" style="overflow: auto;"></div>
  
  </div>