<input type="hidden" name="" id="set_lng_cookies" value="<?=$_COOKIE['lng'];?>"> 
 <? 
 $get_lng = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
		    $get_lng = $get_lng[0];
			$check_lng_browser = explode('-', $get_lng);
			$check_lng_browser = $check_lng_browser[0];

				if($check_lng_browser == 'ch' or $check_lng_browser == 'zh' or $check_lng_browser == 'sh'){
				 	$keep = 'cn';
				}else if($check_lng_browser == 'th'){
				 	$keep = 'th';
				}else{
				 	$keep = 'en';
				}
switch ($_COOKIE['lng']){
    case "th":
        //echo "PAGE th";
        include("includes/lang/th/t_share_2.php");//include check session DE
        $province = "name_th";
        $place_shopping = "topic_th";
        $google_map_api_lng = "th";
        break;
    case "cn":
        //echo "PAGE cn";
        include("includes/lang/cn/t_share_2.php");
        $province = "name_cn";
        $place_shopping = "topic_cn";
        $google_map_api_lng = 'zh-CN';
        break;
    case "en":
        //echo "PAGE EN";
        include("includes/lang/en/t_share_2.php");
        $google_map_api_lng = "en";
        $place_shopping = "topic_en";
        $province = "name";
        break;        
    default:
        //echo "PAGE EN - Setting Default";
        include("includes/lang/".$keep."/t_share_2.php");//include EN in all other cases of different lang detection
        $google_map_api_lng = $keep;
        $province = "name_".$keep;
        $place_shopping = "topic_".$keep;
        $google_map_api_lng = $keep;
        break;
} 

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
$_SESSION['lang'] = "th";

include("includes/lang/".$_SESSION['lang']."/menu.php");
include("includes/lang/".$_SESSION['lang']."/profile.php");
include("includes/lang/".$_SESSION['lang']."/web.php");

/*
 $folder_xml="../data/xml";
//$folder_xml="/home/admin/domains/goldenbeachgroup.com/private_html/app/data_xml";

/*

require_once("../includes/config.in.php");

require_once("../includes/class.mysql.php");
require_once("../includes/function.in.php");


*/

$db = New DB();

?>
 
<?

$data_user_class=$_SESSION['data_user_class'];


//////// lab

if($data_user_class=='taxi'){
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
 $res[web_user] = $db->select_query("SELECT * FROM web_driver WHERE username='".$_SESSION['data_user_name']."'    "); 

$arr[web_user] = $db->fetch($res[web_user]);
 
}

 else {
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[web_user] = $db->select_query("SELECT * FROM web_user WHERE username='".$_SESSION['data_user_name']."'    "); 
$arr[web_user] = $db->fetch($res[web_user]);
 
}

 
$user_id =  $arr[web_user][id];  

$carnumber =  $arr[web_user][car_num];  
$user_name_th =  $arr[web_user][name]; 

$user_name_en =  $arr[web_user][name_en]; 

$user_car_use =  $arr[web_user][car_number_use]; 

$user_car_use_status =  $arr[web_user][status_usecar]; 

 
 
$user_id =  $_SESSION['data_user_id'];  
$carnumber =  $arr[web_user][car_num];  
 $chk_data_id =  $arr[web_user][id];
 
 
///////// driver detail
 $data_driver_name=$arr[web_user][name];
$data_driver_nickname=$arr[web_user][nickname];
$data_driver_phone=$arr[web_user][phone];

$data_user_class=$arr[web_user][user_class];

$user_class=$arr[web_user][user_class];



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
 
///  window.location.href = "logout.php"; //will redirect to your blog page (an ex: blog.html)
  </script>

<? } ?>
 

 
 
 <?
 
 
 include "css/color/".$data_user_class.".php"
	
 ?>
 
 
 <script>
 
 var load_main_icon_big="<div class='overlay' style='background-color:#FFFFFF; padding:15px;border: solid 1px #DADADA '><center> <i class='fa fa-circle-o-notch fa-spin 4x' style='font-size:100px; color:<?=$main_color_sorf?>; ' ></i> </center><br><font style='font-size:14px; color:#333333 ' ><center><?echo t_load_data?></center></font></div>";
 </script>
 
 
 
  <script>
 var load_main_icon_big='<center><div class="inner-loading"><center><span  class="navload"><i class="fa fa-circle-o-notch fa-spin 4x" style="font-size:40px; color:<?=$main_color?>; margin-top:20px " ></i></center></span><div style="font-size:14px; color:#333333; font-weight:normal;; margin-top:10px "><center> <?echo t_load_data?></center></div></div>';
</script>
 
 <script>
 var load_main_icon_big='<center><div class="inner-loading"><center><span  class="navload"><i class="fa fa-circle-o-notch fa-spin 4x" style="font-size:40px; color:<?=$main_color?>; margin-top:10px " ></i></center></span><div style="font-size:14px; color:#333333; font-weight:normal;; margin-top:10px "><center> <?echo t_load_data?></center></div></div>';
</script>
 
 
  <script>
 var load_main_icon_mini="<div style='top:0; left:0'><table width='100%'  border='0' cellspacing='0' cellpadding='0'><tr><td style='width:24px; '><i class='fa fa-refresh fa-spin 2x' style='font-size:22px; color:<?=$main_color_sorf?>; ' ></i> </td><td><font style='font-size:14px; color:#333333 ' ><?echo t_load_data?></center></font></td></tr></table></div> ";
 </script>
 
 
   <script>
 var load_main_icon_mod="<div style='top:0; left:0'><br><br><table width='100%'  border='0' cellspacing='0' cellpadding='0'><tr><td align='center' style='width:24px; '><i class='fa fa-refresh fa-spin 2x' style='font-size:60px; color:<?=$main_color_sorf?>; ' ></i> <br><font style='font-size:14px; color:#333333 ' ><?echo t_load_data?></center></font></td></tr></table></div> ";
 </script>
<?

 require_once("css/maincss.php");
?>  