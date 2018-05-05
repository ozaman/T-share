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
 $car_type = explode("(",$_POST[car][cartype][$place_shopping]);
?>
<div class="font-22" style="padding: 5px 0px;margin-top: 0px;padding-left: 10px;" onclick="hideDetail();" ><a ><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;<?=t_back_previous;?></a></div>

<div style="padding: 5px 10px;" class="w3-animate-right">
<div style="box-shadow: 0px -5px 5px #f6f6f6; padding:10px 12px;border: 1px solid #3b5998;border-radius: 15px;">
	<button class="btn btn-repair waves-effect btn-other btn-danger" align="center" onclick="cancelBook('<?=$_POST[id];?>');" id="btn_cancel_book_<?=$_POST[id];?>" style="
    position:  absolute;
    right: 10px;
    top: 40px;display: none;">
		<span class="font-24 text-cap"><?=t_cancel;?></span>
	</button>
	<div id="status_booking_detail" class="font-30"><b><?=$status_txt;?></b></div>
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
			<?=$_POST[drivername];?></td>
		  </tr>
		  <tbody>
		    <tr>
		      <td  width="100" class="font-22"><font color="#333333"><?=t_type_of_vehicle;?></font></td>
		      <td class="font-22"><? echo $car_type[0]; ?></td>
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
	
	<div style="padding: 5px 0px;display: none;">
	<span class="text-cap font-26"><?=t_check_in_information;?></span>
		<table width="100%" border="0" cellpadding="1" cellspacing="1" id="table_show_hide_checkin_<?=$arr[book][invoice];?>">
		   <tr id="step_driver_topoint">
		      <td class="font-22">
		         <?  include ("mod/booking/shop_history/load/checkin/topoint.php");?>
		      </td>
		   </tr>
		   <tr id="step_guest_receive" style="display:none">
		      <td class="font-22">
		         <?  include ("mod/booking/shop_history/load/checkin/guest_receive.php");?>
		      </td>
		   </tr>
		   <tr id="step_guest_register" style="display:none">
		      <td class="font-22">
		         <?  include ("mod/booking/shop_history/load/checkin/guest_register.php");?>
		      </td>
		   </tr>
		   <tr id="step_driver_pay_report" style="display:none">
		      <td class="font-22">
		         <?  include ("mod/booking/shop_history/load/checkin/driver_pay_report.php");?>
		      </td>
		   </tr>
		</table>
	</div>
	
	<div style="padding: 5px 0px;">
	 <span class="text-cap font-26"><?=t_income;?></span>
	 <table width="100%">
	 	<tr>
	 		<td align="center">
	 		<button class="btn btn-repair waves-effect" onclick="openViewPrice();" style="text-transform: unset;background-color: #3b5998;color: #fff;width: 80%;">
	 		<i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View </button>
	 		</td>
	 	</tr>
	 </table>
	</div>
	
</div>
</div>
<input type="hidden" id="check_cause" value="0"/>

<script>
	var remark1 = '<?=t_customer_no_register;?>';
    var remark2 = '<?=t_customer_not_go;?>';
    var remark3 = '<?=t_wrong_selected_place;?>';
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

	$('#btn_div_dropdown_phone').click(function(e) {
	    $("#main_load_mod_popup_4").toggle();
	    var url_load = "load_page_mod_4.php?name=booking/shop_history/load&file=social&type=phone&shop_id=<?=$arr[place_shop][id];?>";
	    $('#load_mod_popup_4').html(load_main_mod);
	    console.log(url_load);
	    $('#load_mod_popup_4').load(url_load);
	});
	
	$('#btn_div_dropdown_zello').click(function(e) {
	    $("#main_load_mod_popup_4").toggle();
	    var url_load = "load_page_mod_4.php?name=booking/shop_history/load&file=social&type=zello&shop_id=<?=$arr[place_shop][id];?>";
	    $('#load_mod_popup_4').html(load_main_mod);
	    console.log(url_load);
	    $('#load_mod_popup_4').load(url_load);
	});
	
	$('#shop_sub_menu_map').click(function(){  


	$('.bottom_popup').hide();
	  console.log('lat '+$('#lat').val());
	  console.log('lng '+$('#lng').val());
	  $( "#main_load_mod_popup_map" ).toggle();
	  var url_load= "load_page_map.php?name=booking/popup&file=map&shop_id=<?=$arr[place_shop][id]?>";
	  url_load=url_load+"&lat="+document.getElementById('lat').value;
 	  url_load=url_load+"&lng="+document.getElementById('lng').value;
  	  $('#load_mod_popup_map').html(load_main_mod);
  	  $('#load_mod_popup_map').load(url_load); 

 	});
</script>
<script>
	function ViewPhoto(id,type,date){
		var url = 'load_page_photo.php?name=booking/load/form&file=iframe_photo&id='+id+'&type='+type+'&date='+date;
		console.log(url);
		$( "#load_mod_popup_photo" ).toggle();
		
		$('#load_mod_popup_photo').html(load_main_mod);
  		
  		
 	 $('#load_mod_popup_photo').load(url); 
 	 
// 	 $('#text_mod_topic_action_photo-txt').text('crfdfdsdsf'); 

	}	
	
	function openViewPrice(){
		$( "#dialog_custom" ).show();
	   	var url_load= "empty_style.php?name=booking/shop_history/load&file=income_driver&id=<?=$arr[book][id]?>";
	   	console.log(url_load);
	   	$('#body_dialog_custom_load').html("<br/><br/><br/><br/>");
	  	$('#body_dialog_custom_load').load(url_load); 
	}
	
</script>