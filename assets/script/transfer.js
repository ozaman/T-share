var dataHistoryA;
var manageObj = [];
var driver = detect_user;
//	$('#btn_manage').click();
//	callApiManage();
function callApiManage() {

  var date = $('#date_report').val();

//    	console.log(date+" "+driver);


  var url_action = "api/transfer_booking";
  var data_param = {driver: driver, date: date, driver_checkcar: 0};
  console.log(data_param);
//		return;
  $.post(url_action, data_param, function (data, textStatus, jQxhr) {

//			var data = JSON.parse(data);
    console.log(data)

    var m = [];
    if (data.status == "200") {
      manageObj = data.data.result;
      console.log("manage : " + manageObj.length)
//		   			if(manageObj.length>0){
      $('#number_manage').text(manageObj.length);

//					}
      eachObjManage();
    }
  }, 'json')
          .fail(function (jqXhr, textStatus, errorThrown) {
            console.log(errorThrown);
          });
}

function eachObjManage() {
//   	$('#load_manage_data .box_his').remove();
  $('#load_manage_data div').remove();
  console.log(manageObj.length + "++++++++++");
  if (manageObj.length <= 0) {
    $('#load_manage_data').append('<div class="font-26" style="color: #ff0000;" id="no_work_div"><strong><?=t_no_job;?></strong></div>');
    return;
  }
  console.log(manageObj.length)
  $.each(manageObj, function (index, value) {
    console.log(value);
    var program = value.program.topic_en;
    var pickup_place = value.pickup_place.topic;
    var to_place = value.to_place.topic;
    var outdate = value.outdate;

    var type = value.program.area;
    var time = value.airout_time;
    var id = "btn_" + index;
    var s_pay = value.s_status_pay;
    var cost = value.cost - value.s_cost;
    var s_cost = value.s_cost;
    if (s_pay == 0) {
      var type_pay = '<?=t_get_cash;?>';
    } else {
      var type_pay = '<?=t_transfer_to_account;?>';
    }
    var component2 =
            '<div class="box_his">'
            + '<span class="font-20 time-post">' + "รับเมื่อ " + formatDate(value.post_date) + ' ' + formatTime(value.post_date) + " น." + '</span>'
            + '<a class="mof ripple" id="btn_' + index + '" onclick="openSheetHandle(' + index + ',1);" style="padding: 0px; background: #fbfbfb;">'
            + '<div>'
            + '<table width="100%" >'
            + '<tbody>'
            + '<tr>'

            + '<td>'
            + '<table width="100%" class="tb-txt-left" >'
            + '<tr style="line-height: 1.5;" >'
            + '<td width="100%"><span class="font-24" colspan="2">' + pickup_place + '</span></td>'
            + '</tr>'
            + '<tr style="line-height: 1.5;">'
            + '<td width="100%"><span class="font-24" colspan="2">' + to_place + '</span></td>'
            + '</tr>'
            + '<tr>'
            + '<td><strong><span class="font-22 ">' + type_pay + '</span>&nbsp;&nbsp;<span class="font-22" style="position: fixed;right: 25px;">' + addCommas(cost) + ' <?=t_THB;?>' + '</span></strong></td>'

            + '</tr>'
            + '<tr>'
            + '<td><span class="font-20 ">' + outdate + '&nbsp;&nbsp;' + time + '</span></td>'
            + '<td></td>'
            + '</tr>'
            + '</table>'
            + '</td>'
            + '</tr>'
            + '</tbody>'
            + '</table>'
            + '</div>'
            + '</a>'
            + '</a>'
            + '</div>';
    $('#load_manage_data').append(component2);
  });
}

function openSheetHandle(index, type) {
  $('#header_clean').text('จัดการงาน')
  var post = manageObj[index];




  var url = "empty_style.php?name=tbooking&file=sheet_handle";


  $.post(url, post, function (data) {
    $('#load_mod_popup_clean').html(data);
    $('#main_load_mod_popup_clean').show();
    $('#main_component').removeClass('w3-animate-left');
  });

}

/* function backMain(){
 console.log('back');
 $('#main_load_mod_popup .back-full-popup').fadeIn(500);
 $('#show_main_tool_bottom').fadeIn(500);
 $('#sub_component').hide();
 $('#main_component').addClass('w3-animate-left');
 $('#main_component').show();
 }*/

function mapsSelector(lat, lng) {
  if /* if we're on iOS, open in Apple Maps */
          ((navigator.platform.indexOf("iPhone") != -1) ||
                  (navigator.platform.indexOf("iPad") != -1) ||
                  (navigator.platform.indexOf("iPod") != -1))
    window.open("maps://maps.google.com/maps?daddr=" + lat + "," + lng + "&amp;ll=");
  else /* else use Google */
    window.open("https://maps.google.com/maps?daddr=" + lat + "," + lng + "&amp;ll=");
}

function hideDetail() {
  $('#main_load_mod_popup_clean').hide();
  $('#show_main_tool_bottom').fadeIn(500);
//		$('#main_component').addClass('w3-animate-left');
}

function ViewPhoto(id, type, date) {
  var url = 'load_page_photo.php?name=tbooking/load&file=iframe_photo&id=' + id + '&type=' + type + '&date=' + date;
  console.log(url);
  $("#load_mod_popup_photo").toggle();

  $('#load_mod_popup_photo').html(load_main_mod);


  $('#load_mod_popup_photo').load(url);

// 	 $('#text_mod_topic_action_photo-txt').text('crfdfdsdsf'); 

}

function openPointMapsTransfer(type, lat, lng) {
  var data = {
    type: type,
    lat: lat,
    lng: lng
  }
  console.log(data);
  $("#main_load_mod_popup_map").show();
  $('#load_mod_popup_map').html(load_main_mod);
  var url_load = "load_page_map.php?name=map_api&file=map_point_transfer&type=" + type + "&lat=" + lat + "&lng=" + lng;
  console.log(url_load);
  $('#load_mod_popup_map').load(url_load);
}

function readDataBooking() {
  console.log("Read Booking+++++++++++++++");
  console.log(res_socket);
  var num = 0;
  //	 	$('#load_booking_data .box_book').remove();
  $('#load_booking_data div').remove();
  $('#number_book').text(res_socket.length);
  if (res_socket.length <= 0) {
    $('#load_booking_data').append('<div class="font-22" style="color: #ff0000;" id="no_work_div"><strong>ไม่มีงาน</strong></div>');
    return;
  }
  $.each(res_socket, function (index, res) {

    var d_db = timestampToDate(res.post_date, "date");
    var d_cr = js_yyyy_mm_dd_hh_mm_ss();

    if (d_cr > d_db) {
      var time_post = CheckTime(d_db, d_cr);
    } else {
      var time_post = CheckTime(d_cr, d_db);
    }

    var program = res.program.topic_en;
    var pickup_place = res.pickup_place.topic;
    var to_place = res.to_place.topic;
    var outdate = res.outdate;
    var type = res.program.area;
    var time = res.airout_time;
    var id = 'id_list_' + num;
    var s_pay = res.s_status_pay;
    var cost = res.cost;
    var s_cost = res.s_cost;
    var pax = res.pax;
    var remark = res.remark;
    var car_type;
    if ($.cookie("lng") == 'en') {
      var car_type = res.car_type.topic_en;
    } else if ($.cookie("lng") == 'cn') {
      var car_type = res.car_type.topic_cn;
    } else if ($.cookie("lng") == 'th') {
      var car_type = res.car_type.topic_th;
    } else {

      var car_type = res.car_type.topic_th;
    }
    if (s_pay == 0) {
      var type_pay = 'รับเงินสด';
    } else {
      var type_pay = 'โอนเงินเข้าบัญชี';
    }
    var component2 =
            '<div class="box_book">'
            + '<span class="font-14 time-post">' + time_post + '</span>'
            + '<button class="mof " id="id_list_' + num + '" onclick="openDetailBooking(' + num + ',' + s_pay + ',' + s_cost + ',' + cost + ');" style="padding: 0px;">'
            + '<div class="bar-item">'
            + '<table width="100%">'
            + '<tbody>'
            + '<tr>'
            + '<td>'
            + '<table width="100%" class="tb-txt-left" >'
            + '<tr style="line-height: 1.5;" >'
            + '<td width="100%"><span class="font-16" colspan="2">' + pickup_place + '</span></td>'
            + '</tr>'
            + '<tr style="line-height: 1.5;">'
            + '<td width="100%"><span class="font-16" colspan="2">' + to_place + '</span></td>'
            + '</tr>'
            + '<tr>'
            + '<td><strong><span class="font-14 ">' + type_pay + '</span>&nbsp;&nbsp;<span class="font-14" style="position: absolute;right: 15px;margin-top: 7px;">' + addCommas(cost) + '(-' + s_cost + ')' + '<?=t_THB;?></span></strong></td>'
            + '</tr>'
            + '<tr>'
            + '<td><span class="font-14 ">' + outdate + '&nbsp;&nbsp;' + time + '</span></td>'
            + '</tr>'
            + '<tr>'
            + '<td><span class="font-14">' + car_type + '</span><button class="btn-approve-job" ><span class="font-14">รับงาน</span></button></td>'
            + '</tr>'
            + '<tr>'
            + '<td><span class="font-14 ">จำนวนแขก&nbsp;&nbsp;' + pax + ' คน</span></td>'
            + '</tr>'
            + '<tr>'
            + '<td><span class="font-14 " style="color:red">Remark&nbsp;&nbsp;' + remark + '</span></td>'
            + '</tr>'
            + '</table>'
            + '</td>'
            + '</tr>'
            + '</tbody>'
            + '</table>'
            + '</div>'
            + '</button>'
            + '</div>';

    $('#load_booking_data').append(component2);
    num++;
  });
}

function gotoWallet() {
  wallet();
  document.getElementById('transfer-alert-dialog').hide();
}

function openDetailBooking(index, s_pay, s_cost, cost) {
  var dv_cost = $('#balance').val();
  console.log(dv_cost + " : " + s_cost + " type = " + s_pay);
  /*     fn.pushPage({'id': 'popup1.html', 'title': 'รับงาน'}, 'lift-ios');
   return;*/
  if (s_pay == 0) {
    if (class_user == "lab") {
      $('#header_clean').text('งานรถรับ-ส่ง')
      var url = "page/booking_detail";
      var post = res_socket[index];
      $.post(url, post, function (data) {
        $('#load_mod_popup_clean').html(data);
        $('#main_load_mod_popup_clean').show();

      });
      return;
    }
    if (dv_cost < s_cost) {
      alertDeposit();
      return;
    } else {
      fn.pushPage({'id': 'popup1.html', 'title': 'รับงาน'}, 'lift-ios');
//			return;
      var url = "page/booking_detail";
      var post = res_socket[index];
      $.post(url, post, function (data) {
        $('#body_popup1').html(data);
      });
    }
  } else {
    $('#header_clean').text('งานรถรับ-ส่ง')
    var url = "page/booking_detail";
    var post = res_socket[index];
    $.post(url, post, function (data) {
      $('#load_mod_popup_clean').html(data);
      $('#main_load_mod_popup_clean').show();
    });
  }

}