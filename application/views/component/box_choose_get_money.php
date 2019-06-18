<style>
  @keyframes blink { 
    50% { 
      border-color: #ff0000; 
      color : #ff0000;   } 
  }
  .red-blink{ /*or other element you want*/
    animation-name: blink ;
    animation-duration: .5s ;
    animation-timing-function: step-end ;
    animation-iteration-count: infinite ;
    animation-direction: alternate ;

  }
</style>

<?php
$data = $this->Main_model->rowdata(TBL_ORDER_BOOKING,array('id' => $_GET[id]),array('*'));
if ($data->check_driver_pay == 0) {
  $class_step = "step-booking";
  $img_st = "no.png";
}
else {
  $class_step = "step-booking-active";
  $img_st = "yes.png";
}
?>
<td class="font-16">
  <div class="div-all-checkin">
    <div style="padding: 5px 10px">

      <?php if ($_COOKIE[detect_userclass] == "taxi") {?>
        <ons-list-header class="list-header"> เลือกช่องทางรับเงิน</ons-list-header>
        <?php
//        echo $data->i_select_type_pay ;
        if ($data->i_select_type_pay <= 0) {
          ?>

          <div id="list-choose-div">
            <?php
            $_where = array();
            $_where[i_status] = 1;
            $type_pay = $this->Main_model->fetch_data("","",TBL_PAY_TYPE,$_where,array('*'),"");
            foreach ($type_pay as $key => $value) {
              ?>
              <ons-list-item tappable onclick="showhideSelectBankCGM(<?=$value->id;?>);">
                <label class="left" style="    padding-left: 5px;">
                  <ons-radio input-id="radio-type-<?=$value->id;?>" name="choose_get_money_radio" value="<?=$value->id;?>"></ons-radio>
                </label>
                <label for="radio-type-<?=$value->id;?>" class="center">
                  <?=$value->s_topic;?>
                </label>
              </ons-list-item> 
            <?php }
            ?>
            <div id="box_load_select_bank">
              
            </div>
            <ons-button modifier="outline" class="button-margin button button--outline button--large" type="button"
                        onclick="confirmChooseGetMoney(<?=$data->id;?>);" style="background-color: #fff;padding: 0px 4px;">
              ยืนยัน
            </ons-button>
          </div>


          <?php
        }
        else {
          $this->db->select('id');
          $_where = array();
          $_where[i_order_booking] = $_POST[order_id];
          $chk_log = $this->db->get_where(TBL_COM_ORDER_BOOKING_LOGS,$_where);
          $num_log = $chk_log->num_rows();
          if ($num_log > 0) {
            $tbl_com_booking = TBL_COM_ORDER_BOOKING_LOGS;
          }
          else {
            $tbl_com_booking = TBL_COM_ORDER_BOOKING;
          }
          $this->db->select('i_type_pay');
          $_where = array();
          $_where[i_order_booking] = $data->id;
          $query_order = $this->db->get_where($tbl_com_booking,$_where);
          $arr = $query_order->row();
          echo $arr->i_type_pay." +++";
          if ($arr->i_type_pay == 1) {
            ?>
            <div id="choose-cash-div" style="padding: 5px;">
              <span class="font-16">รับเงินสด</span>
            </div>
            <?php
          }
          else {
            ?>
            <div id="choose-cash-div" style="padding: 5px;">
              <span class="font-16">โอนเงิน</span>
            </div>
            <?php
          }
        }
      }
      else if ($_COOKIE[detect_userclass] == "lab") {
        ?>
        <div class="font-16" style="padding: 5px 10px">
          <ons-list-header class="list-header"> แท็กซี่เลือกช่องทางรับเงิน</ons-list-header>
          <?php
//          echo $data->i_select_type_pay." +++";
          if ($data->i_select_type_pay <= 0) {
            ?>
            <i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">
              รอแท็กซี่เลือกช่องทางรับเงิน</font></strong>
            <?php
          }
          else {
            $this->db->select('id');
            $_where = array();
            $_where[i_order_booking] = $_POST[order_id];
            $chk_log = $this->db->get_where(TBL_COM_ORDER_BOOKING_LOGS,$_where);
            $num_log = $chk_log->num_rows();
            if ($num_log > 0) {
              $tbl_com_booking = TBL_COM_ORDER_BOOKING_LOGS;
            }
            else {
              $tbl_com_booking = TBL_COM_ORDER_BOOKING;
            }
            $this->db->select('i_type_pay');
            $_where = array();
            $_where[i_order_booking] = $data->id;
            $query_order = $this->db->get_where($tbl_com_booking,$_where);
            $arr = $query_order->row();
            if ($arr->i_type_pay == 1) {
              ?>
              <div id="choose-cash-div" style="padding: 5px;">
                <span class="font-16">รับเงินสด</span>
              </div>
              <?php
            }
            else {
              ?>
              <div id="choose-cash-div" style="padding: 5px;">
                <span class="font-16">โอนเงิน</span>
              </div>
              <?php
            }
          }
          ?>
        </div>
        <?php
      }
      ?>

    </div>
  </div>
</td>