<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Send_onesignal_model extends CI_Model {
	
  public function new_shop() {
		
		$order_id = $_GET[order_id];
		$invoice = $_GET[vc];
		$minute = $_GET[m];
		if($invoice!=""){
			$txt_vc = 'เลขที่งาน '.$invoice;
		}
		if($minute!=""){
			$txt_m = 'ถึงภายใน '.$minute." นาที";
		}

		$txt_short = 'ทะเบียน '.$_POST[car_plate];
		 $content  = array(
        "en" => $txt_short.' '.$txt_vc.' '.$txt_m
   		 );
   		 $heading = array(
		   "en" => "มีรายการใหม่เข้ามา"
		);
   		 $fields = array(
			'app_id' => "d99df0ae-f45c-4550-b71e-c9c793524da1",
			'filters' => array(
								array("field" => "tag", "key" => "class", "relation" => "=", "value" => "lab")
//								array("field" => "tag", "key" => "username", "relation" => "=", "value" => "HKT0153")
								),
			'data' => array("order_id" => $order_id, "status" => "manage" ),
			'url' => "https://www.welovetaxi.com/app/demo_new2/index_sheet.php?name=index&file=open_order&order_id=".$order_id."&vc=".$invoice."&ios=1",
			'contents' => $content,
			'headings' => $heading,
			'ios_badgeType' => 'Increase',
			'ios_badgeCount' => '1',
			'large_icon' => "https://www.welovetaxi.com/app/demo_new/images/app/ic_launcher.png"
		);
		$response["param"] = $fields;
	    $fields = json_encode($fields);

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
													   'Authorization: Basic N2ViZjFkZTAtN2Y1My00NDk0LWI3ZjgtOTYxYTVlNjI3OWI4'));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    curl_setopt($ch, CURLOPT_HEADER, FALSE);
	    curl_setopt($ch, CURLOPT_POST, TRUE);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    
	    $res = curl_exec($ch);
	    $response["allresponses"] = json_decode($res);
	    
	    curl_close($ch);
	    
	    return $response;
  
  }

  public function new_driver(){
  		$content  = array(
        "en" => 'มีคนขับรถสมัครสมาชิกเข้ามาใหม่'
   		 );
   		 $heading = array(
		   "en" => "สมัครสมาชิก"
		);
   		 $fields = array(
			'app_id' => "d99df0ae-f45c-4550-b71e-c9c793524da1",
			'filters' => array(
								array("field" => "tag", "key" => "class", "relation" => "=", "value" => "lab")
								),
			'contents' => $content,
			'headings' => $heading,
			'ios_badgeType' => 'Increase',
			'ios_badgeCount' => '1',
			'large_icon' => "https://www.welovetaxi.com/app/demo_new/images/app/ic_launcher.png"
		);
		
		$response["param"] = $fields;
	    $fields = json_encode($fields);

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
													   'Authorization: Basic N2ViZjFkZTAtN2Y1My00NDk0LWI3ZjgtOTYxYTVlNjI3OWI4'));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    curl_setopt($ch, CURLOPT_HEADER, FALSE);
	    curl_setopt($ch, CURLOPT_POST, TRUE);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    
	    $res = curl_exec($ch);
	    $response["allresponses"] = json_decode($res);
	    
	    curl_close($ch);
	    
	    return $response;
  }
  
  public function cancel_shop(){
  	
  	$order_id = $_GET[order_id];

	$sql = "SELECT invoice,program,drivername,invoice,car_plate FROM  order_booking  where id = '".$order_id."'  ";
	$query = $this->db->query($sql);
	$res_qr = $query->row();
	$invoice = $res_qr->invoice;
	$type_txt = $res_qr->car_plate." ทำการยกเลิกรายการนี้แล้ว กรุณาตรวจสอบ";
	
    	$tag = array(
								array("field" => "tag", "key" => "class", "relation" => "=", "value" => "lab")
								);
		$content  = array(
        "en" => "ทะเบียน ".$type_txt
   		 );				
	$heading = array(
		   "en" => "เลขที่งาน ".$invoice
	 );	
    $fields = array(
			'app_id' => "d99df0ae-f45c-4550-b71e-c9c793524da1",
			'filters' => $tag,
			'data' => array("order_id" => $_GET[order_id], "status" => "his", "open_ic" => 0),
			'url' => "https://www.welovetaxi.com/app/demo_new2/index_sheet.php?name=index&file=open_order_history&order_id=".$order_id."&vc=".$invoice."&ios=1&open_ic=0",
			'contents' => $content,
			'headings' => $heading,
			'ios_badgeType' => 'Increase',
			'ios_badgeCount' => '1',
			'large_icon' => "https://www.welovetaxi.com/app/demo_new/images/app/ic_launcher.png"
		);

    $response["param"] = $fields;
    $fields = json_encode($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
   curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic N2ViZjFkZTAtN2Y1My00NDk0LWI3ZjgtOTYxYTVlNjI3OWI4'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
    $res = curl_exec($ch);
    $response["allresponses"] = json_decode($res);
    
    curl_close($ch);
    
    return $response;
  }
  
  public function driver_topoint(){

		$sql_book = "SELECT invoice,car_plate,drivername,program FROM  order_booking  where id = '".$_GET[id]."'  ";
 		$query_book = $this->db->query($sql_book);
 		$res_book = $query_book->row();
 		

		$sql_shop = "SELECT topic_th,id FROM shopping_product  WHERE id='".$res_book->program."' ";
 		$query_shop = $this->db->query($sql_shop);
 		$res_shop = $query_shop->row();
		
		$invoice = $res_book->invoice;
		$order_id = $_GET[id];
		$type_txt = $res_book->car_plate." "."มาถึง ".$res_shop->topic_th." แล้ว";
    	$tag = array(array("field" => "tag", "key" => "class", "relation" => "=", "value" => "lab"));
		$content  = array("en" => "ทะเบียน ".$type_txt);	
   		$heading = array("en" => "เลขที่งาน ".$invoice);	
   		$fields = array(
			'app_id' => "d99df0ae-f45c-4550-b71e-c9c793524da1",
			'filters' => $tag,
			'data' => array("order_id" => $_GET[id], "status" => "manage"),
			'url' => "https://www.welovetaxi.com/app/demo_new2/index_sheet.php?name=index&file=open_order&order_id=".$order_id."&vc=".$invoice."&ios=1",
			'contents' => $content,
			'headings' => $heading,
			'ios_badgeType' => 'Increase',
			'ios_badgeCount' => '1',
			'large_icon' => "https://www.welovetaxi.com/app/demo_new/images/app/ic_launcher.png"
		);
		$response["param"] = $fields;
	    $fields = json_encode($fields);

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
													   'Authorization: Basic N2ViZjFkZTAtN2Y1My00NDk0LWI3ZjgtOTYxYTVlNjI3OWI4'));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    curl_setopt($ch, CURLOPT_HEADER, FALSE);
	    curl_setopt($ch, CURLOPT_POST, TRUE);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    
	    $res = curl_exec($ch);
	    $response["allresponses"] = json_decode($res);
	    
	    curl_close($ch);
	    
	    return $response;
  }
  
  public function guest_receive(){
  		$sql_book = "SELECT invoice,car_plate,drivername,program FROM  order_booking  where id = '".$_GET[id]."'  ";
 		$query_book = $this->db->query($sql_book);
 		$res_book = $query_book->row();
 		
		$sql_shop = "SELECT topic_th,id FROM shopping_product  WHERE id='".$res_book->program."' ";
 		$query_shop = $this->db->query($sql_shop);
 		$res_shop = $query_shop->row();
		
		$sql_dv = "SELECT username FROM web_driver  WHERE id='".$res_book->drivername."' ";
 		$query_dv = $this->db->query($sql_dv);
 		$res_dv = $query_dv->row();
 		
 		$invoice = $res_book->invoice;
		$order_id = $_GET[id];
  		$type_txt = "พนักงานต้องรับ รับแขกแล้ว";
        $tag =  array(
								array("field" => "tag", "key" => "username", "relation" => "=", "value" => $res_dv->username)
								);
		$content  = array(
        "en" => "ขณะนี้ ".$type_txt
   		 );
   		 $heading = array(
		   "en" => "เลขที่งาน ".$invoice
	 );	
    $fields = array(
			'app_id' => "d99df0ae-f45c-4550-b71e-c9c793524da1",
			'filters' => $tag,
			'data' => array("order_id" => $_GET[id], "status" => "manage"),
			'url' => "https://www.welovetaxi.com/app/demo_new2/index_sheet.php?name=index&file=open_order&order_id=".$order_id."&vc=".$invoice."&ios=1",
			'contents' => $content,
			'headings' => $heading,
			'ios_badgeType' => 'Increase',
			'ios_badgeCount' => '1',
			'large_icon' => "https://www.welovetaxi.com/app/demo_new/images/app/ic_launcher.png"
		);

	    $response["param"] = $fields;
	    $fields = json_encode($fields);

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
													   'Authorization: Basic N2ViZjFkZTAtN2Y1My00NDk0LWI3ZjgtOTYxYTVlNjI3OWI4'));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    curl_setopt($ch, CURLOPT_HEADER, FALSE);
	    curl_setopt($ch, CURLOPT_POST, TRUE);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    
	    $res = curl_exec($ch);
	    $response["allresponses"] = json_decode($res);
	    
	    curl_close($ch);
	    
	    return $response;
  }
  
  public function guest_register(){
  		$sql_book = "SELECT invoice,car_plate,drivername,program FROM  order_booking  where id = '".$_GET[id]."'  ";
 		$query_book = $this->db->query($sql_book);
 		$res_book = $query_book->row();
 		
		$sql_shop = "SELECT topic_th,id FROM shopping_product  WHERE id='".$res_book->program."' ";
 		$query_shop = $this->db->query($sql_shop);
 		$res_shop = $query_shop->row();
		
		$sql_dv = "SELECT username FROM web_driver  WHERE id='".$res_book->drivername."' ";
 		$query_dv = $this->db->query($sql_dv);
 		$res_dv = $query_dv->row();
 		
 		 $invoice = $res_book->invoice;
		 $order_id = $_GET[id];
  		 $type_txt = "แขกทำการลงทะเบียนเรียบร้อยแล้ว";
         $tag =  array(
								array("field" => "tag", "key" => "username", "relation" => "=", "value" => $res_dv->username)
								);
		$content  = array(
        "en" => "ขณะนี้ ".$type_txt
   		 );				
	  	$heading = array(
			   "en" => "เลขที่งาน ".$invoice
		 );	
	    $fields = array(
				'app_id' => "d99df0ae-f45c-4550-b71e-c9c793524da1",
				'filters' => $tag,
				'data' => array("order_id" => $_GET[id], "status" => "manage"),
				'url' => "https://www.welovetaxi.com/app/demo_new2/index_sheet.php?name=index&file=open_order&order_id=".$order_id."&vc=".$invoice."&ios=1",
				'contents' => $content,
				'headings' => $heading,
				'ios_badgeType' => 'Increase',
				'ios_badgeCount' => '1',
				'large_icon' => "https://www.welovetaxi.com/app/demo_new/images/app/ic_launcher.png"
			);

	    $response["param"] = $fields;
	    $fields = json_encode($fields);

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
													   'Authorization: Basic N2ViZjFkZTAtN2Y1My00NDk0LWI3ZjgtOTYxYTVlNjI3OWI4'));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    curl_setopt($ch, CURLOPT_HEADER, FALSE);
	    curl_setopt($ch, CURLOPT_POST, TRUE);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    
	    $res = curl_exec($ch);
	    $response["allresponses"] = json_decode($res);
	    
	    curl_close($ch);
	    
	    return $response;
  }
  
  public function driver_pay_report(){
  		$sql_book = "SELECT invoice,car_plate,drivername,program FROM  order_booking  where id = '".$_GET[id]."'  ";
 		$query_book = $this->db->query($sql_book);
 		$res_book = $query_book->row();
 		
		$sql_shop = "SELECT topic_th,id FROM shopping_product  WHERE id='".$res_book->program."' ";
 		$query_shop = $this->db->query($sql_shop);
 		$res_shop = $query_shop->row();

		$sql_dv = "SELECT username FROM web_driver  WHERE id='".$res_book->drivername."' ";
 		$query_dv = $this->db->query($sql_dv);
 		$res_dv = $query_dv->row();
 		
 		$invoice = $res_book->invoice;
		$order_id = $_GET[id];
  		$type_txt = "พนักงานทำการแจ้งยอดรายได้แล้ว";
      	$tag =  array(
								array("field" => "tag", "key" => "username", "relation" => "=", "value" => $arr[dv][username])
								);
		$content  = array(
        "en" => "ขณะนี้ ".$type_txt
   		 );			
   		 $heading = array(
		   "en" => "เลขที่งาน ".$invoice
	 );	
    $fields = array(
			'app_id' => "d99df0ae-f45c-4550-b71e-c9c793524da1",
			'filters' => $tag,
			'data' => array("order_id" => $_GET[id], "status" => "manage"),
			'url' => "https://www.welovetaxi.com/app/demo_new2/index_sheet.php?name=index&file=open_order&order_id=".$order_id."&vc=".$invoice."&ios=1",
			'contents' => $content,
			'headings' => $heading,
			'ios_badgeType' => 'Increase',
			'ios_badgeCount' => '1',
			'large_icon' => "https://www.welovetaxi.com/app/demo_new/images/app/ic_launcher.png"
		);

	    $response["param"] = $fields;
	    $fields = json_encode($fields);

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
													   'Authorization: Basic N2ViZjFkZTAtN2Y1My00NDk0LWI3ZjgtOTYxYTVlNjI3OWI4'));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    curl_setopt($ch, CURLOPT_HEADER, FALSE);
	    curl_setopt($ch, CURLOPT_POST, TRUE);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    
	    $res = curl_exec($ch);
	    $response["allresponses"] = json_decode($res);
	    
	    curl_close($ch);
	    
	    return $response;	
  }
  /**
  * *********** End
  */
}