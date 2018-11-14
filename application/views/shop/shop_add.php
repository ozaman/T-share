<?php
$weekdays = Array();
$weekdays[0] = "Sun";
$weekdays[1] = "Mon";
$weekdays[2] = "Tue";
$weekdays[3] = "Wed";
$weekdays[4] = "Thu";
$weekdays[5] = "Fri";
$weekdays[6] = "Sat";
$arr_where = array();
$arr_where['status'] = 1;
$arr_where['product_id'] = $_GET[shop_id];
$arr_where['product_day'] = $weekdays[date('w')];
$arr_select = array('finish_h','finish_m','start_h','start_m',);

$datatime = $this->Main_model->fetch_data('','',TBL_SHOPPING_OPEN_TIME,$arr_where,$arr_select,'');
//print_r(json_encode($datatime));


$datenow = strtotime(date('Y-m-d H:i:s'));
// $datenow = strtotime(date('Y-m-d 00:i:s'));
// echo $datatime[0]->finish_h.':'.$datatime[0]->finish_m;
$dateclose = strtotime(date('Y-m-d '.$datatime[0]->finish_h.':'.$datatime[0]->finish_m.':s'));
$date_open = strtotime(date('Y-m-d '.$datatime[0]->start_h.':'.$datatime[0]->start_m.':s'));
// $timefinal = 

$i_time_balance = ($dateclose - $datenow) / 60;
$i_time_balance2 = ($date_open - $datenow) / 60;
// echo $i_time_balance.'*****'.$i_time_balance2.'***********'.(8*60);

$_where = array();
$_where['PROVINCE_ID'] = 1;
$_select = array('*');
$_order = array();
$_order['name_th'] = 'asc';
$arr[amphur] = $this->Main_model->fetch_data('','',TBL_WEB_AMPHUR,$_where,$_select,$_order);
?>
<style>
  .text-input--material{
    background-image : none;
  }
  .res-input {
    position: absolute;
    right: 30px;
    font-size: 28px;
    z-index: 2;
  }
</style>

<?php
$select = "SELECT t1.*, t2.txt_color,t2.plate_color, t3.name_th as car_type_txt,tb_pro.id as tb_pro_id, tb_pro.name as tb_pro_name, tb_pro.name_th as tb_pro_name_th, tb_pro.name_cn as tb_pro_name_cn FROM web_carall as t1 left join web_province as tb_pro on t1.i_province = tb_pro.id    left join web_car_plate as t2 on t1.i_plate_color = t2.id left join web_car_use_type as t3 on t1.car_type = t3.id where t1.drivername  = '".$_COOKIE['detect_user']."' AND t1.status = 1 ORDER BY t1.status_usecar  DESC";
$query = $this->db->query($select);

$sql_dv = "SELECT name,phone,phone2 FROM web_driver  WHERE id = ".$_COOKIE['detect_user']." ";
$query_dv = $this->db->query($sql_dv);
$data_dv = $query_dv->row();
$user_id = $_COOKIE['detect_user'];

$sql_place = "SELECT * FROM shopping_product  WHERE id=".$_GET[shop_id]." AND price_plan > 0";
$query_place = $this->db->query($sql_place); 
$data_place = $query_place->row();

$sql_pv = "SELECT name FROM web_province  WHERE id= ".$data_place->province." ";
$query_pv = $this->db->query($sql_pv);
$data_pv = $query_pv->row();

$sql_shopmain = "SELECT * FROM shopping_product_main  WHERE id = $data_place->main";
$shopmain = $this->db->query($sql_shopmain);
$data_shopmain = $shopmain->row();

?>

<div style="height: 100%;">
  <input type="hidden" value="<?=$data_place->topic_th;?>" id="place_name_select" />
  <form name="form_booking" id="form_booking">
    <input type="hidden" value="<?=$_GET[shop_id];?>" name="program" id="program" />
    <input type="hidden" value="" name="txt_car_type" id="txt_car_type" />
    <input type="hidden" value="" name="car_type" id="car_type" />
    <input type="hidden" value="" name="car_plate" id="car_plate" />


    <input id="dri_phone" name="dri_phone" type="hidden" value="<?=$data_dv->phone;?>">
    <input id="dri_name" name="dri_name" type="hidden" value="<?=$data_dv->name;?>">
    <div>

      <?php
      if ($i_time_balance < 0) {
        $op_select = 'ขณะนี้ปิดให้บริการ';

        $i_d_next = date('w') + 1;
        $i_d_next2 = date('d') + 1;
        $weekdays = Array();
        $weekdays[0] = "Sun";
        $weekdays[1] = "Mon";
        $weekdays[2] = "Tue";
        $weekdays[3] = "Wed";
        $weekdays[4] = "Thu";
        $weekdays[5] = "Fri";
        $weekdays[6] = "Sat";
        $arr_where = array();
        $arr_where['status'] = 1;
        $arr_where['product_id'] = $_GET[shop_id];
        $arr_where['product_day'] = $weekdays[$i_d_next];
        $arr_select = array('start_h','start_m','finish_h','finish_m');
        $weekdays2 = Array();
        $weekdays2[0] = "วันอาทิตย์";
        $weekdays2[1] = "วันจันทร์";
        $weekdays2[2] = "วันอังคาร";
        $weekdays2[3] = "วันพุธ";
        $weekdays2[4] = "วันพฤหัส";
        $weekdays2[5] = "วันศุกร์";
        $weekdays2[6] = "วันเสาร์";

        $datatime_next = $this->Main_model->rowdata(TBL_SHOPPING_OPEN_TIME,$arr_where,$arr_select);
        // print_r($datatime_next);
        ?>
        <div class="card" align="center">
          <h1 style="color: red" align="center">ขณะนี้ปิดให้บริการ</h1>
          <h2 style="color: #0076ff" align="center">จะเปิดให้บริการ <?=date('Y-m-'.$i_d_next2);?></h2>
          <h3 style="color: #24b968" align="center"><span><?=$weekdays2[$i_d_next];?></span> 
            <h3 style="color: #24b968" align="center"><span style="color: #24b968;">เวลาเปิด <?=$datatime_next->start_h.':'.$datatime_next->start_m;?></span> ปิด <?=$datatime_next->finish_h.':'.$datatime_next->finish_m;?></span> น.</h3>

        </div>


<?php
}
else {
  $op_select = 'เลือกเวลา';
}



 // $_where = array();
    // $_where['product_id'] = $_GET[id];
    // $_where['status'] = 1;
    // $_where['time_other_number'] = 2;




   // $numss = $this->Main_model->num_row(TBL_SHOPPING_PRODUCT,$_where);
    // if ( $numss != 1) {
      ?>
<div class="card">
   <ons-row >
                <ons-col>
                    <ons-button id="btn_toshow_date" onclick="selesecompany();" class="button button--outline" style="width: 100%;
                    padding: 0; height: 35px; text-align: center;"><span class="back-button__icon pull-left" style="    margin-left: 6px;"><!--?xml version="1.0" encoding="UTF-8"?-->
<svg width="13px" height="21px" viewBox="0 0 13 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <title>ios-back-button-icon</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="toolbar-back-button" stroke="none" stroke-width="1" fill-rule="evenodd">
        <g id="ios" transform="translate(-34.000000, -30.000000)">
            <polygon id="ios-back-button-icon" points="34 40.5 44.5 30 46.5 32 38 40.5 46.5 49 44.5 51"></polygon>
        </g>
    </g>
</svg>
</span>เลือกสถานที่อื่น</ons-button>
                </ons-col>
               </ons-row>
</div>
    



      <div class="card" id="go_to_top_add">
        <script>
          function selectCarShops(id, cartype, car_type_txt) {
            console.log('--------------------------')
            console.log(id + '-' + cartype + '-' + car_type_txt)
            $('input[type="checkbox"]').prop('checked', false); // Unchecks it
            $('#car_use_' + id).prop('checked', true); // Checks it
            var plate_num = $('#value_car_' + id).data('plate_num');
            $('#car_type').val(cartype);

            console.log(plate_num);
            $('#car_plate').val(plate_num);
            $('#car_id').val(id);
            $('#txt_car_type').val(car_type_txt);
          }


        </script>
        <input value="" id="car_id" name="check_use_car_id" type="hidden" />

        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom : 0px solid #DADADA;" id="row_place_1">
          <tr>
            <td width="110">
              <img src="../data/pic/place/<?=$data_place->pic_logo;?>" width="100px" alt="" style=" border-radius:  8px; border: 1px solid #ddd; ">
            </td>
            <td>
              <div class="element_to_find">
                <input type="hidden" name="" id="shop_topic_th" value="<?=$data_place->topic_th;?>">
                <span class="font-17" style="color:#3b5998">ดิวตี้ฟรี </span ><span class="pull-right" onclick="fun_imageslider('<?=$_GET[shop_id];?>')" style="font-size: 20px;  margin-right: 5px;  color: #0076ff;"><img src="<?=base_url();?>assets/images/album2.png" style="    width: 33px;"></span><br>
                <span class="font-17" style="color:#333333"><b> <?=$data_place->topic_th;?> </b></span>

                <input type="hidden" value=" " id="1">

              </div>

              <a class="font-17" style="display: none;">
                <strong id="txt_sh_1">ละเอียด</strong>
                <span id="icon_sh_1"><i class="fa fa-chevron-down"></i></span>
              </a>
              <input type="hidden" id="check_click_1" value="0">

            </td>
          </tr>
          <tr>
            <td colspan="2" align="center" style="    padding-top: 10px">
              <span class="font-17" style="color: #2b2828;">วันนี้  
                <span id="date_open"></span> 
                <span id="time_open" style="color: #24b968;">  </span>
                <span id="time_close" style="color: #ca1a1a;"> </span> 
              </span>


            </td>
           <!--  <td colspan="2">
              <span class="font-17" style="color:red">วันนี้เปิด <span id="time_open"></span> </span>


            </td> -->
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="1" cellpadding="1" style=" margin-top: 7px;">
          <tbody>

            <tr>
              <td width="33%" align="left" style="padding: 0px;" >
                <div class="btn" style=" width:100%; text-align:left; /*padding:2px; padding-left:5px;*/ height:40px;border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_phone"  onclick="openContact('<?=$data_place->id;?>');">
                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                    <tbody>
                      <tr>
                        <td align="center" width="30"><i class="fa fa-phone-square" style="font-size:32px; color: #8DC63F; border:none;"></i></td>
                        <td align="center" class="font-22"><b><?=t_call;?></b></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
              <td width="33%" align="left" style="padding: 0px;" >
                <div class="btn " style=" width:100%; text-align:left;  /*padding:2px;*/height:40px;border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_zello" onclick="openZello('<?=$data_place->id;?>');">
                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                    <tbody>
                      <tr>
                        <td align="center" width="30"><img src="<?=base_url();?>assets/images/social/zello.png" width="30" height="30" alt=""/> </td>
                        <td align="center" class="font-22">
                          <b>Zello</b>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
              <td width="33%" align="left"  style="padding: 0px;"  >
                <div class="btn" style=" width:100%; text-align:left;  /*padding:2px;*/height:40px;border-radius: 0px;" data-toggle="dropdown" id="shop_sub_menu_map" onclick="openShopMap('<?=$data_place->lat;?>', '<?=$data_place->lng;?>', '<?=$data_place->address;?>', '<?=$data_pv->name;?>')">
                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                    <tbody>
                      <tr>
                        <td align="center" width="30"><img src="<?=base_url();?>assets/images/social/map.png" width="30" height="30" alt=""/></td>
                        <td align="center" class="font-22"><b><?=t_maps;?></b></td>
                      </tr>
                    </tbody>
                  </table>

                </div>
                <input type="hidden" value="<?=$data_place->lat;?>" id="lat_product_place" />
                <input type="hidden" value="<?=$data_place->lng;?>" id="lng_product_place" />
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <?php
      if (1 == 1) {
        ?>


        <style >
          @keyframes border-pulsate {
            0%   { border-color: rgba(0, 255, 255, 1); }
            50% { border-color: rgba(0, 255, 255, 0); }
            100%   { border-color: rgba(0, 255, 255, 1); }
          }

          .borderBlink{   
            border: 1px solid #FF5722; 
          }
          .borderBlink:hover {    
          }
          .cus_focus{
            background-color: #eeeeee7d;
          }
        </style>
        <div id="body_add_shop_station"></div>

  <?php
  if ($query->num_rows() >= 1) {
    ?>
          <div class="card borderBlink"  id="box_car">
            <input type="hidden" name="" id="numcar" value="<?=count($query->result());?>">
            <ons-list-header class="list-header " id="castomer_box"> เลือกรถส่งแขก</ons-list-header>
            <div style="padding: 0px;margin-top: 0px;" >
    <?php
    $i = 1;
    foreach ($query->result() as $key => $val) {

      $bg_plate_color = "background-color: ".$val->plate_color;
      ?>
                <a id="car_<?=$val->id;?>" class="a-select-car" style="text-decoration:none; margin-top:30px;" >
                  <input type="hidden" id="value_car_<?=$val->id;?>" data-plate_num="<?=$val->plate_num;?>" />
                <?php
                if ($val->status_usecar == 1) {
                  $calss_box = 'cus_focus';
                }
                else {
                  $calss_box = '';
                }
                ?>
                  <table width="100%" border="0" id="div_car_<?=$val->id;?>" class="<?=$calss_box;?> box_car" style="border: 0px solid #ddd;" >
                    <tbody>
                      <tr>
                        <td width="30" onclick="checformadd('box_car');selectCarShops('<?=$val->id;?>', '<?=$val->car_type;?>', '<?=$val->car_type_txt;?>');
                          handleClick_s('car', '<?=$val->id;?>');">
      <?php
      if ($val->status_usecar == 1 && count($query->result()) == 1) {
        ?>
                            <script>

                              $('#box_car').removeClass('borderBlink')
                              $('#nation_box').addClass('borderBlink')

                              selectCarShops('<?=$val->id;?>', '<?=$val->car_type;?>', '<?=$val->car_type_txt;?>');
                            </script>
                      <ons-radio class="radio-fruit" input-id="radio-plate_num<?=$val->id;?>" id="car_use_<?=$val->id;?>" value="<?=$val->id;?>" name="plate_num_1"   checked></ons-radio>

      <?php
      }
      else {
        ?>
                      <ons-radio class="radio-fruit" input-id="radio-plate_num<?=$val->id;?>" id="car_use_<?=$val->id;?>" value="<?=$val->id;?>" name="plate_num_1"  ></ons-radio>


      <?php }
      ?>
                    </td>
                    <td onclick="checformadd('box_car');selectCarShops('<?=$val->id;?>', '<?=$val->car_type;?>', '<?=$val->car_type_txt;?>');
                          handleClick_s('car', '<?=$val->id;?>');">
                      <table width="100%" cellpadding="1" cellspacing="2">
                        <tbody>
                          <tr>
                            <td width="100" align="center" style="padding:1px; border-radius:5px;<?=$bg_plate_color;?>">
                              <div style="border-radius:5px;border: 1px solid <?=$val->txt_color;?>;"><font color="<?=$val->txt_color;?>" class="font-17"><b><?=$val->plate_num;?></font><br>
                                  <font class="font-14" style="color: <?=$val->txt_color;?>"><?=$val->tb_pro_name_th;?></font></b></font></div>
                            </td>
                          </tr>
                        </tbody>
                      </table>

                    </td>
                    <td width="45">
                      <button onclick="editCar('<?=$val->id;?>', 'shop_add');" type="button" class="button--cta" style="padding: 0px 7px;"><span class="font-16">แก้ไข</span></button>
                    </td>
                    </tr>
                    </tbody>
                  </table>
                </a>    
      <?php
      $i++;
    }
    ?>

            </div>
          </div>
  <?php }?> 

        <?php
        $_where = array();
        $_where['i_shop'] = $_GET[shop_id];

        $_select = array('*');

        $_order = array();
        $_order['id'] = 'asc';
        $data['region'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_TAXI,$_where,$_select,$_order);
        ?>
        <div class="card" id="nation_box">
          <ons-list-header class="list-header "> เลือกสัญชาติ</ons-list-header>
          <div class="form-group">
        <?php
        foreach ($data['region'] as $key => $val) {

          $_where = array();
          $_where['i_shop_country'] = $val->id;
          $_select = array('*');
          $_order = array();
          $_order['id'] = 'asc';
          $arr[region_icon] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_ICON_TAXI,$_where,$_select,$_order);
          ?>
              <label class="" for="radio-nation<?=$key + 1;?>" onclick="handleClick_s('nation', '<?=$val->id;?>');">
                <ons-list-item tappable id="nation_<?=$key + 1;?>">
                  <label class=" left">
                    <ons-radio class="radio-fruit " id="nation_<?=$val->id;?>" input-id="radio-nation<?=$val->id;?>" value="<?=$val->id;?>" name="nation" onchange=""></ons-radio>
                  </label>
              <?php
              foreach ($arr[region_icon] as $key2 => $val2) {
                ?>
                    <div class="col-md-3">
                      <img src="assets/images/flag/icon/<?=$val2->s_country_code;?>.png" width="25" height="25" alt="">&nbsp; <span class=" font-17"><?=$val2->s_topic_th;?></span>
                    </div>






                  </ons-list-item>
                </label>
    <?php }
  }?>

          </div>

        </div>

        <div class="card" id="box_com" >
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
            <input type="hidden" value="" name="price_plan" id="price_plan"></ons-radio>

            <div id="box_price_plan">


              <!-- <div class=" " style="border-bottom: dotted #999999 0px;padding: 10px 0px;" >
                <label class="center" for="price_plan_3">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                      <tr>
                        <td width="30" rowspan="2" align="center" style="display: nones;">
                          <label class="left list-item__left">
                            <ons-radio class="radio-fruit radio-nation" input-id="price_plan_3" value="3" name="price_plan"></ons-radio>
                          </label>
                        </td><td class="font-17"> ค่าจอด + ค่าคอม </td>
                      </tr>
                      <tr>
                        <td>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="nation_china">
                            <tbody>
                              <tr>
                                <td class="font-17"> 
                                  <img align="absmiddle" src="assets/images/flag/China.png" width="25" height="25" alt="" >
                                  <span >&nbsp;จีน </span>
    
                                  <span style="display:noneshow">จอด  600&nbsp;</span>
                                  <span style="display:noneshow">คอม  5 %</span>
    
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="nation_order">
                            <tbody>
                              <tr>
                                <td class="font-17">
                                  <img src="assets/images/flag/Other.png" align="absmiddle" width="25" height="25" alt="" >
                                  <span >&nbsp;ต่างชาติ</span>
                                  <span style="display:noneshow" id="text_price_order">จอด&nbsp;200&nbsp;</span>
                                </td>
                              </tr>
                            </tbody>
                          </table>
    
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </label>
              </div> -->

            </div>
          </div>
        </div>




        <div class="card" id="num_customer" onclick="checformadd('num_customer')">
          <ons-list-header class="list-header "> จำนวนแขก</ons-list-header>
          <!-- <div class="form-group"> -->
          <table width="100%">
            <tr>
              <td>
                <table width="100%">
                  <tr>
                    <td width="45">ผู้ใหญ่</td>
                    <td>
                  <ons-input id="adult" name="adult" type="number" oninput="maxLengthCheck(this)" type="number" pattern="\d*" maxlength="4" min="1"  class="font-17" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;text-align-last: center !important;"></ons-input>
              </td>
            </tr>
          </table>
          </td>
          <td>
            <table width="100%">
              <tr>
                <td width="45">เด็ก</td>
                <td>
              <ons-input id="child" name="child" type="number" oninput="maxLengthCheck(this)" pattern="\d*" maxlength="3" class="font-17" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;text-align-last: center !important;" onchange="checkchild(this.value)"></ons-input>
          </td>
          </tr>
          </table>
          </td>
          </tr>
          </table>



          <!-- <label class="font-17">จำนวนคน</label> -->

          <!-- <ons-row> -->
          <!-- <ons-col> -->

          <!-- </ons-col> -->

          <!-- <ons-col> -->

          <!-- </ons-col> -->
          <!-- </ons-row> -->
          <!-- </div> -->
        </div>

        <script>
        </script>



        <div class="card" id="box_time" onclick="checformadd('box_time')">
          <ons-list-header class="list-header ">ใช้เวลาเดินทาง </ons-list-header>
          <!-- <div class="form-group"> -->

                <!-- <span class="list-header" style="background-image: none;"></span> -->
  <?php
  # เวลาที่จะถึง
  for ($i = 5; $i <= 480; $i += 5) {
    $s_h = $i.' นาที';
    if ($i >= 60) {
      $s_h = '';
      $s_h = floor($i / 60).' ชั่วโมง';
      $i_m = $i % 60;
      if ($i_m > 0) {
        $s_h .= ' '.$i_m.' นาที';
      }
    }
    $t_time_m[$i] = $s_h;
  }
  // print_r($t_time_m);
  ?>
          <select class="select-input font-17" name="time_num" id="time_num" value="" onchange="checktime(this.value)" style="border-radius: 0px;padding: 5px;width: 100%; width: 100%;">
            <option value="0">-- <?=$op_select;?> --</option>
          <?php
          $time = array(
              "500" => "ยังไม่เปิดให้บริการ",
              "5" => "5 นาที",
              "10" => "10 นาที",
              "15" => "15 นาที",
              "20" => "20 นาที",
              "25" => "25 นาที",
              "30" => "30 นาที",
              "35" => "35 นาที",
              "40" => "40 นาที",
              "45" => "45 นาที",
              "50" => "50 นาที",
              "55" => "55 นาที",
              "60" => "1 ชั่วโมง.",
              "90" => "1 ชั่วโมง 30 นาที",
              "120" => "2 ชั่วโมง",
              "150" => "2 ชั่วโมง 30 นาที",
              "180" => "3 ชั่วโมง",
              "210" => "3 ชั่วโมง 30 นาที",
              "240" => "4 ชั่วโมง",
              "270" => "4 ชั่วโมง 30 นาที",
              "300" => "5 ชั่วโมง",
              "330" => "5 ชั่วโมง 30 นาที",
              "360" => "6 ชั่วโมง",
              "390" => "6 ชั่วโมง 30 นาที",
              "420" => "7 ชั่วโมง",
              "450" => "7 ชั่วโมง 30 นาที",
              "480" => "8 ชั่วโมง",
              "0" => "มากกว่านี่ปิดให้บริการ"
          );
          $mm = 5;
          ?>

            <?php
            foreach ($t_time_m as $key => $at) {



              if ($i_time_balance2 > 0) {
                if ($key >= $i_time_balance2) {
                  if ($key == '500') {
                    $dis = 'disabled';
                  }
                  else {
                    $dis = '';
                  }
                  ?>
                  <option  <?=$dis;?> value="<?=$key;?>"><?=$at;?></option>

                  <?php
                }
              }
              else {
                if ($i_time_balance >= $key && $key < 500) {
                  if ($key == '0') {
                    $dis = 'disabled';
                  }
                  else {
                    $dis = '';
                  }
                  ?>
                  <option  <?=$dis;?> value="<?=$key;?>"><?=$at;?></option>

                  <?php
                }
              }
              if ($i_time_balance2 > 480 && $key == 500) {
                if ($key == '500') {
                  $dis = 'disabled';
                }
                else {
                  $dis = '';
                }
                ?>
                <option  <?=$dis;?> value="<?=$key;?>"><?=$at;?></option>

                <?php
              }
            }
            ?>

          </select>

          <!-- </div> -->
        </div>
        
        <div class="card" style="display:none;" id="box_bank" onclick=""> 
          <div id="load_select_bank">
            
          </div>
        </div>
        
        <div class="card"  onclick="area_remark()">
          <ons-list-header class="list-header "> หมายเหตุ</ons-list-header>
          <!-- <div class="form-group"> -->


          <!-- <label class="font-17">จำนวนคน</label> -->

          <ons-row>
            <textarea class="textarea" rows="3" placeholder="หมายเหตุ" id="remark" name="remark"  cols="100"  style="pointer-events: auto;" ></textarea>

          </ons-row> 
          <!-- </div> -->
        </div>


      </div>
<!--    <button>check</button>-->
    </form>
    <div  style="padding: 0px 10px;padding-bottom: 40px;">
  <?php
  if (count($val) != 0) {
    // echo count($val);
    ?>
        <ons-button style="background-color: #fff;" modifier="outline" class=" button-margin button button--outline button--large font-17" onclick="submitShop();" id="btn_submitadd">ยืนยันข้อมูลส่งแขก</ons-button>

  <?php }?>
    </div>
  <?php
}
else {
  
}
?>
</div>
<!-- <button onclick="_calltest()">dsadsdsd</button> -->

<script type="text/javascript">
  function_name();
  function function_name() {
    var weekdays = new Array(7);
    weekdays[0] = "Sun";
    weekdays[1] = "Mon";
    weekdays[2] = "Tue";
    weekdays[3] = "Wed";
    weekdays[4] = "Thu";
    weekdays[5] = "Fri";
    weekdays[6] = "Sat";
    var weekdays2 = new Array(7);
    weekdays2[0] = "วันอาทิตย์";
    weekdays2[1] = "วันจันทร์";
    weekdays2[2] = "วันอังคาร";
    weekdays2[3] = "วันพุธ";
    weekdays2[4] = "วันพฤหัส";
    weekdays2[5] = "วันศุกร์";
    weekdays2[6] = "วันเสาร์";
    var current_date = new Date();

    weekday_value = current_date.getDay();
//    console.log(weekdays[weekday_value])
    var url_chk_time = "shop/chk_time?shop_id=<?=$_GET[shop_id];?>&day=" + weekdays[weekday_value];
    $.ajax({
      url: url_chk_time,
      type: 'post',
      success: function (res) {
//       console.log(res);
        //<?=$arr_time;?> = res[0];
        $('#time_open').html('เวลาเปิด' + res[0].start_h + ':' + res[0].start_m);
        $('#time_close').html('เวลาปิด' + res[0].finish_h + ':' + res[0].finish_m);
        $('#date_open').html(weekdays2[weekday_value]);

      }
    });
    var test, parts, hours, minutes, date,
            d = (new Date()).getTime(),
            tests = ['01.25 PM', '11.35 PM', '12.45 PM', '01.25 AM', '11.35 AM', '12.45 AM'],
            i = tests.length,
            timeReg = /(\d+)\.(\d+) (\w+)/;

    for (; i-- > 0; ) {
      test = tests[i];

      parts = test.match(timeReg);

      hours = /am/i.test(parts[3]) ?
              function (am) {
                return am < 12 ? am : 0
              }(parseInt(parts[1], 10)) :
              function (pm) {
                return pm < 12 ? pm + 12 : 12
              }(parseInt(parts[1], 10));

      minutes = parseInt(parts[2], 10);

      date = new Date(d);

      date.setHours(hours);
      date.setMinutes(minutes);

//    console.log(test + ' => ' + date);
    }
  }
</script>