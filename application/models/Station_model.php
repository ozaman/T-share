<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Station_model extends CI_Model {

  public function index() {
    
  }

  public function get_amphur() {
    $pv = $_POST[province];
    $this->db->select('id,name_th');
    $query = $this->db->get_where(TBL_WEB_AMPHUR,array('PROVINCE_ID' => $pv));
    $res = $query->result();
    foreach ($res as $row) {
      $data[] = $row;
    }
    return $data;
  }

  public function get_place() {
    $pv = $_POST[province];

    $this->db->select('id,topic as name_th');
    $this->db->where('pro',$pv);
    if ($_POST[aumphur] != "") {
      $this->db->where('aum',$_POST[aumphur]);
    }
    $this->db->where('status', 1);
    $query = $this->db->get(TBL_WEB_TRANSFERPLACE_NEW);
    $res = $query->result();
    foreach ($res as $row) {
      $data[] = $row;
    }
    return $data;
  }

  /**
   * 
   * 
   * *********** End
   * 
   */
}
