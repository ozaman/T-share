var app = {};

ons.ready(function() {
    ons.createElement('action-sheet.html', {
            append: true
        })
        .then(function(sheet) {
            app.showFromTemplate = sheet.show.bind(sheet);
            app.hideFromTemplate = sheet.hide.bind(sheet);
        });
});

function showNotiHidden() {
    $.ajax({
        url: "notification/show_notification_hide?user_id=" + detect_user, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        type: 'post',
        //			data: data,
        success: function(res) {
            console.log(res);
            loadNotificationPage();
        }
    });
}

function settingNoti() {
    fn.pushPage({
        'id': 'popup2.html',
        'title': 'ตั้งค่าการแจ้งเตือน'
    }, 'lift-ios');
    $.post("page/call_page", {
        path: "page/setting_notification"
    }, function(ele) {
        $('#body_popup2').html(ele);
    });
}

function hiddenNotiAll() {
    $.ajax({
        url: "notification/hide_notification_all?user_id=" + detect_user, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        type: 'post',
        //			data: data,
        success: function(res) {
            console.log(res);
            $('.card-activity').css('background-color', '#fff');
            setCountNotification();
        }
    });
}

function hiddenNotification(id) {
    console.log("+" + id);
}

function deletedNotification(id) {
    console.log("+" + id);
}

function openNotification(id, type, txt_type, i_event) {
    console.log(id + " : " + type + " || " + i_event);
    fn.pushPage({
        'id': 'popup1.html',
        'title': txt_type
    }, 'lift-ios');
    makeReadNotification(id);

    if (type == 1) {
        openShopNotification(i_event);
    } else if (type == 2) {
        openTransferNotification(i_event);
    } else if (type == 3) {
        openIncomeNotification(i_event);
    } else if (type == 4) {
        openPayNotification(i_event);
    } else if (type == 5) {
        openInformMoneyNotification(i_event);
    } else if (type == 6) {
        openWithdrawMoneyNotification(i_event);
    }

}

function openWithdrawMoneyNotification(i_event) {


}

function openInformMoneyNotification(i_event) {
    $('#body_popup1').html(progress_circle);
    var url = "page/call_page?deposit_id=" + i_event;
    $.post(url, {
        path: "wallet/detail_history"
    }, function(ele) {
        $('#body_popup1').html(ele);
    });
}

function openPayNotification(i_event) {

}

function openIncomeNotification(i_event) {

}

function openTransferNotification(i_event) {

}

function openShopNotification(i_event) {
    var data = {
        id: i_event
    }
    $.ajax({
        url: "shop/get_data_shop", // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        type: 'post',
        data: data,
        success: function(detailObj) {
            console.log(detailObj);
            var url = "shop/detail_shop" + "?user_id=" + $.cookie("detect_user");
            $.post(url, detailObj, function(data) {

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
                /*$('.page').animate({
        scrollTop: $( '#btn_driver_topoint' ).offset().top
    }, 500);*/
            });
            $('#check_open_shop_id').val(detailObj.id);
        }
    });
}

function makeReadNotification(id) {
    var data = {
        i_active: 1
    };
    $.ajax({
        url: "notification/read_notification?id=" + id, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        type: 'post',
        data: data,
        success: function(res) {
            console.log(res);
            if (res.result == true) {
                setCountNotification();
                $('#card-ac_' + id).css('background-color', '#fff');
                $('#icon_read_'+id).hide();
            }
        }
    });
}

function makeUnReadNotification() {
    var id = $('#id_notification_select').val();
    var data = {
        i_active: 0
    };
    $.ajax({
        url: "notification/read_notification?id=" + id, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        type: 'post',
        data: data,
        success: function(res) {
            console.log(res);
            if (res.result == true) {
                setCountNotification();
                $('#card-ac_' + id).css('background-color', '#edf2fa');
                $('#icon_read_'+id).show();
                app.hideFromTemplate();
            }
        }
    });
}

function deleteNotification() {
    modal.show();
    var id = $('#id_notification_select').val();
    var data = {
        id: id
    };
    $.ajax({
        url: "notification/delete_notification", // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        type: 'post',
        data: data,
        success: function(res) {
            console.log(res);
            if (res.deleted == true) {
                loadNotificationPage();
                setCountNotification();
                //					$('#card-ac_'+id).remove();
                app.hideFromTemplate();
                modal.hide();
            }
        }
    });
}

function changeStatusNotification(status) {
    var id = $('#id_notification_select').val();
    var data = {
        i_status: status
    };
    $.ajax({
        url: "notification/change_status_notification?id=" + id, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        type: 'post',
        data: data,
        success: function(res) {
            console.log(res);
            if (res.result == true) {
                //					loadNotificationPage();
                $('#card-ac_' + id).fadeOut(1000);
                setCountNotification();
                app.hideFromTemplate();
            }
        }
    });
}

function loadMoreNoti() {

    $('#icons_load_more_noti').show();
    $('#btn_load_more_noti').attr('disabled', 'disabled');

    var start = $('#check_data_load_start').val();

    var limit = $('#check_data_load_limit').val();

    $.ajax({
        url: "notification/load_more_noti?start=" + start + "&limit=" + limit,
        dataType: 'json',
        type: 'get',
        //			data: data,
        success: function(res) {
            console.log(res);

            if (res.numrow <= 0) {
                return;
            }
            $.each(res.data, function(index, value) {
                //					console.log(value.id);
                $.post("component/list_notification", value, function(cpn) {
                    $("#list_noti_data").append(cpn);
                });
            });
            $('#check_data_load_start').val(parseInt(start) + parseInt(limit));
            if (res.rest <= 0) {
                $('#box_load_more_noti').fadeOut(700);
            }
            /*$('#btn_load_more_noti').show();
            $('#progress_load_more_noti').hide();*/
            //				$('#txt_load_more_noti').show();
            $('#icons_load_more_noti').hide();
            $("#btn_load_more_noti").removeAttr("disabled");
        }
    });
}

function CheckTimeNotification(d1, d2) {
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

    if (days >= 1) {
        return day_txt + "ที่แล้ว";
    }

    if (hrs_d_bc == 0) {
        h_txy = '';
    } else {
        h_txy = ' ' + hrs_d_bc + ' ชั่วโมง';
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

function switchSetting(type, ip){
	var status = $('#'+ip).val();
//	console.log()
	if(status==0){
		$('#'+ip).val(1);
	}
	else{
		$('#'+ip).val(0);
	}
	var param = {
		user_id : detect_user,
		status : status
	}
	var url = "main/switch_setting?type=" + type;
	console.log(url)
	$.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        type: 'post',
        data: param,
        success: function(res) {
            console.log(res);
            /*if (res.result == true) {
                setCountNotification();
                $('#card-ac_' + id).css('background-color', '#edf2fa');
                app.hideFromTemplate();
            }*/
        }
    });
}