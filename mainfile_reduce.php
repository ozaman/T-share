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
$keep = 'th';				
switch ($_COOKIE['lng']) {
    case "th":
        //echo "PAGE th";
        include("includes/lang/th/t_share_2.php"); //include check session DE
        $province           = "name_th";
        $place_shopping     = "topic_th";
        $google_map_api_lng = "th";
        $car_pax = "pax_th";
        break;
    case "cn":
        //echo "PAGE cn";
        include("includes/lang/cn/t_share_2.php");
        $province           = "name_cn";
        $place_shopping     = "topic_cn";
        $google_map_api_lng = 'zh-CN';
        $car_pax = "pax_cn";
        break;
    case "en":
        //echo "PAGE EN";
        include("includes/lang/en/t_share_2.php");
        $google_map_api_lng = "en";
        $place_shopping     = "topic_en";
        $province           = "name";
        $car_pax = "pax";
        break;
    default:
        //echo "PAGE EN - Setting Default";
        include("includes/lang/" . $keep . "/t_share_2.php"); //include EN in all other cases of different lang detection
        //        $google_map_api_lng = $keep;
        if($keep=="en"){
			$province           = "name";
			$car_pax = "pax";
		}else{
			$province           = "name_" . $keep;
			$car_pax = "pax". $keep;
		}
        
        $place_shopping     = "topic_" . $keep;
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
	die ("page not found...".$file);
	}
} 

require_once("includes/config.in.php");
require_once("includes/class.mysql.php");
require_once("includes/function.in.php");
$db = New DB();
$data_user_class = $_SESSION['data_user_class'];
$main_color = "#3b5998";
?>  