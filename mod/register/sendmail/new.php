<?

//error_reporting(E_ALL);

//error_reporting(E_STRICT);


require_once('phpmail/class.phpmailer.php');

$mail             = new PHPMailer();
 
//////////////// ส่งเมล์
 // $_POST[name]="โชคดี";
 
	
 
$body = "<style type=text/css>
body,td,th {
	font-size: 14px;
}
</style>

 

 
<table width=100% border=0 cellspacing=5 cellpadding=5>
  <tbody>
    <tr>
      <td width=80><strong>ชื่อ</strong></td>
      <td>$_POST[name]</td>
    </tr>
    <tr>
      <td><strong>โทรศัพท์</strong></td>
      <td><a href=tel:$_POST[phone]>$_POST[phone]</a></td>
    </tr>
    <tr>
      <td><strong>ชื่อเข้าระบบ</strong></td>
      <td>$provincecode$member_in</td>
    </tr>
    <tr>
      <td><strong>รหัสผ่าน</strong></td>
      <td>$password</td>
    </tr>
  </tbody>
</table>";

//<img src=$emailurl/data/img/vc/$vc.jpg  />
/////
/*
$mail->CharSet = "utf-8";
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.yourdomain.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)


                                           // 1 = errors and messages
                                           // 2 = messages only
										   
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "tourbookingsystem@gmail.com";  // GMAIL username
$mail->Password   = "3440300965!@#$";            // GMAIL password 
*/
$mail->CharSet = "utf-8";
$mail->IsSMTP();                           // 启用SMTP
$mail->SMTPAuth    = true;                  // 启用SMTP认证
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host        = "mail.welovetaxi.com"; // SMTP server
$mail->Port        = 465;                 // set the SMTP port for the GMAIL server
$mail->Username    = "system@welovetaxi.com";     // SMTP server username
$mail->Password    = "system2017" ;            // SMTP server password 
 
$mail->SetFrom("system@welovetaxi.com", 'T Share : ทีแชร์');
 
$mail->AddReplyTo("system@welovetaxi.com", 'T Share : ทีแชร์');


$mail->Subject    = "คุณ $_POST[name] สมัครเข้ามาใหม่ กรุณาตรวจสอบ";
 
$mail->AltBody    = "คุณ $_POST[name] สมัครเข้ามาใหม่ กรุณาตรวจสอบ"; // optional, comment out and test

//copy ("".$emailurl."/empty_style.php?name=admin/voucheremail/send&file=file_send_vc&no=".$_POST[vcno]."&order=".$_POST[order]."&code=".$_POST[code]."&invoice=".$_POST[invoice]."&type=".$_POST[type]."&airport=".$_POST[airport]."&detail=".$_POST[detail]."" ,"data/html/vc/".$_POST[refno]."_new.html" );

$mail->MsgHTML($body);
 
//$mail->MsgHTML(file_get_contents("data/html/vc/".$_POST[refno]."_new.html"));






$address = "chokdee@welovetaxi.com";

$address2 = "chokdee.welovetaxi@gmail.com";
 
 $address3 = "tudtoojung@gmail.com";

$mail->AddAddress($address, "T Share : ทีแชร์");
$mail->AddAddress($address2, "T Share : ทีแชร์");
$mail->AddAddress($address3, "T Share : ทีแชร์");




$filetoattac="../data/pic/driver/small/".$arr[web_driver_edit][username].jpg."";
 

$mail->AddAttachment( $filetoattach , 'driver.jpg' );

 
              
if(!$mail->Send()) {

  echo "Mailer Error: " . $mail->ErrorInfo;

} else {
	

echo " <center><center>" ;	

// echo "<meta http-equiv=refresh content=2;URL=.?name=admin&amp;file=booking&amp;op=bookagent_edit&amp;view=view&amp;id=".$_POST[order].">";
 

}

 


 
///////////////////











?>

