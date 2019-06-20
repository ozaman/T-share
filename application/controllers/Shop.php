<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Shop_model');
  }

  public function add_shop() {
    $data['res'] = $this->Shop_model->add_shop();
//    header('Content-Type: application/json');
    echo json_encode($data['res']);



    // $plan_id = $_POST[price_plan];
    // $country = $_POST[plan_setting];
    // $_where = array();
    // $_where['i_shop_country_icon'] = $country;
    // $_select = array('*');
    // $_order = array();
    // $_order['id'] = 'asc';
    // $list_plan = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_COMPANY,$_where,$_select,$_order);
    // echo json_encode($list_plan);
  }

  public function cancel_shop() {
    $data['res'] = $this->Shop_model->cancel_shop();
    header('Content-Type: application/json');
    echo json_encode($data['res']);
  }

  public function detail_shop() {
//		echo 555;
    $this->load->view('shop/detail_shop_view');
  }

  public function checkin() {
    $data['res'] = $this->Shop_model->$_GET[type]();
    header('Content-Type: application/json');
    echo json_encode($data['res']);
  }

  public function editpax() {
    $data['res'] = $this->Shop_model->editpax();

    header('Content-Type: application/json');
    echo json_encode($data['res']);
  }

  /* public function editadult()
    {
    $data['res'] = $this->Shop_model->editadult();
    header('Content-Type: application/json');
    echo json_encode($data['res']);
    }
    public function editchild()
    {
    $data['res'] = $this->Shop_model->editchild();
    header('Content-Type: application/json');
    echo json_encode($data['res']);
    } */

  public function place_company() {
    $arr_where = array();
    $arr_where['status'] = 1;
    $arr_select = array('*');
    $arr_order = array();
    $arr_order['id'] = 'ASC';
    $data['place_company'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT,$arr_where,$arr_select,$arr_order);
    // $data['place_company'] = $this->Shop_model->place_company();
    // header('Content-Type: application/json');
    // echo json_encode($data);
    $this->load->view('shop/place_company',$data);
  }

  public function place_companycount() {
    header('Content-Type: application/json');
    $_where = array();
    // $_where['product_id'] = $_GET[id];
    $_where['status'] = 1;
    // $_where['time_other_number'] = 2;




    $data = $this->Main_model->num_row(TBL_SHOPPING_PRODUCT,$_where);
    if ($data == 1) {
      $data_res = array();
      $data_res[count] = 1;
      $arr_where = array();
      $arr_where['status'] = 1;
      $arr_select = array('id');
      //$arr_order = array();

      $data2 = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT,$arr_where,$arr_select,'');
      $data_res[shop_id] = $data2[0]->id;
    }
    else {
      $data_res[count] = 2;
    }
    // $data = $this->Shop_model->place_companycount();
    // $data['place_company'] = $this->Shop_model->place_company();
    // header('Content-Type: application/json');
    echo json_encode($data_res);

    // $this->load->view('shop/place_company',$data);
  }

  public function shop_page() {
    $this->load->view('shop/home_view');
  }

  public function shop_pageadd() {
    $this->load->view('shop/shop_add');
  }

  public function shop_manage() {
    $this->load->view('shop/shop_manage');
  }

  public function shop_history() {
    /* $url = "http://www.welovetaxi.com:3000/getOrderhisdriver";  
      $curl_post_data = '{"driver": '.$_POST[driver].',"date": "'.$_POST[date].'"}';
      // $curl_post_data = '{"driver": 153,"date": "2018-09-17"}';
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $data = curl_exec($ch);
      curl_close($ch);

      $decode['his'] = 	json_decode($data);
      $this->load->view('shop/shop_history',$decode); */
    $this->load->view('shop/shop_history');
  }

  public function detail_shop_his() {
    $data['book'] = $this->Main_model->rowdata(TBL_ORDER_BOOKING,array('invoice' => $_POST[invoice]),'');
//			$this->load->view('shop/detail_shop_his',$data);
    echo json_encode($data['book']);
  }

  public function get_data_shop() {
    $data['book'] = $this->Main_model->rowdata(TBL_ORDER_BOOKING,array('id' => $_POST[id]),'');
    echo json_encode($data['book']);
  }

  public function car_count() {
    $data = $this->Shop_model->car_count();
    echo $data;
  }

  public function count_his() {
    $url = "http://www.welovetaxi.com:3000/getOrderhisdriver";
    $curl_post_data = '{"driver": '.$_POST[driver].',"date": "'.$_POST[date].'"}';
    // $curl_post_data = '{"driver": 153,"date": "2018-09-17"}';
    $ch = curl_init($url);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$curl_post_data);
    curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $data = curl_exec($ch);
    curl_close($ch);


    $decode = json_decode($data);
    echo count($decode->data);
    // header('Content-Type: application/json');
    // $this->load->view('shop/shop_history',$decode);
    //echo json_encode($decode);
  }

  public function lab_acknowledge() {
    $data['res'] = $this->Shop_model->lab_acknowledge();
    header('Content-Type: application/json');
    echo json_encode($data['res']);
  }

  public function update_time_toplace() {
    $data['res'] = $this->Shop_model->update_time_toplace();
    header('Content-Type: application/json');
    echo json_encode($data['res']);
  }

  public function box_price_plan() {
    $this->load->view('shop/box_price_plan');
  }

  public function chk_time() {
    header('Content-Type: application/json');
    $arr_where = array();
    $arr_where['status'] = 1;
    $arr_where['product_id'] = $_GET[shop_id];
    $arr_where['product_day'] = $_GET[day];
    $arr_select = array('*');

    $data = $this->Main_model->fetch_data('','',TBL_SHOPPING_OPEN_TIME,$arr_where,$arr_select,'');
    echo json_encode($data);
  }

  public function lab_approved_pay() {
    $data['res'] = $this->Shop_model->lab_approved_pay();
//			header('Content-Type: application/json');
    echo json_encode($data['res']);
  }

  public function driver_approved_pay() {
    $data['res'] = $this->Shop_model->driver_approved_pay();
//			header('Content-Type: application/json');
    echo json_encode($data['res']);
  }

  public function findInvoice() {
    $data['book'] = $this->Main_model->rowdata(TBL_ORDER_BOOKING,array('id' => $_GET[id]),array('invoice'));
    echo json_encode($data['book']);
  }

  public function update_logo() {
    $arr_where = array();
    // $arr_where['status'] = 1;
    $arr_select = array('*');
    $arr_order = array();
    $arr_order['id'] = 'ASC';
    $data = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT,$arr_where,$arr_select,$arr_order);
    foreach ($data as $key => $value) {
      $name = $value->id.'_logo.jpg';
      $add = array();
      $add["pic_logo"] = $name;
      $this->db->where('id',$value->id);
      echo $result = $this->db->update(TBL_SHOPPING_PRODUCT,$add);
    }
    // $data['place_company'] = $this->Shop_model->place_company();
    // header('Content-Type: application/json');
    // echo json_encode($data);
    // $this->load->view('shop/place_company',$data);
  }

  public function editpax_regis() {
    $data = $this->Shop_model->editpax_regis();
    header('Content-Type: application/json');
    echo json_encode($data);
  }

  public function change_plan() {
    header('Content-Type: application/json');
    // if ($_POST[plane_id_replan] != $_POST[price_plan] and $_POST[price_plan] != "") {
    $re = $this->Shop_model->change_plan();
    // }
    // echo json_encode($re);
    if ($re['result'] == true) {
      $data['checkin'] = $this->Shop_model->guest_register();

      echo json_encode($data);
    }
  }

  public function taxi_approved_cancel() {
    $data['res'] = $this->Shop_model->taxi_approved_cancel();
    echo json_encode($data['res']);
  }

  public function check_row_change_plan() {

    $query = $this->db->query("select * from change_plan_logs where order_id = ".$_GET[order_id]);
    echo $query->num_rows();
  }

  public function check_plan_transfer() { //// เช็คว่ามีโอนหรือไม่
    $this->db->select('id');
    $_where = array();
    $_where[i_order_booking] = $_GET[order_id];
    $chk_log = $this->db->get_where(TBL_COM_ORDER_BOOKING_LOGS,$_where);
    $num_log = $chk_log->num_rows();
    if ($num_log > 0) {
      $tbl_com_booking = TBL_COM_ORDER_BOOKING_LOGS;
    }
    else {
      $tbl_com_booking = TBL_COM_ORDER_BOOKING;
    }

    $this->db->select('i_type_pay');
    $_where = array();
    $_where[i_order_booking] = $_GET[order_id];
    $query = $this->db->get_where($tbl_com_booking,$_where);
//    $data = $query->row();
    $return[result] = false;
    foreach ($query->result() as $key => $val) {


      if ($val->i_type_pay == 2) {
        $return[result] = true;
        break;
      }
    }
    $return[data] = $query->result();
    $return[tb] = $tbl_com_booking;
    $return[ss] = $_GET[order_id];
    echo json_encode($return);
  }

  public function check_commission_plan() {

    $return[result] = false;
    if ($_GET[box] == "") {
      $_where = array();
      $_where[i_order_booking] = $_GET[order_id];
      $this->db->select('id, i_plan_pack');
      $query_logs = $this->db->get_where(TBL_COM_ORDER_BOOKING_LOGS,$_where);
      if ($query_logs->num_rows > 0) {
        $res_data = $query_logs->row();
      }
      else {
        $_where = array();
        $_where[i_order_booking] = $_GET[order_id];
        $this->db->select('id, i_plan_pack');
        $query_main = $this->db->get_where(TBL_COM_ORDER_BOOKING,$_where);
        $res_data = $query_main->row();
      }
      $plan_id = $res_data->i_plan_pack;
//      $query = $this->db->query("select plan_setting as plan_id from order_booking where id = ".$_GET[order_id]);
//      $row_plan = $query->row();
//      $plan_id = $row_plan->plan_id;
    }
    else {
      $plan_id = $_GET[plan_id];
    }


//    $query = $this->db->query("select s_topic_en,s_payment from ".TBL_SHOP_COUNTRY_COM_LIST_PRICE_TAXI." where i_shop_country_com_list = ".$plan_id);
    $_where = array();
    $_where[i_plan_pack] = $plan_id;
    $this->db->select('*');
    $query_plan = $this->db->get_where(TBL_PLAN_PACK_LIST,$_where);
//    $res_plan = $query_plan->row();
//    echo json_encode($query_plan->result());
//    exit();
    foreach ($query_plan->result() as $row) {

      if ($row->i_pay_type == 2) {
        $return[result] = true;
      }
      $data[] = $row;
    }

    $return[plan_id] = $row_plan->plan_id;
    $return[row] = $query_plan->num_rows();
    $return[order] = $_GET[order_id];
    $return[ss] = $query_plan->result();
    echo json_encode($return);
  }

  public function complete_job() {
    $check = false;
    $query = $this->db->query("select plan_setting,check_tran_job from order_booking where id = ".$_GET[id]);
    $row = $query->row();
    if ($row->check_tran_job > 0) {
      $check = true;
    }
    if ($check == false) {
      $data['checkin'] = $this->Shop_model->driver_complete();
    }
    $data[check] = $check;
    echo json_encode($data);
  }

  public function get_trans_com() {
    $data['pay_his'] = $this->Shop_model->get_trans_com();
    $data['order'] = $this->Shop_model->driver_complete();

    echo json_encode($data);
  }

  public function get_user_by_shop() {
    $sql = "select t2.name,t2.nickname,t2.username,t2.phone from order_booking as t1 left join web_driver as t2 on t1.".$_GET[type]." = t2.id where t1.id = ".$_GET[id];
    $query = $this->db->query($sql);
    $row = $query->row();
    echo json_encode($row);
  }

  public function count_wait_trans_shop_lab() {
    $_where = array();
    $_where[id] = $_COOKIE[detect_user];
    $this->db->select('i_company');
    $com = $this->db->get_where(TBL_WEB_DRIVER,$_where);
    $com = $com->row();
    $query = $this->db->query("select id from order_booking where check_driver_pay = 1 and check_tran_job = 1 "
            . "and driver_complete = 0 and status != 'CANCEL' ". "and program = ".$com->i_company);
    echo $query->num_rows();
  }

  public function count_wait_trans_shop_taxi() {
    $_where = array();
    $_where[id] = $_GET[driver_id];
    $this->db->select('i_company');
    $com = $this->db->get_where(TBL_WEB_DRIVER,$_where);
    $com = $com->row();
    $query = $this->db->query("select id from order_booking where check_driver_pay = 1 "
            . "and check_tran_job = 1 and driver_complete = 0 and status != 'CANCEL' and drivername = ".$_GET[driver_id]
            . "and program = ".$com->i_company);
    echo $query->num_rows();
  }

  public function imageslider() {
    $this->load->view('shop/page_imageslider');
  }

  public function count_his_all_status() {
    $date = $_POST[date];
    $class_name = $_POST[class_name];
    if ($date != "") {
      $sql_date = " and transfer_date = '".$date."' ";
    }
    if ($class_name == "taxi") {
      $sql_dv = " and drivername = '".$_POST[driver]."' ";
    }
    $query_all = $this->db->query("select id from order_booking where driver_complete = 1".$sql_date.$sql_dv);
    $query_success = $this->db->query("select id from order_booking where driver_complete = 1 and status = 'COMPLETED' ".$sql_date.$sql_dv);
    $query_fail = $this->db->query("select id from order_booking where driver_complete = 1 and status = 'CANCEL' ".$sql_date.$sql_dv);

    $return[all] = $query_all->num_rows();
    $return[success] = $query_success->num_rows();
    $return[fail] = $query_fail->num_rows();
    echo json_encode($return);
  }

  public function select_bank_after_change_plan() {
    $data = $this->Shop_model->select_bank_after_change_plan();
    echo json_encode($data);
  }

  public function shopcategory() {
    $data = array();
    $arr_where = array();
    $arr_where[status] = 1;
    $arr_select = array('*');
    $arr_order = array();
    $arr_order['id'] = 'ASC';
    $PRODUCT = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT,$arr_where,$arr_select,$arr_order);
    // $data['place_company'] = $this->Shop_model->place_company();
    // header('Content-Type: application/json');
    $array_main = array();
    foreach ($PRODUCT as $row) {
      //print_r($row->main);
      $array_main[] = $row->main;
      //  if (!in_array($row->main, $array_temp))
      // {
      //   $array_temp[] = $val;
      // }
      // else
      // {
      //   echo 'duplicate = ' . $val . '<br />';
      // }
      // 
    }
    // print_r(json_encode($PRODUCT));
    foreach (array_unique($array_main) as $row) {
      $_where = array();
      $_where['id'] = $row;
      $_select = array('*');
      $data[] = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN,$_where);
      // array_push($data , $re);
    }
    $res[MAIN] = $data;
    // echo json_encode(array_unique($array_main));
    // echo json_encode($data);
    // print_r(json_encode($res));
    // print_r($res);

    $this->load->view('component/shop_category',$res);
  }

  public function shoptype() {


    $data = array();
    $arr_where = array();
    $arr_where[status] = 1;
    $arr_where[main] = $_GET[main];
    $arr_select = array('*');
    $arr_order = array();
    $arr_order['id'] = 'ASC';
    $PRODUCT = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT,$arr_where,$arr_select,$arr_order);
    // $data['place_company'] = $this->Shop_model->place_company();
    // header('Content-Type: application/json');
    $array_main = array();
    foreach ($PRODUCT as $row) {
      $array_main[] = $row->sub;
      //  if (!in_array($row->main, $array_temp))
      // {
      //   $array_temp[] = $val;
      // }
      // else
      // {
      //   echo 'duplicate = ' . $val . '<br />';
      // }
      // 
    }
    // print_r(json_encode($array_main));
    foreach (array_unique($array_main) as $row) {
      $_where = array();
      $_where['id'] = $row;
      $_select = array('*');
      $data[] = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_SUB,$_where);
      // array_push($data , $re);
    }
    $res[TYPE] = $data;
    // print_r(json_encode($array_main));
    $this->load->view('component/shop_type',$res);
  }

  public function shopprovince() {


    $data = array();
    $arr_where = array();
    $arr_where[status] = 1;
    // $arr_where[province] = $_GET[pv];
    $arr_select = array('*');
    $arr_order = array();
    $arr_order['id'] = 'ASC';
    $PRODUCT = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT,$arr_where,$arr_select,$arr_order);
    // $data['place_company'] = $this->Shop_model->place_company();
    // header('Content-Type: application/json');
    $array_main = array();
    foreach ($PRODUCT as $row) {
      $array_main[] = $row->province;
      // print_r($row->province);
      //  if (!in_array($row->main, $array_temp))
      // {
      //   $array_temp[] = $val;
      // }
      // else
      // {
      //   echo 'duplicate = ' . $val . '<br />';
      // }
      // 
    }
    // print_r(json_encode($array_main));
    foreach (array_unique($array_main) as $row) {
      $_where = array();
      $_where['id'] = $row;
      $_select = array('*');
      $data[] = $this->Main_model->rowdata(TBL_WEB_PROVINCE,$_where);
      // array_push($data , $re);
    }
    $res[PROVINCE] = $data;
    // print_r(json_encode($array_main));
    $this->load->view('component/shop_province',$res);
  }

  public function get_shop_all_company() {
    $arr_where = array();
    $arr_select = array('*');
    $arr_where['status'] = 1;
    $arr_where['province'] = $_GET[pv];

    if ($_GET[opt] == 'TYPE') {
      $arr_where['sub'] = $_GET[sub];
    }
    else if ($_GET[opt] == 'PROVINCE') {
      
    }
    else if ($_GET[opt] == 'CATE') {
      $arr_where['main'] = $_GET[main];
    }





    $arr_order = array();
    $arr_order['id'] = 'ASC';
    $data['place_company'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT,$arr_where,$arr_select,$arr_order);
    $this->load->view('shop/shop_all_company',$data);
  }

  public function get_data_product() {
    $query = $this->db->query("select id from tbl_plan_pack where i_shop = ".$_GET[id]);
    // $query = $this->db->query("select id,price_plan from shopping_product where id = ".$_GET[id]);
    $row = $query->row();
    echo json_encode($row);
  }

  public function count_place_document_file() {
    $query = $this->db->query("select id from shop_document_file_img where product_id = ".$_GET[id]);
//    $row = $query->row();
//    $re[num] = $query->num_rows();
    echo $query->num_rows();
  }

  public function count_phone_place() {
    $query = $this->db->query("SELECT id FROM shopping_contact  WHERE product_id ='".$_GET[id]."' and type='phone' and status=1");
    echo json_encode($query->num_rows());
  }

  public function count_zello_place() {
    $query = $this->db->query("SELECT id,channel,phone,name FROM shopping_contact  WHERE product_id='".$_GET[id]."' and type='zello' and status = 1");
    echo json_encode($query->num_rows());
  }

  public function search_shop_all_company() {
    $searchquery = $_GET[search];
    if ($searchquery == '') {
      $data['place_company'] = nul;
    }
    else {
      $arr_where = array();
      $arr_select = array('*');
      $arr_order = array();
      $arr_where['status'] = 1;
      $this->db->like('topic_th',$searchquery);
      $this->db->or_like('topic_en',$searchquery);
      $this->db->or_like('topic_cn',$searchquery);
      $arr_order['id'] = 'ASC';
      $data['place_company'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT,$arr_where,$arr_select,$arr_order);
    }
    $this->load->view('shop/shop_all_company',$data);
  }

  public function confirm_choose_get_money() {
    $data = $this->Shop_model->confirm_choose_get_money();
    echo json_encode($data);
  }

  public function check_pack_cash() {
    $order_id = $_POST[order_id];
    $_where = array();
    $_where['i_order_booking'] = $order_id;
    $_select = array('*');
    $_order = array();
    $_order['id'] = 'asc';
    $BOOKING_LOGS = $this->Main_model->fetch_data('','',TBL_COM_ORDER_BOOKING_LOGS,$_where,$_select,$_order);

//        $_where = array();
    if ($BOOKING_LOGS == '') {
      $data = $this->Main_model->fetch_data('','',TBL_COM_ORDER_BOOKING,$_where,$_select,$_order);
    }
    else {
      $data = $BOOKING_LOGS;
    }

    foreach ($data as $key => $val) {
      $_where = array();
      $_where[id] = $val->plan_pack_list;
      $this->db->select('i_pay_type');
      $query_packlist = $this->db->get_where(TBL_PLAN_PACK_LIST,$_where);
      $chk = $query_packlist->row();
      $return[cash] = false;
      if ($chk->i_pay_type == 1) {
        $return[cash] = true;
        break;
      }
    }
    $return[data] = $data;

//        plan_pack_list
    echo json_encode($return);
  }

  public function check_taxi_select_type_pay() {
    $_where = array();
    $_where[id] = $_GET[id];
    $this->db->select('i_select_type_pay');
    $query = $this->db->get_where(TBL_ORDER_BOOKING,$_where);
    $chk = $query->row();
    if ($chk->i_select_type_pay > 0) {
      $return[res] = true;
      $return[text] = "selected";
    }
    else {
      $return[res] = false;
      $return[text] = "no selected";
    }
    $return[id] = $_GET[id];
    echo json_encode($return);
  }

  public function finish_job_transfer_money() {

    $data = $this->Shop_model->detectOnlyTypePay();
    if ($data[result] == true) {
      $echo[pay] = $this->Shop_model->driver_approved_pay();
      $echo[completed] = $this->Shop_model->driver_complete();
    }
    else {
      $echo = false;
    }
    echo json_encode($echo);
  }

  public function update_bank_user() {
    $this->db->where('id',$_GET[order_id]);
    $add[bank_taxi_id] = $_GET[bank];
    $result[result] = $this->db->update(TBL_ORDER_BOOKING,$add);
    $result[get] = $_GET;
    echo json_encode($result);
  }

}

?>