<br/>
<div class="stepbar" style="margin-top: 48px;position: fixed;top: 0px;transition: 0.2s; " id="stepbar_book2">
   <div class="progress" style="border-radius:0px;height : 8px !important;background-color:#cccccc;box-shadow: 1px 1px 5px #ddd;">
      <div class="progress-bar progress-bar-success progress-bar-striped active" id="step_1" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;">
         <span class="sr-only">100% Complete</span>
      </div>
   </div>
</div>
<script>
   $('#stepbar_book2').appendTo('#main_load_mod_popup_4 #step_tab_booking2');
</script>
<script>
   //  $('.stepbar').clone().appendTo('#load_mod_popup_4 .back-full-popup');
   //  $('#load_mod_popup_4 .back-full-popup .progress-bar').css('width','100%');
    $(".text-topic-action-mod-4" ).html("<?=t_check_detail;?> ");
</script> 
<?
   /* $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $res[to] = $db->select_query("SELECT * FROM   use_time  where id='".$_GET[time]."'   ");
   $arr[to] = $db->fetch($res[to]);*/
   $res[projectcar] = $db->select_query("SELECT * FROM   web_carall  where id='".$_GET[car]."'   ");
   $arr[projectcar] = $db->fetch($res[projectcar]);
   	/*$res[car_type] = $db->select_query("SELECT * FROM ".TB_carall_type." WHERE id='".$arr[projectcar][car_type]."' ");
   $arr[car_type] = $db->fetch($res[car_type]);*/
   $res[plan] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$_GET[plan]."");
   $arr[plan] = $db->fetch($res[plan]);
    $arr[price] = $db->fetch($res[price]) ;
   $display_none = 'style="display:nones;" ';
    ?>
<script>
   $("#edit_booking_step_1").click(function(){ 
   /*$( "#time_number" ).addClass('border-alert');
   $( "#load_mod_popup_4" ).toggle();
   $("#back_booking_step_2").click();*/
   $("#popup_edit").fadeIn(500);
   $('#load_mod_popup_4').css('overflow','hidden');
   $('#text_edit_popup').text('เวลาถึงโดยประมาณ');
   $('#edit_time').show();
   /*var product_id = $('#product_id').val();
    var url_load= "empty_style.php?name=booking/step/popup&file=edit_finish&place="+product_id;
   $('#body_load_edit').load(url_load+'');*/
   });
</script>
<script>
   $("#edit_booking_step_2").click(function(){ 
   /* $( "#load_mod_popup_4" ).toggle();
   $("#back_booking_step_3").click();*/
   console.log('step2');
   $("#popup_edit").fadeIn(500);
   $('#load_mod_popup_4').css('overflow','hidden');
   $('#text_edit_popup').text('จำนวนแขก');
   $('#edit_guest').show();
   });
</script>
<script>
   $("#edit_booking_step_3").click(function(){ 
   /* $( "#adult_number" ).addClass('border-alert');
   $( "#child_number" ).addClass('border-alert');
   $("#submit_booking_step_2").click();
   $( "#load_mod_popup_4" ).toggle();*/
   console.log('step3');
   $("#popup_edit").fadeIn(500);
   $('#load_mod_popup_4').css('overflow','hidden');
   $('#text_edit_popup').text('ค่าตอบแทน');
   $('#edit_payment_detail').show();
   });
   $("#edit_booking_step_4").click(function(){ 
   console.log('step4');
   $("#popup_edit").fadeIn(500);
   $('#load_mod_popup_4').css('overflow','hidden');
   $('#text_edit_popup').text('ข้อมูลรถ');
   $('#edit_transfer_detail').show();
   });

</script> 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tbody>
      <tr>
         <td>
            <div class="div-step-content" style="margin-top: 10px;">
               <table width="100%" border="0" cellpadding="2" cellspacing="5">
                  <tbody>
                     <tr>
                        <td colspan="2"  class="font-26 ">
                           <table width="100%" border="0" cellspacing="0" cellpadding="2">
                              <tbody>
                                 <tr>
                                    <td width="30">
                                       <div class="step-booking-small"  id="number_step_4"  style="margin-top:-2px;">1</div>
                                    </td>
                                    <td height="40" valign="middle" class="font-26"><font color="<?=$text_topic_color?>" ><b><?=t_time_to_place;?></b></font></td>
                                    <td width="30" valign="top" class="font-26" <?=$display_none;?> >
                                       <!--<span class="font-22" id="edit_booking_step_1" style="color:#FF0000"><i class="    fa fa-edit"></i>&nbsp;แก้ไข</span>-->
                                       <span id="edit_booking_step_1" style="font-size:30px;color: <?=$text_topic_color;?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></span>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     <tr>
                        <td width="90"  class="font-24 "><b id="txt_time_edit"><?=t_arrival_time;?>&nbsp;<?=$_GET[airout_h].".".str_pad($_GET[airout_m], 2, '0', STR_PAD_LEFT).	t_n;?></b> </td>
                        <!--<? if($arr[to][time_h]>0){ ?>
                           <?=$arr[to][time_h]?>
                           ชั่วโมง
                           <? } ?>
                           <? if($arr[to][time_m]>0){ ?>
                           <?=$arr[to][time_m]?>
                           นาที
                           <? } ?>--> 	
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
      </tr>
      <tr>
         <td>
            <div class="div-step-content">
               <table width="100%" border="0" cellpadding="2" cellspacing="5">
                  <tbody>
                     <tr>
                        <td width="120"  class="font-26 ">
                           <table width="100%" border="0" cellspacing="0" cellpadding="2"  style="border-top : 0px dotted   #999999;     ">
                              <tbody>
                                 <tr>
                                    <td width="30">
                                       <div class="step-booking-small"  id="number_step_2" style="margin-top:-2px;">2</div>
                                    </td>
                                    <td height="40" valign="middle" class="font-26"><span><font color="<?=$text_topic_color?>" ><b><?=t_number_customers;?></b></font></span></td>
                                    <td width="30" valign="top" class="font-26" <?=$display_none;?>>
                                       <!--<span class="font-22" id="edit_booking_step_2"  style="color:#FF0000"><i class="    fa fa-edit"></i>&nbsp;แก้ไข-->
                                       <span id="edit_booking_step_2" style="font-size:30px;color: <?=$text_topic_color;?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></span>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     <tr>
                        <td class="font-24 "><strong id="text_edit_guest"><?=t_adult;?>&nbsp;<?=$_GET[adult]?>&nbsp;<strong><?=t_child;?></strong>&nbsp;<?=$_GET[child]?>&nbsp;</strong></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
      </tr>
      <tr>
         <td>
            <div class="div-step-content">
               <table width="100%" border="0" cellpadding="2" cellspacing="5">
                  <tbody>
                     <tr>
                        <td width="120"  class="font-26 ">
                           <table width="100%" border="0" cellspacing="0" cellpadding="2"  style="border-top : 0px dotted   #999999;     ">
                              <tbody>
                                 <tr>
                                    <td width="30">
                                       <div class="step-booking-small"  id="number_step_3" style="margin-top:-2px;">3</div>
                                    </td>
                                    <td height="40" valign="middle" class="font-26"><span><font color="<?=$text_topic_color?>" ><b><?=t_work_remuneration;?></b></font></span></td>
                                    <td width="30" valign="top" class="font-26" <?=$display_none;?>>
                                       <!--<span class="font-22" id="edit_booking_step_3" style="color:#FF0000"><i class="    fa fa-edit"></i>&nbsp;แก้ไข-->
                                       <span id="edit_booking_step_3" style="font-size:30px;color: <?=$text_topic_color;?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></span>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     <tr>
                        <td class="font-24 "><strong id="text_plan_edit"><?=$arr[plan][$place_shopping];?></strong>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
      </tr>
      <tr>
         <td>
            <div class="div-step-content">
               <table width="100%" border="0" cellpadding="2" cellspacing="5">
                  <tbody>
                     <tr>
                        <td width="120"  class="font-26 ">
                           <table width="100%" border="0" cellspacing="0" cellpadding="2"  style="border-top : 0px dotted   #999999; padding-bottom:10px;     ">
                              <tbody>
                                 <tr>
                                    <td width="30">
                                       <div class="step-booking-small"  id="number_step_"  style="margin-top:-2px;">4</div>
                                    </td>
                                    <td height="40" valign="middle" class="font-26"><font color="<?=$text_topic_color?>" ><b><?=t_car_information;?></b></td>
                                    <td width="30" valign="top" class="font-26" <?=$display_none;?>>
                                       <!--<span class="font-22" id="edit_booking_step_4"  style="color:#FF0000"><i class="    fa fa-edit"></i>&nbsp;แก้ไข-->
                                       <span id="edit_booking_step_4" style="font-size:30px;color: <?=$text_topic_color;?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></span>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     <tr>
                        <td class="font-22 ">
                           <div style="border-radius: 5px; 
                              border: 0px solid #ddd;  
                              background:<? echo $bgcolor; ?>; margin-bottom:0px; box-shadow: 0px  0px 0px #DADADA; margin-top: 0px; margin-top:-10px;"    >
                              <table width="100%" border="0" cellspacing="0" cellpadding="2"   id="div_car_<?=$arr[projectcar][id]?>2">
                                 <tbody>
                                    <tr>
                                       <td valign="top">
                                          <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                             <tbody>
                                                <tr>
                                                   <td width="90"  class="font-24 "><strong id="text_car_edit"><?=t_car_registration_number	
;?> <? echo $arr[projectcar][plate_num];?>&nbsp;<? echo $arr[projectcar][province];?></strong></td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                              </a>
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
      </tr>
      <tr>
         <td>
            <div class="div-step-content">
               <table width="100%" border="0" cellpadding="2" cellspacing="5">
                  <tbody>
                     <tr>
                        <td width="120"  class="font-26 ">
                           <table width="100%" border="0" cellspacing="0" cellpadding="2"  style="border-top : 0px dotted   #999999;     ">
                              <tbody>
                                 <tr>
                                    <td width="30">
                                       <div class="step-booking-small"  id="number_step_3" style="margin-top:-2px;">5</div>
                                    </td>
                                    <td height="40" valign="middle" class="font-26"><span><font color="<?=$text_topic_color?>" ><b><?=t_get_paid_type;?></b></font></span></td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     <?php 
                       /* $replace_space = str_replace(' ', '', $arr[plan][$place_shopping]);
                        $full_txt = $replace_space;
                        
                        $explode_txt = explode("+",$full_txt);
                        echo $_GET[plan];
                        foreach($explode_txt as $type){
                        	echo $type."<br/>";
	                        if($type=="Parkingfee"){
	                        $query[t_com_fee] = 'payment_commision_driver';
	                        }
	                        if($type==t_person_fee){
	                        $query[t_person_fee] = 'payment_person_driver';
	                        }
	                        if($type==t_parking_fee){
	                        $query[t_parking_fee] = 'payment_park_driver';
	                        }
                        }	*/
                          /*$res[test] = $db->select_query("SELECT id,topic_th FROM   plan_product_price_name  ");
   						while($arr[test] = $db->fetch($res[test])){
							echo $arr[test][id]." ".$arr[test][topic_th]."<br/>";
						}*/
                        $plan = $_GET[plan];
                        if($plan==1){
							 $query[t_parking_fee] = 'payment_park_driver';
							 $query[t_person_fee] = 'payment_person_driver';
						}
						else if($plan==2){
							$query[t_parking_fee] = 'payment_park_driver';
							$query[t_com_fee] = 'payment_commision_driver';
						}
						else if($plan==3){
							$query[t_person_fee] = 'payment_person_driver';
							$query[t_com_fee] = 'payment_commision_driver';
						}
						else if($plan==4){
							$query[t_parking_fee] = 'payment_park_driver';
							$query[t_person_fee] = 'payment_person_driver';
							$query[t_com_fee] = 'payment_commision_driver';
						}
						else if($plan==5){
							$query[t_parking_fee] = 'payment_park_driver';
						}
						else if($plan==6){
							$query[t_person_fee] = 'payment_person_driver';
						}
						else if($plan==6){
							$query[t_com_fee] = 'payment_commision_driver';
						}
                        $res[type_pay] = $db->select_query("SELECT payment_commision_driver,payment_person_driver,payment_park_driver FROM product_price_list_all  where plan_id =".$_GET[plan]." AND country =240 limit 0,1 ");
                        $arr[type_pay] = $db->fetch($res[type_pay]);
//                        echo json_encode($query);
                        foreach($query as $key=>$value){ //		echo $arr[type_pay][$value]." ".$arr[plan][id]."<br/>"; 
                        if($arr[type_pay][$value]=="cach"){
                        ?>
                     <tr>
                        <td>
                           <table width="100%">
                              <tr>
                                 <td class="font-24 " width="90"><strong><?=t_get_cash;?></strong></td>
                                 <td class="font-24 " width="10">:</td>
                                 <td class="font-24 "><strong><?=$key;?></strong></td>
                              </tr>
                           </table>
                           <!--<strong>รับเงินสด : <?=$key;?></strong>-->
                        </td>
                     </tr>
                     <? 	}
                        else if($arr[type_pay][$value]=="bank"){ ?>
                     <tr>
                        <td >
                           <!--<strong>โอนเงิน : <?=$key;?></strong>-->
                           <table width="100%">
                              <tr>
                                 <td class="font-24 " width="90"><strong><?=t_transfers;?></strong></td>
                                 <td class="font-24 " width="10">:</td>
                                 <td class="font-24 "><strong><?=$key;?></strong></td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                     <?
                        if($arr[web_user][pay_bank_number]!=""){
                        	$show_bank_number = $arr[web_user][pay_bank_number];
                        	$show_pay_bank_sub = $arr[web_user][pay_bank_sub];
                        	$show_pay_bank = $arr[web_user][pay_bank];
                        	$show_pay_bank_name = $arr[web_user][pay_bank_name];
                        ?>
                     <tr>
                        <td>
                           <table width="100%" style="border: 2px solid #ddd;padding: 5px;box-shadow: 1px 1px 5px #ddd;border-radius:10px;">
                              <tr>
                                 <td class="font-24" width="80" valign="top"><?=t_bank;?> : </td>
                                 <td class="font-24" valign="top"><?=$show_pay_bank;?> </td>
                                 <td width="30" valign="top" >
                                    <span id="edit_book_bank" style="font-size:30px;color: <?=$text_topic_color;?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></span>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="font-24" valign="top"><?=t_account_name;?> : </td>
                                 <td class="font-24" colspan="2" valign="top"><?=$show_pay_bank_name;?></td>
                              </tr>
                              <tr>
                                 <td class="font-24" valign="top"><?=t_bank_branch;?> : </td>
                                 <td class="font-24" colspan="2" valign="top"><?=$show_pay_bank_sub;?></td>
                              </tr>
                              <tr  >
                                 <td class="font-24" valign="top"><?=t_account_number;?> :</td>
                                 <td class="font-24" colspan="2" valign="top"><?=$show_bank_number;?></td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                     <? } else{ ?>
                     <tr>
                        <td class="font-24"><?=t_no_bank_acc;?> &nbsp;<i class="fa fa-plus" aria-hidden="true" style="color: #3b5998;font-size:24px;" id="add_bank"></i></td>
                     </tr>
                     <? } ?>
                     <? } ?>
                     <? }
                        ?>	
                  </tbody>
               </table>
               <script>
                  $('#edit_book_bank').click(function(){
                  	$('#popup_edit').fadeIn(500);
                  	var url_load = "empty_style.php?name=pay&file=bank_book&driver=<?=$arr[web_user][id]?>&place=<?=$_GET[place];?>";
                  	console.log(url_load);
                  //				$('#body_load_bank').load(load_main_mod); 
                  	$('#body_load_bank').show(); 
                  	$('#text_edit_popup').text('<?=t_bank_account_information;?>'); 
                  	$('#body_load_bank').load(url_load); 
                  });
                  $('#add_bank').click(function(){
                  	console.log('add bank');
                  	$('#popup_edit').fadeIn(500);
                  	var url_load = "empty_style.php?name=pay&file=bank_book&driver=<?=$arr[web_user][id]?>&place=<?=$_GET[place];?>";
                  	console.log(url_load);
                  //				$('#body_load_bank').load(load_main_mod); 
                  	$('#body_load_bank').show(); 
                  	$('#text_edit_popup').text('<?=t_bank_account_information;?>'); 
                  	$('#body_load_bank').load(url_load); 
                  });
               </script>      
            </div>
         </td>
      </tr>
      <tr>
         <td>
             <button type="button" class="btn-repair waves-effect btn-other" style="background-color: #3b5998; border-radius: 25px; color:#fff;text-transform: capitalize;width: 100%;margin-bottom:35px;" id="submit_booking_step_4"> <span id="txt_btn_save" class="font-28"><?=t_save_data;?></span> </button>
         </td>
      </tr>
   </tbody>
</table>
<input type="hidden" value="" />
<script>
   $("#back_booking_step_4").click(function(){ 
    $( "#load_mod_popup_4" ).toggle();
   });
   
   $("#submit_booking_step_4").click(function(){ 
    console.log($('#edit_form').serialize());
   $('#load_mod_popup_4').html(load_main_mod);
   var driver = $('#....').val();
      $.post('go.php?name=booking&file=savedata&action=add&type=driver&driver=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   				$.post('send_messages/send_onesignal.php?key=new_shop',{ driver : "<?=$arr[web_user][id]?>" ,nickname : "<?=$arr[web_user][nickname]?>",car_plate : $('#car_plate').val() },function(data){
   					console.log(data);
   		});
   		 clearTimeout(clock);
//   							console.log(response);
							$('#main_load_mod_popup_clean').hide();
   							$('.button-close-popup-mod').click();
   							$('.button-close-popup-mod-4').click();
   							$('.button-close-popup-mod-3').click();
   							$('.button-close-popup-mod-2').click();
   							$('.button-close-popup-mod-1').click();
   							$('.button-close-popup-mod').click();
   							$('.close-small-popup').click();
   							$('#index_menu_shopping_history').click();
       });
   
     });
</script>

<div class="background-smal-popup " style="position: fixed; overflow: auto;display: none;z-index: 99999;" id="popup_edit">
   <div class="css-small-popup" style="width: 95%;top: 0px;    margin: 40% auto;">
      <div class="back-full-popup" style="z-index: 1;position: absolute;border-top-right-radius: 8px;border-top-left-radius:8px">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
               <tr>
                  <td width="40">
                     <div id="close_popup_edit"><i class="fa fa-close" style="font-size:21px; color:#FFFFFF "></i></div>
                  </td>
                  <td>
                     <div style="font-size:21px; color:#FFFFFF " id="text_edit_popup" class="text-topic-action-mod-small-popup"></div>
                  </td>
                  <td width="50" align="right">
                     <div style="font-size:22px; color:#FFFFFF " id="head_full_popup_icon"><i class="fa " style="font-size:30px; color:; "></i></div>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
      <div id="body_load_edit" style="margin: 10px;">
         <? include('mod/booking/step/popup/edit_finish.php'); ?>
      </div>
      <div id="body_load_bank" style="margin: 10px;">
      </div>
   </div>
</div>
<script>
   $('#close_popup_edit').click(function(){
   	$('#popup_edit').hide();
   	$('.edit-zone').hide();
   	$('#body_load_bank').hide();
   	$('#load_mod_popup_4').css('overflow','auto');
   });
    $('#show_submit').removeClass('border-alert');
</script>