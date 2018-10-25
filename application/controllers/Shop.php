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
//		echo 555;
		$this->load->view('shop/detail_shop_view');
	}	
	
	public function checkin()
	{
		$data['res'] = $this->Shop_model->$_GET[type]();
		header('Content-Type: application/json');
		echo json_encode($data['res']);
	}
	
	public function editpax()
	{	
		$data['res'] = $this->Shop_model->editpax();
		
		header('Content-Type: application/json');
		echo json_encode($data['res']);
	}
	
	/*public function editadult()
	{
		$data['res'] = $this->Shop_model->editadult();
		header('Content-Type: application/json');
		echo json_encode($data['res']);
	}
	public function editchild()
	{
		$data['res'] = $this->Shop_model->editchild();
		header('Content-Type: application/json');
		echo json_encode($data['res']);
	}*/
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
		header('Content-Type: application/json');
		$_where = array();
    // $_where['product_id'] = $_GET[id];
		$_where['status'] = 1;
    // $_where['time_other_number'] = 2;




		$data = $this->Main_model->num_row(TBL_SHOPPING_PRODUCT,$_where);
		if ($data == 1) {
			$data_res = array();
			$data_res[count] = 1;
			$arr_where = array();
			$arr_where['status'] = 1;
			$arr_select = array('id');
    //$arr_order = array();

			$data2 = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT, $arr_where, $arr_select,'');
			$data_res[shop_id] = $data2[0]->id;
		}
		else{
			$data_res[count] = 2;
		}
    // $data = $this->Shop_model->place_companycount();
		// $data['place_company'] = $this->Shop_model->place_company();
  		// header('Content-Type: application/json');
		echo json_encode($data_res);

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
		/*$url = "http://www.welovetaxi.com:3000/getOrderhisdriver";  
		$curl_post_data = '{"driver": '.$_POST[driver].',"date": "'.$_POST[date].'"}';
		// $curl_post_data = '{"driver": 153,"date": "2018-09-17"}';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($ch);
		curl_close($ch);
		 

		 $decode['his'] = 	json_decode($data);
		 $this->load->view('shop/shop_history',$decode);*/
		 $this->load->view('shop/shop_history');

		}
		public function detail_shop_his(){
			$data['book'] = $this->Main_model->rowdata(TBL_ORDER_BOOKING, array('invoice' => $_POST[invoice]), '');
//			$this->load->view('shop/detail_shop_his',$data);
			echo json_encode($data['book']);
		}
		public function get_data_shop(){
			$data['book'] = $this->Main_model->rowdata(TBL_ORDER_BOOKING, array('id' => $_POST[id]), '');
			echo json_encode($data['book']);
		}
		public function car_count(){
			$data = $this->Shop_model->car_count();
			echo $data;
		}
		public function count_his(){
			$url = "http://www.welovetaxi.com:3000/getOrderhisdriver";  
			$curl_post_data = '{"driver": '.$_POST[driver].',"date": "'.$_POST[date].'"}';
		// $curl_post_data = '{"driver": 153,"date": "2018-09-17"}';
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$data = curl_exec($ch);
			curl_close($ch);


			$decode = 	json_decode($data);
			echo count($decode->data);
		// header('Content-Type: application/json');
	 // $this->load->view('shop/shop_history',$decode);
		 //echo json_encode($decode);
		}
		public function lab_acknowledge(){
			$data['res'] = $this->Shop_model->lab_acknowledge();
			header('Content-Type: application/json');
			echo json_encode($data['res']);
		}

		public function update_time_toplace(){
			$data['res'] = $this->Shop_model->update_time_toplace();
			header('Content-Type: application/json');
			echo json_encode($data['res']);
		}
		public function box_price_plan(){
			$this->load->view('shop/box_price_plan');
		}
		public function chk_time(){
			header('Content-Type: application/json');
			$arr_where = array();
			$arr_where['status'] = 1;
			$arr_where['product_id'] = $_GET[shop_id];
			$arr_where['product_day'] = $_GET[day];
			$arr_select = array('*');

			$data = $this->Main_model->fetch_data('','',TBL_SHOPPING_OPEN_TIME, $arr_where, $arr_select,'');
			echo json_encode($data);
		}
		public function lab_approved_pay(){
			$data['res'] = $this->Shop_model->lab_approved_pay();
//			header('Content-Type: application/json');
			echo json_encode($data['res']);
		}
		public function driver_approved_pay(){
			$data['res'] = $this->Shop_model->driver_approved_pay();
//			header('Content-Type: application/json');
			echo json_encode($data['res']);
		}
		public function findInvoice(){
			$data['book'] = $this->Main_model->rowdata(TBL_ORDER_BOOKING, array('id' => $_GET[id]), array('invoice'));
			echo json_encode($data['book']);
		}

		public function update_logo(){
			$arr_where = array();
		// $arr_where['status'] = 1;
			$arr_select = array('*');
			$arr_order = array();
			$arr_order['id'] = 'ASC';
			$data = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT, $arr_where, $arr_select,$arr_order);
			foreach ($data as $key => $value) {
				$name = $value->id.'_logo.jpg';
				$add = array();
				$add["pic_logo"] = $name;
				$this->db->where('id', $value->id);
				echo $result = $this->db->update(TBL_SHOPPING_PRODUCT, $add);
			}
		// $data['place_company'] = $this->Shop_model->place_company();
  		// header('Content-Type: application/json');
  		// echo json_encode($data);
		// $this->load->view('shop/place_company',$data);
		}
		public function editpax_regis(){
			$data = $this->Shop_model->editpax_regis();
			header('Content-Type: application/json');
			echo json_encode($data);
		}


		public function change_plan(){
			if($_POST[plane_id_replan]!=$_POST[price_plan]){
				$data['change_plan'] = $this->Shop_model->change_plan();
			}
			
			$data['checkin'] = $this->Shop_model->guest_register();
//			header('Content-Type: application/json');
			echo json_encode($data);
		}
		
		public function taxi_approved_cancel(){
			$data['res'] = $this->Shop_model->taxi_approved_cancel();
			echo json_encode($data['res']);
		}

		
	}
	?>