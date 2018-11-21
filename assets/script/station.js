/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function manageServiceSt() {
  fn.pushPage({
    'id': 'st_manage_service.html',
    'title': 'จัดการค่าบริการ'
  }, 'slide-ios');

  $.post("station/service_manage_view", function (ele) {
//    console.log(ele);
    $('#body_st_manage_service').html(ele);
  });
}

function addServiceService() {
  fn.pushPage({
    'id': 'popup1.html',
    'title': 'จัดการค่าบริการ'
  }, 'lift-ios');
  $.post("station/add_service", function (ele) {
//    console.log(ele);
    $('#body_popup1').html(ele);
//    if($('#province_text_input').val()!=""){
//      $('#txt_user_province').text($('#province_text_input').val());
//      $('#txt_user_province').css('color','#000');
//    }

  });
}

function selectTransferPlaceSer() {
  
  fn.pushPage({'id': 'option.html', 'title': 'สถานที่'}, 'lift-ios');
  var ps = {
    province: $('#province').val(),
    aumphur: $('#aumphur').val()
  }

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

function selectAumphurSer() {
  $('#body_option').html(progress_circle);
  fn.pushPage({'id': 'option.html', 'title': 'สถานที่'}, 'lift-ios');
  var ps = {
    province: $('#province').val()
  };

  $.ajax({
    url: "station/data_aumphur", // point to server-side PHP script 
    data: ps,
    dataType: 'json', // what to expect back from the PHP script, if anything
    type: 'post',
    success: function (res) {
      $('#body_option').html(progress_circle);
      var param = {data: res};
      console.log(param);
      $.post("component/cpn_aumphur", param, function (el) {
        $('#body_option').html(el);
      });
    }
  });
}

function selectAumphur(id) {
  $('#aumphur').val(id);
  var txt = $('#item_aumphur_' + id).data('name');
  console.log(txt);
  $('#txt_aumphur').text(txt);
  $('#txt_aumphur').css('color', '#000');
  callpop();
}

function searchPlaceService(txt) {
//  console.log(txt);
  $('.txt_place').each(function () {
    var txt_name = $(this).text();
    var row_id = $(this).attr('role');
//    console.log(row_id);
    if (txt_name.toUpperCase().indexOf(txt.toUpperCase()) > -1) {
      $('#item_list_place_' + row_id).show();
      
    } else {
      $('#item_list_place_' + row_id).hide();
    }
  });
}

function selectPlaceAll(id){
  $('#place_to').val(id);
  var txt = $('#item_list_place_' + id).data('name');
  console.log(txt);
  $('#txt_place_to').text(txt);
  $('#txt_place_to').css('color', '#000');
  callpop();
}