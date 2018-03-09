<?php 
include('../../includes/class.mysql.php');
$db = New DB();
$db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
if($_GET[op]=="update"){
/*$data[status] = 1; 

$data[result] = $reuslt; 
echo json_encode($data);*/
$province = $_GET[province];
$main = $_GET[id];
$res[sub] = $db->select_query("select id,status from shopping_product_sub where  main = '".$main."' and status = 1 ");
	while($arr[sub] = $db->fetch($res[sub])){
		$data = array();
		$num = $db->num_rows('shopping_product','id','main = "'.$main.'" and sub = "'.$arr[sub][id].'" and province = "'.$province.'" and status = 1 ');
		$data[num_place] = $num;
		$data[main] = $main;
		$data[sub] = $arr[sub][id];
		$data[province] = $province;
		$data[status] =  $arr[sub][status];
		$num_row = $db->num_rows('shopping_place_num','id','main = "'.$main.'" and sub = "'.$arr[sub][id].'" and province = "'.$province.'" and status = 1 ');
		if($num_row>0){
			$reuslt = $db->update_db('shopping_place_num',$data,'main = "'.$main.'" and sub = "'.$arr[sub][id].'" and province = "'.$province.'" and status = 1 ');
		}else{
			$reuslt = $db->add_db('shopping_place_num',$data);
		}
		$data[result] = $reuslt;
		
		echo json_encode($data);
		
	}


}
?>