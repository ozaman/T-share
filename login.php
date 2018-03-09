<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" class="ui-mobile landscape min-width-320px min-width-480px min-width-768px min-width-1024px">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>T-Booking.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon" href="https://topup2rich.com/images/iteRestaurant.png">
<link href="scripts/style.css" rel="stylesheet" type="text/css">
<link href="scripts/style(1).css" rel="stylesheet" type="text/css">

        <script type="text/javascript" src="scripts/jQuery.js"></script>
        <script type="text/javascript" src="scripts/jMobile.js"></script>
        <script type="text/javascript" src="scripts/iteMain.js"></script><style type="text/css"></style>
        <script type="text/javascript" src="scripts/jQueryMask.js"></script>
        <style type="text/css">

          h1 {font-size:19px !important;font-weight:bold;margin:6px 0px !important;padding:6px 0px !imporant; line-height:30px;}
        </style>
        
             <style type="text/css">
                * {
                    /*font-size:18px;*/
                    font-size:15px;
                }
               
           </style>
        

        <style type="text/css">
        
         input[type='text'], input[type='number'], input[type='tel'],textarea, input[type='password']
                {
                        background-color:White !important;
                        -moz-box-shadow: none !important;
                        -webkit-box-shadow: none !important;
                        box-shadow: none !important;
                        -moz-border-radius: 0em !important;
                        -webkit-border-radius: 0em !important;
                        border-radius:0em !important;
                        border:solid 1px #CCCCCC !important;
                }
        </style>


</head>
<body class="ui-mobile-viewport" data-pinterest-extension-installed="cr1.39.1">

        
<link rel="stylesheet" type="text/css" href="scripts/jqueryui.css">
<script src="scripts/jqueryUI.js" type="text/javascript"></script>
<script type="text/javascript">

    var menuType = '0';

    function btnLogin(xobj) {
        var frm = document.getElementById("frmLogin");
        var y = validateBox(frm);
        $.fixedToolbars.hide();
        $.fixedToolbars.show();

        if (y) {
            var x = saveData2("checklogin.php", frm);
 
            var A1 = x.split(";");
            A1 = A1[0];
 //alert(A1);
                     if (A1 == '1') {
                        window.location = "index.php";
                    } else {
                        alert('User or Password ไม่ถูกต้อง');
						//window.location = xobj.href;
                    }
		}
        return false;
    }

    function UserEnter(xobj, e) {
        var xkey;
        if (document.all) {
            xkey = window.event.keyCode;
        }
        else {
            xkey = e.which;
        }
        if (xkey == 13) {
            if ($("#UserPassword").val() == "") {
                $("#UserPassword").focus();
            }
            else {
                var Alink = document.createElement("a");
                Alink.setAttribute('href', '/Products');
                btnLogin(Alink);
            }
        }
    }
    function PasswordEnter(xobj, e) {
        var xkey;
        if (document.all) {
            xkey = window.event.keyCode;
        }
        else {
            xkey = e.which;
        }
        if (xkey == 13) {
            var Alink = document.createElement("a");
            Alink.setAttribute('href', '/Products');
            btnLogin(Alink);
        }
    }

    $(function () {
//        if ($("#dialogTU2RP").html() != "") {
//            $("#dialogTU2R").dialog({ resizable: false, modal:false, width:'97%',
//                buttons: {
//                    "OK": function () {
//                        $(this).dialog("close");
//                    }
//                }
//            });
//        }
    });
</script>
<script type="text/javascript">
            var LangInt = 1;
            var activeDate;
            var TextWait ="<div style='margin:15px 15px 30px 15px;text-align:center'><img src='/images/loading.gif' align='middle'/> " + Lang("Please wait;กรุณารอสักครู่;请稍候;しばらくお待ちください;기다려주십시오") + "...</div>"
            var iPooos = true;
            var iOS = false;
            var Browser = 'Safari';
            var GCompanySystem = 'TU2R';
            var GCompanySystemSub = '';
            var GCompanyCode = '1';
            var GCompanyCodeMain = '1';
            function imgCheck(xobj) {
                xobj.src = "/images/noimage.jpg";
            }



var message="";

///////////////////////////////////
function clickIE4(){
if (event.button==2){
//alert(message);
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
//alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("return false")




        </script>

<style type="text/css">
   td.telx div, td.telx a {font-size:16px;color:#777777;}
   .ui-dialog { min-height:140px !important;}
</style>

<div data-role="page" data-theme="b" id="Register" data-url="Register" class="ui-page ui-body-b ui-page-active">
    <div data-role="header" data-position="fixed" class="ui-bar-b ui-header ui-header-fixed fade ui-fixed-inline" role="banner" style="top: 0px;">

          
<img src="images/logo.png" style="width:100%;   max-width:161px;">
                    

      
    </div> 
                  
    <div data-role="content" data-theme="d" class="ui-content ui-body-d" role="main">
 
        <form method="post" action="checklogin.php" id="frmLogin" name="frmLogin">
            <div style="text-align:center;font-size:14px;color:#555555;margin:-10px">
                

            
            
            </div>
            <div class="ui-corner-all" style="border:solid 1px #BBBBBB;padding:15px;margin:15px;text-align:center;">
                <div style="width:85%;margin:auto;max-width:400px;">
                    <div>
                    <div>ผู้ใช้งาน</div>
                    <input type="text" name="username" id="username" maxlength="50" required="true" style="width:97%" onkeypress="UserEnter(this,event)" value="<?=$_COOKIE['remember_user'];?>" class="ui-input-text ui-body-null ui-corner-all ui-shadow-inset ui-body-d">
                    </div>
                    <div>
                     <div>รหัสผ่าน</div>
                    <input type="password" name="password" id="password" maxlength="20" required="true" onkeypress="PasswordEnter(this,event)" style="padding:4px 2px;width:97%;" value="<?=$_COOKIE['remember_pass'];?>" class="ui-input-text ui-body-null ui-corner-all ui-shadow-inset ui-body-d">
                    </div>
 
                     <table align="center"  >
                     	<tr>
                     		<td width="40" height="30" valign="middle">
                     		
<?
if($_COOKIE['remember'] == 1) {
    $remember = 1;
   $chk_remem = "checked='checked'";
} else {
   $remember = 0;
}
?> 
<input type="checkbox" name="chk_remem" id="chk_remem" <?=$chk_remem;?> style="width: 20px;height:20px;"  /> 


                    		
                     		<input type="hidden" name="remember" id="remember" value="<?=$remember;?>" />	
                     		</td>
                     		<td valign="middle">จำผู้ใช้งานและรหัสผ่าน</td>
                     	</tr>
                     </table>


                    <div style="margin-top:30px">
                           <a href="login.php" rel="external" onclick="return btnLogin(this);" data-role="button" data-theme="b" class="ui-btn ui-btn-corner-all ui-shadow ui-btn-up-b"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">เข้าสู่ระบบ</span></span></a>

       

                    </div>
                </div>
            </div>

       </form>
       

       

            
 

   </div>
       <div data-role="footer" style="display:none" class="ui-bar-b ui-footer" role="contentinfo">
    </div> 
 </div>



        <script type="text/javascript">
            $(function () {
$("#chk_remem").click(function(){
	if($('#remember').val() == 1){
		$('#remember').val(0);
	}else{
		$('#remember').val(1);
	}
});
            })
        </script>




</body>

</html>