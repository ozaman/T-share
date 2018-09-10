<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Main_model');
  }


public function get_my_transfer_job()
	{
		$url = "http://www.welovetaxi.com:3000/countOrderbydriver";  
		$curl_post_data = '{"driver": '.$_POST[driver].',"date": "'.$_POST[date].'","driver_checkcar" : 0 }';                            
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);
		$decode = 	json_decode($result);
//		header('Content-Type: application/json');
		echo json_encode($decode);
	}
	
public function manage_booking()
	{
		$url = "http://www.welovetaxi.com:3000/getDriverlogsbyid";  
//		$curl_post_data = '{"driver": '.$_POST[driver].',"date": "'.$_POST[date].'","driver_checkcar" : 0 }';                            
		$curl_post_data = '{"driver": 153,"date": "2018-09-01","driver_checkcar" : 0 }';                            
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);
		$decode = 	json_decode($result);
//		header('Content-Type: application/json');
		echo json_encode($decode);
	}
}
?>