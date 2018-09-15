<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Car_model extends CI_Model {
  
  public function add_car(){
  
	 	$car[plate_num] = $_POST[plate_num];
		$car[drivername] = $member_db;
		$car[car_type] = $_POST[car_type];
		$car[car_brand] = $_POST[car_brand_txt];
		$car[i_car_brand] = $_POST[car_brand];
		$car[i_car_color] = $_POST[car_color];
		$car[car_color] = $_POST[car_color_txt];
		$car[plate_color] = $_POST[plate_color_txt];
		$car[i_plate_color] = $_POST[plate_color];
		$car[status] = 1;
		$car[status_usecar] = 0;
		$car[post_date] = time();
		$car[update_date] = time();
		$car[result] = $this->db->insert('web_carall', $car);
		$last_id_car = mysql_insert_id();
		$return[car] = $car;
		
		rename("../data/pic/car/".$_POST[rand].".jpg", "../data/pic/car/".$last_id_car."_1.jpg");
		rename("../data/pic/car/".$_POST[rand].".jpg", "../data/pic/car/".$last_id_car."_2.jpg");
		rename("../data/pic/car/".$_POST[rand].".jpg", "../data/pic/car/".$last_id_car."_3.jpg");
		
		return $return;
  }

  /**
  * 
  * 
  * *********** End
  * 
  */
}