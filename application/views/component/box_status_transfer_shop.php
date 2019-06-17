<?php
$query = $this->db->query("select driver_approve,id,bank_taxi_id, driver_complete, invoice from ".TBL_ORDER_BOOKING." where id = ".$_GET[order_id]);
$data = $query->row();

$query_bank = $this->db->query("SELECT t1.*,t2.name_th as bank_list, t2.img as bank_img FROM ".TBL_WEB_BANK_DRIVER." as t1 left join web_bank_list as t2 on t1.bank_id = t2.id where t1.id = '".$data->bank_taxi_id."' ");
$data_bank = $query_bank->row();
$count_bn = strlen($data_bank->bank_number) - 3;
//echo $count_bn;
for ($i = 0; $i < $count_bn; $i++) {
  $xxx .= "x";
}
$txt_bank_num = $xxx."".substr($data_bank->bank_number,-3);
//echo strlen($txt_bank_num)." || ".strlen($data_bank->bank_number);
//echo $xxx;
//exit();


$this->db->select('id');
$_where = array();
$_where[i_order_booking] = $data->id;
$chk_log = $this->db->get_where(TBL_COM_ORDER_BOOKING_LOGS,$_where);
$num_log = $chk_log->num_rows();
if ($num_log > 0) {
  $tbl_com_booking = TBL_COM_ORDER_BOOKING_LOGS;
}
else {
  $tbl_com_booking = TBL_COM_ORDER_BOOKING;
}
$this->db->select('*');
$_where[i_type_pay] = 2;
$query_cod = $this->db->get_where($tbl_com_booking,$_where);
foreach ($query_cod->result() as $key => $val) {
  $this->db->select('s_topic');
  $_where = array();
  $_where[id] = $val->i_plan_main;
  $query_plan_main = $this->db->get_where(TBL_PLAN_MAIN,$_where);
  $plan_main = $query_plan_main->row();

  $txt_topic_head .= $plan_main->s_topic;
}


$query = $this->db->query('SELECT * FROM '.TBL_PAY_HIS_DRIVER_SHOPPING.' where order_id = '.$data->id);
$check_trans_pay = $query->num_rows();
if ($check_trans_pay > 0) {
  $data_trans_pay = $query->row();
  $icons_p = "yes.png?v=".time();
  $class_status = "step-booking-active";
  $time_status = '<div class="font-16"><i class="fa fa-clock-o fa-spin 6x" style="color:#88B34D"></i><span> เวลา '.date('H:i',$data_trans_pay->last_update).' น.</span></div>';
  $title_pay = "โอน".$txt_topic_head."แล้ว";
}
else {
  $icons_p = "no.png?v=".time();
  $class_status = "step-booking";
  $time_status = '<i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i><strong><font color="#FF0000"> รอดำเนินการ</font></strong>';

  $title_pay = "รอโอน".$txt_topic_head;
}
$btn_pay_com_color = "background-color:#666666";
$query = $this->db->query("select id from ".TBL_COM_ORDER_BOOKING_LOGS." where i_order_booking = ".$data->id);
$check_change_plan = $query->num_rows();
?>
<td class="font-16">
  <div class="div-all-checkin">
    <table width="100%" border="0" cellspacing="2" cellpadding="0">
      <tbody>
        <tr>
          <td width="50" rowspan="2">
            <div class="<?=$class_status;?>" id="number_driver_pay_com">5</div>
            <div style="position:absolute; margin-top:-40px; margin-left: -5px;">
              <img src="<?=base_url();?>assets/images/<?=$icons_p;?>" align="absmiddle" id="iconchk_driver_pay_com"></div>
          </td>
          <td colspan="2">
            <button id="btn_driver_pay_com" onclick="btn_driver_pay_com('<?=$arr[book][id];?>')" type="button" class="btn  btn-info " style="width:100%;text-align:left;padding:5px; <?=$btn_pay_com_color;?>;  border-radius:  20px; border:none;color: #fff;">
              <span class="font-20 text-cap"><i class="icon-new-uniF121-10" style="width:10px;"></i> 
                <span id="txt_btn_driver_pay_com"><?=$title_pay;?></span></span></button>
          </td>
        </tr>
        <tr>
      <input type="hidden" value="<?=$arr[book][check_driver_pay_com];?>" id="driver_pay_com_check_click">
      <td style="height:30px;">
        <div id="status_driver_pay_com">
          <div class="font-16">
            <?=$time_status;?>
          </div>
        </div>
      </td>
      <td width="30" id="pm_guest_driver_pay_com" style="display: none;">
        <table width="100%">
          <tbody>
            <tr>
              <td>

              </td>
              <td>
                <i id="photo_driver_pay_com_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
                <i id="photo_driver_pay_com_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="viewPhotoShop('<?=$arr[book][id];?>', 'driver_pay_com', '<?=$arr[book][driver_pay_com_date];?>');">photo_camera</i>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
      </tr>
      <?php
      if ($_COOKIE[detect_userclass] == "taxi" && $check_change_plan > 0 && $data->bank_taxi_id == 0) {
        ?>
        <tr>  
          <td colspan="2">
            <span class="font-17">มีการเปลี่ยนแปลงค่าตอบแทน</span>
            <div style="padding: 0px 0px;">
              <ons-list-header class="list-header">เลือกบัญชีรับเงิน</ons-list-header>

              <?php
              $sql = "SELECT t1.*,t2.name_th as bank_list, t2.img as bank_img FROM web_bank_driver as t1 left join web_bank_list as t2 on t1.bank_id = t2.id where t1.status = 1 and driver_id = '".$_COOKIE[detect_user]."' order by status_often desc, status desc ";
              $query_bank = $this->db->query($sql);
              $num_bank = $query_bank->num_rows();
              if ($num_bank <= 0) {
                ?>
                <div style="padding: 10px;"><span class="font-18">คุณไม่มีบัญชี</span> <button type="button" onclick="addBank('shop_wait_trans');" class="button" style="padding: 0px 7px;background-color: #42a774;"><span class="font-17">เพิ่มบัญชี</span></button></div>
                <?php
              }
              else {
                foreach ($query_bank->result() as $row) {
                  if ($row->status_often == 1) {
                    $select = "checked";
                  }
                  else {
                    $select = "";
                  }
                  ?>
                  <form id="select_bank_form">
                    <ons-list-item tappable onclick="">
                      <label class="left">
                        <ons-radio class="radio-fruit" input-id="radio-<?=$row->id;?>" value="<?=$row->id;?>" name="bank_user_select" <?=$select;?>></ons-radio>
                      </label>
                      <label for="radio-<?=$row->id;?>" class="center">
                        <table width="100%">
                          <tr>
                            <td width="30"><img src="assets/images/bank/<?=$row->bank_img;?>" class="logo-bank" style="width: 20px;"></td>
                            <td width="100"><span class="font-16"><?=$row->bank_list;?></span></td>
                            <td><span class="font-16"><?=$row->bank_number;?></span></td>
                          </tr>
                        </table>
                      </label>
                    </ons-list-item>
                    <?php
                  }
                  ?>
                </form>
                <ons-button type="button" onclick="_confirmSelectBankAfterChangePlan('<?=$data->id;?>');$(this).attr('disabled', 'disabled');" style="margin: 5px;  background-color: #fff;  color: #f00; border: 1px solid #f00;width: 100%;text-align: center;">ยืนยันบัญชีรับเงิน</ons-button>
              <?php }?>
            </div>
          </td>
        </tr> 
        <?php
      }
      else {
        ?>

        <tr>

          <?php if ($data->bank_taxi_id == 0) {
            ?>
            <!--<td></td>-->
            <td colspan="2">
              <div style="padding: 5px;">
                <ons-list-header class="list-header" style="">สถานะโอนเงิน</ons-list-header>
                <table width="100%">
                  <tr>
                    <td width="50px"></td>
                    <td>
                      <div class="font-16">
                        <i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i><strong>
                          <font color="#FF0000"> รอแท็กซี่เลือกบัญชีรับเงิน</font></strong>          
                      </div>
                    </td>
                  </tr>
                </table>
                
              </div>
            </td>
            <?php
          }
          else {
            ?>
            <td colspan="2">
              <div style="padding: 5px;">
                <ons-list-header class="list-header" style="">ธนาคารรับเงิน</ons-list-header>   

                <table width="100%">
                  <tr>
                    <td width="35%"><span class="font-16">ธนาคาร</span></td>
                    <td>
                      <table>
                        <tr>
                          <td><img src="assets/images/bank/<?=$data_bank->bank_img;?>" style="width:25px;" /></td>
                          <td width="5"></td>
                          <td><span class="font-16"><?=$data_bank->bank_list;?></span></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td>ชื่อบัญชี</td>
                    <td><?=$data_bank->bank_name;?></td>
                  </tr>
                  <tr>
                    <td>เลขบัญชี</td>
                    <td><?=$txt_bank_num;?></td>
                  </tr>
                </table>
              </div>
            </td>
          <?php }?>

        </tr>

        <tr>
          <td colspan="2">
            <div style="padding: 5px;">
              <ons-list-header class="list-header" style="">สถานะโอนเงิน</ons-list-header>   
              <?php if ($check_trans_pay > 0) {?>
                <table width="100%">
                  <tr>
                    <td width="35%"><span class="font-16">สถานะ</span></td>
                    <td><span class="font-16"><i class="fa fa-check" style="color: #59aa47;"></i> โอนเงินแล้ว</span></td>
                  </tr>
                  <tr>
                    <td><span class="font-16">จำนวน</span></td>
                    <td><span class="font-16"><?=$data_trans_pay->price_pay_driver_com." บ.";?></span></td>
                  </tr>
                  <tr>
                    <td><span class="font-16">เวลา</span></td>
                    <td><span class="font-16"><?=date('Y-m-d',$data_trans_pay->last_update)." ".$data_trans_pay->trans_hh.":".$data_trans_pay->trans_mm." น.";?></span></td>
                  </tr>
                  <tr>
                    <td><span class="font-16">สลิปโอนเงิน</span></td>
                    <td>
                      <i id="slip_trans_shop" class="material-icons" 
                         style="color: rgb(59, 89, 152); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(59, 89, 152); display: nones;" 
                         onclick="photo_to_viewer(this)" 
                         data-high-res-src="../data/fileupload/doc_pay_driver/slip/slip_<?=$data->id.".jpg?v=".time();?>">
                        insert_photo</i>
                    </td>
                  </tr>
                  <?php if ($data->driver_approve == 0 && $_COOKIE[detect_userclass] == "taxi") {?>
                    <tr>
                      <td align="center" colspan="2">

                    <ons-button id="get_trans_com_<?=$data->id;?>" type="button" onclick="confirmGetTransCom('<?=$data->id;?>', '<?=$data->invoice;?>');" style="width: 100%;  padding: 2px;"><span class="font-16">ยืนยันรับเงินค่าคอมมิชชั่น</span></ons-button>
                    </td>
                    </tr>
                  <?php }
                  ?>
                </table>
                <?php
              }
              else {
                ?>
                <table width="100%">
                  <tr>
                    <td width="35%"><span class="font-16">สถานะ</span></td>
                    <td><span class="font-16" style="color:#FF0000;"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> รอโอนเงิน</span></td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <span class="font-16">&nbsp; จะโอนเงินไม่เกินวันพรุ่งนี้เวลา 18.00 น. หากติดวันเสาร์อาทิตย์ หรือวันหยุดนักขัตฤกษ์ จะทำการโอนในวันถัดไป</span>
                    </td>
                  </tr>
                </table>
              <?php }
              ?>
            </div>
          </td>
        </tr>   
      <?php }
      ?>
      </tbody>
    </table>  

  </div>
</td>