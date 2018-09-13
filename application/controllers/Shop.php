<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shop extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Shop_model');
  }


public function add_shop()
	{
		$data['res'] = $this->Shop_model->add_shop();
  		header('Content-Type: application/json');
  		echo json_encode($data['res']);
	}
public function cancel_shop()
	{
		$data['res'] = $this->Shop_model->cancel_shop();
  		header('Content-Type: application/json');
  		echo json_encode($data['res']);
	}	

public function detail_shop(){
		$this->load->view('shop/detail_shop_view');
	}	
	
public function checkin()
	{
		$data['res'] = $this->Shop_model->$_GET[type]();
  		header('Content-Type: application/json');
  		echo json_encode($data['res']);
	}
		
}
?>