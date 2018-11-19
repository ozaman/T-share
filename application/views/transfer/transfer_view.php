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

<template id="confirm_get_job.html">
  <ons-alert-dialog modifier="rowfooter" id="confirm_get_job-dialog">
    <div class="alert-dialog-title">คุณแน่ใจหรือไม่?</div>
    <div class="alert-dialog-content">
      <div>
        <span class="font-14" id="txt_content_get_trans"> </span>
      </div>
      <span class="font-14">
        ต้องการรับงานนี้?
      </span>
    </div>

    <div class="alert-dialog-footer">
      <ons-alert-dialog-button onclick=" document.getElementById('confirm_get_job-dialog').hide();">ยกเลิก</ons-alert-dialog-button>
      <ons-alert-dialog-button onclick="confirmGetJobTrans();"><b>รับงาน</b></ons-alert-dialog-button>
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


</script>