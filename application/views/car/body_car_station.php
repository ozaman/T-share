<?php 
$res = array();
$_where = array();

$_where['member'] = $_COOKIE['detect_user'];
$num = $this->Main_model->num_row(TBL_PLACE_CAR_STATION,$_where);
if ($num != 0) {
 $_where = array();
 $_where['member'] = $_COOKIE['detect_user']; 
 $_select = array('*');
 $arr[STATION] = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION,$_where);
 ?>
<div class="card" id="box_zoon" onclick="//checformadd('box_time')">
    <ons-list-header class="list-header font-17">คิวรถ </ons-list-header>
    <table width="100%">
      <tr>
        <td width="80" class="font-17">ชื่อ</td>
        <td>
          <span class="font-17"><?=$arr[STATION]->topic_th;?></span>
        </td>
      </tr>
    </table>
  </div>

 <?php
}
else{
 $_select = array('*');
 $_order = array();
 $_order['topic_en'] = 'asc';
 $arr[region] = $this->Main_model->fetch_data('','',TBL_WEB_REGION,'',$_select,$_order);

 $_select = array('*');
 $_order = array();
 $_order['name_th'] = 'asc';
 $arr[province] = $this->Main_model->fetch_data('','',TBL_WEB_PROVINCE,'',$_select,$_order);
 $_where = array();
 $_where['PROVINCE_ID'] = $shop->province;
 $_select = array('*');
 $_order = array();
 $_order['name_th'] = 'asc';
 $arr[amphur] = $this->Main_model->fetch_data('','',TBL_WEB_AMPHUR,$_where,$_select,$_order);
 ?>



 <div class="card" id="box_zoon" onclick="//checformadd('box_time')">
   <ons-list-header class="list-header ">ภูมิภาค </ons-list-header>
   <!-- <div class="form-group"> -->

    <!-- <span class="list-header" style="background-image: none;"></span> -->

    <select class="select-input font-17" name="region" id="region" onclick="_region(this.value)" style="border-radius: 0px;padding: 5px;width: 100%; width: 100%;">
      <option value="">เลือกภูมิภาค </option>
      <?php
      foreach($arr[region] as $key=>$region){
        if($station->region == $region->id ){
          $selected_sub = "selected";
        }else{
          $selected_sub = "";
        }
        ?>
        <option value="<?=$region->id;?>"  <?=$selected_sub;?> ><?=$region->topic_th;?></option>
      <?php } ?>
    </select>

    <!-- </div> -->

  </div>
  <div class="card" id="box_zoon" onclick="//checformadd('box_time')">
   <ons-list-header class="list-header ">จังหวัด</ons-list-header>
   <!-- <div class="form-group"> -->

    <!-- <span class="list-header" style="background-image: none;"></span> -->

    <select class="select-input font-17" name="province" id="province" onchange="_province(this.value);" style="border-radius: 0px;padding: 5px;width: 100%; width: 100%;">
      <option value="">เลือกจังหวัด</option>
      <?php
      foreach($arr[province] as $key=>$province){
        if($station->province == $province->id ){
          $selected_sub = "selected";
        }else{
          $selected_sub = "";
        }
        ?>
        <option value="<?=$province->id;?>"  <?=$selected_sub;?> ><?=$province->name_th;?></option>
      <?php } ?>
    </select>

    <!-- </div> -->

  </div>
  <div class="card" id="box_zoon" onclick="//checformadd('box_time')">
   <ons-list-header class="list-header ">อำเภอ/เขต </ons-list-header>
   <!-- <div class="form-group"> -->

    <!-- <span class="list-header" style="background-image: none;"></span> -->

    <select class="select-input font-17" name="amphur" id="amphur" value="" onchange="//checkzoon(this.value)" style="border-radius: 0px;padding: 5px;width: 100%; width: 100%;">
      <option value="0">-- เลือกเขต --</option>
      <?php
      foreach($arr[amphur] as $key=>$amphur){

        if($station->amphur == $amphur->id ){
          $selected_sub = "selected";
        }else{
          $selected_sub = "";
        }
        ?>
        <option value="<?=$amphur->id;?>"  <?=$selected_sub;?> ><?=$amphur->name_th;?></option>
      <?php } ?>


    </select>

    <!-- </div> -->

  </div>
  <div class="card" id="box_zoon" onclick="//checformadd('box_time')">
    <ons-list-header class="list-header ">คิวรถ </ons-list-header>
    <table width="100%">
      <tr>
        <td width="45">ชื่อ</td>
        <td>
          <ons-input id="station" name="station" type="text"  class="font-17" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
        </td>
      </tr>
    </table>
  </div>
  <?php } ?>