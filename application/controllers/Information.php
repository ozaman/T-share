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
    $query = $this->db->query("select id from information_list");
    foreach ($query->result() as $val){
        $query_read = $this->db->query("SELECT id FROM information_reader_list where i_information = ".$val->id." and i_user = ".$_COOKIE[detect_user]." and i_status = 1");
        $check_read = $query_read->num_rows();
        if($check_read<=0){
          $count =+ 1;
        }else{
          $count = 0;
        }
    }
    
    echo json_encode($count);
    
  }
  
  public function count_each_info(){
  	$query = $this->db->query("select id from information_reader_list where i_information = ".$_GET[id]);
    $row = $query->num_rows();
    echo json_encode($row);
  }

  //////////////////////////// End
}

?>