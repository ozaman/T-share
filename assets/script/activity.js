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
	console.log(id+" : "+type);
	fn.pushPage({
        'id': 'popup1.html',
        'title': txt_type
    }, 'lift-ios');
    makeReadActivity(id);
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