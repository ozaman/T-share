<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Main_model');
    $this->load->model('Transfer_model');
  }


public function shop()
	{
		$this->load->view('page/shop_view',$data);
	}
public function transfer()
	{
		$username = $_COOKIE[detect_username];
		$result = $this->Transfer_model->driver_deposit($username);
//		echo json_encode($result);
		$this->load->view('transfer/transfer_view',$result);
	}
public function booking_detail()
	{
		$this->load->view('transfer/book_detail_view',$data);
	}
public function transfer_manage()
	{
		$this->load->view('transfer/manage_view',$data);
	}		
}
?>