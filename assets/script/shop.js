if (class_user == 'lab') {
    var url_load = "go.php?name=shop/shop_new&file=booking_lab&driver=153&place=1";
} 
else {
    var url_load = "go.php?name=shop/shop_new&file=booking&driver=153&place=1";
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
            }, 300, function() {

                

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
            }, 300, function() {

                

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
            }, 300, function() {

                

                window.location.href = "#nation_box";
            });
        }
        if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value == 0) {
            $('#nation_box').addClass('borderBlink')
            console.log(this.hash)

            $('html, body').animate({
                scrollTop: $('#box_com').offset().top
            }, 300, function() {

                

                window.location.href = "#nation_box";
            });
        }
        if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value == 0) {
            // $('#box_com').addClass('borderBlink')
            console.log(this.hash)

            $('html, body').animate({
                scrollTop: $('#box_com').offset().top
            }, 300, function() {

                

                window.location.href = "#box_com";
            });
        }
        if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value != 0 && $('#child').val() == '' && $('#adult').val() == '') {
            $('#num_customer').addClass('borderBlink')
            console.log(this.hash)

            $('html, body').animate({
                scrollTop: $('#num_customer').offset().top
            }, 300, function() {

                // $("#adult").focus()

                window.location.href = "#num_customer";
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

                $('#child').focusout();
            }

        }
    }
    if (tax == 'box_time') {
        performClick('time_num')
        if (form.elements["price_plan"].value > 0) {
            $('#box_com').removeClass('borderBlink')
        }
        
        if (form.elements["plate_num_1"].value == 0) {
            $('#box_car').addClass('borderBlink')
            $('html, body').animate({
                scrollTop: $('#box_com').offset().top
            }, 300, function() {

                

                window.location.href = "#nation_box";
            });
        }
        if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value == 0) {
            $('#nation_box').addClass('borderBlink')
            console.log(this.hash)

            $('html, body').animate({
                scrollTop: $('#box_com').offset().top
            }, 300, function() {

                

                window.location.href = "#nation_box";
            });
        }
        if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value == 0) {
            // $('#box_com').addClass('borderBlink')
            console.log(this.hash)

            $('html, body').animate({
                scrollTop: $('#box_com').offset().top
            }, 300, function() {

                

                window.location.href = "#box_com";
            });
        }
        if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value != 0 && $('#child').val() == '' && $('#adult').val() == '') {
            $('#num_customer').addClass('borderBlink')
            console.log(this.hash)

            $('html, body').animate({
                scrollTop: $('#num_customer').offset().top
            }, 300, function() {

                // $("#adult").focus()

                window.location.href = "#num_customer";
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

                $('#child').focusout();
            }

        }
    }



    // $("#child").focusout(function(){
    //     $("#child").val()
    //     console.log()

    // });
    $(document).ready(function() {
        $("#child").on('change', function() {
            $("#child").val()
            console.log()
        })
        $("#child").keyup(function() {
            var timer;
            var form = document.getElementById("form_booking");
            clearTimeout(timer);
            timer = setTimeout(function() {
                if ($('#adult').val() != '') {
                    $('#' + tax).removeClass('borderBlink')
                }
                
                if (form.elements["plate_num_1"].value == 0) {
                    $('#box_car').addClass('borderBlink')
                    $('html, body').animate({
                        scrollTop: $('#box_com').offset().top
                    }, 300, function() {

                        

                        window.location.href = "#box_car";
                    });
                }
                if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value == 0) {
                    $('#nation_box').addClass('borderBlink')
                    console.log(this.hash)

                    $('html, body').animate({
                        scrollTop: $('#box_com').offset().top
                    }, 300, function() {

                        

                        window.location.href = "#nation_box";
                    });
                }
                if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value == 0) {
                    $('#box_com').addClass('borderBlink')
                    console.log(this.hash)

                    $('html, body').animate({
                        scrollTop: $('#box_com').offset().top
                    }, 300, function() {

                        

                        window.location.href = "#box_com";
                    });
                }
                if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value != 0 && $('#child').val() == '' && $('#adult').val() == '') {
                    $('#num_customer').addClass('borderBlink')
                    console.log(this.hash)

                    $('html, body').animate({
                        scrollTop: $('#num_customer').offset().top
                    }, 300, function() {

                        $("#adult").focus()

                        window.location.href = "#num_customer";
                    });
                }
                if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value != 0 && $('#child').val() != '' && $('#adult').val() != '') {
                    if ($('#adult').val() != '') {
                    $('#num_customer').addClass('borderBlink')

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
        }, 300, function() {

            

            window.location.href = "#box_car";
        });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value == 0) {
        $('#nation_box').addClass('borderBlink')
        console.log(this.hash)

        $('html, body').animate({
            scrollTop: $('#box_com').offset().top
        }, 300, function() {

            

            window.location.href = "#nation_box";
        });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value == 0) {
        $('#box_com').addClass('borderBlink')
        console.log(this.hash)

        $('html, body').animate({
            scrollTop: $('#box_com').offset().top
        }, 300, function() {

            

            window.location.href = "#box_com";
        });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value != 0 && $('#child').val() == '' && $('#adult').val() == '') {
        $('#num_customer').addClass('borderBlink')
        console.log(this.hash)

        $('html, body').animate({
            scrollTop: $('#num_customer').offset().top
        }, 300, function() {

            $("#adult").focus()

            window.location.href = "#num_customer";
        });
    } else if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value != 0 && $('#child').val() != '' && $('#adult').val() != '') {
        if (form.elements["time_num"].value == 0) {

           $('#child').focusout();
           $('#box_time').addClass('borderBlink')
           $('#time_num').focus()
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
    console.log('dsdsdsd')
}
// var rad = document.form_booking.nation;
function shandleClicks(tax,country) {
    console.log(tax)
    console.log(country)
    var url = "shop/box_price_plan" + "?i_country=" + country;

    $.post(url, function(res) {
        $('#box_price_plan').html(res);
        // console.log(data);
    });
    // body...
}
function handleClick_s(tax, name) {
    console.log(tax)
    console.log(name)
    var form = document.getElementById("form_booking");
    console.log('#' + tax)
    if (tax == 'nation') {
     $('#'+tax).removeClass('borderBlink')
     var url = "shop/box_price_plan" + "?i_country=" + name;

     $.post(url, function(res) {
        $('#box_price_plan').html(res);
        // console.log(data);
        $('#radio-nation'+name).prop('checked',true);
    });


 }
 if (tax == 'car') {
    $('.box_car').removeClass('cus_focus')
    $('#div_car_' + name).addClass('cus_focus')
}
if (tax == 'box_com') {
    console.log('55555555555555555555555555')
    console.log(form.elements["price_plan"].value)
    if (form.elements["price_plan"].value > 0) {
$('#'+tax).removeClass('borderBlink')
    }
        else{
         $('#box_com').removeClass('borderBlink')

     }
    $('#price_plan_'+name).prop('checked',true);
    
    if (form.elements["plate_num_1"].value == 0) {
        $('#box_car').addClass('borderBlink')
        $('html, body').animate({
            scrollTop: $('#box_com').offset().top
        }, 300, function() {

            

            window.location.href = "#nation_box";
        });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value == 0) {
        $('#nation_box').addClass('borderBlink')
        console.log(this.hash)

        $('html, body').animate({
            scrollTop: $('#box_com').offset().top
        }, 300, function() {

            // 

            window.location.href = "#nation_box";
        });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value == 0) {
        // $('#box_com').addClass('borderBlink')
        $('#num_customer').removeClass('borderBlink')
        console.log(this.hash)

        $('html, body').animate({
            scrollTop: $('#box_com').offset().top
        }, 300, function() {

            

            window.location.href = "#box_com";
        });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value != 0 && $('#child').val() == '' && $('#adult').val() == '') {
        $('#box_com').removeClass('borderBlink')
        $('#num_customer').addClass('borderBlink')
        console.log(this.hash)

        $('html, body').animate({
            scrollTop: $('#num_customer').offset().top
        }, 300, function() {

            $("#adult").focus()

            window.location.href = "#num_customer";
        });
    }
    if (form.elements["plate_num_1"].value != 0 && form.elements["nation"].value != 0 && form.elements["price_plan"].value != 0 && $('#child').val() != '' && $('#adult').val() != '') {
        $('#num_customer').removeClass('borderBlink')
        if (form.elements["time_num"].value == 0) {
            $('#child').focusout();
            $('#box_time').addClass('borderBlink')
            $('#time_num').focus()
        } else {
            $('#box_time').removeClass('borderBlink')
            $('#child').focusout();
        }
    }
         // checformadd('box_com')

     }



 }
// ons-tab[page="shop_history.html"]

function editBook(x) {
    console.log(x)
    $('#text_edit_persion').show()

    $('#btn_selectisedit').show()
    $('#num_edit_persion').show()
    $('#btn_isedit').hide()
    $('#isedit').hide()
    $('#num_edit_persion').css('display', 'inline-block')
    $('#num_edit_persion').focus();
}

function saveeditBook(x) {
    //          var url_load= "go.php?name=booking/shop_history&file=saveeditBook&num="+$('#num_edit_persion').val()+"&id="+x;
    var url_load = "shop/editadult" + "?num=" + $('#num_edit_persion').val() + "&id=" + x;
    console.log(url_load)
    $.post(url_load, function(data) {
        //$('#load_mod_popup').html(data);
        console.log(data);
    });

    $('#text_edit_persion').hide()
    number_persion_new = $('#num_edit_persion').val()
    $('#num_final_edit').html(number_persion_new)
    console.log(x)
    $('#btn_selectisedit').hide()
    $('#num_edit_persion').hide()
    $('#btn_isedit').show()
    $('#isedit').show()


}

var cancelShop = function() {
    document
    .getElementById('shop_add-alert-dialog')
    .hide();
};
var submitShop = function() {
    // var nation = document.getElementById("form_booking");
    // console.log(nation.elements["nation"].value)
    if ($('#car_type').val() == 0) {
        ons.notification.alert({
            message: 'กรุณาเลือกประเภทรถ',
            title: "ข้อมูลไม่ครบ",
            buttonLabel: "ปิด"
        })
        .then(function() {
            $('#car_type').focus();
            location.href = "#box_car";
        });
        return false;
    }
    if ($('#car_plate').val() == "") {
        ons.notification.alert({
            message: 'กรุณาระบุป้ายทะเบียนรถ',
            title: "ข้อมูลไม่ครบ",
            buttonLabel: "ปิด"
        })
        .then(function() {
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
            buttonLabel: "ปิด"
        })
        .then(function() {
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
            buttonLabel: "ปิด"
        })
        .then(function() {
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
            buttonLabel: "ปิด"
        })
        .then(function() {
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
            buttonLabel: "ปิด"
        })
        .then(function() {
            $('#adult').focus();
        });

        return false;
    }
    if ($('#child').val() == "") {
        $('#child').focus();
        ons.notification.alert({
            message: 'กรุณาระบุจำนวนเด็ก่',
            title: "ข้อมูลไม่ครบ",
            buttonLabel: "ปิด"
        })
        .then(function() {
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
            buttonLabel: "ปิด"
        })
        .then(function() {
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
            buttonLabel: "ปิด"
        })
        .then(function() {
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
    var chk_time = time_num%60;
    var x = time_num/60;
    var chek_x;
    if (parseInt(time_num) < 60) {
        chek_x =  '0'+'.'+parseInt(time_num);
    }
    else if (parseInt(time_num) == 60) {
       chek_x = 1+'.'+'0';
   }
   else{
    if (chk_time == 0) {
        chek_x = x+'.'+'0';
    }
    else{
        chek_x = x;
    }
}
console.log(chek_x)
console.log(time_num%60)

console.log(x.toString())
var timeM;
var y = chek_x.toString().split('.')
if (y[1] == 5) {
    timeM = 3;
}
else{
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
console.log(h+timeH)
console.log(m+timeM)

var ftimeH = h+timeH;
var ftimeM = h+timeM;

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
var url_chk_time = "shop/chk_time?shop_id="+shop_id+"&day=" +weekdays[weekday_value];
/*console.log(url_chk_time)*/
$.ajax({
    url: url_chk_time,
        //data: param,
        type: 'post',
        success: function(res) {
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
            if (dialog) {
                dialog.show();
            } else {
                ons.createElement('shop_add-dialog.html', {
                    append: true
                })
                .then(function(dialog) {
                    dialog.show();
                });
            }

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


        }
        else if (parseInt(ftimeH) == parseInt(gtimeH)) {
            if (parseInt(ftimeM) > parseInt(gtimeM)) {
                ons.notification.alert({
                    message: 'ท่านเลือกเวลาส่งแขกเกินเวลาทำการกรุณา เลือกเวลาใหม่',
                    title: "เวลาทำการ "+$('#shop_topic_th').val()+ res[0].start_h+':'+res[0].start_m + '-'+res[0].finish_h+':'+res[0].finish_m,
                    buttonLabel: "ปิด"
                })
                .then(function() {

                });
                return false;
            }
            else{
                var dialog = document.getElementById('shop_add-alert-dialog');
                if (dialog) {
                    dialog.show();
                } else {
                    ons.createElement('shop_add-dialog.html', {
                        append: true
                    })
                    .then(function(dialog) {
                        dialog.show();
                    });
                }
            }
        }
        else {
            ons.notification.alert({
                message: 'ท่านเลือกเวลาส่งแขกเกินเวลาทำการกรุณา เลือกเวลาใหม่',
                title: "เวลาทำการ "+$('#shop_topic_th').val()+ res[0].start_h+':'+res[0].start_m + '-'+res[0].finish_h+':'+res[0].finish_m,
                buttonLabel: "ปิด"
            })
            .then(function() {

            });
            return false;
        }
        
    }
});

};
// function getDayName(dateStr, locale)
// {
//     var date = new Date(dateStr);
//     return date.toLocaleDateString(locale, { weekday: 'long' });        
// }

// var dateStr = '05/23/2014';
// var day = getDayName(dateStr, "en-US"); // Gives back 'Vrijdag' which is Dutch for Friday.
// function getWeekDays(locale)
// {
//     var baseDate = new Date(Date.UTC(2017, 0, 2)); // just a Monday
//     var weekDays = [];
//     for(i = 0; i < 7; i++)
//     {       
//         weekDays.push(baseDate.toLocaleDateString(locale, { weekday: 'long' }));
//         console.log(baseDate.getDate())
//         baseDate.setDate(baseDate.getDate() );       
//         console.log(baseDate.setDate(baseDate.getDate() ))

//     }
//     return weekDays;
// }
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
        url: url,
        beforeSend: function() {},
        success: function(response) {
            console.log(response);
            // return false;
            if (response.result == true) {
               /* var url2 = "shop/shop_pageadd";
                $.post(url2, function(ele2) {
                    $('#shop_add').html(ele2);
                });*/
                setTimeout(function() {
                    modal.hide();
                    _calltest();
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
                }, function(data) {
                    console.log(data);
                });
                var url_mail = "../TShare_new/mail.php?key=new_shop&driver=" + $.cookie("detect_user");
                $.post(url_mail, $('#form_booking').serialize(), function(data) {
//                    console.log(data);

});
                var txt_long_ac = response.update.invoice+" : "+"เพิ่มรายการส่งแขก " + $('#place_name_select').val();
                var ac = {
                    i_type : 1,
                    i_sub_type : 1,
                    i_event : response.last_id,
                    i_user : detect_user,
                    s_topic : "งานส่งแขก",
                    s_message : txt_long_ac,
                    s_posted : username
                };
                
                var txt_long_nc = response.update.invoice+" : "+username+" เพิ่มรายการส่งแขก " + $('#place_name_select').val();
                var nc = {
                    i_type : 1,
                    i_event :   response.last_id,
                    i_user :    0,
                    s_class_user :  "lab",
                    s_topic : "งานส่งแขก",
                    s_sub_topic : "เช็คอิน",
                    s_message : txt_long_nc,
                    s_posted :  username
                };
                apiRecordActivityAndNotification(ac, nc);
                
                /*setTimeout(function() {
                    openOrderFromAndroid(response.last_id);
                }, 1500);*/
            } else {
                ons.notification.alert({
                    message: 'กรุณาตรวจสอบอีกครั้งหรือติดต่อเจ้าหน้าที่',
                    title: "ทำรายการไม่สำเร็จ",
                    buttonLabel: "ปิด"
                })
                .then(function() {});
            }
        },
        error: function(data) {
            console.log(data);
            ons.notification.alert({
                message: 'กรุณาตรวจสอบข้อมูลของท่าน',
                title: "ผิดพลาด",
                buttonLabel: "ปิด"
            })
            .then(function() {});
        }
    });
}

function openDetailShop(key, type) {
    var detailObj = array_data.manage[key];
    fn.pushPage({
        'id': 'popup1.html',
        'title': detailObj.invoice
    }, 'slide-ios');
    console.log(detailObj);
    var url = "shop/detail_shop" + "?user_id=" + $.cookie("detect_user");
    $.post(url, detailObj, function(data) {
        $('#body_popup1').html(data);
        //        var obj = JSON.parse('<?=json_encode($_POST);?>');
        var obj = detailObj;
        console.log(obj);
        changeApprovedIncome(obj.check_lab_pay);
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
        checkPhotoCheckIn('driver_topoint', obj.id);
        checkPhotoCheckIn('guest_receive', obj.id);
        checkPhotoCheckIn('guest_register', obj.id);
        checkPhotoCheckIn('driver_pay_report', obj.id);
    });
    $('#check_open_shop_id').val(detailObj.id);
}

function openDetailBookinghistory(key, type, invoice) {

    fn.pushPage({
        'id': 'popup1.html',
        'title': invoice
    }, 'slide-ios');

    var url = "shop/detail_shop_his";
    var param = {
        user_id: $.cookie("detect_user"),
        invoice: invoice,
    };
    console.log(param);
    $.ajax({
        url: url,
        dataType: 'json',
        data: param,
        type: 'post',
        success: function(res) {
            console.log(res);
            var url = "page/shop_detail_his";
            $.post(url,res,function(ele) {
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
checkPhotoCheckIn('driver_topoint', obj.id);
checkPhotoCheckIn('guest_receive', obj.id);
checkPhotoCheckIn('guest_register', obj.id);
checkPhotoCheckIn('driver_pay_report', obj.id);
});
//          $('#body_popup1').html(res);
}
});
    // $.post(url, function(data) {
    //     $('#body_popup1').html(data);
    //        var obj = JSON.parse('<?=json_encode($_POST);?>');
    // var obj = detailObj;
    // console.log(obj);
    // if(obj.check_driver_topoint==1){
    //     console.log("driver_topoint");
    //     changeHtml("driver_topoint",obj.id,timestampToDate(obj.driver_topoint_date,"time"));
    // }
    // if(obj.check_guest_receive==1){
    //     console.log("guest_receive");
    //     changeHtml("guest_receive",obj.id,timestampToDate(obj.guest_receive_date,"time"));
    // }
    // if(obj.check_guest_register==1){
    //     console.log("guest_register");
    //     changeHtml("guest_register",obj.id,timestampToDate(obj.guest_register_date,"time"));
    // }
    // if(obj.check_driver_pay_report==1){
    //     console.log("driver_pay_report");
    //     changeHtml("driver_pay_report",obj.id,timestampToDate(obj.driver_pay_report_date,"time"));
    // }
    // checkPhotoCheckIn('driver_topoint', obj.id);
    // checkPhotoCheckIn('guest_receive', obj.id);
    // checkPhotoCheckIn('guest_register', obj.id);
    // checkPhotoCheckIn('driver_pay_report', obj.id);
    // });
    // $('#check_open_shop_id').val(detailObj.id);
}

function viewPhotoShop(id, action, time) {
    fn.pushPage({
        'id': 'popup2.html',
        'title': 'ภาพ'
    }, 'fade-md');
    var path = "../data/fileupload/store/" + action + "_" + id + ".jpg";
    var url_load = "page/view_photo?id=" + id + "&time=" + time + "&path=" + path;
    $.post(url_load, function(ele) {
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
        success: function(res) {
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
        error: function() {
            console.log('Error file');
            $('#photo_' + type + '_no').show();
            $('#photo_' + type + '_yes').hide();
        },
        success: function() {
            console.log('Success file');
            $('#photo_' + type + '_no').hide();
            $('#photo_' + type + '_yes').show();
        }
    });
}

function cancelShopSelect(id, invoice, dv){
    console.log('cancel')
    fn.showDialog('cancel-shop-dialog');
    $('#order_id_cancel').val(id);
    $('#invoice_cancel_select').val(invoice);
    $('#driver_id_cancel').val(dv);
}

function submitCancel() {
    var order_id = $('#order_id_cancel').val();
    if (!$('input[name="type_cancel"]').is(':checked')) {
        ons.notification.alert({
            message: 'กรุณาเลือกสาเหตุที่ยกเลิก',
            title: "ข้อมูลไม่ครบ",
            buttonLabel: "ปิด"
        })
        .then(function() {});
    }
    console.log($('#form_type_cancel').serialize());
    // var url = "shop/cancel_shop" + "?id=" + order_id + "&username=" + $.cookie("detect_username");
    var url = "shop/cancel_shop";
    console.log(url + " ");
    // ons.navigator.resetToPage('popup1.html')
    $.post(url, $('#form_type_cancel').serialize(), function(data) {
        console.log(data)
        var obj = data;
        console.log(obj);
        var invoice_cancel = $('#invoice_cancel_select').val();
        var order_id_calcel = $('#order_id_cancel').val();
        var dv = $('#driver_id_cancel').val();
        var txt_long_cancel_shop = invoice_cancel+" : "+"คุณทำการยกเลิกรายการส่งแขกนี้";
        var ac_1 = {
            i_type : 1,
            i_sub_type : 6,
            i_event : order_id_calcel,
            i_user : detect_user,
            s_topic : "งานส่งแขก",
            s_message : txt_long_cancel_shop,
            s_posted : username
        };

        var txt_long_nc_cancel_shop = invoice_cancel+" : พนักงานทำการยกเลิกรายการส่งแขก";
        var nc_to_taxi = {
            i_type : 1,
            i_event :   order_id_calcel,
            i_user :    dv,
            s_class_user :  "taxi",
            s_topic : "งานส่งแขก",
            s_sub_topic : "ยกเลิก",
            s_message : txt_long_nc_cancel_shop,
            s_posted :  username
        };
        apiRecordActivityAndNotification(ac_1, nc_to_taxi);
        var ac_2 = {};
        var nc_to_lab = {
            i_type : 1,
            i_event :   order_id_calcel,
                    i_user :    detect_user, // กรณียกเว้นของ lab
                    s_class_user :  "lab",
                    s_topic : "งานส่งแขก",
                    s_sub_topic : "ยกเลิก",
                    s_message : txt_long_nc_cancel_shop,
                    s_posted :  username
                };
                apiRecordActivityAndNotification(ac_2, nc_to_lab);
                
                if (obj.result == true) {
                    ons.notification.alert({
                        message: 'ยกเลิกสำเร็จ',
                        title: "สำเร็จ",
                        buttonLabel: "ปิด"
                    })
                    .then(function() {
                        fn.hideDialog('cancel-shop-dialog');

                        setTimeout(function(){ var urlx = "shop/shop_manage";
//                      appNavigator.popPage();

resetFormCancel();
shopManage();
}, 1000);
                    });
                    $('#btn_cancel_book_' + order_id).hide();

                    var url_messages = "send_onesignal/cancel_shop?order_id=" + order_id;
                    $.post(url_messages, function(res) {
                        console.log(res)
                    });
                }

            });
}

function resetFormCancel(){
    $('#invoice_cancel_select').val('');
    $('#driver_id_cancel').val('');
    $('#order_id_cancel').val('');
    $('#form_type_cancel').find('input[type="radio"]').prop('checked', false);
}

function openContact(shop_id) {
    fn.pushPage({
        'id': 'popup2.html',
        'title': 'Zello'
    }, 'fade-md');
    var url_load = "page/social?type=phone&shop_id=" + shop_id;
    $.post(url_load, function(ele) {
        $('#body_popup2').html(ele);
    });
}

function openZello(shop_id) {
    fn.pushPage({
        'id': 'popup2.html',
        'title': 'Zello'
    }, 'fade-md');
    var url_load = "page/social?type=zello&shop_id=" + shop_id;
    $.post(url_load, function(ele) {
        $('#body_popup2').html(ele);
    });
}

function openMapsDistance(shop_id) {

 fn.pushPage({
    'id': 'popup2.html',
    'title': ''
}, 'fade-md');
 var url = "page/call_page?id="+shop_id;
 $.post(url, {
    path: "map/map_place"
}, function(ele) {
//      console.log(ele)
$('#body_popup2').html(ele);
});
}

/******* <!-------- Change html CheckIn ------------> *******/

function changeHtml(type, id, st) {

    $('#status_' + type).html('<div class="font-16"><i class="fa fa-clock-o fa-spin 6x" style="color:#88B34D"></i><span> เวลา ' + st + '</span></div>');
    $('#iconchk_' + type).attr("src", "assets/images/yes.png");
    $("#number_" + type).removeClass('step-booking');
    $("#number_" + type).addClass('step-booking-active');

    $("#btn_" + type).css('background-color', '#666666');

    if (type == "driver_topoint") {
        $('#step_guest_receive').show();
    } else if (type == "guest_receive") {
        $('#step_guest_register').show();
    } else if (type == "guest_register") {
        $('#step_driver_pay_report').show();
    } else if (type == "driver_pay_report") {

    }
    $('#' + type + '_locat_off').hide();
    $('#' + type + '_locat_on').show();
    $.ajax({
        url: '../data/fileupload/store/' + type + '_' + id + '.jpg',
        type: 'HEAD',
        error: function() {
            console.log('Error file');

            $('#photo_' + type + '_yes').hide();
            $('#photo_' + type + '_no').show();

            //             $('#'+type+'_locat_off').show();
            //             $('#'+type+'_locat_on').hide();
        },
        success: function() {
            //file exists
            console.log('success file');

            $('#photo_' + type + '_yes').show();
            $('#photo_' + type + '_no').hide();

            //             $('#'+type+'_locat_off').hide();
            //               $('#'+type+'_locat_on').show();
        }
    });

    $('#' + type + '_check_click').val(1);
    $("#box_" + type).removeClass('border-alert');
}

function changeApprovedIncome(check_lab_pay){

    if(class_user=="taxi"){
        if(check_lab_pay==1){
            $('#box_approved_income').show();
        }
    }else{
        $('#box_approved_income').show();
    }
    
    
}
/******* <!-------- End Change html CheckIn ------------> *******/


/******* <!-------- function CheckIn ------------> *******/
function sendCheckIn(id, type) {

    modal.show();

    var lng = $('#lng').val();
    var lat = $('#lat').val();
    //  var url = "mod/booking/shop_history/php_shop.php?action=<?=$action;?>&type=<?=$_GET[type]?>&id=<?=$arr[project][id]?>&lat="+lat+"&lng="+lng;
    var url = "shop/checkin?type=" + type + "&id=" + id + "&lat=" + lat + "&lng=" + lng;
    console.log(url);

    $.post(url, function(res) {
        console.log(res);
        modal.hide();
        if (res.result == true) {
            $('#' + type + '_check_click').val(1)
            changeHtml(type, id, timestampToDate(res.time, "time"));

//            var message = "";
//            socket.emit('sendchat', message);
sendSocket(id);

var url_msg = "send_onesignal/send_checkin?type="+type+"&id="+id;

$.ajax({
                url: url_msg, // point to server-side PHP script 
                dataType: 'json', // what to expect back from the PHP script, if anything
//                data: data,
type: 'post',
success: function(data) {
    console.log(data);
}
});
ons.notification.alert({
    message: 'ยืนยันแล้ว',
    title: "สำเร็จ",
    buttonLabel: "ปิด"
})
.then(function() {
    callpop();
});

shopFuncNotiActi(id, type);

} else {  }
});

}

function shopFuncNotiActi(id, type){
    if(type=='driver_topoint'){     
        var txt_long_ac = $('#txt_invoice_shop_detail').text()+" : "+"คุณทำการยืนยันถึงสถานที่ส่งแขก";
        var txt_long_nc = $('#txt_invoice_shop_detail').text()+" : "+username+" ถึงสถานที่ส่งแขกแล้ว " + $('#place_name_select').val();
    }
    else if(type=='guest_receive'){     
        var txt_long_ac = $('#txt_invoice_shop_detail').text()+" : "+"คุณทำการยืนยันรับแขกแล้ว";
        var txt_long_nc = $('#txt_invoice_shop_detail').text()+" : "+"พนักงานต้อนรับ รับแขกเรียบร้อยแล้ว";
    } 
    else if(type=='guest_register'){        
        var txt_long_ac = $('#txt_invoice_shop_detail').text()+" : "+"คุณทำการยืนยันแขกลงทะเบียนแล้ว";
        var txt_long_nc = $('#txt_invoice_shop_detail').text()+" : "+"แขกทำการลงทะเบียนแล้ว";
    } 
    else if(type=='driver_pay_report'){     
        var txt_long_ac = $('#txt_invoice_shop_detail').text()+" : "+"คุณทำการยืนยันแจ้งยอดคนขับ";
        var txt_long_nc = $('#txt_invoice_shop_detail').text()+" : "+"พนักงานได้ยืนยันการแจ้งยอดรายได้แล้ว";
    }else if(type=='lab_pay_approve'){
        var txt_long_ac = $('#txt_invoice_shop_detail').text()+" : "+"คุณทำการยืนยันการจ่ายเงินคนขับ";
        var txt_long_nc = $('#txt_invoice_shop_detail').text()+" : "+"พนักงานได้ยืนยันการจ่ายเงินแล้ว";
    }else if(type=='driver_pay_approve'){
        var txt_long_ac = $('#txt_invoice_shop_detail').text()+" : "+"คุณได้ยืนยันการรับเงินแล้ว";
        var txt_long_nc = $('#txt_invoice_shop_detail').text()+" : "+"แท็กซี่ทำการยืนยันการรับเงินแล้ว";
    }

    var ac = {
        i_type : 1,
        i_sub_type : 1,
        i_event : id,
        i_user : detect_user,
        s_topic : "งานส่งแขก",
        s_message : txt_long_ac,
        s_posted : username
    };

    var nc = {
        i_type : 1,
        i_event : id,
        i_user :  $('#id_driver_order').val(),
        s_class_user :  class_user,
        s_topic : "งานส่งแขก",
        s_sub_topic : "เช็คอิน",
        s_message : txt_long_nc,
        s_posted :  username
    };

    apiRecordActivityAndNotification(ac, nc);
}

function readURLcheckIn(input, type, subtype, id) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {

            $('#pv_' + type).attr('src', e.target.result);
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
                success: function(php_script_response) {
                    console.log(php_script_response);
                    if (php_script_response.result == true) {
                        $('#txt-img-nohas-checkin').hide();
                        $('#txt-img-has-checkin').show();
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
    fn.pushPage({
        'id': 'popup_shop_checkin.html',
        'title': "ถึงสถานที่ส่งแขก"
    }, 'fade-ios');
    var url = "page/call_page?type=driver_topoint&id=" + id;
    console.log(url);
    $.post(url, {
        path: "shop/checkin_action"
    }, function(ele) {
        $('#body_shop_checkin').html(ele);
    });
    //    $('#type_checkin').val('topoint');
    //    alert($('#type_checkin').val());
}

function btn_guest_receive(id) {
    if ($('#guest_receive_check_click').val() == 1) {
        return;
    }
    if (class_user == "taxi") {
        ons.notification.alert({
            message: 'พนักงานเป็นคนยืนยันเท่านั้น',
            title: "ไม่สามารถยืนยันได้",
            buttonLabel: "ปิด"
        })
        .then(function() {});
        return;
    }
    fn.pushPage({
        'id': 'popup_shop_checkin.html',
        'title': "พนักงานรับแขก"
    }, 'fade-ios');
    var url = "page/call_page?type=guest_receive&id=" + id;
    console.log(url);
    $.post(url, {
        path: "shop/checkin_action"
    }, function(ele) {
        $('#body_shop_checkin').html(ele);
    });
    //    $('#type_checkin').val('topoint');
    //    alert($('#type_checkin').val());
}

function btn_guest_register(id) {
    if ($('#guest_register_check_click').val() == 1) {
        return;
    }
    if (class_user == "taxi") {
        ons.notification.alert({
            message: 'พนักงานเป็นคนยืนยันเท่านั้น',
            title: "ไม่สามารถยืนยันได้",
            buttonLabel: "ปิด"
        })
        .then(function() {});
        return;
    }
    fn.pushPage({
        'id': 'popup_shop_checkin.html',
        'title': "แขกลงทะเบียน"
    }, 'fade-ios');
    var url = "page/call_page?type=guest_register&id=" + id;
    console.log(url);
    $.post(url, {
        path: "shop/checkin_action"
    }, function(ele) {
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
        ons.notification.alert({
            message: 'พนักงานเป็นคนยืนยันเท่านั้น',
            title: "ไม่สามารถยืนยันได้",
            buttonLabel: "ปิด"
        })
        .then(function() {});
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
    }, function(ele) {
        $('#body_shop_checkin').html(ele);
    });
    //    $('#type_checkin').val('topoint');
    //    alert($('#type_checkin').val());
}

/******* <!-------- function run page ------------> *******/

function shopManage(){
//    $('#shop_manage').html(progress_circle);
var obj = array_data;
var url = "page/shop_manage";

array_ma = obj.manage;
console.log(array_ma);
var pass = {
    data: array_ma
};
console.log(pass);
$.ajax({
    url: url,
    data: pass,
    type: 'post',
    success: function(ele) {
                //                              console.log(data);
                $('#shop_manage').html(ele);
            }
        });
}
var array_ma = [];
var array_his = [];
var date = moment().format('YYYY-MM-DD');
document.addEventListener('prechange', function(event) {
    console.log(event);
    var page = event.tabItem.getAttribute('page');
//    console.log(page)
if (page == "shop_manage.html") {
    shopManage();
}

if (page == "shop_history.html") {
    historyShop($('#date_shop_his').val());
}
    /*document.querySelector('ons-toolbar .center')
    .innerHTML = event.tabItem.getAttribute('label');*/
});

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
        return formattedTime;
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
    reloadIncomeShop(id);
}

function reloadIncomeShop(id){
  var url = "page/call_page?&id=" + id;
  console.log(url);
  if(class_user=="taxi"){
      var path = "shop/income_driver_taxi";
  }else{
      var path = "shop/income_driver_lab";
  }

  $.post(url, {
    path: path
}, function(ele) {
    $('#body_shop_checkin').html(ele);
});
}

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
        success: function(res) {
            console.log(res);
            $('#shop_history').html(res);
        }
    });
    console.log($('#ex_booking').val())
    // dateInput.addEventListener('change', function(e) {
    //   console.log(e.target.value);
    // }); 
}

function editTimeToPlace(id){
  var dialog = document.getElementById('change-time-dialog');

  if (dialog) {
   dialog.show();
   $('#order_id_change_time').val(id);
} else {
   ons.createElement('change-time.html', { append: true })
   .then(function(dialog) {
       dialog.show();
       $('#order_id_change_time').val(id);
   });
}
}

function submitChangeTimeToPlace(){
    var time = $('#time_num_change_time').val();
    var id = $('#order_id_change_time').val();
    var pass = { order_id:id, time:time };
    console.log(pass);
//  return;

$.ajax({
 url: "shop/update_time_toplace",
 data: pass,
 type: 'post',
 dataType: 'json',
 success: function(res) {
     console.log(res);
     ons.notification.alert({
      message: 'แก้ไขเวลาเรียบร้อย',
      title: "สำเร็จ",
      buttonLabel: "ปิด"
  })
     .then(function() {
         shopManage()
         document.getElementById('change-time-dialog').hide();
     });
 }
});
}

function calTime(val){
    var m = val;
    if(m==""){
        return;
    }
    var d = new Date();
    var cur_m = d.getMinutes();
    var dd = new Date();
    var last = parseInt(cur_m) + parseInt(m);
    dd.setMinutes(last);
    console.log(dd);
    $('#show_to_time').text(formatTime(dd));
}

function approveBook(id, invoice, driver_id){

//  return;
var pass = {
    id : id,
    vc : invoice,
    posted : $.cookie("detect_user")
};
console.log(pass);
var url = "shop/lab_acknowledge";
$.ajax({
    url: url,
    data: pass,
    type: 'post',
    dataType: 'json',
    success: function(res) {
        console.log(res);
        $.ajax({
         url: "send_onesignal/acknowledge?order_id="+id+"&driver="+driver_id+"&vc="+invoice,
         data: pass,
         type: 'post',
         dataType: 'json',
         success: function(res) {
             console.log(res);
             sendSocket(id);
             var txt_long_ac = invoice+" : "+"คุณได้ยืนยันรายการส่งแขกแล้ว";
             var ac = {
                i_type : 1,
                i_sub_type : 4,
                i_event : id,
                i_user : detect_user,
                s_topic : "งานส่งแขก",
                s_message : txt_long_ac,
                s_posted : username
            };

            var txt_long_nc = invoice+" : "+"พนักงานยืนยันงานส่งแขกของคุณแล้ว";
            var nc = {
                i_type : 1,
                i_event : id,
                i_user : driver_id,
                s_class_user : "taxi",
                s_topic : "งานส่งแขก",
                s_sub_topic : "ยืนยันงาน",
                s_message : txt_long_nc,
                s_posted :  username
            };

            apiRecordActivityAndNotification(ac, nc);
            ons.notification.alert({
              message: 'แจ้งเตือนการรับทราบงานของคุณไปยังคนขับแล้ว',
              title: "สำเร็จ",
              buttonLabel: "ปิด"
          })
            .then(function() {

             shopManage();

         });
        }
    });
    }
});
}

function historyShop(date){
//  console.log(date)
//  return;
var date_rp = date.replace("-", "/");
date_rp = date_rp.replace("-", "/");

if(class_user=="taxi"){
 var url_his = 'api/shop_history_driver';
//          var driver = detect_user;
var data = {
    date : date_rp,
    driver : detect_user
}
}
else{
 var url_his = 'api/shop_history_lab';
 var data = {
    date : date_rp
}
}

$.post(url_his,data,function(res){
 console.log(res);
 var url = "shop/shop_history";
 $.post(url,{ data : res.data },function(html){
    $('#shop_history').html(html);
});

});
}

function approvePayDriverByLab(id, invoice, driver){
    console.log("Lab approved pay");
/*   sendSocket(id);
return;*/
var param = {
    order_id : id
}

$.ajax({
 url: "shop/lab_approved_pay",
 data: param,
 type: 'post',
 dataType: 'json',
 success: function(res) {
     console.log(res);
     shopFuncNotiActi(id, "lab_pay_approve");
//              "send_messages/send_pay_driver.php?type=send_driver&vc="+invoice+'&driver='+driver+'&order_id='+order_id
$.ajax({
 url: "send_onesignal/send_msg_pay_shop?order_id="+id+"&type=lab_pay_approved&vc="+invoice+'&driver='+driver,
 type: 'post',
 dataType: 'json',
 success: function(res) {
    console.log(res);
    sendSocket(id);

    ons.notification.alert({
      message: 'ยืนยันการจ่ายเงินแล้ว',
      title: "สำเร็จ",
      buttonLabel: "ปิด"
  })
    .then(function() {

       reloadIncomeShop(id);
   });
}
});
}
});
}

function approvePayDriverByTaxi(id, invoice, driver){
    console.log("Driver approved pay");
     /*sendSocket(id);
     return;*/
     var param = {
        order_id : id
    }
    
    $.ajax({
     url: "shop/driver_approved_pay",
     data: param,
     type: 'post',
     dataType: 'json',
     success: function(res) {
         console.log(res);
         $.ajax({
             url: "shop/checkin?type=driver_complete&id="+id+"&lat="+$('#lat').val()+"&lng="+$('#lng').val(),
//                 data: param,
type: 'post',
dataType: 'json',
success: function(com) { 
    console.log(com);
}
});
         shopFuncNotiActi(id, "driver_pay_approve");
         $.ajax({
             url: "send_onesignal/send_msg_pay_shop?order_id="+id+"&type=driver_pay_approved&vc="+invoice+'&driver='+driver,
             type: 'post',
             dataType: 'json',
             success: function(res) {
                 console.log(res);
                 sendSocket(id);
                 ons.notification.alert({
                  message: 'ยืนยันการรับเงินแล้ว งานของคุณเสร็จสมบรูณ์',
                  title: "สำเร็จ",
                  buttonLabel: "ปิด"
              })
                 .then(function() {
                    reloadIncomeShop(id);
                });
             }
         });
     }
 });
}

function _calltest (event){
 var el = $('ons-tab[page="shop_manage.html"]');
 performClick('tab_shop_mn')
 el.click();
   // console.log(el.click());
   // el.addEventListener("click",$('ons-tab[page="shop_manage.html"]').click());
// el.addEventListener("click"
    // $('ons-tab[page="shop_manage.html"]').click();
    // console.log( document.addEventListener('prechange'))
}
function maxLengthCheck(object) {
    if (object.value.length > 3)
      object.value = object.value.slice(0, 3)
}


// myEl.addEventListener('click', function() {
//     alert('Hello world');
// }, false);