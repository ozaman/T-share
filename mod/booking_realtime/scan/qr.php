 
<style type="text/css">
body{
    width:100%; margin:0; 
    text-align:center;
}
img{
    border:0;
}
#main{
 
    background:white; margin:0; top:0;
    overflow: auto;
	width: 100%;
}
#header{
    background:white;
 
}
#mainbody{
    background: white;
    width:100%;
	display:none;
}
#footer{
    background:white;
}
#v{
    width:250px;
   height: auto;
}
#qr-canvas{
    display:none;
}
#qrfile{
    width:250px;
    height: auto;
}
#mp1{
    text-align:center;
    font-size:35px;
}
#imghelp{
    
}
.selector{
    margin:0;
    padding:0;
    cursor:pointer;
   
}
#outdiv
{
    width:100%;
    height:200px;
 
 
}
#result{
    border: solid;
 
 
	width:320px;
}

ul{
    margin-bottom:0;
 
}
li{
   
}
li a{
    text-decoration: none;
    color: black;
}

#footer a{
	color: black;
}
.tsel{
    padding:0;
}

</style>

 
 
<script src="js/scan/cb=gapi.loaded_0" async=""></script>
<script type="text/javascript" src="js/scan/llqrcode.js"></script>
<script type="text/javascript" src="js/scan/plusone.js" gapi_processed="true"></script>
<script type="text/javascript" src="js/scan/webqr.js"></script>

<script type="text/javascript">

/*

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24451557-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  
*/

</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td id="outdiv"> <div id="qrfile" style="width:100%"><canvas id="out-canvas"  style="width:100%"></canvas>
 
</div></td>
  </tr>
</table>

 

<div id="main" style=" display:none">
  <div id="mainbody" style=" display:none">
<table class="tsel" border="0" width="100%">
<tbody><tr>
<td valign="top" align="center" width="100%">
<table width="100%" border="0" class="tsel">
<tbody><tr style="display:none">
<td><img class="selector" id="webcamimg" src="js/scan/vid.png" onClick="setwebcam()" align="left" style="opacity: 0.2;"></td>
<td><img class="selector" id="qrimg" src="js/scan/cam.png" onClick="setimg()" align="right" style="opacity: 1;"></td></tr>
<tr><td colspan="2" align="center">
</td></tr>
</tbody></table></td>
</tr>
<tr style="display:none"><td colspan="3" align="center"><textarea cols="" rows="" id="result"></textarea>




</td></tr>
</tbody></table>
 
 
<canvas id="qr-canvas"  ></canvas>
<script type="text/javascript">load();</script>
