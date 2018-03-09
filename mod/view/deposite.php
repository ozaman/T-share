<?
 if($arr[project][sever]== 'cn'){
$db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}else{
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}

 

$query = "SELECT SUM(total) FROM ".TB_deposit." where  group_vc='".$arr[project][invoice]."' "; 
 
$result = mysql_query($query) or die(mysql_error());
 
// Print out result 

while($row = mysql_fetch_array($result)){

$row['SUM(total)'];

 

$deposit= $row['SUM(total)'];

}
 
?>