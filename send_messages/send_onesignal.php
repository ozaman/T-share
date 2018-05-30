<?PHP
function sendMessage() {
	
	if($_GET[key]=="new_shop"){
		if($_POST[nickname]==""){
			$txt_short = 'Taxi '.$_POST[driver];
		}else{
			$txt_short = 'คุณ '.$_POST[nickname];
		}
		 $content  = array(
        "en" => $txt_short.' ทำรายการส่งแขกเข้ามาใหม่ กรุณาตรวจสอบ'
   		 );
	}

	else if($_GET[key]=="new_driver"){
		 $content  = array(
        "en" => 'มีคนขับรถสมัครสมาชิกเข้ามาใหม่'
   		 );
	}
	
    $fields = array(
        'app_id' => "d99df0ae-f45c-4550-b71e-c9c793524da1",
        'included_segments' => array(
            'All'
        ),
        'data' => array(
            "foo" => "bar"
        ),
        'contents' => $content
    );
    $response["param"] = $fields;
    $fields = json_encode($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic N2ViZjFkZTAtN2Y1My00NDk0LWI3ZjgtOTYxYTVlNjI3OWI4'
    ));
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