
<!DOCTYPE html>
<html http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
	<title></title>
	<meta charset="utf-8" />
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="*" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<form action="" method="get" name="form1" onsubmit="checkForm(); return false;">
รหัสบัตรประจำตัวประชาชน : <input name="txtID" type="text" >
<input type="submit"  value="ตรวจสอบ">
</form>
</body>
</html>


<script language="javascript">
// function checkForm() {

// if (!CheckPersonID(document.form1.txtID.value)) {
// alert('รหัสบัตรประชาชนไม่ถูกต้อง!!');
// } else {
// alert('รหัสบัตรประชาชนถูกต้องแล้ว!!');
// }
// }

function CheckPersonID (id) {
var x = new String(id);
splitext = x.split("");
var total = 0;
var mul = 13;
for(i=0;i<splitext.length-1;i++) {
total = total + splitext[i] * mul;
mul = mul -1;
}

mod = total % 11;
nsub = 11-mod;
mod2 = nsub % 10;

if(mod2!=splitext[12])
return false;
else
return true;
}

</script>
<script >
	
function checkID(id)
{
if(id.length != 13) return false;
for(i=0, sum=0; i < 12; i++)
sum += parseFloat(id.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id.charAt(12)))
return false; return true;}

function checkForm()
{ if(!checkID(document.form1.txtID.value))
alert('รหัสประชาชนไม่ถูกต้อง');
else alert('รหัสประชาชนถูกต้อง เชิญผ่านได้');}
</script>
