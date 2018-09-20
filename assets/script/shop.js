if (class_user == 'lab') {
    var url_load = "go.php?name=shop/shop_new&file=booking_lab&driver=153&place=1";
} else {
    var url_load = "go.php?name=shop/shop_new&file=booking&driver=153&place=1";
}

function checformadd(tax){
  var form = document.getElementById("form_booking");
  if (tax == 'nation_box') {
     $('#'+tax).removeClass('borderBlink')
     if(form.elements["adult"].value == 0){
     }
     if (form.elements["nation"].value != 0 && form.elements["price_plan"].value == 0) {
        $('#box_com').addClass('borderBlink')
    }
    else if (form.elements["nation"].value != 0 && form.elements["price_plan"].value != 0 && form.elements["adult"].value == 0) {
      $('#num_customer').addClass('borderBlink')
  }
}
if (tax == 'box_com') {
    $('#'+tax).removeClass('borderBlink')
    if (form.elements["nation"].value == 0) {
        $('#nation_box').addClass('borderBlink')
    }
    else if (form.elements["nation"].value != 0 && form.elements["price_plan"].value == 0) {
        $('#box_com').addClass('borderBlink')
    }
    else if (form.elements["nation"].value != 0 && form.elements["price_plan"].value != 0 && form.elements["adult"].value == 0) {
        $('#num_customer').addClass('borderBlink')
    }
}
$("#adult").focusout(function(){
    // $(this).css("background-color", "#FFFFFF");
});
$("#child").focusout(function(){
    $("#child").val()
    console.log()
    $('#num_customer').removeClass('borderBlink')
    $('#box_time').addClass('borderBlink')
});
$( document ).ready(function() {
$("#child").on('change',function(){
        $("#child").val()
    console.log()
})
});

// if (tax == 'box_time') {
//    $('#'+tax).removeClass('borderBlink')
//    if (form.elements["nation"].value == 0) {
//     $('#nation_box').addClass('borderBlink')
// }
// else if (form.elements["nation"].value != 0 && form.elements["price_plan"].value == 0) {
//     $('#num_customer').addClass('borderBlink')
// }
// else if (form.elements["nation"].value != 0 && form.elements["time_num"].value != 0 && form.elements["price_plan"].value == 0) {
//         $('#box_com').addClass('borderBlink')
//     }
// }
// if (tax == 'box_com') {
//     $('#'+tax).removeClass('borderBlink')
//     if (form.elements["nation"].value == 0) {
//         $('#nation_box').addClass('borderBlink')
//     }
//     else if (form.elements["nation"].value != 0 && form.elements["price_plan"].value == 0) {
//         $('#num_customer').addClass('borderBlink')
//     }
// }
}
function checktime(x){
    console.log(x)
     $('#box_time').removeClass('borderBlink')
    

}
function checkchild(x){
    console.log('dsdsdsd')
}
// var rad = document.form_booking.nation;
function handleClick(tax,name){
    console.log(tax)
    console.log(name)
    console.log('#'+tax+name)
    if (tax == 'nation') {
        if (name == 1) {
            $('#'+tax+'_'+name).addClass('cus_focus')
            $('#'+tax+'_'+2).removeClass('cus_focus')
            $('#'+tax+'_'+3).removeClass('cus_focus')
            $('.nation_order').hide()
            $('.nation_china').show()
        }
        if (name == 2) {
            $('#'+tax+'_'+name).addClass('cus_focus')
            $('#'+tax+'_'+1).removeClass('cus_focus')
            $('#'+tax+'_'+3).removeClass('cus_focus')
            $('.nation_order').show()
            $('.nation_china').hide()

        }
        if (name == 3) {
            $('#'+tax+'_'+name).addClass('cus_focus')
            $('#'+tax+'_'+1).removeClass('cus_focus')
            $('#'+tax+'_'+2).removeClass('cus_focus')
            $('.nation_order').show()
            $('.nation_china').show()


        }
    }
    if (tax == 'car') {
        $('.box_car').removeClass('cus_focus')
        $('#div_car_'+name).addClass('cus_focus')
    }
    

}
// ons-tab[page="shop_history.html"]

function editBook(x){
   console.log(x)
   $('#text_edit_persion').show()

   $('#btn_selectisedit').show()
   $('#num_edit_persion').show()
   $('#btn_isedit').hide()
   $('#isedit').hide()
   $('#num_edit_persion').css('display','inline-block')
   $('#num_edit_persion').focus();
}

function saveeditBook(x){
//			var url_load= "go.php?name=booking/shop_history&file=saveeditBook&num="+$('#num_edit_persion').val()+"&id="+x;
var url_load= "shop/editadult"+"?num="+$('#num_edit_persion').val()+"&id="+x;
console.log(url_load)
$.post( url_load, function( data ) {
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
    
    if(nation.elements["nation"].value == ''){

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

if ($('#adult').val() == "" ) {
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
if ( parseInt($('#adult').val()) <= 0) {

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
var time_num = document.getElementById("form_booking");
console.log(time_num.elements["time_num"].value)
if(time_num.elements["time_num"].value == 0){
    ons.notification.alert({
        message: 'กรุณาเลือกเวลาโดยประมาณ',
        title: "ข้อมูลไม่ครบ",
        buttonLabel: "ปิด"
    })
    .then(function() {
        $('#time_num').focus();
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
var price_plan = document.getElementById("form_booking");

    // console.log(price_plan)
    // var rate_value;
    if(price_plan.elements["price_plan"].value == ''){
        ons.notification.alert({
            message: 'กรุณาเลือกค่าตอบแทน',
            title: "ข้อมูลไม่ครบ",
            buttonLabel: "ปิด"
        })
        .then(function() {
            //$('#time_num').focus();
        });
        return false;
    // rate_value = document.getElementById('price_plan_1').value;

}
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
};

function saveShop() {
    var place_num = $('#car_plate').val();
    modal.show();
    $('#shop_add-alert-dialog').hide();
    $('#txt_car_type').val($("#car_type option:selected").text());
    //			var url = "mod/shop/shop_new/save_data.php?action=add&type=driver&driver=<?=$user_id?>";
    var url = "shop/add_shop" + "?type=driver&driver=" + $.cookie("detect_user");
     // fn.pushPage({'id': 'shop_manage.html', 'title': 'ส่งแขก','key':'contract_us'}, 'lift-ios')
                        // $('ons-tab[page="shop_manage.html"]').click();
                        
                        $.ajax({
                            type: 'POST',
                            data: $('#form_booking').serialize(),
                            url: url,
                            beforeSend: function() {},
                            success: function(response) {
                                console.log(response);

                                if (response.result == true) {
                                    var url2 = "shop/shop_pageadd";
                                    $.post(url2,function(ele2){
                                        $('#shop_add').html(ele2);

                                    });
                                    setTimeout(function() {
                                        modal.hide();
                                        $('ons-tab[page="shop_manage.html"]').click();
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
                $.post('Send_onesignal/new_shop?order_id=' + response.last_id + '&vc=' + response.invoice + '&m=' + response.airout_m, {
                    driver: $.cookie("detect_user"),
                    //                    nickname: "<?=$arr[driver][nickname]?>",
                    car_plate: place_num
                }, function(data) {
                    console.log(data);
                });
                var url_mail = "../TShare_new/mail.php?key=new_shop&driver=" + $.cookie("detect_user");
                $.post(url_mail, $('#form_booking').serialize(), function(data) {
                    console.log(data);

                });
                setTimeout(function() {
                    openOrderFromAndroid(response.last_id);
                }, 1500);
            } else {
                ons.notification.alert({
                    message: 'กรุณาตรวจสอบอีกครั้งหรือติดต่อเจ้าหน้าที่',
                    title: "ทำรายการไม่สำเร็จ",
                    buttonLabel: "ปิด"
                })
                .then(function() {
                });
            }
        },
        error: function(data) {
            console.log(data);
            ons.notification.alert({
                message: 'กรุณาตรวจสอบข้อมูลของท่าน',
                title: "ผิดพลาด",
                buttonLabel: "ปิด"
            })
            .then(function() {
            });
        }
    });
                    }
                    function openDetailBooking(key, type) {
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
if(obj.check_driver_topoint==1){
    console.log("driver_topoint");
    changeHtml("driver_topoint",obj.id,timestampToDate(obj.driver_topoint_date,"time"));
}
if(obj.check_guest_receive==1){
    console.log("guest_receive");
    changeHtml("guest_receive",obj.id,timestampToDate(obj.guest_receive_date,"time"));
}
if(obj.check_guest_register==1){
    console.log("guest_register");
    changeHtml("guest_register",obj.id,timestampToDate(obj.guest_register_date,"time"));
}
if(obj.check_driver_pay_report==1){
    console.log("driver_pay_report");
    changeHtml("driver_pay_report",obj.id,timestampToDate(obj.driver_pay_report_date,"time"));
}
checkPhotoCheckIn('driver_topoint', obj.id);
checkPhotoCheckIn('guest_receive', obj.id);
checkPhotoCheckIn('guest_register', obj.id);
checkPhotoCheckIn('driver_pay_report', obj.id);
});
                        $('#check_open_shop_id').val(detailObj.id);
                    }


                    function openDetailBookinghistory(key, type,invoice) {

                        fn.pushPage({
                            'id': 'popup1.html',
                            'title': invoice
                        }, 'slide-ios');

                        var url = "shop/detail_shop_his";
                        var param = {
                            user_id: $.cookie("detect_user"),
                            invoice : invoice,
                        };
                        console.log(param);
                        $.ajax({
                            url: url,
                            data: param,
                            type: 'post',
                            success: function(res) {
                               console.log(res);
                               $('#body_popup1').html(res);
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

function viewPhotoShop(id,action, time){
	fn.pushPage({
        'id': 'popup2.html',
        'title': 'ภาพ'
    }, 'fade-md');
    var path = "../data/fileupload/store/"+action+"_"+id+".jpg";
    var url_load = "page/view_photo?id=" + id +"&time="+time+"&path="+path;
    $.post(url_load, function(ele) {
        $('#body_popup2').html(ele);
    });
}

function openPointMaps(type,id){
    console.log(id)
    console.log(type)
    var title = '';
    if (type == 'driver_topoint') {
        title = 'ตำแหน่งถึงสถานที่ส่งแขก'
    }
    else if(type == 'guest_register'){
        title = 'ตำแหน่งแขกลงทะเบียน'

    }
    else if(type == 'guest_receive'){
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
        order_id : id,
        type : type,
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
                 elem.setAttribute("style","width: 100%;background-color: rgb(221, 221, 221);position: fixed;top: 0px; bottom: 0px; overflow: scroll;z-index: 100")
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

function checkPhotoCheckIn(type, id){
  if($('#'+type+'_check_click').val()==1){
    $('#'+type+'_locat_off').hide();
    $('#'+type+'_locat_on').show();

}else{
    $('#'+type+'_locat_off').show();
    $('#'+type+'_locat_on').hide();
}
$.ajax({
   url: '../data/fileupload/store/'+type+'_'+id+'.jpg',
   type:'HEAD',
   error: function()
   {
    console.log('Error file');
    $('#photo_'+type+'_no').show();
    $('#photo_'+type+'_yes').hide();
},
success: function()
{
    console.log('Success file');
    $('#photo_'+type+'_no').hide();
    $('#photo_'+type+'_yes').show();
}
});
}

function submitCancel() {
    var order_id = $('#order_id_cancel').val();
    if (!$('input[name="type_cancel"]').is(':checked')) {
        ons.notification.alert({
            message: 'กรุณาเลือกสาเหตุที่ยกเลิก',
            title: "ข้อมูลไม่ครบ",
            buttonLabel: "ปิด"
        })
        .then(function() {
        });
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
        if (obj.result == true) {
            ons.notification.alert({
                message: 'ยกเลิกสำเร็จ',
                title: "สำเร็จ",
                buttonLabel: "ปิด"
            })
            .then(function() {
                fn.hideDialog('cancel-shop-dialog');
                var urlx = "shop/shop_manage";



                $.post(urlx, function(res) {
            // this.popPage('popup1.html');
            appNavigator.popPage()
            $('#shop_manage').html(res);
        });

            });
            $('#btn_cancel_book_' + order_id).hide();
            /*var url_check_st = "mod/booking/shop_history/load/component_shop.php?request=check_status_shop&status="+data.status;
            console.log(url_check_st);
            $.post( url_check_st,$('#form_type_cancel' ).serialize(), function( com ) {
            	$('#status_booking_detail').html(com);
            	swal("<?=t_success;?>", "", "success");
            });*/
            var url_messages = "send_onesignal/cancel_shop?order_id=" + order_id;
            $.post(url_messages, function(res) {
                console.log(res)
            });
        }
    });
 }

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
        h_txy = ' ' + hrs_d_bc + ' ชัวโมง.';
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
    //		 $( "#main_load_mod_popup_map" ).toggle();
    $('#map_side_popup').fadeIn();
    $('#map_side_popup_body').html(load_main_mod);
    //	  	var url_load= "load_page_map.php?name=map_api&file=map_place&shop_id="+shop_id+"&lat="+$('#lat').val()+"&lng="+$('#lng').val();
    var url_load = "mod/map_api/map_place.php?shop_id=" + shop_id + "&lat=" + $('#lat').val() + "&lng=" + $('#lng').val();
    //  	  	$('#load_mod_popup_map').html(load_main_mod);
    $('#map_side_popup_body').load(url_load);
}

/******* <!-------- Change html CheckIn ------------> *******/

function changeHtml(type,id,st){
//			alert(type);
//			var url_status = "mod/booking/shop_history/load/component_shop.php?request=check_status_checkin&status=1&time="+status_time;
//			$('#status_'+type).html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> โหลดข้อมูล');
$('#status_'+type).html('<div class="font-16"><i class="fa fa-clock-o fa-spin 6x" style="color:#88B34D"></i><span> เวลา '+st+'</span></div>'); 
$('#iconchk_'+type).attr("src", "assets/images/yes.png");  
$("#number_"+type).removeClass('step-booking');
$("#number_"+type).addClass('step-booking-active');
//			$("#box_"+type).addClass('disabledbutton-checkin');
$("#btn_"+type).css('background-color','#666666');

if(type=="driver_topoint"){
    $('#step_guest_receive').show();
}else if(type=="guest_receive"){
    $('#step_guest_register').show();
}else if(type=="guest_register"){
 $('#step_driver_pay_report').show();
}else if(type=="driver_pay_report"){

}
$('#'+type+'_locat_off').hide();
$('#'+type+'_locat_on').show();
$.ajax({
   url: '../data/fileupload/store/'+type+'_'+id+'.jpg',
   type:'HEAD',
   error: function()
   {
       console.log('Error file');

       $('#photo_'+type+'_yes').hide();
       $('#photo_'+type+'_no').show();

//			   $('#'+type+'_locat_off').show();
//			   $('#'+type+'_locat_on').hide();
},
success: function()
{
				//file exists
				console.log('success file');
				
				$('#photo_'+type+'_yes').show();
              $('#photo_'+type+'_no').hide();

//			   $('#'+type+'_locat_off').hide();
//			     $('#'+type+'_locat_on').show();
}
});

$('#'+type+'_check_click').val(1);
$("#box_"+type).removeClass('border-alert');
}
/******* <!-------- End Change html CheckIn ------------> *******/


/******* <!-------- function CheckIn ------------> *******/
function sendCheckIn(id, type){
	
	modal.show();
	
	var lng = $('#lng').val();
	var lat = $('#lat').val();
//	var url = "mod/booking/shop_history/php_shop.php?action=<?=$action;?>&type=<?=$_GET[type]?>&id=<?=$arr[project][id]?>&lat="+lat+"&lng="+lng;
var url = "shop/checkin?type="+type+"&id="+id+"&lat="+lat+"&lng="+lng;
console.log(url);

$.post(url,function(res){
   console.log(res);
   modal.hide();
   if(res.result==true){
    $('#'+type+'_check_click').val(1)
    changeHtml(type,id,timestampToDate(res.time,"time"));

//				 console.log(array_cdata);
//   				 $('#json_shop').val(JSON.stringify(array_data));
var message = "";
socket.emit('sendchat', message);
sendSocket(id);
//				$( "#close_dialog_custom" ).click();

		      /*	 $.post('send_messages/send_checkin.php?type=<?=$_GET[type]?>&id=<?=$arr[project][id]?>',function(data){
   					console.log(data);
   				});*/
                 ons.notification.alert({message: 'ยืนยันแล้ว',title:"สำเร็จ",buttonLabel:"ปิด"})
                 .then(function() {
                     $('ons-back-button').click();
                 });
             }else{
//				swal("Error");
}
});

}

function readURL(input, type, subtype, id) {

   if (input.files && input.files[0]) {
     var reader = new FileReader();
     reader.onload = function(e) {

        $('#pv_'+type).attr('src', e.target.result);
        $('#pv_'+type).fadeIn(500);
        var url = "page/upload_img?type="+type+"&action="+subtype+"&id="+id;
        console.log(url);
//				return;
var data = new FormData($('#form_checkin')[0]);
data.append('fileUpload', $('#img_checkin')[0].files[0]);
$.ajax({
   				                url: url, // point to server-side PHP script 
   				                dataType: 'json',  // what to expect back from the PHP script, if anything
   				                cache: false,
   				                contentType: false,
   				                processData: false,
   				                data: data,                         
   				                type: 'post',
   				                success: function(php_script_response){
                                      console.log(php_script_response);
                                      if(php_script_response.result==true){
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
    if($('#driver_topoint_check_click').val()==1){
      return;
  }
  fn.pushPage({
    'id': 'popup_shop_checkin.html',
    'title': "ถึงสถานที่ส่งแขก"
}, 'fade-ios');
  var url = "page/call_page?type=driver_topoint&id="+id;
  console.log(url);
  $.post(url,{ path : "shop/checkin_action" },function(ele){
     $('#body_shop_checkin').html(ele);
 });
//    $('#type_checkin').val('topoint');
//    alert($('#type_checkin').val());
}

function btn_guest_receive(id) {
	if($('#guest_receive_check_click').val()==1){
		return;
	}
    if(class_user=="taxi"){
       ons.notification.alert({
        message: 'พนักงานเป็นคนยืนยันเท่านั้น',
        title: "ไม่สามารถยืนยันได้",
        buttonLabel: "ปิด"
    })
       .then(function() {
       });
       return;
   }
   fn.pushPage({
    'id': 'popup_shop_checkin.html',
    'title': "พนักงานรับแขก"
}, 'fade-ios');
   var url = "page/call_page?type=guest_receive&id="+id;
   console.log(url);
   $.post(url,{ path : "shop/checkin_action" },function(ele){
     $('#body_shop_checkin').html(ele);
 });
//    $('#type_checkin').val('topoint');
//    alert($('#type_checkin').val());
}

function btn_guest_register(id) {
	if($('#guest_register_check_click').val()==1){
		return;
	}
    if(class_user=="taxi"){
       ons.notification.alert({
        message: 'พนักงานเป็นคนยืนยันเท่านั้น',
        title: "ไม่สามารถยืนยันได้",
        buttonLabel: "ปิด"
    })
       .then(function() {
       });
       return;
   }
   fn.pushPage({
    'id': 'popup_shop_checkin.html',
    'title': "แขกลงทะเบียน"
}, 'fade-ios');
   var url = "page/call_page?type=guest_register&id="+id;
   console.log(url);
   $.post(url,{ path : "shop/checkin_action" },function(ele){
     $('#body_shop_checkin').html(ele);
 });
//    $('#type_checkin').val('topoint');
//    alert($('#type_checkin').val());
}

function btn_driver_pay_report(id) {
	if($('#driver_pay_report_check_click').val()==1){
		return;
	}
    if(class_user=="taxi"){
       ons.notification.alert({
        message: 'พนักงานเป็นคนยืนยันเท่านั้น',
        title: "ไม่สามารถยืนยันได้",
        buttonLabel: "ปิด"
    })
       .then(function() {
       });
       return;
   }
   fn.pushPage({
    'id': 'popup_shop_checkin.html',
    'title': "แจ้งยอดรายได้แล้ว"
}, 'fade-ios');
   var url = "page/call_page?type=driver_pay_report&id="+id;
   console.log(url);
   $.post(url,{ path : "shop/checkin_action" },function(ele){
     $('#body_shop_checkin').html(ele);
 });
//    $('#type_checkin').val('topoint');
//    alert($('#type_checkin').val());
}

/******* <!-------- function run page ------------> *******/
var array_ma = [];
var array_his = [];
var date = moment().format('YYYY-MM-DD');
document.addEventListener('prechange', function(event) {
    console.log(event);
    var page = event.tabItem.getAttribute('page');
    console.log(page)
    if (page == "shop_manage.html") {
        var obj = array_data;
        var url = "page/shop_manage";
        $('#date_filter').hide();
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
                //							  	console.log(data);
                $('#shop_manage').html(ele);
            }
        });
    }
    // if (page == "shop_add.html") {
    //     // var obj = array_data;
    //     var url = "shop/shop_pageadd";
    //     // $('#date_filter').hide();
    //     // array_ma = obj.manage;
    //     // console.log(array_ma);
    //     // var pass = {
    //         // data: array_ma
    //     // };
    //     // console.log(pass);
    //     $.ajax({
    //         url: url,
    //         // data: pass,
    //         type: 'post',
    //         success: function(ele) {
    //             //                              console.log(data);
    //             $('#shop_add').html(ele);
    //         }
    //     });
    // }
    if (page == "shop_history.html") {
        var obj = array_data;
        var url = "shop/shop_history";
        // $('#date_filter').hide();
        
        console.log(moment().format('YYYY-MM-DD'))
        console.log($.cookie("detect_userclass"))
        var pass = {
            date: date,
            driver : $.cookie("detect_user"),
            type : 'his'
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
    }
    document.querySelector('ons-toolbar .center')
    .innerHTML = event.tabItem.getAttribute('label');
});

/******* <!-------- end run page ------------> *******/

function timestampToDate(unix_timestamp,type){
  var date = new Date(unix_timestamp*1000);
  var day = date.getDate();
  var month = date.getMonth()+1;
  if(month<=10){
   month = "0"+month;
}
if(day<=10){
   day = "0"+day
}
var year = date.getFullYear();
var txt_date = year+"-"+month+"-"+day;

var hours = date.getHours();
var minutes = "0" + date.getMinutes();
var seconds = "0" + date.getSeconds();
var formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
		//return formattedTime;
		if(type=="date"){
			return txt_date;
		}else if(type=="time"){
			return formattedTime;
		}else{
			return txt_date+" "+formattedTime;
		}
		
   }

   /******* <!-------- function Income ------------> *******/
   function openViewPrice(id){
     fn.pushPage({
        'id': 'popup_shop_checkin.html',
        'title': "รายได้"
    }, 'lift-ios');
     var url = "page/call_page?&id="+id;
     console.log(url);
     $.post(url,{ path : "shop/income_driver_taxi" },function(ele){
         $('#body_shop_checkin').html(ele);
     });
 }
 function ex_booking(){
    var url = "shop/shop_history";
    console.log(moment().format('YYYY-MM-DD'))
    console.log($.cookie("detect_userclass"))
    var pass = {
        date: $('#ex_booking').val(),
        driver : $.cookie("detect_user"),
        type : 'his'
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
