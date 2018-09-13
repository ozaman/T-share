<?php 
if($_GET[type]=="id_card"){
	
	include("class.resizepic.php");
	$original_image = $_FILES['idcard_upload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	$result = $image->output_resized("../../../../data/pic/driver/id_card/".$_GET[id]."_idcard.jpg","JPG");
	echo json_encode($result);
//	echo json_encode($_FILES);
	exit();
}
if($_GET[type]=="id_drving"){
	
	include("class.resizepic.php");
	$original_image = $_FILES['iddriving_upload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	$result = $image->output_resized("../../../../data/pic/driver/id_driving/".$_GET[id]."_iddriving.jpg","JPG");
	echo json_encode($result);
	exit();
}
if($_GET[type]=="car_img"){
	
	include("class.resizepic.php");
	$original_image = $_FILES['fileUpload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
//	$result = $image->output_resized("../data/pic/driver/id_driving/".$_GET[id]."_iddriving.jpg","JPG");
	$result = $image->output_resized("../../../../data/pic/car/".$_GET[id].".jpg","JPG");
	echo json_encode($result);
	exit();
}
if($_GET[type]=="profile"){
	include("class.resizepic.php");
	$original_image = $_FILES['imgInp']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	$result = $image->output_resized("../../../../data/pic/driver/small/".$_GET[id].".jpg","JPG");
	echo json_encode($result);
}

if($_GET[type]=="checkin"){
	include("class.resizepic.php");
	$original_image = $_FILES['fileUpload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	
	$path = "../data/fileupload/store/".$_GET['action']."_".$_GET['id'].".jpg";
	$result = $image->output_resized($path,"JPG");
	$return[result] = $result;
	$return[path] = $path;
	$return[tmp] = $original_image;
//	header('Content-Type: application/json');
	echo json_encode($return);
//	echo $_FILES['fileUpload']['tmp_name'];
}  	
?>