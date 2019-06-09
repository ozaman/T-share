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
//echo "<pre>";
//print_r($_GET[id]);
//echo "</pre>";
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
    <table width="100%" border="0" cellspacing="2" cellpadding="0">
      <tbody>
        <tr>
          <td width="50" rowspan="2">
            <div class="<?=$class_step;?>" id="number_driver_pay_com">4</div>
            <div style="position:absolute; margin-top:-40px; margin-left: -5px;">
              <img src="<?=base_url();?>assets/images/<?=$img_st;?>" align="absmiddle" 
                   id="iconchk_confirm_pay_com"></div>
          </td>
          <td colspan="2">


            <?php
            if ($_COOKIE[detect_userclass] == "taxi") {



              if ($data->check_lab_pay == 0) {
                $status_lab_pay = "display:none;";
                $status_lab_pay_wait = "";
                $btn_confirm_taxi = "display:none;";
              }
              else {
                $status_lab_pay = "";
                $btn_confirm_taxi = "";
                $status_lab_pay_wait = "display:none;";
              }

              if ($data->check_driver_pay == 0) {
                $status_taxi_ap = "display:none;";
              }
              else {
                $status_taxi_ap = "";
                $btn_confirm_taxi = "display:none;";
              }
              ?>
              <div class="font-16" style="<?=$status_lab_pay_wait;?>">
                <i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">
                  รอพนักงานยืนยันจ่ายเงิน</font></strong>
              </div>
              <!--<div id="status_pay_<?=$data->id;?>" style="<?=$status_lab_pay;?>">
                 <b class="font-16" style="color: #0076ff;">ยืนยันจ่ายเงิน เวลา <span id="text_lab_pay_time_<?=$data->id;?>"><?=date('H:i',$data->driver_payment_date);?></span> น.</b>
                 </div>-->
              <div id="status_get_<?=$data->id;?>" style="<?=$status_taxi_ap;?>">
                <b class="font-16" style="color: #59AA47;">ยืนยันรับเงิน เวลา <span id="text_confirm_date_<?=$data->id;?>"><?=date('H:i',$data->driver_pay_report_date)." น.";?></span></b>
              </div>
        <ons-button class="red-blink" id="btn_confirm_get_<?=$data->id;?>" onclick="confirmGetIncome('<?=$data->id;?>', '<?=$data->invoice;?>', '<?=$data->drivername;?>');" style="width: 100%; text-align: center;border-radius: 25px; margin-top: 0px;background-color: #fff;<?=$btn_confirm_taxi;?>" modifier="outline" class="button-margin button button--outline button--large"><span class="font-17">ยืนยันการรับเงิน</span> </ons-button>
        <?php
      }
      else {

        if ($data->check_lab_pay == 0) {
          $status_lab_pay = "display:none;";
          $btn_confirm_lab = "";
        }
        else {
          $status_lab_pay = "";
          $btn_confirm_lab = "display:none;";
        }

        if ($data->check_driver_pay == 0) {
          $txt_taxi_get = "display:none;";
          $status_taxi_wait = "";
        }
        else {
          $txt_taxi_get = "";
          $status_taxi_wait = "display:none;";
        }

        if ($data->check_lab_pay == 0 and $data->check_driver_pay == 0) {
          $status_taxi_wait = "display:none;";
        }
        ?>

        <ons-button class="red-blink" id="confirm_lab_pay_<?=$data->id;?>" onclick="confirmPayIncome('<?=$data->id;?>', '<?=$data->invoice;?>', '<?=$data->drivername;?>');" style="width: 100%; text-align: center;border-radius: 25px;margin-top: 0px;background-color: #fff;<?=$btn_confirm_lab;?>" modifier="outline" class="button-margin button button--outline button--large"><span class="font-17">ยืนยันการจ่ายเงิน</span> </ons-button>

        <div id="status_pay_<?=$data->id;?>" style="<?=$status_lab_pay;?>">
          <b class="font-16" style="color: #0076ff;">ยืนยันการจ่ายเงิน เวลา <span id="text_lab_pay_time_<?=$data->id;?>"><?=date('H:i',$data->driver_payment_date)." น.";?></span></b>
        </div>

          <!--<div id="status_taxi_get_<?=$data->id;?>" style="<?=$txt_taxi_get;?>">
              <b class="font-16" style="color: #59AA47;">ยืนยันรับเงิน เวลา <span><?=date('H:i',$data->driver_pay_report_date);?></span> น.</b>
          </div>-->

        <div class="font-16" id="txt_status_getpay_<?=$data->id;?>" style="<?=$status_taxi_wait;?>">
          <i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">
            รอคนขับยืนยันรับเงิน</font></strong></div>

      <?php }?>
      </td>
      </tr>
      </tbody>
    </table>  
  </div>
</td>