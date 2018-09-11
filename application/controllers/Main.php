<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
  public function __construct() {
    parent::__construct();
	$this->load->model('Main_model');
	$this->load->model('Mobile_model');
  }
  public function index() {

  }
  
  public function check_idcard(){
  	$data['res'] = $this->Main_model->check_idcard_overlap();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function check_car_plate(){
  	$data['res'] = $this->Main_model->check_car_plate_overlap();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function check_phone(){
  	$data['res'] = $this->Main_model->check_phone_overlap();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function get_id_province(){
  	$data['res'] = $this->Main_model->get_id_province_only();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function get_data_province(){
  	$data['res'] = $this->Main_model->get_data_province();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function update_num_place(){
  	$data['res'] = $this->Main_model->update_num_place_all();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
 
// public function detect
//////////////////////////// End
}