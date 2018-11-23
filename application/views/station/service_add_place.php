<?php
$this->db->select('*');
$where[i_status] = 1;
$where[id] = $_GET[amp_to_id]; // พื้นที่ 
$query = $this->db->get_where(TBL_PLACE_CAR_STATION_SERVICE,$where);
$res_ser = $query->row();

$this->db->select('id, topic_th');
$query = $this->db->get_where(TBL_PLACE_CAR_STATION_OTHRET,array('id' => $res_ser->i_place_from));
$place_from_res = $query->row();

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
<form id="place_form">
  <ons-list-header class="list-header"><b>ข้อมูลให้บริการ</b></ons-list-header>
  <div class="line-ver-place"></div>
  <div style="padding-left: 25px;">

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
            <div class="center list-item__center">
              <ons-input id="from-input" float=""  placeholder="สถานที่รับ"  name="from" style="width:100%;" value="<?=$place_from_res->topic_th." ".$amp_from->name_th;?>">
                <input type="text" class="text-input font-17" placeholder="สถานที่รับ"  name="from" id="from">
                <span class="text-input__label">สถานที่รับ</span>
              </ons-input>
              <input type="hidden" name="station" id="station" value="<?=$place_from_res->id;?>">
            </div>
          </ons-list-item>
        </ons-card>
      </div>
    </ons-list-item>

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
              <span class="font-17" id="txt_place_to" style=" padding: 6px 0px 5px 0;color: #b2b2b2;margin-left: 0px;" >เลือกสถานที่ส่ง</span>
              <input type="hidden" name="place_to" id="place_to" value="" />
              <input type="hidden" name="ip_txt_place_to" id="ip_txt_place_to" value="" />
            </label>
          </ons-list-item>
        </ons-card>
      </div>
    </ons-list-item>

  </div>

  <div>
    <ons-card id="box_price_place" style="display: none;">
      <div class="btn-close-price font-32" onclick="colsePlacePrice();"><i class="fa fa-times-circle" aria-hidden="true"></i></div>
      <div style="padding: 5px;">
        <table width="100%">
          <tr>
            <td>ต้นทาง</td>
            <td><span id="txt_price_place_from"></span></td>
          </tr>
          <tr>
            <td>ปลายทาง</td>
            <td><span id="txt_price_place_to"></span></td>
          </tr>
        </table>
      </div>
      <ons-list-item>
        <div class="left" style="padding: 5px 10px;">
          <span class="font-17">ราคา</span>
        </div>
        <div class="center list-item__center">
          <ons-input id="price-input" pattern="\d*" name="price_place" style="width:100%;" value="" onkeyup="chk_show_save_place();">
            <input type="number" pattern="\d*" class="text-input font-17" id="price_place" name="price_place" value="" style="padding-left: 10px;">
            <span class="text-input__label text-input--material__label--active">สถานที่รับ</span>
          </ons-input>
        </div>
      </ons-list-item>
    </ons-card>

  </div>
</form>
<div style="margin: 0px 10px;margin-bottom: 25px;display: none;" id="box_btn_save_ser">
  <ons-button modifier="outline" class="button-margin button button--outline button--large" onclick="saveServicePlace();" style="background-color: #fff;">บันทึกบริการ</ons-button>
</div>