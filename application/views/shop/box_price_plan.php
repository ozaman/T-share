 <?php
 // $_where = array();
 // $_where['i_shop_country_icon'] = $_GET[i_plan_pack];
 // $_select = array('*');
 // $_order = array();
 // $_order['id'] = 'asc';
 // $data['list_plan'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_TAXI,$_where,$_select,$_order);
$_where = array();
                    $_where['id'] = $_GET[i_plan_pack];
                    $_select = array('*');
                    $PLAN_PACK = $this->Main_model->rowdata(NEW_TBL_PLAN_PACK,$_where);
 $_where = array();
          $_where['i_plan_pack'] = $_GET[i_plan_pack];
          $_select = array('*');
          $_order = array();
          $_order['id'] = 'asc';
          $data['list_plan'] = $this->Main_model->fetch_data('','',NEW_TBL_PLAN_PACK_LIST,$_where,$_select,$_order);
           echo '<pre>';
 print_r($data['list_plan']);
 echo '</pre>';

 ?>
 <input name="plan_setting" type="hidden" class="form-control" id="plan_setting" value="<?=$_GET[i_plan_pack];?>" />
 <?php

 foreach($data['list_plan'] as $key=>$val){

  $_where = array();
                    $_where['id'] = $PLAN_PACK->i_country; 
                    $_select = array('country_code','id','name_th');
                    $COUNTRY = $this->Main_model->rowdata(TBL_WEB_COUNTRY,$_where,$_select);
print_r(json_encode($COUNTRY));
  
  // print_r(TBL_SHOP_COUNTRY_COM_LIST_TAXI);
  $_where = array();
  $_where['i_shop_country_com_list'] = $val->id;
  $_select = array('*');
  $_order = array();
  $_order['id'] = 'asc';
  $data['list_price'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_PRICE_TAXI,$_where,$_select,$_order);
  // print_r( $data['list_price']);
  if($_GET[user_sc]!=""){
  	$btn_onclick = "handleClick_s('box_com',".$val->id.")";
  }else{
  	$btn_onclick = "selectPlanRegis(".$val->id.");";
  }

  if($_GET[plan_id]==$val->id){
  	$check_plan = "checked";
  }else{
  	$check_plan = "";
  }
  ?>
  <div style=" border-bottom: dotted #999999 1px;padding: 10px 0px;"  class="nation_china"  onclick="<?=$btn_onclick;?>">
    <label class="center" for="price_plan_<?=$val->id;?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td  valign="top" width="30" rowspan="2" align="center" style="display: nones;">
              <label class="left list-item__left" style="padding-top: 0">
                <ons-radio class="radio-fruit radio-nation" input-id="price_plan_<?=$val->id;?>" value="<?=$val->id;?>" name="price_plan" <?=$check_plan;?> ></ons-radio>
              </label>
            </td>
            <td class="font-17">
              <?php
              foreach($data['list_plan'] as $key3=>$val2){
                 $_where = array();
                $_where[id] = $val2->i_plan_main;
                $this->db->select('id,s_topic');
                $query_main = $this->db->get_where(NEW_TBL_PLAN_MAIN,$_where);
                $main = $query_main->row();

                print_r(json_encode($main));
                echo $main->s_topic;

                $_where = array();
                $_where[id] = $val2->i_con_plan_main_list;
                $this->db->select('id,s_topic');
                $query_mainlist = $this->db->get_where(NEW_TBL_PLAN_MAIN_LIST,$_where);
                $mainlist = $query_mainlist->row();
                if($val2->i_con_plan_main_list>0){
                  $icon_btn_add = '<i class="fa fa-cogs" aria-hidden="true"></i>';
                  $txt_btn_add = $mainlist->s_topic;
                }else{
                  $icon_btn_add = '<i class="fa fa-plus" aria-hidden="true"></i>';
                  $txt_btn_add = 'เพิ่ม';
                }
                if (count($data['list_plan']) == 2) {
                  if ($key3 == 0) {
                   $count = '+';
                 }
                 else{
                  $count = '';
                }

              }
              else{
                $count = '';

              }



                // echo $val2->s_topic_en;
              if ($val2->s_topic_en == 'park') {
                $price_park_unit = $val2->i_price;
                $price_person_unit = '';
                $commission_persent = '';
                ?>
                <input type="hidden" name="price_park_unit" value="<?=$price_park_unit;?>">

                <?php
                  # code...
              }
              if ($val2->s_topic_en == 'person') {
                $price_park_unit = '';
                $price_person_unit = $val2->i_price;
                $commission_persent = '';
                ?>
                <input type="hidden" name="price_person_unit" value="<?=$price_person_unit;?>">
                <?php
                  # code...
              }
              if ($val2->s_topic_en == 'comision') {
                $price_park_unit = '';
                $price_person_unit = '';
                $commission_persent = $val2->i_price;
                ?>
                <input type="hidden" name="commission_persent" value="<?=$commission_persent;?>">
                <?php
                  # code...
              }
              ?>
              <!-- <input type="hsiddens" name="price_park_total" value="<?=$val2->i_price;?>"> -->
              <span style=""><?=$val2->s_topic_th;?> <?=$count;?> </span>

               <!--  <button class="btn btn-default" style="font-size: 14px;"><?=$main->s_topic;?></button>
                <button class="btn btn-primary" onclick="editCondition('<?=$val->id;?>', '<?=$val->s_topic;?>', '<?=$main->id;?>', '<?=$val->i_country;?>');">
                  <?=$icon_btn_add;?>
                  <span id="txt_mainlist_<?=$val->id;?>"><?=$txt_btn_add;?></span>
                </button> -->
              <!-- <span style="display:show">หัว  200&nbsp;</span> -->
            <?php }?>
          </td>
        </tr>
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td  class="font-17" > 
                    <?php 
                    $_where = array();
                    $_where['i_shop_country'] = $_GET[i_country]; 
                    $_select = array('*');
                    $arr[region_icon] = $this->Main_model->rowdata(TBL_SHOP_COUNTRY_ICON_TAXI,$_where);
                      // print_r(TBL_SHOP_COUNTRY_ICON_TAXI);
                    $_where = array();
                    $_where['id'] = $arr[region_icon]->i_country; 
                    $_select = array('name_th');
                    $arr[country] = $this->Main_model->rowdata(TBL_WEB_COUNTRY,$_where);
                    ?>
 <img src="assets/images/flag/icon/<?=$COUNTRY->country_code;?>.png" width="25" height="25" alt="">&nbsp; <span class=" font-17"><?=$COUNTRY->name_th;?></span>
                   <!--  <img src="assets/images/flag/icon/<?=$arr[region_icon]->s_country_code;?>.png" align="absmiddle" width="25" height="25" alt="" >
                    <span >&nbsp;<?=$arr[country]->name_th;?>  </span> -->

                  </td>
                  <td></td>
                </tr>
                <tr>


                  <td>
                    <table width="100%">
                      <?php 
                      foreach($data['list_price'] as $key=>$val2){
                        if ($val2->s_topic_en == 'comision') {
                          $curen = '';
                        }
                        else{
                          $curen = 'บ.';
                        }
                        // echo $val2->id;
                        if ($val2->i_plan_product_price_name == 5) {
                          $_where = array();
                          $_where['i_plan_product_price_name'] = $val2->i_plan_product_price_name; 
                          $_where['i_list_price'] = $val2->id;
                          $_where['i_car_type'] = $_GET[car_type]; 
                      // $_where['i_country_icon'] = $_GET[i_country]; 
                          $_where['i_shop'] = $_GET[i_shop]; 
                          $_select = array('*');
                          $PRICE_TAXI = $this->Main_model->rowdata(TBL_SHOP_CAR_PRICE_TAXI,$_where);
                          $res = array();
                          $res[where] = $_where;
                          $res[PRICE_TAXI] = $PRICE_TAXI;
                      // print_r(json_encode($res));
                          $price = $PRICE_TAXI->i_price_park;

                        }
                        else if ($val2->i_plan_product_price_name == 7) {
                          $price = '';
                          
                        }
                        else{
                          $price = $val2->i_price;
                        }
                        ?>
                        <tr>
                          <td>
                            <table width="100%">
                              <tr>
                                <td width="64"><span><?=$val2->s_topic_th;?></span></td>
                                <td align="left"><span><?=$price;?>&nbsp;&nbsp;<?=$curen;?></span></td>
                                <td width="64"><span><?=$val2->s_payment;?></span></td>
                              </tr>
                            </table>
                            <div style="margin-left: 15px">
                            <table width="100%">

                              <?php
                              if ($val2->i_plan_product_price_name == 7) {
                              $_where = array();
                              $_where[product] = $_GET[i_shop];
                              $_where[i_list_price] = $val2->id;
                              $_select = array('*');
                              $_order = array();
                              $_order['id'] = 'asc';
                              $PERCENT_TAXI = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_TYPELIST_PERCENT_TAXI,$_where,$_select,$_order);
                              // print_r(json_encode($PERCENT_TAXI));

                              foreach ($PERCENT_TAXI as $dataTL) {
                                $s_sub_typelist = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,array('id' => $dataTL->i_main_typelist));

                                ?>
                                <tr>

                                 <td width="150">

                                  <label class="btn checkbox-inline btn-checkbox-success-inverse <?=$chk_box_active;?> "><?=$s_sub_typelist->topic_th;?>
                                </label>

                              </td>
                              <td  class="td_percent"><?=$dataTL->f_percent;?> %</td>
                            </tr>
                          <?php }?>
                       
                      <?php  } ?>
                       </table>
                     </div>
                        </td>
                      </tr>


                    <?php }?>
                  </table>
                </td>
                <td>

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
<?php } ?>

<?php 
if($_GET[user_sc]!=""){	?>
  <script>
   setTimeout(function() {
    var form = document.getElementById("form_booking");
    var chk = '<?=count($data['list_plan']);?>';
    if ( chk == 1 ) {
      $('#box_com').removeClass('borderBlink');
      $('#price_plan_<?=$data['list_plan'][0]->id;?>').prop('checked',true);

    }
    if (form.elements["plate_num_1"].value == 0) {
      $('#box_car').addClass('borderBlink')
      $('html, body').animate({
        scrollTop: $('#box_com').offset().top
      }, 300, function() {

        $("#box_com").focus()

        window.location.href = "#box_car";
      });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value == 0) {
      $('#nation_box').addClass('borderBlink')
      console.log(this.hash)

      $('html, body').animate({
        scrollTop: $('#box_com').offset().top
      }, 300, function() {

        $("#box_com").focus()

        window.location.href = "#nation_box";
      });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && chk == 2) {
      $('#btn_submitadd').removeClass('borderBlink')

      $('.card').removeClass('borderBlink')
      $('#box_com').addClass('borderBlink')
      console.log(this.hash)

      $('html, body').animate({
        scrollTop: $('#box_com').offset().top
      }, 300, function() {

        $("#box_com").focus()

        window.location.href = "#box_com";
      });
      return false;
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && chk == 1 && $('#child').val() == '' && $('#adult').val() == '') {
      $('#num_customer').addClass('borderBlink')
      console.log(this.hash)

      $('html, body').animate({
        scrollTop: $('#num_customer').offset().top
      }, 300, function() {

        $("#adult").focus()

        window.location.href = "#num_customer";
      });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value != 0 && $('#child').val() != '' && $('#adult').val() != '') {
      $('#num_customer').removeClass('borderBlink')
      if (form.elements["time_num"].value == 0) {
        $('#box_time').addClass('borderBlink')
        $('#time_num').focus()
      } else {
        $('#box_time').removeClass('borderBlink')
        $('#btn_submitadd').addClass('borderBlink')

        $('#child').focusout();
      }


    }
    console.log(chk)
  }, 700);
</script>
<?php }	?>