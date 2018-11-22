<?php
// print_r(json_encode($place_company));
$i_d_next = date('w');
$weekdays = Array();
$weekdays[0] = "Sun";
$weekdays[1] = "Mon";
$weekdays[2] = "Tue";
$weekdays[3] = "Wed";
$weekdays[4] = "Thu";
$weekdays[5] = "Fri";
$weekdays[6] = "Sat";
$weekdays2 = Array();
$weekdays2[0] = "วันอาทิตย์";
$weekdays2[1] = "วันจันทร์";
$weekdays2[2] = "วันอังคาร";
$weekdays2[3] = "วันพุธ";
$weekdays2[4] = "วันพฤหัส";
$weekdays2[5] = "วันศุกร์";
$weekdays2[6] = "วันเสาร์";

foreach ($place_company as $data) {
  // print_r($data->main);
  // print_r($data->sub);
  $_where = array();
  $_where['id'] = $data->province;
  $_select = array('*');
  $data_pv = $this->Main_model->rowdata(TBL_WEB_PROVINCE,$_where);

  $arr_where = array();
  $arr_where['status'] = 1;
  $arr_where['product_id'] = $data->id;
  $arr_where['product_day'] = $weekdays[date('w')];
  $arr_select = array('finish_h','finish_m','start_h','start_m',);

  $datatime = $this->Main_model->fetch_data('','',TBL_SHOPPING_OPEN_TIME,$arr_where,$arr_select,'');
// print_r(json_encode($data));
  $_where = array();
  $_where['id'] = $data->sub;
  $_select = array('topic_th');
  $SUB = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_SUB,$_where);

  $_where['id'] = $data->main;
  $_select = array('topic_th');
  $MAIN = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN,$_where);

  $_where['id'] = $data->amphur;
  $_select = array('topic_th');
  $aumper = $this->Main_model->rowdata(TBL_WEB_AREA,$_where);
  ?>

  <div class="card shop_company_box_<?=$data->id;?>" id="shop_company_box_<?=$data->id;?>" >

    <input value="107" id="comshop_id" name="check_use_car_id" value="<?=$data->id;?>" type="hidden">

    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom : 0px solid #DADADA;" id="row_place_<?=$data->id;?>">
      <tbody><tr>
          <td width="130">
            <img src="../data/pic/place/<?=$data->id;?>_logo.jpg" alt="" style="box-shadow: 1px 1px 3px #333333;border-radius:  8px; border: 1px solid #ddd;height: 65px;width: 110px; ">
          </td>
          <td valign="top">
            <strong class="font-17"><?=$data_pv->name_th;?> / <?=$aumper->name_th;?></strong><br/>
            <strong class="font-17"><?=$MAIN->topic_th;?></strong><br/>
            <strong class="font-17" style="color:#3b5998"><?=$SUB->topic_th;?> </strong>

            <!--              <a class="font-17" style="display: none;">
                            <strong id="txt_sh_1">ละเอียด</strong>
                            <span id="icon_sh_1"><i class="fa fa-chevron-down"></i></span>
                          </a>-->
            <input type="hidden" id="check_click_1" value="0">

          </td>
        </tr>
        <tr>
          <td colspan="2">
            <div class="element_to_find" align="center" style="margin-top: 10px;">
              <input type="hidden" name="" id="shop_topic_th" value="คิงส์ พาวเวอร์ (ภูเก็ต)">

              <span class="font-17"  style="color:#333333"><span class="txt_topic_company " data-search="<?=$data->topic_th. " ".$data->topic_cn." ".$data->topic_en;?>  " data-role="<?=$data->id;?>"> <?=$data->topic_th;?> </span></span>

              <input type="hidden" value=" " id="1">

            </div>
          </td>
        </tr>
       <!--  <tr>
          <td colspan="2" align="center" style="    padding-top: 0px">

            <span class="font-17" style="color: #2b2828;">วันนี้  
              <span id="date_open"><?=$weekdays2[$i_d_next];?></span> 
              <span id="time_open" style="color: #24b968;">เวลาเปิด <?=$datatime[0]->start_h;?>:<?=$datatime[0]->start_m;?></span>
              <span id="time_close" style="color: #ca1a1a;">เวลาปิด <?=$datatime[0]->finish_h;?>:<?=$datatime[0]->finish_m;?></span> 
            </span>


          </td>
       
        </tr> -->
      </tbody></table>
  <!--   <table width="100%" border="0" cellspacing="1" cellpadding="1" style=" margin-top: 7px;">
      <tbody>

        <tr>
          <td width="33%" align="left" style="padding: 0px;">
            <div class="btn" style=" width:100%; text-align:left; /*padding:2px; padding-left:5px;*/ height:40px;border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_phone" onclick="openContact('<?=$data->id;?>');">
              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tbody>
                  <tr>
                    <td align="center" width="30"><i class="fa fa-phone-square" style="font-size:28px; color: #8DC63F; border:none;"></i></td>
                    <td align="center" class="font-17"><b>โทร</b></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </td>
          <td width="33%" align="left" style="padding: 0px;">
            <div class="btn " style=" width:100%; text-align:left;  /*padding:2px;*/height:30px;border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_zello" onclick="openZello('<?=$data->id;?>');">
              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tbody>
                  <tr>
                    <td align="center" width="30"><img src="<?=base_url();?>assets/images/social/zello.png" width="25" alt=""> </td>
                    <td align="center" class="font-17">
                      <b>Zello</b>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </td>
          <td width="33%" align="left" style="padding: 0px;">
            <div class="btn" style=" width:100%; text-align:left;  /*padding:2px;*/height:30px;border-radius: 0px;" data-toggle="dropdown" id="shop_sub_menu_map" onclick="openShopMap('<?=$data->lat;?>', '<?=$data->lng;?>', '<?=$data->address;?>', '<?=$data_pv->name;?>')">
              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tbody>
                  <tr>
                    <td align="center" width="30"><img src="<?=base_url();?>assets/images/social/map.png" width="25" alt=""></td>
                    <td align="center" class="font-17"><b>แผนที่</b></td>
                  </tr>
                </tbody>
              </table>

            </div>
          </td>
        </tr>
      </tbody>
    </table> -->
    <table width="100%">
      <tr>
        <td width="50%" valign="top" >
      <ons-button onclick="fun_imageslider('<?=$data->id;?>');" style="padding: 15px;border: 1px solid #0076ff;
                  border-radius: 5px;
                  line-height: 0; " modifier="outline" class="button-margin button button--outline button--large">
        <span class="font-17 text-cap">  ข้อมูล</span> 
      </ons-button>
      </td>
      <td width="50%">
      <ons-button modifier="outline"  onclick="checkPricePlan('<?=$data->id;?>');" class="button-margin button button--outline button--large" style="padding: 15px;border: 1px solid #0076ff;
                  border-radius: 5px;
                  line-height: 0; ">
        <span class="font-17 text-cap">ส่งแขก</span> </ons-button>




      </td>
      </tr>
    </table>
  </div>

    <!-- <div class="card" onclick="sendShops('<?=$data->id;?>')">
        <table width="100%" border="0" cellspacing="" cellpadding="" style="border-bottom : 0px solid #DADADA;" id="row_place_1">
            <tr>
                <td width="110" valign="top">
                    <img src="../data/pic/place/<?=$data->id;?>_logo.jpg" width="100px" alt="" style=" border-radius:  15px; border: 1px solid #ddd; margin-bottom:5px;">
                </td>
                <td>
                    <div class="element_to_find">
                        <span class="font-18" style="color:#3b5998">ดิวตี้ฟรี </span><br>
                        <span class="font-18" style="color:#333333">
                            <b> <?=$data->topic_th;?> </b>
                        </span>
                        <b> <br>
                            <input type="hidden" value=" " id="1">
                        </b>
                    </div>
                    <div class="font-18 btn_detail" style="display: nones; " onclick="getplandetail('<?=$data->id;?>')">
                        <span>รายละเอียด</span>

                    </div>
                    <input type="hidden" id="check_click_1" value="0">

                </td>
            </tr>
        </table>
    </div> -->
<?php
}?>