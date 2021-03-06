<div style="height: 200px; padding: 1px 0 0 0;margin-bottom: 10px;">
  <form name="form_recovery" id="form_recovery"  enctype="multipart/form-data">
  <!--<input type="text" id="text"  value="555"/>-->
    <ons-card class="card">
      <div style="" align="center">
        <ons-icon icon="fa-lock" style="font-size: 56px;" class="list-item__icon ons-icon"></ons-icon>
      </div>
      <div style="padding: 0px 20px;">
        <span>กรอกชื่อผู้ใช้ เบอร์โทรศัพท์ หรืออีเมลของบัญชีที่ต้องการกู้รหัสผ่าน</span>
      </div>
      <ons-list-item class="input-items" style="padding-left: 0;">

        <label class="center">
          <input  id="username_for_rcv" type="text" value="<?=$_COOKIE[app_remember_user];?>" onkeyup="getPhoneByUser(this.value);" name="real_username" />
          <i id="corrent-user" class="fa fa-check-circle pass" aria-hidden="true" style="display: none;"></i>
        </label>
      </ons-list-item>  
      <div align="center" id="box_not_found" style="display: none;margin: 10px;"><b style="color:#dc3545;">ไม่พบผู้ใช้</b></div>
      <div id="box_show_pf_rcv" style="display: none; margin: 10px;" align="center">
        <span id="txt_name_rcv"></span>
        <div style="margin: 10px 0px;">
          <img src="<?=base_url();?>assets/images/noimage_2.gif" style="height: 150px;border: 1px solid #eee;box-shadow: 1px 1px 5px #9E9E9E;" />
        </div>
      </div>      
      <div id="box-channel" style="display: none;">
        <ons-list-header style="margin-top: 10px;">เลือกช่องทางการรับรหัสผ่าน</ons-list-header>
        <ons-list-item tappable>
          <label class="left">
            <ons-checkbox class="checkbox-color rcp" input-id="checkbox-0" value="Red" onclick="selectTypeRcp(0);"></ons-checkbox>
          </label>
          <label class="center" for="checkbox-0">
            <img src="assets/images/social_icon/sms.png" style="width: 30px;margin-right: 9px;  margin-left: 1px;"> SMS (ส่งข้อความ)
          </label>

        </ons-list-item>
        <div style="padding: 10px;display: none;" id="box_us_phone">
          <span>เบอร์โทร</span>&nbsp;&nbsp;
          <span id="txt_phone_show"></span>
          <ons-input id="us_phone" float maxlength="20" value="" type="hidden"></ons-input>
        </div>
        <ons-list-item tappable id="box-email">
          <label class="left">
            <ons-checkbox class="checkbox-color rcp" input-id="checkbox-1" value="Green"  onclick="selectTypeRcp(1);" ></ons-checkbox>
          </label>
          <label class="center" for="checkbox-1">
            <i class="material-icons" style="font-size: 30px;color: #424242;padding-right: 10px;">email</i> อีเมล
          </label>
        </ons-list-item>
        <div style="padding: 10px;display: none;" id="box_us_mail">
          <span>อีเมล</span>&nbsp;&nbsp;
          <span id="txt_email_show"></span>
          <ons-input id="us_email" float maxlength="20" value="" type="hidden"></ons-input>
        </div>
<!--
        <ons-list-item tappable id="box-line" >
          <label class="left">
            <ons-checkbox class="checkbox-color rcp" input-id="checkbox-2" value="Green"  onclick="selectTypeRcp(2);" ></ons-checkbox>
          </label>
          <label class="center" for="checkbox-2">
            <img src="assets/images/social_icon/line.png" style="width: 34px;margin-right: 10px;  margin-left: -2px;"> Line 
          </label>
        </ons-list-item>
        <div style="padding: 10px;display: none;" id="box_us_line">
          <span>Line</span>&nbsp;&nbsp;
          <span id="txt_line_show"></span>
          <ons-input id="us_line" float maxlength="20" value="" type="hidden"></ons-input>
        </div>-->
        
        <input type="hidden" value="-1" id="check_type_rcp" />
      </div>

      <div id="enter_pass_box" style="display: none;">
        <ons-list-item class="input-items" style="padding-left: 0;border: 1px solid #ff0000;" >
          <label class="center">
            <input  id="pass_recovery_check" type="text" value="" placeholder="กรอกรหัสผ่าน" name="real_password" style="width: 100%;font-size: 24px;padding: 0px 10px;" />
          </label>
        </ons-list-item>  
        <div align="center" style="margin-top: 10px;">
          <button type="button" class="button" style="border: 1px solid #0076ff;color: #0076ff; background-color: #fff;" onclick="submitLogin('form_recovery');">เข้าสู่ระบบ</button>
        </div>

      </div>
    </ons-card>
  </form>
  <div style="margin: 15px 10px;    margin-bottom: 40px;">
    <ons-button id="btn_get_pass" modifier="outline" class="button-margin button button--outline button--large" onclick="submitRecoveryPassword();" style="background-color: #fff;" >
      <span id="txt_btn_rcv">รับรหัสผ่าน</span>
    </ons-button>
    <ons-button  id="btn_get_pass_again" modifier="outline" class="button-margin button button--outline button--large" onclick="getPasswordAgain();" style="background-color: #fff;display: none;" >
      <span id="txt_btn_rcv">รับรหัสผ่านใหม่</span>
    </ons-button>
  </div>
</div>

<script>
  function selectTypeRcp(id) {

    if (id == 0) {
      $('#box_us_phone').show();
      $('#box_us_mail').hide();
      $('#box_us_line').hide();
      $('#txt_btn_rcv').text("รับรหัสผ่านทาง SMS");
    } else if(id ==1 ) {
      $('#txt_btn_rcv').text("รับรหัสผ่านทาง Email");
      if ($('#us_email').val() == "") {
        $('.rcp').prop('checked', false);
        /*ons.notification.alert({message: 'ชื่อผู้ใช้นี้ ไม่ได้ใส่ข้อมูลอีเมล ไม่สามารถเลือกได้',title:"สำเร็จ",buttonLabel:"ปิด"})
         .then(function() {
         
         });*/
        $('#box-email').hide();
        return;
      }
      $('#box_us_phone').hide();
      $('#box_us_line').hide();
      $('#box_us_mail').show();
    }
    else if(id ==2 ) {
      $('#txt_btn_rcv').text("รับรหัสผ่านทาง Line");
      if ($('#us_line').val() == "") {
        $('.rcp').prop('checked', false);
        /*ons.notification.alert({message: 'ชื่อผู้ใช้นี้ ไม่ได้ใส่ข้อมูลอีเมล ไม่สามารถเลือกได้',title:"สำเร็จ",buttonLabel:"ปิด"})
         .then(function() {
         
         });*/
        $('#box-line').hide();
        return;
      }
      $('#box_us_phone').hide();
      $('#box_us_mail').hide();
      $('#box_us_line').show();
    }
    $('.rcp').prop('checked', false);
    $('#checkbox-' + id).prop('checked', true);
    $('#check_type_rcp').val(id);
  }

  function getPasswordAgain() {
    $('#btn_get_pass_again').hide();
    $('#btn_get_pass').show();

    $('#enter_pass_box').hide();
    $('#box-channel').show();
  }
</script>