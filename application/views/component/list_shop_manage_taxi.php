<?php
$data_user_class = $_COOKIE[detect_userclass];
$val = $_POST[data];

     $sql_dv = "SELECT name,nickname,phone,name_en,zello_id,line_id,username FROM web_driver WHERE id='".$val[drivername]."'    ";
    $query_dv = $this->db->query($sql_dv);
    $res_dv = $query_dv->row();
    
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

          $contract = "taxi";
	   	if($res_dv->nickname!=""){
			$nickname = " (".$res_dv->nickname.")";
		}else{
			$nickname = "";
		}
	
    $query_q = $this->db->query("SELECT t1.*, t2.topic_th as name_type, t3.name_th as province_name,t2.topic_th as topoic_pcs, t3.name_th as province_name, t4.name_th as area FROM place_car_station as t1 left join place_car_station_type as t2 on t1.type = t2.id left join web_province as t3 on t1.province = t3.id left join web_area as t4 on t1.amphur = t4.id where t1.member = ".$val[drivername]);
	$row_q = $query_q->row();

 $query_car = $this->db->query("SELECT t1.id, t1.i_car_gen,t2.name_en as name_brand, t3.name_en as name_gen, t4.name_th as color FROM web_carall as t1 left join web_car_brand as t2 on t1.i_car_brand = t2.id left join web_car_gen as t3 on t1.i_car_gen = t3.id left join web_car_color as t4 on t1.i_car_color = t4.id where t1.id = ".$val[check_use_car_id]);
	$row_car = $query_car->row();
	
	 $sql = "SELECT * FROM shop_type_cancel  WHERE id='".$val[cancel_type]."' ";
   	$query_cancel = $this->db->query($sql);
   	$res_cancel = $query_cancel->row();
//   	echo json_encode($res_cancel);
          ?>
<div >
   <input type="hidden" id="check_status_<?=$val[id];?>" value="<?=$val[status];?>" />
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
                        <td width="33%" align="left" style="padding: 0px; border: 1px solid #ccc; box-shadow: 1px 1px 3px #9e9e9e;">
                           <div class="btn" style=" width:100%; text-align:left; border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_phone" onclick="contactDriver('<?=$contract;?>','phone', '<?=$res_ps->id;?>','<?=$val[id];?>');">
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
                        <td width="33%" align="left" style="padding: 0px; border: 1px solid #ccc; box-shadow: 1px 1px 3px #9e9e9e;">
                           <div class="btn " style=" width:100%; text-align:left;  border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_zello" onclick="contactDriver('<?=$contract;?>','zello','<?=$res_ps->id;?>','<?=$val[id];?>');">
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
                        <td width="33%" align="left" style="padding: 0px; border: 1px solid #ccc; box-shadow: 1px 1px 3px #9e9e9e;">
                           <div class="btn" style=" width:100%; text-align:left;  border-radius: 0px;" data-toggle="dropdown" id="shop_sub_menu_map" onclick="contactDriver('<?=$contract;?>','line','<?=$res_ps->id;?>','<?=$val[id];?>');">
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
                 
               	  if($val[lab_approve_job]==1){
					$hide_btn_photo = "";
					$sql_l = "SELECT username,name FROM web_driver WHERE id='".$val[lab_approve_job_post]."'    ";
			    	$query_l = $this->db->query($sql_l);
			    	$res_l = $query_l->row();
				}else{
					$hide_btn_photo = "display:none;";
				  }
               	?>
			   	<i class="material-icons font-28" style="color: rgb(59, 89, 152);  border-radius: 50%; padding: 2px; border: 2px solid rgb(59, 89, 152);<?=$hide_btn_photo;?>" onclick="modalShowImg('../data/pic/driver/small/<?=$res_l->username;?>.jpg');" >account_circle</i>
			   
            </td>
         </tr>
        
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
                       $txt_cancel = t_cancel;
                        if($val[lab_approve_job]==0){ 
                        	$btn_cancel_taxi = "";
                        }else{
                        	$btn_cancel_taxi = "display:none;";
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
                       
                     </td>
                  </tr>
               </table>
            </td>
        	</tr>
         <?php }
		 else{ 
		 	$sql_del = "SELECT * FROM history_del_order_booking WHERE order_id= ".$val[id]."  ";
		    $query_del = $this->db->query($sql_del);
		    $res_del = $query_del->row();
		    
		 	if($res_del->class_user_cancel=="taxi"){ ?>
				<tr>
         		<td colspan="2">
         			<table width="100%" >
         				<tr>
			         		<td width="50%">
			         			<div style=" margin-top: 5px;"><b class="font-18"><font color="#ff0000">ยกเลิก<br/><?=$res_cancel->s_topic;?></font></b></div>
			         		</td>
			         		<td align="right">
								<span class="font-17"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#ff9800;"></i>&nbsp;<font color="#ff9800">รอรับทราบ</font></span>
			         		</td>
			         	</tr>
         			</table>
         		</td>
         	</tr>
			<? }else{ ?>
				<tr>
         		<td colspan="2">
         			<table width="100%" >
         				<tr>
		         		<td>
		         			<div style=" margin-top: 5px;"><b class="font-18"><font color="#ff0000">ปฏิเสธ<br/><?=$res_cancel->s_topic;?></font></b></div>
		         		</td>
		         		<td>
								<ons-button id="taxi_apporve_cancel_<?=$val[id];?>"  onclick="userApproveCancel('<?=$val[id];?>','<?=$val[invoice];?>');" 
		                           style="padding: 15px; border-radius: 5px; line-height: 0;border:1px solid #4CAF50;color: #4CAF50;argin-top: 5px;<?=$btn_approve;?>" modifier="outline" class="button-margin button button--outline button--large" ><span class="font-17 text-cap">รับทราบ</span> </ons-button>
							
		         		</td>
         	</tr>
         			</table>
         		</td>
         	</tr>
			<?php }
		 
         }
		 
		 ?>
      </table>
   </div>
</div>
<script>
   var d1 = "<?=date('Y/m/d H:i:s',$val[post_date]);?>";
   var d2 = js_yyyy_mm_dd_hh_mm_ss();
   $('#txt_date_diff_<?=$val[id];?>').text(CheckTimeV2(d1,d2));
   $('#date_book_<?=$val[id];?>').text(formatDate('<?=$val[transfer_date];?>'));
</script>