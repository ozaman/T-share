<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta charset="utf-8">
		<title></title>
	</head>
  
  <link rel="stylesheet" href="<?=base_url();?>assets/onsenui/css/onsenui.css?v=<?=time()?>">
  <link rel="stylesheet" href="<?=base_url();?>assets/onsenui/css/onsen-css-components.css?v=<?=time()?>">
  <script src="<?=base_url();?>assets/onsenui/js/onsenui.min.js?v=<?=time()?>"></script>
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/ultimate/flaticon.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/airport/flaticon.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/payment/css/fontello.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/icomoon/demo-files/demo.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/app/css/app-icon.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/app-new/css/app-icon.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/extra.main.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/custom.css?v=<?=time()?>">
    
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://www.welovetaxi.com:3443/socket.io/socket.io.js?v=<?=time();?>"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  
	<body>
	<script>
		var base_url = "<?=base_url();?>";
		var detect_user = $.cookie("detect_user");
   	  	var class_user = $.cookie("detect_userclass");
      	var username = $.cookie("detect_username");
	</script>
	<ons-navigator swipeable id="myNavigator" page="page1.html"></ons-navigator>

	<template id="page1.html">
	  	<ons-page id="page1">
	    
	    <div id="body_to_append">
	    	
	    </div>
	    
	  	</ons-page>
	</template>

	</body>

	<script>
		var array_rooms;
var res_socket;
var socket = io.connect('https://www.welovetaxi.com:3443');

var shop_frist_run = 0;
var frist_socket = true;

socket.on('getbookinglab', function(data) {
    //console.log(data.booking)
    array_data = [];
    var done = [];
    var none = [];
    $.each(data.booking, function(index, value) {
        var current = formatDate(new Date());
        var db = formatDate(value.transfer_date);
        if (value.driver_complete == 0) {
            if (class_user == "lab") {
                if (db == current) {
                    done.push(value);
                }
            } else {
                if (db == current && value.drivername == detect_user) {
                    done.push(value);
                }
            }
        }
    });
    array_data = {
        manage: done,
        history: none
    };
                console.log(array_data.manage);
    if (done.length > 0) {
        $('#number_shop').show();
        //			$('#circle_icon_shop').addClass("pulse");
    } else {
        $('#number_shop').hide();
        //			$('#circle_icon_shop').removeClass("btn-floating pulse pd-5");
    }
    $('#number_shop').text(done.length);
    if ($('#number_shop').text() != 0) {
        $('#num_manage').show();
        $('#num_manage').html($('#number_shop').text());
    }else{
		$('#num_manage').hide();
	}

    /* check open order id auto */
    if (frist_socket == true) {
        var url_string = window.location.href; //window.location.href
        var url = new URL(url_string);
        var get_order_id = url.searchParams.get("order_id");
        //        var get_order_id = "<?=$_GET['order_id'];?>";
        var status = url.searchParams.get("status");
        var open_ic = url.searchParams.get("open_ic");;
        if (get_order_id != "") {
            if (status == "his") {
                openOrderFromAndroidHistory(get_order_id, status, open_ic);
            } else {
//                console.log("order id : " + get_order_id);
//                console.log(array_data);
                $.each(array_data.manage, function(index, value) {
                    if (value.id == get_order_id) {
                        console.log(value.id + " : " + index);
                        $('#check_open_num_detail').val(index)
                        $('#check_open_shop_id').val(value.id);
                        openDetailShop(index, '');
                    }
                });
            }
        }
        frist_socket = false;
    }
});

function openDetailShop(key, type) {
    var detailObj = array_data.manage[key];
  
    console.log(detailObj);
    var url = base_url+"shop/detail_shop" + "?user_id=" + $.cookie("detect_user");
    $.post(url, detailObj, function(data) {
//    	console.log(data);
        $('#body_to_append').html(data);
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
//    $('#check_open_shop_id').val(detailObj.id);
}

/******* <!-------- Change html CheckIn ------------> *******/

function changeHtml(type, id, st) {
//	new Date(unixtimestamp*1000);
    $('#status_' + type).html('<div class="font-16"><i class="fa fa-clock-o fa-spin 6x" style="color:#88B34D"></i><span> เวลา ' + st + '</span></div>');
    $('#iconchk_' + type).attr("src", base_url+"assets/images/yes.png");
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
        url: '../../data/fileupload/store/' + type + '_' + id + '.jpg',
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
function checkPhotoCheckIn(type, id) {
    if ($('#' + type + '_check_click').val() == 1) {
        $('#' + type + '_locat_off').hide();
        $('#' + type + '_locat_on').show();

    } else {
        $('#' + type + '_locat_off').show();
        $('#' + type + '_locat_on').hide();
    }
    $.ajax({
        url: '../../data/fileupload/store/' + type + '_' + id + '.jpg',
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
/******* <!-------- End Change html CheckIn ------------> *******/


	</script>
	<script>
		function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();
    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;
    return [year, month, day].join('-');
}

function formatTime(date) {
    var d = new Date(date),
        hour = '' + d.getHours(),
        minutes = d.getMinutes();
    if (hour < 10) {
        hour = "0" + hour;
    }
    if (minutes < 10) {
        minutes = "0" + minutes;
    }
    return [hour, minutes].join(':');
}
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
	</script>
</html>