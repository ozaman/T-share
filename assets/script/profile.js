function ISO8601(date) {
  var d = date.getDate();
  if (d < 10)
    d = '0' + d;
  var m = date.getMonth() + 1;
  if (m < 10)
    m = '0' + m;
  return date.getFullYear() + '-' + m + '-' + d;
}

function checkPicDocProfile(id) {

  console.log(id + " *****************----------------");
  $.ajax({
    url: '../data/pic/driver/id_card/' + id + '_idcard.jpg',
    type: 'HEAD',
    error: function ()
    {
      console.log('Error file');
//			   $('#idcard_img').hide();
//			   $('#pv_id_card').attr('src','images/ex_card/id_card.jpg');
    },
    success: function ()
    {
      console.log('success file');
//				 $('#idcard_img').show();
      $('#box_img_id_card').fadeIn(200);
      $('#txt-img-has-id_card').show();
      $('#txt-img-nohas-id_card').hide();
      $('#pv_id_card').attr('src', '../data/pic/driver/id_card/' + id + '_idcard.jpg?v=' + $.now());
    }
  });

  $.ajax({
    url: '../data/pic/driver/id_driving/' + id + '_iddriving.jpg',
    type: 'HEAD',
    error: function ()
    {
      console.log('Error file');
//			   $('#iddriving_img').hide();
//			   $('#pv_id_driving').attr('src','images/ex_card/id_driving.jpg');
    },
    success: function ()
    {
      console.log('success file');
//				$('#iddriving_img').show();
      $('#box_img_id_driving').fadeIn(200);
      $('#txt-img-has-id_driving').show();
      $('#txt-img-nohas-id_driving').hide();
      $('#pv_id_driving').attr('src', '../data/pic/driver/id_driving/' + id + '_iddriving.jpg?v=' + $.now());
    }
  });
}


function readURLprofile(input, type) {
//		alert(type);
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {

      $('#pv_' + type).attr('src', e.target.result);
      var data = new FormData($('#edit_form')[0]);
      if (type == "id_card") {
        data.append('idcard_upload', $('#img_' + type)[0].files[0]);
        var id = $.cookie("detect_user");
      } else if (type == "id_driving") {
        data.append('iddriving_upload', $('#img_' + type)[0].files[0]);
        var id = $.cookie("detect_user");
//					alert()
      } else if (type == "profile") {
        data.append('imgInp', $('#img_' + type)[0].files[0]);
        var id = $.cookie("detect_username");
      }

//      var url_upload = "application/views/upload_img/upload.php?id=" + id + "&type=" + type;
      var url_upload = "upload/index?id=" + id + "&type=" + type;
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
          if (php_script_response.result == false) {
            ons.notification.alert({message: 'ไม่สามารถอัพโหลดรูปภาพนี้ได้', title: "ไม่สำเร็จ", buttonLabel: "ปิด"})
                    .then(function () {
                    });
            return false;
          }
          $('#box_img_' + type).fadeIn(200);
          $('#txt-img-has-' + type).show();
          $('#txt-img-nohas-' + type).hide();
          $('#pv_id_card').attr('src', '../data/pic/driver/id_card/' + $.cookie("detect_user") + '_idcard.jpg?v=' + $.now());
          $('#pv_id_driving').attr('src', '../data/pic/driver/id_driving/' + $.cookie("detect_user") + '_iddriving.jpg?v=' + $.now());
          console.log('../data/pic/driver/small/' + $.cookie("detect_username") + '.jpg?v=' + $.now());
          $('#pv_profile').attr('src', '../data/pic/driver/small/' + $.cookie("detect_username") + '.jpg?v=' + $.now());
          $('.shotcut-profile').attr('src', '../data/pic/driver/small/' + $.cookie("detect_username") + '.jpg?v=' + $.now());
          $('.profile-pic-big').attr('src', '../data/pic/driver/small/' + $.cookie("detect_username") + '.jpg?v=' + $.now());

          ons.notification.alert({message: 'ทำการอัพโหลดรูปสำเร็จแล้ว', title: "สำเร็จ", buttonLabel: "ปิด"})
                  .then(function () {
//											   		location.reload();
                  });
        },
        error: function (e) {
          console.log(e)
          ons.notification.alert({message: 'ไม่สามารถอัพโหลดรูปภาพนี้ได้', title: "ไม่สำเร็จ", buttonLabel: "ปิด"})
                  .then(function () {
                  });
        }
      });
    }
    reader.readAsDataURL(input.files[0]);

  }

}

/*$("#img_id_card").change(function() {
 readURLprofile(this,'id_card');
 });
 
 $("#img_id_driving").change(function() {
 //		 console.log('img_id_driving');
 readURLprofile(this,'id_driving');
 });
 
 $("#img_car_img").change(function() {
 readURLprofile(this,'car_img');
 });
 
 $("#img_profile").change(function() {
 readURLprofile(this,'profile');
 
 
 });*/


function selectGender(val) {
  console.log(val);
//		$('.rcp').prop('checked', false);
//		$('#checkbox-'+val).attr('checked', true);
  $('#gender').val(val);
}

function selectUserProvince(id, code) {
  var name = $('#item_user_province_' + id).data('name');
  console.log(name + " " + id + " || " + code);

  $('#province').val(id);
  $('#txt_user_province').text(name);
  $('#code_privince').val(code);
//	$('ons-back-button').click();
  callpop();
}



function createDialogPf() {
  var dialog = document.getElementById('pf_edit-alert-dialog');

  if (dialog) {
    dialog.show();
  } else {
    ons.createElement('pf_edit-dialog.html', {append: true})
            .then(function (dialog) {
              dialog.show();
            });
  }
}

function saveDataPf() {
  if ($('input[name="password"]').val() == "") {
    ons.notification.alert({message: 'กรุณากรอกพาสเวิร์ด', title: "ข้อมูลไม่ครบ", buttonLabel: "ปิด"})
            .then(function () {
              performClick('password-input');
            });
    return;
  }

  if ($('input[name="name_th"]').val() == "") {
    ons.notification.alert({message: 'กรุณากรอกพาสเวิร์ด', title: "ข้อมูลไม่ครบ", buttonLabel: "ปิด"})
            .then(function () {
              performClick('name-input');
            });
    return;
  }

  if ($('input[name="phone"]').val() == "") {
    ons.notification.alert({message: 'กรุณากรอกพาสเวิร์ด', title: "ข้อมูลไม่ครบ", buttonLabel: "ปิด"})
            .then(function () {
              performClick('phone');
            });
    return;
  }
  if ($('#valid_type_phone').val() == 1) {

    ons.notification.alert({message: 'เบอร์โทรนี้ถูกใช้แล้ว ไม่สามารถใช้ซ้ำได้', title: "ข้อมูลซ้ำ", buttonLabel: "ปิด"})
            .then(function () {
              $('input[name="plate_num"]').focus();
            });
  }
  if ($('#valid_type_email').val() == 1) {

    ons.notification.alert({message: 'Email นี้ถูกใช้แล้ว ไม่สามารถใช้ซ้ำได้', title: "ข้อมูลซ้ำ", buttonLabel: "ปิด"})
            .then(function () {
              $('input[name="plate_num"]').focus();
            });
    return false;
  }
  $('#pf_edit-alert-dialog').hide();
  modal.show();
  var data_form = $('#edit_form').serialize();
  var id = $.cookie("detect_user");
//    var url = 'mod/material/user/php_user.php?action=edit&id='+id;
  var url = 'main/update_user?id=' + id;
  $.ajax({
    url: url, // point to server-side PHP script 
    dataType: 'text', // what to expect back from the PHP script, if anything
    /*   				            cache: false,
     contentType: false,
     processData: false,*/
    data: data_form,
    type: 'post',
    success: function (php_script_response) {

      var obj = JSON.parse(php_script_response);
      console.log(obj);
      if (obj.result == true) {
        modal.hide();
        ons.notification.alert({message: 'ทำการแก้ไขข้อมูลเรียบร้อยแล้ว', title: "สำเร็จ", buttonLabel: "ปิด"})
                .then(function () {
//											   		location.reload();
                });
      } else {
        ons.notification.alert({message: 'ไม่สามารถแก้ไขข้อมูลได้ กรุณาตรวจสอบหรือติดต่อเจ้าหน้าที่', title: "ไม่สำเร็จ", buttonLabel: "ปิด"})
                .then(function () {

                });
      }
    }
  });

  var ac = {
    i_type: 8,
    i_sub_type: 4,
    i_event: 0,
    i_user: detect_user,
    s_topic: "แก้ไขข้อมูลส่วนตัว",
    s_message: "คุณทำการแก้ไขข้อมูลส่วนตัว",
    s_posted: username
  };
  var nc = {};
  apiRecordActivityAndNotification(ac, nc)
}

function validEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  console.log(regex.test(email));
  if (regex.test(email) == true) {
    if (value == $('#old_email').val()) {
      $('#incorrent-email').hide();
      $('#corrent-email').hide();
      console.log('old old_email phone');
      $('#valid_type_email').val(0);
      return;
    }
    $('#incorrent-email').hide();
    $('#corrent-email').show();
    $.ajax({
      url: "main/check_email", // point to server-side PHP script 
      dataType: 'json', // what to expect back from the PHP script, if anything
      data: {txt: email, user: detect_user},
      type: 'post',
      success: function (res) {

        // $.post("login/phone_overlap", , function (res) {
        console.log(res);
        if (res.check > 0) {
          $('#incorrent-email').show();
          $('#corrent-email').hide();
          $('#incorrent-email span').text('email ซ้ำ');
        } else {

          $('#corrent-email').show();
          $('#incorrent-email').hide();

        }
        $('#valid_type_email').val(res.check); // 0=ไม่ซ้ำ , 1=ซ้ำ
      }
    });
  } else {
//    $('#incorrent-email span').text('email ไม่ถูกต้อง');
    $('#incorrent-email').show();
    $('#corrent-email').hide();
  }
}

function validPhoneNum(value) {
  if (value == $('#old_phone_number').val()) {
    $('#incorrent-phone').hide();
    $('#corrent-phone').hide();
    console.log('old number phone');
    $('#valid_type_phone').val(0);
    return;
  }
  console.log(value)
  if (value.length >= 10) {
    $.ajax({
      url: "main/check_phone", // point to server-side PHP script 
      dataType: 'json', // what to expect back from the PHP script, if anything
      data: {txt: value, user: detect_user},
      type: 'post',
      success: function (res) {

        // $.post("login/phone_overlap", , function (res) {
        console.log(res);
        if (res.check > 0) {
          $('#incorrent-phone').show();
          $('#corrent-phone').hide();
          $('#incorrent-phone span').text('เบอร์ซ้ำ');
        } else {

          $('#corrent-phone').show();
          $('#incorrent-phone').hide();

        }
        $('#valid_type_phone').val(res.check); // 0=ไม่ซ้ำ , 1=ซ้ำ
      }
    });

  } else {
    $('#corrent-phone').hide();
    $('#incorrent-phone').hide();
//			$('#incorrent-phone span').text('ไม่ถูกต้อง');
  }
}

function pwHideTxt() {
  var val = $('input[name="password"]').val();
  console.log(val);
  if(val.length<=0){
    $('#txt-pw-placeholder').hide();
  }else{
    $('#txt-pw-placeholder').show();
  }
}