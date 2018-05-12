<?php 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[order_book_detail] = $db->select_query("SELECT * FROM order_booking where transfer_date = '".$_POST[date]."' ");
while($arr[order_book_detail] = $db->fetch($res[order_book_detail])){ 
	echo $arr[order_book_detail][id]."<br/>";
}
?>
<br/><?=$_POST[date];?>