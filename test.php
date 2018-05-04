<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php 
/*include('includes/class.mysql.php');
include('includes/config.in.php');
$db = new DB();

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM  web_order limit 1 ");
while($arr[project] = $db->fetch($res[project])){  

	$data[] = $arr[project];

}
header('Content-Type: application/json');
echo json_encode($data);*/
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<a href="fb://profile/655146487898613">FB Profile</a>
<br/>
<br/>
<a href="https://www.google.com/maps?daddr=8.1110951,98.3064646&amp;ll=">Maps</a>
<br/>
<br/>
<a href="https://www.google.co.th/maps?q=8.1110951,98.3064646">Maps 2</a>
<br/>
<br/>
<a href="maps://maps.google.com/maps?daddr=8.1110951,98.3064646&amp;ll=">Maps 3</a>
<br/>
<br/>
<a onclick="mapsSelector(8.1110951,98.3064646);">Maps Onclick</a>



<div id="demo"></div>

<script>
var txt = "";
txt += "<p>Browser CodeName: " + navigator.appCodeName + "</p>";
txt += "<p>Browser Name: " + navigator.appName + "</p>";
txt += "<p>Browser Version: " + navigator.appVersion + "</p>";
txt += "<p>Cookies Enabled: " + navigator.cookieEnabled + "</p>";
txt += "<p>Browser Language: " + navigator.language + "</p>";
txt += "<p>Browser Online: " + navigator.onLine + "</p>";
txt += "<p>Platform: " + navigator.platform + "</p>";
txt += "<p>User-agent header: " + navigator.userAgent + "</p>";

document.getElementById("demo").innerHTML = txt;

function mapsSelector(lat,lng) {
	  if /* if we're on iOS, open in Apple Maps */
	    ((navigator.platform.indexOf("iPhone") != -1) || 
	     (navigator.platform.indexOf("iPad") != -1) || 
	     (navigator.platform.indexOf("iPod") != -1))
	    window.open("maps://maps.google.com/maps?daddr="+lat+","+lng+"&amp;ll=");
	else /* else use Google */
	    window.open("https://maps.google.com/maps?daddr="+lat+","+lng+"&amp;ll=");
	}
</script>

<div id="contact">
    Contact me!
</div>
<a href="#" id="toggle">Contact</a>
<style>
	#contact
{
    display: none;
    background: grey;
    color: #FFF;
    padding: 10px;
}
</style>
<script>
	$(function()
{
     $("a#toggle").click(function()
     {
         $("#contact").slideToggle();
         return false;
     }); 
});
</script>
