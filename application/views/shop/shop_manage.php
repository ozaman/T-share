<input type="hidden" id="open_shop_manage" value="1" />
<?php 
	$data_user_class = $_COOKIE[detect_userclass];
  if(count($_POST[data])<=0){ 
     echo '<div class="font-22" style="color: #ff0000;text-align: center;padding: 0px; margin-top: 10px;" id="no_work_div"><strong>ไม่มีงาน</strong></div>';
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
			$txt_lab_ap = '<span class="font-17 lab-active-shop" >พนักงานรับทราบแล้ว</span>';
		}else{
			$txt_lab_ap = '<span class="font-17 lab-none-active-shop" >พนักงานยังไม่รับทราบงานนี้</span>';
		}
		$tr_lab_ap = '';
	}
	else{
		$tr_lab_ap = 'display:none;';
	}
	 $sql_ps = "SELECT topic_th,id FROM shopping_product  WHERE id='".$val[program]."' ";
 	$query_ps = $this->db->query($sql_ps);
 	$res_ps = $query_ps->row();

        $minutes_to_add = $val[airout_m];
//        echo $minutes_to_add." ++";
        $time_c = date('H:i',$val[update_date]); //ดึงเวลา อัพเดทเวลา ล่าสุด
        $time = new DateTime($time_c);
//        $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
        
        $stamp = $time->format('H:i');
//        echo $stamp." +";
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
  <div style="padding: 5px 0px;margin: 12px 10px;" >
    <!-- <span id="date_book_<?=$val[id];?>">-</span> -->
  <div class="box-shop">
  	
  	<?php 
  		if($data_user_class == "lab"){ ?>
  	<button class="btn btn-xs edit-post-shop" id="btn_edit_time_<?=$val[id];?>" onclick="editTimeToPlace('<?=$val[id];?>');" style="<?=$display_time_none;?>"><span class="font-14">แก้ไขเวลา</span></button>		
  	<?	}
  	?>
  	 <span class="time-post-shop" id="txt_date_diff_<?=$val[id];?>" style="font-size:14px;">-</span>
    <table width="100%"  >
    	  <tr style="<?=$tr_lab_ap;?>">
    	  	<td><?=$txt_lab_ap;?></td>
    	  	<td></td>
    	  </tr>
          <tr>
            <td width="80%" ><span class="font-17"><?=$res_ps->topic_th;?></span></td>
            <td width="20%" align="center" rowspan="2">
            <div class="font-18" id="status_book_<?=$val[id];?>" style="margin-top: -20px;
    margin-left: -85px;
    position: absolute;
    max-width: 150px;
    width: 100%;" align="center">
            <?=$status_txt;?></div>
            </td>
          </tr>
          <?php 
      if($data_user_class == "lab"){ ?>
   <tr>
            <td colspan="2" style="padding: 0px 0px;">
            <div class="font-17">ป้ายทะเบียน&nbsp;:&nbsp;<a><?=$val[car_plate]." ";?></a>
            </div>
           

            </td>
            
          </tr>   
    <?  }
    ?>
    <tr>
            <td colspan="2" style="padding: 0px 0px;">
            <div class="font-17">จำนวนแขก&nbsp;:&nbsp;<a><span id="txt_mn_pax_<?=$val[id];?>"><?=$val[pax]." ";?></span> คน</a>
            </div>
           

            </td>
            
          </tr>
          
          <tr>
            <td colspan="2">
            <span class="font-17" ><?=$val[invoice];?>
            
           <!-- <font color="#ff0000;" style="position: absolute;right: 25px;"><?=$val[airout_h].":".str_pad($val[airout_m], 2, '0', STR_PAD_LEFT)." ".t_n;?></font>-->
       
        <font color="#ff0000;" style="position: absolute;right: 25px;" id="time_toplace_<?=$val[id];?>"><?="ถึงประมาณ ".$stamp." น.";?></font>
            </span>
            
           
       
            </td>
            
          </tr>
          <tr>
            <td colspan="2">
              <table width="100%">
               <tr>
                  <td width="35%">
              
             <ons-button onclick="cancelShopSelect('<?=$val[id];?>', '<?=$val[invoice];?>', '<?=$val[drivername];?>');" id="cancel_book_<?=$val[id];?>"  id="btn_edit_time_<?=$val[id];?>" style="padding: 15px;
    border-radius: 5px;
    line-height: 0;
    border: 1px solid #fe3824;
    color: #fe3824;" modifier="outline" class="button-margin button button--outline button--large"></i>&nbsp; <span class="font-17 text-cap"><?=t_cancel;?></span> </ons-button>
        
            </td>
            <td width="65%">
             
             <ons-button onclick="openDetailShop('<?=$key;?>','<?=$_GET[type];?>','<?=$val[invoice];?>');" style="padding: 15px;
    border-radius: 5px;
    line-height: 0;
    " modifier="outline" class="button-margin button button--outline button--large"></i>&nbsp; <span class="font-17 text-cap">จัดการ</span> </ons-button>
         
            </td>
                </tr>
                <?php if($val[lab_approve_job]==0 and $data_user_class == "lab"){ ?>
                <tr>
                	<td colspan="2">
                		<ons-button id="apporve_book_<?=$val[id];?>"  onclick="approveBook('<?=$val[id];?>','<?=$val[invoice];?>','<?=$val[drivername];?>');" 
                		style="padding: 15px; border-radius: 5px; line-height: 0;border:1px solid #4CAF50;color: #4CAF50;argin-top: 5px;" modifier="outline" class="button-margin button button--outline button--large">&nbsp; <span class="font-17 text-cap">รับทราบ</span> </ons-button>
                	</td>
                </tr>
                 <? } ?>
              </table>
              
            </td>
          </tr>
    </table>

 
  </div>
  </div>
  
  <script>
//    console.log("<?=$stamp;?> || <?=$current_time;?>")
    var d1 = "<?=date('Y/m/d H:i:s',$val[post_date]);?>";
    var d2 = js_yyyy_mm_dd_hh_mm_ss();
    $('#txt_date_diff_<?=$val[id];?>').text(CheckTime(d1,d2));
    $('#date_book_<?=$val[id];?>').text(formatDate('<?=$val[transfer_date];?>'));
  </script>
<?    
    } ?>
    
<template id="change-time.html">
 <ons-alert-dialog id="change-time-dialog" modifier="rowfooter">
    <div class="alert-dialog-title">แก้ไขเวลา</div>
    <div class="alert-dialog-content">
    	<input type="hidden" value="0" id="order_id_change_time" />
      	<div style="margin: 0px 5px;margin-bottom: 10px;">
        <select class="select-input font-17" name="time_num_change_time" id="time_num_change_time" value="" onchange="calTime(this.value)" style="border-radius: 0px;padding: 5px;width: 100%; width: 100%;">
          <option value="0">-- เลือกเวลา --</option>
          <?php
          $time = array("5" => "5 นาที",
            "10" => "10 นาที",
            "15" => "15 นาที",
            "20" => "20 นาที",
            "25" => "25 นาที",
            "30" => "30 นาที",
            "35" => "35 นาที",
            "40" => "40 นาที",
            "45" => "45 นาที",
            "50" => "50 นาที",
            "55" => "55 นาที",
            "60" => "1 ชัวโมง.",
            "90" => "1 ชัวโมง 30 นาที",
            "120" => "2 ชัวโมง",
            "150" => "2 ชัวโมง 30 นาที",
            "180" => "3 ชัวโมง",
            "210" => "3 ชัวโมง 30 นาที",
            "240" => "4 ชัวโมง",
            "270" => "4 ชัวโมง 30 นาที",
            "300" => "5 ชัวโมง",
            "330" => "5 ชัวโมง 30 นาที",
            "360" => "6 ชัวโมง",
            "390" => "6 ชัวโมง 30 นาที",
            "420" => "7 ชัวโมง",
            "450" => "7 ชัวโมง 30 นาที",
            "490" => "8 ชัวโมง");
          $mm = 5;
          ?>
          <?php foreach ($time as $key => $at) { ?>
            <option value="<?=$key; ?>"><?=$at; ?></option>
          <?php }
          ?>
        </select>
      </div>
       <span class="font-17">จะถึงใน <span id="show_to_time" style="color: #ff0000;">17:37</span> น.</span>
    </div>
    <div class="alert-dialog-footer">
      <ons-alert-dialog-button onclick="document.getElementById('change-time-dialog').hide();">ยกเลิก</ons-alert-dialog-button>
      <ons-alert-dialog-button onclick="submitChangeTimeToPlace();">แก้ไข</ons-alert-dialog-button>
    </div>
  </ons-alert-dialog>
</template>