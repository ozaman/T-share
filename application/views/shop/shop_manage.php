
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
    margin-top: -28px;
    margin-left: 5px;
    background-color: #fff;
    color: #4CAF50;
}
.lab-none-active-shop {
    position: absolute;
    z-index: 1;
/*    right: 15px;*/
/*    margin-top: 90px;*/
   	margin-top: -28px;
    margin-left: 5px;
    background-color: #fff;
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
    margin-top: -93px;
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
  padding: 17px 10px;
  border-radius:25px;
  border: 1px solid #3b5998;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 1px 5px 0 rgba(0,0,0,.12), 0 3px 1px -2px rgba(0,0,0,.2);
}
</style>
<?php 

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
			$txt_lab_ap = '<span class="font-20 lab-active-shop" >พนักงานรับทราบแล้ว</span>';
		}else{
			$txt_lab_ap = '<span class="font-20 lab-none-active-shop" >พนักงานยังไม่รับทราบงานนี้</span>';
		}
	}
  ?>
  <div style="padding: 5px 0px;margin: 25px 0px;">
  <div class="box-shop">
  	<?=$txt_lab_ap;?>
    <table width="100%"  onclick="openDetailBooking('<?=$key;?>','<?=$_GET[type];?>');">
          <tr>
            <td width="80%" ><span class="font-24"><?=$arr[shop][topic_th];?></span></td>
            <td width="20%" align="center" rowspan="2">
            <div class="font-22" id="status_book_<?=$val[id];?>" style="margin-top: -20px;
    margin-left: -85px;
    position: absolute;
    max-width: 150px;
    width: 100%;" align="center">
            <?=$status_txt;?></div>
            </td>
          </tr>
          <tr>
            <td colspan="2" style="    padding: 10px 0px;">
            <div class="font-20">ป้ายทะเบียน&nbsp;:&nbsp;<a><?=$val[car_plate]." ";?></a>
            </div>
           

            </td>
            
          </tr>
          <tr>
            <td colspan="2">
            <span class="font-20" ><?=$val[invoice];?>&nbsp;:&nbsp;
            <span id="date_book_<?=$val[id];?>">-</span>
            <!--<font color="#ff0000;" style="position: absolute;right: 25px;"><?=$val[airout_h].":".str_pad($val[airout_m], 2, '0', STR_PAD_LEFT)." ".t_n;?></font>-->
        <?php 
        $minutes_to_add = $val[airout_m];
//        echo $minutes_to_add." ++";
        $time_c = date('H:i',$val[update_date]); //ดึงเวลา อัพเดทเวลา ล่าสุด
        $time = new DateTime($time_c);
        $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
        echo $time_c;
        $stamp = $time->format('H:i');
        $current_time = date('H:i');
        
        $datetime1 = new DateTime($current_time);
        $datetime2 = new DateTime($stamp);
        
        if($datetime1>$datetime2 and $data_user_class == "lab"){
          $display_time_none = "";
        }else{
          $display_time_none = "display:none;";
        }
//        echo $data_user_class." +";
        ?>
        <font color="#ff0000;"  style="position: absolute;right: 15px;" id="time_toplace_<?=$val[id];?>"><?="ถึงโดยประมาณ ".$stamp." น.";?></font>
            </span>
            <button class="btn btn-xs edit-post-shop" id="btn_edit_time_<?=$val[id];?>" onclick="editTimeToPlace('<?=$val[id];?>');" style="<?=$display_time_none;?>">แก้ไขเวลา</button>
            <span class="font-20 time-post-shop" id="txt_date_diff_<?=$val[id];?>">-</span>
        
            </td>
            
          </tr>
    </table>
        <?php 
        if($val[driver_complete]==0){
      
        ?>
        <a class="btn waves-effect waves-light red lighten-3" align="center" onclick="cancelBookAll('<?=$val[id];?>','<?=$val[invoice];?>');" id="cancel_book_<?=$val[id];?>" style="
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
