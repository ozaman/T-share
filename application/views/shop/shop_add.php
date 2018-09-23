<style>
.text-input--material{
  background-image : none;
}
.res-input {
  position: absolute;
  right: 30px;
  /*    margin-top: 10px;*/
  font-size: 28px;
  z-index: 2;
  /* display: block !important; */
}
</style>
<?php
$select = "SELECT t1.*, t2.txt_color,t2.plate_color, t3.name_th as car_type_txt,tb_pro.id as tb_pro_id, tb_pro.name as tb_pro_name, tb_pro.name_th as tb_pro_name_th, tb_pro.name_cn as tb_pro_name_cn FROM web_carall as t1 left join web_province as tb_pro on t1.i_province = tb_pro.id    left join web_car_plate as t2 on t1.i_plate_color = t2.id left join web_car_use_type as t3 on t1.car_type = t3.id where t1.drivername  = '".$_COOKIE['detect_user']."' AND t1.status = 1 ORDER BY t1.status_usecar  DESC";
$query = $this->db->query($select);

$sql_dv = "SELECT name,phone,phone2 FROM web_driver  WHERE id = ".$_COOKIE['detect_user']." ";
$query_dv = $this->db->query($sql_dv);
$data_dv = $query_dv->row();
$user_id = $_COOKIE['detect_user'];


$sql_place = "SELECT * FROM shopping_product  WHERE id=1 AND price_plan > 0";
$query_place = $this->db->query($sql_place);
$data_place = $query_place->row();

$sql_shopmain = "SELECT * FROM shopping_product_main  WHERE id = $data_place->main";
$shopmain = $this->db->query($sql_shopmain);
$data_shopmain = $shopmain->row();

// $sql_shopmain_sub = "SELECT * FROM shopping_product_sub  WHERE id= $data_shopmain->main ";
// $shopmain_sub = $this->db->query($sql_shopmain_sub);
// $data_shopmain_sub = $shopmain_sub->row();





// echo $data_place->topic_th;
?>
<div style="height: 100%;">
  <form name="form_booking" id="form_booking">
    <input type="hidden" value="1" name="program" id="program" />
    <input type="hidden" value="" name="txt_car_type" id="txt_car_type" />
    <input type="hidden" value="" name="car_type" id="car_type" />
    <input type="hidden" value="" name="car_plate" id="car_plate" />
    
    
    <input id="dri_phone" name="dri_phone" type="hidden" value="<?=$data_dv->phone; ?>">
    <input id="dri_name" name="dri_name" type="hidden" value="<?=$data_dv->name; ?>">
    <div>
      <div class="card">
        <!-- <div class="form-group "> -->


          <script>
            function selectCarShops(id, cartype, car_type_txt) {
              console.log('--------------------------')
              console.log(id+'-'+cartype+'-'+car_type_txt)
              $('input[type="checkbox"]').prop('checked', false); // Unchecks it
              $('#car_use_' + id).prop('checked', true); // Checks it
              var plate_num = $('#value_car_' + id).data('plate_num');
              $('#car_type').val(cartype);

              console.log(plate_num);
              $('#car_plate').val(plate_num);
              $('#car_id').val(id);
              $('#txt_car_type').val(car_type_txt);
            }
          </script>
          <input value="" id="car_id" name="check_use_car_id" type="hidden" />
          <!-- </div> -->
          <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom : 0px solid #DADADA;" id="row_place_1">
            <tr>
              <td width="110">
                <img src="../data/pic/place/1_logo.jpg" width="100px" alt="" style=" border-radius:  8px; border: 1px solid #ddd; ">
              </td>
              <td>
                <div class="element_to_find">
                  <span class="font-17" style="color:#3b5998">ดิวตี้ฟรี </span><br>
                  <span class="font-17" style="color:#333333"><b> คิงส์ พาวเวอร์ (ภูเก็ต) </b></span>

                  <input type="hidden" value=" " id="1">

                </div>

                <a class="font-17" style="display: none;">
                  <strong id="txt_sh_1">แสดงรายละเอียด</strong>
                  <span id="icon_sh_1"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                </a>
                <input type="hidden" id="check_click_1" value="0">
              </b>
            </td>
          </tr>
        </table>
      </div>
      <style >
      @keyframes border-pulsate {
        0%   { border-color: rgba(0, 255, 255, 1); }
        50% { border-color: rgba(0, 255, 255, 0); }
        100%   { border-color: rgba(0, 255, 255, 1); }
      }
       /* @-webkit-keyframes borderBlink {    
    from, to {    
        border-color: transparent    
    }    
    50% {    
        border-color: #FF5722    
    }    
}    
@keyframes borderBlink {    
    from, to {    
        border-color: transparent    
    }    
    50% {    
        border-color: #FF5722    
    }    
    }    */
    .borderBlink{   
      /*animation: border-pulsate 2s infinite; */
      /*border: 1px solid;*/
      border: 1px solid #FF5722;
      /*-webkit-animation: borderBlink 1s step-end infinite;    */
      /*animation: borderBlink 1s step-end infinite;*/
      /* add 'border-color: transparent' if you wish no border to show initially */  
    }
    .borderBlink:hover {    
      /*-webkit-animation: borderBlink 1s step-end infinite;    */
      /*animation: borderBlink 1s step-end infinite;    */
    }
    .cus_focus{
      background-color: #eeeeee7d;
    }
  </style>
  <div class="card borderBlink" onclick="checformadd('box_car')" id="box_car">
    <input type="hidden" name="" id="numcar" value="<?=count($query->result());?>">
    <ons-list-header class="list-header " id="castomer_box"> เลือกรถส่งแขก</ons-list-header>
    <!--<div></div>-->
    <!--<span >เลือกรถส่งแขก</span>-->
    <div style="padding: 0px;margin-top: 0px;" >
      <?php

          // echo json_encode($query->result());
      $i =1;
      foreach ($query->result() as $key=>$val) {


        $bg_plate_color = "background-color: ".$val->plate_color;
//          $text_plate_color = "background-color: ".$val->txt_color;
        ?>


        <a id="car_<?=$val->id; ?>" class="a-select-car" style="text-decoration:none; margin-top:30px;" onclick="selectCarShops('<?=$val->id; ?>', '<?=$val->car_type; ?>', '<?=$val->car_type_txt; ?>');handleClick('car','<?=$val->id; ?>');">
          <input type="hidden" id="value_car_<?=$val->id; ?>" data-plate_num="<?=$val->plate_num; ?>" />
          <?php if($val->status_usecar == 1){
            $calss_box = 'cus_focus';
          }
          else{
            $calss_box = '';
          }
          ?>
          <table width="100%" border="0" id="div_car_<?=$val->id; ?>" class="<?=$calss_box;?> box_car" style="border: 0px solid #ddd;" >
            <tbody>
              <tr>
                <td width="30">
                  <!--<label class="container">-->
                    <?php 

                    if($val->status_usecar == 1 && count($query->result()) == 1){
                      ?>
                      <script>

                        $('#box_car').removeClass('borderBlink')
                        $('#nation_box').addClass('borderBlink')

                        selectCarShops('<?=$val->id; ?>', '<?=$val->car_type; ?>', '<?=$val->car_type_txt; ?>');
                      </script>
                      <ons-radio class="radio-fruit" input-id="radio-plate_num<?=$val->id; ?>" id="car_use_<?=$val->id; ?>" value="<?=$val->id; ?>" name="plate_num_1"   checked></ons-radio>

                    <?php }
                    else{
                      ?>
                      <ons-radio class="radio-fruit" input-id="radio-plate_num<?=$val->id; ?>" id="car_use_<?=$val->id; ?>" value="<?=$val->id; ?>" name="plate_num_1"  ></ons-radio>


                    <?php }
                    ?>

                    <!--<input type="checkbox" name="car"  value="1">-->
                    <!--<span class="checkmark"></span>-->
                    <!--</label>-->
                  </td>
                  <td>
                    <table width="100%" cellpadding="1" cellspacing="2">
                      <tbody>
                        <tr>
                          <td width="100" align="center" style="padding:1px; border-radius:5px;<?=$bg_plate_color; ?>">
                            <div style="border-radius:5px;border: 1px solid <?=$val->txt_color; ?>;"><font color="<?=$val->txt_color; ?>" class="font-17"><b><?=$val->plate_num; ?></font><br>
                              <font class="font-14" style="color: <?=$val->txt_color; ?>"><?=$val->tb_pro_name_th; ?></font></b></font></div>
                            </td>
                          </tr>
                        </tbody>
                      </table>

                    </td>

                  </tr>
                </tbody>
              </table>
            </a>    
            <?php  
            $i++;
          }
          ?>

        </div>


           <!--  <div class="form-group">
              <label class="font-17">เบอร์โทรศัพท์</label>
              <ons-row>
                <i class="material-icons res-input" onclick="$('#dri_phone').val('');
                        $('#dri_phone_x').hide();" id="dri_phone_x" style="display: block;">close</i>
                <ons-input id="dri_phone" name="dri_phone" type="number" pattern="\d*" maxlength="20" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;" onkeyup="hideRes('dri_phone');" placeholder="" value="<?=$data_dv->phone; ?>"></ons-input>
          </ons-row>
        </div> -->
      </div>

      <script>

      </script>
      <div class="card" id="nation_box" onclick="checformadd('nation_box')">
       <ons-list-header class="list-header "> เลือกสัญชาติ</ons-list-header>
       <div class="form-group">

        <!-- <span class="font-17"></span> -->
        <ons-list-item tappable id="nation_1">
         <label class=" left">
          <!--<ons-checkbox class="checkbox-color" name="persion_china" input-id="persion_china" value="0" onclick="selectnation(1)"></ons-checkbox>-->
          <ons-radio class="radio-fruit " input-id="radio-nation1" value="1" name="nation" onclick="handleClick('nation',this.value);"></ons-radio>
        </label>
        <label class="center" for="radio-nation1">
          <img src="assets/images/flag/China.png" width="25" height="25" alt="">&nbsp; <span class=" font-17">แขกจีน</span>
        </label>
      </ons-list-item>

      <ons-list-item tappable id="nation_2">
        <label class="left">
          <!--<ons-checkbox class="checkbox-color" name="persion_other" input-id="persion_other" value="0" onclick="selectnation2(1)"></ons-checkbox>-->
          <ons-radio class="radio-fruit " input-id="radio-nation2" value="2" name="nation" onclick="handleClick('nation',this.value);"></ons-radio>
        </label>
        <label class="center" for="radio-nation2">
          <img src="assets/images/flag/Other.png" width="25" height="25" alt="">&nbsp; <span class=" font-17">ต่างชาติ</span>
        </label>
      </ons-list-item>

      <ons-list-item tappable id="nation_3">
        <label class="left">
          <!--<ons-checkbox class="checkbox-color" name="persion_other" input-id="persion_other" value="0" onclick="selectnation2(1)"></ons-checkbox>-->
          <ons-radio class="radio-fruit " input-id="radio-nation3" value="3" name="nation" onclick="handleClick('nation',this.value);"></ons-radio>
        </label>
        <label class="center" for="radio-nation3">
          <img src="assets/images/flag/China.png" width="25" height="25" alt=""> + <img src="assets/images/flag/Other.png" width="25" height="25" alt="">&nbsp;
          <span class=" font-17">จีน + ต่างชาติ</span>
        </label>
      </ons-list-item>

    </div>


  </div>

  <div class="card" id="box_com" onclick="checformadd('box_com')">
    <!-- Agent Issu -->  
    <div class="" id="show_payment_detail" style="">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td>
              <ons-list-header class="list-header"> ค่าตอบแทน</ons-list-header>
              <!-- <div class="font-22" style="color:#3b5998"><b></b></div> -->
            </td>
            <td width="50" style="display: none;" id="row_accept_payment">
              <!-- <img src="images/checked.png" width="35px"> -->
            </td>
          </tr>
        </tbody>
      </table>
      <div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="">
          <tbody>
            <tr>
              <td width="100%">
                <input name="plan_setting" type="hidden" class="form-control" id="plan_setting" value="0">
                <script>
                      ///
                      $('#show_price_plan_1').click(function () {
                        $("#main_load_mod_popup_4").toggle();
                        var url_load_1 = "load_page_mod_4.php?name=booking/popup&file=price&shop_id=1&plan=1&lat=7.872888&lng=98.360599&type=stop";
                        $('#load_mod_popup_4').html(load_main_mod);
                        $('#load_mod_popup_4').load(url_load_1);
                      });
                    </script>                    
                    <div style=" border-bottom: dotted #999999 1px;padding: 10px 0px;"  class="nation_china">
                      <label class="center" for="price_plan_1">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr>
                              <td width="30" rowspan="2" align="center" style="display: nones;">
                                <label class="left list-item__left">
                                  <!--<ons-checkbox class="checkbox-color" name="persion_china" input-id="persion_china" value="0" onclick="selectnation(1)"></ons-checkbox>-->
                                  <ons-radio class="radio-fruit radio-nation" input-id="price_plan_1" value="1" name="price_plan" ></ons-radio>

                                </label>

                                <!-- <input type="radio" name="price_plan" class="price_plan_select genaral" value="1" id="" /> -->
                              </td>
                              <td class="font-17"> ค่าจอด + ค่าหัว </td>
                              <!--<td width="35" rowspan="2" valign="middle"><a id="show_price_plan_1"><i class="fa fa-search" style=" color:#666666;font-size:18px;"> </i></a></td>-->
                            </tr>
                            <tr>
                              <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tbody>
                                    <tr>
                                      <td  class="font-17"> 
                                        <img src="assets/images/flag/China.png" align="absmiddle" width="25" height="25" alt="" >
                                        <span >&nbsp;จีน  </span>
                                        <span style="display:show">จอด  1100&nbsp;</span>
                                        <span style="display:show">หัว  200&nbsp;</span>
                                        <!-- <span style="display:none">ค่าคอม  0 %&nbsp;</span> -->

                                      </td>
                                    </tr>
                                  </tbody>
                                </table>

                                         <!-- <table width="100%" border="0" cellspacing="1" cellpadding="1" >
  <tbody>
     <tr>
        <td width="80"><img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-14">&nbsp;ต่างชาติ</td>
        <td>
           <span style="display:noneshow">ค่าจอด  <b>200</b>&nbsp;</span>
           <span style="display:noneshow">ค่าหัว  <b>0</b>&nbsp;</span>
           <span style="display:none">ค่าคอมมิชชั่น  <b>0 %</b>&nbsp;</span>
           &nbsp;
        </td>
     </tr>
  </tbody>
</table> -->

</td>
</tr>
</tbody>
</table>
</label>
</div>
<script>
                      ///
                      $('#show_price_plan_2').click(function () {
                        $("#main_load_mod_popup_4").toggle();
                        var url_load_1 = "load_page_mod_4.php?name=booking/popup&file=price&shop_id=1&plan=2&lat=7.872888&lng=98.360599&type=stop";
                        $('#load_mod_popup_4').html(load_main_mod);
                        $('#load_mod_popup_4').load(url_load_1);
                      });
                    </script>                    
                    <!--  <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 1px;padding: 10px 0px;" >
                        <table width="100%" border="0" cellspacing="1" cellpadding="3" >
                           <tbody>
                              <tr>
                                 <td width="30" rowspan="2" align="center">
                                   
                                 <td class="font-16"><b> ค่าคอมมิชชั่น</b> </td>
                                 <td width="35" rowspan="2"><a id="show_price_plan_2"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
                              </tr>
                              <tr>
                                 <td>
                                                                               
                                                                              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                       <tbody>
                                          <tr>
                                             <td width="80"><img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/>
                                                <span class="font-14">ต่างชาติ</span>
                                             </td>
                                             <td>
                                                <span style="display:none">ค่าจอด  <b>200</b>&nbsp;</span>
                                                <span style="display:none">ค่าหัว   <b>0</b>&nbsp;</span>
                                                <span style="display:noneshow">ค่าคอมมิชชั่น   <b>5 %</b>&nbsp;</span>
                                                &nbsp;
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                     
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                      </div> -->
                      <script>
                      ///
                      $('#show_price_plan_3').click(function () {
                        $("#main_load_mod_popup_4").toggle();
                        var url_load_1 = "load_page_mod_4.php?name=booking/popup&file=price&shop_id=1&plan=25&lat=7.872888&lng=98.360599&type=stop";
                        $('#load_mod_popup_4').html(load_main_mod);
                        $('#load_mod_popup_4').load(url_load_1);
                      });
                    </script>                    
                    <div class=" " style="border-bottom: dotted #999999 0px;padding: 10px 0px;" >
                      <label class="center" for="price_plan_3">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr>
                              <td width="30" rowspan="2" align="center" style="display: nones;">
                                <label class="left list-item__left">
                                  <ons-radio class="radio-fruit radio-nation" input-id="price_plan_3" value="3" name="price_plan"></ons-radio>
                                </label>
                                <!-- <input type="radio" name="price_plan" class="price_plan_select genaral" value="2" id="price_plan_3" /></td> -->
                              </td><td class="font-17"> ค่าจอด + ค่าคอม </td>
                              <!--<td width="35" rowspan="2"><a id="show_price_plan_3"><i class="fa fa-search" style=" color:#666666;font-size:18px;"> </i></a></td>-->
                            </tr>
                            <tr>
                              <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="nation_china">
                                  <tbody>
                                    <tr>
                                      <td class="font-17"> 
                                        <img align="absmiddle" src="assets/images/flag/China.png" width="25" height="25" alt="" >
                                        <span >&nbsp;จีน </span>

                                        <span style="display:noneshow">จอด  600&nbsp;</span>
                                        <!-- <span style="display:none">ค่าหัว  0&nbsp;</span> -->
                                        <span style="display:noneshow">คอม  5 %</span>

                                      </td>
                                    </tr>
                                  </tbody>
                                </table>


                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="nation_order">
                                  <tbody>
                                    <tr>
                                      <td class="font-17">
                                        <img src="assets/images/flag/Other.png" align="absmiddle" width="25" height="25" alt="" >
                                        <span >&nbsp;ต่างชาติ</span>

                                        <span style="display:noneshow" id="text_price_order">จอด&nbsp;200&nbsp;</span>
                                        <!-- <span style="display:none">ค่าหัว200&nbsp;</span> -->
                                        <!-- <span style="display:noneshow">ค่าคอมมิชชั่น<b>5 %</b>&nbsp;</span> -->

                                      </td>
                                    </tr>
                                  </tbody>
                                </table>

                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </label>
                    </div>
                    <!--</select>-->
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>




      <div class="card" id="num_customer" onclick="checformadd('num_customer')">
        <ons-list-header class="list-header "> จำนวนคน</ons-list-header>
        <div class="form-group">


          <!-- <label class="font-17">จำนวนคน</label> -->

          <ons-row>
            <ons-col>
              <ons-input id="adult" name="adult" type="number" pattern="\d*" placeholder="ผู้ใหญ่" maxlength="20" class="font-17" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
            </ons-col>
            &nbsp;
            &nbsp;
            <ons-col>
              <ons-input id="child" name="child" type="number" pattern="\d*" placeholder="เด็ก" maxlength="20" class="font-17" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;" onchange="checkchild(this.value)"></ons-input>
            </ons-col>
          </ons-row>
        </div>
      </div>
      <div class="card" id="box_time" onclick="checformadd('box_time')">
       <ons-list-header class="list-header ">ใช้เวลาเดินทาง </ons-list-header>
       <div class="form-group">

        <!-- <span class="list-header" style="background-image: none;"></span> -->

        <select class="select-input font-17" name="time_num" id="time_num" value="" onchange="checktime(this.value)" style="border-radius: 0px;padding: 5px;width: 100%; width: 100%;">
          <option value="0">-- เลือกเวลา --</option>
          <?php
          $time = array("5" => "5 นาที",
            "10" => "10 นาที",
            "15" => "15 นาที",
            "20" => "20 นาที",
            "25" => "25 นาที",
            "30" => "30 นาที",
            "35" => "35 นาที",
            "40" => "40 นาที",
            "45" => "45 นาที",
            "50" => "50 นาที",
            "55" => "55 นาที",
            "60" => "1 ชัวโมง.",
            "90" => "1 ชัวโมง 30 นาที",
            "120" => "2 ชัวโมง",
            "150" => "2 ชัวโมง 30 นาที",
            "180" => "3 ชัวโมง",
            "210" => "3 ชัวโมง 30 นาที",
            "240" => "4 ชัวโมง",
            "270" => "4 ชัวโมง 30 นาที",
            "300" => "5 ชัวโมง",
            "330" => "5 ชัวโมง 30 นาที",
            "360" => "6 ชัวโมง",
            "390" => "6 ชัวโมง 30 นาที",
            "420" => "7 ชัวโมง",
            "450" => "7 ชัวโมง 30 นาที",
            "490" => "8 ชัวโมง");
          $mm = 5;
          ?>

          <?php foreach ($time as $key => $at) { ?>
            <option value="<?=$key; ?>"><?=$at; ?></option>
          <?php }
          ?>

        </select>

      </div>
    </div>


  </div>
</form>
<div style="padding: 0px 10px;margin-bottom: 10px;">
  <?php 
  if(count($val) != 0){
      // echo count($val);
    ?>
    <ons-button style="background-color: #fff;" modifier="outline" class="button-margin button button--outline button--large font-17" onclick="submitShop();" id="btn_submitadd">ยืนยันข้อมูลส่งแขก</ons-button>

  <?php } ?>
</div>

</div>