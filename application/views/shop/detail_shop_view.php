<?php 
function checkTypePay($id){
      if($id==1){
      		$name_type = t_parking_fee." + ".t_person_fee;
      }
      else if($id==2){
      		$name_type = t_parking_fee." + ".t_com_fee;
      }
      else if($id==3){
      		$name_type = t_person_fee." + ".t_com_fee;
      } 
      else if($id==4){
      		$name_type = t_parking_fee." + ".t_person_fee." + ".t_com_fee;
      }
      else if($id==5){
      		$name_type = t_parking_fee;
      }
      else if($id==6){
      		$name_type = t_person_fee;
      }
      else if($id==7){
      		$name_type = t_com_fee;
      }
      return $name_type;
 }

 $place_shopping = "topic_th";
 $data_user_class = $_COOKIE[detect_userclass];
 $main_color = "#3b5998";
  $arr[book] = $_POST ;
 
 $sql_od = "SELECT car_plate, car_type FROM  order_booking  where id = '".$arr[book][id]."'  ";
 $query_od = $this->db->query($sql_od);
 $res_od = $query_od->row();
 
  $sql_ps = "SELECT ".$place_shopping.",id,province FROM shopping_product  WHERE id='".$arr[book][program]."' ";
 $query_ps = $this->db->query($sql_ps);
 $res_ps = $query_ps->row();

$sql_pv = "SELECT name FROM web_province  WHERE id=".$res_ps->province." ";
$query_pv = $this->db->query($sql_pv);
$data_pv = $query_pv->row();
/*echo $arr[book][province];
exit();*/

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
	if($arr[book][price_park_unit] != 0){
		$park_total = number_format($arr[book][price_park_unit],2);
		$display_park = "";
	}else{
		$display_park = "display:none";
	}
	
	if($arr[book][price_person_unit] != 0){
		$person_total = number_format(intval($arr[book][price_person_unit]) * intval($arr[book][adult]),2);
		$cal_person = $arr[book][price_person_unit]."*".$arr[book][adult];
		$display_person = "";
	}else{
		$display_person = "display:none";
	}
	$total_price_all = number_format($arr[book][price_park_unit] + (intval($arr[book][price_person_unit]) * intval($arr[book][adult])),2);
	
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
	
	$sql_country = "SELECT t2.s_country_code, t2.s_topic_th FROM shop_country_com_list_price_taxi as t1 left join shop_country_icon_taxi as t2 on t1.i_shop_country_icon = t2.id WHERE t1.id='".$arr[book][plan_id]."'    ";
 	$query_country = $this->db->query($sql_country);
 	$res_country = $query_country->row();
 	
 		$minutes_to_add = $val[airout_m];
//        echo $minutes_to_add." ++";
        $time_c = date('H:i',$arr[book][update_date]); //ดึงเวลา อัพเดทเวลา ล่าสุด
        $time = new DateTime($time_c);
//        $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
        
        $stamp = $time->format('H:i');
?>


<script>
	$('#date_trans').text(formatDate('<?=$arr[book][transfer_date];?>'));
//	$('#header_clean').text('<?=$_POST[invoice];?>');
	console.log('IOS : <?=$_GET[ios];?>');
</script>
<input type="hidden" value="<?=$check_type_person;?>" id="check_type_person" />
<input type="hidden" value="<?=$check_type_park;?>" id="check_type_park"  />
<input type="hidden" value="<?=$check_type_com;?>" id="check_type_com"  />

<input type="hidden" value="<?=$_POST[id];?>" id="id_order" />
<input type="hidden" value="<?=$_POST[drivername];?>" id="id_driver_order" />
<ons-card class="assas_<?=$_POST[id];?>" style=" padding:10px 12px;" >
	<button class="button button--outline" onclick="cancelShopSelect('<?=$_POST[id];?>', '<?=$_POST[invoice];?>', '<?=$_POST[drivername];?>');" style="    float: right;
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
                        <td align="center" width="30"><img src="<?=base_url();?>assets/images/social/zello.png" width="30" height="30" alt=""/> </td>
                        <td align="center" class="font-22">
                           <b>Zello</b>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
         <td width="33%" align="left"  style="padding: 0px;"  >
            <div class="btn  btn-default" style=" width:100%; text-align:left;  /*padding:2px;*/height:40px;border-radius: 0px;" data-toggle="dropdown" id="shop_sub_menu_map" onclick="openShopMap('<?=$data_place->lat;?>','<?=$data_place->lng;?>','<?=$data_place->address;?>', '<?=$data_pv->name;?>')">
               <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tbody>
                     <tr>
                        <td align="center" width="30"><img src="<?=base_url();?>assets/images/social/map.png" width="30" height="30" alt=""/></td>
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
	      <td width="110" class="font-17 text-cap"><font color="#333333"><?=t_booking_no;?></font></td>
	      <td class="font-17"><span id="txt_invoice_shop_detail"><?=$arr[book][invoice];?></span></td>
   		</tr>
   		</tbody>
		<tbody>
      <tr>
         <td class="font-17 text-cap"><font color="#333333"><?=t_date;?></font></td>
         <td class="font-17"><span id="date_trans"></span></td>
      </tr>
      <tr>
         <td class="font-17 text-cap"><font color="#333333"><?=t_arrival_time;?></font></td>
         <td class="font-17"><?=$stamp." น.";?></td>
      </tr>
      <tr>
         <td class="font-17 text-cap"><font color="#333333"><?=t_number;?></font>
         <span  class="button " align="center" onclick="editBook('<?=$arr[book][id];?>');"  style="    background: #3b5998;
    color: #fff;
    padding: 0px 3px;
/*    font-size: 3px !important;*/
    border-radius: 8px;display: inline-block;" id="btn_isedit">
		<span class="font-14 text-cap">แก้ไข</span>
	</span>
	<span class="button " align="center" onclick="saveeditBook('<?=$arr[book][id];?>');"  style="    background: #3b5998;
    color: #fff;
    padding: 0px 3px;
/*    font-size: 3px !important;*/
    border-radius: 8px;display: none;" id="btn_selectisedit">
		<span class="font-14 text-cap">บันทึก</span>
	</span>
         </td>
        <td class="font-17" style="padding: 0 !important;" >
            <table width="100%">
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
        			
        			<input type="number" name="" id="num_edit_persion" pattern="\d*" style="height: 30px;
    width: 50px;
    padding: 0px;
    font-size: 16px;
    margin: auto;
    display: none;" value="<?=$arr[book][adult];?>" >
        				
        			</td>
        			
        			<!--<td>
        				<span  class="button " align="center" onclick="editBook('<?=$arr[book][id];?>','adult');"  style="    background: #3b5998;
    color: #fff;
    padding: 0px 10px;
    font-size: 3px !important;
    border-radius: 8px;display: inline-block;" id="btn_isedit">
		<span class="font-17 text-cap">แก้ไข</span>
	</span>
	<span class="button " align="center" onclick="saveeditBook('<?=$arr[book][id];?>');"  style="    background: #3b5998;
    color: #fff;
    padding: 0px 10px;
    font-size: 3px !important;
    border-radius: 8px;display: none;" id="btn_selectisedit">
		<span class="font-17 text-cap">บันทึก</span>
	</span>
        			</td>-->
        		</tr>

        		<tr>
        			<td>

            <?=t_child;?> :  <span id="num_final_edit_child"><?=$arr[book][child];?></span>
			<input type="number" name="" id="num_edit_child" pattern="\d*" style="height: 30px;margin-top: -25px;margin-left: 40px;
    width: 50px;
    padding: 0px;
    font-size: 16px;
/*    margin: auto;*/
    display: none;" value="<?=$arr[book][child];?>" >	
        			</td>
        			<!--<td width="60">
        				<span  class="button " align="center" onclick="editBook('<?=$arr[book][id];?>','child');" style="    background: #3b5998;
    color: #fff;
    padding: 0px 10px;
    font-size: 3px !important;
    border-radius: 8px;display: inline-block;" id="btn_isedit_child">
		<span class="font-17 text-cap">แก้ไข</span>
	</span>
	<span class="button " align="center" onclick="saveeditBook('<?=$arr[book][id];?>','child');"  style="    background: #3b5998;
    color: #fff;
    padding: 0px 10px;
    font-size: 3px !important;
    border-radius: 8px;display: none;" id="btn_selectisedit_child">
		<span class="font-17 text-cap">บันทึก</span>
	</span>
        			</td>-->
        		</tr>
     	
            	<tr>
            	<?php 
            		if($arr[book][num_ch]>0){ ?>
						<td style="padding: 0 !important;">
		            		<table>
		            			<tr>
		            				<td width="20"><span class="font-17">จีน</span></td>
		            				<td width=""><img src="<?=base_url();?>assets/images/flag/China.png" width="25" height="25" alt=""></td>
		            			</tr>
		            		</table>
	            		</td>
				<? } ?>
				<?php 
            		if($arr[book][num_other]>0){ ?>
						<td style="padding: 0 !important;">
		            		<table>
		            			<tr>
		            				<td width="20"><span class="font-17">ต่างชาติ</span></td>
		            				<td width=""><img src="<?=base_url();?>assets/images/flag/Other.png" width="25" height="25" alt=""></td>
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
		    <td width="110"  class="font-17"><font color="#333333"></font><?=t_dv_name;?></td>
		    <td colspan="3" class="font-17">
			<?=$full_name_driver;?></td>
		  </tr>
		  <tbody>
		    <tr>
		      <td   width="110"  class="font-17"><font color="#333333"><?=t_car_registration_number;?></font></td>
		      <td colspan="3" class="font-17"><?=$res_od->car_plate;?></td>
		    </tr>
		     <tr>
		      <td   width="110"  class="font-17"><font color="#333333"><?=t_call;?></font></td>
		      <td colspan="3" class="font-17"><a href="tel:<?=$res_od->phone;?>" ><?=$arr[book][phone];?></a></td>
		    </tr>
		  </tbody>
		</table>
	</div>
	<?php 
	if($arr[book][status]!='CANCEL'){

	include("application/views/shop/checkin.php"); 
	
	if($_COOKIE[detect_userclass]=="taxi"){
		$txt_btn_pay = 'ยืนการการรับเงิน';
	}else{
		$txt_btn_pay = 'แจ้งยอดรายได้';
	}
	?>

	<div style="padding: 5px 0px;display: none;" id="box_approved_income">
     <!-- <ons-list-header class="list-header"> <?=t_car_driver_information;?></ons-list-header> -->

	 <span class="text-cap font-22"><?=t_income;?></span>
	  <ons-button onclick="openViewPrice('<?=$arr[book][id];?>');" style="background-color: #fff;margin: 10px 0px;" modifier="outline" class="button-margin button button--outline button--large" onclick="submitShop();"><i class="icon-new-uniF121-10" aria-hidden="true"></i>&nbsp;<span class="font-17"><?=$txt_btn_pay;?></span> </ons-button>
	</div>
	
	<div style="padding: 5px 0px;display: none;">
		<span class="text-cap font-22"><?=โค้ดและเอกสาร;?></span>
	<? if($data_user_class=='lab' and $arr[book][program]==1){ ?>
		<table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_code_doc">
			<tr>
				<td width="60" valign="middle"><span class="font-17">Code</span></td>
				<td width="150">
				<input type="text" class="form-control font-17" id="code_order" name="code_order" value="<?=$arr[book][code];?>" style="margin-bottom: 0px;height: 2.5rem;padding-left: 0px;"/></td>
				<td><span class="btn" align="center" onclick="updateCode('<?=$arr[book][program];?>','<?=$arr[book][id];?>');" style="background: #3b5998;
    color: #fff;
    padding: 0px 10px;
    font-size: 3px !important;
    border-radius: 8px;">
		<span class="font-17 text-cap">บันทึก</span>
	</span></td>
			</tr>
			<tr>
				<td width="60"><span class="font-17">อัพโหลด</span></td>
				<td><a class="waves-effect waves-light btn" style="background-color: #009688;color: #fff !important;border-radius: 10px;" onclick="uploadCodeFile('<?=$arr[book][program];?>','<?=$arr[book][id];?>','lab');"><i class="material-icons left" style="font-size: 16px;margin-right: 7px;">cloud</i>อัพโหลด</a></td>
			</tr>
		</table>
	<? }
	else if($data_user_class=='taxi' and $arr[book][program]==1){ ?>
	
		<table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_code_doc">
			<tr>
				<td width="60" valign="middle"><span class="font-17">Code</span></td>
				<td width="150">
				<input type="text" class="form-control font-17" readonly="readonly" value="<?=$arr[book][code];?>" style="margin-bottom: 0px;height: 2.5rem;padding-left: 0px;"/></td>
			</tr>
			<tr>
				<td width="60">
				<span class="font-17">อัพโหลด</span></td>
				<td>
				<a class="waves-effect waves-light btn" style="background-color: #3b5998;color: #fff !important;border-radius: 8px;" onclick="uploadCodeFile('<?=$arr[book][program];?>','<?=$arr[book][id];?>','taxi');"><i class="material-icons left" style="font-size: 16px;margin-right: 7px;">cloud</i>ตรวจสอบภาพ</a></td>
			</tr>
		</table>
<?	} ?>
	</div>
<? } ?>

</ons-card>
<input type="hidden" id="check_cause" value="0"/>
<input type="hidden" id="check_id_income" value="<?=$arr[book][id];?>"/>