<?php


$_where = array();
$_where['id'] = $_POST[plan_setting];
$_select = array('*');
$PLAN_PACK = $this->Main_model->rowdata(NEW_TBL_PLAN_PACK,$_where);
$_where = array();
$_where['id'] = $PLAN_PACK->i_country;
$_select = array('country_code','id','name_th');
$COUNTRY = $this->Main_model->rowdata(TBL_WEB_COUNTRY,$_where,$_select);
$plan = $PLAN_PACK->s_topic;
?>
  <ons-list-header class="list-header"> <?=t_work_remuneration;?></ons-list-header>
  <table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_income_driver">
    <input type="hidden" value="<?=$_POST[price_person_unit];?>" id="val_person_unit" />
    <input type="hidden" value="<?=$_POST[price_park_unit];?>" id="val_park_unit" />
    <input type="hidden" value="<?=$_POST[commission_persent];?>" id="val_com_persent" />
    <tr>
      <td width="35%"><span class="font-17">ประเภท</span></td>
      <td colspan="2"><span class="font-17" id="txt_type_plan"><?=$plan;?></span></td>
    </tr>
    <tr>
      <td width="35%"><span class="font-17">สัญชาติ</span></td>
      <td colspan="2">
        <table>
          <tr>
            <td>
              <img src="<?=base_url();?>assets/images/flag/icon/<?=$COUNTRY->country_code;?>.png" width="25" height="25" alt="">
            </td>
            <td>&nbsp;</td>
            <td><span class="font-17" id="txt_county_pp"><?=$COUNTRY->name_th;?></span></td>
          </tr>
        </table>
      </td>
    </tr>

    <?php
    $_where = array();
    $_where['i_plan_pack'] = $_POST[plan_setting];
    $_select = array('*');
    $_order = array();
    $_order['id'] = 'asc';
    $PACK_LIST = $this->Main_model->fetch_data('','',NEW_TBL_PLAN_PACK_LIST,$_where,$_select,$_order);
    $all_total_iprice = 0;
    foreach ($PACK_LIST as $key => $val) {
      $_where = array();
      $_where[id] = $val->i_plan_main;
      $this->db->select('id,s_topic');
      $query_main = $this->db->get_where(NEW_TBL_PLAN_MAIN,$_where);
      $main = $query_main->row();
      $_where = array();
      $_where[id] = $val->i_con_plan_main_list;
      $this->db->select('id,s_topic');
      $query_mainlist = $this->db->get_where(NEW_TBL_PLAN_MAIN_LIST,$_where);
      $mainlist = $query_mainlist->row();
      $partner_g = 2;
      $_where = array();
      $_where[id] = $val->i_con_plan_main_list;
      $this->db->select('*');
      $query = $this->db->get_where(NEW_TBL_PLAN_MAIN_LIST,$_where);
      if ($val->i_con_plan_main_list > 0) {

        $txt_btn_add = $mainlist->s_topic;
      }
      else {

        $txt_btn_add = 'เพิ่ม';
      }
      $_where = array();
      $_where[i_order_booking] = $_POST[id];
      $_where[i_main_list] = $val->i_con_plan_main_list;

      $_select = array('*');

      $COM_ORDER_BOOKING = $this->Main_model->rowdata(TBL_COM_ORDER_BOOKING,$_where,$_select);

      //  echo '<pre>';
      // print_r($COM_ORDER_BOOKING);
      // echo '</pre>';
      if ($COM_ORDER_BOOKING->i_main_list == 5) {
        $curency = '%';
        $title_head = 'รายการ';
        $title_head2 = 'คอม(%)';


        $_where = array();
        // echo $COM_ORDER_BOOKING->i_com;
        $_where[status] = 1;
        $_where[id] = $COM_ORDER_BOOKING->i_com;
        $_select = array('*');
        $MAIN_TYPELIST = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where,$_select);

        //                      echo '<pre>';
        // print_r($MAIN_TYPELIST);
        // echo '</pre>';
//          // $pax = $COM_ORDER_BOOKING->i_pax;
// $pax = $MAIN_TYPELIST->topic_th;
      }
      else if ($COM_ORDER_BOOKING->i_main_list == 2) {
        $curency = 'บ.';
        $title_head = 'รายการ';
        $title_head2 = 'ราคา';
        $all_total_iprice += $COM_ORDER_BOOKING->i_price;
        $_where = array();

        $_where[status] = 1;
        $_where[id] = $COM_ORDER_BOOKING->i_com;
        $_select = array('*');
        $USE_TYPE = $this->Main_model->rowdata(TBL_WEB_CAR_USE_TYPE,$_where,$_select);
        //                                echo '<pre>';
        // print_r($USE_TYPE);
        // echo '</pre>';
        $pax = $USE_TYPE->name_th;
      }
      else if ($COM_ORDER_BOOKING->i_main_list == 4) {
        $curency = 'บ.';
        $title_head = 'รายการ';
        $title_head2 = 'ราคา(คนละ)';
        $all_total_iprice += $COM_ORDER_BOOKING->i_price * $COM_ORDER_BOOKING->i_pax;
        $pax = $COM_ORDER_BOOKING->i_pax;
      }
      else if ($COM_ORDER_BOOKING->i_main_list == 3) {
        $curency = 'บ.';
        $title_head = 'รายการ';
        $title_head2 = 'ราคา(คนละ)';
        $all_total_iprice += $COM_ORDER_BOOKING->i_price * $COM_ORDER_BOOKING->i_pax;
        $pax = $COM_ORDER_BOOKING->i_pax;
      }
      else {
        $all_total_iprice += $COM_ORDER_BOOKING->i_price;
        $curency = 'บ.';
        $title_head = 'จำนวน';
        $title_head2 = 'ราคา';
        $pax = $COM_ORDER_BOOKING->i_pax;
      }
      // echo $COM_ORDER_BOOKING->i_com;
      $_where = array();
      $_where['id'] = $val->i_pay_type;
      $_select = array('name_th');
      $PAY_TYPE = $this->Main_model->rowdata(NEW_TBL_PAY_TYPE,$_where);
      ?>
      <tr >
        <td  colspan="4">
          <table width="100%">
            <tr>
              <td colspan="4">
                <span style="font-weight: 700"><?=$main->s_topic;?>  (<?=$txt_btn_add;?>) </span>
                <span style="margin-left: 10px;color: #0076ff">(<?=$PAY_TYPE->s_topic;?>)</span>
              </td>

            </tr>
            <tr>
              <td width="90"> <?=$title_head;?></td>
              <td></td>
              <td width="150" align="center"> <?=$title_head2;?></td>
              <td></td> 
            </tr>
            <?php
            if ($COM_ORDER_BOOKING->i_main_list != 5) {
              ?>

              <tr>
                <td width="90" align="center"> <span style="" id="pax_show_income"><?=$pax;?></span></td>
                <td></td>
                <td width="" align="right"><span><?=number_format($COM_ORDER_BOOKING->i_price,0);?></span>
                  <input value="<?=$COM_ORDER_BOOKING->i_price;?>" id="each_price" type="hidden" />
                </td>                
                <td align="left"><span class="font-17" ><?=$curency;?></span></td> 
              </tr>

              <?php
            }
            else if ($COM_ORDER_BOOKING->i_main_list == 5) {
              $_where = array();
              $_where['i_order_booking'] = $_POST[id];
              $_where['i_plan_pack'] = $_POST[plan_setting];
              $_select = array('*');
              $_order = array();
              $_order['id'] = 'asc';
              $BOOKING_COM = $this->Main_model->fetch_data('','',TBL_COM_ORDER_BOOKING_COM,$_where,$_select,$_order);
//                $BOOKING_COM = $this->Main_model->fetch_data('','',TBL_COM_ORDER_BOOKING,$_where,$_select,$_order);

              foreach ($BOOKING_COM as $key => $datacom) {
                $_where = array();
                $_where['id'] = $datacom->i_con_com_product_type;
                $_select = array('id');
                $COM_PRODUCT_TYPE = $this->Main_model->rowdata(TBL_CON_COM_PRODUCT_TYPE,$_where);

                $_where = array();
                $_where[id] = $COM_PRODUCT_TYPE->i_product_sub_typelist;
                $this->db->select('*');
                $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$_where);
                $data_pd_sub_typelist = $query->row();


                $_where = array();
                $_where[status] = 1;
                $_where[id] = $data_pd_sub_typelist->i_main_typelist;
                $this->db->select('*');
                $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where);
                $data_pd = $query->row();
                ?>
                <tr id="">
                  <td colspan="2">
                    <span style="font-size:16px;"><?=$data_pd->topic_th;?>  </span>

                  </td>

                                          <!-- <td align="center"><span   style="width: 90%;" class="form-control" ><?=$data_con_pd_typelist->f_price;?></span></td> -->
                  <td align="center"><span   style="width: 90%;" class="form-control" ><?=$datacom->i_price;?></span></td>
                  <!-- <td align="center"><span   style="width: 90%;" class="form-control" ><?=$data_con_pd_typelist->f_wht;?></span></td> -->
                  <td width="30"></td>
                </tr>

                <?php
              }
            }
            ?>
          </table>          
        </td>
      </tr>
      <?php
    }
    ?>
    <tr>
      <td ></td>
      <td width="110" style="font-weight: 700"><span>รวม</span></td>
      <td align="left" style="font-weight: 700" colspan="2">
        <span class="16" id="txt_all_total"><?=number_format($all_total_iprice,0);?></span>
        <span class="font-17">บ.</span>
      </td>       
    </tr>
  </table>
