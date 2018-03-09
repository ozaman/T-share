<?   
$webmail_port        = 465;                    // 端口
$webmail_host        = "223.223.218.85"; // SMTP server
$webmail_username    = "system@t-bookingcn.com";     // SMTP server username
$webmail_password    = "252631@MANbooking!@#$";            // SMTP server password 
 

$user_login=$_POST['newpassword'];
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[user] = $db->select_query("SELECT * FROM ".TB_driver." WHERE username='$user_login' ");
$arr[user] = $db->fetch($res[user]);
$arr[user][id];
 
 $name=$arr[user][name];
 $password=$arr[user][password];
 
$email=$arr[user][email];
///$email="tudtoojung@gmail.com";
?>


<? if(!$arr[user][id]){ ?>  
<div style="text-align:left; color:#FF0000; padding:5px; "><i class="fa fa-cog fa-spin 2x" ></i>ไม่พบผู้ใช้งาน กรุณาลองใหม่</div>

<? } ?>


<? if($arr[user][id]){ ?>  
<div style="text-align:left; color:#006699 ; padding:5px; "> <i class="fa fa-refresh fa-spin 2x" ></i>
ส่งรหัสผ่านไปทางอีเมล์ของคุณแล้ว
</div>

<?

 
require_once('../phpmail/class.phpmailer.php');

$mail             = new PHPMailer();

//////////////// ส่งเมล์


 

$body = "
<HTML>
<HEAD>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'><style type='text/css'>

body,td,th {
	font-size: 16px; 
	font-family:tahoma;
	color: #333333;
}
.style2 {
	font-size: 20px;
	color: #FF3366;
}
.style3 {
	color: #663399;
	font-size: 16px;
}
a {
	font-size: 16px;
	color: #FF9933;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}

</style></HEAD>
<BODY>
<table width='600' border='0' cellpadding='5' cellspacing='0'>
  <tr>
    <td class='style2'><b>สวัสดีคุณ : $name</span></td>
  </tr>
  <tr>
    <td>ข้อมูลสำหรับเข้าสู่ระบบของคุณคือ
      <table width='100%'  border='0' cellspacing='0' cellpadding='3'>
        <tr>
          <td width='150'>ชื่อผู้ใช้งาน</td>
          <td>$user_login</td>
        </tr>
        <tr>
          <td>รหัสผ่าน</td>
          <td>$password</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td>คุณสามารถเข้าสู่ระบบได้ที่นี่ <a href='http://t-booking.com/app_dv'>www.t-booking.com/app_dv</a></td>
  </tr>
</table>
</BODY>
</HTML>";




$mail->CharSet = "utf-8";
$mail->IsSMTP();                           // 启用SMTP
$mail->SMTPAuth    = true;                  // 启用SMTP认证
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host        = $webmail_host; // SMTP server
$mail->Port        = $webmail_port;                 // set the SMTP port for the GMAIL server
$mail->Username    = $webmail_username;     // SMTP server username
$mail->Password    = $webmail_password ;            // SMTP server password

 

$mail->SetFrom($webmail_username, 'Golden Beach Tour');
 
$mail->AddReplyTo($webmail_username,"Golden Beach Tour");



$mail->Subject    = "รหัสผ่านสำหรับ คุณ ".$name."  เพื่อเข้าสู่ระบบจัดการใบงานรถ";



$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test



$mail->MsgHTML($body);



$address = "$email";
 

$mail->AddAddress($address, "Golden Beach Tour");

 

 
	
 
 



if(!$mail->Send()) {

  echo "Mailer Error: " . $mail->ErrorInfo;

} else {

 
 

}
 
///////////////////
 
?>
<? } ?>

