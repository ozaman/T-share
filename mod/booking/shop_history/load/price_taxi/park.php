<?php 
if($data_user_class=='taxi'){
	$type = 'park';
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
  $check_park = $db->num_rows("pay_history_driver_shopping","id","order_id=".$arr[project][id]."  and type = '".$type."' and status = 1"); 
  
  if($check_park>0){ ?>
  <?
  $res[pay_park] = $db->select_query("SELECT driver_approve,driver_approve_pay_date,last_update FROM pay_history_driver_shopping where  order_id=".$arr[project][id]."  and type = '".$type."' and status = 1  ");
  $arr[pay_park] = $db->fetch($res[pay_park]);
  		if($arr[pay_park][driver_approve]>0){
  			$color_menu = 'background-color:#59AA47;';
//			$txt_pay = '<font color="#59AA47;"><b>ได้รับเงินแล้ว</b></font>';
			$txt_pay = '<font color="#59AA47;">'.t_already_received.'</font>';
  			$status_icon = '<span><i class="fa  fa-clock-o " style="width:22px;" ></i>&nbsp;'.date('H:i:s', $arr[pay_park][driver_approve_pay_date]).'</span>';
  			$btn_row_approve = 'display:none;';
//  			$alert_history = "swal('ประวัติ' ,'จ่ายเงินเมื่อวันที่ ".date('Y-m-d H:i:s', $arr[pay_park][last_update])." น.' ,'success');";
  			$alert_history = "swal('".t_history."' , '".t_pay_on." ".date('Y-m-d H:i:s',$arr[pay_park][last_update]).t_n." '  ,'success');";
		}else{
			$color_menu = 'background-color:#ecb304;';
			$txt_pay = '<font style="color:#ecb304;">'.t_paid.'</font>';
  			$status_icon = '<div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#ecb304"></i> <strong><font color="#ecb304">'.t_please_check.'</font></strong></div>';
  			$btn_row_approve = '';
  			$alert_history = "swal('".t_no_history."','','error')";
		}

  }else{
  		$color_menu = 'background-color:#f00000;';
  		$txt_pay = '<font color="#f00000;">'.t_not_paid.'</font>';
  		$status_icon = '<div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">'.t_pending.'</font></strong></div>';
  		$btn_row_approve = 'display:none;';
  		$alert_history = "swal('".t_no_history."','','error')";
  }
		
?>

<table width="100%" border="0" cellspacing="1" cellpadding="1"  class="div-all-price">
  <tbody>
    <tr>
      <td colspan="2" valign="middle" class="box-bottom-line"><table width="100%" border="0" cellpadding="2" cellspacing="2"  >
        <tbody>
          <tr>
            <td width="30" valign="middle"><div  class="payment-menu" id="pay_park_taxi_<?=$arr[project][id];?>" style="<?=$color_menu;?>" >
              <center>
              <i class="icon-new-uniF10A-9" style="font-size:24px; margin-left:-5px;    "  ></i></div></td>
            <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="font-24"><font color="#333333" class="text-cap" ><b><?=t_parking_fee;?></b></font></td>
                </tr>
                <tr>
                  <td class="font-22"><?=t_pay_cash;?></td>
                </tr>
              </tbody>
            </table></td>
            <td width="60" align="right" valign="middle" class="font-20"><?= number_format($arr[project][price_park_total], 0 );?></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr  class="box-bottom-line">
      <td valign="middle" class="font-24 text-cap" id="txt_pay_park_<?=$arr[project][id];?>"><?=$txt_pay;?></td>
    
      <td width="120" align="right" class="font-20" id="price_park_time_payment_<?=$arr[project][id];?>">
      	<?=$status_icon;?>
      </td>
    </tr>
    <tr>
      <td valign="middle" class="font-24"<font ><?=t_amount;?></font></td>
      <td align="right" class="font-20" id="price_park_cost_payment_<?=$arr[project][id];?>"><span class="font-24"><b>
          <?= number_format($arr[project][price_park_total], 0 );?></b>
      </span></td>
    </tr>
    <tr>
      <td colspan="2" valign="middle" class="font-24"><table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
        
          <tr id="show_com_his_<?=$arr[project][id]?>">
            <td width="50%"><button  id="btn_park_doc_<?=$arr[project][id]?>"  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:5px;  ;  border-radius: 3px; border:none; background-color:#FFF " onclick="ViewPhoto('<?=$arr[project][id]?>','park','<?=$arr[pay_park][last_update];?>');"><center><span class="font-22"><i class="fa fa-folder-open" style="width:24px;color:<?=$main_color?>"  ></i><?=t_documents;?> <img src="images/yes.png" align="absmiddle" id="iconchk_park_<?=$arr[project][id]?>" style="display: none;"></span></center></button></td>
            <td width="50%"><button onclick="<?=$alert_history;?>" id="btn_com_his_<?=$arr[project][id]?>"  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:5px;  ;  border-radius: 3px; border:none; background-color:#FFF "><center><span class="font-22"><i class="fa fa-history" style="width: 24px; color:<?=$main_color?>"  ></i><?=t_history;?></span></center></button></td>
          </tr>
          <tr  id="tr_btn_park_approve_<?=$arr[project][id]?>" style="<?=$btn_row_approve;?>">
          	<td colspan="2" >
          	<button  id="btn_com_his_<?=$arr[project][id]?>"  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding: 7px;border-radius: 3px;border:none;backg;background-color: #ecb304;color: #fff;" onclick="ApporvePayDriver('<?=$arr[project][id]?>','<?=$arr[project][invoice]?>','<?=number_format($arr[project][price_park_total], 0 );?>','park');" ><center><strong class="font-22"><i class="fa fa-money" style="width: 24px; color:fff"  ></i><?=t_confirm_or_receipt;?></strong></center></button>
          	</td>
          	<td></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>

<script>
	
	
	$.ajax({
		    url: '../data/fileupload/doc_pay_driver/<?=$type;?>_<?=$arr[project][id]?>.jpg',
		    type:'HEAD',
		    error: function()
		    {
		        console.log('Park : Error file');
		        $('#btn_park_doc_<?=$arr[project][id]?>').attr('onclick','swal("<?=t_no_file_upload?>!", "", "error")');
		    },
		    success: function()
		    {
		    	console.log('Park : Success file');
		       $('#btn_park_doc_<?=$arr[project][id]?>').css('border','1px solid #59aa47');
		       $('#iconchk_park_<?=$arr[project][id]?>').show();
		    }
		});
</script>
<? }

else if($data_user_class=='lab'){ 
	$type = 'park';
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
  $check_park = $db->num_rows("pay_history_driver_shopping","id","order_id=".$arr[project][id]."  and type = '".$type."' and status = 1"); 
  $res[pay_park] = $db->select_query("SELECT last_update FROM pay_history_driver_shopping where  order_id=".$arr[project][id]."  and type = '".$type."' and status = 1  ");
  $arr[pay_park] = $db->fetch($res[pay_park]);
  
  if($check_park>0){
  		$btn_row_approve = 'display:none;';
  		$color_red = '';
  		$txt_pay = '<font color="#59AA47;">'.t_already_received.'</font>';
  		$status_icon = '<span><i class="fa  fa-clock-o " style="width:22px;" ></i>&nbsp;'.date('H:i:s', $arr[pay_park][last_update]).'</span>';
  		$alert_history = "swal('".t_history."' , '".t_pay_on." ".date('Y-m-d H:i:s',$arr[pay_park][last_update]).t_n." '  ,'success');";
  }	else{
  		$btn_row_approve = '';
  		$color_red = 'background-color: #f00000;';
  		$txt_pay = '<font color="#f00000;">'.t_not_paid.'</font>';
  		$status_icon = '<div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000"><?=t_pending;?></font></strong></div>';
  		$alert_history = "swal('".t_no_history."','','error')";
  }
?>
	
	<table width="100%" border="0" cellspacing="1" cellpadding="1"  class="div-all-price">
  <tbody>
    <tr>
      <td colspan="2" valign="middle" class="box-bottom-line"><table width="100%" border="0" cellpadding="2" cellspacing="2"  >
        <tbody>
          <tr>
            <td width="30" valign="middle"><div  class="payment-menu" id="pay_park_admin_<?=$arr[project][id];?>" style="<?=$color_red;?>" >
              <center>
              <i class="icon-new-uniF10A-9" style="font-size:24px; margin-left:-5px;    "  ></i></div></td>
            <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="font-24"><font color="#333333" class="text-cap" ><b><?=t_parking_fee;?></b></font></td>
                </tr>
                <tr>
                  <td  class="font-22"><?=t_pay_cash;?></td>
                </tr>
              </tbody>
            </table></td>
            <td width="60" align="right" valign="middle" class="font-22">
            	<input type="text" value="<?= number_format($arr[project][price_park_total], 0 );?>" id="park_price" style="border: 1px solid #ddd;    width: 100px;
    padding: 0px;
    text-align: right;
    padding: 0px 10px;
    height: 40px;"  />
            </td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr  class="box-bottom-line">
      <td valign="middle" class="font-24 text-cap" id="txt_pay_park_<?=$arr[project][id];?>"><?=$txt_pay;?></td>
      
      <td width="120" align="right" class="font-20" id="price_park_time_payment_<?=$arr[project][id];?>">
      	<?=$status_icon;?>
      </td>
 
    </tr>
    <tr>
      <td valign="middle" class="font-24"><font ><?=t_amount;?></font></td>
      <td align="right" class="font-20" id="price_park_cost_payment_<?=$arr[project][id];?>"><span class="font-24"><b id="cost_txt">
          <?= number_format($arr[project][price_park_total], 0 );?></b>
      </span></td>
    </tr>
    <tr>
      <td colspan="2" valign="middle" class="font-24"><table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
        
          <tr id="show_park_his_<?=$arr[project][id]?>">
            <td width="50%">
            <button  id="btn_park_doc_<?=$arr[project][id]?>" onclick=""  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:5px;  ;  border-radius: 3px; border:none; background-color:#FFF "><center><span class="font-22"><i class="fa fa-folder-open" style="width:24px;color:<?=$main_color?>"  ></i><?=t_documents;?> 
           <img src="images/yes.png" align="absmiddle" id="iconchk_park_<?=$arr[project][id]?>" style="display: none;"></span></center></button></td>
            <td width="50%">
            <button  id="btn_park_his_<?=$arr[project][id]?>"  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:5px;  ;  border-radius: 3px; border:none; background-color:#FFF " onclick="<?=$alert_history;?>"><center><span class="font-22"><i class="fa fa-history" style="width: 24px; color:<?=$main_color?>"  ></i><?=t_history;?></span></center></button></td>
          </tr>
       
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
	<script>
	$('#park_price').keyup(function(){
		var cost = $(this).val();		
		
		$('#cost_txt').text(cost);
	});
		$('#btn_park_doc_<?=$arr[project][id]?>').click(function(){
//			$('#upload_doc_pay_park_<?=$arr[project][id]?>').click();
			
		 	$( "#main_load_mod_popup_3" ).toggle();
 
		 	var url_load= "load_page_mod_3.php?name=booking/load/form&file=upload_pay_popup&id=<?=$arr[project][id]?>&type=<?=$type;?>&invoice=<?=$arr[project][invoice]?>&check_confirm=<?=$check_park;?>&price=<?= number_format($arr[project][price_park_total], 0 );?>";
		 	console.log(url_load);
		 	$('#load_mod_popup_3').html(load_main_mod);
		 	$('#load_mod_popup_3').load(url_load); 
		 	
		 	$('#dialog_custom').hide();
		 	$('#main_load_mod_popup_clean').hide();
			
		});
		$.ajax({
		    url: '../data/fileupload/doc_pay_driver/<?=$type;?>_<?=$arr[project][id]?>.jpg',
		    type:'HEAD',
		    error: function()
		    {
		        console.log('Error file');
//		        $('#show_park_his_<?=$arr[project][id]?>').hide();
		    },
		    success: function()
		    {
		    	console.log('Success file');
		       $('#btn_park_doc_<?=$arr[project][id]?>').css('border','1px solid #59aa47');
//		       $('#btn_park_doc_<?=$arr[project][id]?>').attr('onclick','ViewPhoto("<?=$arr[project][id]?>","<?=$type;?>","<?=$arr[pay_park][last_update];?>")');
		       $('#iconchk_park_<?=$arr[project][id]?>').show();
		       $('#show_park_his_<?=$arr[project][id]?>').show();
		    }
		});

	</script>
<? } 

?>