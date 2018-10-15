function testNotiSend(){
	 var txt_long_ac = "S00159 : HKT0153 เพิ่มรายการส่งแขก คิงส์ พาวเวอร์ (ภูเก็ต)";
                var ac = {
					/*i_type : 1,
					i_sub_type : 1,
					i_event : 170,
					i_driver : detect_user,
					s_topic : "งานส่งแขก",
					s_message : txt_long_ac,
					s_posted : username*/
				};
				
				 var txt_long_nc = "S00159 : HKT0153 เพิ่มรายการส่งแขก คิงส์ พาวเวอร์ (ภูเก็ต)";
				 var nc = {
					i_type : 1,
					i_event :	170,
					i_user :	0,
					s_class_user :	"lab",
					s_topic : "งานส่งแขก",
					s_sub_topic : "เช็คอิน",
					s_message :	txt_long_nc,
					s_posted :	username
				 };
				apiRecordActivityAndNotification(ac, nc);
}

function testSwp(){
	fn.pushPage({
        'id': 'test_swp.html',
        'title': 'Test'
    }, 'slide-ios');
}

function reloadApp(){
	var newURL = window.location.protocol + "//" + window.location.host + "" + window.location.pathname + window.location.search;
	console.log(newURL);
//	location.replace(reloadApp)
	window.location = newURL;
}

function setCountNotification(){
	$.ajax({
			        url: "notification/count_notification?id_user="+$.cookie("detect_user"), // point to server-side PHP script 
			        dataType: 'json', // what to expect back from the PHP script, if anything
			        type: 'post',
			        success: function(num) {
//			        	console.log(num);
//			        	num = 0;
			        	if(num>0){
							$('.fa-bell').addClass('bell');		    
							$('#tab_notification').attr('badge', num);
						}else{
							$('.fa-bell').removeClass('bell');		    
							$('#tab_notification').attr('badge', '');
						}
						
			        }
			    });
	
}

function loadNotificationPage(){
//	$('#body_load_notification').html(progress_circle);
	var url = "page/notification";
    $.post(url, function(html) {
        $('#body_load_notification').html(html);
    });
}

function loadActivityPage(){
//	$('#body_load_activity').html(progress_circle);
	var url = "page/activity";
    $.post(url, function(html) {
        $('#body_load_activity').html(html);

    });
}

var delay = (function() {
    var timer = 0;
    return function(callback, ms) {
        clearTimeout(timer);
        timer = setTimeout(callback, ms);
    };
})();

var array_data = [];
//startTimeHome();
var clock_h;

function js_yyyy_mm_dd_hh_mm_ss() {
    now = new Date();
    year = "" + now.getFullYear();
    month = "" + (now.getMonth() + 1);
    if (month.length == 1) {
        month = "0" + month;
    }
    day = "" + now.getDate();
    if (day.length == 1) {
        day = "0" + day;
    }
    hour = "" + now.getHours();
    if (hour.length == 1) {
        hour = "0" + hour;
    }
    minute = "" + now.getMinutes();
    if (minute.length == 1) {
        minute = "0" + minute;
    }
    second = "" + now.getSeconds();
    if (second.length == 1) {
        second = "0" + second;
    }
    return year + "/" + month + "/" + day + " " + hour + ":" + minute + ":" + second;
}

/*function findDiffDynamic(d1, d2, type){
	datetime1 = d1;
    datetime2 = d2;
    //Set date time format
    var startDate = new Date(datetime1);
    var endDate = new Date(datetime2);
    var seconds = (endDate.getTime() - startDate.getTime()) / 1000;
    //Calculate time
    var days = Math.floor(seconds / (3600 * 24));
    var hrs_d = Math.floor((seconds - (days * (3600 * 24))) / 3600);
    var hrs = Math.floor(seconds / 3600);
    var mnts = Math.floor((seconds - (hrs * 3600)) / 60);
    var secs = seconds - (hrs * 3600) - (mnts * 60);
    //old
    var hrs_d_bc = hrs_d;
    var mnts_bc = mnts;
    var secs_bc = secs;
    //Add 0 if one digit
    if(type=="H"){
		return hrs_d_bc;
	}
}*/

function CheckTime(d1, d2) {
    //      console.log(d1+" = "+d2);
    datetime1 = d1;
    datetime2 = d2;
    //Set date time format
    var startDate = new Date(datetime1);
    var endDate = new Date(datetime2);
    var seconds = (endDate.getTime() - startDate.getTime()) / 1000;
    //Calculate time
    var days = Math.floor(seconds / (3600 * 24));
    var hrs_d = Math.floor((seconds - (days * (3600 * 24))) / 3600);
    var hrs = Math.floor(seconds / 3600);
    var mnts = Math.floor((seconds - (hrs * 3600)) / 60);
    var secs = seconds - (hrs * 3600) - (mnts * 60);
    //old
    var hrs_d_bc = hrs_d;
    var mnts_bc = mnts;
    var secs_bc = secs;
    //Add 0 if one digit
    if (hrs_d < 10) hrs_d = "0" + hrs_d;
    if (mnts < 10) mnts = "0" + mnts;
    if (secs < 10) secs = "0" + secs;
    var final_txt, day_txt, h_txy, m_txt, old_txt;
    if (days == 0) {
        day_txt = '';
    } else {
        day_txt = days + ' วัน';
    }
    if (hrs_d_bc == 0) {
        h_txy = '';
    } else {
        h_txy = ' ' + hrs_d_bc + ' ชั่วโมง.';
    }
    if (mnts_bc == 0) {
        m_txt = '';
    } else {
        m_txt = ' ' + mnts_bc + ' นาที';
    }
    final_txt = day_txt + h_txy + m_txt
    old_txt = days + ' ' + hrs_d + ':' + mnts + ':' + secs;
    if (days <= 0 && hrs_d_bc <= 0 && mnts_bc <= 0) {
        return "ไม่กี่วินาทีที่ผ่านมา";
    }
    return final_txt + "ที่ผ่านมา";
}

function performClick(elemId) {
    console.log(elemId);
    var elem = document.getElementById(elemId);
    if (elem && document.createEvent) {
        var evt = document.createEvent("MouseEvents");
        evt.initEvent("click", true, false);
        elem.dispatchEvent(evt);
    }
}

function gotoDiv(id) {
    window.location.hash = '#' + id;
    window.location.hash = '';
}

function checkImgProfile(username, pf) {
//    console.log(username);
    var url = "../data/pic/driver/small/" + username + ".jpg?v=" + $.now();
    $.ajax({
        url: url,
        type: 'HEAD',
        error: function() {
            console.log('Error Profile');
        },
        success: function() {
            console.log('Success Profile');
            if (pf == 1) {
                $('#pv_profile').attr('src', url);
                iconsHasPic(1, "txt-img-has-profile", "txt-img-nohas-profile");
                return;
            }
            $('.shotcut-profile').attr('src', url);
            $('.profile-pic-big').attr('src', url);
            $('.profile-pic-big').attr('onclick', 'viewPhotoGlobal(\'' + url + '\', "", "");');
        }
    });
}
setTimeout(function() {
    checkImgProfile($.cookie("detect_username"), 0);
}, 500);


function iconsHasPic(icons, id1, id2) {
    if (icons >= 1) {
        $('#' + id1).show();
        $('#' + id2).hide();
    }
}

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
    } // add zero in front of numbers < 10
    return i;
}

function use_often(id) {}

function cancel_often(id) {}

function sendTagIOS(classname, username) {
    var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
    if (iOS == true) {
        var url_xcode = "send://ios?class=" + classname + "&username=" + username + "&test=0";
        console.log(url_xcode);
        window.location = url_xcode;
    }
}

function deleteTagIOS(classname, username) {
    var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
    if (iOS == true) {
        var url_xcode = "delete://ios?class=" + classname + "&username=" + username + "&test=0";
        console.log(url_xcode);
        window.location = url_xcode;
    }
}

function createSignOut() {
    var dialog = document.getElementById('signout-alert-dialog');

    if (dialog) {
        dialog.show();
    } else {
        ons.createElement('signout-dialog.html', {
                append: true
            })
            .then(function(dialog) {
                dialog.show();
            });
    }
}

function logOut() {
    $('#signout-alert-dialog').hide();
    /*$.removeCookie('detect_user', {
        path: '/'
    });
    $.removeCookie('detect_userclass', {
        path: '/'
    });
    $.removeCookie('detect_username', {
        path: '/'
    });*/
    //                    clearCookieAll();
    /*ons.notification.alert({
            message: 'ออกจากระบบสำเร็จ',
            title: "สำเร็จ",
            buttonLabel: "ปิด"
        })
        .then(function() {
			

        });*/
    clearCookieAll();
    deleteTagOs("Test Text");
    deleteTagIOS(class_user, username);
    window.location = "../TShare_new/material/login/index.php";    
}

function openNotifyline() {
    location.href = "https://www.welovetaxi.com/app/TShare_new/index.php?regis=linenoti&scope=notify&state=one"
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
var run_num_place = true;
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
        lng = "th";
    }
//    console.log('Php Browser lng : ' + lng);
    var url = 'https://maps.google.com/maps/api/geocode/json?latlng=' + position.coords.latitude + ',' + position.coords.longitude + '&sensor=false&language=' + lng + '&key=AIzaSyCx4SLk_yKsh0FUjd6BgmEo-9B0m6z_xxM';
//    console.log(url);
//    console.log(position.coords);
    $('#lat').val(position.coords.latitude);
    $('#lng').val(position.coords.longitude);
//    console.log($('#lat').val() + " ...");
    //console.log(position.coords.latitude+" : "+position.coords.longitude);
    $.post(url, function(data) {
        //   console.log(data);
        if (data.status == "OVER_QUERY_LIMIT") {
            console.log('OVER_QUERY_LIMIT');
        } else {
//            console.log(data.results);
            /*console.log(data.results.length-2);
            console.log(data.results[data.results.length-2].address_components[0].long_name);*/
            var province = data.results[data.results.length - 2].address_components[0].long_name;
            $('#province_text').text(province);
            $('#now_province').val(province);
            if(run_num_place==true){
				updatePlaceNum(province);
				run_num_place = false;
			}
        }
    });
}

function updatePlaceNum(province) {
//    console.log("++++"+province)
    //    var url = "mod/shop/select_province_new.php?op=get_id_province_only";
    var url = "main/get_id_province";
    $.post(url, {
        txt_pv: province
    }, function(obj) {
        //        var obj = JSON.parse(data);
              console.log(obj);
        var province = obj[0].id;
        var area = obj[0].area;
        //        var url2 = "mod/shop/update_num_place.php?op=update_all&province=" + province + '&area=' + area;
        var url2 = "main/update_num_place" + "?province=" + province + '&area=' + area;
        $.post(url2, function(data2) {
//            console.log(data2);
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
            $('#tab-trans_job').attr('badge', data.transfer[0].length);
            //        console.log('now open popup');
            readDataBooking();
        }
    }
});
var shop_frist_run = 0;
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
            if (class_user == "lab") {
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
//                console.log(array_data.manage);
    if (done.length > 0) {
        $('#number_shop').show();
        //			$('#circle_icon_shop').addClass("pulse");
    } else {
        $('#number_shop').hide();
        //			$('#circle_icon_shop').removeClass("btn-floating pulse pd-5");
    }
    $('#number_shop').text(done.length);
    if ($('#number_shop').text() != 0) {
        $('#num_manage').show();
        $('#num_manage').html($('#number_shop').text());
    }else{
		$('#num_manage').hide();
	}


    // $('ons-tab[page="shop_manage.html"]').attr('badge', $('#number_shop').text());
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
//                console.log("order id : " + get_order_id);
//                console.log(array_data);
                $.each(array_data.manage, function(index, value) {
                    if (value.id == get_order_id) {
                        console.log(value.id + " : " + index);
                        $('#check_open_num_detail').val(index)
                        $('#check_open_shop_id').val(value.id);
                        var url = "empty_style.php?name=booking/shop_history&file=work_shop_detail_js&user_id=" + detect_user;
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
socket.emit('adduser', dataorder);
socket.on('updaterooms', function(rooms, current_room) {
    $('#rooms').empty();
    console.log(rooms)
    array_rooms = rooms;
    console.log(current_room)
});

socket.on('datalab', function(username, data) {
    console.log('***********************datalab***************************')
    console.log(username)
    console.log(data)

    //console.log(data[0].id);
    var check_open = $('#check_open_shop_id').val();
    if (check_open != 0) {
        $.each(data, function(index, value) {
            console.log(data)
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
                var check_open_incom = $('#check_id_income').val();
                if (typeof check_open_incom != 'undefined') {
                    if (check_open_incom == check_open) {
                        console.log("Refresh Incom = " + check_open_incom + " | " + check_open);
                        //                        openViewPrice()
                        reloadIncomeShop(value.id);
                    }
                }
            }
        });
    }
});

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
        }
    }
	
    console.log($('#open_shop_manage').val());
    if ($('#open_shop_manage').val() == 1) {
        console.log("*************************************");
       
        setTimeout(function(){  shopManage(); }, 1500);
    }
	setCountNotification();
	if($('#check_open_noti_menu').val()==1){
		loadNotificationPage();
	}
});

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
                    var url = "empty_style.php?name=booking/shop_history&file=work_shop_detail_js&user_id=" + detect_user;
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
        var url = "empty_style.php?name=booking/shop_history&file=work_shop_detail_js&user_id=" + detect_user;
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
    $.post("api/get_my_transfer_job", pram, function(res) {
        //    	console.log(res)
        var res = JSON.parse(res);
        var num = res.data.result;
//        console.log(num + " +++")
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
    console.log('Click '+id );
    //   var message = "";
    var dataorder = {
        order: parseInt(id),
    };
    socket.emit('sendchat', dataorder);
}

function hideRes(id) {
    var txt = $('#' + id).val();
    console.log(txt);
    if (txt.length < 1) {
        $('#' + id + '_x').hide();
    } else {
        $('#' + id + '_x').show();
    }
}
/*************************** Menu function *********************************/
function sendShop(company) {
    fn.pushPage({
        'id': 'shopping.html',
        'title': 'ส่งแขก',
        'key': 'shop'
    })
    //                       var url = "page/call_page";
    //   $.post(url,{ path : "car/car_view" },function(ele){
    //    $('#body_shop').html(ele);
    // });
    var url2 = "shop/shop_pageadd?shop_id=" + company;
    var urlcount = "shop/car_count";


    $.post(url2, function(ele2) {
        if (class_user == "taxi") {

            $.post(urlcount, function(res) {
                if (res == 0) {

                    ons.notification.alert({
                            message: 'ไม่มีรถใช้งานกรุณาเพิ่มรถ เพื่อส่งแขก',
                            title: "ไม่สามารถส่งแขกได้",
                            buttonLabel: "เพิ่มรถ"
                        })
                        .then(function() {
                            // callpop();
                            callpop();
                            setTimeout(function() {
                                myCar();
                            }, 700);

                            return;
                        });

                }
            });

        }
         setTimeout(function() {
        modal.hide();

        $('#shop_add').html(ele2);
        var pass = {
            date: moment().format('YYYY-MM-DD'),
            driver: $.cookie("detect_user"),
            type: 'his'
        };
        // console.log(pass);
        var urlcounthis = "shop/count_his"
        $.ajax({
            url: urlcounthis,
            data: pass,
            type: 'post',
            success: function(res) {
                // console.log(res);
                if (res != 0) {
                    $('#num_his').show();
                    $('#num_his').html(res);
                }
                // $('ons-tab[page="shop_history.html"]').attr('badge', res);
            }
        });
        }, 1000);


    });
}

function sendShop2() {
    modal.show();
    
    var urlo = 'shop/place_companycount';
    $.post(urlo, function(res) {
        console.log(res)
        if (res.count == 1) {

            fn.pushPage({
                'id': 'shopping.html',
                'title': 'ส่งแขก',
                'key': 'shop'
            })
            //                       var url = "page/call_page";
            //   $.post(url,{ path : "car/car_view" },function(ele){
            //    $('#body_shop').html(ele);
            // });
            var url2 = "shop/shop_pageadd?shop_id=" + res.shop_id;
            var urlcount = "shop/car_count";


            $.post(url2, function(ele2) {
                if (class_user == "taxi") {

                    $.post(urlcount, function(res) {
                        if (res == 0) {

                            ons.notification.alert({
                                    message: 'ไม่มีรถใช้งานกรุณาเพิ่มรถ เพื่อส่งแขก',
                                    title: "ไม่สามารถส่งแขกได้",
                                    buttonLabel: "เพิ่มรถ"
                                })
                                .then(function() {
                                    // callpop();
                                    callpop();
                                    setTimeout(function() {
                                        myCar();
                                    }, 700);

                                    return;
                                });

                        }
                    });

                }
                
                setTimeout(function() {
            modal.hide();
                $('#shop_add').html(ele2);
                var pass = {
                    date: moment().format('YYYY-MM-DD'),
                    driver: $.cookie("detect_user"),
                    type: 'his'
                };
                console.log(pass);
                var urlcounthis = "shop/count_his"
                $.ajax({
                    url: urlcounthis,
                    data: pass,
                    type: 'post',
                    success: function(res) {
                        // console.log(res);
                        if (res != 0) {
                            $('#num_his').show();
                            $('#num_his').html(res);
                        }
                        // $('ons-tab[page="shop_history.html"]').attr('badge', res);
                    }
                });
                }, 1000);


            });




        }
		else {
            modal.hide();
            fn.pushPage({
                'id': 'place_company.html',
                'title': 'ส่งแขก'
            }, 'slide-ios')
            var url = "shop/place_company";
            $.post(url, function(res) {
                // console.log(res)
                $('#body_place_company').html(res);
            });
        }
        // $('#body_place_company').html(res);
    });

 // }, 1000);

}

function callpop() {
    appNavigator.popPage()
}

function profileInfo(animate) {
    fn.pushPage({
        'id': 'pf.html',
        'title': 'ข้อมูลส่วนตัว',
        'key': 'profile'
    }, animate);
    var url = "page/profile_edit";
    $.post(url, function(html) {
        $('#body_profile_view').html(html);

        setTimeout(function() {
            checkPicDocProfile();
        }, 700);
        checkImgProfile($.cookie("detect_username"), 1);
    });
}

function sendTransfer() {
    ons.notification.alert({
            message: 'ยังไม่เปิดให้บริการ',
            title: "ขอภัย",
            buttonLabel: "ปิด"
        })
        .then(function() {});
    return;
    fn.pushPage({
        'id': 'transfer.html',
        'title': 'ให้บริการรถ',
        'key': 'transfer'
    })
    var url = "page/transfer";
    $('#check_open_worktbooking').val(1);
    $.post(url, function(html) {
        $('#transfer_job').html(html);
    });
}

function booking() {
    ons.notification.alert({
            message: 'ยังไม่เปิดให้บริการ',
            title: "ขอภัย",
            buttonLabel: "ปิด"
        })
        .then(function() {});
    return;
    fn.pushPage({
        'id': 'book_trans.html',
        'title': 'จองรถ',
        'key': 'book_trans'
    })
}

function tour() {
    ons.notification.alert({
            message: 'ยังไม่เปิดให้บริการ',
            title: "ขอภัย",
            buttonLabel: "ปิด"
        })
        .then(function() {});
    return;
    fn.pushPage({
        'id': 'book_tour.html',
        'title': 'จองทัวร์',
        'key': 'book_tour'
    })
}

function pay() {
    ons.notification.alert({
            message: 'ยังไม่เปิดให้บริการ',
            title: "ขอภัย",
            buttonLabel: "ปิด"
        })
        .then(function() {});
    return;
    fn.pushPage({
        'id': 'popup1.html',
        'title': 'รายรับ'
    })
}

function myAccountBank() {
    fn.pushPage({
        'id': 'account_bank.html',
        'title': 'ข้อมูลบัญชีธนาคาร'
    }, 'slide-ios');
    var url = "page/call_page";
    $.post(url, {
        path: "bank/bank_view"
    }, function(ele) {
        $('#body_account_bank').html(ele);
        setTimeout(function(){
			setnumbank();
			if($('#detect_num_bank').val()==0){
				addBank();
			}
		}, 500);
    });
}

function myCar() {
    fn.pushPage({
        'id': 'car_manage.html',
        'title': 'ข้อมูลรถ'
    }, 'slide-ios');

    $.post("car/check_num_car", {
        driver_id: $.cookie("detect_user")
    }, function(res) {
        console.log(res);
        var url = "page/call_page";
        $.post(url, {
            path: "car/car_view"
        }, function(ele) {
            $('#body_car_manage').html(ele);

        });
    });
}

function wallet() {
    fn.pushPage({
        'id': 'wallet.html',
        'title': 'กระเป๋าเงิน'
    }, 'slide-ios');

}

function contrac_us() {
    fn.pushPage({
        'id': 'contract_us.html',
        'title': 'ติดต่อเรา'
    }, 'lift-ios');
    var url = "page/contrac_us";
    $.post(url, function(html) {
        console.log(html)
        $('#body_contract').html(html);
    });
}

function reference() {
    fn.pushPage({
        'id': 'qrcode_ref.html',
        'title': 'แนะนำเพื่อน',
        'key': 'contract_us'
    }, 'lift-ios');
}

function income() {
    fn.pushPage({
        'id': 'income.html',
        'title': 'รายรับ'
    }, 'slide-ios');

    $.post("page/call_page", {
        path: "statement/shop_ic"
    }, function(ele) {
        $('#shop_ic').html(ele);
    });
}

function language(lng) {
    console.log(lng);
    setCookie("lng", lng, 1);
    window.location.reload();
}

function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function viewPhotoGlobal(path, time, caption) {

    fn.pushPage({
        'id': 'popup2.html',
        'title': 'ภาพ'
    }, 'fade-md');
    var url_load = "page/view_photo?time=" + time + "&path=" + path + "&caption=" + caption;
    $.post(url_load, function(ele) {
        $('#body_popup2').html(ele);
    });

    /* var dialog = document.getElementById('photo-view-dialog');

		  if (dialog) {
		    dialog.show();
		  } else {
		    ons.createElement('photo-dialog.html', { append: true })
		      .then(function(dialog) {
		        dialog.show();
		      });
		  }
    var url_load = "page/view_photo?time=" + time + "&path=" + path+"&caption="+caption;
    $.post(url_load, function(ele) {
        $('#body-photo-view').html(ele);
    });*/

}

function readURLprofileHome(input, type) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {

            $('.profile-pic-big').attr('src', e.target.result);
            $('.shotcut-profile').attr('src', e.target.result);

            var data = new FormData($('#upload_pf_home')[0]);
            data.append('imgInp', $('#img_profile_home')[0].files[0]);
            var id = $.cookie("detect_username");
            var url_upload = "application/views/upload_img/upload.php?id=" + id + "&type=" + type;
            console.log(url_upload);
            $.ajax({
                url: url_upload, // point to server-side PHP script 
                dataType: 'json', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: 'post',
                success: function(php_script_response) {
                    console.log(php_script_response);

                    ons.notification.alert({
                            message: 'ทำการอัพโหลดรูปสำเร็จแล้ว',
                            title: "สำเร็จ",
                            buttonLabel: "ปิด"
                        })
                        .then(function() {});
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
        reader.readAsDataURL(input.files[0]);

    }

}

function focusEle(ele) {
    console.log(ele);
    $(ele).focus();
}

function clearCookieAll() {
    var cookies = $.cookie();
    for (var cookie in cookies) {
        console.log(cookie);
        if(cookie != "app_remember_user" && cookie!= "app_remember_pass"){
			$.removeCookie(cookie, {
	            path: '/'
	        });
		}
        //	   $.removeCookie(cookie);
        
    }
}

function expenditure() {
    fn.pushPage({
        'id': 'expenditure.html',
        'title': 'รายจ่าย'
    }, 'slide-ios');
}

function apiRecordActivityAndNotification(param_aan, param_aan2){

				var param_all = {
					activity : param_aan,
					notification : param_aan2
				};
				console.log(param_all);
                $.ajax({
						url: "main/recordActivityAndNoti", // point to server-side PHP script 
						dataType: 'json', // what to expect back from the PHP script, if anything
						type: 'post',
						data: param_all,
						success: function(res) {
							console.log(res);
							setTimeout(function(){ setCountNotification(); }, 1500);
//							return res;
						}
				});
                
}