<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Information_model');
  }

  public function query_info() {
      $data['res'] = $this->Information_model->query_info();
      echo json_encode($data['res']);
  }
  
  public function read_info() {
      $data['res'] = $this->Information_model->read_info();
      echo json_encode($data['res']);
  }
  
  public function count_info(){
    $query = $this->db->query("select id from information_reader_list where i_information = ".$_GET[id]);
    $row = $query->num_rows();
    echo json_encode($row);
    
  }

  //////////////////////////// End
}

?>