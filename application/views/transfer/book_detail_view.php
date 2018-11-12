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
    <ons-card clas="font-20" style="margin-top:10px; font-weight:bold; background-color:#F6F6F6; padding:5PX;border-radius: 10px; "><?=$_POST[ondate];?></ons-card>
    <div class="show_product_detail_all" style="display: nones;">
      <font class="font-20">
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
          <span id="address_form" class="font-20">
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
          <span id="address_form" class="font-20">
            <?=$place_to;?>
          </span>					   
        </div>
      </ons-card>
    </div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="pd-this-page">
      <tbody>
        <tr>
          <td id="show_guest_detail" class="show_guest_detail_all" style="display: table-cell;">
      <ons-card>
        <ons-list-header><i class="fa fa-info" style="color:#c1c1c1;padding: 0px 7px;"></i><?=t_details;?></ons-list-header>
        <table width="100%" border="0" cellspacing="2" cellpadding="4">
          <tbody>
            <tr>
              <td width="20" valign="top"><i class="icon-new-uniF10E-5" style="color:#666666; font-size:18px;"></i></td>
              <td width="120" valign="top" class="td-text text-cap"><b><?=t_time;?></b></td>
              <td valign="top" class="td-text"><span class="font-18"><?=$_POST[airout_time];?></span></td>
            </tr>
            <tr style="<?=$display_none_air;?>">
              <td valign="top"><i class="icon-new-uniF104" style="color:#666666; font-size:18px;"></i></td>
              <td width="120" valign="top" class="td-text"><b><?=t_flight;?></b></td>
              <td valign="top" class="td-text"><span class="font-18"><?=$_POST[air];?> </span></td>
            </tr>
            <tr style="display: nones;">
              <td valign="top"><i class="icon-new-uniF137" style="color:#666666; font-size:18px;"></i></td>
              <td width="120" valign="top" class="td-text text-cap"><b><?=t_agents;?></b></td>
              <td valign="top" class="td-text"><span class="font-18"><?=$_POST[bookagent][guest];?></span></td>
            </tr>
            <tr >
              <td valign="top"><i class="icon-new-uniF12B-3" style="color:#666666; font-size:18px"></i></td>
              <td valign="top" class="td-text text-cap"><b><?=t_number_customers;?></b></td>
              <td valign="top" class="td-text"><span class="font-18"> <?=$adult_txt." ".$child_txt;?></span>
              </td>
            </tr>
            <tr style="display: nones;">
              <td valign="top"><i class="icon-new-uniF109-14" style="color:#666666; font-size:18px"></i></td>
              <td valign="top" class="td-text text-cap"><b><?=t_name_guest;?></b></td>
              <td valign="top" class="td-text"><span class="font-18"><?=$_POST[bookagent][guest];?></span></td>
            </tr>
            <tr style="display: nones;">
              <td valign="top"><i class="icon-new-uniF152-4" style="color:#666666; font-size:18px"></i></td>
              <td valign="top" class="td-text text-cap"><b><?=t_phone;?></b></td>
              <td valign="top" class="td-text"><a href="tel:<?=$_POST[bookagent][phone];?>"><span class="font-18"><?=$_POST[bookagent][phone];?></span></a></td>
            </tr>
            <tr style="display: none;">
              <td valign="top"><i class="icon-app-uniF111" style="color:#666666; font-size:18px"></i></td>
              <td valign="top" class="td-text text-cap"><b><?=t_voucher_number;?></b></td>
              <td valign="top" class="td-text"><a href="<?=$_POST[invoice];?>" target="_blank">
                  <span class="span-detail1"> <font color="#00808B" class="font-18" ><?=$_POST[invoice];?></font></span></a>
              </td>
            </tr>
            <tr style="display: nones;">
              <td valign="top"><i class="icon-new-uniF121-10" style="color:#666666; font-size:18px"></i></td>
              <td valign="top" class="td-text text-cap"><b><?=t_work_remuneration;?></b></td>
              <td valign="top" class="td-text">
                <span class="span-detail1"> <font class="font-18" ><?=$_POST[cost];?>(-<?=$_POST[s_cost];?>) <?=t_THB;?></font></span>
              </td>
            </tr>
            <tr style="display: nones;">
              <td valign="top"><i class="fa fa-exchange" style="color:#666666; font-size:18px"></i></td>
              <td valign="top" class="td-text text-cap"><b><?=t_get_paid_type;?></b></td>
              <td valign="top" class="td-text">
                <span class="span-detail1"> <font class="font-18" ><?=$type_pay;?></font></span>
              </td>
            </tr>
            <tr style="display: nones;">
              <td valign="top"><i class="fa fa-exchange" style="color:#666666; font-size:18px"></i></td>
              <td valign="top" class="td-text text-cap"><b><?="เลข Voucher";?></b></td>
              <td valign="top" class="td-text">
                <span class="span-detail1"> <font class="font-18" ><?=$_POST[invoice];?></font></span>
              </td>
            </tr>
          </tbody>
        </table>
      </ons-card>
      </td>
      </tr>
      <tr>
        <td>
      <ons-card>
        <ons-list-header><i class="fa fa-car" style="color:#c1c1c1;padding: 0px 7px;"></i><?=t_car_request;?></ons-list-header>
        <table width="100%" border="0" cellspacing="2" cellpadding="4">
          <tbody>
            <tr>
              <td width="20" valign="top"><i class="fa fa-car" style="color:#666666; font-size:18px;"></i></td>
              <td width="120" valign="top" class="td-text text-cap"><b><?=t_type_of_vehicle;?></b></td>
              <td valign="top" class="td-text"><span class="font-18"><?=$car_type;?></span></td>
            </tr>
            <tr>
              <td width="20" valign="top" align="center"><i class="fa fa-users" style="color:#666666; font-size:18px;"></i></td>
              <td width="120" valign="top" class="td-text text-cap"><b><?=t_capacity;?></b></td>
              <td valign="top" class="td-text"><span class="font-18"><?=$_POST[car_type][pax_th];?></span></td>
            </tr>
          </tbody>
        </table>
      </ons-card>
      </td>
      </tr>
      <tr>
        <td>
      <ons-card>
        <ons-list-header><i class="fa fa-car" style="color:#c1c1c1;padding: 0px 7px;"></i><?=t_select_your_car;?></ons-list-header>
        <ons-button style="padding:0px 10px;margin:10px;" onclick="myCar();">จัดการข้อมูลรถ</ons-button>
        <div style="margin-top:0px;">
          <?php
          $query = $this->db->query("SELECT i_car_use_type FROM web_carall_type where id = ".$_POST[car_type][id]);
          $row = $query->row();
          $i = 1;
          $select = "SELECT t1.*, t2.txt_color,t2.plate_color, t3.name_th as car_type_txt,tb_pro.id as tb_pro_id, tb_pro.name as tb_pro_name, tb_pro.name_th as tb_pro_name_th, tb_pro.name_cn as tb_pro_name_cn FROM web_carall as t1 left join web_province as tb_pro on t1.i_province = tb_pro.id    left join web_car_plate as t2 on t1.i_plate_color = t2.id left join web_car_use_type as t3 on t1.car_type = t3.id "
                  . "where t1.drivername  = '".$_COOKIE['detect_user']."' AND t1.status = 1 and t1.car_type = ".$row->i_car_use_type." ORDER BY t1.status_usecar  DESC";
          $query = $this->db->query($select);
          $check = $query->num_rows();
          if($check<=0){ ?>
          <b style="color: #f00;" class="font-17">ไม่มีรถประเภทนี้</b>
          <?php }else{
          foreach ($query->result() as $key => $val) {

            $bg_plate_color = "background-color: ".$val->plate_color;
            ?>
            <a id="car_<?=$val->id;?>" class="a-select-car" style="text-decoration:none; margin-top:30px;" >
              <?php
              if ($val->status_usecar == 1) {
                $calss_box = 'cus_focus';
              }
              else {
                $calss_box = '';
              }
              ?>
              <table width="100%" border="0" id="div_car_<?=$val->id;?>" class="<?=$calss_box;?> box_car" style="border: 0px solid #ddd;" >
                <tbody>
                  <tr>
                    <td width="30" onclick="">

                <ons-radio class="radio-fruit" input-id="radio-plate_num<?=$val->id;?>" id="car_use_<?=$val->id;?>" value="<?=$val->id;?>" name="plate_num_1"  ></ons-radio>

                </td>
                <td onclick="$('#car_id_trans_select').val(<?=$val->id;?>);$('#car_type_trans_select').val(<?=$val->car_type;?>);">
                  <label for="radio-plate_num<?=$val->id;?>">
                    <table width="100%" cellpadding="1" cellspacing="2">
                      <tbody>
                        <tr>
                          <td width="100" align="center" style="padding:1px; border-radius:5px;<?=$bg_plate_color;?>">
                            <div style="border-radius:5px;border: 1px solid <?=$val->txt_color;?>;"><font color="<?=$val->txt_color;?>" class="font-17"><b><?=$val->plate_num;?></font><br>
                                <font class="font-14" style="color: <?=$val->txt_color;?>"><?=$val->tb_pro_name_th;?></font></b></font></div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </label>
                </td>
                <td width="45">
                  <button onclick="editCar('<?=$val->id;?>', 'transfer_select');" type="button" class="button--cta" style="padding: 0px 7px;"><span class="font-16">แก้ไข</span></button>
                </td>
                </tr>
                </tbody>
              </table>
            </a>    
            <?php
            $i++;
          }
          }
          ?>
          <input type="hidden" value="" id="car_id_trans_select" />
          <input type="hidden" value="" id="car_type_trans_select" />
        </div>
      </ons-card>
  </div>
</td>
</tr>
</tbody>
</table>
</div>
<div style="padding-bottom: 20px;padding-left: 10px;padding-right: 10px;padding-top:20px;">
  <ons-button style="background-color: #fff;padding: 3px;" modifier="outline" class="button-margin button button--outline button--large" onclick="selectjob('<?=$_POST[orderid];?>', '<?=$_POST[id];?>', '<?=$_POST[invoice];?>', '<?=$_POST[code];?>', '<?=$_POST[program][id];?>', '<?=$_POST[pickup_place][id];?>', '<?=$_POST[to_place][id];?>', '<?=$_POST[agent];?>', '<?=$_POST[airout_time];?>', '<?=$_POST[airin_time];?>', '<?=$_POST[cost];?>', '<?=$_POST[s_cost];?>', '<?=$_POST[outdate];?>', '<?=$_POST[ondate];?>', '<?=$_POST[s_status_pay];?>', '<?=$_POST[car_type][id];?>', '<?=$car_type;?>', '<?=$_POST[car_type][pax_th];?>', '<?=$arr[ct][topic_th];?>', '<?=$arr[ct][pax_th];?>')" style="background-color: #fff;"><?=t_accept_order?></ons-button>
</div>