<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Car extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Car_model');
  }


public function add_car()
	{
		$data['res'] = $this->Shop_model->add_car();
  		header('Content-Type: application/json');
  		echo json_encode($data['res']);
	}

}
?>