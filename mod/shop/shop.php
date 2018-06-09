<?
   //echo $_GET[type];
    $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   /* $query_topic = "topic_th"; 
   	if($_COOKIE['lng']=="th"){
   		$query_topic = "topic_th"; 
   	}else if($_COOKIE['lng']=="en"){
   		$query_topic = "topic_en"; 
   	}else if($_COOKIE['lng']=="cn"){
   		$query_topic = "topic_cn"; 
   	}*/
   $res[projecttype] = $db->select_query("SELECT ".$place_shopping." as name,id FROM shopping_product_sub where   id=".$_GET[type]."  ");
   $arr[projecttype] = $db->fetch($res[projecttype]);
   $ArrDayName[Sun] = t_sunday;
   $ArrDayName[Mon] = t_monday;
   $ArrDayName[Tue] = t_tuesday;
   $ArrDayName[Wed] = t_wednesday;
   $ArrDayName[Thu] = t_thursday;
   $ArrDayName[Fri] = t_friday;
   $ArrDayName[Sat] = t_saturday;
    $day_now =  date('D');
    ?>
<style>
   .search-box-shop{
   width: 100%;
   padding: 15px;
   font-size: 19px;
   border: 1px solid #ddd;
   box-shadow: 1px 1px 2px #ddd;
   border-radius: 10px;
   }
   ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
   color:    #c9c9c9;
   }
</style>
<script>
   console.log('<? echo $place_shopping;?>');
   $(".text-topic-action-mod-2" ).html("<? echo $arr[projecttype][name];?>");
</script> 
<div style="padding:5px; margin-top:45px;">
   <table width="100%">
      <tr>
         <td>
            <input class="search-box-shop font-22" id="search_shop" value="" onkeyup="searchPlace();" placeholder="<?=t_search_by_name;?>"  style=" border-radius: 20px; width:100%"/>
         </td>
      </tr>
   </table>
   <script>
      function searchPlace(){
      	var char_search = $('#search_shop').val().toUpperCase();
      	console.log(char_search);
      	$('.element_to_find').find('input').each (function() {
      		var txt = $(this).val();
      		var id = this.id;
      	  	if (txt.toUpperCase().indexOf(char_search) > -1) {
      	  		$('#row_place_'+id).show();
      	      } else {
      	        $('#row_place_'+id).hide();
      	      }	
      	}); 
      }
   </script>
   <?
      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
      $res[project] = $db->select_query("SELECT id,status,pic_logo,pic_book,pic_book_2,pic_book_3,".$place_shopping." as name FROM shopping_product   WHERE sub=".$_GET[type]." and status=1 and province = '".$_GET[province]."'  ");
      while($arr[project] = $db->fetch($res[project])){
      ?>
   <div style="padding-bottom:10px; padding-top:10px;   <? if( $arr[project][status]==0){?>
      opacity:0.4;   pointer-events: none;   
      <? } ?>
      ">
      <? if( $province==1){ 
         $provincename='ภูเก็ต';
         }  
         if($_GET[detail]!=""){
         //	 	 $display_none = '';
         $display_none2 = '';
         $display_none_showdetail = 'style="display: none;"';
         $onclick = "";
         }
		 else{
         //	 	 $display_none = 'style="display: none;"';
         $display_none2 = 'style="display: none;"';
         $display_none_showdetail = '';
         $onclick = "showTr('".$arr[project][id]."');";
         }
         $class_tr = 'class="to_show_'.$arr[project][id].'" '; 
         ?>  
      <table width="100%" border="0" cellspacing="4" cellpadding="4" style="border-bottom : 2px solid #DADADA;" id="row_place_<?=$arr[project][id];?>" >
         <tbody>
            <tr>
               <td colspan="2"  >
                  <table width="100%" onclick="<?=$onclick;?>">
                     <tr >
                        <td width="110">
                           <? if($arr[project][pic_logo]==1){ ?>
                           <img src="../data/pic/place/<? echo $arr[project][id];?>_logo.jpg" width="100px"   alt="" style=" border-radius:  15px; border: 1px solid #ddd; margin-bottom:5px;" />
                           <? } ?>
                        </td>
                        <td >
                           <div class="element_to_find">
                              <span class="font-22" style="color:<?=$main_color?>" ><? echo $arr[projecttype][name];?> </span><br>  
                              <span class="font-22" style="color:#333333">
                                 <b>
                                    <? echo $arr[project][name];?>
                              </span>
                              <br>	
                              <input type="hidden" value="<?=$arr[project][topic_th]." ".$arr[project][topic_en];?>" id="<?=$arr[project][id];?>"  />
                           </div>
                           <a class="font-20" <?=$display_none_showdetail;?> >
                           <strong id="txt_sh_<?=$arr[project][id];?>">แสดงรายละเอียด</strong>
                           <span id="icon_sh_<?=$arr[project][id];?>"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                           </a> 
                           <input type="hidden" id="check_click_<?=$arr[project][id];?>" value="0"/>
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
         <tbody class="test_hidden_<?=$arr[project][id];?>" <?=$display_none2;?>>
         <tr <?=$display_none;?> <?=$class_tr;?> >
         <td width="100" class="font-22"><strong><?=t_open;?></strong></td>
         <td>
         <span class="font-22">
         <?php
            if($count_days == 7){
          echo t_everyday;
            }
			else{
            	?>
         <table width="100%" cellpadding="0" cellspacing="0">
         <tr>
          <td style="border-bottom: 1px dotted #abaab0; border-right:1px dotted #abaab0; "><?=t_day;?></td>
         <td style="border-bottom: 1px dotted #abaab0; border-right:1px dotted #abaab0;"><?=t_office_hours;?></td>
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
         <tr <?=$display_none;?> <?=$class_tr;?>>
         <td   class="font-22"><strong><?=t_office_hours;?></strong></td>
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
         <td style="border-bottom: 1px dotted #abaab0; border-right:1px dotted #abaab0;"><?=t_office_hours;?></td>
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
            
            $i++;
            }
            ?>
         </table>
         <?php
            }else{
            	
          t_open_over;
       
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
            }
            else{
            	?>
         <table width="100%" cellpadding="0" cellspacing="0">
         <tr>
         <td style="border-bottom: 1px dotted #abaab0; border-right:1px dotted #abaab0; "><?=t_day;?></td>
         <td style="border-bottom: 1px dotted #abaab0; border-right:1px dotted #abaab0;"><?=t_office_hours;?></td>
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
         <tr <?=$display_none;?> <?=$class_tr;?>>
         <td class="font-22"><strong><?=t_work_remuneration;?></strong></td>
         <td id="shop_alert_menu_price_<?=$arr[project][id]?>" >
         <table>
         <tr>
         <td width="150"><span class="font-22"><?=t_look_work_remuneration;?></span></td>
         <td width="20" align="right"> <span > <i class="fa fa-search" style="font-size:18px; color:<?=$main_color?>; width:20px;"></i>  </b></span></td>
         </tr>
         </table>
         </td>
         </tr>
         <tr <?=$display_none;?> <?=$class_tr;?>>
         <td class="font-22"><strong><?=t_location;?></strong></td>
         <td id="shop_alert_menu_map_<?=$arr[project][id]?>" >
         <table>
         <tr>
         <td width="150"><span class="font-22"><?=t_maps;?></span></td>
         <td width="20" align="right"> <span > <i class="fa fa-search" style="font-size:18px; color:<?=$main_color?>; width:20px;"></i>  </b></span></td>
         </tr>
         </table>
         </td>
         </tr>
         
         <tr <?=$display_none;?> <?=$class_tr;?>>
         <td class="font-22"><strong><?=t_download;?></strong></td>
         <td id="shop_alert_menu_index_load_<?=$arr[project][id]?>" onclick="openPopUpBrochure('<?=$arr[project][id]?>','<?=$arr[project][pic_book]?>','<?=$arr[project][pic_book_2]?>','<?=$arr[project][pic_book_3]?>')">
         <table>
         <tr>
         <td width="150"><span class="font-22"><?=t_bouchure;?></span></td>
         <td width="20" align="right"> <span > <i class="fa fa-search" style="font-size:18px; color:<?=$main_color?>; width:20px;"></i>  </b></span></td>
         </tr>
         </table>         
         </td>
         </tr>
		 <tr id="contact_<?=$arr[project][id]?>" <?=$display_none;?> <?=$class_tr;?>>
         <td class="font-22"><strong><?=t_contact;?></strong></td>
         <td>
         <script> 
            $('#shop_alert_menu_map_<?=$arr[project][id]?>').click(function(){  
            $( "#main_load_mod_popup_map" ).toggle();
            $( ".bottom_popup" ).hide();
             var url_load_<?=$arr[project][id]?>= "load_page_map.php?name=booking/popup&file=map&shop_id=<?=$arr[project][id]?>&lat=<?=$arr[project][lat]?>&lng=<?=$arr[shop][project]?>&type=stop";
               var lat = $('#lat').val();
               var lng = $('#lng').val();
               console.log(lat+" "+lng);
             url_load_<?=$arr[project][id]?>=url_load_<?=$arr[project][id]?>+"&lat="+lat;
            url_load_<?=$arr[project][id]?>=url_load_<?=$arr[project][id]?>+"&lng="+lng;
             $('#load_mod_popup_map').html(load_main_mod);
             $('#load_mod_popup_map').load(url_load_<?=$arr[project][id]?>); 
            //  $('.bottom_popup').hide();	  
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
         <td width="150"><span class="font-22"> <?=t_marketing;?> (<?=$arr[sale][name]?>)</span></td>
         <td width="20" align="right"> <span > <i class="fa fa-phone" style="font-size:18px; color:<?=$main_color?>; width:20px;"></i>  </b></span></td>
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
         <tr <?=$display_none;?> <?=$class_tr;?>>
         <td class="font-22"><strong><?=t_status;?></strong></td>
         <td id="status_open_<? echo $arr[project][id];?>" class="font-26"><?=t_open_now;?></td>
         </tr>
         <tr   id="tr_time_open_<? echo $arr[project][id];?>" <?=$display_none;?> <?=$class_tr;?>>
         <td class="font-22"><strong><?=t_remaining_time;?></strong></td>
         <td>
         <table width="100%" border="0" cellspacing="0" cellpadding="1">
         <tbody>
         <tr>
         <td width="110" class="font-26" id="time_open_s<? echo $arr[project][id];?>" style="color:#FF000">&nbsp;</td>
         </tr>
         </tbody>
         </table>
         </td>
         </tr>
         <tr <?=$display_none;?> <?=$class_tr;?>>
         <td colspan="2" class="tab_alert "  style="font-size:26px">
         <script>
            var url_check_data_time_<? echo $arr[project][id];?> = "go.php?name=shop/load&file=time_open&id=<? echo $arr[project][id];?>";
            $('#time_open_<? echo $arr[project][id];?>').load(url_check_data_time_<? echo $arr[project][id];?>);
            setInterval(function() {
            var url_check_data_time_<? echo $arr[project][id];?> = "go.php?name=shop/load&file=time_open&id=<? echo $arr[project][id];?>";
            $('#time_open_<? echo $arr[project][id];?>').load(url_check_data_time_<? echo $arr[project][id];?>);
            }, 60000); // 60000 milliseconds = one minute
         </script>
         <div id="btn_open_<? echo $arr[project][id];?>">
         <button id="menu_add_new_booking_text_<? echo $arr[project][id];?>" type="button tab_alert" class="btn  btn-info "  style="width:100%;text-align:center;padding:5px; background-color:<?=$main_color?>;  border-radius: 20px; " ><span class="font-30"><i class="fa  fa-shopping-cart" style="width:20px;"  ></i><b>&nbsp; <?=t_send_to_shopping;?></b></span></button>
         </div>
         <div id="btn_close_<? echo $arr[project][id];?>" style=" display:none">
         <?php
            $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
             $res[shop] = $db->select_query("SELECT finish_h,finish_m,start_h,start_m,open_always FROM  shopping_open_time where product_id=".$arr[project][id]." and product_day = '$day_now'     ");
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
            $time1 = $arr[shop][start_h].':'.$arr[shop][start_m].':00';
            $time2 = $finish_h.':'.$finish_m.':00';
            ?>      
         <button id="menu_close_new_booking_text_<? echo $arr[project][id];?>" type="button" class="btn  btn-info "  style="width:100%;text-align:center;padding:5px; background-color:#666666; border:none; display:nones;"><span class="font-30"><b><?=t_open_now;?></b></span><br/>
         เวลา  <? echo $time_of_open; ?></button>
         </div>
         </td>
         </tr>
         <tr <?=$display_none;?> <?=$class_tr;?>>
         <td><br></td>
         </tr>
         </tbody>
         </tbody>
      </table>
   </div>
   <div id="broModal" class="modal" style="font-size: 0px!important; color: #000000 !important;">
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
         margin-top : 10px;
         " id="close_modal" onclick="closeModal();"></i>
         <style>
         	.swiper-container {
      width: 100%;
      height: 100%;
    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
         </style>
      <div class="modal-content" id="img01"> 
      <!--<img src="https://www.welovetaxi.com/app/data/pic/place/1_book.jpg" width="100%" />-->
      </div>
   </div>
   <script>
      var modal = document.getElementById('broModal');
      var img = document.getElementById('shop_alert_menu_index_load_<?=$arr[project][id]?>');
      var captionText = document.getElementById("caption");
      function openPopUpBrochure(id,pic1,pic2,pic3){
          modal.style.display = "block";
//      	$('#img01').load('load/popup/pic_place.php?id='+id+'&pic1='+pic1+'&pic2='+pic2+'&pic3='+pic3);  
      	$('#img01').load('load/popup/pic_place_swiper.php?id='+id+'&pic1='+pic1+'&pic2='+pic2+'&pic3='+pic3);  

      	$('.back-full-popup').hide();
      	$('.bottom_popup').hide();
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
   <script>
      ///
      $('#shop_alert_menu_price_<?=$arr[project][id]?>').click(function(){  
      $( "#main_load_mod_popup_4" ).toggle();
      var url_load_<?=$arr[project][id]?>= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=<?=$arr[project][id]?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
      $('#load_mod_popup_4').html(load_main_mod);
      $('#load_mod_popup_4').load(url_load_<?=$arr[project][id]?>); 
      });
      $('#menu_add_new_booking_<? echo $arr[project][id];?>').click(function(){  
      $( "#alert_show_shopping_place" ).hide();
      $( "#load_mod_popup" ).toggle();
      var url_load = "load_page_mod.php?name=booking&file=new_easy&driver=<?=$user_id?>&place=<? echo $arr[project][id];?>";
      $('#load_mod_popup').html(load_main_mod);
      $('#load_mod_popup').load(url_load); 
      });
      $('#menu_add_new_booking_text_<? echo $arr[project][id];?>').click(function(){  
      $( "#alert_show_shopping_place" ).hide();
      $( "#main_load_mod_popup_3" ).toggle();
      var url_load = "load_page_mod_3.php?name=booking/step&file=booking&driver=<?=$user_id?>&place=<? echo $arr[project][id];?>";
      $('#load_mod_popup_3').html(load_main_mod);
      ///  $( "#main_index_load_page" ).toggle();
      $('#load_mod_popup_3').load(url_load); 
      });
   </script>
   <? } ?>
   <script>
      function showTr(id){
      	var check = $('#check_click_'+id).val();
      	if(check==0){
      		/*var url_check_data_time = "go.php?name=shop/load&file=time_open&id="+id;
      			$('#time_open_'+id).load(url_check_data_time);*/
      		$('#check_click_'+id).val(1);
      		$('.test_hidden_'+id).show(500);
      //			$('.to_show_'+id).show(500);
      //			$('#tr_time_open_'+id).show(500);
      		$('#txt_sh_'+id).text('ซ่อนรายละเอียด');
      		$('#icon_sh_'+id).html('<i class="fa fa-chevron-up" aria-hidden="true"></i>');
      	}else{
      		$('#check_click_'+id).val(0);
      		$('.test_hidden_'+id).hide(500);
      //			$('.to_show_'+id).hide(500);
      //			$('#tr_time_open_'+id).hide(500);
      		$('#txt_sh_'+id).text('แสดงรายละเอียด');
      		$('#icon_sh_'+id).html('<i class="fa fa-chevron-down" aria-hidden="true"></i>');
      	}
      }
      function checkBetweenTwoTime(startTime,endTime,dt){
      	var s =  startTime.split(':');
      	var dt1 = new Date(dt.getFullYear(), dt.getMonth(), dt.getDate(), parseInt(s[0]), parseInt(s[1]), parseInt(s[2]));
      	var e =  endTime.split(':');
      	var dt2 = new Date(dt.getFullYear(), dt.getMonth(), dt.getDate(),parseInt(e[0]), parseInt(e[1]), parseInt(e[2]));
      //		console.log(startTime+' : '+endTime);
      	return (dt >= dt1 && dt <= dt2);
      }
   </script>
</div>
<script>
   $(".button-close-popup-mod-0").click(function(){   
    $( "#alert_show_shopping_place" ).hide();
   });
</script>  <?// include ("load/popup/pic_place.php");?>