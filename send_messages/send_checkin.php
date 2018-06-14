<?PHP
require_once("../includes/class.mysql.php");
//require_once("../includes/config.in.php");
function sendMessage() {
	$db = New DB();
	define("DB_NAME_APP","admin_app");
	define("DB_USERNAME","admin_MANbooking");
	define("DB_PASSWORD","252631MANbooking");
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[book] = $db->select_query("SELECT * FROM  order_booking  where id = '".$_GET[id]."'  ");
	$arr[book] = $db->fetch($res[book]);
	$res[place_shop] = $db->select_query("SELECT topic_th,id FROM shopping_product  WHERE id='".$arr[book][program]."' ");
	$arr[place_shop] = $db->fetch($res[place_shop]);
	$res[dv] = $db->select_query("SELECT username FROM web_driver  WHERE id='".$arr[book][drivername]."' ");
	$arr[dv] = $db->fetch($res[dv]);
	
	if($_GET[type]=='driver_topoint'){		
    	$type_txt = $arr[book][car_plate]." "."มาถึง ".$arr[place_shop][topic_th]." แล้ว";
    	$tag = array(
								array("field" => "tag", "key" => "class", "relation" => "=", "value" => "lab")
								);
		$content  = array(
        "en" => $arr[book][invoice]." : "."ทะเบียน ".$type_txt
   		 );						
    }
    else if($_GET[type]=='guest_receive'){		
       $type_txt = "พนักงานต้องรับ รับแขกแล้ว";
       $tag =  array(
								array("field" => "tag", "key" => "username", "relation" => "=", "value" => $arr[dv][username])
								);
		$content  = array(
        "en" => $arr[book][invoice]." : "."ทะเบียน ".$type_txt
   		 );							
    } 
    else if($_GET[type]=='guest_register'){		
      $type_txt = "แขกลงทะเบียนแล้ว";
      $tag =  array(
								array("field" => "tag", "key" => "username", "relation" => "=", "value" => $arr[dv][username])
								);
		$content  = array(
        "en" => $arr[book][invoice]." : "."ทะเบียน ".$type_txt
   		 );							
    } 
    else if($_GET[type]=='driver_pay_report'){		
      $type_txt = "แจ้งยอดรายได้แล้ว";
      $tag =  array(
								array("field" => "tag", "key" => "username", "relation" => "=", "value" => $arr[dv][username])
								);
		$content  = array(
        "en" => $arr[book][invoice]." : "."ทะเบียน ".$type_txt
   		 );							
    }
	 
    $fields = array(
			'app_id' => "d99df0ae-f45c-4550-b71e-c9c793524da1",
			'filters' => $tag,
			'data' => array("order_id" => $_GET[id]),
			'contents' => $content,
			'large_icon' => "https://www.welovetaxi.com/app/demo_new/images/app/ic_launcher.png"
		);
//	echo print_r($fields);	
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

$response = sendMessage();
$return = json_encode($response);

//$data = json_decode($response, true);
header('Content-Type: application/json');
echo $return;
?>