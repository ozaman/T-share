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
  <input type="hidden" name="station" id="station" value="<?=$row->id;?>">
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
            <!-- <div class="center list-item__center">
             <ons-input id="from-input" float=""  placeholder="สถานที่รับ"  name="from" style="width:100%;" value="<?=$row->topic_th." ".$pv_ap->name_th;?>">
                <input type="text" class="text-input font-17" placeholder="สถานที่รับ"  name="from" id="from">
                <span class="text-input__label">สถานที่รับ</span>
              </ons-input>
              
            </div>-->
            <label class="center list-item__center" onclick="selectFromSer();">
              <span class="font-17" id="txt_from" style=" padding: 6px 0px 5px 0;color: #000;margin-left: 0px;" ><?=$row->topic_th." ".$pv_ap->name_th;?></span>
              <input type="hidden" name="from" id="from" value="<?=$row->id;?>" />
              <input type="hidden" name="type_from" id="type_from" value="3" />
              <input type="hidden" name="ip_txt_from" id="ip_txt_from" value="<?=$row->topic_th." ".$pv_ap->name_th;?>" />
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

      $this->db->select('id, name_th');
      $query = $this->db->get_where(TBL_WEB_AMPHUR,array('id' => $edit_form->i_place_to));
      $place_to_form = $query->row();

      $txt_select_to = $place_to_form->name_th;
      $color_select_to = "color: #000;";
      $box_input_price = "display: block;";
      $txt_save_btn = "แก้ไขบริการพื้นที่";
      $type_action = "update";
    }
    else {
      $txt_select_to = "เลือกพื้นที่ส่ง";
      $color_select_to = "color: #b2b2b2;";
      $box_input_price = "display: none;";
      $txt_save_btn = "เพิ่มบริการพื้นที่";
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
            <label class="center list-item__center" onclick="selectAumphurSer();">
              <span class="font-17" id="txt_amphur" style=" padding: 6px 0px 5px 0;<?=$color_select_to;?>margin-left: 0px;" ><?=$txt_select_to;?></span>
              <input type="hidden" name="amphur" id="amphur" value="<?=$edit_form->i_amphur_to;?>" />
              <input type="hidden" name="to" id="to" value="<?=$edit_form->i_place_to;?>" />
            </label>
          </ons-list-item>
        </ons-card>
      </div>
    </ons-list-item>

  </div>

  <div>
    <ons-card id="box_price_area" style="<?=$box_input_price;?>">
      <div class="btn-close-price font-32" onclick="colseAreaPrice();"><i class="fa fa-times-circle" aria-hidden="true"></i></div>
      <div style="padding: 5px;">
        <table width="100%">
          <tr>
            <td>ต้นทาง</td>
            <td><span id="txt_price_area_from"><?=$row->topic_th." ".$pv_ap->name_th;?></span></td>
          </tr>
          <tr>
            <td>ปลายทาง</td>
            <td><span id="txt_price_area_to"><?=$txt_select_to;?></span></td>
          </tr>
        </table>
      </div>
      <ons-list-item>
        <div class="left" style="padding: 5px 10px;">
          <span class="font-17">ราคา</span>
        </div>
        <div class="center list-item__center">
          <ons-input id="price-input" pattern="\d*" name="price_area" style="width:100%;" value="<?=$edit_form->i_price;?>" onkeyup="chk_show_save();">
            <input type="number" pattern="\d*" class="text-input font-17" id="price_area" name="price_area" value="<?=$edit_form->i_price;?>" style="padding-left: 10px;">
            <span class="text-input__label text-input--material__label--active">สถานที่รับ</span>
          </ons-input>
        </div>
      </ons-list-item>
    </ons-card>


  </div>
</form>
<div style="margin: 0px 10px;margin-bottom: 25px;<?=$box_input_price;?>" id="box_btn_save_ser">
  <ons-button modifier="outline" class="button-margin button button--outline button--large" onclick="saveServiceArea('<?=$type_action;?>','<?=$edit_form->id;?>');" style="background-color: #fff;"><?=$txt_save_btn;?></ons-button>
</div>