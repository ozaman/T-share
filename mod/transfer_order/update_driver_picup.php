<?php 
	include('../../includes/class.mysql.php');
	//include('../../../../includes/class.mysql.php');
	//echo "../../../../includes/class.mysql.php";
	$db = New DB();
	$db->connectdb('admin_booking','admin_MANbooking','252631MANbooking');
	
	
	mysql_query("SET NAMES utf8"); 
	mysql_query("SET character_set_results=utf-8");
	
	
				 	$sql = 'UPDATE ap_order SET driver_topoint = 1,driver_topoint_date = "'.time().'",driver_topoint_lat = "'.$_POST[lat].'" ,driver_topoint_lng = "'.$_POST[lng].'" WHERE invoice="'.$_POST[invoice].'"';
						if ($db->select_query($sql) === TRUE) {
							echo "1";
						} else {
						    echo "err";
						}
				
			
			
			// echo $data;
  //           print json_encode($rows);
		// $sql = 'UPDATE ap_order SET driver= "'.$_POST[driver].'" WHERE id="'.$_POST[pro].'"';
		// if ($db->select_query($sql) === TRUE) {
		// 	echo "successfully";
		// } else {
		//     echo "Error updating record: ";
		// }

	
?>
