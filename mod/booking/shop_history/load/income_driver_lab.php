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
         
         $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   					      	$res[price_person_cn] = $db->select_query("SELECT country,id,price_person_driver,price_park_driver FROM  product_price_list_all where  plan_setting = 1 and country<>240 and status=1 and extra_country=1   ORDER BY  sort_country desc limit 1   ");
   					      	$arr[price_person_cn] = $db->fetch($res[price_person_cn]);
   					      	 echo $arr[price_person_cn][price_person_driver];
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   					      	$res[price_person_oth] = $db->select_query("SELECT country,id,price_person_driver,price_park_driver FROM  product_price_list_all where  plan_setting = 1 and country=240   ORDER BY id  ");
   					      	$arr[price_person_oth] = $db->fetch($res[price_person_oth]);
   					      	echo $arr[price_person_oth][price_person_driver];
   $arr[project] = $arr[book];
   $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
   $check_pay = $db->num_rows("pay_history_driver_shopping","id","order_id=".$arr[project][id]." and status = 1"); 
   if($check_pay>0){
   		$res[pay_row] = $db->select_query("SELECT * FROM pay_history_driver_shopping where  order_id=".$arr[project][id]." and status = 1  ");
     		$arr[pay_row] = $db->fetch($res[pay_row]);
     		$json_price_plan = $arr[pay_row][income_driver];
     		/*$array_price_plan = json_decode($json_price_plan);
     		
     		$check_park = $array_price_plan->check_park;
     		$check_com = $array_price_plan->check_com;
     		$check_person = $array_price_plan->check_person;*/
     		
     		$color_status = "#4CAF50";
     		$txt_btn_action = "ยืนยันแล้ว";
     		$alert_history = "swal('".t_history."' , '".t_pay_on." ".date('Y-m-d H:i:s',$arr[pay_row][last_update]).t_n." '  ,'success');";
     		$show_el = "";
     		if($arr[pay_row][driver_approve]>0){
				$status_icon = '<font color="#4CAF50">ยืนยันการรับเงินแล้ว</font>';
			}else{
				$status_icon = '<font style="color:#ecb304;">'.'คนขับยังไม่กดรับเงิน'.'</font>';
			}
     }	else{
     		$color_status = $main_color;
     		$txt_btn_action = "ยืนยันการจ่ายเงิน";
     		$alert_history = "swal('".t_no_history."','','error')";
     		$show_el = "display:none;";
     		$status_icon = '<div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF9800"></i> <strong><font color="#FF9800">'.t_pending.'</font></strong></div>';
     }
    
     $park_price_default = $arr[project][price_park_total];
     if($arr[project][price_park_total]<=0){
	 	$park_price_default = $arr[price_person_cn][price_park_driver];
	 }
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
    padding-left: 35px;
/*    margin-bottom: 12px;*/
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
<div style="/*padding: 5px 5px;*/ margin-top: 25px;">
   <div style="padding: 15px 5px;">
   <?php 
   	
   ?>
      <form method="post" id="form_save_pay">
         <input type="hidden" name="order_id" value="<?=$arr[book][id];?>" />
         <input type="hidden" name="invoice" value="<?=$arr[book][invoice];?>" />
         <input type="hidden" name="plan" value="<?=$arr[book][plan_id];?>" />
         <input type="hidden" name="cn" value="<?=$arr[price_person_cn][id];?>" />
         <input type="hidden" name="oth" value="<?=$arr[price_person_oth][id];?>" />
         <table width="100%" border="0" cellspacing="2" cellpadding="2">
            <tr <?=$show_park_tr;?> >
               <td colspan="2">
               <label class="container-cb" >ค่าจอด
				  <input type="checkbox" value="0" name="check_park" id="check_park" onclick="selectPay('park');">
				  <span class="checkmark"></span>
				</label>
                  <table width="100%" style="padding: 5px;display: none;" id="check_park_tb">
                     
                     <tr>
                        <td valign="middle"><span class="font-24">จำนวนเงิน</span></td>
                        <td align="right"  valign="middle" >
                           <input type="hidden" value="<?=$park_price_default;?>" id="park_price" name="park_price" />
                           <span class="font-24" id="txt_park_price"><?= number_format($park_price_default, 0 );?></span>
                        </td>
                        <td width="30">
                           <button class="btn btn-xs edit" onclick="ChangePrice('park_price',1);" type="button">แก้ไข</button>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr <?=$show_person_tr;?> >
               <td colspan="2">
                <label class="container-cb">ค่าหัว
				  <input type="checkbox"  value="0" name="check_person" id="check_person" onclick="selectPay('person');" >
				  <span class="checkmark"></span>
				</label>
                  <table width="100%" style="padding: 5px;display: none;" id="check_person_tb" cellspacing="2" cellpadding="2">
                     <tr>
                     	<td colspan="3">
                     		<table width="100%" cellpadding="5">
                     			<tr>
                                 <td width="100">
                                    <img src="images/flag/China.png" width="25" height="" alt="" style="margin-top:-5px;margin-left: 0px;">
                                    <span class="font-24" >จีน </span>
                                 </td>
                                 <td align="center">
                                    <span class="font-24" id="txt_price_person_cn"><?=$arr[price_person_cn][price_person_driver];?></span>
                                    <input type="hidden" id="price_person_cn" value="<?=$arr[price_person_cn][price_person_driver];?>" name="price_person_cn" />
                                 </td>
                                 <td>
                                 	<button type="button" class="btn btn-xs edit" onclick="ChangePrice('price_person_cn',1);">แก้ไข</button>
                                 </td>
                              </tr>
                               <tr>
                            <td width="100">
                                    <img src="images/flag/Other.png" width="25" height="" alt="" style="margin-top:-5px;margin-left: 0px;">
                                    <span class="font-24" >ต่างชาติ</span>
                                 </td>
                                 <td align="center">
                                    <span class="font-24" id="txt_price_person_oth"><?=$arr[price_person_oth][price_person_driver];?></span>
                                    <input type="hidden" id="price_person_oth" value="<?=$arr[price_person_oth][price_person_driver];?>" name="price_person_oth" />
                                 </td>
                                 <td >
                                   <button type="button" class="btn btn-xs edit" onclick="ChangePrice('price_person_oth',1);">แก้ไข</button>
                                 </td>
                              </tr>
                     		</table>
                     	</td>
                     </tr>
                     <tr>
                              	<td></td>
                              	<td align="center"> 
                                    <span class="font-24" >จีน </span>
                                </td>
                                <td align="center">
                                	
                                    <span class="font-24" >ต่างชาติ</span>
                                </td>
                     </tr>
                     <tr>
                     	<td><span class="font-24">จำนวน</span></td>
                     	<td align="center">
                     		<div>
                     		 	<span class="btn " onclick="minusNation('regis_cn_pax','cn');"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                <span class="font-24" id="regis_cn_pax"><?=$arr[project][pax]?></span>
                                <input type="hidden" id="regis_cn_pax_input" value="<?=$arr[project][pax]?>" name="regis_cn_pax_input" />
                                <span  class="btn " onclick="pushNation('regis_cn_pax','cn');"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                     	</td>
                     	<td align="center">
                     		<div>
                                <span class="btn " onclick="minusNation('oth_pax','oth');" ><i class="fa fa-minus" aria-hidden="true"></i></span>
                            	<span class="font-24" id="oth_pax">0</span>
                                <input type="hidden" id="oth_pax_input" value="0" name="regis_oth_pax_input" />
                                <span  class="btn " onclick="pushNation('oth_pax','oth');"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                     	</td>
                     </tr>
                     <tr>
                     	<td><span class="font-24">ลงทะเบียน</span></td>
                     	<td align="center">
                     		<div>
                                <span class="btn " onclick="minusNation('cn_pax','oth');" ><i class="fa fa-minus" aria-hidden="true"></i></span>
                            	<span class="font-24" id="cn_pax">0</span>
                                <input type="hidden" id="cn_pax_input" value="0" name="regis_oth_pax_input" />
                                <span  class="btn " onclick="pushNation('cn_pax','oth');"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                     	</td>
                     	<td align="center">
                     		<div>
                                <span class="btn " onclick="minusNation('regis_oth_pax','oth');" ><i class="fa fa-minus" aria-hidden="true"></i></span>
                            	<span class="font-24" id="regis_oth_pax">0</span>
                                <input type="hidden" id="regis_oth_pax_input" value="0" name="regis_oth_pax_input" />
                                <span  class="btn " onclick="pushNation('regis_oth_pax','oth');"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                     	</td>
                     </tr>
					 <tr>
                        <td colspan="3">
                        	<table width="100%">
                        		<tr>
			                        <td valign="middle"><span class="font-24">จำนวนเงิน</span></td>
			                        <td align="right"  valign="middle" >
			                           <input type="hidden" value="<?=$arr[project][price_person_total];?>" id="total_person" name="total_person" />
			                           <span class="font-24" id="txt_total_person"><?= number_format($arr[project][price_person_total], 0 );?></span>
			                        </td>
			                        <td width="30" valign="middle">
			                           <!--<button class="btn btn-xs edit" onclick="ChangePrice('total_person',1);" type="button">แก้ไข</button>-->
			                        </td>
			                     </tr>
                        	</table>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr>
               <td colspan="2">
               	 <label class="container-cb">ค่าคอมมิชชั่น
				  <input type="checkbox"  value="0" name="check_com" id="check_com" onclick="selectPay('com');" >
				  <span class="checkmark"></span>
				</label>
				<table width="100%" id="check_com_tb" style="display: none;padding: 5px;">
                     <tbody>
	                     <tr>
	                        <td valign="middle"><span class="font-24">เปอร์เซ็น</span></td>
	                        <td align="right" valign="middle">
	                           <input type="hidden" value="6" id="commission" name="commission">
	                           <span class="font-24" id="txt_commission">6</span>%
	                        </td>
	                        <td width="30">
	                           <button class="btn btn-xs edit" onclick="ChangePrice('commission',0);" type="button">แก้ไข</button>
	                        </td>
	                     </tr>
                  	</tbody>
				</table>
               </td>
            </tr>
            <tr>
               <td colspan="2">
                  <table width="100%" style="padding: 5px;">
                     <tr>
                        <td>
                           <span class="font-24">รวม</span>
                        </td>
                        <td align="right" >
                           <span class="font-24" id="txt_all_total">
                           0
                           </span>
                           <input type="hidden" value="0" id="all_total" name="all_total" />
                           <button type="button" class="btn btn-xs edit" onclick="ChangePrice('all_total',0);">แก้ไข</button>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
      </form>
      
      <div style="padding: 5px 20px;<?=$show_el;?>" id="box_status_dv">
         <table width="100%" style="padding: 10px;box-shadow: 1px 1px 3px #9E9E9E;border: 1px solid #ddd;">
         	<tr>
         		<td>
         			<span class="font-24">สถานะคนขับ</span>
         			
         		</td>
         		<td align="right"><span class="font-24"><?=$status_icon;?></span></td>
         	</tr>
         </table>
      </div>
      
      <table width="100%" border="0" cellspacing="2" cellpadding="2" style="padding: 0px 15px;">
         <tbody>
            <tr id="show_person_his_<?=$arr[project][id]?>">
               <td width="50%">
                  <button type="button"  id="btn_doc" onclick=""  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:10px;  border-radius: 3px; 
                  border:1px solid <?=$color_status;?>; background-color:#FFF;">
                     <center><span class="font-22"><?=$txt_btn_action;?> 
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
<input type="hidden" value="<?=$_GET[id];?>" id="check_id_income_lab" />
<script>
	var json = '<?=$json_price_plan;?>';
	if(json!=""){
		var obj = JSON.parse(json);
		console.log(obj);
		$.each(obj, function( key, value ) {
			if(value==1){
				$('#'+key).click();
				$('#'+key+'_tb').show();
			}
		  	
		});
	}
	
</script>
<script>
   function selectPay(id){
   		console.log(id);
//   		$( "#"+id ).prop( "checked", true );
		if($('#check_'+id).val()==0){
			$('#check_'+id).val(1);
			$('#check_'+id+'_tb').show();
			
		}else{
			$('#check_'+id).val(0);
			$('#check_'+id+'_tb').hide();
		}
   		console.log($('#check_'+id).val());
   		calculate();
   }
   function check(id,num){
    console.log(id);	
    $('.cause_'+id).attr('checked', false);
    $('#remark'+num).attr('checked', true);
    $('#check_cause_'+id).val(num);
   }
   function ApporvePayAdmin(id,invoice,price,type,driver){
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
   				var message = "";
				socket.emit('sendchat', message);
   				
   				openViewPrice();
   				 $.post( "send_messages/send_pay_driver.php?type=send_driver&iv="+invoice+'&driver='+driver,function( re ){
   				 	console.log(re);
   				 });
   				 
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
    console.log(inputValue+" : "+id);
    $('#'+id).val(inputValue);
    $('#txt_'+id).text(formatComma(inputValue));
    	if(id=="total_person"){
			calculateEditPerson();
			return;
		}
	    if(cal==1){
	    	calculate();
	    }
   });
   }
   
   function calculate(){
   		var check_park = $('#check_park').val();
   		var check_person = $('#check_person').val();
   		var check_com = $('#check_com').val();
   		var park_total = 0,total_person = 0;
   		var price_unit_cn = 0,pax_cn = 0,price_unit_oth = 0,pax_oth = 0,total_cn = 0,total_oth = 0;
   		var total_all = 0;
   		
   		 if(check_park>=1){
			 park_total = $('#park_price').val();
		 }
   		 
   		 if(check_person>=1){
		 	 price_unit_cn = $('#txt_price_person_cn').text();
	   		 pax_cn = $('#regis_cn_pax').text();
	   		 price_unit_oth = $('#txt_price_person_oth').text();
	   		 pax_oth = $('#regis_oth_pax').text();
	   		 total_cn = parseInt(price_unit_cn) * parseInt(pax_cn);
	   		 total_oth = parseInt(price_unit_oth) * parseInt(pax_oth);
	   		 console.log(total_cn+" "+total_oth)
	   		 total_person = parseInt(total_cn) + parseInt(total_oth);
		 }
   		
   		$('#total_person').val(total_person)
   		$('#txt_total_person').text(formatComma(total_person));
   		 total_all = parseInt(park_total) + parseInt(total_person);
   		$('#txt_all_total').text(formatComma(total_all));
   		$('#all_total').val(total_all);
   }
   
   function calculateEditPerson(){
   		var check_park = $('#check_park').val();
   		var check_person = $('#check_person').val();
   		var check_com = $('#check_com').val();
   		var park_total = 0,total_person = 0;
   		var price_unit_cn = 0,pax_cn = 0,price_unit_oth = 0,pax_oth = 0,total_cn = 0,total_oth = 0;
   		var total_all = 0;
   		
   		 if(check_park>=1){
			 park_total = $('#park_price').val();
		 }
   		 
   	/*	 if(check_person>=1){
		 	 price_unit_cn = $('#txt_price_person_cn').text();
	   		 pax_cn = $('#regis_cn_pax').text();
	   		 price_unit_oth = $('#txt_price_person_oth').text();
	   		 pax_oth = $('#regis_oth_pax').text();
	   		 total_cn = parseInt(price_unit_cn) * parseInt(pax_cn);
	   		 total_oth = parseInt(price_unit_oth) * parseInt(pax_oth);
	   		 console.log(total_cn+" "+total_oth)
	   		 total_person = parseInt(total_cn) + parseInt(total_oth);
		 }*/
   		total_person = $('#total_person').val();
   		/*$('#total_person').val(total_person)
   		$('#txt_total_person').text(formatComma(total_person));*/
   		 total_all = parseInt(park_total) + parseInt(total_person);
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
   		if(id=="oth_pax" || id=="cn_pax"){
			return;
		}
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
   	 	var url_load= "load_page_mod_3.php?name=booking/shop_history/load&file=upload_pay_popup&id=<?=$arr[project][id]?>&plan=<?=$arr[book][plan_id];?>&invoice=<?=$arr[project][invoice]?>&check_confirm=<?=$check_pay;?>&price="+$('#all_total').val()+"&driver=<?=$arr[project][drivername]?>";
   	 	console.log(url_load);
   //		 	return;
   	 	$('#load_mod_popup_3').html(load_main_mod);
   	 	$('#load_mod_popup_3').load(url_load); 
   		$('#dialog_custom').hide();
   	 	$('#main_load_mod_popup_clean').hide();
   	});
</script>