var app = {};

ons.ready(function () {
  ons.createElement('action-sheet.html', { append: true })
    .then(function (sheet) {
      app.showFromTemplate = sheet.show.bind(sheet);
      app.hideFromTemplate = sheet.hide.bind(sheet);
    });
});



function hiddenActivity(id){
	console.log("+"+id);
}

function deletedActivity(id){
	console.log("+"+id);
}

function openActivity(id, type, txt_type, i_event){
	console.log(id+" : "+type+ " || "+i_event);
	fn.pushPage({
        'id': 'popup1.html',
        'title': txt_type
    }, 'lift-ios');
    makeReadActivity(id);
    
	if(type==1){
		openShopActivity(i_event);
	}
	else if(type==2){
		openTransferActivity(i_event);
	}
	else if(type==3){
		openIncomeActivity(i_event);
	}
	else if(type==4){
		openPayActivity(i_event);
	}
	else if(type==5){
		openInformMoneyActivity(i_event);
	}
	else if(type==6){
		openWithdrawMoneyActivity(i_event);
	}
    
}

function openWithdrawMoneyActivity(i_event){
	
    
}

function openInformMoneyActivity(i_event){
	$('#body_popup1').html(progress_circle);
	var url = "page/call_page?deposit_id="+i_event;
    $.post(url,{ path: "wallet/detail_history" },function(ele){
    	$('#body_popup1').html(ele);
    });
}

function openPayActivity(i_event){

}	

function openIncomeActivity(i_event){
	
}

function openTransferActivity(i_event){
	
}

function openShopActivity(i_event){
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

function makeReadActivity(id){
	var data = {
		i_active : 1
	};
	$.ajax({
			url: "activity/read_activity?id="+id, // point to server-side PHP script 
			dataType: 'json', // what to expect back from the PHP script, if anything
			type: 'post',
			data: data,
			success: function(res) {
				console.log(res);
				if(res.result==true){
					setCountActivity();
					$('#card-ac_'+id).css('background-color','#fff');
				}
			}
	});
}

function makeUnReadActivity(){
	var id = $('#id_activity_select').val();
	var data = {
		i_active : 0
	};
	$.ajax({
			url: "activity/read_activity?id="+id, // point to server-side PHP script 
			dataType: 'json', // what to expect back from the PHP script, if anything
			type: 'post',
			data: data,
			success: function(res) {
				console.log(res);
				if(res.result==true){
					setCountActivity();
					$('#card-ac_'+id).css('background-color','#edf2fa');
					app.hideFromTemplate();
				}
			}
	});
}

function deleteActivity(){
	modal.show();
	var id = $('#id_activity_select').val();
	var data = {
		id : id
	};
	$.ajax({
			url: "activity/delete_activity", // point to server-side PHP script 
			dataType: 'json', // what to expect back from the PHP script, if anything
			type: 'post',
			data: data,
			success: function(res) {
				console.log(res);
				if(res.deleted==true){
					loadActivityPage();
					setCountActivity();
//					$('#card-ac_'+id).remove();
					app.hideFromTemplate();
					modal.hide();
				}
			}
	});
}

function changeStatusActivity(status){
	var id = $('#id_activity_select').val();
	var data = {
		i_status : status
	};
	$.ajax({
			url: "activity/change_status_activity?id="+id, // point to server-side PHP script 
			dataType: 'json', // what to expect back from the PHP script, if anything
			type: 'post',
			data: data,
			success: function(res) {
				console.log(res);
				if(res.result==true){
//					loadActivityPage();
					$('#card-ac_'+id).fadeOut(1000);
					setCountActivity();
					app.hideFromTemplate();
				}
			}
	});
}

function loadMoreActivity(last_date){
	$('#icons_load_more_acti').show();
	$('#btn_load_more_acti').attr('disabled','disabled');

	var start = $('#check_data_load_start_acti').val();

	var limit = $('#check_data_load_limit_acti').val();

	$.ajax({
			url: "activity/load_more_acti?start="+start+"&limit="+limit, 
			dataType: 'json',
			type: 'get',
//			data: data,
			success: function(res) {
				console.log(res);
				
				if(res.numrow<=0){
					return;
				}
//				$.each(res.data, function( index, value ) {
//					console.log(value.id);
					$.post("component/list_activity?last_date="+last_date,{ data : res.data},function(cpn){
				    	$("#list_acti_data").append(cpn);
				    });
//				});
				$('#check_data_load_start_acti').val(parseInt(start) + parseInt(limit));
				if(res.rest<=0){
					$('#box_load_more_acti').fadeOut(700);
				}

				$('#icons_load_more_acti').hide();
				$("#btn_load_more_acti").removeAttr("disabled");
			}
	});
}