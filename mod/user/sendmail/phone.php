 
<div style="display:none">
 

<?





  ?>

 <?php
 
 
 
$sms = new thsms();
 
$sms->username   = 'deeday';
$sms->password   = '5265851';
 
$a = $sms->getCredit();
var_dump( $a);
 
$b = $sms->send( '0000', $_GET[phone], 'ทดสอบ');
var_dump( $b);
 
class thsms
{
     var $api_url   = 'http://www.thsms.com/api/rest';
     var $username  = null;
     var $password  = null;
 
    public function getCredit()
    {
        $params['method']   = 'credit';
        $params['username'] = $this->username;
        $params['password'] = $this->password;
 
        $result = $this->curl( $params);
 
        $xml = @simplexml_load_string( $result);
 
        if (!is_object($xml))
        {
            return array( FALSE, 'Respond error');
 
        } else {
 
            if ($xml->credit->status == 'success')
            {
                return array( TRUE, $xml->credit->status);
            } else {
                return array( FALSE, $xml->credit->message);
            }
        }
    }
 
    public function send( $from='0000', $to=null, $message=null)
    {
		
 
		
		
		$message='ชื่อผู้ใช้งาน : '.$_GET[username].'  รหัสผ่าน : '.$_GET[password].' ';
		
        $params['method']   = 'send';
        $params['username'] = $this->username;
        $params['password'] = $this->password;
 
        $params['from']     = $from;
        $params['to']       = $to;
        $params['message']  = $message;
 
        if (is_null( $params['to']) || is_null( $params['message']))
        {
            return FALSE;
        }
 
        $result = $this->curl( $params);
        $xml = @simplexml_load_string( $result);
        if (!is_object($xml))
        {
            return array( FALSE, 'Respond error');
        } else {
            if ($xml->send->status == 'success')
            {
                return array( TRUE, $xml->send->uuid);
            } else {
                return array( FALSE, $xml->send->message);
            }
        }
    }
     
    private function curl( $params=array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->api_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
        $response  = curl_exec($ch);
        $lastError = curl_error($ch);
        $lastReq = curl_getinfo($ch);
        curl_close($ch);
 
        return $response;
    }
}

 require_once("css/maincss.php")

?>


</div>

<div style=" font-size:24px;" ><center>ส่ง SMS ไปยังเบอร์มือถือ<br>
<?=$_GET[phone]?> สำเร็จ
</div>

<div style=" font-size:18px;" ><center>กรุณาตรวจสอบชื่อผู้ใช้งานและรหัสผ่านในมือถือของคุณ
</div>





<div style="padding:10px;">
 <button   class="btn btn-block " style="background-color:#17B3B2; color:#FFFFFF;margin-top:10px;"   id="btn_login_new_password"><center><i class="fa fa-sign-in" style=" font-size:24px;"  ></i><span style=" font-size:24px;">&nbsp;เข้าสู่ระบบ</span></center></button>

</div>




<script>
   $("#btn_login_new_password" ).click(function() {
 
   $("#alert_show_popup_password").hide(); 
   
   $("#alert_show_popup_login").show(); 
   
   
 
 
 
      });
  

</script>




