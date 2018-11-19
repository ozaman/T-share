<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Main_model');
    $this->load->model('Mobile_model');
  }


public function index()
	{
        
		$this->load->view('home_view');
        $query = $this->db->query("select * from app_user_setting where i_user = ".$_COOKIE[detect_user]);
        $check_row = $query->num_rows();
        if($check_row<=0){
          $data[i_user] = $_COOKIE[detect_user];
          $result = $this->db->insert('app_user_setting', $data);
        }
	}

public function admin()
	{
		$this->load->view('home_view');
	}	


  //////////////////////////// End
}
?>