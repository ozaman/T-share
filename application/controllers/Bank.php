<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bank extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Bank_model');
  }


public function add_bank(){
		$data['res'] = $this->Bank_model->bank_car();
  		header('Content-Type: application/json');
  		echo json_encode($data['res']);
//  		echo 123;
	}
	

	
}
?>