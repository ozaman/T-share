<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notification_model extends CI_Model {

  public function add_notification_taxi($data){
  		$_POST = $data;
  		$to_table = "notification_event_taxi";
  		$data[i_type] = $_POST[i_type];
  		$data[i_event] = $_POST[i_event];
  		$data[i_user] = $_POST[i_user];
  		$data[s_class_user] = $_POST[s_class_user];
  		$data[s_topic] = $_POST[s_topic];
  		$data[s_message] = $_POST[s_message];
  		$data[i_active] = 0;
  		$data[i_status] = 1;
  		$data[s_posted] = $_POST[s_posted];
  		$data[s_post_date] = time();
  		$data[s_last_update] = time();  		
  		
  		$result = $this->db->insert($to_table, $data);
  		$data[result] = $result;
  		return $data;
  }
  
   public function add_notification_lab($data){
  		$_POST = $data;
  		$to_table = "notification_event_lab";
  		$query = $this->db->query("select id from web_driver where username LIKE '%lab%' ");
  		$key = 0;
		foreach ($query->result() as $row)
		{
		        $data[i_type] = $_POST[i_type];
		  		$data[i_event] = $_POST[i_event];
		  		$data[i_user] = $row->id;
		  		$data[s_class_user] = $_POST[s_class_user];
		  		$data[s_topic] = $_POST[s_topic];
		  		$data[s_message] = $_POST[s_message];
		  		$data[i_active] = 0;
		  		$data[i_status] = 1;
		  		$data[s_posted] = $_POST[s_posted];
		  		$data[s_post_date] = time();
		  		$data[s_last_update] = time();  		
		  		
		  		$result = $this->db->insert($to_table, $data);
		  		$return[$key][result] = $result;
		  		$return[$key][data] = $data;
		  		$key++;
		}

  		return $return;
  } 
  public function read_notification() {
   	$id = $_GET[id];
   	$ac[i_active] = $_POST[i_active];
   	if($_COOKIE[detect_userclass]=="taxi"){
		$table = "notification_event_taxi";
	}else{
		$table = "notification_event_lab";
	}
	$this->db->where('id', $id);
	$ac[result] = $this->db->update($table, $ac); 
	$ac[id] = $id;
    return $ac;
  }
  
  public function delete_notification(){
  		if($_COOKIE[detect_userclass]=="taxi"){
			$table = "notification_event_taxi";
			$table_lg = "notification_event_taxi_logs";
		}else{
			$table = "notification_event_lab";
			$table_lg = "notification_event_lab_logs";
		}
  		$query = $this->db->query("select * from ".$table." where id = ".$_POST[id]);
		$row = $query->row();
		
	       foreach($row as $key=>$val){        
	          if($key != "id"){ 
	          
	          $this->db->set($key, $val);               
	          }
	          else{
			  	 $this->db->set("i_noti_event", $val);
			  }          
	       }
     
		$backup = $this->db->insert($table_lg); 
		if($backup){
			$delete = $this->db->delete($table, array('id' => $_POST[id])); 
		}
		$return[backup] = $backup;
		$return[deleted] = $delete;
		
	    return $return;
		
  }
  
  public function change_status_notification(){
  	$id = $_GET[id];
   	$ac[i_status] = $_POST[i_status];
   	
	$this->db->where('id', $id);
	$cs[result] = $this->db->update('notification_event_'.$_COOKIE[detect_userclass], $ac); 
	$cs[id] = $id;
    return $cs;
  }	
  
  public function query_data_noti(){
  	$limit = $_GET[limit];
  	$start = $_GET[start];
  	$query = $this->db->query("SELECT t1.*,t2.s_topic as ac_topic, t2.s_icons, t2.s_material_icons, t2.s_color FROM notification_event_".$_COOKIE[detect_userclass]." as t1 left join menu_list as t2 on t1.i_type = t2.id where t1.i_user = ".$_COOKIE[detect_user]." and t1.i_status = 1 order by t1.s_post_date desc limit ".$start.",".$limit);
  	$num = $query->num_rows();
	foreach ($query->result() as $row){
	       $data[] = $row;
	}
	$return[data] = $data;
	$return[numrow] = $num;
	
	$query_all = $this->db->query("SELECT id FROM notification_event_".$_COOKIE[detect_userclass]." where i_user = ".$_COOKIE[detect_user]." and i_status = 1");
  	$num_all = $query_all->num_rows();
	$return[rest] = intval($num_all) - (intval($start) + intval($limit));
	return $return;
  }
  /**
  * *********** End
  */
}