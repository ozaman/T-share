<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Main_model');
    $this->load->model('Mobile_model');
  }


public function index()
	{
		$this->load->view('home_view');
	}

public function query()
	{
		$query = $this->db->query("select * from web_carall where drivername = 153");
		foreach ($query->result() as $row){
		       echo $row->id." <br/>";
		}
		
//		echo print_r($row);
		echo "+++";
	}	


  //////////////////////////// End
}
?>