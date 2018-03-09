   <?  include ("bootstrap/css/css.php");?>
 <style>
 
 
 
.modal-backdrop.in {
 background-color:<?=$main_color?>;
 
 opacity: 1;
	 

 }
 
 .modal {
 position:fixed;
 top:0;
 left:0;
 }
 
 </style>
 
  
 <script src="plugins/jQuery/js/jquery-latest.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>

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
   
  <div class="modal fade" id="myModal" role="dialog" style="width:100%; background:none "  aria-labelledby="myModalLabel">
        <div class="modal-dialog" style="width:100%; background-color:#FFFFFF ">

            <!-- Modal content-->
            <div class="modal-content" style="width:100%; "  >
                <div class="modal-header">
        
                    <h4 class="modal-title" style="font-size:30px "><center><?=$type_point?></center></h4>
                </div>
                <div class="modal-body">
                     <div id="map_canvas" style="width:auto; height: 450px;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" data-backdrop="false">ปิดแผนที่</button>
                </div>
            </div>
        </div>
    </div>


 
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="autoclick" style="display:none "> </button>

<script>
jQuery(function(){
 
 jQuery('#autoclick').click();
 ///$('.modal-backdrop').remove();
  });
 
</script>
 
<script type="text/javascript">
    function initializeMap() {
        var mapOptions = {
            center: new google.maps.LatLng(<?=$_GET[data_lat];?>,<?=$_GET[data_lng];?>),
            zoom: 20,
             
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
 
  content:"<font style='font-size:20px'><?=$type_point;?>"
 
  });

infowindow.open(map,marker);
		
    }

    //show map on modal
    $('#myModal').on('shown.bs.modal', function () {
        initializeMap();
    });

</script>