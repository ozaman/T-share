<table width="100%" border="0" cellspacing="1" cellpadding="1"  class="div-all-price">
  <tbody>
    <tr>
      <td width="30" rowspan="5" valign="middle"><div  class="payment-menu"   style="background-color:#FF0000"><center><i class="icon-new-uniF12D-13" style="font-size:24px; margin-left:-4px;  "  ></i></div></td>
      <td class="font-24"><font color="#333333" ><b>ค่าคอมมิชชั่น</td>
      <td width="60" align="right" class="font-22"><?=$arr[project][price_commission_unit]; ?>% </td>
    </tr>
    <tr>
      <td class="font-22">โอนเงินเข้าบัญชี<br>        (เมื่อแขกกลับ)</td>
      <td align="right" class="font-26">&nbsp;</td>
    </tr>
    <tr>
 
 
 
 
      
      
      <td class="font-24" id="price_park_status_payment_<?=$arr[project][id];?>"><b><font color="#FF0000">รอดำเนินการ</font></b></td>
      
      
      <td align="right" class="font-26" id="price_person_time_payment_<?=$arr[project][id];?>"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i></td>
    </tr>
    <tr style="display:noneS">
      <td class="font-24" id="price_park_status_payment_<?=$arr[project][id];?>2"><b><font >จำนวนเงิน</font></b></td>
      <td align="right" class="font-20" id="price_park_time_payment_<?=$arr[project][id];?>"><span class="font-24"><b>
        <?= number_format($arr[project][price_park_total], 0 );?>
      </span></td>
    </tr>
    <tr>
      <td class="font-24" id="price_park_status_payment_<?=$arr[project][id];?>">&nbsp;</td>
      <td align="right" class="font-26" id="price_person_time_payment_<?=$arr[project][id];?>3">&nbsp;</td>
    </tr>
  </tbody>
</table>