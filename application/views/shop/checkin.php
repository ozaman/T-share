<?php
if ($_COOKIE[detect_userclass] == "taxi") {
  $txt_wait_topoint = 'รอดำเนินการ';

  $title_topoint = "แจ้งถึงสถานที่";

  $title_guest_receive = "รอพนักงานรับแขก";
  $txt_wait_guest_receive = 'รอพนักงานยืนยันรับแขก';


  $title_guest_regis = "รอยืนยันลงทะเบียน";
  $txt_wait_guest_register = 'รอยืนยันแขกลงลงทะเบียน';

  $title_pay = "รอโอนค่าคอมมิชชั่น";

  $title_confirm = "ยืนยันรับเงิน";

  $btn_topoint_color = "background-color:#3b5998";
  $btn_guest_receive_color = "background-color:#666666";
  $btn_guest_register_color = "background-color:#666666";
  $btn_pay_com_color = "background-color:#666666";
  $btn_confirm_color = "background-color:#3b5998";
}
else {
  $title_topoint = "รอคนขับแจ้งถึงสถานที่";
  $title_guest_receive = "ยืนยันรับแขก";
  $title_guest_regis = "ยืนยันลงทะเบียน";
  $title_pay = "รอโอนค่าคอมมิชชั่น";
  $title_confirm = "ยืนยันจ่ายเงิน";
  $txt_wait_topoint = 'รอคนขับแจ้งถึงสถานที่';
  $txt_wait_guest_receive = 'รอยืนยันรับแขก';
  $txt_wait_guest_register = 'รอดำเนินการ';
  $txt_wait_pay_report = 'รอดำเนินการ';






  $btn_topoint_color = "background-color:#666666";
  $btn_guest_receive_color = "background-color:#3b5998";
  $btn_guest_register_color = "background-color:#3b5998";
  $btn_confirm_color = "background-color:#3b5998";
  $btn_pay_com_color = "background-color:#666666";
}
?>
<div style="padding: 5px 0px;">
  <ons-list-header class="list-header"> ข้อมูลการเช็คอิน คนขับ</ons-list-header>

        <!-- <span class="text-cap font-20"> ข้อมูลการเช็คอิน คนขับ</span> -->
  <div class="div-all-checkin">
    <table width="100%" border="0" cellspacing="2" cellpadding="0" class=" border-alert" id="box_driver_topoint">
      <tbody>
        <tr>
          <td width="50" rowspan="2">
            <div class="step-booking" id="number_driver_topoint">1</div>
            <div style="position:absolute; margin-top:-40px; margin-left: -5px;">
              <img src="<?=base_url();?>assets/images/no.png" align="absmiddle" id="iconchk_driver_topoint">
            </div>
          </td>
          <td colspan="2">
            <button id="btn_driver_topoint" onclick="btn_driver_topoint('<?=$arr[book][id];?>')" type="button" class="btn  btn-info " style="width:100%;text-align:left;padding:5px; <?=$btn_topoint_color;?>;  border-radius: 20px; border:none;color: #fff; "><span class="font-20 text-cap"><i class="icon-new-uniF12D-1" style="width:10px;"></i>  
                <span id="txt_btn_driver_topoint"><?=$title_topoint;?></span></span></button>
          </td>
        </tr>
        <tr>
          <td style="height:30px;">
            <div id="status_driver_topoint">
              <div class="font-16">
                <i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000"><?=$txt_wait_topoint;?></font></strong>
              </div>
            </div>
          </td>
          <td width="30" id="pm_driver_topoint" style="display: none;">
            <table width="100%">
              <tbody>
                <tr>
                  <?php if ($_COOKIE[detect_userclass] == "lab") {?>
                    <td>
                      <i id="driver_topoint_pf" class="material-icons" style="color: rgb(59, 89, 152); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(59, 89, 152); display: nones;" onclick="modalShowImg('../data/pic/driver/small/<?=$res_dv->username;?>.jpg', '<?=$name_dv;?>');">account_circle</i>
                    </td>
                    <td>
                      <a href="tel:<?=$arr[book][phone];?>"><i id="driver_topoint_pf" 
                                                               class="material-icons" style="color: rgb(89, 170, 71); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(89, 170, 71); display: nones;">phone</i></a>
                    </td>
                  <?php }
                  ?>
 <!--<td>
    <i id="driver_topoint_locat_off" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">location_on</i>
    <i id="driver_topoint_locat_on" onclick="openPointMaps('driver_topoint','<?=$arr[book][id];?>');" class="material-icons" style="color: rgb(59, 89, 152); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(59, 89, 152); display: none;">location_on</i>
 </td>
 <td>
    <i id="photo_driver_topoint_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
    <i id="photo_driver_topoint_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="viewPhotoShop('<?=$arr[book][id];?>','driver_topoint','<?=$arr[book][driver_topoint_date];?>');">photo_camera</i>
   
 </td>-->
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <?php if ($arr[book][check_driver_topoint] <= 0 and $_COOKIE[detect_userclass] == "lab") {?>
          <tr>
            <td></td>
            <td colspan="2">
        <ons-button style="margin: 10px 0px;" modifier="large" class="font-17 button button--large" 
                    onclick="btn_driver_topoint('<?=$arr[book][id];?>')" id="btn-topoint-lab" >คนขับถึงสถานที่</ons-button>
        </td>
        </tr>
      <?php }
      ?>

      </tbody>
    </table>
    <input type="hidden" value="<?=$arr[book][driver_topoint];?>" id="driver_topoint_check_click">
    <input type="hidden" id="check_code" value="<?=$arr[book][id];?>">
  </div>
</div>
<div style="width: 100%;height: 5px;background-color: #ddd ;margin: 10px 0px;" ></div>
<div style="padding: 5px 0px;">
  <ons-list-header class="list-header"> ข้อมูลการเช็คอิน พนักงาน</ons-list-header>
  <table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="1">
    <tbody>
      <tr id="step_guest_receive" style="display:none">
        <td class="font-16">
          <div class="div-all-checkin">
            <table width="100%" border="0" cellspacing="2" cellpadding="0" class="" id="box_guest_receive">
              <tbody>
                <tr>
                  <td width="50" rowspan="2">
                    <div class="step-booking" id="number_guest_receive">2</div>
                    <div style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="<?=base_url();?>assets/images/no.png" align="absmiddle" id="iconchk_guest_receive"></div>
                  </td>
                  <td colspan="2">
                    <button id="btn_guest_receive" onclick="btn_guest_receive('<?=$arr[book][id];?>')" type="button" class="btn  btn-info " style="width:100%;text-align:left;padding:5px; <?=$btn_guest_receive_color;?>;  border-radius: 20px; border:none;color: #fff; ">
                      <span class="font-20 text-cap">
                        <i class="icon-new-uniF159-5" style="width:10px;"></i>   
                      </span>
                      <span  class="font-20 text-cap" id="txt_btn_guest_receive"><?=$title_guest_receive;?></span>
                    </button>
                    <input type="hidden" value="<?=$arr[book][check_guest_receive];?>" id="guest_receive_check_click">

                  </td>
                </tr>
                <tr>
                  <td style="height:30px;">
                    <div id="status_guest_receive">
                      <div class="font-16">
                        <i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> 
                        <strong><font color="#FF0000"><?=$txt_wait_guest_receive;?></font></strong>
                      </div>
                    </div>
                    <?php
//  echo $arr[book][plan_id];
                    ?>
                  </td>
                  <td width="30" id="pm_guest_receive" style="display: none;">
                    <table width="100%">
                      <tbody>
                        <?php if ($_COOKIE[detect_userclass] == "taxi") {?>
                        <td>
                          <i id="guest_receive_pf" class="material-icons" style="color: rgb(59, 89, 152); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(59, 89, 152); display: nones;" onclick="modalShowImg('', '');">account_circle</i>
                        </td>
                        <td>&nbsp;</td>
                        <td>
                          <a id="guest_receive_phone" href="tel:<?=$arr[book][phone];?>"><i class="material-icons" style="color: rgb(89, 170, 71); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(89, 170, 71); display: nones;">phone</i></a>
                        </td>
                      <?php }
                      ?>
      <!--<tr>
         <td>
           <i id="guest_receive_locat_off" class="material-icons" style="color: #3b59987a;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 1px #3b59987a;display: nones;">location_on</i>
            <i id="guest_receive_locat_on" onclick="openPointMaps('guest_receive','<?=$arr[book][id];?>');" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;">location_on</i>
         </td>
         <td>
            <i id="photo_guest_receive_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
            <i id="photo_guest_receive_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="viewPhotoShop('<?=$arr[book][id];?>','guest_receive','<?=$arr[book][guest_receive_date];?>');">photo_camera</i>
         </td>
      </tr>-->
              </tbody>
            </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>

</td>
</tr>

<tr id="step_guest_register" style="display:none;">
  <td class="font-16">
    <div class="div-all-checkin">
      <table width="100%" border="0" cellspacing="2" cellpadding="0" id="box_guest_register">
        <tbody>
          <tr>
            <td width="50" rowspan="2">
              <div class="step-booking" id="number_guest_register">3</div>
              <div style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="<?=base_url();?>assets/images/no.png" align="absmiddle" id="iconchk_guest_register"></div>
            </td>
            <td colspan="2">
              <button id="btn_guest_register" onclick="btn_guest_register('<?=$arr[book][id];?>')" type="button" class="btns  btn-info " style="width:100%;text-align:left;padding:5px; <?=$btn_guest_register_color;?>;  border-radius: 20px; border:none;color: #fff;    margin-top: 10px; "><span class="font-20 text-cap"><i class="icon-new-uniF116-6" style="width:10px;"></i><span id="txt_btn_guest_register"><?=$title_guest_regis;?></span></span></button>

            </td>
          </tr>
          <tr>
            <td>
              <div id="status_guest_register">
                <div class="font-16"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i><strong><font color="#FF0000"><?=$txt_wait_guest_register;?></font></strong></div>
              </div>
              <input type="hidden" value="<?=$arr[book][check_guest_register];?>" id="guest_register_check_click">
            </td>
            <td width="30" id="pm_guest_register" style="display: none;">
              <table width="100%">
                <tbody>
                  <tr>
                    <?php if ($_COOKIE[detect_userclass] == "taxi") {?>
                      <td>
                        <i id="guest_register_pf" class="material-icons" style="color: rgb(59, 89, 152); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(59, 89, 152); display: nones;" onclick="modalShowImg('', '');">account_circle</i>
                      </td>
                      <td>&nbsp;</td>
                      <td>
                        <a id="guest_register_phone" href="tel:<?=$arr[book][phone];?>"><i  class="material-icons" style="color: rgb(89, 170, 71); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(89, 170, 71); display: nones;">phone</i></a>
                      </td>
                      <td>&nbsp;</td>
                    <?php }?>

                    <?php if ($_COOKIE[detect_userclass] == "lab") {?>
                      <td>
                        <i id="photo_guest_register_upload" onclick="uploadImgRegister(<?=$arr[book][id];?>);"
                           class="material-icons" 
                           style="margin-right: 5px;color: #00BCD4; font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid #00BCD4;display: none;">
                          cloud_upload</i>
                      </td>
                    <?php }?>

                    <td>

                      <i id="photo_guest_register_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgba(59, 89, 152, 0.48);display: none;">photo_camera</i>
                     <!-- <i id="photo_guest_register_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="viewPhotoShop('<?=$arr[book][id];?>','guest_register','<?=$arr[book][guest_register_date];?>');">photo_camera</i>-->
                      <i id="photo_guest_register_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="modalShowImg('../data/fileupload/store/guest_register_<?=$arr[book][id];?>.jpg?v=<?=time();?>', '');">photo_camera</i>
                    </td>
                  </tr>
                </tbody>
              </table>


            </td>
          </tr>
          <tr id="tr_show_pax_regis_<?=$arr[book][id];?>" style="display: none;" >

            <td colspan="3" align="center">
              <div style="padding: 5px;">

                <table width="100%">
                  <tr>
                    <td>
                      <span class="input-group-text" id="basic-addon1">แขกลงทะเบียน</span>
                    </td>
                    <td width="5">
<!--                      <input type="number" id="num_edit_persion2" pattern="\d*"
                             class="form-control font-17" placeholder="จำนวน" value="<?=$arr[book][pax_regis];?>" 
                             style="border-radius: 5px; width: 60px; border: none; background: #FFF; padding: 5px;color: #000;   font-weight: 800;" disabled>-->
                      <span class="font-17" id="num_edit_persion2" 
                        style="border-radius: 5px; width: 60px; border: none; background: #FFF; padding: 5px;color: #000;   font-weight: 800;">
                              <?=$arr[book][pax_regis];?>
                      </span>
                    </td>
                    <td align="center">
                      <span class="input-group-text">คน</span>
                    </td>

                    <?php
                    if ($_COOKIE[detect_userclass] == "lab" and $arr[book][check_guest_register] == 0) {
                      ?>
                      <td class="font-17 text-cap">
                        <style>
                          input[type="text"]:disabled {
                            color: #000 !important;
                          }
                        </style>
                        <span  align="center" onclick="editBook2('<?=$arr[book][id];?>');" class="btn-eb2" style="background: #3b5998;
                               color: #fff;
                               padding: 5px;
                               border-radius: 8px;
                               display: inline-block;" id="btn_isedit2">
                          <span class="font-14 text-cap">แก้ไข</span>
                        </span>
                        <span  align="center" onclick="saveeditBook2('<?=$arr[book][id];?>');" style="background: #3b5998;
                               color: #fff;
                               padding: 5px;
                               border-radius: 8px;
                               display: none;"  class="btn-eb2" id="btn_selectisedit2">
                          <span class="font-14 text-cap">บันทึก</span>
                        </span>
                      </td>
                    <?php }?>

                  </tr>
                </table>

                <div id="load_new_plan">

                </div>

              </div>
            </td>
          </tr>
        </tbody>

      </table>
    </div>

  </td>
</tr>

<tr id="step_choose_get_money" style="display:nones;">

</tr>

<tr id="step_confirm_pay" style="display:nones;">

</tr>

<tr id="step_driver_pay_com" style="display:none;">

</tr>

</tbody>
</table>
</div>
<script type="text/javascript">
  var book_edit_pax_regis;
  function editBook2(id) {
    $('#num_edit_persion2').attr('disabled', false)
    $('#btn_isedit2').hide();
    $('#btn_selectisedit2').show();
    performClick('num_edit_persion2');
  }
  function saveeditBook2(id) {
    console.log($('#num_edit_persion2').val())
    var pax_regis = $('#num_edit_persion2').val();
    var url = "shop/editpax_regis?pax_regis=" + pax_regis + "&id=" + id;
    $.post(url, function (res) {
      console.log(res);
      $('#num_edit_persion2').attr('disabled', true);
      $('#btn_selectisedit2').hide();
      $('#btn_isedit2').show();
    });
  }
</script>