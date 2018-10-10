<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Activity extends CI_Controller {
  public function __construct() {
    parent::__construct();
	$this->load->model('Activity_model');
  }
  public function index() {

  }
 
  public function count_activity(){
  		$this->db->select('id');
		$this->db->where('i_driver = '.$_GET[id_user].' and i_active = 0 ');
		$query = $this->db->get('activity_event');
		$num = $query->num_rows();
	echo json_encode($num);	
  }
  
  public function read_activity(){
  		$data['res'] = $this->Activity_model->read_activity();
  		echo json_encode($data['res']);
  }
  
}