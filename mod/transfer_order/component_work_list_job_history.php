<?php 
switch ($_COOKIE['lng']){
    case "th":
        //echo "PAGE th";
        include("../../includes/lang/th/t_share.php");//include check session DE
        break;
    case "cn":
        //echo "PAGE cn";
        include("../../includes/lang/cn/t_share.php");
        break;
    case "en":
        //echo "PAGE EN";
        include("../../includes/lang/en/t_share.php");
        break;        
    default:
        //echo "PAGE EN - Setting Default";
        include("../../includes/lang/th/t_share.php");//include EN in all other cases of different lang detection
        break;
}
//	$address_form = findAddress($_POST[lat_from],$_POST[lng_from]);
//	$address_to = findAddress($_POST[lat_to],$_POST[lng_to]);
	
$date_today = date('Y-m-d')." ".$_POST[arrival_time].":00";

$time_finish =strtotime( $date_today);

$h = date('H');
date_default_timezone_set('UTC'); 
$time_start=time() + 300;
$time_complete =$time_finish-$time_start;
$today_h= date('H');
$time_open_h= date('H',$time_complete);
$time_open_m= date('m',$time_complete);
	 
	 
	 if($address_form=="" or $address_form==null){
	 	$address_form = $_POST[address_en_from];
	 }
	 
	 if($address_to=="" or $address_to==null){
	 	$address_to = $_POST[address_en_to];
	 }


?>

<div style="border: 1px solid #ddd;border-top: 4px solid #3b5998;margin-bottom:35px;box-shadow: 4px 4px 8px #ddd;margin-top: 20px;" id="box_work_<?=$_POST[id];?>"> 
	<div id="box_work2_<?=$_POST[id];?> " style="
    border: 1px solid #ddd;
    font-size: 21px;
    border-radius: 8px;
    background-color: #f7941d;
    /*width: 60px;*/
    padding: 5px 10px;
    color: #fff;
    margin-top: -25px;
    margin-left: -1px;
    position:  absolute;
"><?=$_GET[dis];?></div>
	
<div style="position: absolute;margin-top: 14px;margin-left:6px;">
   <div style="box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(76, 175, 80, 0.4);width: 25px;height: 25px;border-radius: 1px;background: #555;border-radius: 25px;"><i class="fa  fa-map-marker" style="z-index:1;color:#FFFFFF;font-size: 17px;margin-left: 8px;margin-top: 4px;"></i> </div>
   <div style="width: 2px;background: #999;margin-left: 11px;" class="line-center"></div>
   <div style="box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(76, 175, 80, 0.4);width: 25px;height: 25px;border-radius: 1px;background: #3b5998;border-radius: 25px;"><i class="fa  fa-map-marker" style="z-index:1;color:#FFFFFF;font-size: 17px;margin-left: 8px;margin-top: 4px;"></i> </div>
</div>

					<div style="margin: 10px; margin-left: 35px;">
					<div style="padding: 5px;margin-bottom:5px;">
					<p class="font-22"><strong><? echo t_pick_up_place?></strong><img src="images/icon/top/map.png" width="30" height="30" alt="" style="margin-left:10px;display: none;">
						<span style="color: #fff;display: nones;position:  absolute;right: 19px;margin-top: -13px;border: 1px solid #f7941d;padding: 0px 10px;background-color: #3f9684;border-radius: 8px;min-width:135px"><i class="icon-new-uniF13C" style="font-size: 20px; color:#fff"></i>
					<span class="font-22" id="countdown_<?=$_POST[id];?>" class="timer" >Loading...</span>
				</span></p>
					<span class="font-22" id="address_form_<?=$_POST[id];?>"><?=$address_form;?></span>
					</div>
					<div style="padding: 5px;margin-bottom:5px;">
					<p class="font-22"><strong><? echo t_drop_place?></strong><img src="images/icon/top/map.png" width="30" height="30" alt="" style="margin-left:10px;display: none;"></p>
					<span class="font-22"  id="address_to_<?=$_POST[id];?>" ><?=$address_to;?></span>
					</div>
					</div>
					<div onclick="location_place('<?=$_POST[lat_from];?>','<?=$_POST[lng_from];?>','<?=$_POST[lat_to];?>','<?=$_POST[lng_to];?>')" style="

    

    background: #009688;
    text-align: center;
    color: #fff;
    /* position: absolute; */
    /* width: 97px; */
    font-size: 18px;
    right: 25px;
    padding: 8px;
    margin-bottom: 10px !important;
    margin: 0 8px;
    border-radius: 25px;" ><? echo t_navigation?></div>
    <div style="border-radius: 25px">
    	
					<div style="

    background: #f7941d;
    margin: 0 8px;
    font-size: 20px;
    padding: 8px;
    color: #fff;
    /* margin-top: 55PX; */
    border-radius: 8px 8px 0 0;
    /* margin-top: 55PX; */"><table width="100%" border="0" cellspacing="2" cellpadding="4">
    	<tr>
      <td valign="top"><i class="fa fa-car" style="color:#666666; font-size:18px"></i></td>
      <td valign="top" class="td-text"><b><? echo t_type_of_vehicle?></b></td>
      <td valign="top" class="td-text"><span id="car_<?=$_POST[id];?>"></span><span id="pax_<?=$_POST[id];?>"></span>&nbsp;<br>
		
			
	</td>
    </tr>
    </table></div>
					<div class="timeline-body" style="

    padding-top: 5px;
    padding-bottom: 5px;
    margin: 8px;
    /* box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1); */
    border-radius: 3px;
    margin-top: 0;
    background: #dfe3ea;
    color: #444;
    /* margin-left: 60px; */
    /* margin-right: 15px; */
    padding: 0;
    position: relative;
    padding: 8px; ">
 
 



<table width="100%" border="0" cellspacing="2" cellpadding="4">
 
   
    <tr>
      <td valign="top"><i class="icon-new-uniF12B-3" style="color:#666666; font-size:18px"></i></td>
      <td valign="top" class="td-text"><b><? echo t_number_customers?></b></td>
      <td valign="top" class="td-text"><? echo t_adult?>	
	<span id="person_<?=$_POST[id];?>"></span> &nbsp;<br>
		
			
	</td>
    </tr>
    
    
   
  <tr><td valign="top"><i class="icon-new-uniF152-4" style="color:#666666; font-size:18px"></i></td>
      <td valign="top" class="td-text"><b><? echo t_phone?></b></td>
      <td valign="top" class="td-text"><b id="phone_<?=$_POST[id];?>"></b></td>
    </tr>
    		    
    
    <tr>
      <td valign="top"><i class="icon-new-uniF109-14" style="color:#666666; font-size:18px"></i></td>
      <td valign="top" class="td-text"><b><? echo t_customer_name?></b></td>
      <td valign="top" class="td-text"><span id="name_<?=$_POST[id];?>"></span></td>
  </tr>
  <tr>
      <td valign="top"><i class="icon-new-uniF121-10" style="color:#666666; font-size:18px"></i></td>
      <td valign="top" class="td-text"><b>ราคา</b></td>
      <td valign="top" class="td-text"><span id="cost_<?=$_POST[id];?>"></span><span style="margin-left: 8px">บาท</span></td>
  </tr>
  <tr>
      <td valign="top"><i class="icon-new-uniF109-14" style="color:#666666; font-size:18px"></i></td>
      <td valign="top" class="td-text"><b><? echo t_voucher_number?></b></td>
      <td valign="top" class="td-text"><span id="vocher_<?=$_POST[id];?>"></span></td>
    </tr>
   
</table> </div>
</div>
					
					<div style="margin: 15px 20px;">
						<button style="background-color: #fff;border: 1px solid #f39c12;width: 100%;border-radius: 25px;padding:8px;color: #f39c12;" onclick="ViewDetail('<?=$_POST[id];?>');" ><span class="font-22"><strong><? echo t_details?></strong></span> </button>
						
						<!-- <button onclick="selectjob(<?=$_POST[id];?>)" style="margin-top:10px;background-color: #fff;border: 1px solid #3b5998;width: 100%;border-radius: 25px;padding: 8px;color: #3b5998; "><span class="font-22"><strong>รับงาน</strong></span> </button> -->
					
					</div>
	<div>		
	<input type="hidden" value="<?=$_POST[lat_from];?>" id="from_lat_<?=$_POST[id];?>"/>
	<input type="hidden" value="<?=$_POST[lng_from];?>" id="from_lng_<?=$_POST[id];?>"/>

	<input type="hidden" value="<?=$_POST[lat_to];?>" id="to_lat_<?=$_POST[id];?>"/>
	<input type="hidden" value="<?=$_POST[lng_to];?>" id="to_lng_<?=$_POST[id];?>"/>

	<input type="hidden" value="<?=$time_complete;?>" id="time_<?=$_POST[id];?>"/>
	</div>
</div>

<script>
	// console.log('++++++++++++++++++++++++')
	// var a = <?=$_GET[dis];?>;
 //        var b = <?=$_GET[du];?>;
 //        console.log(a)
 //        console.log(b)
	console.log('++++++++++++++++++++++++')

	var url_form = "https://maps.googleapis.com/maps/api/geocode/json?latlng=<?=$_POST[lat_from];?>,<?=$_POST[lng_from];?>&sensor=true&language=<?=$_COOKIE["lng"];?>";  
	$.post( url_form, function( data ) { 
		console.log(data);
		
		if(data.status!="OK"){
			$('#address_form_<?=$_POST[id];?>').text('<?=$_POST[address_en_from];?>');
			return;
		}
		$('#address_form_<?=$_POST[id];?>').text(data.results[0].formatted_address);
	});
	
	var url_to = "https://maps.googleapis.com/maps/api/geocode/json?latlng=<?=$_POST[lat_to];?>,<?=$_POST[lng_to];?>&sensor=true&language=<?=$_COOKIE["lng"];?>";  
	$.post( url_to, function( data ) { 
		console.log(data);
		
		if(data.status!="OK"){
			$('#address_to_<?=$_POST[id];?>').text('<?=$_POST[address_en_to];?>');
			return;
		}
		$('#address_to_<?=$_POST[id];?>').text(data.results[0].formatted_address);
	});
			// console.log(obj);
			// console.log("---------obj----------------")
			  	 // console.log(value)

// function location_place(lat_f,lng_f,lat_t,lng_t){
// 	console.log(lat_f)
// 	console.log(lng_f)
// 	console.log(lat_t)
// 	console.log(lng_t)
// 	 // var x = document.getElementById("myFrame").src;
//   //   document.getElementById("demo").innerHTML = x;
// 	// https://www.google.com/maps/embed/v1/directions?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&destination="+i.TB_transferplace_topic+"&origin="+$scope.latituderel+","+$scope.longituderel+"&center="+$scope.latituderel+","+$scope.longituderel+"&avoid=tolls|highways&zoom=12?hl="+$scope.checklang
// $("#main_load_mod_popup_1" ).toggle();
// 	// $('#main_load_mod_popup_1').show()
// 	// $('#button-close-popup-mod-1').click()
// }
	
</script>

<!-- <script>
	console.log('****************')

			  
			  console.log($('#lat').val())
			  console.log($('#lng').val())
			  console.log('****************')
			   var froms = {
            lat: parseFloat($('#lat').val()),
            lng: parseFloat($('#lng').val())
        };
        bookplace = froms;
        var a = <?=$_POST[lat_from];?>;
        var b = <?=$_POST[lng_from];?>;
        console.log(a)
        console.log(b)
        var current = {
            lat: parseFloat(a),
            lng: parseFloat(b)
        };
        taxistart = current;

        var request = {
            origin: bookplace,
            destination: taxistart,
            travelMode: google.maps.TravelMode.DRIVING
        };
        console.log(request);
        directionsService = new google.maps.DirectionsService;
        directionsDisplay = new google.maps.DirectionsRenderer();
       
        directionsService.route(request, function(response, status) {
            console.log(response);
            console.log(status);
            if (status == 'ZERO_RESULTS') {
                
                $('#no_pin_pop').show(500)
            } else{
            	distance = response.routes[0].legs[0].distance.text;
                duration = response.routes[0].legs[0].duration.text;
                console.log(response.routes[0].legs[0].end_location.lat())
                console.log(response.routes[0].legs[0].end_location.lng())
                lat_t = response.routes[0].legs[0].end_location.lat();
                lng_t = response.routes[0].legs[0].end_location.lng();

                var radlat1 = Math.PI * lat_f / 180
                var radlat2 = Math.PI * lat_t / 180
                var theta = lng_f - lng_t;
                var radtheta = Math.PI * theta / 180
                dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
                dist = Math.acos(dist)
                dist = dist * 180 / Math.PI
                dist = dist * 60 * 1.609344;
                console.log('***********')
                console.log(distance)
                console.log(duration)
    
                $('#box_work2_<?=$_POST[id];?>').text(distance);
                
            }
        });
</script> -->
<?php 
/// fucntion php
function findAddress($lat,$lng) {
    
	$url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lng."&sensor=true&language=".$_COOKIE["lng"];  
	
	$headers = array();
	$headers[] = 'Content-Type: application/json';
	$headers[] = 'API-KEY: ea1b6d331a20b66041369a63251410d4ec748f27';
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
	curl_setopt($curl, CURLOPT_HTTPHEADER , array(
	     'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
	));
	curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($curl, CURLOPT_REFERER, $url);
	curl_setopt($curl, CURLOPT_URL, $url);  

	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
	$curl_response = curl_exec($curl);

	curl_close($curl);

	$message = iconv("incoming-charset", "utf-8", $curl_response);
	$aaaa = json_decode($curl_response);

    
    return $aaaa->results[0]->formatted_address;
}
?>	