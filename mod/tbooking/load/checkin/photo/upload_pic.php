<?
  if($_GET['action']=='upload'){
  	include("includes/class.resizepic.php");
			$original_image = $_FILES['load_chat_camera']['tmp_name'] ;
			$desired_width = 600;
			$desired_height = _INEWS_H ;
			$image = new hft_image($original_image);
			$image->resize($desired_width, $desired_height, '0');
			$image->output_resized("../data/fileupload/store/tbooking/".$_GET['type']."_".$_GET['code'].".jpg","JPG");

  }
 if($_GET['action']=='del'){
	  
@unlink("../data/fileupload/store/tbooking/".$_GET['type']."_".$_GET['code'].".jpg");  
  }
?>