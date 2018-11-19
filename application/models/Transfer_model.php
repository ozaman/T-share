<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transfer_model extends CI_Model {
  
  public function driver_deposit($username){
  
	$sql = "select balance,id from deposit where username = '".$username."' ";
	$query = $this->db->query($sql);
	$bl = $query->row();
	
	return $bl;
	
  }
  public function approve_job(){
    $_POST[deposit_date] = date('H:i');
    $_POST[deposit_time] = date('Y-m-d');
    $_POST[post_date] = date('Y-m-d');
    $_POST[post_date_f] = date('Y-m-d');
    $_POST[result] = $this->db->insert('deposit_history', $_POST);
    $query = $this->db->query("SELECT balance FROM deposit WHERE driver ='" . $_POST[driver] . "'");
    $row = $query->row();
	$data[balance] = intval($row->balance) - intval($_POST[deposit]); 
	$data[last_update] = time();
	$data[posted] = $_POST[driver];
	$data[ip] = $_SERVER['REMOTE_ADDR'];
    $this->db->where('driver', $_POST[driver]);
	$data[result] = $this->db->update('deposit', $data);
    $data[balance] = number_format($data[balance],2); 
    $return[deposit_his] = $_POST;
    $return[deposit] = $data;
	return $return;
  }


  /**
  * *********** End
  */
}