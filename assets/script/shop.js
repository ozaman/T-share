function check_com_plan(id) { //// v1.
  $.ajax({
    url: "shop/check_commission_plan?order_id=" + id,
    dataType: 'json',
    type: 'post',
    success: function (chk) {
      console.log(chk);
      if (chk.result == true) {
        $('#step_driver_pay_com').show();
        load_status_trans(id);
      }
    }
  });
}

function check_plan_transfer(id) { //// v2.
  $.ajax({
    url: "shop/check_plan_transfer?order_id=" + id,
    dataType: 'json',
    type: 'post',
    success: function (chk) {
      console.log("*************************************************************************");
      console.log(chk);
      if (chk.result == true) {
        $('#step_driver_pay_com').show();
        load_status_trans(id);
      }
    }
  });
}

function load_status_trans(id) {
  $('#step_driver_pay_com').show();
  $.post("component/box_status_trans_shop?order_id=" + id, function (html) {
    $('#step_driver_pay_com').html(html);
    $('.page').animate({
      scrollTop: $(document).height() + 720
    }, 500);
  });
}

function checformadd(tax) {
  var form = document.getElementById("form_booking");

  if (tax == 'box_car') {
    $('.card').removeClass('borderBlink')
    $('#' + tax).removeClass('borderBlink')
    if (form.elements["nation"].value == 0) {
      $('#nation_box').addClass('borderBlink')
      $('html, body').animate({
        scrollTop: $('#box_com').offset().top
      }, 300, function () {



        window.location.href = "#nation_box";
      });
    }
    if (form.elements["nation"].value != 0 && form.elements["price_plan"].value == 0) {
      $('.card').removeClass('borderBlink')
      $('#box_com').addClass('borderBlink')
      // $("#box_com").animate({scrollTop:50}, '500');
      // $("#box_com").animate({top:'50'},1000,function(){
      //      $('#shop_add').animate({
      //                  location.href="#box_com";
      // // window.location=$("#about").attr("href");
      //    // window.location = "about.html";

      //  },500);
      console.log(this.hash)

      $('html, body').animate({
        scrollTop: $('#box_com').offset().top
      }, 300, function () {



        window.location.href = "#box_com";
      });
    } else if (form.elements["nation"].value != 0 && form.elements["price_plan"].value != 0 && form.elements["adult"].value == 0) {
      $('#num_customer').addClass('borderBlink')
    }
  }
  if (tax == 'nation_box') {
    $('.card').removeClass('borderBlink')
    $('#' + tax).removeClass('borderBlink')
  }
  if (tax == 'box_com') {
    $('.card').removeClass('borderBlink')
    if (form.elements["price_plan"].value > 0) {
      $('#box_com').removeClass('borderBlink')
    }

    if (form.elements["plate_num_1"].value == 0) {
      $('#box_car').addClass('borderBlink')
      $('html, body').animate({
        scrollTop: $('#box_com').offset().top
      }, 300, function () {



        window.location.href = "#nation_box";
      });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value == 0) {
      $('#nation_box').addClass('borderBlink')
      console.log(this.hash)

      $('html, body').animate({
        scrollTop: $('#box_com').offset().top
      }, 300, function () {



        window.location.href = "#nation_box";
      });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value == 0) {
      // $('#box_com').addClass('borderBlink')
      console.log(this.hash)

      $('html, body').animate({
        scrollTop: $('#box_com').offset().top
      }, 300, function () {



        window.location.href = "#box_com";
      });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value != 0 && $('#child').val() == '' && $('#adult').val() == '') {
      $('#num_customer').addClass('borderBlink')
      console.log(this.hash)

      $('html, body').animate({
        scrollTop: $('#num_customer').offset().top
      }, 300, function () {

        // $("#adult").focus()

        // window.location.href = "#num_customer";
      });
    } else if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value != 0 && $('#child').val() != '' && $('#adult').val() != '') {
      if (form.elements["time_num"].value == 0) {
        $('#box_time').addClass('borderBlink')
        // $('#time_num').focus()
      }
      if (form.elements["time_num"].value != 0) {
        $('#btn_submitadd').addClass('borderBlink')
        window.location.href = "#btn_submitadd";

      } else {
        $('#box_time').removeClass('borderBlink')

        // $('#child').focusout();
      }

    }
  }
  if (tax == 'box_time') {
    // performClick('time_num')
    if (form.elements["price_plan"].value > 0) {
      $('#box_com').removeClass('borderBlink')
    }

    if (form.elements["plate_num_1"].value == 0) {
      $('#box_car').addClass('borderBlink')
      $('html, body').animate({
        scrollTop: $('#box_com').offset().top
      }, 300, function () {



        window.location.href = "#nation_box";
      });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value == 0) {
      $('#nation_box').addClass('borderBlink')
      console.log(this.hash)

      $('html, body').animate({
        scrollTop: $('#box_com').offset().top
      }, 300, function () {



        window.location.href = "#nation_box";
      });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value == 0) {
      // $('#box_com').addClass('borderBlink')
      console.log(this.hash)

      $('html, body').animate({
        scrollTop: $('#box_com').offset().top
      }, 300, function () {



        window.location.href = "#box_com";
      });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value != 0 && $('#child').val() == '' && $('#adult').val() == '') {
      $('#num_customer').addClass('borderBlink')
      console.log(this.hash)

      $('html, body').animate({
        scrollTop: $('#num_customer').offset().top
      }, 300, function () {

        // $("#adult").focus()

        // window.location.href = "#num_customer";
      });
    } else if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value != 0 && $('#child').val() != '' && $('#adult').val() != '') {
      if (form.elements["time_num"].value == 0) {
        $('#box_time').addClass('borderBlink')
        // $('#time_num').focus()
      }
      if (form.elements["time_num"].value != 0) {
        $('#btn_submitadd').addClass('borderBlink')
        // window.location.href = "#btn_submitadd";

      } else {
        $('#box_time').removeClass('borderBlink')

        // $('#child').focusout();
      }

    }
  }



  // $("#child").focusout(function(){
  //     $("#child").val()
  //     console.log()

  // });
  $(document).ready(function () {
    $("#child").on('change', function () {
      $("#child").val()
      console.log()
    })
    $("#child").keyup(function () {
      var timer;
      var form = document.getElementById("form_booking");
      clearTimeout(timer);
      timer = setTimeout(function () {
        if ($('#adult').val() != '' && $('#child').val() != '') {
          $('#' + tax).removeClass('borderBlink')
        }

        if (form.elements["plate_num_1"].value == 0) {
          // $('#box_car').addClass('borderBlink')
          $('html, body').animate({
            scrollTop: $('#box_com').offset().top
          }, 300, function () {



            window.location.href = "#box_car";
          });
        }
        if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value == 0) {
          $('#nation_box').addClass('borderBlink')
          console.log(this.hash)

          $('html, body').animate({
            scrollTop: $('#box_com').offset().top
          }, 300, function () {



            window.location.href = "#nation_box";
          });
        }
        if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0) {
          // $('#box_com').addClass('borderBlink')
          console.log(this.hash)

          $('html, body').animate({
            scrollTop: $('#box_com').offset().top
          }, 300, function () {



            window.location.href = "#box_com";
          });
        }
        if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && $('#child').val() == '' && $('#adult').val() == '') {
          $('#num_customer').addClass('borderBlink')
          console.log(this.hash)

          $('html, body').animate({
            scrollTop: $('#num_customer').offset().top
          }, 300, function () {



            // window.location.href = "#num_customer";
          });
        }
        if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && $('#child').val() != '' && $('#adult').val() != '') {
          if ($('#adult').val() != '' && $('#child').val() != '') {
            $('#num_customer').removeClass('borderBlink')

          }
          // alert('')
          if (form.elements["time_num"].value == 0) {
            $('#child input').blur()
            // $('#child').trigger('input');
            // $('#child').blur();
            // this.blur();
            $('#box_time').addClass('borderBlink')
            // $('#time_num').focus()
          } else {
            $('#box_time').removeClass('borderBlink')
            $('#btn_submitadd').addClass('borderBlink')

            $('#child').focusout();
          }


        }


      }, 300);
    })
  });


}

function checktime(x) {
  console.log(x)
  var form = document.getElementById("form_booking");
  if ($('#child').val() != '') {
    $('#box_time').removeClass('borderBlink')
  }

  if (form.elements["plate_num_1"].value == 0) {
    $('#box_car').addClass('borderBlink')
    $('html, body').animate({
      scrollTop: $('#box_com').offset().top
    }, 300, function () {



      window.location.href = "#box_car";
    });
  }
  if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value == 0) {
    $('#nation_box').addClass('borderBlink')
    console.log(this.hash)

    $('html, body').animate({
      scrollTop: $('#box_com').offset().top
    }, 300, function () {



      window.location.href = "#nation_box";
    });
  }
  if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0) {
    // $('#box_com').addClass('borderBlink')
    console.log(this.hash)

    $('html, body').animate({
      scrollTop: $('#box_com').offset().top
    }, 300, function () {



      // window.location.href = "#box_com";
    });
  }
  if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && $('#child').val() == '' && $('#adult').val() == '') {
    $('#num_customer').addClass('borderBlink')
    console.log(this.hash)

    $('html, body').animate({
      scrollTop: $('#num_customer').offset().top
    }, 300, function () {

      // $("#adult").focus()

      // window.location.href = "#num_customer";
    });
  } else if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && $('#child').val() != '' && $('#adult').val() != '') {
    if (form.elements["time_num"].value == 0) {

      $('#child').focusout();
      $('#box_time').addClass('borderBlink')
      // $('#time_num').focus()
    }
    if (form.elements["time_num"].value != 0) {
      $('#btn_submitadd').addClass('borderBlink')
      window.location.href = "#btn_submitadd";


    } else {
      $('#box_time').removeClass('borderBlink')

      $('#child').focusout();
    }

  }
}

function checkchild(x) {
//   console.log('dsdsdsd')
}
// var rad = document.form_booking.nation;
function shandleClicks(tax, country) {
  console.log(tax)
  console.log(country)
  var url = "shop/box_price_plan" + "?i_country=" + country + "&user_sc=1";

  $.post(url, function (res) {
    $('#box_price_plan').html(res);
    // console.log(data);
  });
  // body...
}

function handleClick_s(tax, name) {
  modal.show();
  console.log(tax)
  console.log(name)
  var form = document.getElementById("form_booking");
//    console.log('#' + tax)
  if (tax == 'nation') {
    $('#' + tax + '_box').removeClass('borderBlink')
    var url = "shop/box_price_plan" + "?i_plan_pack=" + name + "&user_sc=1";

    $.post(url + '&car_type=' + $('#car_type').val() + '&i_shop=' + $('#program').val(), function (res) {
      $('#box_price_plan').html(res);
      modal.hide();
      // console.log(data);
      $('#radio-nation' + name).prop('checked', true);
      if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && $('#child').val() == '' && $('#adult').val() == '') {
        // $('#box_com').removeClass('borderBlink')
        $('#num_customer').addClass('borderBlink')
        console.log(this.hash)

        $('html, body').animate({
          scrollTop: $('#num_customer').offset().top
        }, 300, function () {

          // $("#adult").focus()

          window.location.href = "#num_customer";
        });
      }
    });


  }
  if (tax == 'car') {
    $('.box_car').removeClass('cus_focus')
    $('#div_car_' + name).addClass('cus_focus')
    modal.hide();
  }
  if (tax == 'box_com') {
//    console.log('55555555555555555555555555')
//    console.log(form.elements["price_plan"].value)
    if (form.elements["price_plan"].value > 0) {
      $('#' + tax).removeClass('borderBlink')
    } else {
      $('#box_com').removeClass('borderBlink')

    }
    $('#price_plan_' + name).prop('checked', true);

    if (form.elements["plate_num_1"].value == 0) {
      $('#box_car').addClass('borderBlink')
      $('html, body').animate({
        scrollTop: $('#box_com').offset().top
      }, 300, function () {



        window.location.href = "#nation_box";
      });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value == 0) {
      $('#nation_box').addClass('borderBlink')
      console.log(this.hash)

      $('html, body').animate({
        scrollTop: $('#box_com').offset().top
      }, 300, function () {

        // 

        window.location.href = "#nation_box";
      });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0) {
      // $('#box_com').addClass('borderBlink')
      $('#num_customer').removeClass('borderBlink')
      console.log(this.hash)

      $('html, body').animate({
        scrollTop: $('#box_com').offset().top
      }, 300, function () {



        window.location.href = "#box_com";
      });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && $('#child').val() == '' && $('#adult').val() == '') {
      $('#box_com').removeClass('borderBlink')
      $('#num_customer').addClass('borderBlink')
      console.log(this.hash)

      $('html, body').animate({
        scrollTop: $('#num_customer').offset().top
      }, 300, function () {

        // $("#adult").focus()

        window.location.href = "#num_customer";
      });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && $('#child').val() != '' && $('#adult').val() != '') {
      $('#num_customer').removeClass('borderBlink')
      if (form.elements["time_num"].value == 0) {
        // $('#child').focusout();
        $('#box_time').addClass('borderBlink')
        // $('#time_num').focus()
      } else {
        $('#box_time').removeClass('borderBlink')
        // $('#child').focusout();
      }
    }
    // checformadd('box_com')

    modal.hide();
  }
  $.ajax({
    url: "shop/check_commission_plan?plan_id=" + name + "&box=1",
    dataType: 'json',
    type: 'post',
    success: function (chk) {
      console.log(chk);
      if (chk.result == true) {
        $('#box_bank').show();
        getSelectBankShop('load_select_bank');

      } else {
        $('#load_select_bank div').remove();
        $('#box_bank').hide();
      }
    }
  });


}

function getSelectBankShop(div) {
  console.log('get bank shop');
  var url = "component/box_select_bank_shop";
  $.post(url, function (ele) {
    $('#' + div).html(ele);
  });
}
// ons-tab[page="shop_history.html"]

function getPlanBox(id, plan_id) {
//	alert(plan_id);

  if (id == 2) {
    $('#box_cause').hide();
  } else {
    $('#box_cause').show();
  }

  var url = "shop/box_price_plan" + "?i_country=" + id + "&i_plan_pack=" + id + "&user_sc=1" + "&car_type=" + $('#car_type').val() + '&i_shop=' + $('#program').val();
  console.log(url);
  $.post(url, function (res) {
    $("#radio-nation-ck" + id).prop("checked", true);
    $('#box_price_replan').html(res);
    // console.log(data);
    // $('#radio-nationck' + id).prop('checked', true);
    $('#body_shop_checkin').animate({
      scrollTop: $('#box_cause').offset().top
    }, 500);
  });
}

function editBook(x) {
  console.log(x)

  $('#text_edit_persion').show();
  $('#btn_selectisedit').show();
  $('#num_edit_persion').show();
  $('#btn_isedit_pax').hide();
  $('#isedit').hide();
  $('#num_edit_persion').css('display', 'inline-block');
  $('#num_edit_persion').focus();

//		$('#text_edit_persion').show()
  $('#num_edit_child').show();
//	    $('#num_edit_child').focus();
  $('#num_final_edit_child').hide();
  $('#btn_isedit_child').hide();

  $('#btn_selectisedit_child').show();
//	    $('#num_edit_child').val($('#num_final_edit_child').text());


}

function saveeditBook(x) {
  //          var url_load= "go.php?name=booking/shop_history&file=saveeditBook&num="+$('#num_edit_persion').val()+"&id="+x;
  $('#btn_isedit_pax').show();
  $('#num_edit_child').hide();
  $('#num_final_edit_child').show();
  $('#btn_selectisedit_child').hide();
  $('#btn_isedit_child').show();

  var num_child = $('#num_edit_child').val();
  $('#num_final_edit_child').text(num_child);
  /*var url_load = "shop/editchild" + "?num=" + num_child + "&id=" + x;
   console.log(url_load)
   $.post(url_load, function(data) {
   console.log(data);
   });*/

  /*var url_load = "shop/editadult" + "?num=" + $('#num_edit_persion').val() + "&id=" + x;
   console.log(url_load)
   $.post(url_load, function(data) {
   //$('#load_mod_popup').html(data);
   console.log(data);
   });*/
  number_persion_new = $('#num_edit_persion').val()
  var url_load = "shop/editpax" + "?adult=" + number_persion_new + "&id=" + x + "&child=" + num_child;
  $.post(url_load, function (data) {
    console.log(data);
  });
  $('#text_edit_persion').hide()

  $('#num_final_edit').html(number_persion_new)
  console.log(x)
  $('#btn_selectisedit').hide()
  $('#num_edit_persion').hide()
  $('#btn_isedit').show()
  $('#isedit').show()

  if ($('#check_type_person').val() >= 1) {
    var unit_person = $('#val_person_unit').val();
    var total_new_price = parseInt(unit_person) * number_persion_new;
    var full_txt_person_total = "" + unit_person + "*" + number_persion_new + " = " + numberWithCommas(total_new_price.toFixed(2));
    //	console.log(""+unit_person+"*"+number_persion_new+" = "+numberWithCommas(total_new_price.toFixed(2)));
    $('#txt_person_total').text(full_txt_person_total);

    var park = $('#val_park_unit').val();
    var full_txt_all_total = parseInt(park) + parseInt(total_new_price);
    $('#txt_all_total').text(numberWithCommas(full_txt_all_total.toFixed(2)));


  }


  var pax_all = parseInt($('#num_edit_persion').val()) + parseInt($('#num_edit_child').val());
  $('#txt_mn_pax_' + x).text(pax_all);

  $('#txt_mn_adult_' + x).text(number_persion_new);
  $('#txt_mn_child_' + x).text(num_child);


  $('#pax_show_income').text($('#num_edit_persion').val());
  var price = parseInt($('#num_edit_persion').val()) * parseInt($('#each_price').val());
  $('#txt_all_total').text(numberWithCommas(price));
  sendSocket($('#id_order').val());
}

var cancelShop = function () {
  document
          .getElementById('shop_add-alert-dialog')
          .hide();
};
var submitShop = function () {
  // var nation = document.getElementById("form_booking");
  // console.log(nation.elements["nation"].value)
  if ($('#car_type').val() == 0) {
    ons.notification.alert({
      message: 'กรุณาเลือกประเภทรถ',
      title: "ข้อมูลไม่ครบ",
      buttonLabel: "ตกลง"
    })
            .then(function () {
              $('#car_type').focus();
              location.href = "#box_car";
            });
    return false;
  }
  if ($('#car_plate').val() == "") {
    ons.notification.alert({
      message: 'กรุณาระบุป้ายทะเบียนรถ',
      title: "ข้อมูลไม่ครบ",
      buttonLabel: "ตกลง"
    })
            .then(function () {
              $('#car_plate').focus();
              location.href = "#castomer_box";
            });
    return false;
  }
  var nation = document.getElementById("form_booking");
  console.log(nation.elements["nation"].value)
  // var nation = document.getElementsByName('nation').value;
  // console.log(nation)
  // console.log($("input[name='nation']").val())
  // console.log(document.querySelector('input[name=nation][checked]'))

  if (nation.elements["nation"].value == '') {

    ons.notification.alert({
      message: 'กรุณาเลือกสัญชาติ',
      title: "ข้อมูลไม่ครบ",
      buttonLabel: "ตกลง"
    })
            .then(function () {
              $("#nation_box").focus();
              location.href = "#nation_box";
            });
    // $('#time_num').focus();
    return false;
    // rate_value = document.getElementById('price_plan_1').value;

  }
  var price_plan = document.getElementById("form_booking");

  // console.log(price_plan)
  // var rate_value;
  if (price_plan.elements["price_plan"].value == 0) {
    ons.notification.alert({
      message: 'กรุณาเลือกค่าตอบแทน',
      title: "ข้อมูลไม่ครบ",
      buttonLabel: "ตกลง"
    })
            .then(function () {
              window.location.href = "#box_com";

              //$('#time_num').focus();
            });
    return false;
    // rate_value = document.getElementById('price_plan_1').value;

  }

  if ($('#adult').val() == "") {
    $('#adult').focus();
    ons.notification.alert({
      message: 'กรุณาระบุจำนวนผู้ใหญ่',
      title: "ข้อมูลไม่ครบ",
      buttonLabel: "ตกลง"
    })
            .then(function () {
              $('#adult').focus();
            });

    return false;
  }
  $('#adult').val(parseInt($('#adult').val()))
  console.log(parseInt($('#adult').val()))
  if (parseInt($('#adult').val()) <= 0) {

    ons.notification.alert({
      message: 'กรุณาระบุจำนวนผู้ใหญ่ต้องมากว่า 0',
      title: "ข้อมูลไม่ครบ",
      buttonLabel: "ตกลง"
    })
            .then(function () {
              $('#adult').focus();
            });

    return false;
  }
  if ($('#child').val() == "") {
    $('#child').focus();
    ons.notification.alert({
      message: 'กรุณาระบุจำนวนเด็ก่',
      title: "ข้อมูลไม่ครบ",
      buttonLabel: "ตกลง"
    })
            .then(function () {
              $('#child').focus();
              window.location.href = "#castomer_box";
            });

    return false;
  }
  $('#child').val(parseInt($('#child').val()))
  console.log(parseInt($('#child').val()))
  /*if ( parseInt($('#child').val()) <= 0) {
   
   ons.notification.alert({
   message: 'กรุณาระบุจำนวนเด็กต้องมากว่า 0',
   title: "ข้อมูลไม่ครบ",
   buttonLabel: "ปิด"
   })
   .then(function() {
   $('#child').focus();
   });
   
   return false;
   }*/
  var time_num = document.getElementById("form_booking");
  console.log(time_num.elements["time_num"].value)
  if (time_num.elements["time_num"].value == 0) {
    ons.notification.alert({
      message: 'กรุณาเลือกเวลาโดยประมาณ',
      title: "ข้อมูลไม่ครบ",
      buttonLabel: "ตกลง"
    })
            .then(function () {
              $('#time_num').focus();
              window.location.href = "#box_time";
            });
    return false;
    // rate_value = document.getElementById('price_plan_1').value;

  }
  if ($('#time_num').val() == '') {
    ons.notification.alert({
      message: 'กรุณาระบุเวลาถึงโดยประมาณ',
      title: "ข้อมูลไม่ครบ",
      buttonLabel: "ตกลง"
    })
            .then(function () {
              $('#time_num').focus();
            });
    return false;
  }
  var place_num = $('#car_plate').val();
  var dataForm = document.getElementById("form_booking");
  var plan_setting = dataForm.elements["plan_setting"].value;
  var price_plan = dataForm.elements["price_plan"].value;
  var shop_id = dataForm.elements["program"].value;
  var time_num = dataForm.elements["time_num"].value;
  var chk_time = time_num % 60;
  var x = time_num / 60;
  var chek_x;
  if (parseInt(time_num) < 60) {
    chek_x = '0' + '.' + parseInt(time_num);
  } else if (parseInt(time_num) == 60) {
    chek_x = 1 + '.' + '0';
  } else {
    if (chk_time == 0) {
      chek_x = x + '.' + '0';
    } else {
      chek_x = x;
    }
  }
  console.log(chek_x)
  console.log(time_num % 60)

  console.log(x.toString())
  var timeM;
  var y = chek_x.toString().split('.')
  if (y[1] == 5) {
    timeM = 3;
  } else {
    timeM = parseInt(y[1])
  }

  var timeH = parseInt(y[0])

  console.log('********')
  console.log(y)
  console.log(timeH)
  console.log(timeM)
  var d = new Date();
  var h = d.getHours();
  var m = d.getMinutes();
  console.log('****minute****')
  console.log(h)
  console.log(m)
  console.log(h + timeH)
  console.log(m + timeM)

  var ftimeH = h + timeH;
  var ftimeM = h + timeM;

  // modal.show();
  console.log(plan_setting)
  console.log(price_plan)
  console.log(price_plan)
  // var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];


  var weekdays = new Array(7);
  weekdays[0] = "Sun";
  weekdays[1] = "Mon";
  weekdays[2] = "Tue";
  weekdays[3] = "Wed";
  weekdays[4] = "Thu";
  weekdays[5] = "Fri";
  weekdays[6] = "Sat";


  var current_date = new Date();

  weekday_value = current_date.getDay();
//    console.log(weekdays[weekday_value])
  var url_chk_time = "shop/chk_time?shop_id=" + shop_id + "&day=" + weekdays[weekday_value];
  /*console.log(url_chk_time)*/
  $.ajax({
    url: url_chk_time,
    //data: param,
    type: 'post',
    success: function (res) {
//           console.log(res);
      var gtimeH = parseInt(res[0].finish_h);
      var gtimeM = parseInt(res[0].finish_m);
      /* console.log(gtimeH)
       console.log(gtimeM)
       console.log('---------------')
       console.log(ftimeH)
       console.log(ftimeM)*/
      if (parseInt(ftimeH) < parseInt(gtimeH)) {
        var dialog = document.getElementById('shop_add-alert-dialog');
        /* if (dialog) {
         dialog.show();
         } 
         else {
         ons.createElement('shop_add-dialog.html', {
         append: true
         })
         .then(function(dialog) {
         dialog.show();
         });
         }*/
        saveShop();
        // if (parseInt(ftimeH) > parseInt(gtimeH)) {
        //     ons.notification.alert({
        //         message: 'ท่านเลือกเวลาส่งแขกเกินเวลาทำการกรุณา เลือกเวลาใหม่',
        //         title: "เวลาทำการ "+$('#shop_topic_th').val()+ res[0].start_h+':'+res[0].start_m + '-'+res[0].finish_h+':'+res[0].finish_m,
        //         buttonLabel: "ปิด"
        //     })
        //     .then(function() {

        //     });
        //     return false;
        // }
        // else{
        //     var dialog = document.getElementById('shop_add-alert-dialog');
        //     if (dialog) {
        //         dialog.show();
        //     } else {
        //         ons.createElement('shop_add-dialog.html', {
        //             append: true
        //         })
        //         .then(function(dialog) {
        //             dialog.show();
        //         });
        //     }
        // }


      } else if (parseInt(ftimeH) == parseInt(gtimeH)) {
        if (parseInt(ftimeM) > parseInt(gtimeM)) {
          ons.notification.alert({
            message: 'ท่านเลือกเวลาส่งแขกเกินเวลาทำการกรุณา เลือกเวลาใหม่',
            title: "เวลาทำการ " + $('#shop_topic_th').val() + res[0].start_h + ':' + res[0].start_m + '-' + res[0].finish_h + ':' + res[0].finish_m,
            buttonLabel: "ตกลง"
          })
                  .then(function () {

                  });
          return false;
        } else {
          /*var dialog = document.getElementById('shop_add-alert-dialog');
           if (dialog) {
           dialog.show();
           } else {
           ons.createElement('shop_add-dialog.html', {
           append: true
           })
           .then(function(dialog) {
           dialog.show();
           });
           }*/
          saveShop();
        }
      } else {
        ons.notification.alert({
          message: 'ท่านเลือกเวลาส่งแขกเกินเวลาทำการกรุณา เลือกเวลาใหม่',
          title: "เวลาทำการ " + $('#shop_topic_th').val() + res[0].start_h + ':' + res[0].start_m + '-' + res[0].finish_h + ':' + res[0].finish_m,
          buttonLabel: "ตกลง"
        })
                .then(function () {

                });
        return false;
      }

    }
  });

};

function saveShop() {

// var weekDays = getWeekDays('en-US'); // Gives back { 'maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag', 'zaterdag', 'zondag'} which are the days of the week in Dutch.
  // console.log(weekDays)


  $('#shop_add-alert-dialog').hide();
  $('#txt_car_type').val($("#car_type option:selected").text());
  //          var url = "mod/shop/shop_new/save_data.php?action=add&type=driver&driver=<?=$user_id?>";
  var url = "shop/add_shop" + "?type=driver&driver=" + $.cookie("detect_user");

  // fn.pushPage({'id': 'shop_manage.html', 'title': 'ส่งแขก','key':'contract_us'}, 'lift-ios')
  // $('ons-tab[page="shop_manage.html"]').click();

  modal.show();
  // return false;
  $.ajax({
    type: 'POST',
    data: $('#form_booking').serialize(),
    dataType: 'json',
    url: url,
    beforeSend: function () {},
    success: function (response) {
      console.log(response);
      // return false;
      if (response.result == true) {
        /* var url2 = "shop/shop_pageadd";
         $.post(url2, function(ele2) {
         $('#shop_add').html(ele2);
         });*/
        setTimeout(function () {


          var url2 = "shop/shop_pageadd?shop_id=" + $('#program').val();
          $.post(url2, function (ele2) {
            $('#shop_add').html(ele2);
            performClick('tab_shop_mn');
            load_box_choose_car();
            modal.hide();
          });

          // $('ons-tab[page="shop_manage.html"]').click();
        }, 2000);
        // ons.notification.alert({
        //         message: 'ทำรายการสำเร็จแล้ว',
        //         title: "สำเร็จ",
        //         buttonLabel: "ปิด"
        //     })
        //     .then(function() {
        //         console.log('********************')
        //         // fn.pushPage({'id': 'shop_manage.html', 'title': 'ส่งแขก','key':'contract_us'}, 'lift-ios')


        //     });
        $.post('Send_onesignal/new_shop?order_id=' + response.last_id + '&vc=' + response.update.invoice + '&m=' + response.airout_m, {
          driver: $.cookie("detect_user"),
          //                    nickname: "<?=$arr[driver][nickname]?>",
          car_plate: $('#car_plate').val()
        }, function (data) {
//          console.log(data);
        });
        var url_mail = "../TShare_new/mail.php?key=new_shop&driver=" + $.cookie("detect_user");
        $.post(url_mail, $('#form_booking').serialize(), function (data) {
//                    console.log(data);

        });
        var txt_long_ac = response.update.invoice + " : " + "เพิ่มรายการส่งแขก " + $('#place_name_select').val();
        var ac = {
          i_type: 1,
          i_sub_type: 1,
          i_event: response.last_id,
          i_user: detect_user,
          s_topic: "งานส่งแขก",
          s_message: txt_long_ac,
          s_posted: username
        };

        var txt_long_nc = response.update.invoice + " : " + username + " เพิ่มรายการส่งแขก " + $('#place_name_select').val();
        var nc = {
          i_type: 1,
          i_event: response.last_id,
          i_user: 0,
          s_class_user: "lab",
          s_topic: "งานส่งแขก",
          s_sub_topic: "เพิ่มรายการ",
          s_message: txt_long_nc,
          s_posted: username,
          i_company: response.program
        };
        apiRecordActivityAndNotification(ac, nc);

        /*setTimeout(function() {
         openOrderFromAndroid(response.last_id);
         }, 1500);*/
      } else {
        ons.notification.alert({
          message: 'กรุณาตรวจสอบอีกครั้งหรือติดต่อเจ้าหน้าที่',
          title: "ทำรายการไม่สำเร็จ",
          buttonLabel: "ตกลง"
        })
                .then(function () {
                  modal.hide();
                });
      }

    },
    error: function (data) {
      console.log(data);
      ons.notification.alert({
        message: 'กรุณาตรวจสอบข้อมูลของท่าน',
        title: "ผิดพลาด",
        buttonLabel: "ตกลง"
      })
              .then(function () {});
    }
  });
}

function openDetailShop(key, type) {
//	console.log(key)
  var detailObj = array_data.manage[key];

  if (type != "ios") {
    fn.pushPage({
      'id': 'popup1.html',
      'title': detailObj.invoice
    }, 'fade-ios');
  }

  console.log(detailObj);
  var url = "shop/detail_shop" + "?user_id=" + detect_user;
  $.post(url, detailObj, function (data) {

    $('#body_popup1').html(data);

    var obj = detailObj;

    if (obj.check_driver_topoint == 1) {
      console.log("driver_topoint");
      changeHtml("driver_topoint", obj.id, timestampToDate(obj.driver_topoint_date, "time"));
    }
    if (obj.check_guest_receive == 1) {
      console.log("guest_receive");
      changeHtml("guest_receive", obj.id, timestampToDate(obj.guest_receive_date, "time"));
    }
    if (obj.check_guest_register == 1) {
      console.log("guest_register");
      changeHtml("guest_register", obj.id, timestampToDate(obj.guest_register_date, "time"));
    }
    if (obj.check_driver_pay_report == 1) {
      console.log("driver_pay_report");
      changeHtml("driver_pay_report", obj.id, timestampToDate(obj.driver_pay_report_date, "time"));
    }
    checkPhotoCheckIn('guest_register', obj.id);
    $('.page').animate({
      scrollTop: $(document).height() + 700
    }, 500);
    if (type == "ios") {
      modal.hide();
    }
  });
  $('#check_open_shop_id').val(detailObj.id);
}

function openDetailShopWaitTrans(invoice) {
  fn.pushPage({
    'id': 'popup1.html',
    'title': invoice
  }, 'slide-ios');

  var url = "shop/detail_shop_his";
  var param = {
    user_id: detect_user,
    invoice: invoice,
  };
//    console.log(param);
  $.ajax({
    url: url,
    dataType: 'json',
    data: param,
    type: 'post',
    success: function (res) {
//            console.log(res);
      var url = "page/shop_detail_his";
      $.post(url, res, function (ele) {
//                  console.log(ele);
        $('#body_popup1').html(ele);
        var obj = res;
        console.log(obj);
        if (obj.check_driver_topoint == 1) {
          console.log("driver_topoint");
          changeHtml("driver_topoint", obj.id, timestampToDate(obj.driver_topoint_date, "time"));
        }
        if (obj.check_guest_receive == 1) {
          console.log("guest_receive");
          changeHtml("guest_receive", obj.id, timestampToDate(obj.guest_receive_date, "time"));
        }
        if (obj.check_guest_register == 1) {
          console.log("guest_register");
          changeHtml("guest_register", obj.id, timestampToDate(obj.guest_register_date, "time"));
        }
        if (obj.check_driver_pay_report == 1) {
          console.log("driver_pay_report");
          changeHtml("driver_pay_report", obj.id, timestampToDate(obj.driver_pay_report_date, "time"));
        }
        /*checkPhotoCheckIn('driver_topoint', obj.id);
         checkPhotoCheckIn('guest_receive', obj.id);
         checkPhotoCheckIn('driver_pay_report', obj.id);*/
//checkPhotoCheckIn('guest_register', obj.id);
        $('#check_open_shop_id').val(obj.id);
      });
//          $('#body_popup1').html(res);
    }
  });
}

function openDetailBookinghistory(key, type, invoice) {
  console.log(invoice)
//	return;
  fn.pushPage({
    'id': 'popup1.html',
    'title': invoice
  }, 'slide-ios');

  var url = "shop/detail_shop_his";
  var param = {
    user_id: $.cookie("detect_user"),
    invoice: invoice,
  };
//    console.log(param);
  $.ajax({
    url: url,
    dataType: 'json',
    data: param,
    type: 'post',
    success: function (res) {
//            console.log(res);
      var url = "page/shop_detail_his";
      $.post(url, res, function (ele) {
//                  console.log(ele);
        $('#body_popup1').html(ele);
        var obj = res;
        console.log(obj);
        if (obj.check_driver_topoint == 1) {
          console.log("driver_topoint");
          changeHtml("driver_topoint", obj.id, timestampToDate(obj.driver_topoint_date, "time"));
        }
        if (obj.check_guest_receive == 1) {
          console.log("guest_receive");
          changeHtml("guest_receive", obj.id, timestampToDate(obj.guest_receive_date, "time"));
        }
        if (obj.check_guest_register == 1) {
          console.log("guest_register");
          changeHtml("guest_register", obj.id, timestampToDate(obj.guest_register_date, "time"));
        }
        if (obj.check_driver_pay_report == 1) {
          console.log("driver_pay_report");
          changeHtml("driver_pay_report", obj.id, timestampToDate(obj.driver_pay_report_date, "time"));
        }
        /*checkPhotoCheckIn('driver_topoint', obj.id);
         checkPhotoCheckIn('guest_receive', obj.id);
         checkPhotoCheckIn('guest_register', obj.id);
         checkPhotoCheckIn('driver_pay_report', obj.id);*/
        checkPhotoCheckIn('guest_register', obj.id);
        $('#check_open_shop_id').val(obj.id);
      });
//          $('#body_popup1').html(res);
    }
  });

}

function viewPhotoShop(id, action, time) {
  fn.pushPage({
    'id': 'popup2.html',
    'title': 'ภาพ'
  }, 'fade-md');
  var path = "../data/fileupload/store/" + action + "_" + id + ".jpg";
  var url_load = "page/view_photo?id=" + id + "&time=" + time + "&path=" + path;
  $.post(url_load, function (ele) {
    $('#body_popup2').html(ele);
  });
}

function openPointMaps(type, id) {
  console.log(id)
  console.log(type)
  var title = '';
  if (type == 'driver_topoint') {
    title = 'ตำแหน่งถึงสถานที่ส่งแขก'
  } else if (type == 'guest_register') {
    title = 'ตำแหน่งแขกลงทะเบียน'

  } else if (type == 'guest_receive') {
    title = 'ตำแหน่งพนักงานรับแขก'

  }
  // else if(type == 'driver_pay_report'){
  //     // title = 'ตำแหน่งแจ้งยอดรายได้'

  // }
  fn.pushPage({
    'id': 'popup2.html',
    'title': title
  }, 'fade-md');
  var url = "maps/map_shop_checkin";
  var param = {
    order_id: id,
    type: type,
  };
  console.log(param);
  $.ajax({
    url: url,
    data: param,
    type: 'post',
    success: function (res) {
      // console.log(res);
      $('#body_popup2').html(res);
      var elem = document.getElementById("body_popup2");
      elem.setAttribute("style", "width: 100%;background-color: rgb(221, 221, 221);position: fixed;top: 0px; bottom: 0px; overflow: scroll;z-index: 100")
      //              $('#body_popup2').css({'width: 100%',
      //  'background-color: rgb(221, 221, 221)',
      //  'position: fixed',
      //  'top: 0px',
      // ' bottom: 0px',
      // ' overflow: scroll',
      //  'z-index: 100'})
    }
  });

}

function checkPhotoCheckIn(type, id) {
  if ($('#' + type + '_check_click').val() == 1) {
    $('#' + type + '_locat_off').hide();
    $('#' + type + '_locat_on').show();

  } else {
    $('#' + type + '_locat_off').show();
    $('#' + type + '_locat_on').hide();
  }
  $.ajax({
    url: '../data/fileupload/store/' + type + '_' + id + '.jpg',
    type: 'HEAD',
    error: function () {
      console.log('Error file');
//      $('#photo_' + type + '_no').show();
      $('#photo_' + type + '_yes').hide();
    },
    success: function () {
      console.log('Success file');
//      $('#photo_' + type + '_no').hide();
      $('#photo_' + type + '_yes').show();
    }
  });
}

function cancelShopSelect(id, invoice, dv, program) {
  console.log('cancel ' + id)
//  fn.showDialog('cancel-shop-dialog');

  fn.pushPage({
    'id': 'cancel-shop.html',
    'title': 'ยกเลิกส่งแขก'
  }, 'fade-ios');


  setTimeout(function () {
    $('#order_id_cancel').val(id);
    $('#invoice_cancel_select').val(invoice);
    $('#driver_id_cancel').val(dv);
    $('#product_id').val(program);
  }, 700);
}

function submitCancel() {
  var order_id = $('#order_id_cancel').val();
  if (!$('input[name="type_cancel"]').is(':checked')) {
    ons.notification.alert({
      message: 'กรุณาเลือกสาเหตุที่ยกเลิก',
      title: "ข้อมูลไม่ครบ",
      buttonLabel: "ตกลง"
    })
            .then(function () {});
  }

  var url = "shop/cancel_shop";
  console.log(url + " ");

  $.post(url, $('#form_type_cancel').serialize(), function (data) {

    var obj = data;
    console.log("*********************************************............................");
    console.log(obj);
//    return;
    if (obj.result == true) {
      var invoice_cancel = $('#invoice_cancel_select').val();
      var order_id_calcel = $('#order_id_cancel').val();

      var dv = $('#driver_id_cancel').val();
      var txt_long_cancel_shop = invoice_cancel + " : " + "คุณทำการยกเลิกรายการส่งแขกนี้";
      var ac_1 = {
        i_type: 1,
        i_sub_type: 6,
        i_event: order_id_calcel,
        i_user: detect_user,
        s_topic: "งานส่งแขก",
        s_message: txt_long_cancel_shop,
        s_posted: username
      };

      var txt_long_nc_cancel_shop = invoice_cancel + " : พนักงานทำการยกเลิกรายการส่งแขก";
      var nc_to_taxi = {
        i_type: 1,
        i_event: order_id_calcel,
        i_user: dv,
        s_class_user: "taxi",
        s_topic: "งานส่งแขก",
        s_sub_topic: "ยกเลิก",
        s_message: txt_long_nc_cancel_shop,
        s_posted: username
      };
      apiRecordActivityAndNotification(ac_1, nc_to_taxi);
      var ac_2 = {};
      var nc_to_lab = {
        i_type: 1,
        i_event: order_id_calcel,
        i_user: detect_user, // กรณียกเว้นของ lab
        s_class_user: "lab",
        s_topic: "งานส่งแขก",
        s_sub_topic: "ยกเลิก",
        s_message: txt_long_nc_cancel_shop,
        s_posted: username,
        i_company: $('#product_id').val()
      };
      apiRecordActivityAndNotification(ac_2, nc_to_lab);


      callpop();
      modal.show();
      setTimeout(function () {

        sendSocket(order_id);
        resetFormCancel();
        shopManage();
        modal.hide();

        load_detail_his();

      }, 3200);

      $('#btn_cancel_book_' + order_id).hide();
//      $('#td_cancel_book_' + order_id).html('<div style="margin-top: 5px;"><b class="font-18"><font color="#ff0000">ยกเลิก<br></font></b></div>');
//      $('#txt_wait_' + order_id).html('<span class="font-17"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#ff9800;"></i>&nbsp;<font color="#ff9800">รอรับทราบ</font></span>');
//      $('#txt_wait_' + order_id).css('text-align','right');
      var url_messages = "send_onesignal/cancel_shop?order_id=" + order_id + "&class_user=" + class_user;
      $.post(url_messages, function (res) {
        console.log(res)
      });
    }

  });
}

function load_detail_his() {
  var check_open = $('#check_open_shop_id').val();
  if (check_open != 0) {
    var url = "shop/detail_shop_his";
    var param = {
      user_id: $.cookie("detect_user"),
      invoice: $('#order_invoice').val(),
    };
//    console.log(param);
    $.ajax({
      url: url,
      dataType: 'json',
      data: param,
      type: 'post',
      success: function (res) {
//            console.log(res);
        var url = "page/shop_detail_his";
        $.post(url, res, function (ele) {
//                  console.log(ele);
          $('#body_popup1').html(ele);
          var obj = res;
          console.log(obj);
          if (obj.check_driver_topoint == 1) {
            console.log("driver_topoint");
            changeHtml("driver_topoint", obj.id, timestampToDate(obj.driver_topoint_date, "time"));
          }
          if (obj.check_guest_receive == 1) {
            console.log("guest_receive");
            changeHtml("guest_receive", obj.id, timestampToDate(obj.guest_receive_date, "time"));
          }
          if (obj.check_guest_register == 1) {
            console.log("guest_register");
            changeHtml("guest_register", obj.id, timestampToDate(obj.guest_register_date, "time"));
          }
          if (obj.check_driver_pay_report == 1) {
            console.log("driver_pay_report");
            changeHtml("driver_pay_report", obj.id, timestampToDate(obj.driver_pay_report_date, "time"));
          }
          /*checkPhotoCheckIn('driver_topoint', obj.id);
           checkPhotoCheckIn('guest_receive', obj.id);
           checkPhotoCheckIn('guest_register', obj.id);
           checkPhotoCheckIn('driver_pay_report', obj.id);*/
          checkPhotoCheckIn('guest_register', obj.id);
          $('#check_open_shop_id').val(obj.id);
        });
//          $('#body_popup1').html(res);
      }
    });
  }
}

function resetFormCancel() {
  $('#invoice_cancel_select').val('');
  $('#driver_id_cancel').val('');
  $('#order_id_cancel').val('');
  $('#form_type_cancel').find('input[type="radio"]').prop('checked', false);
}

function openContact(shop_id) {
//  $.ajax({
//    url: "shop/count_phone_place?id=" + id,
//    type: "json",
//    success: function (c) {
//      console.log(c);
//      if (c <= 0) {
//        ons.notification.alert({message: 'ไม่มีเบอร์โทรสถานที่นี้', title: "ขออภัย", buttonLabel: "ปิด"});
//        return;
//      } else {
//        fn.pushPage({
//          'id': 'popup2.html',
//          'title': 'เบอร์โทร'
//        }, 'fade-md');
//        var url_load = "page/social?type=phone&shop_id=" + shop_id;
//        $.post(url_load, function (ele) {
//          console.log(ele);
//          $('#body_popup2').html(ele);
//        });
//      }
//    }});
  $.post("shop/count_phone_place?id=" + shop_id, function (num) {
    console.log(num);
    if (num <= 0) {
      ons.notification.alert({message: 'ไม่มีเบอร์โทรสถานที่นี้', title: "ขออภัย", buttonLabel: "ปิด"});
      return;
    } else {
      fn.pushPage({
        'id': 'popup2.html',
        'title': 'เบอร์โทร'
      }, 'fade-md');
      var url_load = "page/social?type=phone&shop_id=" + shop_id;
      $.post(url_load, function (ele) {
        console.log(ele);
        $('#body_popup2').html(ele);
      });
    }
  });
}

function openZello(shop_id) {
  $.post("shop/count_zello_place?id=" + shop_id, function (num) {
    console.log(num);
    if (num <= 0) {
      ons.notification.alert({message: 'ไม่มี Zello ของสถานที่นี้', title: "ขออภัย", buttonLabel: "ปิด"});
      return;
    } else {
      fn.pushPage({
        'id': 'popup2.html',
        'title': 'Zello'
      }, 'fade-md');
      var url_load = "page/social?type=zello&shop_id=" + shop_id;
      $.post(url_load, function (ele) {
        $('#body_popup2').html(ele);
      });
    }
  });

}

function openLine(shop_id) {
  fn.pushPage({
    'id': 'popup2.html',
    'title': 'Line'
  }, 'fade-md');
  var url_load = "page/social?type=line&shop_id=" + shop_id;
  $.post(url_load, function (ele) {
    $('#body_popup2').html(ele);
  });
}

function openShopMap(lat, lng, place_area, place_province, name) {
  $('#place_name').val(name);
  $('#place_lat').val(lat);
  $('#place_lng').val(lng);
  $('#place_area').val(place_area);
  $('#place_province').val(place_province);
  app_shop.showSelectTypeMapShop();
}

function openMapsDistance(shop_id) {


  fn.pushPage({
    'id': 'popup2.html',
    'title': ''
  }, 'fade-md');
  var url = "page/call_page?id=" + shop_id;
  $.post(url, {
    path: "map/map_place"
  }, function (ele) {
    //      console.log(ele)
    $('#body_popup2').html(ele);
  });
}

function openMapPlace() {

  var url_map_place = "https://maps.google.com/?q=" + $('#lat_product_place').val() + "," + $('#lng_product_place').val();
  window.open(url_map_place);
}

function openMapNav() {
  var lat = $('#lat').val();
  var lng = $('#lng').val();
  var place_area = $('#place_area').val();
  var place_province = $('#place_province').val();
  var place_lat = $('#lat_product_place').val();
  var place_lng = $('#lng_product_place').val();
  console.log(place_lat + "," + place_lng);

  var zoom = "17z";
  var name = $('#place_name').val();
//  var url_map_nav = "https://www.google.co.th/maps/dir/" + lat + "," + lng + "/" + res + "+" + place_province + "/@" + place_lat + "," + place_lng + "," + zoom;
  var url_map_nav = "https://www.google.co.th/maps/dir/" + lat + "," + lng + "/" + name;
  console.log(url_map_nav);
//  return;
  window.open(url_map_nav);
}

function openMapNotifyEdit() {

}

function contactDriver(call, type, shop_id, order_id) {
  if (type == "phone") {
    openContact(shop_id);
  } else if (type == "zello") {
    openZello(shop_id);
  } else if (type == "line") {
    openLine(shop_id);
  }
}
/******* <!-------- Change html CheckIn ------------> *******/

function changeHtml(type, id, st) {
//	new Date(unixtimestamp*1000);
  $('#status_' + type).html('<div class="font-16"><i class="fa fa-clock-o fa-spin 6x" style="color:#88B34D"></i><span>เวลา ' + st + '</span></div>');
  $('#iconchk_' + type).attr("src", "assets/images/yes.png");
  $("#number_" + type).removeClass('step-booking');
  $("#number_" + type).addClass('step-booking-active');

  $("#btn_" + type).css('background-color', '#666666');
  $('#pm_' + type).show();

  if (type == "driver_topoint") {
    if (class_user == "taxi") {
      $('#txt_btn_driver_topoint').text('ยืนยันถึงสถานที่');
    } else {
      $('#txt_btn_driver_topoint').text('คนขับแจ้งถึงสถานที่');
    }
    $('#btn_isedit_time').hide();
    $('#step_guest_receive').show();

  } else if (type == "guest_receive") {
    $('#step_guest_register').show();
    if (class_user == "taxi") {
      $('#txt_btn_guest_receive').text('พนักงานรับแขกแล้ว');
    } else {
      $('#txt_btn_guest_receive').text('ยืนยันรับแขก');
    }
    if (class_user == "taxi") {
      $.ajax({
        url: "shop/get_user_by_shop?id=" + id + "&type=guest_receive_ps",
        dataType: 'json',
        type: 'post',
        success: function (data) {
          console.log(data);
          var img = '../data/pic/driver/small/' + data.username + '.jpg';
          var name = data.nickname;
          $('#guest_receive_pf').attr("onclick", "modalShowImg('" + img + "','" + name + "');");
          $('#guest_receive_phone').attr("href", "tel:" + data.phone);
        }
      });
    }

  } else if (type == "guest_register") {
    $('#tr_show_pax_regis_' + id).show();
    loadNewPlan(id);
    chackPackCash(id);

//    var url_loadboxconfirmpay = "shop/check_taxi_select_type_pay?id=" + id;
//
//    $.ajax({
//      url: url_loadboxconfirmpay,
//      type: 'post',
//      dataType: 'json',
//      success: function (res) {
//        console.log(res);
//        if (res.res == true) {
//          check_plan_transfer(id);
//        }
//      }
//    });

    $('#btn_isedit_time').hide();
    if (class_user == "taxi") {
      $('#txt_btn_guest_register').text('ลงทะเบียนแล้ว');
    } else {
      $('#txt_btn_guest_register').text('ยืนยันลงทะเบียน');
    }
//    check_com_plan(id);

    if (class_user == "taxi") {
      $.ajax({
        url: "shop/get_user_by_shop?id=" + id + "&type=guest_register_ps",
        dataType: 'json',
        type: 'post',
        success: function (data) {
          console.log(data);
          var img = '../data/pic/driver/small/' + data.username + '.jpg';
          var name = data.nickname;
          $('#guest_register_pf').attr("onclick", "modalShowImg('" + img + "','" + name + "');");
          $('#guest_register_phone').attr("href", "tel:" + data.phone);
        }
      });
    }
    $.ajax({
      url: '../data/fileupload/store/' + type + '_' + id + '.jpg',
      type: 'HEAD',
      error: function () {
        console.log('Error file');
        $('#photo_guest_register_upload').show();
        $('#photo_' + type + '_yes').hide();
//        $('#photo_' + type + '_no').show();
      },
      success: function () {
        //file exists
        console.log('success file');

        $('#photo_' + type + '_yes').show();
//        $('#photo_' + type + '_no').hide();

      }
    });
  }

//$('#' + type + '_locat_off').hide();
//$('#' + type + '_locat_on').show();
  /*$.ajax({
   url: '../data/fileupload/store/' + type + '_' + id + '.jpg',
   type: 'HEAD',
   error: function() {
   console.log('Error file');
   
   $('#photo_' + type + '_yes').hide();
   $('#photo_' + type + '_no').show();
   },
   success: function() {
   //file exists
   console.log('success file');
   
   $('#photo_' + type + '_yes').show();
   $('#photo_' + type + '_no').hide();
   
   }
   });*/

  $('#' + type + '_check_click').val(1);
  $("#box_" + type).removeClass('border-alert');
}

/******* <!-------- End Change html CheckIn ------------> *******/

/******* <!-------- function CheckIn ------------> *******/
var url_send, type_send, id_send;

function cancelShop_action_pay() {
  $('#shop_add_action_pay').hide();
  // alert('aaaa')
  modal.hide();
}

function saveShop_action_pay(poppage) {

  modal.show();
  $.post(url_send, function (res) {
    console.log(res);

    if (res.result == true) {

      if (type_send == 'guest_register') {
        $('#num_pax_regis_' + id_send).text($('#num_cus').val());
        $('#num_edit_persion2').text($('#num_cus').val());
      }
      $('#' + type_send + '_check_click').val(1)

      sendSocket(id_send);
      changeHtml(type_send, id_send, timestampToDate(res.time, "time"));
      setTimeout(function () {
        shopManage();
      }, 1500);

      if (poppage == 1) {
        appNavigator.popPage();
      }
      var url_msg = "send_onesignal/send_checkin?type=" + type_send + "&id=" + id_send;
      $.ajax({
        url: url_msg,
        dataType: 'json',
        type: 'post',
        success: function (data) {
          console.log(data);
        }
      });
      // ons.notification.alert({
      //     message: 'ยืนยันแล้ว',
      //     title: "สำเร็จ",
      //     buttonLabel: "ตกลง"
      // })
      // .then(function() {
      //     callpop();
      // });
    } else {
    }
    modal.hide();
  });
}


function sendCheckIn(id, type, place_id, plan_setting) {
  console.log('*********************++++++**************')
  console.log(id)
  console.log(type)
  console.log(place_id)
  console.log($('#num_cus').val())
  console.log($('#plan_setting').val())

  type_send = type;
  id_send = id;
//   modal.show();

  var lng = $('#lng').val();
  var lat = $('#lat').val();
  if (type == 'guest_register') {
    if ($('#num_cus').val() == '') {
      ons.notification.alert({
        message: 'จำนวนแขกที่ลงทะเบียน',
        title: "กรุณาป้อน",
        buttonLabel: "ตกลง"
      })
      modal.hide();
      return false;
    } else {
//      alert(type);
      $.ajax({
        url: "shop/change_plan?order_id=" + id + "&lat=" + lat + "&lng=" + lng + '&num_cus=' + $('#num_cus').val() + '&plan_setting=' + plan_setting,
        data: $('#form_checkin').serialize(),
        type: 'post',
        dataType: 'json',
        success: function (res) {
          console.log('------------------------------------------')
          console.log(res);
//          return;
          if (res.checkin.result == true) {
            $('#btn_cancel_shop').hide();
            $('#num_pax_regis_' + id_send).text($('#num_cus').val());
            $('#num_edit_persion2').text($('#num_cus').val());
            $('#' + type_send + '_check_click').val(1)
            $('#btn_isedit_pax').hide();
            sendSocket(id_send);
            changeHtml(type_send, id_send, timestampToDate(res.checkin.time, "time"));
            setTimeout(function () {
              shopManage();
              $('.btn-eb2').hide();
            }, 1500);

            appNavigator.popPage();
            var url_msg = "send_onesignal/send_checkin?type=" + type_send + "&id=" + id_send;
            $.ajax({
              url: url_msg,
              dataType: 'json',
              type: 'post',
              success: function (data) {
                console.log(data);
              }
            });
            shopFuncNotiActi(id_send, type_send, place_id);
//            check_com_plan(id_send);
            finish_job_transfer_money(id);
          }
        }
      });

    }

  } else if (type == 'driver_pay_report') {

    $('#btn_isedit_time').hide();
    url_send = "shop/checkin?type=" + type + "&id=" + id + "&lat=" + lat + "&lng=" + lng;
    saveShop_action_pay(1);
  } else {

    url_send = "shop/checkin?type=" + type + "&id=" + id + "&lat=" + lat + "&lng=" + lng;
    saveShop_action_pay(0);
  }
  $('.page').animate({
    scrollTop: $(document).height() + 700
  }, 500);

}

function checkinAndOpenDetail(id, key) {

  $.post('main/get_timestamp', function (res) {
    sendCheckIn(id, 'driver_topoint', array_data.manage[key].program);
    array_data.manage[key].check_driver_topoint = 1;
    array_data.manage[key].driver_topoint = 1;
    array_data.manage[key].driver_topoint_date = res;
    array_data.manage[key].driver_topoint_lat = $('#lat').val();
    array_data.manage[key].driver_topoint_lng = $('#lng').val();
    openDetailShop(key, "");
    $('#btn_manage_' + id + ' span').text('ตรวจสอบ');
    $('#btn_manage_' + id).show();
    $('#btn_manage_topoint_' + id).hide();
  });

}

function shopFuncNotiActi(id, type, place_id) {
  if (type == 'driver_topoint') {
    var txt_long_ac = $('#txt_invoice_shop_detail').text() + " : " + "คุณทำการยืนยันถึงสถานที่ส่งแขก";
    var txt_long_nc = $('#txt_invoice_shop_detail').text() + " : " + username + " ถึงสถานที่ส่งแขกแล้ว " + $('#place_name_select').val();
  } else if (type == 'guest_receive') {
    var txt_long_ac = $('#txt_invoice_shop_detail').text() + " : " + "คุณทำการยืนยันรับแขกแล้ว";
    var txt_long_nc = $('#txt_invoice_shop_detail').text() + " : " + "พนักงานต้อนรับ รับแขกเรียบร้อยแล้ว";
  } else if (type == 'guest_register') {
    var txt_long_ac = $('#txt_invoice_shop_detail').text() + " : " + "คุณทำการยืนยันแขกลงทะเบียนแล้ว";
    var txt_long_nc = $('#txt_invoice_shop_detail').text() + " : " + "แขกทำการลงทะเบียนแล้ว";
  } else if (type == 'driver_pay_report') {
    var txt_long_ac = $('#txt_invoice_shop_detail').text() + " : " + "คุณทำการยืนยันแจ้งยอดคนขับ";
    var txt_long_nc = $('#txt_invoice_shop_detail').text() + " : " + "พนักงานได้ยืนยันการแจ้งยอดรายได้แล้ว";
  } else if (type == 'lab_pay_approve') {
    var txt_long_ac = $('#txt_invoice_shop_detail').text() + " : " + "คุณทำการยืนยันการจ่ายเงินคนขับ";
    var txt_long_nc = $('#txt_invoice_shop_detail').text() + " : " + "พนักงานได้ยืนยันการจ่ายเงินแล้ว กรุณายืนยันการรับเงิน";
  } else if (type == 'driver_pay_approve') {
    var txt_long_ac = $('#txt_invoice_shop_detail').text() + " : " + "คุณได้ยืนยันการรับเงินแล้ว";
    var txt_long_nc = $('#txt_invoice_shop_detail').text() + " : " + "แท็กซี่ทำการยืนยันการรับเงินแล้ว";
  }

  var ac = {
    i_type: 1,
    i_sub_type: 1,
    i_event: id,
    i_user: detect_user,
    s_topic: "งานส่งแขก",
    s_message: txt_long_ac,
    s_posted: username
  };

  var nc = {
    i_type: 1,
    i_event: id,
    i_user: $('#id_driver_order').val(),
    s_class_user: class_user,
    s_topic: "งานส่งแขก",
    s_sub_topic: "เช็คอิน",
    s_message: txt_long_nc,
    s_posted: username,
    i_company: place_id
  };

  apiRecordActivityAndNotification(ac, nc);
}

function readURLuploadImgRegister(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {

      $('#pv_register_upload').attr('src', e.target.result);
      $('#pv_register_upload').fadeIn(500);
      var url = "page/upload_img?type=checkin&action=guest_register&id=" + $('#order_id_for_register_upload').val();

      var data = new FormData($('#form_upload_pic_regis')[0]);
      data.append('fileUpload', $('#img_regis')[0].files[0]);
      $.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: 'post',
        success: function (php_script_response) {
          console.log(php_script_response);
          if (php_script_response.result == true) {
            $('#photo_guest_register_no').hide();
            $('#photo_guest_register_yes').show();

            $('#photo_guest_register_upload').show();
            $('#txt-img-has-checkin').show();
            $('#txt-img-nohas-checkin').hide();

            $('#pv_register_upload').attr('src', php_script_response.path + "?v=" + $.now());
//            $('#pv_' + type).attr('high-res-img', php_script_response.path+"?v="+$.now());
            $('#pv_register_upload').attr('data-high-res-src', php_script_response.path + "?v=" + $.now());
            $('#pv_register_upload').attr('onclick', ' photo_to_viewer(this)');
          }
        }
      });
    }
    reader.readAsDataURL(input.files[0]);
  }
}

function readURLcheckIn(input, type, subtype, id) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {

//      $('#pv_' + type).attr('src', e.target.result);
      $('#pv_' + type).fadeIn(500);
      var url = "page/upload_img?type=" + type + "&action=" + subtype + "&id=" + id;
      console.log(url);
      //              return;
      var data = new FormData($('#form_checkin')[0]);
      data.append('fileUpload', $('#img_checkin')[0].files[0]);
      $.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: 'post',
        success: function (php_script_response) {
          console.log(php_script_response);
          if (php_script_response.result == true) {
            $('#txt-img-nohas-checkin').hide();
            $('#txt-img-has-checkin').show();
            $('#pv_' + type).attr('src', php_script_response.path + "?v=" + $.now());
//            $('#pv_' + type).attr('high-res-img', php_script_response.path+"?v="+$.now());
            $('#pv_' + type).attr('data-high-res-src', php_script_response.path + "?v=" + $.now());
            $('#pv_' + type).attr('onclick', ' photo_to_viewer(this)');
          }
        }
      });
    }
    reader.readAsDataURL(input.files[0]);
  }
}

function btn_driver_topoint(id) {
  if ($('#driver_topoint_check_click').val() == 1) {
    return;
  }

  if (class_user == 'lab') {
    sendCheckIn(id, 'driver_topoint');
    $('#btn-topoint-lab').hide();
    return;
  }

  sendCheckIn(id, 'driver_topoint');
  /* fn.pushPage({
   'id': 'popup_shop_checkin.html',
   'title': "ถึงสถานที่ส่งแขก"
   }, 'fade-ios');
   var url = "page/call_page?type=driver_topoint&id=" + id;
   console.log(url);
   $.post(url, {
   path: "shop/checkin_action"
   }, function(ele) {
   $('#body_shop_checkin').html(ele);
   });*/
  //    $('#type_checkin').val('topoint');
}

function btn_guest_receive(id) {
  if ($('#guest_receive_check_click').val() == 1) {

    return;
  }
  if (class_user == "taxi") {
    /*ons.notification.alert({
     message: 'พนักงานรับแขกเป็นคนยืนยันเท่านั้น',
     title: "ไม่สามารถยืนยันได้",
     buttonLabel: "ปิด"
     })
     .then(function() {});*/
    return;
  }
  sendCheckIn(id, 'guest_receive', $('#place_product_id').val());
//  $('#btn_cancel_shop').show();
  /*fn.pushPage({
   'id': 'popup_shop_checkin.html',
   'title': "พนักงานรับแขก"
   }, 'fade-ios');
   var url = "page/call_page?type=guest_receive&id=" + id;
   console.log(url);
   $.post(url, {
   path: "shop/checkin_action"
   }, function(ele) {
   $('#body_shop_checkin').html(ele);
   });*/
  //    $('#type_checkin').val('topoint');
  //    alert($('#type_checkin').val());
}

function btn_guest_register(id) {
  if ($('#guest_register_check_click').val() == 1) {
    return;
  }
  if (class_user == "taxi") {
    /*ons.notification.alert({
     message: 'พนักงานรับแขกเป็นคนยืนยันเท่านั้น',
     title: "ไม่สามารถยืนยันได้",
     buttonLabel: "ปิด"
     })
     .then(function() {});*/
    return;
  }
  fn.pushPage({
    'id': 'popup_shop_checkin.html',
    'title': "แขกลงทะเบียน"
  }, 'fade-ios');
  var url = "page/call_page?type=guest_register&id=" + id;
  console.log(url);
  $.post(url, {
    path: "shop/checkin_guest_register"
  }, function (ele) {
    $('#body_shop_checkin').html(ele);
  });
  //    $('#type_checkin').val('topoint');
  //    alert($('#type_checkin').val());
}

function btn_driver_pay_report(id) {
  if ($('#driver_pay_report_check_click').val() == 1) {
    return;
  }
  if (class_user == "taxi") {
    /*ons.notification.alert({
     message: 'พนักงานรับแขกเป็นคนยืนยันเท่านั้น',
     title: "ไม่สามารถยืนยันได้",
     buttonLabel: "ปิด"
     })
     .then(function() {});*/
    return;
  }
  fn.pushPage({
    'id': 'popup_shop_checkin.html',
    'title': "แจ้งยอดรายได้แล้ว"
  }, 'fade-ios');
  var url = "page/call_page?type=driver_pay_report&id=" + id;
  console.log(url);
  $.post(url, {
    path: "shop/checkin_action"
  }, function (ele) {
    $('#body_shop_checkin').html(ele);
  });
  //    $('#type_checkin').val('topoint');
  //    alert($('#type_checkin').val());
}

/******* <!-------- function run page ------------> *******/

function shopManage() {

  var obj = array_data;

  var url = "page/shop_manage";
  array_ma = obj.manage;

  var pass = {
    data: array_ma
  };
  console.log(pass);
  $.ajax({
    url: url,
    data: pass,
    type: 'post',
    success: function (ele) {

      $('#shop_manage').html(ele);
    }
  });
}

function shopManageWithData(obj) {

  var pass = {
    data: obj
  };
  console.log(pass);
  var url = "component/list_shop_manage?wait_trans=1";
  $.ajax({
    url: url,
    data: pass,
    type: 'post',
    success: function (ele) {
      console.log(obj.id);
      $('#list_shop_manage_' + obj.id).html(ele);
    }
  });
}

function waitTransShop() {
  $('#shop_wait').html(progress_circle);
  var date = $('#date_shop_wait').val();
  countWaitTransShop();
  if (class_user == "taxi") {
    var url_his = 'api/shop_wait_trans_shop?driver_id=' + detect_user + '&date=' + date;
  } else {
    var url_his = 'api/shop_wait_trans_shop?date=' + date;
  }
  console.log(url_his);
  $.post(url_his, function (res) {
//    console.log(res);
    var pass = {
      data: res.data
    };
    console.log(pass);
    var url = "page/shop_manage?wait_trans=1";
    $.ajax({
      url: url,
      data: pass,
      type: 'post',
      success: function (ele) {
//			    			console.log(ele);
        $('#shop_wait').html(ele);
      }
    });

  });
}

var array_ma = [];
var array_his = [];
var date = moment().format('YYYY-MM-DD');

/******* <!-------- end run page ------------> *******/

function timestampToDate(unix_timestamp, type) {
  var date = new Date(unix_timestamp * 1000);
  var day = date.getDate();
  var month = date.getMonth() + 1;
  if (month <= 10) {
    month = "0" + month;
  }
  if (day <= 10) {
    day = "0" + day
  }
  var year = date.getFullYear();
  var txt_date = year + "-" + month + "-" + day;

  var hours = date.getHours();
  var minutes = "0" + date.getMinutes();
  var seconds = "0" + date.getSeconds();
  var formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
  //return formattedTime;
  if (type == "date") {
    return txt_date;
  } else if (type == "time") {
    return hours + ':' + minutes.substr(-2) + ' น.';
  } else {
    return txt_date + " " + formattedTime;
  }

}

/******* <!-------- function Income ------------> *******/
function openViewPrice(id) {
  fn.pushPage({
    'id': 'popup_shop_checkin.html',
    'title': "รายได้"
  }, 'lift-ios');
//  reloadIncomeShop(id);
}

//function reloadIncomeShop(id) {
//  var url = "page/call_page?&id=" + id;
//  console.log(url);
//  if (class_user == "taxi") {
//    var path = "shop/income_driver_taxi";
//  } else {
//    var path = "shop/income_driver_lab";
//  }
//
//  $.post(url, {
//    path: path
//  }, function (ele) {
//    $('#body_shop_checkin').html(ele);
//  });
//}

function ex_booking() {
  var url = "shop/shop_history";
  console.log(moment().format('YYYY-MM-DD'))
  console.log($.cookie("detect_userclass"))
  var pass = {
    date: $('#ex_booking').val(),
    driver: $.cookie("detect_user"),
    type: 'his'
  };
  console.log(pass);
  $.ajax({
    url: url,
    data: pass,
    type: 'post',
    success: function (res) {
      console.log(res);
      $('#shop_history').html(res);
    }
  });
  console.log($('#ex_booking').val())
  // dateInput.addEventListener('change', function(e) {
  //   console.log(e.target.value);
  // }); 
}

function editTimeToPlace(id) {
  var dialog = document.getElementById('change-time-dialog');

  if (dialog) {
    dialog.show();
    $('#order_id_change_time').val(id);
  } else {
    ons.createElement('change-time.html', {append: true})
            .then(function (dialog) {
              dialog.show();
              $('#order_id_change_time').val(id);
            });
  }
}

function submitChangeTimeToPlace() {
  var time = $('#time_num_change_time').val();
  var id = $('#order_id_change_time').val();
  var pass = {order_id: id, time: time};

  console.log(pass);
//  return;

  $.ajax({
    url: "shop/update_time_toplace",
    data: pass,
    type: 'post',
    dataType: 'json',
    success: function (res) {
      console.log(res);
      if (res.result == true) {
        shopManage();
        $('#txt_time_change_now').text($('#show_to_time').text());
        $('#txt_time_change_now').css('color', '#f00');

        document.getElementById('change-time-dialog').hide();
        $('#time_num_change_time').val(0);
        $('#txt_show_to_time').hide();
        setTimeout(function () {
          $('#time_toplace_' + $('#order_id_change_time').val()).text('ถึงประมาณ ' + $('#show_to_time').text() + ' น.');
        }, 3000);

      }

    }
  });

}

function calTime(val) {
  var m = val;
  if (m == "" || m <= 0) {
    $('#txt_show_to_time').fadeOut(500);
    return;
  }
  var d = new Date();
  var cur_m = d.getMinutes();
  var dd = new Date();
  var last = parseInt(cur_m) + parseInt(m);
  dd.setMinutes(last);
  console.log(dd);
  $('#show_to_time').text(formatTime(dd));
  $('#txt_show_to_time').fadeIn(500);
}

function approveBook(id, invoice, driver_id) {

//  var txt_long_ac = invoice + " : " + "คุณได้ยืนยันรายการส่งแขกแล้ว";
//  var ac = {
//    i_type: 1,
//    i_sub_type: 4,
//    i_event: id,
//    i_user: detect_user,
//    s_topic: "งานส่งแขก",
//    s_message: txt_long_ac,
//    s_posted: username
//  };
//
//  var txt_long_nc = invoice + " : " + "พนักงานยืนยันงานส่งแขกของคุณแล้ว";
//  var nc = {
//    i_type: 1,
//    i_event: id,
//    i_user: driver_id,
//    s_class_user: "taxi",
//    s_topic: "งานส่งแขก",
//    s_sub_topic: "ยืนยันงาน",
//    s_message: txt_long_nc,
//    s_posted: username
//  };
//
//  apiRecordActivityAndNotification(ac, nc);
//  return false;

  $('#apporve_book_' + id).prop('disabled', true);
//return;
  var pass = {
    id: id,
    vc: invoice,
    posted: $.cookie("detect_user")
  };
  console.log(pass);
  var url = "shop/lab_acknowledge";
  $.ajax({
    url: url,
    data: pass,
    type: 'post',
    dataType: 'json',
    success: function (res) {
//        console.log(res);
//        if(res.result==true)
      $.ajax({
        url: "send_onesignal/acknowledge?order_id=" + id + "&driver=" + driver_id + "&vc=" + invoice,
        data: pass,
        type: 'post',
        dataType: 'json',
        success: function (res) {
//               console.log(res);
          sendSocket(id);
          var txt_long_ac = invoice + " : " + "คุณได้ยืนยันรายการส่งแขกแล้ว";
          var ac = {
            i_type: 1,
            i_sub_type: 4,
            i_event: id,
            i_user: detect_user,
            s_topic: "งานส่งแขก",
            s_message: txt_long_ac,
            s_posted: username
          };

          var txt_long_nc = invoice + " : " + "พนักงานยืนยันงานส่งแขกของคุณแล้ว";
          var nc = {
            i_type: 1,
            i_event: id,
            i_user: driver_id,
            s_class_user: "taxi",
            s_topic: "งานส่งแขก",
            s_sub_topic: "ยืนยันงาน",
            s_message: txt_long_nc,
            s_posted: username
          };

          apiRecordActivityAndNotification(ac, nc);
          $('#apporve_book_' + id).hide();
          $('#opendetail_book_' + id).show();


          $.ajax({
            url: "main/get_timestamp",
            type: 'post',
            success: function (ele) {
              $('#date_approved_job_' + id).show();
              $('#txt_date_approved_job_' + id).text(timestampToDate(ele, 'time'));
            }
          });
        }
      });
    }
  });
}

function historyShop() {
  countHistoryTypeAll();
  if ($('#cehck_filter_date').val() == 1) {
    var date = $('#date_shop_his').val();
    var date_rp = date.replace("-", "/");
    date_rp = date_rp.replace("-", "/");
  } else {
    var date_rp = "";
  }
  var type_status = $('#check_filter_his').val();

  var url_his = "api/shop_history_fix";
  var data = {
    date: date_rp,
    driver: detect_user,
    status: type_status,
    class_name: class_user
  };

//  if (class_user == "taxi") {
//    var url_his = 'api/shop_history_driver';
//    //          var driver = detect_user;
//    var data = {
//      date: date_rp,
//      driver: detect_user,
//      status: type_status
//    };
//  } 
//  else {
//    var url_his = 'api/shop_history_lab';
//    var data = {
//      date: date_rp,
//      status: type_status
//    };
//  }

  console.log(data);
  var first_run_his = $('#first_run_his').val();
  $('#shop_history').html(progress_circle);
  $.post(url_his, data, function (res) {
    var res = JSON.parse(res);
    console.log(res);

    var url = "shop/shop_history";
    $.post(url, {data: res.data}, function (html) {
      $('#shop_history').html(html);
    });

  });

}

function countHistoryTypeAll() {
  var date_rp = "";
  if ($('#cehck_filter_date').val() == 1) {
    var date = $('#date_shop_his').val();
    var date_rp = date.replace("-", "/");
    date_rp = date_rp.replace("-", "/");
  }
  var param = {
    class_name: class_user,
    driver: detect_user,
    date: date_rp
  };
  $.ajax({
    url: "shop/count_his_all_status",
    data: param,
    dataType: 'json',
    type: 'post',
    success: function (value) {
      console.log(value);
      $('#num_his_com').text("(" + value.success + ")");
      $('#num_his_cancel').text("(" + value.fail + ")");
      $('#num_his_all').text("(" + value.all + ")");
    }
  });
}

function maxLengthCheck(object) {
  if (object.value.length > 3)
    object.value = object.value.slice(0, 3)
}

function area_remark() {
  $('#remark').focus();
}

function changePlan(id) {
//	if($('#check_change_plan').val()==0){
  $('.replan').fadeIn(500);
  $('#radio-nation-ck' + id).prop('checked', true);
  $('#nation_' + id).prop('checked', true);
  // getPlanBox($('#sci_id').val(), $('#plane_id_replan').val());
  $('#check_change_plan').val(1);
  $('#btn_change_plan').fadeOut(500);

//		$('#txt_btn_change_plan').text('ยกเลิกเปลี่ยนค่าตอบแทน');
//		$('#btn_change_plan').css('background-color', '#9e9e9e');
  /*}else{
   
   $('.replan').fadeOut(500);
   $('#check_change_plan').val(0);
   $('#txt_btn_change_plan').text('เปลี่ยนค่าตอบแทน');
   $('#btn_change_plan').css('background-color', '#0076ff');
   }*/

}

function userApproveCancel(id, invoice) {
  $('#taxi_apporve_cancel_' + id).attr('disabled', true);
  console.log(id + " || " + invoice);
//  return;
  $.ajax({
    url: "shop/taxi_approved_cancel?order_id=" + id,
    type: 'post',
    dataType: 'json',
    success: function (res) {
      console.log(res);
      shopManage();
      sendSocket(id);
      $('#list_shop_manage_' + id).remove();
//      ons.notification.alert({message: 'งานนี้ถูกยกเลิกแล้ว', title: "ยกเลิกงาน", buttonLabel: "ปิด"});

//       var txt_long_ac = invoice+" : "+"คุณได้ยืนยันรับทราบรายการนี้ที่ถูกปฏิเสธ";
//       var ac = {
//       i_type : 1,
//       i_sub_type : 4,
//       i_event : id,
//       i_user : detect_user,
//       s_topic : "งานส่งแขก",
//       s_message : txt_long_ac,
//       s_posted : username
//       };
//       
//       var txt_long_nc = invoice+" : "+"พนักงานยืนยันงานส่งแขกของคุณแล้ว";
//       var nc = {
//       i_type : 1,
//       i_event : id,
//       i_user : driver_id,
//       s_class_user : "lab",
//       s_topic : "งานส่งแขก",
//       s_sub_topic : "ยกเลิกงาน",
//       s_message : txt_long_nc,
//       s_posted :  username
//       };				
//       apiRecordActivityAndNotification(ac, nc);
    }
  });
}

function filterHistoryStatus(type, id) {
  console.log(type);
  $('#check_filter_his').val(type);
  $('.shop-his-btn').removeClass('his-shop-active');
  $('#' + id).addClass('his-shop-active');
  historyShop($('#date_shop_his').val());
}

function selectPlanRegis(id) {
  if (id == 4) {
    $('#box_cause').fadeOut(500);
  } else {
    $('#box_cause').fadeIn(500);
  }
}

function loadNewPlan(id) {
  /*$.ajax({
   url: "shop/check_row_change_plan?order_id="+id,
   type: 'post',
   dataType: 'json',
   success: function(res) {
   console.log(res);*/
  /*if(res>0){
   var url_new_plan = "component/new_plan?id="+id;
   $.post(url_new_plan,function(html){
   $('#load_new_plan').html(html);
   });
   }*/
  var url_new_plan = "component/new_plan?id=" + id;
  $.post(url_new_plan, function (html) {
    $('#load_new_plan').html(html);
  });
  /* }
   });*/

}

function loadBoxConfirmPay(id) {
  var url_new_plan = "component/box_confirm_pay?id=" + id;
  $.post(url_new_plan, function (html) {
    $('#step_confirm_pay').html(html);
  });
}

function loadBoxChooseGetMoney(id) {
  var url = "component/box_choose_get_money?id=" + id;
  $.post(url, function (html) {
    $('#step_choose_get_money').html(html);
  });
}

function confirmGetIncome(id, invoice, driver) {
//  sendSocket(id);
//  return;
  $.ajax({
    url: "shop/driver_approved_pay?order_id=" + id,
    type: 'post',
    dataType: 'json',
    success: function (res) {
      console.log(res);
      if (res.result == true) {
        $('#btn_confirm_get_' + id).hide();
        $('#status_get_' + id).show();
//                   		$('#text_get_box_'+id).show();
        $('#text_confirm_date_' + id).text(timestampToDate(res.driver_pay_report_date, "time"));
        $('#iconchk_confirm_pay_com').attr("src", "assets/images/yes.png");
        $("#number_driver_pay_com").removeClass('step-booking');
        $("#number_driver_pay_com").addClass('step-booking-active');
        sendSocket(id);

        completedJobShop(id);
        countWaitTransShop();
        shopFuncNotiActi(id, "driver_pay_approve");
        $.ajax({
          url: "send_onesignal/send_msg_pay_shop?order_id=" + id + "&type=driver_pay_approved&vc=" + invoice + '&driver=' + driver,
          type: 'post',
          dataType: 'json',
          success: function (res) {
            console.log(res);
//            sendSocket(id);
          }
        });

        test_load_list(id);

      }
    }
  });
}

function confirmPayIncome(id, invoice, driver) {

  var data = {
    order_id: id
  }
  $.ajax({
    url: "shop/lab_approved_pay",
    type: 'post',
    data: data,
    dataType: 'json',
    success: function (res) {
      console.log(res);
      if (res.result == true) {
        $('#confirm_lab_pay_' + id).hide();
        $('#status_pay_' + id).show();
        $('#txt_status_getpay_' + id).show();
        $('#text_lab_pay_time_' + id).text(timestampToDate(res.driver_payment_date, "time"));

        $('#iconchk_confirm_pay_com').attr("src", "assets/images/yes.png");
        $("#number_driver_pay_com").removeClass('step-booking');
        $("#number_driver_pay_com").addClass('step-booking-active');

        sendSocket(id);
        shopFuncNotiActi(id, "lab_pay_approve");
        $.ajax({
          url: "send_onesignal/send_msg_pay_shop?order_id=" + id + "&type=lab_pay_approved&vc=" + invoice + '&driver=' + driver,
          type: 'post',
          dataType: 'json',
          success: function (res) {
            console.log(res);
          }
        });
      }
    }
  });
}

function completedJobShop(id) {

  var url_complete = "shop/complete_job?id=" + id;
  $.ajax({
    url: url_complete,
    dataType: 'json',
    type: 'post',
    success: function (data) {
      console.log(data)
      if (data.checkin.result == true) {
        ons.notification.alert({
          message: 'ยืนยันการรับเงินสดแล้ว ',
          title: "สำเร็จ",
          buttonLabel: "ปิด"
        })
                .then(function () {
//                  reloadIncomeShop(id);
                  callpop();
                });
      } else {
        ons.notification.alert({
          message: 'เกิดข้อผิดพลาดในการยืนยัน กรุณาลองใหม่อีกครั้ง',
          title: "ไม่สำเร็จ",
          buttonLabel: "ปิด"
        })
                .then(function () {
//                  reloadIncomeShop(id);
                  callpop();
                });
      }
    }
  });

}

function confirmGetTransCom(order_id, invoice) {
//  $('#get_trans_com_'+order_id).prop('disabled', false);
  $('#get_trans_com_' + order_id).attr('disabled', 'disabled');
  var url_complete = "shop/get_trans_com?id=" + order_id + "&lat=" + $('#lat').val() + "&lng=" + $('#lng').val();
  console.log(url_complete);
//  return;
  $.ajax({
    url: url_complete,
    dataType: 'json',
    type: 'post',
    success: function (data) {
      console.log(data)
      if (data.pay_his.order.result == true) {
        ons.notification.alert({
          message: 'ยืนยันรัยเงินค่าคอมมิชชั่นแล้ว งานของคุณเสร็จสมบรูณ์',
          title: "สำเร็จ",
          buttonLabel: "ปิด"
        })
                .then(function () {
                  waitTransShop();
                  callpop();
                });
        var txt_long_ac = invoice + " : " + "คุณทำการยืนยันรับเงินโอน ";
        var ac = {
          i_type: 1,
          i_sub_type: 1,
          i_event: order_id,
          i_user: detect_user,
          s_topic: "งานส่งแขก",
          s_message: txt_long_ac,
          s_posted: username
        };

//        var txt_long_nc = response.update.invoice + " : " + username + " เพิ่มรายการส่งแขก " + $('#place_name_select').val();
//        var nc = {
//          i_type: 1,
//          i_event: response.last_id,
//          i_user: 0,
//          s_class_user: "lab",
//          s_topic: "งานส่งแขก",
//          s_sub_topic: "เช็คอิน",
//          s_message: txt_long_nc,
//          s_posted: username
//        };
        var nc = {};
        apiRecordActivityAndNotification(ac, nc);
      } else {

      }
    }
  });

}

function showFilterdate() {
  $('#btn_toshow_date').hide();
  $('#box-shop_date').fadeIn(500);
  $('#cehck_filter_date').val(1);
  historyShop();
}

function hideFilterdate() {
  $('#box-shop_date').hide();
  $('#btn_toshow_date').show();
  $('#cehck_filter_date').val(0);
  historyShop();
}

function load_component_list_manage(value) {
  var pass = {
    data: value
  };
  console.log(pass);
  var url = "component/list_shop_manage";
  $.ajax({
    url: url,
    data: pass,
    type: 'post',
    success: function (ele) {
      $('#list_shop_manage_' + value.id).html(ele);
    }
  });
}

function test_load_list(id) {
  var orderid = {
    id: id
  };
  $.ajax({
    url: "shop/get_data_shop",
    data: orderid,
    dataType: 'json',
    type: 'post',
    success: function (value) {
      console.log(value);
      load_component_list_manage(value);
    }
  });
}

function _confirmSelectBankAfterChangePlan(id) {

  $.ajax({
    url: "shop/select_bank_after_change_plan?id=" + id,
    data: $('#select_bank_form').serialize(),
    dataType: 'json',
    type: 'post',
    success: function (value) {
      console.log(value);
      load_status_trans($('#id_order').val());
      sendSocket(id);
    }
  });
}
function selectprovince(id) {
  // alert(id)
  id_province = id;
  var name = $('#item_province_' + id).data('name');
  // console.log(name + " " + id);

  // $('#car_type').val(id);
  get_shop_all_company('PROVINCE');

  $('#txt_province').text(name);
  callpop();

  // focusBoxCar2();
}
function selectcategory(id) {
  $('#txt_shoptype').text('เลือก');
  id_category = id;
  var name = $('#item_category_' + id).data('name');
  get_shop_all_company('CATE');

  // console.log(name + " " + id);

  // $('#car_type').val(id);
  $('#txt_shopcategory').text(name);
  callpop();
  // focusBoxCar2();
}
function selecttype(id) {
  modal.show()
  id_cate_type = id;
  var name = $('#item_type_' + id).data('name');
  // console.log(name + " " + id);

  // $('#car_type').val(id);
  $('#txt_shoptype').text(name);
  callpop();
  get_shop_all_company('TYPE');
  // focusBoxCar2();
}
function get_shop_all_company(opt) {
  console.log(opt)
  console.log(id_province)
  if (opt == 'ALL') {
    var url = "shop/get_shop_all_company?opt=" + opt + "&pv=" + $('#place_province').val();

  } else if (opt == 'PROVINCE') {
    var url = "shop/get_shop_all_company?opt=" + opt + "&pv=" + id_province;

  } else if (opt == 'TYPE') {
    var url = "shop/get_shop_all_company?opt=" + opt + "&main=" + id_category + "&sub=" + id_cate_type + "&pv=" + id_province;
  } else if (opt == 'CATE') {
    var url = "shop/get_shop_all_company?opt=" + opt + "&main=" + id_category + "&pv=" + id_province;

  }
  $('#shop_all_company').html(progress_circle);
  $.post(url, function (res) {
    // console.log(res)
    // setTimeout(function () {

    $('#shop_all_company').html(res);
    modal.hide()
    // get_shop_all_company('ALL')
    // }, 1000);

  });
}

function searchTopiccompany(txt_ip) {
  console.log(txt_ip);
  var url = "shop/search_shop_all_company?pv=" + id_province + "&search=" + txt_ip;
  console.log(url)
  $.ajax({
    url: url,
    // data: pass,
    type: 'post',
    success: function (ele) {
      $('#shop_all_company').html(ele);
    }
  });
// $.ajax({
//           url: url,
//           // data: $('#select_bank_form').serialize(),
//           // dataType: 'json',
//           type: 'post',
//           success: function (value) {
//             console.log(value);
//             load_status_trans($('#id_order').val());
//           }
//         });


  // var serch = $(this).attr('data-search');

//    for (var i = 0; i < str.length; i++) {
//   alert(str.charAt(i));
// }
  // $('.txt_topic_company').each(function() {
  // var txt_name = $(this).attr('data-search');//$(this).text();
  // console.log(txt_name)
  // var row_id = $(this).attr('data-role');
  // console.log('-------------------')
  // console.log(row_id)

  // if (txt_name.toUpperCase().indexOf(txt_ip.toUpperCase()) > -1) {
  //      $('.shop_company_box_'+row_id).show();
  //          console.log(txt_name+" || "+txt_ip);
  //    } else {
  //      $('.shop_company_box_'+row_id).hide();
  //    }
  // });
}

function shop_filter_pv() {
  fn.pushPage({'id': 'shopcategory.html', 'title': 'จังหวัด', 'open': 'province'}, 'lift-ios');
}

function shop_filter_main() {
  fn.pushPage({'id': 'shopcategory.html', 'title': 'หมวดหมู่', 'open': 'shopcategory'}, 'lift-ios');
}

function shop_filter_sub() {
  fn.pushPage({'id': 'shopcategory.html', 'title': 'ประเภท', 'open': 'shoptype'}, 'lift-ios')
}

function load_box_choose_car() {
  var url = "component/load_choose_car";
  $.post(url, function (ele) {
    $('#load_choose_car').html(ele);
  });
}

function addCarByShop() {
  fn.pushPage({
    'id': 'popup1.html',
    'title': 'เพิ่มข้อมูลรถ'
  }, 'lift-ios')
  var url = "page/call_page?openby=shop";
  $.post(url, {
    path: "car/car_add"
  }, function (ele) {
    $('#body_popup1').html(ele);
//        focusBox();
  });
  // _body_car_station('body_station_add_car')
}



function confirmChooseGetMoney(id) {

  var radioValue = $("input[name='choose_get_money_radio']:checked").val();
  console.log(radioValue);
  var url = "shop/confirm_choose_get_money";
//    console.log(url)
  var data = {
    type_pay: radioValue,
    order_id: id
  };
  $.ajax({
    url: url,
    data: data,
    type: 'post',
    dataType: 'json',
    success: function (res) {
      console.log(res);
      if (radioValue == 1) {
        loadBoxConfirmPay(id);
      } else {
        if (res.order_book.result == true) {
          var bank = $("input[name='bank_user_select']:checked").val();
          $.ajax({
            url: "shop/update_bank_user?order_id=" + id + "&bank=" + bank,
            type: 'post',
            dataType: 'json',
            success: function (res) {
              console.log(res);
            }
          });
          check_plan_transfer(id);
          $.ajax({
            url: "shop/driver_approved_pay?order_id=" + id,
            type: 'post',
            dataType: 'json',
            success: function (res) {
              console.log(res);
            }
          });

        }
      }
      sendSocket(id);
      loadBoxChooseGetMoney(id);
    }
  });
}

function chackPackCash(order_id) {
//  var url = "shop/check_pack_cash";
  var url = "shop/check_plan_transfer?order_id=" + order_id;
//    console.log(url)
  var data = {
    order_id: order_id
  };

  $.ajax({
    url: url,
    data: data,
    type: 'post',
    dataType: 'json',
    success: function (res) {
      console.log(res);
      loadBoxChooseGetMoney(order_id);
      if (res.result == false) {
//        alert();
        
        var url_loadboxconfirmpay = "shop/check_taxi_select_type_pay?id=" + order_id;

        $.ajax({
          url: url_loadboxconfirmpay,
          type: 'post',
          dataType: 'json',
          success: function (res) {
            console.log(res);
            if (res.res == true) {
              loadBoxConfirmPay(order_id);
            }
          }
        });
      } 
      else {
//        alert(4);
        $('#loadBoxChooseGetMoney').hide();
        $('#step_confirm_pay').hide();
        load_status_trans(order_id);
      }
    }
  });
}

function finish_job_transfer_money(id) {
  var url = "shop/finish_job_transfer_money?order_id=" + id + "&type=2";

  $.ajax({
    url: url,
    type: 'post',
    dataType: 'json',
    success: function (res) {
      console.log(res);

    }
  });
}

function showhideSelectBankCGM(id) {
  if (id == 1) {
    $('#box_load_select_bank').hide();
  } else {
    $('#box_load_select_bank').show();
    getSelectBankShop('box_load_select_bank');
  }
}

function uploadImgRegister(id) {
  fn.pushPage({
    'id': 'popup_upload_img.html',
    'title': "แขกลงทะเบียน"
  }, 'fade-ios');
  setTimeout(function () {
    $('#order_id_for_register_upload').val(id);
  }, 700);


//  var url = "page/call_page?type=guest_register&id=" + id;
//  console.log(url);
//  $.post(url, {
//    path: "shop/checkin_guest_register"
//  }, function (ele) {
//    $('#body_shop_checkin').html(ele);
//  });
}

function get_box_remuneration(order_id, plan_setting) {
  var url = "component/box_remuneration";
  console.log(plan_setting);
  $.post(url, {id: order_id, plan_setting: plan_setting}, function (ele) {
    $('#box_remuneration').html(ele);
  });
}