var id_category, id_province, check_back;
function reloadApp() {
  var newURL = window.location.protocol + "//" + window.location.host + "" + window.location.pathname + window.location.search;
  //	console.log(newURL);
  //	location.replace(reloadApp)
  var pathname = new URL(newURL).pathname;
  //return;
  window.location = pathname;
}

function setCountNotification() {
  $.ajax({
    url: "notification/count_notification?id_user=" + detect_user, // point to server-side PHP script 
    dataType: 'json', // what to expect back from the PHP script, if anything
    type: 'post',
    success: function (num) {
      //			        	console.log(num);
      //			        	num = 0;
      if (num > 0) {
        $('.fa-bell').addClass('bell');
        $('#tab_notification').attr('badge', num);
      } else {
        $('.fa-bell').removeClass('bell');
        $('#tab_notification').attr('badge', '');
      }

    }
  });

}

function loadNotificationPage() {
  //	$('#body_load_notification').html(progress_circle);
  var url = "page/notification";
  $.post(url, function (html) {
    $('#body_load_notification').html(html);
  });
}

function loadActivityPage() {
  //	$('#body_load_activity').html(progress_circle);
  var url = "page/activity";
  $.post(url, function (html) {
    $('#body_load_activity').html(html);

  });
}

function loadInformationPage() {
  //	$('#body_load_activity').html(progress_circle);
  var url = "page/information";
  $.post(url, function (html) {
    $('#body_load_information').html(html);

  });
}

var delay = (function () {
  var timer = 0;
  return function (callback, ms) {
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
  if (hrs_d < 10)
    hrs_d = "0" + hrs_d;
  if (mnts < 10)
    mnts = "0" + mnts;
  if (secs < 10)
    secs = "0" + secs;
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

function CheckTimeV2(d1, d2) {
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
  if (hrs_d < 10)
    hrs_d = "0" + hrs_d;
  if (mnts < 10)
    mnts = "0" + mnts;
  if (secs < 10)
    secs = "0" + secs;
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
  if (hrs_d_bc < 1) {
    return final_txt + "ที่ผ่านมา";
  } else {
    var str = timestampToDate(startDate.getTime(), "time");
    var res = d1.split(" ");
    var res = res[1].split(":");
    return "ทำรายการเมื่อ " + res[0] + ":" + res[1] + " น.";
    //		return  d1;
  }


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
    error: function () {
      console.log('Error Profile');
    },
    success: function () {
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
setTimeout(function () {
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
            .then(function (dialog) {
              dialog.show();
            });
  }
}

function logOut() {
  modal.show();
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

  setTimeout(function () {
    window.location = base_url + "login";
  }, 2000);
}

function openNotifyline() {
  location.href = "https://www.welovetaxi.com/app/T-share_new/index.php?regis=linenoti&scope=notify&state=one"
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
  $.post(url, function (data) {
    //   console.log(data);
    if (data.status == "OVER_QUERY_LIMIT") {
      console.log('OVER_QUERY_LIMIT');
    } else {
      //            console.log(data.results);
      /*console.log(data.results.length-2);
       console.log(data.results[data.results.length-2].address_components[0].long_name);*/
      var province = data.results[data.results.length - 2].address_components[0].long_name;
//      $('#province_text_input').text(province);

      $('#now_province').val(province);
      if (run_num_place == true) {
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
  }, function (obj) {
    //        var obj = JSON.parse(data);
    console.log(obj);
    if (obj.length <= 0) {
      return;
    }
    console.log('----------------------------------888-------------')
    var province = obj[0].id;
    var area = obj[0].area;
    var provincename = obj[0].name_th;
    console.log(provincename)
    $('#place_province').val(province);
    $('#place_area').val(area);
    $('#province_text_input').val(provincename);
    id_province = province;
    //        var url2 = "mod/shop/update_num_place.php?op=update_all&province=" + province + '&area=' + area;
    var url2 = "main/update_num_place" + "?province=" + province + '&area=' + area;
    $.post(url2, function (data2) {
      //         console.log(data2);
    });
  });
}

function formatDate(date) {
  var d = new Date(date),
          month = '' + (d.getMonth() + 1),
          day = '' + d.getDate(),
          year = d.getFullYear();
  if (month.length < 2)
    month = '0' + month;
  if (day.length < 2)
    day = '0' + day;
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
  //	modal.show();
  //	alert(status)
  //    alert("id = " + id+" status = "+status+" open_ic = "+open_ic);
  var check_open_shop_id = $('#check_open_shop_id').val();
  if (check_open_shop_id == id) {
    return;
  }
  if (status == "his") {

    openOrderFromAndroidHistory(id, status, open_ic)
  } else {
    $.each(array_data.manage, function (index, value) {
      //            	alert(id);
      if (value.id == id) {

        console.log(value.id + " : " + index);
        $('#check_open_num_detail').val(index)
        /*var url = "empty_style.php?name=booking/shop_history&file=work_shop_detail_js&user_id=" + detect_user;
         $.post(url, value, function(data) {
         $('#load_mod_popup_clean').html(data);
         $('#main_load_mod_popup_clean').show();
         if (open_ic == '1') {
         openViewPrice();
         console.log('Open Income')
         }
         });*/
        openDetailShop(index, 'android');
        $('#check_open_shop_id').val(value.id);
        //                    modal.hide();
      }
    });

  }
}

function openOrderFromAndroidHistory(id, status, open_ic) {
  //        alert(id);
  $.ajax({
    url: "shop/findInvoice?id=" + id,
    dataType: 'json',
    type: 'post',
    success: function (res) {
      console.log(res);
      openDetailBookinghistory('', '', res.invoice);
      modal.hide();
    }
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
  $.post("api/get_my_transfer_job", pram, function (res) {
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
  console.log('Click ' + id);
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
function selesecompany() {
  if (check_back == true) {
    check_back = false;
  } else {
    callpop();
  }
  $('#shop_add').hide();
  $('#shop_filter').show();
  return;
  modal.show();
  // fn.pushPage({
  //   'id': 'place_company.html',
  //   'title': 'ส่งแขก'
  // }, 'slide-ios')

  var url = "shop/place_company";
  $.post(url, function (res) {
    // console.log(res)
    $('#shop_add').html(res);
    modal.hide();
  });
}

function checkPricePlan(id) {
  $.ajax({
    url: "shop/get_data_product?id=" + id,
    dataType: 'json',
    type: 'post',
    success: function (value) {
      console.log(value);
      if (value.price_plan == "") {
        ons.notification.alert({message: 'สถานที่นี้ยังไม่มีค่าตอบแทน โปรดเลือกสถานที่อื่น', title: "ขออภัย", buttonLabel: "ปิด"});
        modal.hide();
        return false;
      } else {
        sendShops(id);
        $('#shop_add').show();
        $('#shop_filter').hide();
        $('#default_toolbar').hide();
        $('#default_toolbar2').show();
        check_back = true;
      }
    }
  });
}

function sendShops(company) {
  modal.show();
  // fn.pushPage({
  //   'id': 'shopping.html',
  //   'title': 'ส่งแขก',
  //   'key': 'shop'
  // })
  //                       var url = "page/call_page";
  //   $.post(url,{ path : "car/car_view" },function(ele){
  //    $('#body_shop').html(ele);
  // });
  // chkpage = true;
  // $('.toolbar__left').attr('onclick','sendShop2()');
  var url2 = "shop/shop_pageadd?shop_id=" + company;
  var urlcount = "shop/car_count";


  $.post(url2, function (ele2) {
    if (class_user == "taxi") {

      $.post(urlcount, function (res) {

        if (res == 0) {

          ons.notification.alert({
            message: 'ไม่มีรถใช้งานกรุณาเพิ่มรถ เพื่อส่งแขก',
            title: "ไม่สามารถส่งแขกได้",
            buttonLabel: "เพิ่มรถ"
          })
                  .then(function () {
                    // callpop();
                    callpop();
                    setTimeout(function () {
                      myCar();
                    }, 700);

                    return;
                  });

        }
      });

    } else {
      // shopManage();
    }
    setTimeout(function () {


      $('#shop_add').html(ele2);
      modal.hide();
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
        success: function (res) {
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

function beforeSendShop() {
  var urlcount = "shop/car_count";
  if (class_user == "taxi") {
    $.post(urlcount, function (res) {
      console.log(res)
      if (res == 0) {
        ons.notification.alert({
          message: 'ไม่มีรถใช้งานกรุณาเพิ่มรถ เพื่อส่งแขก',
          title: "ไม่สามารถส่งแขกได้",
          buttonLabel: "เพิ่มรถ"
        })
                .then(function () {

                  addCarForSendShop();

                });
        return;
      } else {
        sendShop2();
//                setTimeout(function() {
//                    shopManage();
//                }, 2000);

      }
    });

  } else {
    sendShop2();
    setTimeout(function () {

      shopManage();

    }, 2000);
  }
}

function sendShop2() {
  //	addUser();
  modal.show();

  var urlo = 'shop/place_companycount';
  $.post(urlo, function (res) {
    console.log(res)
    if (res.count == 1) {
      // modal.hide();
      // fn.pushPage({
      //   'id': 'place_company.html',
      //   'title': 'ส่งแขก'
      // }, 'slide-ios')
      // fn.pushPage({
      //   'id': 'shopping.html',
      //   'title': 'ส่งแขก',
      //   'key': 'shop'
      // })


      var url = "shop/place_company?pv_text=" + $('#province_text_input').val();
      // alert(url)
      $.post(url, function (res) {
        setTimeout(function () {
          // console.log(res)
          $('#shop_add').html(res);
          get_shop_all_company('ALL')
        }, 1000);
      });


      // fn.pushPage({
      //   'id': 'shopping.html',
      //   'title': 'ส่งแขก',
      //   'key': 'shop'
      // })
      // //                       var url = "page/call_page";
      // //   $.post(url,{ path : "car/car_view" },function(ele){
      // //    $('#body_shop').html(ele);
      // // });
      // var url2 = "shop/shop_pageadd?shop_id=" + res.shop_id;
      // var urlcount = "shop/car_count";


      // $.post(url2, function (ele2) {


      //   setTimeout(function () {
      //     modal.hide();
      //     $('#shop_add').html(ele2);
      //     if (class_user == "taxi") {
      //       $.ajax({
      //         url: "main/check_num_car_station",
      //         data: pass,
      //         type: 'post',
      //         success: function (res) {
      //           console.log("car station number : " + res)
      //           if (res == 0) {
      //             stationCar();
      //           } else {

      //           }

      //         }
      //       });
      //     }




      //     var pass = {
      //       date: moment().format('YYYY-MM-DD'),
      //       driver: $.cookie("detect_user"),
      //       type: 'his'
      //     };
      //     console.log(pass);
      //     var urlcounthis = "shop/count_his"
      //     $.ajax({
      //       url: urlcounthis,
      //       data: pass,
      //       type: 'post',
      //       success: function (res) {
      //         // console.log(res);
      //         if (res != 0) {
      //           $('#num_his').show();
      //           $('#num_his').html(res);
      //         }
      //         // $('ons-tab[page="shop_history.html"]').attr('badge', res);
      //       }
      //     });
      //   }, 1000);


      // });




    } else {
      // modal.hide();
      // fn.pushPage({
      //   'id': 'place_company.html',
      //   'title': 'ส่งแขก'
      // }, 'slide-ios')
      fn.pushPage({
        'id': 'shopping.html',
        'title': 'ส่งแขก',
        'key': 'shop'
      })
      var url = "shop/place_company?pv_text=" + $('#province_text_input').val();
      $.post(url, function (res) {
        // console.log(res)
        setTimeout(function () {

          $('#shop_filter').html(res);
          $('#shop_filter').show();
          $('#shop_add').hide();
          get_shop_all_company('ALL')
        }, 1000);

      });
    }
    // $('#body_place_company').html(res);
  });



  countWaitTransShop();




}

function countWaitTransShop() {
  setTimeout(function () {
    var url = "shop/count_wait_trans_shop_" + class_user + "?driver_id=" + detect_user;
    console.log(url);
    $.ajax({
      url: url,
      dataType: 'json',
      type: 'post',
      success: function (res) {
        console.log(res);
        if (res > 0) {
          $('#tab_shop_wait').attr('badge', res);
        } else {
          $('#tab_shop_wait').removeAttr("badge");
        }

      }
    });
  }, 1500);
}

function callpop() {
  console.log(appNavigator)
  appNavigator.popPage()
}

function profileInfo(animate) {
  fn.pushPage({
    'id': 'pf.html',
    'title': 'ข้อมูลส่วนตัว',
    'key': 'profile'
  }, animate);
  var url = "page/profile_edit";
  $.post(url, function (html) {
    $('#body_profile_view').html(html);

    setTimeout(function () {
      checkPicDocProfile($.cookie("detect_user"));
    }, 700);
    checkImgProfile($.cookie("detect_username"), 1);
  });
}

function sendTransfer() {

  console.log(detect_user)
  if (detect_user == 153 || detect_user == 164 || detect_user == 129 || detect_user == 492 || 472) {

    fn.pushPage({
      'id': 'transfer.html',
      'title': 'ให้บริการรถ',
      'key': 'transfer'
    })
    var url = "page/transfer";
    $('#check_open_worktbooking').val(1);
    $.post(url, function (html) {
      $('#transfer_job').html(html);
    });

  } else {
    ons.notification.alert({
      message: 'ยังไม่เปิดให้บริการ จะเปิดบริการในวันที่ 1 ธันวาคมนี้',
      title: "ขอภัย",
      buttonLabel: "ตกลง"
    })
            .then(function () {});
    return false;
  }


}


function tour() {
  ons.notification.alert({
    message: 'ยังไม่เปิดให้บริการ',
    title: "ขอภัย",
    buttonLabel: "ตกลง"
  })
          .then(function () {});
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
    buttonLabel: "ตกลง"
  })
          .then(function () {});
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
  }, function (ele) {
    $('#body_account_bank').html(ele);
    setTimeout(function () {
      setnumbank();
      if ($('#detect_num_bank').val() == 0) {
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
  }, function (res) {
    console.log(res);
    var url = "page/call_page";
    $.post(url, {
      path: "car/car_view"
    }, function (ele) {
      $('#body_car_manage').html(ele);

    });
  });

  //    _body_car_station('body_car_station')
}

function addCarForSendShop() {
  fn.pushPage({
    'id': 'popup1.html',
    'title': 'เพิ่มข้อมูลรถ'
  }, 'slide-ios');

  $.post("page/call_page", {
    path: "car/add_car_shop"
  }, function (ele) {
    $('#body_popup1').html(ele);
  });
}

function wallet() {
  fn.pushPage({
    'id': 'wallet.html',
    'title': 'กระเป๋าเงิน'
  }, 'slide-ios');
  $('#check_open_wallet').val(1);
  auto_money();
}

function contrac_us() {
  fn.pushPage({
    'id': 'chatroom.html',
    'title': ''
  }, 'lift-ios');
  // $('#body_popup1').html(progress_circle);
  loadcontactChat();
  $('#side_pf').hide();
  $('#side_more').hide();
  roomOpen = true;
  // fn.pushPage({
  //   'id': 'contract_us.html',
  //   'title': 'ติดต่อเรา'
  // }, 'lift-ios');
  // var url = "page/contrac_us";
  // $.post(url, function (html) {
  //   console.log(html)
  //   $('#body_contract').html(html);
  // });
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
  }, function (ele) {
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

function CurrencyFormatted(amount) {
	var i = parseFloat(amount);
	if(isNaN(i)) { i = 0.00; }
	var minus = '';
	if(i < 0) { minus = '-'; }
	i = Math.abs(i);
	i = parseInt((i + .005) * 100);
	i = i / 100;
	s = new String(i);
	if(s.indexOf('.') < 0) { s += '.00'; }
	if(s.indexOf('.') == (s.length - 2)) { s += '0'; }
	s = minus + s;
	return s;
}

function viewPhotoGlobal(path, time, caption) {

  fn.pushPage({
    'id': 'popup2.html',
    'title': 'ภาพ'
  }, 'fade-md');
  var url_load = "page/view_photo?time=" + time + "&path=" + path + "&caption=" + caption;
  $.post(url_load, function (ele) {
    $('#body_popup2').html(ele);
  });

}

function modalShowImg(path, cap) {
  modal_photo.show({
    animation: "fade"
  });
  console.log(path);
  $('#photo_to_show_inmodal').attr('src', path);
  $('#text_name_approved').text(cap);
  /* var url_load = "page/view_photo?time=" + time + "&path=" + path + "&caption=" + caption;
   $.post(url_load, function(ele) {
   $('#body_load_photo').html(ele);
   });*/
}

function readURLprofileHome(input, type) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {

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
        success: function (php_script_response) {
          console.log(php_script_response);

          ons.notification.alert({
            message: 'ทำการอัพโหลดรูปสำเร็จแล้ว',
            title: "สำเร็จ",
            buttonLabel: "ตกลง"
          })
                  .then(function () {});
        },
        error: function (e) {
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
    if (cookie != "app_remember_user" && cookie != "app_remember_pass") {
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

function apiRecordActivityAndNotification(param_aan, param_aan2) {

  var param_all = {
    activity: param_aan,
    notification: param_aan2
  };
  console.log(param_all);
  $.ajax({
    url: "main/recordActivityAndNoti", // point to server-side PHP script 
    dataType: 'json', // what to expect back from the PHP script, if anything
    type: 'post',
    data: param_all,
    success: function (res) {
      console.log(res);
      setTimeout(function () {
        setCountNotification();
      }, 1500);
      //							return res;
    }
  });

}

function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function sendTagOs(txt, username) {
  if (typeof Android !== 'undefined') {
    Android.sendTag(txt, username);
  }
}

function deleteTagOs(txt) {
  if (typeof Android !== 'undefined') {
    Android.deleteTag(txt);
  }
}

function _region(itm) {
  console.log('-----')
  console.log(itm)
  var htmlOption = '';
  var url = "main/select_type?id_sub=" + itm + '&table=province';
  console.log(url)
  $.post(url, function (res) {
    console.log(res)
    htmlOption = "<option value=''>กรุณาเลือก</option>";
    $.each(res, function (i, item) {
      htmlOption += "<option value='" + item.id + "'>" + item.name_th + "</option>";
    });
    $("#province").html(htmlOption);
    // $("#select_type").val();
    // $('select_type', select).remove();
    // select.val(selectedOption);
    // $('#select_type').html(ele);
  });
}
var pro = 0;
var arm = 0;

function checkzoon(argument) {
  $('#box_station_others').hide()
  $('#box_form_toshow').hide()
  // if (arm > 0) {
  $('.radio-button').prop("checked", false);

  // }
  // arm++;

}


function _province(itm) {
  if (pro > 0) {
    $('#box_form_toshow').hide()
    $('.radio-button').prop("checked", false);

  }


  console.log(itm)
  var url = "main/select_type?id_sub=" + itm + '&table=amphur';
  var htmlOption = '';
  $.post(url, function (res) {
    console.log(res)
    htmlOption = "<option value=''>กรุณาเลือก</option>";
    var select;
    $.each(res, function (i, item) {
      if ($('#have_arm').val() == item.id) {
        select = 'selected';
      } else {
        select = '';
      }
      htmlOption += "<option value='" + item.id + "' " + select + ">" + item.name_th + "</option>";
    });
    if (pro > 0) {
      $("#amphur").html(htmlOption);
      // $("#select_type").val();
      // $('select_type', select).remove();
      // select.val(selectedOption);
      // $('#select_type').html(ele);
    }
  });
  pro++;
}

function _body_car_station(body) {
  var area = $('#place_area').val();
  var pv = $('#place_province').val();
  $.post("car/car_station?area=" + area + "&pv=" + pv, {
    id_user: $.cookie("detect_user")
  }, function (res) {
    //console.log(res);
    $('#' + body).html(res);
    if ($('#province').val() != "") {
      //_province(pv);
    }
  });
}

function _form_car_station(body) {
  var area = $('#place_area').val();
  var pv = $('#place_province').val();
  $.post("car/car_form_station?area=" + area + "&pv=" + pv, {
    id_user: $.cookie("detect_user")
  }, function (res) {
    //console.log(res);
    $('#' + body).html(res);
    if ($('#province').val() != "") {
      //_province(pv);
    }
  });
}
var id_type_station, check_get_have = 0,
        type_name; //check_get_station :no = 0, have = 1 addnwe, 2 have, addnew 3 search,

function submitadd_station() {
  var form = document.getElementById("form_addstation");
  if (check_get_have != 0) {
    if (id_type_station != 4) {
      console.log(form.elements["station_other"].value)
      var station_other = form.elements["station_other"].value;
    }

  }
  //
  // return false;
  modal.show();
  var region = $('#region').val()
  var province = $('#province').val()
  var amphur = $('#amphur').val()
  var station = $('#station').val()

  console.log($('#region').val())
  console.log($('#province').val())
  console.log($('#amphur').val())
  console.log($('#station').val())

  //var pass = { 'region':region, 'province':province,'amphur':amphur,'station':station };
  if (region == '') {
    ons.notification.alert({
      message: 'ภูมิภาค',
      title: "กรุณาเลือก",
      buttonLabel: "ตกลง"
    })
    modal.hide();
    return false;
  }
  if (province == '') {
    ons.notification.alert({
      message: 'จังหวัด',
      title: "กรุณาเลือก",
      buttonLabel: "ตกลง"
    })
    modal.hide();
    return false;
  }
  if (amphur == '') {
    ons.notification.alert({
      message: 'อำเภอ',
      title: "กรุณาเลือก",
      buttonLabel: "ตกลง"
    })
    modal.hide();
    return false;
  }
  if (check_get_have == 1) {
    if (id_type_station != 4) {
      if (station_other == '') {
        ons.notification.alert({
          message: type_name,
          title: "กรุณาเลือก",
          buttonLabel: "ตกลง"
        })
        modal.hide();
        return false;
      }
    }
  }
  /*if (station == '') {
   ons.notification.alert({
   message: 'ชื่อคิว',
   title: "กรุณาป้อน",
   buttonLabel: "ตกลง"
   })
   return false;
   }*/
  $.ajax({
    url: "main/submitadd_station?id_user=" + $.cookie("detect_user"),
    data: $('#form_addstation').serialize(),
    type: 'post',
    dataType: 'json',
    success: function (res) {
      console.log(res);
      if (res.status == true) {


        // beforeSendShop()
        setTimeout(function () {

          // stationCaragain();
          var area = $('#place_area').val();
          var pv = $('#place_province').val();
          $.post("car/edit_form_station?area=" + area + "&pv=" + pv, {
            id_user: $.cookie("detect_user")
          }, function (res) {
            callpop();
            $('#body_popup1').html(res);
            modal.hide();
            if ($('#province').val() != "") {
              // _province(pv);
            }
          });

        }, 1000);


      } else {
        ons.notification.alert({
          message: res.msg,
          title: "กรุณาตรวจสอบ",
          buttonLabel: "ตกลง"
        })
        modal.hide();
        // if (res.msg == 'type') {
        //     ons.notification.alert({
        //       message: 'คิว/บริษัท/สมาคม',
        //       title: "กรุณาเลือก",
        //       buttonLabel: "ตกลง"
        //   })
        // }
        // else{
        //     ons.notification.alert({
        //       message: 'กรุณาเลือกที่มีอยู่ในระบบ',
        //       title: "มีชื่อนี้ในระบบ",
        //       buttonLabel: "ตกลง"
        //   })
        // }

      }
      // modal.hide();
    }
  });
}

function stationCaragain() {

  var area = $('#place_area').val();
  var pv = $('#place_province').val();
  $.post("car/edit_form_station?area=" + area + "&pv=" + pv, {
    id_user: $.cookie("detect_user")
  }, function (res) {

    $('#body_popup1').html(res);
    if ($('#province').val() != "") {
      // _province(pv);
    }
  });
}

function stationCar() {
  fn.pushPage({
    'id': 'popup1.html',
    'title': 'ข้อมูลสังกัดรถ'
  }, 'lift-ios');
  var area = $('#place_area').val();
  var pv = $('#place_province').val();
  $.post("car/edit_form_station?area=" + area + "&pv=" + pv, {
    id_user: $.cookie("detect_user")
  }, function (res) {

    $('#body_popup1').html(res);
    if ($('#province').val() != "") {
      // _province(pv);
    }
  });
}

/***************************** *** ******************************/
/************************* new station **************************/
/***************************** *** ******************************/
function func_shop_station_field(station_type, option) {
  console.log('aaaaa')
  $.post("car/shop_station_field?i_station_type=" + station_type + '&opt=' + option, function (res) {
    //console.log(res);
    $('#shop_station_field').html(res);

  });
}


/***************************** *** ******************************/
/********************* BTN ADD NEW STATION **********************/
/***************************** *** ******************************/
function add_new_station(id, opt) {
  // check_get_have = 2;
  $('#check_get_have').val(0);
  $('#box_station_others').hide()

  $('#shop_station_field').show()
  func_shop_station_field(id, opt)

}

function get_station() {
  $('#box_station_others').show();
  $('#shop_station_field').hide()



}
var ckstation = 1;

function selectTypeCarPlace_edit(type) {
  var region = $('#region').val();
  var province = $('#province').val();
  var amphur = $('#amphur').val();
  var member = $.cookie("detect_user");
  if (region == '') {
    ons.notification.alert({
      message: 'ภูมิภาค',
      title: "กรุณาเลือก",
      buttonLabel: "ตกลง"
    })
    modal.hide();
    $('#type_topic_' + id).prop("checked", false);
    return false;
  }
  if (province == '') {
    ons.notification.alert({
      message: 'จังหวัด',
      title: "กรุณาเลือก",
      buttonLabel: "ตกลง"
    })
    modal.hide();
    $('#type_topic_' + id).prop("checked", false);
    return false;
  }
  if (amphur == '') {
    ons.notification.alert({
      message: 'อำเภอ',
      title: "กรุณาเลือก",
      buttonLabel: "ตกลง"
    })
    modal.hide();
    $('#radio-' + id).prop("checked", false);
    $('#type_topic_' + id).prop("checked", false);

    return false;
  }
  if (type == 4) {
    $('#box_station_others').hide();
    $('#shop_station_field').hide();



  } else {
    $('#box_station_others').show();
    $('#shop_station_field').hide();


  }
  // $('.station_other').prop("checked", false);

  var region = $('#region').val();
  var province = $('#province').val();
  var amphur = $('#amphur').val();
  var member = $.cookie("detect_user");

  var data = {
    region: region,
    province: province,
    amphur: amphur,

  };
  var url = "car/box_station_other?type=" + type;
  $.ajax({
    url: url,
    data: data,
    type: 'post',
    success: function (res) {
      $('#box_station_others').html(res);
      // $('#station_other').val(0)
      modal.hide();
      if (ckstation == 1) {
        setTimeout(function () {
          $('#station_other').val($('#id_station').val());
          ckstation++;
        }, 1000);
      } else if (ckstation == 0) {
        $('#station_other').val($('#id_station').val());
      } else {
        $('#station_other').val(0);

      }


    },
    error: function (err) {
      console.log(err);
    }
  });
}

function selectTypeCarPlace(id) {
  $('.station_other').prop("checked", false);
  id_type_station = id;
  var region = $('#region').val();
  var province = $('#province').val();
  var amphur = $('#amphur').val();
  var member = $.cookie("detect_user");
  if (region == '') {
    ons.notification.alert({
      message: 'ภูมิภาค',
      title: "กรุณาเลือก",
      buttonLabel: "ตกลง"
    })
    modal.hide();
    $('#type_topic_' + id).prop("checked", false);
    return false;
  }
  if (province == '') {
    ons.notification.alert({
      message: 'จังหวัด',
      title: "กรุณาเลือก",
      buttonLabel: "ตกลง"
    })
    modal.hide();
    $('#type_topic_' + id).prop("checked", false);
    return false;
  }
  if (amphur == '') {
    ons.notification.alert({
      message: 'อำเภอ',
      title: "กรุณาเลือก",
      buttonLabel: "ตกลง"
    })
    modal.hide();
    $('#radio-' + id).prop("checked", false);
    $('#type_topic_' + id).prop("checked", false);

    return false;
  }

  console.log(region)
  console.log(province)
  console.log(amphur)
  console.log(member)
  type_name = $('#type_topic_' + id).val();
  $('#header_topic_type').text(type_name);
  $('.tb_form').hide();

  var data = {
    region: region,
    province: province,
    amphur: amphur,
    type: id

  };
  var url = "car/num_station_other";
  $.ajax({
    url: url, // point to server-side PHP script 
    // dataType: 'json', // what to expect back from the PHP script, if anything
    data: data,
    type: 'post',
    success: function (num) {
      console.log(num);
      if (num == 0) {
        if (id == 4) {
          check_get_have = 1;

        } else {
          check_get_have = 0;

        }
        $('#check_get_have').val(0);
        // $('#box_form_toshow').show();
        // $('#box_station_others').hide();
        // $('#get_stations').hide();



      } else {
        console.log('in case')
        if (id == 4) {
          check_get_have = 0;

        } else {
          check_get_have = 1;

        }
        $('#check_get_have').val(1);
        // $('#box_form_toshow').hide();
        // $('#box_station_others').show();

        var url = "car/box_station_other";
        $.ajax({
          url: url,

          data: data,
          type: 'post',
          success: function (res) {
            // console.log(res);
            $('#box_station_others').html(res);
            // $('#header_topic_other').html(type_name)

          },
          error: function (err) {
            console.log(err);
            //your code here
          }
        });
      }
      // $('#box_station_others').html(res);

    },
    error: function (err) {
      console.log(err);
      //your code here
    }
  });

}

function add_btb__station_new() {
  ckstation = 0;
  fn.pushPage({
    'id': 'popup2.html',
    'title': 'ข้อมูลสังกัดรถ'
  }, 'lift-ios');
  $('#check_get_have').val(2)
  // $('#body_car_station').hide()

  $('#form_addstation_div').show()
  $('#btb_submit_form_station').show()
  // $('#box_form_toshow').hide()
  $.post("car/form_addstation_div", {
    id_user: $.cookie("detect_user")
  }, function (res) {
    //console.log(res);
    $('#body_popup2').html(res);

  });


}

function view_station_his() {
  modal.show();
  fn.pushPage({
    'id': 'popup2.html',
    'title': 'ข้อมูลประวัติสังกัดรถ'
  }, 'lift-ios');
  console.log('aaaaa')
  $.post("car/station_his", function (res) {
    //console.log(res);
    $('#body_popup2').html(res);
    modal.hide();

  });
}

function move_station(station) {
  modal.show();
  $.ajax({
    url: "main/move_station?station=" + station,
    // data:  $('#form_addstation').serialize(),
    type: 'post',
    dataType: 'json',
    success: function (res) {
      console.log(res);
      if (res.status == true) {


        // beforeSendShop()
        setTimeout(function () {

          // stationCaragain();
          var area = $('#place_area').val();
          var pv = $('#place_province').val();
          $.post("car/edit_form_station?area=" + area + "&pv=" + pv, {
            id_user: $.cookie("detect_user")
          }, function (res) {
            callpop();
            $('#body_popup1').html(res);
            modal.hide();
            if ($('#province').val() != "") {
              // _province(pv);
            }
          });

        }, 1000);
      } else {
        ons.notification.alert({
          message: res.msg,
          title: "กรุณาตรวจสอบ",
          buttonLabel: "ตกลง"
        })



      }
    }
  });
}

function taxiList() {

  modal.show();
  fn.pushPage({
    'id': 'popup1.html',
    'title': 'รายชื่อสมาชิก'
  }, 'lift-ios');
  //	$('#body_popup1').html(progress_circle);

  $.post("page/call_page", {
    path: "page/taxi_list",
    online: array_rooms
  }, function (ele) {
    modal.hide();
    $('#body_popup1').html(ele);
    eachTaxiList();
    //        console.log(array_rooms);
  });
}

function fun_imageslider(id) {
//  $.ajax({
//    url: "shop/count_place_document_file?id=" + id,
//    type: "json",
//    success: function (ccc) {
//      console.log(ccc);
//      if (ccc <= 0) {
//        ons.notification.alert({message: 'ไม่มีข้อมูลของสถานที่', title: "ขออภัย", buttonLabel: "ปิด"});
//        return;
//      } else {
//        modal.show();
//        fn.pushPage({
//          'id': 'imageslider.html',
//          'title': 'โบรชัวร์'
//        }, 'lift-ios');
//        //  $('#body_popup1').html(progress_circle);
//
//        $.post("shop/imageslider?shop_id=" + id, function (ele) {
//          modal.hide();
//          $('#boby_imageslider').html(ele);
//
//
//          //        console.log(array_rooms);
//        });
//      }
//    }
//  });
  $.post("shop/count_place_document_file?id=" + id, function (num) {
    console.log(num);
    if (num <= 0) {
      ons.notification.alert({message: 'ไม่มีข้อมูลของสถานที่', title: "ขออภัย", buttonLabel: "ปิด"});
      return;
    } else {
      modal.show();
      fn.pushPage({
        'id': 'imageslider.html',
        'title': 'โบรชัวร์'
      }, 'lift-ios');
      //  $('#body_popup1').html(progress_circle);

      $.post("shop/imageslider?shop_id=" + id, function (ele) {
        modal.hide();
        $('#boby_imageslider').html(ele);


        //        console.log(array_rooms);
      });
    }
  });


}

var prev = function () {
  var carousel = document.getElementById('carousel');
  carousel.prev();
};

var next = function () {
  var carousel = document.getElementById('carousel');
  carousel.next();
};

ons.ready(function () {

  var carousel = document.addEventListener('postchange', function (event) {
    $('.arrow').removeClass('arrow_s');


    $('#arrow_' + event.activeIndex).addClass('arrow_s');

    // console.log('Changed to ' + event.activeIndex)
  });
});

function openMapPlaceCustom(lat, lng) {
  var url_map_place = "https://maps.google.com/?q=" + lat + "," + lng;
  window.open(url_map_place);
}

function detectUserInfomation() {
  $.ajax({
    url: "main/get_data_user?id=" + detect_user,
    dataType: 'json',
    type: 'post',
    success: function (data) {
      console.log(data);
      if (data.i_information == 0) {
        welcom_modal.show({animation: 'fade'});
      }
    }
  });
}

function updateUserInfomation() {
  $.ajax({
    url: "main/update_user_infomation?id=" + detect_user,
    dataType: 'json',
    type: 'post',
    success: function (data) {
      console.log(data);
    }
  });
}

function _region_s(itm) {
  console.log('-----')
  console.log(itm)
  var htmlOption = '';
  var url = "main/select_type?id_sub=" + itm + '&table=province';
  console.log(url)
  $.post(url, function (res) {
    console.log(res)
    htmlOption = "<option value=''>กรุณาเลือก</option>";
    $.each(res, function (i, item) {
      if ($("#province_s").val() == item.id) {
        select = 'selected';
      } else {
        select = '';
      }
      htmlOption += "<option value='" + item.id + "'  " + select + ">" + item.name_th + "</option>";
    });
    $("#province").html(htmlOption);
    setTimeout(function () {
      $("#province").val(itm);
    }, 10000);
    _province_s($("#province_s").val())
    // $('select_type', select).remove();
    // select.val(selectedOption);
    // $('#select_type').html(ele);
  });
}
function _province_s(itm) {
  if (pro > 0) {
    $('#box_form_toshow').hide()
    $('.radio-button').prop("checked", false);

  }


  console.log(itm)
  var url = "main/select_type?id_sub=" + itm + '&table=amphur';
  var htmlOption = '';
  $.post(url, function (res) {
    console.log(res)
    htmlOption = "<option value=''>กรุณาเลือก</option>";
    var select;
    $.each(res, function (i, item) {
      if ($("#amphur_s").val() == item.id) {
        select = 'selected';
      } else {
        select = '';
      }
      htmlOption += "<option value='" + item.id + "' " + select + ">" + item.name_th + "</option>";
    });
    if (pro > 0) {
      $("#amphur").html(htmlOption);
      // $("#select_type").val();
      // $('select_type', select).remove();
      // select.val(selectedOption);
      // $('#select_type').html(ele);

    }
    selectTypeCarPlace_edit($("#selectTypeCarPlace_edit").val())

  });
  pro++;
}