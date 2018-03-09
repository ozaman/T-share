 <?

///// upload pic


if($_GET[action]=="add"){

 

  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
 /*
  /// car
  ////////////////////// Parameter 2 server
$params['code'] = $_POST[check_code];
  
$params['company'] = $_POST[company];
$params['car_type'] = $_POST[car_type];
$params['car_brand'] = $_POST[car_brand];
$params['car_sub_brand'] = $_POST[car_sub_brand];
$params['car_color'] = $_POST[car_color];
$params['car_num'] = $_POST[car_num];
$params['plate_num'] = $_POST[plate_num];
$params['province'] = $_POST[province];
$params['plate_color'] = $_POST[plate_color];
$params['insure_company'] = $_POST[insure_company];
$params['insure_num'] = $_POST[insure_num];
$params['insure_phone'] = $_POST[insure_phone];
$params['mile_num'] = $_POST[mile_num];
$params['mile_last'] = $_POST[mile_last];
$params['oil_last'] = $_POST[oil_last];
$params['exp_insur'] = $_POST[exp_insur];
$params['exp_act'] = $_POST[exp_act];
$params['car_serial'] = $_POST[car_serial];
$params['model_serial'] = $_POST[model_serial];
$params['tax_date'] = $_POST[tax_date];
$params['exp_date'] = $_POST[exp_date];
$params['gps'] = $_POST[gps];
$params['remark'] = $_POST[remark];
$params['posted'] = $_SESSION[admin_user];
$params['post_date'] = TIMESTAMP;
$params['update_date'] = TIMESTAMP;
$params['enable_comment'] = $_POST[ENABLE_COMMENT];
 
 

/**
* 
* @var ********* START insert
* 
*/
////////////// insert Thailand Server
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->add_db('web_carall',$params);
		$last_id = mysql_insert_id();
		$db->closedb ();
////////////// insert China Server	
$params['id'] = $last_id;		





/////

$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
 
$next_increment     = 0;
$qShowStatus        = "SHOW TABLE STATUS LIKE 'web_driver'";
$qShowStatusResult  = mysql_query($qShowStatus) or die ( "Query failed: " . mysql_error() . "<br/>" . $qShowStatus );
$row = mysql_fetch_assoc($qShowStatusResult);

$last_id = $row['Auto_increment'];
$member_db = $row['Auto_increment'];
 

if($member_db>=1000) {
$member_in = "$member_db" ;
}
elseif($member_db >=100) {
$member_in = "0$member_db" ;
}
elseif($member_db >=10) {
$member_in = "00$member_db" ;
}
elseif($member_db >=1) {
$member_in = "000$member_db" ;
}
else {
$member_in = "0000$member_db" ;
}
$rand = substr(str_shuffle('12345678901234567890123456789012345678901234567890'),0,50);
$rand_login = substr(str_shuffle('12345678901234567890123456789012345678901234567890'),0,50);

$password =substr(str_shuffle('1234567890'),0,4);

////

$provincecode='HKT';


 
 $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
   
  $db->add_db('web_driver', array(
 
 
 "username"=>"$provincecode$member_in",
  "password"=>"$password",

// code_login
 "code_login" => $rand_login,
   ///"code" => "$_POST[check_code]",
 "company" => "$_POST[company]",
   "email" => "$_POST[email]",
           
            "name_en" => "$_POST[name_en]",
            "name" => "$_POST[name]",
            "nickname" => "$_POST[nickname]",
			
            "idcard_finish" => "$_POST[idcard_finish]",
			 "idcard" => "$_POST[idcard]",
			 
			 
				  "iddriving_finish" => "$_GET[iddriver_finish]",
			 "iddriving" => "$_POST[iddriving_new]",
			
			
            "email" => "$_POST[email]",
            "phone" => "$_POST[phone]",
            "contact" => "$_POST[contact]",
            "car_num" => $last_id,
            "start_work" => "$_POST[start_work]",
            "address" => "$_POST[address]",
            "detail" => "$_POST[detail]",
            "posted" => "$_SESSION[admin_user]",
			
			"driver_zone" => "$_POST[driver_zone]",
			
			"status" => "1",
			
			/*
			 "pay_bank_name" => "$_POST[pay_bank_name]",
			 "pay_bank" => "$_POST[pay_bank]",
			 "pay_bank_sub" => "$_POST[pay_bank_sub]",
			  "pay_bank_number" => "$_POST[pay_bank_number]",
			 "pay_bank_user" => "$_POST[pay_bank_user]",
	 
	 */
	 /// social
	 
	             "email" => "$_POST[email]",
				 
			 "skype_id" => "$_POST[skype_id]",
			 "zello_id" => "$_POST[zello_id]",
			          "wechat_id" => "$_POST[wechat_id]",
			 "whatsapp_id" => "$_POST[whatsapp_id]",
            "line_id" => "$_POST[line_id]",
			
 	
			////
	 
            "post_date" => "" . TIMESTAMP . "",
            "update_date" => "" . TIMESTAMP . ""
        ));
        $db->closedb();
		
		
		
 

		
		
		    $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
	
	$res[project] = $db->select_query("SELECT  id,username  FROM  web_driver    order by id desc limit 1  ");
	///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
 $arr[web_driver_edit] = $db->fetch($res[project]);
 
 
 copy ("../data/fileupload/store/register/".$_POST[check_code]."_id_driver.jpg", "../data/pic/driver/small/".$arr[web_driver_edit][username].".jpg" );  

unlink ("../data/fileupload/store/register/".$_POST[check_code]."_id_driver.jpg" ); 
		
		
 $_GET[vc]='new';
  ////// สร้างไฟล์
$folder_xml="../data/xml";
$newdriver = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<newdriver>\n";
 
 
 
///$newdriver .= "<id>".$arr[chatlast][id]."</id>\n";
$newdriver .= "<status>1</status>\n";
$newdriver .= "<time>".date("H:i:s")."</time>\n";
$newdriver .= "<name>".$_POST[name]."</name>\n";
$newdriver .= "<phone>".$_POST[phone]."</phone>\n";
$newdriver .= "<code>".$_POST[check_code]."</code>\n";

$newdriver .= "<id>".$arr[web_driver_edit][id]."</id>\n";

 
$newdriver .= "</newdriver>";
 

@unlink("$folder_xml/register/taxi/".$_GET[vc].".xml");
@$fd = @fopen("$folder_xml/register/taxi/".$_GET[vc].".xml", "a+");
@fputs($fd, $newdriver . "");
@fclose($fd);
		
 	
	
 include ("mod/register/sendmail/new.php");
	
	

?>

    <script>
	   setTimeout(function () {
//  $("#login_logo").attr("src", "images/applogo.png");autologin
 ///window.location.href = "index.php?newlogin=1"; //will redirect to your blog page (an ex: blog.html)
 window.location.href = "signin.php?autologin=1&user=<?=$provincecode?><?=$member_in?>&pass=<?=$password?>"; //will redirect to your blog page (an ex: blog.html)
}, 1000); //w
 
	</script>
    
    
    <? } ?>
	
    
 
    
      <?

///// upload pic


if($_GET[action]=="edit"){

 
    $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);	
	$res[project] = $db->select_query("SELECT * FROM  web_driver  where id=".$_GET[id]."   order by id desc  ");
	///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
 $arr[web_driver_edit] = $db->fetch($res[project]);
	
 
       //   $db->update_db('web_driver' array(
 
    $db->update_db('web_driver', array(
 
		 
            "company" => "$_POST[company]",
            "email" => "$_POST[email]",
           
            "name_en" => "$_POST[name_en]",
            "name" => "$_POST[name]",
            "nickname" => "$_POST[nickname]",
			
            "idcard_finish" => "$_POST[idcard_finish]",
			 "idcard" => "$_POST[idcard]",
			 
			 
			 
			 "iddriving" => "$_POST[iddriving_new]",
			 	  "iddriving_finish" => "$_GET[iddriver_finish]",
			
 
            "email" => "$_POST[email]",
            "phone" => "$_POST[phone]",
            "contact" => "$_POST[contact]",
          //  "car_num" => $last_id,
            "start_work" => "$_POST[start_work]",
            "address" => "$_POST[address]",
            "detail" => "$_POST[detail]",
            "posted" => "$_SESSION[admin_user]",
			
			"driver_zone" => "$_POST[driver_zone]",
			
			"status" => "1",
			
			
			 "pay_bank_name" => "$_POST[pay_bank_name]",
			 "pay_bank" => "$_POST[pay_bank]",
			 "pay_bank_sub" => "$_POST[pay_bank_sub]",
			  "pay_bank_number" => "$_POST[pay_bank_number]",
			 "pay_bank_user" => "$_POST[pay_bank_user]",
	 
	 
	 /// social
	 
	             "email" => "$_POST[email]",
			 "skype_id" => "$_POST[skype_id]",
			 "zello_id" => "$_POST[zello_id]",
		  "wechat_id" => "$_POST[wechat_id]",
			 "whatsapp_id" => "$_POST[whatsapp_id]",
            "line_id" => "$_POST[line_id]",
			
			
			////
	 
			
            "post_date" => "" . TIMESTAMP . "",
            "update_date" => "" . TIMESTAMP . ""
			
	 
  ), " id=".$arr[web_driver_edit][id]." ");
  
 
  
  ///////
  
      $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
  
    $db->update_db('web_carall', array(
 
		 
            "car_type" => "$_POST[car_type]",
			 "car_brand" => "$_POST[car_brand]",
			 
			  "car_color" => "$_POST[car_color]",
			   "car_sub_brand" => "$_POST[car_model]",
			  
			  "province" => "$_POST[province]",
			  
			   "plate_num" => "$_POST[plate_num]",
			   
			   "plate_color" => "$_POST[plate_color]",
 
			////
	 
			
            "post_date" => "" . TIMESTAMP . "",
            "update_date" => "" . TIMESTAMP . ""
			
	 
  ), " id=".$arr[web_driver_edit][car_num]." ");
  
  
  $_GET[vc]='new';
  ////// สร้างไฟล์
$folder_xml="../data/xml";
$newdriver = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<newdriver>\n";
 
 
 
///$newdriver .= "<id>".$arr[chatlast][id]."</id>\n";
$newdriver .= "<status>1</status>\n";
$newdriver .= "<time>".date("H:i:s")."</time>\n";
$newdriver .= "<name>".$_POST[name]."</name>\n";
$newdriver .= "<phone>".$_POST[phone]."</phone>\n";
$newdriver .= "<code>".$_POST[check_code]."</code>\n";

$newdriver .= "<id>".$arr[web_driver_edit][id]."</id>\n";

 $newdriver .= "</newdriver>";
 
@unlink("$folder_xml/register/taxi/".$_GET[vc].".xml");
@$fd = @fopen("$folder_xml/register/taxi/".$_GET[vc].".xml", "a+");
@fputs($fd, $newdriver . "");
@fclose($fd);

 
  
  
?>
  
  
      <script>
	   setTimeout(function () {
//  $("#login_logo").attr("src", "images/applogo.png");
 ///window.location.href = "index.php?newlogin=1"; //will redirect to your blog page (an ex: blog.html)
 window.location.href = "index.php?name=register&file=all"; //will redirect to your blog page (an ex: blog.html)
}, 3000); //w
 
	</script>
  
  
  
  
  
<?
  
  
  
		
		
  } 
  
  
  


?>

   
    
    
    
    