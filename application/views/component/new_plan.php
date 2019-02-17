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

$query = $this->db->query("SELECT cause_change FROM change_plan_logs where order_id = '".$data->id."' ");
$res_log_change = $query->row();

$query = $this->db->query("SELECT s_topic FROM shop_type_change_plan where i_status = 1 and id = '".$res_log_change->cause_change."' ");
$res_type_change = $query->row();
if ($res_type_change->s_topic == "") {
  $res_type_change->s_topic = "คนขับเปลี่ยนใจ";
}


$query = $this->db->query("select * from change_plan_logs where order_id = ".$data->id);
$check_change_plan = $query->num_rows();
if ($check_change_plan == 0) {
  $titel = t_work_remuneration;
  $display_none_change_plan = "display:none;";
  $color_titel = "";
}
else {
  $titel = "เปลี่ยนแปลง".t_work_remuneration;
  $display_none_change_plan = "";
  $color_titel = "color: #f00 !important;";
}


 $_where = array();
      $_where['i_order_booking'] = $data->id;
      $_select = array('*');
      $_order = array();
      $_order['id'] = 'asc';
      $BOOKING_LOGS = $this->Main_model->fetch_data('','',TBL_COM_ORDER_BOOKING_LOGS,$_where,$_select,$_order);
      // echo 'fsfsafsfsf';
// echo $BOOKING_LOGS.'-------------------------'.count($BOOKING_LOGS);




$_where = array();
 if (count($BOOKING_LOGS)=='') {
       $_where['id'] = $BOOKING_LOGS[0]->i_plan_pack;
      }
      else{
        $_where['id'] = $data->plan_setting;
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
    <ons-list-header class="list-header"> <?=t_work_remuneration;?></ons-list-header>
    <table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_income_driver">
     
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
      if (count($BOOKING_LOGS)=='') {
       $_where['i_plan_pack'] = $BOOKING_LOGS[0]->i_plan_pack;
      }
      else{
        $_where['i_plan_pack'] = $data->plan_setting;
      }
      // echo $_where['i_plan_pack'].'-----------';
      $_select = array('*');
      $_order = array();
      $_order['id'] = 'asc';
      $PACK_LIST = $this->Main_model->fetch_data('','',NEW_TBL_PLAN_PACK_LIST,$_where,$_select,$_order);
      $all_total_iprice = 0;
 //        echo '<pre>';
 // print_r($PACK_LIST);
 // echo '</pre>';
      foreach($PACK_LIST as $key=> $val){
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
       if($val->i_con_plan_main_list>0){

        $txt_btn_add = $mainlist->s_topic;
      }else{

        $txt_btn_add = 'เพิ่ม';
      }
      $_where = array();
      $_where[i_order_booking] = $data->id;
      $_where[i_main_list] = $val->i_con_plan_main_list;

      $_select = array('*');
       if (count($BOOKING_LOGS)=='') {
       $TBL = TBL_COM_ORDER_BOOKING_LOGS;
      }
      else{
       $TBL = TBL_COM_ORDER_BOOKING;
        
      }
      // echo $TBL.'////////////';
      $COM_ORDER_BOOKING = $this->Main_model->rowdata($TBL,$_where,$_select);
      $all_total_iprice += $COM_ORDER_BOOKING->i_price;
 //  echo '<pre>';
 // print_r($COM_ORDER_BOOKING);
 // echo '</pre>';
                ?>
           <tr >
        <td  colspan="4">
          <table width="100%">
            <tr>
              <td colspan="4">
                <span style="font-weight: 700"><?=$main->s_topic;?>  (<?=$txt_btn_add;?>) </span>
              </td>
            
            </tr>
            <tr>
                <td width="90"> จำนวน</td>
                <td></td>
                <td width="150" align="right"> ราคา</td>
                <td></td> 
            </tr>
            <tr>
                <td width="90" align="center"> <span style=""><?=$COM_ORDER_BOOKING->i_pax?></span></td>
                <td></td>
                <td width="" align="right"><span><?=number_format($COM_ORDER_BOOKING->i_price,0);?></span></td>                
                <td align="left"><span class="font-17">บ.</span></td> 
            </tr>
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
