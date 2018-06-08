<?php 

	$type = 'com';
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
  $check_park = $db->num_rows("pay_history_driver_shopping","id","order_id=".$arr[project][id]."  and type = '".$type."' and status = 1"); 
  $res[com_park] = $db->select_query("SELECT last_update FROM pay_history_driver_shopping where  order_id=".$arr[project][id]."  and type = '".$type."' and status = 1  ");
  $arr[com_park] = $db->fetch($res[com_park]);
  
  if($check_park>0){
  		$btn_row_approve = 'display:none;';
  		$color_red = '';
  		$txt_pay = '<font color="#59AA47;"><b>'.t_already_received.'</b></font>';
  		$status_icon = '<span><i class="fa  fa-clock-o " style="width:22px;" ></i>&nbsp;'.date('H:i:s', $arr[com_park][last_update]).'</span>';
  		$alert_history = "swal('".t_history."' ,' ".t_pay_on." ".date('Y-m-d H:i:s', $arr[com_park][last_update])." น.' ,'success');";
  }	else{
  		$btn_row_approve = '';
  		$color_red = 'background-color: #f00000;';
  		$txt_pay = '<font color="#f00000;"><b>ยังไม่จ่ายเงิน</b></font>';
  		$status_icon = '<div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">รอดำเนินการ</font></strong></div>';
  		$alert_history = "swal('".t_no_history."','','error')";
  }
	
//	$status_icon = '<div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000;"></i> <strong><font color="#FF0000">รอการยืนยัน</font></strong></div>';
	 ?>
	<table width="100%" border="0" cellspacing="1" cellpadding="1"  class="div-all-price">
  <tbody>
    <tr>
      <td colspan="2" valign="middle" class="box-bottom-line"><table width="100%" border="0" cellpadding="2" cellspacing="2" >
        <tbody>
          <tr>
            <td width="30" valign="middle" ><div  class="payment-menu"  id="pay_com_admin_<?=$arr[project][id];?>" style="<?=$color_red;?>">
              <center>
              <i class="icon-new-uniF12D-13" style="font-size:24px; margin-left:-4px;  "  ></i></div></center></td>
            <td class="font-24"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="font-24"><font color="#333333" ><b><?=t_com_fee;?></b></font></td>
                </tr>
                <tr>
                  <td class="font-22"><?=t_transfer_to_account;?> <br>
(<?=t_customer_go_back;?>)</td>
                </tr>
              </tbody>
            </table></td>
            <td width="40" align="right" class="font-22"><?=$arr[project][price_commission_unit]; ?>
              % </td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td valign="middle" class="font-24" id="txt_pay_com_<?=$arr[project][id];?>"><?=$txt_pay;?></td>
 
 
 
      <td width="120" align="right" class="font-20" id="price_com_time_payment_<?=$arr[project][id];?>">
      	<?= $status_icon;?>
      </td>
    </tr>
    <tr style="display:noneS">
      <td valign="middle" class="font-24"><font ><?=t_amount;?></font></td>
      <td align="right" class="font-20" id="price_com_cost_payment_<?=$arr[project][id];?>"><span class="font-24"><b>
<i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i>
        </b>
      </span></td>
    </tr>
    <!--<tr>
      <td colspan="2" valign="middle"><table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
           <tr id="show_com_his_<?=$arr[project][id]?>">
            <td width="50%">
            <button  id="btn_com_doc_<?=$arr[project][id]?>" onclick=""  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:5px;  ;  border-radius: 3px; border:none; background-color:#FFF "><center><span class="font-22"><i class="fa fa-folder-open" style="width:24px;color:<?=$main_color?>"  ></i><?=t_documents;?> 
           <img src="images/yes.png" align="absmiddle" id="iconchk_com_<?=$arr[project][id]?>" style="display: none;"></span></center></button></td>
            <td width="50%"><button  id="btn_com_his_<?=$arr[project][id]?>"  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:5px;  ;  border-radius: 3px; border:none; background-color:#FFF " onclick="<?=$alert_history;?>"><center><span class="font-22"><i class="fa fa-history" style="width: 24px; color:<?=$main_color?>"  ></i><?=t_history;?></span></center></button></td>
          </tr>
          </tbody>
      </table></td>
    </tr>-->
  </tbody>
</table>
<script>
		$('#btn_com_doc_<?=$arr[project][id]?>').click(function(){
//			$('#upload_doc_pay_com_<?=$arr[project][id]?>').click();
			
		 	$( "#main_load_mod_popup_3" ).toggle();
 
		 	var url_load= "load_page_mod_3.php?name=booking/load/form&file=upload_pay_popup&id=<?=$arr[project][id]?>&type=<?=$type;?>&invoice=<?=$arr[project][invoice]?>&check_confirm=<?=$check_com;?>&price=<?= number_format($arr[project][price_com_total], 0 );?>";
		 	console.log(url_load);
		 	$('#load_mod_popup_3').html(load_main_mod);
		 	$('#load_mod_popup_3').load(url_load); 
			
		});
		$.ajax({
		    url: '../data/fileupload/doc_pay_driver/<?=$type;?>_<?=$arr[project][id]?>.jpg',
		    type:'HEAD',
		    error: function()
		    {
		        console.log('Error file');
//		        $('#show_com_his_<?=$arr[project][id]?>').hide();
		    },
		    success: function()
		    {
		    	console.log('Success file');
		       $('#btn_com_doc_<?=$arr[project][id]?>').css('border','1px solid #59aa47');
//		       $('#btn_com_doc_<?=$arr[project][id]?>').attr('onclick','ViewPhoto("<?=$arr[project][id]?>","<?=$type;?>","<?=$arr[pay_com][last_update];?>")');
		       $('#iconchk_com_<?=$arr[project][id]?>').show();
		       $('#show_com_his_<?=$arr[project][id]?>').show();
		    }
		});

	</script>
