<?php
$adult_txt = t_adult." ".$_POST[adult];
$child_txt = t_child." ".$_POST[child];
if ($_POST[air] != "") {
  $display_none_air = '';
}
else {
  $display_none_air = 'display:none;';
}
$car_type = $_POST[car_type][topic_th];
if ($_POST[s_status_pay] == 0) {
  $type_pay = 'จ่ายเงินสด';
}
else {
  $type_pay = 'โอนเงินเข้าบัญชี';
}
if ($_POST[address_from] != "") {
  $place_from = $_POST[address_from];
}
else {
  $place_from = $_POST[pickup_place][topic];
}
if ($_POST[address_to] != "") {
  $place_to = $_POST[address_to];
}
else {
  $place_to = $_POST[to_place][topic];
}
?>
<div style="margin-top: 0px;padding: 5px;" >
  <span style="font-size: 16px;"></span>
  <div>
    <table width="100%" border="0" cellspacing="2" cellpadding="2" >
      <tbody>
        <tr>
          <td width="60" style="background-color:#F6F6F6 ">
            <div id="cir_1">
              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tbody>
                  <tr>
                    <td height="35" class="boxnumber"  id="">
                <center>
                  <span class="id-order"><?=$_POST[id];?></span>
                </center>
                </td>
                </tr>
                </tbody>
              </table>
            </div>
          </td>
          <td width="100" height="30" valign="top" style="background-color:#ffffff; padding-top:8px; padding-left:10px;  ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td style="font-size:24px ; color:#009999; color:#444444;"><i class="fa fa-user"></i></td>
                  <td style="font-size:14px ; font-weight:bold"><?=$_POST[program][type];?></td>
                </tr>
              </tbody>
            </table>
          </td>
          <td valign="middle" style="font-size:16px ; font-weight:bold; padding-top:5px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td style="font-size:24px ; color: #3399CC; color:#444444  " width="35" >&nbsp;<?=$font_icon_area;?></td>
                  <td style="font-size:14px ; font-weight:bold">&nbsp;<?=$area;?></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    <ons-card clas="font-18" style="margin-top:10px; font-weight:bold; background-color:#F6F6F6; padding:5PX;border-radius: 10px; "><?=$_POST[ondate];?></ons-card>
    <div class="show_product_detail_all" style="display: nones;">
      <font class="font-18">
      <b><?=$_POST[program][topic_en];?>&nbsp; &nbsp;<font color="#666666"></font></b></font>
    </div>
    <div style="">
      <ons-card>
        <b><i class="fa  fa-map-marker" style="color:#c1c1c1;padding: 0px 7px;font-size: 20px;"></i><span class="font-17 text-cap"><?=t_pick_up_place;?></span></b>
        <div style="position:  absolute; right: 20px; margin-top: -30px;" >
          <a class="test" data-toggle="tooltip" title="<?=t_navigation_map;?>" onclick="mapsSelector('<?=$_POST[lat_f];?>', '<?=$_POST[lng_f];?>');" 
             target="_blank"> 
            <i class="icon-new-uniF13A-7" style=" font-size:28px; color:#3C8DBC"></i>
          </a>
          <a href="tel:076351166" target="_blank" class="test" data-toggle="tooltip" title="โทรออก"> <i class="icon-new-uniF152-4" style=" font-size:24px; color:#3C8DBC"></i></a>
        </div>
        <div align="left" style="font-size:16px;padding: 5px 15px; "> 
          <span id="address_form" class="font-18">
            <?=$place_from;?>
          </span>					   
        </div>
      </ons-card>
      <div style="width: 2px; background: #999; margin-left: 135px;  height: 25px;" class="line-center" align="center"></div>
      <ons-card >
        <b><i class="fa  fa-map-marker" style="color:#c1c1c1;padding: 0px 7px;font-size: 20px;"></i><span class="font-17 text-cap"><?=t_drop_place;?></span></b>
        <div style="position:  absolute; right: 20px; margin-top: -30px;" >
          <a class="test" data-toggle="tooltip" title="<?=t_navigation_map;?>" onclick="mapsSelector('<?=$_POST[lat_t];?>', '<?=$_POST[lng_t];?>');" target="_blank"> 
            <i class="icon-new-uniF13A-7" style=" font-size:28px; color:#3C8DBC"></i>
          </a>
          <a href="tel:076351166" target="_blank" class="test" data-toggle="tooltip" title="โทรออก"> <i class="icon-new-uniF152-4" style=" font-size:24px; color:#3C8DBC"></i></a>
        </div>
        <div align="left" style="font-size:16px;padding: 5px 15px; "> 
          <span id="address_form" class="font-18">
            <?=$place_to;?>
          </span>					   
        </div>
      </ons-card>
    </div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="pd-this-page">
        <tr>
          <td id="show_guest_detail" class="show_guest_detail_all" style="display: table-cell;">
      <ons-card>
        <ons-list-header><i class="fa fa-info" style="color:#c1c1c1;padding: 0px 7px;"></i><?=t_details;?></ons-list-header>
        <table width="100%" border="0" cellspacing="2" cellpadding="4">
          <tbody>
            <tr>
              <td width="20" valign="top"><i class="icon-new-uniF10E-5" style="color:#666666; font-size:18px;"></i></td>
              <td width="120" valign="top" class="td-text text-cap"><b><?=t_time;?></b></td>
              <td valign="top" class="td-text"><span class="font-17"><?=$_POST[airout_time];?></span></td>
            </tr>
            <tr style="<?=$display_none_air;?>">
              <td valign="top"><i class="icon-new-uniF104" style="color:#666666; font-size:18px;"></i></td>
              <td width="120" valign="top" class="td-text"><b><?=t_flight;?></b></td>
              <td valign="top" class="td-text"><span class="font-17"><?=$_POST[air];?> </span></td>
            </tr>
            <tr style="display: nones;">
              <td valign="top"><i class="icon-new-uniF137" style="color:#666666; font-size:18px;"></i></td>
              <td width="120" valign="top" class="td-text text-cap"><b><?=t_agents;?></b></td>
              <td valign="top" class="td-text"><span class="font-17"><?=$_POST[bookagent][guest];?></span></td>
            </tr>
            <tr >
              <td valign="top"><i class="icon-new-uniF12B-3" style="color:#666666; font-size:18px"></i></td>
              <td valign="top" class="td-text text-cap"><b><?=t_number_customers;?></b></td>
              <td valign="top" class="td-text"><span class="font-17"> <?=$adult_txt." ".$child_txt;?></span>
              </td>
            </tr>
            <tr style="display: nones;">
              <td valign="top"><i class="icon-new-uniF109-14" style="color:#666666; font-size:18px"></i></td>
              <td valign="top" class="td-text text-cap"><b><?=t_name_guest;?></b></td>
              <td valign="top" class="td-text"><span class="font-17"><?=$_POST[bookagent][guest];?></span></td>
            </tr>
            <tr style="display: nones;">
              <td valign="top"><i class="icon-new-uniF152-4" style="color:#666666; font-size:18px"></i></td>
              <td valign="top" class="td-text text-cap"><b><?=t_phone;?></b></td>
              <td valign="top" class="td-text"><a href="tel:<?=$_POST[bookagent][phone];?>"><span class="font-17"><?=$_POST[bookagent][phone];?></span></a></td>
            </tr>
            <tr style="display: none;">
              <td valign="top"><i class="icon-app-uniF111" style="color:#666666; font-size:18px"></i></td>
              <td valign="top" class="td-text text-cap"><b><?=t_voucher_number;?></b></td>
              <td valign="top" class="td-text"><a href="<?=$_POST[invoice];?>" target="_blank">
                  <span class="span-detail1"> <font color="#00808B" class="font-17" ><?=$_POST[invoice];?></font></span></a>
              </td>
            </tr>
            <tr style="display: nones;">
              <td valign="top"><i class="icon-new-uniF121-10" style="color:#666666; font-size:18px"></i></td>
              <td valign="top" class="td-text text-cap"><b><?=t_work_remuneration;?></b></td>
              <td valign="top" class="td-text">
                <span class="span-detail1"> <font class="font-17" ><?=$_POST[cost];?>(-<?=$_POST[s_cost];?>) <?=t_THB;?></font></span>
              </td>
            </tr>
            <tr style="display: nones;">
              <td valign="top"><i class="fa fa-exchange" style="color:#666666; font-size:18px"></i></td>
              <td valign="top" class="td-text text-cap"><b><?=t_get_paid_type;?></b></td>
              <td valign="top" class="td-text">
                <span class="span-detail1"> <font class="font-17" ><?=$type_pay;?></font></span>
              </td>
            </tr>
            <tr style="display: nones;">
              <td valign="top"><i class="fa fa-exchange" style="color:#666666; font-size:18px"></i></td>
              <td valign="top" class="td-text text-cap"><b><?="เลข Voucher";?></b></td>
              <td valign="top" class="td-text">
                <span class="span-detail1"> <font class="font-17" ><?=$_POST[invoice];?></font></span>
              </td>
            </tr>
          </tbody>
        </table>
      </ons-card>
      </td>
      </tr>
    </table>
    <ons-card>
    <?php $this->load->view('transfer/checkin'); ?>
      </ons-card>
  </div>
  <input type="hidden" value="<?=$_POST[cost];?>" id="cost" />
  <input type="hidden" value="<?=$_POST[s_cost];?>" id="s_cost" />
  <input type="hidden" value="<?=$_POST[invoice];?>" id="invoice" />
  <input type="hidden" value="<?=$_POST[driver];?>" id="driver_id_trans" />
  <input type="hidden" value="<?=$_POST[s_status_pay];?>" id="type_customer_pay" />
  <input type="hidden" value="<?=$_POST[idorder];?>" id="idorder" />
