
<?php
$result = json_encode($_POST[data]);
$result = json_decode($result);

if (count($result) <= 0) {
  echo '<div class="font-22" style="color: #ff0000;text-align: center;padding: 0px; margin-top: 20px;" id="no_work_div"><strong>ไม่มีงาน</strong></div>';
}
foreach ($result as $key => $val) {

  if ($val->status == 'CANCEL') {

    $status_txt = '<strong><font color="#ff0000">ยกเลิก</font></strong>';
  }
  else if ($val->status == 'NEW') {
    $status_txt = '<strong><font color="#3b5998">'.t_new.'</font></strong>';
  }
  else if ($val->status == 'COMPLETED') {
    $status_txt = '<strong><font color="#54c23d">'.t_success.'</font></strong>';
  }
  if ($data_user_class == "taxi") {
    if ($val->lab_approve_job == 1) {
      $txt_lab_ap = '<span class="font-16 lab-active-shop" >พนักงานรับทราบแล้ว</span>';
    }
    else {
      $txt_lab_ap = '<span class="font-16 lab-none-active-shop" >พนักงานยังไม่รับทราบงานนี้</span>';
    }
  }
  /* if($_COOKIE[detect_userclass]=="taxi"){
    $hide_plate = "display:none;";
    $time_post_ps = "margin-top: -85px;";
    }else{
    $time_post_ps = "margin-top: -105px;";
    } */
  $time_post_ps = "margin-top: -20px;";

  $sql = "SELECT * FROM shop_type_cancel  WHERE id='".$val->cancel_type."' ";
  $query_cancel = $this->db->query($sql);
  $res_cancel = $query_cancel->row();
  ?>
  <div style="padding: 5px 0px;margin: 12px 10px;">
    <div class="box-shop" >
      <?=$txt_lab_ap;?>
      <span class="font-18"><?=date("d/m/Y",$val->post_date);?></span>
      <span class="time-post-shop-his" style="font-size:14px;<?=$time_post_ps;?>" id="txt_date_diff_<?=$val->id;?>">-</span>
      <table width="100%"  >
        <tr>
          <td width="80%" ><span class="font-17">คิงส์ พาวเวอร์ (ภูเก็ต)</span></td>
          <td width="20%" align="center" rowspan="2">
          <!--<div class="font-17" id="status_book_<?=$val->id;?>" style="margin-top: -20px;
  margin-left: -85px;
  position: absolute;
  max-width: 150px;
  width: 100%;" align="center">
            <?=$status_txt;?></div>-->
          </td>
        </tr>
        <!----------------------------------------------------------------------------------------------------------------------------->
        <?php
        if ($val->status != "CANCEL") {
          ?>
          <tr>
            <td colspan="2">
              <?php
              $data = $val;

              $query_price = $this->db->query("select * from shop_country_com_list_price_taxi where i_shop_country_com_list = '".$data->plan_id."' ");
              $num = 0;

              $display_person = "display:none";
              $display_com = "display:none";
              $display_park = "display:none";
              $park_total = 0;
              $person_total = 0;
              $com_total = 0;
              $plan = "";
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
                $txt_get_cash = "<span class='font-17' style='color: #6fab1e;;'>รับแล้ว</span>";
              }
              ?>
              <div style="padding: 0px 0px;">
                <table width="100%" class="none-pd">
                  <tr>
                    <td colspan="3"><span class="font-17">ประเภท : </span><span class="font-17" id="txt_type_plan"><?=$plan;?></span></td>        
                  </tr>
                  <tr>
                    <td colspan="3">
                      <table>
                        <tr>
                          <td style="padding: 0;"><span class="font-17">สัญชาติ</span> : </td>
                          <td style="padding: 0;">
                            <img src="<?=base_url();?>assets/images/flag/icon/<?=$res_country->s_country_code;?>.png" width="20" height="20" alt="">
                          </td>
                          <td style="padding: 0;">&nbsp;</td>
                          <td style="padding: 0;"><span class="font-17" id="txt_county_pp"><?=$res_country->s_topic_th;?></span></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr style="<?=$display_park;?>">
                    <td width="35%"><span class="font-17">ค่าจอด</span></td>
                    <td align="right"><span class="font-17" id="txt_park_total"><?=number_format($park_total,0);?> บ.</span></td>
                    <td width="20%" align="right"><?=$txt_get_cash;?></td>
                  </tr>
                  <tr style="<?=$display_person;?>">
                    <td width="35%"><span class="font-17">ค่าหัว</span></td>
                    <td align="right"><span class="font-17" id="txt_person_total"><?=$cal_person;?> = <?=number_format($person_total,0);?> บ.</span></td>
                    <td width="20%" align="right"><?=$txt_get_cash;?></td>
                  </tr>
                  <?php if ($data->transfer_money == 0) {?>
                    <tr style="<?=$display_com;?>">
                      <td width="35%"><span class="font-17">ค่าคอม</span></td>
                      <td align="right"><span class="font-17" id="txt_com_persent"><?=$com_persent;?> %</span>
                      </td>
                      <td align="right" width="20%">
                        <?=$com_progress;?>
                      </td>
                    </tr>
                    <?php
                  }
                  else {
                    if ($data->driver_approve == 0) {
                      $txt_com_status = "<span class='font-17' style='color: #f00;'>ยังไม่รับ</span>";
                    }
                    else {
                      $txt_com_status = "<span class='font-17' style='color: #6fab1e;;'>รับแล้ว</span>";
                    }
                    $query = $this->db->query('SELECT * FROM pay_history_driver_shopping where order_id = '.$data->id);
                    $data_trans_pay = $query->row();
                    ?>
                    <tr style="<?=$display_com;?>">
                      <td width="40%"><span class="font-17">ค่าคอม</span>&nbsp;<span style="color: #6fab1e;">(โอนแล้ว)</span>
                      </td>
                      <td align="right"><span class="font-17"><?=$com_persent;?> % : <?=$data_trans_pay->price_pay_driver_com;?> บ.</span>
                      </td>
                      <td align="right" width="20%">
      <?=$txt_com_status;?>
                      </td>
                    </tr>
                  <?php }
                  ?>

                </table>   	
              </div>

            </td>
          </tr>
  <?php }?>
        <!----------------------------------------------------------------------------------------------------------------------------->

        <tr style="<?=$hide_plate;?>">
          <td colspan="2" style="padding: 2px 0px;">
            <div class="font-17">ป้ายทะเบียน&nbsp;:&nbsp;<a><?=$val->car_plate." ";?></a>
            </div>
          </td>
        </tr>

        <tr>
          <td><div class="font-17">
              <?php if ($val->adult > 0) {?>
                ผู้ใหญ่ : <span id="txt_mn_adult_<?=$val->id;?>"><?=$val->adult;?></span> 
              <?php }?>
              <?php if ($val->child > 0) {?>
                เด็ก : <span id="txt_mn_child_<?=$val->id;?>"><?=$val->child;?></span></div></td>	
          <?php }
          ?>

        </tr>
        <tr>
          <td colspan="2" style="padding: 2px 0px;">
            <span class="font-17">ลงทะเบียน : <?=$val->pax_regis;?> คน</span>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <span class="font-17" >เลขจอง : <?=$val->invoice;?>            
              <?php
              $minutes_to_add = $val->airout_m;
              $time_c = date('H:i',$val->update_date); //ดึงเวลา อัพเดทเวลา ล่าสุด
              $time = new DateTime($time_c);
              $stamp = $time->format('H:i');
              $current_time = date('H:i');
              $datetime1 = new DateTime($current_time);
              $datetime2 = new DateTime($stamp);
              if ($datetime1 > $datetime2 and $data_user_class == "lab") {
                $display_time_none = "";
              }
              else {
                $display_time_none = "display:none;";
              }
              ?>
        <!--<font color="#ff0000;"  style="position: absolute;right: 15px;" id="time_toplace_<?=$val->id;?>"><?="ถึงประมาณ ".$stamp." น.";?></font>-->
            </span>
            <button class="btn btn-xs edit-post-shop" id="btn_edit_time_<?=$val->id;?>" onclick="editTimeToPlace('<?=$val->id;?>');" style="<?=$display_time_none;?>">แก้ไขเวลา</button>


          </td>

        </tr>
        <?php
        if ($val->status == "CANCEL") {
          $sql = "SELECT * FROM history_del_order_booking  WHERE order_id='".$val->id."' ";
          $query_cl = $this->db->query($sql);
          $res_cl = $query_cl->row();
          ?>
          <tr>
            <td colspan="2">
              <table width="100%">
                <tr>
                  <td>
                    <div style=" margin-top: 5px;"><b class="font-18"><font color="#ff0000">ยกเลิก<br/><?=$res_cancel->s_topic;?></font></b></div>
                  </td>
                  <td align="right">
                    <font color="#ff0000;">เวลายกเลิก <?=date('H:i',$res_cl->post_date)." น.";?></font>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        <?php }
        ?>
        <tr>
          <td colspan="2">
        <ons-button onclick="openDetailBookinghistory('<?=$key;?>', 'his', '<?=$val->invoice;?>');" style="padding: 15px;    margin-top: 5px;border: 1px solid #0076ff;
                    border-radius: 5px;
                    line-height: 0;
                    " modifier="outline" class="button-margin button button--outline button--large">&nbsp; <span class="font-17 text-cap">ตรวจสอบ</span> </ons-button>
        </td>
        </tr>
      </table>
    </div>
  </div>
  <script>
    var d1 = "<?=date('Y/m/d H:i:s',$val->post_date);?>";
  //    console.log(d1)
    var d2 = js_yyyy_mm_dd_hh_mm_ss();
  // 	console.log("<?=$val->invoice;?> : "+d1+" = "+d2);
    $('#txt_date_diff_<?=$val->id;?>').text(CheckTimeV2(d1, d2));
  </script>

  <?php
}
?>