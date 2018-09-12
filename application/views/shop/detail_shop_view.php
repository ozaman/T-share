<script>

function changeHtml(type,id,status_time){
//	   		var url_status = "popup.php?name=booking/load/form&file=checkin_status&id="+id+"&type=check_"+type+"&time="+status_time+"&status=1";
			 var url_status = "mod/booking/shop_history/load/component_shop.php?request=check_status_checkin&status=1&time="+status_time;
			$('#status_'+type).html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> โหลดข้อมูล');
			$('#status_'+type).load(url_status); 
			$('#iconchk_'+type).attr("src", "images/yes.png");  
			$("#number_"+type).removeClass('step-booking');
			$("#number_"+type).addClass('step-booking-active');
//			$("#box_"+type).addClass('disabledbutton-checkin');
			$("#btn_"+type).css('background-color','#666666');
			
			if(type=="driver_topoint"){
//				$('#driver_topoint').show();
			}else if(type=="guest_receive"){
				 $('#step_guest_register').show();
			}else if(type=="guest_register"){
				 $('#step_driver_pay_report').show();
			}else if(type=="driver_pay_report"){
				
			}
			$('#'+type+'_locat_off').hide();
			$('#'+type+'_locat_on').show();
		$.ajax({
			url: '../data/fileupload/store/'+type+'_'+id+'.jpg',
			type:'HEAD',
			error: function()
			{
			console.log('Error file');
			  
			   $('#photo_'+type+'_yes').hide();
			   $('#photo_'+type+'_no').show();

//			   $('#'+type+'_locat_off').show();
//			   $('#'+type+'_locat_on').hide();
			},
			success: function()
			{
				//file exists
				console.log('success file');
				
				$('#photo_'+type+'_yes').show();
			   $('#photo_'+type+'_no').hide();
			   
//			   $('#'+type+'_locat_off').hide();
//			     $('#'+type+'_locat_on').show();
			}
		});
		
		$('#'+type+'_check_click').val(1);
		$("#box_"+type).removeClass('border-alert');
   }

			var obj = JSON.parse('<?=json_encode($_POST);?>');
			console.log(obj);
		   if(obj.check_driver_topoint==1){
		      console.log("driver_topoint");
		      changeHtml("driver_topoint",obj.id,obj.driver_topoint_date)
		   }
		   if(obj.check_guest_receive==1){
		      console.log("guest_receive");
		      changeHtml("guest_receive",obj.id,obj.guest_receive_date)

		   }
		   if(obj.check_guest_register==1){
		      console.log("guest_register");
		      changeHtml("guest_register",obj.id,obj.guest_register_date)
		    
		   }
		   if(obj.check_driver_pay_report==1){
		      console.log("driver_pay_report");
		      changeHtml("driver_pay_report",obj.id,obj.driver_pay_report_date)
		   }
		
</script>
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
$place_shopping = "topic_th";
$data_user_class = $_COOKIE[detect_userclass];
 $main_color = "#3b5998";
  $arr[book] = $_POST ;

 /* $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[car] = $db->select_query("SELECT car_plate, car_type FROM  order_booking  where id = '".$arr[book][id]."'  ");
 $arr[car] = $db->fetch($res[car]);*/
 
 $sql_od = "SELECT car_plate, car_type FROM  order_booking  where id = '".$arr[book][id]."'  ";
 $query_od = $this->db->query($sql_od);
 $res_od = $query_od->row();
 
 /*$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[place_shop] = $db->select_query("SELECT ".$place_shopping.",id FROM shopping_product  WHERE id='".$arr[book][program]."' ");
 $arr[place_shop] = $db->fetch($res[place_shop]);*/
  $sql_ps = "SELECT ".$place_shopping.",id FROM shopping_product  WHERE id='".$arr[book][program]."' ";
 $query_ps = $this->db->query($sql_ps);
 $res_ps = $query_ps->row();

/* $res[projectdriver] = $db->select_query("SELECT name,nickname,phone,name_en FROM web_driver WHERE id='".$arr[book][drivername]."'    "); 
 $arr[projectdriver] = $db->fetch($res[projectdriver]);*/
 $sql_dv = "SELECT name,nickname,phone,name_en FROM web_driver WHERE id='".$arr[book][drivername]."'    ";
 $query_dv = $this->db->query($sql_dv);
 $res_dv = $query_dv->row();

 if($_COOKIE['lng']=="th"){
 	 $full_name_driver = $res_dv->name." (".$res_dv->nickname.")";
// 	 $car_color = $arr[book][car_color];
 }else{
 	$full_name_driver =  $res_dv->name_en;
// 	$car_color = $arr[qr_car][color];
 }
 $full_name_driver = $res_dv->name." (".$res_dv->nickname.")";

 if($arr[book][status]=='CANCEL'){
			 if($arr[book][cancel_type]=='1'){
				$status_txt = '<font color="#ff0000"> ยกเลิก '.t_customer_no_register.'</font>';
			}
			else if($arr[book][cancel_type]=='2'){
				$status_txt = '<font color="#ff0000"> ยกเลิก '.t_customer_not_go.'</font>';
			}
			else if($arr[book][cancel_type]=='3'){
				$status_txt = '<font color="#ff0000"> ยกเลิก '.t_wrong_selected_place.'</font>';
			}else{
				$status_txt = '<font color="#ff0000">ยกเลิก ไม่ระบุ</font>';
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
	
//	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
//  	$check_pay_dv = $db->num_rows("pay_history_driver_shopping","id","order_id=".$_POST[id]." and status = 1"); 
	$query = $this->db->query("SELECT id FROM pay_history_driver_shopping where order_id=".$_POST[id]." and status = 1");
	$check_pay_dv = $query->num_rows();
  	if($check_pay_dv>0){
		$show_alert = "";
	}else{
		$show_alert = "display:none;";
	}
	
?>

<script>
	$('#date_trans').text(formatDate('<?=$arr[book][transfer_date];?>'));
	$('#header_clean').text('<?=$_POST[invoice];?>');
	console.log('IOS : <?=$_GET[ios];?>');
</script>

<input type="hidden" value="<?=$_POST[id];?>" id="id_order" />
<ons-card class="assas_<?=$_POST[id];?>" style=" padding:10px 12px;" >
	<button class="btn waves-effect waves-light red lighten-3" align="center" onclick="cancelBook('<?=$_POST[id];?>');" id="btn_cancel_book_<?=$_POST[id];?>" style="position: absolute;
    right: 10px;
    color: #fff;
    padding: 4px 10px;
    border-radius: 0;
    top: 0px;
    margin: 15px;<?=$cancel_shop;?>">
		<span class="font-22 text-cap"><?=t_cancel;?></span>
	</button>

	<div id="status_booking_detail" class="font-26" style="margin-top: 10px;"><b><?=$status_txt;?></b></div>
	<span class="font-28"><?=$res_ps->$place_shopping;?></span>
		
	<table width="100%" border="0" cellspacing="1" cellpadding="1">
   <tbody>
      
      <tr>
         <td width="33%" align="left" style="padding: 0px;" >
            <div class="btn  btn-default" style=" width:100%; text-align:left; padding:2px; padding-left:5px; height:40px;border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_phone" onclick="openContact('<?=$res_ps->id;?>');">
               <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tbody>
                     <tr>
                        <td align="center" width="30"><i class="fa fa-phone-square" style="font-size:32px; color: #8DC63F; border:none;"></i></td>
                        <td align="center" class="font-22"><b><?=t_call;?></b></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
         <td width="33%" align="left" style="padding: 0px;" >
            <div class="btn  btn-default" style=" width:100%; text-align:left;  padding:2px;height:40px;border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_zello" onclick="openZello('<?=$res_ps->id;?>');">
               <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tbody>
                     <tr>
                        <td align="center" width="30"><img src="assets/images/social/zello.png" width="30" height="30" alt=""/> </td>
                        <td align="center" class="font-22">
                           <b>Zello</b>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
         <td width="33%" align="left"  style="padding: 0px;"  >
            <div class="btn  btn-default" style=" width:100%; text-align:left;  padding:2px;height:40px;border-radius: 0px;" data-toggle="dropdown" id="shop_sub_menu_map" onclick="openMapsDistance('<?=$res_ps->id;?>');">
               <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tbody>
                     <tr>
                        <td align="center" width="30"><img src="assets/images/social/map.png" width="30" height="30" alt=""/></td>
                        <td align="center" class="font-22"><b><?=t_maps;?></b></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
      </tr>
   </tbody>
	</table>
	
	<div style="padding: 5px 0px;">
		<span class="text-cap font-22"><?=t_reservation_information;?></span>
		<table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" style="display:nones" id="table_show_hide_data">
   		<tbody>
   		<tr>
	      <td width="100" class="font-16 text-cap"><font color="#333333"><?=t_booking_no;?></font></td>
	      <td class="font-16"><?=$arr[book][invoice];?></td>
   		</tr>
   		</tbody>
		<tbody>
      <tr>
         <td class="font-16 text-cap"><font color="#333333"><?=t_date;?></font></td>
         <td class="font-16"><span id="date_trans"></span></td>
      </tr>
      <tr>
         <td class="font-16 text-cap"><font color="#333333"><?=t_arrival_time;?></font></td>
         <td class="font-16"> <?=$arr[book][airout_h];?>:<?=str_pad($arr[book][airout_m], 2, '0', STR_PAD_LEFT)." ".t_n;?></td>
      </tr>
      <tr>
         <td class="font-16 text-cap"><font color="#333333"><?=t_number;?></font></td>
        <td class="font-16" style="padding: 0 !important;" >
            <table width="100%">
            	<!-- <tr>
            		<td width="100%" colspan="2">
            			<span class="font-16">
            				<?
				            if($arr[book][adult]>0){ ?>
				            <?=t_adult;?> :
				            <?=$arr[book][adult];?>
				            &nbsp;
				            <? } ?>
				            <? if($arr[book][child]>0){ ?>
				            <?=t_child;?> :
				            <?=$arr[book][child];?>
				            <? } ?>
            			</span>
            		</td>
            		
            	</tr> -->
            	<tr>
        			<td>	
        				<span id="isedit"><?
            if($arr[book][adult]>0){ ?>
            <?=t_adult;?> :
            <!-- <?=$arr[book][adult];?> -->
            &nbsp;
            <? } ?>
            <span id="num_final_edit"></span></span>
            <span id="text_edit_persion" style="display: none;"><?
        			 if($arr[book][adult]>0){ ?>
            <?=t_adult;?> :
           
            &nbsp;
            <? } ?>
           </span>
        			
        			<input type="number" name="" id="num_edit_persion" style="height: 30px;
    width: 50px;
    padding: 0px;
    font-size: 16px;
    margin: auto;
    display: none;" value="<?=$arr[book][adult];?>" >
        				
        			</td>
        			
        			<td>
        				<span  class="btn " align="center" onclick="editBook('<?=$arr[book][id];?>');"  style="    background: #3b5998;
    color: #fff;
    padding: 0px 10px;
    font-size: 3px !important;
    border-radius: 25px;display: inline-block;" id="btn_isedit">
		<span class="font-18 text-cap">แก้ไข</span>
	</span>
	<span class="btn " align="center" onclick="saveeditBook('<?=$arr[book][id];?>');"  style="    background: #3b5998;
    color: #fff;
    padding: 0px 10px;
    font-size: 3px !important;
    border-radius: 25px;display: none;" id="btn_selectisedit">
		<span class="font-24 text-cap">บันทึก</span>
	</span>
        			</td>
        		</tr>
        		<tr>
        			<td>
        				<? if($arr[book][child]>0){ ?>
            <?=t_child;?> :
            <?=$arr[book][child];?>
            <? } ?>
        			</td>
        		</tr>
     	
            	<tr>
            	<?php 
            		if($arr[book][num_ch]>0){ ?>
						<td style="padding: 0 !important;">
		            		<table>
		            			<tr>
		            				<td width="20"><span class="font-16">จีน</span></td>
		            				<td width=""><img src="images/flag/China.png" width="25" height="25" alt=""></td>
		            			</tr>
		            		</table>
	            		</td>
				<? } ?>
				<?php 
            		if($arr[book][num_other]>0){ ?>
						<td style="padding: 0 !important;">
		            		<table>
		            			<tr>
		            				<td width="20"><span class="font-16">ต่างชาติ</span></td>
		            				<td width=""><img src="images/flag/Other.png" width="25" height="25" alt=""></td>
		            			</tr>
		            		</table>
	            		</td>
				<? } ?>

            	</tr>
            </table>
         </td>
      </tr>
         </tbody>
</table>
	</div>

	<div style="padding: 5px 0px;">
		<span class="text-cap font-22"><?=t_car_driver_information;?></span>
		<table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_hide_driver">
		  <tr>
		    <td width="100"  class="font-16"><font color="#333333"></font><?=t_dv_name;?></td>
		    <td colspan="3" class="font-16">
			<?=$full_name_driver;?></td>
		  </tr>
		  <tbody>
		    <tr>
		      <td  width="100" class="font-16"><font color="#333333"><?=t_type_of_vehicle;?></font></td>
		      <td class="font-16"><? echo $res_od->car_type; ?></td>
		     <!-- <td width="30" class="font-16"><font color="#333333"><?=t_car_coloring;?></font></td>
		      <td class="font-16"><?=$car_color;?></td>-->
		    </tr>
		    <tr>
		      <td   width="100"  class="font-16"><font color="#333333"><?=t_car_registration_number;?></font></td>
		      <td colspan="3" class="font-16"><?=$res_od->car_plate;?></td>
		    </tr>
		     <tr>
		      <td   width="100"  class="font-16"><font color="#333333"><?=t_call;?></font></td>
		      <td colspan="3" class="font-16"><a href="tel:<?=$res_od->phone;?>" ><?=$res_od->phone;?></a></td>
		    </tr>
		  </tbody>
		</table>
	</div>
	<?php 
	if($arr[book][status]!='CANCELs'){
	if($data_user_class=='taxi'){	
	$txt_btn_pay = 'ยืนการการรับเงิน';
	
	?>
	<?php include("application/views/shop/checkin.php") ?>
	<? }
	else{ 
	$txt_btn_pay = 'แจ้งยอดรายได้';
	?>
	<div style="padding: 5px 0px;">
	<span class="text-cap font-22"><?=t_check_in_information." คนขับ";?></span>
	<table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="1" id="table_show_hide_checkin_<?=$arr[book][invoice];?>">
		   <tr id="step_driver_topoint">
		      <td class="font-16">
		      xxx
		         <?  //include ("mod/booking/shop_history/load/checkin/topoint.php");?>
		      </td>
		   </tr>
		
		</table>
	</div>
	<div style="width: 100%;height: 5px;background-color: #ddd ;margin: 10px 0px;" ></div>
	<div style="padding: 5px 0px;">
		<span class="text-cap font-22"><?=t_check_in_information." พนักงาน";?></span>
		<table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="1" id="table_show_hide_checkin_<?=$arr[book][invoice];?>">
		  <tr id="step_guest_receive" style="display:nones">
		      <td class="font-16">
		         <? // include ("mod/booking/shop_history/load/checkin_lab/guest_receive.php");?>
		      </td>
		   </tr>
		   <tr id="step_guest_register" style="display:none">
		      <td class="font-16">
		         <?  //include ("mod/booking/shop_history/load/checkin_lab/guest_register.php");?>
		      </td>
		   </tr>
		   <tr id="step_driver_pay_report" style="display:none">
		      <td class="font-16">
		         <? // include ("mod/booking/shop_history/load/checkin_lab/driver_pay_report.php");?>
		      </td>
		   </tr>
		 </table>
	</div>
	<? }
	?>
	<div style="padding: 5px 0px;">
	 <span class="text-cap font-22"><?=t_income;?></span>
	 <table class="onlyThisTable" width="100%">
	 	<tr>
	 		<td align="center">
	 		<button class="btn btn-repair waves-effect" onclick="openViewPrice();" style="text-transform: unset;
    background-color: #ffffff;
    color: #3b5998;
    width: 100%;
    border: 1px solid #3b5998;">
	 		<i class="icon-new-uniF121-10" aria-hidden="true"></i>&nbsp;<span class="font-16"><?=$txt_btn_pay;?></span> 
	 		<!--<span id="alert_pay_driver" class="badge font-20" style="    position: absolute;
    font-size: 14px;
    background-color: #F44336;
    padding: 4px 7px;
    z-index: 1;
    right: 45px;<?=$show_alert;?>"><strong>!</strong></span>-->
    </button>
	 		</td>
	 	</tr>
	 </table>
	</div>
	
	<div style="padding: 5px 0px;">
		<span class="text-cap font-22"><?=โค้ดและเอกสาร;?></span>
	<? if($data_user_class=='lab' and $arr[book][program]==1){ ?>
		<table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_code_doc">
			<tr>
				<td width="60" valign="middle"><span class="font-16">Code</span></td>
				<td width="150">
				<input type="text" class="form-control font-16" id="code_order" name="code_order" value="<?=$arr[book][code];?>" style="margin-bottom: 0px;height: 2.5rem;padding-left: 0px;"/></td>
				<td><span class="btn" align="center" onclick="updateCode('<?=$arr[book][program];?>','<?=$arr[book][id];?>');" style="background: #3b5998;
    color: #fff;
    padding: 0px 10px;
    font-size: 3px !important;
    border-radius: 25px;">
		<span class="font-24 text-cap">บันทึก</span>
	</span></td>
			</tr>
			<tr>
				<td width="60"><span class="font-16">อัพโหลด</span></td>
				<td><a class="waves-effect waves-light btn" style="background-color: #009688;color: #fff !important;border-radius: 10px;" onclick="uploadCodeFile('<?=$arr[book][program];?>','<?=$arr[book][id];?>','lab');"><i class="material-icons left" style="font-size: 16px;margin-right: 7px;">cloud</i>อัพโหลด</a></td>
			</tr>
		</table>
	<? }
	else if($data_user_class=='taxi' and $arr[book][program]==1){ ?>
	
		<table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_code_doc">
			<tr>
				<td width="60" valign="middle"><span class="font-16">Code</span></td>
				<td width="150">
				<input type="text" class="form-control font-16" readonly="readonly" value="<?=$arr[book][code];?>" style="margin-bottom: 0px;height: 2.5rem;padding-left: 0px;"/></td>
			</tr>
			<tr>
				<td width="60">
				<span class="font-16">อัพโหลด</span></td>
				<td>
				<a class="waves-effect waves-light btn" style="background-color: #3b5998;color: #fff !important;border-radius: 25px;" onclick="uploadCodeFile('<?=$arr[book][program];?>','<?=$arr[book][id];?>','taxi');"><i class="material-icons left" style="font-size: 16px;margin-right: 7px;">cloud</i>ตรวจสอบภาพ</a></td>
			</tr>
		</table>
<?	} ?>
	</div>
<? } ?>

</ons-card>
<input type="hidden" id="check_cause" value="0"/>

<script>
		function updateCode(place,order_id){
			console.log(place+" "+order_id);
			var code = $('#code_order').val();
			$.post('mod/booking/shop_history/php_shop.php?action=update_code',{ place:place, order_id:order_id, code:code },function(data){
				console.log(data);
//				sendSocket(order_id);
			});
		}
		function uploadCodeFile(place,order_id,class_user){
			console.log('upload code file');
			$( "#dialog_custom" ).show();
			$('#body_dialog_custom_load').html(load_sub_mod);
			var url = "empty_style.php?name=booking/shop_history/load&file=upload_bill_popup&place="+place+'&order_id='+order_id+'&class_user='+class_user;
			console.log(place+" "+order_id);
//			return;
			$.post(url,function(res){
				$('#body_dialog_custom_load').html(res); 
			});
			
		}
		var number_persion_new = '<?=$arr[book][adult];?>';
		$('#num_final_edit').html(number_persion_new)
		function editBook(x){
			console.log(x)
			$('#text_edit_persion').show()

			$('#btn_selectisedit').show()
			$('#num_edit_persion').show()
			$('#btn_isedit').hide()
			$('#isedit').hide()
			$('#num_edit_persion').css('display','inline-block')
			$('#num_edit_persion').focus();

		}
		function saveeditBook(x){
			var url_load= "go.php?name=booking/shop_history&file=saveeditBook&num="+$('#num_edit_persion').val()+"&id="+x;
			console.log(url_load)
			 $.post( url_load, function( data ) {
               //$('#load_mod_popup').html(data);
                  console.log(data);
               });
    
      

			$('#text_edit_persion').hide()
			number_persion_new = $('#num_edit_persion').val()
			$('#num_final_edit').html(number_persion_new)
			console.log(x)
			$('#btn_selectisedit').hide()
			$('#num_edit_persion').hide()
			$('#btn_isedit').show()
			$('#isedit').show()


		}
	</script>
<script>
	var remark1 = '<?=t_customer_no_register;?>';
    var remark2 = '<?=t_customer_not_go;?>';
    var remark3 = '<?=t_wrong_selected_place;?>';
    

	function openContact(shop_id){
	  	fn.pushPage({'id': 'popup2.html', 'title': 'Zello'}, 'fade-md');
	  	var url_load = "page/social?type=phone&shop_id="+shop_id;
	  	$.post(url_load, function(ele){
	  		$('#body_popup2').html(ele);
	  	});
	}
	
	function openZello(shop_id){
	  	fn.pushPage({'id': 'popup2.html', 'title': 'Zello'}, 'fade-md');
	  	var url_load = "page/social?type=zello&shop_id="+shop_id;
	  	$.post(url_load, function(ele){
	  		$('#body_popup2').html(ele);
	  	});
	}
	
	function openMapsDistance(shop_id){
//		 $( "#main_load_mod_popup_map" ).toggle();
		 $('#map_side_popup').fadeIn();
		 $('#map_side_popup_body').html(load_main_mod);
//	  	var url_load= "load_page_map.php?name=map_api&file=map_place&shop_id="+shop_id+"&lat="+$('#lat').val()+"&lng="+$('#lng').val();
	  	var url_load= "mod/map_api/map_place.php?shop_id="+shop_id+"&lat="+$('#lat').val()+"&lng="+$('#lng').val();
//  	  	$('#load_mod_popup_map').html(load_main_mod);
  	  	$('#map_side_popup_body').load(url_load); 
	}
	/*$('#shop_sub_menu_map').click(function(){  

	  console.log('lat '+$('#lat').val());
	  console.log('lng '+$('#lng').val());
	  $( "#main_load_mod_popup_map" ).toggle();
//	  $( "#main_load_mod_popup_clean" ).hide();
	  var url_load= "load_page_map.php?name=booking/popup&file=map&shop_id=<?=$arr[place_shop][id]?>";
	  url_load=url_load+"&lat="+document.getElementById('lat').value;
 	  url_load=url_load+"&lng="+document.getElementById('lng').value;
  	  $('#load_mod_popup_map').html(load_main_mod);
  	  $('#load_mod_popup_map').load(url_load); 

 	});*/

	function ViewPhoto(id,type,date,plan){
		console.log(id+" | "+type+" | "+date+" | "+plan)
		if(date==""){
			date = '<?=time();?>';
		}
		if(type=="doc_pay"){
			var url = 'load_page_photo.php?name=booking/load/form&file=iframe_photo&id='+id+'&type='+type+'&date='+date+'&plan='+plan;
		}
		else{
			var url = 'load_page_photo.php?name=booking/load/form&file=iframe_photo&id='+id+'&type='+type+'&date='+date;
		}
		console.log(url);
		$( "#load_mod_popup_photo" ).toggle();
		$('#load_mod_popup_photo').html(load_main_mod);
 	 	$('#load_mod_popup_photo').load(url); 
	}	

	function ViewSlip(id,date){
		var url = 'load_page_photo.php?name=booking/load/form&file=iframe_photo&id='+id+'&type=slip&date='+date;
		console.log(url);
		$( "#load_mod_popup_photo" ).toggle();
		$('#load_mod_popup_photo').html(load_main_mod);
 	 	$('#load_mod_popup_photo').load(url); 
	}	

	function openViewPrice(){

		var class_user = '<?=$data_user_class;?>';
		console.log(class_user);
		if(class_user=="lab"){
			var url_load= "empty_style.php?name=booking/shop_history/load&file=income_driver_lab_new&id=<?=$arr[book][id]?>";
			
		}else if(class_user=="taxi"){
			var url_load= "empty_style.php?name=booking/shop_history/load&file=income_driver_taxi&id=<?=$arr[book][id]?>";
		}
	   	
	   	console.log(url_load);
	   	$( "#dialog_custom" ).show();
		$('#body_dialog_custom_load').html(load_sub_mod);
$.post(url_load,function(res){
				$('#body_dialog_custom_load').html(res); 
			});
	  	/*$('#main_load_mod_popup_clean').hide();
	  	$('#main_load_mod_popup_2').show();
	  	$('#text_mod_topic_action_2').html('รายได้');
	  	$('#load_mod_popup_2').html(load_main_mod);
	  	$('#load_mod_popup_2').load(url_load);*/

	  	
	}
/*	$('.button-close-popup-mod-2').click(function(){
		$('#main_load_mod_popup_clean').show();
		$('#main_load_mod_popup_clean').show();
		$('#main_load_mod_popup_2').hide();
		$('#load_mod_popup_2').html('');
	});
*/
	function cancelBook(id){
	
     swal({
   title: "<font style='font-size:28px'><b><? echo t_are_you_sure?> </b></font>",
   text: "<font style='font-size:22px'><? echo t_need_cancel_transfer?></font>"+
//   "<table class="onlyThisTable" width='100%' style='margin:15px;'><tr><td width='40'><input id='remark1' onclick='check("+id+",1);' class='cause_"+id+"'  type='checkbox' value='1' style='display:block;height:25px;' /></td><td><label style='margin-top:8px;' for='remark1'>"+remark1+"</label></td></tr><tr><td width='40'><input id='remark2' onclick='check("+id+",2);' class='cause_"+id+"'  type='checkbox' value='2' style='display:block;height:25px;' /></td><td><label for='remark2' style='margin-top:8px;'>"+remark2+"</label></td></tr><tr><td width='40'><input id='remark3' onclick='check("+id+",3);' class='cause_"+id+"'  type='checkbox' value='3' style='display:block;height:25px;' /></td><td><label for='remark3' style='margin-top:8px;'>"+remark3+"</label></td></tr></table>",
	'<form action="#" style="margin-left: 25px;" id="form_type_cancel">'
    +'<p class="checkradio">'
      +'<input  class="with-gap" name="type" type="radio" id="test1" value="1" />'
      +'<label for="test1">'+remark1+'</label>'
    +'</p>' +'<input type="hidden" value="'+remark1+'" name="typname_1" />'
    +'<p class="checkradio">'
      +'<input  class="with-gap" name="type" type="radio" id="test2" value="2" />'
      +'<label for="test2">'+remark2+'</label>'
    +'</p>' +'<input type="hidden" value="'+remark2+'" name="typname_2" />'
    +'<p class="checkradio">'
      +'<input class="with-gap" name="type" type="radio" id="test3" value="3"  />'
       
      +'<label for="test3">'+remark3+'</label>'
    +'</p>'+'<input type="hidden" value="'+remark3+'" name="typname_3" />'
  +'</form>',
   type: "warning",
   showCancelButton: true,
   confirmButtonClass: "btn-danger waves-effect waves-light",
	cancelButtonClass: "btn-cus waves-effect waves-light",
   confirmButtonText: '<?echo t_yes?>',
   cancelButtonText: "<?echo t_no?>",
   closeOnConfirm: false,
   closeOnCancel: true,
   html: true
   },
   function(isConfirm){
     if (isConfirm){
     	 
       if(! $('input[name="type"]').is(':checked')){
	   		swal('กรุณาเลือกสาเหตุที่ยกเลิก','','error');
	   }	 

       console.log($('#form_type_cancel' ).serialize());

	   var url = "mod/booking/shop_history/php_shop.php?type=cancel&id="+id;
	   
	   console.log(url+" ");

	   $.post( url,$('#form_type_cancel' ).serialize(), function( data ) {
	   		console.log(data);

				$('#btn_cancel_book_'+id).hide();
				var url_check_st = "mod/booking/shop_history/load/component_shop.php?request=check_status_shop&status="+data.status;
				console.log(url_check_st);
				$.post( url_check_st,$('#form_type_cancel' ).serialize(), function( com ) {
					$('#status_booking_detail').html(com);
					swal("<?=t_success;?>", "", "success");
				});

	   });

     }
   });
    }
    


</script>