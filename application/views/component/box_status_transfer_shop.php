<?php
$query = $this->db->query("select id,bank_taxi_id, driver_complete from order_booking where id = ".$_GET[order_id]);
$data = $query->row();

$query_bank = $this->db->query("SELECT t1.*,t2.name_th as bank_list, t2.img as bank_img FROM web_bank_driver as t1 left join web_bank_list as t2 on t1.bank_id = t2.id where t1.id = '".$data->bank_taxi_id."' ");
$data_bank = $query_bank->row();
$count_bn = strlen($data_bank->bank_number) - 3;
//echo $count_bn;
for ($i = 0; $i < $count_bn; $i++) {
  $xxx .= "x";
}
$txt_bank_num = $xxx."".substr($data_bank->bank_number,-3);
//echo strlen($txt_bank_num)." || ".strlen($data_bank->bank_number);
//echo $xxx;
//exit();
$query = $this->db->query('SELECT * FROM pay_history_driver_shopping where order_id = '.$data->id);
$check_trans_pay = $query->num_rows();
if ($check_trans_pay > 0) {
  $data_trans_pay = $query->row();
  $icons_p = "yes.png?v=".time();
  $class_status = "step-booking-active";
  $time_status = '<div class="font-16"><i class="fa fa-clock-o fa-spin 6x" style="color:#88B34D"></i><span> เวลา '.date('H:i',$data_trans_pay->last_update).' น.</span></div>';

  if ($_COOKIE[detect_userclass] == "taxi") {
    $title_pay = "โอนค่าคอมมิชชั่นแล้ว";
  }
  else {
    $title_pay = "โอนค่าคอมมิชชั่นแล้ว";
  }
}
else {
  $icons_p = "no.png?v=".time();
  $class_status = "step-booking";
  $time_status = '<i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i><strong><font color="#FF0000"> รอดำเนินการ</font></strong>';
  if ($_COOKIE[detect_userclass] == "taxi") {
    $title_pay = "รอโอนค่าคอมมิชชั่น";
  }
  else {
    $title_pay = "รอโอนค่าคอมมิชชั่น";
  }
}
$btn_pay_com_color = "background-color:#666666";
?>
<td class="font-16">
  <div class="div-all-checkin">
    <table width="100%" border="0" cellspacing="2" cellpadding="0">
      <tbody>
        <tr>
          <td width="50" rowspan="2">
            <div class="<?=$class_status;?>" id="number_driver_pay_com">5</div>
            <div style="position:absolute; margin-top:-40px; margin-left: -5px;">
              <img src="<?=base_url();?>assets/images/<?=$icons_p;?>" align="absmiddle" id="iconchk_driver_pay_com"></div>
          </td>
          <td colspan="2">
            <button id="btn_driver_pay_com" onclick="btn_driver_pay_com('<?=$arr[book][id];?>')" type="button" class="btn  btn-info " style="width:100%;text-align:left;padding:5px; <?=$btn_pay_com_color;?>;  border-radius:  20px; border:none;color: #fff;">
              <span class="font-20 text-cap"><i class="icon-new-uniF121-10" style="width:10px;"></i> 
                <span id="txt_btn_driver_pay_com"><?=$title_pay;?></span></span></button>
          </td>
        </tr>
        <tr>
      <input type="hidden" value="<?=$arr[book][check_driver_pay_com];?>" id="driver_pay_com_check_click">
      <td style="height:30px;">
        <div id="status_driver_pay_com">
          <div class="font-16">
            <?=$time_status;?>
          </div>
        </div>
      </td>
      <td width="30" id="pm_guest_driver_pay_com" style="display: none;">
        <table width="100%">
          <tbody>
            <tr>
              <td>

              </td>
              <td>
                <i id="photo_driver_pay_com_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
                <i id="photo_driver_pay_com_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="viewPhotoShop('<?=$arr[book][id];?>', 'driver_pay_com', '<?=$arr[book][driver_pay_com_date];?>');">photo_camera</i>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
      </tr>
      <tr>
        <td colspan="2">
          <div style="padding: 5px;">
            <ons-list-header class="list-header" style="">ธนาคารรับเงิน</ons-list-header>   
            <table width="100%">
              <tr>
                <td width="35%"><span class="font-16">ธนาคาร</span></td>
                <td>
                  <table>
                    <tr>
                      <td><img src="assets/images/bank/<?=$data_bank->bank_img;?>" style="width:25px;" /></td>
                      <td width="5"></td>
                      <td><span class="font-16"><?=$data_bank->bank_list;?></span></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td>ชื่อบัญชี</td>
                <td><?=$data_bank->bank_name;?></td>
              </tr>
              <tr>
                <td>เลขบัญชี</td>
                <td><?=$txt_bank_num;?></td>
              </tr>
            </table>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div style="padding: 5px;">
            <ons-list-header class="list-header" style="">สถานะโอนเงิน</ons-list-header>   
            <?php if ($check_trans_pay > 0) {?>
              <table width="100%">
                <tr>
                  <td width="35%"><span class="font-16">สถานะ</span></td>
                  <td><span class="font-16"><i class="fa fa-check" style="color: #59aa47;"></i> โอนเงินแล้ว</span></td>
                </tr>
                <tr>
                  <td><span class="font-16">จำนวน</span></td>
                  <td><span class="font-16"><?=$data_trans_pay->price_pay_driver_com." บ.";?></span></td>
                </tr>
                <tr>
                  <td><span class="font-16">เวลา</span></td>
                  <td><span class="font-16"><?=date('Y-m-d',$data_trans_pay->last_update)." ".$data_trans_pay->trans_hh.":".$data_trans_pay->trans_mm." น.";?></span></td>
                </tr>
                <tr>
                  <td><span class="font-16">สลิปโอนเงิน</span></td>
                  <td>
                    <i id="guest_register_pf" class="material-icons" style="color: rgb(59, 89, 152); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(59, 89, 152); display: nones;" onclick="modalShowImg('../data/fileupload/doc_pay_driver/slip/slip_<?=$data->id.".jpg?v=".time();?>', '<?=date('Y-m-d H:i',$data_trans_pay->last_update);?>');">attachment</i>
                  </td>
                </tr>
                <?php
                if($data->driver_complete<1){ ?>
                <tr>
                  <td align="center" colspan="2">
                <ons-button id="get_trans_com_<?=$data->id;?>" type="button" onclick="confirmGetTransCom('<?=$data->id;?>');" style="width: 100%;  padding: 2px;"><span class="font-16">ยืนยันรับเงินค่าคอมมิชชั่น</span></ons-button>
                  </td>
                </tr>
                <?php }
                ?>
              </table>
            <?php }
            else {
              ?>
            <table width="100%">
              <tr>
                  <td width="35%"><span class="font-16">สถานะ</span></td>
                  <td><span class="font-16" style="color:#FF0000;"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> รอโอนเงิน</span></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <span class="font-16">&nbsp; จะโอนเงินไม่เกินวันพรุ่งนี้เวลา 15.00 น. หากติดวันเสาร์อาทิตย์ หรือวันหยุดนักขัตฤกษ์ จะทำการโอนในวันถัดไป</span>
                  </td>
                </tr>
            </table>
            <?php }
            ?>
          </div>
        </td>
      </tr>   
      </tbody>
    </table>  

  </div>
</td>