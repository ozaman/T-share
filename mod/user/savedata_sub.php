<?php 
require_once("../../includes/class.mysql.php");
require_once("../../includes/function.in.php");
header('Content-Type: application/json; charset=utf-8');
$db = New DB();
$db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
define("TIMESTAMP",time()) ;
mysql_query("SET NAMES uft8"); 
mysql_query("SET character_set_results=uft-8"); 
define("TB_driver","web_driver");

if($_GET[type]=="test"){
	echo "++++++++++++++++++++++++++++++++++";
}
if($_GET[type]=="save_maindoc"){
	$target_dir = "../../../data/pic/driver/id_card/";
	$target_dir2 = "../../../data/pic/driver/id_driving/";
/*	$target_file = $target_dir . basename($_FILES["file"]["name"]);
	$target_file2 = $target_dir . basename($_FILES["file2"]["name"]);*/
	$id = $_GET[id];
	$idcard = $_POST['idcard'];
	$iddriving = $_POST['iddriving'];
	$idcard_finish = $_POST['idcard_finish'];
	$iddriving_finish = $_POST['iddriving_finish'];
	
	$target_file = $target_dir . $id."_idcard.jpg";
	$target_file2 = $target_dir2 . $id."_iddriving.jpg";
	
		$check = 0 ;			
	if (copy($_FILES["file_idcard"]["tmp_name"], $target_file)) {
//	    	$file_idcard = $_FILES["file"]["name"];
	    	$file_idcard = $id.'_idcard.jpg';
	    	$check_pic_card = 1;
	    	$check += 1;
	    	$data[file_idcard] = "success";
	    } else {
			$file_idcard = "";
			$check_pic_card = 0;
			$data[file_idcard] = "false";
	    }	
	 
	 if (copy($_FILES["file_iddriving"]["tmp_name"], $target_file2)) {
//	    	$file_iddriving = $_FILES["file2"]["name"];
	    	$file_iddriving = $id.'_iddriving.jpg';
	    	$check += 1;
	    	$check_pic_driving = 1;
	    	$data[file_iddriving] = "success";
	    } else {
			$file_iddriving = "";
			$check_pic_driving = 0;
			$data[file_iddriving] = "false";
	    }	
	    $array = array(
						"id"=>$id, 
						"idcard"=>$idcard, 
						"pic_card"=>$check_pic_card, 
						"iddriving"=>$iddriving,
						"pic_driver"=>$check_pic_driving,
						"idcard_finish"=>$idcard_finish,
						"iddriving_finish"=>$iddriving_finish
						
					);	
	    $reuslt = $db->update_db(TB_driver,$array,"id = '".$id."' ");
	    $data[update_db] = $reuslt;
	echo json_encode($data);    
	    
} 

if($_GET[type]=="save_user"){
//$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
$target_dir = "../../../data/pic/driver/small/";
$target_file = $target_dir . $_POST[username].".jpg";

if (copy($_FILES["file"]["tmp_name"], $target_file)) {
//	    	$file_idcard = $_FILES["file"]["name"];
	    	$check_pic_card = 1;
	    	$check = 1;
	    } else {
			$check_pic_card = 0;
	    }	
		$array = array(
			"pic_home" => $check,
            "password" => "$_POST[password]",
            "name_en" => "$_POST[name_en]",
            "name" => "$_POST[name]",
            "nickname" => "$_POST[nickname]",
            "idcard" => "$_POST[idcard]",
            "iddriving" => "$_POST[iddriving]",
            "phone" => "$_POST[phone]",
            "contact" => "$_POST[contact]",
            "address" => "$_POST[address]",
            "update_date" => "" . TIMESTAMP . ""
        );
       $result = $db->update_db(TB_driver,$array , " id=$_GET[id] ");
        
        echo json_encode($result);
}

if($_GET[type]=="upload_img"){
	$pic_qr = file_exists("croppic_master/temp/".$_GET[user].".jpg");  
$target_dir = "../../../data/pic/driver/small/";
$target_file = $target_dir . $_GET[user].".jpg";

if (copy("croppic_master/temp/".$_GET[user].".jpg", $target_file)) {
			$result = 1;
	    } else {
			$result = 0;
	    }
//echo 	    $target_file." ++++ ".$_FILES["file"]["name"];

	if($pic_qr==1){
		
	}else{
		$result = 0;
	}

echo 	    $result;
}
?> 