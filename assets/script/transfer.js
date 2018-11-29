var dataHistoryA;
var manageObj = [];
var driver = detect_user;
var orderid, idorder, invoice, code, program, p_place, to_place, agent, airout_time, airin_time, cost, s_cost, outdate, ondate, s_status_pay, idbookcar, a, b, c, d;
//	$('#btn_manage').click();
//	callApiManage();
function callApiManage() {

  var date = $('#date_report').val();
  var url_action = "api/transfer_booking";
  var data_param = {driver: driver, date: date, driver_checkcar: 0};
  $.post(url_action, data_param, function (data, textStatus, jQxhr) {
    console.log(data)
    var m = [];
    if (data.status == "200") {
      manageObj = data.data.result;
      eachObjManage();
    }
  }, 'json')
          .fail(function (jqXhr, textStatus, errorThrown) {
            console.log(errorThrown);
          });
}

function eachObjManage() {
  $('#load_manage_data ons-card').remove();
//  $('#load_manage_data').html(progress_circle);
//  $('#load_manage_data')
  if (manageObj.length <= 0) {
    $('#load_manage_data').append('<div class="font-26" style="color: #ff0000;" id="no_work_div"><strong><?=t_no_job;?></strong></div>');
    return;
  }
  console.log(manageObj.length)
  $.each(manageObj, function (index, value) {
    console.log(value);
//    var program = value.program.topic_en;
//    var pickup_place = value.pickup_place.topic;
    var program = value.program.topic_en;
//    var pickup_place = value.address_from;
//    var to_place = value.address_to;
    var outdate = value.outdate;

    var type = value.program.area;
    var time = value.airout_time;
    var id = "btn_" + index;
    var s_pay = value.s_status_pay;
    var cost = value.cost - value.s_cost;
    var s_cost = value.s_cost;

    if (s_pay == 0) {
      var type_pay = 'จ่ายเงินสด';
    } else {
      var type_pay = 'โอนเข้ากระเป๋า';
    }
    var component2 =
            '<ons-card class="box_his card" style="margin-top: 30px;margin-bottom: 30px;"><span class="font-15 time-post">รับเมื่อ ' + formatDate(value.post_date) + ' ' + formatTime(value.post_date) + ' น.</span>'
            + '<div class="" id="btn_' + index + '" onclick="openSheetHandleTransfer(' + index + ');" style="padding: 5px;margin-top: 5px;">'
            + '<table width="100%">'
            + '<tr>'
            + '<td>'
            + '<table width="100%">'
            + '<tbody>'
            + '<tr>'
            + '<td width="10">'
            + '<div style="width: 10px; height: 10px;border-radius: 1px; background: #555;"></div>'
            + '</td>'
            + '<td align="left" style="padding-left: 15px;"><span id="typeFrom" style="text-align: center;">' + value.address_from + '</span></td>'
            + '</tr>'
            + '<tr>'
            + '<td colspan="2" style="padding: 3px 0px;"></td>'
            + '</tr>'
            + '<tr>'
            + '<td width="10">'
            + '<div style="width: 10px;height: 10px;border-radius: 1px; background: #3b5998;"></div>'
            + '</td>'
            + '<td align="left" style="padding-left: 15px;"><span id="typeTo" style="text-align: center;">' + value.address_to + '</span></td>'
            + '</tr>'
            + '</tbody>'
            + '</table>'
            + '</td>'
            + '</tr>'
            + '</table>'
            + '<div style="margin: 0px;">'
            + '<ons-row>'
            + '<ons-col><span class="font-17">ช่องทางรับเงิน</span></ons-col>'
            + '<ons-col><span class="font-17">' + type_pay + '</span></ons-col>'
            + '</ons-row>'
            + '<ons-row>'
            + '<ons-col><span class="font-17">จำนวน</span></ons-col>'
            + '<ons-col><span class="font-17" style="color: #16B3B1;font-weight: 600;">' + addCommas(cost) + ' ฿</span></ons-col>'
            + '</ons-row>'
            + '<ons-row>'
            + '<ons-col>วันเวลา</ons-col>'
            + '<ons-col>' + outdate + '&nbsp;&nbsp;' + time + ' น.</ons-col>'
            + '</ons-row>'
//                      +'<ons-row>'
//                        +'<ons-col>ประเภทรถ</ons-col>'
//                        +'<ons-col>'++'</ons-col>'
//                      +'</ons-row>'
            + '</div>'
            + '</div>'
            + '</ons-card>';
    $('#load_manage_data').append(component2);
//    return false;
  });
}

function openSheetHandleTransfer(index) {
  $('#body_popup1').html(progress_circle);
  fn.pushPage({
    'id': 'popup1.html',
    'title': 'จัดการงาน'
  }, 'slide-ios');
  var post = manageObj[index];
  console.log(post);
  var url = "transfer/sheet_handle";
  $.post(url, post, function (data) {
    $('#body_popup1').html(data);
    actionProgress(post);
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
//  console.log("Read Booking+++++++++++++++");
//  console.log(res_socket);
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
    var pickup_place = res.address_from;
    
    var pickup_place = pickup_place.split(",");
    
    var to_place = res.address_to;

//    var str = "How are you doing today?";
    var to_place = to_place.split(",");

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
            + '<div class="">'
            + '<table width="100%">'
            + '<tbody>'
            + '<tr>'
            + '<td>'
            + '<table width="100%" class="tb-txt-left" >'
            + '<tr style="line-height: 1.5;" >'
            + '<td width="100%"><span class="font-16" colspan="2">' + pickup_place[0] + '</span></td>'
            + '</tr>'
            + '<tr style="line-height: 1.5;">'
            + '<td width="100%"><span class="font-16" colspan="2">' + to_place[0] + '</span></td>'
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
  var dv_cost = $('#balance_val_trans').val();
  console.log(dv_cost + " : " + s_cost + " type = " + s_pay);

  if (dv_cost < s_cost) {
    alertDeposit();
    return;
  } else {
    fn.pushPage({'id': 'transfer_detail.html', 'title': 'รับงาน'}, 'lift-ios');
//			return;
    var url = "page/booking_detail";
    var post = res_socket[index];
    console.log(post);
    $.post(url, post, function (data) {
      $('#body_transfer_detail').html(data);

    });
  }
}

function confirmGetJobTrans() {
  document.getElementById('confirm_get_job-dialog').hide();
  modal.show();
  var url_cja = "api/detect_driver_approve_transfer";
  /* check job approve */
  console.log(idorder);
//  return false;
  $.post(url_cja, {
    idorder: idorder
  }, function (res_check) {
    res_check = JSON.parse(res_check);
    console.log(res_check);

    if (res_check.data.result.length > 0) { // check this job have driver approve ?
      var data = {
        "idorder": idorder,
        "orderid": orderid,
        "invoice": invoice,
        "code": code,
        "program": program,
        "driver": driver,
        "carid": $('#car_id_trans_select').val(),
        "cartype": $('#car_type_trans_select').val(),
        "pickup_place": p_place,
        "to_place": to_place,
        "agent": agent,
        "airout_time": airout_time,
        "airin_time": airin_time,
        "cost": cost,
        "s_cost": s_cost,
        "outdate": outdate,
        "ondate": ondate
      };

      var url = "api/getjob_booking_transfer";
      var bank_account = "Goldenbeach Tour";
      var deposit_bank = "กสิกรไทย";
      var bank_number = "909-609-6699";
//      var deposit_date = deposit_date_st[0];
//      var deposit_time = deposit_time_st[0];
//      var username = username;
      var deposit = s_cost;
      var his_ap = {
        driver: driver,
        idorder: idorder,
        username: username,
        deposit: deposit,
        i_deposit_before: $('#balance_val_trans').val(),
//        deposit_date: deposit_time,
        type: "APPROVEJOB",
        deposit_bank: deposit_bank,
        bank_account: bank_account,
        bank_number: bank_number,
//        deposit_date: deposit_date,
//        deposit_time: deposit_time,
//        post_date: na,
//        post_date_f: deposit_date
      };
      console.log(data);


      $.ajax({
        url: url,
        data: data,
        dataType: 'json',
        type: 'post',
        success: function (res) {
          console.log(res);
//          return;
          if (res.status == "200") {


            if (s_status_pay == 0) { // Pay Cash
              modal.hide();
              $.ajax({
                url: "transfer/approve_job",
                dataType: 'json',
                data: his_ap,
                type: 'post',
                success: function (logdata) {
                  console.log(logdata);
                  if (logdata.deposit.result == true) {
                    $('#balance_txt_trans').text(logdata.deposit.balance);
                    $('#balance_val_trans').val(logdata.deposit.balance);

                    performClick('tab-trans_manage');
                    callpop();

                  }
                }
              });
              var txt_get_money = "รับเงินสด";
            } else {
              modal.hide();
              performClick('tab-trans_manage');
              callpop();
              var txt_get_money = "รับทางกระเป๋าเงิน";

            }
            var total_cost = parseInt(cost) - parseInt(s_cost);
            var txt_long_ac = invoice + " : " + "คุณทำการรับงานบริการรถ (" + txt_get_money + ")";
            var ac = {
              i_type: 2,
              i_sub_type: 1,
              i_event: idorder,
              i_user: detect_user,
              s_topic: "บริการรถ",
              s_message: txt_long_ac,
              s_posted: username
            };

//            var txt_long_nc = response.update.invoice + " : " + username + " เพิ่มรายการส่งแขก " + $('#place_name_select').val();
            var nc = {
//              i_type: 1,
//              i_event: response.last_id,
//              i_user: 0,
//              s_class_user: "lab",
//              s_topic: "งานส่งแขก",
//              s_sub_topic: "เช็คอิน",
//              s_message: txt_long_nc,
//              s_posted: username
            };
            apiRecordActivityAndNotification(ac, nc);
          } else {
            modal.hide();
            ons.notification.alert({
              message: 'กรุณาลองอีกครั้ง',
              title: "ไม่สามารถรับงานได้",
              buttonLabel: "ปิด"
            }).then(function () { });
          }
        }
      });

    } else {
      modal.hide();
      ons.notification.alert({
        message: 'งานนี้มีคนขับคนอื่นรับงานแล้ว',
        title: "ไม่สามารถรับงานได้",
        buttonLabel: "ปิด"
      }).then(function () { });
      hideDetail();
    }
  });
}

var dataHistoryA;
var txt_pay_cash = '';
var txt_pay_trans = '';

function selectjob(orderid_p, idorder_p, invoice_p, code_p, program_p, p_place_p, to_place_p, agent_p, airout_time_p, airin_time_p, cost_p, s_cost_p, outdate_p, ondate_p, s_status_pay_p, idbookcar_p, a_p, b_p, c_p, d_p) {
  orderid = orderid_p;
  idorder = idorder_p;
//  console.log(idorder+" xxx");
  invoice = invoice_p;
  code = code_p;
  program = program_p;
  p_place = p_place_p;
  to_place = to_place_p;
  agent = agent_p;
  airout_time = airout_time_p;
  airin_time = airin_time_p;
  cost = cost_p;
  s_cost = s_cost_p;
  outdate = outdate_p;
  ondate = ondate_p;
  s_status_pay = s_status_pay_p;
  idbookcar = idbookcar_p;
  a = a_p;
  b = b_p;
  c = c_p;
  d = d_p;
  var carid = $('#car_id_trans_select').val();
  var cartype = $('#car_type_trans_select').val();
  console.log("Type Pay : " + s_status_pay)
  console.log(idbookcar + '**************************************' + cartype)
//    if (parseInt(idbookcar) != parseInt(cartype)) {
//      swal('ไม่สามารถรับงานได้', 'งานนี้ใช้' + a + b + ' ' + 'คุณใช้' + c + d, 'error');
//      return;
//    }
  if (carid == '') {
    ons.notification.alert({
      message: 'กรุณาเลือกรถที่ใช้งาน',
      title: "ขออภัย",
      buttonLabel: "ปิด"
    })
            .then(function () {
//                  reloadIncomeShop(id);
            });
    return;
  }

  var driver = $('#driver').val();
  var finalcost = parseInt(cost) - parseInt(s_cost);
  console.log(finalcost)
  var txt_warning;
  txt_pay_cash = 'งานนี้เป็นงานที่ลูกค้าจ่ายเงินสด จำเป็นต้องหักเงินจากบัญชีในระบบ จำนวน ' + addCommas(s_cost) + ' บาท';
  txt_pay_trans = 'งานนี้เป็นงานโอน ' + "ยอดเงินทั้งหมดจะโอนเข้ากระเป๋าเงินของคุณหลังเสร็จงาน เป็นจำนวน " + finalcost + " " + "บาท";
  if (s_status_pay == 0) {
    txt_warning = txt_pay_cash;
  } else {
    txt_warning = txt_pay_trans;
  }

  var dialog_confirm = document.getElementById('confirm_get_job-dialog');

  if (dialog_confirm) {
    dialog_confirm.show();
    $('#txt_content_get_trans').text(txt_warning);
  } else {
    ons.createElement('confirm_get_job.html', {append: true})
            .then(function (dialog_confirm) {
              $('#txt_content_get_trans').text(txt_warning);
              dialog_confirm.show();
            });
  }

}

function trans_driver_topoint(id) {
  submitCheckIn('driver_topoint');
}

function trans_driver_pickup(id) {
  submitCheckIn('driver_pickup');
}

function trans_driver_complete(id) {
  submitCheckIn('driver_complete');
}

function submitCheckIn(type_step) {
  var lat = $('#lat').val();
  var lng = $('#lng').val();
  var type_pay = $('#type_customer_pay').val();
  var idorder = $('#idorder').val();
//  var url = "mod/tbooking/curl_connect_api.php?type=checkin_approve&step=<?=$_GET[type];?>&oi=" + idorder + "&type_pay=" + type_pay;
  var url = "api/checkin_transfer?step=" + type_step + "&type_pay=" + type_pay;
  if (type_step == "driver_complete") {
    var url = "api/checkin_transfer?step=" + "driver_checkcar" + "&type_pay=" + type_pay;
  }
//  console.log(url);
  var data = {idorder: idorder,
    lat: lat,
    lng: lng,
    cost: $('#cost').val(),
    s_cost: $('#s_cost').val(),
    invoice: $('#invoice').val(),
    driver_id: $('#driver_id_trans').val()}

  console.log(url);
  console.log(data);
//  return false;

  $.ajax({
    url: url,
    dataType: 'json',
    data: data,
    type: 'post',
    success: function (res) {
      console.log(res);
      return;
      if (res.api.status == "ok") {
        if (res.api.data.status == "200") {
          $.post('main/get_timestamp', function (res) {
            changeHtmlTrans(type_step, idorder, timestampToDate(res, "time"));
            callApiManage();
            if (type_step == "driver_complete") {
              ons.notification.alert({
                message: 'งานของคุณเสร็จสิ้นแล้ว',
                title: "สมบูรณ์",
                buttonLabel: "ปิด"
              }).then(function () {
                callpop();
                $('#balance_txt_trans').text(res.update_balance.balance);
                $('#balance_val_trans').val(res.update_balance.balance);

              });
            }
          });
//          $("#close_dialog_custom").click();
//          afterAction(type_pay);
        } else {
//          swal("Error");
        }
      }
//      $('#btn_manage').click();
//      callApiLog();
    }
  });
}


/******* <!-------- Change html CheckIn ------------> *******/

function changeHtmlTrans(type, id, st) {
//	new Date(unixtimestamp*1000);
  $('#status_' + type).html('<div class="font-16"><i class="fa fa-clock-o fa-spin 6x" style="color:#88B34D"></i><span>  เวลา ' + st + '</span></div>');
  $('#iconchk_' + type).attr("src", "assets/images/yes.png");
  $("#number_" + type).removeClass('step-booking');
  $("#number_" + type).addClass('step-booking-active');

  $("#btn_" + type).css('background-color', '#666666');
  $('#pm_' + type).show();

  if (type == "driver_topoint") {

    $('#step_trans_pickup').show();

  } else if (type == "driver_pickup") {
    $('#step_trans_complete').show();

  } else if (type == "guest_register") {

  }
  $('#' + type + '_check_click').val(1);
  $("#box_" + type).removeClass('border-alert');
}

function actionProgress(obj) {
  if (obj.driver_topoint == 1) {
    console.log("driver_topoint");
    changeHtmlTrans("driver_topoint", obj.id, timestampToDate(obj.driver_topoint_date, "time"));
  }
  if (obj.driver_pickup == 1) {
    console.log("driver_pickup");
    changeHtmlTrans("driver_pickup", obj.id, timestampToDate(obj.driver_pickup_date, "time"));
  }
//  if (obj.driver_complete == 1) {
//    console.log("driver_complete");
//    changeHtmlTrans("driver_complete", obj.id, timestampToDate(obj.driver_complete_date, "time"));
//  }
}