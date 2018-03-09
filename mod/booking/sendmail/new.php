<?

//error_reporting(E_ALL);

//error_reporting(E_STRICT);
 
require_once('phpmail/class.phpmailer.php');

$mail   = new PHPMailer();
 
//////////////// ส่งเมล์
 // $_POST[name]="โชคดี";
 
 
$body = "<style type=text/css>
body,td,th {
	font-size: 18px;
}
</style>
 
 
 
 
<table width=100% border=0 cellspacing=5 cellpadding=5>
  <tbody>
    <tr>
      <td width=160><strong>หมายเลขจอง</strong></td>
      <td>S$member_in</td>
    </tr>
    <tr>
      <td><strong>วันที่</strong></td>
      <td>$_POST[transfer_date_new]</td>
    </tr>
    <tr>
      <td><strong>เวลาถึง</strong></td>
      <td>$_POST[airout_h]:$_POST[airout_m]</td>
    </tr>
	
	
    <tr>
      <td><strong>จำนวนแขก</strong></td>
      <td>ผู้ใหญ่ $_POST[adult] เด็ก $_POST[child]</td>
    </tr>
	

	
     <tr>
      <td><strong>ชื่อเจ้าของรถ</strong></td>
      <td>$_POST[namedriver]</td>
    </tr>
	
	     <tr>
      <td><strong>ข้อมูลรถ</strong></td>
      <td>รถ $_POST[car_type] สี$_POST[car_color]  ทะเบียน $_POST[car_plate]</td>
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


$mail->Subject    = "มีงานใหม่เข้ามา กรุณาตรวจสอบ";
 
$mail->AltBody    = "มีงานใหม่เข้ามา กรุณาตรวจสอบ"; // optional, comment out and test

//copy ("".$emailurl."/empty_style.php?name=admin/voucheremail/send&file=file_send_vc&no=".$_POST[vcno]."&order=".$_POST[order]."&code=".$_POST[code]."&invoice=".$_POST[invoice]."&type=".$_POST[type]."&airport=".$_POST[airport]."&detail=".$_POST[detail]."" ,"data/html/vc/".$_POST[refno]."_new.html" );

$mail->MsgHTML($body);
 
// $mail->MsgHTML(file_get_contents("data/html/vc/".$_POST[refno]."_new.html"));



 

 // $address2 = "chokdee.welovetaxi@gmail.com";

  //$address2 = "tudtoojung@gmail.com";
 
///$address = "chokdee@welovetaxi.com";

$address = "tudtoojung@gmail.com";


$mail->AddAddress($address, "T Share : ทีแชร์");
 // $mail->AddAddress($address2, "welovetaxi.com");
 
              
if(!$mail->Send()) {

  echo "Mailer Error: " . $mail->ErrorInfo;

} else {
	

echo " <center><center>" ;	

// echo "<meta http-equiv=refresh content=2;URL=.?name=admin&amp;file=booking&amp;op=bookagent_edit&amp;view=view&amp;id=".$_POST[order].">";
 
}

 


 
///////////////////



 




?>

