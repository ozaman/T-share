<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<style type="text/css">
html { height: 100% }
body { 
	height:100%;
	margin:0;padding:0;
	font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;
	font-size:12px;
}
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#map_canvas { 
	width:100%;
	height:100%;
	margin:auto;
/*	margin-top:100px;*/
}
</style>


 

<div style="display: nonea"  id="map_aaaa">
  <div id="map_canvas" style="display: nonea"></div>
 <div id="send_data"   style="display: none">  
  <form id="form_get_detailMap" name="form_get_detailMap" method="post" action="">  
    Latitude  
    <input name="lat_value" type="text" id="lat_value" value="0" />  <br />
    Longitude  
    <input name="lon_value" type="text" id="lon_value" value="0" />  <br />
  Zoom  
  <input name="zoom_value" type="text" id="zoom_value" value="0" size="5" />  
  <br />
  <input type="submit" name="button" id="button" value="บันทึก" />  
  </form> 

</div> 
</div>	
  
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript">
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
function initialize() { // ฟังก์ชันแสดงแผนที่
	GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
	// กำหนดจุดเริ่มต้นของแผนที่
	var my_Latlng  = new GGM.LatLng(13.761728449950002,100.6527900695800);
	var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
	// กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
	var my_DivObj=$("#map_canvas")[0]; 
	// กำหนด Option ของแผนที่
	var myOptions = {
		zoom: 16, // กำหนดขนาดการ zoom
		center: my_Latlng , // กำหนดจุดกึ่งกลาง
		mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่
	};
	map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map



	// เรียกใช้คุณสมบัติ ระบุตำแหน่ง ของ html 5 ถ้ามี
	if(navigator.geolocation){
			navigator.geolocation.getCurrentPosition(function(position){
				var pos = new GGM.LatLng(position.coords.latitude,position.coords.longitude);
				var infowindow = new GGM.InfoWindow({
					map: map,
					position: pos,
					content: 'คุณอยู่ที่นี่.'
				});
				
				
 	
				
				
				var my_Point = infowindow.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
				map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker		
				$("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
				$("#lon_value").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
				$("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value	
				
				//alert($("#lon_value").val());
				
				
				
////// Update  DB
//*
 
var url="go.php?name=load/update/location&file=location&type=<?=$_GET[type]?>";
	url=url+"&lat="+my_Point.lat();
	url=url+"&lng="+my_Point.lng();
 
$("#send_data").load(url);
 
				map.setCenter(pos);
			},function() {
				/// alert("กรุณาเปิดการแจ้งตำแหน่ง")
				//window.location.href = "signin.php?"; //will redirect to your blog page (an ex: blog.html)
			});
	}else{
		// alert("คำสั่งทำงาน ถ้า บราวเซอร์ ไม่สนับสนุน ระบุตำแหน่ง");
	}
  
	// กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom
	GGM.event.addListener(map, 'zoom_changed', function() {
		$("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value 	
	});

}
$(function(){
	// โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
	// ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
	// v=3.2&sensor=false&language=th&callback=initialize
	//	v เวอร์ชัน่ 3.2
	/// AIzaSyCK41W7bkfkmv5t3YkPCXxX9oLFNX2midg

 

	//	sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false
	//	language ภาษา th ,en เป็นต้น
	//	callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize
	$("<script/>", {
	  "type": "text/javascript",
	//  src: "https://maps.googleapis.com/maps/api/js?key=AIzaSyAcTSB6t3VJpbMLKjJGIT4M0aTer2VEHb8&callback=initialize"
	src: "https://maps.googleapis.com/maps/api/js?key=AIzaSyCK41W7bkfkmv5t3YkPCXxX9oLFNX2midg&callback=initialize"
	}).appendTo("#map_aaaa");	
});
</script> 
 
  