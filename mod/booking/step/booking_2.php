<style>

.stepbar {
    position: fixed;
    width: 100%;
    z-index: 99999;
/*    margin-top: 0px;*/
    margin-top: 48px;
/*    top: 55px;*/
    top: 0px;
    left: 0px;
    background-color: #f6f6f6;
   /* border: 1px solid #ddd;*/
    height: 8px;
}


.stepbox {
   background-color: #4267b2;
   border: 1px solid #ddd;
   height: 100%;
}
.progress-bar{
	/*margin : 1px;*/
	margin-right: 1px;
/*	background-color: rgb(25, 202, 153);*/
}

</style>
<div class="stepbar">
 <div class="progress" style="border-radius:0px;height : 8px !important;background-color:#cccccc;box-shadow: 1px 1px 5px #ddd;">
   <div class="progress-bar progress-bar-success progress-bar-striped active" id="step_1" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:0%;/*background-color:rgb(106, 194, 89);*/display: nones;">
      <span class="sr-only">20% Complete</span>
    </div>
   <!-- <div class="progress-bar" id="step_2" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%;background-color:rgb(106, 194, 89);display: none;/*box-shadow: #f4f4f4 1px 1px 5px;*/">
      <span class="sr-only">20% Complete</span>
    </div> 
    <div class="progress-bar" id="step_3" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%;background-color:rgb(106, 194, 89);display: none;/*box-shadow: #f4f4f4 1px 1px 5px;*/">
      <span class="sr-only">20% Complete</span>
    </div>
    <div class="progress-bar" id="step_4" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%;background-color:rgb(106, 194, 89);display: none;/*box-shadow: #f4f4f4 1px 1px 5px;*/">
      <span class="sr-only">20% Complete</span>
    </div>
    <div class="progress-bar" id="step_5" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%;background-color:rgb(106, 194, 89);display: none;/*box-shadow: #f4f4f4 1px 1px 5px;*/">
      <span class="sr-only">20% Complete</span>
    </div>-->
  </div>
</div>

<form method="post"  id="edit_form" name="edit_form">

    <link rel="stylesheet" href="plugins/iCheck/square/green.css">
<script src="plugins/iCheck/icheck.min.js"></script>

<style>
		.step-booking
		{
			border-radius: 50%;
			background-color: #FF9933;
			padding: 10px;
			width: 60px;
			height: 60px;
			text-align: justify;
			color: #FFFFFF;
			font-size: 30px;
			font-weight: bold;
			margin-top: -10px;
			text-align: center;
			border: solid 4px #FFFFFF;
			box-shadow: 0 0 0px 0px #E8E6E6;
			position: absolute;
			background: #f39c12 !important;
			color: #fff;
		}
		.step-booking-small
		{
			border-radius: 50%;
			background-color: <?=$main_color?> ;
			padding: 5px;
			width: 40px;
			height: 40px;
			text-align: justify;
			color: #FFFFFF;
			font-size: 20px;
			font-weight: bold;
			text-align: center;
			vertical-align: middle;
			border: solid 4px #FFFFFF;
			background: <?=$main_color?> !important;
			color: #fff;
		}
		.step-booking-small-no
		{
			border-radius: 50%;
			background-color: #FF9933;
			padding: 5px;
			width: 40px;
			height: 40px;
			text-align: justify;
			color: #FFFFFF;
			font-size: 20px;
			font-weight: bold;
			text-align: center;
			border: solid 4px #FFFFFF;
			background: #999999 !important;
			color: #fff;
		}
		.step-booking-active
		{
			text-align: justify;
			color: #FFFFFF;
			border: solid 1px <?=$main_color?>;
			background-color: #F6F6F6;
			color: #fff;
			border-radius: 10px;
			margin-bottom: 10xp;
		}
		.step-booking-active-no
		{
			text-align: justify;
			color: #FFFFFF;
			border: solid 1px #dadada;
			color: #fff;
			border-radius: 10px;
		}
	</style>
	<?
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[shop] = $db->select_query("SELECT * FROM shopping_product  WHERE id='".$_GET[place]."' ");
	$arr[shop] = $db->fetch($res[shop]);
	$res[shopmain] = $db->select_query("SELECT * FROM shopping_product_main  WHERE id='".$arr[shop][main]."' ");
	$arr[shopmain] = $db->fetch($res[shopmain]);
	$res[shopsub] = $db->select_query("SELECT * FROM shopping_product_main  WHERE id='".$arr[shop][main]."' ");
	$arr[shopsub] = $db->fetch($res[shopsub]);
	$arr[project][program]=$_GET[place];
	?>
	<script>
		$(".text-topic-action-mod-3" ).html("<?=$arr[shop][topic_th]?>");
	</script>
	<input name="program" type="hidden"  required="true" class="form-control" id="program"    value="<?=$arr[shop][id]?>" >
	<div class="<?= $coldata?>" id="show_step_detail" style="margin-top:50px;padding:5px;   border-radius: 10px; border: 0px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 0px #DADADA; ">
	
	<script>
		$("#main_edit_booking_step_1").click(function(){
				$( "#time_number" ).addClass('border-alert');
				//	 $( "#load_mod_popup_4" ).toggle();
				$("#back_booking_step_2").click();
			});
	</script>
	<script>
		$("#main_edit_booking_step_2").click(function(){
				// $( "#load_mod_popup_4" ).toggle();
				$("#back_booking_step_3").click();
			});
	</script>
	<script>
		$("#main_edit_booking_step_3").click(function(){
				$( "#adult_number" ).addClass('border-alert');
				$( "#child_number" ).addClass('border-alert');
				$("#submit_booking_step_2").click();
				// $( "#load_mod_popup_4" ).toggle();
			});
	</script>
	<?
	date_default_timezone_set('UTC');
	// echo date('H:i:s');
	?>
	<div class="<?= $coldata?>" id="show_time_detail" style=" border-radius: 10px; border: 1px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ; display:nones;padding: 5px;margin-top: 5px;"  >
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td><div class="font-28" style="color:<?=$main_color?>"><b>เวลาถึงโดยประมาณ</div></td>
					<td width="50" style="display: none;" id="row_accept">
				

					<img src="images/checked.png" width="35px"/>
					</td>
				</tr>
			</tbody>
		</table>
		<div>
			<table width="100%" border="0" cellspacing="1" cellpadding="1" style="margin-top:-10px;">
				<tbody>
					<tr>
						<td width="60%">
							<div class="topicname" style="margin-left:-5px;">วันที่    &nbsp; <span class="font-28">     <?=date('Y-m-d');?></span> <span style="font-size: 22px;"> / </span> <span class="font-28" id="time_book_page"></span></div>
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
																			<div name="time_h_number" id="time_h_number" style="width:100%; font-size:22px;padding-top:5px;  height:40px; font-weight:bold" class="border-alert" ><strong>เลือก</strong></div>
																		</td>
																		<td width="50%" align="center">
																			<div class="topicname"><center>นาที</div>
																			<div name="time_m_number" id="time_m_number" style="width:100%; font-size:22px; padding-top:5px; height:40px; font-weight:bold" class="border-alert-no" ><strong>เลือก</strong></div>
																		</td>
																	</tr>
																</tbody>
															</table>
															<input  name="time"  type="hidden" class="form-control"  id="time" value="0"   >
															<input  name="time_to"  type="hidden" class="form-control"  id="time_to" value="0"   >
															<input name="airout_h" type="hidden"    id="airout_h"    value="" >
															<input name="airout_m" type="hidden"    id="airout_m"    value="" >
															<input name="ondate_time" type="hidden"    id="ondate_time"    value="<?=$time_all?>" >
															<div  id="show_to_times" style="display:none">
																<div>
																	<table width="100%" border="0" cellspacing="0" cellpadding="2">
																		<tbody>
																			<tr>
																				<td width="180"> <div class="topicname">เวลาถึงโดยประมาณ</div></td>
																				<td><div class="font-24" id="text_to_time" style="color:<?=$main_color?>"></div></td>
																			</tr>
																		</tbody>
																	</table>
																</div>
																<div  id="show_to_times_alert" style="display:none">
																</div>
															</div>
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
		</div>
	</div>
<!-- DIV PAX -->
<div id="testScroll">
	<div class="<?= $coldata?>" id="show_guest_detail" style="margin-top:10px;padding:5px;   border-radius: 10px; border: 1px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ; display:none ">
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
							<div name="adult_number" id="adult_number" style="width:100%; font-size:22px;padding-top:5px;  height:40px; font-weight:bold" class="border-alert-no" ><strong>เลือก</strong></div>
							<input  name="adult"  type="hidden" class="form-control"  id="adult" value="0"   >
							<input  name="child"  type="hidden" class="form-control"  id="child" value="0"   >
							<input  name="pax"  type="hidden" class="form-control"  id="pax" value="0"   >
						</td>
						<td width="50%" align="center">
							<div class="topicname"><center>เด็ก</div>
							<div name="child_number" id="child_number" style="width:100%; font-size:22px; padding-top:5px; height:40px; font-weight:bold" class="border-alert-no" ><strong>เลือก</strong></div>
						</td>
					</tr>
				</tbody>
			</table>
			<div style="padding-top:5px; padding-bottom:5px; color:#FF0000; text-align:left" class="font-22"><center>
				ผู้ลงทะเบียนต้องอายุ 18 ปี ขึ้นไป
			</div>
		</div>
	</div>
<!-- Agent Issu -->	
	<div class="<?= $coldata?>" id="show_payment_detail" style="margin-top:10px;padding:5px;   border-radius: 10px; border: 1px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ; display:none ">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" >
			<tbody>
				<tr>
					<td><div class="font-28" style="color:<?=$main_color?>"><b>ค่าตอบแทน</div></td>
					<td width="50" style="display: none;" id="row_accept_payment">
					<img src="images/checked.png" width="35px"/>
					</td>
				</tr>
			</tbody>
		</table>
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
                             
               
				
				
		
<input  name="plan_setting"  type="hidden" class="form-control"  id="plan_setting" value="0"   />
                        
                        
                        
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
                            
                                        
                                        
                                        
                                        
 <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 1px;" onclick="ClickPay(1)">
                                        
					 
                                        
                                        
                    <table width="100%" border="0" cellspacing="1" cellpadding="3" >
  <tbody>
    <tr>
    <td width="30" rowspan="2" align="center">
    
      
      <input type="radio" name="price_plan" class="price_plan_select genaral" value="<?=$arr[open][plan_id];?>" id="price_plan_1" /></td>
     
      <td class="font-22"><b> <?=$arr[category][topic_th];?> </td>
     <td width="35" rowspan="2" valign="middle"><a id="show_price_plan_1"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
        
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
     <td width="30" rowspan="2" align="center"><input type="radio" name="price_plan" class="price_plan_select genaral" value="<?=$arr[open][plan_id];?>" id="price_plan_2" /></td>
      <td class="font-22"><b> <?=$arr[category][topic_th];?> </td>
      <td width="35" rowspan="2"><a id="show_price_plan_2"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
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
                            
                                                                       
 <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 0px;" onclick="ClickPay(3);">
                                        
										 
                                        
                                        
                    <table width="100%" border="0" cellspacing="1" cellpadding="3"  >
  <tbody>
    <tr>
    <td width="30" rowspan="2"  align="center" ><input type="radio" name="price_plan" class="price_plan_select genaral" value="<?=$arr[open][plan_id];?>" id="price_plan_3" /></td>
      <td class="font-22"><b> <?=$arr[category][topic_th];?> </td>
       <td width="35" rowspan="2"><a id="show_price_plan_3"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>      
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
	</div>
</div>	
<!-- DIV CAR -->	
	<div class="<?= $coldata?>" id="show_transfer_detail" style="margin-top:10px;padding:5px;   border-radius: 10px; border: 1px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ; display:none  ">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td><div class="font-28" style="color:<?=$main_color?>"><b>ข้อมูลรถของท่าน</div>
					</td>
					<td width="50" style="display: none;" id="row_accept_car">
					<img src="images/checked.png" width="35px"/>
					</td>
				</tr>
			</tbody>
		</table>
		<div style="margin-top:-50px;" id="show_car_detail">
			<?   include ("mod/booking/load/booking/car.php");   ?>
		</div>
		<table width="100%"  border="0" cellspacing="0" cellpadding="0" id="button_show_car_detail" style="display:none">
			<tr >
				<td width="100%"  style="display:none" ><button type="button"  id="back_booking_step_2" class="btn btn-block btn-default"  style="width:100%px "><span class="font-28"><i class="    fa fa-chevron-circle-left"></i>&nbsp;ย้อนกลับ</button></td>
				<td width="100%"  >
					<div class="border-alert"  id="div_submit_booking_step_2"  style="width:100%; display:none ">
						<button id="submit_booking_step_2" type="button" class="btn  btn-primary" style="width:100% "><span class="font-28"><i class="    fa fa-chevron-circle-right"></i>&nbsp;ขั้นตอนต่อไป</button></div>
				</td>
			</tr>
		</table>
	</div>	
<!-- BTN  -->	
	<table width="100%" border="0" cellspacing="2" cellpadding="2" id="show_submit" style="display: none;"> 
		<tbody>
			<tr>
				
				<td width="50%"><button type="reset" class="btn btn-default btn-lg"   id="submit_data_set"   style=" width:100%; margin-top:10px;"> <span id="txt_btn_reset"> รีเซ็ต</span> </button>
				</td>
				<td width="50%"><button type="button" class="btn btn-success btn-lg border-alert"   id="submit_data_update"  style=" width:100%; margin-top:10px;background-color: #3b5998;"> <span id="txt_btn_save">ส่งข้อมูล</span> </button></td>
			</tr>
		</tbody>
	</table>
	<p>&nbsp;</p>
	<p>
	</p>
	</div>
</form>
<input type="hidden" value="0" id="check_t_h" />						
<input type="hidden" value="0" id="check_t_m" />						
<input type="hidden" value="0" id="check_adult" />							
<input type="hidden" value="0" id="check_child" />	
<input type="hidden" value="0" id="check_show_submit" />	
<input type="hidden" value="<?=$_GET[place];?>" id="product_id" />	
<button onclick="testUnckeck();" id="uncheckBtn" style="display: none;">test</button>
<script>
function testUnckeck(){
	
	$('.genaral').iCheck('uncheck'); 
	console.log('uncheckBtn');
}
var product_id = $('#product_id').val();
$('#submit_data_set').click(function(){
	/*$('#check_t_h').val(0);
	$('#check_t_m').val(0);
	$('#check_adult').val(0);
	$('#check_child').val(0);
	$('#check_car_click').val(0);
	
	$('#airout_h').val('');
	$('#time_h_number').text('เลือก');
	$('#time_h_number').removeClass('border-alert-no');
	$('#time_h_number').addClass('border-alert');
	
	$('#time_m_number').text('เลือก');
	$('#time_m_number').removeClass('border-alert-no');
	$('#time_m_number').addClass('border-alert');
	$('#airout_m').val('');
	
	$('#adult_number').val('');
	$('#adult_number').text('เลือก');
	$('#adult_number').removeClass('border-alert-no');
	$('#adult_number').addClass('border-alert');
	
	$('#adult').val('');
	$('#child_number').text('เลือก');
	$('#child_number').removeClass('border-alert-no');
	$('#child_number').addClass('border-alert');
	
	
	$('.iradio_square-green').removeClass('checked');
	$('input[type="radio"]').prop('checked', false);*/
	var url_load = "load_page_mod_3.php?name=booking/step&file=booking&driver=<?=$_GET[driver]?>&place=<?=$_GET[place];?>";
 
  $('#load_mod_popup_3').html(load_main_mod);
  $('#load_mod_popup_3').load(url_load); 
	
	
});





	$("#time_number").click(function(){
			$( "#load_mod_popup_4" ).toggle();
			var url_load_adult = "load_page_mod_4.php?name=booking/step/load&file=time&type=adult";
			url_load_adult = url_load_adult+"&id="+document.getElementById('time').value;
			$('#load_mod_popup_4').html(load_main_mod);
			$('#load_mod_popup_4').load(url_load_adult);
		});
		
		$("#time_h_number").click(function(){
			$( "#load_mod_popup_4" ).toggle();
			var url_load_adult = "load_page_mod_4.php?name=booking/step/load&file=time_h&type=adult";
			url_load_adult =url_load_adult+"&id=hx"+document.getElementById('time').value;
			url_load_adult =url_load_adult+"&product_id=<?=$_GET[place];?>";
			$('#load_mod_popup_4').html(load_main_mod);
			$('#load_mod_popup_4').load(url_load_adult);
		});
		
		$("#time_m_number").click(function(){
			if($('#check_t_h').val()==0){
				alert('กรุณาเลือกชั่วโมง');
				return false;
			}
			$( "#load_mod_popup_4" ).toggle();
				var url_load_adult = "load_page_mod_4.php?name=booking/step/load&file=time_m&type=adult";
				url_load_adult =url_load_adult+"&id=mx"+document.getElementById('time').value;
				url_load_adult =url_load_adult+"&product_id=<?=$_GET[place];?>";
				url_load_adult =url_load_adult+"&airout_h="+document.getElementById('airout_h').value;
				$('#load_mod_popup_4').html(load_main_mod);
				$('#load_mod_popup_4').load(url_load_adult);
		});
		
		
		
	$("#adult_number").click(function(){
			if($('#check_t_h').val()==0){
				alert('กรุณาเลือกชั่วโมง');
				return false;
			}
			if($('#check_t_m').val()==0){
				alert('กรุณาเลือกนาที');
				return false;
			}
			
			$( "#load_mod_popup_4" ).toggle();
			var url_load_adult = "load_page_mod_4.php?name=booking/step/load&file=adult&type=adult";
			url_load_adult =url_load_adult+"&id="+document.getElementById('adult').value;
			$('#load_mod_popup_4').html(load_main_mod);
			$('#load_mod_popup_4').load(url_load_adult);
		});
	$("#child_number").click(function(){
			if($('#check_t_h').val()==0){
				alert('กรุณาเลือกชั่วโมง');
				return false;
			}
			if($('#check_t_m').val()==0){
				alert('กรุณาเลือกนาที');
				return false;
			}
			if($('#check_adult').val()==0){
				alert('กรุณาเลือกจำนวนแขกผู้ใหญ่');
				return false;
			}
			$( "#load_mod_popup_4" ).toggle();
			var url_load_adult = "load_page_mod_4.php?name=booking/step/load&file=child&type=adult";
			url_load_adult =url_load_adult+"&id="+document.getElementById('child').value;
			$('#load_mod_popup_4').html(load_main_mod);
			$('#load_mod_popup_4').load(url_load_adult);
		});
		

	$("#submit_booking_step_3").click(function(){
			$("#main_edit_booking_step_3").show();
			if(document.getElementById('adult').value=="0" && document.getElementById('child').value=="0" ) {
				alert('กรุณาเลือกจำนวนผู้ใหญ่หรือเด็กอย่างน้อย 1 คน');
				document.getElementById('adult').focus() ;
				document.getElementById('child').focus() ;
				return false ;
			}
			/*
			$.post('go.php?name=booking&file=savedata&action=add&type=driver&driver=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
			$('#send_booking_data').html(response);
			});
			*/
		/*	$( "#load_mod_popup_4" ).toggle();
			var url_load_finish= "load_page_mod_4.php?name=booking/step/load&file=finish&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
			url_load_finish =url_load_finish+"&adult="+document.getElementById('adult').value;
			url_load_finish =url_load_finish+"&child="+document.getElementById('child').value;
			url_load_finish =url_load_finish+"&time="+document.getElementById('time').value;
			url_load_finish =url_load_finish+"&car="+document.getElementById('check_use_car_id').value;
			url_load_finish =url_load_finish+"&airout_h="+document.getElementById('airout_h').value;
			url_load_finish =url_load_finish+"&airout_m="+document.getElementById('airout_m').value;
			url_load_finish =url_load_finish+"&car_color="+document.getElementById('car_color').value;
			$('#load_mod_popup_4').html(load_main_mod);
			$('#load_mod_popup_4').load(url_load_finish);*/
			/*
			if(document.getElementById('guest_name').value==""  &&  document.getElementById('check_photo_passport').value=="") {
			alert('กรุณากรอกชื่อแขกหรือถ่ายภาพพาสปอร์ต');
			document.getElementById('guest_name').focus() ;
			return false ;
			}
			if(document.getElementById('nation').value=="") {
			alert('กรุณาเลือกสัญชาติ');
			document.getElementById('nation').focus() ;
			return false ;
			}
			if(document.getElementById('payment_type').value=="") {
			alert('กรุณาเลือกช่องทางการรับเงิน');
			document.getElementById('payment_type').focus() ;
			return false ;
			}
			*/
			/*
			swal({
			title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
			text: "<font style='font-size:22px'>ว่ากรอกข้อมูลถูกต้อง",
			type: "info",
			showCancelButton: true,
			confirmButtonColor: '#5BC0DE',
			confirmButtonText: 'แน่ใจ',
			cancelButtonText: "ไม่แน่ใจ",
			closeOnConfirm: true,
			closeOnCancel: true,
			html: true
			},
			function(isConfirm){
			if (isConfirm){
			$.post('go.php?name=booking&file=savedata&action=add&type=driver&driver=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
			$('#send_booking_data').html(response);
			});
			////$("#load_mod_popup" ).toggle();
			//$('.loader').show();
			var date_report = $("#date_report").val();
			//alert(date_report);
			$('#load_booking_data').html(load_main_icon_big);
			//var url_place_th = "go.php?name=load/all&file=all&server=th&day="+$("#date_report").val()+"";
			var url = "go.php?name=booking/load&file=work_all&find=day&day="+$("#date_report").val()+"";
			$('#load_booking_data').load(url);
			//  alert('dd');
			} else {
			//    swal("Cancelled", "", "error");
			}
			});
			//// $("#send_booking_data").load('load.php');
			*/
		});
</script>
<div  id="send_booking_data"></div>
<br>
<br>

<script>
function ClickPay(type){
	if(type=='1'){
		$('#price_plan_1').iCheck('check'); 
	}
	if(type=='2'){
		$('#price_plan_2').iCheck('check'); 
	}
	if(type=='3'){
		$('#price_plan_3').iCheck('check'); 
	}
}
	$("#submit_data_update").click(function(){
		
		
 if(document.getElementById('airout_h').value =="" ) {
		
alert('กรุณาเลือกชั่วโมง');
document.getElementById('airout_h').focus() ;



 return false ;	
}

 if(document.getElementById('airout_m').value =="" ) {
	 
 alert('กรุณาเลือกนาที');
document.getElementById('airout_h').focus() ;
 
 
 
 return false ;	
}
		
				
		
		
		
		if(document.getElementById('all_car').value < 1 ) {
	
alert('กรุณาเลือกรถที่ใช้งาน');
 return false ;	
}
		
		
		
			if(document.getElementById('adult').value=="0" && document.getElementById('child').value=="0" ) {
				alert('กรุณาเลือกจำนวนผู้ใหญ่หรือเด็กอย่างน้อย 1 คน');
				document.getElementById('adult').focus() ;
				document.getElementById('child').focus() ;
				return false ;
			}
			
if(document.getElementById('all_car').value < 1 ) {
	
alert('กรุณาเลือกรถที่ใช้งาน');
 return false ;	
}
			
		 
			
			var price_plan = $('.price_plan').val();
//			if(document.getElementById('plan_setting').value==0 ) {
	if(document.getElementById('plan_setting').value==0 ) {
				alert('กรุณาเลือกประเภทค่าตอบแทน');
			 document.getElementById('price_plan').focus() ;
				return false ;
			}
			
			
		$( "#load_mod_popup_4" ).toggle();
			var url_load_finish= "load_page_mod_4.php?name=booking/step/load&file=finish&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop&place=<?=$_GET[place]?>";
			url_load_finish =url_load_finish+"&adult="+document.getElementById('adult').value;
			url_load_finish =url_load_finish+"&child="+document.getElementById('child').value;
			url_load_finish =url_load_finish+"&time="+document.getElementById('time').value;
			url_load_finish =url_load_finish+"&car="+document.getElementById('check_use_car_id').value;
			url_load_finish =url_load_finish+"&airout_h="+document.getElementById('airout_h').value;
			url_load_finish =url_load_finish+"&airout_m="+document.getElementById('airout_m').value;
			url_load_finish =url_load_finish+"&car_color="+document.getElementById('car_color').value;
			url_load_finish =url_load_finish+"&plan="+document.getElementById('plan_setting').value;
			$('#load_mod_popup_4').html(load_main_mod);
			$('#load_mod_popup_4').load(url_load_finish);	
			
			/*$.post('go.php?name=booking&file=savedata&action=add&type=driver&driver=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
//					$('#send_booking_data').html(response);
					console.log(response);
						swal({
						  title: "ยืนยันข้อมูลส่งแขก ?",
						  text: "เวลาถึง : "+$('#airout_h').val()+"."+$('#airout_m').val()+" น.",
						  html:
    'You can use <b>bold text</b>, ' +
    '<a href="//github.com">links</a> ' +
    'and other HTML tags',
						  type: "warning",
						  showCancelButton: true,
						  confirmButtonClass: "btn-danger",
						  confirmButtonText: "ยืนยัน",
						  cancelButtonText: 'ยกเลิก',
						  closeOnConfirm: false
						},
						function(){
						  swal("ส่งข้อมูลสำเร็จ !", "ขอบคุณที่ส่งแขก", "success");
						  $('.button-close-popup-mod-3').click();
							$('.button-close-popup-mod-2').click();
							$('.button-close-popup-mod-1').click();
							$('.button-close-popup-mod').click();
							$('.close-small-popup').click();
							$('#btn_todaywork_bottom_menu').click();
						});
					
				});*/
		});
		
		
 
		
		
		
		
		
</script>	
        <script>
		
 

		
 
 
    $(function () {
	  
    $('#price_plan_1').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-green 1',
      increaseArea: '20%' // optional
    });
	
	
	    $('#price_plan_2').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-green 2',
      increaseArea: '20%' // optional
    });
	
	
		    $('#price_plan_3').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-green 3',
      increaseArea: '20%' // optional
    });
	
	
	
	
	
  });
   
</script>				






<script>

$('.price_plan_select').on('ifChecked', function(event){
	
	var data_id = $(this).attr("value");
	
	if($('#check_t_h').val()==0){
				alert('กรุณาเลือกชั่วโมง');
				setTimeout(function(){ $('.'+data_id).removeClass('checked');
				$('.'+data_id).attr('aria-checked','false');	
				$( "#target" ).focus();
				
				 }, 300);
			
				return false;
			}
	if($('#check_t_m').val()==0){
				alert('กรุณาเลือกนาที');
				setTimeout(function(){ $('.'+data_id).removeClass('checked');
				$('.'+data_id).attr('aria-checked','false');	 }, 300);
				
			    return false;
	}  
	if($('#check_adult').val()==0){
				alert('กรุณาเลือกจำนวนแขกผู้ใหญ่');
				setTimeout(function(){ $('.'+data_id).removeClass('checked');
				$('.'+data_id).attr('aria-checked','false');	 }, 300);
				return false;
		}
	if($('#check_child').val()==0){
					alert('กรุณาเลือกจำนวนแขกเด็ก');
					setTimeout(function(){  $('.'+data_id).removeClass('checked');
					$('.'+data_id).attr('aria-checked','false');	 }, 300);
					return false;
			}

 $('#plan_setting').val(data_id);
 $('#show_transfer_detail').show();
 $('#show_payment_detail').removeClass('border-alert');
 $('.iradio_square-green').removeClass('border-alert');
 $('#row_accept_payment').show();

$('#step_1').css('width','60%');
 
 if($('#check_show_submit').val()==1){
// 	$('#step_4').show();
	$('#step_1').css('width','80%');
 	$('#show_transfer_detail').removeClass('border-alert');
	$('#show_submit').show();
	$('#row_accept_car').show();
	
	 $('#load_mod_popup_3').animate({ 
 	 scrollTop: $(document).height()//$('#show_transfer_detail').offset().top 
 	 }, 'slow');
 	
 	 
 }else{
 	$('#show_transfer_detail').addClass('border-alert');
 	$('#check_show_submit').val(1);
 	$('#load_mod_popup_3').animate({ scrollTop: $('#show_transfer_detail').offset().top }, 'slow');
 }
									

});
	
  
 </script>            
 
<script>
startTime();
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('time_book_page').innerHTML = h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>