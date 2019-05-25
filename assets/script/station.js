
function showSheetAreaService(id, station, amp_name, status) {
  if (status == 1) {
    var txt_st = "ปิดราคานี้";
    var status_action = 0;
    ons.openActionSheet({
      cancelable: true,
      buttons: ['จัดการราคาสถานที่', 'แก้ไขราคาพื้นที่นี้', {
          label: txt_st,
          modifier: 'destructive'
        }, 'ปิด']
    })
            .then(function (index) {
              if (index == 0) {
                managePlaceEachAmphur(id, station, amp_name);
              } else if (index == 1) {
                editServiceArea(id);
              } else if (index == 2) {
                changeStatusPlaceEachSer(id, status_action, station);
              }
            });
  } else {
    var txt_st = "เปิดราคานี้";
    var status_action = 1;
    ons.openActionSheet({
      cancelable: true,
      buttons: [{
          label: txt_st,
          modifier: 'destructive'
        }, 'ปิด']
    }).then(function (index) {
      if (index == 0) {
        changeStatusPlaceEachSer(id, status_action, station);
      }
    });
  }
//  ons.openActionSheet({
//    cancelable: true,
//    buttons: ['เพิ่มราคาของสถานที่', 'แก้ไขราคาพื้นที่นี้', {
//        label: txt_st,
//        modifier: 'destructive'
//      }, 'ปิด']
//  }).then(function (index) {
//    if (index == 0) {
//      managePlaceEachAmphur(id, station, amp_name);
//    } else if (index == 1) {
//      editServiceArea(id);
//    } else if (index == 2) {
//      changeStatusPlaceEachSer(id, status_action, station);
//    }
//  });
}

function changeStatusPlaceEachSer(id, status, station) {
  var ps = {
    id: id,
    status: status
  }
  $.ajax({
    url: "station/change_status_ser", // point to server-side PHP script 
    data: ps,
    dataType: 'json', // what to expect back from the PHP script, if anything
    type: 'post',
    success: function (res) {
      console.log(res);
      $('#body_option').html(progress_circle);
      $.post("station/service_manage_view?station=" + station, function (ele) {
//    console.log(ele);
        $('#body_st_manage_service').html(ele);
      });
    }
  });
}

function delPlaceEachSer(id) {
  $('#id_del_ser').val(id);
  var dialog = document.getElementById('confirm_del_place-dialog');

  if (dialog) {
    dialog.show();
  } else {
    ons.createElement('confirm_del_place.html', {append: true})
            .then(function (dialog) {
              dialog.show();
            });
  }
}

function confirmDelSer() {
  var ps = {
    id: $('#id_del_area').val()
  }
  $.ajax({
    url: "station/delete_service", // point to server-side PHP script 
    data: ps,
    dataType: 'json', // what to expect back from the PHP script, if anything
    type: 'post',
    success: function (res) {
      $('#body_option').html(progress_circle);
//      var param = {data: res};
//      console.log(param);
//      $.post("component/cpn_amphur", param, function (el) {
//        $('#body_option').html(el);
//      });
    }
  });
}

function confirmDelPlace(id) {

}

function showSheetPlaceService(id, station, amp_name, id_main) {
  ons.openActionSheet({
//    title: 'My Action Sheet',
    cancelable: true,
    buttons: ['แก้ไขราคาพื้นที่นี้', 'ปิด']
  }).then(function (index) {
    if (index == 0) {
      editServicePlace(id_main, id);
    }
  });
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function selectFromSer() {
  $('#body_option').html(progress_circle);
  fn.pushPage({'id': 'option.html', 'title': 'สถานที่'}, 'lift-ios');
  var ps = {
    station: $('#station').val()
  };
  $.post("station/select_place_from", ps, function (el) {
    $('#body_option').html(el);
  });
}

function selectPlaceFrom(id, type) {
  $('#type_from').val(type);
  $('#from').val(id);
  if (type == 2) {
    var txt = $('#item_list_place_f_' + id).data('name');
  } else if (type == 3) {
    var txt = $('#item_list_place_s_' + id).data('name');
  }
//  alert(txt);
  $('#txt_from').text(txt);
  $('#ip_txt_from').val(txt);
  console.log(txt);
  $('#txt_price_area_from').text(txt);
  callpop();
  chk_show_box();
}

function manageServiceSt(station) {
  fn.pushPage({
    'id': 'st_manage_service.html',
    'title': 'จัดการค่าบริการ'
  }, 'slide-ios');

  $.post("station/service_manage_view?station=" + station, function (ele) {
//    console.log(ele);
    $('#body_st_manage_service').html(ele);
  });
}

function addServiceArea() {
  fn.pushPage({
    'id': 'popup1.html',
    'title': 'เพิ่มบริการพื้นที่'
  }, 'lift-ios');
  $.post("station/add_service_area", function (ele) {
//    console.log(ele);
    $('#body_popup1').html(ele);
  });
}

function editServiceArea(id) {
  fn.pushPage({
    'id': 'popup1.html',
    'title': 'แก้ไขบริการพื้นที่'
  }, 'lift-ios');
  console.log("station/add_service_area?id=" + id);
  $.post("station/add_service_area?id=" + id, function (ele) {
//    console.log(ele);
    $('#body_popup1').html(ele);
  });
}

function selectAumphurSer() {
  $('#body_option').html(progress_circle);
  fn.pushPage({'id': 'option.html', 'title': 'สถานที่'}, 'lift-ios');
  var ps = {
    province: $('#province').val()
  };

  $.ajax({
    url: "station/data_amphur", // point to server-side PHP script 
    data: ps,
    dataType: 'json', // what to expect back from the PHP script, if anything
    type: 'post',
    success: function (res) {
      $('#body_option').html(progress_circle);
      var param = {data: res};
      console.log(param);
      $.post("component/cpn_amphur", param, function (el) {
        $('#body_option').html(el);
      });
    }
  });
}

function selectAumphurManagePlace() {
  $('#body_option').html(progress_circle);
  fn.pushPage({'id': 'option.html', 'title': 'สถานที่'}, 'lift-ios');
  var ps = {
    province: $('#province').val()
  };

  $.ajax({
    url: "station/data_amphur", // point to server-side PHP script 
    data: ps,
    dataType: 'json', // what to expect back from the PHP script, if anything
    type: 'post',
    success: function (res) {
      $('#body_option').html(progress_circle);
      var param = {data: res};
      console.log(param);
      $.post("component/cpn_amphur?op=manage_place", param, function (el) {
        $('#body_option').html(el);
      });
    }
  });
}

function selectAumphur(id, op) {
  $('#amphur').val(id);
  var txt = $('#item_amphur_' + id).data('name');
  console.log(txt);
  $('#txt_amphur').text(txt);
  $('#txt_amphur').css('color', '#000');
  callpop();

  if (op == "manage_place") {
    console.log(op);
    load_list_place();
  }

  $('#to').val(txt);
  $('#txt_price_area_from').text($('#txt_from').text());
  $('#txt_price_area_to').text(txt);
  chk_show_box();

}

function chk_show_box() {
  if ($('#txt_price_area_from').text() != "" && $('#txt_price_area_to').text() != "") {
    $('#box_price_area').show();
  } else {
    $('#box_price_area').hide();
  }
  chk_show_save();
}

function chk_show_save() {
  if ($('#amphur').val() != "") {
    if ($('#price_area').val() != "") {
      $('#box_btn_save_ser').show();
    } else {
      $('#box_btn_save_ser').hide();
    }
  } else {
    $('#box_btn_save_ser').hide();
  }
}

function colseAreaPrice() {
//  $('#txt_price_area_from').text('');
  $('#txt_price_area_to').text('');
  $('#txt_amphur').text('เลือกพื้นที่ส่ง');
  $('#txt_amphur').css('color', '#b2b2b2');
  $('#amphur').val('');
  $('#price_area').val('');
  chk_show_box();
}

function saveServiceArea(type_action, id) {

  $.ajax({
    url: "station/add_data_service_area?type=" + type_action + "&id=" + id, // point to server-side PHP script 
    data: $('#area_form').serialize(),
    dataType: 'json', // what to expect back from the PHP script, if anything
    type: 'post',
    success: function (res) {
      console.log(res);
      if (res.result == true) {
        $.post("station/service_manage_view?station=" + $('#station').val(), function (ele) {
          $('#body_st_manage_service').html(ele);
          callpop();
        });
      } else {
        ons.notification.alert({
          message: 'ไม่สามารถเพิ่มได้ กรุณาลองใหม่ภายหลัง',
          title: "ผิดพลาด",
          buttonLabel: "ปิด"
        })
                .then(function () {
                  $.post("station/service_manage_view?station=" + $('#station').val(), function (ele) {
                    $('#body_st_manage_service').html(ele);
                  });
                });
      }
    }
  });

}

function managePlaceEachAmphur(amp_to_id, st, area) {
  fn.pushPage({'id': 'popup1.html', 'title': area}, 'lift-ios');
  $('#body_popup1').html(progress_circle);
  $.post("station/service_place_view?amp_to_id=" + amp_to_id + "&station=" + st + "&area_name=" + area, function (ele) {
    $('#body_popup1').html(ele);
  });
}

function addServicePlace(amp_to_id) {
  fn.pushPage({
    'id': 'popup2.html',
    'title': 'เพิ่มบริการสถานที่'
  }, 'lift-ios');
  $.post("station/add_service_place?amp_to_id=" + amp_to_id, function (ele) {
    $('#body_popup2').html(ele);
  });
}

function editServicePlace(amp_to_id, id) {
  console.log(amp_to_id);
  fn.pushPage({
    'id': 'popup2.html',
    'title': 'แก้ไขบริการสถานที่'
  }, 'lift-ios');
  var url = "station/add_service_place?amp_to_id=" + amp_to_id + "&id=" + id;
  console.log(url);
  $.post(url, function (ele) {
    $('#body_popup2').html(ele);
  });
}

function selectTransferPlaceSer(topic_amp) {

  fn.pushPage({'id': 'option.html', 'title': 'สถานที่ใน ' + topic_amp}, 'lift-ios');
  var ps = {
//    province: $('#province').val(),
    amphur: $('#amphur_to').val()
  }
  console.log(ps);
  $.ajax({
    url: "station/data_place_all", // point to server-side PHP script 
    data: ps,
    dataType: 'json', // what to expect back from the PHP script, if anything
    type: 'post',
    success: function (res) {
      $('#body_option').html(progress_circle);
      var param = {data: res};
      console.log(param);
      $.post("component/cpn_place_all", param, function (el) {
        $('#body_option').html(el);
      });
    }
  });
}

function selectPlaceAll(id) {
  $('#place_to').val(id);
  var txt = $('#item_list_place_' + id).data('name');
  console.log(txt);
  $('#txt_place_to').text(txt);
  $('#txt_place_to').css('color', '#000');
  callpop();
  $('#txt_price_place_from').text($('#ip_txt_from').val());
  $('#txt_price_place_to').text(txt + "(" + $('#txt_aumphur').text() + ")");
  $('#ip_txt_place_to').val(txt);
  chk_show_box_place();
}

function chk_show_box_place() {
  console.log($('#txt_price_place_from').text() + " || " + $('#txt_price_place_to').text())
  if ($('#txt_price_place_to').text() != "" && $('#txt_price_place_to').text() != "") {
    $('#box_price_place').show();
  } else {
    $('#box_price_place').hide();
  }
  chk_show_save_place();
}

function chk_show_save_place() {
  if ($('#place_to').val() != "") {
    if ($('#price_place').val() != "") {
      $('#box_btn_save_ser').show();
    } else {
      $('#box_btn_save_ser').hide();
    }
  } else {
    $('#box_btn_save_ser').hide();
  }
}

function saveServicePlace(type_action, id) {

  $.ajax({
    url: "station/add_data_service_place?type=" + type_action + "&id=" + id, // point to server-side PHP script 
    data: $('#place_form').serialize(),
    dataType: 'json', // what to expect back from the PHP script, if anything
    type: 'post',
    success: function (res) {
      console.log(res);
      if (res.result == true) {
        $.post("station/service_manage_view?station=" + $('#station').val(), function (ele) {
          $('#body_st_manage_service').html(ele);
          callpop();
          managePlaceEachAmphur($('#main').val(), $('#station').val(), $('#area_name').val());
        });
      } else {
        ons.notification.alert({
          message: 'ไม่สามารถเพิ่มได้ กรุณาลองใหม่ภายหลัง',
          title: "ผิดพลาด",
          buttonLabel: "ปิด"
        })
                .then(function () {
                  $.post("station/service_manage_view?station=" + $('#station').val(), function (ele) {
                    $('#body_st_manage_service').html(ele);
                  });
                });
      }
    }
  });

}

function colsePlacePrice() {

  $('#txt_price_place_to').text('');
  $('#txt_place_to').text('เลือกพื้นที่');
  $('#txt_place_to').css('color', '#b2b2b2');
  $('#place_to').val('');
  $('#price_place').val('');
  chk_show_box_place();
}

function stManagePlace(station) {
  fn.pushPage({
    'id': 'st_manage_place.html',
    'title': 'จัดการสถานที่'
  }, 'slide-ios');
  setTimeout(function () {
    $('#body_st_manage_place').html(progress_circle);
    $.post("station/manage_place?station=" + station, function (ele) {
//    console.log(ele);
      $('#body_st_manage_place').html(ele);
    });
  }, 200);

}

function addPlaceOwner(station) {

  fn.pushPage({
    'id': 'add_place_owner.html',
    'title': 'จัดการสถานที่'
  }, 'lift-ios');
  setTimeout(function () {
    $('#body_add_place_owner').html(progress_circle);
    $.post("station/add_place_owner?station=" + station, function (ele) {
      $('#body_add_place_owner').html(ele);
//      load_list_place();
    });
  }, 200);


}

function load_list_place() {
  var pv = $('#province').val();
  var amp = $('#amphur').val();
  var url = "component/list_manage_place_station?station=" + $('#station').val();
  var data = {
    pv: pv,
    amp: amp
  };
  $('#pl_owner_list').html(progress_circle);
  $.post(url, data, function (ele) {
    $('#pl_owner_list').html(ele);
  });
}

function searchPlaceService(txt_ip, id_ele) {
  console.log(txt_ip);
  $('.txt_place').each(function () {
    var txt_name = $(this).text();
    var row_id = $(this).attr('role');

    if (txt_name.toUpperCase().indexOf(txt_ip.toUpperCase()) > -1) {
      $('#'+id_ele + row_id).show();
      console.log(txt_name + " || " + txt_ip);
    } else {
      $('#'+id_ele + row_id).hide();
    }
  });
}

function selectPlacetoOwner(id, prop, pl_id) {
//  var num = parseInt($('#chk_toast_run').val());
  if ($('#' + id).prop('checked')) {

    if (prop == 1) {
      $('#' + id).prop('checked', false);
    }
    updateSelectPlaceOwner(pl_id, 0, prop);
//    num = num - 1;
  } else {

    if (prop == 1) {
      $('#' + id).prop('checked', true);
    }
    updateSelectPlaceOwner(pl_id, 1, prop);
//    num = num + 1;
  }
//  $('#num_select').text(num);
//  $('#chk_toast_run').val(num);
//
//  console.log($('#' + id).prop('checked'));
//  if ($('#chk_toast_run').val() > 0) {
//    checkBeforeShowToast_selectPlace();
//  } else {
//    toast_confirm_select_place.hide();
//  }

}

function checkBeforeShowToast_selectPlace() {
//  console.log($('#toast_confirm_select_place').css('display')+" ++");
  if ($('#toast_confirm_select_place').css('display') == "none") {
    toast_confirm_select_place.show();
  }
}

function checkBeforeHideToast_selectPlace() {
  if ($('#toast_confirm_select_place').css('display') != "none") {
    toast_confirm_select_place.hide();
  }
}



function updateSelectPlaceOwner(id, type) {
  var station = $('#station').val();
//  if (type == 0) { //close
//    station = 0;
//  } else { //open
//    station = $('#station').val();
//  }
//  var topic_place = $('#item_list_place_'+id).find('.txt_place').text();
//  console.log(topic_place);
  var data = {
    station: station,
    place_id: id,
    type: type
  };
  $.ajax({
    url: "station/save_each_trans_pl_station", // point to server-side PHP script 
    data: data,
    dataType: 'json', // what to expect back from the PHP script, if anything
    type: 'post',
    success: function (res) {
      console.log(res);
      if (res.result == true) {
        if (type == 0) { //close
          var txt_toast = "ยกเลิกสถานที่นี้แล้ว !";
        } else { //open
          var txt_toast = "เพิ่มสถานที่นี้แล้ว !";
        }
        var url = "station/manage_place?station=" + $('#station').val();
        console.log(url);
        ons.notification.toast(txt_toast, {timeout: 2000, animation: 'default'})
        $.post(url
                , function (ele) {
                  $('#body_st_manage_place').html(ele);
                  $.ajax({
                    url: "station/save_place_owner?place_id=" + id, // point to server-side PHP script 
                    data: $('#form_select_place').serialize(),
                    dataType: 'json', // what to expect back from the PHP script, if anything
                    type: 'post',
                    success: function (res) {
                      console.log(res);
                    }
                  });

                });

      } else {
        ons.notification.toast('สถานที่นี้มีคิวแล้ว!', {timeout: 2000, animation: 'default'})
        $('#placebox-' + id).prop('checked', false);

      }
    }
  });
//  toast_confirm_select_place.hide();
}

function viewOwnerPlace(place_id) {
  fn.pushPage({
    'id': 'popup1.html',
    'title': ''
  }, 'lift-ios');
  setTimeout(function () {
    $('#body_popup1').html(progress_circle);
    $.post("station/view_owner_place?id=" + place_id, function (ele) {
      $('#body_popup1').html(ele);
    });
  }, 200);
}