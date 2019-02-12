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
 //           echo '<pre>';
 // print_r($data['list_plan']);
 // echo '</pre>';
 $_where = array();
                    $_where['id'] = $PLAN_PACK->i_country; 
                    $_select = array('country_code','id','name_th');
                    $COUNTRY = $this->Main_model->rowdata(TBL_WEB_COUNTRY,$_where,$_select);
 ?>
 <input name="plan_setting" type="hidden" class="form-control" id="plan_setting" value="<?=$_GET[i_plan_pack];?>" />
 <div style=" border-bottom: dotted #999999 1px;padding: 10px 0px;"  class="nation_china"  onclick="<?=$btn_onclick;?>">
    <label class="center" for="price_plan_<?=$val->id;?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <!-- <td width="30"></td> -->
                  <td colspan="2"  class="font-17" width="100%" > 
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
 <img src="assets/images/flag/icon/<?=$COUNTRY->country_code;?>.png" width="25" height="25" alt="">&nbsp; <span class=" font-17"><?=$COUNTRY->name_th;?></span><span style="margin-left: 5px">(<?=$PLAN_PACK->s_topic?>)</span>
                   <!--  <img src="assets/images/flag/icon/<?=$arr[region_icon]->s_country_code;?>.png" align="absmiddle" width="25" height="25" alt="" >
                    <span >&nbsp;<?=$arr[country]->name_th;?>  </span> -->

                  </td>
                 
                </tr>
          <tr>
            <td  valign="top" width="30" rowspan="2" align="center" style="display: nones;">
              <label class="left list-item__left" style="padding-top: 0">
                <ons-radio class="radio-fruit radio-nation" value="1" input-id="price_plan_<?=$val->id;?>" value="<?=$val->id;?>" name="price_plan" checked ></ons-radio>
              </label>
            </td>
            <td class="font-17">
 <?php

 foreach($data['list_plan'] as $key=>$val){

 
// print_r(json_encode($COUNTRY));
  
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
  
            
              <?php
              
                 $_where = array();
                $_where[id] = $val->i_plan_main;
                $this->db->select('id,s_topic');
                $query_main = $this->db->get_where(NEW_TBL_PLAN_MAIN,$_where);
                $main = $query_main->row();

                // print_r(json_encode($main));
                // echo count($data['list_plan']).'---------';
                // echo $main->s_topic.'************';

                $_where = array();
                $_where[id] = $val->i_con_plan_main_list;
                $this->db->select('id,s_topic');
                $query_mainlist = $this->db->get_where(NEW_TBL_PLAN_MAIN_LIST,$_where);
                $mainlist = $query_mainlist->row();

                $partner_g = 2;
//echo $partner_g;
$_where = array();
$_where[id] = $val->i_con_plan_main_list;;
$this->db->select('*');
$query = $this->db->get_where(NEW_TBL_PLAN_MAIN_LIST,$_where);
 //          echo '<pre>';
 // print_r($query->result());
 // echo '</pre>';
// print_r($query->result());
               
                if (count($data['list_plan']) == 2) {
                  if ($key == 0) {
                   $count = '+';
                 }
                 else{
                  $count = '';
                }

              }
              else{
                $count = '';

              }
              
              if($val->i_con_plan_main_list>0){
                 
                  $txt_btn_add = $mainlist->s_topic;
                }else{
                  
                  $txt_btn_add = 'เพิ่ม';
                }
                ?>
                
 <span style=""><?=$main->s_topic;?>  (<?=$txt_btn_add;?>) <?=$count;?></span>




<?php
$_where = array();
    $_where[i_plan_pack] = $_GET[i_plan_pack];
    $_where[id] = $val->i_con_plan_main_list;
    $this->db->select('i_con_plan_main_list, id');
    $querys = $this->db->get_where(TBL_PLAN_PACK_LIST,$_where);
    $con_pack = $querys->row();
    // echo '-------------'.'<Br>';
    // print_r($con_pack);//------------------------------

    $_where = array();
    $_where['t2.i_plan_main'] = $val->i_con_plan_main_list;
    $_where['t1.i_shop'] = $PLAN_PACK->i_shop;
    $_where['t1.i_country'] = $PLAN_PACK->i_country;
    $_where['t1.i_partner'] = 2;
    $this->db->select('*');
    $this->db->from(TBL_PLAN_PACK." as t1");
    $this->db->join(TBL_PLAN_PACK_LIST." as t2",'t1.id = t2.i_plan_pack');
    $this->db->where($_where);
    $con_ref = $this->db->get();
    $con_ref = $con_ref->row();

 $person = 0;
    foreach ($query->result() as $key => $val2) {
//      echo $con_pack->i_con_plan_main_list." ++++ ".$_GET[pack_id];

      $tbl = $val2->s_tbl;
      $_where = array();
      $_where[i_plan_pack] = $_GET[i_plan_pack];
      $_where[i_status] = 1;
      $this->db->select('*');
      $query_con_tb = $this->db->get_where($tbl,$_where);
      $con = $query_con_tb->row();
      // print_r($con);//------------------------------------

      // if ($con_pack->i_con_plan_main_list == $val2->id) {
      //   $selected = "checked";
      //   $open_box = "";
      //   $box_other = "";
      // }
      // else {
      //   $selected = "";
      //   $open_box = "display:none;";
      //   $box_other = "display:none;";
      // }
      ?>
      
      <div >
        <?php
        if ($val2->id == 1) {
          ?>
          <div style="<?=$box_other;?>">
            
           
           
            <table class="table" width="100%" style="margin-bottom: 5px;">
                <tr>
                  <td width="70" align="center" ><b style="font-size:16px;">จำนวน</b></td>
                  <!-- <td ></td> -->
                  <td align="center"><b style="font-size:16px;">ราคา</b></td>
                  <!-- <td align="center"><b style="font-size:16px;">ภาษี ณ ที่จ่าย</b></td> -->
                </tr>
              <?php
              $_where = array();
              $_where[i_plan_pack] = $con_ref->i_plan_pack;
              $this->db->select('*');
              $query_data_ep = $this->db->get_where(TBL_CON_EACH_PERSON,$_where);
              foreach ($query_data_ep->result() as $key => $value) {
                ?>
                <tr>
                  <td align="center">
                    <span style="font-size:16px;"><?=$value->i_person_up;?></span>
                  </td>
                  <!-- <td align="center"><span  style="font-size:16px;">ขึ้นไป</span></td> -->
                  <td align="center"><span style="font-size:16px;"><?=$value->f_price;?></span></td>
                  <!-- <td align="right"><span style="font-size:16px;"><?=$value->f_wht;?> %</span></td> -->
                </tr>
              <?php }
              ?>
            </table>
           
          </div>
          <?php
        }
        else if ($val2->id == 2) {
          $_where = array();
          $_where[status] = 1;
          $this->db->select('*');
          $query = $this->db->get_where(TBL_WEB_CAR_USE_TYPE,$_where);
          ?>
          <div style="<?=$box_other;?>">
            

            
              <table width="100%">
                <tr>
                  <th style="text-align: left;"><b style="font-size: 16px;">รายการ</b></th>
                  <th   style="text-align: center;"><b style="font-size: 16px;">ราคา(ร้านค้า)</b></th>
                  <!-- <th style="text-align: center;"><b style="font-size: 16px;">ราคา</b></th>
                  <th style="text-align: center;"><b style="font-size: 16px;">ภาษี ณ ที่จ่าย(ร้านค้า)</b></th>
                  <th style="text-align: center;"><b style="font-size: 16px;">ภาษี ณ ที่จ่าย</b></th> -->
                </tr>
                <?php
                foreach ($query->result() as $key => $val) {
                  $_where = array();
                  $_where[i_car_type] = $val->id;
                  $_where[i_plan_pack] = $_GET[i_plan_pack];
                  $this->db->select('*');
                  $query_c = $this->db->get_where(TBL_CON_EACH_CAR,$_where);
                  $data_car = $query_c->row();

                  if ($data_car->i_status > 0) {
                    $selected_car = "checked";
                    $active_box = "active";
                    $disabled_box_price = "";
                    $disabled_box_vat = "";
                    $disabled_box_wht = "";
                    $val_chk = 1;
                  }
                  else {
                    $selected_car = "";
                    $active_box = "";
                    $disabled_box_price = "disabled";
                    $disabled_box_vat = "disabled";
                    $disabled_box_wht = "disabled";
                    $val_chk = 0;
                  }
                  $_where = array();
                  $_where[i_plan_pack] = $con_ref->id;
                  $_where[i_car_type] = $val->id;
                  $this->db->select('*');
                  $q_car_ref = $this->db->get_where(TBL_CON_EACH_CAR,$_where);
                  $data_car_ref = $q_car_ref->row();
//                  print_r($data_car_ref->row());
                  if ($q_car_ref->num_rows() > 0) {
                    $tr_show_cartype = '';
                  }
                  else {
                    $tr_show_cartype = 'display:none;';
                  }
                  ?>
                  <tr id="tr_list_type_car_<?=$val->id;?>" style="<?=$tr_show_cartype;?>">
                    <td>
                      <span style="font-size:14px;"><?=$val->name_th;?></span>
                      
                    </td>
                    <td align="center">
                      <span><?=$data_car_ref->f_price;?></span>
                    </td>
                   <!--  <td align="center">
                      <span class="form-control"   style="width:80%;"  ><?=$data_car->f_price;?></span>
                    </td>
                    <td align="right">
                      <span><?=$data_car_ref->f_wht;?></span>
                    </td>
                    <td align="center">
                      <span class="form-control"   style="width:80%;" ><?=$data_car->f_wht;?></span>
                    </td> -->
                  </tr>

                <?php }
                ?>
              </table>
            
          </div>
          <?php
        }
        else if ($val->id == 3) {
          ?>
          <div style="<?=$box_other;?>">          
           
              <div class="col-md-12">
              
                  <table class="tb-pad" width="100%">
                    <tr>
                      <td align="center"><b style="font-size: 16px;">คนละ</b></td>
                      <td></td>
                      <!-- <td align="center" width="220px"><b style="font-size: 16px;">ถอด vat%</b></td>
                      <td></td>
                      <td  -->align="center"><b style="font-size: 16px;">ภาษี ณ ที่จ่าย</b></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="input-group">
                          <span class="input-group-addon">จำนวน</span>
                          <span class="form-control" ><?=$con->f_price;?></span>
                        </div>
                      </td>
                      <td width="30"></td>
                      <!-- <td>
                        <span class="form-control"  ><?=$con->f_vat;?></span>
                      </td>
                      <td width="30"></td>
                      <td>
                        <span class="form-control"  ><?=$con->f_wht;?></span>
                      </td>
                      <td>
                        
                      </td> -->
                    </tr>
                  </table>
                
              </div>
            
          </div>
          <?php
        }
         else if ($val2->id == 4) {
          ?>
          <div>
                <table class="tb-pad" width="100%">
                  <tr>
                    <td align="center"  width="80"><b style="font-size: 16px;">จำนวนคน</b></td>
                    <td></td>
                    <td align="center"><b style="font-size: 16px;">ราคา</b></td>
                    <td></td>
                    <!-- <td align="center" width="220px"><b style="font-size: 16px;">vat%</b></td> -->
                    <!-- <td></td> -->
                    <!-- <td align="center"><b style="font-size: 16px;">ภาษี ณ ที่จ่าย</b></td> -->
                  </tr>
                  <?php

                  foreach ($query_con_tb->result() as $key => $val) {
                    ?>

                    <tr class="tr_regis_only" id="id_tr_regis_<?=$val->id;?>">
                      <td align="center">
                        <span style="font-size:16px;"><?=$person = $person + 1;?>  คน</span>
                      </td>
                      <td width="30"></td>
                      <td><span class="form-control"   ><?=$val->f_price;?></span></td>
                      <td width="30"></td>
                      <!-- <td> -->
                        <!-- <span class="form-control"  ><?=$val->f_vat;?></span> -->
                      <!-- </td> -->
                      <!-- <td width="30"></td> -->
                      <!-- <td> -->
                        <!-- <span class="form-control"    ><?=$val->f_wht;?></span> -->
                     <!-- / </td> -->
                      <!-- <td> -->
                        
                      <!-- </td> -->
                    </tr>

                    <?php
                  }
                  ?>
                </table>
          
            
          </div>
          <?php
        }
        else if ($val2->id == 5) {

                      $_where = array();
                      $_where[i_plan_pack] = $con_ref->i_plan_pack;
                      $this->db->select('*');
                      $query_data_product_type = $this->db->get_where(TBL_CON_COM_PRODUCT_TYPE,$_where);
          // $_where = array();
          // $_where['id'] = $PLAN_PACK->i_shop; 
          // $_select = array('*');
          // $PRODUCT_SUB = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_SUB,$_where,$_select);
          // $_where = array();
          // $_where[main] = $PRODUCT_SUB->main;
          // $_where[sub] = $PRODUCT_SUB->id;
          // $_where[i_status] = 1;
          // $sub_type_list = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$_where,'',array('id' => 'asc'));
 //           echo '<pre>';
 // print_r($sub_type_list);
 // echo '</pre>';
          ?>
          <div style="<?=$box_other;?>">
            <div class="col-md-12">
              <div class="form-group ">
                <table width="100%" class="tb-pad">
                  <tr>
                    <td style=""><b>รายการ</b></td>
                    <!-- <td style="width: 150px;text-align: center;"><b> Vat %</b></td> -->

                    <td style="width: 100px;text-align: center;"><b>คอม %</b></td>

                    <!-- <td style="width: 150px;text-align: center;"><b>ภาษี ณ ที่จ่าย</b></td> -->
                  </tr>
                  <?php
//                echo count($sub_type_list);
                  foreach ($query_con_tb->result() as $key => $value) {
                    $_where = array();
                    $_where[id] = $value->i_product_sub_typelist;
                    $this->db->select('*');
                    $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$_where);
                    $data_pd_sub_typelist = $query->row();


                    $_where = array();
                    $_where[status] = 1;
                    $_where[id] = $data_pd_sub_typelist->i_main_typelist;
                    $this->db->select('*');
                    $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where);
                    $data_pd = $query->row();

                    $_where = array();
//                  $_where[i_status] = 1;
                    $_where[i_plan_pack] = $_GET[i_plan_pack];
                    $_where[i_product_sub_typelist] = $value->id;
                    $this->db->select('*');
                    $query_pd_typelist = $this->db->get_where(TBL_CON_COM_PRODUCT_TYPE,$_where);
                    $data_con_pd_typelist = $query_pd_typelist->row();
                    // echo $data_con_pd_typelist->i_status;

//                  echo $query_pd_typelist->num_rows()." ++";
                    if ($data_con_pd_typelist->i_status > 0) {
                      $checked_pd_tl = "checked";
                      $active_box = "active";
                      $val_pd = 1;
                      $disabled_box_price = "";
                      $disabled_box_vat = "";
                      $disabled_box_wht = "";
                    }
                    else {
                      $checked_pd_tl = "";
                      $active_box = "";
                      $disabled_box_price = "disabled";
                      $disabled_box_vat = "disabled";
                      $disabled_box_wht = "disabled";
                      $val_pd = 0;
                    }
                    ?>
                    <tr id="tr_list_type_product_<?=$value->id;?>">
                      <td>
                        <span style="font-size:16px;"><?=$data_pd->topic_th;?>  </span>
                       
                      </td>
                      <!-- <td align="center"><span   style="width: 90%;" class="form-control" ><?=$data_con_pd_typelist->f_price;?></span></td> -->
                      <td align="center"><span   style="width: 90%;" class="form-control" ><?=$data_con_pd_typelist->f_vat;?></span></td>
                      <!-- <td align="center"><span   style="width: 90%;" class="form-control" ><?=$data_con_pd_typelist->f_wht;?></span></td> -->
                    </tr>
                  <?php }
                  ?>
                </table>

              </div>
            </div>
          </div>

          <?php
        }
        ?>
      </div>
    <?php }
    
    ?>
























         
       
<?php } ?>
 </td>
 </tr>
       
    </tbody>
  </table>
</label>
</div>
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
      // $('#box_com').addClass('borderBlink')
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
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0  && $('#child').val() != '' && $('#adult').val() != '') {
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