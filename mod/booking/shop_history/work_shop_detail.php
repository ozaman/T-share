<?php 
function checkTypePay($id){
      if($id==1){
      		$name_type = t_parking_fee." + ".t_person_fee;
      }
      else if($id==2){
      		$name_type = t_parking_fee." + ".t_com_fee;
      }
      else if($id==3){
      		$name_type = t_person_fee." + ".t_com_fee;
      } 
      else if($id==4){
      		$name_type = t_parking_fee." + ".t_person_fee." + ".t_com_fee;
      }
      else if($id==5){
      		$name_type = t_parking_fee;
      }
      else if($id==6){
      		$name_type = t_person_fee;
      }
      else if($id==7){
      		$name_type = t_com_fee;
      }
      return $name_type;
 }
 $main_color = "#3b5998";
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[book] = $db->select_query("SELECT * FROM  order_booking  where id = '".$_POST[id]."'  ");
 $arr[book] = $db->fetch($res[book]);  
 
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[place_shop] = $db->select_query("SELECT ".$place_shopping.",id FROM shopping_product  WHERE id='".$arr[book][program]."' ");
 $arr[place_shop] = $db->fetch($res[place_shop]);
 
 $res[projectdriver] = $db->select_query("SELECT name,nickname,phone,name_en FROM web_driver WHERE id='".$arr[book][drivername]."'    "); 
 $arr[projectdriver] = $db->fetch($res[projectdriver]);
 
 $res[qr_car] = $db->select_query("SELECT t1.car_type as car_type_id, t2.topic_en as topic_en,t2.topic_cn as topic_cn, t2.topic_th as topic_th, t1.car_color as color FROM web_carall as t1 left join web_carall_type as t2 on t1.car_type = t2.id WHERE t1.id ='".$arr[book][check_use_car_id]."' ");
 $arr[qr_car] = $db->fetch($res[qr_car]);
 
 if($_COOKIE['lng']=="th"){
 	 $full_name_driver = $arr[projectdriver][name]." (".$arr[projectdriver][nickname].")";
 	 $car_color = $arr[book][car_color];
 }else{
 	$full_name_driver =  $arr[projectdriver][name_en];
 	$car_color = $arr[qr_car][color];
 }

 if($arr[book][status]=='CANCEL'){
			 if($arr[book][cancel_type]=='1'){
				$status_txt = '<font color="#ff0000">'.t_customer_no_register.'</font>';
			}
			else if($arr[book][cancel_type]=='2'){
				$status_txt = '<font color="#ff0000">'.t_customer_not_go.'</font>';
			}
			else if($arr[book][cancel_type]=='3'){
				$status_txt = '<font color="#ff0000">'.t_wrong_selected_place.'</font>';
			}
		}
		else if($arr[book][status]=='NEW'){
			$status_txt = '<font color="#3b5998">'.t_new.'</font>';
		}
		else if($arr[book][status]=='CONFIRM'){
			$status_txt = '<font color="#54c23d">'.t_success.'</font>';
		}
	if($arr[book][driver_complete]==1){
		$cancel_shop = 'display:none;';
	}
	
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
  	$check_pay_dv = $db->num_rows("pay_history_driver_shopping","id","order_id=".$_POST[id]." and status = 1"); 
  	if($check_pay_dv>0){
		$show_alert = "";
	}else{
		$show_alert = "display:none;";
	}
?>
<input type="hidden" value="<?=$_POST[id];?>" id="id_order" />
<div class="font-22 back_main" onclick="backMain();" ><a ><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;<?=t_back_previous;?></a></div>
<div class="assas_<?=$_POST[id];?>" style=" padding:10px 12px; margin-top: 20px;" >
	<button class="btn btn-repair waves-effect btn-other btn-danger" align="center" onclick="cancelBook('<?=$_POST[id];?>');" id="btn_cancel_book_<?=$_POST[id];?>" style="
    position:  absolute;
    right: 10px;
    top: 40px;<?=$cancel_shop;?>">
		<span class="font-24 text-cap"><?=t_cancel;?></span>
	</button>
	
	<div id="status_booking_detail" class="font-30" style="margin-top: 10px;"><b><?=$status_txt;?></b></div>
	<span class="font-28"><?=$arr[place_shop][$place_shopping];?></span>
	
	<table width="100%" border="0" cellspacing="1" cellpadding="1">
   <tbody>
      <tr>
      </tr>
      <tr>
         <td width="33%" align="left" >
            <div class="btn  btn-default" style=" width:100%; text-align:left; padding:2px; padding-left:5px; height:40px;" data-toggle="dropdown" id="btn_div_dropdown_phone">
               <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tbody>
                     <tr>
                        <td width="30"><i class="fa fa-phone-square" style="font-size:32px; color: #8DC63F; border:none;"></i></td>
                        <td  class="font-24"><b><?=t_call;?></b></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
         <td width="33%" align="left" >
            <div class="btn  btn-default" style=" width:100%; text-align:left;  padding:2px;height:40px;" data-toggle="dropdown" id="btn_div_dropdown_zello">
               <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tbody>
                     <tr>
                        <td width="30"><img src="images/icon/top/zello.png" width="30" height="30" alt=""/> </td>
                        <td class="font-24">
                           <b>Zello</b>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
         <td width="33%" align="left"    >
            <div class="btn  btn-default" style=" width:100%; text-align:left;  padding:2px;height:40px;" data-toggle="dropdown" id="shop_sub_menu_map">
               <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tbody>
                     <tr>
                        <td width="30"><img src="images/icon/top/map.png" width="30" height="30" alt=""/></td>
                        <td class="font-24"><b><?=t_maps;?></b></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
      </tr>
   </tbody>
</table>
	
	<div style="padding: 5px 0px;">
		<span class="text-cap font-26"><?=t_reservation_information;?></span>
		<table width="100%" border="0" cellpadding="1" cellspacing="5" style="display:nones" id="table_show_hide_data">
   		<tbody>
   		<tr>
	      <td width="100" class="font-22 text-cap"><font color="#333333"><?=t_booking_no;?></font></td>
	      <td class="font-22"><?=$arr[book][invoice];?></td>
   		</tr>
   		</tbody>
		<tbody>
      <tr>
         <td class="font-22 text-cap"><font color="#333333"><?=t_date;?></font></td>
         <td class="font-22"><?=$arr[book][transfer_date];?></td>
      </tr>
      <tr>
         <td class="font-22 text-cap"><font color="#333333"><?=t_arrival_time;?></font></td>
         <td class="font-22"> <?=$arr[book][airout_h];?>:<?=str_pad($arr[book][airout_m], 2, '0', STR_PAD_LEFT)." ".t_n;?></td>
      </tr>
      <tr>
         <td class="font-22 text-cap"><font color="#333333"><?=t_number;?></font></td>
        <td class="font-22"><?
            if($arr[book][adult]>0){ ?>
            <?=t_adult;?> :
            <?=$arr[book][adult];?>
            &nbsp;
            <? } ?>
            <? if($arr[book][child]>0){ ?>
            <?=t_child;?> :
            <?=$arr[book][child];?>
            <? } ?>
            
         </td>
      </tr>
         </tbody>
</table>
	</div>

	<div style="padding: 5px 0px;">
		<span class="text-cap font-26"><?=t_car_driver_information;?></span>
		<table width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_hide_driver">
		  <tr>
		    <td width="100"  class="font-22"><font color="#333333"></font><?=t_dv_name;?></td>
		    <td colspan="3" class="font-22">
			<?=$full_name_driver;?></td>
		  </tr>
		  <tbody>
		    <tr>
		      <td  width="100" class="font-22"><font color="#333333"><?=t_type_of_vehicle;?></font></td>
		      <td class="font-22"><? echo $arr[qr_car][$place_shopping]; ?></td>
		      <td width="30" class="font-22"><font color="#333333"><?=t_car_coloring;?></font></td>
		      <td class="font-22"><?=$car_color;?></td>
		    </tr>
		    <tr>
		      <td   width="100"  class="font-22"><font color="#333333"><?=t_car_registration_number;?></font></td>
		      <td colspan="3" class="font-22"><?=$arr[book][car_plate];?></td>
		    </tr>
		     <tr>
		      <td   width="100"  class="font-22"><font color="#333333"><?=t_call;?></font></td>
		      <td colspan="3" class="font-22"><a href="tel:<?=$arr[projectdriver][phone];?>" ><?=$arr[projectdriver][phone];?></a></td>
		    </tr>
		  </tbody>
		</table>
	</div>
	
	
	<?php 
	if($data_user_class=='taxi'){	
	$txt_btn_pay = 'ยืนการการรับเงิน';
	
	?>
	<div style="padding: 5px 0px;">
	<span class="text-cap font-26"><?=t_check_in_information." คนขับ";?></span>
	<table width="100%" border="0" cellpadding="1" cellspacing="1" id="table_show_hide_checkin_<?=$arr[book][invoice];?>">
		   <tr id="step_driver_topoint">
		      <td class="font-22">
		         <?  include ("mod/booking/shop_history/load/checkin/topoint.php");?>
		      </td>
		   </tr>
			<!--<tr id="step_driver_pay_report" style="display:nones">
		      <td class="font-22">
		         <?  include ("mod/booking/shop_history/load/checkin/driver_pay_report.php");?>
		      </td>
		   </tr>-->
		</table>
	</div>
	<div style="width: 100%;height: 5px;background-color: #ddd ;margin: 10px 0px;" ></div>
	<div style="padding: 5px 0px;">
		<span class="text-cap font-26"><?=t_check_in_information." แลป";?></span>
		<table width="100%" border="0" cellpadding="1" cellspacing="1" id="table_show_hide_checkin_<?=$arr[book][invoice];?>">
		  <tr id="step_guest_receive" style="display:nones">
		      <td class="font-22">
		         <?  include ("mod/booking/shop_history/load/checkin/guest_receive.php");?>
		      </td>
		   </tr>
		   <tr id="step_guest_register" style="display:nones">
		      <td class="font-22">
		         <?  include ("mod/booking/shop_history/load/checkin/guest_register.php");?>
		      </td>
		   </tr>
		   <tr id="step_driver_pay_report" style="display:nones">
		      <td class="font-22">
		         <?  include ("mod/booking/shop_history/load/checkin/driver_pay_report.php");?>
		      </td>
		   </tr>
		 </table>
	</div>
	<? }
	else{ 
	$txt_btn_pay = 'แจ้งยอดรายได้';
	?>
	<div style="padding: 5px 0px;">
	<span class="text-cap font-26"><?=t_check_in_information." คนขับ";?></span>
	<table width="100%" border="0" cellpadding="1" cellspacing="1" id="table_show_hide_checkin_<?=$arr[book][invoice];?>">
		   <tr id="step_driver_topoint">
		      <td class="font-22">
		         <?  include ("mod/booking/shop_history/load/checkin_lab/topoint.php");?>
		      </td>
		   </tr>
			<!--<tr id="step_driver_pay_report" style="display:nones">
		      <td class="font-22">
		         <?  include ("mod/booking/shop_history/load/checkin_lab/driver_pay_report.php");?>
		      </td>
		   </tr>-->
		</table>
	</div>
	<div style="width: 100%;height: 5px;background-color: #ddd ;margin: 10px 0px;" ></div>
	<div style="padding: 5px 0px;">
		<span class="text-cap font-26"><?=t_check_in_information." แลป";?></span>
		<table width="100%" border="0" cellpadding="1" cellspacing="1" id="table_show_hide_checkin_<?=$arr[book][invoice];?>">
		  <tr id="step_guest_receive" style="display:nones">
		      <td class="font-22">
		         <?  include ("mod/booking/shop_history/load/checkin_lab/guest_receive.php");?>
		      </td>
		   </tr>
		   <tr id="step_guest_register" style="display:none">
		      <td class="font-22">
		         <?  include ("mod/booking/shop_history/load/checkin_lab/guest_register.php");?>
		      </td>
		   </tr>
		   <tr id="step_driver_pay_report" style="display:none">
		      <td class="font-22">
		         <?  include ("mod/booking/shop_history/load/checkin_lab/driver_pay_report.php");?>
		      </td>
		   </tr>
		 </table>
	</div>
	<? }
	
	?>
	
	
	<div style="padding: 5px 0px;">
	 <span class="text-cap font-26"><?=t_income;?></span>
	 <table width="100%">
	 	<tr>
	 		<td align="center">
	 		<button class="btn btn-repair waves-effect" onclick="openViewPrice();" style="text-transform: unset;
    background-color: #ffffff;
    color: #3b5998;
    width: 80%;
    border: 1px solid #3b5998;">
	 		<i class="icon-new-uniF121-10" aria-hidden="true"></i>&nbsp;<?=$txt_btn_pay;?> </button>
	 		<span id="alert_pay_driver" class="badge font-20" style="position: absolute;font-size: 14px;background-color: #F44336;padding: 4px 7px;margin-left: -35px;z-index: 1;margin-top: 12;<?=$show_alert;?>"><strong>!</strong></span>
	 		</td>
	 	</tr>
	 </table>
	</div>


</div>
<input type="hidden" id="check_cause" value="0"/>

<script>
	var remark1 = '<?=t_customer_no_register;?>';
    var remark2 = '<?=t_customer_not_go;?>';
    var remark3 = '<?=t_wrong_selected_place;?>';
    
	$('#btn_div_dropdown_phone').click(function(e) {
	    /*$("#main_load_mod_popup_4").toggle();
	    var url_load = "load_page_mod_4.php?name=booking/shop_history/load&file=social&type=phone&shop_id=<?=$arr[place_shop][id];?>";
	    $('#load_mod_popup_4').html(load_main_mod);
	    console.log(url_load);
	    $('#load_mod_popup_4').load(url_load);*/
	    $( "#material_dialog" ).show();
	    $( "#dialoglLabel" ).text('เบอร์โทรศัพท์');
	   	var url_load= "empty_style.php?name=booking/shop_history/load&file=social&type=phone&shop_id=<?=$arr[place_shop][id];?>";
	   	console.log(url_load);
	   	$('#load_modal_body').html("<br/><br/><br/><br/>");
	  	$('#load_modal_body').load(url_load); 
	});
	
	$('#btn_div_dropdown_zello').click(function(e) {
	  /*  $("#main_load_mod_popup_4").toggle();
	    var url_load = "load_page_mod_4.php?name=booking/shop_history/load&file=social&type=zello&shop_id=<?=$arr[place_shop][id];?>";
	    $('#load_mod_popup_4').html(load_main_mod);
	    console.log(url_load);
	    $('#load_mod_popup_4').load(url_load);*/
	     $( "#material_dialog" ).show();
	    $( "#dialoglLabel" ).text('Zello');
	   	var url_load= "empty_style.php?name=booking/shop_history/load&file=social&type=zello&shop_id=<?=$arr[place_shop][id];?>";
	   	console.log(url_load);
	   	$('#load_modal_body').html("<br/><br/><br/><br/>");
	  	$('#load_modal_body').load(url_load); 
	});
	
	$('#shop_sub_menu_map').click(function(){  

	  console.log('lat '+$('#lat').val());
	  console.log('lng '+$('#lng').val());
	  $( "#main_load_mod_popup_map" ).toggle();
	  $( "#main_load_mod_popup_clean" ).hide();
	  var url_load= "load_page_map.php?name=booking/popup&file=map&shop_id=<?=$arr[place_shop][id]?>";
	  url_load=url_load+"&lat="+document.getElementById('lat').value;
 	  url_load=url_load+"&lng="+document.getElementById('lng').value;
  	  $('#load_mod_popup_map').html(load_main_mod);
  	  $('#load_mod_popup_map').load(url_load); 

 	});

 	$('#button-close-popup-map').click(function(){
 		$( "#main_load_mod_popup_clean" ).show();
 	});

	function ViewPhoto(id,type,date){
		var url = 'load_page_photo.php?name=booking/load/form&file=iframe_photo&id='+id+'&type='+type+'&date='+date;
		console.log(url);
		$( "#load_mod_popup_photo" ).toggle();
		$('#load_mod_popup_photo').html(load_main_mod);
 	 	$('#load_mod_popup_photo').load(url); 
	}	

	function openViewPrice(){
		$( "#dialog_custom" ).show();
	   	var url_load= "empty_style.php?name=booking/shop_history/load&file=income_driver&id=<?=$arr[book][id]?>";
	   	console.log(url_load);
	   	$('#body_dialog_custom_load').html("<br/><br/><br/><br/>");
	  	$('#body_dialog_custom_load').load(url_load); 
	}

	function cancelBook(id){
	
     swal({
   title: "<font style='font-size:28px'><b><? echo t_are_you_sure?> </b></font>",
   text: "<font style='font-size:22px'><? echo t_need_cancel_transfer?></font>"+"<table width='100%' style='margin:15px;'><tr><td width='40'><input id='remark1' onclick='check("+id+",1);' class='cause_"+id+"'  type='checkbox' value='1' style='display:block;height:25px;' /></td><td><label style='margin-top:8px;' for='remark1'>"+remark1+"</label></td></tr><tr><td width='40'><input id='remark2' onclick='check("+id+",2);' class='cause_"+id+"'  type='checkbox' value='2' style='display:block;height:25px;' /></td><td><label for='remark2' style='margin-top:8px;'>"+remark2+"</label></td></tr><tr><td width='40'><input id='remark3' onclick='check("+id+",3);' class='cause_"+id+"'  type='checkbox' value='3' style='display:block;height:25px;' /></td><td><label for='remark3' style='margin-top:8px;'>"+remark3+"</label></td></tr></table>",
   type: "warning",
   showCancelButton: true,
   confirmButtonColor: '#3b5998',
   confirmButtonText: '<?echo t_yes?>',
   cancelButtonText: "<?echo t_no?>",
   closeOnConfirm: false,
   closeOnCancel: true,
   html: true
   },
   function(isConfirm){
     if (isConfirm){
	   var cause = $('#check_cause').val();
	   
	   var url = "mod/booking/shop_history/php_shop.php?type=cancel&id="+id+"&cancel_type="+cause;
	   
	   console.log(url+" "+cause);

	   $.post( url, function( data ) {
	   		console.log(data);
//	   		if(data.reult == true && data.history.result == true){
				$('#btn_cancel_book_'+id).hide();
				
				var url_check_st = "mod/booking/shop_history/load/component_shop.php?request=check_status_shop&status="+data.status+"&type="+cause;
				console.log(url_check_st);
				$.post( url_check_st, function( com ) {
					$('#status_booking_detail').html(com);
					swal("<?=t_success;?>", "", "success");
				});
//			}
	   });

     }
   });
    }
    
   	function check(id,num){
    console.log(id+" "+num);	
    $('.cause_'+id).attr('checked', false);
    $('#remark'+num).attr('checked', true);
    $('#check_cause').val(num);
   }


</script>
<script>
		
   
function changeHtml(type,id){
	   		var url_status = "popup.php?name=booking/load/form&file=checkin_status&id="+id+"&type=check_"+type+"&time=<?=TIMESTAMP?>&status=1";
			$('#status_'+type).html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> โหลดข้อมูล');
			$('#status_'+type).load(url_status); 
			$('#iconchk_'+type).attr("src", "images/yes.png");  
			$("#number_"+type).removeClass('step-booking');
			$("#number_"+type).addClass('step-booking-active');
			$("#box_"+type).addClass('disabledbutton-checkin');
			$("#btn_"+type).css('background-color','#666666');
		/*$.ajax({
			url: '../data/fileupload/store/'+type+'_'+id+'.jpg',
			type:'HEAD',
			error: function()
			{
			console.log('Error file');
			},
			success: function()
			{
				//file exists
				console.log('success file');
				$('#photo_type').css('color','#3b5998');
				$('#photo_type').css('border','2px solid #3b5998');
				$('#photo_type').attr('onclick','ViewPhoto("'+id+'","'+type+'","<?=TIMESTAMP;?>");');
			}
		});*/
		$('#'+type+'_check_click').val(1);
		$("#box_"+type).removeClass('border-alert');
   }
</script>