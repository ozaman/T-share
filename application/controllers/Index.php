<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Main_model');
    $this->load->model('Mobile_model');
  }

  public function index() {
//  echo $_COOKIE[detect_user];
    $this->load->view('home_view');
    if ($_COOKIE[detect_user]) {
      $query = $this->db->query("select * from ".TBL_APP_SETTING." where i_user = ".$_COOKIE[detect_user]);
      $check_row = $query->num_rows();
//        echo $check_row;
      if ($check_row <= 0) {
        $data[i_user] = $_COOKIE[detect_user];
        $result[setting] = $this->db->insert('app_user_setting',$data);
      }
      
      $this->db->select('id');
      $where = array();
      $where[driver] = $_COOKIE[detect_user];
      $query_dp = $this->db->get_where(TBL_DEPOSIT,$where);
      $check_deposit = $query_dp->num_rows();
      if ($check_deposit <= 0) {
        $data_dp[driver] = $_COOKIE[detect_user];
        $data_dp[username] = $_COOKIE[detect_username];
        $data_dp[deposit] = 0;
        $data_dp[balance] = 0;
        $data_dp[withdraw] = 0;
        $data_dp[posted] = $_COOKIE[detect_user];
        $data_dp[ip] = $_SERVER["SERVER_ADDR"];
        $data_dp[last_update] = time();
        
        $result[deposit] = $this->db->insert(TBL_DEPOSIT,$data_dp);
      }
      
    }
  }

  public function admin() {
    $this->load->view('home_view');
  }

  //////////////////////////// End
}

?>