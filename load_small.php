<?
date_default_timezone_set("Asia/Bangkok");
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
$db = New DB();


GETMODULE($_GET[name],$_GET[file]);
 include ("".$MODPATHFILE.""); 

?>