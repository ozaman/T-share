<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <style type="text/css">
        body
        {
            font-family: Arial;
            font-size: 10pt;
        }
    </style>
</head>
<body>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
   
   
   
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcTSB6t3VJpbMLKjJGIT4M0aTer2VEHb8&sensor=false"></script>
    <script type="text/javascript">
        var markers = [
    {
        "title": 'Aksa Beach',
        "lat": '19.1759668',
        "lng": '72.79504659999998',
        "description": 'Aksa Beach is a popular beach and a vacation spot in Aksa village at Malad, Mumbai.'
    },
    {
        "title": 'Juhu Beach',
        "lat": '19.0883595',
        "lng": '72.82652380000002',
        "description": 'Juhu Beach is one of favourite tourist attractions situated in Mumbai.'
    },
    {
        "title": 'Girgaum Beach',
        "lat": '18.9542149',
        "lng": '72.81203529999993',
        "description": 'Girgaum Beach commonly known as just Chaupati is one of the most famous public beaches in Mumbai.'
    },
    {
        "title": 'Jijamata Udyan',
        "lat": '18.979006',
        "lng": '72.83388300000001',
        "description": 'Jijamata Udyan is situated near Byculla station is famous as Mumbai (Bombay) Zoo.'
    },
    {
        "title": 'Sanjay Gandhi National Park',
        "lat": '19.2147067',
        "lng": '72.91062020000004',
        "description": 'Sanjay Gandhi National Park is a large protected area in the northern part of Mumbai city.'
    }
    ];
        window.onload = function () {
            LoadMap();
        }
        var map, mapOptions;
        function LoadMap() {
            mapOptions = {
                center: new google.maps.LatLng(19.0883595, 72.82652380000002),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);

            for (var i = 0; i < markers.length; i++) {
                var data = markers[i];
                var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: data.title
                });
            }
        };
		
		
		
   function Export() {
            //URL of Google Static Maps.
            var staticMapUrl = "https://maps.googleapis.com/maps/api/staticmap";

            //Set the Google Map Center.
            staticMapUrl += "?center=" + mapOptions.center.G + "," + mapOptions.center.K;

            //Set the Google Map Size.
            staticMapUrl += "&size=300x350";

            //Set the Google Map Zoom.
            staticMapUrl += "&zoom=" + mapOptions.zoom;

            //Set the Google Map Type.
            staticMapUrl += "&maptype=" + mapOptions.mapTypeId;

            //Loop and add Markers.
            for (var i = 0; i < markers.length; i++) {
                staticMapUrl += "&markers=color:red|" + markers[i].lat + "," + markers[i].lng;
            }

            //Display the Image of Google Map.
            var imgMap = document.getElementById("imgMap");
            imgMap.src = staticMapUrl;
            imgMap.style.display = "block";
  }
 
   ///  $('#convert').trigger('click'); 
	 document.getElementById("convert").click;
	// alert(55);
 
 
 

 
 
    </script>
    <table border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <div id="dvMap" style="width: 300px; height: 350px">
                </div>
            </td>
            <td>
                &nbsp; &nbsp;
            </td>
            <td>
                <img src="pic/demo.jpg" alt="" id="imgMap" style="display: nones" />
            </td>
        </tr>
    </table>
    <br />
    <input type="button" id="convert" value="convert" onclick="Export()" />
</body>
</html>

<?
$pic1="https://maps.googleapis.com/maps/api/staticmap?center=undefined,undefined&size=500x800&zoom=10&maptype=roadmap&markers=color:red|19.1759668,72.79504659999998";
$pic="pic/staticmap.png";

copy ("".$pic."" , "pic/555.jpg" );

file_get_contents("".$pic1."");

///  AIzaSyAcTSB6t3VJpbMLKjJGIT4M0aTer2VEHb8

//http://tudtoo

//https://maps.googleapis.com/maps/api/staticmap?center=undefined,undefined&size=500x800&zoom=10&maptype=roadmap&markers=color:red|19.1759668,72.79504659999998&markers=color:red|19.0883595,72.82652380000002&markers=color:red|18.9542149,72.81203529999993&markers=color:red|18.979006,72.83388300000001&markers=color:red|19.2147067,72.91062020000004
?>
<?php
$image = file_get_contents($pic1);
$fp  = fopen('pic/1520.png', 'w+'); 

fputs($fp, $image); 
fclose($fp); 
unset($image);


$url='http://maps.googleapis.com/maps/api/staticmap?center=undefined,undefined&size=500x800&zoom=10&maptype=roadmap&markers=color:red|19.1759668,72.79504659999998&sensor=false';

file_put_contents('filename.png',file_get_contents($url));
?>