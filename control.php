<?php header ('Content-type: text/html; charset=utf-8'); 
 

?>

<?



@session_start();
 error_reporting(0);
 include("mainfileadmin.php");
//include("includes/class.resizepic.php");
$PHP_SELF = "index.php";
GETMODULE($_GET[name],$_GET[file]);
 $login_mem = $_SESSION['admin_user'];





 include("admin/menu.php");
  require_once("css/maincss_admin.php");
 
?>

 	<?  include "js/control.php" ;	 ?> 


 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

 
        
<style type="text/css">
body,td,th {
	font-size: 14px;
}
</style>
<head>


<title>T Share : Web Control Panel</title>


 

 
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />

 

</head>
 
 <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
 




    <script src="js/jquery.min.js"></script>
 
   
       <script src="bootstrap/js/bootstrap.min.js?v=<?=time()?>"></script>
   

 <link rel="stylesheet" href="bootstrap/css/bootstrap_new.css?v=<?=time()?>">

 
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
 

 
<? 
  $main_color='#16B3B1';
    $backpage_color='#3C8DBC';  
 
 $submit_button='#16B3B1';
  $reset_button='#4BB1C1'; 
 
 $backpage_color='#4BB1C1';
 $left_icon_menu_color='#4BB1C1';
 $main_color='#16B3B1';
	
  $main_color_sorf='#81C8D3';  
  $main_color_dark='#0090AC'; 
 
 $text_topic_color='#068A9F';
$web_color_main='#16B3B1';
 


?>


<table width="100%" border="0" cellspacing="3" cellpadding="5">
  <tbody>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
  </tbody>
</table>


<style type="text/css">
<!--
body {
	background-color: <?=$main_color;?>; font-size:14px;
}

.topic_menu {
	

	border:solid 2px #EAEBEC;        
	-moz-border-radius:3px;
        -webkit-border-radius:3px;
        border-radius:3px;
		padding:5px;
		background-color:#FFFFFF; margin-bottom:10px; margin-top:10px; font-size:36px;
}
-->
</style></head>

<!-- ImageReady Slices (topmenu.psd) -->
<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
  <tr>
    <td align="center" bgcolor="#Fff"><?  include ("headbooking.php");?></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF" style="background-image:url(images/bgwebs.png); background-repeat:no-repeat; background-repeat:repeat-x" ><br> 
   
   
   
   
   
 
      <table width="80%" border="0" cellspacing="0" cellpadding="3"  >
        <tr>
      
	  
	  
	  
	      <td bgcolor="#FFFFFF"> 
		  
		  
 <style>
#main_page_load{
	 padding:10px;   border-radius: 10px; border: 0px solid #ddd;background-color:#FFFFFF;     margin-bottom: 15px; box-shadow: 0px  0px 10px #DADADA  ; margin-top:5px;
 	 
 }
 
	 </style>	  
		  
		  
 
  <div id="main_page_load">
		  
		  
		  
<script src="dist/js/demo.js"></script>
 

 

<?  include ("".$MODPATHFILE."");?>  </div>




<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px; margin-top: 15px;
    border: 1px solid #888; border-radius: 10px;
    width: 100%; /* Could be more or less, depending on screen size */ 
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.modal-dialog {
  padding-top: 0;
}

</style>

  
  
    <script src="js/camera/binaryajax.js"></script> 
                 <script src="js/camera/exif.js"></script>    <?   include ("bootstrap/css/css.php");?>    

  <div>
 


          </td>
        </tr>
      </table>
    <br></td>
  </tr>
  <tr>
    <td align="center"  ><table width="100%" border="0" cellspacing="0" cellpadding="0" >
      <tr>
        <td height="100" align="center" valign="top" bgcolor="<?=$web_color_main?>"><br>
 
          </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">
	
	<script type="text/JavaScript"><!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].adminindexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.adminindexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
      </script></td>
  </tr>
</table>
 


<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.adminindexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_jumpMenuGo(selName,targ,restore){ //v3.0
  var selObj = MM_findObj(selName); if (selObj) MM_jumpMenu(targ,selObj,restore);
}
//-->
</script>
 
</script>
<script language="JavaScript">
	function chkNumber(ele)
	{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
	}

</script>

<!-- End ImageReady Slices -->

 <script type="text/javascript">
function checkeng() {
     var obj=myform.username
     var str="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890" 
     var val=obj.value
     var valOK = true;
     
     for (i=0; i<val.length & valOK; i++){
           valOK = (str.indexOf(val.charAt(i))!= -1) 
     }
     
     if (!valOK) {

		              document.myform.username.focus() ;
					   document.myform.username.value ="";
		 
          return false ;
     } return true
} 
</script>

  






<div id="main_popup_send_data" style="display:none"></div>


<style>
.modal {
  text-align: center;
  padding: 0!important;
}

.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px;
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}

.modal-backdrop {
   background-color: #ffffff;
}
</style>
  <style type="text/css">
 a:link {
  text-decoration: none!important; 
 
   
  
}
a:visited {
  text-decoration: none!important;
 
}
a:hover {
  text-decoration: none!important;
 
}
a:active {
  text-decoration: none!important;
    
}
div a {
	
	color:<?=$main_color_dark?>!important;
}
 
  </style><table width="100%" border="0" cellspacing="3" cellpadding="0">
              <tr>
                <td align="center"><font color="#FFFFFF" size="2">Copyright © 2017 All Rights Reserved. </td>
              </tr>
              <tr>
                <td align="center"><font color="#FFFF99"><font size="2">Development and Design by CSD Media</td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
              </tr>
          </table>
</body>
</html>

			  
  <!-- Modal -->
  
 <div  id="div_send_data_msg"></div>
 
 
 
  <!-- Modal -->
  <div class="modal fade" id="myModal_text" role="dialog">
    <div class="modal-dialog" style="width:100%; padding:20px;"  >
    
      <!-- Modal content-->
      <div class="modal-content"  style="background-color:#FFFFFF;width:100%">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="fa  fa-close" style="width:40px; font-size:50px; color:#FF0000"  ></i></button>
          <h2 class="modal-title" id="topic_edit">Message Management</h2>
        </div>
        <div class="modal-body" id="show_data_page">
 
        </div>
        <div class="modal-footer" style="display:none">
 
          <button type="button" class="btn btn-danger" data-dismiss="modal">ปิดหน้าต่าง</button>
 
        </div>
		
      </div>
      
    </div>
  </div>
  
  
 
 
   <!-- Modal -->
  <div class="modal fade" id="myModal_text_sub" role="dialog">
    <div class="modal-dialog" style="width:100%; padding:20px;"  >
    
      <!-- Modal content-->
      <div class="modal-content"  style="background-color:#FFFFFF;width:100%">
        <div class="modal-header">
          <button type="button" class="close"  ><a id="close_sub_popup"><i class="fa  fa-close" style="width:40px; font-size:50px; color:#FF0000"  ></i></a></button>
          <h2 class="modal-title" id="topic_edit_sub">Message Management</h2>
        </div>
        <div class="modal-body" id="show_data_page_sub">
 
        </div>
        <div class="modal-footer" style="display:none">
 
          <button type="button" class="btn btn-danger" data-dismiss="modal">ปิดหน้าต่าง</button>
 
        </div>
		
      </div>
      
    </div>
  </div>
  
  
 <script>
 
  $("#close_sub_popup").click(function(){
	  

 
 $("#myModal_text_sub").hide()
 
 
  $(".modal").css("overflow-y", "scroll");
  
  	 
 //  $("body").css("overflow-y", "scroll");
 
  });
 
 </script>
 
  
<!-- Modal -->
<div id="main_popup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="main_popup_close">&times;</button>
        <h3 class="modal-title" id="main_popup_topic" style=" font-size:26px; color:#666666 ">Modal Header</h4>
      </div>
      <div class="modal-body" id="main_popup_load_data">
        <p>&nbsp;</p>
      </div>
      <div class="modal-footer" style="display:none">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 <?
  CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
 
 ?>
      <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&libraries=places">
    </script>              