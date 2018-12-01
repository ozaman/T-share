<?php
$data = $this->Main_model->rowdata(TBL_ORDER_BOOKING,array('id' => $_GET[order_id]),array('*'));

$query_price = $this->db->query("select * from shop_country_com_list_price_taxi where i_shop_country_com_list = '".$data->plan_id."' ");
$num = 0;

$display_person = "display:none";
$display_com = "display:none";
$display_park = "display:none";
$park_total = 0;
$person_total = 0;
$com_total = 0;
//print_r($query_price->result());
//exit();
$push = "";
foreach ($query_price->result() as $row_price) {
//  echo $row_price->s_topic_th;
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
    $com_total = $data->total_commission;
    
  }
}
//echo $com_total;
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

$sql_ps = "SELECT topic_th,id, province, sub, main, amphur FROM shopping_product  WHERE id='".$data->program."' ";
$query_ps = $this->db->query($sql_ps);
$res_ps = $query_ps->row();
//	echo $check_change_plan." ++++++++";
?>
<style>
  .list-pd-r{
    padding-left: 15px;
  }
  .txt-center{
    color: #afafaf;
  }
</style>
<div style="padding: 10px 0px;">
  <p class="intro">
    <span class="font-22" style="color: #2cce33;">เสร็จสมบูรณ์</span><br/>
    <span class="font-16 txt-center">คุณได้รับค่าตอบแทนจากการส่งแขกแล้ว</span>
  </p>
</div>

<div style="padding: 0px 0px; background-color:#fff; ">
  <ons-list-item>
    <div class="center list-pd-r">
      <span class="font-16 txt-center">เลขการจอง</span>
    </div>
    <div class="right">
      <span class="font-16"><?=$data->invoice;?></span>
    </div>
  </ons-list-item>
  <ons-list-item>
    <div class="center list-pd-r">
      <span class="font-16 txt-center">สถานที่ส่ง</span>
    </div>
    <div class="right">
      <span class="font-16"><?=$res_ps->topic_th;?></span>
    </div>
  </ons-list-item>
  <ons-list-item>
    <div class="center list-pd-r">
      <span class="font-16 txt-center">จำนวนแขก</span>
    </div>
    <div class="right">
      <span class="font-16">ผู้ใหญ่ <?=$data->adult;?> เด็ก <?=$data->child;?></span>
    </div>
  </ons-list-item>
</div>

<div style="margin: 15px 0px; background-color:#fff; ">
  <ons-list-item>
    <div class="center list-pd-r">
      <span class="font-16 txt-center">ค่าตอบแทน</span>
    </div>
    <div class="right">
      <span class="font-16"><?=$plan;?></span>
    </div>
  </ons-list-item>
  <ons-list-item style="<?=$display_park;?>">
    <div class="center list-pd-r">
      <span class="font-16 txt-center">ค่าจอด</span>
    </div>
    <div class="right">
      <span class="font-16"><?=number_format($park_total,0);?> บาท</span>
    </div>
  </ons-list-item>
  <ons-list-item style="<?=$display_person;?>">
    <div class="center list-pd-r">
      <span class="font-16 txt-center">ค่าหัว</span>
    </div>
    <div class="right">
      <span class="font-16"><?=$cal_person;?> = <?=number_format($person_total,0);?> บาท</span>
    </div>
  </ons-list-item>
  <?php if ($data->transfer_money == 0) {?>
    <ons-list-item  style="<?=$display_com;?>">>
      <div class="center list-pd-r">
        <span class="font-16 txt-center">ค่าคอม</span>
      </div>
      <div class="right">
        <span class="font-16"><?=$com_progress;?>&nbsp;&nbsp;<span class="font-17" id="txt_com_persent"><?=$com_persent;?> %</span>
      </div>
    </ons-list-item>
  <?php
  }
  else {
    $query = $this->db->query('SELECT price_pay_driver_com, price_shopping FROM pay_history_driver_shopping where order_id = '.$data->id);
    $data_trans_pay = $query->row();
    ?>
   
    <ons-list-item  style="<?=$display_com;?>">
      <div class="center list-pd-r">
        <span class="font-16 txt-center">ค่าคอม</span>&nbsp;&nbsp; <span class="font-16">ยอด <?=$data_trans_pay->price_shopping;?></span>
      </div>
      <div class="right">
        <span class="font-16"><?=$com_persent;?> % : <?=$data_trans_pay->price_pay_driver_com;?> บาท</span>
      </div>
    </ons-list-item>
  <?php }
  ?>
  <ons-list-item >
    <div class="center list-pd-r">
      <span class="font-16 txt-center">รวม</span>
    </div>
    <div class="right">
      <span class="font-16"><?=number_format($all_total,0);?> บาท</span>
    </div>
  </ons-list-item>
</div>
<div style="margin: 15px 0px; background-color:#fff; ">	
  <ons-list-item>
    <div class="center list-pd-r">
      <span class="font-16 txt-center">เวลาสร้าง</span>
    </div>
    <div class="right">
      <span class="font-16"><?=date("Y-m-d h:i:s",$data->post_date);?></span>
    </div>
  </ons-list-item>
  <ons-list-item>
    <div class="center list-pd-r">
      <span class="font-16 txt-center">เวลาเสร็จสิ้น</span>
    </div>
    <div class="right">
      <span class="font-16"><?=date("Y-m-d h:i:s",$data->driver_complete_date);?></span>
    </div>
  </ons-list-item>
</div>