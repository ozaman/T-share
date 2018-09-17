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
    margin-left: -0px;
/*    background-color: #fff;*/
    color: #fb0006;
}
.time-post-shop {
    border-radius: 10px;
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
  border-radius:10px;
  border: 1px solid #3b5998;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 1px 5px 0 rgba(0,0,0,.12), 0 3px 1px -2px rgba(0,0,0,.2);
}
</style>

<?php 
echo json_encode($his);
	$data_user_class = $_COOKIE[detect_userclass];
  if(count($_POST[data])<=0){ 
    if($_POST[type]=="his"){
      echo '<div class="font-26" style="color: #ff0000;text-align: center;padding: 0px; margin-top: -10px;" id="no_work_div"><strong>ไม่มีงาน</strong></div>';
    }else{
      echo '<div class="font-26" style="color: #ff0000;text-align: center;padding: 15px;" id="no_work_div"><strong>ไม่มีงาน</strong></div>';
    }
    //exit();
  }
      
    foreach ($his as $val->data){
    
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
  <div style="padding: 5px 0px;margin: 12px 10px;">
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
    border-radius: 8px;
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