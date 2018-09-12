
<script>
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
</script>
<style>
  .lab-active-shop {
    position: absolute;
    z-index: 1;
/*    right: 30px;*/
/*    margin-top: 90px;*/
    margin-top: -13px;
    margin-left: 5px;
    background-color: #fff;
    color: #4CAF50;
}
.lab-none-active-shop {
    position: absolute;
    z-index: 1;
/*    right: 15px;*/
/*    margin-top: 90px;*/
   	margin-top: -10px;
    margin-left: -4px;
/*    background-color: #fff;*/
    color: #fb0006;
}
.time-post-shop {
    border-radius: 25px;
    margin-right: 10px;
    border: 1px solid #333;
    padding: 5px;
    position: absolute;
    z-index: 1;
    right: 0px;
    background-color: #fff;
    margin-top: -73px;
}
.edit-post-shop {
       margin-right: 10px;
    border: 1px solid #3b5998 !important;
    padding: 4px !important;
    position: absolute;
    z-index: 1;
    left: 30px;
    background-color: #fff;
    margin-top: -93px;
}
.box-shop{
  background-color: #fff;	
  padding: 17px 10px;
  border-radius:25px;
  border: 1px solid #3b5998;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 1px 5px 0 rgba(0,0,0,.12), 0 3px 1px -2px rgba(0,0,0,.2);
}
</style>
<?php 
	$data_user_class = $_COOKIE[detect_userclass];
  if(count($_POST[data])<=0){ 
    if($_GET[type]=="his"){
      echo '<div class="font-26" style="color: #ff0000;text-align: center;padding: 0px; margin-top: -10px;" id="no_work_div"><strong>ไม่มีงาน</strong></div>';
    }else{
      echo '<div class="font-26" style="color: #ff0000;text-align: center;padding: 15px;" id="no_work_div"><strong>ไม่มีงาน</strong></div>';
    }
    //exit();
  }
      
    foreach ($_POST[data] as $key=>$val){
    
	  /*$sql = "SELECT topic_th FROM shopping_product  WHERE id=".$val[program]." ";
	  $query = $this->db->query($sql);
	  $arr[shop] = $query->row();*/
	  
    if($val[status]=='CANCEL'){
       /*if($val[cancel_type]=='1'){
        $status_txt = '<strong><font color="#ff0000">'.t_customer_no_register.'</font></strong>';
      }
      else if($val[cancel_type]=='2'){
        $status_txt = '<strong><font color="#ff0000">'.t_customer_not_go.'</font></strong>';
      }
      else if($val[cancel_type]=='3'){
        $status_txt = '<strong><font color="#ff0000">'.t_wrong_selected_place.'</font></strong>';
      }*/
      $status_txt = '<strong><font color="#ff0000">ยกเลิก</font></strong>';
    }
    else if($val[status]=='NEW'){
      $status_txt = '<strong><font color="#3b5998">'.t_new.'</font></strong>';
    }
    else if($val[status]=='COMPLETED'){
      $status_txt = '<strong><font color="#54c23d">'.t_success.'</font></strong>';
    }
    if($data_user_class == "taxi"){
	    if($val[lab_approve_job]==1){
			$txt_lab_ap = '<span class="font-16 lab-active-shop" >พนักงานรับทราบแล้ว</span>';
		}else{
			$txt_lab_ap = '<span class="font-16 lab-none-active-shop" >พนักงานยังไม่รับทราบงานนี้</span>';
		}
	}
	
  ?>
  <div style="padding: 5px 0px;margin: 25px 10px;">
  <div class="box-shop">
  	<?=$txt_lab_ap;?>
    <table width="100%"  onclick="openDetailBooking('<?=$key;?>','<?=$_GET[type];?>');">
          <tr>
            <td width="80%" ><span class="font-24"><?=$arr[shop][topic_th];?></span></td>
            <td width="20%" align="center" rowspan="2">
            <div class="font-18" id="status_book_<?=$val[id];?>" style="margin-top: -20px;
    margin-left: -85px;
    position: absolute;
    max-width: 150px;
    width: 100%;" align="center">
            <?=$status_txt;?></div>
            </td>
          </tr>
          <tr>
            <td colspan="2" style="padding: 10px 0px;">
            <div class="font-14">ป้ายทะเบียน&nbsp;:&nbsp;<a><?=$val[car_plate]." ";?></a>
            </div>
           

            </td>
            
          </tr>
          <tr>
            <td colspan="2">
            <span class="font-16" ><?=$val[invoice];?>&nbsp;:&nbsp;
            <span id="date_book_<?=$val[id];?>">-</span>
            <!--<font color="#ff0000;" style="position: absolute;right: 25px;"><?=$val[airout_h].":".str_pad($val[airout_m], 2, '0', STR_PAD_LEFT)." ".t_n;?></font>-->
        <?php 
        $minutes_to_add = $val[airout_m];
//        echo $minutes_to_add." ++";
        $time_c = date('H:i',$val[update_date]); //ดึงเวลา อัพเดทเวลา ล่าสุด
        $time = new DateTime($time_c);
//        $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
//        echo $time_c;
        $stamp = $time->format('H:i');
        $current_time = date('H:i');
        
        $datetime1 = new DateTime($current_time);
        $datetime2 = new DateTime($stamp);
        
        if($datetime1>$datetime2 and $data_user_class == "lab"){
          $display_time_none = "";
        }else{
          $display_time_none = "display:none;";
        }
//        echo $data_user_class." +".$stamp;

        ?>
        <font color="#ff0000;"  style="position: absolute;right: 15px;" id="time_toplace_<?=$val[id];?>"><?="ถึงประมาณ ".$stamp." น.";?></font>
            </span>
            <button class="btn btn-xs edit-post-shop" id="btn_edit_time_<?=$val[id];?>" onclick="editTimeToPlace('<?=$val[id];?>');" style="<?=$display_time_none;?>">แก้ไขเวลา</button>
            <span class="font-14 time-post-shop" id="txt_date_diff_<?=$val[id];?>">-</span>
       
            </td>
            
          </tr>
    </table>
        <?php 
        if($val[driver_complete]==0){
      /*onclick="cancelBookAll('<?=$val[id];?>','<?=$val[invoice];?>');" */
        ?>
        <a class="btn waves-effect waves-light red lighten-3" align="center"  onclick="fn.showDialog('cancel-shop-dialog');$('#order_id_cancel').val('<?=$val[id];?>');"id="cancel_book_<?=$val[id];?>" style="
    color: #fff;margin-right: 15px;
    padding: 5px 20px;
    border-radius: 25px;
    background-color: #F44336 ;
    margin-top: 10px;">
    <span class="font-22 text-cap"><?=t_cancel;?></span>
  </a>
  	   <?php if($val[lab_approve_job]==0 and $data_user_class == "lab"){ ?>
	   <a class="btn waves-effect waves-light green lighten-3" align="center" onclick="approveBook('<?=$val[id];?>','<?=$val[invoice];?>','<?=$val[drivername];?>');" id="apporve_book_<?=$val[id];?>" style="
	    color: #fff;
	    padding: 5px 20px;
	    border-radius: 25px;
	    background-color: #4CAF50 !important;
	    margin-top: 10px;">
	    <span class="font-22 text-cap"><?=ยืนยัน;?></span>
	  </a>
	  <? } ?>
  <? } ?>
 
  </div>
  </div>
  <ons-dialog id="cancel-shop-dialog" cancelable>
      <!-- Optional page. This could contain a Navigator as well. -->
      <ons-page>
        <ons-toolbar>
          <div class="center">ยกเลิกรายการ</div>
        </ons-toolbar>
        <p style="text-align: center">กรุณาเลือกเหตุผลที่จะยกเลิก</p>
        <form action="#" style="margin-left: 25px;" id="form_type_cancel">
        <input type="hidden" value="0" id="order_id_cancel" name="order_id_cancel"/>
        	<div>
			  <!-- <p class="checkradio"><input class="with-gap" name="type" type="radio" id="test1" value="1"><label for="test1">แขกลงทะเบียนไม่ได้</label></p>
			   <input type="hidden" value="แขกลงทะเบียนไม่ได้" name="typname_1">
			   <p class="checkradio"><input class="with-gap" name="type" type="radio" id="test2" value="2"><label for="test2">แขกไม่ไป</label></p>
			   <input type="hidden" value="แขกไม่ไป" name="typname_2">
			   <p class="checkradio"><input class="with-gap" name="type" type="radio" id="test3" value="3"><label for="test3">เลือกสถานที่ผิด</label></p>-->
			   <input type="hidden" name="typname_1" value="แขกลงทะเบียนไม่ได้" />
			   <input type="hidden" name="typname_2"  value="แขกไม่ไป" />
			   <input type="hidden" name="typname_3" value="เลือกสถานที่ผิด" />
			   <ons-list-item tappable>
		        <label class="left">
		          <ons-radio class="radio-fruit" input-id="test1" value="1" name="type_cancel"></ons-radio>
		        </label>
		        <label for="test1" class="center">แขกลงทะเบียนไม่ได้</label>
		      </ons-list-item>
		      <ons-list-item tappable>
		        <label class="left">
		          <ons-radio class="radio-fruit" input-id="test2" value="2" name="type_cancel"></ons-radio>
		        </label>
		        <label for="test2" class="center">แขกไม่ไป</label>
		      </ons-list-item>
		      <ons-list-item tappable modifier="longdivider">
		        <label class="left">
		          <ons-radio class="radio-fruit" input-id="test3" value="3" name="type_cancel"></ons-radio>
		        </label>
		        <label for="test3" class="center">เลือกสถานที่ผิด</label>
		      </ons-list-item>
			   <!--<input type="hidden" value="เลือกสถานที่ผิด" name="typname_3">-->
		    </div>
		</form>
        <p style="text-align: center">
          <ons-button modifier="light" onclick="fn.hideDialog('cancel-shop-dialog')">ปิด</ons-button>
          <ons-button class="button--outline" onclick="submitCancel();">ยืนยัน</ons-button>
        </p>
      </ons-page>
    </ons-dialog>
  <script>
//    console.log("เวลาจอง : <?=$time_c;?> || <?=$minutes_to_add;?> นาที || ")
    console.log("<?=$stamp;?> || <?=$current_time;?>")
    var d1 = "<?=date('Y/m/d H:i:s',$val[post_date]);?>";
//    console.log(d1);
    var d2 = js_yyyy_mm_dd_hh_mm_ss();
//    console.log("<?=$val[invoice];?> : "+d1+" = "+d2);
    $('#txt_date_diff_<?=$val[id];?>').text(CheckTime(d1,d2));
//    console.log(formatDate('<?=$val[transfer_date];?>'));

    $('#date_book_<?=$val[id];?>').text(formatDate('<?=$val[transfer_date];?>'));
  </script>
<?    
    } ?>

<script>
	function openDetailBooking(key, type){
		
		var detailObj = array_data.manage[key];
		fn.pushPage({'id': 'popup1.html', 'title': detailObj.invoice}, 'fade-md');
		console.log(detailObj);
		var url = "shop/detail_shop"+"?user_id=<?=$user_id;?>";
      	$.post(url,detailObj,function(data){
      		$('#body_popup1').html(data);
      	});
      	
      	$('#check_open_shop_id').val(detailObj.id);
		
	}
	function submitCancel(){
		var order_id = $('#order_id_cancel').val();
       if(! $('input[name="type_cancel"]').is(':checked')){

	   		 ons.notification.alert({
                        message: 'กรุณาเลือกสาเหตุที่ยกเลิก',
                        title: "ข้อมูลไม่ครบ",
                        buttonLabel: "ปิด"
                    })
                    .then(function() {
                       
                    });
	   }	 

       console.log($('#form_type_cancel' ).serialize());

	   var url = "shop/cancel_shop"+"?id="+order_id+"&username=<?=$arr[web_user][username];?>";
	   
	   console.log(url+" ");

	   $.post( url,$('#form_type_cancel' ).serialize(), function( data ) {
	   	var obj = JSON.parse(data);
	   		console.log(obj);
				if(obj.result==true){
				 ons.notification.alert({
                        message: 'ยกเลิกสำเร็จ',
                        title: "สำเร็จ",
                        buttonLabel: "ปิด"
                    })
                    .then(function() {
                       fn.hideDialog('cancel-shop-dialog');
                    });	
				$('#btn_cancel_book_'+order_id).hide();
				/*var url_check_st = "mod/booking/shop_history/load/component_shop.php?request=check_status_shop&status="+data.status;
				console.log(url_check_st);
				
				$.post( url_check_st,$('#form_type_cancel' ).serialize(), function( com ) {
					$('#status_booking_detail').html(com);
					swal("<?=t_success;?>", "", "success");
				});*/

				var url_messages = "send_onesignal/cancel_shop?order_id="+order_id;
				$.post( url_messages, function( res ) {
					console.log(res)
				});
			}
	   });

	}
</script>