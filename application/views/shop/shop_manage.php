<input type="hidden" id="open_shop_manage" value="1" />
<?php 
   $data_user_class = $_COOKIE[detect_userclass];
    if(count($_POST[data])<=0){ 
       echo '<div class="font-22" style="color: #ff0000;text-align: center;padding: 0px; margin-top: 10px;" id="no_work_div"><strong>ไม่มีงาน</strong></div>';
      //exit();
    }

      foreach ($_POST[data] as $key=>$val){
     $sql_dv = "SELECT name,nickname,phone,name_en,zello_id,line_id FROM web_driver WHERE id='".$val[drivername]."'    ";
    $query_dv = $this->db->query($sql_dv);
    $res_dv = $query_dv->row();
    
      /*if($val[lab_approve_job] == 0){
        $status_txt = '<strong><font color="#ff0000">รอตอบรับ</font></strong>';
      }
      else if($val[lab_approve_job] ==1){
        $status_txt = '<strong><font color="#54c23d">ตอบรับแล้ว</font></strong>';
      }*/
    $sql_ps = "SELECT topic_th,id FROM shopping_product  WHERE id='".$val[program]."' ";
   	$query_ps = $this->db->query($sql_ps);
   	$res_ps = $query_ps->row();
   	
          $minutes_to_add = $val[airout_m];
   //        echo $minutes_to_add." ++";
          $time_c = date('H:i',$val[update_date]); //ดึงเวลา อัพเดทเวลา ล่าสุด
          $time = new DateTime($time_c);
          if( in_array( $_SERVER['REMOTE_ADDR'], array( '127.0.0.1', '::1' ) ) ) { // debug mode on localhost ('127.0.0.1' IP in IPv4 and IPv6 formats)
		   	}else{
		   		$time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
		   	}
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
          if($data_user_class=="taxi"){
   		$contract = "lab";
   	}else{
   		$contract = "taxi";
   	}
   	if($res_dv->nickname!=""){
		$nickname = " (".$res_dv->nickname.")";
	}else{
		$nickname = "";
	}
	
    $query_q = $this->db->query("SELECT t1.*, t2.topic_th as name_type, t3.name_th as province_name,t2.topic_th as topoic_pcs, t3.name_th as province_name, t4.name_th as area FROM place_car_station as t1 left join place_car_station_type as t2 on t1.type = t2.id left join web_province as t3 on t1.province = t3.id left join web_area as t4 on t1.amphur = t4.id where t1.member = ".$val[drivername]);
	$row_q = $query_q->row();

 $query_car = $this->db->query("SELECT t1.i_car_gen,t2.name_en as name_brand, t3.name_en as name_gen, t4.name_th as color FROM web_carall as t1 left join web_car_brand as t2 on t1.i_car_brand = t2.id left join web_car_gen as t3 on t1.i_car_gen = t3.id left join web_car_color as t4 on t1.i_car_color = t4.id where t1.id = ".$val[check_use_car_id]);
	$row_car = $query_car->row();
	
	 $sql = "SELECT * FROM shop_type_cancel  WHERE id='".$val[cancel_type]."' ";
   	$query_cancel = $this->db->query($sql);
   	$res_cancel = $query_cancel->row();
//   	echo json_encode($res_cancel);
          ?>
<div style="padding: 5px 0px;margin: 12px 10px;" >
   <a href="tel://<?=$val[phone];?>" target="_blank" style="display: none;" id="phone_driver_<?=$val[id];?>"><?=$val[phone];?></a>
   <a href="zello://<?=$res_dv->zello_id;?>?add_user" target="_blank" style="display: none;" id="zello_driver_<?=$val[id];?>"><?=$res_dv->zello_id;?></a>
   <a href="line://ti/p/<?=$res_dv->line_id;?>" target="_blank" style="display: none;" id="line_driver_<?=$val[id];?>"><?=$res_dv->zello_id;?></a>
   <div class="box-shop">
      <span class="time-post-shop" id="txt_date_diff_<?=$val[id];?>" style="font-size:14px;">-</span>
      <span class="font-18"><b>ติดต่อ</b></span>
      <table width="100%"  >
         <tr>
            <td colspan="2">
               <table width="100%" border="0" cellspacing="1" cellpadding="1" style=" margin-top: 0px;">
                  <tbody>
                     <tr>
                        <td width="33%" align="left" style="padding: 0px;">
                           <div class="btn" style=" width:100%; text-align:left; /*padding:2px; padding-left:5px;*/ height:40px;border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_phone" onclick="contactDriver('<?=$contract;?>','phone', '<?=$res_ps->id;?>','<?=$val[id];?>');">
                              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                 <tbody>
                                    <tr>
                                       <td align="center" width="30"><i class="fa fa-phone-square" style="font-size:32px; color: #8DC63F; border:none;"></i></td>
                                       <td align="center" class="font-17"><b>โทร</b></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </td>
                        <td width="33%" align="left" style="padding: 0px;">
                           <div class="btn " style=" width:100%; text-align:left;  /*padding:2px;*/height:40px;border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_zello" onclick="contactDriver('<?=$contract;?>','zello','<?=$res_ps->id;?>','<?=$val[id];?>');">
                              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                 <tbody>
                                    <tr>
                                       <td align="center" width="30"><img src="assets/images/social/zello.png" width="30" height="30" alt=""> </td>
                                       <td align="center" class="font-17">
                                          <b>Zello</b>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </td>
                        <td width="33%" align="left" style="padding: 0px;">
                           <div class="btn" style=" width:100%; text-align:left;  /*padding:2px;*/height:40px;border-radius: 0px;" data-toggle="dropdown" id="shop_sub_menu_map" onclick="contactDriver('<?=$contract;?>','line','<?=$res_ps->id;?>','<?=$val[id];?>');">
                              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                 <tbody>
                                    <tr>
                                       <td align="center" width="30"><img src="assets/images/social/line.png" width="30" height="30" alt=""></td>
                                       <td align="center" class="font-17"><b>Line</b></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
         <tr>
            <td width="70%" ><span class="font-17"><?=$res_ps->topic_th;?></span></td>
            <td width="30%" align="center" rowspan="1">
               <?php 
                  if($data_user_class == "lab"){  ?>
               <button style="border-radius: 5px;padding: 2px 5px;" class="btn btn-xs edit-post-shop pull-right" id="btn_edit_time_<?=$val[id];?>" onclick="editTimeToPlace('<?=$val[id];?>');" style="<?=$display_time_none;?>"><span class="font-14">แก้ไขเวลา</span></button>   
               <? }
                  ?>
            </td>
         </tr>
         <?php 
            if($data_user_class == "lab"){ ?>
		 <tr>
         	<td><?=$row_q->topoic_pcs;?> : <?=$row_q->topic_th;?></td>
         	<td></td>
         </tr>
          
		 <tr>
		 	<td colspan="2">
		 		<?="จ.".$row_q->province_name." อ.".$row_q->area;?>
		 	</td>
		 </tr>
         
         <tr>
         	<td colspan="2">คนขับ : <?=$res_dv->name.$nickname;?></td>
         </tr>
         <tr>
         	<td colspan="2">ยี่ห้อ : <?=$row_car->name_brand;?> รุ่น : <?=$row_car->name_gen;?> สี : <?=$row_car->color;?></td>
         </tr>
        
         <tr>
            <td colspan="2" style="padding: 0px 0px;">
               <div class="font-17">ป้ายทะเบียน&nbsp;:&nbsp;<a><?=$val[car_plate]." ";?></a>
               </div>
            </td>
         </tr>
         <?  }
            ?>
         <tr>
            <td>
               <div class="font-17">
               	    จำนวน : 
                  <?php 
                     if($val[adult]>0){ ?>
                  ผู้ใหญ่ : <span id="txt_mn_adult_<?=$val[id];?>"><?=$val[adult];?></span> 
                  <? } ?>
                  <?php 
                     if($val[child]>0){ ?>
                  เด็ก : <span id="txt_mn_child_<?=$val[id];?>"><?=$val[child];?></span>	
                  <? }
                     ?>
               </div>
            </td>
         </tr>
         <tr>
            <td colspan="2">
               <span class="font-17" >เลขจอง : <?=$val[invoice];?></span>
               <!-- <font color="#ff0000;" style="position: absolute;right: 25px;"><?=$val[airout_h].":".str_pad($val[airout_m], 2, '0', STR_PAD_LEFT)." ".t_n;?></font>-->
               <font color="#ff0000;" style="position: absolute;right: 25px;" id="time_toplace_<?=$val[id];?>"><?="ถึงประมาณ ".$stamp." น.";?></font>
            </td>
         </tr>
         <?php 
         if($val[status]!="CANCEL"){
         ?>
         	<tr>
            	<td colspan="2">
               <table width="100%">
                  <tr>
                     <?php 
                        if($data_user_class == "lab"){
                        $txt_cancel = "ปฏิเสธ";
                        }else{
                        $txt_cancel = t_cancel;
                        if($val[lab_approve_job]==0){ 
                        $btn_cancel_taxi = "";
                        }else{
                        $btn_cancel_taxi = "display:none;";
                        }
                        }
                        ?>
                     <td width="35%" valign="top" style="<?=$btn_cancel_taxi;?>" id="td_cancel_book_<?=$val[id];?>">
                        <ons-button onclick="cancelShopSelect('<?=$val[id];?>', '<?=$val[invoice];?>', '<?=$val[drivername];?>');" id="cancel_book_<?=$val[id];?>"  id="btn_edit_time_<?=$val[id];?>" style="padding: 15px;
                           border-radius: 5px;
                           line-height: 0;
                           border: 1px solid #fe3824;
                           color: #fe3824;" modifier="outline" class="button-margin button button--outline button--large">&nbsp; 
                           <span class="font-17 text-cap"><?=$txt_cancel;?></span>
                        </ons-button>
                     </td>
                     <td width="65%">
                        <?php 
                           if($data_user_class == "lab"){
                            $text_mn = 'จัดการ';
                           if($val[lab_approve_job]==0){ 
                           $btn_approve= "";
                           $btn_manage = "display:none;";
                           }else{
                           $btn_approve = "display:none;";
                           $btn_manage = "";
                           }?>
                        <ons-button id="apporve_book_<?=$val[id];?>"  onclick="approveBook('<?=$val[id];?>','<?=$val[invoice];?>','<?=$val[drivername];?>');" 
                           style="padding: 15px; border-radius: 5px; line-height: 0;border:1px solid #4CAF50;color: #4CAF50;argin-top: 5px;<?=$btn_approve;?>" modifier="outline" class="button-margin button button--outline button--large" >&nbsp; <span class="font-17 text-cap">รับทราบ</span> </ons-button>
                        <ons-button id="opendetail_book_<?=$val[id];?>" onclick="openDetailShop('<?=$key;?>','<?=$_GET[type];?>','<?=$val[invoice];?>');" style="padding: 13px;
                           border-radius: 5px;
                           line-height: 0;<?=$btn_manage;?>
                           " modifier="outline" class="button-margin button button--outline button--large" id="btn_manage_<?=$val[id];?>"><span class="font-17 text-cap"><?=$text_mn;?></span> </ons-button>
                        <? 
                           }
                           else if($data_user_class == "taxi"){
                                  if ($val[check_guest_register] == 1) {
                                   $text_mn = 'เช็คยอดรายได้';
                                    # code...
                                  }

                                  if($val[check_driver_topoint]==0){
                           		$text_mn = 'แจ้งถึงสถานที่ส่งแขก';
                           		$btn_manage_display = "display: none;";
                           		$btn_manage_topoint_display = "";
                           		}
                                  else{
                                    $text_mn = 'ตรวจสอบ';
                           			$btn_manage_display = "";
                           			$btn_manage_topoint_display = "display:none;";
                                  }
                           		if($val[lab_approve_job]==1){
                           			$btn_manage = "";
                           			$txt_wait_approve = "display:none;";
                           			
                           		}else{
                           			$btn_manage = "display:none;";
                           			$txt_wait_approve = "";
                           		}
                           		?>
                        <ons-button onclick="checkinAndOpenDetail('<?=$val[id];?>','<?=$key;?>');" style="padding: 13px;border: 1px solid #0076ff;
                           border-radius: 5px;
                           line-height: 0;<?=$btn_manage;?><?=$btn_manage_topoint_display;?>
                           " modifier="outline" class="button-margin button button--outline button--large" id="btn_manage_topoint_<?=$val[id];?>">
                           <span class="font-17 text-cap">แจ้งถึงสถานที่ส่งแขก</span> </ons-button>   
                           		
                        <ons-button onclick="openDetailShop('<?=$key;?>','<?=$_GET[type];?>','<?=$val[invoice];?>');" style="padding: 13px;border: 1px solid #0076ff;
                           border-radius: 5px;
                           line-height: 0;<?=$btn_manage;?><?=$btn_manage_display;?>
                           " modifier="outline" class="button-margin button button--outline button--large" id="btn_manage_<?=$val[id];?>"><span class="font-17 text-cap">
                           <?=$text_mn;?></span> 
                           </ons-button>
                        <div style="padding-left: 30px;<?=$txt_wait_approve;?>" align="center" id="txt_wait_<?=$val[id];?>"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#ff9800;"></i>&nbsp;<font color="#ff9800">รอการตอบรับ</font></div>
                        <?				
                           }
                                    ?>
                     </td>
                  </tr>
               </table>
            </td>
        	</tr>
         <?php }

		 else{ ?>
         	<tr>
         		<td colspan="2">
         			<table width="100%" >
         				<tr>
         		<td>
         			<div style=" margin-top: 5px;"><b class="font-18"><font color="#ff0000">ยกเลิก<br/><?=$res_cancel->s_topic;?></font></b></div>
         			
         		</td>
         		<td>
         			<?php 
         			if($data_user_class == "lab"){ 
         			?>
         				<span class="font-17"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#ff9800;"></i>&nbsp;<font color="#ff9800">รอรับทราบ</font></span>
         			<?php }
         			else{ ?>
						<ons-button id="taxi_apporve_cancel_<?=$val[id];?>"  onclick="taxiApproveCancel('<?=$val[id];?>');" 
                           style="padding: 15px; border-radius: 5px; line-height: 0;border:1px solid #4CAF50;color: #4CAF50;argin-top: 5px;<?=$btn_approve;?>" modifier="outline" class="button-margin button button--outline button--large" >&nbsp; <span class="font-17 text-cap">ตกลง</span> </ons-button>
					<?php }
         			?>
         		</td>
         	</tr>
         			</table>
         		</td>
         	</tr>
        <? }?>
      </table>
   </div>
</div>
<script>
   var d1 = "<?=date('Y/m/d H:i:s',$val[post_date]);?>";
   var d2 = js_yyyy_mm_dd_hh_mm_ss();
   $('#txt_date_diff_<?=$val[id];?>').text(CheckTimeV2(d1,d2));
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
         <span id="txt_show_to_time" class="font-17" style="display: none;">จะถึงใน <span id="show_to_time" style="color: #ff0000;">17:37</span> น.</span>
      </div>
      <div class="alert-dialog-footer">
         <ons-alert-dialog-button onclick="document.getElementById('change-time-dialog').hide();">ยกเลิก</ons-alert-dialog-button>
         <ons-alert-dialog-button onclick="submitChangeTimeToPlace();">แก้ไข</ons-alert-dialog-button>
      </div>
   </ons-alert-dialog>
</template>