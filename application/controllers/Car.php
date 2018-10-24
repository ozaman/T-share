<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Car extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Car_model');
	}


	public function add_car(){
		$data['res'] = $this->Car_model->add_car();
		header('Content-Type: application/json');
		echo json_encode($data['res']);
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
}
?>