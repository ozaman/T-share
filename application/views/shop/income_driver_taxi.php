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
    $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
    $res[book] = $db->select_query("SELECT * FROM  order_booking  where id = '".$_GET[id]."'  ");
    $arr[book] = $db->fetch($res[book]); 
     /*$res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[book][plan_id]."   ");
         $arr[price] = $db->fetch($res[price]);
         $show_park = $arr[price][price_park];
         $show_person = $arr[price][price_person];
         $show_commision = $arr[price][price_commision];*/
	
         
   $arr[project] = $arr[book];
   $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
   $check_pay = $db->num_rows("pay_history_driver_shopping","id","order_id=".$arr[project][id]." and status = 1"); 
   if($check_pay>0){
   			$txt_pay_park = '<span class="font-24">'.number_format($arr[project][price_park_total], 0 ).' บาท</span>';
     		$txt_pay_com = '<i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#f00000;"></i><strong style="padding-left: 5px;"><font color="#f00000">'.t_pending.'</font></strong>';
     		$txt_pay_person = '<span class="font-24">'.number_format($arr[project][price_person_total], 0 ).' บาท</span>';
     		$txt_pay_all = '<span class="font-24" id="txt_all_total">'.number_format($arr[project][price_all_total], 0 ).' บาท</span>';
     		
   			$hide_his_btn = "";
   			$color_status;
   			$res[pay_row] = $db->select_query("SELECT * FROM pay_history_driver_shopping where  order_id=".$arr[project][id]." and status = 1  ");
     		$arr[pay_row] = $db->fetch($res[pay_row]);
     		$json_price_plan = $arr[pay_row][income_driver];
     		if($arr[pay_row][driver_approve]>0){
	  			$color_menu = 'background-color:#59AA47;';
				$txt_pay = '<font color="#59AA47;">'.t_already_received.'</font>';
	  			$status_icon = '<span><i class="fa  fa-clock-o " style="width:22px;" ></i>&nbsp;'.date('H:i:s', $arr[pay_row][driver_approve_pay_date]).'</span>';
	  			$btn_row_approve = 'display:none;';
	  			$alert_history = "swal('".t_history."' , '".t_pay_on." ".date('Y-m-d H:i:s',$arr[pay_row][last_update]).t_n." '  ,'success');";
			}else{
				$color_menu = 'background-color:#ecb304;';
				$txt_pay = '<font style="color:#ecb304;">'.t_paid.'</font>';
	  			$status_icon = '<div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#ecb304"></i> <strong><font color="#ecb304">'.t_please_check.'</font></strong></div>';
	  			$btn_row_approve = '';
	  			$alert_history = "swal('".t_no_history."','','error')";
			}
			if($arr[pay_row][pay_transfer]>0){
				$txt_pay_com = '<span class="font-24">'.number_format($arr[pay_row][price_pay_driver_com], 0 ).' บาท</span>';
			}
     }	else{
     		$hide_his_btn = "display:none;";
     		$color_menu = 'background-color:#f00000;';
     		$txt_pay_park = '<i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#f00000;"></i><strong style="padding-left: 5px;"><font color="#f00000">'.t_pending.'</font></strong>';
     		$txt_pay_com = '<i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#f00000;"></i><strong style="padding-left: 5px;"><font color="#f00000">'.t_pending.'</font></strong>';
     		$txt_pay_person = '<i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#f00000;"></i><strong style="padding-left: 5px;"><font color="#f00000">'.t_pending.'</font></strong>';
     		$txt_pay_all = '<i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#f00000;"></i><strong style="padding-left: 5px;"><font color="#f00000">'.t_pending.'</font></strong>';
  		$txt_pay = '<font color="#f00000;">'.t_not_paid.'</font>';
  		$status_icon = '<div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">'.t_pending.'</font></strong></div>';
  		$btn_row_approve = 'display:none;';
  		$alert_history = "swal('".t_no_history."','','error')";
     }
     $status_icon = '<div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">'.t_pending.'</font></strong></div>';
   ?>
<style>
	
   .edit{
   margin-top: -5px;
   border: 1px solid #9E9E9E !important;
   }
   /* The container */
.container-cb {
    display: block;
    position: relative;
    padding-left: 0px;
    margin-bottom: 2px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container-cb input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
	margin-top: 2px;
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 5px;
    border: 1px solid #ddd;
}

/* On mouse-over, add a grey background color */
.container-cb:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container-cb input:checked ~ .checkmark {
    background-color: #3b5998;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container-cb input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container-cb .checkmark:after {
    left: 8px;
    top: 0px;
    width: 9px;
    height: 17px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>
<div style="margin-top: 40px;">
   <div style="padding: 15px 5px;">
      <div style="padding: 5px 15px">
      	<table id="check_park_tb" border="0" cellspacing="2" cellpadding="2" width="100%">
      		<tr>
      			<td><label class="container-cb" >ค่าจอด</label></td>
      			<td></td>
      		</tr>
      		<tr>
		      			 <td valign="middle"><span class="font-24">จำนวน</span></td>
			              <td align="right" valign="middle">
			               <span class="font-24"></span>
			               <?=$txt_pay_park;?>
			            </td>
		      		</tr>
      	</table>

      	<table id="check_person_tb" border="0" cellspacing="2" cellpadding="2" width="100%">
      		<tr>
      			<td><label class="container-cb" >ค่าหัว</label></td>
      			<td></td>
      		</tr>
      		<tr>
		      			 <td valign="middle"><span class="font-24">จำนวน</span></td>
			              <td align="right" valign="middle">
			               
			               <?=$txt_pay_person;?>
			            </td>
		      		</tr>
      	</table>
      	
      	<table id="check_com_tb" border="0" cellspacing="2" cellpadding="2" width="100%">
      		<tr>
      			<td><label class="container-cb" >ค่าคอม</label></td>
      			<td></td>
      		</tr>
      		<tr>
      			<td valign="middle"><span class="font-24">เปอร์เซ็น</span></td>
      			<td align="right"><span class="font-24"><?=$arr[project][commission_persent];?> %</span></td>
      		</tr>
      		<tr>
      			<td valign="middle"><span class="font-24">จำนวน</span></td>
      			<td align="right"><?=$txt_pay_com;?></td>
      		</tr>
      	</table>

		<table width="100%" cellspacing="2" cellpadding="2" style="margin-top: 10px;">
			 <tr>
                        <td>
                           <span class="font-24">รวม</span>
                        </td>
                        <td align="right" >
                           <?=$txt_pay_all;?>
                        </td>
                     </tr>
		</table>
      </div>
      
      <div style="padding: 5px 10px;<?=$show_el;?>" id="box_status_dv">
      	<div align="center"><span class="font-24">สถานะการจ่ายเงิน</span><span class="font-24" style="margin: 10px;"><?=$txt_pay;?></span></div>
      <table width="100%" border="0" cellspacing="2" cellpadding="2" style="padding: 0px 15px;">
         <tbody>
         <tr  id="tr_btn_park_approve" style="<?=$btn_row_approve;?>">
	          	<td colspan="2" >
	          	<button  id="btn_com_his_<?=$arr[project][id]?>"  type="button" class="btn btn-default"  
	          	style="margin: 10px 0px;width:100%;text-align:left;padding: 7px;border-radius: 3px;border:none;background-color: #ecb304;color: #fff;" 
	          	onclick="ApporvePayDriver2('<?=$arr[pay_row][order_id]?>','<?=$arr[pay_row][invoice];?>','<?=$arr[project][drivername];?>');" ><center><strong class="font-22"><i class="fa fa-money" style="width: 24px; color:fff"  ></i><?=t_confirm_or_receipt;?></strong></center></button>
	          	</td>
	          	<td></td>
          </tr>
            <tr id="show_person_his" style="<?=$hide_his_btn;?>">
               <td width="50%">
                  <button type="button" onclick="ViewPhoto('<?=$arr[project][id]?>','doc_pay','<?=$arr[pay_row][last_update];?>',<?=$arr[project][plan_id]?>);" onclick=""  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:10px;  border-radius: 3px; 
                 box-shadow: 1px 1px 3px #9E9E9E;border: 1px solid #ddd; background-color:#FFF;">
                     <center><span class="font-22"><?=t_documents;?> 
                        <img src="images/yes.png" align="absmiddle" id="iconchk_person" style="<?=$show_el;?>"></span>
                     </center>
                  </button>
               </td>
               <td width="50%">
                  <button type="button" onclick="<?=$alert_history;?>"  id="btn_his"  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:10px; border-radius: 3px; box-shadow: 1px 1px 3px #9E9E9E;border: 1px solid #ddd;background-color:#FFF; ">
                     <center><span class="font-22"><i class="fa fa-history" style="width: 24px; color:<?=$color_status;?>"  ></i><?=t_history;?></span></center>
                  </button>
               </td>
            </tr>
            
         </tbody>
      </table>
	</div>
   </div>
</div>
<input type="hidden" value="<?=$_GET[id];?>" id="check_id_income_lab" />
<script>
	var json = '<?=$json_price_plan;?>';
	if(json!=""){
		var obj = JSON.parse(json);
		console.log(obj);
		$.each(obj, function( key, value ) {
			if(value==0){
				$('#'+key+'_tb').hide();
			}
		  	
		});
	}
	
</script>
<script>
   function check(id,num){
    console.log(id);	
    $('.cause_'+id).attr('checked', false);
    $('#remark'+num).attr('checked', true);
    $('#check_cause_'+id).val(num);
   }
   function ApporvePayDriver2(order_id,invoice,driver){
   	console.log(order_id);
   	swal({
	  title: "<?=t_are_you_sure;?>",
   	  text: "<?=t_already_received;?>",
	  type: "info",
	  confirmButtonClass: "btn-danger waves-effect waves-light",
	  cancelButtonClass: "btn-cus waves-effect waves-light",
	  showCancelButton: true,
	  closeOnConfirm: false,
	  confirmButtonText: '<?=t_yes;?>',
   	  cancelButtonText: "<?=t_no;?>",
	  showLoaderOnConfirm: true
	}, function () {
		  	$.post( "mod/booking/shop_history/php_shop.php?action=approve_pay_driver_taxi",{ order_id : order_id},function( data ) 		{
	   		console.log(data);
	   		swal ( "<?=t_save_succeed;?>" ,  "" ,  "success" );
							openViewPrice();
							var url_noti = "send_messages/send_pay_driver.php?type=send_lab&vc="+invoice+"&order_id="+order_id+"&driver="+driver;
							console.log(url_noti);
							$.post( url_noti,function( re ){
			   				 	console.log(re);
			   				 });
			   				 var message = "";
							socket.emit('sendchat', message);
			   				navigator.geolocation.getCurrentPosition(showPosition); 
			   				var url_completed = "mod/booking/shop_history/php_shop.php?action=check_driver_complete&order_id="+order_id+'&lat='+$('#lat').val()+'&lng='+$('#lng').val();
							console.log(url_completed);
							$.post( url_completed,function( re ){
			   				 	console.log(re);
	//		   				 	console.log(array_data)
			   				 }); 
	   	});
	});
   
   }
   function ApporvePayDriver(order_id,invoice){
   console.log(id);
   
   	swal({
   		title: "<?=t_are_you_sure;?>",
   		text: "<?=t_already_received;?>",
   		type: "warning",
   		confirmButtonClass: "btn-danger waves-effect waves-light",
		cancelButtonClass: "btn-cus waves-effect waves-light",
   		showCancelButton: true,
   		confirmButtonText: '<?=t_yes;?>',
   		cancelButtonText: "<?=t_no;?>",
   		closeOnConfirm: false,
   		closeOnCancel: true
   	},
   	function(){
   	 	$.post( "empty_style.php?name=booking/shop_history&file=php_shop&action=approve_pay_driver_taxi",{ order_id : order_id},function( data ) 		{
   	 					console.log(data);
   			  			/*swal ( "<?=t_save_succeed;?>" ,  "" ,  "success" );
						openViewPrice();
						var url_noti = "send_messages/send_pay_driver.php?type=send_lab&iv="+invoice+"&order_id="+order_id;
						console.log(url_noti);
						$.post( url_noti,function( re ){
		   				 	console.log(re);
		   				 });
		   				 var message = "";
						socket.emit('sendchat', message);
		   				navigator.geolocation.getCurrentPosition(showPosition); 
		   				var url_completed = "mod/booking/shop_history/php_shop.php?action=check_driver_complete&order_id="+order_id+'&lat='+$('#lat').val()+'&lng='+$('#lng').val();
						console.log(url_completed);
						$.post( url_completed,function( re ){
		   				 	console.log(re);
//		   				 	console.log(array_data)
		   				 }); */
   			});
   				
   			
   	});
   }
   function ChangePrice(id,cal){
   	var old_value = $('#'+id).val();
   		swal({
    title: "กรอกจำนวน",
    text: "จำนวนเดิม "+formatComma(old_value),
    type: "input",
    showCancelButton: false,
    closeOnConfirm: true,
    inputPlaceholder: "กรอกจำนวนที่ต้องการ",
    confirmButtonClass: "btn-success",
   	  confirmButtonText: "ตกลง"
   }, function (inputValue) {
    if (inputValue === false) return false;
    if (inputValue === "") {
   //		    swal.showInputError("You need to write something!");
      return false
    }
    $('#'+id).val(inputValue);
    $('#txt_'+id).text(formatComma(inputValue));
    if(cal==1){
    	calculate();
    }
   });
   }
   function calculate(){
   		var park_total = $('#park_price').val();
   		var price_unit_cn = $('#txt_price_person_cn').text();
   		var pax_cn = $('#regis_cn_pax').text();
   		var price_unit_oth = $('#txt_price_person_oth').text();
   		var pax_oth = $('#regis_oth_pax').text();
   		var total_cn = parseInt(price_unit_cn) * parseInt(pax_cn);
   		var total_oth = parseInt(price_unit_oth) * parseInt(pax_oth);
   		console.log(total_cn+" "+total_oth)
   		var total_person = parseInt(total_cn) + parseInt(total_oth);
   $('#total_person').val(total_person)
   		$('#txt_total_person').text(formatComma(total_person));
   		var total_all = parseInt(park_total) + parseInt(total_person);
   		$('#txt_all_total').text(formatComma(total_all));
   		$('#all_total').val(total_all);
   }
   function formatComma(x){
   	  var parts = x.toString().split(".");
   parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
   return parts.join(".");
   }
</script>
<script>
   function pushPax(id){
   	var current_num = $('#'+id).text();
   	current_num = parseInt(current_num) + 1;
   	$('#pax').val(current_num);
   	$('#'+id).text(current_num);
   	calculate();
   }
   function minusPax(id){
   	var current_num = $('#'+id).text();
   	current_num = parseInt(current_num) - 1;
   	if(current_num<0){
   		current_num = 0;
   	}
   	$('#pax').val(current_num);
   	$('#'+id).text(current_num);
   	calculate();
   }
   function pushRegis(id){
   	var current_num = $('#'+id).text();
   	current_num = parseInt(current_num) + 1;
   	var max_num = $('#pax').val();
   	if(current_num>max_num){
   		current_num = max_num;
   	}
   	$('#regis_pax').val(current_num);
   	$('#'+id).text(current_num);
   	calculate();
   }
   function minusRegis(id){
   	var current_num = $('#'+id).text();
   	current_num = parseInt(current_num) - 1;
   	if(current_num<0){
   		current_num = 0;
   	}
   	$('#regis_pax').val(current_num);
   	$('#'+id).text(current_num);
   	calculate();
   }
   function pushNation(id,type){
   	if(type=='oth'){
   		var any =  $('#regis_cn_pax').text();
   		var price_unit_nation = $('#txt_price_person_oth').text();
   	}else{
   		var any =  $('#regis_oth_pax').text();
   		var price_unit_nation = $('#txt_price_person_cn').text();
   	}
   	var current_num = $('#'+id).text();
   	current_num = parseInt(current_num) + 1;
   	var max_num = $('#pax').val();
   	var check = parseInt(max_num) - parseInt(any);
   		if(current_num>=check){
   			current_num = check;
   		}
   	$('#'+id+'_input').val(current_num);
   	$('#'+id).text(current_num);
   	calculate();
   }
   function minusNation(id,type){
   	var current_num = $('#'+id).text();
   	current_num = parseInt(current_num) - 1;
   	if(current_num<0){
   		current_num = 0;
   	}
   	$('#'+id+'_input').val(current_num);
   	$('#'+id).text(current_num);
   	calculate();
   }
   $('#btn_doc').click(function(){
   	 	$( "#main_load_mod_popup_3" ).toggle();
   	 	var url_load= "load_page_mod_3.php?name=booking/shop_history/load&file=upload_pay_popup&id=<?=$arr[project][id]?>&plan=<?=$arr[book][plan_id];?>&invoice=<?=$arr[project][invoice]?>&check_confirm=<?=$check_pay;?>&price="+$('#all_total').val();
   	 	console.log(url_load);
   //		 	return;
   	 	$('#load_mod_popup_3').html(load_main_mod);
   	 	$('#load_mod_popup_3').load(url_load); 
   		$('#dialog_custom').hide();
   	 	$('#main_load_mod_popup_clean').hide();
   	});
</script>