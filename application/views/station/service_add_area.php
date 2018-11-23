<?php
$this->db->select('t1.id,t2.topic_th as type_name, t1.topic_th,t1.province,t1.amphur');
$this->db->from(TBL_PLACE_CAR_STATION_OTHRET." as t1");
$this->db->join(TBL_PLACE_CAR_STATION_TYPE." as t2",'t1.type = t2.id');
$this->db->where('t1.i_leader',$_COOKIE[detect_user]);
$query = $this->db->get();
$row = $query->row();

$this->db->select('id, name, name_th');
$query = $this->db->get_where(TBL_WEB_PROVINCE,array('id' => $row->province));
$pv_res = $query->row();

$this->db->select('id, name_th');
$query = $this->db->get_where(TBL_WEB_AMPHUR,array('id' => $row->amphur));
$pv_ap = $query->row();

if ($pv_res->name_th != "") {
  $txt_pv = $pv_res->name_th;
  $color_pv = "color: #000";
}
else {
  $txt_pv = "เลือกจังหวัด";
  $color_pv = "color: #b2b2b2";
}
?>

<ons-list-header class="list-header"><b>ข้อมูลให้บริการ</b></ons-list-header>
<div class="line-ver-area"></div>
<form id="area_form">
  <div style="padding-left: 25px;">

    <ons-list-item>
      <div class="left">
        <div class="point-01"></div>
      </div>
      <div class="center" style="width: 100%;">
        <ons-card class="card" style="padding-left: 15px;">
          <ons-list-item class="input-items list-item p-l-0">
            <label class="center list-item__center" onclick="fn.pushPage({'id': 'option.html', 'title': 'จังหวัด', 'open': 'user_province'}, 'lift-ios')">
              <span id="txt_user_province" style="<?=$color_pv;?>;margin-left: 0px;" ><?=$txt_pv;?></span>
              <input type="hidden" name="province" id="province" value="<?=$pv_res->id;?>" />
            </label>

          </ons-list-item>
          <ons-list-item class="input-items list-item p-l-0">
            <div class="center list-item__center">
              <ons-input id="from-input" float=""  placeholder="สถานที่รับ"  name="from" style="width:100%;" value="<?=$row->topic_th." ".$pv_ap->name_th;?>">
                <input type="text" class="text-input font-17" placeholder="สถานที่รับ"  name="from" id="from">
                <span class="text-input__label">สถานที่รับ</span>
              </ons-input>
              <input type="hidden" name="station" id="station" value="<?=$row->id;?>">
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
            <label class="center list-item__center" onclick="selectAumphurSer();">
              <span class="font-17" id="txt_amphur" style=" padding: 6px 0px 5px 0;color: #b2b2b2;margin-left: 0px;" >เลือกพื้นที่ส่ง</span>
              <input type="hidden" name="amphur" id="amphur" value="" />
              <input type="hidden" name="to" id="to" value="" />
            </label>
          </ons-list-item>
        </ons-card>
      </div>
    </ons-list-item>

  </div>

  <div>
    <ons-card id="box_price_area" style="display: none;">
      <div class="btn-close-price font-32" onclick="colseAreaPrice();"><i class="fa fa-times-circle" aria-hidden="true"></i></div>

      <div style="padding: 5px;">
        <table width="100%">
          <tr>
            <td>ต้นทาง</td>
            <td><span id="txt_price_area_from"></span></td>
          </tr>
          <tr>
            <td>ปลายทาง</td>
            <td><span id="txt_price_area_to"></span></td>
          </tr>
        </table>
      </div>
      <ons-list-item>
        <div class="left" style="padding: 5px 10px;">
          <span class="font-17">ราคา</span>
        </div>
        <div class="center list-item__center">
          <ons-input id="price-input" pattern="\d*" name="price_area" style="width:100%;" value="" onkeyup="chk_show_save();">
            <input type="number" pattern="\d*" class="text-input font-17" id="price_area" name="price_area" value="" style="padding-left: 10px;">
            <span class="text-input__label text-input--material__label--active">สถานที่รับ</span>
          </ons-input>
        </div>
      </ons-list-item>
    </ons-card>


  </div>
</form>
<div style="margin: 0px 10px;margin-bottom: 25px;display: none;" id="box_btn_save_ser">
  <ons-button modifier="outline" class="button-margin button button--outline button--large" onclick="saveServiceArea();" style="background-color: #fff;">เพิ่มบริการพื้นที่</ons-button>
</div>