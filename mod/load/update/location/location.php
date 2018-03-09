<?
if($_GET[type]==1){
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
		$db->update_db('driver_check_limit',array(
			"point_1_lat"=>"".$_GET[lat]."",
			"point_1_lng"=>"".$_GET[lng]."",	
			 "point_1_time" => "" . TIMESTAMP . ""
		)," drivername='".$driver_id."'");
		}

?>

<?
if($_GET[type]==2){
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
		$db->update_db('driver_check_limit',array(
			"point_2_lat"=>"".$_GET[lat]."",
			"point_2_lng"=>"".$_GET[lng]."",	
			 "point_2_time" => "" . TIMESTAMP . ""
		)," drivername='".$driver_id."'");
		}

?>

<?php
 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
  $res[project] = $db->select_query("SELECT * FROM  'driver_check_limit  where drivername= '".$driver_id."'  limit 1 ");
 $arr[project] = $db->fetch($res[project]);
//function getDistance($addressFrom, $addressTo, $unit){
 
	    $latitudeFrom =$arr[project][point_1_lat];
    $longitudeFrom = $arr[project][point_1_lng];
    $latitudeTo =$arr[project][point_2_lat];
    $longitudeTo = $arr[project][point_2_lng];
	$unit == "K";
	
    
	
	
	//Calculate distance from latitude and longitude
    $theta = $longitudeFrom - $longitudeTo;
    $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
   $miles = $dist * 60 * 1.1515;
	echo "<br>";
    $unit = strtoupper($unit);




	/*
    if ($unit == "K") {
        return ($miles * 1.609344).'';
    } else if ($unit == "N") {
        return ($miles * 0.8684).' nm';
    } else {
        return $miles.' mi';
    }
//}
 */
 
 
//$distance = getDistance($addressFrom, $addressTo, "K");
echo $total=$miles* 1.609344*1000;
$total=number_format( $total, 0 );

$fast=($total/16.6667)*4;
$fast=number_format( $fast, 0 );
 

		$db->update_db('driver_check_limit',array(
			"fast" => "".$fast."",
			"distance" => "".$total.""
		)," drivername='".$driver_id."'");
 
?>