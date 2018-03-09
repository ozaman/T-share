<table width="100%" border="0" cellspacing="1" cellpadding="1"  class="div-all-price">
  <tbody>
    <tr>
      <td colspan="2" valign="middle" class="box-bottom-line"><table width="100%" border="0" cellpadding="2" cellspacing="2" >
        <tbody>
          <tr>
            <td width="30" valign="middle" ><div  class="payment-menu"   style="background-color:#FF0000">
              <center>
              <i class="icon-new-uniF12D-13" style="font-size:24px; margin-left:-4px;  "  ></i></div></td>
            <td class="font-24"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="font-24"><font color="#333333" ><b>ค่าคอมมิชชั่น</td>
                </tr>
                <tr>
                  <td class="font-22">โอนเงินเข้าบัญชี <br>
(แขกเดินทางกลับ)</td>
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
      <td valign="middle" class="font-26"><b><font color="#FF0000">รอการโอนเงิน</font></b></td>
 
 
 
      <td width="60" align="right" class="font-26" id="price_person_time_payment_<?=$arr[project][id];?>"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i></td>
    </tr>
    <tr style="display:noneS">
      <td valign="middle" class="font-26"><b><font >จำนวนเงิน</font></b></td>
      <td align="right" class="font-20" id="price_park_time_payment_<?=$arr[project][id];?>"><span class="font-26"><b>
       
 
       
       <?
	   $arr[project][price_commission_total]=1250;
	   
	   ?>
       
       
        <?= number_format($arr[project][price_commission_total], 0 );?>
      </span></td>
    </tr>
    <tr>
      <td colspan="2" valign="middle"><table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
          <tr id="show_park_his_<?=$arr[project][id]?>">
            <td width="50%"><button  id="btn_park_doc_<?=$arr[project][id]?>"  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:5px;  ;  border-radius: 3px; border:none; background-color:#FFF ">
              <center>
              <span class="font-22"><i class="fa fa-folder-open" style="width:24px;color:<?=$main_color?>"  ></i>เอกสาร</button></td>
            <td width="50%"><button  id="btn_park_his_<?=$arr[project][id]?>"  type="button" class="btn btn-default"  style="width:100%;text-align:left;padding:5px;  ;  border-radius: 3px; border:none; background-color:#FFF ">
              <center>
              <span class="font-22"><i class="fa fa-history" style="width: 24px; color:<?=$main_color?>"  ></i>ประวัติ</button></td>
            </tr>
          </tbody>
      </table></td>
    </tr>
  </tbody>
</table>