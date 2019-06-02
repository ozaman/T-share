<style>
  .list-item{
    padding-left: 14px;
  }
</style>
<?php
$select = "SELECT t1.*, t2.name_th as type_name, t3.name_th as pv_name, t4.img as color_img, t5.img as plate_img from web_carall as t1 LEFT JOIN web_car_use_type as t2 ON t1.car_type = t2.id left join web_province as t3 on t1.i_province = t3.id left join web_car_color as t4 on t1.i_car_color = t4.id left join web_car_plate as t5 on t1.i_plate_color = t5.id  where t1.id = '".$_GET[id]."' ";
$query = $this->db->query($select);
$data_car = $query->row();

$select = "SELECT id,name_en FROM web_car_gen where id = ".$data_car->i_car_gen;
$query = $this->db->query($select);
$data_gen = $query->row();

$select_brand = "SELECT img FROM web_car_brand where id = '".$data_car->i_car_brand."' ";
$query_brand = $this->db->query($select_brand);
$data_brand = $query_brand->row();

$txt_type = "เลือก";
$txt_car_color = "เลือก";
$txt_brand = "เลือก";
$txt_plate_color = "เลือก";
$txt_pv = "เลือก";
$txt_car_gen = "เลือก";

if ($data_gen->name_en != "") {
  $txt_car_gen = $data_gen->name_en;
}
if ($data_car->type_name != "") {
  $txt_type = $data_car->type_name;
}
else {
  $type_ds_none = "display:none;";
}

if ($data_car->car_brand != "") {
  $txt_brand = $data_car->car_brand;
  $img_brand = "background-position:".$data_brand->img;
}
else {
  $brand_ds_none = "display:none;";
}

if ($data_car->car_color != "") {
  $txt_car_color = $data_car->car_color;
  $img_car_color = "assets/images/car/".$data_car->color_img;
}
else {
  $color_ds_none = "display:none;";
}

if ($data_car->plate_color != "") {
  $txt_plate_color = $data_car->plate_color;
  $plate_img = "assets/images/car/plate/".$data_car->plate_img;
}
else {
  $plate_ds_none = "display:none;";
}

if ($data_car->s_car_insurance_com != "") {
  $val_car_ins = $data_car->s_car_insurance_com;
}
else {
  $val_car_ins = "เลือก";
}
?>

<form name="form_editcar" id="form_editcar"  enctype="multipart/form-data">
  <input type="hidden" value="<?=$_GET[id];?>" id="id_carall" name="id_carall" />
  <input type="hidden" value="<?=$_GET[id];?>" id="center_id" name="center_id" />
  <ons-card  class="card">
    <ons-list-header class="list-header"><b>ข้อมูลรถ</b></ons-list-header>
    <ons-list-item class="input-items list-item p-l-0">
      <div class="left list-item__left"  style="width: 110px;">
        <!--<ons-icon icon="fa-car" class="list-item__icon ons-icon"></ons-icon>-->
        <span>ป้ายทะเบียน</span>
      </div>
      <label class="center list-item__center">
        <ons-input id="name-input" float="" maxlength="30" placeholder="" name="plate_num" style="width:100%;" value="<?=$data_car->plate_num;?>">
          <input type="text" class="text-input" maxlength="30" placeholder="" name="plate_num" >
          <span class="text-input__label">
            ป้ายทะเบียน</span>
        </ons-input>
        <input type="hidden" value="0" id="valid_type_plate" />
        <i id="corrent-plate" class="fa fa-check-circle pass checking-plate" aria-hidden="true" style="display: none;"></i>
        <i id="incorrent-plate" class="fa fa-times-circle no-pass checking-plate" aria-hidden="true" style="display: none;"></i>
      </label>
    </ons-list-item>
    <ons-list-item class="input-items list-item p-l-0">
      <div class="left list-item__left"  style="width: 110px;">
        <span>ประเภทรถ</span>
      </div>
      <div class="center list-item__center custom-sl-pd" onclick="fn.pushPage({'id': 'option.html', 'title': 'ประเภทรถ', 'open': 'car_type'}, 'lift-ios')">
        <span id="txt_car_type" ><?=$txt_type;?></span>
        <input type="hidden" name="car_type" id="car_type_edit" value="<?=$data_car->car_type;?>" />
      </div>
    </ons-list-item>
    <ons-list-item class="input-items list-item p-l-0">
      <div class="left list-item__left" style="width: 110px;">
        <span>ยี่ห้อ</span>
      </div>
      <div class="center list-item__center custom-sl-pd" onclick="fn.pushPage({'id': 'option.html', 'title': 'ยี่ห้อรถ', 'open': 'car_brand'}, 'lift-ios')">

        <span class="brand-small list-item__thumbnail" id="img_car_brand_show" style="margin-right: 10px;<?=$brand_ds_none;?><?=$img_brand;?>"  ></span>
        <span id="txt_car_brand" ><?=$txt_brand;?></span>
        <input type="hidden" name="car_brand" id="car_brand" value="<?=$data_car->i_car_brand;?>" />
        <input type="hidden" name="car_brand_txt" id="car_brand_txt_input" value="<?=$data_car->car_brand;?>" />
      </div>
    </ons-list-item>
    <ons-list-item class="input-items list-item p-l-0" >
      <div class="left list-item__left"  style="width: 110px;" id="car_gen_txt">
        <span>รุ่น</span>
      </div>
      <div class="center list-item__center custom-sl-pd" id="car_gen_box" onclick="fn.pushPage({'id': 'option.html', 'title': 'รุ่นรถ', 'open': 'car_gen'}, 'lift-ios')">
        <span id="txt_car_gen" ><?=$txt_car_gen;?></span>
        <input type="hidden" name="i_car_gen" id="i_car_gen" value="<?=$data_gen->id;?>" />
      </div>
    </ons-list-item>
    <ons-list-item class="input-items list-item p-l-0">
      <div class="left list-item__left" style="width: 110px;">
        <span>สีรถ</span>
      </div>
      <div class="center list-item__center custom-sl-pd" onclick="fn.pushPage({'id': 'option.html', 'title': 'สีรถ', 'open': 'car_color'}, 'lift-ios')">
        <img src="<?=$img_car_color;?>" style="width: 30px; margin-right: 15px;border: 1px solid #eee;<?=$color_ds_none;?>" id="img_car_color_show"  />
        <span id="txt_car_color" ><?=$txt_car_color;?></span>
        <input type="hidden" name="car_color" id="car_color" value="<?=$data_car->i_car_color;?>" />
        <input type="hidden" name="car_color_txt" id="car_color_txt_input" value="<?=$data_car->car_color;?>" />
      </div>
    </ons-list-item>
    <ons-list-item class="input-items list-item p-l-0">
      <div class="left list-item__left" style="width: 110px;">
        <span>สีป้ายทะเบียน</span>
      </div>
      <div class="center list-item__center custom-sl-pd" onclick="fn.pushPage({'id': 'option.html', 'title': 'สีป้ายทะเบียน', 'open': 'plate_color'}, 'lift-ios')">
        <img src="<?=$plate_img;?>" style="width: 50px; margin-right: 0px;<?=$plate_ds_none;?>" id="img_plate_color_show"  />
        <span id="txt_plate_color" ><?=$txt_plate_color;?></span>
        <input type="hidden" name="plate_color" id="plate_color" value="<?=$data_car->i_plate_color;?>" />
        <input type="hidden" name="plate_color_txt" id="plate_color_txt_input" value="<?=$data_car->plate_color;?>" />
      </div>
    </ons-list-item>

    <ons-list-item class="input-items list-item p-l-0">
      <div class="left list-item__left" style="width: 110px;">
        <span>จังหวัด</span>
      </div>
      <div class="center list-item__center custom-sl-pd" onclick="fn.pushPage({'id': 'option.html', 'title': 'จังหวัด', 'open': 'car_province'}, 'lift-ios')">
        <span id="txt_car_province" ><?=$data_car->pv_name;?></span>
        <input type="hidden" name="car_province" id="car_province" value="<?=$data_car->i_province;?>" />
      </div>
    </ons-list-item>
  </ons-card>

  <ons-card  class="card">
    <ons-list-header class="list-header"><b>ภาพหน้ารถ</b></ons-list-header>
    <div align="center" style="margin-top: 10px;">
<!--      <div >
        <input type="file" class="cropit-image-input" accept="image/*" id="img_car_1" onchange="readURLcar(this, 'img_car_1', 1, 'edit');"  style="opacity: 0;position: absolute;">
      </div>-->
      <span id="txt-img-has-img_car_1" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
      <span id="txt-img-nohas-img_car_1" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
      <div class="box-preview-img" id="box_img_car_1" onclick="performClick('img_car_1');" >
        <img src="" style="" class="img-preview-show" id="pv_img_car_1"  /> 
      </div> 
<!--      <span style="background-color: #f4f4f4;
            padding: 0px 10px;
            position: absolute;
            margin-left: -9px;
            margin-top: -25px;
            border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; แก้ไขรูปภาพ</span>-->
      <div class="upload-btn-wrapper" >
        <button class="btn-f" type="button"><i class="fa fa-camera" aria-hidden="true"></i> อัพโหลดรูปถ่าย</button>
        <input type="file" id="img_car_1" accept="image/*" onchange="readURLcar(this, 'img_car_1', 1, 'edit');"/>
      </div>
    </div>
  </ons-card>   

  <ons-card  class="card">
    <ons-list-header class="list-header"><b>ภาพข้างรถ</b></ons-list-header>
    <div align="center" style="margin-top: 10px;">
<!--      <div >
        <input type="file" class="cropit-image-input" accept="image/*" id="img_car_2"  style="opacity: 0;position: absolute;" onchange="readURLcar(this, 'img_car_2', 2, 'edit');">
      </div>-->
      <span id="txt-img-has-img_car_2" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
      <span id="txt-img-nohas-img_car_2" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
      <div class="box-preview-img" id="box_img_car_2" onclick="performClick('img_car_2');" >
        <img src="" style="" class="img-preview-show" id="pv_img_car_2"  /> 
      </div> 
<!--      <span style="background-color: #f4f4f4;
            padding: 0px 10px;
            position: absolute;
            margin-left: -9px;
            margin-top: -25px;
            border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; แก้ไขรูปภาพ</span>-->
      <div class="upload-btn-wrapper" >
        <button class="btn-f" type="button"><i class="fa fa-camera" aria-hidden="true"></i> อัพโหลดรูปถ่าย</button>
        <input type="file" id="img_car_2" accept="image/*"  onchange="readURLcar(this, 'img_car_2', 2, 'edit');" />
      </div>
    </div>
  </ons-card>  

  <ons-card  class="card">
    <ons-list-header class="list-header"><b>ภาพในรถ</b></ons-list-header>
    <div align="center" style="margin-top: 10px;">
<!--      <div >
        <input type="file" class="cropit-image-input" accept="image/*" id="img_car_3"  style="opacity: 0;position: absolute;" onchange="readURLcar(this, 'img_car_3', 3, 'edit');">
      </div>-->
      <span id="txt-img-has-img_car_3" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
      <span id="txt-img-nohas-img_car_3" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
      <div class="box-preview-img" id="box_img_car_3" onclick="performClick('img_car_3');" >
        <img src="" style="" class="img-preview-show" id="pv_img_car_3"  /> 
      </div> 
<!--      <span style="background-color: #f4f4f4;
            padding: 0px 10px;
            position: absolute;
            margin-left: -9px;
            margin-top: -25px;
            border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; แก้ไขรูปภาพ</span>-->
      <div class="upload-btn-wrapper" >
        <button class="btn-f" type="button"><i class="fa fa-camera" aria-hidden="true"></i> อัพโหลดรูปถ่าย</button>
        <input type="file" id="img_car_3" accept="image/*"  onchange="readURLcar(this, 'img_car_3', 3, 'edit');" />
      </div>
    </div>
  </ons-card> 











  <!--------*****************************************************************************************************************************************--->

  <ons-card  class="card">
    <ons-list-header class="list-header"><b>พ.ร.บ.รถยนต์</b></ons-list-header>
    <ons-list-item class="input-items list-item p-l-0">
      <div class="left list-item__left"  style="width: 70px;">
        <!--<ons-icon icon="fa-car" class="list-item__icon ons-icon"></ons-icon>-->
        <span>เลขกรมธรรม์</span>
      </div>
      <label class="center list-item__center">
        <ons-input id="txt_car_act-input" float="" maxlength="30" placeholder="" name="txt_car_act" style="width:100%;" value="<?=$data_car->s_car_act;?>">
          <input type="text" class="text-input" maxlength="30" placeholder="" name="txt_car_act">
          <span class="text-input__label">
          </span>
        </ons-input>

      </label>
    </ons-list-item>
    <ons-list-item class="input-items list-item p-l-0">
      <div class="left list-item__left" style="padding-right: 18px;width: 70px;">
        <img src="assets/images/ex_card/crd.png" width="25px;" />
      </div>
      <div class="center list-item__center">
        <ons-input id="idcard-input" float=""  name="ex_car_act" style="width:100%;" value="<?=$data_car->d_car_act_exp;?>"  >
          <input type="date"  class="text-input"  name="ex_car_act" id="ex_car_act">
          <span class="text-input__label"></span>
        </ons-input>
        <span style="color: #afafaf;  font-size: 13px;   position: absolute;  right: 0px;">วันหมดอายุ พ.ร.บ.</span>
      </div>
    </ons-list-item>
    <div align="center" style="margin-top: 10px;">

      <span id="txt-img-has-img_car_act" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
      <span id="txt-img-nohas-img_car_act" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
      <div class="box-preview-img" id="box_img_car_act" onclick="performClick('img_car_act');" >
        <img src="" style="" class="img-preview-show" id="pv_img_car_act"  /> 
      </div> 
<!--      <span style="background-color: #f4f4f4;
            padding: 0px 10px;
            position: absolute;
            margin-left: -28px;
            margin-top: -25px;
            border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>-->
      <div class="upload-btn-wrapper" style="margin-bottom: 5px;" >
        <button class="btn-f" type="button"><i class="fa fa-camera" aria-hidden="true"></i> อัพโหลดรูปถ่าย</button>
        <input type="file" id="img_car_act" accept="image/*"  onchange="readURLother(this, 'img_car_act', 'edit', 'car_act');" />
      </div>
      <div align="center">
        <button class="button button--material"type="button" onclick="viewPhotoGlobal('assets/images/car/ex/car_act_ex.jpg', '', '')">ตัวอย่าง</button>
      </div>
  </ons-card> 

  <!--------*****************************************************************************************************************************************--->

  <ons-card class="card"> 
    <ons-list-header class="list-header"><b>ทะเบียนภาษี</b></ons-list-header>
    <!--<ons-list-item class="input-items list-item p-l-0">
        <div class="left list-item__left"  style="width: 70px;">
            <span>ทะเบียน</span>
        </div>
        <label class="center list-item__center">
            <ons-input id="txt_car_tax-input" float="" maxlength="30" placeholder="" name="txt_car_tax" style="width:100%;" value="<?=$data_car->s_car_tax;?>">
                <input type="text" class="text-input" maxlength="30" placeholder="" name="txt_car_tax">
                <span class="text-input__label">
                    ป้ายทะเบียน</span>
            </ons-input>
            <input type="hidden" value="0" id="valid_type_plate" />
            <i id="corrent-plate" class="fa fa-check-circle pass checking-plate" aria-hidden="true" style="display: none;"></i>
            <i id="incorrent-plate" class="fa fa-times-circle no-pass checking-plate" aria-hidden="true" style="display: none;"></i>
        </label>
    </ons-list-item>-->
    <ons-list-item class="input-items list-item p-l-0">
      <div class="left list-item__left" style="padding-right: 18px;width: 70px;">
        <img src="assets/images/ex_card/crd.png" width="25px;" />
      </div>
      <div class="center list-item__center">
        <ons-input id="idcard-input" float=""  name="ex_car_tax" style="width:100%;" value="<?=$data_car->d_car_tax_exp;?>"  >
          <input type="date"  class="text-input"  name="ex_car_tax" id="ex_car_tax">
          <span class="text-input__label"></span>
        </ons-input>
        <span style="color: #afafaf;  font-size: 13px;   position: absolute;  right: 0px;">วันหมดอายุ ทะเบียนภาษี</span>
      </div>
    </ons-list-item>
    <div align="center" style="margin-top: 10px;">

      <span id="txt-img-has-img_car_tax" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
      <span id="txt-img-nohas-img_car_tax" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
      <div class="box-preview-img" id="box_img_car_tax" onclick="performClick('img_car_tax');" >
        <img src="" style="" class="img-preview-show" id="pv_img_car_tax"  /> 
      </div> 
<!--	      <span style="background-color: #f4f4f4;
padding: 0px 10px;
position: absolute;
margin-left: -28px;
margin-top: -25px;
border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>-->
      <div class="upload-btn-wrapper" style="margin-bottom: 5px;" >
        <button class="btn-f" type="button"><i class="fa fa-camera" aria-hidden="true"></i> อัพโหลดรูปถ่าย</button>
        <input type="file" id="img_car_tax" accept="image/*"  onchange="readURLother(this, 'img_car_tax', 'edit', 'car_tax');" />
      </div>
    </div>
    <div align="center">
      <button class="button button--material"type="button" onclick="viewPhotoGlobal('assets/images/car/ex/car_tax_ex.jpg', '', '')">ตัวอย่าง</button>
    </div>
  </ons-card> 


  <ons-card class="card"> 
    <ons-list-header class="list-header"><b>ประกันรถยนต์</b></ons-list-header>
    <ons-list-item class="input-items list-item p-l-0" >
      <div class="left list-item__left" style="width: 110px;" id="car_ins_com_txt">
        <span>บริษัทประกัน</span>
      </div>
      <div class="center list-item__center custom-sl-pd" onclick="fn.pushPage({'id': 'option.html', 'title': 'บริษัทประกันรถยนต์', 'open': 'car_ins'}, 'lift-ios')" id="car_ins_com_box">

        <span class="brand-small list-item__thumbnail" id="img_car_brand_show" style="margin-right: 10px;display: none;"  ></span>
        <span id="txt_car_ins" ><?=$val_car_ins;?></span>
        <input type="hidden" name="car_ins" id="car_ins" value="0" />
        <input type="hidden" name="car_ins_com_txt_put" id="car_ins_com_txt_put" value="<?=$data_car->s_car_insurance_com;?>" />
      </div>
    </ons-list-item>
    <ons-list-item class="input-items list-item p-l-0">
      <div class="left list-item__left"  style="width: 110px;">
        <!--<ons-icon icon="fa-car" class="list-item__icon ons-icon"></ons-icon>-->
        <span>เลขกรมธรรม์</span>
      </div>
      <label class="center list-item__center">
        <ons-input id="txt_car_insurance-input" float="" maxlength="30" placeholder="" name="txt_car_insurance" style="width:100%;" value="<?=$data_car->s_car_insurance;?>">
          <input type="text" class="text-input" maxlength="30" placeholder="" name="txt_car_insurance" >
          <span class="text-input__label">
            เลขกรมธรรม์</span>
        </ons-input>
        <input type="hidden" value="0" id="valid_type_plate" />
        <i id="corrent-plate" class="fa fa-check-circle pass checking-plate" aria-hidden="true" style="display: none;"></i>
        <i id="incorrent-plate" class="fa fa-times-circle no-pass checking-plate" aria-hidden="true" style="display: none;"></i>
      </label>
    </ons-list-item>
    <ons-list-item class="input-items list-item p-l-0">
      <div class="left list-item__left" style="padding-right: 18px;width: 70px;">
        <img src="assets/images/ex_card/crd.png" width="25px;" />
      </div>
      <div class="center list-item__center">
        <ons-input id="idcard-input" float=""  name="ex_car_insurance" style="width:100%;" value="<?=$data_car->d_car_insurance_exp;?>"  >
          <input type="date"  class="text-input"  name="ex_car_insurance" id="ex_car_insurance">
          <span class="text-input__label"></span>
        </ons-input>
        <span style="color: #afafaf;  font-size: 13px;   position: absolute;  right: 0px;">วันหมดอายุ ประกัน</span>
      </div>
    </ons-list-item>
    <div align="center" style="margin-top: 10px;">

      <span id="txt-img-has-img_car_insurance" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
      <span id="txt-img-nohas-img_car_insurance" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
      <div class="box-preview-img" id="box_img_car_insurance" onclick="performClick('img_car_insurance');" >
        <img src="" style="" class="img-preview-show" id="pv_img_car_insurance"  /> 
      </div> 
<!--      <span style="background-color: #f4f4f4;
            padding: 0px 10px;
            position: absolute;
            margin-left: -28px;
            margin-top: -25px;
            border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>-->
      <div class="upload-btn-wrapper" style="margin-bottom: 5px;" >
        <button class="btn-f" type="button"><i class="fa fa-camera" aria-hidden="true"></i> อัพโหลดรูปถ่าย</button>
        <input type="file" id="img_car_insurance" accept="image/*"  onchange="readURLother(this, 'img_car_insurance', 'edit', 'car_insurance');" />
      </div>
    </div>
    <div align="center">
      <button class="button button--material"type="button" onclick="viewPhotoGlobal('assets/images/car/ex/car_ins_ex.png', '', '')">ตัวอย่าง</button>
    </div>
  </ons-card> 

  <div style="padding: 10px; margin-bottom: 10px;">
    <ons-button modifier="outline" class="button-margin button button--outline button--large" onclick="submitEditCar();" style="background-color: #fff;">แก้ไขข้อมูลรถ</ons-button>
  </div>
</form>  
<input type="hidden" value="0" id="<?=$_GET[id];?>_check_upload_1" />  
<input type="hidden" value="0" id="<?=$_GET[id];?>_check_upload_2" />  
<input type="hidden" value="0" id="<?=$_GET[id];?>_check_upload_3" />  

<input type="hidden" value="0" id="<?=$_GET[id];?>_car_act" />  
<input type="hidden" value="0" id="<?=$_GET[id];?>_car_tax" />  
<input type="hidden" value="0" id="<?=$_GET[id];?>_car_insurance" /> 

<!--<form name="form_accescar" id="form_accescar"  enctype="multipart/form-data">
            <div >
              <input type="file" class="cropit-image-input" accept="image/*" id="img_car_act"  style="opacity: 0;position: absolute;" onchange="readURLother(this,'img_car_act','edit','car_act');">
            </div>
            <div >
              <input type="file" class="cropit-image-input" accept="image/*" id="img_car_tax"  style="opacity: 0;position: absolute;" onchange="readURLother(this,'img_car_tax','edit','car_tax');">
            </div>
            <div >
              <input type="file" class="cropit-image-input" accept="image/*" id="img_car_insurance"  style="opacity: 0;position: absolute;" onchange="readURLother(this,'img_car_insurance','edit','car_insurance');">
            </div>
</form>-->
<input type="hidden" value="<?=$_GET[by];?>" id="open_by" />