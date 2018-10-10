<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Activity_model extends CI_Model {

 
  public function read_activity() {
   	$id = $_GET[id];
   	$ac[i_active] = $_POST[i_active];
   	
	$this->db->where('id', $id);
	$ac[result] = $this->db->update('activity_event', $ac); 
	$ac[id] = $id;
    return $ac;
  }
  

 
  /**
  * *********** End
  */
}