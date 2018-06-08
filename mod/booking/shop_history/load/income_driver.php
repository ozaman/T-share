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
	  
      

$arr[project] = $arr[book];
?>
<div style="/*padding: 5px 5px;*/ margin-top: 50px;">
   <table width="100%" style="padding: 15px;" border="0" cellspacing="2" cellpadding="2">
   		<tr <?=$show_park_tr;?> >
   			<td colspan="2">
   				<table width="100%" style="padding: 5px;">
   					<tr>
   						<td valign="middle"><span class="font-24">ค่าจอด</span></td>
			   			<td align="right"  valign="middle" >
			   				<input type="hidden" value="<?= number_format($arr[project][price_park_total], 0 );?>" id="park_price" />
			   				<span class="font-24" id="txt_park_price"><?= number_format($arr[project][price_park_total], 0 );?></span>
			   			</td>
			   			<td width="30">
			   				<button class="btn btn-xs" onclick="ChangePark();">แก้ไข</button>
			   			</td>
   					</tr>
   				</table>
   			</td>
   		</tr>
   		<tr <?=$show_person_tr;?> >
   			<td colspan="2">
   				<table width="100%" style="padding: 5px;">
   				<tr>
   					<td valign="middle"><span class="font-24">ค่าหัว</span></td>
   					<td align="right"><span class="font-24"><?= number_format($arr[project][price_person_total], 0 );?></span></td>
   				</tr>
   				<tr>
			      <td valign="middle"><span class="font-24"><?=จำนวนแขก;?></span></td>
			      <td align="right"  ><span class="font-24"><?=$arr[project][pax]?></span></td>
			    </tr>
			    <tr >
			      <td valign="middle"><span class="font-24"><?=t_register;?></span></td>
			      <td align="right" valign="middle" ><span class="font-24" ><?=$arr[project][pax]?></span>
			       <input id="ip_pax" value="<?=$arr[project][pax]?>" type="hidden"  />
				   
			    </td>
			    </tr>
			    <tr>
			      <td valign="middle" colspan="2" >
			      	<table width="100%" style="padding-left: 15px;">
			      		<!--<tr>
			      			<td colspan="3"><span class="font-24" >สัญชาติ</span></td>
			      		</tr>-->
			      		<tr>
			      			<td width="70"><span class="font-24" >จีน </span></td>
			      			<td><img src="images/flag/China.png" width="25" height="" alt="" style="margin-top:-5px;margin-left: 5px;"></td>
			      			<td align="right"><span class="font-24" ><?=$arr[project][pax]?></span></td>
			      		</tr>
			      		<tr>
			      			<td width="70"><span class="font-24" >ต่างชาติ</span></td>
			      			<td><img src="images/flag/Other.png" width="25" height="" alt="" style="margin-top:-5px;margin-left: 5px;"></td>
			      			<td align="right"><span class="font-24" >0</span></td>
			      		</tr>
			      	</table>
			      </td>
			      <!--<td align="right"><span class="font-24">
			        <?= number_format($arr[project][price_person_unit], 0 );?>
			      </span></td>-->
			    </tr>
			    <tr>
			      <td valign="middle"><span class="font-24" ><?=t_per_person;?></span></td>
			      <td align="right"><span class="font-24">
			        <?= number_format($arr[project][price_person_unit], 0 );?>
			      </span></td>
			    </tr>
			    <tr>
			      <td valign="middle" ><span class="font-24"><?=t_amount;?> </span></td>
			      <td align="right" ><span class="font-24">
			          <?= number_format($arr[project][price_person_total], 0 );?>
			      </span></td>
			    </tr>
   			</table>
   			</td>
   		</tr>
   		
   		<tr <?=$show_com_tr;?> >
   			<td valign="middle">ค่าคอม</td>
   			<td></td>
   		</tr>
   </table>
   <table width="100%" border="0" cellspacing="2" cellpadding="2" style="margin-top: 10px;">
        <tbody>
        
         <tr id="show_person_his_<?=$arr[project][id]?>">
		   <td width="50%">
		      <button  id="btn_doc" onclick=""  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:10px;  border-radius: 3px; border:none; background-color:#FFF ">
		         <center><span class="font-22"><i class="fa fa-check" style="width:24px;color:<?=$main_color?>"  ></i>ยืนยันการจ่ายเงิน 
		            <img src="images/yes.png" align="absmiddle" id="iconchk_person_<?=$arr[project][id]?>" style="display: none;"></span>
		         </center>
		      </button>
		   </td>
		   <td width="50%">
		      <button onclick="<?=$alert_history;?>"  id="btn_his_<?=$arr[project][id]?>"  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:10px; border-radius: 3px; border:none; background-color:#FFF ">
		         <center><span class="font-22"><i class="fa fa-history" style="width: 24px; color:<?=$main_color?>"  ></i><?=t_history;?></span></center>
		      </button>
		   </td>
		</tr>
          
        </tbody>
      </table>
</div>
<!--<div id="popup_edit_number" style="    z-index: 1;
    position: fixed;
    background-color: #00000087;
    display: none;
    width: 100%;
    height: 100%;
    top: 0px;">
	<div style="">
		<input type="text" width="150px;" />
	</div>
</div>-->
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
   	   
   	 $.post( "empty_style.php?name=booking/shop_history&file=php_shop&action=approve_pay_driver_admin",{ order_id : id , invoice:invoice, price:price , type:type } ,function( data ) {
   //						console.log(data);
   				$('.button-close-popup-mod-3').click();
   				$('#html_work_action').html(data);
   			  	swal ( "<?=t_save_succeed;?>" ,  "" ,  "success" );
   			  	filterMenu("manage");
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
   	  
   	 $.post( "empty_style.php?name=booking/shop_history&file=php_shop&action=approve_pay_driver_taxi",{ order_id : id , invoice:invoice, price:price , type:type } ,function( data ) 		{
   //						console.log(data);
   				$('#html_work_action').html(data);
   			  	swal ( "<?=t_save_succeed;?>" ,  "" ,  "success" );
   			  	filterMenu("manage");
   			});
   
   	});
   }
  
   function ChangePark(){
   		swal({
		  title: "กรอกจำนวน",
		  text: "",
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
		  $('#park_price').val(inputValue);
		  $('#txt_park_price').text(inputValue);
		  calculate();
		});
   }
   
   function calculate(){
   	
   }
</script>

<script>
	
	$('#btn_doc').click(function(){
			
		 	$( "#main_load_mod_popup_3" ).toggle();
 
		 	var url_load= "load_page_mod_3.php?name=booking/load/form&file=upload_pay_popup&id=<?=$arr[project][id]?>&type=<?=$arr[price][id];?>&invoice=<?=$arr[project][invoice]?>&check_confirm=<?=$check_person;?>&price=<?= number_format($arr[project][price_park_total], 0 );?>";
		 	console.log(url_load);
//		 	return;
		 	$('#load_mod_popup_3').html(load_main_mod);
		 	$('#load_mod_popup_3').load(url_load); 
			$('#dialog_custom').hide();
		 	$('#main_load_mod_popup_clean').hide();
		});
</script>