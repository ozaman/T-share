<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Activity_model extends CI_Model {

  public function add_activity(){
  		$_POST = $_POST[activity];
  		$data[i_type] = $_POST[i_type];
  		$data[i_sub_type] = $_POST[i_sub_type];
  		$data[i_event] = $_POST[i_event];
  		$data[i_driver] = $_POST[i_driver];
  		$data[s_topic] = $_POST[s_topic];
  		$data[s_message] = $_POST[s_message];
//  		$data[i_active] = 0;
  		$data[i_status] = 1;
  		$data[s_posted] = $_POST[s_posted];
  		$data[s_post_date] = time();
  		$data[s_last_update] = time();
  		$result = $this->db->insert('activity_event', $data);
  		$data[result] = $result;
  		
  		return $data;
  }
  
  /*public function read_activity() {
   	$id = $_GET[id];
   	$ac[i_active] = $_POST[i_active];
   	
	$this->db->where('id', $id);
	$ac[result] = $this->db->update('activity_event', $ac); 
	$ac[id] = $id;
    return $ac;
  }
  
  public function delete_activity(){
  	
  		$query = $this->db->query("select * from activity_event where id = ".$_POST[id]);
		$row = $query->row();
		
	       foreach($row as $key=>$val){        
	          if($key != "id"){ 
	          
	          $this->db->set($key, $val);               
	          }
	          else{
			  	 $this->db->set("i_activity_event", $val);
			  }          
	       }
     
		$backup = $this->db->insert('activity_event_logs'); 
		if($backup){
			$delete = $this->db->delete('activity_event', array('id' => $_POST[id])); 
		}
		$return[backup] = $backup;
		$return[deleted] = $delete;
		
	    return $return;
		
  }
  
  public function change_status_activity(){
  	$id = $_GET[id];
   	$ac[i_status] = $_POST[i_status];
   	
	$this->db->where('id', $id);
	$cs[result] = $this->db->update('activity_event', $ac); 
	$cs[id] = $id;
    return $cs;
  }	*/
  /**
  * *********** End
  */
}