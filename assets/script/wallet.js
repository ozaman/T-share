auto_money();
function checkPicWallet(path, id){
	$.ajax({
        url: path,
        type: 'HEAD',
        error: function() {
            console.log('Error file');
//            $('#'+id).attr('src', path);
        },
        success: function() {
            $('#'+id).attr('src', path+"?v="+$.now());
        }
    });
}

function inform_money(){
	
	 $('#body_add_content').html(progress_circle);
	var url = "page/call_page";
        $.post(url, {
            path: "wallet/inform_money"
    }, function(ele) {
            $('#body_add_content').html(ele);
    });
}

function auto_money(){
	$('#body_add_content').html(progress_circle);
	var url = "page/call_page";
        $.post(url, {
            path: "wallet/auto_money"
    }, function(ele) {
            $('#body_add_content').html(ele);
    });
}

function history_wallet(){
	$('#history').html(progress_circle);
	var url = "page/call_page?date="+$('#date_his_wallet').val();
        $.post(url, {
            path: "wallet/history_wallet"
    }, function(ele) {
            $('#history').html(ele);
    });
}

function withdraw(){
	$('#withdraw').html(progress_circle);
	var url = "page/call_page?date="+$('#date_his_wallet').val();
        $.post(url, {
            path: "wallet/withdraw"
    }, function(ele) {
            $('#withdraw').html(ele);
    });
}

function selectBankCom(){
	var number = $("#selectbank_tr option:selected").data('acc');
	var name = $("#selectbank_tr option:selected").data('name');
	
	var bank = $("#selectbank_tr option:selected").text();
	
	$('#deposit_bank').val(bank);
	$('input[name="b_acount"]').val(name);
	$('input[name="b_number"]').val(number);
	
	$('#bank_account').val(name);
	$('#bank_number').val(number);
}

function alertInform(){
	if($('#selectbank_tr').val()==""){
		ons.notification.alert({
                message: 'กรุณาเลือกธนาคารที่จะโอน',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('#selectbank_tr').focus();
            });
        return;
	}
	if($('#date_money').val()==""){
		ons.notification.alert({
                message: 'กรุณาเลือกวันที่โอน',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('#selectbank_tr').focus();
            });
        return;
	}
	if($('#time_money').val()==""){
		ons.notification.alert({
                message: 'กรุณาเลือกวันที่โอน',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('#selectbank_tr').focus();
            });
        return;
	}
	if($('input[name="amount"]').val()==""){
		ons.notification.alert({
                message: 'กรุณาระบุจำนวนเงินที่โอน',
                title: "ข้อมูลไม่สมบูรณ์",
                buttonLabel: "ปิด"
            })
            .then(function() {
                modal.hide();
                $('#selectbank_tr').focus();
            });
        return;
	}
	var dialog = document.getElementById('inform-confirm-dialog');
	
	  if (dialog) {
	  	$('#txt_content-wallet').html('คุณต้องการแจ้งโอนเงินใช่หรอไม่');
		$('#btn_wallet_ok').attr('onclick','sendInformMoney()');
	    dialog.show();
	  } else {
	    ons.createElement('inform-confirm.html', { append: true })
	      .then(function(dialog) {
	      	$('#txt_content-wallet').html('คุณต้องการแจ้งโอนเงินใช่หรอไม่');
			$('#btn_wallet_ok').attr('onclick','sendInformMoney()');
	        dialog.show();
	      });
	  }
	  
}

function sendInformMoney(){
	document.getElementById('inform-confirm-dialog').hide();
	modal.show();
	var form = $('#inform_money_form').serialize();
    var url = "wallet/add_inform_money";
//    console.log(form);
//    $.post(url,form,)

    $.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        data: form,
        type: 'post',
        success: function(res) {
            console.log(res);
            modal.hide();
            if(res.data.result==true){
				ons.notification.alert({
                    message: 'ทำการแจ้งโอนสำเร็จ รอการยืนยัน',
                    title: "สำเร็จ",
                    buttonLabel: "ปิด"
                })
                .then(function() {
                    $('#tab-history-wallet').click();
                });
			}
			
        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });
}

function openDetailHisWallet(id){

	fn.pushPage({
        'id': 'popup1.html',
        'title': 'รายละเอียด'
    }, 'lift-ios');
    var url = "page/call_page?deposit_id="+id;
    $.post(url,{ path: "wallet/detail_history" },function(ele){
    	$('#body_popup1').html(ele);
    });	
}

function sendWithdraw(){
	document.getElementById('inform-confirm-dialog').hide();
	modal.show();
	var form = $('#withdraw_money_form').serialize();
    var url = "wallet/withdraw_inform_money";
//    console.log(form);
//    $.post(url,form,)

    $.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        data: form,
        type: 'post',
        success: function(res) {
            console.log(res);
            modal.hide();
            if(res.result==true){
				ons.notification.alert({
                    message: 'ทำการแจ้งถอนสำเร็จ รอการยืนยัน',
                    title: "สำเร็จ",
                    buttonLabel: "รับทราบ"
                })
                .then(function() {
                    $('#tab-history-wallet').click();
                });
			}
			
        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });
}

function alertWithdraw(){
	console.log($('#balance_val').val());
	console.log($('input[name="amount_wd"]').val());
	if($('input[name="bank_user"]').val()==""){
		ons.notification.alert({
                    message: 'กรุณาเลือกธนาคารที่จะรับเงิน',
                    title: "ขออภัย",
                    buttonLabel: "ปิด"
                })
                .then(function() {
                    
                });
		return;
	}
	if($('input[name="amount_wd"]').val()=="" || $('input[name="amount_wd"]').val()<=0){
		ons.notification.alert({
                    message: 'กรุณาระบุจำนวนเงินที่ถูกต้อง',
                    title: "ขออภัย",
                    buttonLabel: "ปิด"
                })
                .then(function() {
                    
                });
		return;
	}
	if($('#balance_val').val()<$('input[name="amount_wd"]').val()){
		ons.notification.alert({
                    message: 'ไม่สามารถทำการถอนเงินได้ เนื่องจากยอดในระบบไม่เพียงพอ',
                    title: "ขออภัย",
                    buttonLabel: "ปิด"
                })
                .then(function() {
                    
                });
		return;
	}
	var dialog = document.getElementById('inform-confirm-dialog');
	var amount = $('input[name="amount_wd"]').val();
	
	  if (dialog) {
	  	$('#txt_content-wallet').html('คุณต้องการถอนเงินจำนวน '+amount+' บาท ใช่หรือไม่?');
	$('#btn_wallet_ok').attr('onclick','sendWithdraw()');
	    dialog.show();
	  } else {
	    ons.createElement('inform-confirm.html', { append: true })
	      .then(function(dialog) {
	      	$('#txt_content-wallet').html('คุณต้องการถอนเงินจำนวน '+amount+' บาท ใช่หรือไม่?');
	$('#btn_wallet_ok').attr('onclick','sendWithdraw()');
	        dialog.show();
	      });
	  }
	  
}

function readURL(input, id_ele) {
   

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {

            $('#pv_' + id_ele).attr('src', e.target.result);

            var data = new FormData($('#form_addcar')[0]);
            data.append('fileUpload', $('#' + id_ele)[0].files[0]);

            var param_id = $('#rand_wallet').val();

            var url_upload = "application/views/upload_img/upload.php?id=" + param_id + "&type=slipt_inform";
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
                    $('#box_img_' + id_ele).fadeIn(200);
                    $('#txt-img-has-'+id_ele).show();
                    $('#txt-img-nohas-'+id_ele).hide();
//                    $('.'+param_id+'_pic_car_'+num).attr('src', "../data/pic/car/"+param_id+"_"+num+".jpg?v="+$.now());

                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
        reader.readAsDataURL(input.files[0]);

    }

}