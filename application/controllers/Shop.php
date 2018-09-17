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

public function editadult()
	{
		$data['res'] = $this->Shop_model->editadult();
  		header('Content-Type: application/json');
  		echo json_encode($data['res']);
	}
	public function place_company(){
	$arr_where = array();
	$arr_where['status'] = 1;
    $arr_select = array('*');
    $arr_order = array();
    $arr_order['id'] = 'ASC';
    $data['place_company'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT, $arr_where, $arr_select,$arr_order);
		// $data['place_company'] = $this->Shop_model->place_company();
  		// header('Content-Type: application/json');
  		// echo json_encode($data);
  		$this->load->view('shop/place_company',$data);
	}
	public function place_companycount(){	
    $data = $this->Shop_model->place_companycount();
		// $data['place_company'] = $this->Shop_model->place_company();
  		// header('Content-Type: application/json');
  		echo json_encode($data);
  		
  		// $this->load->view('shop/place_company',$data);
	}
	public function shop_page(){
		$this->load->view('shop/home_view');
	}
	public function shop_pageadd(){
		$this->load->view('shop/shop_add');
	}
	public function shop_manage(){
		$this->load->view('shop/shop_manage');
	}

	public function shop_history()
	{
		$url = "http://www.welovetaxi.com:3000/getOrderhisdriver";  
		// $curl_post_data = '{"driver": '.$_POST[driver].',"date": "'.$_POST[date].'"}';
		$curl_post_data = '{"driver": 153,"date": "2018-09-17"}';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($ch);
		curl_close($ch);
		 

		 $decode['his'] = 	json_decode($data);
		// header('Content-Type: application/json');
	 $this->load->view('shop/shop_history',$decode);
		 //echo json_encode($decode);
	}
	public function detail_shop_his(){
		$data['book'] = $this->Main_model->rowdata(TBL_ORDER_BOOKING, array('invoice' => $_POST[invoice]), '');
		$this->load->view('shop/detail_shop_his',$data);
	}


		
}

		

?>