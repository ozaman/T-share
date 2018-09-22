inform_money();
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
            if(res.result==true){
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