<table width="100%" border="0" cellspacing="1" cellpadding="1"  class="div-all-price">
  <tbody>
    <tr>
      <td colspan="2" valign="middle" class="box-bottom-line"><table width="100%" border="0" cellpadding="2" cellspacing="2"  >
        <tbody>
          <tr>
            <td width="30" valign="middle"><div  class="payment-menu" >
              <center>
              <i class="icon-new-uniF11E-5" style="font-size:24px; margin-left:-5px;    "  ></i></div></td>
            <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="font-24"><font color="#333333" ><b>ค่าหัว</td>
                </tr>
                <tr>
                  <td  class="font-22">จ่ายเงินสด</td>
                </tr>
              </tbody>
            </table></td>
            <td width="60" align="right" valign="middle" class="font-20"><?= number_format($arr[project][price_person_unit], 0 );?></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr  class="box-bottom-line">
 
 
 <td valign="middle" class="font-26"><font color="#59AA47"><b>ได้รับเงินแล้ว</td>
 
  <td width="90" align="right" class="font-20" id="price_park_time_payment_<?=$arr[project][id];?>"><i class="fa  fa-clock-o " style="width:22px;" ></i>&nbsp;<?=$date = date('H:i:s', $arr[project][date_driver_pay_report]);?></td>
 
    </tr>
    <tr  class="box-bottom-line">
      <td valign="middle" class="font-26"><b><font >ลงทะเบียน</font></b></td>
      <td align="right" class="font-20" id="price_park_time_payment_<?=$arr[project][id];?>3"><span class="font-26"><b><?=$arr[project][pax]?></td>
    </tr>
    <tr  class="box-bottom-line">
      <td valign="middle" class="font-26"><b><font >รายรับต่อหัว</font></b></td>
      <td align="right" class="font-20" id="price_park_time_payment_<?=$arr[project][id];?>"><span class="font-26"><b>
        <?= number_format($arr[project][price_person_unit], 0 );?>
      </span></td>
    </tr>
    <tr>
      <td valign="middle" class="font-26"><b><font >จำนวนเงิน </font></b></td>
      <td align="right" class="font-20" id="price_park_time_payment_<?=$arr[project][id];?>"><span class="font-26"><b>
          <?= number_format($arr[project][price_person_total], 0 );?>
      </span></td>
    </tr>
    <tr>
      <td colspan="2" valign="middle" class="font-26"><table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
        
          <tr id="show_com_his_<?=$arr[project][id]?>">
            <td width="50%"><button  id="btn_com_doc_<?=$arr[project][id]?>"  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:5px;  ;  border-radius: 3px; border:none; background-color:#FFF "><center><span class="font-22"><i class="fa fa-folder-open" style="width:24px;color:<?=$main_color?>"  ></i>เอกสาร</button></td>
            <td width="50%"><button  id="btn_com_his_<?=$arr[project][id]?>"  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:5px;  ;  border-radius: 3px; border:none; background-color:#FFF "><center><span class="font-22"><i class="fa fa-history" style="width: 24px; color:<?=$main_color?>"  ></i>ประวัติ</button></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
