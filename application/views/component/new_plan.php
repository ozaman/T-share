<?php
$data = $this->Main_model->rowdata(TBL_ORDER_BOOKING,array('id' => $_GET[id]),array('*'));

$query_price = $this->db->query("select * from shop_country_com_list_price_taxi where i_shop_country_com_list = '".$data->plan_id."' ");
$num = 0;

$display_person = "display:none";
$display_com = "display:none";
$display_park = "display:none";
$park_total = 0;
$person_total = 0;
$com_total = 0;
foreach ($query_price->result() as $row_price) {
  if ($num >= 1) {
    $push = " + ";
  }
  else {
    $push = "";
  }
  $plan .= $push.$row_price->s_topic_th;
  $num++;

  if ($row_price->s_topic_en == "park") {
    $check_type_park = 1;
    $display_park = "";
    $park_total = $data->price_park_unit;
  }

  if ($row_price->s_topic_en == "person") {
    $check_type_person = 1;

    $display_person = "";
    $person_total = intval($data->price_person_unit) * intval($data->adult);
    $cal_person = $data->price_person_unit."x".$data->adult;
  }

  if ($row_price->s_topic_en == "comision") {
    $check_type_com = 1;
    $i_list_prices = $row_price->id;
    $i_plan_product_price_name = $row_price->i_plan_product_price_name;
    $display_com = "";
    $com_persent = $data->commission_persent;
    $com_progress = '<span style="padding-left: 0px;"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i>&nbsp;<font color="#FF0000">รอแจ้งโอน</font></span>';
  }
}
$all_total = $park_total + $person_total + $com_total;


$sql_country = "SELECT t2.s_country_code, t2.s_topic_th FROM shop_country_com_list_price_taxi as t1 left join shop_country_icon_taxi as t2 on t1.i_shop_country_icon = t2.id WHERE t1.i_shop_country_com_list='".$data->plan_id."'    ";
$query_country = $this->db->query($sql_country);
$res_country = $query_country->row();

/* $sql_country = "SELECT * from ";
  $query_country = $this->db->query($sql_country);
  $res_country = $query_country->row(); */

//$query = $this->db->query("SELECT cause_change FROM change_plan_logs where order_id = '".$data->id."' ");
//$res_log_change = $query->row();
//
//$query = $this->db->query("SELECT s_topic FROM shop_type_change_plan where i_status = 1 and id = '".$res_log_change->cause_change."' ");
//$res_type_change = $query->row();
//if ($res_type_change->s_topic == "") {
//  $res_type_change->s_topic = "คนขับเปลี่ยนใจ";
//}


$this->db->select('id');
$_where = array();
$_where[i_order_booking] = $data->id;
$chk_log = $this->db->get_where(TBL_COM_ORDER_BOOKING_LOGS,$_where);
$num_log = $chk_log->num_rows();
if ($num_log > 0) {
//  $tbl_com_booking = TBL_COM_ORDER_BOOKING_LOGS;
  $titel = "เปลี่ยนแปลง".t_work_remuneration;
  $display_none_change_plan = "";
  $color_titel = "color: #f00 !important;";
}
else {
  $titel = t_work_remuneration;
  $display_none_change_plan = "display:none;";
  $color_titel = "";
//  $tbl_com_booking = TBL_COM_ORDER_BOOKING;
}




$_where = array();
$_where['i_order_booking'] = $data->id;
$_select = array('*');
$_order = array();
$_order['id'] = 'asc';
$BOOKING_LOGS = $this->Main_model->fetch_data('','',TBL_COM_ORDER_BOOKING_LOGS,$_where,$_select,$_order);
// echo 'fsfsafsfsf';





$_where = array();
if ($BOOKING_LOGS == '') {
  $_where['id'] = $data->plan_setting;
}
else {
  $_where['id'] = $BOOKING_LOGS[0]->i_plan_pack;
}
// $_where['id'] = $data->plan_setting;
$_select = array('*');
$PLAN_PACK = $this->Main_model->rowdata(NEW_TBL_PLAN_PACK,$_where);
$_where = array();
$_where['id'] = $PLAN_PACK->i_country;
$_select = array('country_code','id','name_th');
$COUNTRY = $this->Main_model->rowdata(TBL_WEB_COUNTRY,$_where,$_select);
$plan = $PLAN_PACK->s_topic;
?>
<div style="padding: 5px 0px;">
  <ons-list-header class="list-header" style="<?=$color_titel;?>"> <?=$titel;?></ons-list-header>
  <table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_income_driver">
    <tr>
      <td width="35%"><span class="font-17">สาเหตุ</span></td>
      <td colspan="2">
        <?php
        $this->db->select('t1.i_cause_change, t2.s_topic');
        $this->db->from(TBL_CHANGE_PLAN_LOGS.' as t1');
        $this->db->join(SHOP_TYPE_CHANGE_PLAN.' as t2','t1.i_cause_change = t2.id');
        $this->db->where('t1.order_id', $_GET[id]);
        $query_because = $this->db->get();
        $because = $query_because->row();
        ?>
        <span class="font-17" id="txt_type_plan"><?=$because->s_topic;?></span>
      </td>
    </tr>
    <?php //echo $BOOKING_LOGS.'-------------------------'.count($BOOKING_LOGS);?>
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
    // echo $BOOKING_LOGS[0]->i_plan_pack.'************'.count($BOOKING_LOGS);

    $_where = array();
    if ($BOOKING_LOGS == '') {
      $_where['i_plan_pack'] = $data->plan_setting;
    }
    else {
      $_where['i_plan_pack'] = $BOOKING_LOGS[0]->i_plan_pack;
    }
    // echo $_where['i_plan_pack'].'-----------';
    $_select = array('*');
    $_order = array();
    $_order['id'] = 'asc';
    $PACK_LIST = $this->Main_model->fetch_data('','',NEW_TBL_PLAN_PACK_LIST,$_where,$_select,$_order);
    $all_total_iprice = 0;
//    echo '<pre>';
//    print_r($PACK_LIST);
//    echo '</pre>';
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
      $_where[i_order_booking] = $data->id;
      $_where[i_main_list] = $val->i_con_plan_main_list;

      $_select = array('*');
      if ($BOOKING_LOGS == '') {
        $TBL = TBL_COM_ORDER_BOOKING;
      }
      else {
        $TBL = TBL_COM_ORDER_BOOKING_LOGS;
      }
      // echo $TBL.'////////////';
      $COM_ORDER_BOOKING = $this->Main_model->rowdata($TBL,$_where,$_select);

      // echo '<pre>';
      // print_r($COM_ORDER_BOOKING);
      // echo '</pre>';
      // echo $COM_ORDER_BOOKING->i_main_list."<br/>";
      if ($COM_ORDER_BOOKING->i_main_list == 5) {
        $curency = '%';
        $title_head = 'รายการ';
        $title_head2 = 'คอม';


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
        $pax = $MAIN_TYPELIST->topic_th;
//        echo 555555555555555555;
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
        $title_head = 'จำนวน';
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
      $_where = array();
      $_where['id'] = $COM_ORDER_BOOKING->i_type_pay;
      $_select = array('name_th');
      $PAY_TYPE = $this->Main_model->rowdata(NEW_TBL_PAY_TYPE,$_where);
      ?>
      <tr >
        <td  colspan="4">
          <table width="100%">
            <tr>
              <td colspan="4">
                <span style="font-weight: 700"><?=$main->s_topic;?> (<?=$txt_btn_add;?>) </span>
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
            $_where = array();
            $_where[i_order_booking] = $data->id;
            $_where[i_plan_pack] = $data->plan_setting;
            $this->db->select('*');
            $query_plan = $this->db->get_where(TBL_COM_ORDER_BOOKING_COM,$_where);
//            echo 6666666666;
            // echo '<pre>';
            // print_r($COM_ORDER_BOOKING);
            // echo '</pre>';
//            exit();
            if ($COM_ORDER_BOOKING->i_main_list != 5) {
              //         echo '<pre>';
              // print_r($COM_ORDER_BOOKING);
              // echo '</pre>';
              ?>

              <tr>
                <td width="90" > <span style=""><?=$pax;?></span></td>
                <td></td>
                <td width="" align="right"><span><?=number_format($COM_ORDER_BOOKING->i_price,0);?></span></td>                
                <td align="left"><span class="font-17"><?=$curency;?></span></td> 
              </tr>

              <?php
            }
            else if ($COM_ORDER_BOOKING->i_main_list == 5) {
              $_where = array();
              $_where['i_order_booking'] = $data->id;
              $_where['i_plan_pack'] = $data->plan_setting;
              $_select = array('*');
              $_order = array();
              $_order['id'] = 'asc';
              $BOOKING_COM = $this->Main_model->fetch_data('','',TBL_COM_ORDER_BOOKING_COM,$_where,$_select,$_order);

              $_where = array();
              $_where['i_order_booking'] = $data->id;
              // $_where['i_plan_pack'] = $data->plan_setting;
              $_select = array('*');
              $_order = array();
              $_order['id'] = 'asc';
              $BOOKING_CHANGE_PLAN = $this->Main_model->fetch_data('','',TBL_COM_ORDER_BOOKING_CHANGE_PLAN,$_where,$_select,$_order);
              //      echo '<pre>';
              // print_r($BOOKING_CHANGE_PLAN);
              // echo '</pre>';    

              if ($BOOKING_CHANGE_PLAN == '') {

                $BOOKING_COM_ROW = $BOOKING_COM;
              }
              else {
                $BOOKING_COM_ROW = $BOOKING_CHANGE_PLAN;
              }



              foreach ($BOOKING_COM_ROW as $key => $datacom) {
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
                  <td align="center"><span   style="width: 90%;" class="form-control" ><?=$datacom->i_price;?>%</span></td>
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
</div>
