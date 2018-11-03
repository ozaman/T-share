<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta charset="utf-8">
		<title></title>
	</head>
  <?php 
if($this->Mobile_model->version('iPad')){
    // Code to run for the Apple iOS platform.
$fontmobile=0;
$detectname='iPad';
$menu_ion_class = "icon-menu-ios";
$border_menu_color = "#ccc";
}
if($this->Mobile_model->version('iPhone')){
    // Code to run for the Apple iOS platform.
$fontmobile=0;
$detectname='iPhone';
$menu_ion_class = "icon-menu-ios";
$border_menu_color = "#ccc";
}
if($this->Mobile_model->version('Android')){
    // Code to run for the Apple iOS platform.
$fontmobile=6;
$detectname='Android';
$menu_ion_class = "icon-menu-android";
$border_menu_color = "#eee";
}
else {
$fontmobile=6;	
$detectname='Other';
$menu_ion_class = "icon-menu-ios";
$border_menu_color = "#ccc";
}
$border_menu_color = "border-bottom: 1px solid ".$border_menu_color;
?>
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
  <script src="<?=base_url();?>assets/plugin/moment.js?v=<?=time()?>"></script>
	<body>
      <input type="hidden" value="<?=$_GET[order_id];?>" id="check_open_shop_id" />
	<ons-modal direction="up">
	    <div style="text-align: center;">
	        <p sty>
	            <ons-icon icon="md-spinner" size="25px" spin></ons-icon> <span size="18px">Loading...</span>
	        </p>
	    </div>
	</ons-modal>
	<script>
		var modal = document.querySelector('ons-modal');
//		modal.show();
		var today = "<?=date('Y-m-d');?>";
		var base_url = "<?=base_url();?>";
		var detect_user = $.cookie("detect_user");
   	  	var class_user = $.cookie("detect_userclass");
      	var username = $.cookie("detect_username");
      	var get_order_id = '<?=$_GET[order_id];?>';
        var status = '<?=$_GET[status];?>';
        var open_ic = '<?=$_GET[open_ic];?>';
        var detect_mb = "<?=$detectname;?>";
	</script>
	<ons-navigator swipeable id="appNavigator" page="page1.html"></ons-navigator>

	<template id="page1.html">
	  	<ons-page id="page1">
	    
	    <div id="body_popup1">
	    	
	    </div>
	    
	  	</ons-page>
	</template>
	 <template id="popup_shop_checkin.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button class="option-back">กลับ</ons-back-button>
                </div>
                <div class="center"></div>
                <div class="right">
			      <ons-toolbar-button onclick="reloadApp();">
			        <ons-icon icon="ion-home, material:md-home"></ons-icon>
			      </ons-toolbar-button>
			    </div>
            </ons-toolbar>
            <input type="hidden" id="type_checkin" value="xx" />
            <div id="body_shop_checkin">
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
	        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
	      }
	    </script>
        </ons-page>
    </template>
	<template id="popup2.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
               
            </ons-toolbar>
            <div id="body_popup2">
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>
	</body>
    <script>
	var array_rooms;
var res_socket;
var socket = io.connect('https://www.welovetaxi.com:3443');
var check_run_shop = 0;
//on message received we print all the data inside the #container div
socket.on('notification', function(data) {
    //          console.log("Start Socket");
    //    			console.log(data);
    if (typeof data.transfer !== 'undefined' && data.transfer.length > 0) {
        res_socket = data.transfer[0];
        if (data.transfer[0].length > 0) {
            $('#number_tbooking').show();
        } else {
            $('#number_tbooking').hide();
        }
        $('#number_tbooking').text(data.transfer[0].length);
        if ($('#check_open_worktbooking').val() == 1) {
            console.log(data.transfer);
            $('#tab-trans_job').attr('badge', data.transfer[0].length);
            //        console.log('now open popup');
            readDataBooking();
        }
    }
});
var frist_socket = true;

socket.on('getbookinglab', function(data) {
    //    console.log(data.booking)

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


    //                console.log(array_data.manage);

    if (check_run_shop != done.length) {
        shopManage();
        check_run_shop = done.length;
    }

    if (done.length > 0) {
        $('#number_shop').show();
    } else {
        $('#number_shop').hide();
    }

    $('#number_shop').text(done.length);

    if ($('#number_shop').text() > 0) {
        $('#tab_shop_mn').attr('badge', done.length);
    } else {
        $('#tab_shop_mn').removeAttr("badge");
    }

    /* check open order id auto */
    if (frist_socket == true) {
        var url_string = window.location.href; //window.location.href
        var url = new URL(url_string);

        console.log(get_order_id);
        if (get_order_id != "") {
            if (status == "his") {
                openOrderFromAndroidHistory(get_order_id, status, open_ic);
            } 
            else {
// alert(123);
                $.each(array_data.manage, function(index, value) {
                    if (value.id == get_order_id) {
                                            	
                        console.log(value.id + " : " + index);
                        $('#check_open_num_detail').val(index)
                        $('#check_open_shop_id').val(value.id);
                        if (detect_mb == "Android") {
                            var type_m = "android";
                        } else {
                            var type_m = "ios";
                        }
                        openDetailShop(index, type_m);
                    }
                });
            }
        }
        else{
          alert();
        }        frist_socket = false;
    }
});
var id = detect_user;
var dataorder = {
    order: parseInt(id),
};

socket.on('connect', function(){
	  // call the server-side function 'adduser' and send one parameter (value of prompt)
	  // socket.emit('addroom', prompt("What's your name?"));
//	  socket.emit('addroom', name);
//	  socket.emit('sendchat', '');
	  socket.emit('adduser', dataorder);
});
	 
function addUser() {
    var id = detect_user;
    var dataorder = {
        order: parseInt(id),
    };
	
}

socket.on('updaterooms', function(rooms, current_room) {
    $('#rooms').empty();
    console.log(rooms)
    array_rooms = rooms;
    console.log(current_room)
});

socket.on('datalab', function(username, data) {
    console.log('***********************datalab***************************')
    console.log(username)
    console.log(data)

    //console.log(data[0].id);
    var check_open = $('#check_open_shop_id').val();
    if (check_open != 0) {
        $.each(data, function(index, value) {
            console.log(data)
            if (value.id == check_open) {
                console.log(value);

                if (value.check_driver_topoint == 1) {
                    console.log("driver_topoint");
                    changeHtml("driver_topoint", value.id, timestampToDate(value.driver_topoint_date, "time"));
                }
                if (value.check_guest_receive == 1) {
                    console.log("guest_receive");
                    changeHtml("guest_receive", value.id, timestampToDate(value.guest_receive_date, "time"));

                }
                if (value.check_guest_register == 1) {
                    console.log("guest_register");
                    changeHtml("guest_register", value.id, timestampToDate(value.guest_register_date, "time"));
                    //					alert(value.pax_regis);
                    $('#num_edit_persion2').val(value.pax_regis);
                }

                if (value.check_driver_pay == 1 && value.check_lab_pay == 1) {
                    loadBoxConfirmPay(value.id);
                    return;
                }
                if (value.check_driver_pay == 1) {
                    loadBoxConfirmPay(value.id);
                }
                if (value.check_lab_pay == 1) {
                    loadBoxConfirmPay(value.id);
                }

            }
        });
    }

    if ($('#open_shop_manage').val() == 1) {
        $.each(data, function(index, value) {

            if (value.lab_approve_job == 1) {
                if (value.check_driver_topoint == 1) {
                    $('#btn_manage_topoint_' + value.id).hide();
                    $('#btn_manage_' + value.id).show();


                } else {
                    $('#btn_manage_topoint_' + value.id).show();
                    $('#btn_manage_' + value.id).hide();
                }
                $('#date_approved_job_' + value.id).show();
                $('#txt_date_approved_job_' + value.id).text(timestampToDate(value.lab_approve_job_date, 'time'));
                $('#txt_wait_' + value.id).hide();
                $('#td_cancel_book_' + value.id).hide();
                $('#status_book_' + value.id).html('<strong><font color="#ff0000">รอตอบรับ</font></strong>');


                $('#view_lab_approve_' + value.id).show();


                $.ajax({
                    url: "main/get_data_user?id=" + value.lab_approve_job_post,
                    //					           data: pass,
                    type: 'post',
                    dataType: 'json',
                    success: function(res) {
                        console.log(res);
                        var url_photo_lab = "../data/pic/driver/small/" + res.username + ".jpg?v=" + $.now();
                        $('#view_lab_approve_' + value.id).attr('onclick', 'modalShowImg("' + url_photo_lab + ',' + res.nickname + '");');
                        //					               $('#text_name_approved').text(res.nickname);
                    }
                });



            } else {


                $('#btn_manage_topoint_' + value.id).hide();
                $('#txt_wait_' + value.id).show();
                $('#td_cancel_book_' + value.id).show();
                $('#status_book_' + value.id).html('<strong><font color="#54c23d">ยืนยันแล้ว</font></strong>');
                $('#view_lab_approve_' + value.id).hide();
            }

            if (value.status != $('#check_status_' + value.id).val()) {
                var pass = {
                    data: value
                };
                console.log(pass);
                var url = "component/list_shop_manage";
                $.ajax({
                    url: url,
                    data: pass,
                    type: 'post',
                    success: function(ele) {
                        $('#list_shop_manage_' + value.id).html(ele);
                    }
                });
            }
        });
        //        shopManage();

    }
    setCountNotification();
});

socket.on('updatedriver', function(username, data) {
    //	alert(data.pax_regis);
    console.log("++++++++++++++++++++++datadriver++++++++++++++++++++++++++++++++")
    console.log(username)
    console.log(data)
    //console.log(array_rooms)
    var check_open = $('#check_open_shop_id').val();

    if (check_open != 0) {

        if (data.id == check_open) {
            console.log(data)
            console.log(data.id);

            if (data.check_driver_topoint == 1) {
                console.log("driver_topoint");
                changeHtml("driver_topoint", data.id, timestampToDate(data.driver_topoint_date, "time"));
                $('.page').animate({
                    scrollTop: $(document).height()+700
                  }, 500);
            }
            if (data.check_guest_receive == 1) {
                console.log("guest_receive");
                changeHtml("guest_receive", data.id, timestampToDate(data.guest_receive_date, "time"));

                $('#step_guest_register').show();
                $('.page').animate({
                    scrollTop: $(document).height()+700
                }, 500);
            }
            if (data.check_guest_register == 1) {
                console.log("guest_register");
                changeHtml("guest_register", data.id, timestampToDate(data.guest_register_date, "time"));

                $('#num_edit_persion2').val(data.pax_regis);
                //            $('#step_driver_pay_report').show();
            }
            /*if (data.check_driver_pay_report == 1) {
                console.log("driver_pay_report");
                changeHtml("driver_pay_report", data.id,timestampToDate(data.driver_pay_report_date, "time"));
            }*/

        }

    }

    console.log($('#open_shop_manage').val());
    //    alert($('#open_shop_manage').val())
    if ($('#open_shop_manage').val() == 1) {
        console.log("*************************************");

        if (data.lab_approve_job == 1) {
            if (data.check_driver_topoint == 1) {

                $('#btn_manage_topoint_' + data.id).hide();
                $('#btn_manage_' + data.id).show();

            } else {
                $('#btn_manage_topoint_' + data.id).show();
                $('#btn_manage_' + data.id).hide();
            }
            $('#date_approved_job_' + data.id).show();
            $('#txt_date_approved_job_' + data.id).text(timestampToDate(data.lab_approve_job_date, 'time'));
            $('#txt_wait_' + data.id).hide();
            $('#td_cancel_book_' + data.id).hide();
            $('#status_book_' + data.id).html('<strong><font color="#ff0000">รอตอบรับ</font></strong>');


            /*$('#view_lab_approve_'+value.id).show();
            var url_photo_lab = "../data/pic/driver/small/"+value.lab_approve_job_post+".jpg";
            $('#view_lab_approve_'+value.id).attr('onclick','modalShowImg("");');*/

        } else {
            $('#btn_manage_' + data.id).hide();
            $('#txt_wait_' + data.id).show();
            $('#td_cancel_book_' + data.id).show();
            $('#status_book_' + data.id).html('<strong><font color="#54c23d">ยืนยันแล้ว</font></strong>');
        }

    }
    setCountNotification();
    if ($('#check_open_noti_menu').val() == 1) {
        loadNotificationPage();
    }

});
</script>
	<script>
		window.fn = {};
		window.fn.toggleMenu = function() {
        document.getElementById('appSplitter').left.toggle();
    };
    window.fn.loadView = function(index) {
        document.getElementById('appTabbar').setActiveTab(index);
        document.getElementById('sidemenu').close();
    };
    window.fn.loadLink = function(url) {
        window.open(url, '_blank');
    };
    window.fn.pushPage = function(page, anim) {
        console.log(page);
        if(page.id=="option.html"){
			console.log("option");
			if(page.open=="car_brand"){
				$.ajax({
	            url: "main/data_car_brand", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {
	            	var d1 = [],d2 = [];
	            	$.each(res, function( index, value ) {
					  	if(value.popular>0){
							d1.push(value);
						}else{
							d2.push(value);
						}
					});
					var param = { data2 : d2, data1 : d1};
					console.log(param);
	                $.post("component/cpn_car_brand",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="car_type"){
				$.ajax({
	            url: "main/data_car_type", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_car_type",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="car_color"){
				$.ajax({
	            url: "main/data_car_color", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_car_color?plate=0",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="plate_color"){
				$.ajax({
	            url: "main/data_car_plate", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_car_plate",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="car_province"){
				$.ajax({
	            url: "main/data_car_province", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
	            	console.log(res);
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_user_province?type=car",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="user_province"){
				$.ajax({
	            url: "main/data_user_province", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
	            	console.log(res);
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_user_province?type=user",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="bank_list"){
				$.ajax({
	            url: "main/data_bank_list", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
	            	console.log(res);
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_bank_list",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="car_ins"){
				$.ajax({
	            url: "main/data_car_ins_list", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
	            	console.log(res);
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_car_ins",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
		}
        if (anim) {
            document.getElementById('appNavigator').pushPage(page.id, {
                data: {
                    title: page.title
                },
                animation: anim
            });
        } 
		else {
            document.getElementById('appNavigator').pushPage(page.id, {
                data: {
                    title: page.title
                }
            });
        }
    };
	</script>
<script src="<?=base_url();?>assets/custom.js?<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/shop.js?v=<?=time();?>"></script>
<?php   $lng_map = $google_map_api_lng;?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&libraries=places&language=<?= $lng_map; ?>"></script>
</html>