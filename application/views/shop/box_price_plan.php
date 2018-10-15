 <?php
 $_where = array();
 $_where['i_shop_country_icon'] = $_GET[i_country];
 $_select = array('*');
 $_order = array();
 $_order['id'] = 'asc';
 $data['list_plan'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_TAXI,$_where,$_select,$_order);

 ?>
 <input name="plan_setting" type="hidden" class="form-control" id="plan_setting" value="<?=$_GET[i_country];?>" />
 <?php

 foreach($data['list_plan'] as $key=>$val){
  // print_r(TBL_SHOP_COUNTRY_COM_LIST_TAXI);
  $_where = array();
  $_where['i_shop_country_com_list'] = $val->id;
  $_select = array('*');
  $_order = array();
  $_order['id'] = 'asc';
  $data['list_price'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_PRICE_TAXI,$_where,$_select,$_order);
  // print_r( $data['list_price']);
  ?>
  <div style=" border-bottom: dotted #999999 1px;padding: 10px 0px;"  class="nation_china">
    <label class="center" for="price_plan_<?=$val->id;?>" onclick="handleClick('box_com','<?=$val->id;?>')">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td  valign="top" width="30" rowspan="2" align="center" style="display: nones;">
              <label class="left list-item__left" style="padding-top: 0">
                <ons-radio class="radio-fruit radio-nation" input-id="price_plan_<?=$val->id;?>" value="<?=$val->id;?>" name="price_plan" ></ons-radio>
              </label>
            </td>
            <td class="font-17">
              <?php
              foreach($data['list_price'] as $key3=>$val2){
                if (count($data['list_price']) == 2) {
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
                if ($val2->s_topic_en == 'park') {
                  $price_park_unit = $val2->i_price;
                  $price_person_unit = '';
                  $commission_persent = '';

                  # code...
                }
                if ($val2->s_topic_en == 'person') {
                  $price_park_unit = '';
                  $price_person_unit = $val2->i_price;
                  $commission_persent = '';
                  # code...
                }
                if ($val2->s_topic_en == 'comision') {
                  $price_park_unit = '';
                  $price_person_unit = '';
                  $commission_persent = $val2->i_price;

                  # code...
                }
                ?>
                <input type="hidden" name="price_park_unit" value="<?=$price_park_unit;?>">
                <input type="hidden" name="price_person_unit" value="<?=$price_person_unit;?>">
                <!-- <input type="hiddens" name="price_park_total" value="<?=$val2->i_price;?>"> -->
                <input type="hidden" name="commission_persent" value="<?=$commission_persent;?>">
                <span style=""><?=$val2->s_topic_th;?> <?=$count;?> </span>
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

                      <img src="assets/images/flag/icon/<?=$arr[region_icon]->s_country_code;?>.png" align="absmiddle" width="25" height="25" alt="" >
                      <span >&nbsp;<?=$arr[country]->name_th;?>  </span>
                      
                    </td>
                    <td></td>
                  </tr>
                  <tr>

                    
                    <td>
                      <table width="100%">
                        <?php 
                      foreach($data['list_price'] as $key=>$val2){
                        if ($val2->s_payment == 'โอน') {
                          $curen = '%';
                        }
                        else{
                          $curen = 'บ.';
                        }
                        ?>
                        <tr>
                          <td>
                            <table width="100%">
                              <tr>
                                <td width="64"><span><?=$val2->s_topic_th;?></span></td>
                                <td align="left"><span><?=$val2->i_price;?>&nbsp;&nbsp;<?=$curen;?></span></td>
                                <td width="64"><span><?=$val2->s_payment;?></span></td>
                              </tr>
                            </table>
                            
                          </td>
                        </tr>
                        
                        <!-- <span style="display:show">หัว  200&nbsp;</span> -->
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


<script >
   setTimeout(function() {
    var form = document.getElementById("form_booking");
  var chk = '<?=count($data['list_plan']);?>';
  if ( chk == 1 ) {
    $('#box_com').removeClass('borderBlink');
    $('#price_plan_<?=$data['list_plan'][0]->id;?>').prop('checked',true);
    
  }
  // else{
  // // $('#price_plan').val('');
  //    $('#box_com').addClass('borderBlink');
  // }
  // $('#' + tax).removeClass('borderBlink')
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
   }, 1000);
</script>
