<?php 
	include('../../includes/class.mysql.php');
	$db = New DB();
	$db->connectdb('admin_booking','admin_MANbooking','252631MANbooking');
	
	
	mysql_query("SET NAMES utf8"); 
	mysql_query("SET character_set_results=utf-8");
	
	// echo $_POST[pro].$_POST[driver];
	$res = $db->select_query('SELECT driver,id FROM ap_order where id = "'.$_POST[pro].'"');
			if ($arr = $db->fetch($res)) {
				if ($arr[driver] == '') {
				 	$sql = 'UPDATE ap_order SET driver= "'.$_POST[driver].'" WHERE id="'.$_POST[pro].'"';
						if ($db->select_query($sql) === TRUE) {
							echo "1";
						} else {
						    echo "err";
						}
				 }
				 else{
				 	echo 0;
				 } 
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
