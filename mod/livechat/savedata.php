<?
 

 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[vc] = $db->select_query("SELECT drivername,orderid FROM ".TB_order." where invoice='".$_GET[vc]."'  ");
$arr[vc] = $db->fetch($res[vc]);
 
 
	 
$db->connectdb(DB_NAME_CHAT, DB_USERNAME, DB_PASSWORD);
 $res[chatlast] = $db->select_query("SELECT id FROM vc".$_GET[vc]." ORDER BY id desc limit 1"); 
 $arr[chatlast]  = $db->fetch($res[chatlast]);
 
 
 
 
 $chat_id=$arr[chatlast][id]+1;
 
 
 
 

////// $_GET[vc]
//$_POST[state]=$_GET[state];


/*
31  /// พิมพ์ข้อความ
$state_name='chat_driver_to_customer';
32  ///คำที่ใช้บ่อย
$state_name='chat_driver_to_customer_store';
33 //// แชร์ตำแหน่ง
$state_name='driver_share_location';
 
*/

 if($_GET[state_type]=='chat_text'){
$state_name='chat_'.$_GET[chat_from].'_to_'.$_GET[chat_to].'_text';
$state_type='chat_text';
 
}
 
 

if($_GET[state_type]=='chat_store'){
$state_name='chat_'.$_GET[chat_from].'_to_'.$_GET[chat_to].'_store';
$state_type='chat_store';
$_POST[message_store]=$_GET[message_store];
}
 

if($_GET[state_type]=='share_location'){
$state_name=''.$_GET[chat_from].'_share_location';
$state_type='share_location';



/////// สร้างรูป
// $url='http://maps.googleapis.com/maps/api/staticmap?center='.$_GET[lat].','.$_GET[lng].'&size=400x200&zoom=16&maptype=roadmap&markers=color:red|'.$_GET[lat].','.$_GET[lng].'&sensor=false&libraries=places&language=th';
 
///$url=' http://maps.googleapis.com/maps/api/staticmap?zoom=14&size=250x150&language=th&maptype=roadmap&markers=icon:https://goldenbeachgroup.com/app/demo/google/realtime/images/1.png|'.$_GET[lat].','.$_GET[lng].'';

 
  file_put_contents("../data/fileupload/map/".$_GET[vc]."_".time().".png",file_get_contents('http://maps.googleapis.com/maps/api/staticmap?zoom=14&size=250x100&maptype=roadmap&markers=icon:https://goldenbeachgroup.com/app/demo/google/realtime/images/2.png|'.$_GET[lat].','.$_GET[lng].''));

file_put_contents("../data/fileupload/map/".$_POST[voucher]."_".$_POST[timess].".png",file_get_contents('https://maps.googleapis.com/maps/api/staticmap?zoom=14&size=250x100&maptype=roadmap&markers=icon:https://goldenbeachgroup.com/app/demo/google/realtime/images/2.png|'.$_POST[lag].','.$_POST[long].''));
//// https://www.mapquestapi.com/staticmap/v4/getmap?key=KEY&size=600,600&type=map&imagetype=png&zoom=10&scalebar=false&traffic=false&center=7.8484298,98.38006229999999&xis=https://s.aolcdn.com/os/mapquest/yogi/icons/poi-active.png,1,c,40.015831,-105.27927&ellipse=fill:0x70ff0000|color:0xff0000|width:2|40.00,-105.25,40.04,-105.30
/////////
///// https://maps.googleapis.com/maps/api/geocode/json?latlng=7.8484298,98.38006229999999

/// https://maps.googleapis.com/maps/api/geocode/json?latlng=.8484298,98.38006229999999&key=YOUR_API_KEY




}

if($_GET[state_type]=='share_location_realtime'){
$state_name=''.$_GET[chat_from].'_share_location_realtime';
$state_type='share_location_realtime';
}
 
if($_GET[state_type]=='share_photo'){
$state_name=''.$_GET[chat_from].'_share_photo';
$state_type='share_photo';
 
copy ("../data/fileupload/store/chat/".$_GET['time']."_small.jpg", "../data/fileupload/photo/".$_GET[vc]."_".$chat_id."_small.jpg" ); 
copy ("../data/fileupload/store/chat/".$_GET['time']."_big.jpg", "../data/fileupload/photo/".$_GET[vc]."_".$chat_id."_big.jpg" ); 

unlink ("../data/fileupload/store/chat/".$_GET['time']."_small.jpg" ); 
unlink ("../data/fileupload/store/chat/".$_GET['time']."_big.jpg" ); 
 
}

//// to point

if($_GET[state_type]=='to_point'){
$state_name=''.$_GET[chat_from].'_to_point';
$state_type='to_point';

 
 
copy ("../data/fileupload/store/chat/view_".$_GET['time']."_small.jpg", "../data/fileupload/photo/view_".$_GET[vc]."_".$chat_id."_small.jpg" ); 
copy ("../data/fileupload/store/chat/view_".$_GET['time']."_big.jpg", "../data/fileupload/photo/view_".$_GET[vc]."_".$chat_id."_big.jpg" ); 

 
copy ("../data/fileupload/store/chat/you_".$_GET['time']."_small.jpg", "../data/fileupload/photo/you_".$_GET[vc]."_".$chat_id."_small.jpg" ); 
copy ("../data/fileupload/store/chat/you_".$_GET['time']."_big.jpg", "../data/fileupload/photo/you_".$_GET[vc]."_".$chat_id."_big.jpg" ); 



unlink ("../data/fileupload/store/chat/view_".$_GET['time']."_small.jpg" ); 
unlink ("../data/fileupload/store/chat/view_".$_GET['time']."_big.jpg" ); 
unlink ("../data/fileupload/store/chat/you_".$_GET['time']."_small.jpg" ); 
unlink ("../data/fileupload/store/chat/you_".$_GET['time']."_big.jpg" ); 
 
 
}



 
 
 
 if($_GET[state_type]=='voice_message'){
$state_name=''.$_GET[chat_from].'_share_voice_message';
$state_type='voice_message';


  $audio = file_get_contents($_FILES['file']['tmp_name']);
  
  $tempFile = $_FILES['file']['tmp_name'];
  
 @copy ($tempFile , "../data/fileupload/voice/".$_GET[vc]."_".time().".mp3" );

}
 
 
 
 
 if($_GET[state_type]=='flight_delay'){
$state_name=''.$_GET[chat_from].'_flight_delay';
$state_type='flight_delay';
}


 if($_GET[state_type]=='after_time'){
$state_name=''.$_GET[chat_from].'_after_time';
$state_type='after_time';
}


 if($_GET[state_type]=='before_time'){
$state_name=''.$_GET[chat_from].'_before_time';
$state_type='before_time';
}



 if($_GET[state_type]=='flight_change'){
$state_name=''.$_GET[chat_from].'_flight_change';
$state_type='flight_change';
}






 
 //////
 
 //$chat_from=$_GET[chat_from];
///$chat_to=$_GET[chat_to];
 
 
 ///////
	$db->connectdb(DB_NAME_CHAT, DB_USERNAME, DB_PASSWORD);  
	$numday = $db->num_rows('vc'.$_GET[vc].'',"id","day_comment='".date('Y-m-d')."' ");
	
	if($numday==0){
	 $daystart=1;
	}
		if($numday>0){
	 $daystart=0;
	}
 
 
 

	
	$db->connectdb(DB_NAME_CHAT, DB_USERNAME, DB_PASSWORD);  
		$db->add_db('vc'.$_GET[vc].'',array( 		  

 	 
	 	   "voucher" => "$_GET[vc]",
		   "orderid" => $arr[vc][orderid],
		   "admin_company" => "$_GET[admin_company]",
		   "company" => "$_GET[company]",
		   "product" => "$_GET[product]",
		   "product_type" => "$_GET[product_type]",
		   
			"server" => "$_GET[sv]",		   
			"post_date"=>"".TIMESTAMP."",
			"post_by" => "$_GET[post_by]",		  
			"drivername" => $arr[vc][drivername] ,		  
		   
		   "latitude" => "$_GET[lat]",
		   "longitude" => "$_GET[lng]",		   
		   		   
		   "time_h" => "$_GET[time_h]",
		   "time_m" => "$_GET[time_m]",
		   
		   
		   
		   
		   
		   /////// new flight
		   	"ondate_new_flight" => "$_GET[date_flight]",
		   "new_flight" => "$_GET[new_flight]",
		   	"time_new_flight_h" => "$_GET[flight_time_h]",
		   "time_new_flight_m" => "$_GET[flight_time_m]",
		   
		   		   /////// old flight
		   	"ondate_old_flight" => "$_GET[old_date_flight]",
		   "old_flight" => "$_GET[old_flight]",
		   	"time_old_flight_h" => "$_GET[old_flight_time_h]",
		   "time_old_flight_m" => "$_GET[old_flight_time_m]",
		   
		   
 
 
		 //  "state_name" => $state_name,
		    "state_type" => $state_type,
			 
			"chat_id" =>$chat_id,
			
	 	 
			"comment_id" => "$_POST[message_store]", 
		   "comment" => "$_POST[message]",
		   "comment_from" => "$_GET[chat_from]",		   
			"comment_to" => "$_GET[chat_to]",		   
			 
			  "day_start" =>$daystart,		   
			   "day_comment" => date('Y-m-d'),		   
			 
 
 
		));
		
	
 
	
    //// 
    $db->connectdb(DB_NAME_CHAT,DB_USERNAME,DB_PASSWORD);	
	$num_allchat = $db->num_rows('allchat',"id","voucher = '".$_GET[vc]."' ");
 
	
	
	if($num_allchat==0){		
	
	$db->connectdb(DB_NAME_CHAT, DB_USERNAME, DB_PASSWORD);  
		$db->add_db('allchat',array( 	

 	 
	 	   "voucher" => "$_GET[vc]",
		    "orderid" => $arr[vc][orderid],
		   "admin_company" => "$_GET[admin_company]",
		   "company" => "$_GET[company]",
		   "product" => "$_GET[product]",
		   "product_type" => "$_GET[product_type]",
		   
			"server" => "$_GET[sv]",		   
			"post_date"=>"".TIMESTAMP."",
			"post_by" => "$_GET[post_by]",		  
			"drivername" => $arr[vc][drivername] ,		  
		   
		   "latitude" => "$_GET[lat]",
		   "longitude" => "$_GET[lng]",		   
		   		   
		   "time_h" => "$_GET[time_h]",
		   "time_m" => "$_GET[time_m]",

 
		   
		   
		   
		   "state_type" => $state_type,			 
		"chat_id" =>$chat_id,
			
	 	 
			"comment_id" => "$_POST[message_store]", 
		   "comment" => "$_POST[message]",
		   "comment_from" => "$_GET[chat_from]",		   
			"comment_to" => "$_GET[chat_to]",		   
			 
			  "day_start" =>$daystart,		   
			   "day_comment" => date('Y-m-d'),		   
			 
 
 
		));
		
	
	}
	
	
	
	//////
	
	//if($num_allchat>0){		
	
	/*
	
	$db->connectdb(DB_NAME_CHAT, DB_USERNAME, DB_PASSWORD);  
		$db->add_db('allchat',array( 	

 	 
	 	   "voucher" => "$_GET[vc]",
		    "orderid" => $arr[vc][orderid],
		   "admin_company" => "$_GET[admin_company]",
		   "company" => "$_GET[company]",
		   "product" => "$_GET[product]",
		   "product_type" => "$_GET[product_type]",
		   
			"server" => "$_GET[sv]",		   
			"post_date"=>"".TIMESTAMP."",
			"post_by" => "$_GET[post_by]",		  
			"drivername" => $arr[vc][drivername] ,		  
		   
		   "latitude" => "$_GET[lat]",
		   "longitude" => "$_GET[lng]",		   
		   		   
		   "time_h" => "$_GET[time_h]",
		   "time_m" => "$_GET[time_m]",

 
		   
		   
		   
		   "state_type" => $state_type,			 
		"chat_id" =>$chat_id,
			
	 	 
			"comment_id" => "$_POST[message_store]", 
		   "comment" => "$_POST[message]",
		   "comment_from" => "$_GET[chat_from]",		   
			"comment_to" => "$_GET[chat_to]",		   
			 
			  "day_start" =>$daystart,		   
			   "day_comment" => date('Y-m-d'),		   
			 
 
 
		));
		
	
	}
	
		
		/*
		
		$db->update_db(TB_order,array( 
		 "count_driver"=>$allcomment 			
		)," invoice='".$_GET[vc]."'");
		
		*/
		/*
		
  	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);	
	$numdriver = $db->num_rows('all_message',"id","comment_to='driver' and  voucher = '".$_POST[voucher]."' ");
	$numdriver=$numdriver+1;
		*/
///////////////

 
 
$folder_xml="../data/xml";
$newmsg = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<newmsg>\n";
 
$newmsg .= "<message><![CDATA[".$_POST[message]."]]></message>\n";
$newmsg .= "<status>1</status>\n";
$newmsg .= "<order>".$arr[vc][orderid]."</order>\n";
$newmsg .= "<vc>".$_GET[vc]."</vc>\n";
$newmsg .= "<driver>".$user_id."</driver>\n";
$newmsg .= "<time>".date("H:i:s")."</time>\n";
$newmsg .= "</newmsg>";
 

@unlink("$folder_xml/guest/chat/from/driver_".$_GET[vc].".xml");
@$fd = @fopen("$folder_xml/guest/chat/from/driver_".$_GET[vc].".xml", "a+");
@fputs($fd, $newmsg . "");
@fclose($fd);


$db->connectdb(DB_NAME_CHAT, DB_USERNAME, DB_PASSWORD);  
 $res[chatlast] = $db->select_query("SELECT id FROM vc".$_GET[vc]." ORDER BY id desc limit 1"); 
 $arr[chatlast] = $db->fetch($res[chatlast]);
	



if(!$arr[chatlast][id]){

$arr[chatlast][id]=0;
}




////// เช็ค vc
$folder_xml="../data/xml";
$newmsg = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<newmsg>\n";
 
$newmsg .= "<id>".$arr[chatlast][id]."</id>\n";
$newmsg .= "<time>".date("H:i:s")."</time>\n";
$newmsg .= "<user>".$_GET[chat_from]."</user>\n";
$newmsg .= "</newmsg>";
 

@unlink("$folder_xml/chat_check/vc/".$_GET[vc].".xml");
@$fd = @fopen("$folder_xml/chat_check/vc/".$_GET[vc].".xml", "a+");
@fputs($fd, $newmsg . "");
@fclose($fd);



////// เช็ค order id
$folder_xml="../data/xml";
$newmsg = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<newmsg>\n";
 
$newmsg .= "<id>".$arr[vc][orderid]."</id>\n";
$newmsg .= "<vc>".$_GET[vc]."</vc>\n";
$newmsg .= "<time>".date("H:i:s")."</time>\n";
$newmsg .= "<user>".$_GET[chat_from]."</user>\n";
$newmsg .= "</newmsg>";
 

@unlink("$folder_xml/chat_check/order/".$arr[vc][orderid].".xml");
@$fd = @fopen("$folder_xml/chat_check/order/".$arr[vc][orderid].".xml", "a+");
@fputs($fd, $newmsg . "");
@fclose($fd);
 
 ////// เช็คข้อความใหม่จาก order 
 
$folder_xml="../data/new_msg";
$newmsg = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<newmsg>\n";
 
$newmsg .= "<id>".$arr[vc][orderid]."</id>\n";
$newmsg .= "<status>1</status>\n";
$newmsg .= "<msg>".$_POST[message]."</msg>\n";
$newmsg .= "<vc>".$_GET[vc]."</vc>\n";
$newmsg .= "<type>".$state_type."</type>\n";
$newmsg .= "<time>".date("H:i:s")."</time>\n";
$newmsg .= "<from>".$_GET[chat_from]."</from>\n";
$newmsg .= "<to>".$_GET[chat_to]."</to>\n";
 
$newmsg .= "</newmsg>";
 

@unlink("$folder_xml/order/".$arr[vc][orderid]."_".$_GET[chat_to].".xml");
@$fd = @fopen("$folder_xml/order/".$arr[vc][orderid]."_".$_GET[chat_to].".xml", "a+");
@fputs($fd, $newmsg . "");
@fclose($fd);


?>