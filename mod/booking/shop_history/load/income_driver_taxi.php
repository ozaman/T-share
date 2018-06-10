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
     $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[book][plan_id]."   ");
         $arr[price] = $db->fetch($res[price]);
         $show_park = $arr[price][price_park];
         $show_person = $arr[price][price_person];
         $show_commision = $arr[price][price_commision];
         if($show_park==1){
   	  	$show_park_tr = "";
   	  }else{
   	  	$show_park_tr = "style='display:none;'";
   	  }
   	   if($show_person==1){
   	  	$show_person_tr = "";
   	  }else{
   	  	$show_person_tr = "style='display:none;'";
   	  }
   	   if($show_commision==1){
   	  	$show_com_tr = "";
   	  }else{
   	  	$show_com_tr = "style='display:none;'";
   	  }
         /*$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   					      	$res[price_person_cn] = $db->select_query("SELECT country,id,price_person_driver FROM  product_price_list_all where  plan_setting = 1 and country<>240 and status=1 and extra_country=1   ORDER BY  sort_country desc limit 1   ");
   					      	$arr[price_person_cn] = $db->fetch($res[price_person_cn]);
   					      	 echo $arr[price_person_cn][price_person_driver];
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   					      	$res[price_person_oth] = $db->select_query("SELECT country,id,price_person_driver FROM  product_price_list_all where  plan_setting = 1 and country=240   ORDER BY id  ");
   					      	$arr[price_person_oth] = $db->fetch($res[price_person_oth]);
   					      	echo $arr[price_person_oth][price_person_driver];*/
   $arr[project] = $arr[book];
   $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
   $check_pay = $db->num_rows("pay_history_driver_shopping","id","order_id=".$arr[project][id]." and status = 1"); 
   if($check_pay>0){
   			$res[pay_row] = $db->select_query("SELECT * FROM pay_history_driver_shopping where  order_id=".$arr[project][id]." and status = 1  ");
     		$arr[pay_row] = $db->fetch($res[pay_row]);
     		if($arr[pay_park][driver_approve]>0){
  			$color_menu = 'background-color:#59AA47;';
			$txt_pay = '<font color="#59AA47;">'.t_already_received.'</font>';
  			$status_icon = '<span><i class="fa  fa-clock-o " style="width:22px;" ></i>&nbsp;'.date('H:i:s', $arr[pay_park][driver_approve_pay_date]).'</span>';
  			$btn_row_approve = 'display:none;';

  			$alert_history = "swal('".t_history."' , '".t_pay_on." ".date('Y-m-d H:i:s',$arr[pay_park][last_update]).t_n." '  ,'success');";
		}else{
			$color_menu = 'background-color:#ecb304;';
			$txt_pay = '<font style="color:#ecb304;">'.t_paid.'</font>';
  			$status_icon = '<div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#ecb304"></i> <strong><font color="#ecb304">'.t_please_check.'</font></strong></div>';
  			$btn_row_approve = '';
  			$alert_history = "swal('".t_no_history."','','error')";
		}
     }	else{
     		$color_menu = 'background-color:#f00000;';
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
<div style="/*padding: 5px 5px;*/ margin-top: 40px;">
   <div style="padding: 15px 5px;">
      <div style="padding: 5px 15px">
      	<table id="tb_park" border="0" cellspacing="2" cellpadding="2" width="100%">
      		<tr>
      			<td><label class="container-cb" >ค่าจอด</label></td>
      			<td></td>
      		</tr>
      		<tr>
		      			 <td valign="middle"><span class="font-24">จำนวน</span></td>
			              <td align="right" valign="middle">
			               <span class="font-24"><?= number_format($arr[project][price_park_total], 0 );?></span>
			            </td>
		      		</tr>
      	</table>
      	<?php 
      	
      		$json_nation_price = $arr[book][json_nation_price];
     		$array_nation_price = json_decode($json_nation_price);
/*     		echo print_r($array_nation_price);
     		foreach ($array_nation_price as $val){
				echo $val;
			}*/
     		/*$res[price_person_cn] = $db->select_query("SELECT country,id,price_person_driver FROM  product_price_list_all where  plan_setting = 1 and country<>240 and status=1 and extra_country=1   ORDER BY  sort_country desc limit 1   ");
   					      	$arr[price_person_cn] = $db->fetch($res[price_person_cn]);*/
      	?>
      	<table id="tb_person" border="0" cellspacing="2" cellpadding="2" width="100%">
      		<tr>
      			<td><label class="container-cb" >ค่าหัว</label></td>
      			<td></td>
      		</tr>
      		<tr>
		      			 <td valign="middle"><span class="font-24">จำนวน</span></td>
			              <td align="right" valign="middle">
			               <span class="font-24"><?= number_format($arr[project][price_person_total], 0 );?></span>
			            </td>
		      		</tr>
      	</table>
      	
      	<table id="tb_com" border="0" cellspacing="2" cellpadding="2" width="100%">
      		<tr>
      			<td><label class="container-cb" >ค่าคอม</label></td>
      			<td></td>
      		</tr>
      		<tr>
		      			 <td valign="middle"><span class="font-24">เปอร์เซ็น</span></td>
			              <td align="right" valign="middle">
			                <input type="hidden" value="6" id="commission" name="commission">
			                <span class="font-24" id="txt_commission">6</span>&nbsp;%
			            </td>
		      		</tr>
		      		<tr>
		      			 <td valign="middle"><span class="font-24">จำนวน</span></td>
			              <td align="right" valign="middle">
			               <div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF9800"></i> <strong><font color="#FF9800"><?=t_pending;?></font></strong></div>
			            </td>
		      		</tr>
      	</table>

		<table width="100%" cellspacing="2" cellpadding="2">
			 <tr>
                        <td>
                           <span class="font-24">รวม</span>
                        </td>
                        <td align="right" >
                           <span class="font-24" id="txt_all_total">
                           <?= number_format($arr[project][price_all_total], 0 );?>
                           </span>
                        </td>
                     </tr>
		</table>
      </div>
      
      <div style="padding: 5px 20px;<?=$show_el;?>" id="box_status_dv">
         <table width="100%" style="border: 1px solid #FF9800;padding: 10px;box-shadow: 1px 1px 3px #eee;">
         	<tr>
         		<td>
         			<span class="font-24">สถานะการจ่ายเงิน</span>
         			
         		</td>
         		<td align="right"><span class="font-24"><?=$txt_pay;?></span></td>
         	</tr>
         </table>
      </div>
      
      <table width="100%" border="0" cellspacing="2" cellpadding="2" style="padding: 0px 15px;">
         <tbody>
         <tr  id="tr_btn_park_approve" style="<?=$btn_row_approve;?>">
	          	<td colspan="2" >
	          	<button  id="btn_com_his_<?=$arr[project][id]?>"  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding: 7px;border-radius: 3px;border:none;backg;background-color: #ecb304;color: #fff;" onclick="ApporvePayDriver('<?=$arr[project][id]?>','<?=$arr[project][invoice]?>','<?=number_format($arr[project][price_park_total], 0 );?>','park');" ><center><strong class="font-22"><i class="fa fa-money" style="width: 24px; color:fff"  ></i><?=t_confirm_or_receipt;?></strong></center></button>
	          	</td>
	          	<td></td>
          </tr>
            <tr id="show_person_his">
               <td width="50%">
                  <button type="button" onclick="ViewPhoto('<?=$arr[project][id]?>','doc_pay','<?=$arr[pay_row][last_update];?>',<?=$arr[project][plan_id]?>);" onclick=""  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:10px;  border-radius: 3px; 
                  border:1px solid <?=$color_status;?>; background-color:#FFF;">
                     <center><span class="font-22"><?=t_documents;?> 
                        <img src="images/yes.png" align="absmiddle" id="iconchk_person" style="<?=$show_el;?>"></span>
                     </center>
                  </button>
               </td>
               <td width="50%">
                  <button type="button" onclick="<?=$alert_history;?>"  id="btn_his"  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:10px; border-radius: 3px; border:1px solid <?=$color_status;?>;background-color:#FFF; ">
                     <center><span class="font-22"><i class="fa fa-history" style="width: 24px; color:<?=$color_status;?>"  ></i><?=t_history;?></span></center>
                  </button>
               </td>
            </tr>
            
         </tbody>
      </table>
   </div>
</div>
<script>
   function check(id,num){
    console.log(id);	
    $('.cause_'+id).attr('checked', false);
    $('#remark'+num).attr('checked', true);
    $('#check_cause_'+id).val(num);
   }
   function ApporvePayAdmin(id,invoice,price,type){
   console.log(id);
   if($('#check_img_'+type+'_'+id).val()==0){
   	swal ( "<?=t_error;?>" ,  "<?=t_upload_the_document_picture;?>" ,  "error" );
   	return;
   }
   	swal({
   		title: "<?=t_are_you_sure;?>",
   		text: "<?=t_want_confirm_payment;?>",
   		type: "warning",
   		showCancelButton: true,
   		confirmButtonText: '<?=t_yes;?>',
   		cancelButtonText: "<?=t_no;?>",
   		closeOnConfirm: false,
   		closeOnCancel: true
   	},
   	function(){
   	 $.post( "empty_style.php?name=booking/shop_history&file=php_shop&action=approve_pay_driver_admin",$('#form_save_pay').serialize(),function( data ) 			{
   				console.log(data);
   				swal ( "<?=t_save_succeed;?>" ,  "" ,  "success" );
   				$('.button-close-popup-mod-3').click();
   				/*
   				$('#html_work_action').html(data);
   			  	swal ( "<?=t_save_succeed;?>" ,  "" ,  "success" );
   			  	filterMenu("manage");*/
   			});
   	});
   }
   function ApporvePayDriver(id,invoice,price,type){
   console.log(id);
   	swal({
   		title: "<?=t_are_you_sure;?>",
   		text: "<?=t_already_received;?>",
   		type: "warning",
   		showCancelButton: true,
   		confirmButtonText: '<?=t_yes;?>',
   		cancelButtonText: "<?=t_no;?>",
   		closeOnConfirm: false,
   		closeOnCancel: true
   	},
   	function(){
   	 $.post( "empty_style.php?name=booking/shop_history&file=php_shop&action=approve_pay_driver_taxi",$('#form_save_pay').serialize() ,function( data ) 		{
   						console.log(data);
   //   				$('#html_work_action').html(data);
   			  	swal ( "<?=t_save_succeed;?>" ,  "" ,  "success" );
   			  	filterMenu("manage");
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