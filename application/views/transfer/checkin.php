<?php 
$title_topoint = "ถึงสถานที่รับแขก";
$btn_topoint_color = "background-color:#3b5998";
$txt_wait_topoint = 'รอดำเนินการ';

$title_pickup = "เช็คชื่อแขก";
$btn_pickup_color = "background-color:#3b5998";
$txt_wait_pickup = 'รอดำเนินการ';


$title_checkcar = "งานสำเร็จ";
$btn_checkcar_color = "background-color:#3b5998";
$txt_wait_checkcar = 'รอดำเนินการ';
?>
<div style="padding: 5px">
  
  <ons-list-header class="list-header"> ข้อมูลการเช็คอิน</ons-list-header>
  <div class="div-all-checkin" style="margin-top: 15px;margin-bottom :15px;" id="step_trans_topoint">
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
            <button id="btn_driver_topoint" onclick="trans_driver_topoint('<?=$_POST[id];?>')" type="button" class="btn  btn-info " style="width:100%;text-align:left;padding:5px; <?=$btn_topoint_color;?>;  border-radius: 20px; border:none;color: #fff; "><span class="font-20 text-cap"><i class="icon-new-uniF12D-1" style="width:10px;"></i>  
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
                      <a href="tel:<?=$_POST[phone];?>"><i id="driver_topoint_pf" class="material-icons" style="color: rgb(89, 170, 71); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(89, 170, 71); display: nones;">phone</i></a>
                    </td>
                  <?php }
                  ?>
           <!--<td>
              <i id="driver_topoint_locat_off" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">location_on</i>
              <i id="driver_topoint_locat_on" onclick="openPointMaps('driver_topoint','<?=$_POST[id];?>');" class="material-icons" style="color: rgb(59, 89, 152); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(59, 89, 152); display: none;">location_on</i>
           </td>
           <td>
              <i id="photo_driver_topoint_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
              <i id="photo_driver_topoint_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="viewPhotoShop('<?=$_POST[id];?>','driver_topoint','<?=$_POST[driver_topoint_date];?>');">photo_camera</i>
             
           </td>-->
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    <input type="hidden" value="<?=$_POST[driver_topoint];?>" id="driver_topoint_check_click">
    <input type="hidden" id="check_code" value="<?=$_POST[id];?>">
  </div>
  
  
  <div class="div-all-checkin" style="margin-top: 15px;margin-bottom :15px;display: none;" id="step_trans_pickup">
    <table width="100%" border="0" cellspacing="2" cellpadding="0" class=" border-alert" id="box_driver_pickup">
      <tbody>
        <tr>
          <td width="50" rowspan="2">
            <div class="step-booking" id="number_driver_pickup">2</div>
            <div style="position:absolute; margin-top:-40px; margin-left: -5px;">
              <img src="<?=base_url();?>assets/images/no.png" align="absmiddle" id="iconchk_driver_pickup">
            </div>
          </td>
          <td colspan="2">
            <button id="btn_driver_pickup" onclick="trans_driver_pickup('<?=$_POST[id];?>')" type="button" class="btn  btn-info " style="width:100%;text-align:left;padding:5px; <?=$btn_pickup_color;?>;  border-radius: 20px; border:none;color: #fff; "><span class="font-20 text-cap"><i class="icon-new-uniF159-5" style="width:10px;"></i>  
                <span id="txt_btn_driver_pickup"><?=$title_pickup;?></span></span></button>
          </td>
        </tr>
        <tr>
          <td style="height:30px;">
            <div id="status_driver_pickup">
              <div class="font-16">
                <i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000"><?=$txt_wait_pickup;?></font></strong>
              </div>
            </div>
          </td>
          <td width="30" id="pm_driver_pickup" style="display: none;">
            <table width="100%">
              <tbody>
                <tr>
                  <?php if ($_COOKIE[detect_userclass] == "lab") {?>
                    <td>
                      <i id="driver_pickup_pf" class="material-icons" style="color: rgb(59, 89, 152); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(59, 89, 152); display: nones;" onclick="modalShowImg('../data/pic/driver/small/<?=$res_dv->username;?>.jpg', '<?=$name_dv;?>');">account_circle</i>
                    </td>
                    <td>
                      <a href="tel:<?=$_POST[phone];?>"><i id="driver_pickup_pf" class="material-icons" style="color: rgb(89, 170, 71); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(89, 170, 71); display: nones;">phone</i></a>
                    </td>
                  <?php }
                  ?>
           <!--<td>
              <i id="driver_pickup_locat_off" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">location_on</i>
              <i id="driver_pickup_locat_on" onclick="openPointMaps('driver_pickup','<?=$_POST[id];?>');" class="material-icons" style="color: rgb(59, 89, 152); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(59, 89, 152); display: none;">location_on</i>
           </td>
           <td>
              <i id="photo_driver_pickup_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
              <i id="photo_driver_pickup_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="viewPhotoShop('<?=$_POST[id];?>','driver_pickup','<?=$_POST[driver_pickup_date];?>');">photo_camera</i>
             
           </td>-->
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    <input type="hidden" value="<?=$_POST[driver_pickup];?>" id="driver_pickup_check_click">
    <input type="hidden" id="check_code" value="<?=$_POST[id];?>">
  </div>
  
  
  <div class="div-all-checkin" style="margin-top: 15px;margin-bottom :15px;display: none;" id="step_trans_complete">
    <table width="100%" border="0" cellspacing="2" cellpadding="0" class=" border-alert" id="box_driver_complete">
      <tbody>
        <tr>
          <td width="50" rowspan="2">
            <div class="step-booking" id="number_driver_complete">3</div>
            <div style="position:absolute; margin-top:-40px; margin-left: -5px;">
              <img src="<?=base_url();?>assets/images/no.png" align="absmiddle" id="iconchk_driver_complete">
            </div>
          </td>
          <td colspan="2">
            <button id="btn_driver_complete" onclick="trans_driver_complete('<?=$_POST[id];?>')" type="button" class="btn  btn-info " style="width:100%;text-align:left;padding:5px; <?=$btn_pickup_color;?>;  border-radius: 20px; border:none;color: #fff; "><span class="font-20 text-cap"><i class="icon-new-uniF12D-1" style="width:10px;"></i>  
                <span id="txt_btn_driver_complete"><?=$title_checkcar;?></span></span></button>
          </td>
        </tr>
        <tr>
          <td style="height:30px;">
            <div id="status_driver_complete">
              <div class="font-16">
                <i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000"><?=$txt_wait_checkcar;?></font></strong>
              </div>
            </div>
          </td>
          <td width="30" id="pm_driver_complete" style="display: none;">
            <table width="100%">
              <tbody>
                <tr>
                  <?php if ($_COOKIE[detect_userclass] == "lab") {?>
                    <td>
                      <i id="driver_complete_pf" class="material-icons" style="color: rgb(59, 89, 152); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(59, 89, 152); display: nones;" onclick="modalShowImg('../data/pic/driver/small/<?=$res_dv->username;?>.jpg', '<?=$name_dv;?>');">account_circle</i>
                    </td>
                    <td>
                      <a href="tel:<?=$_POST[phone];?>"><i id="driver_complete_pf" class="material-icons" style="color: rgb(89, 170, 71); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(89, 170, 71); display: nones;">phone</i></a>
                    </td>
                  <?php }
                  ?>
           <!--<td>
              <i id="driver_pickup_locat_off" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">location_on</i>
              <i id="driver_pickup_locat_on" onclick="openPointMaps('driver_pickup','<?=$_POST[id];?>');" class="material-icons" style="color: rgb(59, 89, 152); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(59, 89, 152); display: none;">location_on</i>
           </td>
           <td>
              <i id="photo_driver_pickup_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
              <i id="photo_driver_pickup_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="viewPhotoShop('<?=$_POST[id];?>','driver_pickup','<?=$_POST[driver_pickup_date];?>');">photo_camera</i>
             
           </td>-->
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    <input type="hidden" value="<?=$_POST[driver_checkcar];?>" id="driver_complete_check_click">
    <input type="hidden" id="check_code" value="<?=$_POST[id];?>">
  </div>
</div>
