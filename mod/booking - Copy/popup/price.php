 <?
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[shop] = $db->select_query("SELECT * FROM  shopping_product where id=".$_GET[shop_id]."  ORDER BY id  ");
                      
 $arr[shop] = $db->fetch($res[shop]) ;
 
 
 
 
   $res[plan] = $db->select_query("SELECT plan_id  FROM plan_product_price_list WHERE  id=".$_GET[plan_id]." ");
 $arr[plan] = $db->fetch($res[plan]);
 
 
 
 
  
 
?> 
 
 
<script>
 
  $(".text-topic-action-mod-4" ).html("<?=$arr[shop][topic_th]?>");
 
 </script> 
 
 
 
       <?
	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	   $all_plan = $db->num_rows('plan_product_price_list',"id","status=1 and product_id=".$arr[shop][id]."");
	  
	  ?>
 
 
 
 

  <div style="margin-top:45px;">      
  
        <? if($all_plan>1){ ?>
 
      
     
        <? } ?>
  
  
        <? if($all_plan>1){ ?>
 
      <script>
 
  $("#div_price_plan_popup" ).show();
 
 </script> 
     
        <? } ?>
        
        
                <? if($all_plan < 2){ ?>
 
      <script>
 
  $("#div_price_plan_popup" ).hide();
 
 </script> 
     
        <? } ?>
  
 
  
  <div id="div_price_plan_popup">
  
    <div class="topicname">ประเภทค่าตอบแทน</div>
  
  <select class="form-control"  name="price_plan_popup" id="price_plan_popup"  style="text-align:center">
 
        
        <?
  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
               
  $res[category] = $db->select_query("SELECT * FROM  plan_product_price_list where status=1 and product_id=".$arr[shop][id]."   ORDER BY id asc");
              while($arr[category] = $db->fetch($res[category])) {
				  
               $res[plan] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[category][plan_id]."   ORDER BY  id ");
             $arr[plan] = $db->fetch($res[plan]);
 
                                    echo "<option value=\"".$arr[category][id]."\"";
                                    if($arr[category][id] == $arr[product][pickup_place]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[plan][topic_th]." </option>";
                                  }
                                  $db->closedb ();
                                  ?>
        
      </select>
 
</div>


       <input type="text" class="form-control" value="china"  name="plan_type_popup" id="plan_type_popup"    style=" height:40px; font-size:16px;display:none"> 
       
       
       
       
       
       

<ul class="nav nav-tabs" style="width:100%; margin-top:10px; padding:0px;"> 


<? if($arr[shop][plan_other]==1){ ?>

    <li class="active" style="width:50%;  " id="btn_load_china"><a ><img src="images/flag/China.png" width="40" height="40" alt="" style="margin-top:-5px;"/><span class="font-26">&nbsp;จีน </a></li>
    
    
    <li style="width:50%; " id="btn_load_other"><a><img src="images/flag/Other.png" width="40" height="40" alt="" style="margin-top:-5px;"/><span class="font-26">&nbsp;อื่นๆ </span></a></li>
    
    <? } ?>
    
    
    
    <? if($arr[shop][plan_other]==0){ ?>

    <li class="active" style="width:100%;  " id="btn_load_china"><a ><img src="images/flag/China.png" width="40" height="40" alt="" style="margin-top:-5px;"/><span class="font-26">&nbsp;จีน </a></li>
 
    
    <? } ?>
    
 
 
  </ul>


 







  <script>
  
  
$("#btn_load_china").click(function(){ 
 
  
	 $('#plan_type_popup').val('china');
	 
	 
$("#btn_load_china").addClass('active');

$("#btn_load_other").removeClass('active');


var url_load_price= "popup.php?name=booking/popup/load&file=price&shop_id=<?=$_GET[shop_id]?>";
url_load_price=url_load_price+"&plan_id="+document.getElementById('price_plan_popup').value;
url_load_price=url_load_price+"&plan_type="+document.getElementById('plan_type_popup').value;
$('#load_data_popup_price').load(url_load_price); 
	 



 
});

///
$("#btn_load_other").click(function(){ 
 
  $('#plan_type_popup').val('other');

$("#btn_load_china").removeClass('active');

$("#btn_load_other").addClass('active');

var url_load_price= "popup.php?name=booking/popup/load&file=price&shop_id=<?=$_GET[shop_id]?>";
url_load_price=url_load_price+"&plan_id="+document.getElementById('price_plan_popup').value;
url_load_price=url_load_price+"&plan_type="+document.getElementById('plan_type_popup').value;
$('#load_data_popup_price').load(url_load_price); 
	 







 
});


  
  
  
  
  
  
  
  
  /// load
  
var url_load_price= "popup.php?name=booking/popup/load&file=price&shop_id=<?=$_GET[shop_id]?>";
url_load_price=url_load_price+"&plan_id="+document.getElementById('price_plan_popup').value;
url_load_price=url_load_price+"&plan_type="+document.getElementById('plan_type_popup').value;
$('#load_data_popup_price').load(url_load_price); 
	 
  
  
  
  
  
    $("#price_plan_popup").change(function(){ 
	   
     
    var url_load_price= "popup.php?name=booking/popup/load&file=price&shop_id=<?=$_GET[shop_id]?>";
 	 url_load_price=url_load_price+"&plan_id="+document.getElementById('price_plan_popup').value;
	
	  url_load_price=url_load_price+"&plan_type="+document.getElementById('plan_type_popup').value;
 
 
 $('#load_data_popup_price').load(url_load_price); 
	 
 	 });
	 
	 
  
  </script>
   
 
  <div>
  
  
  
  
  <div id="load_data_popup_price"></div>

 