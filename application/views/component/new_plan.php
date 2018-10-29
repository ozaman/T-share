<?php 
	$data = $this->Main_model->rowdata(TBL_ORDER_BOOKING, array('id' => $_GET[id]), array('*'));
	
	$query_price = $this->db->query("select * from shop_country_com_list_price_taxi where i_shop_country_com_list = '".$data->plan_id."' ");
	$num = 0;
	
	$display_person = "display:none";
	$display_com = "display:none";
	$display_park = "display:none";
	$park_total = 0;
	$person_total = 0;
	$com_total = 0;
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
				$display_park = "";
				$park_total =$data->price_park_unit;
		   }
		   
		   if($row_price->s_topic_en=="person"){
				$check_type_person= 1;
				$display_person = "";
				$person_total = intval($data->price_person_unit) * intval($data->adult);
				$cal_person = $data->price_person_unit."*".$data->adult;
		   }	
		   
		   if($row_price->s_topic_en=="comision"){
		   		$check_type_com = 1;
		   		$display_com = "";
				$com_persent = $data->commission_persent;
				$com_progress = '<span style="padding-left: 0px;"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i>&nbsp;<font color="#FF0000">รอดำเนินการ</font></span>';
		   }	
	}
	$all_total = $park_total + $person_total + $com_total;
	
	
	$sql_country = "SELECT t2.s_country_code, t2.s_topic_th FROM shop_country_com_list_price_taxi as t1 left join shop_country_icon_taxi as t2 on t1.i_shop_country_icon = t2.id WHERE t1.i_shop_country_com_list='".$data->plan_id."'    ";
 	$query_country = $this->db->query($sql_country);
 	$res_country = $query_country->row();
 	
 	/*$sql_country = "SELECT * from ";
 	$query_country = $this->db->query($sql_country);
 	$res_country = $query_country->row();*/
 	
 	$query = $this->db->query("SELECT cause_change FROM change_plan_logs where order_id = '".$data->id."' ");
 	$res_log_change = $query->row();
 	
 	$query = $this->db->query("SELECT s_topic FROM shop_type_change_plan where i_status = 1 and id = '".$res_log_change->cause_change."' ");
 	$res_type_change = $query->row();
 	
 	$query = $this->db->query("select * from change_plan_logs where order_id = ".$data->id);
 	$check_change_plan = $query->num_rows();
 	if($check_change_plan==0){
		$titel = t_work_remuneration;
		$display_none_change_plan = "display:none;";
		$color_titel = "";
	}else{
		$titel = "เปลี่ยน".t_work_remuneration;
		$display_none_change_plan = "";
		$color_titel = "color: #f00 !important;";
	}
	
//	echo $check_change_plan." ++++++++";
?>
<div style="padding: 0px 0px;">
     	<ons-list-header class="list-header" style="<?=$color_titel;?>"> <?=$titel;?></ons-list-header>
     	<table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_income_driver">
     		<tr style="<?=$display_none_change_plan;?>">
     			<td>สาเหตุ</td>
     			<td><?=$res_type_change->s_topic;?></td>
     		</tr>
     		<tr>
     			<td width="35%"><span class="font-17">ประเภท</span></td>
     			<td colspan="2"><span class="font-17" id="txt_type_plan"><?=$plan;?></span></td>
     		</tr>
     		<tr>
     			<td width="35%"><span class="font-17">สัญชาติ</span></td>
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
     			<td width="35%"><span class="font-17">ค่าจอด</span></td>
     			<td align="right"><span class="font-17" id="txt_park_total"><?=$park_total;?></span></td>
     			<td width="15%"><span class="font-17">บ.</span></td>
     		</tr>
     		<tr style="<?=$display_person;?>">
     			<td width="35%"><span class="font-17">ค่าหัว</span></td>
     			<td align="right"><span class="font-17" id="txt_person_total"><?=$cal_person;?> = <?=$person_total;?></span></td>
     			<td width="15%"><span class="font-17">บ.</span></td>
     		</tr>
     		<tr style="<?=$display_com;?>">
     			<td width="35%"><span class="font-17">ค่าคอม</span></td>
     			<td align="right" colspan="2"><span class="font-17" id="txt_com_persent"><?=$com_persent;?> % <?=$com_progress;?></span>
                </td>
                <!--<td width="15%">
                </td>-->
     		</tr>
     		<tr>
     			<td  width="35%">รวม</td>
     			<td align="right">
	     			<span class="16" id="txt_all_total">
	     				<?=$all_total;?>
	     			</span>
     			</td>
     			 <td width="90">
     			 	<span class="font-17">บ.</span>
     			 </td>
     		</tr>
     	</table>
  	 <?php 
//  	 echo $data->check_driver_pay;
   	if($_COOKIE[detect_userclass]=="taxi"){ 
   		if($data->check_driver_pay==0){
			$btn_confirm_get = "";
			$status_get = "display:none;";
			
		}else{
			$btn_confirm_get = "display:none;";
			$status_get = "";
			if($data->driver_pay_report_date!=""){
				$time_approve = date("H:i",$data->driver_pay_report_date)." น.";
			}else{
				$time_approve = "-";
			}
			
		}
		
		if($data->check_lab_pay==0){
				$text_get = "display:none;";
			}else{
				$text_get = "";
				if($data->driver_payment_date!=""){
				$time_approve_lab = date("H:i",$data->driver_payment_date)." น.";
				}else{
					$time_approve_lab = "-";
				}
			}
//			echo $data->check_lab_pay;
   	?>  
   	
   
   <ons-button id="btn_confirm_get_<?=$data->id;?>" onclick="confirmGetIncome('<?=$data->id;?>');" style="background-color: #fff;margin: 10px 0px;<?=$btn_confirm_get;?>" modifier="outline" class="button-margin button button--outline button--large" onclick="submitShop();">ยืนยันรับเงิน</ons-button> 
   
   <div id="status_get_<?=$data->id;?>"  style="<?=$status_get;?>" class="font-16">
   <b style="color: #59aa47;" class="font-16">
   ยืนยันรับเงิน เวลา : <span id="text_confirm_date_<?=$data->id;?>"><?=$time_approve;?></span>
   </b>
   </div>
   <div id="text_get_box_<?=$data->id;?>" style="<?=$text_get;?>">
   		<b style="color: #0076ff;" class="font-16">ยืนยันการจ่ายเงิน เวลา : <?=$time_approve_lab;?></b>
   	</div>	
   <?php } 

    else{  
   		if($data->check_driver_pay==0){
			$btn_confirm_get = "display:none;";
			$status_get = "";
			$text_driver_pay = "display:none;";
		}else{
			$btn_confirm_get = "";
			$status_get = "display:none;";
			if($data->driver_pay_report_date!=""){
				$time_approve = date("H:i",$data->driver_pay_report_date)." น.";
			}else{
				$time_approve = "-";
			}
			$text_driver_pay = "";
		}
		
		if($data->check_lab_pay==0){
			$confirm_lab_pay = "display:none;";
			
		}else{
			$btn_confirm_get = "display:none;";
			
			
			$status_get = "display:none;";
			$confirm_lab_pay = "";
			if($data->driver_payment_date!=""){
				$time_approve_lab = date("H:i",$data->driver_payment_date)." น.";
				}else{
					$time_approve_lab = "-";
				}
		}
		
    ?>  
    <div style="<?=$text_driver_pay;?>">
   		<b style="color: #59aa47;" class="font-16">คนขับยืนยันรับเงิน เวลา : <?=$time_approve;?></b>
   	</div>	
   	<div id="confirm_lab_pay_<?=$data->id;?>"  style="<?=$confirm_lab_pay;?>" >
   		<b style="color: #097bff;" class="font-16">ยืนยันจ่ายเงิน เวลา : <span id="text_lab_pay_time_<?=$data->id;?>"><?=$time_approve_lab;?></span></b>
   	</div>
   <div class="font-16" style="<?=$status_get;?>"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">รอยืนยันรับเงิน</font></strong></div>
   
   <ons-button id="btn_confirm_get_<?=$data->id;?>" onclick="confirmPayIncome('<?=$data->id;?>');" style="background-color: #fff;margin: 10px 0px;<?=$btn_confirm_get;?>" modifier="outline" class="button-margin button button--outline button--large" onclick="submitShop();">ยืนยันจ่ายเงิน</ons-button> 
   <?php }   ?>	
   
</div>