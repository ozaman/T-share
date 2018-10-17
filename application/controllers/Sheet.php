<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sheet extends CI_Controller {
  public function __construct() {
    parent::__construct();
//    $this->load->model('Main_model');
//    $this->load->model('Mobile_model');
  }


public function index()
	{
		$this->load->view('ios_sheet');
	}
	


  //////////////////////////// End
}
?>