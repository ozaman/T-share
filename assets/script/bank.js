console.log("Bank Page");

setTimeout(function(){
	setnumbank();
	if($('#detect_num_bank').val()==0){
		addBank();
	}
}, 500);
function reloadPageBank(){
	var url = "page/call_page";
    $.post(url, {
        path: "bank/bank_view"
    }, function(ele) {
        $('#body_account_bank').html(ele);
        setnumbank();
        
    });
}
function addBank(){
	 fn.pushPage({
        'id': 'popup1.html',
        'title': 'เพิ่มข้อมูลบัญชี'
    }, 'lift-ios')
    var url = "page/call_page";
    $.post(url, {
        path: "bank/bank_add"
    }, function(ele) {
        $('#body_popup1').html(ele);
        focusBoxBank();
    });
}

function setnumbank(){
	$('#txt_num_bank_open').text($('#num_open_bank').val());
	$('#txt_num_bank_close').text($('#num_close_bank').val());
	$('#num_bank_home').text($('#detect_num_bank').val());
}

function editBank(id){
	  fn.pushPage({
	        'id': 'popup1.html',
	        'title': 'แก้ไขข้อมูลบัญชี'
	    }, 'lift-ios')
	    var url = "page/call_page?id=" + id;
	    $.post(url, {
	        path: "bank/bank_edit"
	    }, function(ele) {
	        $('#body_popup1').html(ele);
			checkPicBank(id,'pv_img_book_bank',0);
	    });
}

function checkPicBank(id, img, view) {
    console.log(id+" | "+ img+ " | "+view);
    var p1 = '../data/pic/driver/book_bank/' + id + '.jpg?v=' + $.now();
    $.ajax({
        url: p1,
        type: 'HEAD',
        error: function() {
            console.log('Error file');
            //					$('#'+id+'_pic_car_1').hide();
        },
        success: function() {

            $('#'+img).attr('src', p1);
            iconsHasPic(1, "txt-img-has-img_book_bank", "txt-img-nohas-img_book_bank");
            if(view==1){
				$('#'+img).attr('onclick', 'viewPhotoGlobal(\'' + p1 + '\', "")' );
			}
            
        }
    });
   
}

function changeBankOften(id){
	modal.show();
    console.log(id);
    var data = {
        bank_id: id,
        driver_id: $.cookie("detect_user")
    };
    var url = "bank/change_bank_often";
    $.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        data: data,
        type: 'post',
        success: function(res) {
            console.log(res);

            ons.notification.alert({
                    message: 'ใช้บัญชีนี้ เป็นบัญชีประจำแล้ว',
                    title: "สำเร็จ",
                    buttonLabel: "ปิด"
                })
                .then(function() {
                    modal.hide();
                     reloadPageBank();
                });

        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });
}

function changeBankStatus(id, status){
	
	modal.show();
    console.log(id);
    if (status == 0) {
        var messages = "หยุดใช้งานบัญชีนี้แล้ว";
        if ($('#detect_num_bank').val() == 1) {
            alert($('#detect_num_bank').val());
            ons.notification.alert({
                    message: "ไม่สารมารถยกเลิกใช้งานได้ เนื่องจากต้องมีบัญชีที่เปิดใช้งานอย่างน้อย 1 บัญชี",
                    title: "ขออภัย",
                    buttonLabel: "ปิด"
                })
                .then(function() {
                    modal.hide();
                });
            return;
        }
    } 
	
	else {
        var messages = "เปิดใช้งานบัญชีนี้แล้ว";
    }
    
	 var data = {
        bank_id: id,
        status: status,
        driver_id: $.cookie("detect_user")
     };
    
	var url = "bank/change_status_bank";
    $.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        data: data,
        type: 'post',
        success: function(res) {
            console.log(res);
            if (res.check == false) {
                ons.notification.alert({
                        message: "ไม่สารมารถยกเลิกใช้งานได้ เนื่องจากต้องมีบัญชีที่เปิดใช้งานอย่างน้อย 1 บัญชี",
                        title: "ขออภัย",
                        buttonLabel: "ปิด"
                    })
                    .then(function() {
                        modal.hide();
                        return;
                    });
            } else {
                if (res.data.result == true) {
                    ons.notification.alert({
                            message: messages,
                            title: "สำเร็จ",
                            buttonLabel: "ปิด"
                        })
                        .then(function() {
                            modal.hide();
                            $.post("bank/check_num_bank", {
                                driver_id: $.cookie("detect_user")
                            }, function(res) {
                                console.log(res);
                                reloadPageBank();
                            });
                        });
                }
            }
        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });
}

function selectBankList(id) {
    console.log(id);
    var txt = $('#item_bank_list_' + id).data('name');
    /*$('#img_plate_color_show').attr('src', "assets/images/car/plate/" + img);*/
    $('#bank').val(id);
    $('#txt_bank').text(txt);
    $('#txt_bank').css("color","#1f1f21");
    /*$('#plate_color_txt').val(val);
    $('#txt_plate_color').text(val);
    $('#img_plate_color_show').show();*/
    $('ons-back-button').click();
    putNextBank();
}

function submitEditBank(){
	if ($('input[name="bank_name"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาระบุชื่อบัญชี',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('input[name="bank_name"]').focus();
            });
        return;
    }

    if ($('input[name="bank"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาเลือกธนาคาร',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('input[name="bank"]').focus();
            });
        return;
    }
    if ($('input[name="bank_branch"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาระบุสาขาธนาคาร',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('input[name="bank_branch"]').focus();
            });
        return;
    }
    if ($('input[name="pay_bank_number"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาระบุเลขที่บัญชี',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('input[name="pay_bank_number"]').focus();
            });
        return;
    }
    
     modal.show();

    var data = new FormData($('#form_editbank')[0]);
	var id = $('#id_bank').val();
    var url = "bank/edit_bank?id=" + id;

    $.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: 'post',
        success: function(res) {
            console.log(res);
            if (res.data.result == true) {

                ons
                    .notification.alert({
                        message: 'แก้ไขข้อมูลบัญชีสำเร็จ',
                        title: "สำเร็จ",
                        buttonLabel: "ปิด"
                    })
                    .then(function() {
                        modal.hide();

                       reloadPageBank();
                        
                    });

            } else {
                ons
                    .notification.alert({
                        message: 'ไม่สามารถเแก้ไขข้อมูลบัญชีได้ กรุณาลองใหม่อีกครั้ง',
                        title: "ผิดพลาด",
                        buttonLabel: "ปิด"
                    });
                modal.hide();
            }

        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });
}

function submitAddBank() {
    if ($('input[name="bank_name"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาระบุชื่อบัญชี',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('input[name="bank_name"]').focus();
            });
        return;
    }

    if ($('input[name="bank"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาเลือกธนาคาร',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('input[name="bank"]').focus();
            });
        return;
    }
    if ($('input[name="bank_branch"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาระบุสาขาธนาคาร',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('input[name="bank_branch"]').focus();
            });
        return;
    }
    if ($('input[name="pay_bank_number"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาระบุเลขที่บัญชี',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('input[name="pay_bank_number"]').focus();
            });
        return;
    }

    /*if ($('#img_car_3').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาอัพโหลดภาพในรถ',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
            });
        return;
    }*/
    
    modal.show();

    var data = new FormData($('#form_addbank')[0]);

    var url = "bank/add_bank?driver_id=" + $.cookie("detect_user");

    $.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: 'post',
        success: function(res) {
            console.log(res);
            if (res.data.result == true) {

                ons
                    .notification.alert({
                        message: 'เพิ่มข้อมูลบัญชีสำเร็จ',
                        title: "สำเร็จ",
                        buttonLabel: "ปิด"
                    })
                    .then(function() {
                        modal.hide();
						reloadPageBank();
						$('ons-back-button').click();
                       /*var url = "page/call_page";
					    $.post(url, {
					            path: "bank/bank_view"
					        }, function(ele) {
					            $('#body_account_bank').html(ele);
					            $('ons-back-button').click();
					        });*/
                        
                    });

            } else {
                ons
                    .notification.alert({
                        message: 'ไม่สามารถเพิ่มข้อมูลบัญชีได้ กรุณาลองใหม่อีกครั้ง',
                        title: "ผิดพลาด",
                        buttonLabel: "ปิด"
                    });
                modal.hide();
            }

        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });

}

function readURL(input, id, type) {
   
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {

            $('#pv_' + id).attr('src', e.target.result);

            
            if (type == "add") {
            	 var data = new FormData($('#form_addbank')[0]);
                var param_id = $('#rand').val();
            } else {
            	 var data = new FormData($('#form_editbank')[0]);
                var param_id = $('#id_bank').val();
//                $('#' + id + '_check_upload_' + num).val(1);
            }
            data.append('fileUpload', $('#' + id)[0].files[0]);
            var url_upload = "application/views/upload_img/upload.php?id=" + param_id + "&type=book_bank_img";
            console.log(url_upload);
            $.ajax({
                url: url_upload, // point to server-side PHP script 
                dataType: 'json', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: 'post',
                success: function(php_script_response) {
                    console.log(php_script_response);
                    $('#'+param_id+'_bookbank').attr('src','../data/pic/driver/book_bank/'+param_id+'.jpg?v=xxx');
//                    console.log($('#'+param_id+'_bookbank'));
					
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
        reader.readAsDataURL(input.files[0]);

    }

}

function focusBoxBank(){
	console.log('focus box');
	if($('input[name="bank_name"]').val()==""){
		$('#bank_name_box').addClass('border-red');
		return;
	}else{
		$('#bank_name_box').removeClass('border-red');
	}
	
	if($('input[name="bank_number"]').val()==""){
		$('#bank_number_box').addClass('border-red');
		return;
	}else{
		$('#bank_number_box').removeClass('border-red');
	}
	
	if($('input[name="bank"]').val()==""){
		$('#bank_box').addClass('border-red');
		fn.pushPage({'id': 'option.html', 'title': 'ธนาคาร', 'open':'bank_list'}, 'lift-ios')
		return;
	}else{
		$('#bank_box').removeClass('border-red');
	}
	
	if($('input[name="bank_branch"]').val()==""){
		$('#bank_branch_box').addClass('border-red');
		return;
	}else{
		$('#bank_branch_box').removeClass('border-red');
	}
	
	if($('#img_book_bank').val()==""){
		$('#img_book_bank_box').addClass('border-red');
		return;
	}else{
		$('#img_book_bank_box').removeClass('border-red');
	}
}

function putNextBank() {
//	setTimeout(function(){ focusBox(); }, 1500);
	delay(function(){
     	focusBoxBank();
    }, 1200 );
}