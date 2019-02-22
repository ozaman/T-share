<?php
$_where = array();
$_where['id'] = $_GET[id];
$_select = array('*');
$book = $this->Main_model->rowdata(TBL_ORDER_BOOKING,$_where);
// print_r( $book);



if ($book->price_park_unit != 0) {
  $park_total = number_format($book->price_park_unit,2);
  $display_park = "";
}
else {
  $display_park = "display:none";
}
if ($book->price_person_unit != 0) {
  $person_total = number_format(intval($book->price_person_unit) * intval($book->pax_regis),2);
  $cal_person = $book->price_person_unit."*".$book->pax_regis;
  $display_person = "";
}
else {
  $display_person = "display:none";
}
$total_price_all = number_format($book->price_park_unit + (intval($book->price_person_unit) * intval($book->pax_regis)),2);
if ($book->commission_persent != 0) {
  $display_com = "";
  $com_persent = $book->commission_persent;
  $total_price_all = '<span style="padding-left: 0px;"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i>&nbsp;<font color="#FF0000">รอดำเนินการ</font></span>';
}
else {
  $display_com = "display:none";
}
$query_price = $this->db->query("select * from shop_country_com_list_price_taxi where i_shop_country_com_list = '".$book->plan_id."' ");
$num = 0;
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
  }
  if ($row_price->s_topic_en == "person") {
    $check_type_person = 1;
  }
  if ($row_price->s_topic_en == "comision") {
    $check_type_com = 1;
    if ($book->total_commission > 0) {
      
    }
  }
}
$sql_country = "SELECT t2.s_country_code, t2.s_topic_th, t2.id as sci_id FROM shop_country_com_list_price_taxi as t1 left join shop_country_icon_taxi as t2 on t1.i_shop_country_icon = t2.id WHERE t1.id='".$book->plan_id."'    ";
$query_country = $this->db->query($sql_country);
$res_country = $query_country->row();
$arr[project][id] = $_GET[id];

$type = t_guest_registration;
$icon = 'icon-new-uniF116-6';
$action = 'check_guest_register';
$txt_photo = t_please_take_guest_regis;
?>
<?php
$_where = array();
$_where['i_shop'] = $book->program;

$_select = array('*');

$_order = array();
$_order['id'] = 'asc';
$data['region'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_TAXI,$_where,$_select,$_order);
?>
<input type="hidden" value="<?=$res_country->sci_id;?>" id="sci_id" />  
<input type="hidden" value="<?=$book->i_cartype;?>" id="car_type" />  
<input type="hidden" value="<?=$book->program;?>" id="program" />  

<form name="form_checkin" id="form_checkin"   enctype="multipart/form-data">
  <input type="hidden" value="<?=$book->plan_id;?>" id="plane_id_replan" name="plane_id_replan" />  
  <ons-card >
    <table class="onlyThisTable" width="100%" border="0" align="center" cellpadding="3" cellspacing="5" style="margin-top: 0px;" >

      <tr>
        <td align="center" class="font-26" style="text-align: center;"><b>คุณแน่ใจหรือไม่ </b></td>
      </tr>
      <tr>
        <td align="center" class="font-22" style="text-align: center;"> <?=$type;?></td>
      </tr>

      <tr style="display: nones;">
        <td align="center"><span>กรุณาถ่ายภาพใบลงทะเบียน</span></td>
      </tr>
      <tr style="display: nones;">
        <td>
          <div align="center" style="margin: 10px;">
            <div>
              <input type="file" class="cropit-image-input" accept="image/*" id="img_checkin" name="img_checkin" style="opacity: 0;position: absolute;" 
                     onchange="readURLcheckIn(this, 'checkin', '<?=$_GET[type];?>', '<?=$_GET[id];?>');">
            </div>
            <span id="txt-img-has-checkin" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
            <span id="txt-img-nohas-checkin" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
            <div class="box-preview-img" id="box_img_checkin" onclick="performClick('img_checkin');">
              <img src="" class="img-preview-show" id="pv_checkin"  style="display: nones;">
            </div>
            <span style="background-color: #f4f4f4;
                  padding: 0px 10px;
                  position: absolute;
                  margin-left: -27px;
                  /*    bottom: 278px;*/
                  margin-top: -25px;
                  border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>
          </div>
        </td>
      </tr>
    </table>

    <!--<div class="form-group">
       <label class="form-label">กรุณาป้อนจำนวนแขกที่ลงทะเบียน</label>
       <div class="center list-item__center">
          <input name="num_cus" id="num_cus" placeholder="ยืนยันจำนวน" oninput="maxLengthCheck(this)" type="number" pattern="\d*" maxlength="4" min="1" class="text-input form-control" value="<?=$book->pax;?>" > 
       </div>
    </div>-->
    <div align="center">
      <table>
        <tr>
          <td><span>ลงทะเบียน</span></td>
          <td width="5"></td>
          <td >
            <input name="num_cus" id="num_cus" placeholder="ยืนยันจำนวน" oninput="maxLengthCheck(this)" type="number" pattern="\d*" maxlength="4" min="1" class="text-input form-control" value="<?=$book->pax;?>" style="border-bottom: 1px solid #ccc;text-align: center;width: 80px;" > 
          </td>
          <td width="5"></td>
          <td>คน</td>
        </tr>
      </table>
    </div>  
  </ons-card>

  <div style="margin: 20px 10px">
    <input type="hidden" value="0" id="check_change_plan" />
    <ons-button type="button" id="btn_change_plan" class="button-margin button button--large" onclick="changePlan('<?=$_GET[id];?>');" data-check="0" ><span id="txt_btn_change_plan">เปลี่ยนค่าตอบแทน</span></ons-button>
  </div>

  <div class="card replan" id="nation_box" style="display: none;">
    <ons-list-header class="list-header "> เลือกสัญชาติ</ons-list-header>
    <div class="form-group">
       <?php

        
        $_where = array();
        $_where['i_shop'] = $book->program;
        $_where['i_partner_group'] = 2;

        $_select = array('*');

        $_order = array();
        $_order['id'] = 'asc';
        $data[PLAN_PACK] = $this->Main_model->fetch_data('','',NEW_TBL_PLAN_PACK,$_where,$_select,$_order);
        $_where = array();
        $_where['i_shop'] = $book->program;
        $_where['i_partner_group'] = 1;

        $_select = array('*');

        $_order = array();
        $_order['id'] = 'asc';
        $PLAN_PACK = $this->Main_model->fetch_data('','',NEW_TBL_PLAN_PACK,$_where,$_select,$_order);
        ?>
        
        <?php
        foreach ($data[PLAN_PACK] as $key => $val) {

          $_where = array();
          $_where['i_plan_pack'] = $val->id;
          $_select = array('*');
          $_order = array();
          $_order['id'] = 'asc';
          $arr[PACK_LIST] = $this->Main_model->fetch_data('','',NEW_TBL_PLAN_PACK_LIST,$_where,$_select,$_order);
          if (count($data[PLAN_PACK]) == 1) {
            ?>
            <script type="text/javascript">
             // handleClick_s('nation', '<?=$val->id;?>')
            </script>
            <?php
          }
          ?>
              <label class=""  for="radio-nation-ck<?=$key + 1;?>" onclick="getPlanBox('<?=$val->id;?>', '<?=$book->plan_id;?>');">
                <ons-list-item tappable id="nation_<?=$key + 1;?>">
                  <label class=" left">
                    <ons-radio class="radio-fruit " id="nation_<?=$val->id;?>" input-id="radio-nation-ck<?=$val->id;?>" value="<?=$val->id;?>" name="nation" onchange="" ></ons-radio>
                  </label>
              <?php
              

                    $_where = array();
                    $_where['id'] = $val->i_country; 
                    $_select = array('*');
                    $COUNTRY = $this->Main_model->rowdata(TBL_WEB_COUNTRY,$_where);
                    // print_r(json_encode($COUNTRY));
                ?>
                    <div class="col-md-3">
                      <img src="assets/images/flag/icon/<?=$COUNTRY->country_code;?>.png" width="25" height="25" alt="">&nbsp; <span class=" font-17"><?=$COUNTRY->name_th;?></span><span>(<?=$val->s_topic;?>)</span>
                    </div>






                  </ons-list-item>
                </label>
    <?php 
  }?>



    </div>
  </div>

  <div class="card replan" id="box_com"  style="display: none;" >
    <!-- Agent Issu -->  
    <div class="" id="show_payment_detail" style="">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td>
        <ons-list-header class="list-header"> เลือกค่าตอบแทน</ons-list-header>

        </td>
        <td width="50" style="display: none;" id="row_accept_payment">

        </td>
        </tr>
        </tbody>
      </table>
      <input type="hidden" value="" name="price_plan" id="price_plan">

      <div id="box_price_replan">  </div>
    </div>
  </div>

  <div class="card replan" style="display: none;" id="box_cause">
    <ons-list-header class="list-header">สาเหตุ</ons-list-header>
    <ons-list>
      <?php
      $query = $this->db->query("SELECT * FROM shop_type_change_plan where i_status = 1");
      foreach ($query->result() as $val) {
        ?>
        <ons-list-item tappable>
          <label class="left">
            <ons-radio name="cause_change" input-id="radio-<?=$val->id;?>" value="<?=$val->id;?>"></ons-radio>
          </label>
          <label for="radio-<?=$val->id;?>" class="center"><?=$val->s_topic;?></label>
        </ons-list-item>
      <?php }
      ?>

      <!--<ons-list-item tappable>
        <label class="left">
          <ons-radio name="cause_change" input-id="radio-2"  value="1"></ons-radio>
        </label>
        <label for="radio-2" class="center">เวลาเที่ยวบินไม่พอ (ป้ายฟ้า)</label>
      </ons-list-item>
      <ons-list-item tappable>
        <label class="left">
          <ons-radio name="cause_change" input-id="radio-4"  value="3"></ons-radio>
        </label>
        <label for="radio-4" class="center">แขกต่างชาติ</label>
      </ons-list-item>
      <ons-list-item tappable>
        <label class="left">
          <ons-radio name="cause_change" input-id="radio-4"  value="4"></ons-radio>
        </label>
        <label for="radio-4" class="center">แขกไกด์</label>
      </ons-list-item>-->
    </ons-list>
  </div>

  <div style="margin: 20px 10px">
    <ons-button type="button" modifier="outline" class="button-margin button button--outline button--large" onclick="sendCheckIn('<?=$_GET[id];?>', '<?=$_GET[type];?>','<?=$book->program;?>','<?=$book->plan_setting;?>');" style="background-color: #fff;">ยืนยันแขกลงทะเบียน</ons-button>
  </div>
</form>

<script type="text/javascript">
  setTimeout(function () {
    $('#num_cus').focus();
  }, 1000);
</script>