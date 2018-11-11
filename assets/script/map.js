var click_save_place_txt;
var lang_to_map;
var lng_distance, lng_usetime;
var choose;
var success;
var error;
var map; //main map
var marker2; // current position
var markerPlaceOfften; // for pan to place offten
var markerCircle; // point cerrtent locatont
var startMarker, pin; // img marker
var pos; // current location (lat,lng)
var geocoder;
var endMarker; //result end place
var placeStart = [];
var placeEnd = [];
var infowindow = null;
var infowindowDetailTravel = null;
var lat_f, lng_f, lat_t, lng_t;
var check = 0;
var directionsDisplay, directionsService;
var start;
var end;
var geocoder;
var intervalTime; // animate
var options;
var markerTest;
var checkshow = false;
var datacaedervice,dataRel;
var dataPlacefrom;
var dataPlaceto;
var homecheck = false;
var officecheck = false;
var regularcheck = false;
var sHome =0;
var sOffice = 0;
var sRegular = 0;
var dataHome = [];
var dataOffice = [];
var dataRegular = [];
var DataType = [];
var changename= '';
var chTypeplace;
var id_edit_often;
var namesend = '';
var dist;
var phonesend;
var changephone = '';
var getnewnamenull;
var changephone = '';
var curentFromTo = '';
var getnewphonenull = '';
var typeFrom = '';
var typeTo = '';
var lng_price;
var addr;
var please_login_txt;
if ($.cookie("lng") == 'cn') {
    please_login_txt = "请登录";
    click_save_place_txt = "没有记录 (按保存)";
    lang_to_map = 'zh-CN';
    lng_distance = '距离';
    lng_usetime = '使用时间';
    search_position = '找到一个位置';
    choose = '选择';
    lng_price = '价格';

    

    success = '成功';
    error = '错误';
} else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH') {
    please_login_txt = "กรุณาเข้าสู่ระบบ";
    click_save_place_txt = "ไม่มีบันทึก (กดเพื่อบันทึก)";
    lang_to_map = 'th';
    lng_distance = 'ระยะทาง';
    lng_usetime = 'ใช้เวลา';
    choose = 'เลือก';
    search_position = 'ค้นหาตำแหน่ง';
    lng_price = 'Price';
    success = 'สำเร็จ';
    error = 'ผิดพลาด';
} else if ($.cookie("lng") == 'en' || $.cookie("lng") == undefined) {
    please_login_txt = "Please login";
    click_save_place_txt = "No record (Click to save)";
    lang_to_map = 'en';
    lng_distance = 'Distance';
    lng_usetime = 'Use time';
    choose = 'Choose';
    success = 'success';
    error = 'error';
    lng_price = 'Price';    
    search_position = 'Find a location';  
} 

if ($.cookie("login") == undefined) {
    $('.lng-save_home_place').html(please_login_txt);
    $('.lng-save_Office_place').html(please_login_txt);
    $('.lng-save_regularly_place').html(please_login_txt);
    
} else {
    $('.lng-save_home_place').html(click_save_place_txt);
    $('.lng-save_Office_place').html( click_save_place_txt);
    $('.lng-save_regularly_place').html( click_save_place_txt);    
}
$('#open_map').on('click', initialize);
$('#open_map').click(function() {
    console.log('Now Open Map!');
});

function showHeader() {
    $('#btn-real-res').show(700);
    $('#sectionsNav').show();
    $('.box-menu-select').show();
}

function outSearchRealtime() {
    $('#out-search').hide();    
    $('#search-raeltime').css('position', 'absolute');
    $('#search-raeltime').removeClass('box-shadow-customize');    
    $("#boxForAutoCom").hide();
    setTimeout(function() {
        $('.box-menu-select').show();
        $('#sectionsNav').show();
    }, 200);
    $('#outNearby').click();
}
$('.box_option').click(function(){
    if(checkshow == false){
        $("#boxForAutoCom").show(500)
        checkshow = true;
    }
    else{
        $("#boxForAutoCom").hide(500)      
        checkshow = false;
    }    
})

$('#pac-input').focus(function() {
    curentFromTo = 'To';
    console.log(curentFromTo)
    $(this).val('');            
    $('#search-raeltime').addClass('box-shadow-customize');
    $('#current').removeClass('search_focus');
    $('#pac-input').addClass('search_focus'); 
    $('#boxRealtime').css('padding', '0 0px');
    $('#out-search').show(650);    
    $(".pac-container").each(function(index) {
        console.log(index)
        $(this).attr("id", "listPleacItem_" + index);
    });
    $('#listPleacItem_0').appendTo('#appendBox');
    $('#listPleacItem_1').appendTo('#appendBox');
    $('#listPleacItem_2').appendTo('#appendBox');
});


$('#current').focus(function() {
    curentFromTo = 'From';
    console.log(curentFromTo)
    $('#current').addClass('search_focus');
    $('#pac-input').removeClass('search_focus');
    checkshow = true;
    $('#search-raeltime').addClass('box-shadow-customize');
    $('#boxRealtime').css('padding', '0 0px');
    $('#out-search').show(650);
    $(".pac-container").each(function(index) {
        $(this).attr("id", "listPleacItem_" + index);
    });
    $('#listPleacItem_0').appendTo('#appendBox');
    $('#listPleacItem_1').appendTo('#appendBox');
});


/********************************* */
/*************input from to ****** */
/********************************* */
$('#current').keyup(function() {    
    inputcheck = document.getElementById("current");     
    console.log(inputcheck.value)
    if(inputcheck.value == ''){
        $('#boxForAutoCom').show(500)
    }
    else{
        $('#boxForAutoCom').hide(500)
    }
});

$('#pac-input').keyup(function() {    
    inputcheck3 = document.getElementById("pac-input");   
    console.log(inputcheck3.value)
    if(inputcheck3.value == ''){
        $('#boxForAutoCom').show(500)
    }
    else{
        $('#boxForAutoCom').hide(500)
    }
});
$('#often-input2').keyup(function() {    
    inputcheck2 = document.getElementById("often-input2");
    console.log(inputcheck2.value)
});
$('#often-input2').focus(function() {
    $(this).val('');        
    $(".pac-container").each(function(index) {
        console.log(index)
        $(this).attr("id", "listPleacItem_" + index);
    });    
    $('#listPleacItem_0').appendTo('#appendBoxoften');
    $('#listPleacItem_1').appendTo('#appendBoxoften');
}); 
$('#often-input2').keyup(function() {    
    inputcheck2 = document.getElementById("often-input2");
    console.log(inputcheck2.value)
});
$("#nearbyId").click(function() {
    $('#otherBox').hide();
    $('#outNearby').show(500)
    $('#showNearbyPlace').show(500);
});

$("#outNearby").click(function() {
    $(this).hide(500)
    $('#showNearbyPlace').hide();
    $('#otherBox').show(500);

});
$("#outselect_often").click(function() {
    $(this).hide(500)
    $('#select_often').hide();
    $('#otherBox').show(500);

});
$("#outedit_often").click(function() {
    $(this).hide(500)
    $('#edit_often').hide();
    $('#otherBox').show(500);
    placeRecord();

});
$(".icon-close").click(function() {
    $('#no_pin_pop').hide(500)
    $('#clear-all').click();
});

$("#currentPosId").click(function() {
    console.log(curentFromTo)    
    $('#boxForAutoCom').hide(500)    
    if (curentFromTo == 'From') {
        typeFrom = addr;
        $('#locationfrom').html(addr)
        start = pos;
        console.log(currentPosId)
        console.log(pos)
        console.log(start)
        selectMyPlace('current', addr, start.lat, start.lng)    
    }
    else{
        end = pos;
        typeTo = addr;
        $('#locationto').html(addr)
        
        checkshow = false;
        console.log(lat_f)
        console.log(lng_f)
        selectMyPlace('current', addr, end.lat, end.lng)
    }
});

function initialize() {
    var mapMinZoom = 13;
    var mapMaxZoom = 18;
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 7.9038781, lng: 98.3033694 },
        zoom: 12,
        mapTypeControl: false,
        mapTypeId: 'roadmap',
        //          gestureHandling: 'coopergreedyative'
        gestureHandling: 'greedy',
        streetViewControl: false,
        fullscreenControl: false,
        styles: [{
            "featureType": "administrative",
            "stylers": [{
                "weight": 2
            }]
        },
        {
            "featureType": "landscape",
            "stylers": [{
                "color": "#efefef"
            }]
        },
        {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [{
                "color": "#d3d3d3"
            }]
        },
        {
            "featureType": "landscape",
            "elementType": "labels.text",
            "stylers": [{
                "color": "#595959"
            },
            {
                "weight": 3.5
            }
            ]
        },
        {
            "featureType": "landscape",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#ffffff"
            }]
        },
        {
            "featureType": "road",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#c0c0c0"
            }]
        }
        ]

    });   
    a(map);
}
function successCallback(){
    console.log('a888')
}
function errorCallback(){
    console.log('a8xxxx88')
}
function a(map) {
     modal.hide();
    createAllMarker();
    google.maps.event.addListener(map, 'dragend', function() {
        $('#btn_CurrentLocation').show('500');
    });
    console.log('aaaaaaaaaaaaaaaaaaaaaaaaaa')
    console.log(navigator.geolocation)
    // navigator.geolocation.getCurrentPosition(successCallback,errorCallback,{timeout:10000});
    if (navigator.geolocation) {
        options = { enableHighAccuracy: true, timeout: 10000 };
        navigator.geolocation.getCurrentPosition(function(position, status) {
            pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            start = pos; 
            console.log('aaaaaaaaaaaaaaaaaaaaaaaaaa')
            console.log(start);           
            markerCircle.setPosition(pos);
            var curPosition = new google.maps.LatLng(pos);
            console.log(map.getCenter());
            /*  markerTest.setPosition(curPosition);*/
            map.setCenter(pos);
            $('#marker').show();

            $('.btn-realtime').click();

            geocoder = new google.maps.Geocoder;
            latitude = position.coords.latitude;
            longitude = position.coords.longitude;
            lat_f =position.coords.latitude;
            lng_f =position.coords.longitude;            
            console.log(lat_f);
            console.log(lng_f);
            var latlng = { lat: parseFloat(latitude), lng: parseFloat(longitude) };
            geocoderRun(latlng);
            var id = 0,
            target;
        });
    }

    function success(position) {
        console.log(start);
        var current = {
            lat: parseFloat(position.coords.latitude),
            lng: parseFloat(position.coords.longitude)
        };
        var radlat1 = Math.PI * current.lat / 180
        var radlat2 = Math.PI * pos.lat / 180
        var theta = current.lng - pos.lng;
        var radtheta = Math.PI * theta / 180
        var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        dist = Math.acos(dist)
        dist = dist * 180 / Math.PI
        dist = dist * 60 * 1.609344;
        var m = dist * 1000;
        console.log(m);
        //		if( JSON.stringify(current) != JSON.stringify(start) ){
            if (m > 50) {
                console.log(current);
                console.log(start);
                pos = current;
                start = pos;
                var curPosition = new google.maps.LatLng(pos);
            //            markerTest.setPosition(curPosition);
            markerCircle.setPosition(curPosition);
            // 			map.panTo(pos);
            geocoderRun(pos);
        }
    };

    function error(err) {
        console.warn('ERROR(' + err.code + '): ' + err.message);
    };


    var inputStart = document.getElementById("current");
    inputStart.addEventListener('click', function() {
        document.getElementById("current").value = "";
        start = null;
        console.log(start);
        $('#boxForAutoCom').show(500)
    });
    


    /************************************************************************ */
    /***********************AUTO COMMPLETE SEARCH LOCATION******************* */
    /************************************************************************ */
    var inputsearch = document.getElementById('often-input2');
    
    var autocompletesearch = new google.maps.places.Autocomplete(inputsearch);
    autocompletesearch.bindTo('bounds', map);
    /*******AUTO SEARCH******** */
    autocompletesearch.addListener('place_changed', function(ev) {       
       placesearch = [];           
       placesearch = autocompletesearch.getPlace();
       map.panTo(placesearch.geometry.location);           
       var current = {
        lat: parseFloat(placesearch.geometry.location.lat()),
        lng: parseFloat(placesearch.geometry.location.lng())
    };           
    startMarker.setVisible(true);
    startMarker.setPosition(start);
    var latlng = new google.maps.LatLng(placesearch.geometry.location.lat(), placesearch.geometry.location.lng());
    
    map.panTo(latlng);
    markerCircle.setPosition(latlng);
    smoothZoom(map, 15, map.getZoom());
});
    var autocompleteStart = new google.maps.places.Autocomplete(inputStart);
    autocompleteStart.bindTo('bounds', map);

    /*******AUTO FROM******** */
    autocompleteStart.addListener('place_changed', function(ev) {
        lat_f = '';
        lng_f = '';
        start = '';
        placeStart = [];
        placeStart = autocompleteStart.getPlace();
        console.log(placeStart)
        map.panTo(placeStart.geometry.location);
        var current = {
            lat: parseFloat(placeStart.geometry.location.lat()),
            lng: parseFloat(placeStart.geometry.location.lng())
        };
        start = current;
        console.log()
        startMarker.setVisible(true);
        startMarker.setPosition(start);
        lat_f = placeStart.geometry.location.lat();
        lng_f = placeStart.geometry.location.lng();       
        console.log('*********************AUTO FROM************************')
        console.log(start);
        console.log(lat_f);
        console.log(lng_f);
        console.log(lat_t);
        console.log(lng_t);
        console.log($('#current').val())
        typeFrom = $('#current').val();
        $('#locationfrom').html($('#current').val())
        console.log('********************************************************')
        $('#clear-all').show(500);
    });
    var inputEnd2 = document.getElementById('pac-input');
    inputEnd2.addEventListener('click', function() {
        End = null;
        console.log(End);
        $('#boxForAutoCom').show(500)
    }); 
    var autocomplete = new google.maps.places.Autocomplete(inputEnd2);
    console.log(autocomplete)
    autocomplete.bindTo('bounds', map);

    /*******AUTO TO***** */    
    autocomplete.addListener('place_changed', function() {
        lat_t = '';
        lng_t = '';
        end = '';
        var place = autocomplete.getPlace();
        placeEnd = place;
        if (place.geometry.viewport) {
            map.fitBounds(placeEnd.geometry.viewport);
            map.setZoom(16);
        } else {
            map.setCenter(placeEnd.geometry.location);
            map.setZoom(16); // Why 17? Because it looks good.
        }
        end = placeEnd.geometry.location;
        endMarker.setVisible(true);
        endMarker.setPosition(end);
        //      var origin = new google.maps.LatLng(start);
        console.log(start);
        var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode.DRIVING
        };
        console.log(request);
        directionsService = new google.maps.DirectionsService;
        directionsDisplay = new google.maps.DirectionsRenderer();
        directionsDisplay.setMap(map);
        directionsService.route(request, function(response, status) {
            console.log(response);
            console.log(status);
            if (status == 'ZERO_RESULTS') {
                // alert('no Directions Display');
                $('#no_pin_pop').show(500)
            } else {
                var distance = response.routes[0].legs[0].distance.text;
                var duration = response.routes[0].legs[0].duration.text;
                console.log(response.routes[0].legs[0].end_location.lat())
                console.log(response.routes[0].legs[0].end_location.lng())
                lat_t = response.routes[0].legs[0].end_location.lat();
                lng_t = response.routes[0].legs[0].end_location.lng();
                console.log('*********************AUTO FROM************************')
                $('.typerel').remove();
                console.log(start)
                console.log(end)
                console.log(lat_f);
                console.log(lng_f);
                console.log(lat_t);
                console.log(lng_t);
                typeTo = $('#pac-input').val();
                $('#locationto').html($('#pac-input').val()) 
                console.log('********************************************************')
                var radlat1 = Math.PI * lat_f / 180
                var radlat2 = Math.PI * lat_t / 180
                var theta = lng_f - lng_t;
                var radtheta = Math.PI * theta / 180
                dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
                dist = Math.acos(dist)
                dist = dist * 180 / Math.PI
                dist = dist * 60 * 1.609344;
                // $('#edit_pin_pop').show(500);                
    //             ons.notification.alert({
    //   message: '',
    //   title: "เส้นทางที่คุณเลือกถูกต้องหรือไม่?",
    //   buttonLabel: "ตกลง"
    // })
    //         .then(function () {
    //           $('#car_type').focus();
    //           location.href = "#box_car";
    //         });
             func_firstsearch();
              infowindowDetailTravel = new google.maps.InfoWindow({ maxWidth: 200 });
                infowindowDetailTravel.setContent('<div><p> ' + lng_distance + ' ' + distance + '</p><p>' + lng_usetime + ' ' + duration + '</p></div>');
                infowindowDetailTravel.open(map, endMarker);
                directionsDisplay.setDirections(response);
                directionsDisplay.setOptions({
                    suppressMarkers: true,
                    preserveViewport: true
                });
                if (response.routes[0].legs[0].distance.value >= 25000) {
                    map.setZoom(9);
                } else {
                    map.setZoom(12);
                }
                $('#clear-all').show(500);
                outSearchRealtime(); 
            }
        });
    });
}
function func_firstsearch() {
     ons.openActionSheet({
    title: 'เส้นทางที่คุณเลือกถูกต้องหรือไม่?',
    cancelable: true,
    buttons: [
      {
        label: 'แก้ไขเส้นทางใหม่',
         modifier: 'destructive'
      },
      {
        label: 'ถูกต้อง',
        icon: 'md-close'
       
        
      }
    ]
  }).then(function (opt) {
    if (opt == 0) {
        // btn_yes_position()
     btn_no_position();
            
    }
    else{
        btn_yes_position()
        // ;
    }
    // btn_no_position();

    // btn_yes_position()
   console.log('opt: ', opt) 
})
     
}
function btn_no_position(){
    $('#clear-all').click();
    // $('#edit_pin_pop').hide(500)    
}
function btn_yes_position(){
    // $('#edit_pin_pop').hide(500)
    console.log(lat_f)
    console.log(lng_f)
    console.log(dist)
    console.log(lat_t)
    console.log(lng_t)
    
    console.log(lat_f+"===="+lng_f+"===="+dist+"===="+lat_t+"===="+lng_t)
    getProduct(lat_f, lng_f, dist, lat_t, lng_t);
}
function geocoderRun(latlng) {
    geocoder.geocode({ 'location': latlng }, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            if (results[1]) {
                placeStart = results;
                console.log(placeStart)
                addr = placeStart[1].formatted_address;
                $('#current').val(addr)
            // alert(addr)
        }
    } else {
        if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
            setTimeout(function() { console.log(status) }, 9000);
        }
    }
});
    nearbyPlace(map, latlng, "");
    filterPlace(map, latlng);
}
$('#btn_CurrentLocation').click(function() {
    var i = 0;
    var animationInterval = setInterval(function() {
        if (i == 1) {
            i = 0;
            $('#btn_CurrentLocation').css("color", 'rgb(35,35,35)');
            console.log(1);
        } else {
            i = 1;
            $('#btn_CurrentLocation').css('color', 'rgb(170,170,170)');
            console.log(2);
        }
    }, 500);
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            map.panTo(latlng);
            markerCircle.setPosition(latlng);
            setTimeout(function() {
                document.getElementById("current").value = placeStart[1].formatted_address;
                typeFrom = placeStart[1].formatted_address;
                console.log(typeFrom)
                smoothZoom(map, 15, map.getZoom());
                //	          map.setZoom(16);
                $('#btn_CurrentLocation').hide('500');
                $('#btn_CurrentLocation').css('color', 'rgb(35,35,35)');
            }, 1000)
            clearInterval(animationInterval);
            $('#btn_CurrentLocation').css('color', 'rgb(0,132,212)');
        });
    } else {
        clearInterval(animationInterval);
        $('#btn_CurrentLocation').css('color', 'rgb(35,35,35)');
    }
});

$('#clear-all').click(function() {
    $('#pac-input').val('');
    $('#current').val('');
    $('#locationfrom').val('');
    $('#locationto').val('');    
    console.log(placeStart);
    $('.a-link-item').remove();
    $('.not-found').remove();
    $('.typerel').remove();
    $('#search-often').hide(500)
    $('#boxRealtime').show(500)
    curentFromTo ='';
    resetMap();
});

function getProduct(lat_f, lng_f, dist, lat_t, lng_t) {
    var notfound;
    console.log('in case')
    compae1private = [];
    compae1join = [];
    $('#get_history_pop').hide()
    console.log(lat_f+'-'+lng_f+'-'+dist+'-'+lat_t+'-'+lng_t)
    if ($.cookie("lng") == 'cn') {
        notfound = '产品没有找到';
    } else if ($.cookie("lng") == 'en' || $.cookie("lng") == undefined) {

        notfound = 'Product not Found';
    } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH') {
        notfound = 'ไม่พบผลิตภัณฑ์';

    }
    var id_placefrom, id_placeto;
    $.ajax({
        type: 'POST',
        url: base_url_tr+'service/getPlaceId.php',
        data: { 'lat_c': lat_f, 'lng_c': lng_f },
        //contentType: "application/json",
        dataType: 'json',
        success: function(data) {
            console.log(data)
            id_placefrom = data.id;
        }
    });

    $.ajax({
        type: 'POST',
        url: base_url_tr+'service/getPlaceId.php',
        data: { 'lat_c': lat_t, 'lng_c': lng_t },
        //contentType: "application/json",
        dataType: 'json',
        success: function(data) {
            console.log(data)
            
            id_placeto = data.id;
        }
    });

    $.ajax({
        type: 'POST',
        url: base_url_tr+'service/servicereltime.php',
        data: { 'lat_f': lat_f, 'lng_f': lng_f, 'distance': dist, 'lat_t': lat_t, 'lng_t': lng_t },
        //contentType: "application/json",
        dataType: 'json',
        success: function(data) {
            console.log(data);
            dataPlacefrom = data[0].data1.from;
            dataPlaceto = data[0].data1.to;
            parame = { "place_default": data[0].data1.from, "place_default_to":data[0].data1.to};
            console.log(parame)
            $.ajax({
                type: 'POST',
                url: base_url_tr+'service/service.php',
                data: parame,
                //contentType: "application/json",
                dataType: 'json',
                success: function(data2) {
                    console.log(data2)
                    dataRel = data2
                    console.log(data2.length)
                    console.log(data2.status)
                    console.log(data2.size)
                    $('.a-link-item').remove();
                    $('.not-found').remove();
                    $('.typerel').remove();
                    $('.typeservice').remove();
                    if (data2.status == '200. bad request' || data2.size == 0) {
                        $('#ul-header2').css('display', 'block');
                        $('#container-product').css('display', 'block');
                        $('#loading').css('display', 'block');
                        setTimeout(function() {
                            $('#loading').css('display', 'none');

                            
                            $("#pro-search").slideDown('4000');
                            $('#box-pax-rel').show(500)
                            $('#firstrel').hide()                      
                            $('#paxrel').append('<div class="not-found">' + notfound + '</div>');
                            $('#search-from').val('');
                            $('#search-to').val('');
                            $('#typeFrom').html(typeFrom)                
                            $('#typeTo').html(typeTo) 
                        }, 2000);
                    } else {
                        $('#firstrel').show() 
                        $('#ul-header2').css('display', 'block');
                        $('#container-product').css('display', 'block');
                        $('#loading').css('display', 'block');
                        setTimeout(function() {

                            $('#loading').css('display', 'none');
                            
                            $("#pro-search").slideDown('4000');
                            $("#pro-search").animate({ 'margin-top': '0vh' });
                        }, 2000);
                        var cartype;
                        data1 = data2.data1;
                        cartype = data2.car_topic;
                        console.log(data1)
                        console.log(cartype)
                        var datasort = new Array()
                        $.each(cartype, function(i, val) {
                            datasort.push(cartype[i])
                        });                
                        datasort.sort(function(a, b){return a.person-b.person});
                        console.log(datasort)
                        $('#get_history_pop').hide()
                        $('#get_historylist_pop').hide()                
                        $('#box_pax_rel').show()
      //                    ons.createElement('dialog.html', { append: true })
      // .then(function(dialog) {
      //   dialog.show();
      // });
                        if(check_his == true){                   
                            console.log(his_place_from)
                            console.log(his_place_to)
                            $('#typeFrom').html(his_place_from);
                            $('#typeTo').html(his_place_to); 
                            check_his = false; 
                        }
                        else{                   
                            $('#typeFrom').html(typeFrom)                
                            $('#typeTo').html(typeTo)    
                            
                        }
                        $.each(datasort, function(i, val) {
                            var index2 = parseInt(i) + 1;
                            var type,typeshow,pax;
                            type = datasort[i].pax_id;
                            if ($.cookie("lng") == 'cn') {
                                $('#select_pax_use').html( '所有類型')
                                typeshow = datasort[i].car_topic_cn;
                                pax = datasort[i].pax_cn;
                            } else if ($.cookie("lng") == 'en' || $.cookie("lng") == undefined) {
                                $('#select_pax_use').html( 'All Type')                   
                                typeshow = datasort[i].car_topic_en;
                                pax = datasort[i].pax_en;
                            } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH') {
                                $('#select_pax_use').html( 'ทุกประเภท')
                                typeshow = datasort[i].car_topic_th;
                                pax = datasort[i].pax_th;
                            }
                            console.log(type)
                            console.log(datasort)
                            $('#paxrel').append('<li class="typerel" id="typeservice'+datasort[i].pax_id+'"  onclick="sendpaxrel(\'' + datasort[i].pax_id + '\') "><span>' + typeshow + '</span>&nbsp;<span class="pax-person" >' + pax + '</span><div style="float: right;display: inline-block;"><span style="padding-right: 5px;">'+lng_price+':'+'</span>'+datasort[i].cost_a+'</div></li>');
                            
                        });
                        $.each(data1, function(i, val) {
                            if (data1[i].type == 'Private') {
                                compae1private.push(data1[i])
                            }
                            if (data1[i].type == 'Join') {
                                compae1join.push(data1[i])
                            }
                        })
                        console.log(compae2private.length)
                        if (compae1join.length == 0 && compae1private.length != 0) {
                            $('#join-btn').hide();
                            $('#private-btn').css('width', '100%');

                        }
                        if (compae1private.length == 0 && compae1join.length != 0) {
                            $('#private-btn').hide();
                            $('#join-btn').css('width', '100%');
                            $('#private').hide();
                            $('#join').show();
                            $('#join-btn').css({ "background-color": "#3b5998", "color": "#fff" }
                                );
                        }
                        if(compae1private.length != 0 && compae1join.length != 0 ){
                            $('#private-btn').show();
                            $('#join-btn').show();
                    // $('#join-btn').css({ "background-color": "#16b3b1", "color": "#fff" }
                }
                if(compae1join.length == 0 && compae1private.length == 0){
                    $('#box-pax-rel').hide();
                    $('#select_pax_use').hide();
                }
                console.log(data.length)
                dataproduct = data;
                var urlicon = 'https://dotdotdottrip.com/files/images/carmodelicon/';               
                var car_topic, cartype, pax,lngcapacityinfo,lngfacilities ;
                // $.each(compae1private, function(i, val) {
                //     var indexs = parseInt(i) + 1;
                //     if ($.cookie("lng") == 'cn') {
                //         car_topic = compae1private[i].topic_cn;
                //         cartype = compae1private[i].car_topic_cn;
                //         pax = compae1private[i].pax_cn;
                //         lngbook = '預訂';
                //         lngcapacityinfo = '車容量';
                //         lngdetails = '细节';
                //         lngfacilities = '设施';
                //     } else if ($.cookie("lng") == 'en') {
                //         car_topic = compae1private[i].topic_en;
                //         cartype = compae1private[i].car_topic_en;
                //         pax = compae1private[i].pax_en;
                //         lngbook = 'Book';
                //         lngcapacityinfo = 'Capacity';
                //         lngdetails = 'details';
                
                //         lngfacilities = 'Facilities';
                //         // $('.lng-book').html('Facilities')
                //         // $('.lng-capacity-info').html('Capacity info')
                //         // $('.lng-facilities').html('Facilities')

                //     } else if ($.cookie("lng") == 'th') {
                //         car_topic = compae1private[i].topic_th;
                //         cartype = compae1private[i].car_topic_th;
                //         pax = compae1private[i].pax_th;
                //         lngbook = 'จอง';
                //         lngcapacityinfo = 'ความจุรถ ';
                //         lngdetails = 'รายละเอียด';
                //         lngfacilities = 'สิ่งอำนวยความสะดวก';
                //         // $('.lng-book').html('จอง')
                //         // $('.lng-capacity-info').html('ข้อมูลความจุ')
                //         // $('.lng-facilities').html('สิ่งอำนวยความสะดวก ')

                //     } else if ($.cookie("lng") == undefined) {
                //         car_topic = compae1private[i].topic_en;
                //         cartype = compae1private[i].car_topic_en;
                //         pax = compae1private[i].pax_en;
                //         lngbook = 'Book';
                //         lngcapacityinfo = 'Capacity';
                //         lngdetails = 'details';
                
                //         lngfacilities = 'Facilities';
                //         // $('.lng-book').html('Book')
                //         // $('.lng-capacity-info').html('Capacity info')
                //         // $('.lng-facilities').html('Facilities')

                //     }
                //     //                    console.log(compae1join.length)

                //     $('#product_a').append('<div class="a-link-item col-lg-12" >' +
                //         '<div class="item-thumbnail2" onclick="getimage(\'' + compae1private[i].car_model + '\') " >' +
                //         '<img src="' + urlicon + compae1private[i].transfer_icon + '.jpg">' +
                //         '</div>' +
                //         '<table width="100%">' +
                //         '<tr>' +
                //         '<td style="width: 30px;">' +
                //         '<span class="hotel_num">' + indexs + '</span>' +
                //         '</td>' +

                //         '<td>' +
                //         '<h2 class="searchresult_name"title="product name"><span>' + car_topic + '</span></h2>' +
                //         '</td>' +
                //         '</tr>' +
                //         '</table>' +
                //         '<div class="box-province">' +
                //         '<p class="type-t">' +
                //         '<span class="car-type" >' + cartype + pax + '</span>' +
                //         '</p>' +
                //         '</div>' +
                //         '<div id="box-cost-view">' +
                //         '<div class="product_r">' +
                //         '<span class="base_price"></span>' +
                //         '<span class="sala">' + compae1private[i].cost_a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '฿' + '</span>' +

                //         '</div>' +
                //         '<div class="views-item" >' +
                //         '<a  href="book?data=' + compae1private[i].transfer_id + '&from=' + dataPlacefrom + '&to=' + dataPlaceto + '&lat_f='+lat_f+'&lng_f='+lng_f+'&lat_t='+lat_t+'&lng_t='+lng_t+'&book='+booking+'" > <span >' + lngbook + '</span></a>' +

                //         '</div>' +
                //         '</div>' +
                //         '<div id="i-list"   onclick="getcondition(\'' + compae1private[i].car_model + '\')">' +
                //         '<p id="capacity"><div>' + lngcapacityinfo + '</div><div>' + lngdetails + '</div></p>' +
                //         '<i class="fa fa-list-alt"   aria-hidden="true"></i>' +
                //         '</div>' +
                //         '</div>'

                //     );


                // });

                var car_topic, cartype, pax;
                // if (compae1join.length != 0) {
                //     $.each(compae1join, function(i, val) {
                //         var indexs = parseInt(i) + 1;
                //         if ($.cookie("lng") == 'cn') {
                //             car_topic = compae1join[i].topic_cn;
                //             cartype = compae1join[i].car_topic_cn;
                //             pax = compae1join[i].pax_cn;
                //             $('.lng-book').html('預訂')
                //             $('.lng-capacity-info').html('容量信息')
                //             $('.lng-facilities').html('设施')
                //         } else if ($.cookie("lng") == 'en') {
                //             car_topic = compae1join[i].topic_en;
                //             cartype = compae1join[i].car_topic_en;
                //             pax = compae1join[i].pax_en;
                //             $('.lng-book').html('Book')
                //             $('.lng-capacity-info').html('Capacity info')
                //             $('.lng-facilities').html('Facilities')

                //         } else if ($.cookie("lng") == 'th') {
                //             car_topic = compae1join[i].topic_th;
                //             cartype = compae1join[i].car_topic_th;
                //             pax = compae1join[i].pax_th;
                //             $('.lng-book').html('จอง')
                //             $('.lng-capacity-info').html('ข้อมูลความจุ')
                //             $('.lng-facilities').html('สิ่งอำนวยความสะดวก ')

                //         } else if ($.cookie("lng") == undefined) {
                //             car_topic = compae1join[i].topic_en;
                //             cartype = compae1join[i].car_topic_en;
                //             pax = compae1join[i].pax_en;
                //             $('.lng-book').html('Book')
                //             $('.lng-capacity-info').html('Capacity info')
                //             $('.lng-facilities').html('Facilities')
                //         }

                //         $('#product_c').append('<div class="a-link-item col-lg-12" >' +
                //             '<div class="item-thumbnail2" onclick="getimage(\'' + compae1join[i].car_model + '\') " ' +
                //             '<img src="' + urlicon + compae1join[i].transfer_icon + '.jpg">' +
                //             '</div>' +
                //             '<table width="100%">' +
                //             '<tr>' +
                //             '<td style="width: 30px;">' +
                //             '<span class="hotel_num">' + indexs + '</span>' +
                //             '</td>' +

                //             '<td>' +
                //             '<h2 class="searchresult_name"title="product name"><span>' + car_topic + '</span></h2>' +
                //             '</td>' +
                //             '</tr>' +
                //             '</table>' +
                //             '<div class="box-province">' +
                //             '<p class="type-t">' +
                //             '<span class="car-type" >' + cartype + pax + '</span>' +
                //             '</p>' +
                //             '</div>' +
                //             '<div id="box-cost-view">' +
                //             '<div class="product_r">' +
                //             '<span class="base_price"></span>' +
                //             '<span class="sala">' + compae1join[i].cost_a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '฿' + '</span>' +

                //             '</div>' +
                //             '<div class="views-item" >' +
                //             '<a  href="book?data=' + compae1join[i].transfer_id + '&from=' + data[0].data1.from + '&to=' + data[0].data1.to + '&lat_f='+lat_f+'&lng_f='+lng_f+'&lat_t='+lat_t+'&lng_t='+lng_t+'&book='+booking+'" > <span >' + lngbook + '</span></a>' +

                //             '</div>' +
                //             '</div>' +
                //             '<div id="i-list"   onclick="getcondition(\'' + compae1join[i].car_model + '\')">' +
                //             '<p id="capacity"><div>' + lngcapacityinfo + '</div><div>' + lngdetails + '</div></p>' +
                //             '<i class="material-icons">search</i>' +
                //             '</div>' +
                //             '</div>'

                //         );


                //     });
                // } else {
                //     $('#product_c').append('<div class="not-found">' + notfound + '</div>');
                // }
            }
        }
    });
}
});
}

var his_place_from = '',his_place_to = '',check_his = false,check_type_book = '';
function sendplace(from,to,u,v,x,y,type) {    
 check_type_book = 'his';
 his_place_from = from;
 his_place_to = to;
 check_his = true;
 console.log(from+'-'+to)
 lat_f = u;
 lng_f = v;
 lat_t = x;
 lng_t = y;
 booking = type;
 place_from =  from;
 place_to = to;
}
function sendpaxrel(x) {
    console.log(lat_t+'-'+lng_t)
    $('#box-pax-rel').hide();
    $('#show-hide-pro').show(500);
    $('#loading').css('display', 'block');
    $('.a-link-item').remove();
    $('#box-prosearch').css('display', 'none');
    $('#product_a').css('display', 'none');
    setTimeout(function() {
        console.log("aaaaa")
        $('#loading').css('display', 'none');
        $('#product_a').css('display', 'block');
        $('#box-prosearch').css('display', 'block');
    }, 500);
    comparedata = [];
    compae1private = [];
    compae1join = [];
    data2 = [];
    ctype = x;
    getdataservice = dataRel.car_topic
    console.log(ctype)
    if(x== 2 || x== 17){
        $('#join-btn').css({ "background-color": "#3b5998", "color": "#fff" }        
            );
        $("#private-btn").css({ "background-color": " #fff", "color": "#3b5998 " }        
            ); 
        $('#private-btn').removeClass('active');
        $('#join-btn').addClass('active');
        $('#join').show();
        $('#private').hide(); 
    }
    else{
        $('#join-btn').css({ "background-color": "#fff", "color": "#3b5998" }        
            );
        $("#private-btn").css({ "background-color": " #3b5998", "color": "#fff " }        
            ); 
        $('#private-btn').addClass('active');
        $('#join-btn').removeClass('active');
        $('#join').hide();
        $('#private').show();
        
    }
    console.log(getdataservice)
    console.log(dataRel)
    $.each(getdataservice, function(i, val) { 
       if ($.cookie("lng") == 'cn') {
           if (getdataservice[i].pax_id == ctype) {
               
               $('#select_pax_use').html( getdataservice[i].car_topic_cn+' '+'<span style="    color: #f44336;">'+getdataservice[i].pax_cn+'</span>')
           } else if (ctype == '0') {
               $('#select_pax_use').html( '所有類型')
           }
       } else if ($.cookie("lng") == 'en' || $.cookie("lng") == undefined) {
           if (getdataservice[i].pax_id == ctype) {
               $('#select_pax_use').html( getdataservice[i].car_topic_en+' '+'<span style="    color: #f44336;">'+getdataservice[i].pax_en+'</span>')
           } else if (ctype == '0') {
               $('#select_pax_use').html( 'All Type')
               
           }
       } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH') {
           if (getdataservice[i].pax_id == ctype) {
               $('#select_pax_use').html(getdataservice[i].car_topic_th+' '+'<span style="    color: #f44336;">'+getdataservice[i].pax_th+'</span>')
           } else if (ctype == '0') {
               $('#select_pax_use').html( 'ทุกประเภท')
               
           }
       } 
   })
    $.each(dataRel.data1, function(i, val) {
        if ($.cookie("lng") == 'cn') {
            if (dataRel.data1[i].pax_id == ctype) {
                comparedata.push(dataRel.data1[i])
            } else if (ctype == 0) {
             comparedata.push(dataRel.data1[i])
         }
     } else if ($.cookie("lng") == 'en' || $.cookie("lng") == undefined) {
        if (dataRel.data1[i].pax_id == x) {
            comparedata.push(dataRel.data1[i])
        } else if (ctype == 0) {
         comparedata.push(dataRel.data1[i])
     }
 } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH') {
    if (dataRel.data1[i].pax_id == ctype) {
     comparedata.push(dataRel.data1[i])
 } else if (ctype == 0) {
     comparedata.push(dataRel.data1[i])
 }
} 
})
    console.log(comparedata)
    $.each(comparedata, function(i, val) {
        if (comparedata[i].type == 'Private') {
            compae1private.push(comparedata[i])
        }
        if (comparedata[i].type == 'Join') {
            compae1join.push(comparedata[i])
        }
    })
    if(compae1join.length == 0 && compae1private.length == 0){
        $('#box-pax-rel').hide();
        $('#select_pax_use').hide();
    }
    console.log(compae1join);
    console.log(compae1private)
    var car_topic, cartype, pax,lngcapacityinfo,lngfacilities;
    var urlicon = base_url_tr + 'files/images/carmodelicon/';
    $.each(compae1private, function(i, val) {
        var indexs = parseInt(i) + 1;
        if ($.cookie("lng") == 'cn') {
            car_topic = compae1private[i].topic_cn;
            cartype = compae1private[i].car_topic_cn;
            pax = compae1private[i].pax_cn;
            lngbook = '預訂';
            lngcapacityinfo = '車容量';
            lngdetails = '细节';
            lngfacilities = '设施';
        } else if ($.cookie("lng") == 'en' || $.cookie("lng") == undefined) {
            car_topic = compae1private[i].topic_en;
            cartype = compae1private[i].car_topic_en;
            pax = compae1private[i].pax_en;
            lngbook = 'Book';
            lngcapacityinfo = 'Capacity';
            lngdetails = 'details';            
            lngfacilities = 'Facilities';
        } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH') {
            car_topic = compae1private[i].topic_th;
            cartype = compae1private[i].car_topic_th;
            pax = compae1private[i].pax_th;
            lngbook = 'จอง';
            lngcapacityinfo = 'ความจุรถ ';
            lngdetails = 'รายละเอียด';
            lngfacilities = 'สิ่งอำนวยความสะดวก';
        } 
        $('#product_a').append('<div class="a-link-item col-lg-12" >' +
            // '<div class="item-thumbnail2" onclick="getimage(\'' + compae1private[i].car_model + '\') ">' +
            // '<img src="' + urlicon + compae1private[i].transfer_icon + '.jpg">' +
            // '</div>' +
            // '<table width="100%">' +
            // '<tr>' +
            // '<td style="width: 30px;">' +
            // '<span class="hotel_num">' + indexs + '</span>' +
            // '</td>' +

            // '<td>' +
            // '<h2 class="searchresult_name"title="product name"><span>' + car_topic + '</span></h2>' +
            // '</td>' +
            // '</tr>' +
            // '</table>' +
            // '<div class="box-province">' +
            // '<p class="type-t">' +
            // '<span class="car-type" >' + cartype + pax + '</span>' +
            // '</p>' +
            // '</div>' +
            // '<div id="box-cost-view">' +
            // '<div class="product_r">' +
            // '<span class="base_price"></span>' +
            // '<span class="sala">' + compae1private[i].cost_a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '฿' + '</span>' +

            // '</div>' +
            // '<div class="views-item" onclick="bookingdetail('+ compae1private[i].transfer_id+',' + dataPlacefrom + ',' + dataPlaceto + ','+lat_f+','+lng_f+','+lat_t+','+lng_t+',\''+booking+'\')">' +
            // '<a > <span >' + lngbook + '</span></a>' +

            // '</div>' +
            // '</div>' +
            // '<div id="i-list"   onclick="getcondition(\'' + compae1private[i].car_model + '\')">' +
            // '<p id="capacity"><div>' + lngcapacityinfo + '</div><div>' + lngdetails + '</div></p>' +
            // '<i class="material-icons">search</i>' +
            // '</div>' +
            // '</div>'




            '<table width="100%">' +
            '<tr>' +
            '<td  colspan="2" style="width: 100%">' +
            '<h2 class="searchresult_name"title="product name"><span>' + car_topic + '</span></h2>' +
            '</td>' +
            '</tr>' +
            '<tr>'+
            '<td align="center">'+
            
            '<span class="hotel_num">' + indexs + '</span>' +
            
            '<div class="item-thumbnail2" onclick="getimage(\'' + compae1private[i].car_model + '\') ">' +
            '<img src="' + urlicon + compae1private[i].transfer_icon + '.jpg">' +
            '</div>' +
            '</td >'+ 
            
            '<td  align="center" valign="top">'+
            '<div id="i-list"   onclick="getcondition(\'' + compae1private[i].car_model + '\')">' +
            '<p id="capacity"><div>' + lngcapacityinfo + '</div><div>' + lngdetails + '</div></p>' +
            '<i class="material-icons">search</i>' +
            '</div>' +    
            '</td >'+
            
            '</tr>'+
            '<tr>'+
            '<td >'+
            
            
            '</td >'+ 
            
            '<td  align="center" valign="top">'+
            '<div id="">' +
            '<div class="product_r">' +
            '<span class="base_price"></span>' +
            '<span class="sala">' + compae1private[i].cost_a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '฿' + '</span>' +
            '</div>' +
            '<div class="views-item" onclick="bookingdetail('+ compae1private[i].transfer_id+',' + dataPlacefrom + ',' + dataPlaceto + ','+lat_f+','+lng_f+','+lat_t+','+lng_t+',\''+booking+'\')">' +
            '<a > <span >' + lngbook + '</span></a>' +
            '</div>' +
            '</div>' +  
            '</td >'+
            '</tr>'+
            '</table>' +
            '</div>'
            );


    }); 
    //end private

    if (compae1join.length != 0) {
        $.each(compae1join, function(i, val) {
            var indexs = parseInt(i) + 1;
            if ($.cookie("lng") == 'cn') {
                car_topic = compae1join[i].topic_cn;
                cartype = compae1join[i].car_topic_cn;
                pax = compae1join[i].pax_cn;
                lngbook = '預訂';
                lngcapacityinfo = '車容量';
                lngdetails = '细节';
                lngfacilities = '设施';
            } else if ($.cookie("lng") == 'en' || $.cookie("lng") == undefined) {
                car_topic = compae1join[i].topic_en;
                cartype = compae1join[i].car_topic_en;
                pax = compae1join[i].pax_en;
                lngbook = 'Book';
                lngcapacityinfo = 'Capacity';
                lngdetails = 'details';            
                lngfacilities = 'Facilities';
            } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH') {
                car_topic = compae1join[i].topic_th;
                cartype = compae1join[i].car_topic_th;
                pax = compae1join[i].pax_th;
                lngbook = 'จอง';
                lngcapacityinfo = 'ความจุรถ ';
                lngdetails = 'รายละเอียด';
                lngfacilities = 'สิ่งอำนวยความสะดวก';
            }
            $('#product_c').append('<div class="a-link-item col-lg-12" >' +
            // '<div class="item-thumbnail2" onclick="getimage(\'' + compae1join[i].car_model + '\')">' +
            // '<img src="' + urlicon + compae1join[i].transfer_icon + '.jpg">' +
            // '</div>' +
            // '<table width="100%">' +
            // '<tr>' +
            // '<td style="width: 30px;">' +
            // '<span class="hotel_num">' + indexs + '</span>' +
            // '</td>' +
            // '<td>' +
            // '<h2 class="searchresult_name"title="product name"><span>' + car_topic + '</span></h2>' +
            // '</td>' +
            // '</tr>' +
            // '</table>' +
            // '<div class="box-province">' +
            // '<p class="type-t">' +
            // '<span class="car-type" >' + cartype + pax + '</span>' +
            // '</p>' +
            // '</div>' +
            // '<div id="box-cost-view">' +
            // '<div class="product_r">' +
            // '<span class="base_price"></span>' +
            // '<span class="sala">' + compae1join[i].cost_a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '฿' + '</span>' +

            // '</div>' +
            // '<div class="views-item" >' +
            // '<a  href="book?data=' + compae1join[i].transfer_id + '&from=' + id_placefrom + '&to=' + id_placeto + '&lat_f='+lat_f+'&lng_f='+lng_f+'&lat_t='+lat_t+'&lng_t='+lng_t+'&book='+booking+'" > <span >' + lngbook + '</span></a>' +

            // '</div>' +
            // '</div>' +
            // '<div id="i-list"   onclick="getcondition(\'' + compae1join[i].car_model + '\')">' +
            // '<p id="capacity"><div>' + lngcapacityinfo + '</div><div>' + lngdetails + '</div></p>' +
            // '<i class="material-icons">search</i>' +
            // '</div>' +
            // '</div>'



            '<table width="100%">' +
            '<tr>' +
            '<td  colspan="2" style="width: 100%">' +
            '<h2 class="searchresult_name"title="product name"><span>' + car_topic + '</span></h2>' +
            '</td>' +
            '</tr>' +
            '<tr>'+
            '<td align="center">'+
            
            '<span class="hotel_num">' + indexs + '</span>' +
            
            '<div class="item-thumbnail2" onclick="getimage(\'' + compae1join[i].car_model + '\') ">' +
            '<img src="' + urlicon + compae1join[i].transfer_icon + '.jpg">' +
            '</div>' +
            '</td >'+ 
            
            '<td  align="center" valign="top">'+
            '<div id="i-list"   onclick="getcondition(\'' + compae1join[i].car_model + '\')">' +
            '<p id="capacity"><div>' + lngcapacityinfo + '</div><div>' + lngdetails + '</div></p>' +
            '<i class="material-icons">search</i>' +
            '</div>' +    
            '</td >'+
            
            '</tr>'+
            '<tr>'+
            '<td >'+
            
            
            '</td >'+ 
            
            '<td  align="center" valign="top">'+
            '<div id="">' +
            '<div class="product_r">' +
            '<span class="base_price"></span>' +
            '<span class="sala">' + compae1join[i].cost_a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '฿' + '</span>' +
            '</div>' +
            '<div class="views-item" onclick="bookingdetail('+ compae1join[i].transfer_id+',' + dataPlacefrom + ',' + dataPlaceto + ','+lat_f+','+lng_f+','+lat_t+','+lng_t+',\''+booking+'\')">' +
            '<a > <span >' + lngbook + '</span></a>' +
            '</div>' +
            '</div>' +  
            '</td >'+
            '</tr>'+
            '</table>' +
            '</div>'
            );
        });
}
}


function smoothZoom(map, max, cnt) {
    if (cnt >= max) {
        return;
    } else {
        z = google.maps.event.addListener(map, 'zoom_changed', function(event) {
            google.maps.event.removeListener(z);
            smoothZoom(map, max, cnt + 1);
        });
        setTimeout(function() { map.setZoom(cnt) }, 150); // 80ms is what I found to work well on my system -- it might not work well on all systems
    }
}

function nearbyPlace(map, location, value) {
    placeRecord();
    var service = new google.maps.places.PlacesService(map);
    if (value == 0) {
        service.nearbySearch({
            location: location,
            radius: 10000,
            //            type: ['spa','airport','hospital','restaurant','department_store','lodging','point_of_interest']
            type: ['spa', 'airport', 'restaurant', 'department_store', 'lodging', 'point_of_interest']
        }, callback);

    } else {
        service.nearbySearch({
            location: location,
            radius: 10000,
            type: ['' + value + '']
        }, callback);
    }
}

function callback(results, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            appendPlace(results[i]);
        }
    } else {
        console.log(status);
    }
}
var his_transfer_id,his_from,his_to,his_lat_f,his_lng_f,his_lat_t,his_lng_t,his_fashion;
function confirmhistory(){
    $('#history_pop').hide()
    $('#get_html_book').show(500)
    console.log($('#current').val())
    console.log($('#pac-input').val())
    console.log(his_transfer_id+'-'+his_from+'-'+his_to+'-'+his_lat_f+'-'+his_lng_f+'-'+his_lat_t+'-'+his_lng_t+'-'+his_fashion)
    datalocation = { "user": $.cookie("login"), "topic_from":$('#current').val(), "topic_to":$('#pac-input').val(),"from": dataPlacefrom,"to": dataPlaceto,"lat_f": lat_f,"lng_f": lng_f,"lat_t": lat_t,"lng_t": lng_t,"fashion":booking};
    
    $.ajax({
        type: 'POST',
        url: base_url_tr+'my_place_often/savehistory',
        data: datalocation,
        //contentType: "application/json",
        dataType: 'json',
        success: function(data) {
            console.log(data)
            getDetailbook(his_from,his_to,his_lat_f,his_lng_f,his_lat_t,his_lng_t,his_fashion,his_transfer_id)
    //window.location.href = base_url_tr + 'book?data=' + his_transfer_id + '&from=' + his_from + '&to=' + his_to + '&lat_f='+his_lat_t+'&lng_f='+his_lng_f+'&lat_t='+his_lat_t+'&lng_t='+his_lng_t+'&book='+his_fashion;
    
    
    
}
});
}
function cancelhistory(){
    $('#history_pop').hide() 
    $('#get_html_book').show(500)    
    console.log(his_transfer_id+'-'+his_from+'-'+his_to+'-'+his_lat_f+'-'+his_lng_f+'-'+his_lat_t+'-'+his_lng_t+'-'+his_fashion)
    //window.location.href = base_url_tr + 'book?data=' + his_transfer_id + '&from=' + his_from + '&to=' + his_to + '&lat_f='+his_lat_t+'&lng_f='+his_lng_f+'&lat_t='+his_lat_t+'&lng_t='+his_lng_t+'&book='+his_fashion;
    getDetailbook(his_from,his_to,his_lat_f,his_lng_f,his_lat_t,his_lng_t,his_fashion,his_transfer_id)
}

function appendPlace(place) {
    //    console.log(place);
    var icon = '<img src="' + place.icon + '" width="23"/>';
    var lo = place.geometry.location.toJSON();
    var lat = lo.lat;
    var lng = lo.lng;
    var address = place.name + " " + place.vicinity;
    // var btn = '<button class="btn btn-xs">' + place.photos[0].html_attributions + '</button>';
    $('#list_place_push').append('<div class="placeNeary-item pac-item" id="' + place.id + '" onclick="eventPlace(' + lat + ',' + lng + ',\'' + address + '\');"><table><tr><td><span class="">' + icon + '</span></td><td><span class="pac-item-query" style="padding: 7px;"><span class="pac-matched ">' + place.name + '</span></span><span class="lng-save_home_place" style="font-weight: 600;">' + place.vicinity + '</span></td></tr></table></div>');

}

function filterPlace(map, location) {
    var selectTypePlace = document.querySelector('#types_ofPlace');
    google.maps.event.addDomListener(selectTypePlace, 'change', function() {
        var value = $('#types_ofPlace').val();
        //  		alert(value);
        $('.placeNeary-item').remove();

        if (value == 0) {
            value = 0;
        } else if (value == 1) {
            value = "hospital";
        } else if (value == 2) {
            value = "airport";
        } else if (value == 3) {
            value = "spa";
        } else if (value == 4) {
            value = "restaurant";
        } else if (value == 5) {
            value = "department_store";
        } else if (value == 6) {
            value = "lodging";
        } else if (value == 7) {
            value = "point_of_interest";
        }
        nearbyPlace(map, location, value)
    });
}

function eventPlace(lat, lng, placeName) {
    selectMyPlace(4, placeName, lat, lng);

}
function placeRecord() {
    dataHome = [];
    dataOffice = [];
    dataRegular = [];
    var id = $.cookie("login");
    $.post("my_place_often/place_often", { "id": id }, function(results) {
        if (results === 'false') {
        } else {
            if (results) {
                var obj = JSON.parse(results);
                console.log(obj);
                $.each(obj, function(i, val) {
                    if (obj[i].s_type == '1') {
                        dataHome.push(obj)  
                    }
                    if (obj[i].s_type == '2') {
                        dataOffice.push(obj)
                        
                    }
                    if (obj[i].s_type == '3') {
                        dataRegular.push(obj) 
                    }
                });
                $.each(obj, function(i, data) {
                    var url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + data.i_lat + ',' + data.i_lng + '&sensor=true&language=' + lang_to_map;
                    $.post(url, function(data_place) {
                        console.log(data_place);
                        if(dataHome.length == 1){
                            $('.lng-save_home_place').attr('onclick', 'selectMyPlace(1,"' + data_place.results[0].formatted_address + '",' + data.i_lat + ',' + data.i_lng + ')');
                            $('#often_edit_home').show() 
                        }
                        else if(dataHome.length == 0){
                            $('.lng-save_home_place').attr('onclick', 'addPlaceOfften(2,"edit")');
                            $('.lng-save_home_place').html(click_save_place_txt);
                            $('#often_edit_home').hide()
                        }
                        else{
                         $('.lng-save_home_place').attr('onclick', 'selectSavePlaceOfften(1)');
                         $('#often_edit_home').show()                             
                     }
                     if(dataOffice.length == 1){
                        $('.lng-save_Office_place').attr('onclick', 'selectMyPlace(2,"' + data_place.results[0].formatted_address + '",' + data.i_lat + ',' + data.i_lng + ')');
                        $('#often_edit_office').show()                                              
                    }
                    else if(dataOffice.length == 0){
                        $('.lng-save_Office_place').attr('onclick', 'addPlaceOfften(2,"edit")');                           
                        $('.lng-save_Office_place').html( click_save_place_txt);
                        $('#often_edit_office').hide()                             
                    }
                    else{
                        $('.lng-save_Office_place').attr('onclick', 'selectSavePlaceOfften(2)');
                        $('#often_edit_office').show() 
                    }
                    if(dataRegular.length == 1){
                        $('.lng-save_regularly_place').attr('onclick', 'selectMyPlace(3,"' + data_place.results[0].formatted_address + '",' + data.i_lat + ',' + data.i_lng + ')');
                        $('#often_edit_home').show()
                        
                        
                        
                    }
                    else if(dataRegular.length == 0){
                        $('.lng-save_regularly_place').attr('onclick', 'addPlaceOfften(3,"edit")');                           
                        $('.lng-save_regularly_place').html( click_save_place_txt);
                        $('#often_edit_home').hide()                             
                    }
                    else{
                     $('.lng-save_regularly_place').attr('onclick', 'selectSavePlaceOfften(3)');
                     $('#often_edit_home').show()
                 }
                 if (data.s_type == '1') {                           
                    homecheck = true;
                    if(data.topic == ''){
                        $('.lng-save_home_place').html(data_place.results[0].formatted_address)
                    }
                    else{
                        $('.lng-save_home_place').html(data.topic)                                
                    }
                    $('#edit-home_select').show();
                    $('#often_edit_home').show();                            
                }
                if (data.s_type == '2') {
                    if(data.topic == ''){
                        $('.lng-save_Office_place').html(data_place.results[0].formatted_address)
                    }
                    else{
                        $('.lng-save_Office_place').html(data.topic)
                    }
                    officecheck = true;
                    $('#edit-office_select').show();
                    $('#often_edit_office').show();
                }
                if (data.s_type == '3') {                            
                    regularcheck = true;
                    if(data.topic == ''){
                        $('.lng-save_Office_place').html(data_place.results[0].formatted_address)
                    }
                    else{
                        $('.lng-save_regularly_place').html(data.topic)                                
                    }
                    $('#often_edit_regular').show();
                    $('#edit_regularly_select').show();
                }
            });
});
console.log(dataHome)
console.log(dataOffice)
console.log(dataRegular)
console.log(dataHome.length)
console.log(dataOffice.length)
console.log(dataRegular.length)
$('.numhome').html( '(' + dataHome.length + ')' );
$('.numoffice').html( '(' + dataOffice.length + ')' );
$('.numregular').html( '(' + dataRegular.length + ')' );  
}
}

});
}

/************************** */
//change set name
/****************************/ 
$(document).ready(function() {
    $('#changesetname').on('input', function(){
        alert(document.getElementById('changesetname').value);
    });
    $('#changesetname1').on('input', function(){
        alert(document.getElementById('changesetname1').value);
    });
});

function changesetname(changesetname) {
    changename = document.getElementById('changesetname').value; 
    console.log(changename)    
}
function changesetname2(changesetname) {
    changename = document.getElementById('changesetname1').value; 
    console.log(changename)    
}
function changesetphone(changesetphone) {
    changephone = document.getElementById('changesetphone').value; 
    console.log(changephone)    
}
function changesetphone2(changesetname) {
    changephone = document.getElementById('changesetphone2').value; 
    console.log(changephone)    
}
function addPlaceOfften(type_place,type_call) {
    $('#appendBoxoften').show();    
    console.log('sssss');
    if ($.cookie("login") == undefined) {
        $('#loading').css('display', 'block');
        // setTimeout(function() {

        //     window.location.href = base_url_tr + "register";
        // }, 500);
        
        $('#popup-login').show(500);
        setTimeout(function() {

            $('#loading').hide();
        }, 500);
        // $('#loading').css('display', 'block');
        // setTimeout(function() {
        //     window.location.href = base_url_tr + "register";
        // }, 500);
        $('#often_edit_home').hide()
        $('#often_edit_office').hide()
        $('#often_edit_regular').hide()
    } else {        
        markerPlaceOfften.setMap(map);
        markerPlaceOfften.setVisible(true);
        var newPos2 = {
            lat: lat_f,
            lng: lng_f
        };            
        markerPlaceOfften.setPosition(newPos2);
        url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + lat_f + ',' + lng_f + '&sensor=true&language=' + lang_to_map;
        
        $.post(url, function(data) {
            console.log(data);
            infowindow.close();
            infowindow.setContent('<div id="setmap">' + data.results[0].formatted_address + '</div> <input id="changesetname1" name="changesetname1" onchange="changesetname2(changesetname1)" placeholder="'+set_name+'" type="text" style=""  ><input id="changesetphone2" name="changesetphone2" onchange="changesetphone2(changesetphone2)" placeholder="'+phoneplace+'" type="text" style=""  ><div class="btn btn-sm pull-right btn-part" style="display: inline-block;border-radius: 25px; background: #3b5998;" onclick="savePlaceOften(' + type_call + ',' + lat_f + ',' + lng_f + ',\'' + data.results[0].place_id + '\',\'' + type_place + '\')">' + txt_save + '</div>');
            infowindow.open(map, markerPlaceOfften);
            $('#often-input2').show(500);
            $('#search-often').show(500);
        //<div class="btn btn-sm Klsetname" onclick="Klsetname();" style="display: inline-block;background: rgb(22, 179, 177);">' + set_name + '</div>
        
    });
        if (type_call == "save") {
            type_call = 1;
            var btn_color = "btn-success";
            if ($.cookie("lng") == 'cn') {
                txt_save = "记录";
            } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH') {
                txt_save = "บันทึก";
            } else if ($.cookie("lng") == 'en' || $.cookie("lng") == undefined) {
                txt_save = "Record";
            } 
        } else if (type_call == "edit") {
            type_call = 2;
            var btn_color = "btn-success";            
            if ($.cookie("lng") == 'cn') {
                txt_save = "记录";
                set_name = '集名称';
                phoneplace = '电话';
                
            } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH') {
                txt_save = "บันทึก";
                set_name = 'ตั้งชื่อ';
                phoneplace = 'โทรศัพท์';
                
            } else if ($.cookie("lng") == 'en' || $.cookie("lng") == undefined) {
                txt_save = "Record";
                set_name = 'Set name';
                phoneplace = 'Phone';                
            } 
        }
        //hideHeader();
        $('#boxForAutoCom').hide();
        $('#clear-all').show(500);
        $('#map').show();

        infowindow = new google.maps.InfoWindow({ maxWidth: 200 });
        $('#search-raeltime').hide(500);
        $('#btn_CurrentLocation').show(500);
        markerPlaceOfften.setMap(map);
        markerPlaceOfften.setVisible(true);
        var url;
        var Newlat;
        var Newlng;
        $(this).trigger('center_changed');
        google.maps.event.addListener(map, 'center_changed', function() {
            Newlat = map.getCenter().lat();
            Newlng = map.getCenter().lng();
            $('#often-input2').show()
            var newPos = {
                lat: Newlat,
                lng: Newlng
            };             
            markerPlaceOfften.setPosition(newPos);
            console.log(newPos);
            url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + Newlat + ',' + Newlng + '&sensor=true&language=' + lang_to_map;

            $.post(url, function(data) {
                console.log(data);
                infowindow.close();
                infowindow.setContent('<div id="setmap">' + data.results[0].formatted_address + '</div><input id="changesetname" name="changesetname"  onchange="changesetname(changesetname)" placeholder="'+set_name+'" type="text" style=""  ><input id="changesetphone" name="changesetphone" onchange="changesetphone(changesetphone)" placeholder="'+phoneplace+'" type="text" style=""  ><div class="btn btn-sm pull-right btn-part" style="border-radius: 25px;display: inline-block;background: #3b5998;" onclick="savePlaceOften(' + type_call + ',' + Newlat + ',' + Newlng + ',\'' + data.results[0].place_id + '\',\'' + type_place + '\')">' + txt_save + '</div>');
                infowindow.open(map, markerPlaceOfften);
                $('#often-input2').show(500);
//<div class="btn btn-sm Klsetname" onclick="Klsetname();" style="display: inline-block;background: rgb(22, 179, 177);">' + set_name + '</div>

});

        });
    }
}
function Klsetname(){
    $('#changesetname').show();
}
function selectSavePlaceOfften(type_place) {
    $('#select_often').show(500)
    $('#otherBox').hide()
    $('#outselect_often').show(500)
    $('.placeoften').remove();
    DataType = [];    
    var id = $.cookie("login");
    var placeoften;
    $.post("my_place_often/place_often", { "id": id }, function(results) {
        if (results === 'false') {
        } else {
            if (results) {
                var obj = JSON.parse(results);
                console.log(obj);
                $.each(obj, function(i, data) {
                        if (data.s_type == type_place) { //1
                            console.log(data.s_type)
                            console.log(data.topic)
                            var url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + data.i_lat + ',' + data.i_lng + '&sensor=true&language=' + lang_to_map;
                            if(data.topic != ''){
                                $('#box-placeoften').append('<li class="placeoften" id="placeoften' + data.id + '"onclick="selectMyPlace('+type_place+',\'' + data.topic + '\',' + data.i_lat + ',' + data.i_lng + ');"><i class="material-icons " style=" margin-right: 15px;    font-size: 30px; color: #16b3b1;    position: absolute;">add_location</i><div style="margin-left: 40px;"><span class="name">' + data.topic + '</span></div></li>');
                                
                            }
                            else{
                                $.post(url, function(data_place) {
                                    console.log(data_place);
                                    $('#box-placeoften').append('<li class="placeoften" id="placeoften' + data.id + '"onclick="selectMyPlace('+type_place+',\'' + data_place.results[0].formatted_address + '\',' + data.i_lat + ',' + data.i_lng + ');"><i class="material-icons " style=" margin-right: 15px;    font-size: 30px; color: #16b3b1;    position: absolute;">add_location</i><div style="margin-left: 40px;"><span class="name">' + data_place.results[0].formatted_address + '</span></div></li>');
                                    console.log(placeoften)
                                });
                            }                            
                        }                        
                    });
                console.log(placeoften)
                $('#box-placeoften').html(placeoften)
            }
        }

    });
    
}
function newname(newname) {    
    namesend = document.getElementById('newname').value; 
    console.log(namesend)
}
function phoneplace(phoneplace) {
    phonesend = document.getElementById('phoneplace').value; 
    console.log(phonesend)
}
function btn_save(){
    console.log(id_edit_often)
    DataType = [];
    $('.placeeditften').remove()
    if(namesend == '' || namesend == undefined){
        namesend = getnewnamenull;
    }
    if(phonesend == '' || phonesend == undefined){
        phonesend = getnewphonenull;
    }    
    var iduser = $.cookie("login");
    $.post("my_place_often/edit", { "id": id_edit_often,"topic": namesend,"phone":phonesend }, function(results) {
        console.log(results)
        if (results === 'false') {

        } else { 
            $.post("my_place_often/place_often", { "id": iduser }, function(results) {                    
                if (results === 'false') {                    
                } else {
                    if (results) {
                        $('#loading').hide();
                        var obj = JSON.parse(results);
                        console.log(obj);
                        $.each(obj, function(i, data) {
                         
                                            if (data.s_type == chTypeplace) { //1
                                                console.log(data.s_type)
                                                console.log(data.topic)
                                                var textphone;
                                                if(data.phone == ''){
                                                    textphone = '';                    
                                                }
                                                else{
                                                    textphone =  '('+data.phone+')';
                                                }
                                                var url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + data.i_lat + ',' + data.i_lng + '&sensor=true&language=' + lang_to_map;
                                                if(data.topic != ''){
                                                    
                                                    $('#box_editplaceoften').append('<li class="placeeditften" id="placeeditften' + data.id + '"><div><table width="100%"><tr><td width="70%"><div class="name">' + data.topic + textphone + '</div></td><td width="15%" align="center"><i class="material-icons " style="color: #ff9800; font-weight: 700;" onclick="editMyPlace('+data.id+',\'' + data.topic + '\','+data.i_lat+','+data.i_lng+',\''+data.phone+'\');">edit</i></td><td width="10%" align="center"><i class="material-icons" style="color: #f44336; font-weight: 700;" onclick="deleteMyPlace(' + data.id + ','+chTypeplace+');">delete</i></td></tr></table></div></li>');
                                                 //<i class="material-icons " style=" margin-right: 15px;    font-size: 30px; color: #16b3b1;    position: absolute;">add_location</i>
                                             }
                                             else{
                                                $.post(url, function(data_place) {
                                                    console.log(data_place);
                                                    $('#box_editplaceoften').append('<li class="placeeditften" id="placeeditften' + data.id + '"><div><table width="100%"><tr><td width="70%"><div class="name">'  + data_place.results[0].formatted_address + textphone +'</div></td><td width="15%" align="center"><i class="material-icons " style="color: #ff9800; font-weight: 700;" onclick="editMyPlace('+data.id+',\'' + data.topic + '\','+data.i_lat+','+data.i_lng+',\''+data.phone+'\');">edit</i></td><td width="10%" align="center"><i class="material-icons" style="color: #f44336; font-weight: 700;" onclick="deleteMyPlace(' + data.id + ','+chTypeplace+');">delete</i></td></tr></table></div></li>');
                                                    
                                                });
                                            }                                                
                                        } 
                                    });
                        $('#edit_often_pop').hide(500)
                    }
                }                    
            });
        }
    });
}
function btn_close(x){
    // console.log(a)
    
    $('#edit_often_pop').hide(500) 
    
    
}
function editMyPlace(x,text,lat,lng,phone){
    console.log(text+'-'+phone)
    getnewnamenull = text;
    getnewphonenull = phone;
    if(text == ''){
        var url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + lat + ',' + lng + '&sensor=true&language=' + lang_to_map;
        $.post(url, function(data_place) {
            console.log(data_place);
            $('#newname').val(data_place.results[0].formatted_address)             
        });        
    }
    else{
        $('#newname').val(text)
    }
    if(phone == ''){
        $('#phoneplace').val('');        
    }
    else{
        $('#phoneplace').val(phone)        
    }
    $('#edit_often_pop').show(500)    
    id_edit_often = x;    
}
function selectEditPlaceOfften(type_place) {
    chTypeplace = type_place;
    if ($.cookie("login") == undefined) {
        $('#loading').css('display', 'block');
        // setTimeout(function() {

        //     window.location.href = base_url_tr + "register";
        // }, 500);
        
        $('#popup-login').show(500);
        setTimeout(function() {

            $('#loading').hide();
        }, 500);
        return false;
    }
    $('#edit_often').show(500)
    $('#otherBox').hide()
    $('#outedit_often').show(500)
    $('#often-input2').hide()    
    $('.placeeditften').remove();    
    $('#select_often').hide()
    DataType = [];    
    var id = $.cookie("login");
    var placeoften;
    $.post("my_place_often/place_often", { "id": id }, function(results) {
        if (results === 'false') {
        } else {
            if (results) {
                var obj = JSON.parse(results);
                console.log(obj);
                $.each(obj, function(i, data) {                 
                        if (data.s_type == type_place) { //1
                            console.log(data.s_type)
                            console.log(data.topic)
                            console.log(data.phone)
                            var textphone;
                            if(data.phone == ''){
                                textphone = '';
                            }
                            else{
                                textphone = '('+data.phone+')';
                            }
                            var url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + data.i_lat + ',' + data.i_lng + '&sensor=true&language=' + lang_to_map;
                            if(data.topic != ''){
                                $('#box_editplaceoften').append('<li class="placeeditften" id="placeeditften' + data.id + '"><div><table width="100%"><tr><td  onclick="selectMyPlace('+type_place+',\'' + data.topic + '\',' + data.i_lat + ',' + data.i_lng + ');"width="70%"><div class="name">' + data.topic + textphone+'</div></td><td width="15%" align="center"><i class="material-icons " style="color: #ff9800; font-weight: 700;" onclick="editMyPlace('+data.id+',\'' + data.topic + '\','+data.i_lat+','+data.i_lng+',\''+data.phone+'\');">edit</i></td><td width="10%" align="center"><i class="material-icons" style="color: #f44336; font-weight: 700;" onclick="deleteMyPlace(' + data.id + ',' + chTypeplace + ');">delete</i></td></tr></table></div></li>');
                            }
                            else{
                                $.post(url, function(data_place) {
                                    console.log(data_place);
                                    $('#box_editplaceoften').append('<li class="placeeditften" id="placeeditften' + data.id + '"><div><table width="100%"><tr><td onclick="selectMyPlace('+type_place+',\'' + data_place.results[0].formatted_address + '\',' + data.i_lat + ',' + data.i_lng + ');" width="70%"><div class="name">'  + data_place.results[0].formatted_address + textphone+'</div></td><td width="15%" align="center"><i class="material-icons " style="color: #ff9800; font-weight: 700;" onclick="editMyPlace('+data.id+',\'' + data.topic + '\','+data.i_lat+','+data.i_lng+',\''+data.phone+'\');">edit</i></td><td width="10%" align="center"><i class="material-icons" style="color: #f44336; font-weight: 700;" onclick="deleteMyPlace(' + data.id + ',' + chTypeplace + ');">delete</i></td></tr></table></div></li>');
                                    console.log(placeoften)
                                });
                            }                            
                        }   
                    });
            }
        }
    });
}
function deleteMyPlace(id,type_place) {
   $('#loading').show();
   DataType = [];
   $('.placeeditften').remove()    
   var iduser = $.cookie("login");
   $.post("my_place_often/delete", { "id": id }, function(results) {
    console.log(results)
    if (results === 'false') {
    } else { 
        $.post("my_place_often/place_often", { "id": iduser }, function(results) {
            if (results === 'false') {                    
            } else {
                if (results) {
                    $('#loading').hide();
                    var obj = JSON.parse(results);
                    console.log(obj);
                    $.each(obj, function(i, data) {
                            if (data.s_type == type_place) { //1
                                console.log(data.s_type)
                                console.log(data.topic)
                                var url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + data.i_lat + ',' + data.i_lng + '&sensor=true&language=' + lang_to_map;
                                if(data.topic != ''){                    
                                    $('#box_editplaceoften').append('<li class="placeeditften" id="placeeditften' + data.id + '"><div><table width="100%"><tr><td width="70%" onclick="selectMyPlace('+type_place+',\'' + data.topic + '\',' + data.i_lat + ',' + data.i_lng + ');"><div class="name">' + data.topic + '</div></td><td width="15%" align="center"><i class="material-icons " style="color: #ff9800; font-weight: 700;" onclick="editMyPlace('+data.id+',\'' + data.topic + '\');">edit</i></td><td width="10%" align="center"><i class="material-icons" style="color: #f44336; font-weight: 700;" onclick="deleteMyPlace(' + data.id + ','+type_place+');">delete</i></td></tr></table></div></li>');
                                }
                                else{
                                    $.post(url, function(data_place) {
                                        console.log(data_place);
                                        $('#box_editplaceoften').append('<li class="placeeditften" id="placeeditften' + data.id + '"><div><table width="100%"><tr><td onclick="selectMyPlace('+type_place+',\'' + data_place.results[0].formatted_address + '\',' + data.i_lat + ',' + data.i_lng + ');" width="70%"><div class="name">'  + data_place.results[0].formatted_address + '</div></td><td width="15%" align="center"><i class="material-icons " style="color: #ff9800; font-weight: 700;" onclick="editMyPlace('+data.id+',\'' + data.topic + '\');">edit</i></td><td width="10%" align="center"><i class="material-icons" style="color: #f44336; font-weight: 700;" onclick="deleteMyPlace(' + data.id + ','+type_place+');">delete</i></td></tr></table></div></li>');
                                        
                                    });
                                }                                                
                            }                   
                        });
                }
            }
            
        });
    }
});
}
function createAllMarker() {
    pin = {
        url: base_url_tr+'pic/marker_often.png',
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(45, 45)
    };
    markerPlaceOfften = new google.maps.Marker({
        map: null
    });
    markerPlaceOfften.setVisible(false);
    markerCircle = new google.maps.Marker({
        position: map.getCenter(),
        icon: {
            path: google.maps.SymbolPath.CIRCLE,
            scale: 6.5,
            fillOpacity: 1,
            strokeWeight: 1,
            fillColor: '#1b8cfe',
            strokeColor: '#ffffff'
        },
        draggable: true,
        map: map
    });

    var circle = new google.maps.Circle({
        strokeColor: '#2673f2',
        strokeOpacity: 0.2,
        strokeWeight: 1,
        fillColor: '#4285F4',
        fillOpacity: 0.25,
        map: map,
        radius: Math.sqrt(1) * 30
    });
    circle.bindTo('center', markerCircle, 'position');
    endMarker = new google.maps.Marker({
        map: map,
        animation: google.maps.Animation.DROP,
        anchorPoint: new google.maps.Point(0, -29),
        label: "B"
    });
    startMarker = new google.maps.Marker({
        map: map,
        animation: google.maps.Animation.DROP,
        anchorPoint: new google.maps.Point(0, -29),
        label: "A"
    });
}

function savePlaceOften(type_call, lat, lng, place_id, type_place) {
    var getname;
    console.log(changename)
    console.log(changephone)
    
    var datasend = {
        "lat": lat,
        "lng": lng,
        "place_id": place_id,
        "type_place": type_place,
        "login": $.cookie("login"),
        "topic": changename,
        "phone": changephone
        
    };
    console.log(datasend)
    $.ajax({
        type: 'POST',
        url: 'https://welovetaxi.com/app/booking/my_place_often/save',
        data: datasend,
            //contentType: "application/json",
            dataType: 'json',
            success: function(data) {
                console.log(data)
                $('#changesetname').val('');
                $('#changesetname1').val('');
                if (data.status == true) {
                //placeRecord();
                $('#search-often').hide()
                $('#search-often').hide();
                swal('' + success + '', "", "success");
                resetMap();
                placeRecord();
            } else {
                swal('' + error + '', "", "success");
            }
        }
    });
}

function selectMyPlace(type_place,txtAdd, latti, lngti) {
    console.log(type_place);
    console.log(txtAdd);
    console.log(curentFromTo);    
    $('#select_often').hide()
    $('#outedit_often').hide()    
    $('#outselect_often').hide()
    $('#edit_often').hide()    
    $('#otherBox').show(500)
    if( type_place == 5){
        infowindow.close();
        google.maps.event.clearListeners(map, 'center_changed');  
        
    }   
    var getplace;
    var url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + latti + ',' +lngti + '&sensor=true&language=' + lang_to_map;
    $.post(url, function(data_place) {
        console.log(data_place);
        getplace = data_place.results[0].formatted_address;    
    });  
    directionsService = new google.maps.DirectionsService;
    directionsDisplay = new google.maps.DirectionsRenderer();
    if (type_place == 4) {
        if (infowindow) {
            console.log(infowindow);
            infowindow.close();
            infowindow.setMap(null);
            infowindow = null;
        }
        google.maps.event.clearListeners(map, 'bounds_changed');
        google.maps.event.clearListeners(map, 'center_changed');
        showHeader();
        $('#search-raeltime').show(500);
        $('#clear-all').hide(500);
        $('#show-hide-pro2').hide(500);
        outSearchRealtime();
    }
    if (curentFromTo == 'From') {        
        console.log('in case from')
        $('#current').val(txtAdd);
        $('#locationfrom').html(txtAdd);
        start = {
            lat: parseFloat(latti),
            lng: parseFloat(lngti)
        }
        typeFrom = txtAdd;
        startMarker.setVisible(true);
        startMarker.setPosition(start);
        lat_f = start.lat;
        lng_f = start.lng;       
        if (end == undefined) {
            setTimeout(function() {                
                $('#pac-input').focus();
                curentFromTo == 'To';
            }, 2000);
        }
    }
    else{
        console.log('in case to')
        $('#pac-input').val(txtAdd);
        $('#locationto').html(txtAdd);        
        typeTo = txtAdd;        
        end = {
            lat: parseFloat(latti),
            lng: parseFloat(lngti)
        }
        endMarker.setVisible(true);
        endMarker.setPosition(end);
        if (start == undefined) {
            setTimeout(function() { $('#pac-input').focus(); }, 2000);
        }
    }
    console.log(start)
    console.log(end)
    console.log(lat_t)
    console.log(lng_t)
    console.log(lat_f)
    console.log(lng_f)
    if (start != undefined && end != undefined)  {
        var destination = new google.maps.LatLng(end);
        var origin = new google.maps.LatLng(start);
        var request = {
            origin: origin,
            destination: destination,
            travelMode: google.maps.TravelMode.DRIVING
        };        
        console.log(request);
        console.log('**********************************')
        console.log(lat_f);
        console.log(lng_f);
        console.log(lat_t);
        console.log(lng_t);
        console.log('**********************************')        
        directionsDisplay.setMap(map);
        directionsService.route(request, function(response, status) {
            if (status == 'ZERO_RESULTS') {
                // alert('no Directions Display');
                $('#no_pin_pop').show(500)
            } else {
                console.log(response.routes[0].legs);
                var distance = response.routes[0].legs[0].distance.text;
                var duration = response.routes[0].legs[0].duration.text;
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
                $('#edit_pin_pop').show(500)
                // getProduct(lat_f, lng_f, dist, lat_t, lng_t);
                infowindowDetailTravel = new google.maps.InfoWindow({ maxWidth: 200 });
                infowindowDetailTravel.setContent('<div><p> ' + lng_distance + ' ' + distance + '</p><p>' + lng_usetime + ' ' + duration + '</p></div>');
                infowindowDetailTravel.open(map, endMarker);
                directionsDisplay.setDirections(response);
                directionsDisplay.setOptions({
                    suppressMarkers: true,
                    preserveViewport: true
                });
                if (response.routes[0].legs[0].distance.value >= 25000) {
                    map.setZoom(10);
                } else {
                    map.setZoom(10);
                }
                $('#clear-all').show(500);
                outSearchRealtime();
            }
        });
    }
}

function setPinLocation() {
    checkshow = false;
    markerPlaceOfften.setMap(map);
    markerPlaceOfften.setVisible(true);
    var newPos2 = {
        lat: lat_f,
        lng: lng_f
    };        
    markerPlaceOfften.setPosition(newPos2);
    url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + lat_f + ',' + lng_f + '&sensor=true&language=' + lang_to_map;
    
    $('#boxForAutoCom').hide();
    $('#clear-all').show(500);
    $('#outNearby').show(500);    
    $('#map').show();

    infowindow = new google.maps.InfoWindow({ maxWidth: 200 });
    $('#btn_CurrentLocation').show(500);
    markerPlaceOfften.setMap(map);
    markerPlaceOfften.setVisible(true);
    var url;
    var Newlat;
    var Newlng;
    google.maps.event.addListener(map, 'center_changed', function() {
        Newlat = map.getCenter().lat();
        Newlng = map.getCenter().lng();
        var newPos = {
            lat: Newlat,
            lng: Newlng
        };
        markerPlaceOfften.setPosition(newPos);
        console.log(newPos);
        url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + Newlat + ',' + Newlng + '&sensor=true&language=' + lang_to_map;
        $.post(url, function(data) {
            console.log(data);
            var addr = data.results[0].formatted_address;

            infowindow.setContent('<div class="box_pin_search"><div >' + addr + '</div><div class="btn btn-sm pull-right btn-part" style="background-color: #3b5998" onclick="selectMyPlace(5,\'' + addr + '\',' + Newlat + ',' + Newlng + ');">' + choose + '</div></div>');
            infowindow.open(map, markerPlaceOfften);
        });
    });
}

function resetMap() {
    if (infowindow) {
        console.log(infowindow);
        infowindow.close();
        infowindow.setMap(null);
        infowindow = null;
    }
    if (infowindowDetailTravel) {
        console.log(infowindowDetailTravel);
        infowindowDetailTravel.close();
        infowindowDetailTravel.setMap(null);
        infowindowDetailTravel = null;
    }
    console.log('Reset Map');
    outSearchRealtime();
    if (directionsDisplay) {
        directionsDisplay.setMap(null);
        directionsDisplay = null;
        directionsService = null;
    }
    markerPlaceOfften.setMap(null);
    endMarker.setVisible(false);
    startMarker.setVisible(false);
    google.maps.event.clearListeners(map, 'center_changed');
    google.maps.event.clearListeners(map, 'bounds_changed');
    showHeader();
    if ($('#search-show').css('display') == 'block') {

    } else {
        $('#search-raeltime').show(700);
    }

    $('#clear-all').hide(500);
    $('#show-hide-pro2').hide(500);
    map.panTo(pos);
    start = pos;
    end = null;
    google.maps.event.addListener(map, 'dragend', function() {
        $('#btn_CurrentLocation').show('500');
    });
}