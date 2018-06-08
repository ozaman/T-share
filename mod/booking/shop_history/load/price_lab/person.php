<?php 
  $type = 'person';
  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
  $check_person = $db->num_rows("pay_history_driver_shopping","id","order_id=".$arr[project][id]."  and type = '".$type."' and status = 1"); 
  $res[pay_person] = $db->select_query("SELECT last_update FROM pay_history_driver_shopping where  order_id=".$arr[project][id]."  and type = '".$type."' and status = 1  ");
  $arr[pay_person] = $db->fetch($res[pay_person]);
  
  if($check_person>0){
  		$btn_row_approve = 'display:none;';
  		$color_red = '';
  		$txt_pay = '<font color="#59AA47;">'.t_already_received.'</font>';
  		$status_icon = '<span><i class="fa  fa-clock-o " style="width:22px;" ></i>&nbsp;'.date('H:i:s', $arr[pay_person][last_update]).'</span>';
  		$alert_history = "swal('".t_history."' , '".t_pay_on." ".date('Y-m-d H:i:s',$arr[pay_person][last_update]).t_n." '  ,'success');";
  }	else{
  		$btn_row_approve = '';
  		$color_red = 'background-color: #f00000;';
  		$txt_pay = '<font color="#f00000;">'.t_not_paid.'</font>';
  		$status_icon = '<div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">'.t_pending.'</font></strong></div>';
  		$alert_history = "swal('".t_no_history."','','error')";
  }
?>
	
	<table width="100%" border="0" cellspacing="1" cellpadding="1"  class="div-all-price">
  <tbody>
    <tr>
      <td colspan="2" valign="middle" class="box-bottom-line"><table width="100%" border="0" cellpadding="2" cellspacing="2"  >
        <tbody>
          <tr>
            <td width="30" valign="middle"><div  class="payment-menu"  id="pay_person_admin_<?=$arr[project][id];?>"  style="<?=$color_red;?>" >
              <center>
              <i class="icon-new-uniF11E-5" style="font-size:24px; margin-left:-5px;    "  ></i></div></td>
            <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="font-24"><font color="#333333" class="text-cap" ><b><?=t_person_fee;?></b></font></td>
                </tr>
                <tr>
                  <td  class="font-22"><?=t_pay_cash;?></td>
                </tr>
              </tbody>
            </table></td>
            <td width="60" align="right" valign="middle" class="font-20"><?= number_format($arr[project][price_person_total], 0 );?></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr  class="box-bottom-line">
 
 
 <td valign="middle" class="font-24 text-cap" id="txt_pay_person_<?=$arr[project][id];?>"><?=$txt_pay;?></td>
 
  <td width="120" align="right" class="font-20" id="price_person_time_payment_<?=$arr[project][id];?>" >
 	<?=$status_icon;?></td>
 
    </tr>
    <tr  class="box-bottom-line">
      <td valign="middle" class="font-24"><font><?=จำนวนแขก;?></font></td>
      <td align="right" class="font-24" ><span class="font-24"><?=$arr[project][pax]?></td>
    </tr>
    <tr  class="box-bottom-line">
      <td valign="middle" class="font-24"><font ><?=t_register;?></font></td>
      <td align="right" class="font-22" valign="middle" >
      <!--<span class="font-24" id="txt_pax" ><b><?=$arr[project][pax]?></b></span>-->
      <input id="ip_pax" value="<?=$arr[project][pax]?>" type="number" style="border: 1px solid #ddd;
    width: 100px;
    padding: 0px;
    text-align: right;
    padding: 0px 10px;
    height: 40px;" /></td>
    </tr>
    <tr  class="box-bottom-line">
      <td valign="middle" class="font-24"><font ><?=t_per_person;?></font></td>
      <td align="right" class="font-20" ><span class="font-24"><b>
        <?= number_format($arr[project][price_person_unit], 0 );?>
      </span></td>
    </tr>
    <tr>
      <td valign="middle" class="font-24"><font ><?=t_amount;?> </font></td>
      <td align="right" class="font-20"><span class="font-24"><b>
          <?= number_format($arr[project][price_person_total], 0 );?>
      </span></td>
    </tr>
    <!--<tr>
      <td colspan="2" valign="middle" class="font-24"><table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
        
         <tr id="show_person_his_<?=$arr[project][id]?>">
            <td width="50%">
            <button  id="btn_person_doc_<?=$arr[project][id]?>" onclick=""  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:5px;  ;  border-radius: 3px; border:none; background-color:#FFF "><center><span class="font-22"><i class="fa fa-folder-open" style="width:24px;color:<?=$main_color?>"  ></i><?=t_documents;?> 
           <img src="images/yes.png" align="absmiddle" id="iconchk_person_<?=$arr[project][id]?>" style="display: none;"></span></center></button></td>
            <td width="50%"><button onclick="<?=$alert_history;?>"  id="btn_person_his_<?=$arr[project][id]?>"  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:5px; border-radius: 3px; border:none; background-color:#FFF "><center><span class="font-22"><i class="fa fa-history" style="width: 24px; color:<?=$main_color?>"  ></i><?=t_history;?></span></center></button></td>
          </tr>
          
        </tbody>
      </table></td>
    </tr>-->
  </tbody>
</table>
	<script>
		function editPax(){
			
			$('#txt_pax').hide();
			$('#ip_pax').show();
		}
		
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
		       $('#btn_person_doc_<?=$arr[project][id]?>').css('border','1px solid #59aa47');
//		       $('#btn_park_doc_<?=$arr[project][id]?>').attr('onclick','ViewPhoto("<?=$arr[project][id]?>","<?=$type;?>","<?=$arr[pay_park][last_update];?>")');
		       $('#iconchk_person_<?=$arr[project][id]?>').show();
		       $('#show_person_his_<?=$arr[project][id]?>').show();
		    }
		});

	</script>
