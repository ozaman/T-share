<table width="100%" border="0" cellspacing="0" cellpadding="4"  class="div-all-price">
  <tbody>
    <tr>
      <td width="30" valign="middle" bgcolor="#FFFFFF"><div  class="payment-menu" >
        <center>
      <i class="icon-new-uniF10A-9" style="font-size:24px; margin-left:-5px;    "  ></i></div></td>
      <td bgcolor="#FFFFFF" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td class="font-24"><font color="#333333" ><b>ค่าจอดรถ</td>
    </tr>
    <tr>
      <td>จ่ายเงินสด</td>
    </tr>
  </tbody>
</table>
</td>
      <td width="60" align="right" valign="top" bgcolor="#FFFFFF" class="font-20"><?= number_format($arr[project][price_park_total], 0 );?></td>
    </tr>
    <tr>
      <td colspan="2" valign="middle" class="font-24"><font color="#59AA47"><b>รับเงินแล้ว</td>
    
      <td align="right" class="font-20" id="price_park_time_payment_<?=$arr[project][id];?>"><?=$date = date('H:i:s', $arr[project][date_driver_pay_report]);?></td>
      
      
      
      
      
    </tr>
    <tr>
      <td colspan="2" valign="middle" class="font-24"><b><font >จำนวนเงิน</font></b></td>
      <td align="right" class="font-20" id="price_park_time_payment_<?=$arr[project][id];?>"><span class="font-24"><b>
          <?= number_format($arr[project][price_park_total], 0 );?>
      </span></td>
    </tr>
  </tbody>
</table>
