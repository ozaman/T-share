<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wallet_model extends CI_Model {
  
  public function add_inform_money(){
  
	 	$deposit[driver] = $_POST[driver];
	 	$deposit[username] = $_POST[username];
	 	$deposit[deposit] = $_POST[amount];
	 	$deposit[deposit_bank] = $_POST[deposit_bank];
	 	$deposit[bank_account] = $_POST[bank_account];
	 	$deposit[bank_number] = $_POST[bank_number];
	 	$deposit[deposit_date] = $_POST[date_money];
//	 	$deposit[deposit_time] = $_POST[time_money];
	 	$deposit[status] = 0;
	 	$deposit[type] = "ADD";
	 	$deposit[post_date] = time();
	 	$deposit[post_date_f] = date('Y-m-d');
	 	
		$deposit[result] = $this->db->insert('deposit_history', $deposit);
		$last_id = mysql_insert_id();
		$return[p1] = rename("../data/fileupload/pay/".$_POST[rand_wallet].".jpg", "../data/fileupload/pay/slip_trans_".$last_id.".jpg");
		$return[data] = $deposit;
		return $return;
  }

  public function withdraw_inform_money(){
  	$data[bank] = $_POST[bank_user];
  	$data[deposit] = $_POST[amount_wd];
  	
  	$select = "SELECT t1.*, t2.name_th as bank_list_name FROM web_bank_driver as t1 left join web_bank_list as t2 on t1.bank_id = t2.id where t1.id = '".$_POST[bank_user]."'";
	$query = $this->db->query($select);
	$data_bank = $query->row();
	
		$withdraw[driver] = $_POST[driver];
	 	$withdraw[username] = $_POST[username];
	 	$withdraw[deposit] = $_POST[amount_wd];
	 	$withdraw[deposit_bank] = $data_bank->bank_list_name;
	 	$withdraw[bank_account] = $data_bank->bank_name;
	 	$withdraw[bank_number] = $data_bank->bank_number;
	 	$withdraw[deposit_date] = date('Y-m-d');
	 	$withdraw[deposit_time] = date('h:i');
	 	$withdraw[status] = 0;
	 	$withdraw[type] = "WITHDRAW";
	 	$withdraw[post_date] = time();
	 	$withdraw[post_date_f] = date('Y-m-d');
	 	
	 	$deposit[result] = $this->db->insert('deposit_history', $withdraw);
	 	
  	return $deposit;
  }
  
  /**
  * 
  * 
  * *********** End
  * 
  */
}