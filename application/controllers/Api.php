<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Main_model');
  }

  public function send_mail() {
//	$address3 = "system.goldenbeachgroup@gmail.com";
    $address3 = "izudsuarez@gmail.com";
    $this->load->library('email');
    $config['protocol'] = 'sendmail';
    $config['mailpath'] = '/usr/sbin/sendmail';
    $config['charset'] = 'utf-8';
    $config['wordwrap'] = TRUE;

    $this->email->initialize($config);

    $this->email->from('system.goldenbeachgroup@gmail.com','TShare');
    $this->email->to($address3);
    // $this->email->cc('another@another-example.com');
    //$this->email->bcc('them@their-example.com');

    $this->email->subject('Email Test อ่านได้ไหม');
    $this->email->message('Testing the email class. อ่านได้ไหม');

    echo $this->email->send();

    echo $this->email->print_debugger();
//	$this->load->view('api/mail2');
//	echo 123;
  }

  public function get_my_transfer_job() {
    $url = "http://www.welovetaxi.com:3000/countOrderbydriver";
    $curl_post_data = '{"driver": '.$_POST[driver].',"date": "'.$_POST[date].'","driver_checkcar" : 0 }';
    $ch = curl_init($url);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$curl_post_data);
    curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result = curl_exec($ch);
    curl_close($ch);
    $decode = json_decode($result);
//		header('Content-Type: application/json');
    echo json_encode($decode);
  }

  public function transfer_booking() {
//	driver_checkcar : 0 = manage , 1 = history

    $url = "http://www.welovetaxi.com:3000/getDriverlogsbyid";
    $curl_post_data = '{"driver": '.$_POST[driver].',"date": "'.$_POST[date].'","driver_checkcar" : '.$_POST[driver_checkcar].' }';
//	$curl_post_data = '{"driver": 153,"date": "2018-09-20","driver_checkcar" : 1 }';                            
    $ch = curl_init($url);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$curl_post_data);
    curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result = curl_exec($ch);
    curl_close($ch);
    $decode = json_decode($result);
//	header('Content-Type: application/json');
    echo json_encode($decode);
//	echo $curl_post_data;
  }

  public function transfer_booking_byid() {
    $url = "http://www.welovetaxi.com:3000/getOrderbookingbyid";
    $curl_post_data = '{"idorder": "'.$_POST[idorder].'"}';
    $ch = curl_init($url);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$curl_post_data);
    curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result = curl_exec($ch);
    curl_close($ch);
    $decode = json_decode($result);
//		header('Content-Type: application/json');
    echo json_encode($decode);
  }

  public function shop_history_driver() {
    $url = "http://www.welovetaxi.com:3000/getOrderhisdriver";

    //create a new cURL resource
    $ch = curl_init($url);

    //setup request to send json via POST

    $curl_post_data2 = '{"driver": '.$_POST[driver].',"date":"'.$_POST[date].'", "status":"'.$_POST[status].'"}';

    //attach encoded JSON string to the POST fields
    curl_setopt($ch,CURLOPT_POSTFIELDS,$curl_post_data2);
    //set the content type to application/json
    curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
    //return response instead of outputting
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    //execute the POST request
    $result = curl_exec($ch);
    //close cURL resource
    curl_close($ch);
    $decode = json_decode($result);
    header('Content-Type: application/json');
    echo json_encode($decode);
  }

  public function shop_history_lab() {
    $url = "http://www.welovetaxi.com:3000/getOrderhislab";

//create a new cURL resource
    $ch = curl_init($url);

//setup request to send json via POST

    $curl_post_data2 = '{"date":"'.$_POST[date].'", "status":"'.$_POST[status].'"}';

//attach encoded JSON string to the POST fields
    curl_setopt($ch,CURLOPT_POSTFIELDS,$curl_post_data2);
//set the content type to application/json
    curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
//return response instead of outputting
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//execute the POST request
    $result = curl_exec($ch);
//close cURL resource
    curl_close($ch);
    $decode = json_decode($result);
    header('Content-Type: application/json');
    echo json_encode($decode);
  }

  public function shop_wait_trans_shop() {

    $url = "http://www.welovetaxi.com:3000/getOrderbookingcom";

//create a new cURL resource
    $ch = curl_init($url);

//setup request to send json via POST
    if ($_GET[driver_id] != "") {
      $dv = $_GET[driver_id];
    }
    else {
      $dv = "";
    }
    $curl_post_data2 = '{"driver_id":"'.$dv.'","date":""}';
//attach encoded JSON string to the POST fields
    curl_setopt($ch,CURLOPT_POSTFIELDS,$curl_post_data2);
//set the content type to application/json
    curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
//return response instead of outputting
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//execute the POST request
    $result = curl_exec($ch);
//close cURL resource
    curl_close($ch);
    $decode = json_decode($result);
    header('Content-Type: application/json');
    echo json_encode($decode);
  }

  public function shop_history_fix() {
    $date = $_POST[date];
    $status = $_POST[status];
    if ($_POST[class_name] == "taxi") {
      $sql_class = " and drivername = '".$_POST[driver]."' ";
    }
    if ($date != "") {
      $sql_date = " and transfer_date = '".$date."' ";
    }
    if ($status != "") {
      $sql_status = " and status = '".$status."' ";
    }$sql = "select * from order_booking where driver_complete = 1 ".$sql_date.$sql_status.$sql_class." order by id desc";
    $query = $this->db->query($sql);

    foreach ($query->result() as $row) {
      $data[] = $row;
    }
    if (count($data) > 0) {
      $return[data] = $data;
    }
    else {
      $return[data] = "";
    }
    $return[sql] = $sql;
    echo json_encode($return);
  }

  public function detect_driver_approve_transfer() {
    $url = "http://www.welovetaxi.com:3000/recheckBooking";
    $curl_post_data = '{"idorder": '.$_POST[idorder].' }';
    $ch = curl_init($url);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$curl_post_data);
    curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result = curl_exec($ch);
    curl_close($ch);
    $decode = json_decode($result);
//	header('Content-Type: application/json');
    echo json_encode($decode);
//    echo $decode;
  }

  public function getjob_booking_transfer() {
    $url = "http://www.welovetaxi.com:3000/updateDriverlogs";
    //create a new cURL resource
    $ch = curl_init($url);
    $curl_post_data3 = json_encode($_POST);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$curl_post_data3);
    curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result = curl_exec($ch);
    curl_close($ch);
    $decode = json_decode($result);
//	header('Content-Type: application/json');
    echo json_encode($decode);
  }

  public function checkin_transfer() {
    $typ_pay = $_GET[type_pay];
    $step = $_GET[step];
    if ($step == "driver_checkcar") {
//	$curl_post_data2 = '{"driver_checkcar": 1,"idorder": '.$_POST[idorder].'}';		
      if ($typ_pay == 1) {
        $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
        $dv_dp = $this->db->query("SELECT balance,id from deposit where driver = '".$_POST[driver_id]."' ");
        $dv_dp = $dv_dp->row();

        $pay_driver = intval($_POST[cost]) - intval($_POST[s_cost]);
        $deposit_update = intval($dv_dp->balance) + intval($pay_driver);

        $data[order_id] = $_POST[idorder];
        $data[deposit_pay] = $pay_driver;
        $data[balance_before] = $dv_dp->balance;
        $data[status] = 1;
        $data[post_date] = time();
        $data[last_update] = time();
        $data[type_pay] = 1;
        $data[type_job] = "transfer";
        $data[driver_id] = $_POST[driver_id];
        $data[result] = $this->db->insert('history_pay_driver_deposit', $data);
        $return[deposit] = $data;

        $update[balance] = $deposit_update;
        $update[last_update] = time();
        $this->db->where('id', $dv_dp->id);
        $update[result] = $this->db->update('deposit');
        $update[id] = $dv_dp->id;
        $return[update_balance] = $update;
      }
      else {

        $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
//        $res[dv_dp] = $db->select_query("SELECT balance,id from deposit where driver = '".$_POST[driver_id]."' ");
//        $arr[dv_dp] = $db->fetch($res[dv_dp]);
        $dv_dp = $this->db->query("SELECT balance,id from deposit where driver = '".$_POST[driver_id]."' ");
        $dv_dp = $dv_dp->row();

        $pay_driver = intval($_POST[cost]) - intval($_POST[s_cost]);
        $deposit_update = intval($dv_dp->balance) - intval($dv_dp->s_cost);

        $data[order_id] = $_POST[idorder];
        $data[s_cost] = $_POST[s_cost];
        $data[deposit_pay] = $pay_driver;
        $data[balance_before] = $dv_dp->balance;
        $data[status] = 1;
        $data[post_date] = time();
        $data[last_update] = time();
        $data[type_pay] = 0;
        $data[type_job] = "transfer";
        $data[driver_id] = $_POST[driver_id];
    //        $data[result] = $db->add_db("history_pay_driver_deposit",$data);
        $data[result] = $this->db->insert('history_pay_driver_deposit', $data);
        $return[deposit] = $data;

        $update[balance] = $deposit_update;
        $update[last_update] = time();
//        $update[result] = $db->update_db("deposit",$update,"id = '".$dv_dp->id."' ");
        $this->db->where('id', $dv_dp->id);
        $update[result] = $this->db->update('deposit');
        $update[id] = $dv_dp->id;
        $return[update_balance] = $update;
      }
      /**
       * 
       * @var update ap_order status
       * 
       */
      $up_order[status] = 1;
      $db->connectdb(DB_NAME_BOOK,DB_USERNAME,DB_PASSWORD);
      $up_order[result] = $db->update_db("ap_order",$up_order," 	invoice = '".$_POST[invoice]."' ");
      $db->closedb();
      $return[update_ap_order] = $up_order;
    }
    
    $f_date = $step."_date";
    $f_lat = $step."_lat";
    $f_lng = $step."_lng";
    $curl_post_data2 = '{"'.$step.'": 1,"idorder": '.$_POST[idorder].',"'.$f_date.'":'.time().',"'.$f_lat.'":"'.$_POST[lat].'","'.$f_lng.'":"'.$_POST[lng].'"}';
    $url = "http://www.welovetaxi.com:3000/updateJobstatus";

    $ch = curl_init($url);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$curl_post_data2);
    curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result = curl_exec($ch);
    curl_close($ch);
    $decode = json_decode($result);

    $return[api] = $decode;
    header('Content-Type: application/json');
    echo json_encode($return);
  }

}

?>