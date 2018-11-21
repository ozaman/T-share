<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Station extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Station_model');
  }

  public function service_manage_view() {
//		$data['data'] = $this->Main_model->query_province();
    $this->load->view('station/service_view');
//    echo 9999;
  }

  public function add_service() {
    $this->load->view('station/service_add');
  }

  public function data_place_all() {
    
//    $data['area'] = $this->Station_model->get_amphur();
    $data['place'] = $this->Station_model->get_place();
    echo json_encode($data);
  }
  
  public function data_aumphur() {
    
    $data['area'] = $this->Station_model->get_amphur();
    echo json_encode($data);
  }

}

?>