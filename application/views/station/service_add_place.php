<?php
$this->db->select('*');
$where[i_status] = 1;
$where[id] = $_GET[amp_to_id]; // พื้นที่ 
$query = $this->db->get_where(TBL_PLACE_CAR_STATION_SERVICE,$where);
$res_ser = $query->row();

if ($res_ser->i_type_from == 3) {
  $this->db->select('id, topic_th');
  $query = $this->db->get_where(TBL_PLACE_CAR_STATION_OTHRET,array('id' => $res_ser->i_place_from));
  $place_from_res = $query->row();
  $text_from = $place_from_res->topic_th." ".$amp_from->name_th;
}
else if ($res_ser->i_type_from == 2) {

  $this->db->select('*');
  $query = $this->db->get_where(TBL_WEB_TRANSFERPLACE_NEW,array('id' => $res_ser->i_place_from));
  $place_from_res = $query->row();
  $text_from = $place_from_res->topic;
}
//echo $res_ser->i_place_from;
//exit();

$this->db->select('id, name_th');
$query = $this->db->get_where(TBL_WEB_AMPHUR,array('id' => $res_ser->i_amphur_from));
$amp_from = $query->row();

$this->db->select('id, name_th');
$query = $this->db->get_where(TBL_WEB_PROVINCE,array('id' => $res_ser->i_province_from));
$pv_res = $query->row();

$this->db->select('id, name_th');
$query = $this->db->get_where(TBL_WEB_AMPHUR,array('id' => $res_ser->i_amphur_to));
$amp_to = $query->row();
?>
<input type="hidden" value="<?=$_GET[area_name];?>" id="area_name" />
<form id="place_form">
  <ons-list-header class="list-header"><b>ข้อมูลให้บริการ</b></ons-list-header>
  <div class="line-ver-place"></div>
  <div style="padding-left: 25px;">
    <input type="hidden" name="station" id="station" value="<?=$res_ser->i_station;?>">
    <input type="hidden" name="main" id="main" value="<?=$_GET[amp_to_id];?>">
    <ons-list-item>
      <div class="left">
        <div class="point-01"></div>
      </div>
      <div class="center" style="width: 100%;">
        <ons-card class="card" style="padding-left: 15px;">
          <ons-list-item class="input-items list-item p-l-0">
            <label class="center list-item__center">
              <span id="txt_user_province" style="color: #000;margin-left: 0px;" ><?=$pv_res->name_th;?></span>
              <input type="hidden" name="province" id="province" value="<?=$pv_res->id;?>" />
            </label>

          </ons-list-item>
          <ons-list-item class="input-items list-item p-l-0">
            <label class="center list-item__center">
              <span class="font-17" id="txt_from" style=" padding: 6px 0px 5px 0;color: #000;margin-left: 0px;" ><?=$text_from;?></span>
              <input type="hidden" name="from" id="from" value="<?=$place_from_res->id;?>" />
              <input type="hidden" name="type_from" id="type_from" value="<?=$res_ser->i_type_from;?>" />
              <input type="hidden" name="ip_txt_from" id="ip_txt_from" value="<?=$text_from;?>" />
            </label>
          </ons-list-item>
        </ons-card>
      </div>
    </ons-list-item>
    <?php
    if ($_GET[id] != "") {
      $this->db->select('*');
      $query = $this->db->get_where(TBL_PLACE_CAR_STATION_SERVICE,array('id' => $_GET[id]));
      $edit_form = $query->row();

//      $this->db->select('topic');
//      $query = $this->db->get_where(TBL_WEB_TRANSFERPLACE_NEW,array('id' => $edit_form->i_place_to));
//      $place_to_form = $query->row();

      $this->db->select('id, topic');
      $query = $this->db->get_where(TBL_WEB_TRANSFERPLACE_NEW,array('id' => $edit_form->i_place_to));
      $place_to_form = $query->row();

      $txt_select_to = $place_to_form->topic;
      $color_select_to = "color: #000;";
      $box_input_price = "display: block;";
      $txt_save_btn = "แก้ไขบริการสถานที่";
      $type_action = "update";
    }
    else {
      $txt_select_to = "เลือกพื้นที่ส่ง";
      $color_select_to = "color: #b2b2b2;";
      $box_input_price = "display: none;";
      $txt_save_btn = "เพิ่มบริการสถานที่";
      $type_action = "add";
    }
    ?>
    <ons-list-item>
      <div class="left">
        <div class="point-02"></div>
      </div>
      <div class="center" style="width: 100%;">
        <ons-card style="padding-left: 15px;">
          <ons-list-item class="input-items list-item p-l-0">
            <label class="center list-item__center">
              <span class="font-17" id="txt_aumphur" style=" padding: 6px 0px 5px 0;color: #000;margin-left: 0px;" ><?=$amp_to->name_th;?></span>
              <input type="hidden" name="amphur_to" id="amphur_to" value="<?=$amp_to->id;?>" />
            </label>
          </ons-list-item>

          <ons-list-item class="input-items list-item p-l-0">
            <label class="center list-item__center" onclick="selectTransferPlaceSer('<?=$amp_to->name_th;?>');">
              <span class="font-17" id="txt_place_to" style=" padding: 6px 0px 5px 0;<?=$color_select_to;?>margin-left: 0px;" ><?=$txt_select_to;?></span>
              <input type="hidden" name="place_to" id="place_to" value="<?=$place_to_form->id;?>" />
              <input type="hidden" name="ip_txt_place_to" id="ip_txt_place_to" value="<?=$txt_select_to;?>" />
              <input type="hidden" name="type_to" id="type_to" value="2" />
            </label>
          </ons-list-item>
        </ons-card>
      </div>
    </ons-list-item>

  </div>

  <div style="">
    <ons-card id="box_price_place" style="<?=$box_input_price;?>">
      <div class="btn-close-price font-32" onclick="colsePlacePrice();"><i class="fa fa-times-circle" aria-hidden="true"></i></div>
      <div style="padding: 5px;">
        <table width="100%">
          <tr>
            <td>ต้นทาง</td>
            <td><span id="txt_price_place_from"><?=$text_from;?></span></td>
          </tr>
          <tr>
            <td>ปลายทาง</td>
            <td><span id="txt_price_place_to"><?=$txt_select_to;?></span></td>
          </tr>
        </table>
      </div>
      <ons-list-item>
        <div class="left" style="padding: 5px 10px;">
          <span class="font-17">ราคา</span>
        </div>
        <div class="center list-item__center">
          <ons-input id="price-input" pattern="\d*" name="price_place" style="width:100%;" value="<?=$edit_form->i_price;?>" onkeyup="chk_show_save_place();">
            <input type="number" pattern="\d*" class="text-input font-17" id="price_place" name="price_place" value="<?=$edit_form->i_price;?>" style="padding-left: 10px;">
            <span class="text-input__label text-input--material__label--active">ราคา</span>
          </ons-input>
        </div>
      </ons-list-item>
    </ons-card>

  </div>
</form>
<div style="margin: 0px 10px;margin-bottom: 25px;<?=$box_input_price;?>" id="box_btn_save_ser">
  <ons-button modifier="outline" class="button-margin button button--outline button--large" onclick="saveServicePlace('<?=$type_action;?>', <?=$edit_form->id;?>);" style="background-color: #fff;"><?=$txt_save_btn;?></ons-button>
</div>