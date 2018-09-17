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
       border-radius: 8px 8px 0 8px;
    margin-right: 10px;
    border: 1px solid #333;
    padding: 5px;
    position: absolute;
    z-index: 1;
    right: 0px;
    background-color: #fff;
    margin-top: -108px;
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
<div class="col-md-12" style="margin-bottom: 20px">
  <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="margin-left: 4px; padding-right: 12px;">
              <img src="assets/images/ex_card/crd.png?v=1537169817" width="25px;">
                <!--<b style="width: 100px;font-size: 14px;">หมดอายุ</b>-->
            </div>
            <div class="center list-item__center">
                <!--<ons-input id="idcard-input" float=""  name="ex_idcard" style="width:100%;" value="" placeholder="วันหมดอายุ" >
                    <input type="text"  class="text-input"  name="ex_idcard" id="ex_idcard">
                    <span class="text-input__label">
                        วันหมดอายุ</span>
                </ons-input>-->
                 <ons-input id="idcard-input" float=""  name="ex_booking" style="width:100%;" value="<?=date('Y/m/d')?>" placeholder=""  >
                    <input type="date"  class="text-input"  name="ex_booking" id="ex_booking" value="<?=date('Y/m/d')?>">
                    <span class="text-input__label">
                        </span>
                </ons-input>
                <span style="color: #afafaf;  font-size: 13px;   position: absolute;  right: 45px;">เลือกวันที่</span>  
            </div>
            
        </ons-list-item>
<!-- <input type="date" class="form-control" value="" name="date_report" id="date_report" > -->
</div>
<?php 
 $result = $his;
 // echo "<br/><br/><br/><br/>123<br/>";
 // echo print_r($result->status);
  // echo "<br/>";
 // echo print_r($result->data);
  // echo "<br/>"; echo "<br/>".count($result->data);
   if(count($result->data)<=0){ 
   
      echo '<div class="font-26" style="color: #ff0000;text-align: center;padding: 0px; margin-top: -10px;" id="no_work_div"><strong>ไม่มีงาน</strong></div>';
   
    //exit();
  }
 foreach($result->data as $key=>$val){
 	if($val->status=='CANCEL'){

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

    else if($val->status=='NEW'){
      $status_txt = '<strong><font color="#3b5998">'.t_new.'</font></strong>';
    }
    else if($val->status=='COMPLETED'){
      $status_txt = '<strong><font color="#54c23d">'.t_success.'</font></strong>';
    }
    if($data_user_class == "taxi"){
      if($val->lab_approve_job==1){
      $txt_lab_ap = '<span class="font-16 lab-active-shop" >พนักงานรับทราบแล้ว</span>';
    }else{
      $txt_lab_ap = '<span class="font-16 lab-none-active-shop" >พนักงานยังไม่รับทราบงานนี้</span>';
    }
  }
  ?>
   <div style="padding: 5px 0px;margin: 12px 10px;">
  <div class="box-shop" >
    <?=$txt_lab_ap;?>
    <table width="100%"  onclick="openDetailBookinghistory('<?=$key;?>','his','<?=$val->invoice;?>');">
          <tr>
            <td width="80%" ><span class="font-20">คิงส์ พาวเวอร์ (ภูเก็ต)</span></td>
            <td width="20%" align="center" rowspan="2">
            <div class="font-18" id="status_book_<?=$val->id;?>" style="margin-top: -20px;
    margin-left: -85px;
    position: absolute;
    max-width: 150px;
    width: 100%;" align="center">
            <?=$status_txt;?></div>
            </td>
          </tr>
          <tr>
            <td colspan="2" style="padding: 10px 0px;">
            <div class="font-14">ป้ายทะเบียน&nbsp;:&nbsp;<a><?=$val->car_plate." ";?></a>
            </div>
           

            </td>
            
          </tr>
          <tr>
            <td colspan="2">
            <span class="font-16" ><?=$val->invoice;?>&nbsp;:&nbsp;
            <span id="date_book_<?=$val->id;?>">-</span>
            
        <?php 
        $minutes_to_add = $val->airout_m;
        $time_c = date('H:i',$val->update_date); //ดึงเวลา อัพเดทเวลา ล่าสุด
        $time = new DateTime($time_c);
        $stamp = $time->format('H:i');
        $current_time = date('H:i');
        $datetime1 = new DateTime($current_time);
        $datetime2 = new DateTime($stamp);
        if($datetime1>$datetime2 and $data_user_class == "lab"){
          $display_time_none = "";
        }else{
          $display_time_none = "display:none;";
        }
        ?>
        <font color="#ff0000;"  style="position: absolute;right: 15px;" id="time_toplace_<?=$val->id;?>"><?="ถึงประมาณ ".$stamp." น.";?></font>
            </span>
            <button class="btn btn-xs edit-post-shop" id="btn_edit_time_<?=$val->id;?>" onclick="editTimeToPlace('<?=$val->id;?>');" style="<?=$display_time_none;?>">แก้ไขเวลา</button>
            <span class="font-14 time-post-shop" id="txt_date_diff_<?=$val->id;?>">-</span>
       
            </td>
            
          </tr>
    </table>
        <?php 
        if($val->driver_complete==0){
      
        ?>
        <a class="btn waves-effect waves-light red lighten-3" align="center"  onclick="fn.showDialog('cancel-shop-dialog');$('#order_id_cancel').val('<?=$val->id;?>');"id="cancel_book_<?=$val->id;?>" style="
    color: #fff;margin-right: 15px;
    padding: 5px 20px;
    border-radius: 8px;
    background-color: #F44336 ;
    margin-top: 10px;">
    <span class="font-22 text-cap"><?=t_cancel;?></span>
  </a>
       <?php if($val->lab_approve_job==0 and $data_user_class == "lab"){ ?>
     <a class="btn waves-effect waves-light green lighten-3" align="center" onclick="approveBook('<?=$val->id;?>','<?=$val->invoice;?>','<?=$val->drivername;?>');" id="apporve_book_<?=$val->id;?>" style="
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

    // console.log("<?=$stamp;?> || <?=$current_time;?>")
    var d1 = "<?=date('Y/m/d H:i:s',$val->post_date);?>";
    console.log(d1)

  var d2 = js_yyyy_mm_dd_hh_mm_ss();
 console.log("<?=$val->invoice;?> : "+d1+" = "+d2);
 $('#txt_date_diff_<?=$val->id;?>').text(CheckTime(d1,d2));
//    console.log(formatDate('<?=$val->transfer_date;?>'));

   $('#date_book_<?=$val->id;?>').text(formatDate('<?=$val->transfer_date;?>'));
   
  </script>

<?php
 }


	$data_user_class = $_COOKIE[detect_userclass];

  // exit();
	  /*$sql = "SELECT topic_th FROM shopping_product  WHERE id=".$val[program]." ";
	  $query = $this->db->query($sql);
	  $arr[shop] = $query->row();*/

     ?>