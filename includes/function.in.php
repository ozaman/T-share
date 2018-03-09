<?

//Cartype Transfer

function Load_car_report($server = "",$db = ""){
//
	global $db ;
	
if($db=='th'){
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}
if($db=='cn'){
$db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}
 
$select_order="id,invoice,program,orderid,transfer_date,pickup_place,to_place,carno,drivername,air,airin_time,airout_time,driver_remark,total";

$res[update] = $db->select_query("SELECT *  FROM ".TB_order."  where drivername='".$user_id."' and  transfer_date >= '".$_GET[day]."'  order by transfer_date  limit 30");
while($arr[update] = $db->fetch($res[update])){
$db->update_db(TB_transfer_report_all,array( 
 		"total"=>$arr[update] [total] , 
 		"remark"=>$arr[update] [remark] ,
 		"pickup_place"=>$arr[update] [pickup_place] ,
		"to_place"=>$arr[update] [to_place] ,		
		 
		"airin_time"=>$arr[update] [airin_time] ,
		"airout_time"=>$arr[update] [airout_time] ,				
		"orderid"=>$arr[update] [orderid], 		
		
		"server"=>$arr[update] [orderid], 		
		
		)," invoice='".$arr[update] [invoice]."' ");

 }
 
  //
}
  
/////////////////












//Cartype Transfer

function CheckCartypeTransfer($car_id = ""){

	global $db ;

	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

	
	$res[product] = $db->select_query("SELECT * FROM ".TB_transferproduct." WHERE id='$car_id'   ");

	$arr[product] = $db->fetch($res[product]);
	
	$res[user] = $db->select_query("SELECT * FROM ".TB_car." WHERE id='".$arr[product][cartype]."'   ");

	$arr[user] = $db->fetch($res[user]);

 

		if($arr[product][type] == 'Private'){
			$t_Private = "  ".$arr[product][type]." ".$arr[user][topic_en]." ".$arr[user][pax];
		}else{
			$t_Private = "   ".$arr[user][topic_en]." ";
		}
		
		echo $arr[product][topic_en]." ".$t_Private ;

 

 

}

//Cartype Transfer  RES

function CheckCartypeTransfer_res($car_id = ""){

	global $db ;

	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

	
	$res[product] = $db->select_query("SELECT * FROM ".TB_transferproduct." WHERE id='$car_id'   ");

	$arr[product] = $db->fetch($res[product]);
	
	$res[user] = $db->select_query("SELECT * FROM ".TB_car." WHERE id='".$arr[product][cartype]."'   ");

	$arr[user] = $db->fetch($res[user]);

 

		if($arr[product][type] == 'Private'){
			$t_Private = "  ".$arr[product][type]." ".$arr[user][topic_en]." ".$arr[user][pax];
			$t_Private_cn = "  ".$arr[user][topic_cn]." ".$arr[user][pax_cn];
		}else{
			$t_Private = "   ".$arr[user][topic_en]." ";
			$t_Private_cn = "   ".$arr[user][topic_cn]." ";
		}
		
		echo $arr[product][topic_en]." ".$t_Private." - ".$arr[product][topic_cn]." ".$t_Private_cn."" ;

 

 

}
// ตรวจสอบบุคกิ้งซ้ำ

function Checkbooking_double($booking = ""){

	global $db ;

	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

	$res[book] = $db->select_query("SELECT * FROM ".TB_order." WHERE booking_realtime='$booking'");

	$arr[book] = $db->fetch($res[book]);

	if($arr[book][id]){

		echo "<script language='javascript'>" ;

		echo "alert('System record data complete...')" ;

		echo "</script>" ;

		echo "<script language='javascript'>javascript:history.go(-1)</script>";

		exit();

	}

}

 

//ตรวจสอบ vc

function Checkvcsub($vc =""){

	global $db ;

	global $db ;

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

$res[user] = $db->select_query("SELECT * FROM ".TB_admin." WHERE username='".$_SESSION['admin_user']."' ");

$arr[user] = $db->fetch($res[user]);

	

$adminlevel= $arr[user][level];

$adminid= $arr[user][id];

$admincompany= $arr[user][id];



$booking = $db->num_rows(TB_order,"id"," id=".$vc." and company=".$admincompany." ");

	

	if($adminlevel==3){

$admincompany= $arr[user][postby];

$booking = $db->num_rows(TB_order,"id"," id=".$vc." and company=".$admincompany." ");

}

///// alert

	if($adminlevel < 5 and $adminlevel > 2 and $booking < 1 ){

	$PermissionFalse;

		echo "<script language='javascript'>" ;

		echo "alert('You are not owner booking')" ;

		echo "</script>" ;

		echo "<script language='javascript'>javascript:history.go(-1)</script>";

		exit();

	}



}















//ตรวจสอบ vc

function Checkvc($vc =""){

	global $db ;

	global $db ;

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

$res[user] = $db->select_query("SELECT * FROM ".TB_admin." WHERE username='".$_SESSION['admin_user']."' ");

$arr[user] = $db->fetch($res[user]);

	

$adminlevel= $arr[user][level];

$adminid= $arr[user][id];

$admincompany= $arr[user][id];



$booking = $db->num_rows(TB_order,"id"," id=".$vc." and agent=".$admincompany." ");

	

	if($adminlevel==1){

$admincompany= $arr[user][postby];

$booking = $db->num_rows(TB_order,"id"," id=".$vc." and agent=".$admincompany." ");

}

///// alert

	if($adminlevel < 3 and $booking < 1 ){

		echo "<script language='javascript'>" ;

		echo "alert('You are not owner booking')" ;

		echo "</script>" ;

		echo "<script language='javascript'>javascript:history.go(-1)</script>";

		exit();

	}



}





//ตรวจสอบ booking

function Checkbooking($rsvn =""){

	global $db ;

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

$res[user] = $db->select_query("SELECT * FROM ".TB_admin." WHERE username='".$_SESSION['admin_user']."' ");

$arr[user] = $db->fetch($res[user]);

	

$adminlevel= $arr[user][level];

$adminid= $arr[user][id];

$admincompany= $arr[user][id];



$booking = $db->num_rows(TB_book_agent,"id"," id=".$rsvn." and agent=".$adminid." ");

	

	if($adminlevel==1){

$admincompany= $arr[user][postby];

$booking = $db->num_rows(TB_book_agent,"id"," id=".$rsvn." and bookid=".$adminid." ");

}

///// alert

	if($adminlevel < 3 and $booking < 1 ){

		echo "<script language='javascript'>" ;

		echo "alert('You are not owner booking')" ;

		echo "</script>" ;

		echo "<script language='javascript'>javascript:history.go(-1)</script>";

		exit();

	}











}











//ตรวจสอบระดับการเข้าเพจ

function CheckAdminpage($user = "", $pwd =""){

	global $db ;

	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

	$res[user] = $db->select_query("SELECT * FROM ".TB_ADMIN." WHERE username='$user' AND password='$pwd' ");

	$arr[user] = $db->fetch($res[user]);

	if($arr[user][level] < 8){

		echo "<script language='javascript'>" ;

		echo "alert('You are not administrator.')" ;

		echo "</script>" ;

		echo "<script language='javascript'>javascript:history.go(-1)</script>";

		exit();

	}

}











//ตรวจสอบระดับการใช้งาน

function CheckAdminlevel($user = "", $pwd =""){

	global $db ;

	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

	$res[user] = $db->select_query("SELECT id FROM ".TB_ADMIN." WHERE username='$user' AND password='$pwd' ");

	$arr[user] = $db->fetch($res[user]);

	if(!$arr[user][id]){

		echo "<script language='javascript'>" ;

		echo "alert('You are not administrator.')" ;

		echo "</script>" ;

		echo "<script language='javascript'>javascript:history.go(-1)</script>";

		exit();

	}

}













//News Icon

function NewsIcon($Ntime="", $Otime="", $Icon=""){

	if(TIMESTAMP <= ($Otime + 86400)){

		echo "<IMG SRC=\"".$Icon."\" BORDER=\"0\" ALIGN=\"absmiddle\"> ";

	}

}



//ฟังก์ชั่นในการลบตัว \ ออกเพื่อให้แสดงผลได้ถุกต้อง

function FixQuotes ($what = "") {

        $what = ereg_replace("'","''",$what);

        while (eregi("\\\\'", $what)) {

                $what = ereg_replace("\\\\'","'",$what);

        }

        return $what;

}



//ฟังก์ชั่นเปลี่ยนข้อความเว็บและเมล์ให้เป็นลิงก์ 

function CHANGE_LINK($Message = ""){

	$Message = eregi_replace("([[:alnum:]]+)://([^[:space:]]*)([[:alnum:]#?/&=])","<a href=\"\\1://\\2\\3\" target=\"_blank\">\\1://\\2\\3</a>",$Message);

	$Message = eregi_replace("([[:alnum:]]+)@([^[:space:]]*)([[:alnum:]])","<a href=mailto:\\1@\\2\\3>\\1@\\2\\3</a>",$Message); 

return ($Message);

}



//ทำการแบ่งหน้า

function SplitPage($page="",$totalpage="",$option=""){

	global $ShowSumPages , $ShowPages ;

	// สร้าง link เพื่อไปหน้าก่อน-หน้าถัดไป

	$ShowSumPages .= "";

	if($page>1 && $page<=$totalpage) {

		$prevpage = $page-1;

		$ShowSumPages .= "<a class='pgnavi' href='".$option."&page=$prevpage' title='ย้อนกลับ'><font size='2' color='#FFFFFF'><b/>".button_back."</a>\n";

	}

	$ShowSumPages .= " ";

	if($page!=$totalpage) {

		$nextpage = $page+1;

		if($nextpage >= $totalpage){

			$nextpage = $totalpage ;

		}

		$ShowSumPages .= "<a class='pgnavi' href='".$option."&page=$nextpage' title='หน้าถัดไป'><font size='2' color='#FFFFFF'>".button_next."</a>\n";

	}



	// วนลูปแสดงเลขหน้าทั้งหมด แบบเป็นช่วงๆ ช่วงละ 10 หน้า

	$b=floor($page/20); 

	$c=(($b*20));



	if($c>1) {

		$prevpage = $c-1;

	}

	$ShowPages .= "";

	for($i=$c; $i<$page ; $i++) {

		if($i>0)

$ShowPages .= "<a class='mynavi' href='".$option."&page=$i'>$i</a> \n";

	}

$ShowPages .= "<a class='mynavi2' >$i</a> \n";

	for($i=($page+1); $i<($c+20) ; $i++) {

		if($i<=$totalpage)

		$ShowPages .= "<a class='mynavi' href='".$option."&page=$i'>$i</a> \n";

	}

	$ShowPages .= "</b> ";

	if($c>=0) {

		if(($c+2)<$totalpage){

	$nextpage = $c+20;

	$ShowPages .= "<a href='".$option."&page=$nextpage' title='10 หน้าถัดไป'></a> \n";

		}

		else

	$ShowPages .= "";

	}

	else{

		$ShowPages .= "<B>>></B>\n";

	}

	echo "";

}



//ฟังก์ชันตัดข้อความตามจำนวนตัวอักษรที่กำหนด (Goragod.com,modify by Narongrit.net)

function cutstring($str, $len) {

  if (strlen($str)<=$len) return $str;

  else return sprintf("%.".$len."s...", $str);

}



//Function Sendmail

function SendMail($charset="",$to="",$tocc="",$from="",$subject="",$topic=""){

	/* message */

	$message = "

	<html>

	<head>

	<title>".$subject."</title>

	</head>

	<body>

	".$topic."

	









</body>

	</html>

	";



	/* To send HTML mail, you can set the Content-type header. */

	$headers  = "MIME-Version: 1.0\r\n";

	$headers .= "Content-type: text/html; charset=".$charset."\r\n";



	/* additional headers */

	$headers .= "To: ".$to."\r\n";

	$headers .= "From: ".$from."\r\n";

	$headers .= "Cc: ".$tocc."\r\n";



	/* and now mail it */

	if(@mail($to, $subject, $message, $headers)){

		return true ;

	}else{

		return false ;

	}

}



 



//echo $_SESSION['timezone'];

function ThaiTimeConvert($timestamp="",$full="",$showtime=""){

	global $SHORT_MONTH, $FULL_MONTH, $DAY_SHORT_TEXT, $DAY_FULL_TEXT;

	



	

//echo $_SESSION['timezone'];



	///////////////

//แปลงเวลาเป็นภาษาไทย

if($_SESSION['timezone']=="Thailand"){

$_SESSION['timezone']=="Thailand";

$allzone=25200;}

if($_SESSION['timezone']=="China"){

$_SESSION['timezone']=="China";

$allzone=28800;}



if(!$_SESSION['timezone']){

$_SESSION['timezone']=="Thailand";

$allzone=25200;}







	

	

	$day = date("l",$timestamp+$allzone);
	$month = date("m",$timestamp+$allzone);
	$year = date("Y",$timestamp+$allzone);
	$time = date("H:i:s",$timestamp+$allzone);
	$times = date("H:i",$timestamp+$allzone);

/*
	if($full){
		$ThaiText = date("j",$timestamp+$allzone)." &nbsp;".$FULL_MONTH[$month]."&nbsp;".($year) ;
	}else{
		$ThaiText = date("j",$timestamp+$allzone)."  ".$SHORT_MONTH[$month]."  ".($year);
	}
	if($showtime == "1"){
		return $ThaiText." <font color=#0066CC><br>".$time;
	}
	if($showtime == "3"){
		return $ThaiText." <font color=#FF0000>".$time;
	}
	else if($showtime == "2"){
		$ThaiText = date("j",$timestamp)." ".$SHORT_MONTH[$month]." ".($year);
		return $ThaiText." : ".$times;
	}else{
		return $ThaiText;
	}
	*/
	if($full){
		$ThaiText = ($year)."-".$month."-".date("j",$timestamp+$allzone) ;
	}else{
		$ThaiText = ($year)."-".$month."-".date("j",$timestamp+$allzone) ;
	}
		if($showtime == "short"){
		return  "".$times."";
	}
	
	
	if($showtime == "1"){
		return $ThaiText." <font color=#1CBBB4><br>".$time."</font>";
	}
	if($showtime == "3"){
		return $ThaiText." <font color=#FF0000>".$time."</font>";
	}
	else if($showtime == "2"){
		$ThaiText = ($year)."-".$month."-".date("j",$timestamp) ;
		return $ThaiText." : ".$times;
	}
	
		else if($showtime == "app"){
		return $ThaiText." <font color=#FF0000>".$time;
	}
	
	
	else{
		return $ThaiText;
	}	
}

function dateToTime($datetime){

     $exp = explode(" ",$datetime);

     $t = explode(":",$exp[1]);

     $d = explode("-",$exp[0]);

     $timestamp = mktime($t[0], $t[1], $t[2], $d[1], $d[2], $d[0]);

     return $timestamp;

}





//ตรวจสอบว่าเป็น Admin จริงหรือไม่จริง

function CheckAdmin($user = "", $pwd =""){

	global $db ;

$user_chk = explode("_",$user);

if($user_chk[0] == 'driver'){
	$tb_admin_chk = "web_driver";
}else{
	$tb_admin_chk = TB_ADMIN;
}


	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

	$res[user] = $db->select_query("SELECT id FROM ".$tb_admin_chk." WHERE username='$user' AND password='$pwd' ");

	$arr[user] = $db->fetch($res[user]);

	if(!$arr[user][id]){

echo "<meta http-equiv=refresh content=0;URL=?name=admin&file=logout>";



	}

}



//ตรวจสอบระดับของผู้ดูแลระบบ

function CheckLevel($Username = "", $Action = ""){

	global $db ;

	//Check Level



	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

	$res[user] = $db->select_query("SELECT * FROM ".TB_ADMIN." WHERE username='$Username' ");

	$arr[user] = $db->fetch($res[user]);

	//Check Action

	$res[action] = $db->select_query("SELECT * FROM ".TB_ADMIN_GROUP." WHERE id='".$arr[user][level]."' ");

	$arr[action] = $db->fetch($res[action]);

	if($arr[action][$Action]){

		return True;

	}else{

	

	echo 2222222222222222;

$PermissionFalse .= "<BR><BR>";

$PermissionFalse .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/icon/notview.gif\" BORDER=\"0\"></A><BR><BR>";

$PermissionFalse .= "<FONT COLOR=\"#336600\"><B>��ҹ������Ѻ͹حҵ�����ҹ��ǹ�����</B></FONT><BR><BR>";

$PermissionFalse .= "<A HREF=\"?name=admin&file=main\"><B>˹����ѡ�������к�</B></A>";

$PermissionFalse .= "</CENTER>";

$PermissionFalse .= "<BR><BR>";

echo $PermissionFalse;

	}

}





//ตัว Alert ว่าไม่สามารถเข้าใช้งานได้ 

function NotTrueAlert($permission="", $option="", $text=""){

	if($option == 1){

		$option = "<script language='javascript'>javascript:history.go(-1)</script>";

	}elseif($option == 2){

		$option = "<script language='javascript'>refresh_close();</script>";

	}elseif($option == 3){

		$option = "<script language='javascript'>self.close();</script>";

	}



	if(!$permission){

		echo "<script language='javascript'>" ;

		echo "alert('".$text."')" ;

		echo "</script>" ;

		echo $option ;

		exit();

	}

}



//เช็คขนาด Folder

function dirsize($dirName = '.') {

   $dir  = dir($dirName);

   $size = 0;



   while($file = $dir->read()) {

       if ($file != '.' && $file != '..') {

           if (is_dir($file)) {

               $size += dirsize($dirName . '/' . $file);

           } else {

               $size += filesize($dirName . '/' . $file);

           }

       }

   }

   $dir->close();

   return $size;

}



//แปลงหน่วยขนาดไฟล์ 

function getfilesize($bytes) {

   if ($bytes >= 1099511627776) {

       $return = round($bytes / 1024 / 1024 / 1024 / 1024, 2);

       $suffix = "TB";

   } elseif ($bytes >= 1073741824) {

       $return = round($bytes / 1024 / 1024 / 1024, 2);

       $suffix = "GB";

   } elseif ($bytes >= 1048576) {

       $return = round($bytes / 1024 / 1024, 2);

       $suffix = "MB";

   } elseif ($bytes >= 1024) {

       $return = round($bytes / 1024, 2);

       $suffix = "KB";

   } else {

       $return = $bytes;

       $suffix = "Byte";

   }

   if ($return == 1) {

       $return .= " " . $suffix;

   } else {

       $return .= " " . $suffix . "s";

   }

   return $return;

}



//ฟังก์ชั่นเปลี่ยนไอคอน

function CHANGE_EMOTICON($Message = ""){

	$Message = eregi_replace(":emo1:","<IMG SRC=\"images/emotion/angel_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo2:","<IMG SRC=\"images/emotion/angry_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo3:","<IMG SRC=\"images/emotion/broken_heart.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo4:","<IMG SRC=\"images/emotion/cake.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo5:","<IMG SRC=\"images/emotion/confused_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo6:","<IMG SRC=\"images/emotion/cry_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo7:","<IMG SRC=\"images/emotion/devil_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo8:","<IMG SRC=\"images/emotion/embaressed_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo9:","<IMG SRC=\"images/emotion/envelope.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo10:","<IMG SRC=\"images/emotion/heart.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo11:","<IMG SRC=\"images/emotion/kiss.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo12:","<IMG SRC=\"images/emotion/lightbulb.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo13:","<IMG SRC=\"images/emotion/omg_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo14:","<IMG SRC=\"images/emotion/regular_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo15:","<IMG SRC=\"images/emotion/sad_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo16:","<IMG SRC=\"images/emotion/shades_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo17:","<IMG SRC=\"images/emotion/teeth_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo18:","<IMG SRC=\"images/emotion/thumbs_down.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo19:","<IMG SRC=\"images/emotion/thumbs_up.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo20:","<IMG SRC=\"images/emotion/tounge_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo21:","<IMG SRC=\"images/emotion/whatchutalkingabout_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo22:","<IMG SRC=\"images/emotion/wink_smile.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message);

	$Message = eregi_replace(":emo23:","<img src=\"images/emotion2/001.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo24:","<img src=\"images/emotion2/002.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo25:","<img src=\"images/emotion2/003.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo26:","<img src=\"images/emotion2/004.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo27:","<img src=\"images/emotion2/005.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo28:","<img src=\"images/emotion2/006.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo29:","<img src=\"images/emotion2/007.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo30:","<img src=\"images/emotion2/008.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace("::emo31:","<img src=\"images/emotion2/009.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo32:","<img src=\"images/emotion2/010.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo33:","<img src=\"images/emotion2/011.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo34:","<img src=\"images/emotion2/012.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo35:","<img src=\"images/emotion2/013.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo36:","<img src=\"images/emotion2/014.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo37:","<img src=\"images/emotion2/015.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo38:","<img src=\"images/emotion2/016.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo39:","<img src=\"images/emotion2/017.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo40:","<img src=\"images/emotion2/018.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo41:","<img src=\"images/emotion2/019.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo42:","<img src=\"images/emotion2/020.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo43:","<img src=\"images/emotion2/021.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo44:","<img src=\"images/emotion2/022.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo45:","<img src=\"images/emotion2/023.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo46:","<img src=\"images/emotion2/024.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo47:","<img src=\"images/emotion2/025.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo48:","<img src=\"images/emotion2/026.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo49:","<img src=\"images/emotion2/027.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo50:","<img src=\"images/emotion2/028.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo51:","<img src=\"images/emotion2/029.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 

	$Message = eregi_replace(":emo52:","<img src=\"images/emotion2/030.gif\" BORDER=\"0\" ALIGN=\"absmiddle\">",$Message); 



	return stripslashes($Message);

}



//BB Code

$_BBCONFIG['QuotedBgColor'] = '#F7F7F7';

$_BBCONFIG['QuotedBorderColor'] = '#CCCCCC';

$_BBCONFIG['CodeBgColor'] = '#EFF7FF';

$_BBCONFIG['CodeBorderColor'] = '#BDBEBD';



function BBCODE($string){

	global $_BBCONFIG;

	$string = nl2br($string);

	$patterns = array(

		'`\[b\](.+?)\[/b\]`is',

		'`\[i\](.+?)\[/i\]`is',

		'`\[u\](.+?)\[/u\]`is',

		'`\[strike\](.+?)\[/strike\]`is',

		'`\[color=#([0-9A-F]{6})\](.+?)\[/color\]`is',

		'`\[email\](.+?)\[/email\]`is',

		'`\[img\](.+?)\[/img\]`is',

		'`\[url=([a-z0-9]+://)([\w\-]+\.([\w\-]+\.)*[\w]+(:[0-9]+)?(/[^ \"\n\r\t<]*?)?)\](.*?)\[/url\]`si',

		'`\[url\]([a-z0-9]+?://){1}([\w\-]+\.([\w\-]+\.)*[\w]+(:[0-9]+)?(/[^ \"\n\r\t<]*)?)\[/url\]`si',

		'`\[url\]((www|ftp)\.([\w\-]+\.)*[\w]+(:[0-9]+)?(/[^ \"\n\r\t<]*?)?)\[/url\]`si',

		'`\[flash=([0-9]+),([0-9]+)\](.+?)\[/flash\]`is',

		'`\[quote\](.+?)\[/quote\]`is',

		'`\[indent](.+?)\[/indent\]`is',

		'`\[size=([1-6]+)\](.+?)\[/size\]`is',

		'`\[sup\](.+?)\[/sup\]`is',

		'`\[sub\](.+?)\[/sub\]`is',

		'`\[code\](.+?)\[/code\]`is',

		'`\r\n|\r|\n`',

		'`\t`',

		'`\[img=(.+?)\]`is',

		'`\[align=(left|center|right)\](.+?)\[/align\]`is',

		'`\[glow\](.+?)\[/glow\]`is',

		'`\[shadow\](.+?)\[/shadow\]`is',

		'`\[media\](.+?)\[/media\]`is',

		'`\[movie\](.+?)\[/movie\]`is',

		'`\[center\](.+?)\[/center\]`is',

		'`\[left\](.+?)\[/left\]`is',

		'`\[right\](.+?)\[/right\]`is',

		'`\[\-\-\-\]`is',

			);



	$replaces =  array(

			'<strong>\\1</strong>',

			'<em>\\1</em>',

			'<span style="border-bottom: 1px dotted">\\1</span>',

			'<strike>\\1</strike>',

			'<span style="color:#\1;">\2</span>',

			'<a href="mailto:\1">\1</a>',

			'<img src="\1" alt="" style="border:0px;" />',

			'<a href="\1\2">\6</a>',

			'<a href="\1\2">\1\2</a>',

			'<a href="http://\1">\1</a>',

			'<object width="\1" height="\2"><param name="movie" value="\3" /><embed src="\3" width="\1" height="\2"></embed></object>',

			'<strong>อ้างอิง :</strong><div style="margin:0px 10px;padding:5px;background-color:'.$_BBCONFIG["QuotedBgColor"].';border:1px dotted '.$_BBCONFIG["QuotedBorderColor"].';width:100%;"><em>\1</em></div>',

			'<pre>\\1</pre>',

			'<h\1 style="display:inline">\2</h\1>',

			'<sup>\\1</sup>',

			'<sub>\\1</sub>',

			'<strong style="color:green;font-family:courier new,monospace;font-size:8pt;">Code:</strong><pre style="margin:0px 10px;padding:5px;background-color:'.$_BBCONFIG["CodeBgColor"].';border:1px solid '.$_BBCONFIG["CodeBorderColor"].';width:100%;font-size:10pt;font-family:courier new,monospace;">\1</pre>',

			'',

			'&nbsp;&nbsp;',



			'<img src="\1" alt="" style="border:0px;" />',

			'<div align="\1">\2</div>',

			'<table style=filter:glow(color=#00FF00, strength=3)>\\1</table>',

			'<table style=\"filter:shadow(color=pink, direction=left)\">\\1</table>',

			'<embed src=\\1  TYPE=\"application/x-mplayer2\" align=\"middle\" width=\"200\" height=\"42\" autostart=\"1\" autoplay=\"true\" dhtype=\"wma\">',

			'<object classid=\"CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6\" type=\"application/x-oleobject\" width=\"262\" height=\"260\" id=\"MediaPlayer1\">\n<param name=\"URL\" value=\\1  >\n<PARAM NAME=ShowControls VALUE=true>\n<PARAM NAME=ShowStatusBar VALUE=false>\n<PARAM NAME=Autostart VALUE=true>\n<PARAM NAME=ShowPositionControls value=true>\n<PARAM NAME=ShowTracker value=true>\n</object>',

			'<div align=center>\\1</div>',

			'<div align=left>\\1</div>',

			'<div align=right>\\1</div>',

			'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',

			);

	$string = preg_replace($patterns, $replaces , $string);

	return stripslashes($string);

}



#   [b]bold[/b]                                                                                         : BOLD TEXT

#   [i]Italic[/i]                                                                                  : ITALIC TEXT

#   [u]Underline[/u]                                                                                : UNDERLINED TEXT

#   [strike]Text[/strike]                                                                        : STRIKE THROUGH TEXT

#   [color=#ffffff]Colored Text[/color]                                          : COLORED TEXT

#   [email]me@email.com[/email]                                                            : EMAIL LINK

#   [img]http://www.blah.com/img.gif[/img]                                    : IMAGE

#   [url=http://www.domain.com]Text[/url]                                        : HYPERLINKED TEXT OR IMAGE

#   [url]http://www.url.com[/url]                                                        : HYPERLINK

#   [url]www.yourdomain.com[/url]                                              : HYPERLINK WWW

#   [flash=width,height]http://blah.com/flash.swf[/flash]        : FLASH MOVIE

#   [quote]Text![/quote]                                                                        : QUOTE    

#   [indent]Text[/indent]                                                                        : PREFORMATTED TEXT

#   [size=1-6]Text[/size]                                                                        : TEXT HEADINGS

#   [sup]superscription[/sup]

#   [sub]subscription[/sub]

#   [code]program code[/code]

#   [img=http://www.blah.com/img.gif]

#   [align=left,center,right]Alignment[/align]

?>