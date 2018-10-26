<?php 
 	$result = json_encode($_POST[data]);
 	$result = json_decode($result);

   if(count($result)<=0){ 
      echo '<div class="font-22" style="color: #ff0000;text-align: center;padding: 0px; margin-top: -10px;" id="no_work_div"><strong>ไม่มีงาน</strong></div>';
  }
   foreach($result as $key=>$val){

 	if($val->status=='CANCEL'){

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
 /* if($_COOKIE[detect_userclass]=="taxi"){
  	$hide_plate = "display:none;";
  	$time_post_ps = "margin-top: -85px;";
  }else{
  	$time_post_ps = "margin-top: -105px;";
  }*/
  $time_post_ps = "margin-top: -20px;";
  
  $sql = "SELECT * FROM shop_type_cancel  WHERE id='".$val->cancel_type."' ";
   	$query_cancel = $this->db->query($sql);
   	$res_cancel = $query_cancel->row();
  ?>
   <div style="padding: 5px 0px;margin: 12px 10px;">
  <div class="box-shop" >
    <?=$txt_lab_ap;?>
     <span class="time-post-shop-his" style="font-size:14px;<?=$time_post_ps;?>" id="txt_date_diff_<?=$val->id;?>">-</span>
    <table width="100%"  onclick="openDetailBookinghistory('<?=$key;?>','his','<?=$val->invoice;?>');">
          <tr>
            <td width="80%" ><span class="font-17">คิงส์ พาวเวอร์ (ภูเก็ต)</span></td>
            <td width="20%" align="center" rowspan="2">
            <!--<div class="font-17" id="status_book_<?=$val->id;?>" style="margin-top: -20px;
    margin-left: -85px;
    position: absolute;
    max-width: 150px;
    width: 100%;" align="center">
            <?=$status_txt;?></div>-->
            </td>
          </tr>
          <tr style="<?=$hide_plate;?>">
            <td colspan="2" style="padding: 2px 0px;">
            <div class="font-17">ป้ายทะเบียน&nbsp;:&nbsp;<a><?=$val->car_plate." ";?></a>
            </div>
            </td>
          </tr>
          <tr>
          	<td colspan="2" style="padding: 2px 0px;">
          		<span class="font-17">จำนวนแขก : <?=intval($val->adult)+intval($val->child)." ";?> คน</span>
          	</td>
          </tr>
          <tr>
          	<td><div class="font-17">
          	<?php 
          	if($val->adult>0){ ?>
          	ผู้ใหญ่ : <span id="txt_mn_adult_<?=$val->id;?>"><?=$val->adult;?></span> 
          	<? } ?>
          	<?php 
          	if($val->child>0){ ?>
			เด็ก : <span id="txt_mn_child_<?=$val->id;?>"><?=$val->child;?></span></div></td>	
			<? }
          	?>
          	
          </tr>
          <tr>
            <td colspan="2">
            <span class="font-17" ><?=$val->invoice;?>            
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
           
       
            </td>
            
          </tr>
          <?php 
          if($val->status=="CANCEL"){ ?>
		  	<tr>
         		<td colspan="2">
         			<div style=" margin-top: 5px;"><b class="font-18"><font color="#ff0000">ยกเลิก<br/><?=$res_cancel->s_topic;?></font></b></div>
         		</td>
         	</tr>
		 <? }
          ?>
		  <tr>
		  	<td colspan="2">
		  		<ons-button onclick="openDetailBookinghistory('0','','<?=$val->invoice;?> ');" style="padding: 15px;    margin-top: 5px;border: 1px solid #0076ff;
    border-radius: 5px;
    line-height: 0;
    " modifier="outline" class="button-margin button button--outline button--large">&nbsp; <span class="font-17 text-cap">ตรวจสอบ</span> </ons-button>
		  	</td>
		  </tr>
    </table>
  </div>
  </div>
  <script>
    var d1 = "<?=date('Y/m/d H:i:s',$val->post_date);?>";
//    console.log(d1)
    var d2 = js_yyyy_mm_dd_hh_mm_ss();
// 	console.log("<?=$val->invoice;?> : "+d1+" = "+d2);
 	$('#txt_date_diff_<?=$val->id;?>').text(CheckTimeV2(d1,d2));
  </script>

<?php
 }?>