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
	public function chekRead(){
		$data = array();
		$id     = $_GET[member];
		$_where             = array();
		$_where[id]         = $id;
		$_select            = array(
			'*'
		);
		$DRIVER      = $this->Main_model->rowdata(TBL_WEB_DRIVER, $_where);
		if ($DRIVER->s_service == 'service') {
			$data[i_read] = 1;
			$this->db->where(s_room, $_GET[member]);
		}
		else{
			$data[i_read_to] = 1;
			$this->db->where(i_member, $_GET[member]);


		}
		

		
		$data[result] = $this->db->update(TBL_CHAT_MESSAGE, $data);
		$data[DRIVER] = $DRIVER;
header('Content-Type: application/json');
    echo json_encode($data);
  
		// return $data;
	}
	
}
?>