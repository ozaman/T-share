<style>
	.box-img-product{
		width: 100%;
	    box-shadow: 1px 1px 3px #9E9E9E;
	}
	.list-pd-r{
		padding-left: 15px;
	}
	.txt-center{
		color: #afafaf;
	}
</style>
<?php 

	$query = $this->db->query("select * from order_booking where id = '".$_GET[id]."' ");
	$row = $query->row();
	
	
	$query = $this->db->query("select topic_th,id from shopping_product where id = '".$row->program."' ");
	$row_product = $query->row();
	
	
	$show_park = "display:none;";
	$show_person = "display:none;";
	$show_com = "display:none;";
	$query_price = $this->db->query("select * from shop_country_com_list_price_taxi where i_shop_country_com_list = '".$row->plan_id."' ");
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
		   		$show_park = "";
		   }
		   
		   if($row_price->s_topic_en=="person"){
		   		$show_person = "";
		   }	
		   
		   if($row_price->s_topic_en=="comision"){
		   		$show_com = "";
		   }	
	}
	
	$person_total = number_format(intval($row->price_person_unit) * intval($row->pax_regis),2);
	$total_price_all = number_format($row->price_park_unit + (intval($row->price_person_unit) * intval($row->pax_regis)),2);
	
	if($row->check_lab_pay==1){
		
		if($row->check_driver_pay==1){
			$status_txt = '<span class="font-16 txt-green"><img src="assets/images/yes.png" style=" position: absolute;margin-left: -20px; margin-top: 1px;" /><span>ยืนยันแล้ว</span></span>';
			$btn_approved = "disabled";
			$txt_btn_app = "ยืนยันการรับเงินแล้ว";
		}else{
			$status_txt = '<span class="font-16 txt-warning"><ons-icon style="margin-left: -30px;position: absolute;" icon="md-spinner" spin="" size="26px" class="ons-icon zmdi zmdi-spinner"></ons-icon> <span>รอยืนยันรับเงิน</span></span>';
			$btn_approved = "";
			$txt_btn_app = "ยืนยันการรับเงิน";
		}
		$show_after_approve = "";
	}
	else{
		$show_after_approve = "style='display:none;' ";
		$status_txt = '<span class="font-16 txt-red"><ons-icon style="margin-left: -30px;position: absolute;" icon="md-spinner" spin="" size="26px" class="ons-icon zmdi zmdi-spinner"></ons-icon> <span>รอพนักงานยืนยันการจ่ายเงิน</span></span>';
	}
	
?>
<div align="center">
		<img src="../data/pic/place/<?=$row->program;?>_logo.jpg" class="box-img-product" />
		<div style="margin: 5px;"><span class="font-16" style="color: #868383;"><?=$row_product->topic_th;?></span></div>
	</div>
<div style="padding: 10px 0px;">
	<p class="intro">
		<span class="font-22" style="color: #110000;"><b><?=$plan;?></b></span><br/>
		<!--<span class="font-16 txt-center">คุณได้รับค่าตอบแทนจากการส่งแขกแล้ว</span>-->
	</p>
</div>

<div style="padding: 0px 0px; background-color:#fff; ">
	
	<ons-list-item style="<?=$show_person;?>">
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">ค่าหัว</span>
	    </div>
	    <div class="right">
	    	<span class="font-16"><?=$row->price_person_unit;?>x<?=$row->pax_regis;?> = <?=$person_total;?> บาท</span>
	    </div>
	</ons-list-item>
	
	<ons-list-item style="<?=$show_park;?>">
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">ค่าจอด</span>
	    </div>
	    <div class="right">
	    	<span class="font-16"><?=number_format($row->price_park_unit,2);?> บาท</span>
	    </div>
	</ons-list-item>
	
	<ons-list-item  style="<?=$show_com;?>">
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">ค่าคอม</span>
	    </div>
	    <div class="right">
	    	<span class="font-16"><?=$row->commission_persent." %";?> = <span class="font-16 txt-warning">รอดำเนินการ</span></span>
	    </div>
	</ons-list-item>
	
	<ons-list-item>
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">รวม</span>
	    </div>
	    <div class="right">
	    	<span class="font-16"><?=$total_price_all;?> บาท</span>
	    </div>
	</ons-list-item>

	<ons-list-item>
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">สถานะ</span>
	    </div>
	    <div class="right">
	    	<?=$status_txt;?>
	    </div>
	</ons-list-item>
	
	<ons-list-item <?=$show_after_approve;?>>
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">ยืนยันเวลา</span>
	    </div>
	    <div class="right">
	    	<?=date('Y-m-d H:i:s',$row->driver_payment_date)." น.";?>
	    </div>
	</ons-list-item>
	<ons-list-item <?=$show_after_approve;?>>
		 
	    <div class="center list-pd-r">
	    	<div class="ons-card" style="width: 97%; margin-bottom: 10px;">
              <!-- <ons-list-header class="list-header "> หมายเหตุ</ons-list-header> -->
              <!-- <div class="form-group"> -->


                <!-- <label class="font-17">จำนวนคน</label> -->

              <ons-row>
                  <textarea class="textarea" rows="3" placeholder="หมายเหตุ" id="remark_pay" name="remark_pay"   style="pointer-events: auto;width: 100%;" ></textarea>

                </ons-row> 
                  <!-- </div> -->
                </div>
	    	<button type="button" class="button--large--cta" <?=$btn_approved;?> style="width: 97%; background-color: #26b06c;" onclick="approvePayDriverByTaxi('<?=$_GET[id];?>','<?=$row->invoice;?>','<?=$row->drivername;?>');"><?=$txt_btn_app;?></button>
	    </div>
	    <!--<div class="right">
	    	<span class="font-16 txt-red">ยังไม่จ่ายเงิน</span>
	    </div>-->
	</ons-list-item>
</div>
