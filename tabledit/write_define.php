<?php
include('../includes/class.mysql.php');
$db = New DB();
$db->connectdb('admin_app','admin_MANbooking','252631MANbooking');

$start_php = "<?php ";
$end_php = " ?> ";
$n = " \n";
$ii = 2 ;

$array_lng = array("en","th","cn");
//$lng[en] .= $start_php;
//$lng[th] = "";
//$lng[cn] = "";

//$lng[en] .= $n;
foreach($array_lng as $val){
	$lng[$val] .= $start_php;
	$lng[$val] .= $n;
}

/*$en_df .= $start_php;
$th_df .= $start_php;
$cn_df .= $start_php;*/
mysql_query("SET NAMES UTF8"); 
mysql_query("SET character_set_results=utf-8"); 
$res[project] = $db->select_query("SELECT * FROM app_language where deleted = '0' ");
while($arr[project] = $db->fetch($res[project])){ 


//echo $aaasss = $ii.' define("'.$arr[project][topic].'","'.$arr[project][topic_jp].'"); <br />';

/*$en = 'define("'.$arr[project][keyword].'","'.$arr[project][en].'"); ';
$en .= $n;
$en_df .= $en;

$th = 'define("'.$arr[project][keyword].'","'.$arr[project][th].'"); ';
$th .= $n;
$th_df .= $th;

$cn = 'define("'.$arr[project][keyword].'","'.$arr[project][cn].'"); ';
$cn .= $n;
$cn_df .= $cn;*/

foreach($array_lng as $val){
	$en = 'define("'.$arr[project][keyword].'","'.$arr[project][$val].'"); ';
	$en .= $n;
	$lng[$val] .= $en;
}

$ii++;
  } 



/*$en_df .= $end_php;
$th_df .= $end_php;
$cn_df .= $end_php;*/

foreach($array_lng as $val){
	$lng[$val] .= $end_php;
	
	$path = "../includes/lang/".$val."/t_share_2.php";
	$file = fopen($path,"w");
	echo fwrite($file,$lng[$val]);
	fclose($file);
	
}


//$file = fopen("modules/translate_jp--/test_export.php","w");
//echo fwrite($file,$aaaaa);
//fclose($file);

echo print_r($lng);

?>