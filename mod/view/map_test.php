<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Google Maps Sliding Marker Move Demo</title>

    <link href="map.css" rel="stylesheet" />
	
	<style>
	html, body, #map_canvas {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    font-family: "Lucida Grande", Helvetica, Arial, sans-serif;
    font-size: 12px;
}

.control {
    position: absolute;
    bottom: 28px;
    right: 6px;
    width: 200px;
    height: 78px;
    background: rgba(0,0,0,0.85);
    box-shadow: rgba(0,0,0,0.5) 0 3px 5px;
    -moz-box-shadow: rgba(0,0,0,0.5) 0 3px 5px;
    -webkit-box-shadow: rgba(0,0,0,0.5) 0 3px 5px;
    color: #fff;
    padding: 10px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
}

#controls {
    bottom: 28px;
    right: 6px;
    width: 200px;
    height: 78px;
}

#log {
    bottom: 28px;
    left: 6px;
    width: 300px;
    height: 78px;
    overflow-y: scroll;
}

#controls .row {
    overflow: hidden;
    margin-bottom: 10px;
}

#controls .row label {
    width: 60px;
    float: left;
    font-weight: bold;
    margin-right: 10px;
    line-height: 23px;
}

#controls .row select,
#controls .row input {
    width: 120px;
    float: left;
}

#controls .row input#durationOption {
    width: 113px;
}

#controls .row a {
    display: block;
    color: #7EB1FF;
    text-decoration: none;
    font-size: 10px;
}
	
	</style>
	
	
	 <? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?> 
 
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false&key= <?=$google_api?>"></script>
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="js/map/vendor/jquery.easing.1.3.js"></script>
    <script src="js/map/vendor/markerAnimate.js"></script>
    <script src="js/map/SlidingMarker.js"></script>

    <script>

        //SlidingMarker.initializeGlobally();

        var marker, map;
        function initialize() {
            var myLatlng = new google.maps.LatLng(32.520204, 34.937258);
            var mapOptions = {
                zoom: 4,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

            var contentString = '<div id="content">' +
              '<div id="siteNotice">' +
              '</div>' +
              '<h1 id="firstHeading" class="firstHeading">Uluru</h1>' +
              '<div id="bodyContent">' +
              '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
              'sandstone rock formation in the southern part of the ' +
              'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) ' +
              'south west of the nearest large town, Alice Springs; 450&#160;km ' +
              '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major ' +
              'features of the Uluru - Kata Tjuta National Park. Uluru is ' +
              'sacred to the Pitjantjatjara and Yankunytjatjara, the ' +
              'Aboriginal people of the area. It has many springs, waterholes, ' +
              'rock caves and ancient paintings. Uluru is listed as a World ' +
              'Heritage Site.</p>' +
              '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
              'https://en.wikipedia.org/w/index.php?title=Uluru</a> ' +
              '(last visited June 22, 2009).</p>' +
              '</div>' +
              '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            //marker = new google.maps.Marker({
            marker = new SlidingMarker({
                position: myLatlng,
                map: map,
                title: 'I\m sliding marker'
            });

            infowindow.open(map, marker);

            google.maps.event.addListener(marker, 'click', function () {
                infowindow.open(map, marker);
            });

            //marker.setMap(map);

            var $log = $("#log");
            google.maps.event.addListener(marker, 'position_changed', function () {
                $log.html($log.html() + "marker.position_changed<br/>");
            });

        }


        ///////////////////////////////////////////////////

        $(function () {
            initialize();

            google.maps.event.addListener(map, 'click', function (event) {
                var duration = parseInt($('#durationOption').val());

                if (duration < 0) {
                    duration = 1;
                    $('#durationOption').val(duration);
                }

                marker.setDuration(duration);
                marker.setEasing($('#easingOption').val());

                marker.setPosition(event.latLng);
            });

            var printEvent = function (instance, eventName) {
                google.maps.event.addListener(instance, eventName, function () {
                    console.log("Event: " + eventName);
                });
            };

            printEvent(marker, "click");
            printEvent(marker, "map_changed");
            printEvent(marker, "position_changed");
            printEvent(marker, "animationposition_changed");

            if (window.location.hash == "#iframe") {
                $('#backLink').hide();
                $('#controls').css('height', '55px');
            }

        });

    </script>
</head>
<body>
    <div id="map_canvas"></div>

    <div id="controls" class="control">
        <div class="row">
            <label for="easingOption">Easing:</label>
            <select id="easingOption">
                <option value="linear">linear</option>
                <option value="swing">swing</option>
                <option value="easeInQuad">easeInQuad</option>
                <option value="easeOutQuad">easeOutQuad</option>
                <option value="easeInOutQuad">easeInOutQuad</option>
                <option value="easeInCubic">easeInCubic</option>
                <option value="easeOutCubic">easeOutCubic</option>
                <option value="easeInOutCubic">easeInOutCubic</option>
                <option value="easeInQuart">easeInQuart</option>
                <option value="easeOutQuart">easeOutQuart</option>
                <option value="easeInOutQuart">easeInOutQuart</option>
                <option value="easeInQuint">easeInQuint</option>
                <option value="easeOutQuint">easeOutQuint</option>
                <option value="easeInOutQuint" selected>easeInOutQuint</option>
                <option value="easeInSine">easeInSine</option>
                <option value="easeOutSine">easeOutSine</option>
                <option value="easeInOutSine">easeInOutSine</option>
                <option value="easeInExpo">easeInExpo</option>
                <option value="easeOutExpo">easeOutExpo</option>
                <option value="easeInOutExpo">easeInOutExpo</option>
                <option value="easeInCirc">easeInCirc</option>
                <option value="easeOutCirc">easeOutCirc</option>
                <option value="easeInOutCirc">easeInOutCirc</option>
                <option value="easeInElastic">easeInElastic</option>
                <option value="easeOutElastic">easeOutElastic</option>
                <option value="easeInOutElastic">easeInOutElastic</option>
                <option value="easeInBack">easeInBack</option>
                <option value="easeOutBack">easeOutBack</option>
                <option value="easeInOutBack">easeInOutBack</option>
                <option value="easeInBounce">easeInBounce</option>
                <option value="easeOutBounce">easeOutBounce</option>
                <option value="easeInOutBounce">easeInOutBounce</option>
            </select>
        </div>
        <div class="row">
            <label for="durationOption">Duration:</label>
            <input type="number" id="durationOption" value="1000">
        </div>
        <div class="row" id="backLink">
            <a href="https://github.com/terikon/marker-animate-unobtrusive">More on github &rarr;</a>
        </div>

    </div>

    <div id="log" class="control">
    </div>

</body>
</html>