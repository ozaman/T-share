<?
$db->connectdb(DB_NAME_CHAT_CONTACT, DB_USERNAME, DB_PASSWORD);	

$sum_user = $db->num_rows('chat_user',"id","user_id=".$user_id." and class_name='driver'");

 

 if($sum_user==0){ 
 
 
	$db->add_db('chat_user',array( 	
		  
 	 "name" => $user_name_en,
	 
	 "user_id" => $user_id,
	 
	  "class_name" => "driver",
  
   "post_date"=>"".TIMESTAMP.""
		 
		));
		
		}
	 

?>