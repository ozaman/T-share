<input type="hidden" value="<?=$balance;?>" id="balance" />
<div id="load_booking_data"  style="padding:0px; margin-top:0px;display: nones;" align="center">
    
</div>

<template id="alert-no-deposit-transfer.html">
  <ons-alert-dialog modifier="rowfooter" id="transfer-alert-dialog">
    <div class="alert-dialog-title">ขอภัย</div>
    <div class="alert-dialog-content">
      <span class="font-14">
      	
      ยอดเงินคงเหลือในระบบของคุณไม่สามารถรับงานนี้ได้ กรุณาเติมเงินเข้าระบบหรือติดต่อเจ้าหน้าที่ ขอบคุณค่ะ
      </span>
    </div>
    <div class="alert-dialog-footer">
      <ons-alert-dialog-button onclick=" document.getElementById('transfer-alert-dialog').hide();">ปิด</ons-alert-dialog-button>
      <ons-alert-dialog-button onclick="gotoWallet();">เติมเงิน</ons-alert-dialog-button>
    </div>
  </ons-alert-dialog>
</template>
<script>
	 var alertDeposit = function() {
	  var dialog = document.getElementById('transfer-alert-dialog');

	  if (dialog) {
	    dialog.show();
	  } else {
	    ons.createElement('alert-no-deposit-transfer.html', { append: true })
	      .then(function(dialog) {
	        dialog.show();
	      });
	  }
	};

 var dataHistoryA;
 var txt_pay_cash = '';
 var txt_pay_trans = '';
 
function openDetailBooking(index, s_pay, s_cost, cost) {
     var dv_cost = $('#balance').val();
     console.log(dv_cost + " : " + s_cost + " type = " + s_pay);
/*     fn.pushPage({'id': 'popup1.html', 'title': 'รับงาน'}, 'lift-ios');
     return;*/
     if (s_pay == 0) {
         if(class_user=="lab"){
		 	 $('#header_clean').text('งานรถรับ-ส่ง')
             var url = "page/booking_detail";
             var post = res_socket[index];
             $.post(url, post, function(data) {
                 $('#load_mod_popup_clean').html(data);
                 $('#main_load_mod_popup_clean').show();
                 
             });
             return;
		 }
         if (dv_cost < s_cost) {
         	 alertDeposit();
             return;
         } 
		 else {
			fn.pushPage({'id': 'popup1.html', 'title': 'รับงาน'}, 'lift-ios');
//			return;
             var url = "page/booking_detail";
             var post = res_socket[index];
             $.post(url, post, function(data) {
                 $('#body_popup1').html(data);
             });
         }
     } 
	 else {
         /*var finalcost = parseInt(cost) - parseInt(s_cost);
         console.log(finalcost)*/
          $('#header_clean').text('งานรถรับ-ส่ง')
//                 var url = "empty_style.php?name=tbooking&file=book_detail";
				 var url = "page/booking_detail";
                 var post = res_socket[index];
                 $.post(url, post, function(data) {
                     $('#load_mod_popup_clean').html(data);
                     $('#main_load_mod_popup_clean').show();
            });
     }

 }

function openMoneytransfer(){
	$('#material_dialog').modal('close');
	money_transfer();
}

function selectjob(orderid, idorder, invoice, code, program, p_place, to_place, agent, airout_time, airin_time, cost, s_cost, outdate, ondate, s_status_pay, idbookcar, a, b, c, d) {
    var carid = $('#carid').val();
    var cartype = $('#cartype').val();
    console.log("Type Pay : " + s_status_pay)
    console.log(idbookcar + '**************************************' + cartype)
    if (parseInt(idbookcar) != parseInt(cartype)) {
        swal('ไม่สามารถรับงานได้', 'งานนี้ใช้' + a + b + ' ' + 'คุณใช้' + c + d, 'error');
        return;
    }
    if (cartype == '') {
        swal('กรุณาเลือกรถที่จะใช้งาน', '', 'error');
        return;
    }

    var driver = $('#driver').val();
    var finalcost = parseInt(cost) - parseInt(s_cost);
    console.log(finalcost)
    var txt_warning;
    txt_pay_cash = 'งานนี้เป็นงานที่ลูกค้าจ่ายเงินสด จำเป็นต้องหักเงินจากบัญชีในระบบ จำนวน ' + addCommas(s_cost) + ' บาท';
    txt_pay_trans = 'งานนี้แขกจ่ายเงินเข้าในระบบแล้ว' + "ยอดเงินทั้งหมดจะทำการโอนเงินทั้งหมดเข้าในกระเป๋าเงินของคุณ " + finalcost + " " + "บาท";
    if (s_status_pay == 0) {
        txt_warning = txt_pay_cash;
    } else {
        txt_warning = txt_pay_trans;
    }

    swal({
            title: "<?=t_job_confirmation;?>",
            text: txt_warning,
            type: "warning",
            confirmButtonClass: "btn-danger waves-effect waves-light",
            cancelButtonClass: "btn-cus waves-effect waves-light",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "<?=t_confirm;?>",
            cancelButtonText: "<?=t_cancelled;?>",
            closeOnConfirm: false
        },
        function() {
            var url_cja = "mod/tbooking/curl_connect_api.php?type=detect_driver_approve";
            /* check job approve */
            $.post(url_cja, {
                idorder: idorder
            }, function(res_check) {
                console.log(res_check.data.result.length);
                if (res_check.data.result.length > 0) { // check this job have driver approve ?
                    var data = {
                        "idorder": idorder,
                        "orderid": orderid,
                        "invoice": invoice,
                        "code": code,
                        "program": program,
                        "driver": driver,
                        "carid": carid,
                        "cartype": cartype,
                        "pickup_place": p_place,
                        "to_place": to_place,
                        "agent": agent,
                        "airout_time": airout_time,
                        "airin_time": airin_time,
                        "cost": cost,
                        "s_cost": s_cost,
                        "outdate": outdate,
                        "ondate": ondate
                    };
                    var url = "mod/tbooking/curl_connect_api.php?type=getjob_booking";
                    var bank_account = "Goldenbeach Tour";
                    var deposit_bank = "กสิกรไทย";
                    var bank_number = "909-609-6699";
                    var deposit_date = "<?=date('Y-m-d');?>";
                    var deposit_time = "<?=date('H:m');?>";
                    var username = '<?=$_SESSION["data_user_name"];?>';
                    var deposit = s_cost;
                    var his_ap = {
                        driver: driver,
                        idorder: idorder,
                        username: username,
                        deposit: deposit,
                        deposit_date: deposit_time,
                        type: "APPROVEJOB",
                        deposit_bank: deposit_bank,
                        bank_account: bank_account,
                        bank_number: bank_number,
                        deposit_date: deposit_date,
                        deposit_time: deposit_time,
                        post_date: '<?=time();?>',
                        post_date_f: deposit_date
                    };
                    console.log(data);
                  
                    $.post(url, data, function(res) {
                        console.log(res);
                        
                        if (res.status == "200") {
                            if (s_status_pay == 0) { // Pay Cash
                                $.post("mod/tbooking/curl_connect_api.php?type=php_approve_job", his_ap, function(logdata) {
                                    swal("<?=t_success;?>!", "<?=t_press_button_close;?>", "success");
                                    hideDetail();
                                    historyTransfer();
                                    console.log(logdata);
                                    getTansferJobNumber("<?=$user_id;?>","<?=date('Y-m-d');?>")
                                });
                            } else {

                                // Pay Transfer bank


                                hideDetail();
                                historyTransfer();
                                swal("<?=t_success;?>!", "<?=t_press_button_close;?>", "success");
                                //});
                            }
                        } else {
                            swal("<?=t_error;?>!", "<?=t_press_button_close;?>", "error");
                        }
                    });
                } else {
                    swal('ไม่สามารถรับงานได้', 'งานนี้มีคนขับคนอื่นรับงานแล้ว', 'error');
                    hideDetail();
                }
            });
        });
}
	

function CheckTime(d1,d2){
//      console.log(d1+" = "+d2);
          datetime1 = d1; 
          datetime2 = d2;
          //Set date time format
          var startDate = new Date(datetime1);
          var endDate   = new Date(datetime2);
          var seconds = (endDate.getTime() - startDate.getTime()) / 1000;
          //Calculate time
          var days = Math.floor(seconds / (3600*24));
          var hrs_d   = Math.floor((seconds - (days * (3600*24))) / 3600);
          var hrs   = Math.floor(seconds / 3600);
          var mnts = Math.floor((seconds - (hrs * 3600)) / 60);
          var secs = seconds - (hrs * 3600) - (mnts * 60);
          //old
          var hrs_d_bc = hrs_d;
          var mnts_bc = mnts;
          var secs_bc = secs;
          //Add 0 if one digit
          if(hrs_d<10) hrs_d = "0" + hrs_d;
          if(mnts<10) mnts = "0" + mnts;
          if(secs<10) secs = "0" + secs;
          var final_txt, day_txt, h_txy, m_txt, old_txt;
          if(days==0){
      day_txt = '';
    }else{
      day_txt = days+' วัน';
    }
    if(hrs_d_bc==0){
      h_txy = '';
    }else{
      h_txy = ' '+hrs_d_bc+' ชม.';
    }
    if(mnts_bc==0){
      m_txt = '';
    }else{
      m_txt = ' '+mnts_bc+' นาที';
    }
    final_txt = day_txt + h_txy + m_txt
    old_txt = days + ' ' + hrs_d + ':' + mnts + ':' + secs;
    if(days<=0 && hrs_d_bc<=0 && mnts_bc<=0){
    return "ไม่กี่วินาทีที่ผ่านมา";
  }
          return  final_txt+"ที่ผ่านมา";
      }

function js_yyyy_mm_dd_hh_mm_ss () {
         now = new Date();
         year = "" + now.getFullYear();
         month = "" + (now.getMonth() + 1); if (month.length == 1) { month = "0" + month; }
         day = "" + now.getDate(); if (day.length == 1) { day = "0" + day; }
         hour = "" + now.getHours(); if (hour.length == 1) { hour = "0" + hour; }
         minute = "" + now.getMinutes(); if (minute.length == 1) { minute = "0" + minute; }
         second = "" + now.getSeconds(); if (second.length == 1) { second = "0" + second; }
         return year + "/" + month + "/" + day + " " + hour + ":" + minute + ":" + second;
       }

function timestampToDate(unix_timestamp){
		var date = new Date(unix_timestamp*1000);
		var day = date.getDate();
		var month = date.getMonth()+1;
		if(month<=10){
			month = "0"+month;
		}
		if(day<=10){
			day = "0"+day
		}
		var year = date.getFullYear();
		var txt_date = year+"/"+month+"/"+day;

		var hours = date.getHours();
		var minutes = "0" + date.getMinutes();
		var seconds = "0" + date.getSeconds();
		var formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
		//return formattedTime;
		return txt_date+" "+formattedTime;
	  }

</script>