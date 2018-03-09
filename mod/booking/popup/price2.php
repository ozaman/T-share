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
   
  
 
  
  <div id="div_price_plan_popup">
  
    <div class="topicname">ประเภทค่าตอบแทน</div>
  
  <select  class="form-control" name="price_plan_popup" id="price_plan_popup" style="width:100%; font-size:20px; padding:5px; height:40px" >
              
              
    
                <? if($arr[shop][price_plan]>0){
				
				       $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
                        $res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan]."");
                      
  while($arr[category] = $db->fetch($res[category])) {
									  
									  
$res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=1 ");
 $arr[open] = $db->fetch($res[open]);		  
 
   
 						  
									  
 
                                    echo "<option value=".$arr[open][id]."";
                                    if($arr[open][id] ==$_GET[plan]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][topic_th]." </option>";
                                  }
                                  $db->closedb ();
		 		
				}
				
				?>
                
                
                 <? if($arr[shop][price_plan_2]>0){
				
				       $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
                        $res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan_2]."");
                      
                                  while($arr[category] = $db->fetch($res[category])) {
 
$res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=2 ");
 $arr[open] = $db->fetch($res[open]);		  
 
    			  
 
                                    echo "<option value=".$arr[open][id]."";
                                if($arr[open][id] ==$_GET[plan]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][topic_th]."</option>";
                                  }
                                  $db->closedb ();
		 		
				}
				
				?>
                
                
                
                                 <? if($arr[shop][price_plan_3]>0){
				
				       $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
                        $res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan_3]."");
                      
                                  while($arr[category] = $db->fetch($res[category])) {
 
$res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=3 ");
 $arr[open] = $db->fetch($res[open]);		  
 
   
 						  
									  
 
                                    echo "<option value=".$arr[open][id]."";
             if($arr[open][id] ==$_GET[plan]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][topic_th]."</option>";
                                  }
                                  $db->closedb ();
		 		
				}
				
				?>
                
                

                    <?
           
                                  ?>
                  </select>
 
</div>


       <input type="text" class="form-control" value="extra"  name="plan_type_popup" id="plan_type_popup"    style=" height:40px; font-size:16px;display:none"> 
       
        
       
     <div id="price_tab"></div>
       
       <script>
	   
	     var url_load_price= "popup.php?name=booking/popup&file=tab&shop_id=<?=$_GET[shop_id]?>";
url_load_price=url_load_price+"&plan_id="+document.getElementById('price_plan_popup').value;
url_load_price=url_load_price+"&plan_type="+document.getElementById('plan_type_popup').value;
$('#price_tab').load(url_load_price); 




 
 $("#price_plan_popup").change(function(){ 
	     var url_load_price= "popup.php?name=booking/popup&file=tab&shop_id=<?=$_GET[shop_id]?>";
url_load_price=url_load_price+"&plan_id="+document.getElementById('price_plan_popup').value;
url_load_price=url_load_price+"&plan_type="+document.getElementById('plan_type_popup').value;
$('#price_tab').load(url_load_price); 
 
	 
 	 });
  
	   </script>
       



 








 