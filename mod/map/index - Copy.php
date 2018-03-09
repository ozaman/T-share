 <?=$_GET[data_lat]==7.9038781;?><br>
<br>
<?=$_GET[data_lng]==98.30336940000007;?>
<?
 
if($_GET[col_name] == 'driver_topoint'){
	$type_point = "ถึงสถานที่รับแขก";
}
if($_GET[col_name] == 'driver_pickup'){
	if($_GET[data_val] == 1){
		$type_point = "รับแขกขึ้นรถ";
	}else{
		$type_point = "ไม่เจอแขก";
	}
}
if($_GET[col_name] == 'driver_complete'){
	$type_point = "งานเสร็จ";
}
?> 
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcTSB6t3VJpbMLKjJGIT4M0aTer2VEHb8&sensor=false"></script>
   
  <div class="modal fade" id="myModal" role="dialog" style="width:100%; " >
        <div class="modal-dialog" style="width:100%; background-color:#FFFFF ">

            <!-- Modal content-->
            <div class="modal-content" style="width:100%; padding:-10px;"  >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Google Maps</h4>
                </div>
                <div class="modal-body">
				<?=$_GET[data_lat];?>,<?=$_GET[data_lng];?>
                     <div id="map_canvas" style="width:auto; height: 500px;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


 
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">View Map</button>



<script type="text/javascript">
 

    function initializeMap() {
        var mapOptions = {
            center: new google.maps.LatLng(<?=$_GET[data_lat];?>,<?=$_GET[data_lng];?>);
			 
            zoom: 12,
             
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
          mapOptions);
		   
 
		var image = 'images/icon_map/car.png';  
		  
        var marker = new google.maps.Marker({
 
   icon: image,
            position: new google.maps.LatLng(<?=$_GET[data_lat];?>,<?=$_GET[data_lng];?>)
        });
        marker.setMap(map);
		
		var infowindow = new google.maps.InfoWindow({
 
  content:"<font style='font-size:16px'>xax<?=$type_point;?>"
 
  });

infowindow.open(map,marker);
		
    }

    //show map on modal
    $('#myModal').on('shown.bs.modal', function () {
        initializeMap();
    });

</script>
<script type="text/javascript">

       
 
</script>