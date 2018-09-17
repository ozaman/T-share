<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bank_model extends CI_Model {
  
  public function bank_car(){
  
	 	$bank[bank_name] = $_POST[bank_name];
	 	$bank[bank_id] = $_POST[bank];
	 	$bank[bank_number] = $_POST[bank_number];
	 	$bank[bank_branch] = $_POST[bank_branch];
	 	$bank[status] = 1;
	 	$bank[post_date] = time();
	 	$bank[last_update] = time();
	 	
		$bank[result] = $this->db->insert('web_bank_driver', $bank);
		$last_id_bank = mysql_insert_id();
		$return[last_id] = $last_id_bank;
		$return[data] = $bank;
		$return[rand] = $_POST[rand];

		$return[p] = rename("../data/pic/driver/book_bank/".$_POST[rand].".jpg", "../data/pic/driver/book_bank/".$last_id_bank.".jpg");
		
		return $return;
  }
  
  public function edit_car(){
  		$car[plate_num] = $_POST[plate_num];
//		$car[drivername] = $_GET[driver_id];
		$car[car_type] = $_POST[car_type];
		$car[car_brand] = $_POST[car_brand_txt];
		$car[i_car_brand] = $_POST[car_brand];
		$car[i_car_color] = $_POST[car_color];
		$car[car_color] = $_POST[car_color_txt];
		$car[plate_color] = $_POST[plate_color_txt];
		$car[i_plate_color] = $_POST[plate_color];
		$car[i_province] = $_POST[car_province];
		$car[status] = 1;
//		$car[status_usecar] = 0;
		$car[post_date] = time();
		$car[update_date] = time();
		
		$this->db->where('id', $_GET[car_id]);
		$car[result] = $this->db->update('web_carall', $car); 
		$return[data] = $car;
		$return[id] = $_GET[car_id];
		return $return;
  }
  
  /**
  * 
  * 
  * *********** End
  * 
  */
}