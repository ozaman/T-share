<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Transfer_model');
  }

  public function transfer_job() {
    $this->load->view('page/transfer_view',$data);
  }

  public function approve_job() {
//    $db = new DB();
//	$db->connectdb_utf(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
//	
//	$_POST[result] = $db->add_db('deposit_history',$_POST);
//	
//	$ds = $db->select_query("SELECT balance FROM deposit WHERE driver ='" . $_POST[driver] . "'    ");
//    $ds = $db->fetch($ds);
//	$data[balance] = intval($ds[balance]) - intval($_POST[deposit]); 
//	$data[last_update] = time();
//	$data[posted] = $_POST[driver];
//	$data[ip] = $_SERVER['REMOTE_ADDR'];
//	$data[result] = $db->update_db('deposit',$data,'driver = "'.$_POST[driver].'" ');
//	$_POST[update_ds] = $data;
//	header('Content-type: application/json');
    
    $return = $this->Transfer_model->approve_job();
	echo json_encode($return);
  }

}

?>