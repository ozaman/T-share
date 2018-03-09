<?



$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD); 
 
$res[admin] = $db->select_query("SELECT * FROM  web_driver WHERE id='".$_GET[id]."'  "); 
 
 $arr[admin] = $db->fetch($res[admin]);

 
 



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
      <td><strong>ชื่อจริง</strong></td>
      <td>".$arr[admin][name]."</td>
    </tr>
  
    <tr>
      <td width=160><strong>ชื่อผู้ใช้งาน</strong></td>
      <td>".$arr[admin][username]."</td>
    </tr>
    <tr>
      <td><strong>รหัสผ่าน</strong></td>
      <td>".$arr[admin][password]."</td>
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
 
$mail->SetFrom("system@welovetaxi.com", 'We Love Taxi : เพื่อบ้านเรา');
 
$mail->AddReplyTo("system@welovetaxi.com", 'We Love Taxi : เพื่อบ้านเรา');


$mail->Subject    = "แจ้งรหัสผ่านของคุณ ".$arr[admin][name]."";
 
$mail->AltBody    = "มีงานใหม่เข้ามา กรุณาตรวจสอบ"; // optional, comment out and test

//copy ("".$emailurl."/empty_style.php?name=admin/voucheremail/send&file=file_send_vc&no=".$_POST[vcno]."&order=".$_POST[order]."&code=".$_POST[code]."&invoice=".$_POST[invoice]."&type=".$_POST[type]."&airport=".$_POST[airport]."&detail=".$_POST[detail]."" ,"data/html/vc/".$_POST[refno]."_new.html" );

$mail->MsgHTML($body);
 
// $mail->MsgHTML(file_get_contents("data/html/vc/".$_POST[refno]."_new.html"));



 

 // $address2 = "chokdee.welovetaxi@gmail.com";

  //$address2 = "tudtoojung@gmail.com";
 
///$address = "chokdee@welovetaxi.com";

///$address = "tudtoojung@gmail.com";


$mail->AddAddress($arr[admin][email], "welovetaxi.com");
 // $mail->AddAddress($address2, "welovetaxi.com");
 
              
if(!$mail->Send()) {

  echo "Mailer Error: " . $mail->ErrorInfo;

} else {
	
	?>
 

<div class="font-26"><center>ส่งรหัสผ่านไปยังอีเมล์<br>
<?=$arr[admin][email]?> สำเร็จ
</div>

<?  

// echo "<meta http-equiv=refresh content=2;URL=.?name=admin&amp;file=booking&amp;op=bookagent_edit&amp;view=view&amp;id=".$_POST[order].">";
 
}

 


 
///////////////////



 




?>

