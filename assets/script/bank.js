console.log("Bank Page");
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
    });
}

function selectBankList(id) {
    console.log(id);
    var txt = $('#item_bank_list_' + id).data('name');
    /*$('#img_plate_color_show').attr('src', "assets/images/car/plate/" + img);*/
    $('#bank').val(id);
    $('#txt_bank').text(txt);
    /*$('#plate_color_txt').val(val);
    $('#txt_plate_color').text(val);
    $('#img_plate_color_show').show();*/
    $('ons-back-button').click();
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

    var url = "add_bank/add_bank?driver_id=" + $.cookie("detect_user");

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

                       var url = "page/call_page";
					    $.post(url, {
					            path: "bank/bank_view"
					        }, function(ele) {
					            $('#body_account_bank').html(ele);
					        });
                        
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

            var data = new FormData($('#form_addbank')[0]);
            data.append('fileUpload', $('#' + id)[0].files[0]);
            if (type == "add") {
                var param_id = $('#rand').val();
            } else {
                var param_id = $('#id_carall').val();
                $('#' + id + '_check_upload_' + num).val(1);
            }
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
                    $('#box_img_' + id).fadeIn(200);

                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
        reader.readAsDataURL(input.files[0]);

    }

}