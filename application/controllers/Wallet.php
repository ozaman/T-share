<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Wallet_model');
  }

  public function add_inform_money() {
    $data['res'] = $this->Wallet_model->add_inform_money();
    header('Content-Type: application/json');
    echo json_encode($data['res']);
//  		echo json_encode($_POST);
  }

  public function withdraw_inform_money() {
    $data['res'] = $this->Wallet_model->withdraw_inform_money();
    header('Content-Type: application/json');
    echo json_encode($data['res']);
  }

  public function get_deposit() {
    $this->db->select('*');
    $where[driver] = $_GET[driver];
    $query = $this->db->get_where(TBL_DEPOSIT,$where);
    echo json_encode($query->row());
  }

}

?>