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
	public function contactChat(){
		$this->load->view('chat/chat');
	}
	public function search_user(){
		$id     = $_GET[id];
		 $_where             = array();
    $_where[id]         = $id;
    $_select            = array(
        '*'
    );
    $data      = $this->Main_model->rowdata(TBL_WEB_DRIVER, $_where);
		// $data = $this->Main_model->search_select( $id );
		echo json_encode($data);
	}
	public function chatroom(){
		$this->load->view('chat/chatroom');
	}
	
}
?>