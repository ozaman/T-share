<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Information_model extends CI_Model {

  public function query_info() {

    $query = $this->db->query("select * from information_list where id = ".$_GET[id]);
    $row = $query->row();

    return $row;
  }

  public function read_info() {

//    $query = $this->db->query("select * from information_reader_list where i_information = ".$_GET[id]." and i_user = ".$_COOKIE[detect_user]);
//    $row = $query->num_rows();
//    if ($row > 0) {
//
//      $data[d_read_time] = time();
//      $this->db->where('i_information',$_GET[id]);
//      $this->db->where('i_user',$_COOKIE[detect_user]);
//      $data[result] = $this->db->update('information_reader_list',$data);
//      $data[type] = "update";
//    }
//    else {
      $data[i_information] = $_GET[id];
      $data[i_user] = $_COOKIE[detect_user];
      $data[d_read_time] = time();
      $data[result] = $this->db->insert('information_reader_list',$data);
      $data[type] = "insert";
//    }

    $return[read_user] = $data;
//    $return[read_all] = $main_tb;
    return $return;
  }

  /**
   * 
   * 
   * *********** End
   * 
   */
}
