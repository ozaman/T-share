<?php
$data = $this->Main_model->rowdata(TBL_ORDER_BOOKING,array('id' => $_GET[id]),array('*'));

$query_price = $this->db->query("select * from shop_country_com_list_price_taxi where i_shop_country_com_list = '".$data->plan_id."' ");
$num = 0;

$display_person = "display:none";
$display_com = "display:none";
$display_park = "display:none";
$park_total = 0;
$person_total = 0;
$com_total = 0;
foreach ($query_price->result() as $row_price) {
  if ($num >= 1) {
    $push = " + ";
  }
  else {
    $push = "";
  }
  $plan .= $push.$row_price->s_topic_th;
  $num++;

  if ($row_price->s_topic_en == "park") {
    $check_type_park = 1;
    $display_park = "";
    $park_total = $data->price_park_unit;
  }

  if ($row_price->s_topic_en == "person") {
    $check_type_person = 1;
    $display_person = "";
    $person_total = intval($data->price_person_unit) * intval($data->adult);
    $cal_person = $data->price_person_unit."x".$data->adult;
  }

  if ($row_price->s_topic_en == "comision") {
    $check_type_com = 1;
    $display_com = "";
    $com_persent = $data->commission_persent;
    $com_progress = '<span style="padding-left: 0px;"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i>&nbsp;<font color="#FF0000">รอแจ้งโอน</font></span>';
  }
}
$all_total = $park_total + $person_total + $com_total;


$sql_country = "SELECT t2.s_country_code, t2.s_topic_th FROM shop_country_com_list_price_taxi as t1 left join shop_country_icon_taxi as t2 on t1.i_shop_country_icon = t2.id WHERE t1.i_shop_country_com_list='".$data->plan_id."'    ";
$query_country = $this->db->query($sql_country);
$res_country = $query_country->row();

/* $sql_country = "SELECT * from ";
  $query_country = $this->db->query($sql_country);
  $res_country = $query_country->row(); */

$query = $this->db->query("SELECT cause_change FROM change_plan_logs where order_id = '".$data->id."' ");
$res_log_change = $query->row();

$query = $this->db->query("SELECT s_topic FROM shop_type_change_plan where i_status = 1 and id = '".$res_log_change->cause_change."' ");
$res_type_change = $query->row();
if ($res_type_change->s_topic == "") {
  $res_type_change->s_topic = "คนขับเปลี่ยนใจ";
}


$query = $this->db->query("select * from change_plan_logs where order_id = ".$data->id);
$check_change_plan = $query->num_rows();
if ($check_change_plan == 0) {
  $titel = t_work_remuneration;
  $display_none_change_plan = "display:none;";
  $color_titel = "";
}
else {
  $titel = "เปลี่ยนแปลง".t_work_remuneration;
  $display_none_change_plan = "";
  $color_titel = "color: #f00 !important;";
}

//	echo $check_change_plan." ++++++++";
?>
<div style="padding: 0px 0px;">
  <ons-list-header class="list-header" style="<?=$color_titel;?>"> <?=$titel;?></ons-list-header>
  <table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_income_driver">
    <tr style="<?=$display_none_change_plan;?>">
      <td>สาเหตุ</td>
      <td><?=$res_type_change->s_topic;?></td>
    </tr>
    <tr>
      <td width="35%"><span class="font-17">ประเภท</span></td>
      <td colspan="2"><span class="font-17" id="txt_type_plan"><?=$plan;?></span></td>
    </tr>
    <tr>
      <td width="35%"><span class="font-17">สัญชาติ</span></td>
      <td colspan="2">
        <table>
          <tr>
            <td>
              <img src="<?=base_url();?>assets/images/flag/icon/<?=$res_country->s_country_code;?>.png" width="25" height="25" alt="">
            </td>
            <td>&nbsp;</td>
            <td><span class="font-17" id="txt_county_pp"><?=$res_country->s_topic_th;?></span></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr style="<?=$display_park;?>">
      <td width="35%"><span class="font-17">ค่าจอด</span></td>
      <td align="right"><span class="font-17" id="txt_park_total"><?=number_format($park_total,0);?></span></td>
      <td width="10%"><span class="font-17">บ.</span></td>
    </tr>
    <tr style="<?=$display_person;?>">
      <td width="35%"><span class="font-17">ค่าหัว</span></td>
      <td align="right"><span class="font-17" id="txt_person_total"><?=$cal_person;?> = <?=number_format($person_total,0);?></span></td>
      <td width="10%"><span class="font-17">บ.</span></td>
    </tr>
    <?php if ($data->transfer_money == 0) {?>
      <tr style="<?=$display_com;?>">
        <td width="35%"><span class="font-17">ค่าคอม</span></td>
        <td align="right"><?=$com_progress;?>&nbsp;&nbsp;<span class="font-17" id="txt_com_persent"><?=$com_persent;?> %</span>
        </td>
        <td width="10%">
        </td>
      </tr>
    <?php }
    else {
        $query = $this->db->query('SELECT * FROM pay_history_driver_shopping where order_id = '.$data->id);
        $data_trans_pay = $query->row();
      ?>
      <tr style="<?=$display_com;?>">
        <td width="35%"><span class="font-17">ค่าคอม</span></td>
        <td align=""><?=$com_persent;?> %</span>
        </td>
        <td width="10%">
          <span><?=$data_trans_pay->price_pay_driver_com;?> บ.</span>
        </td>
      </tr>
    <?php }
    ?>

    <tr>
      <td  width="35%">รวม</td>
      <td align="right">
        <span class="16" id="txt_all_total">
<?=number_format($all_total,0);?>
        </span>
      </td>
      <td width="10%">
        <span class="font-17">บ.</span>
      </td>
    </tr>
  </table>   	
</div>

<?php if ($_COOKIE[detect_userclass] == "taxis" && $data->check_tran_job > 0) {?>
  <div style="padding: 0px 0px;">
    <ons-list-header class="list-header">เลือกบัญชีรับเงิน</ons-list-header>
    <?php
    $sql = "SELECT t1.*,t2.name_th as bank_list, t2.img as bank_img FROM web_bank_driver as t1 left join web_bank_list as t2 on t1.bank_id = t2.id where t1.status = 1 order by status_often desc, status desc ";
    $query_bank = $this->db->query($sql);
    foreach ($query_bank->result() as $row) {
      ?>
      <ons-list-item tappable onclick="">
        <label class="left">
          <ons-radio class="radio-fruit" input-id="radio-<?=$row->id;?>" value="<?=$row->id;?>" name="bank_user_select"></ons-radio>
        </label>
        <label for="radio-<?=$row->id;?>" class="center">
          <table width="100%">
            <tr>
              <td width="30"><img src="assets/images/bank/<?=$row->bank_img;?>" class="logo-bank" style="width: 20px;"></td>
              <td width="100"><span class="font-16"><?=$row->bank_list;?></span></td>
              <td><span class="font-16"><?=$row->bank_number;?></span></td>
            </tr>
          </table>
        </label>
      </ons-list-item>
    <?php }
    ?>
  </div>
<?php }
?>