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
	 	$deposit[deposit_time] = $_POST[time_money];
	 	$deposit[status] = 0;
	 	$deposit[type] = "ADD";
	 	$deposit[post_date] = time();
	 	$deposit[post_date_f] = date('Y-m-d');
	 	
		$deposit[result] = $this->db->insert('deposit_history', $deposit);
		
		return $deposit;
  }

  
  /**
  * 
  * 
  * *********** End
  * 
  */
}