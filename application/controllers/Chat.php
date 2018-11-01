<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chat extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Chat_model');
	}
	public function chatRooms(){
		$this->load->view('chat/chat');
	}
	
}
?>