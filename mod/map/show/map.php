<script type="text/javascript" src="js/best.js"></script>
<?
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[to] = $db->select_query("SELECT * FROM ".TB_order."  where id='".$_GET[bookid]."'");
 $arr[to] = $db->fetch($res[to]);
 
 
 
?>
 
<? if($arr[to][driver_topoint] != 0 && $arr[to][driver_topoint] != ''){ ?>
 
						  <script type="text/javascript">
						  /*
 $(document).ready(function(){
$("#ssdate_topoint<?=$arr[to][id];?>").click(function(){

alert(555);
	var url_map = "go.php?name=map&data_lat=<?=$arr[to][driver_topoint_lat];?>&data_lng=<?=$arr[to][driver_topoint_lng];?>&data_val=<?=$arr[to][driver_topoint];?>&col_name=driver_topoint";
	////$('#ulLevel').show();
 $('.modal-backdrop').remove();
	$('#load_googlemap').load(url_map);

	})
});
    */   
</script>
						  




 <a><div id="date_topoint<?=$arr[to][id];?>"  style="cursor:pointer "  data-toggle="modal" data-target="#showmap<?=$arr[to][id];?>"></a>
       <table  >
      <tr>
        <td width="25" valign="top"><img src="../iconstatus/pinmap.png" width="20" /></td>
        <td><div align="left" id="date_topiont<?=$arr[to][id];?>">
            <? 
			$arr[to][driver_topoint_date] = $arr[to][driver_topoint_date] - 25200 ;
			echo ThaiTimeConvert($arr[to][driver_topoint_date],'1','1');
			?>
        </div></td>
      </tr>
    </table>
 </div>
    <?	
}
?>

   <?  include ("bootstrap/css/css.php");?>
 <style>
 
 
 
.modal-backdrop.in {
 background-color:#000000
 
 opacity: 0.8;
	 

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
 echo $_GET[type];
 
if($_GET[type] == 'driver_topoint'){
	$type_point = "ถึงสถานที่รับแขก";
	$data_point = "topoint";
}
if($_GET[type] == 'driver_pickup'){
	$data_point = "pickup";
	if($_GET[data_val] == 1){
		$type_point = "รับแขกขึ้นรถ";
	}else{
		$type_point = "ไม่เจอแขก";
	}
}
if($_GET[type] == 'driver_complete'){
	$data_point = "complete";
	$type_point = "งานเสร็จ";
}
?>

<?=$arr[to][driver_.$data_point._lat];?> 

  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcTSB6t3VJpbMLKjJGIT4M0aTer2VEHb8&sensor=false"></script>
   
  <div class="modal fade" id="showmap<?=$arr[to][id];?>" role="dialog" style="width:100%; background:none "  aria-labelledby="myModalLabel">
        <div class="modal-dialog" style="width:100%; background-color:#FFFFFF ">

            <!-- Modal content-->
            <div class="modal-content" style="width:100%; "  >
                <div class="modal-header">
        
                    <h4 class="modal-title" style="font-size:30px "><center><?=$type_point?></center></h4>
                </div>
                <div class="modal-body">
                     <div id="map_canvas" style="width:auto; height: 450px;">ssssssss</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" data-backdrop="false">ปิดแผนที่</button>
                </div>
            </div>
        </div>
    </div>


 
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showmap<?=$arr[to][id];?>" id="autoclicks" style="display:none "> </button>

<script>
jQuery(function(){
 
 jQuery('#autoclick').click();
 ///$('.modal-backdrop').remove();
  });
 
</script>
 
<script type="text/javascript">
    function initializeMap() {
        var mapOptions = {
            center: new google.maps.LatLng(<?=$arr[to][driver_topoint_lat];?>, <?=$arr[to][driver_topoint_lng];?>),
            zoom: 20,
             
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
          mapOptions);
		  
		  

 
  
		var image = 'images/icon_map/car.png';  
		  
        var marker = new google.maps.Marker({
 
   icon: image,
            position: new google.maps.LatLng(<?=$arr[to][driver_topoint_lat];?>,<?=$arr[to][driver_topoint_lng];?>)
        });
        marker.setMap(map);
		
		var infowindow = new google.maps.InfoWindow({
 
  content:"<font style='font-size:20px'><?=$type_point;?>"
 
  });

infowindow.open(map,marker);
		
    }

    //show map on modal
    $('#showmap<?=$arr[to][id];?>').on('shown.bs.modal', function () {
        initializeMap();
    });

</script>