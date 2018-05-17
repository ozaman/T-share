<?php 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM shopping_product where id=".$_GET[id]."  ");
$arr[project] = $db->fetch($res[project]);


 $res[projecttype] = $db->select_query("SELECT ".$place_shopping." as name,id FROM shopping_product_sub where   id=".$arr[project][main]."  ");
 $arr[projecttype] = $db->fetch($res[projecttype]);
 
$day_now =  date('D');

?>

	<table width="100%" border="0" cellspacing="2" cellpadding="2" id="row_place_<?=$arr[project][id];?>" >
    <tbody>
    <tr>
      <td colspan="2"  >
       	<table width="100%" onclick="<?=$onclick;?>">
       		<tr >
       			<td width="80">
       				<? if($arr[project][pic_logo]==1){ ?>
<img src="../data/pic/place/<? echo $arr[project][id];?>_logo.jpg" width="80px"   alt="" style=" border-radius:  15px; border: 1px solid #ddd; margin-bottom:5px;" />
      <? } ?>
       			</td>
       			<td >
       				<div class="element_to_find">
       			
       				<span class="font-22" style="color:#333333"><b><? echo $arr[project][$place_shopping];?></span>
       				</div>
       				</div>
       			</td>	
       		</tr>
       	</table>
         </td>
      </tr>
     <!-- ***************** Open Time ************************* --> 
     <?php
      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[opentime] = $db->select_query("SELECT product_day,open_always,start_h,start_m,finish_h,finish_m FROM shopping_open_time   WHERE product_id=".$arr[project][id]." and status=1   order by id asc ");
$count_days = $db->rows($res[opentime]);

     ?>
    <tr >
      <td width="100" class="font-22"><?echo t_out_of_service?></td>
      <td>
      <span class="font-22">
      <?php
      if($count_days == 7){
				echo t_everyday;
			}else{
				?>
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td style="border-bottom: 1px dotted #abaab0; border-right:1px dotted #abaab0; "><?=t_day;?></td>
						<td style="border-bottom: 1px dotted #abaab0; border-right:1px dotted #abaab0;"><?=t_open_time;?></td>
						<td style="border-bottom: 1px dotted #abaab0; "><?=t_close_time;?></td>
					</tr>
				
				<?php
				$i = 1;
				while($arr[opentime] = $db->fetch($res[opentime])){
					
					if($arr[opentime][product_day] == $day_now){
						?>
						<tr>
						<td style="border-bottom: 1px dotted #ff6464; border-right:1px dotted #ff6464;  border-top:1px dotted #ff6464; border-left:1px dotted #ff6464;"><?=$ArrDayName[$arr[opentime][product_day]];?></td>
						<?php
						if($arr[opentime][open_always] == 1){
							?>
							<td colspan="2" style="border-bottom: 1px dotted #ff6464;border-right:1px dotted #ff6464; border-top:1px dotted #ff6464;" >
								<?=t_open_over;?>
							</td>
							
							<?php
						}else{
							?>
							<td style="border-bottom: 1px dotted #ff6464; border-right:1px dotted #abaab0; border-top:1px dotted #ff6464;"><?=$arr[opentime][start_h];?>:<?=$arr[opentime][start_m];?></td>
							<td style="border-bottom: 1px dotted #ff6464; border-right:1px dotted #ff6464; border-top:1px dotted #ff6464;" ><?=$arr[opentime][finish_h];?>:<?=$arr[opentime][finish_m];?></td>
							<?php
						}
						?>
						
					</tr>
						<?php
					}else{
						?>
						<tr>
						<td style="border-bottom: 1px dotted #abaab0; border-right:1px dotted #abaab0;"><?=$ArrDayName[$arr[opentime][product_day]];?></td>
						<?php
						if($arr[opentime][open_always] == 1){
							?>
							<td colspan="2" style="border-bottom: 1px dotted #abaab0;" >
								<?=t_open_over;?>
							</td>
							
							<?php
						}else{
							?>
							<td style="border-bottom: 1px dotted #abaab0; border-right:1px dotted #abaab0;"><?=$arr[opentime][start_h];?>:<?=$arr[opentime][start_m];?></td>
							<td style="border-bottom: 1px dotted #abaab0;"><?=$arr[opentime][finish_h];?>:<?=$arr[opentime][finish_m];?></td>
							<?php
						}
						?>
						
					</tr>
						<?php
					}
					?>
					
					
					<?php
					$i++;
				}
				?>
				</table>
				<?php
			}
      ?>
        <!--(<? echo $arr[project][start_time];?> - <? echo $arr[project][finish_time];?>)-->
      
      </span>
      </td>
    </tr>
    <?php
    if($count_days == 7){
    ?>
    <tr >
      <td   class="font-22"><?=t_office_hours;?></td>
      <td>
      <span class="font-22">
    	<?php
    	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
    	$res[openanytime] = $db->select_query("SELECT id FROM shopping_open_time   WHERE product_id=".$arr[project][id]." and status=1 and open_always=1  ");
    	$count_openanytime = $db->rows($res[openanytime]);
    	
    	if($count_openanytime > 0){
    		
    		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
    		$res[openanytime2] = $db->select_query("SELECT id FROM shopping_open_time   WHERE product_id=".$arr[project][id]." and status=1 and open_always=0  ");
    		$count_openanytime2 = $db->rows($res[openanytime2]);
    		if($count_openanytime2 > 0){
					$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
					$res[showtimeopen] = $db->select_query("SELECT * FROM shopping_open_time   WHERE product_id=".$arr[project][id]." and status=1  order by id asc  ");
					?>
					<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td style="border-bottom: 1px dotted #abaab0; border-right:1px dotted #abaab0; "><?=t_day;?></td>
						<td style="border-bottom: 1px dotted #abaab0; border-right:1px dotted #abaab0;"><?=t_open_time;?></td>
						<td style="border-bottom: 1px dotted #abaab0; "><?=t_close_time;?></td>
					</tr>
				
				<?php
				$i = 1;
				while($arr[opentime] = $db->fetch($res[opentime])){
					
					if($arr[opentime][product_day] == $day_now){
						?>
						<tr>
						<td style="border-bottom: 1px dotted #ff6464; border-right:1px dotted #ff6464;  border-top:1px dotted #ff6464; border-left:1px dotted #ff6464;"><?=$ArrDayName[$arr[opentime][product_day]];?></td>
						<?php
						if($arr[opentime][open_always] == 1){
							?>
							<td colspan="2" style="border-bottom: 1px dotted #ff6464;border-right:1px dotted #ff6464; border-top:1px dotted #ff6464;" >
								<?=t_open_over;?>
							</td>
							
							<?php
						}else{
							?>
							<td style="border-bottom: 1px dotted #ff6464; border-right:1px dotted #abaab0; border-top:1px dotted #ff6464;"><?=$arr[opentime][start_h];?>:<?=$arr[opentime][start_m];?></td>
							<td style="border-bottom: 1px dotted #ff6464; border-right:1px dotted #ff6464; border-top:1px dotted #ff6464;" ><?=$arr[opentime][finish_h];?>:<?=$arr[opentime][finish_m];?></td>
							<?php
						}
						?>
						
					</tr>
						<?php
					}else{
						?>
						<tr>
						<td style="border-bottom: 1px dotted #abaab0; border-right:1px dotted #abaab0;"><?=$ArrDayName[$arr[opentime][product_day]];?></td>
						<?php
						if($arr[opentime][open_always] == 1){
							?>
							<td colspan="2" style="border-bottom: 1px dotted #abaab0;" >
								<?=t_open_over;?>
							</td>
							
							<?php
						}else{
							?>
							<td style="border-bottom: 1px dotted #abaab0; border-right:1px dotted #abaab0;"><?=$arr[opentime][start_h];?>:<?=$arr[opentime][start_m];?></td>
							<td style="border-bottom: 1px dotted #abaab0;"><?=$arr[opentime][finish_h];?>:<?=$arr[opentime][finish_m];?></td>
							<?php
						}
						?>
						
					</tr>
						<?php
					}
					?>
					
					
					<?php
					$i++;
				}
				?>
				</table>
					<?php
 
				}else{
					echo t_open_over;
				}
				?>
				
				<?php
			}else{
				$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	    	$res[start_h] = $db->select_query("SELECT start_h,start_m,finish_h,finish_m FROM shopping_open_time   WHERE product_id=".$arr[project][id]." and status=1  group by start_h ");
	    	$count_start_h = $db->rows($res[start_h]);
	    	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	    	$res[start_m] = $db->select_query("SELECT id FROM shopping_open_time   WHERE product_id=".$arr[project][id]." and status=1  group by start_m ");
	    	$count_start_m = $db->rows($res[start_m]);
	    	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	    	$res[finish_h] = $db->select_query("SELECT id FROM shopping_open_time   WHERE product_id=".$arr[project][id]." and status=1  group by finish_h ");
	    	$count_finish_h = $db->rows($res[finish_h]);
	    	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	    	$res[finish_m] = $db->select_query("SELECT id FROM shopping_open_time   WHERE product_id=".$arr[project][id]." and status=1  group by finish_m ");
	    	$count_finish_m = $db->rows($res[finish_m]);
	    	$total_times = $count_start_h + $count_start_m + $count_finish_h + $count_finish_m;
				if($total_times == 4){
	    		$arr[start_h] = $db->fetch($res[start_h]);
					?>
					<? echo $arr[start_h][start_h];?>:<? echo $arr[start_h][start_m];?> - <? echo $arr[start_h][finish_h];?>:<? echo $arr[start_h][finish_m];?>
					<?php
				}else{
					?>
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td style="border-bottom: 1px dotted #abaab0; border-right:1px dotted #abaab0; "><?=t_day;?></td>
						<td style="border-bottom: 1px dotted #abaab0; border-right:1px dotted #abaab0;"><?=t_open_time;?></td>
						<td style="border-bottom: 1px dotted #abaab0; "><?=t_close_time;?></td>
					</tr>
				
				<?php
				$i = 1;
				while($arr[opentime] = $db->fetch($res[opentime])){
					
					if($arr[opentime][product_day] == $day_now){
						?>
						<tr>
						<td style="border-bottom: 1px dotted #ff6464; border-right:1px dotted #ff6464;  border-top:1px dotted #ff6464; border-left:1px dotted #ff6464;"><?=$ArrDayName[$arr[opentime][product_day]];?></td>
						<?php
						if($arr[opentime][open_always] == 1){
							?>
							<td colspan="2" style="border-bottom: 1px dotted #ff6464;border-right:1px dotted #ff6464; border-top:1px dotted #ff6464;" >
								<?=t_open_over;?>
							</td>
							
							<?php
						}else{
							?>
							<td style="border-bottom: 1px dotted #ff6464; border-right:1px dotted #abaab0; border-top:1px dotted #ff6464;"><?=$arr[opentime][start_h];?>:<?=$arr[opentime][start_m];?></td>
							<td style="border-bottom: 1px dotted #ff6464; border-right:1px dotted #ff6464; border-top:1px dotted #ff6464;" ><?=$arr[opentime][finish_h];?>:<?=$arr[opentime][finish_m];?></td>
							<?php
						}
						?>
						
					</tr>
						<?php
					}else{
						?>
						<tr>
						<td style="border-bottom: 1px dotted #abaab0; border-right:1px dotted #abaab0;"><?=$ArrDayName[$arr[opentime][product_day]];?></td>
						<?php
						if($arr[opentime][open_always] == 1){
							?>
							<td colspan="2" style="border-bottom: 1px dotted #abaab0;" >
							<?=t_open_over;?>
							</td>
							
							<?php
						}else{
							?>
							<td style="border-bottom: 1px dotted #abaab0; border-right:1px dotted #abaab0;"><?=$arr[opentime][start_h];?>:<?=$arr[opentime][start_m];?></td>
							<td style="border-bottom: 1px dotted #abaab0;"><?=$arr[opentime][finish_h];?>:<?=$arr[opentime][finish_m];?></td>
							<?php
						}
						?>
						
					</tr>
						<?php
					}
					?>
					
					
					<?php
					$i++;
				}
				?>
				</table>
				<?php
				}
			}
	    	
    	?>      
      </span>
      </td>
      </tr>
    <?php } ?>
    <tr >
<td class="font-22"><?=t_work_remuneration;?></td>
      <td id="shop_alert_menu_price_<?=$arr[project][id]?>" >
      <table>
      	<tr>
      		<td width="125"><span class="font-22"><?=t_look_work_remuneration;?></span></td>
      		<td width="20" align="right"> <span > <i class="fa fa-search" style="font-size:18px; color:<?=$main_color?>; width:20px;"></i>  </b></span></td>
      	</tr>
      </table>
     </td>
    </tr>
    <tr id="contact_<?=$arr[project][id]?>" >
<td class="font-22"><?=t_contact;?></td>
      <td>
 
 
 
 
 <script> 
      
 $('#shop_alert_menu_map_<?=$arr[project][id]?>').click(function(){  

 $( "#main_load_mod_popup_4" ).toggle();
	
 
  var url_load_<?=$arr[project][id]?>= "load_page_mod_4.php?name=booking/popup&file=map&shop_id=<?=$arr[project][id]?>&lat=<?=$arr[project][lat]?>&lng=<?=$arr[shop][project]?>&type=stop";
  
    var lat = $('#lat').val();
    var lng = $('#lng').val();
    console.log(lat+" "+lng);
  url_load_<?=$arr[project][id]?>=url_load_<?=$arr[project][id]?>+"&lat="+lat;
 url_load_<?=$arr[project][id]?>=url_load_<?=$arr[project][id]?>+"&lng="+lng;
  
  
  $('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_<?=$arr[project][id]?>); 
	  

 	});
      
      </script>
      
      
 <?
  
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	  
	 $market = $db->num_rows('shopping_contact',"id","product_id=".$arr[project][id]." and type='phone'  and usertype=9 and admintype=1");	  
	  
	  
	 
	  
                         
  $res[sale] = $db->select_query("SELECT phone,name FROM  shopping_contact where product_id=".$arr[project][id]." and type='phone'  and usertype=9 and admintype=1   ORDER BY id  ");
                      
 	while($arr[sale] = $db->fetch($res[sale])){  
	
 
 ?>
                  
  <a href="tel:<?=$arr[sale][phone]?>"  id="booking_edit_<?=$arr[project][id]?>"  style="color:#333333"  >                
    <table id="shop_alert_menu_call_<?=$arr[project][id]?>" >
      	<tr >
      		<td width="125"><span class="font-22"> <?=t_marketing;?> (<?=$arr[sale][name]?>)</span></td>
      		<td width="20" align="right"> <span > <i class="fa fa-search" style="font-size:18px; color:<?=$main_color?>; width:20px;"></i>  </b></span></td>
      	</tr>
      </table>  

</a>


<? } ?>
      
 <? if($market==0){ ?>


<script>

 $('#contact_<?=$arr[project][id]?>').hide();

</script>

	 
<? }?>
      
      
      </td>
    </tr>
    <tr <?=$display_none;?>>
      <td class="font-22"><?=t_download;?></td>
      <td id="shop_alert_menu_index_load_<?=$arr[project][id]?>" onclick="openPopUpBrochure('<?=$arr[project][id]?>','<?=$arr[project][pic_book]?>','<?=$arr[project][pic_book_2]?>','<?=$arr[project][pic_book_3]?>')">
	  <table>
      	<tr>
      		<td width="125"><span class="font-22"><?=t_bouchure;?></span></td>
      		<td width="20" align="right"> <span > <i class="fa fa-search" style="font-size:18px; color:<?=$main_color?>; width:20px;"></i>  </b></span></td>
      	</tr>
      </table>         
     </td>
    </tr>
    <tr >
      <td class="font-22"><?=t_status;?></td>
      <td id="status_open_<? echo $arr[project][id];?>" class="font-22"><strong><?=t_open_now;?></strong></td>
    </tr>
    <tr   id="tr_time_open_<? echo $arr[project][id];?>" >
      <td class="font-22"><?=t_remaining_time;?></td>
      <td>
		<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tbody>
    <tr>
      <td width="110" class="font-26" id="time_open_<? echo $arr[project][id];?>" style="color:#FF000">&nbsp;</td>
      
    </tr>
  </tbody>
</table>
		</td>
    </tr>
    <tr>
      <td colspan="2" class="tab_alert "  style="font-size:26px">
      
      	<script>
		
 
	 var url_check_data_time_<? echo $arr[project][id];?> = "go.php?name=shop/load&file=time_open&id=<? echo $arr[project][id];?>";
 
 $('#time_open_<? echo $arr[project][id];?>').load(url_check_data_time_<? echo $arr[project][id];?>);
 
 	
 setInterval(function() {
	 
 var url_check_data_time_<? echo $arr[project][id];?> = "go.php?name=shop/load&file=time_open&id=<? echo $arr[project][id];?>";
 
 $('#time_open_<? echo $arr[project][id];?>').load(url_check_data_time_<? echo $arr[project][id];?>);

  
}, 60000); // 60000 milliseconds = one minute
 
	</script>
      

      <div id="btn_open_<? echo $arr[project][id];?>" onclick="SelectPlace('<?=$arr[project][id];?>');">
      
      <button id="menu_add_new_booking_text_<? echo $arr[project][id];?>" type="button tab_alert" class="btn  btn-info "  style="width:100%;text-align:center;padding:5px; background-color:<?=$main_color?>;  border-radius: 20px; "   ><span class="font-20"><i class="fa  fa-shopping-cart" style="width:20px;"   ></i><b>&nbsp; <?=t_send_to_shopping;?></b></span></button>
      
      </div>

       <div id="btn_close_<? echo $arr[project][id];?>" style=" display:none">
<?php

 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
  $res[shop] = $db->select_query("SELECT * FROM  shopping_open_time where product_id=".$arr[project][id]." and product_day = '$day_now'     ");
 $arr[shop] = $db->fetch($res[shop]) ;
if($arr[shop][open_always] == 1){
$finish_h =  "23";
$finish_m =  "59";
$time_of_open = "00.00 - 23.59";
}else{
$finish_h =  $arr[shop][finish_h];
$finish_m =  $arr[shop][finish_m];
$time_of_open = "".$arr[shop][start_h].".".$arr[shop][start_m]." - ".$arr[shop][finish_h].".".$arr[shop][finish_m]."";
}
?>      
            <button id="menu_close_new_booking_text_<? echo $arr[project][id];?>" type="button" class="btn  btn-info "  style="width:100%;text-align:center;padding:5px; background-color:#666666; border:none; display:nones "><span class="font-20"> <b> <?=t_open_now;?></b></span><br>
<?=t_time;?>  <? echo $time_of_open; ?></button>
        </div>

      </td>
      </tr>

  </tbody>
</table>

<script>
  $('#shop_alert_menu_price_<?=$arr[project][id]?>').click(function(){  
	
 $( "#main_load_mod_popup_4" ).toggle();
 
  var url_load_<?=$arr[project][id]?>= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=<?=$arr[project][id]?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_<?=$arr[project][id]?>); 
  
 

 	});
 	
</script>
 <div id="broModal/" class="modal" style="font-size: 0px!important; color: #000000 !important;">
  <span class="close" style="position: fixed;
    color: #f4f4f4;
    right: 15px;
    font-size: 40px; display: none;
   " id="closeModal" >&times;</span>
   <i class="fa fa-times" aria-hidden="true" style="position: fixed;
    color: #f4f4f4;
    right: 15px;
    font-size: 40px;
    z-index: 9000;
   " id="close_modal" onclick="closeModal();"></i>
  <div class="modal-content" id="img02"> </div>

</div>
 <script>
// Get the modal
var modal = document.getElementById('broModal/');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('shop_alert_menu_index_load_<?=$arr[project][id]?>');
//var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
function openPopUpBrochure(id,pic1,pic2,pic3){
    modal.style.display = "block";
//    modalImg.src = this.src;
////	$('#img01').html('<div align="center" style="padding:40px;margin-left:10px;"><img src="images/loader.gif" /></div>');
	$('#img02').load('load/popup/pic_place.php?id='+id+'&pic1='+pic1+'&pic2='+pic2+'&pic3='+pic3); 
	$('.back-full-popup').hide();
	$('.bottom_popup').hide();
//    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
function closeModal(){
//	alert(123);
	 $('#broModal').hide();
	 $('#closeModal').click();
	 $('.back-full-popup').show();
	 $('.bottom_popup').show();
}

</script>