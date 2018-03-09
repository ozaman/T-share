 
<?php 
 
// Create connection
 
   $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME_CHAT);
 
 

// Check connection
if ($conn->connect_error) {
 
    die("Connection failed: " . $conn->connect_error);
} 
 
$vc=$_GET[vc];
 
 $voucherDB = "vc".$vc ;
$sql = "CREATE TABLE $voucherDB  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
   
  `voucher` varchar(20) NOT NULL,
  `orderid` varchar(20) NOT NULL,
  `admin_company` int(10) NOT NULL DEFAULT '1',
  `company` int(10) NOT NULL,
  `product` int(10) NOT NULL DEFAULT '0',
  `product_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',  
 
  
  `chat_id` int(10) NOT NULL,
  
   `server` varchar(20) NOT NULL,
  
  `post_date` varchar(20) NOT NULL,
  `post_by` varchar(20) NOT NULL,

 
  `time_h` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `time_m` varchar(2) COLLATE utf8_unicode_ci NOT NULL,

 
  `state_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  
  `drivername` int(10) NOT NULL,
 
  `latitude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,

  
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_trans` text COLLATE utf8_unicode_ci NOT NULL,
  
  `comment_from` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `comment_to` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `comment_id` int(10) NOT NULL, 
  
   `status_confirm` int(10) NOT NULL DEFAULT '0',
   `translate` int(1) NOT NULL DEFAULT '0',
 
  
     
  `reply_status` int(10) NOT NULL,
  `reply_to` int(10) NOT NULL,
  `reply_count` int(10) NOT NULL,
 
  
  
  `new_flight` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',  
  `ondate_new_flight` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `time_new_flight_h` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '', 
  `time_new_flight_m` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '', 
  
  `old_flight` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',  
  `ondate_old_flight` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '', 
  `time_old_flight_h` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '', 
  `time_old_flight_m` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '', 
  	
  `day_start` int(1) NOT NULL DEFAULT '0',
  `day_comment` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  
  
  `read_msg` int(10) NOT NULL DEFAULT '0',
  `read_msg_group` int(10) NOT NULL DEFAULT '0',
  
 
  
  KEY `id` (`id`),
  KEY `voucher` (`voucher`),
  KEY `orderid` (`orderid`,`admin_company`,`company`,`product`,`product_type`,`chat_id`,`server`,`post_date`,`post_by`,`time_h`,`time_m`,`state_type`,`drivername`,`latitude`,`longitude`),
  KEY `comment_from` (`comment_from`,`comment_to`,`comment_id`,`status_confirm`,`reply_status`,`reply_to`,`reply_count`,`new_flight`,`ondate_new_flight`,`time_new_flight_h`,`time_new_flight_m`,`ondate_old_flight`,`time_old_flight_h`,`time_old_flight_m`),
  KEY `day_start` (`day_start`,`day_comment`,`read_msg`,`read_msg_group`)
 
 
  
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    //print json_encode($rows);
    $result = $conn->query($sql);
 
 
 
?> 




<?php 
 
// Create connection
 
  
 
 

// Check connection
if ($conn_all->connect_error) {
    die("Connection failed: " . $conn_all->connect_error);
} 
 
 
 
 

$sql_all = "CREATE TABLE  `allchat` (
 
 
 
  `id` int(10) NOT NULL AUTO_INCREMENT,
   
  `voucher` varchar(20) NOT NULL,
  `orderid` varchar(20) NOT NULL,
  `admin_company` int(10) NOT NULL DEFAULT '1',
  `company` int(10) NOT NULL,
  `product` int(10) NOT NULL DEFAULT '0',
  `product_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',  
 
  
  `chat_id` int(10) NOT NULL,
  
   `server` varchar(20) NOT NULL,
  
  `post_date` varchar(20) NOT NULL,
  `post_by` varchar(20) NOT NULL,

 
  `time_h` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `time_m` varchar(2) COLLATE utf8_unicode_ci NOT NULL,

 
  `state_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  
  `drivername` int(10) NOT NULL,
 
  `latitude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,

  
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_from` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `comment_to` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `comment_id` int(10) NOT NULL, 
  
   `status_confirm` int(10) NOT NULL DEFAULT '0',
   `translate` int(1) NOT NULL DEFAULT '0',
 
 
     
  `reply_status` int(10) NOT NULL,
  `reply_to` int(10) NOT NULL,
  `reply_count` int(10) NOT NULL,
 
  
  `msg_driver_to_guest` int(10) NOT NULL,
  `msg_driver_to_agent` int(10) NOT NULL,
  `msg_driver_to_callcenter` int(10) NOT NULL,
  
  `msg_guest_to_driver` int(10) NOT NULL,
  `msg_guest_to_agent` int(10) NOT NULL,
  `msg_guest_to_callcenter` int(10) NOT NULL,
  
  `msg_callcenter_to_driver` int(10) NOT NULL,
  `msg_callcenter_to_agent` int(10) NOT NULL,
  `msg_callcenter_to_guest` int(10) NOT NULL,
  
  `msg_agent_to_driver` int(10) NOT NULL,
  `msg_agent_to_guest` int(10) NOT NULL,
  `msg_agent_to_callcenter` int(10) NOT NULL,
 
  
  `new_flight` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',  
  `ondate_new_flight` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `time_new_flight_h` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '', 
  `time_new_flight_m` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '', 
  
  `old_flight` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',  
  `ondate_old_flight` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '', 
  `time_old_flight_h` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '', 
  `time_old_flight_m` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '', 
  	
  `day_start` int(1) NOT NULL DEFAULT '0',
  `day_comment` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `read_msg` int(1) NOT NULL DEFAULT '0',
 
  

  PRIMARY KEY  (`id`),
  KEY `id` (`id`),
  KEY `voucher` (`voucher`),
  KEY `comment_from` (`comment_from`),
  KEY `comment_to` (`comment_to`),
  KEY `drivername` (`drivername`),
  KEY `state_type` (`state_type`),
 
  KEY `latitude` (`latitude`),
  KEY `longitude` (`longitude`)
 
  
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
    //print json_encode($rows);
    $result = $conn->query($sql_all);
 
 
 
?> 
 
 