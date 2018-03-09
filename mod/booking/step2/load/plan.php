<div class=" " style="margin-left:-5px; border-bottom: dotted #999999 1px; padding:0px;">
                                        
		      
						<!--<select  class="form-control" name="price_plan" id="price_plan" style="width:100%; font-size:16px; padding:5px; height:40px" >-->
								<!--<option value="">- เลือกประเภทค่าตอบแทน -</option>-->
								<?
 if($arr[shop][price_plan]>0){
									$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
									$res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan]."");
									while($arr[category] = $db->fetch($res[category])){
										
 $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=1 ");
 $arr[open] = $db->fetch($res[open]);		  
										
										
										//echo "<option value=\"".$arr[category][id]."\"";
										if($arr[category][id] ==$arr[project][price_plan]){
											//echo " Selected";
										}
										//echo ">".$arr[category][topic_th]." </option>";
										?>
                                        
                         
                                        
                                        
                                        
<script>

 		///
$('#show_price_plan_1').click(function(){  
 
 $( "#load_mod_popup_4" ).toggle();
 
  var url_load_1= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=<?=$arr[shop][id]?>&plan=<?=$arr[open][id];?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_1); 
  
 
 	});
 

</script>                    
                            
<? if($arr[shop][price_plan_2] < 1 and $arr[shop][price_plan_3] <1){
	
	$plancheck='checked';
}


?>                              			 
                                        
 <table width="100%" border="0" cellspacing="1" cellpadding="3" >
  <tbody>
    <tr>
      
      <td class="font-22"><table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tbody>
          <tr>
            <td width="30"><input type="radio" name="price_plan" class="price_plan_select" value="<?=$arr[open][id];?>" id="price_plan_1"   <?=$plancheck?>/></td>
            <td class="font-24"><b> <?=$arr[category][topic_th];?> </td>
            <td width="20"><a id="show_price_plan_1"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
          </tr>
        </tbody>
      </table></td>
       
    </tr>
    <tr>
      <td>  
      
      
      <? if($arr[shop][price_plan_2] < 1 and $arr[shop][price_plan_3] <1){ ?>               
     
 			
<input  name="plan_setting"  type="hidden" class="form-control"  id="plan_setting" value="0"   />

<? } else { ?>
<input  name="plan_setting"  type="hidden" class="form-control"  id="plan_setting" value="<?=$arr[open][id];?>"   />

<? } ?>
      
      
      
      
	  
	  

      <?
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[shop][price_plan]."   ");
             
  $arr[price] = $db->fetch($res[price]);
 
  
 $show_park=$arr[price][price_park];
 $show_person=$arr[price][price_person];
 $show_commision=$arr[price][price_commision];
  
  
  
  
  if($show_park==1){	  
 $status_show_park='show';	   	  
  }
    
  if($show_park==0){	  
$status_show_park='';	  	  
  }
  
  
    
  if($show_person==1){	  
$status_show_person='show';	   	  
  }
  
 if($show_person==0){	  
$status_show_person='';	    	  
  }
  
   if($show_commision==1){	  
$status_show_commision='show';	   	  
  }
  
    if($show_commision==0){	  
echo  $status_show_commision='';	  
  }
	  
	  ?>
      
      
	  
	  
	  
	  <? if($arr[open][price_extra]==1){ 
 
$res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country<>240 and status=1 and extra_country=1   ORDER BY  sort_country desc limit 1  ");
 $arr[cost] = $db->fetch($res[cost]);		
	
 
	  
	  ?>
 
 
 
 
 
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="28" class="font-22"> <img src="images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;"/></td>
      <td width="60" class="font-22">จีน </td>
      <td class="font-22">
      
      <span style="display:none<?=$status_show_park?>">จอด <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>">หัว <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">คอม <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
      
      
      
      
      &nbsp;
      
      
      
      
      </td>
    </tr>
  </tbody>
</table>

        
        
        
        <? } ?> 
        
        
        
        <? if($arr[open][price_all]==1){ 
		
		
		 
$res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country=240 and status=1    ORDER BY  sort_country desc limit 1  ");
 $arr[cost] = $db->fetch($res[cost]);		
		
		
		
		?>
        
        
        
        
        
        
        
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="28"><img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/></td>
      <td width="60">ชาติอื่น</td>
 <td class="font-22">
      
      <span style="display:none<?=$status_show_park?>">จอด <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>">หัว <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">คอม <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
      
      
      
      
      &nbsp;
      
      
      
      
      </td>
    </tr>
  </tbody>
</table>
        
        
        
        
        
       
        
        
        
        <? } ?> 
        
        
      </td>
      </tr>
  </tbody>
</table>
                    


           	<?php
									}
									$db->closedb ();
								}
								?>
        
						  </div>
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
         <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 1px; padding:0px;">
                                        
		      
						<!--<select  class="form-control" name="price_plan" id="price_plan" style="width:100%; font-size:16px; padding:5px; height:40px" >-->
								<!--<option value="">- เลือกประเภทค่าตอบแทน -</option>-->
								<?
 if($arr[shop][price_plan_2]>0){
									$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
									$res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan_2]."");
									while($arr[category] = $db->fetch($res[category])){
										
 $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=2 ");
 $arr[open] = $db->fetch($res[open]);		  
										
										
										//echo "<option value=\"".$arr[category][id]."\"";
										if($arr[category][id] ==$arr[project][price_plan]){
											//echo " Selected";
										}
										//echo ">".$arr[category][topic_th]." </option>";
										?>
                                        
                         
                                        
                                        
                                        
<script>

 		///
$('#show_price_plan_2').click(function(){  
 
 $( "#load_mod_popup_4" ).toggle();
 
  var url_load_1= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=<?=$arr[shop][id]?>&plan=<?=$arr[open][id];?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_1); 
  
 
 	});
 

</script>                    
                            
                                     			 
                                        
                                        
                    <table width="100%" border="0" cellspacing="1" cellpadding="3" >
  <tbody>
    <tr>
      
      <td class="font-22"><table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tbody>
          <tr>
            <td width="30"><input type="radio" name="price_plan" class="price_plan_select" value="<?=$arr[open][id];?>" id="price_plan_2" /></td>
            <td class="font-24"><b> <?=$arr[category][topic_th];?> </td>
            <td width="20"><a id="show_price_plan_2"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
          </tr>
        </tbody>
      </table></td>
       
    </tr>
    <tr>
      <td>  
	  
	  

      <?
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[shop][price_plan_2]."   ");
             
  $arr[price] = $db->fetch($res[price]);
 
  
 $show_park=$arr[price][price_park];
 $show_person=$arr[price][price_person];
 $show_commision=$arr[price][price_commision];
  
  
  
  
  if($show_park==1){	  
 $status_show_park='show';	   	  
  }
    
  if($show_park==0){	  
$status_show_park='';	  	  
  }
  
  
    
  if($show_person==1){	  
$status_show_person='show';	   	  
  }
  
 if($show_person==0){	  
$status_show_person='';	    	  
  }
  
   if($show_commision==1){	  
$status_show_commision='show';	   	  
  }
  
    if($show_commision==0){	  
echo  $status_show_commision='';	  
  }
	  
	  ?>
      
      
	  
	  
	  
	  <? if($arr[open][price_extra]==1){ 
 
$res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country<>240 and status=1 and extra_country=1   ORDER BY  sort_country desc limit 1  ");
 $arr[cost] = $db->fetch($res[cost]);		
	
 
	  
	  ?>
 
 
 
 
 
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="28" class="font-22"> <img src="images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;"/></td>
      <td width="60" class="font-22">จีน </td>
      <td class="font-22">
      
      <span style="display:none<?=$status_show_park?>">จอด <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>">หัว <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">คอม <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
      
      
      
      
      &nbsp;
      
      
      
      
      </td>
    </tr>
  </tbody>
</table>

        
        
        
        <? } ?> 
        
        
        
        <? if($arr[open][price_all]==1){ 
		
		
		 
$res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country=240 and status=1    ORDER BY  sort_country desc limit 1  ");
 $arr[cost] = $db->fetch($res[cost]);		
		
		
		
		?>
        
        
        
        
        
        
        
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="28"><img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/></td>
      <td width="60">ชาติอื่น</td>
 <td class="font-22">
      
      <span style="display:none<?=$status_show_park?>">จอด <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>">หัว <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">คอม <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
      
      
      
      
      &nbsp;
      
      
      
      
      </td>
    </tr>
  </tbody>
</table>
        
        
        
        
        
       
        
        
        
        <? } ?> 
        
        
      </td>
      </tr>
  </tbody>
</table>
                    


           	<?php
									}
									$db->closedb ();
								}
								?>






                   
						  </div>
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                     
                          
                          
         <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 1px; padding:0px;">
                                        
		      
						<!--<select  class="form-control" name="price_plan" id="price_plan" style="width:100%; font-size:16px; padding:5px; height:40px" >-->
								<!--<option value="">- เลือกประเภทค่าตอบแทน -</option>-->
								<?
 if($arr[shop][price_plan_3]>0){
									$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
									$res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan_3]."");
									while($arr[category] = $db->fetch($res[category])){
										
 $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=3 ");
 $arr[open] = $db->fetch($res[open]);		  
										
										
										//echo "<option value=\"".$arr[category][id]."\"";
										if($arr[category][id] ==$arr[project][price_plan]){
											//echo " Selected";
										}
										//echo ">".$arr[category][topic_th]." </option>";
										?>
                                        
                         
                                        
                                        
                                        
<script>

 		///
$('#show_price_plan_3').click(function(){  
 
 $( "#load_mod_popup_4" ).toggle();
 
  var url_load_1= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=<?=$arr[shop][id]?>&plan=<?=$arr[open][id];?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_1); 
  
 
 	});
 

</script>                    
                            
                                     			 
                                        
                                        
                    <table width="100%" border="0" cellspacing="1" cellpadding="3" >
  <tbody>
    <tr>
      
      <td class="font-22"><table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tbody>
          <tr>
            <td width="30"><input type="radio" name="price_plan" class="price_plan_select" value="<?=$arr[open][id];?>" id="price_plan_3" /></td>
            <td class="font-24"><b> <?=$arr[category][topic_th];?> </td>
            <td width="20"><a id="show_price_plan_3"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
          </tr>
        </tbody>
      </table></td>
       
    </tr>
    <tr>
      <td>  
	  
	  

      <?
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[shop][price_plan_3]."   ");
             
  $arr[price] = $db->fetch($res[price]);
 
  
 $show_park=$arr[price][price_park];
 $show_person=$arr[price][price_person];
 $show_commision=$arr[price][price_commision];
  
  
  
  
  if($show_park==1){	  
 $status_show_park='show';	   	  
  }
    
  if($show_park==0){	  
$status_show_park='';	  	  
  }
  
  
    
  if($show_person==1){	  
$status_show_person='show';	   	  
  }
  
 if($show_person==0){	  
$status_show_person='';	    	  
  }
  
   if($show_commision==1){	  
$status_show_commision='show';	   	  
  }
  
    if($show_commision==0){	  
echo  $status_show_commision='';	  
  }
	  
	  ?>
      
      
	  
	  
	  
	  <? if($arr[open][price_extra]==1){ 
 
$res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country<>240 and status=1 and extra_country=1   ORDER BY  sort_country desc limit 1  ");
 $arr[cost] = $db->fetch($res[cost]);		
	
 
	  
	  ?>
 
 
 
 
 
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="28" class="font-22"> <img src="images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;"/></td>
      <td width="60" class="font-22">จีน </td>
      <td class="font-22">
      
      <span style="display:none<?=$status_show_park?>">จอด <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>">หัว <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">คอม <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
      
      
      
      
      &nbsp;
      
      
      
      
      </td>
    </tr>
  </tbody>
</table>

        
        
        
        <? } ?> 
        
        
        
        <? if($arr[open][price_all]==1){ 
		
		
		 
$res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country=240 and status=1    ORDER BY  sort_country desc limit 1  ");
 $arr[cost] = $db->fetch($res[cost]);		
		
		
		
		?>
        
        
        
        
        
        
        
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="28"><img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/></td>
      <td width="60">ชาติอื่น</td>
 <td class="font-22">
      
      <span style="display:none<?=$status_show_park?>">จอด <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>">หัว <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">คอม <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
      
      
      
      
      &nbsp;
      
      
      
      
      </td>
    </tr>
  </tbody>
</table>
        
        
        
        
        
       
        
        
        
        <? } ?> 
        
        
      </td>
      </tr>
  </tbody>
</table>
                    


           	<?php
									}
									$db->closedb ();
								}
								?>






                   
						  </div>
                          