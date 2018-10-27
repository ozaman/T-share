<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Component extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Main_model');
  }


public function cpn_user_province()
	{
//		$data['data'] = $this->Main_model->query_province();
		$this->load->view('component/province');
		
	}
public function cpn_car_type()
	{
//		$data['data'] = $this->Main_model->query_province();
		$this->load->view('component/car_type');
		
	}
	
	public function cpn_car_brand()
	{
//		$data['data'] = $this->Main_model->query_province();
		$this->load->view('component/car_brand');
		
	}
	
	public function cpn_car_gen()
	{
//		$data['data'] = $this->Main_model->query_province();
		$this->load->view('component/car_gen');
		
	}
	
	public function cpn_car_color()
	{
//		$data['data'] = $this->Main_model->query_province();
		$this->load->view('component/car_color');
		
	}
	
	public function cpn_car_plate()
	{
//		$data['data'] = $this->Main_model->query_province();
		$this->load->view('component/car_plate');
		
	}
	
	public function cpn_bank_list()
	{
//		$data['data'] = $this->Main_model->query_province();
		$this->load->view('component/bank_list');
		
	}
	
	public function cpn_car_ins()
	{
//		$data['data'] = $this->Main_model->query_province();
		$this->load->view('component/car_ins');
		
	}
	
	public function list_notification()
	{
//		$data['data'] = $this->Main_model->query_province();
		$this->load->view('component/list_notification');
		
	}
	
	public function list_activity()
	{
//		$data['data'] = $this->Main_model->query_province();
		$this->load->view('component/list_activity');
		
	}
	
	public function list_shop_manage()
	{
		$this->load->view('component/list_shop_manage_'.$_COOKIE[detect_userclass]);
		
	}
	
	public function new_plan()
	{
		$this->load->view('component/new_plan');
	}
}
?>