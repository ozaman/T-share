<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Main_model');
    $this->load->model('Transfer_model');
    $this->load->model('Mobile_model');
  }

public function call_page(){
		$this->load->view($_POST[path]);
	}
	
public function shop(){
		$this->load->view('page/shop_view',$data);
	}
	
public function activity(){
		$this->load->view('activity_view');
	}

 public function information(){
		$this->load->view('information_view');
	}
	
public function notification(){
		$this->load->view('notification_view');
	}
			
public function transfer(){
		$username = $_COOKIE[detect_username];
		$result = $this->Transfer_model->driver_deposit($username);
//		echo json_encode($result);
		$this->load->view('transfer/transfer_view',$result);
	}
	
public function booking_detail(){
		$this->load->view('transfer/book_detail_view',$data);
	}
	
public function transfer_manage(){
		$this->load->view('transfer/manage_view',$data);
	}
	
public function shop_view(){
		$this->load->view('shop/shop_view',$data);
	}	
		
public function shop_manage(){
		if($_COOKIE[detect_userclass]=="lab"){
			$this->load->view('shop/shop_manage_lab');
		}else{
			$this->load->view('shop/shop_manage_taxi');
		}
//		$this->load->view('shop/shop_manage_lab');
//		echo 123;
		
	}
	
public function shop_detail_his(){
		$this->load->view('shop/detail_shop_his');
	}	
	
public function profile_edit(){
		$this->load->view('page/profile_view',$data);
	}	
	
public function social(){
		$this->load->view('page/social_view',$data);
	}
	
 public function upload_img(){
		$this->load->view('upload_img/upload');
   }
   
 public function view_photo(){
		$this->load->view('page/photo_view');
   }
 public function linenoti(){
		$this->load->view('page/line_noti',$data);
	}
 public function contrac_us(){
        $data['contrac'] = $this->Main_model->contrac_us();
        //print_r(json_encode($data));
//        echo json_encode($data['contrac']);
		$this->load->view('page/contract_us',$data);
        
	}
 public function icome_trans_list(){
		$this->load->view('statement/trans_ic');
   }  
 public function icome_trans_detail(){
		$this->load->view('statement/trans_ic_bill');
   }   
   		
}
?>