<table width="100%" border="0" cellspacing="1" cellpadding="1"  class="div-all-price">
  <tbody>
    <tr>
      <td width="30" rowspan="3"><div  class="payment-menu" >
        <center>
      <i class="icon-new-uniF11E-5" style="font-size:24px; margin-left:-4px;  "  ></i></div></td>
      <td class="font-24"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td class="font-24"><font color="#333333" ><b>ค่าหัว</td>
      <td width="100" align="right"  class="font-22"> <?= number_format($arr[project][price_person_unit], 0 );?> X <?=$arr[project][pax]?> =</td>
    </tr>
  </tbody>
</table>
</td>
      <td width="60" align="right" class="font-24"><b><?= number_format($arr[project][price_person_total], 0 );?></td>
    </tr>
    <tr>
      <td class="font-22">จ่ายเงินสด</td>
      <td align="right" class="font-26">&nbsp;</td>
      </tr>
    <tr>
    
      <td class="font-24" id="price_person_status_payment_<?=$arr[project][id];?>"><font color="<?=$main_color?>"><b>รับเงินแล้ว</td>
      <td align="right" class="font-20" id="price_person_time_payment_<?=$arr[project][id];?>"><?=$date = date('H:i:s', $arr[project][date_driver_pay_report]);?></td>
      
    </tr>
  </tbody>
</table>
