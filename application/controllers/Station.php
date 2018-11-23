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

  public function service_place_view() {
    $this->load->view('station/service_place_view');
  }

  public function add_service_area() {
    $this->load->view('station/service_add_area');
  }

  public function add_service_place() {
    $this->load->view('station/service_add_place');
  }

  public function manage_place() {
    $this->load->view('station/manage_place');
  }

  public function add_place_owner() {
    $this->load->view('station/add_place_owner_view');
  }

  public function data_place_all() {

//    $data['area'] = $this->Station_model->get_amphur();
    $data['place'] = $this->Station_model->get_place();
    echo json_encode($data);
  }

  public function data_amphur() {

    $data['area'] = $this->Station_model->get_amphur();
    echo json_encode($data);
  }

  public function add_data_service_area() {

    $data = $this->Station_model->add_data_service_area();
    echo json_encode($data);
  }

  public function add_data_service_place() {

    $data = $this->Station_model->add_data_service_place();
    echo json_encode($data);
  }

  public function save_place_owner() {
    $data = $this->Station_model->save_place_owner();
    echo json_encode($data);
  }

  public function save_each_trans_pl_station() {
    $where = array();
    $this->db->select('');
    $where[status] = 1;
    $where[id] = $this->input->post('place_id');
    $query = $this->db->get_where(TBL_WEB_TRANSFERPLACE_NEW,$where);
    if ($query->row()->i_station_owner > 0) {
      $data[status] = FALSE;
      $data[msg] = "มีคิวแล้ว";
    }
    else {
      $data = $this->Station_model->save_each_trans_pl_station();
    }

    echo json_encode($data);
  }

}

?>