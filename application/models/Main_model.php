<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main_model extends CI_Model {
	

  public function check_user_signin() {

      $username = $this->input->post('real_username');
      $password = $this->input->post('real_password');
      
    $sql = "select * from web_driver where id >0 and username = '".$username."' and '".$password."' ";
	$query = $this->db->query($sql);

        if ($query->num_rows() > 0 ){
            session_start();
	    	$_SESSION['data_user_name']     = $query->row()->username;
	    	$_SESSION['data_user_password'] = $query->row()->password;
	    	$_SESSION['data_user_id']       = $query->row()->id;
	    	$_SESSION['data_user_class']    = $query->row()->user_class;

			$data[user] = $query->row()->username;
			$data[class_user] = $query->row()->user_class;
			$data[pass] = $password;
			$data[id] = $query->row()->id;
			
			$return[data] = $data;
			$return[check] = 1;
    	}
   		else{
      		$return[check] = 0;
    	}
     	$return[num_rows] = $check_us;
		$return[data_post][user] = $username;
		$return[data_post][pass] = $password;
		$return[data_post][detail] = $arr[us];
  		return $return;
  }
  
  function check_idcard_overlap(){
  	
	$idcard = $_POST[txt];

	$this->db->select('id');
	$this->db->where('idcard = "'.$idcard.'" and idcard != "" ');
	$query = $this->db->get('web_driver');
	$num = $query->num_rows();
	
	$return[input] = $idcard;
	$return[check] = $num;
	return $return;
  }
  
  function check_car_plate_overlap(){
  	
	$txt = $_POST[txt];

	$this->db->select('id');
	$this->db->where("plate_num = '".$txt."' and plate_num != '' ");
	$query = $this->db->get('web_carall');
	$num = $query->num_rows();
	
	$return[input] = $txt;
	$return[check] = $num;
	return $return;
  }
  
  function check_phone_overlap(){
  	
	$txt = $_POST[txt];

	$this->db->select('id');
	$this->db->where("phone = '".$txt."' and phone != '' ");
	$query = $this->db->get('web_driver');
	$num = $query->num_rows();
	
	$return[input] = $txt;
	$return[check] = $num;
	return $return;
  }
  
  function get_id_province_only(){
  	
   $str = $_POST[txt_pv]; //กรุงเทพมหานคร
   if(strlen($str)>7){
   	$txt = mb_substr($str,0,7, "utf-8");
   }else{
   	$txt = $_POST[txt_pv];
   }
   $th = "name_th LIKE '%".$txt."%'";
   $en = "or name LIKE '%".$txt."%'";
   $cn = "or name_cn LIKE '%".$txt."%'";
//   $pv[province] = $db->select_query("SELECT id,name_th,name_cn,name,area FROM web_province where ".$th." ".$en." ".$cn."   ");
//   $pv[province] = $db->fetch($pv[province]);
	$sql = "SELECT id,name_th,name_cn,name,area FROM web_province where ".$th." ".$en." ".$cn."   ";
	$query = $this->db->query($sql);
	/*foreach($query->result() as $key=>$val)
    {
        $data[] = $val;
    }*/
	return $query->result();
  }
  
  function get_data_province(){
  	
	$sql = "SELECT name_th,id,name FROM web_province   ORDER BY id ";
	$query = $this->db->query($sql);
	foreach($query->result() as $key=>$val)
    {
        $data[] = $val;
    }
	return $data;
  }
  
  function register(){
  
	
		if($_POST[nickname]=="" or $_POST[nickname]==NULL){
    		$exit[col] = "nickname";
    		$exit[val] = $_POST[nickname];
    		$exit[type] = 0;
			return $exit;
		}
		if($_POST[name_th]=="" or $_POST[name_th]==NULL){
			$exit[col] = "name_th";
			$exit[val] = $_POST[name_th];
    		$exit[type] = 0;
			return $exit;
		}
		if($_POST[phone]=="" or $_POST[phone]==NULL){
			$exit[col] = "phone";
			$exit[val] = $_POST[phone];
    		$exit[type] = 0;
    		return $exit;
		}
	
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
    $password = substr(str_shuffle('1234567890'), 0, 4);
    $provincecode = 'HKT';
    $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);

    	$data["password"] = $password;
//        $data["code_login"] = $rand_login;
        $data["email"] = $_POST[email];
//        $data["name_en"] = $_POST[name_en];
        $data["name"] = $_POST[name_th];
        $data["nickname"] = $_POST[nickname];
        $data["idcard"] = $_POST[idcard];
        $data["phone"] = $_POST[phone];
        $data["address"] = $_POST[address];
        $data["driver_zone"] = $_POST[driver_zone];
        $data["province"] = $_POST[province];
        $data["status"] = "1";
        $data["post_date"] = time();
        $data["update_date"] = time();
    	$add_result = $this->db->insert("web_driver", $data);
    	
    $return[add][data] = $data;
    $return[add][result] = $add_result;
    
    $last_id = mysql_insert_id();
    $member_db = $last_id;
    $member_in = genUsername($member_db);
    $return[last_id] = $last_id;
    $data[i_driver] = $last_id;
    $data_update[username] = $provincecode.$member_in;
    $data_update[password] = $password;
//    $data_update[result] = $db->update_db($tb_admin_chk,$data_update,'id = "'.$last_id.'" ');
    $data_update[result] = $this->db->update('web_driver', $data_update, array('id' => $last_id));
    $return[update] = $data_update;
    
    $add_driver_log = $this->db->insert("web_driver_logs", $data);
     
    if($_POST['image-data']){
	
		$path = "../../../../data/pic/driver/small/".$data_update[username].".jpg";
		$img_data = $_POST['image-data'];
		$size = getimagesize($img_data);
		$image = $img_data;
		$image = imagecreatefrompng($image);
		
		imagejpeg($image, $path, $size[0], $size[1]);
		$save_img = imagedestroy($image);
		$img[result] = $save_img;
		$img[w] = json_encode($size);
//		$img[h] = $size[1];
		$img[path] = $path;
	}
    
	
	if($_POST[plate_num]!=''){
		$car[plate_num] = $_POST[plate_num];
		$car[drivername] = $member_db;
		$car[status] = 1;
		$car[status_usecar] = 0;
		$car[post_date] = time();
		$car[update_date] = time();
		$car[car_type] = 0;
		$car[result] = $this->db->insert("web_carall", $car);
		$return[car] = $car;
	}
	
	$return[upload_img] = $img;
	$return[path] = $path;
	$return[driver_logs] = $add_driver_log;
	header('Content-Type: application/json');
    echo json_encode($return);
    
    $curl_post_data = '{"id":"'.$last_id.'","action":"add"}';
                    
              $headers = array();

$url = "http://www.welovetaxi.com:3000/adddriver";
//$api_key = '1f7bb35be49521bf6aca983a44df9a6250095bbb';
$curl = curl_init();
curl_setopt($curl, CURLOPT_HTTPHEADER,
    array(
        'Content-Type: application/json'
        // 'API-KEY: '.$api_key.''
    )
);
curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_REFERER, $url);
curl_setopt($curl, CURLOPT_URL, $url);  

curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
$curl_response = curl_exec($curl);
//echo $curl_response;
curl_close($curl);
    
    include('../line_notify_demo.php');
    
    $msg = array();
    $txt_short = "\n".'มีคนขับรถสมัครสมาชิกเข้ามาใหม่';
   	$txt_short2 = "\n".'ชื่อ '.$data["name"];
   	$txt_short2 .= "\n".'User : '.$data_update[username].' ';
   	$txt_short2 .= "\n".'Password : '.$data[password].' ';
   	$txt_short2 .= "\n".'เบอร์โทร : '.$data[phone];
//   	$txt_short2 .= "\n".'สมัครเวลา : '.date('Y-m-d h:i:s',$data[post_date]).' ';
   	
	$msg[message] = $txt_short.' '.$txt_short2;	
	$token = "cuJeygjbI4UFGHXJha1zVxiNCJWXPaenK4xo7kzuCQX"; //ใส่Token ที่copy เอาไว้ ส่วนตัว
	$response = notify_message($msg,$token);
//	echo $response;
    

  }

  function update_num_place_all(){
  	
  	$province = $_GET[province];
	$area = $_GET[area];


	$sql = "select id,status from shopping_product_main where status = 1 ";
	$query = $this->db->query($sql);
	foreach($query->result() as $key=>$val){
		$main = $val->id;

		$sql_sub = "select id,status from shopping_product_sub where  main = '".$main."' and status = 1 ";
		$query_sub = $this->db->query($sql_sub);
		$sub = $query_sub->row();
				$data = array();
//				$num = $db->num_rows('shopping_product','id','main = "'.$main.'" and sub = "'.$sub->id.'" and province = "'.$province.'" and status = 1 ');
				$this->db->where('main = "'.$main.'" and sub = "'.$sub->id.'" and province = "'.$province.'" and status = 1 ');
				$query_num_row = $this->db->get('shopping_product');
				$num = $query->num_rows();
				$data[num_place] = $num;
				$data[main] = $main;
				$data[sub] = $sub->id;
				$data[province] = $province;
				$data[area] = $area;
				$data[status] =  $sub->status;
				
				$this->db->where('main = "'.$main.'" and sub = "'.$sub->id.'" and province = "'.$province.'" and status = 1 ');
				$query_num_row = $this->db->get('shopping_place_num');
				$num_row = $query->num_rows();
//				$num_row = $db->num_rows('shopping_place_num','id','main = "'.$main.'" and sub = "'.$arr[sub][id].'" and province = "'.$province.'" and status = 1 ');
				if($num_row>0){
//					$reuslt = $db->update_db('shopping_place_num',$data,'main = "'.$main.'" and sub = "'.$arr[sub][id].'" and province = "'.$province.'" and status = 1 ');
					$reuslt = $this->db->update('shopping_place_num', $data, array('main' => $main,'sub' => $sub->id,'province' => $province,'status' => 1));
					$data[type] = 'update';
				}else{
//					$reuslt = $db->add_db('shopping_place_num',$data);
					$reuslt = $this->db->insert("shopping_place_num", $data);
					$data[type] = 'add';
				}
				$data[result] = $reuslt;
				
				echo json_encode($data);	
			}
	
		$recheck[pv] = $province; 
		$recheck[area] = $area; 
		echo json_encode($recheck);

  	
  }
  
  /**
  * *********** End
  */
}