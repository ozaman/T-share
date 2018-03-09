 
 
  <?
  
  if($_GET['action']=='upload'){
  
  include("includes/class.resizepic.php");
  
 
 
// copy ($_FILES['load_chat_album']['tmp_name'] , "../data/1.png" ); 
 
 			/// @copy ($_FILES['load_chat_album']['tmp_name'] , "../data/fileupload/store/chat/".$_GET['time'].".jpg" );
			$original_image = $_FILES['load_checkin_camera']['tmp_name'] ;
		/*
		
			$desired_width = 60;
			$desired_height = _INEWS_H ;
			$image = new hft_image($original_image);
			$image->resize($desired_width, $desired_height, '0');
			$image->output_resized("../data/fileupload/store/register/".$_GET['type']."_".$_GET['time']."_small.jpg","JPG");
			*/
 
			$desired_width = 600;
			$desired_height = _INEWS_H ;
			$image = new hft_image($original_image);
			$image->resize($desired_width, $desired_height, '0');
			$image->output_resized("../data/fileupload/store/driver_checkin/".$_GET['id']."_".$_GET['number']."_".$_GET['type'].".jpg","JPG");
 
//opy ($_FILES['fileupload']['tmp_name'], "".$_POST[userid].".png" ); 
 
 
  }
  
  
  
  if($_GET['action']=='del'){
	  
@unlink("../data/fileupload/store/driver_checkin/".$_GET['id']."_".$_GET['number']."_".$_GET['type'].".jpg");  
  }
  
 
?>
 