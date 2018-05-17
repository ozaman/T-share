<?php 
	
if($_GET[type]=="deposit_driver"){
	
	$url = "http://www.welovetaxi.com:3000/getDriverdeposit";  
	$curl_post_data = '{"driver": '.$_POST[driver].',"month": "'.$_POST[month].'" }';                            
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);
	$decode = 	json_decode($result);
	header('Content-Type: application/json');
	echo json_encode($decode);
	
}

?>