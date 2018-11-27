<?php
$data = $this->Main_model->rowdata('deposit_history',array('id' => $_GET[deposit_id]),'');
if ($data->type == "ADD") {
  $text_type = "เติมเงิน (แจ้งโอน)";
  $img = "../data/fileupload/pay/slip_trans_".$_GET[deposit_id].".jpg";
}
else if ($data->type == "WITHDRAW") {
  $text_type = "ถอนเงิน (แจ้งถอน)";
  $img = "../data/fileupload/doc_pay_driver/transfer/slip_withdraw/".$_GET[deposit_id].".jpg";
}

$txt_bank = $data->bank_number;
if ($data->status == 0) {
  $txt_status = "รอยืนยัน";
  $class_plate = "bg-wait";
  $color_red = "color:#908e8e;";
}
else if ($data->status == 1) {
  $txt_status = "อนุมัติ";
  $class_plate = "bg-approve";
  $color_red = "color:#908e8e;";
}
else {
  $txt_status = "ถูกปฏิเสธ";
  $class_plate = "bg-reject";
  $color_red = "color:#f00;";
}

$where = array();
$this->db->select('approved, cause, post_date');
$where[deposit_id] = $data->id;
$query_log = $this->db->get_where(TBL_DEPOSIT_HISTORY_LOG,$where);
$logs = $query_log->row();
?>

<div style="padding: 0px 10px; background-color:#fff; ">
  <ons-list-item>
    <table width="100%">
      <tr>
        <td><span class="font-14" style="color:#908e8e;">สถานะ</span></td>
      </tr>
      <tr>
        <td><span class="font-18" style="<?=$color_red;?>"><?=$txt_status;?></span></td>
      </tr>
    </table>
  </ons-list-item>
<?php
if ($data->status > 1) {
  ?>
    <ons-list-item>
      <table width="100%">
        <tr>
          <td><span class="font-14" style="color: #908e8e;">สาเหตุ</span></td>
        </tr>
        <tr>
          <td><span class="font-18"><?=$logs->cause;?></span>&nbsp;&nbsp;<span class="font-14"><?=date('Y-m-d : H:i:s',$logs->post_date);?></span></td>
        </tr>
      </table>
    </ons-list-item>
<?php }?>
  <ons-list-item>
    <table width="100%">
      <tr>
        <td><span class="font-14" style="color: #908e8e;">ประเภท</span></td>
      </tr>
      <tr>
        <td><span class="font-18"><?=$text_type;?></span></td>
      </tr>
    </table>
  </ons-list-item>
  <ons-list-item>
    <table width="100%">
      <tr>
        <td colspan="2"><span class="font-14" style="color: #908e8e;">ธนาคาร</span></td>
      </tr>
      <tr>
        <td><span class="font-18"><?=$data->deposit_bank;?></span></td>
        <td><span class="font-18"><?=$txt_bank;?></span></td>
      </tr>
    </table>
  </ons-list-item>
  <ons-list-item>
    <table width="100%">
      <tr>
        <td colspan="2"><span class="font-14" style="color: #908e8e;">เวลาโอน</span></td>
      </tr>
      <tr>
        <td><span class="font-18"><?=$data->deposit_date." ".$data->deposit_time;?></span></td>
      </tr>
    </table>
  </ons-list-item>
  <ons-list-item>
    <table width="100%">
      <tr>
        <td colspan="2"><span class="font-14" style="color: #908e8e;">จำนวนเงิน</span></td>
      </tr>
      <tr>
        <td><span class="font-18"><?=number_format($data->deposit,2)." บาท";?></span></td>
      </tr>
    </table>
  </ons-list-item>
  <ons-list-item>
    <table width="100%">
      <tr>
        <td colspan="2"><span class="font-14" style="color: #908e8e;">สลิป</span></td>
      </tr>
      <tr><td align="center"><img src="assets/images/nopic.png" style="width: 210px;" id="img_slip_preview" onclick="chat_gallery_items(this)" /></td>
      </tr>
    </table>
  </ons-list-item>
</div>
<script>
  checkPicWallet('<?=$img;?>', 'img_slip_preview');
</script>