<?php 
if($_GET[type]=="getjob_booking"){
				//API URL
$url = "http://www.welovetaxi.com:3000/updateDriverlogs";                              

//create a new cURL resource
$ch = curl_init($url);

//setup request to send json via POST
$data = array(
    'idorder' => 553154,
    'orderid' => 426954,
    'invoice' => 7082307,
    'code' => 7460258913,
    'program' => 38,
    'driver' => 6,
    'carid' => 11,
    'pickup_place' => 0,
    'to_place' => 0,
    'agent' => 113,
    'airout_time' => 8.00,
    'airin_time' => 8.00
);

$payload = json_encode($data);

$curl_post_data = '{"idorder": '.$_POST[idorder].',"orderid":'.$_POST[orderid].',"invoice":'.$_POST[invoice].',"code":'.$_POST[code].',"program":'.$_POST[program].',"driver":'.$_POST[driver].',"carid":'.$_POST[carid].',"pickup_place":'.$_POST[pickup_place].',"to_place":'.$_POST[to_place].',"agent":'.$_POST[agent].',"airout_time":"8:00","airin_time":"8:00"}';

$curl_post_data2 = '{"idorder": '.$_POST[idorder].',"orderid":'.$_POST[orderid].',"invoice":'.$_POST[invoice].',"code":'.$_POST[code].',"program":'.$_POST[program].',"driver":'.$_POST[driver].',"carid":'.$_POST[carid].',"pickup_place":'.$_POST[pickup_place].',"to_place":'.$_POST[to_place].',"agent":'.$_POST[agent].',"airout_time":"'.$_POST[airin_time].'","airin_time":"'.$_POST[airin_time].'"}';

//attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data2);
//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//execute the POST request
$result = curl_exec($ch);
//close cURL resource
curl_close($ch);
$decode = 	json_decode($result);
header('Content-Type: application/json');
echo json_encode($decode);	
}		
	
else if($_GET[type]=="history_booking"){
	
	$url = "http://www.welovetaxi.com:3000/getDriverlogsbyid";  
	$curl_post_data = '{"driver": '.$_POST[driver].',"date": "'.$_POST[date].'","driver_complete" : 1 }';                            
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

else if($_GET[type]=="manage_booking"){
	
	$url = "http://www.welovetaxi.com:3000/getDriverlogsbyid";  
	$curl_post_data = '{"driver": '.$_POST[driver].',"date": "'.$_POST[date].'","driver_complete" : 0 }';                            
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

else if($_GET[type]=="checkin_approve"){
	
$step = $_GET[step];
if($step=="driver_checkcar"){
	$curl_post_data2 = '{"driver_checkcar": 1,"driver_complete" : 1,"idorder": '.$_POST[idorder].'}';	
}else{
	$f_date = $step."_date";	
	$f_lat = $step."_lat";	
	$f_lng = $step."_lng";	
	$curl_post_data2 = '{"'.$step.'": 1,"idorder": '.$_POST[idorder].',"'.$f_date.'":'.time().',"'.$f_lat.'":"'.$_POST[lat].'","'.$f_lng.'":"'.$_POST[lng].'"}';
}
$url = "http://www.welovetaxi.com:3000/updateJobstatus";                              

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data2);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$decode = json_decode($result);
header('Content-Type: application/json');
echo json_encode($decode);
//echo $curl_post_data2;
}

?>