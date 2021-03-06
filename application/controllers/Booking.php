<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Booking extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Booking_model');
	}


	public function index(){
		// $data['res'] = $this->Car_model->add_car();
		// header('Content-Type: application/json');
		// echo json_encode($data['res']);
		$this->load->view('booking/index');
	}
	
	public function add_car_shop(){
		$data['res'] = $this->Car_model->add_car_shop();
		header('Content-Type: application/json');
		echo json_encode($data['res']);
	}
	
	public function edit_car(){
		$data['res'] = $this->Car_model->edit_car();
		header('Content-Type: application/json');
		echo json_encode($data['res']);
	}
	
	public function change_car_often(){
		$data['res'] = $this->Car_model->change_car_often();
		header('Content-Type: application/json');
		echo json_encode($data['res']);
	}
	public function change_status_car(){
		$data['res'] = $this->Car_model->change_status_car();
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	public function check_num_car(){
		$data['res'] = $this->Car_model->running_single_often_car();
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	public function car_station(){
		$arr_where = array();
		$arr_where['member'] = $_POST[driver_id];
		$arr_select = array('*');
		$arr_order = array();
		$arr_order['id'] = 'ASC';
		$data['CAR_STATION'] = $this->Main_model->fetch_data('','',TBL_PLACE_CAR_STATION, $arr_where, $arr_select,$arr_order);		
		$this->load->view('car/body_car_station',$data);
	}
	
	public function car_form_station(){
		$arr_where = array();
		$arr_where['member'] = $_POST[driver_id];
		$arr_select = array('*');
		$arr_order = array();
		$arr_order['id'] = 'ASC';
		$data['CAR_STATION'] = $this->Main_model->fetch_data('','',TBL_PLACE_CAR_STATION, $arr_where, $arr_select,$arr_order);		
		$this->load->view('car/form_car_station',$data);
	}
	
	public function edit_form_station(){
		$arr_where = array();
		$arr_where['member'] = $_POST[driver_id];
		$arr_select = array('*');
		$arr_order = array();
		$arr_order['id'] = 'ASC';
		$data['CAR_STATION'] = $this->Main_model->fetch_data('','',TBL_PLACE_CAR_STATION, $arr_where, $arr_select,$arr_order);		
		$this->load->view('car/edit_car_station',$data);
	}
	public function box_station_other(){
		
		$this->load->view('car/box_station_other');
	}
	public function num_station_other()
	{
		$_where = array();
		$_where[region] = $_POST[region];
		$_where[province] = $_POST[province];
		$_where[amphur] = $_POST[amphur];
		$_where[type] = $_POST[type];

		$num = $this->Main_model->num_row(TBL_PLACE_CAR_STATION_OTHRET,$_where);
		header('Content-Type: application/json');
		echo json_encode($num);
	}
	public function body_car_station(){
//		echo 555;
		$this->load->view('car/body_car_station');
	}
	public function form_addstation_div(){
//		echo 555;
		$this->load->view('car/form_car_station');
	}
	public function shop_station_field(){
//		echo 555;
		$this->load->view('car/box_station_field');
	}
	public function station_his(){
//		echo 555;
		$this->load->view('car/body_station_his');
	}
}
?>