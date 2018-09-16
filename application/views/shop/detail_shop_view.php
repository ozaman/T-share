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
 
  $sql_ps = "SELECT ".$place_shopping.",id FROM shopping_product  WHERE id='".$arr[book][program]."' ";
 $query_ps = $this->db->query($sql_ps);
 $res_ps = $query_ps->row();

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
	$query = $this->db->query("SELECT id FROM pay_history_driver_shopping where order_id=".$_POST[id]." and status = 1");
	$check_pay_dv = $query->num_rows();
  	if($check_pay_dv>0){
		$show_alert = "";
	}else{
		$show_alert = "display:none;";
	}
	
?>

<script>
	$('#date_trans').text(formatDate('<?=$arr[book][transfer_date];?>'));
	$('#header_clean').text('<?=$_POST[invoice];?>');
	console.log('IOS : <?=$_GET[ios];?>');
</script>

<input type="hidden" value="<?=$_POST[id];?>" id="id_order" />
<ons-card class="assas_<?=$_POST[id];?>" style=" padding:10px 12px;" >
	<!--<button class="btn waves-effect waves-light red lighten-3" align="center" onclick="cancelBook('<?=$_POST[id];?>');" id="btn_cancel_book_<?=$_POST[id];?>" style="position: absolute;
    right: 10px;
    color: #fff;
    padding: 4px 10px;
    border-radius: 0;
    top: 0px;
    margin: 15px;<?=$cancel_shop;?>">
		<span class="font-22 text-cap"><?=t_cancel;?></span>
	</button>-->
	
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
            <div class="btn  btn-default" style=" width:100%; text-align:left; padding:2px; padding-left:5px; height:40px;border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_phone" onclick="openContact('<?=$res_ps->id;?>');">
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
            <div class="btn  btn-default" style=" width:100%; text-align:left;  padding:2px;height:40px;border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_zello" onclick="openZello('<?=$res_ps->id;?>');">
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
            <div class="btn  btn-default" style=" width:100%; text-align:left;  padding:2px;height:40px;border-radius: 0px;" data-toggle="dropdown" id="shop_sub_menu_map" onclick="openMapsDistance('<?=$res_ps->id;?>');">
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
	      <td class="font-16"><?=$arr[book][invoice];?></td>
   		</tr>
   		</tbody>
		<tbody>
      <tr>
         <td class="font-16 text-cap"><font color="#333333"><?=t_date;?></font></td>
         <td class="font-16"><span id="date_trans"></span></td>
      </tr>
      <tr>
         <td class="font-16 text-cap"><font color="#333333"><?=t_arrival_time;?></font></td>
         <td class="font-16"> <?=$arr[book][airout_h];?>:<?=str_pad($arr[book][airout_m], 2, '0', STR_PAD_LEFT)." ".t_n;?></td>
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
        				<span  class="button " align="center" onclick="editBook('<?=$arr[book][id];?>');"  style="    background: #3b5998;
    color: #fff;
    padding: 0px 10px;
    font-size: 3px !important;
    border-radius: 8px;display: inline-block;" id="btn_isedit">
		<span class="font-18 text-cap">แก้ไข</span>
	</span>
	<span class="button " align="center" onclick="saveeditBook('<?=$arr[book][id];?>');"  style="    background: #3b5998;
    color: #fff;
    padding: 0px 10px;
    font-size: 3px !important;
    border-radius: 8px;display: none;" id="btn_selectisedit">
		<span class="font-24 text-cap">บันทึก</span>
	</span>
        			</td>
        		</tr>
        		<tr>
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
     <ons-list-header class="list-header"> <?=t_car_driver_information;?></ons-list-header>

		<!-- <span class="text-cap font-22"><?=t_car_driver_information;?></span> -->
		<table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_hide_driver">
		  <tr>
		    <td width="100"  class="font-16"><font color="#333333"></font><?=t_dv_name;?></td>
		    <td colspan="3" class="font-16">
			<?=$full_name_driver;?></td>
		  </tr>
		  <tbody>
		    <tr>
		      <td  width="100" class="font-16"><font color="#333333"><?=t_type_of_vehicle;?></font></td>
		      <td class="font-16"><? echo $res_od->car_type; ?></td>
		     <!-- <td width="30" class="font-16"><font color="#333333"><?=t_car_coloring;?></font></td>
		      <td class="font-16"><?=$car_color;?></td>-->
		    </tr>
		    <tr>
		      <td   width="100"  class="font-16"><font color="#333333"><?=t_car_registration_number;?></font></td>
		      <td colspan="3" class="font-16"><?=$res_od->car_plate;?></td>
		    </tr>
		     <tr>
		      <td   width="100"  class="font-16"><font color="#333333"><?=t_call;?></font></td>
		      <td colspan="3" class="font-16"><a href="tel:<?=$res_od->phone;?>" ><?=$res_od->phone;?></a></td>
		    </tr>
		  </tbody>
		</table>
	</div>
	<?php 
	if($arr[book][status]!='CANCELs'){

	include("application/views/shop/checkin.php"); 
	
	if($_COOKIE[detect_userclass]=="taxi"){
		$txt_btn_pay = 'ยืนการการรับเงิน';
	}else{
		$txt_btn_pay = 'แจ้งยอดรายได้';
	}
	?>

	<div style="padding: 5px 0px;display: nones;">
     <!-- <ons-list-header class="list-header"> <?=t_car_driver_information;?></ons-list-header> -->

	 <span class="text-cap font-22"><?=t_income;?></span>
	  <ons-button onclick="openViewPrice('<?=$arr[book][id];?>');" style="background-color: #fff;margin: 10px 0px;" modifier="outline" class="button-margin button button--outline button--large" onclick="submitShop();"><i class="icon-new-uniF121-10" aria-hidden="true"></i>&nbsp;<span class="font-16"><?=$txt_btn_pay;?></span> </ons-button>
	</div>
	
	<div style="padding: 5px 0px;display: none;">
		<span class="text-cap font-22"><?=โค้ดและเอกสาร;?></span>
	<? if($data_user_class=='lab' and $arr[book][program]==1){ ?>
		<table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_code_doc">
			<tr>
				<td width="60" valign="middle"><span class="font-16">Code</span></td>
				<td width="150">
				<input type="text" class="form-control font-16" id="code_order" name="code_order" value="<?=$arr[book][code];?>" style="margin-bottom: 0px;height: 2.5rem;padding-left: 0px;"/></td>
				<td><span class="btn" align="center" onclick="updateCode('<?=$arr[book][program];?>','<?=$arr[book][id];?>');" style="background: #3b5998;
    color: #fff;
    padding: 0px 10px;
    font-size: 3px !important;
    border-radius: 8px;">
		<span class="font-24 text-cap">บันทึก</span>
	</span></td>
			</tr>
			<tr>
				<td width="60"><span class="font-16">อัพโหลด</span></td>
				<td><a class="waves-effect waves-light btn" style="background-color: #009688;color: #fff !important;border-radius: 10px;" onclick="uploadCodeFile('<?=$arr[book][program];?>','<?=$arr[book][id];?>','lab');"><i class="material-icons left" style="font-size: 16px;margin-right: 7px;">cloud</i>อัพโหลด</a></td>
			</tr>
		</table>
	<? }
	else if($data_user_class=='taxi' and $arr[book][program]==1){ ?>
	
		<table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_code_doc">
			<tr>
				<td width="60" valign="middle"><span class="font-16">Code</span></td>
				<td width="150">
				<input type="text" class="form-control font-16" readonly="readonly" value="<?=$arr[book][code];?>" style="margin-bottom: 0px;height: 2.5rem;padding-left: 0px;"/></td>
			</tr>
			<tr>
				<td width="60">
				<span class="font-16">อัพโหลด</span></td>
				<td>
				<a class="waves-effect waves-light btn" style="background-color: #3b5998;color: #fff !important;border-radius: 8px;" onclick="uploadCodeFile('<?=$arr[book][program];?>','<?=$arr[book][id];?>','taxi');"><i class="material-icons left" style="font-size: 16px;margin-right: 7px;">cloud</i>ตรวจสอบภาพ</a></td>
			</tr>
		</table>
<?	} ?>
	</div>
<? } ?>

</ons-card>
<input type="hidden" id="check_cause" value="0"/>