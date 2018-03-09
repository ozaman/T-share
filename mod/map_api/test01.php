
<style>
	html,
body,
#map_canvas {
  height: 100%;
  width: 100%;
  margin: 0px;
  padding: 0px
}
.marker {
  width: 100px;
  height: 100px;
  position: absolute;
  top: -50px;
  /*positions our marker*/
  left: -50px;
  /*positions our marker*/
  display: block;
}
.pin {
  width: 20px;
  height: 20px;
  position: relative;
  top: 38px;
  left: 38px;
  background: rgba(5, 124, 255, 1);
  border: 2px solid #FFF;
  border-radius: 50%;
  z-index: 1000;
}
.pin-effect {
  width: 100px;
  height: 100px;
  position: absolute;
  top: 0;
  display: block;
  background: rgba(5, 124, 255, 0.6);
  border-radius: 50%;
  opacity: 0;
  animation: pulsate 2400ms ease-out infinite;
}
@keyframes pulsate {
  0% {
    transform: scale(0.1);
    opacity: 0;
  }
  50% {
    opacity: 1;
  }
  100% {
    transform: scale(1.2);
    opacity: 0;
  }
}
</style>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90"></script>
<script src="https://cdn.rawgit.com/googlemaps/js-rich-marker/gh-pages/src/richmarker.js"></script>
<div id="map_canvas"></div>
<div id="marker" display="hidden" class="marker">
  <div class="pin"></div>
  <div class="pin-effect"></div>
</div>

<script>
initialize();
	function initialize() {
  var map = new google.maps.Map(
    document.getElementById("map_canvas"), {
      center: new google.maps.LatLng(37.4419, -122.1419),
      zoom: 13,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
  var polyline = new google.maps.Polyline({
    map: map,
    path: []
  })
  var div = document.getElementById("marker"); // document.createElement('DIV');
  // div.innerHTML = '<div class="my-other-marker">I am flat marker!</div>';
  var marker2 = new RichMarker({
    map: map,
    position: map.getCenter(),
    draggable: true,
    flat: true,
    anchor: RichMarkerPosition.MIDDLE,
    content: div
  });
/*  polyline.getPath().push(marker2.getPosition());
  var angle = 0;
  setInterval(function() {
    angle += 5;
    angle %= 360;
    marker2.setPosition(google.maps.geometry.spherical.computeOffset(map.getCenter(), 1000, angle));
    polyline.getPath().push(marker2.getPosition());
  }, 2000);*/

}
//google.maps.event.addDomListener(window, "load", initialize);
</script>