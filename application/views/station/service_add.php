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
<style>
  .point-01{
    width: 13px;height: 13px; background-color: #555;
  }
  .point-02{
    width: 13px;height: 13px; background-color: #3b5998;
  }
  .line-ver{
    width: 3px;
    height: 110px;
    background-color: #afafaf;
    position: absolute;
    left: 30px;
    top: 100px;
    border-radius: 10px;
  }
</style>
<ons-list-header class="list-header"><b>ข้อมูลให้บริการ</b></ons-list-header>
<div class="line-ver"></div>
<div style="padding-left: 25px;">

  <ons-list-item>
    <div class="left">
      <div class="point-01"></div>
    </div>
    <div class="center" style="width: 100%;">
      <ons-card class="card" style="padding-left: 15px;">
        <ons-list-item class="input-items list-item p-l-0">
          <!--    <div class="left list-item__left" style="padding-right: 15px;">
                <i class="material-icons">location_on</i>
              </div>-->
          <label class="center list-item__center" onclick="fn.pushPage({'id': 'option.html', 'title': 'จังหวัด', 'open': 'user_province'}, 'lift-ios')">
            <span id="txt_user_province" style="<?=$color_pv;?>;margin-left: 0px;" ><?=$txt_pv;?></span>
            <input type="hidden" name="province" id="province" value="<?=$pv_res->id;?>" />
          </label>

        </ons-list-item>
        <ons-list-item class="input-items list-item p-l-0">
          <!--    <div class="left list-item__left" style=" padding-left: 8px;padding-right: 20px;">
                <div style="width: 10px;height: 10px; background-color: #fff;"></div>
              </div>-->
          <div class="center list-item__center">
            <ons-input id="from-input" float=""  placeholder="สถานที่รับ"  name="from" style="width:100%;" value="<?=$row->topic_th." ".$pv_ap->name_th;?>">
              <input type="text" class="text-input font-17" placeholder="สถานที่รับ"  name="from">
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
          <!--    <div class="left list-item__left" style=" padding-left: 8px;padding-right: 20px;"">
                <div style="width: 10px;height: 10px; background-color: #fff;"></div>
              </div>-->
          <label class="center list-item__center" onclick="selectAumphurSer();">
            <span class="font-17" id="txt_aumphur" style=" padding: 6px 0px 5px 0;color: #b2b2b2;margin-left: 0px;" >เลือกพื้นที่ส่ง</span>
            <input type="hidden" name="aumphur" id="aumphur" value="" />
          </label>
        </ons-list-item>

        <ons-list-item class="input-items list-item p-l-0">
          <!--    <div class="left list-item__left" style=" padding-left: 8px;padding-right: 20px;"">
                <div style="width: 10px;height: 10px; background-color: #fff;"></div>
              </div>-->
          <label class="center list-item__center" onclick="selectTransferPlaceSer();">
            <span class="font-17" id="txt_place_to" style=" padding: 6px 0px 5px 0;color: #b2b2b2;margin-left: 0px;" >เลือกสถานที่ส่ง</span>
            <input type="hidden" name="place_to" id="place_to" value="" />
          </label>
        </ons-list-item>
      </ons-card>
    </div>
  </ons-list-item>

</div>

<div>
  <ons-card>
    <div style="padding: 5px;">
      <table width="100%">
        <tr>
          <td>ต้นทาง</td>
          <td>ทดสอบจำกัด</td>
        </tr>
        <tr>
          <td>ปลายทาง</td>
          <td>Central Festival Phuket</td>
        </tr>
      </table>
    </div>
    <ons-list-item>
      <div class="left" style="padding: 5px 10px;">
      <span class="font-17">ราคา</span>
    </div>
    <div class="center list-item__center">
      <ons-input id="price-input" pattern="\d*" name="from" style="width:100%;" value="">
        <input type="number" pattern="\d*" class="text-input font-17" name="price" value="" style="padding-left: 10px;">
        <span class="text-input__label text-input--material__label--active">สถานที่รับ</span>
      </ons-input>
    </div>
    </ons-list-item>
  </ons-card>
  
  <div style="margin: 0px 10px;margin-bottom: 25px;">
    <ons-button modifier="outline" class="button-margin button button--outline button--large" onclick="saveDataPf();" style="background-color: #fff;">บันทึกบริการ</ons-button>
  </div>
</div>