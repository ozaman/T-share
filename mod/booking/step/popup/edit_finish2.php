<div class="<?= $coldata?> edit-zone" id="edit_time" style="display:none">
			<table width="100%" border="0" cellspacing="1" cellpadding="1" style="margin-top:-10px;">
				<tbody>
					<tr>
						<td width="60%">
							<div class="topicname" style="margin-left:-5px;">วันที่    &nbsp; <span class="font-28">     <?=date('Y-m-d');?></span></div>
							<div class="input-group date" style="z-index:0">
								<input type="text" class="form-control" value="<?=date('Y-m-d');?>"  name="transfer_date_new" id="transfer_date_new"    style="background-color:#FFFFFF; height:40px; font-size:16px; display:none " readonly>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="0"  style="margin-top:0px;">
								<tbody>
									
									<tr>
										<td><table width="100%" border="0" cellspacing="1" cellpadding="1">
												<tbody>
													<tr>
														<td width="50%">
															<?
															date_default_timezone_set("Asia/Bangkok");
															?>
															<div  style="width:100%; font-size:28px; padding:5px;   " >
															<table width="100%" border="0" cellspacing="1" cellpadding="5" style="margin-top:-10px;"  >
																<tbody>
																	<tr>
																		<td width="50%" align="center">
																			<div class="topicname"><center>ชั่วโมง</div>
																			<div name="time_h_number_edit" id="time_h_number_edit" style="width:100%; font-size:22px;padding-top:5px;  height:40px; font-weight:bold" class="border-alert-no" ><strong><?=$_GET[airout_h];?></strong></div>
																		</td>
																		<td width="50%" align="center">
																			<div class="topicname"><center>นาที</div>
																			<div name="time_m_number_edit" id="time_m_number_edit" style="width:100%; font-size:22px; padding-top:5px; height:40px; font-weight:bold" class="border-alert-no" ><strong><?=str_pad($_GET[airout_m], 2, '0', STR_PAD_LEFT);?></strong></div>
																		</td>
																		
																	</tr>
																</tbody>
															</table>
														
															<input name="airout_h_edit" type="hidden"    id="airout_h_edit"    value="<?=$_GET[airout_h];?>" >
															<input name="airout_m_edit" type="hidden"    id="airout_m_edit"    value="<?=str_pad($_GET[airout_m], 2, '0', STR_PAD_LEFT);?>" >
															<input name="ondate_time" type="hidden"    id="ondate_time"    value="<?=$time_all?>" >
															</div>
														</td>
													</tr>
												</tbody>
											</table></td>
									</tr>
								</tbody>
							</table></td>
					</tr>
				</tbody>
			</table>
			<div align="center"><button type="button" style="width: 70%" class="btn btn-success" id="apply_edit_time"><span class="font-28">ยืนยัน</span></button></div>
	</div>


<div class="<?= $coldata?> edit-zone" id="edit_guest" style="margin-top:10px; display:none ">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" >
			<tbody>
				<tr>
					<td><div class="font-28" style="color:<?=$main_color?>"><b>จำนวนแขก</div></td>
					<td width="50" style="display: none;" id="row_accept_guest">
				<img src="images/checked.png" width="35px"/>
					</td>
				</tr>
			</tbody>
		</table>
		<div >
			<table width="100%" border="0" cellspacing="1" cellpadding="5" style="margin-top:-5px;"  >
				<tbody>
					<tr>
						<td width="50%" align="center">
							<div class="topicname"><center>ผู้ใหญ่</div>
							<div name="adult_number_edit" id="adult_number_edit" style="width:100%; font-size:22px;padding-top:5px;  height:40px; font-weight:bold" class="border-alert-no" ><strong><?=$_GET[adult]?></strong></div>
							<input  name="adult_edit"  type="hidden" class="form-control"  id="adult_edit" value="<?=$_GET[adult]?>"   >
							<input  name="child_edit"  type="hidden" class="form-control"  id="child_edit" value="<?=$_GET[child]?>"   >
							<input  name="pax_edit"  type="hidden" class="form-control"  id="pax_edit" value="0"   >
						</td>
						<td width="50%" align="center">
							<div class="topicname"><center>เด็ก</div>
							<div name="child_number_edit" id="child_number_edit" style="width:100%; font-size:22px; padding-top:5px; height:40px; font-weight:bold" class="border-alert-no" ><strong><?=$_GET[child]?></strong></div>
						</td>
					</tr>
				</tbody>
			</table>
			<div style="padding-top:5px; padding-bottom:5px; color:#FF0000; text-align:left" class="font-22"><center>
				ผู้ลงทะเบียนต้องอายุ 18 ปี ขึ้นไป
			</div>
		</div>
		<div align="center"><button type="button" style="width: 70%" class="btn btn-success" id="apply_edit_guest"><span class="font-28">ยืนยัน</span></button></div>
	</div>	
	
<div class="<?= $coldata?> edit-zone" id="edit_payment_detail" style="margin-top:55px;padding:5px;   border-radius: 10px; box-shadow: 0px  0px 5px #DADADA  ; display:none ">
		
		<div >
			<table width="100%" border="0" cellspacing="1" cellpadding="5" style="margin-top:-5px;">
				<tbody>
					<tr>
						<td width="100%">
						<style>
							.label_price_plan{
								vertical-align:top;padding:5px;margin: 4px;
							}
							
							
						</style>                                        
                             
               
				
				
		
<input  name="plan_setting_edit"  type="hidden" class="form-control"  id="plan_setting_edit" value="0"   />
                        <?php 
                        $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
						$res[shop] = $db->select_query("SELECT * FROM shopping_product  WHERE id='".$_GET[place]."' ");
						$arr[shop] = $db->fetch($res[shop]);
                        ?>
								<?
 								if($arr[shop][price_plan]>0){
									$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
									$res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan]."");
									while($arr[category] = $db->fetch($res[category])){
										
 $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=1 ");
 $arr[open] = $db->fetch($res[open]);		  
									
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
                                    
 <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 1px;" onclick="ClickPay(1)">
                                        
					 
                                        
                                        
                    <table width="100%" border="0" cellspacing="1" cellpadding="3" >
  <tbody>
    <tr>
      <td width="20" rowspan="2">
    
      
      <input type="radio" name="price_plan_edit" class="price_plan_select plan-edit" value="<?=$arr[open][id];?>" id="price_plan_1_edit" /></td>
      <td class="font-22" id="txt_payment_get_<?=$arr[open][id];?>"><b> <?=$arr[category][topic_th];?> </b></td>
      <td width="20" rowspan="2" valign="middle"><a id="show_price_plan_1"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
    </tr>
    <tr>
      <td>  
	  
	  

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
 
 
 
 
 
 <table width="100%" border="0" cellspacing="1" cellpadding="1" >
  <tbody>
    <tr>
      <td width="80"> <img src="images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;จีน  </td>
      <td>
      
      <span style="display:none<?=$status_show_park?>">ค่าจอด  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>">ค่าหัว  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">ค่าคอม  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
      
      
      
      
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
        
        
        
        
        
        
        
 <table width="100%" border="0" cellspacing="1" cellpadding="1" >
  <tbody>
    <tr>
      <td width="80"><img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;ทั้งหมด</td>
      <td>
      
      <span style="display:none<?=$status_show_park?>">ค่าจอด  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>">ค่าหัว  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">ค่าคอม  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
      
      
      
      
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
                    

                   
										</div>
                                        
                                        
                                        
                                        
                                        
										<?php
									}
									$db->closedb ();
								}
								?>
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
                            
                                   
                                      
 <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 1px;" onclick="ClickPay(2);">
                                        
										 
                                        
                                        
                    <table width="100%" border="0" cellspacing="1" cellpadding="3" >
  <tbody>
    <tr>
      <td width="20" rowspan="2"><input type="radio" name="price_plan_edit" class="price_plan_select plan-edit" value="<?=$arr[open][id];?>" id="price_plan_2_edit" /></td>
      <td class="font-22"  id="txt_payment_get_<?=$arr[open][id];?>"><b> <?=$arr[category][topic_th];?> </td>
      <td width="20" rowspan="2"><a id="show_price_plan_2"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
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
      <td width="80"> <img src="images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;จีน  </td>
      <td>
      
      <span style="display:none<?=$status_show_park?>">ค่าจอด  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>">ค่าหัว  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">ค่าคอม  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
      
      
      
      
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
      <td width="80"><img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;ทั้งหมด</td>
      <td>
      
      <span style="display:none<?=$status_show_park?>">ค่าจอด  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>">ค่าหัว  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">ค่าคอม  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
      
      
      
      
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
                    

                   
						  </div>
                                        
										<?php
									}
									$db->closedb ();
								}
								?>
                                
                                
                                
								<?
								if($arr[shop][price_plan_3]>0){
									$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
									$res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan_3]."");
									while($arr[category] = $db->fetch($res[category])){
										
										
									 $res[open] = $db->select_query("SELECT  * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=3 ");
 									 $arr[open] = $db->fetch($res[open]);		
									
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
                            
                                                                       
 <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 0px;" onclick="ClickPay(3);">
                                        
										 
                                        
                                        
                    <table width="100%" border="0" cellspacing="1" cellpadding="3"  >
  <tbody>
    <tr>
      <td width="20" rowspan="2"><input type="radio" name="price_plan_edit" class="price_plan_select plan-edit" value="<?=$arr[open][id];?>" id="price_plan_3_edit" /></td>
      <td class="font-22"  id="txt_payment_get_<?=$arr[open][id];?>"><b> <?=$arr[category][topic_th];?></b> </td>
      <td width="20" rowspan="2"><a id="show_price_plan_3"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
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
      <td width="80"> <img src="images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;จีน  </td>
      <td>
      
      <span style="display:none<?=$status_show_park?>">ค่าจอด  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>">ค่าหัว  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">ค่าคอม  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
      
      
      
      
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
      <td width="80"><img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;ทั้งหมด</td>
      <td>
      
      <span style="display:none<?=$status_show_park?>">ค่าจอด  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>">ค่าหัว  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">ค่าคอม  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
      
      
      
      
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
                    

                   
						  </div>
										<?php
									}
									$db->closedb ();
								}
								?>
								<?
								?>
							<!--</select>-->
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div align="center"><button type="button" style="width: 70%" class="btn btn-success" id="apply_edit_payment"><span class="font-28">ยืนยัน</span></button></div>
	</div>

<div class="<?= $coldata?> edit-zone" id="edit_transfer_detail" style="margin-top:55px;padding:5px;   border-radius: 10px; box-shadow: 0px  0px 5px #DADADA  ; display:none ">
		
		<div style="margin-top:-50px;" id="show_car_detail">
			<?   include ("mod/booking/load/booking/car_for_edit.php");   ?>
		</div>
		<div align="center"><button type="button" style="width: 70%" class="btn btn-success" id="apply_edit_car"><span class="font-28">ยืนยัน</span></button></div>
	</div>	
	
<script>
	var product_id = $('#product_id').val();
	
		$("#time_h_number_edit").click(function(){
//			$( "#load_mod_popup_4" ).show();
			$( "#load_mod_popup_5" ).show();
			var url_load_adult = "load_page_mod_5.php?name=booking/step/popup&file=time_h_edit&type=adult";
			url_load_adult =url_load_adult+"&id=hx"+document.getElementById('time').value;
			url_load_adult =url_load_adult+"&product_id="+product_id;
			console.log(url_load_adult);
			$('#load_mod_popup_5').html(load_main_mod);
			$('#load_mod_popup_5').load(url_load_adult);
		});
		
		$("#time_m_number_edit").click(function(){
			
			$( "#load_mod_popup_5" ).show();
				var url_load_adult = "load_page_mod_5.php?name=booking/step/popup&file=time_m_edit&type=adult";
				url_load_adult =url_load_adult+"&id=mx"+document.getElementById('time').value;
				url_load_adult =url_load_adult+"&product_id="+product_id;
				url_load_adult =url_load_adult+"&airout_h="+document.getElementById('airout_h_edit').value;
				$('#load_mod_popup_5').html(load_main_mod);
				$('#load_mod_popup_5').load(url_load_adult);
		});
		
		$("#adult_number_edit").click(function(){
			$( "#load_mod_popup_5" ).show();
			var url_load_adult = "load_page_mod_5.php?name=booking/step/popup&file=adult_edit&type=adult";
			url_load_adult =url_load_adult+"&id="+document.getElementById('adult').value;
			$('#load_mod_popup_5').html(load_main_mod);
			$('#load_mod_popup_5').load(url_load_adult);
		});
		$("#child_number_edit").click(function(){
				$( "#load_mod_popup_5" ).toggle();
				var url_load_adult = "load_page_mod_5.php?name=booking/step/popup&file=child_edit&type=adult";
				url_load_adult =url_load_adult+"&id="+document.getElementById('child').value;
				$('#load_mod_popup_5').html(load_main_mod);
				$('#load_mod_popup_5').load(url_load_adult);
			});	
</script>	
	
<script>
		$('#apply_edit_time').click(function(){
			
			var airout_h_edit = $('#airout_h_edit').val();
			var airout_m_edit = $('#airout_m_edit').val();
			
			$('#airout_h').val(airout_h_edit);
			$('#airout_m').val(airout_m_edit);
			
			$('#time_h_number').html(airout_h_edit);
			$('#time_m_number').html(airout_m_edit);
			var myNumber = airout_m_edit;
			var dec = myNumber - Math.floor(myNumber);
			myNumber = myNumber - dec;
			var formattedNumber = ("0" + myNumber).slice(-2) + dec.toString().substr(1);
			$('#txt_time_edit').text('เวลาถึง '+airout_h_edit+'.'+formattedNumber+' น.');
			
			$('#popup_edit').hide();
			$('#edit_time').hide();
		});
		
		$('#apply_edit_guest').click(function(){
			
			var adult_edit = $('#adult_edit').val();
			var child_edit = $('#child_edit').val();
			
			$('#adult').val(adult_edit);
			$('#child').val(child_edit);
			
			$('#adult_number').html(adult_edit);
			$('#child_number').html(child_edit);
			
			$('#text_edit_guest').text('ผู้ใหญ่ '+adult_edit+' เด็ก'+child_edit);
			
			$('#popup_edit').hide();
			$('#edit_guest').hide();
		});

		$('#apply_edit_payment').click(function(){
			
			var plan = $('#plan_setting_edit').val();
			var txt_payment_get = $('#txt_payment_get_'+plan).text();
			$('#plan_setting').val(plan);
			$('#price_plan_'+plan).iCheck('check'); 
			$('#text_plan_edit').text(txt_payment_get);
			
			$('#popup_edit').hide();
			$('#edit_payment_detail').hide();
		});

		$('#apply_edit_car').click(function(){
			
			var use_car_id = $('#edit_check_use_car_id').val();
			var use_car_txt = $('#txt_plate_edit_'+use_car_id).val();
			
			$('#text_car_edit').text('ทะเบียน '+use_car_txt);
			
			$('#car_'+use_car_id).click() ;
			
			
			$('#popup_edit').hide();
			$('#edit_transfer_detail').hide();
		});
	</script>

<script>
		
    $(function () {
	  
    $('#price_plan_1_edit').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-green',
      increaseArea: '20%' // optional
    });
	
	
	    $('#price_plan_2_edit').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-green',
      increaseArea: '20%' // optional
    });
	
	
		    $('#price_plan_3_edit').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-green',
      increaseArea: '20%' // optional
    });
	
	
	var plan = '<?=$_GET[plan];?>';
	console.log(plan);
	if(plan=='1'){
		 $('#price_plan_1_edit').iCheck('check'); 
//		 $('#price_plan_1_edit').iCheck('check'); 
	}else if(plan=='2'){
		 $('#price_plan_2_edit').iCheck('check'); 
//		 $('#price_plan_2').iCheck('check'); 
	}else if(plan=='3'){
		 $('#price_plan_3_edit').iCheck('check'); 
//		 $('#price_plan_3').iCheck('check'); 
	}
	
	
  });
   
   
$('.plan-edit').on('ifChecked', function(event){
	var data_id = $(this).attr("value");
 	$('#plan_setting_edit').val(data_id);

});
</script>				