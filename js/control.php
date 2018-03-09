<? // include "google/check.php" ;	?>

 
 
<script src="js/sweet/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="js/sweet/dist/sweetalert.css?v=<?=time()?>">

<script src="js/tinybox/tinybox.js"></script>
<link rel="stylesheet" href="js/tinybox/style.css">

 
 
<script>












 /// check login
 
$("#submit_login").click(function(){ 
if(document.getElementById('loginusername').value=="") {
swal('กรุณากรอกชื่อผู้ใช้งาน'); 
document.getElementById('loginusername').focus() ; 
return false ;
}

if(document.getElementById('loginpassword').value=="") {
swal("กรุณากรอกรหัสผ่าน") ;
document.getElementById('loginpassword').focus() ;
 return false ;
}
 
 $.post('signin_check.php',$('#login_form').serialize(),function(response){
   $('#sendlogin').html(response);
  });
 });
 </script>
 <?php
$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
$thai_month_arr=array(
	"0"=>"",
	"1"=>"มกราคม",
	"2"=>"กุมภาพันธ์",
	"3"=>"มีนาคม",
	"4"=>"เมษายน",
	"5"=>"พฤษภาคม",
	"6"=>"มิถุนายน",	
	"7"=>"กรกฎาคม",
	"8"=>"สิงหาคม",
	"9"=>"กันยายน",
	"10"=>"ตุลาคม",
	"11"=>"พฤศจิกายน",
	"12"=>"ธันวาคม"					
);
function thai_date($time){
	global $thai_day_arr,$thai_month_arr;
	//$thai_date_return="วัน".$thai_day_arr[date("w",$time)];
	$thai_date_return.=	"วันที่ ".date("j",$time);
	$thai_date_return.="  ".$thai_month_arr[date("n",$time)];
	$thai_date_return.=	"  ".(date("Y",$time)+543);

	return $thai_date_return;
}








?>
 