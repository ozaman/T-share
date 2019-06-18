<?php
$place_shopping = "topic_th";
$data_user_class = $_COOKIE[detect_userclass];
$main_color = "#3b5998";
$arr[book] = $_POST;

$sql_od = "SELECT car_plate FROM  order_booking  where id = '".$arr[book][id]."'  ";
$query_od = $this->db->query($sql_od);
$res_od = $query_od->row();

$sql_ps = "SELECT ".$place_shopping.",id,province,lat,lng,address FROM shopping_product  WHERE id='".$arr[book][program]."' ";
$query_ps = $this->db->query($sql_ps);
$res_ps = $query_ps->row();

$sql_pv = "SELECT name FROM web_province  WHERE id=".$res_ps->province." ";
$query_pv = $this->db->query($sql_pv);
$data_pv = $query_pv->row();
/* echo $arr[book][province];
  exit(); */

$sql_dv = "SELECT name,nickname,phone,name_en,username FROM web_driver WHERE id='".$arr[book][drivername]."'    ";
$query_dv = $this->db->query($sql_dv);
$res_dv = $query_dv->row();

if ($_COOKIE['lng'] == "th") {
  $full_name_driver = $res_dv->name." (".$res_dv->nickname.")";
}
else {
  $full_name_driver = $res_dv->name_en;
}
$full_name_driver = $res_dv->name." (".$res_dv->nickname.")";
if ($res_dv->name != "") {
  $name_dv = $res_dv->name;
}
if ($res_dv->nickname != "") {
  $name_dv = $res_dv->nickname;
}
if ($arr[book][status] == 'CANCEL') {
  
  $sql = "SELECT s_topic FROM shop_type_cancel  WHERE id='".$arr[book][cancel_type]."' ";
  $query_cancel = $this->db->query($sql);
  $res_cancel = $query_cancel->row();
  $status_txt = '<font color="#ff0000">ยกเลิก '.$res_cancel->s_topic.'</font>';
          
          
}
else if ($arr[book][status] == 'NEW') {
  $status_txt = '<font color="#3b5998">'.t_new.'</font>';
}
else if ($arr[book][status] == 'COMPLETED') {
  $status_txt = '<font color="#54c23d">'.t_success.'</font>';
}
if ($arr[book][driver_complete] == 1) {
  $cancel_shop = 'display:none;';
}








$minutes_to_add = $arr[book][airout_m];
//        echo $minutes_to_add." ++";
$time_c = date('H:i',$arr[book][update_date]); //ดึงเวลา อัพเดทเวลา ล่าสุด
$time = new DateTime($time_c);
if (in_array($_SERVER['REMOTE_ADDR'],array('127.0.0.1','::1'))) { // debug mode on localhost ('127.0.0.1' IP in IPv4 and IPv6 formats)
}
else {
  $time->add(new DateInterval('PT'.$minutes_to_add.'M'));
}
$stamp = $time->format('H:i');
?>
<script>
  $('#date_trans').text(formatDate('<?=$arr[book][transfer_date];?>'));
//	$('#header_clean').text('<?=$_POST[invoice];?>');
  console.log('IOS : <?=$_GET[ios];?>');
</script>
<input type="hidden" value="<?=$check_type_person;?>" id="check_type_person" />
<input type="hidden" value="<?=$check_type_park;?>" id="check_type_park"  />
<input type="hidden" value="<?=$check_type_com;?>" id="check_type_com"  />

<input type="hidden" value="<?=$_POST[id];?>" id="id_order" />
<input type="hidden" value="<?=$_POST[drivername];?>" id="id_driver_order" />
<input type="hidden" value="<?=$_POST[program];?>" id="place_product_id" />
<input type="hidden" value="<?=$_POST[invoice];?>" id="order_invoice" />
<ons-card class="assas_<?=$_POST[id];?>" style=" padding:10px 12px;" >
  <?php
  if ($arr[book][check_guest_register] != 1 && $arr[book][status] != "CANCEL") {

    if ($_COOKIE[detect_userclass] == "lab") {
      ?>
      <div id="btn_cancel_shop" class="button button--outline" onclick="cancelShopSelect('<?=$_POST[id];?>', '<?=$_POST[invoice];?>', '<?=$_POST[drivername];?>');" style="    float: right;
           /* position: absolute; */
           /* right: 10px; */
           border: 1px solid #F44336;
           color: #F44336;
           box-shadow: 1px 1px 3px #efefef;
           padding: 0px 4px;
           border-radius: 4px;
           top: 0px;
           /*margin-right: -30px;*/

           /*margin-top: -24px;*/
           /* margin: 15px; */<?=$cancel_shop;?>"><span class="font-16 text-cap"><?=t_cancel;?></span></div>
           <?php
         }
       }
       ?>
  <div id="status_booking_detail" class="font-26" style=""><b><?=$status_txt;?></b></div>
  <span class="font-20"><?=$res_ps->$place_shopping;?></span>

  <table width="100%" border="0" cellspacing="1" cellpadding="1">
    <tbody>

      <tr>
        <td width="33%" align="left" style="padding: 0px;" >
          <div class="btn  btn-default" style=" width:100%; text-align:left; height:40px;border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_phone" onclick="openContact('<?=$res_ps->id;?>');">
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
          <div class="btn  btn-default" style=" width:100%; text-align:left;  /*padding:2px;*/height:40px;border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_zello" onclick="openZello('<?=$res_ps->id;?>');">
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
          <div class="btn  btn-default" style=" width:100%; text-align:left;  /*padding:2px;*/height:40px;border-radius: 0px;" data-toggle="dropdown" id="shop_sub_menu_map" onclick="openShopMap('<?=$res_ps->lat;?>', '<?=$res_ps->lng;?>', '<?=$res_ps->address;?>', '<?=$data_pv->name;?>')">
            <table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tbody>
                <tr>
                  <td align="center" width="30"><img src="<?=base_url();?>assets/images/social/map.png" width="30" height="30" alt=""/></td>
                  <td align="center" class="font-22"><b><?=t_maps;?></b></td>
                </tr>
              </tbody>
            </table>
          </div>

        </td>
      </tr>

    </tbody>
  </table>
  <?php
  // echo 'dddddddddddd';
  if ($_COOKIE[detect_userclass] != "taxi") {
    ?>


    <div style="padding: 5px 0px;">
      <ons-list-header class="list-header"> <?=t_car_driver_information;?></ons-list-header>

                            <!-- <span class="text-cap font-22"><?=t_car_driver_information;?></span> -->
      <table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_hide_driver">
        <tr>
          <td width="35%"  class="font-17"><font color="#333333"></font><?=t_dv_name;?></td>
          <td colspan="3" class="font-17">
            <?=$full_name_driver;?></td>
        </tr>
        <tbody>
          <tr>
            <td   width="35%"  class="font-17"><font color="#333333"><?=t_car_registration_number;?></font></td>
            <td colspan="3" class="font-17"><?=$res_od->car_plate;?></td>
          </tr>
          <tr>
            <td   width="35%"  class="font-17"><font color="#333333"><?=t_call;?></font></td>
            <td colspan="3" class="font-17">
              <a href="tel:<?=$arr[book][phone];?>" ><?=$arr[book][phone];?></a>
              <a href="tel:0954293062">
                <i class="material-icons" style="margin-left: 10px; color: rgb(89, 170, 71); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(89, 170, 71);">phone</i></a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  <?php }
  ?>
  <div style="padding: 5px 0px;">
    <ons-list-header class="list-header"> <?=t_reservation_information;?></ons-list-header>
       <!-- <span class="text-cap font-22"></span> -->
    <table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" style="display:nones" id="table_show_hide_data">
      <tbody>
        <tr>
          <td width="35%" class="font-17 text-cap"><font color="#333333"><?=t_booking_no;?></font></td>
          <td class="font-17" colspan="2"><span id="txt_invoice_shop_detail"><?=$arr[book][invoice];?></span></td>
        </tr>
      </tbody>
      <tbody>
        <tr>
          <td class="font-17 text-cap"><font color="#333333"><?=t_date;?></font></td>
          <td class="font-17" colspan="2"><span id="date_trans"></span></td>
        </tr>
        <tr>
          <td class="font-17 text-cap"><font color="#333333"><?=t_arrival_time;?></font>

          </td>
          <td class="font-17"> <span id="txt_time_change_now"><?=$stamp." น.";?></span></td>
          <td align="right">
            
          </td>
        </tr>
        <tr>
          <td class="font-17 text-cap" width="50px"><font color="#333333"><?=t_number;?></font>

          </td>
          <td class="font-17" style="padding: 0 !important;" >
            <table width="100%">
              <tr>
                <td>	
                  <span id="isedit"><?php if ($arr[book][adult] > 0) {?>
                      <?=t_adult;?> :

                      &nbsp;
                    <?php }?>
                    <span id="num_final_edit"><?=$arr[book][adult];?> </span></span>
                  <span id="text_edit_persion" style="display: none;"><?php if ($arr[book][adult] > 0) {?>
                      <?=t_adult;?> :

                      &nbsp;
                    <?php }?>
                  </span>

                  <input type="number" name="" id="num_edit_persion" pattern="\d*" style="height: 30px;
                         width: 50px;
                         padding: 0px;
                         font-size: 16px;
                         margin: auto;
                         display: none;" value="<?=$arr[book][adult];?>" >

                </td>

<!--<td>
    <span  class="button " align="center" onclick="editBook('<?=$arr[book][id];?>','adult');"  style="    background: #3b5998;
color: #fff;
padding: 0px 10px;
font-size: 3px !important;
border-radius: 8px;display: inline-block;" id="btn_isedit">
<span class="font-17 text-cap">แก้ไข</span>
</span>
<span class="button " align="center" onclick="saveeditBook('<?=$arr[book][id];?>');"  style="    background: #3b5998;
color: #fff;
padding: 0px 10px;
font-size: 3px !important;
border-radius: 8px;display: none;" id="btn_selectisedit">
<span class="font-17 text-cap">บันทึก</span>
</span>
</td>-->
              </tr>

              <tr>
                <td>

                  <?=t_child;?> :  <span id="num_final_edit_child"><?=$arr[book][child];?></span>
                  <input type="number" name="" id="num_edit_child" pattern="\d*" style="height: 30px;margin-top: -25px;margin-left: 40px;
                         width: 50px;
                         padding: 0px;
                         font-size: 16px;
                         /*    margin: auto;*/
                         display: none;" value="<?=$arr[book][child];?>" >	
                </td>
                <!--<td width="60">
                    <span  class="button " align="center" onclick="editBook('<?=$arr[book][id];?>','child');" style="    background: #3b5998;
color: #fff;
padding: 0px 10px;
font-size: 3px !important;
border-radius: 8px;display: inline-block;" id="btn_isedit_child">
    <span class="font-17 text-cap">แก้ไข</span>
</span>
<span class="button " align="center" onclick="saveeditBook('<?=$arr[book][id];?>','child');"  style="    background: #3b5998;
color: #fff;
padding: 0px 10px;
font-size: 3px !important;
border-radius: 8px;display: none;" id="btn_selectisedit_child">
    <span class="font-17 text-cap">บันทึก</span>
</span>
                </td>-->
              </tr>

              <tr>
                <?php if ($arr[book][num_ch] > 0) {?>
                  <td style="padding: 0 !important;">
                    <table>
                      <tr>
                        <td width="20"><span class="font-17">จีน</span></td>
                        <td width=""><img src="<?=base_url();?>assets/images/flag/China.png" width="25" height="25" alt=""></td>
                      </tr>
                    </table>
                  </td>
                <?php }?>
                <?php if ($arr[book][num_other] > 0) {?>
                  <td style="padding: 0 !important;">
                    <table>
                      <tr>
                        <td width="20"><span class="font-17">ต่างชาติ</span></td>
                        <td width=""><img src="<?=base_url();?>assets/images/flag/Other.png" width="25" height="25" alt=""></td>
                      </tr>
                    </table>
                  </td>
                <?php }?>

              </tr>
            </table>
          </td>
          <td  align="right">
            
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <?php
  $_where = array();
  $_where['id'] = $arr[book][plan_setting];
  $_select = array('*');
  $PLAN_PACK = $this->Main_model->rowdata(NEW_TBL_PLAN_PACK,$_where);
  $_where = array();
  $_where['id'] = $PLAN_PACK->i_country;
  $_select = array('country_code','id','name_th');
  $COUNTRY = $this->Main_model->rowdata(TBL_WEB_COUNTRY,$_where,$_select);
  $plan = $PLAN_PACK->s_topic;
  ?>
  <div style="padding: 5px 0px;">
    <ons-list-header class="list-header"> <?=t_work_remuneration;?></ons-list-header>
    <table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_income_driver">
      <input type="hidden" value="<?=$arr[book][price_person_unit];?>" id="val_person_unit" />
      <input type="hidden" value="<?=$arr[book][price_park_unit];?>" id="val_park_unit" />
      <input type="hidden" value="<?=$arr[book][commission_persent];?>" id="val_com_persent" />
      <tr>
        <td width="35%"><span class="font-17">ประเภท</span></td>
        <td colspan="2"><span class="font-17" id="txt_type_plan"><?=$plan;?></span></td>
      </tr>
      <tr>
        <td width="35%"><span class="font-17">สัญชาติ</span></td>
        <td colspan="2">
          <table>
            <tr>
              <td>
                <img src="<?=base_url();?>assets/images/flag/icon/<?=$COUNTRY->country_code;?>.png" width="25" height="25" alt="">
              </td>
              <td>&nbsp;</td>
              <td><span class="font-17" id="txt_county_pp"><?=$COUNTRY->name_th;?></span></td>
            </tr>
          </table>
        </td>
      </tr>

      <?php
      $_where = array();
      $_where['i_plan_pack'] = $arr[book][plan_setting];
      $_select = array('*');
      $_order = array();
      $_order['id'] = 'asc';
      $PACK_LIST = $this->Main_model->fetch_data('','',NEW_TBL_PLAN_PACK_LIST,$_where,$_select,$_order);
      $all_total_iprice = 0;
      foreach ($PACK_LIST as $key => $val) {
        $_where = array();
        $_where[id] = $val->i_plan_main;
        $this->db->select('id,s_topic');
        $query_main = $this->db->get_where(NEW_TBL_PLAN_MAIN,$_where);
        $main = $query_main->row();
        $_where = array();
        $_where[id] = $val->i_con_plan_main_list;
        $this->db->select('id,s_topic');
        $query_mainlist = $this->db->get_where(NEW_TBL_PLAN_MAIN_LIST,$_where);
        $mainlist = $query_mainlist->row();
        $partner_g = 2;
        $_where = array();
        $_where[id] = $val->i_con_plan_main_list;
        $this->db->select('*');
        $query = $this->db->get_where(NEW_TBL_PLAN_MAIN_LIST,$_where);
        if ($val->i_con_plan_main_list > 0) {

          $txt_btn_add = $mainlist->s_topic;
        }
        else {

          $txt_btn_add = 'เพิ่ม';
        }
        $_where = array();
        $_where[i_order_booking] = $arr[book][id];
        $_where[i_main_list] = $val->i_con_plan_main_list;

        $_select = array('*');

        $COM_ORDER_BOOKING = $this->Main_model->rowdata(TBL_COM_ORDER_BOOKING,$_where,$_select);

        //  echo '<pre>';
        // print_r($COM_ORDER_BOOKING);
        // echo '</pre>';
        if ($COM_ORDER_BOOKING->i_main_list == 5) {
          $curency = '%';
          $title_head = 'รายการ';
          $title_head2 = 'คอม(%)';


          $_where = array();
          // echo $COM_ORDER_BOOKING->i_com;
          $_where[status] = 1;
          $_where[id] = $COM_ORDER_BOOKING->i_com;
          $_select = array('*');
          $MAIN_TYPELIST = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where,$_select);

          //                      echo '<pre>';
          // print_r($MAIN_TYPELIST);
          // echo '</pre>';
//          // $pax = $COM_ORDER_BOOKING->i_pax;
// $pax = $MAIN_TYPELIST->topic_th;
        }
        else if ($COM_ORDER_BOOKING->i_main_list == 2) {
          $curency = 'บ.';
          $title_head = 'รายการ';
          $title_head2 = 'ราคา';
          $all_total_iprice += $COM_ORDER_BOOKING->i_price;
          $_where = array();

          $_where[status] = 1;
          $_where[id] = $COM_ORDER_BOOKING->i_com;
          $_select = array('*');
          $USE_TYPE = $this->Main_model->rowdata(TBL_WEB_CAR_USE_TYPE,$_where,$_select);
          //                                echo '<pre>';
          // print_r($USE_TYPE);
          // echo '</pre>';
          $pax = $USE_TYPE->name_th;
        }
        else if ($COM_ORDER_BOOKING->i_main_list == 4) {
          $curency = 'บ.';
          $title_head = 'รายการ';
          $title_head2 = 'ราคา(คนละ)';
          $all_total_iprice += $COM_ORDER_BOOKING->i_price * $COM_ORDER_BOOKING->i_pax;
          $pax = $COM_ORDER_BOOKING->i_pax;
        }
        else if ($COM_ORDER_BOOKING->i_main_list == 3) {
          $curency = 'บ.';
          $title_head = 'รายการ';
          $title_head2 = 'ราคา(คนละ)';
          $all_total_iprice += $COM_ORDER_BOOKING->i_price * $COM_ORDER_BOOKING->i_pax;
          $pax = $COM_ORDER_BOOKING->i_pax;
        }
        else {
          $all_total_iprice += $COM_ORDER_BOOKING->i_price;
          $curency = 'บ.';
          $title_head = 'จำนวน';
          $title_head2 = 'ราคา';
          $pax = $COM_ORDER_BOOKING->i_pax;
        }
        // echo $COM_ORDER_BOOKING->i_com;
        $_where = array();
        $_where['id'] = $val->i_pay_type;
        $_select = array('name_th');
        $PAY_TYPE = $this->Main_model->rowdata(NEW_TBL_PAY_TYPE,$_where);
        ?>
        <tr >
          <td  colspan="4">
            <table width="100%">
              <tr>
                <td colspan="4">
                  <span style="font-weight: 700"><?=$main->s_topic;?>  (<?=$txt_btn_add;?>) </span>
                  <span style="margin-left: 10px;color: #0076ff">(<?=$PAY_TYPE->s_topic;?>)</span>
                </td>

              </tr>
              <tr>
                <td width="90"> <?=$title_head;?></td>
                <td></td>
                <td width="150" align="center"> <?=$title_head2;?></td>
                <td></td> 
              </tr>
              <?php
              if ($COM_ORDER_BOOKING->i_main_list != 5) {
                ?>

                <tr>
                  <td width="90" align="center"> <span style="" id="pax_show_income"><?=$pax;?></span></td>
                  <td></td>
                  <td width="" align="right"><span><?=number_format($COM_ORDER_BOOKING->i_price,0);?></span>
                    <input value="<?=$COM_ORDER_BOOKING->i_price;?>" id="each_price" type="hidden" />
                  </td>                
                  <td align="left"><span class="font-17" ><?=$curency;?></span></td> 
                </tr>

                <?php
              }
              else if ($COM_ORDER_BOOKING->i_main_list == 5) {
                $_where = array();
                $_where['i_order_booking'] = $arr[book][id];
                $_where['i_plan_pack'] = $arr[book][plan_setting];
                $_select = array('*');
                $_order = array();
                $_order['id'] = 'asc';
                $BOOKING_COM = $this->Main_model->fetch_data('','',TBL_COM_ORDER_BOOKING_COM,$_where,$_select,$_order);
//                $BOOKING_COM = $this->Main_model->fetch_data('','',TBL_COM_ORDER_BOOKING,$_where,$_select,$_order);

                foreach ($BOOKING_COM as $key => $datacom) {
                  $_where = array();
                  $_where['id'] = $datacom->i_con_com_product_type;
                  $_select = array('id');
                  $COM_PRODUCT_TYPE = $this->Main_model->rowdata(TBL_CON_COM_PRODUCT_TYPE,$_where);

                  $_where = array();
                  $_where[id] = $COM_PRODUCT_TYPE->i_product_sub_typelist;
                  $this->db->select('*');
                  $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$_where);
                  $data_pd_sub_typelist = $query->row();


                  $_where = array();
                  $_where[status] = 1;
                  $_where[id] = $data_pd_sub_typelist->i_main_typelist;
                  $this->db->select('*');
                  $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where);
                  $data_pd = $query->row();
                  ?>
                  <tr id="">
                    <td colspan="2">
                      <span style="font-size:16px;"><?=$data_pd->topic_th;?>  </span>

                    </td>

                                                      <!-- <td align="center"><span   style="width: 90%;" class="form-control" ><?=$data_con_pd_typelist->f_price;?></span></td> -->
                    <td align="center"><span   style="width: 90%;" class="form-control" ><?=$datacom->i_price;?></span></td>
                    <!-- <td align="center"><span   style="width: 90%;" class="form-control" ><?=$data_con_pd_typelist->f_wht;?></span></td> -->
                    <td width="30"></td>
                  </tr>

                  <?php
                }
              }
              ?>
            </table>          
          </td>
        </tr>
        <?php
      }
      ?>
      <tr>
        <td ></td>
        <td width="110" style="font-weight: 700"><span>รวม</span></td>
        <td align="left" style="font-weight: 700" colspan="2">
          <span class="16" id="txt_all_total"><?=number_format($all_total_iprice,0);?></span>
          <span class="font-17">บ.</span>
        </td>       
      </tr>
    </table>
  </div>

  <?php
  if ($arr[book][status] != 'CANCEL') {

    include("application/views/shop/checkin.php");

    if ($_COOKIE[detect_userclass] == "taxi") {
      $txt_btn_pay = 'ตรวจสอบรายได้';
      $txt_head_pay = t_income;
    }
    else {
      $txt_btn_pay = 'แจ้งยอดรายจ่าย';
      $txt_head_pay = 'รายจ่าย';
    }
    ?>	
    <div style="padding: 5px 0px;display: none;">
      <span class="text-cap font-22"><?="โค้ดและเอกสาร";?></span>
      <?php if ($data_user_class == 'lab' and $arr[book][program] == 1) {?>
        <table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_code_doc">
          <tr>
            <td width="60" valign="middle"><span class="font-17">Code</span></td>
            <td width="150">
              <input type="text" class="form-control font-17" id="code_order" name="code_order" value="<?=$arr[book][code];?>" style="margin-bottom: 0px;height: 2.5rem;padding-left: 0px;"/></td>
            <td><span class="btn" align="center" onclick="updateCode('<?=$arr[book][program];?>', '<?=$arr[book][id];?>');" style="background: #3b5998;
                      color: #fff;
                      padding: 0px 10px;
                      font-size: 3px !important;
                      border-radius: 8px;">
                <span class="font-17 text-cap">บันทึก</span>
              </span></td>
          </tr>
          <tr>
            <td width="60"><span class="font-17">อัพโหลด</span></td>
            <td><a class="waves-effect waves-light btn" style="background-color: #009688;color: #fff !important;border-radius: 10px;" onclick="uploadCodeFile('<?=$arr[book][program];?>', '<?=$arr[book][id];?>', 'lab');"><i class="material-icons left" style="font-size: 16px;margin-right: 7px;">cloud</i>อัพโหลด</a></td>
          </tr>
        </table>
        <?php
      }
      else if ($data_user_class == 'taxi' and $arr[book][program] == 1) {
        ?>

        <table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_code_doc">
          <tr>
            <td width="60" valign="middle"><span class="font-17">Code</span></td>
            <td width="150">
              <input type="text" class="form-control font-17" readonly="readonly" value="<?=$arr[book][code];?>" style="margin-bottom: 0px;height: 2.5rem;padding-left: 0px;"/></td>
          </tr>
          <tr>
            <td width="60">
              <span class="font-17">อัพโหลด</span></td>
            <td>
              <a class="waves-effect waves-light btn" style="background-color: #3b5998;color: #fff !important;border-radius: 8px;" onclick="uploadCodeFile('<?=$arr[book][program];?>', '<?=$arr[book][id];?>', 'taxi');"><i class="material-icons left" style="font-size: 16px;margin-right: 7px;">cloud</i>ตรวจสอบภาพ</a></td>
          </tr>
        </table>
      <?php }?>
    </div>
  <?php }?>

</ons-card>
<input type="hidden" id="check_cause" value="0"/>
<input type="hidden" id="check_id_income" value="<?=$arr[book][id];?>"/>