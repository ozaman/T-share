<?php 
 
// Create connection
 

 
 
	
  $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME_CHAT);
 
 

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 
 
 
 $voucherDB = "vcsss_".$_GET[vc];
$sql2 = "CREATE TABLE  `".$voucherDB."` (
  `voucher` int(20) NOT NULL,
  `orderid` int(50) NOT NULL,  
  `admin_company` int(10) NOT NULL,
  `company` int(10) NOT NULL,  
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `flight_delay` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `flight_delay_date` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `time_h` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `time_m` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,  
  `guest_topoint` int(5) NOT NULL DEFAULT '0',
  `guest_topoint_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `driver_confirm_guest_topoint_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img_post_date` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `yourself_post_date` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `state_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `driver_confirm_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `driver_complete_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `driver_pickup_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_from` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment_to` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `drivername` int(10) NOT NULL,
  `count_driver` int(10) NOT NULL,
  `count_service` int(10) NOT NULL,
  `count_op` int(10) NOT NULL,
  `add_service` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cost_service` int(10) NOT NULL,
  `translate` int(1) NOT NULL DEFAULT '0',
  `list` tinyint(2) NOT NULL DEFAULT '0',
  `status_confirm` int(10) NOT NULL DEFAULT '0',
  `read_msg` int(1) NOT NULL DEFAULT '0',
  `new_flight` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ondate_new_flight` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `product` int(10) NOT NULL DEFAULT '0',
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `comment_id` int(10) NOT NULL,
  `msg_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `state_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `day_start` int(1) NOT NULL DEFAULT '0',
  `day_comment` varchar(12) COLLATE utf8_unicode_ci NOT NULL,  
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `voucher` (`voucher`),
  KEY `comment_from` (`comment_from`),
  KEY `comment_to` (`comment_to`),
  KEY `drivername` (`drivername`),
  KEY `state_type` (`state_type`),
  KEY `msg_type` (`msg_type`),
  KEY `status_confirm` (`status_confirm`),
  KEY `flight_delay_date` (`flight_delay_date`),
  KEY `latitude` (`latitude`),
  KEY `longitude` (`longitude`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    //print json_encode($rows);
    $result = $conn->query($sql2);
 
 
 
?> 
 
 
 <?php
$servername = "localhost";
$username = "root";
$password = "5265851";
$dbname = "admin_chat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE vb (
id int(20) NOT NULL AUTO_INCREMENT,
  flight_delay varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  flight_delay_date varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  voucher int(100) NOT NULL,
  guest_topoint int(5) NOT NULL DEFAULT '0',
  guest_topoint_date varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  driver_confirm_guest_topoint_date varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  img_post_date varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  yourself_post_date varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  state varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  state_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  driver_confirm_date varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  driver_complete_date varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  driver_pickup_date varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  latitude varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  longitude varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  orderid int(50) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  comment_from varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  comment_to varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  drivername int(10) NOT NULL,
  count_driver int(10) NOT NULL,
  count_service int(10) NOT NULL,
  count_op int(10) NOT NULL,
  time_h varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  time_m varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  add_service varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  cost_service int(10) NOT NULL,
  translate int(1) NOT NULL DEFAULT '0',
  `list` tinyint(2) NOT NULL DEFAULT '0',
  status_confirm int(10) NOT NULL DEFAULT '0',
  read_msg int(1) NOT NULL DEFAULT '0',
  new_flight varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  ondate_new_flight varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  product int(10) NOT NULL DEFAULT '0',
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  comment_id int(10) NOT NULL,
  msg_type varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  state_type varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  day_start int(1) NOT NULL DEFAULT '0',
  day_comment varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  admin_company int(10) NOT NULL,
  company int(10) NOT NULL,
  PRIMARY KEY (id),
  KEY id (id),
  KEY voucher (voucher),
  KEY comment_from (comment_from),
  KEY comment_to (comment_to),
  KEY drivername (drivername),
  KEY state_type (state_type),
  KEY msg_type (msg_type),
  KEY status_confirm (status_confirm),
  KEY flight_delay_date (flight_delay_date),
  KEY latitude (latitude),
  KEY longitude (longitude)
) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>