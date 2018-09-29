function setnumcar(){
	$('#txt_num_car_open').text($('#num_open_car').val());
	$('#txt_num_car_close').text($('#num_close_car').val());
	
	$('#num_car_home').text($('#detect_num_car').val());
}
function addCar() {
    fn.pushPage({
        'id': 'popup1.html',
        'title': 'เพิ่มข้อมูลรถ'
    }, 'lift-ios')
    var url = "page/call_page";
    $.post(url, {
        path: "car/car_add"
    }, function(ele) {
        $('#body_popup1').html(ele);
        focusBox();
    });
}

function editCar(id) {
    fn.pushPage({
        'id': 'popup1.html',
        'title': 'แก้ไขข้อมูลรถ'
    }, 'lift-ios')
    var url = "page/call_page?id=" + id;
    $.post(url, {
        path: "car/car_edit"
    }, function(ele) {
        $('#body_popup1').html(ele);
        var icons = 1;
        checkPicCar(id, '', icons);
        
        checkPicAccess(id, 1);
    });
}

function changeCarOften(id) {

    modal.show();
    console.log(id);
    var data = {
        car_id: id,
        driver_id: $.cookie("detect_user")
    };
    var url = "car/change_car_often";
    $.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        data: data,
        type: 'post',
        success: function(res) {
            console.log(res);

            ons.notification.alert({
                    message: 'ใช้รถคันนี้ เป็นรถประจำแล้ว',
                    title: "สำเร็จ",
                    buttonLabel: "ปิด"
                })
                .then(function() {
                    modal.hide();
                    var url_reload = "page/call_page";
                    $.post(url_reload, {
                        path: "car/car_view"
                    }, function(ele) {
                        $('#body_car_manage').html(ele);
                    });
                });

        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });
}

function changeCarStatus(id, status) {

    modal.show();
    console.log(id);
    if (status == 0) {
        var messages = "หยุดใช้งานรถคันนี้แล้ว";
        if ($('#detect_num_car').val() == 1) {
            alert($('#detect_num_car').val());
            ons.notification.alert({
                    message: "ไม่สารมารถยกเลิกใช้งานได้ เนื่องจากคุณมีรถคันเดียว",
                    title: "ขออภัย",
                    buttonLabel: "ปิด"
                })
                .then(function() {
                    modal.hide();
                });
            return;
        }
    } else {
        var messages = "เปิดใช้รถคันนี้แล้ว";
    }
    var data = {
        car_id: id,
        status: status,
        driver_id: $.cookie("detect_user")
    };

    var url = "car/change_status_car";
    $.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        data: data,
        type: 'post',
        success: function(res) {
            console.log(res.res);
            if (res.res.check == false) {
                ons.notification.alert({
                        message: "ไม่สารมารถหยุดใช้งานได้ จำเป็นต้องมีรถที่ใช้งานอย่างน้อย 1 คัน",
                        title: "ขออภัย",
                        buttonLabel: "ปิด"
                    })
                    .then(function() {
                        modal.hide();
                        return;
                    });
            } else {
                if (res.res.data.result == true) {
                    ons.notification.alert({
                            message: messages,
                            title: "สำเร็จ",
                            buttonLabel: "ปิด"
                        })
                        .then(function() {
                            modal.hide();
                            $.post("car/check_num_car", {
                                driver_id: $.cookie("detect_user")
                            }, function(res) {
                                console.log(res);
                                var url = "page/call_page?checkcalledit=1";
                                $.post(url, {
                                    path: "car/car_view"
                                }, function(ele) {
                                    $('#body_car_manage').html(ele);
                                    //location.reload()
                                    console.log("++++++++++++++++++++++++++++++++------------------------------------------------------------------------------");
                                });
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

function checkCarNum(){
	if($('#detect_num_car').val()==0){
		addCar();
	}
}

function submitAddCar() {
    if ($('input[name="plate_num"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณากรอกเลขทะเบียนรถ',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('input[name="plate_num"]').focus();
            });
        return;
    }

    if ($('input[name="car_type"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาเลือกประเภทรถ',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                gotoDiv('car_type_box');
                fn.pushPage({'id': 'option.html', 'title': 'ประเภทรถ', 'open':'car_type'}, 'lift-ios');
            });
        return;
    }
    if ($('input[name="car_brand"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาเลือกยี่ห้อรถ',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();

				gotoDiv('car_brand_box');
				fn.pushPage({'id': 'option.html', 'title': 'ยี่ห้อรถ', 'open':'car_brand'}, 'lift-ios');
            });
        return;
    }
   
    if ($('input[name="car_color"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาเลือกสีรถ',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                gotoDiv('car_color_box');
				fn.pushPage({'id': 'option.html', 'title': 'สีรถ', 'open':'car_color'}, 'lift-ios');
            });
        return;
    }
     if ($('input[name="plate_color"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาเลือกป้ายทะเบียน',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                gotoDiv('plate_color_box');
				fn.pushPage({'id': 'option.html', 'title': 'สีป้ายทะเบียน', 'open':'plate_color'}, 'lift-ios')
            });
        return;
    }
    if ($('input[name="car_province"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาเลือกจังหวัด',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                gotoDiv('car_province_box');
				fn.pushPage({'id': 'option.html', 'title': 'สีป้ายทะเบียน', 'open':'plate_color'}, 'lift-ios')
            });
        return;
    }
    if ($('#img_car_1').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาอัพโหลดรูปภาพหน้ารถ',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
            	 $('#img_car_1').focus();
                modal.hide();
            });
        return;
    }
    if ($('#img_car_2').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาอัพโหลดภาพข้างรถ',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
            	$('#img_car_2').focus();
                modal.hide();
            });
        return;
    }
    if ($('#img_car_3').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาอัพโหลดภาพในรถ',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
            	$('#img_car_3').focus();
                modal.hide();
            });
        return;
    }
    if ($('#img_car_3').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาอัพโหลดภาพในรถ',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
            	$('#img_car_3').focus();
                modal.hide();
            });
        return;
    }
    
    if ($('input[name="txt_car_act"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาระบุ พ.ร.บ.',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
            	$('input[type="txt_car_act"]').focus();
                modal.hide();
            });
        return;
    }
    if ($('input[name="ex_car_act"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาระบุวันหมดอายุ พ.ร.บ.',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
            	$('input[type="ex_car_act"]').focus();
                modal.hide();
            });
        return;
    }
    
    if ($('input[name="txt_car_tax"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาระบุทะเบียนภาษี',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
            	$('input[type="txt_car_tax"]').focus();
                modal.hide();
            });
        return;
    }
    if ($('input[name="ex_car_act"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาระบุวันหมดอายุทะเบียภาษี',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
            	$('input[type="ex_car_act"]').focus();
                modal.hide();
            });
        return;
    }
    
    if ($('input[name="txt_car_insurance"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาระบุประกันรถยนต์',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
            	$('input[type="txt_car_insurance"]').focus();
                modal.hide();
            });
        return;
    }
    if ($('input[name="ex_car_insurance"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาระบุวันหมดอายุประกันรถยนต์',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
            	$('input[type="ex_car_insurance"]').focus();
                modal.hide();
            });
        return;
    }
    modal.show();

    var data = new FormData($('#form_addcar')[0]);

    var url = "car/add_car?driver_id=" + $.cookie("detect_user");

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
                        message: 'เพิ่มรถสำเร็จแล้ว',
                        title: "สำเร็จ",
                        buttonLabel: "ปิด"
                    })
                    .then(function() {
                        modal.hide();

                        var url = "page/call_page";
                        $.post(url, {
                            path: "car/car_view"
                        }, function(ele) {
                            $('#body_car_manage').html(ele);
                            $('ons-back-button').click();
                        });
                    });

            } else {
                ons
                    .notification.alert({
                        message: 'ไม่สามารถเพิ่มรถได้ กรุณาลองใหม่อีกครั้ง',
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

function submitEditCar() {
    if ($('input[name="plate_num"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณากรอกเลขทะเบียนรถ',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('input[name="plate_num"]').focus();
            });
        return;
    }

    if ($('input[name="car_type"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาเลือกประเภทรถ',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('input[name="car_type"]').focus();
            });
        return;
    }
    if ($('input[name="car_brand"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาเลือกยี่ห้อรถ',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('input[name="car_brand"]').focus();
            });
        return;
    }
    if ($('input[name="plate_color"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาเลือกป้ายทะเบียน',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('input[name="plate_color"]').focus();
            });
        return;
    }
    if ($('input[name="car_color"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาเลือกสีรถ',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('input[name="car_color"]').focus();
            });
        return;
    }
    if ($('input[name="car_province"]').val() == "") {
        ons
            .notification.alert({
                message: 'กรุณาเลือกจังหวัด',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('input[name="car_province"]').focus();
            });
        return;
    }
    if ($('#' + $('#id_carall').val() + '_check_upload_1').val() == 0) {
        ons
            .notification.alert({
                message: 'กรุณาอัพโหลดภาพหน้ารถ',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
            });
        return;
    }
    if ($('#' + $('#id_carall').val() + '_check_upload_2').val() == 0) {
        ons
            .notification.alert({
                message: 'กรุณาอัพโหลดภาพข้างรถ',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
            	
                modal.hide();
            });
        return;
    }
    if ($('#' + $('#id_carall').val() + '_check_upload_3').val() == 0) {
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
    }
    modal.show();

    var data = new FormData($('#form_editcar')[0]);

    var url = "car/edit_car?driver_id=" + $.cookie("detect_user") + "&car_id=" + $('#id_carall').val();

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
                        message: 'แก้ไขข้อมูลรถสำเร็จ',
                        title: "สำเร็จ",
                        buttonLabel: "ปิด"
                    })
                    .then(function() {
                        modal.hide();
                        var url = "page/call_page?checkcalledit=1";
                        $.post(url, {
                            path: "car/car_view"
                        }, function(ele) {
                            $('#body_car_manage').html(ele);
                            console.log("++++++++++++++++++++++++++++++++------------------------------------------------------------------------------");
                            $('ons-back-button').click();
                        });
                    });
                //		    		modal.hide();
            } else {
                ons
                    .notification.alert({
                        message: 'ไม่สามารถเพิ่มรถได้ กรุณาลองใหม่อีกครั้ง',
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

function putNext() {
//	setTimeout(function(){ focusBox(); }, 1500);
	delay(function(){
     	focusBox();
    }, 1200 );
}

function readURL(input, id, num, type) {
    console.log("read file : " + id);
    console.log("rand : " + $('#rand').val());
    //	  return;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {

            $('#pv_' + id).attr('src', e.target.result);

            var data = new FormData($('#form_addcar')[0]);
            data.append('fileUpload', $('#' + id)[0].files[0]);
            if (type == "add") {
                var param_id = $('#rand').val();
            } else {
                var param_id = $('#id_carall').val();
            }
            var url_upload = "application/views/upload_img/upload.php?id=" + param_id + "&type=car_img&num=" + num;
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
                    $('#box_img_' + id).fadeIn(200);
                    
                    $('#' + param_id + '_check_upload_'+num).val(1)
					focusBox();
					var photo = "../data/pic/car/"+param_id+"_"+num+".jpg?v="+$.now();
                    $('.'+param_id+'_pic_car_'+num).attr('src',photo );
                    $('.'+param_id+'_pic_car_'+num).attr('onclick', 'viewPhotoGlobal(\'' + photo + '\', "")' );
                    iconsHasPic(1, "txt-img-has-"+id, "txt-img-nohas-"+id);
                    
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
        reader.readAsDataURL(input.files[0]);

    }

}

function readURLother(input, id, type, cat) {
	var shot = cat.split("_");
    console.log("read file : " + id);
    console.log("rand : " + $('#rand').val());

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {

            $('#pv_' + id).attr('src', e.target.result);

            var data = new FormData($('#form_accescar')[0]);
            data.append('fileUpload', $('#' + id)[0].files[0]);
            if (type == "add") {
                var param_id = $('#rand').val();
            } else {
                var param_id = $('#id_carall').val();
//                $('#' + id + '_check_upload_' + num).val(1);
            }
            var url_upload = "application/views/upload_img/upload.php?id=" + param_id + "&type=access_car&cat="+cat;
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
                    $('#box_img_' + id).fadeIn(200);
                    
                    $('#' + param_id + '_'+cat).val(1)
                    focusBox();
                    
                    var photo = "../data/pic/"+cat+"/"+$('#id_carall').val()+".jpg?v="+$.now();
                    $('.'+$('#id_carall').val()+'_pic_'+shot[1]).attr('src',photo );
                    $('.'+$('#id_carall').val()+'_pic_'+shot[1]).attr('onclick', 'viewPhotoGlobal(\'' + photo + '\', "")' );
                    iconsHasPic(1, "txt-img-has-"+id, "txt-img-nohas-"+id);
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
        reader.readAsDataURL(input.files[0]);

    }

}

function checkPicCar(id, checkcalledit, icons) {
    console.log(id)
    var p1 = '../data/pic/car/' + id + '_1.jpg?v=' + $.now();
    var p2 = '../data/pic/car/' + id + '_2.jpg?v=' + $.now();
    var p3 = '../data/pic/car/' + id + '_3.jpg?v=' + $.now();
    var src = p1;
    $.ajax({
        url: src,
        type: 'HEAD',
        error: function() {
            console.log('Error file');
        },
        success: function() {
        	$('#'+id+'-car-has-view-1').attr('src', 'assets/images/yes.png');
            $('.' + id + '_pic_car_1').attr('src', p1);
            $('.' + id + '_pic_car_1').show();
            $('#' + id + '_check_upload_1').val(1);
            
            iconsHasPic(icons, "txt-img-has-img_car_1", "txt-img-nohas-img_car_1");
            
            if (checkcalledit != "") {
                return;
            }
            $('#pv_img_car_1').attr('src', p1);
            
           $('.' + id + '_pic_car_1').attr('onclick', 'viewPhotoGlobal(\'' + p1 + '\', "")' );
            
            
        }
    });
    var src = p2;
    $.ajax({
        url: src,
        type: 'HEAD',
        error: function() {
            console.log('Error file');
        },
        success: function() {
            $('#'+id+'-car-has-view-2').attr('src', 'assets/images/yes.png');
            $('.' + id + '_pic_car_2').attr('src', p2);
            $('.' + id + '_pic_car_2').show();
            $('#' + id + '_check_upload_2').val(1);
            iconsHasPic(icons, "txt-img-has-img_car_2", "txt-img-nohas-img_car_2");
            if (checkcalledit != "") {
                return;
            }
            $('#pv_img_car_2').attr('src', p2);
            $('.' + id + '_pic_car_2').attr('onclick', 'viewPhotoGlobal(\'' + p2 + '\', "")' );
        }
    });
    var src = '../data/pic/car/' + id + '_3.jpg';
    $.ajax({
        url: src,
        type: 'HEAD',
        error: function() {
            console.log('Error file');
            //					$('#'+id+'_pic_car_3').hide();
        },
        success: function() {
            $('#'+id+'-car-has-view-3').attr('src', 'assets/images/yes.png');
            $('.' + id + '_pic_car_3').attr('src', p3);
            $('.' + id + '_pic_car_3').show();
            $('#' + id + '_check_upload_3').val(1);
            iconsHasPic(icons, "txt-img-has-img_car_3", "txt-img-nohas-img_car_3");
            if (checkcalledit != "") {
                return;
            }
            $('#pv_img_car_3').attr('src', p3);
            $('.' + id + '_pic_car_3').attr('onclick', 'viewPhotoGlobal(\'' + p3 + '\', "")' );
        }
    });
}

function checkPicAccess(id, checkcalledit){
	var atc = "../data/pic/car_act/"+id+".jpg";
	var tax = "../data/pic/car_tax/"+id+".jpg";
	var insurance = "../data/pic/car_insurance/"+id+".jpg";
	var cap = "หมดอายุวันที่ ";
	$.ajax({
        url: atc,
        type: 'HEAD',
        error: function() {
            console.log('Error file');
            //					$('#'+id+'_pic_car_1').hide();
        },
        success: function() {
        	iconsHasPic(1, "txt-img-has-img_car_act", "txt-img-nohas-img_car_act");
            $('.' + id + '_pic_atc').attr('src', atc+"?v="+$.now());
            $('.' + id + '_pic_atc').attr('onclick', 'viewPhotoGlobal(\'' + atc + '\', "", \'' +cap+ $("#"+id+"_atc_exp").text() + '\')' );
            $('#' + id + '_car_act').val(1);
            if(checkcalledit==1){
				$('#pv_img_car_act').attr('src', atc+"?v="+$.now());
			}
        }
    });
    
    $.ajax({
        url: tax,
        type: 'HEAD',
        error: function() {
            console.log('Error file');
            //					$('#'+id+'_pic_car_1').hide();
        },
        success: function() {
        	iconsHasPic(1, "txt-img-has-img_car_tax", "txt-img-nohas-img_car_tax");
            $('.' + id + '_pic_tax').attr('src', tax+"?v="+$.now());
            $('.' + id + '_pic_tax').attr('onclick', 'viewPhotoGlobal(\'' + tax + '\', "", \'' +cap+ $("#"+id+"_tax_exp").text() + '\')' );
            $('#' + id + '_car_tax').val(1);
            if(checkcalledit==1){
				$('#pv_img_car_tax').attr('src', tax+"?v="+$.now());
			}
        }
    });
    
    $.ajax({
        url: insurance,
        type: 'HEAD',
        error: function() {
            console.log('Error file');
            //					$('#'+id+'_pic_car_1').hide();
        },
        success: function() {
        	iconsHasPic(1, "txt-img-has-img_car_insurance", "txt-img-nohas-img_car_insurance");
            $('.' + id + '_pic_insurance').attr('src', insurance+"?v="+$.now());
            $('.' + id + '_pic_insurance').attr('onclick', 'viewPhotoGlobal(\'' + insurance + '\', "", \'' +cap+ $("#"+id+"_insurance_exp").text() + '\')' );
            $('#' + id + '_car_insurance').val(1);
            if(checkcalledit==1){
				$('#pv_img_car_insurance').attr('src', insurance+"?v="+$.now());
			}
        }
    });
}

function selectCarType(id) {
    var name = $('#item_car_type_' + id).data('name');
    console.log(name + " " + id);

    $('#car_type').val(id);
    $('#txt_car_type').text(name);
    $('ons-back-button').click();
    focusBox();
}

function selectCarBrand(id, ps) {
    var name = $('#item_car_brand_' + id).data('name');
    console.log(name + " " + id);

    $('#car_brand').val(id);
    $('#car_brand_txt').val(name);
    $('#txt_car_brand').text(name);
    $('ons-back-button').click();
    $('#img_car_brand_show').show();
    $('#img_car_brand_show').css('background-position', ps);
    focusBox();

}

function selectCarProvince(id) {
    var name = $('#item_car_province_' + id).data('name');
    console.log(name + " " + id);

    $('#car_province').val(id);
    $('#txt_car_province').text(name);
    $('ons-back-button').click();
    focusBox();
}

function selectCarColor(id, val) {
    console.log(id + " " + val);
    var img = $('#item_car_color_' + id).data('img');
    $('#img_car_color_show').attr('src', "assets/images/car/" + img);

    $('#car_color').val(id);
    $('#car_color_txt').val(val);
    $('#txt_car_color').text(val);
    $('#img_car_color_show').show();
    $('ons-back-button').click();
    focusBox();
}

function selectPlateColor(id, val) {
    console.log(id + " " + val);
    var img = $('#item_car_plate_' + id).data('img');
    $('#img_plate_color_show').attr('src', "assets/images/car/plate/" + img);

    $('#plate_color').val(id);

    $('#plate_color_txt').val(val);
    $('#txt_plate_color').text(val);
    $('#img_plate_color_show').show();
    $('ons-back-button').click();
    focusBox();
}

function focusBox(){
	
	if($('input[name="plate_num"]').val()==""){
//		alert($('input[name="plate_num"]').val());
		$('#plate_num_box').addClass('border-red');
		return;
	}else{
		$('#plate_num_box').removeClass('border-red');
	}
	
	if ($('input[name="car_type"]').val() == "") {
       $('#car_type_box').addClass('border-red');
       fn.pushPage({'id': 'option.html', 'title': 'ประเภทรถ', 'open':'car_type'}, 'lift-ios')
       return;
    }else{
		$('#car_type_box').removeClass('border-red');
	}
	
    if ($('input[name="car_brand"]').val() == "") {
       $('#car_brand_box').addClass('border-red');
       setTimeout(function(){ fn.pushPage({'id': 'option.html', 'title': 'ยี่ห้อรถ', 'open':'car_brand'}, 'lift-ios'); }, 500);
       
       return;
    }else{
		$('#car_brand_box').removeClass('border-red');
	}
    
    if ($('input[name="car_color"]').val() == "") {
        $('#car_color_box').addClass('border-red');
        
        setTimeout(function(){ fn.pushPage({'id': 'option.html', 'title': 'สีรถ', 'open':'car_color'}, 'lift-ios'); }, 500);
        return;
    }else{
		$('#car_color_box').removeClass('border-red');
	}
	
	if ($('input[name="plate_color"]').val() == "") {
       $('#plate_color_box').addClass('border-red');
        setTimeout(function(){ fn.pushPage({'id': 'option.html', 'title': 'สีป้ายทะเบียน', 'open':'plate_color'}, 'lift-ios'); }, 500);
        
       return;
    }else{
		$('#plate_color_box').removeClass('border-red');
	}
    
    if ($('input[name="car_province"]').val() == "") {
       $('#car_province_box').addClass('border-red');
       
       setTimeout(function(){ fn.pushPage({'id': 'option.html', 'title': 'จังหวัด', 'open':'car_province'}, 'lift-ios'); }, 500);
       return;
    }else{
		$('#car_province_box').removeClass('border-red');
	}
    
    if ($('#' + $('#center_id').val() + '_check_upload_1').val() == 0) {
	       $('#img_car_1_box').addClass('border-red');
	       return;
	}else{

			$('#img_car_1_box').removeClass('border-red');
	}
	    
	if ($('#' + $('#center_id').val() + '_check_upload_2').val() == 0) {
	       $('#img_car_2_box').addClass('border-red');
	       return;
	}else{
			$('#img_car_2_box').removeClass('border-red');
	}
	    
	if ($('#' + $('#center_id').val() + '_check_upload_3').val() == 0) {
	       $('#img_car_3_box').addClass('border-red');
	       return;
	}else{
			$('#img_car_3_box').removeClass('border-red');
	}
    
     /***************************************************/
    if ($('input[name="txt_car_act"]').val() == "") {
       $('#txt_car_act_box').addClass('border-red');
        return;
    }else{
		$('#txt_car_act_box').removeClass('border-red');
	}
	
    if ($('input[name="ex_car_act"]').val() == "") {
        $('#ex_car_act_box').addClass('border-red');
        return;
    }else{
		$('#ex_car_act_box').removeClass('border-red');
	}
	if ($('#' + $('#center_id').val() + '_car_act').val() == 0) {
	       $('#img_car_act_box').addClass('border-red');
	       return;
	}else{
		 $('#img_car_act_box').removeClass('border-red');
	}
    /***************************************************/
    
    
     /***************************************************/
    if ($('input[name="txt_car_tax"]').val() == "") {
        $('#txt_car_tax_box').addClass('border-red');
        return;
    }else{
		$('#txt_car_tax_box').removeClass('border-red');
	}
	
    if ($('input[name="ex_car_tax"]').val() == "") {
       $('#ex_car_tax_box').addClass('border-red');
        return;
    }else{
		$('#ex_car_tax_box').removeClass('border-red');
	}
	if ($('#' + $('#center_id').val() + '_car_tax').val() == 0) {
	       $('#img_car_tax_box').addClass('border-red');
	       return;
	}else{
		 $('#img_car_tax_box').removeClass('border-red');
	}
     /***************************************************/
    
    
     /***************************************************/
    if ($('input[name="txt_car_insurance"]').val() == "") {
        $('#txt_car_insurance_box').addClass('border-red');
        return;
    }else{
		$('#txt_car_insurance_box').removeClass('border-red');
	}
	
    if ($('input[name="ex_car_insurance"]').val() == "") {
        $('#ex_car_insurance_box').addClass('border-red');
        return;
    }else{
		$('#ex_car_insurance_box').removeClass('border-red');
	}
	if ($('#' + $('#center_id').val() + '_car_insurance').val() == 0) {
	       $('#img_car_insurance_box').addClass('border-red');
	       return;
	}else{

		 $('#img_car_insurance_box').removeClass('border-red');
	}
	 /***************************************************/
    
}