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
GETMODULE($_GET[name],$_GET[file]);
 include ("".$MODPATHFILE.""); 
 

?>