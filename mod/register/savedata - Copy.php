 <?

///// upload pic


 



 

  $db->connectdb(DB_NAME_DATA, DB_USERNAME, DB_PASSWORD);
 
  /// car
  ////////////////////// Parameter 2 server
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
		$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
		$db->add_db('store_carall_register',$params);
		$last_id = mysql_insert_id();
		$db->closedb ();
////////////// insert China Server	
$params['id'] = $last_id;		


 

 
 /*

@copy ("../data/fileupload/store/register/id_card_".$_GET['time']."_big.jpg", "../data/fileupload/photo/driver/".TIMESTAMP.".jpg" );  
@unlink ("../data/fileupload/store/register/id_card_".$_GET['time']."_big.jpg" ); 

@copy ("../data/fileupload/store/register/id_driving_".$_GET['time']."_big.jpg", "../data/fileupload/photo/driver/".TIMESTAMP.".jpg" );  
@unlink ("../data/fileupload/store/register/id_driving_".$_GET['time']."_big.jpg" ); 

@copy ("../data/fileupload/store/register/id_insure_".$_GET['time']."_big.jpg", "../data/fileupload/photo/driver/".TIMESTAMP.".jpg" );  
@unlink ("../data/fileupload/store/register/id_insure_".$_GET['time']."_big.jpg" ); 

*/







		//*
		/*
		$db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->add_db(TB_carall,$params);
		$db->closedb ();
		
		*/
		//*/
		


/// driver
   
    $db->connectdb(DB_NAME_DATA, DB_USERNAME, DB_PASSWORD);
   
        $db->add_db('store_driver_register', array(
 
            "company" => "$_POST[company]",
            "email" => "$_POST[email]",
            "wechat_id" => "$_POST[wechat_id]",
            "line_id" => "$_POST[line_id]",
            "name_en" => "$_POST[name_en]",
            "name" => "$_POST[name]",
            "nickname" => "$_POST[nickname]",
            "idcard" => "$_POST[idcard]",
            "iddriving" => "$_POST[iddriving]",
            "email" => "$_POST[email]",
            "phone" => "$_POST[phone]",
            "contact" => "$_POST[contact]",
            "car_num" => $last_id,
            "start_work" => "$_POST[start_work]",
            "address" => "$_POST[address]",
            "detail" => "$_POST[detail]",
            "posted" => "$_SESSION[admin_user]",
			
			"driver_zone" => "$_POST[driver_zone]",
			
			
			 "pay_bank_name" => "$_POST[pay_bank_name]",
			 "pay_bank" => "$_POST[pay_bank]",
			 "pay_bank_sub" => "$_POST[pay_bank_sub]",
			  "pay_bank_number" => "$_POST[pay_bank_number]",
			 "pay_bank_user" => "$_POST[pay_bank_user]",
	 
			
            "post_date" => "" . TIMESTAMP . "",
            "update_date" => "" . TIMESTAMP . ""
        ));
        $db->closedb();

?>

    <script>
	   setTimeout(function () {
//  $("#login_logo").attr("src", "images/applogo.png");
 ///window.location.href = "index.php?newlogin=1"; //will redirect to your blog page (an ex: blog.html)
 window.location.href = "register_complete.php"; //will redirect to your blog page (an ex: blog.html)
}, 1000); //w
 
	</script>