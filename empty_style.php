<?
session_start();
require_once("mainfile.php");
$PHP_SELF = "empty_style.php";
GETMODULE($_GET[name],$_GET[file]);
 
?>
<HTML>
<HEAD>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
 
</head>
 
 
<body  >

<!-- Content -->
<? include ("".$MODPATHFILE."");?>
<!-- End Content -->



</body>
</html>
