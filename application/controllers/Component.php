<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Component extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Main_model');
  }

  public function cpn_user_province() {
//		$data['data'] = $this->Main_model->query_province();
    if ($_GET[type] == 'car') {
      $this->load->view('component/car_province');
    }else if($_GET[type] == 'user'){
      $this->load->view('component/user_province');
    }else {
      $this->load->view('component/province');
    }
  }

  public function cpn_car_type() {
//		$data['data'] = $this->Main_model->query_province();
    $this->load->view('component/car_type');
  }

  public function cpn_car_brand() {
//		$data['data'] = $this->Main_model->query_province();
    $this->load->view('component/car_brand');
  }

  public function cpn_car_gen() {
//		$data['data'] = $this->Main_model->query_province();
    $this->load->view('component/car_gen');
  }

  public function cpn_car_color() {
//		$data['data'] = $this->Main_model->query_province();
    $this->load->view('component/car_color');
  }

  public function cpn_car_plate() {
//		$data['data'] = $this->Main_model->query_province();
    $this->load->view('component/car_plate');
  }

  public function cpn_bank_list() {
//		$data['data'] = $this->Main_model->query_province();
    $this->load->view('component/bank_list');
  }

  public function cpn_car_ins() {
//		$data['data'] = $this->Main_model->query_province();
    $this->load->view('component/car_ins');
  }

  public function list_notification() {
//		$data['data'] = $this->Main_model->query_province();
    $this->load->view('component/list_notification');
  }

  public function list_activity() {
//		$data['data'] = $this->Main_model->query_province();
    $this->load->view('component/list_activity');
  }

  public function list_shop_manage() {
    $this->load->view('component/list_shop_manage_'.$_COOKIE[detect_userclass]);
//		echo 555;
  }

  public function new_plan() {
    $this->load->view('component/new_plan');
  }

  public function box_confirm_pay() {
    $this->load->view('component/box_confirm_pay_shop');
  }

  public function box_select_bank_shop() {
    $this->load->view('component/box_shop_bank');
  }

  public function box_status_trans_shop() {
    $this->load->view('component/box_status_transfer_shop');
  }

  public function cpn_place_all() {
    $this->load->view('component/place_all');
  }

  public function cpn_amphur() {
    $this->load->view('component/amphur');
  }

  public function list_manage_place_station() {
    $this->load->view('component/list_manage_place_station');
  }
  
  public function load_choose_car($param) {
    $this->load->view('component/box_shop_car');
  }

}
 
?>