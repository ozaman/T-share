<?php
$data = $_POST[data];

$income = $data[cost] - $data[s_cost];

$post_date = date_create($data[post_date]);
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
    <!--<span class="font-16 txt-center">คุณได้รับค่าตอบแทนจากการส่งแขกแล้ว</span>-->
  </p>
</div>

<div style="padding: 0px 0px; background-color:#fff; ">
  <ons-list-item>
    <div class="center list-pd-r">
      <span class="font-16 txt-center">เลขการจอง</span>
    </div>
    <div class="right">
      <span class="font-16"><?=$data[invoice];?></span>
    </div>
  </ons-list-item>
  <ons-list-item>
    <div class="center list-pd-r">
      <span class="font-16 txt-center">สถานที่รับ</span>
    </div>
    <div class="right">
      <span class="font-16"><?=$data[pickup_place][topic];?></span>
    </div>
  </ons-list-item>
  <ons-list-item>
    <div class="center list-pd-r">
      <span class="font-16 txt-center">สถานที่ส่ง</span>
    </div>
    <div class="right">
      <span class="font-16"><?=$data[to_place][topic];?></span>
    </div>
  </ons-list-item>
  <ons-list-item>
    <div class="center list-pd-r">
      <span class="font-16 txt-center">จำนวนแขก</span>
    </div>
    <div class="right">
      <span class="font-16">ผู้ใหญ่ <?=$data[adult];?> เด็ก <?=$data[child];?></span>
    </div>
  </ons-list-item>
</div>

<div style="margin: 15px 0px; background-color:#fff; ">

  <ons-list-item>
    <div class="center list-pd-r">
      <span class="font-16 txt-center">ราคา</span>
    </div>
    <div class="right">
      <span class="font-16"><?=number_format($data[cost],2)."(".$data[s_cost].")"." บาท";?></span>
    </div>
  </ons-list-item>
  <ons-list-item>
    <div class="center list-pd-r">
      <span class="font-16 txt-center">รายได้</span>
    </div>
    <div class="right">
      <span class="font-16"><?=number_format($income,2)." บาท";?></span>
    </div>
  </ons-list-item>
</div>	

<div style="margin: 15px 0px; background-color:#fff; ">	
  <ons-list-item>
    <div class="center list-pd-r">
      <span class="font-16 txt-center">เวลาสร้าง</span>
    </div>
    <div class="right">
      <span class="font-16"><?=date_format($post_date,"Y-m-d H:i:s");?> น.</span>
    </div>
  </ons-list-item>
  <ons-list-item>
    <div class="center list-pd-r">
      <span class="font-16 txt-center">เวลาเสร็จสิ้น</span>
    </div>
    <div class="right">
      <span class="font-16"><?=date("Y-m-d H:i:s",$data[driver_checkcar_date]);?> น.</span>
    </div>
  </ons-list-item>
</div>

