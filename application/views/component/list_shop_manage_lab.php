<?php
$data_user_class = $_COOKIE[detect_userclass];
if (count($_POST[data]) <= 0) {
  echo '<div class="font-22" style="color: #ff0000;text-align: center;padding: 0px; margin-top: 10px;" id="no_work_div"><strong>ไม่มีงาน</strong></div>';
  //
}

foreach ($_POST[data] as $key => $val) {
  $sql_dv = "SELECT name,nickname,phone,name_en,zello_id,line_id,username FROM web_driver WHERE id='".$val[drivername]."'    ";
  $query_dv = $this->db->query($sql_dv);
  $res_dv = $query_dv->row();

  $sql_ps = "SELECT topic_th,id FROM shopping_product  WHERE id='".$val[program]."' ";
  $query_ps = $this->db->query($sql_ps);
  $res_ps = $query_ps->row();

  $minutes_to_add = $val[airout_m];
  //        echo $minutes_to_add." ++";
  $time_c = date('H:i',$val[update_date]); //ดึงเวลา อัพเดทเวลา ล่าสุด
  $time = new DateTime($time_c);
  if (in_array($_SERVER['REMOTE_ADDR'],array('127.0.0.1','::1'))) { // debug mode on localhost ('127.0.0.1' IP in IPv4 and IPv6 formats)
  }
  else {
    $time->add(new DateInterval('PT'.$minutes_to_add.'M'));
  }
  $stamp = $time->format('H:i');
  //        echo $stamp." +";
  $current_time = date('H:i');
  $datetime1 = new DateTime($current_time);
  $datetime2 = new DateTime($stamp);

  $contract = "taxi";
  if ($res_dv->nickname != "") {
    $nickname = " (".$res_dv->nickname.")";
  }
  else {
    $nickname = "";
  }

  $query_q = $this->db->query("SELECT t5.*, t2.topic_th as topic_type, t3.name_th as province_name,t2.topic_th as topoic_pcs, t3.name_th as province_name, t4.name_th as area FROM place_car_station as t1 left join place_car_station_type as t2 on t1.type = t2.id left join place_car_station_other as t5 on t1.station = t5.id left join web_province as t3 on t5.province = t3.id left join web_area as t4 on t5.amphur = t4.id where t1.member = '".$val[drivername]."' and t1.status = 1");
  $row_q = $query_q->row();

  $query_car = $this->db->query("SELECT t1.id, t1.i_car_gen,t2.name_en as name_brand, t3.name_en as name_gen, t4.name_th as color FROM web_carall as t1 left join web_car_brand as t2 on t1.i_car_brand = t2.id left join web_car_gen as t3 on t1.i_car_gen = t3.id left join web_car_color as t4 on t1.i_car_color = t4.id where t1.id = '".$val[check_use_car_id]."'");
  $row_car = $query_car->row();

  $sql = "SELECT * FROM shop_type_cancel  WHERE id='".$val[cancel_type]."' ";
  $query_cancel = $this->db->query($sql);
  $res_cancel = $query_cancel->row();

  if ($res_dv->name != "") {
    $name_dv = $res_dv->name;
  }
  if ($res_dv->nickname != "") {
    $name_dv = $res_dv->nickname;
  }
  ?>
  <div style="padding: 5px 0px;margin: 12px 10px;" id="list_shop_manage_<?=$val[id];?>" >
    <input type="hidden" id="check_status_<?=$val[id];?>" value="<?=$val[status];?>" />
    <a href="tel://<?=$val[phone];?>" target="_blank" style="display: none;" id="phone_driver_<?=$val[id];?>"><?=$val[phone];?></a>
    <a href="zello://<?=$res_dv->zello_id;?>?add_user" target="_blank" style="display: none;" id="zello_driver_<?=$val[id];?>"><?=$res_dv->zello_id;?></a>
    <a href="line://ti/p/<?=$res_dv->line_id;?>" target="_blank" style="display: none;" id="line_driver_<?=$val[id];?>"><?=$res_dv->zello_id;?></a>
    <div class="box-shop">
      <?php if ($_GET[wait_trans] == "") {?>
        <span class="time-post-shop" id="txt_date_diff_<?=$val[id];?>" style="font-size:14px;">-</span>
        <?php
        $width = "50";
      }
      ?>
     	<table width="100%">
        <tr>
          <td width="<?=$width;?>"><span class="font-18"><b>ติดต่อ</b></span></td>
          <td><span class="font-18"><?=date("d/m/Y",$val[post_date]);?></span></td>
        </tr>
     	</table>



      <table width="100%"  >
        <tr>
          <td colspan="2">
            <table width="100%" border="0" cellspacing="1" cellpadding="1" style=" margin-top: 0px;">
              <tbody>
                <tr>
                  <td width="33%" align="left" style="padding: 0px; border: 1px solid #ccc; box-shadow: 1px 1px 3px #9e9e9e;">
                    <div class="btn" style=" width:100%; text-align:left; border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_phone" onclick="contactDriver('<?=$contract;?>', 'phone', '<?=$res_ps->id;?>', '<?=$val[id];?>');">
                      <table width="100%" border="0" cellspacing="1" cellpadding="1">
                        <tbody>
                          <tr>
                            <td align="center" width="30"><i class="fa fa-phone-square" style="font-size:32px; color: #8DC63F; border:none;"></i></td>
                            <td align="center" class="font-17"><b>โทร</b></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </td>
                  <td width="33%" align="left" style="padding: 0px; border: 1px solid #ccc; box-shadow: 1px 1px 3px #9e9e9e;">
                    <div class="btn " style=" width:100%; text-align:left;border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_zello" onclick="contactDriver('<?=$contract;?>', 'zello', '<?=$res_ps->id;?>', '<?=$val[id];?>');">
                      <table width="100%" border="0" cellspacing="1" cellpadding="1">
                        <tbody>
                          <tr>
                            <td align="center" width="30"><img src="assets/images/social/zello.png" width="30" height="30" alt=""> </td>
                            <td align="center" class="font-17">
                              <b>Zello</b>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </td>
                  <td width="33%" align="left" style="padding: 0px; border: 1px solid #ccc; box-shadow: 1px 1px 3px #9e9e9e;">
                    <div class="btn" style=" width:100%; text-align:left; border-radius: 0px;" data-toggle="dropdown" id="shop_sub_menu_map" onclick="contactDriver('<?=$contract;?>', 'line', '<?=$res_ps->id;?>', '<?=$val[id];?>');">
                      <table width="100%" border="0" cellspacing="1" cellpadding="1">
                        <tbody>
                          <tr>
                            <td align="center" width="30"><img src="assets/images/social/line.png" width="30" height="30" alt=""></td>
                            <td align="center" class="font-17"><b>Line</b></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td width="70%" ><span class="font-17"><?=$res_ps->topic_th;?></span></td>
          <td width="30%" align="center" rowspan="1">
            <table  style="position: absolute;right: 25px;margin-top: -10px;">
              <tr>
                <td>
                  <i onclick="modalShowImg('../data/pic/car/<?=$row_car->id;?>_1.jpg?v=<?=time();?>', '');" class="material-icons font-28" style="color: rgb(59, 89, 152);  border-radius: 50%; padding: 2px; border: 2px solid rgb(59, 89, 152);">local_taxi</i>
                </td>
                <td width="1"></td>
                <td>
                  <i class="material-icons font-28" style="color: rgb(59, 89, 152);  border-radius: 50%; padding: 2px; border: 2px solid rgb(59, 89, 152);" onclick="modalShowImg('../data/pic/driver/small/<?=$res_dv->username;?>.jpg', '<?=$name_dv;?>');">account_circle</i>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <!----------------------------------------------------------------------------------------------------------------------------->
        <tr>
          <td colspan="2">
            <?php
            $data = $this->Main_model->rowdata(TBL_ORDER_BOOKING,array('id' => $val[id]),array('*'));

            $query_price = $this->db->query("select * from shop_country_com_list_price_taxi where i_shop_country_com_list = '".$data->plan_id."' ");
            $num = 0;

            $display_person = "display:none";
            $display_com = "display:none";
            $display_park = "display:none";
            $park_total = 0;
            $person_total = 0;
            $com_total = 0;
            // $plan = "";
            foreach ($query_price->result() as $row_price) {
              if ($num >= 1) {
                $push = " + ";
              }
              else {
                $push = "";
              }
              // $plan .= $push.$row_price->s_topic_th;
              $num++;

              if ($row_price->s_topic_en == "park") {
                $check_type_park = 1;
                $display_park = "";
                $park_total = $data->price_park_unit;
              }

              if ($row_price->s_topic_en == "person") {
                $check_type_person = 1;
                $display_person = "";
                $person_total = intval($data->price_person_unit) * intval($data->adult);
                $cal_person = $data->price_person_unit."x".$data->adult;
              }

              if ($row_price->s_topic_en == "comision") {
                $check_type_com = 1;
                $display_com = "";
                $i_list_prices = $row_price->id;
            $i_plan_product_price_name = $row_price->i_plan_product_price_name;
                $com_persent = $data->commission_persent;
                $com_progress = '<span style="padding-left: 0px;"><font color="#FF0000">รอโอน</font></span>';
              }
            }
//            $all_total = $park_total + $person_total + $com_total;
            $sql_country = "SELECT t2.s_country_code, t2.s_topic_th FROM shop_country_com_list_price_taxi as t1 left join shop_country_icon_taxi as t2 on t1.i_shop_country_icon = t2.id WHERE t1.i_shop_country_com_list='".$data->plan_id."'    ";
            $query_country = $this->db->query($sql_country);
            $res_country = $query_country->row();

            $titel = t_work_remuneration;
            $display_none_change_plan = "display:none;";
            $color_titel = "";

            if ($data->check_driver_pay == 0) {
              $txt_get_cash = "<span class='font-17' style='color: #f00;'>ยังไม่รับ</span>";
            }
            else {
              $txt_get_cash = "<span class='font-17' style='color: #6fab1e;'>รับแล้ว</span>";
            }
            $_where = array();
      $_where['i_order_booking'] = $data->id;
      $_select = array('*');
      $_order = array();
      $_order['id'] = 'asc';
      $BOOKING_LOGS = $this->Main_model->fetch_data('','',TBL_COM_ORDER_BOOKING_LOGS, $_where,$_select,$_order);
      // echo  $BOOKING_LOGS;
      // echo 'fsfsafsfsf';
                // echo '<pre>';
 // print_r($BOOKING_LOGS);
 // echo '</pre>';
  // echo $BOOKING_LOGS.'-------------------------'.count($BOOKING_LOGS).'------------'.$data->id;;




$_where = array();
 // if (count($BOOKING_LOGS)=='') {
  $_where['id'] = $data->plan_setting;
       
      // }
      // else{
        // $_where['id'] = $BOOKING_LOGS[0]->i_plan_pack;
      // }
// $_where = array();
                    // $_where['id'] = $data->plan_setting;
                    $_select = array('*');
                    $PLAN_PACK = $this->Main_model->rowdata(NEW_TBL_PLAN_PACK,$_where);
 
 //           echo '<pre>';
 // print_r($PLAN_PACK);
 // echo '</pre>';
 $_where = array();
                    $_where['id'] = $PLAN_PACK->i_country; 
                    $_select = array('country_code','id','name_th');
                    $COUNTRY = $this->Main_model->rowdata(TBL_WEB_COUNTRY,$_where,$_select);



$plan = $PLAN_PACK->s_topic;
// echo $plan;



//            $all_total = $park_total + $person_total + $com_total;
        $sql_country = "SELECT t2.s_country_code, t2.s_topic_th FROM shop_country_com_list_price_taxi as t1 left join shop_country_icon_taxi as t2 on t1.i_shop_country_icon = t2.id WHERE t1.i_shop_country_com_list='".$data->plan_id."'    ";
        $query_country = $this->db->query($sql_country);
        $res_country = $query_country->row();

        $titel = t_work_remuneration;
        $display_none_change_plan = "display:none;";
        $color_titel = "";

        if ($data->check_driver_pay == 0) {
          $txt_get_cash = "<span class='font-17' style='color: #f00;'>ยังไม่รับ</span>";
        }
        else {
          $txt_get_cash = "<span class='font-17' style='color: #6fab1e;'>รับแล้ว</span>";
        }
        ?>
        <tr>
          <td colspan="3">
            <table style="margin-left: -2px;">
              <tr>
                <td style="padding: 0;"><span class="font-17">สัญชาติ</span> : </td>
                <td style="padding: 0;">
                  <img src="<?=base_url();?>assets/images/flag/icon/<?=$COUNTRY->country_code;?>.png" width="20" height="20" alt="">
                </td>
                <td style="padding: 0;">&nbsp;</td>
                <td style="padding: 0;"><span class="font-17" id="txt_county_pp"><?=$COUNTRY->name_th;?></span></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
           <td colspan="3">
            <table style="margin-left: -2px;">
              <tr>
                <td style="padding: 0;"><span class="font-17">ประเภท</span> : </td>
                <td style="padding: 0;">
                 <td colspan="2"><span class="font-17" id="txt_type_plan"><?=$plan;?>
                </td>
               
              </tr>
            </table>
          </td>
          
        </tr>

        <!----------------------------------------------------------------------------------------------------------------------------->

        <tr>
          <td><?="จ.".$row_q->province_name." อ.".$row_q->area;?></td>
          <td>

          </td>
        </tr>

        <tr>
          <td colspan="2">
  <?=$row_q->topic_type;?> : <?=$row_q->topic_th;?>
          </td>
        </tr>

        <tr>
          <td colspan="2">คนขับ : <?=$res_dv->name.$nickname;?></td>
        </tr>
        <tr>
          <td colspan="2">ยี่ห้อ : <?=$row_car->name_brand;?> รุ่น : <?=$row_car->name_gen;?> สี : <?=$row_car->color;?></td>
        </tr>

        <tr>
          <td colspan="2" style="padding: 0px 0px;">
            <div class="font-17">ป้ายทะเบียน&nbsp;:&nbsp;<a><?=$val[car_plate]." ";?></a>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div class="font-17">
              จำนวน : 
              <?php if ($val[adult] > 0) {?>
                ผู้ใหญ่ : <span id="txt_mn_adult_<?=$val[id];?>"><?=$val[adult];?></span> 
              <?php }?>
              <?php if ($val[child] > 0) {?>
                เด็ก : <span id="txt_mn_child_<?=$val[id];?>"><?=$val[child];?></span>	
              <?php }
              ?>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <span class="font-17" >เลขจอง : <?=$val[invoice];?></span>
            <font color="#ff0000;" style="position: absolute;right: 25px;" id="time_toplace_<?=$val[id];?>"><?="ถึงประมาณ ".$stamp." น.";?></font>
          </td>
        </tr>
        <?php
        if ($val[lab_approve_job] == 1) {
          $hidden_date_app = "";
        }
        else {
          $hidden_date_app = "display:none;";
        }
        ?>
        <tr id="date_approved_job_<?=$val[id];?>" style="<?=$hidden_date_app;?>">
          <td colspan="2">
            <span class="font-17" >รับทราบงาน :</span>
            <font color="#000;" style="position: absolute;right: 25px;" id="txt_date_approved_job_<?=$val[id];?>" ><?=date('H:i',$val[lab_approve_job_date])." น.";?></font>
          </td>
        </tr>

        <?php
        if ($val[status] != "CANCEL") {
          ?>
          <tr>
            <td colspan="2">
              <table width="100%">
                <tr>
                  <?php
                  $txt_cancel = "ปฏิเสธ";
                  if ($val[check_guest_register] == 0) {
                    ?>
                    <td width="35%" valign="top"  id="td_cancel_book_<?=$val[id];?>">
                  <ons-button onclick="cancelShopSelect('<?=$val[id];?>', '<?=$val[invoice];?>', '<?=$val[drivername];?>');" id="cancel_book_<?=$val[id];?>"  id="btn_edit_time_<?=$val[id];?>" style="padding: 15px;
                              border-radius: 5px;
                              line-height: 0;
                              border: 1px solid #fe3824;
                              color: #fe3824;" modifier="outline" class="button-margin button button--outline button--large">&nbsp; 
                    <span class="font-17 text-cap"><?=$txt_cancel;?></span>
                  </ons-button>
              </td>	
            <?php }
            ?>

            <td width="65%">
              <?php
              $text_mn = 'จัดการ';
              if ($val[lab_approve_job] == 0) {
                $btn_approve = "";
                $btn_manage = "display:none;";
              }
              else {
                $btn_approve = "display:none;";
                $btn_manage = "";
              }
              ?>
              <?php
              if ($_GET[wait_trans] != "") {
                $onclick = "openDetailShopWaitTrans('".$val[invoice]."');";
              }
              else {
                $onclick = "openDetailShop('".$key."','".$_GET[type]."','".$val[invoice]."');";
              }
              ?>  		
          <ons-button id="apporve_book_<?=$val[id];?>"  onclick="approveBook('<?=$val[id];?>', '<?=$val[invoice];?>', '<?=$val[drivername];?>');" 
                      style="padding: 15px; border-radius: 5px; line-height: 0;border:1px solid #4CAF50;color: #4CAF50;argin-top: 5px;<?=$btn_approve;?>" modifier="outline" class="button-margin button button--outline button--large" >&nbsp; <span class="font-17 text-cap">รับทราบ</span> </ons-button>

           <ons-button id="opendetail_book_<?=$val[id];?>" onclick="<?=$onclick;?>" 
                      style="padding: 15px; border-radius: 5px; line-height: 0;border:1px solid #0076ff;color: #0076ff;argin-top: 5px;<?=$btn_manage;?>" 
                      modifier="outline" class="button-margin button button--outline button--large" >&nbsp; <span class="font-17 text-cap"><?=$text_mn;?></span> </ons-button>           
          </td>
          </tr>
        </table>
        </td>
        </tr>
      <?php
      }
      else {
        $sql_del = "SELECT * FROM history_del_order_booking WHERE order_id= ".$val[id]."  ";
        $query_del = $this->db->query($sql_del);
        $res_del = $query_del->row();

        if ($res_del->class_user_cancel == "taxi") {
          ?>
          <tr>
            <td colspan="2">
              <table width="100%" >
                <tr>
                  <td>
                    <div style=" margin-top: 5px;"><b class="font-18"><font color="#ff0000">ยกเลิก<br/><?=$res_cancel->s_topic;?></font></b></div>

                  </td>
                  <td>
                <ons-button id="taxi_apporve_cancel_<?=$val[id];?>"  onclick="userApproveCancel('<?=$val[id];?>', '<?=$val[invoice];?>');" 
                            style="padding: 15px; border-radius: 5px; line-height: 0;border:1px solid #4CAF50;color: #4CAF50;margin-top: 5px;" modifier="outline" class="button-margin button button--outline button--large" ><span class="font-17 text-cap">รับทราบ</span> </ons-button>
            </td>
          </tr>
          </table>
          </td>
          </tr>
    <?php }
    else {?>
          <tr>
            <td colspan="2">
              <table width="100%" >
                <tr>

                  <td>
                    <div style=" margin-top: 5px;"><b class="font-18"><font color="#ff0000">ปฏิเสธ<br/><?=$res_cancel->s_topic;?></font></b></div>
                  </td>
                  <td align="right">
                    <span class="font-17"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#ff9800;"></i>&nbsp;<font color="#ff9800">รอรับทราบ</font></span>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
    <?php
    }
  }
  ?>
      </table>
    </div>

  </div>
  <script>
    var check_wait = "<?=$_GET[wait_trans];?>";
    if (check_wait == "") {
      var d1 = "<?=date('Y/m/d H:i:s',$val[post_date]);?>";
      var d2 = js_yyyy_mm_dd_hh_mm_ss();
      var check_wait = "<?=$_GET[wait_trans];?>";

      $('#txt_date_diff_<?=$val[id];?>').text(CheckTimeV2(d1, d2));
      $('#date_book_<?=$val[id];?>').text(formatDate('<?=$val[transfer_date];?>'));
    }
  </script>
  <?php }
?>