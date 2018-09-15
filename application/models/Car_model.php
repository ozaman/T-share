<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Car_model extends CI_Model {
  
  public function add_car(){
  
	 	$car[plate_num] = $_POST[plate_num];
		$car[drivername] = $_GET[driver_id];
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
		$return[last_id] = $last_id_car;
		$return[data] = $car;

		$return[p1] = rename("../data/pic/car/".$_POST[rand]."_1.jpg", "../data/pic/car/".$last_id_car."_1.jpg");
		$return[p2] = rename("../data/pic/car/".$_POST[rand]."_2.jpg", "../data/pic/car/".$last_id_car."_2.jpg");
		$return[p3] =  rename("../data/pic/car/".$_POST[rand]."_3.jpg", "../data/pic/car/".$last_id_car."_3.jpg");
		
		return $return;
  }

  /**
  * 
  * 
  * *********** End
  * 
  */
}