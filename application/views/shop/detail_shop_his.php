<?php 

 $place_shopping = "topic_th";
 $data_user_class = $_COOKIE[detect_userclass];
 $main_color = "#3b5998";
  $arr[book] = $_POST ;
 
 $sql_od = "SELECT car_plate, car_type FROM  order_booking  where id = '".$arr[book][id]."'  ";
 $query_od = $this->db->query($sql_od);
 $res_od = $query_od->row();
 
  $sql_ps = "SELECT ".$place_shopping.",id,province,lat,lng,address FROM shopping_product  WHERE id='".$arr[book][program]."' ";
 $query_ps = $this->db->query($sql_ps);
 $res_ps = $query_ps->row();

$sql_pv = "SELECT name FROM web_province  WHERE id=".$res_ps->province." ";
$query_pv = $this->db->query($sql_pv);
$data_pv = $query_pv->row();

 $sql_dv = "SELECT name,nickname,phone,name_en FROM web_driver WHERE id='".$arr[book][drivername]."'    ";
 $query_dv = $this->db->query($sql_dv);
 $res_dv = $query_dv->row();

 if($_COOKIE['lng']=="th"){
 	 $full_name_driver = $res_dv->name." (".$res_dv->nickname.")";

 }else{
 	$full_name_driver =  $res_dv->name_en;

 }
 $full_name_driver = $res_dv->name." (".$res_dv->nickname.")";

 if($arr[book][status]=='CANCEL'){
			 if($arr[book][cancel_type]=='1'){
				$status_txt = '<font color="#ff0000"> ยกเลิก '.t_customer_no_register.'</font>';
			}
			else if($arr[book][cancel_type]=='2'){
				$status_txt = '<font color="#ff0000"> ยกเลิก '.t_customer_not_go.'</font>';
			}
			else if($arr[book][cancel_type]=='3'){
				$status_txt = '<font color="#ff0000"> ยกเลิก '.t_wrong_selected_place.'</font>';
			}else{
				$status_txt = '<font color="#ff0000">ยกเลิก ไม่ระบุ</font>';
			}
}
else if($arr[book][status]=='NEW'){
			$status_txt = '<font color="#3b5998">'.t_new.'</font>';
		}
else if($arr[book][status]=='CONFIRM'){
			$status_txt = '<font color="#54c23d">'.t_success.'</font>';
		}
	if($arr[book][driver_complete]==1){
		$cancel_shop = 'display:none;';
	}
	
//	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
//  	$check_pay_dv = $db->num_rows("pay_history_driver_shopping","id","order_id=".$_POST[id]." and status = 1"); 
/*	$query = $this->db->query("SELECT id FROM pay_history_driver_shopping where order_id=".$_POST[id]." and status = 1");
	$check_pay_dv = $query->num_rows();
  	if($check_pay_dv>0){
		$show_alert = "";
	}else{
		$show_alert = "display:none;";
	}
	*/
$sql_country = "SELECT t2.s_country_code, t2.s_topic_th FROM shop_country_com_list_price_taxi as t1 left join shop_country_icon_taxi as t2 on t1.i_shop_country_icon = t2.id WHERE t1.id='".$arr[book][plan_id]."'    ";
  $query_country = $this->db->query($sql_country);
  $res_country = $query_country->row();


	if($arr[book][price_park_unit] != 0){
    $park_total = number_format($arr[book][price_park_unit],2);
    $display_park = "";
  }else{
    $display_park = "display:none";
  }
  
  if($arr[book][price_person_unit] != 0){
    $person_total = number_format(intval($arr[book][price_person_unit]) * intval($arr[book][pax_regis]),2);
    $cal_person = $arr[book][price_person_unit]."*".$arr[book][pax_regis];
    $display_person = "";
  }else{
    $display_person = "display:none";
  }
  $total_price_all = number_format($arr[book][price_park_unit] + (intval($arr[book][price_person_unit]) * intval($arr[book][pax_regis])),2);
  
  if($arr[book][commission_persent] != 0){
    $display_com = "";
    $com_persent = $arr[book][commission_persent];
    $total_price_all = '<span style="padding-left: 0px;"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i>&nbsp;<font color="#FF0000">รอดำเนินการ</font></span>';
  }else{
    $display_com = "display:none";
    
  }
  
  $query_price = $this->db->query("select * from shop_country_com_list_price_taxi where i_shop_country_com_list = '".$arr[book][plan_id]."' ");
  $num = 0;
  foreach ($query_price->result() as $row_price){
      if($num>=1){
        $push = " + ";
      }else{
        $push = "";
      }
         $plan .= $push.$row_price->s_topic_th;
         $num++;
         
       if($row_price->s_topic_en=="park"){
        $check_type_park = 1;
       }
       
       if($row_price->s_topic_en=="person"){
        $check_type_person= 1;
       }  
       
       if($row_price->s_topic_en=="comision"){
          $check_type_com = 1;
        if($arr[book][total_commission]>0){
          
        }
       }  
  }
?>
<script>
	$('#date_trans').text(formatDate('<?=$arr[book][transfer_date];?>'));
	$('#header_clean').text('<?=$_POST[invoice];?>');
	console.log('IOS : <?=$_GET[ios];?>');
</script>

<input type="hidden" value="<?=$_POST[id];?>" id="id_order" />
<input type="hidden" value="<?=$_POST[drivername];?>" id="id_driver_order" />
<ons-card class="assas_<?=$_POST[id];?>" style=" padding:10px 12px;" >

	<button class="button button--outline" onclick="fn.showDialog('cancel-shop-dialog');$('#order_id_cancel').val('<?=$_POST[id];?>');" style="    float: right;
    /* position: absolute; */
    /* right: 10px; */
    border: 1px solid #F44336;
    color: #F44336;
    box-shadow: 1px 1px 3px #efefef;
    padding: 0px 4px;
    border-radius: 5px;
    top: 0px;
    /* margin: 15px; */<?=$cancel_shop;?>"><span class="font-20 text-cap"><?=t_cancel;?></span></button>

	<div id="status_booking_detail" class="font-26" style=""><b><?=$status_txt;?></b></div>
	<span class="font-20"><?=$res_ps->$place_shopping;?></span>
		
	<table width="100%" border="0" cellspacing="1" cellpadding="1">
   <tbody>
      
      <tr>
         <td width="33%" align="left" style="padding: 0px;" >
            <div class="btn  btn-default" style=" width:100%; text-align:left; /*padding:2px; padding-left:5px;*/ height:40px;border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_phone" onclick="openContact('<?=$res_ps->id;?>');">
               <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tbody>
                     <tr>
                        <td align="center" width="30"><i class="fa fa-phone-square" style="font-size:32px; color: #8DC63F; border:none;"></i></td>
                        <td align="center" class="font-22"><b><?=t_call;?></b></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
         <td width="33%" align="left" style="padding: 0px;" >
            <div class="btn  btn-default" style=" width:100%; text-align:left;  /*padding:2px;*/height:40px;border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_zello" onclick="openZello('<?=$res_ps->id;?>');">
               <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tbody>
                     <tr>
                        <td align="center" width="30"><img src="assets/images/social/zello.png" width="30" height="30" alt=""/> </td>
                        <td align="center" class="font-22">
                           <b>Zello</b>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
         <td width="33%" align="left"  style="padding: 0px;"  >
            <div class="btn  btn-default" style=" width:100%; text-align:left;  /*padding:2px;*/height:40px;border-radius: 0px;" data-toggle="dropdown" id="shop_sub_menu_map" onclick="openShopMap('<?=$res_ps->lat;?>','<?=$res_ps->lng;?>','<?=$res_ps->address;?>', '<?=$data_pv->name;?>')">
               <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tbody>
                     <tr>
                        <td align="center" width="30"><img src="assets/images/social/map.png" width="30" height="30" alt=""/></td>
                        <td align="center" class="font-22"><b><?=t_maps;?></b></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
      </tr>
   </tbody>
	</table>
	
	<div style="padding: 5px 0px;">
     <ons-list-header class="list-header"> <?=t_reservation_information;?></ons-list-header>
		<!-- <span class="text-cap font-22"></span> -->
		<table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" style="display:nones" id="table_show_hide_data">
   		<tbody>
   		<tr>
	      <td width="100" class="font-16 text-cap"><font color="#333333"><?=t_booking_no;?></font></td>
	      <td class="font-16"><span id="txt_invoice_shop_detail"><?=$arr[book][invoice];?></span></td>
   		</tr>
   		</tbody>
		<tbody>
      <tr>
         <td class="font-16 text-cap"><font color="#333333"><?=t_date;?></font></td>
         <td class="font-16"><span id="date_trans"></span></td>
      </tr>
      <tr>
         <td class="font-16 text-cap"><font color="#333333"><?=t_arrival_time;?></font></td>
        <td class="font-16"><?=$stamp." น.";?></td>
      </tr>
      <tr>
         <td class="font-16 text-cap"><font color="#333333"><?=t_number;?></font></td>
        <td class="font-16" style="padding: 0 !important;" >
            <table width="100%">
            	<!-- <tr>
            		<td width="100%" colspan="2">
            			<span class="font-16">
            				<?
				            if($arr[book][adult]>0){ ?>
				            <?=t_adult;?> :
				            <?=$arr[book][adult];?>
				            &nbsp;
				            <? } ?>
				            <? if($arr[book][child]>0){ ?>
				            <?=t_child;?> :
				            <?=$arr[book][child];?>
				            <? } ?>
            			</span>
            		</td>
            		
            	</tr> -->
            	<tr>
        			<td>	
        				<span id="isedit"><?
            if($arr[book][adult]>0){ ?>
            <?=t_adult;?> :
            
            &nbsp;
            <? } ?>
            <span id="num_final_edit"><?=$arr[book][adult];?> </span></span>
            <span id="text_edit_persion" style="display: none;"><?
        			 if($arr[book][adult]>0){ ?>
            <?=t_adult;?> :
           
            &nbsp;
            <? } ?>
           </span>
        			
        			<input type="number" name="" id="num_edit_persion" style="height: 30px;
    width: 50px;
    padding: 0px;
    font-size: 16px;
    margin: auto;
    display: none;" value="<?=$arr[book][adult];?>" >
        				
        			</td>

        			<td>
        				<? if($arr[book][child]>0){ ?>
            <?=t_child;?> :
            <?=$arr[book][child];?>
            <? } ?>
        			</td>
        		</tr>
     	
            	<tr>
            	<?php 
            		if($arr[book][num_ch]>0){ ?>
						<td style="padding: 0 !important;">
		            		<table>
		            			<tr>
		            				<td width="20"><span class="font-16">จีน</span></td>
		            				<td width=""><img src="assets/images/flag/China.png" width="25" height="25" alt=""></td>
		            			</tr>
		            		</table>
	            		</td>
				<? } ?>
				<?php 
            		if($arr[book][num_other]>0){ ?>
						<td style="padding: 0 !important;">
		            		<table>
		            			<tr>
		            				<td width="20"><span class="font-16">ต่างชาติ</span></td>
		            				<td width=""><img src="assets/images/flag/Other.png" width="25" height="25" alt=""></td>
		            			</tr>
		            		</table>
	            		</td>
				<? } ?>

            	</tr>
            </table>
         </td>
      </tr>
         </tbody>
</table>
	</div>
	
	<div style="padding: 5px 0px;">
     	<ons-list-header class="list-header"> <?=t_work_remuneration;?></ons-list-header>
     	<!-- <table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_income_driver">
     		<tr>
     			<td width="100"><span class="font-16">ประเภท</span></td>
     			<td><span class="font-16">ค่าหัว + ค่าจอด</span></td>
     		</tr>
     		<tr style="<?=$display_park;?>">
     			<td width="100"><span class="font-16">ค่าจอด</span></td>
     			<td align=""><span class="font-16"><?=$park_total;?> บาท</span></td>
     		</tr>
     		<tr style="<?=$display_person;?>">
     			<td width="100"><span class="font-16">ค่าหัว</span></td>
     			<td align=""><span class="font-16"><?=$cal_person;?> = <?=$person_total;?> บาท</span></td>
     		</tr>
     		<tr style="<?=$display_com;?>">
     			<td width="100"><span class="font-16">ค่าคอม</span></td>
     			<td align=""><span class="font-16"><?=$com_persent;?> %</span>
                </td>
     		</tr>
     		<tr>
     			<td  width="100">รวม</td>
     			<td><span class="16">
     				<span style="padding-left: 0px;"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i>&nbsp;<font color="#FF0000">รอดำเนินการ</font></span>
     			</span>
     			</td>
     		</tr>
     	</table> -->
        <table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_income_driver">
        <input type="hidden" value="<?=$arr[book][price_person_unit];?>" id="val_person_unit" />
        <input type="hidden" value="<?=$arr[book][price_park_unit];?>" id="val_park_unit" />
        <input type="hidden" value="<?=$arr[book][commission_persent];?>" id="val_com_persent" />
        <tr>
          <td width="110"><span class="font-17">ประเภท</span></td>
          <td colspan="2"><span class="font-17" id="txt_type_plan"><?=$plan;?></span></td>
        </tr>
        <tr>
          <td width="110"><span class="font-17">สัญชาติ</span></td>
          <td colspan="2">
            <table>
              <tr>
                <td>
                  <img src="<?=base_url();?>assets/images/flag/icon/<?=$res_country->s_country_code;?>.png" width="25" height="25" alt="">
                </td>
                <td>&nbsp;</td>
                <td><span class="font-17" id="txt_county_pp"><?=$res_country->s_topic_th;?></span></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr style="<?=$display_park;?>">
          <td width="110"><span class="font-17">ค่าจอด</span></td>
          <td align="right"><span class="font-17" id="txt_park_total"><?=$park_total;?></span></td>
          <td width="15%"><span class="font-17">บาท</span></td>
        </tr>
        <tr style="<?=$display_person;?>">
          <td width="110"><span class="font-17">ค่าหัว</span></td>
          <td align="right"><span class="font-17" id="txt_person_total"><?=$cal_person;?> = <?=$person_total;?></span></td>
          <td width="15%"><span class="font-17">บาท</span></td>
        </tr>
        <tr style="<?=$display_com;?>">
          <td width="110"><span class="font-17">ค่าคอม</span></td>
          <td align="right"><span class="font-17" id="txt_com_persent"><?=$com_persent;?> %</span>
                </td>
                <td width="15%">
                </td>
        </tr>
        <tr>
          <td  width="110">รวม</td>
          <td align="right">
            <span class="16" id="txt_all_total">
              <?=$total_price_all;?>
            </span>
          </td>
           <td width="90">
            <span class="font-17">บาท</span>
           </td>
        </tr>
      </table>
    </div>
    
	<div style="padding: 5px 0px;">
     <ons-list-header class="list-header"> <?=t_car_driver_information;?></ons-list-header>

		<!-- <span class="text-cap font-22"><?=t_car_driver_information;?></span> -->
		<table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_hide_driver">
		  <tr>
		    <td width="100"  class="font-16"><font color="#333333"></font><?=t_dv_name;?></td>
		    <td colspan="3" class="font-16">
			<?=$full_name_driver;?></td>
		  </tr>
		  <tbody>
		    <!-- <tr>
		      <td  width="100" class="font-16"><font color="#333333"><?=t_type_of_vehicle;?></font></td>
		      <td class="font-16"><? echo $res_od->car_type; ?></td>
		    
		      <td class="font-16"><?=$car_color;?></td>
		    </tr> -->
		    <tr>
		      <td   width="100"  class="font-16"><font color="#333333"><?=t_car_registration_number;?></font></td>
		      <td colspan="3" class="font-16"><?=$res_od->car_plate;?></td>
		    </tr>
		     <tr>
		      <td   width="100"  class="font-16"><font color="#333333"><?=t_call;?></font></td>
		      <td colspan="3" class="font-16"><a href="tel:<?=$res_od->phone;?>" ><?=$arr[book][phone];?></a></td>
		    </tr>
		  </tbody>
		</table>
	</div>
	<?php 
	if($arr[book][status]!='CANCEL'){ 
	
	?>
	<div style="padding: 5px 0px;">
     <ons-list-header class="list-header"> ข้อมูลการเช็คอิน คนขับ</ons-list-header>
   <div class="div-all-checkin">
      <table width="100%" border="0" cellspacing="2" cellpadding="0" class=" border-alert" id="box_driver_topoint">
         <tbody>
            <tr>
               <td width="50" rowspan="2">
                  <div class="step-booking" id="number_driver_topoint">1</div>
                  <div style="position:absolute; margin-top:-40px; margin-left: -5px;">
                     <img src="assets/images/no.png" align="absmiddle" id="iconchk_driver_topoint">
                  </div>
               </td>
               <td colspan="2">
                  <button id="btn_driver_topoint" onclick="btn_driver_topoint('<?=$arr[book][id];?>')" type="button" class="btn  btn-info " style="width:100%;text-align:left;padding:5px; background-color:#3b5998;  border-radius: 20px; border:none;color: #fff; "><span class="font-20 text-cap"><i class="icon-new-uniF12D-1" style="width:10px;"></i>  ถึงสถานที่ส่งแขก</span></button>
               </td>
            </tr>
            <tr>
               <td style="height:30px;">
                  <div id="status_driver_topoint">
                     <div class="font-16">
                        <i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">รอดำเนินการ</font></strong>
                     </div>
                  </div>
               </td>
               <td width="30">
                  <table width="100%">
                     <tbody>
                        <tr>
                           <td>
                              <i id="driver_topoint_locat_off" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">location_on</i>
                              <i id="driver_topoint_locat_on" onclick="openPointMaps('driver_topoint','<?=$arr[book][id];?>');" class="material-icons" style="color: rgb(59, 89, 152); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(59, 89, 152); display: none;">location_on</i>
                           </td>
                           <td>
                              <i id="photo_driver_topoint_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
                              <i id="photo_driver_topoint_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="viewPhotoShop('<?=$arr[book][id];?>','driver_topoint','<?=$arr[book][driver_topoint_date];?>');">photo_camera</i>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
         </tbody>
      </table>
      <input type="hidden" value="<?=$arr[book][driver_topoint];?>" id="driver_topoint_check_click">
      <input type="hidden" id="check_code" value="<?=$arr[book][id];?>">
   </div>
</div>
<div style="width: 100%;height: 5px;background-color: #ddd ;margin: 10px 0px;" ></div>
<div style="padding: 5px 0px;">
   <span class="text-cap font-20"> ข้อมูลการเช็คอิน พนักงาน</span>
   <table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="1" id="table_show_hide_checkin_S00085">
      <tbody>
         <tr id="step_guest_receive" style="display:none">
            <td class="font-16">
               <div class="div-all-checkin">
                  <table width="100%" border="0" cellspacing="2" cellpadding="0" class="" id="box_guest_receive">
                     <tbody>
                        <tr>
                           <td width="50" rowspan="2">
                              <div class="step-booking" id="number_guest_receive">2</div>
                              <div style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="assets/images/no.png" align="absmiddle" id="iconchk_guest_receive"></div>
                           </td>
                           <td colspan="2">
                              <button id="btn_guest_receive" onclick="btn_guest_receive('<?=$arr[book][id];?>')" type="button" class="btn  btn-info " style="width:100%;text-align:left;padding:5px; background-color:#3b5998;  border-radius: 20px; border:none;color: #fff; "><span class="font-20 text-cap"><i class="icon-new-uniF159-5" style="width:10px;"></i>  พนักงานรับแขก</span></button>
                              <input type="hidden" value="<?=$arr[book][check_guest_receive];?>" id="guest_receive_check_click">
                           </td>
                        </tr>
                        <tr>
                           <td style="height:30px;">
                              <div id="status_guest_receive">
                                 <div class="font-16"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">รอดำเนินการ</font></strong></div>
                              </div>
                           </td>
                           <td width="30">
                              <table width="100%">
                                 <tbody>
                                    <tr>
                                       <td>
                                          <i id="guest_receive_locat_off" class="material-icons" style="color: #3b59987a;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 1px #3b59987a;display: nones;">location_on</i>
                                          <i id="guest_receive_locat_on" onclick="openPointMaps('guest_receive','<?=$arr[book][id];?>');" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;">location_on</i>
                                       </td>
                                       <td>
                                          <i id="photo_guest_receive_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
                                          <i id="photo_guest_receive_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="viewPhotoShop('<?=$arr[book][id];?>','guest_receive','<?=$arr[book][guest_receive_date];?>');">photo_camera</i>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
	      
            </td>
         </tr>
         <tr id="step_guest_register" style="display:none">
            <td class="font-16">
               <div class="div-all-checkin">
                  <table width="100%" border="0" cellspacing="2" cellpadding="0" id="box_guest_register">
                     <tbody>
                        <tr>
                           <td width="50" rowspan="2">
                              <div class="step-booking" id="number_guest_register">3</div>
                              <div style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="assets/images/no.png" align="absmiddle" id="iconchk_guest_register"></div>
                           </td>
                           <td colspan="2"><button id="btn_guest_register" onclick="btn_guest_register('<?=$arr[book][id];?>')" type="button" class="btns  btn-info " style="width:100%;text-align:left;padding:5px; background-color:#3b5998;  border-radius: 20px; border:none;color: #fff; "><span class="font-20 text-cap"><i class="icon-new-uniF116-6" style="width:10px;"></i>แขกลงทะเบียน</span></button></td>
                        </tr>
                        <tr>
                           <td style="height:30px;">
                              <div id="status_guest_register">
                                 <div class="font-16"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">รอดำเนินการ</font></strong></div>
                              </div>
                              <input type="hidden" value="<?=$arr[book][check_guest_register];?>" id="guest_register_check_click">
                           </td>
                           <td width="30">
                              <table width="100%">
                                 <tbody>
                                    <tr>
                                       <td>
                                          <i id="guest_register_locat_off" class="material-icons" style="color: #3b59987a;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 1px #3b59987a;display: nones;">location_on</i>
                                          <i id="guest_register_locat_on" onclick="openPointMaps('guest_register','<?=$arr[book][id];?>');" class="material-icons location" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;">location_on</i>
                                       </td>
                                       <td>
                                          <i id="photo_guest_register_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
                                          <i id="photo_guest_register_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="viewPhotoShop('<?=$arr[book][id];?>','guest_register','<?=$arr[book][guest_register_date];?>');">photo_camera</i>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                            
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>	      
            </td>
         </tr>
         <tr id="step_driver_pay_report" style="display:none">
            <td class="font-16">
               <div class="div-all-checkin">
                  <table width="100%" border="0" cellspacing="2" cellpadding="0">
                     <tbody>
                        <tr>
                           <td width="50" rowspan="2">
                              <div class="step-booking" id="number_driver_pay_report">4</div>
                              <div style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="assets/images/no.png" align="absmiddle" id="iconchk_driver_pay_report"></div>
                           </td>
                           <td colspan="2">
                              <button id="btn_driver_pay_report" onclick="btn_driver_pay_report('<?=$arr[book][id];?>')" type="button" class="btn  btn-info " style="width:100%;text-align:left;padding:5px; background-color:#3b5998;  border-radius:  20px; border:none;color: #fff;"><span class="font-20 text-cap"><i class="icon-new-uniF121-10" style="width:10px;"></i> แจ้งยอดรายจ่าย</button>
                           </td>
                        </tr>
                        <tr>
                           <input type="hidden" value="<?=$arr[book][check_driver_pay_report];?>" id="driver_pay_report_check_click">
                           <td style="height:30px;">
                              <div id="status_driver_pay_report">
                                 <div class="font-16"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">รอดำเนินการ</font></strong></div>
                              </div>
                           </td>
                           <td width="30">
                              <table width="100%">
                                 <tbody>
                                    <tr>
                                       <td>
                                       
                                       </td>
                                       <td>
                                          <i id="photo_driver_pay_report_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
                                          <i id="photo_driver_pay_report_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="viewPhotoShop('<?=$arr[book][id];?>','driver_pay_report','<?=$arr[book][driver_pay_report_date];?>');">photo_camera</i>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>  
               </div>
            </td>
         </tr>
      </tbody>
   </table>
</div>
	
 <? } ?>

</ons-card>
<input type="hidden" id="check_cause" value="0"/>
<input type="hidden" id="check_id_income" value="<?=$arr[book][id];?>"/>