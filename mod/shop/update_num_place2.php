
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
</head>

<body>
<?php 
include('../../includes/class.mysql.php');
$db = New DB();
$db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
/*mysql_query("SET NAMES UFT8"); 
mysql_query("SET character_set_results=uft-8"); */
$res[sub] = $db->select_query("select * from plan_product_price_name ");
	while($arr[sub] = $db->fetch($res[sub])){ 
		
		echo $arr[sub][id]." : ".$arr[sub][topic_th]."<br/>";
	
	
	}
?>
</body>

</html>
