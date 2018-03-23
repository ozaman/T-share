<?php
mysql_query("SET NAMES utf8"); 
	mysql_query("SET character_set_results=utf-8");
	echo $_POST[time].$_POST[amount].$_POST[bank];
?>