<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Login_model');

	}


	public function index(){
		$this->load->view('login/index');
	}
	public function logins()	{
		// header('Content-Type: application/json');

		$return = $this->Login_model->login();
		echo json_encode($return);

	}
	public function recovery(){
		$return = $this->Login_model->recovery();
		echo json_encode($return);
	}
	public function user_data(){
		$return = $this->Login_model->user_data();
		echo json_encode($return);
	}
	public function push_sms(){
		$return = $this->Login_model->push_sms();
		echo json_encode($return);
	}
	public function get_id_province_only(){	
		$return = $this->Login_model->get_id_province_only();
		echo json_encode($return);
	}
	public function phone_overlap(){
		$return = $this->Login_model->phone_overlap();
		echo json_encode($return);
	}
	public function data_province(){
		header('Content-Type: application/json');
		$return = $this->Login_model->data_province();
		echo json_encode($return);
	}
	public function province(){
		$this->load->view('login/province');
	}
	public function register(){
		header('Content-Type: application/json');
		$return = $this->Login_model->register();
		echo json_encode($return);
	}
}
?>