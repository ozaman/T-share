<?
date_default_timezone_set("Asia/Bangkok");

if (eregi("mainfile.php",$PHP_SELF)) {
    Header("Location: index.php");
    die();
}
error_reporting(0);
 
function GETMODULE($name,$file){
	global $MODPATH, $MODPATHFILE ;
	if(!$name){$name = "index";}
	if(!$file){$file = "index";}
$modpathfile="mod/".$name."/".$file.".php";
///$modpathfile="mod/".$name."/".$file.".html";
if (file_exists($modpathfile)) {
	$MODPATHFILE = $modpathfile;
	$MODPATH = "mod/".$name."/";
	}else{
	die ("page not found...");
	}
} 
 
require_once("includes/config.in.php");
require_once("includes/class.mysql.php");
require_once("includes/function.in.php");





$folder_xml="D:\AppServ\www\golden\server\store\best\booking\app_demo\data_xml";


/*

require_once("../includes/config.in.php");

require_once("../includes/class.mysql.php");
require_once("../includes/function.in.php");


*/

$db = New DB();

?>
<?
if($_SESSION['data_user_name']){


$xml_load_driver =  $_SESSION['data_user_id']._.$_SESSION['data_user_name'];  
include("xml/driver.php");
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$user_id =  $_SESSION['data_user_id'];  
$carnumber =  $arr[web_user][car_num];  

///////// driver detail
$data_driver_name=$arr[web_user][name];
$data_driver_nickname=$arr[web_user][nickname];
$data_driver_phone=$arr[web_user][phone];

/////
 
 
///// หา sup
$res[web_sup] = $db->select_query("SELECT id,province FROM web_admin WHERE id='".$arr[web_user][company]."'    "); 
$arr[web_sup] = $db->fetch($res[web_sup]);

 $user_id =  $_SESSION['data_user_id']; 
 
 
	$res[driver_network] = $db->select_query("SELECT * FROM  contact_network WHERE province_name='".$arr[web_sup][province]."' and type='driver' ");
	$arr[driver_network] = $db->fetch($res[driver_network]);
$network_company=$arr[driver_network] [id]; 
 $arr[driver_network] [company];

	$res[callcenter_network] = $db->select_query("SELECT * FROM  contact_network WHERE company='".$arr[driver_network] [company]."' and type='callcenter' ");
	$arr[callcenter_network] = $db->fetch($res[callcenter_network]);

//////// หาจำนวนเมนู

$user_zello=$arr[driver_network] [id_zello]; 
$callcenter_zello=$arr[callcenter_network] [id_zello]; 

$my_phone=$db->num_rows('contact_phone_driver',"id","driver_id='".$user_id."'  "); 






  
if($_SESSION['data_user_password']<>$arr[web_user] [password]){ ?> 
 
 <script>
  window.location.href = "logout.php"; //will redirect to your blog page (an ex: blog.html)
  </script>

<? } ?>
<?
}
?>
