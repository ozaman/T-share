<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Login_model');
  }

  public function index() {
    $this->load->view('login/index');
  }

  public function logins() {
    // header('Content-Type: application/json');

    $return = $this->Login_model->login();
    echo json_encode($return);
  }

  public function recovery() {
    $return = $this->Login_model->recovery();
    echo json_encode($return);
  }

  public function user_data() {
    $return = $this->Login_model->user_data();
    echo json_encode($return);
  }

  public function push_sms() {
    $return = $this->Login_model->push_sms();
    echo json_encode($return);
  }

  public function get_id_province_only() {
    $return = $this->Login_model->get_id_province_only();
    echo json_encode($return);
  }

  public function phone_overlap() {
    $return = $this->Login_model->phone_overlap();
    echo json_encode($return);
  }

  public function data_province() {
    header('Content-Type: application/json');
    $return = $this->Login_model->data_province();
    echo json_encode($return);
  }

  public function province() {
    $this->load->view('login/province');
  }

  public function register() {
//    header('Content-Type: application/json');
    $return[data] = $this->Login_model->register();
    $return[qrcode] = $this->Login_model->chkqrcode($return[data][last_id]);
    echo json_encode($return);
  }

  

  public function loadqrcode_allmem() {

    $this->db->select('id');
    $this->db->where('status',1);
    $this->db->where('id >',541);
    $query = $this->db->get_where(TBL_WEB_DRIVER,$_where);

    foreach ($query->result() as $value) {
      $file_name = $value->id."_driver.png";
      $path = "../data/qrcode/register/".$file_name;
      if (file_exists($path)) {
//        $return[res] = true;
//        echo json_encode($return);
          echo $value->id." : 1";
      }
      else {
//          echo $value->id." : 0";
//        $return[res] = false;
        $qr_code = "https://api.qrserver.com/v1/create-qr-code/?size=430x430&data=https://www.welovetaxi.com/app/T-share/?ref=".$value->id;
//        $part_qr_code = $path;
        echo copy($qr_code,$path);
//        echo json_encode($return);
      }
      echo "<br/>";
    }
  }
  
}

?>