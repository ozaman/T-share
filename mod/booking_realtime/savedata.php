<?

if($_GET[action]=='add'){
	
	
 
 
  //////////// คำนวณ
  
  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[price] = $db->select_query("SELECT * FROM  product_price_list where country=".$_POST[nation]."  and product_id	=".$_POST[program]." and plan_id=".$_POST[price_plan]." ORDER BY id  ");
                      
 $arr[price] = $db->fetch($res[price]) ;
 
 
  /// plan
  $res[plan] = $db->select_query("SELECT plan_id  FROM plan_product_price_list WHERE  id=".$_POST[price_plan]." ");
 $arr[plan] = $db->fetch($res[plan]);
 
 
 
 
 
 
$number=$_POST[adult];
 
	  
 $res[extra_park] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_id=".$_POST[price_plan]." and type='park' ");
 $arr[extra_park] = $db->fetch($res[extra_park]);
 
$res[extra_person] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_id=".$_POST[price_plan]." and type='person' ");
 $arr[extra_person] = $db->fetch($res[extra_person]);
 
 
 
///// หา plan ค่าจอดเกิน
$res[company_park] = $db->select_query("SELECT * FROM  company_product_rate_income WHERE  from_number <= $number AND to_number >= $number  and product_id=".$_POST[program]." and type='park' ");
 $arr[company_park] = $db->fetch($res[company_park]);

/////


 $income_price_park=$arr[company_park][price_park];
 
 /*
 
 if($income_price_park<1){
	 
 $income_price_park=0; 
 }
 */


$price_park_unit=$arr[price][price_park];
$price_person_unit=$arr[price][price_person];


 if( $arr[extra_park][id]) {
$price_park_unit=$arr[extra_park][price_park];	
$price_extra_park=1;
 }
                
 
  if( $arr[extra_person][id]) {	 
$price_person_unit=$arr[extra_person][price_person];	
$price_extra_person=1;
	 	 
 }
 			
			
$price_person_total=$price_person_unit*$number;
					
 $price_all_total=$price_person_total+$price_park_unit;
  /*
  

  
  */
  
  
  
  if($_POST[check_wait_status]=='area'){
	  
$transfer_time=$_POST[transfer_time];

$back_to_place=$_POST[to_place_area];
	  
  }
  
  
  if($_POST[check_wait_status]=='out'){
	  
$transfer_time=$_POST[transfer_time_airport];

$back_to_place=193;
	  
  }
  
  
  
    if($_POST[check_wait_status]=='no'){
	  
$transfer_time=0;

$back_to_place=0;
	  
  }
  
  
  
  /// transfer_time to_place
  
  
  ///////////
  
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
 
$next_increment     = 0;
$qShowStatus        = "SHOW TABLE STATUS LIKE 'order_booking'";
$qShowStatusResult  = mysql_query($qShowStatus) or die ( "Query failed: " . mysql_error() . "<br/>" . $qShowStatus );
$row = mysql_fetch_assoc($qShowStatusResult);

$last_id = $row['Auto_increment'];
$member_db = $row['Auto_increment'];



if($member_db>=10000) {
$member_in = "$member_db" ;
}
elseif($member_db >=1000) {
$member_in = "0$member_db" ;
}
elseif($member_db >=100) {
$member_in = "00$member_db" ;
}
elseif($member_db >=10) {
$member_in = "000$member_db" ;
}
else {
$member_in = "0000$member_db" ;
}
$rand = substr(str_shuffle('123456789012345678901234567890'),0,30);


 
  
  /// invoice
 
 
 
 
 
  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
 $db->add_db('order_booking', array(
 
 "invoice"=>"S$member_in",
 "code"=>"$rand",	
 
 
 
  ///// ขากลับ
"wait_status" => "$_POST[check_wait_status]",
"transfer_time" =>$transfer_time,
"back_to_place" => $back_to_place,
 
 
 /////////
 
 "plan_id" => "$_POST[price_plan]",
 "plan_commission" =>$arr[plan][plan_id],
 
  "price_park_unit" => $price_park_unit,
 "price_park_total" => $price_park_unit,
 
 
 "price_person_unit" => $price_person_unit,
 "price_person_total" => $price_person_total,
 
  "price_all_total" => $price_all_total,
 
 
  "price_extra_park" => $price_extra_park,
  "price_extra_person" => $price_extra_park,
  
  
    "income_price_park" => $income_price_park,
 
 "pax" => "$_POST[adult]",
 //
 
 
 
 
 
 
 
 
 
  "product" => "$_POST[program]",
  "program" => "$_POST[program]",
 
 
 "transfer_date" => "$_POST[transfer_date_new]",
	"ondate" => "$_POST[transfer_date_new]",
	"outdate" =>"$_POST[transfer_date_new]",
				
 "airout_h" => "$_POST[airout_h]",
 "airout_m" => "$_POST[airout_m]",
 
 "airout_time" => "$_POST[airout_h].$_POST[airout_m]",
		
 /*
			  
  "price_park" => "$_POST[price_park]",
		  "price_person" => "$_POST[price_person]",
			 
	  "price_total" => "$_POST[price_total]", 
	  
	  
 
	  
	  
	*/	
 
 
 	    "car_color" => "$_POST[car_color]",
		"car_type" => "$_POST[car_type]",
		"car_plate" => "$_POST[car_plate]",
  
 
	 	
 	  "adult" => "$_POST[adult]",
		  "child" => "$_POST[child]",
	 "baby" => "$_POST[baby]",
	 
 
	   "nation" => "$_POST[nation]",
 
					
		 	
            "name_pickup_place" => "$_POST[pickup_place]",
			 "name_to_place" => "$_POST[to_place]",
 
  "booking_by" => "$_GET[driver]",
  
  
 	 
 "payment_type" => "$_POST[payment_type]",
			 
			 
 "drivername" => "$_GET[driver]",
 
 "namedriver" =>"$_POST[namedriver]",
 
 
"ondate_time" => "$_POST[ondate_time]",
 
            "posted" => "$_SESSION[data_user_driver]",
            "post_date" => "" . TIMESTAMP . "",
            "update_date" => "" . TIMESTAMP . ""
			
	
        ));
        $db->closedb();
		
			 
		///// สร้างรายการ ค่าคอม
		
if($arr[plan][plan_id]==2){ 
		
		
		  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
       
  $res[com] = $db->select_query("SELECT * FROM  product_option_percent  ORDER BY id asc");
              while($arr[com] = $db->fetch($res[com])) {
				  
		/////
		
	 $db->add_db('order_booking_option_list',array(
		
		"invoice"=>"S$member_in",
		"option_id"=>$arr[com][id], 
		
	 "plan_id" => "$_POST[price_plan]",
		
	 "percent_company"=>$arr[com][company_commission], 
	  "percent_taxi"=>$arr[com][taxi_commission], 
	  
	  "vat_company"=>$arr[com][company_vat], 
	  "vat_taxi"=>$arr[com][taxi_vat], 
	  
  "pax" => "$_POST[adult]",
 
        "post_date" => "" . TIMESTAMP . "",
         "update_date" => "" . TIMESTAMP . ""
 
		));
 
		
			  }
		
		
		////
		
 
		
		
			  }
		
		

///unlink ("../data/fileupload/store/edit_work/".$_GET[vc]."_big.jpg" ); 
		
		
		
		
		
include ("mod/booking_realtime/sendmail/new.php");
 
		
		
 //////////////// เตือน โอพี
		
		
		 
  $_GET[vc]=$last_id ;
  ////// สร้างไฟล์
$folder_xml="../data/xml";
$newvc = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<newvc>\n";
 
 
 
///$newvc .= "<id>".$arr[chatlast][id]."</id>\n";
$newvc .= "<status>1</status>\n";
$newvc .= "<time>".date("H:i:s")."</time>\n";
$newvc .= "<vc>".$_GET[vc]."</vc>\n"; 
$newvc .= "<code>".$rand."</code>\n";
$newvc .= "<id>".$last_id."</id>\n";
 
$newvc .= "</newvc>";
 

@unlink("$folder_xml/register/shopping/new.xml");
@$fd = @fopen("$folder_xml/register/shopping/new.xml", "a+");
@fputs($fd, $newvc . "");
@fclose($fd);

 
	?>
    <script>
	
 $('#load_mod_popup').html(load_main_mod);
	
 
	///alert('บันทึกข้อมูลช็อปปิ้งแล้ว');
	
 
	   setTimeout(function () {
//  $("#login_logo").attr("src", "images/applogo.png");
 ///window.location.href = "index.php?newlogin=1"; //will redirect to your blog page (an ex: blog.html)
 window.location.href = "?name=booking&file=all"; //will redirect to your blog page (an ex: blog.html)
}, 3000); //w
 
	</script>
    
 

<? } ?>


 
 
 
 


 <?

if($_GET[action]=='edit'){
 
 
 
  ///////// 
 
 
 	
	
	

  
  
  /// transfer_time to_place
	
 
 
  //////////// คำนวณ
  
  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[price] = $db->select_query("SELECT * FROM  product_price_list where country=".$_POST[nation]."  and product_id	=".$_POST[program]." and plan_id=".$_POST[price_plan]." ORDER BY id  ");
                      
 $arr[price] = $db->fetch($res[price]) ;
 
 
  /// plan
  $res[plan] = $db->select_query("SELECT plan_id  FROM plan_product_price_list WHERE  id=".$_POST[price_plan]." ");
 $arr[plan] = $db->fetch($res[plan]);
 
 
 
 
 
 
$number=$_POST[adult];
 
	  
 $res[extra_park] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_id=".$_POST[price_plan]." and type='park' ");
 $arr[extra_park] = $db->fetch($res[extra_park]);
 
$res[extra_person] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_id=".$_POST[price_plan]." and type='person' ");
 $arr[extra_person] = $db->fetch($res[extra_person]);
 
 
 
///// หา plan ค่าจอดเกิน
$res[company_park] = $db->select_query("SELECT * FROM  company_product_rate_income WHERE  from_number <= $number AND to_number >= $number  and product_id=".$_POST[program]." and type='park' ");
 $arr[company_park] = $db->fetch($res[company_park]);

/////


 $income_price_park=$arr[company_park][price_park];
 
 /*
 
 if($income_price_park<1){
	 
 $income_price_park=0; 
 }
 */


$price_park_unit=$arr[price][price_park];
$price_person_unit=$arr[price][price_person];


 if( $arr[extra_park][id]) {
$price_park_unit=$arr[extra_park][price_park];	
$price_extra_park=1;
 }
                
 
  if( $arr[extra_person][id]) {	 
$price_person_unit=$arr[extra_person][price_person];	
$price_extra_person=1;
	 	 
 }
 			
 	
$price_person_total=$price_person_unit*$number;
					
 $price_all_total=$price_person_total+$price_park_unit;
 
 
 
 
 
 
 
 
 	 
  if($_POST[check_wait_status]=='area'){
	  
$transfer_time=$_POST[transfer_time];

$back_to_place=$_POST[to_place_area];
	  
  }
  
  
  if($_POST[check_wait_status]=='out'){
	  
$transfer_time=$_POST[transfer_time_airport];

$back_to_place=193;
	  
  }
  
  
  
    if($_POST[check_wait_status]=='no'){
	  
$transfer_time=0;

$back_to_place=0;
	  
  }
  
 
 
 
 
 
 

 /////
     $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('order_booking', array(

		"plan_id" => "$_POST[price_plan]",
 "plan_commission" =>$arr[plan][plan_id],
 
 
 
   ///// ขากลับ
"wait_status" => "$_POST[check_wait_status]",
"transfer_time" =>$transfer_time,
"back_to_place" => $back_to_place,
 
 
 
 
 
 
 
 
 
  "price_park_unit" => $price_park_unit,
 "price_park_total" => $price_park_unit,
 
 
 "price_person_unit" => $price_person_unit,
 "price_person_total" => $price_person_total,
 
  "price_all_total" => $price_all_total,
 
 
  "price_extra_park" => $price_extra_park,
  "price_extra_person" => $price_extra_park,
  
  
    "income_price_park" => $income_price_park,
 
 "pax" => "$_POST[adult]",
 //
 
 
 
 
  "cancel_type" => "$_POST[cancel_type]",
 
 
 
 
  "product" => "$_POST[program]",
  "program" => "$_POST[program]",
 
 
// "transfer_date" => "$_POST[transfer_date_new]",
//	"ondate" => "$_POST[transfer_date_new]",
//	"outdate" =>"$_POST[transfer_date_new]",
				
 "airout_h" => "$_POST[airout_h]",
 "airout_m" => "$_POST[airout_m]",
 
 "airout_time" => "$_POST[airout_h].$_POST[airout_m]",
		
 /*
			  
  "price_park" => "$_POST[price_park]",
		  "price_person" => "$_POST[price_person]",
			 
	  "price_total" => "$_POST[price_total]", 
   
	*/	
 
 
 
 	    "car_color" => "$_POST[car_color]",
		"car_type" => "$_POST[car_type]",
		"car_plate" => "$_POST[car_plate]",
  
 
	 	
 	  "adult" => "$_POST[adult]",
		  "child" => "$_POST[child]",
	 "baby" => "$_POST[baby]",
 
	   "nation" => "$_POST[nation]",
 
 
 "name_pickup_place" => "$_POST[pickup_place]",
 "name_to_place" => "$_POST[to_place]",
 
 
 
  "booking_by" => "$_POST[booking_by]",
  
  "booking_type" => "$_POST[booking_type]",
  
   "booking_ref" => "$_POST[booking_ref]",
  
  
  
  
  
 "payment_type" => "$_POST[payment_type]",		
 
 
  "namedriver" =>"$_POST[namedriver]",
 
 
 
 /// ไม่มีการอัพเดท	 
			 
  ///"drivername" => "$_GET[driver]", 
 
"ondate_time" => "$_POST[ondate_time]",

  "status" => "$_POST[check_booking_status]",

 
 
            "update_date" => "" . TIMESTAMP . ""
		)," id='".$_GET[id]."' ");
		$db->closedb ();
		
 

///// history
	 
	   $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->add_db('history_edit', array(
		
 
 	 "vc_id" => "$_GET[id]",
 	  "status" => "$_POST[check_booking_status]",
			 
         
    "posted" => "$_SESSION[data_user_id]",
            "post_date" => "" . TIMESTAMP . "",
            "update_date" => "" . TIMESTAMP . ""
			
	
        ));
        $db->closedb();
		
		
		
///// กรณี CONFIRM

if($_POST[check_booking_status]=='CONFIRM'){
 
 
	
}
		
		
		
 
	
	////// ถ้ามีรูป
	
		if($_POST[check_photo_edit_work]=='1'){
 	
 
	  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('order_booking', array(

 
			////  "status" => "CONFIRM",
			 
			 
			  "booking_pic" => "1", 
	 
 
            "update_date" => "" . TIMESTAMP . "",
		)," id='".$_GET[id]."' ");
		$db->closedb ();

	////
 
 
 
 
copy ("../data/fileupload/store/edit_work/".$_GET[vc]."_small.jpg", "../data/fileupload/edit_work/".$_GET[vc]."_small.jpg" ); 
copy ("../data/fileupload/store/edit_work/".$_GET[vc]."_big.jpg", "../data/fileupload/edit_work/".$_GET[vc]."_big.jpg" ); 

unlink ("../data/fileupload/store/edit_work/".$_GET[vc]."_small.jpg" ); 
unlink ("../data/fileupload/store/edit_work/".$_GET[vc]."_big.jpg" ); 
	
	//// 
	
	
	}
	
	
	
	
	
	
	
	 
		
	?>
    <script>
	   setTimeout(function () {
		   
 window.location.href = "?name=booking&file=all"; //will redirect to your blog page (an ex: blog.html)
//  $("#login_logo").attr("src", "images/applogo.png");
 ///window.location.href = "index.php?newlogin=1"; //will redirect to your blog page (an ex: blog.html)
 ///window.location.href = "?name=booking&file=all"; //will redirect to your blog page (an ex: blog.html)
}, 3000); //w
 
	</script>
    
    <?	
		
}



?>










 <?

if($_GET[action]=='confirm'){
	
 
	
	/////
     $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('order_booking', array(

  
			  "status" => "CONFIRM",
			 
			 
			  "booking_edit" => "1", 
	 
         
 
            "update_date" => "" . TIMESTAMP . "",
		)," id='".$_GET[id]."' ");
		$db->closedb ();

	
	
	////
	
	
	
	 
		
	?>
    <script>
	   setTimeout(function () {
//  $("#login_logo").attr("src", "images/applogo.png");
 ///window.location.href = "index.php?newlogin=1"; //will redirect to your blog page (an ex: blog.html)
 ///window.location.href = "?name=booking&file=all"; //will redirect to your blog page (an ex: blog.html)
}, 1000); //w
 
	</script>
    
    <?	
		
}



?>







 <?

if($_GET[action]=='cancel'){
	
	/////
     $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('order_booking', array(

  
			  "status" => "CANCEL",
			 
			 
			  "booking_edit" => "1", 
	 
         
 
            "update_date" => "" . TIMESTAMP . ""
		)," id='".$_GET[id]."' ");
		$db->closedb ();

	
	
	////
	
	
 
		
	?>
    <script>
	   setTimeout(function () {
//  $("#login_logo").attr("src", "images/applogo.png");
 ///window.location.href = "index.php?newlogin=1"; //will redirect to your blog page (an ex: blog.html)
/// window.location.href = "?name=booking&file=all"; //will redirect to your blog page (an ex: blog.html)
}, 1000); //w
 
	</script>
    
    <?	
		
}



?>




 <?

if($_GET[action]=='topoint'){
	
	/////
     $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('order_booking', array(
 
			 "driver_topoint_lat" => "".$_GET[lat]."",
			  "driver_topoint_lng" => "".$_GET[lng]."",	
			 "driver_topoint_date" => "" . TIMESTAMP . "" ,
			 "driver_topoint" => "1",  
			  "booking_edit" => "1", 
   
 
            "update_date" => "" . TIMESTAMP . ""
		)," id='".$_GET[id]."' ");
		$db->closedb ();

	
	
	////
	
	
			
		////////////////
		
		
		 
 
  ////// สร้างไฟล์
$folder_xml="../data/xml";
$newvc = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<newvc>\n";
 
 
 
///$newvc .= "<id>".$arr[chatlast][id]."</id>\n";
$newvc .= "<status>1</status>\n";
$newvc .= "<time>".date("H:i:s")."</time>\n";
$newvc .= "<vc>".$_GET[vc]."</vc>\n"; 
$newvc .= "<id>".$_GET[id]."</id>\n"; 
$newvc .= "</newvc>";
 

@unlink("$folder_xml/taxi/status/topoint_new.xml");
@$fd = @fopen("$folder_xml/taxi/status/topoint_new.xml", "a+");
@fputs($fd, $newvc . "");
@fclose($fd);

		
 
	
	
 
		
	?>
    <script>
	   setTimeout(function () {
//  $("#login_logo").attr("src", "images/applogo.png");
 ///window.location.href = "index.php?newlogin=1"; //will redirect to your blog page (an ex: blog.html)
/// window.location.href = "?name=booking&file=all"; //will redirect to your blog page (an ex: blog.html)
}, 1000); //w
 
	</script>
    
    <?	
		
}

 
?>





 <?

if($_GET[action]=='pickup'){
	
	/////
     $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('order_booking', array(
 
			 "driver_'pickup_lat" => "".$_GET[lat]."",
			  "driver_'pickup_lng" => "".$_GET[lng]."",	
			 "driver_'pickup_date" => "" . TIMESTAMP . "" ,
			 "driver_'pickup" => "1",  
			  "booking_edit" => "1", 
   
 
            "update_date" => "" . TIMESTAMP . ""
		)," id='".$_GET[id]."' ");
		$db->closedb ();
 
	////
 	
	?>
    <script>
	   setTimeout(function () {
//  $("#login_logo").attr("src", "images/applogo.png");
 ///window.location.href = "index.php?newlogin=1"; //will redirect to your blog page (an ex: blog.html)
/// window.location.href = "?name=booking&file=all"; //will redirect to your blog page (an ex: blog.html)
}, 1000); //w
 
	</script>
    
    <?	
		
}

 
?>











 

 <?

if($_GET[action]=='complete'){
	
	/////
     $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('order_booking', array(
 
			 "driver_complete_lat" => "".$_GET[lat]."",
			  "driver_complete_lng" => "".$_GET[lng]."",	
			 "driver_complete_date" => "" . TIMESTAMP . "" ,
			 "driver_complete" => "1",  
			  "booking_edit" => "1", 
   
 
            "update_date" => "" . TIMESTAMP . ""
		)," id='".$_GET[id]."' ");
		$db->closedb ();
 
	////
 
		
		 
 
  ////// สร้างไฟล์
$folder_xml="../data/xml";
$newvc = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<newvc>\n";
 
 
 
///$newvc .= "<id>".$arr[chatlast][id]."</id>\n";
$newvc .= "<status>1</status>\n";
$newvc .= "<time>".date("H:i:s")."</time>\n";
$newvc .= "<vc>".$_GET[vc]."</vc>\n"; 
$newvc .= "<id>".$_GET[id]."</id>\n"; 
$newvc .= "</newvc>";
 

@unlink("$folder_xml/taxi/status/complete_new.xml");
@$fd = @fopen("$folder_xml/taxi/status/complete_new.xml", "a+");
@fputs($fd, $newvc . "");
@fclose($fd);

		
		
		
	?>
    <script>
	   setTimeout(function () {
//  $("#login_logo").attr("src", "images/applogo.png");
 ///window.location.href = "index.php?newlogin=1"; //will redirect to your blog page (an ex: blog.html)
/// window.location.href = "?name=booking&file=all"; //will redirect to your blog page (an ex: blog.html)
}, 1000); //w
 
	</script>
    
    <?	
		
}



?>

 






 
 
 
 
 
 
 
 
 
 
  <?

if($_GET[action]=='nation'){
	 
  /// invoice
 
 
 
 
 
 
 
     $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->add_db('guest_nation', array(
 
		"name" => "$_POST[remark]",
	 
	 
 
	 
 
        ));
        $db->closedb();
		
	?>
    <script>
	   setTimeout(function () {
//  $("#login_logo").attr("src", "images/applogo.png");
 ///window.location.href = "index.php?newlogin=1"; //will redirect to your blog page (an ex: blog.html)
 //window.location.href = "?name=booking&file=all"; //will redirect to your blog page (an ex: blog.html)
}, 1000); //w
 
	</script>
    
    <?	
		
}



?>
















 <?

if($_GET[action]=='payment'){
	/// echo $_GET[id];
	
	?>
 
    
    <? 
	
 
	
	/////
     $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('order_booking', array(
  
  			"driver_payment_date" => "" . TIMESTAMP . "",
			 "payment_status" => "1",  
			  "booking_edit" => "1", 
   
 
            "update_date" => "" . TIMESTAMP . ""
		)," id='".$_GET[id]."' ");
		$db->closedb ();
 
	////
 
		
		 
 
  ////// สร้างไฟล์
$folder_xml="../data/xml";
$newvc = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<newvc>\n";
 
 
 
///$newvc .= "<id>".$arr[chatlast][id]."</id>\n";
$newvc .= "<status>1</status>\n";
$newvc .= "<time>".date("H:i:s")."</time>\n";
$newvc .= "<vc>".$_GET[vc]."</vc>\n"; 
$newvc .= "<id>".$_GET[id]."</id>\n"; 
$newvc .= "<driver>".$user_id."</driver>\n"; 
$newvc .= "</newvc>";
 
 


@unlink("$folder_xml/taxi/payment/driver_".$user_id.".xml");
@$fd = @fopen("$folder_xml/taxi/payment/driver_".$user_id.".xml", "a+");
@fputs($fd, $newvc . "");
@fclose($fd);

		
		
		
	?>
    <script>
	   setTimeout(function () {
//  $("#login_logo").attr("src", "images/applogo.png");
 ///window.location.href = "index.php?newlogin=1"; //will redirect to your blog page (an ex: blog.html)
/// window.location.href = "?name=booking&file=all"; //will redirect to your blog page (an ex: blog.html)
}, 1000); //w
 
	</script>
    
    <?	
		
}



?>





  <?

if($_GET[action]=='receive'){

	
	?>
 
 
 
   <? 
	
 
	
	/////
     $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('order_booking', array(
  
  			"driver_payment_date" => "" . TIMESTAMP . "",
			 "payment_status" => "2",  
			  "booking_edit" => "1", 
  
            "update_date" => "" . TIMESTAMP . ""
		)," id='".$_GET[id]."' ");
		$db->closedb ();
 
	////
 
		
		 
 /*
  ////// สร้างไฟล์
$folder_xml="../data/xml";
$newvc = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<newvc>\n";
 
 
 
///$newvc .= "<id>".$arr[chatlast][id]."</id>\n";
$newvc .= "<status>1</status>\n";
$newvc .= "<time>".date("H:i:s")."</time>\n";
$newvc .= "<vc>".$_GET[vc]."</vc>\n"; 
$newvc .= "<id>".$_GET[id]."</id>\n"; 
$newvc .= "<driver>".$user_id."</driver>\n"; 
$newvc .= "</newvc>";
 
 


@unlink("$folder_xml/taxi/payment/driver_".$user_id.".xml");
@$fd = @fopen("$folder_xml/taxi/payment/driver_".$user_id.".xml", "a+");
@fputs($fd, $newvc . "");
@fclose($fd);

		*/
		
		
	?>
    <script>
 setTimeout(function () {
		   
 ///alert(88);
		   
//  $("#login_logo").attr("src", "images/applogo.png");
 ///window.location.href = "index.php?newlogin=1"; //will redirect to your blog page (an ex: blog.html)
/// window.location.href = "?name=booking&file=all"; //will redirect to your blog page (an ex: blog.html)
}, 1000); //w
 
	</script>
    
    <?	
		
}



?>
 
 
 
 
 
 
 
 
 
 