<input type="hidden" value="<?=$balance;?>" id="balance" />
<div id="load_booking_data"  style="padding:0px; margin-top:0px;display: nones;" align="center">

</div>

<template id="alert-no-deposit-transfer.html">
  <ons-alert-dialog modifier="rowfooter" id="transfer-alert-dialog">
    <div class="alert-dialog-title">ขอภัย</div>
    <div class="alert-dialog-content">
      <span class="font-14">

        ยอดเงินคงเหลือในระบบของคุณไม่สามารถรับงานนี้ได้ กรุณาเติมเงินเข้าระบบหรือติดต่อเจ้าหน้าที่ ขอบคุณค่ะ
      </span>
    </div>
    <div class="alert-dialog-footer">
      <ons-alert-dialog-button onclick=" document.getElementById('transfer-alert-dialog').hide();">ปิด</ons-alert-dialog-button>
      <ons-alert-dialog-button onclick="gotoWallet();">เติมเงิน</ons-alert-dialog-button>
    </div>
  </ons-alert-dialog>
</template>
<script>
  var alertDeposit = function () {
    var dialog = document.getElementById('transfer-alert-dialog');

    if (dialog) {
      dialog.show();
    } else {
      ons.createElement('alert-no-deposit-transfer.html', {append: true})
              .then(function (dialog) {
                dialog.show();
              });
    }
  };

  var dataHistoryA;
  var txt_pay_cash = '';
  var txt_pay_trans = '';

  

  function selectjob(orderid, idorder, invoice, code, program, p_place, to_place, agent, airout_time, airin_time, cost, s_cost, outdate, ondate, s_status_pay, idbookcar, a, b, c, d) {
    var carid = $('#carid').val();
    var cartype = $('#cartype').val();
    console.log("Type Pay : " + s_status_pay)
    console.log(idbookcar + '**************************************' + cartype)
    if (parseInt(idbookcar) != parseInt(cartype)) {
      swal('ไม่สามารถรับงานได้', 'งานนี้ใช้' + a + b + ' ' + 'คุณใช้' + c + d, 'error');
      return;
    }
    if (cartype == '') {
      swal('กรุณาเลือกรถที่จะใช้งาน', '', 'error');
      return;
    }

    var driver = $('#driver').val();
    var finalcost = parseInt(cost) - parseInt(s_cost);
    console.log(finalcost)
    var txt_warning;
    txt_pay_cash = 'งานนี้เป็นงานที่ลูกค้าจ่ายเงินสด จำเป็นต้องหักเงินจากบัญชีในระบบ จำนวน ' + addCommas(s_cost) + ' บาท';
    txt_pay_trans = 'งานนี้แขกจ่ายเงินเข้าในระบบแล้ว' + "ยอดเงินทั้งหมดจะทำการโอนเงินทั้งหมดเข้าในกระเป๋าเงินของคุณ " + finalcost + " " + "บาท";
    if (s_status_pay == 0) {
      txt_warning = txt_pay_cash;
    } else {
      txt_warning = txt_pay_trans;
    }

    swal({
      title: "<?=t_job_confirmation;?>",
      text: txt_warning,
      type: "warning",
      confirmButtonClass: "btn-danger waves-effect waves-light",
      cancelButtonClass: "btn-cus waves-effect waves-light",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "<?=t_confirm;?>",
      cancelButtonText: "<?=t_cancelled;?>",
      closeOnConfirm: false
    },
            function () {
              var url_cja = "mod/tbooking/curl_connect_api.php?type=detect_driver_approve";
              /* check job approve */
              $.post(url_cja, {
                idorder: idorder
              }, function (res_check) {
                console.log(res_check.data.result.length);
                if (res_check.data.result.length > 0) { // check this job have driver approve ?
                  var data = {
                    "idorder": idorder,
                    "orderid": orderid,
                    "invoice": invoice,
                    "code": code,
                    "program": program,
                    "driver": driver,
                    "carid": carid,
                    "cartype": cartype,
                    "pickup_place": p_place,
                    "to_place": to_place,
                    "agent": agent,
                    "airout_time": airout_time,
                    "airin_time": airin_time,
                    "cost": cost,
                    "s_cost": s_cost,
                    "outdate": outdate,
                    "ondate": ondate
                  };
                  var url = "mod/tbooking/curl_connect_api.php?type=getjob_booking";
                  var bank_account = "Goldenbeach Tour";
                  var deposit_bank = "กสิกรไทย";
                  var bank_number = "909-609-6699";
                  var deposit_date = "<?=date('Y-m-d');?>";
                  var deposit_time = "<?=date('H:m');?>";
                  var username = '<?=$_SESSION["data_user_name"];?>';
                  var deposit = s_cost;
                  var his_ap = {
                    driver: driver,
                    idorder: idorder,
                    username: username,
                    deposit: deposit,
                    deposit_date: deposit_time,
                    type: "APPROVEJOB",
                    deposit_bank: deposit_bank,
                    bank_account: bank_account,
                    bank_number: bank_number,
                    deposit_date: deposit_date,
                    deposit_time: deposit_time,
                    post_date: '<?=time();?>',
                    post_date_f: deposit_date
                  };
                  console.log(data);

                  $.post(url, data, function (res) {
                    console.log(res);

                    if (res.status == "200") {
                      if (s_status_pay == 0) { // Pay Cash
                        $.post("mod/tbooking/curl_connect_api.php?type=php_approve_job", his_ap, function (logdata) {
                          swal("<?=t_success;?>!", "<?=t_press_button_close;?>", "success");
                          hideDetail();
                          historyTransfer();
                          console.log(logdata);
                          getTansferJobNumber("<?=$user_id;?>", "<?=date('Y-m-d');?>")
                        });
                      } else {

                        // Pay Transfer bank


                        hideDetail();
                        historyTransfer();
                        swal("<?=t_success;?>!", "<?=t_press_button_close;?>", "success");
                        //});
                      }
                    } else {
                      swal("<?=t_error;?>!", "<?=t_press_button_close;?>", "error");
                    }
                  });
                } else {
                  swal('ไม่สามารถรับงานได้', 'งานนี้มีคนขับคนอื่นรับงานแล้ว', 'error');
                  hideDetail();
                }
              });
            });
  }

</script>