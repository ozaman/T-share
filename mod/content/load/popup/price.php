 <?
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
 
 
 

 

 $res[plan_setting] = $db->select_query("SELECT *  FROM plan_product_price_setting WHERE  id=".$_GET[plan_setting]." ");
 $arr[plan_setting] = $db->fetch($res[plan_setting]);
 
 
  $res[shop] = $db->select_query("SELECT *  FROM shopping_product WHERE  id=".$arr[plan_setting][product_id]." ");
 $arr[shop] = $db->fetch($res[shop]);
 
 
 $res[plan] = $db->select_query("SELECT *  FROM plan_product_price_list_all WHERE  plan_setting=".$_GET[plan_setting]." ");
 $arr[plan] = $db->fetch($res[plan]);
 
 
 
  $res[plan_name] = $db->select_query("SELECT *  FROM plan_product_price_name WHERE  id=".$arr[plan_setting][plan_id]." ");
 $arr[plan_name] = $db->fetch($res[plan_name]);
 
 $arr[plan_name][topic_th];
 
 
 
 
  
 
?> 
 
 
 <script>
   $('#topic_edit_sub').html('แสดงราคา > <?=$arr[shop][topic_th]?>');
 
 </script>
 
 
       <?
	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 ///echo $all_plan = $db->num_rows('product_price_list_all',"id","status=1 and plan_setting=".$_GET[plan_setting]."");
	  
	  ?>
 
 
 
 

  <div style="margin-top:0px;">      
  
 
 

       <input type="text" class="form-control" value="china"  name="plan_type_popup" id="plan_type_popup"    style=" height:40px; font-size:16px;display:none"> 
       
  

       

<ul class="nav nav-tabs" style="width:600px;  margin-top:10px; padding:0px; display:none"> 


<? if($arr[plan_setting][price_all]==1){ ?>

 
    <li class="active" style="width:50%; " id="tab_btn_load_price_all"><a><img src="images/flag/Other.png" width="40" height="40" alt="" style="margin-top:-5px;"/><span class="font-28">&nbsp;<b>ราคาทั้งหมด</b> </span></a></li>
    
    <? } ?>
    
    
    
    <? if($arr[plan_setting][price_extra]==1){ ?>

    <li  style="width:50%;  " id="tab_btn_load_price_extra"><a ><img src="images/flag/China.png" width="40" height="40" alt="" style="margin-top:-5px;"/><span class="font-28">&nbsp;<b>ราคาตามสัญชาติ</b></a></li>
 
    
    <? } ?>
    
 
 
  </ul>



<script>

$('#load_data_popup_price').html(''); 
 $('#load_data_popup_price').html('<center><img src="images/loader.gif" >');
 
   var url_load_price= "popup.php?name=content/load/popup/load&file=list_price&plan_name=<?=$arr[plan_name][id];?>&plan_setting=<?=$arr[plan_setting][id];?>&shop_id=<?=$arr[shop][id]?>&type=all";
   
    url_load_price =url_load_price+"&control="+document.getElementById('check_user_price_control').value;

$('#load_data_popup_price').load(url_load_price); 



//////
 
$("#tab_btn_load_price_extra").click(function(){   

//// $("#btn_load_extra").click();
///

 
 

$("#tab_btn_load_price_extra").addClass('active');

$("#tab_btn_load_price_all").removeClass('active');




 
 $('#load_data_popup_price').html('<center><img src="images/loader.gif" >');

var url_load_price= "popup.php?name=content/load/popup/load&file=list_price&plan_name=<?=$arr[plan_name][id];?>&plan_setting=<?=$arr[plan_setting][id];?>&shop_id=<?=$arr[shop][id]?>&type=extra";
 url_load_price =url_load_price+"&control="+document.getElementById('check_user_price_control').value;

$('#load_data_popup_price').load(url_load_price); 
 
 
});








///
$("#tab_btn_load_price_all").click(function(){ 



$("#tab_btn_load_price_all").addClass('active');

$("#tab_btn_load_price_extra").removeClass('active');


 

 $('#load_data_popup_price').html('<center><img src="images/loader.gif" >');
 
   var url_load_price= "popup.php?name=content/load/popup/load&file=list_price&plan_name=<?=$arr[plan_name][id];?>&plan_setting=<?=$arr[plan_setting][id];?>&shop_id=<?=$arr[shop][id]?>&type=all";
    url_load_price =url_load_price+"&control="+document.getElementById('check_user_price_control').value;

$('#load_data_popup_price').load(url_load_price); 
 
 
});

 
   
  
  </script>
   
 
  <div>
  
  
  
  
  
 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <div id="load_data_popup_price"></div>

 <? if($_GET[type]=='extra'){ ?>


<script>

 
$("#tab_btn_load_price_extra").click();
</script>
 

<? } ?>
