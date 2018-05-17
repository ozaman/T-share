<?php 
$arr[project][id] = $_GET[id];
$arr[project][plan_commission] = $_GET[amount];
   $type = 'com';
   	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
     $check_park = $db->num_rows("pay_history_driver_shopping","id","order_id=".$arr[project][id]."  and type = '".$type."' and status = 1"); 
     if($check_park>0){
     $res[pay_com] = $db->select_query("SELECT driver_approve,driver_approve_pay_date,last_update FROM pay_history_driver_shopping where  order_id=".$arr[project][id]."  and type = '".$type."' and status = 1  ");
     $arr[pay_com] = $db->fetch($res[pay_com]);
     		if($arr[pay_com][driver_approve]>0){
     			$color_menu = 'background-color:#59AA47;';
   			$txt_pay = '<font color="#59AA47;"><b>'.t_already_received.'</b></font>';
     			$status_icon = '<span><i class="fa  fa-clock-o " style="width:22px;" ></i>&nbsp;'.date('H:i:s', $arr[pay_com][driver_approve_pay_date]).'</span>';
     			$btn_row_approve = 'display:none;';
     			$alert_history = "swal('".t_history."' ,' ".t_pay_on." ".date('Y-m-d H:i:s', $arr[pay_com][last_update]).t_n.",'success');";
   		}else{
   			$color_menu = 'background-color:#ecb304;';
   			$txt_pay = '<font style="color:#ecb304;"><b><?=t_paid;?></b></font>';
$status_icon = '
<div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#ecb304"></i> <strong><font color="#ecb304">'.t_please_check.'</font></strong></div>
';
$btn_row_approve = '';
$alert_history = "swal('".t_no_history."','','error')";
}
}else{
$color_menu = 'background-color:#f00000;';
$txt_pay = '<font color="#f00000;"><b><?=t_not_paid;?></b></font>';
$status_icon = '
<div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">'.t_pending.'</font></strong></div>
';
$btn_row_approve = 'display:none;';
$alert_history = "swal('".t_no_history."','','error')";
}
?>
<table width="100%" border="0" cellspacing="1" cellpadding="1"  class="div-all-price">
   <tbody>
      <tr>
         <td colspan="2" valign="middle" class="box-bottom-line">
            คอมมิชชั่น
         </td>
      </tr>
      <tr>
         <td valign="middle" class="font-24" id="txt_pay_com_<?=$arr[project][id];?>"><?=$txt_pay;?></td>
         <td width="120" align="right" class="font-20" id="price_com_time_payment_<?=$arr[project][id];?>">
            <?= $status_icon;?>
         </td>
      </tr>
      <tr style="display:noneS">
         <td valign="middle" class="font-24"><font ><?=t_amount;?></font></td>
         <td align="right" class="font-20" id="price_com_cost_payment_<?=$arr[project][id];?>">
            <span class="font-24"><b><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i></b>
            </span>
         </td>
      </tr>
      <tr>
         <td colspan="2" valign="middle">
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
               <tbody>
                  <tr id="show_com_his_<?=$arr[project][id]?>">
                     <td width="50%">
                        <button  id="btn_com_doc_<?=$arr[project][id]?>"  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:5px;  ;  border-radius: 3px; border:none; background-color:#FFF " onclick="ViewPhoto('<?=$arr[project][id]?>','com','<?=$arr[pay_com][last_update];?>');">
                           <center><span class="font-22"><i class="fa fa-folder-open" style="width:24px;color:<?=$main_color?>"  ></i><?=t_documents;?> <img src="images/yes.png" align="absmiddle" id="iconchk_com_<?=$arr[project][id]?>" style="display: none;"></span></center>
                        </button>
                     </td>
                     <td width="50%">
                        <button onclick="<?=$alert_history;?>" id="btn_com_his_<?=$arr[project][id]?>"  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:5px;  ;  border-radius: 3px; border:none; background-color:#FFF ">
                           <center><span class="font-22"><i class="fa fa-history" style="width: 24px; color:<?=$main_color?>"  ></i><?=t_history;?></span></center>
                        </button>
                     </td>
                  </tr>
                  <tr  id="tr_btn_com_approve_<?=$arr[project][id]?>" style="<?=$btn_row_approve;?>">
                     <td colspan="2" >
                        <button  id="btn_com_his_<?=$arr[project][id]?>"  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding: 7px;border-radius: 3px;border:none;backg;background-color: #ecb304;color: #fff;" onclick="ApporvePayDriver('<?=$arr[project][id]?>','<?=$arr[project][invoice]?>','<?=number_format($arr[project][price_com_total], 0 );?>','com');" >
                           <center><strong class="font-22"><i class="fa fa-money" style="width: 24px; color:fff"  ></i><?=t_confirm_or_receipt;?></strong></center>
                        </button>
                     </td>
                     <td></td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<script>
   $.ajax({
   	    url: '../data/fileupload/doc_pay_driver/<?=$type;?>_<?=$arr[project][id]?>.jpg',
   	    type:'HEAD',
   	    error: function()
   	    {
   	        console.log('com : Error file');
   	        $('#btn_com_doc_<?=$arr[project][id]?>').attr('onclick','swal("<?=t_no_file_upload;?>!", "", "error")');
   	    },
   	    success: function()
   	    {
   	    	console.log('com : Success file');
   	       $('#btn_com_doc_<?=$arr[project][id]?>').css('border','1px solid #59aa47');
   	       $('#iconchk_com_<?=$arr[project][id]?>').show();
   	    }
   	});
</script>