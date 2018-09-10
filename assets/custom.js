var array_data = [];
//startTimeHome();
var clock_h;

function startTimeHome() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTimeHome(m);
    s = checkTimeHome(s);
    document.getElementById('load_data_time').innerHTML = h + ":" + m + ":" + s;
    clock_h = setTimeout(startTimeHome, 1000);
}

function checkTimeHome(i) {
    if (i < 10) {
        i = "0" + i
    }; // add zero in front of numbers < 10
    return i;
}


var userLang = navigator.language || navigator.userLanguage;
userLang = userLang.split('-');
var js_lng = userLang[0];
console.log('Js Browser lng : ' + js_lng);

var id, target, options;
var first_get_pos = true;
var current, crd;
target = {
    latitude: 0,
    longitude: 0
};

options = {
    enableHighAccuracy: false,
    timeout: 5000,
    maximumAge: 0
};

function success(pos) {

    if (first_get_pos == true) {
        current = {
            lat: parseFloat(pos.coords.latitude),
            lng: parseFloat(pos.coords.longitude)
        };
        //        console.log(current);
        showPosition(pos);
        first_get_pos = false;
    }
    crd = {
        lat: parseFloat(pos.coords.latitude),
        lng: parseFloat(pos.coords.longitude)
    };
    var radlat1 = Math.PI * current.lat / 180
    var radlat2 = Math.PI * crd.lat / 180
    var theta = current.lng - crd.lng;
    var radtheta = Math.PI * theta / 180
    var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
    dist = Math.acos(dist)
    dist = dist * 180 / Math.PI
    dist = dist * 60 * 1.609344;
    var m = dist * 1000;
    //        console.log(m);
    //		if( JSON.stringify(current) != JSON.stringify(start) ){
    if (m > 50) {
        showPosition(pos)
        console.log(m);
        current = crd;
    } else {
        //			return false;
    }
}

function error(err) {
    console.warn('ERROR(' + err.code + '): ' + err.message);
}
id = navigator.geolocation.watchPosition(success, error, options);


function showPosition(position) {
    //      var cook_lng = getCookie("lng");
    var cook_lng = $.cookie("lng");
    if (cook_lng == 'th') {
        lng = "th";
    } else if (cook_lng == 'cn') {
        lng = "zh-CN";
    } else if (cook_lng == 'en') {
        lng = "en";
    } else {
        lng = "<?=$keep;?>";
    }
    console.log('Php Browser lng : ' + lng);
    var url = 'https://maps.google.com/maps/api/geocode/json?latlng=' + position.coords.latitude + ',' + position.coords.longitude + '&sensor=false&language=' + lng + '&key=AIzaSyCx4SLk_yKsh0FUjd6BgmEo-9B0m6z_xxM';
    console.log(url);
    $('#lat').val(position.coords.latitude);
    $('#lng').val(position.coords.longitude);
    //console.log(position.coords.latitude+" : "+position.coords.longitude);
    $.post(url, function(data) {
        //   console.log(data);
        if (data.status == "OVER_QUERY_LIMIT") {
            console.log('OVER_QUERY_LIMIT');
        } else {
            /*console.log(data.results);
            console.log(data.results.length-2);
            console.log(data.results[data.results.length-2].address_components[0].long_name);*/
            var province = data.results[data.results.length - 2].address_components[0].long_name;
            $('#province_text').text(province);
            $('#now_province').val(province);
            updatePlaceNum(province);
        }
    });
}

function updatePlaceNum(province) {
	console.log(province)
//    var url = "mod/shop/select_province_new.php?op=get_id_province_only";
    var url = "main/get_id_province";
    $.post(url, {
        txt_pv: province
    }, function(obj) {
//        var obj = JSON.parse(data);
        //      console.log(obj);
        var province = obj[0].id;
        var area = obj[0].area;
//        var url2 = "mod/shop/update_num_place.php?op=update_all&province=" + province + '&area=' + area;
        var url2 = "main/update_num_place"+"?province=" + province + '&area=' + area;
        $.post(url2, function(data2) {
			console.log(data2);
        });
    });
}

var array_rooms;
var res_socket;
var socket = io.connect('https://www.welovetaxi.com:3443');

//on message received we print all the data inside the #container div
socket.on('notification', function(data) {
    //          console.log("Start Socket");
//    			console.log(data);
    if (typeof data.transfer !== 'undefined' && data.transfer.length > 0) {
        res_socket = data.transfer[0];
        if (data.transfer[0].length > 0) {
            $('#number_tbooking').show();
        } else {
            $('#number_tbooking').hide();
        }

        $('#number_tbooking').text(data.transfer[0].length);
        if ($('#check_open_worktbooking').val() == 1) {
            console.log(data.transfer);
            $('#tab-trans_job').attr('badge',data.transfer[0].length);
            //        console.log('now open popup');
            readDataBooking();
        }

    }
});
var shop_frist_run = 0;
var user_class = "<?=$data_user_class;?>";
var frist_socket = true;
socket.on('getbookinglab', function(data) {
    //console.log(data.booking)
    array_data = [];
    var done = [];
    var none = [];
    $.each(data.booking, function(index, value) {
        var current = formatDate(new Date());
        var db = formatDate(value.transfer_date);
        if (value.driver_complete == 0) {
            if (user_class == "lab") {
                if (db == current) {
                    done.push(value);
                }
            } else {
                if (db == current && value.drivername == detect_user) {
                    done.push(value);
                }
            }
        }

    });
    array_data = {
        manage: done,
        history: none
    };
    //        console.log(array_data);
    if (done.length > 0) {
        $('#number_shop').show();
        //			$('#circle_icon_shop').addClass("pulse");
    } else {
        $('#number_shop').hide();
        //			$('#circle_icon_shop').removeClass("btn-floating pulse pd-5");
    }
    $('#number_shop').text(done.length);
    if ($('#check_open_workshop').val() == 1) {
        if (shop_frist_run == 0) {
            shop_frist_run = done.length;
        }
        if (done.length != shop_frist_run) {
            filterMenu('manage');
            shop_frist_run = done.length;
        }
    }
    
    /* check open order id auto */
   
    if (frist_socket == true) {
    	var url_string = window.location.href; //window.location.href
		var url = new URL(url_string);
		var get_order_id = url.searchParams.get("order_id");
		
//        var get_order_id = "<?=$_GET['order_id'];?>";
        var status = url.searchParams.get("status");
        var open_ic = url.searchParams.get("open_ic");;
        if (get_order_id != "") {
            if (status == "his") {
                openOrderFromAndroidHistory(get_order_id, status, open_ic);

            } else {
                console.log("order id : " + get_order_id);
                console.log(array_data);
                $.each(array_data.manage, function(index, value) {
                    if (value.id == get_order_id) {

                        console.log(value.id + " : " + index);
                        $('#check_open_num_detail').val(index)
                        $('#check_open_shop_id').val(value.id);
                        var url = "empty_style.php?name=booking/shop_history&file=work_shop_detail_js&user_id="+detect_user;
                        $.post(url, value, function(data) {
                            $('#load_mod_popup_clean').html(data);
                            $('#main_load_mod_popup_clean').fadeIn();

                        });

                    }
                });
            }

        }
        frist_socket = false;
    }
});
var id = detect_user;
var dataorder = {
    order: parseInt(id),
};
socket.emit('sendchat', '');
// socket.on('connect', function(){  
socket.emit('adduser', dataorder);
//console.log(dataorder);
// });
socket.on('updaterooms', function(rooms, current_room) {
    $('#rooms').empty();
    console.log(rooms)
    array_rooms = rooms;
    console.log(current_room)
});
// socket.on("disconnect", function(){
//    socket.disconnect();
//      console.log("client disconnected from server");
//  });

// if(class_user=="lab"){

socket.on('datalab', function(username, data) {
    console.log('***********************datalab***************************')
    console.log(username)
    console.log(data)
    //console.log(data[0].id);
    var check_open = $('#check_open_shop_id').val();
    if (check_open != 0) {
        $.each(data, function(index, value) {
            if (value.id == check_open) {
                console.log(value);
                if (value.check_driver_topoint == 1) {
                    console.log("driver_topoint");
                    changeHtml("driver_topoint", value.id, value.driver_topoint_date)
                }
                if (value.check_guest_receive == 1) {
                    console.log("guest_receive");
                    changeHtml("guest_receive", value.id, value.guest_receive_date)
                }
                if (value.check_guest_register == 1) {
                    console.log("guest_register");
                    changeHtml("guest_register", value.id, value.guest_register_date)
                }
                if (value.check_driver_pay_report == 1) {
                    console.log("driver_pay_report");
                    changeHtml("driver_pay_report", value.id, value.driver_pay_report_date)
                }
                var check_open_incom = $('#check_id_income_lab').val();
                if (typeof check_open_incom != 'undefined') {
                    if (check_open_incom == check_open) {
                        console.log("Refresh Incom = " + check_open_incom + " | " + check_open);
                        openViewPrice()
                    }
                }
            }
        });
    }
});
// }
// else{
socket.on('updatedriver', function(username, data) {
    console.log("++++++++++++++++++++++datadriver++++++++++++++++++++++++++++++++")
    console.log(username)
    console.log(data)
    var check_open = $('#check_open_shop_id').val();
    if (check_open != 0) {
        if (data.id == check_open) {
            console.log(data)
            console.log(data.id);
            if (data.check_driver_topoint == 1) {
                console.log("driver_topoint");
                changeHtml("driver_topoint", data.id, data.driver_topoint_date)
            }
            if (data.check_guest_receive == 1) {
                console.log("guest_receive");
                changeHtml("guest_receive", data.id, data.guest_receive_date)
                $('#step_guest_register').show();
            }
            if (data.check_guest_register == 1) {
                console.log("guest_register");
                changeHtml("guest_register", data.id, data.guest_register_date)
                $('#step_driver_pay_report').show();
            }
            if (data.check_driver_pay_report == 1) {
                console.log("driver_pay_report");
                changeHtml("driver_pay_report", data.id, data.driver_pay_report_date)
            }
            /*var check_open_incom = $('#check_id_income_lab').val();
            if (typeof check_open_incom != 'undefined'){
            console.log(check_open_incom);
            //             alert(check_open_incom);
            openViewPrice()
            }*/
        }
    }
});
// }
/*socket.on('getbookinglabhis', function (data) {
console.log(data.booking)
});  */
function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();
    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;
    return [year, month, day].join('-');
}

function formatTime(date) {
    var d = new Date(date),
        hour = '' + d.getHours(),
        minutes = d.getMinutes();
    if (hour < 10) {
        hour = "0" + hour;
    }
    if (minutes < 10) {
        minutes = "0" + minutes;
    }
    return [hour, minutes].join(':');
}

function openOrderFromAndroid(id, status, open_ic) {
    //    alert("id = " + id+" status = "+status+" open_ic = "+open_ic);
    if (status == "his") {
        openOrderFromAndroidHistory(id, status, open_ic)
    } else {
        var check_open_shop_id = $('#check_open_shop_id').val();
        if (check_open_shop_id <= 0) {
            $.each(array_data.manage, function(index, value) {
                if (value.id == id) {
                    /*$('#main_load_mod_popup_6').show();
                    var url_load= "load_page_mod_6.php?name=booking/shop_history&file=work_shop_detail_js&user_id=<?=$user_id;?>";
                    console.log(url_load);
                    $('#text_mod_topic_action_6').html("เลขที่ "+value.invoice);
                    $('#load_mod_popup_6').html(load_main_mod);
                    $.post(url_load,value,function(data){
                    $('#load_mod_popup_6').html(data);
                    $('#btn_cancel_book_'+value.id).css('top','60px');
                    $('.assas_'+value.id).css('margin-top','30px');
                    });*/
                    console.log(value.id + " : " + index);
                    $('#check_open_num_detail').val(index)
                    var url = "empty_style.php?name=booking/shop_history&file=work_shop_detail_js&user_id="+detect_user;
                    $.post(url, value, function(data) {
                        $('#load_mod_popup_clean').html(data);
                        $('#main_load_mod_popup_clean').show();
                        if (open_ic == '1') {
                            openViewPrice();
                            console.log('Open Income')
                        }
                    });
                    $('#check_open_shop_id').val(value.id);
                }
            });
        }
    }
}

function openOrderFromAndroidHistory(id, status, open_ic) {
    //    alert(id);
    $.post("mod/booking/shop_history/php_shop.php?query=history_by_order&order_id=" + id, function(data) {
        console.log(data);
        var value = data.data[0];
        var url = "empty_style.php?name=booking/shop_history&file=work_shop_detail_js&user_id="+detect_user;
        console.log(url);
        $.post(url, value, function(data) {
            $('#load_mod_popup_clean').html(data);
            $('#main_load_mod_popup_clean').show();
            $('#btn_cancel_book_' + value.id).css('top', 'unset');
            //                   $('.assas_'+value.id).css('margin-top','0px');
            $("#load_material").fadeOut();
            if (open_ic == '1') {
                openViewPrice();
                console.log('Open Income')
            }
        });
    });
}

getTansferJobNumber(detect_user, today);

function getTansferJobNumber(driver, date) {
	var pram = {
        driver: driver,
        date: date
    };
//    console.log("+99-");
//    console.log(pram);
    $.post("api/get_my_transfer_job", pram , function(res) {
//    	console.log(res)
    	var res = JSON.parse(res);
        var num = res.data.result;
        console.log(num + " +++")

        if (num > 0) {
            $('#number_tbooking_history').show();
            //			alert(32);
        } else {
            $('#number_tbooking_history').hide();
        }
        //		$('#number_tbooking_history').show();
        $('#number_tbooking_history').text(num);
    });
}

function sendSocket(id) {
    console.log('Click');
    //   var message = "";
    var dataorder = {
        order: parseInt(id),
    };
    socket.emit('sendchat', dataorder);
}

function selectnation(x){

    	var val = $('#persion_china').val();
    	console.log('cn '+val);
        if(val==0){
			 $('#persion_china').prop('checked', true); 
			 $('#persion_china').val(1);
		}else{
			 $('#persion_china').prop('checked', false); 
			  $('#persion_china').val(0);
		}
         
      }

function selectnation2(x){
        console.log('oth');
        /* if (x == 0 && ch_other == false) {
            $('#persion_other').prop('checked', true); // Checks it
            ch_other = true;
            $('#persion_other').val(x)
            $('#box_other').show(500)
         }
         else {
            $('#persion_other').prop('checked', false);
            ch_other = false;
            $('#persion_other').val('')
             $('#box_other').hide(500)
         }*/
         
         
}
      
function hideRes(id){
	var txt = $('#'+id).val();
	console.log(txt);
	if(txt.length<1){
		$('#'+id+'_x').hide();
	}else{
		$('#'+id+'_x').show();
	}
}