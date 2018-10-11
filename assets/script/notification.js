var app = {};

ons.ready(function () {
  ons.createElement('action-sheet.html', { append: true })
    .then(function (sheet) {
      app.showFromTemplate = sheet.show.bind(sheet);
      app.hideFromTemplate = sheet.hide.bind(sheet);
    });
});



function hiddenNotification(id){
	console.log("+"+id);
}

function deletedNotification(id){
	console.log("+"+id);
}

function openNotification(id, type, txt_type, i_event){
	console.log(id+" : "+type+ " || "+i_event);
	fn.pushPage({
        'id': 'popup1.html',
        'title': txt_type
    }, 'lift-ios');
    makeReadNotification(id);
    
	if(type==1){
		openShopNotification(i_event);
	}
	else if(type==2){
		openTransferNotification(i_event);
	}
	else if(type==3){
		openIncomeNotification(i_event);
	}
	else if(type==4){
		openPayNotification(i_event);
	}
	else if(type==5){
		openInformMoneyNotification(i_event);
	}
	else if(type==6){
		openWithdrawMoneyNotification(i_event);
	}
    
}

function openWithdrawMoneyNotification(i_event){
	
    
}

function openInformMoneyNotification(i_event){
	$('#body_popup1').html(progress_circle);
	var url = "page/call_page?deposit_id="+i_event;
    $.post(url,{ path: "wallet/detail_history" },function(ele){
    	$('#body_popup1').html(ele);
    });
}

function openPayNotification(i_event){
	
}	

function openIncomeNotification(i_event){
	
}

function openTransferNotification(i_event){
	
}

function openShopNotification(i_event){
	var data = {
		id : i_event
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
			        //        var obj = JSON.parse('<?=json_encode($_POST);?>');
			        var obj = detailObj;
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
			    });
			    $('#check_open_shop_id').val(detailObj.id);
			}
	});
}

function makeReadNotification(id){
	var data = {
		i_active : 1
	};
	$.ajax({
			url: "notification/read_notification?id="+id, // point to server-side PHP script 
			dataType: 'json', // what to expect back from the PHP script, if anything
			type: 'post',
			data: data,
			success: function(res) {
				console.log(res);
				if(res.result==true){
					setCountNotification();
					$('#card-ac_'+id).css('background-color','#fff');
				}
			}
	});
}

function makeUnReadNotification(){
	var id = $('#id_notification_select').val();
	var data = {
		i_active : 0
	};
	$.ajax({
			url: "notification/read_notification?id="+id, // point to server-side PHP script 
			dataType: 'json', // what to expect back from the PHP script, if anything
			type: 'post',
			data: data,
			success: function(res) {
				console.log(res);
				if(res.result==true){
					setCountNotification();
					$('#card-ac_'+id).css('background-color','#edf2fa');
					app.hideFromTemplate();
				}
			}
	});
}

function deleteNotification(){
	modal.show();
	var id = $('#id_notification_select').val();
	var data = {
		id : id
	};
	$.ajax({
			url: "notification/delete_notification", // point to server-side PHP script 
			dataType: 'json', // what to expect back from the PHP script, if anything
			type: 'post',
			data: data,
			success: function(res) {
				console.log(res);
				if(res.deleted==true){
					loadNotificationPage();
					setCountNotification();
//					$('#card-ac_'+id).remove();
					app.hideFromTemplate();
					modal.hide();
				}
			}
	});
}

function changeStatusNotification(status){
	var id = $('#id_notification_select').val();
	var data = {
		i_status : status
	};
	$.ajax({
			url: "notification/change_status_notification?id="+id, // point to server-side PHP script 
			dataType: 'json', // what to expect back from the PHP script, if anything
			type: 'post',
			data: data,
			success: function(res) {
				console.log(res);
				if(res.result==true){
//					loadNotificationPage();
					$('#card-ac_'+id).fadeOut(1000);
					setCountNotification();
					app.hideFromTemplate();
				}
			}
	});
}