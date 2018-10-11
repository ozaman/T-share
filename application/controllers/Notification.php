<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notification extends CI_Controller {
  public function __construct() {
    parent::__construct();
	$this->load->model('Notification_model');
  }
  public function index() {

  }
  
  public function add_notification(){
  	$data['res'] = $this->Notification_model->add_notification();
  	echo json_encode($data['res']);
  }
  
  public function count_notification(){
  		$this->db->select('id');
		$this->db->where('i_driver = '.$_GET[id_user].' and i_active = 0 ');
		$query = $this->db->get('notification_event');
		$num = $query->num_rows();
	echo json_encode($num);	
  }
  
  public function read_notification(){
  		$data['res'] = $this->Notification_model->read_notification();
  		echo json_encode($data['res']);
  }
  
  public function delete_notification(){
  		$data['res'] = $this->Notification_model->delete_notification();
  		echo json_encode($data['res']);
  }
  
  public function change_status_notification(){
  		$data['res'] = $this->Notification_model->change_status_notification();
  		echo json_encode($data['res']);
  }
  
}