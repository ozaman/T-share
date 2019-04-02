<?php 
if($_GET[type]=="id_card"){
	$path =  "../data/pic/driver/id_card/".$_GET[id]."_idcard.jpg";
	/*include("class.resizepic.php");
	$original_image = $_FILES['idcard_upload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	$result = $image->output_resized("../../../../data/pic/driver/id_card/".$_GET[id]."_idcard.jpg","JPG");*/
	$result = move_uploaded_file($_FILES["idcard_upload"]["tmp_name"],$path);
	$return[result] = $result;
	$return[path] = $path;
	echo json_encode($return);
//	echo json_encode($_FILES);
	exit();
}
if($_GET[type]=="id_driving"){
	$path = "../data/pic/driver/id_driving/".$_GET[id]."_iddriving.jpg";
	/*include("class.resizepic.php");
	$original_image = $_FILES['iddriving_upload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	$result = $image->output_resized("../../../../data/pic/driver/id_driving/".$_GET[id]."_iddriving.jpg","JPG");*/
	$result = move_uploaded_file($_FILES["iddriving_upload"]["tmp_name"], $path);
	$return[result] = $result;
	$return[path] = $path;
	echo json_encode($return);
	exit();
}
if($_GET[type]=="car_img"){
	$path = "../data/pic/car/".$_GET[id]."_".$_GET[num].".jpg";
	include("class.resizepic.php");
	$original_image = $_FILES['fileUpload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	$result = $image->output_resized($path,"JPG");
	$return[path] = $path;
	$return[result] = $result;
	echo json_encode($return);
	exit();
}

if($_GET[type]=="access_car"){
	$path = "../data/pic/".$_GET[cat]."/".$_GET[id].".jpg";
	$result = move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $path);
	$return[result] = $result;
	$return[path] = $path;
	$return[tmp] = $_FILES["fileUpload"]["tmp_name"];
	echo json_encode($return);
}

if($_GET[type]=="img_book_bank"){
	$path = "../data/pic/driver/book_bank/".$_GET[id].".jpg";
	include("class.resizepic.php");
	$original_image = $_FILES['fileUpload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	$result = $image->output_resized($path,"JPG");
	$return[path] = $path;
	$return[result] = $result;
	echo json_encode($return);
	exit();
}
if($_GET[type]=="img_qrcode_bank"){
	$path = "../data/pic/driver/qrcode_bank/".$_GET[id].".jpg";
	include("class.resizepic.php");
	$original_image = $_FILES['fileUpload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	$result = $image->output_resized($path,"JPG");
	$return[path] = $path;
	$return[result] = $result;
	echo json_encode($return);
	exit();
}
if($_GET[type]=="profile"){
    $path = "../data/pic/driver/small/".$_GET[id].".jpg";
	/*include("class.resizepic.php");
	$original_image = $_FILES['imgInp']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	$result = $image->output_resized("../../../../data/pic/driver/small/".$_GET[id].".jpg","JPG");*/
	$result = move_uploaded_file($_FILES["imgInp"]["tmp_name"], $path);
	$return[result] = $result;
	$return[path] = $path;
	$return[tmp] = $_FILES["imgInp"]["tmp_name"];
	echo json_encode($return);
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

if($_GET[type]=="slipt_inform"){
	$path = "../../../../data/fileupload/pay/".$_GET[id].".jpg";
	$result = move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $path);
	$return[result] = $result;
	$return[path] = $path;
	$return[tmp] = $_FILES["fileUpload"]["tmp_name"];
	echo json_encode($return);
}

if($_GET[type]=="trans_checkin"){
	include("class.resizepic.php");
	$original_image = $_FILES['fileUpload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	
	$path = "../data/fileupload/transfer/".$_GET['action']."_".$_GET['id'].".jpg";
	$result = $image->output_resized($path,"JPG");
	$return[result] = $result;
	$return[path] = $path;
	$return[tmp] = $original_image;
//	header('Content-Type: application/json');
	echo json_encode($return);
//	echo $_FILES['fileUpload']['tmp_name'];
}  

?>