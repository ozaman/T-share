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
	
	
	$query = $this->db->query("select * from shopping_product where id = '".$row->program."' ");
	$row_product = $query->row();
	
	/*$query_price = $this->db->query("select * from shop_country_com_list where i_shop_country_icon = '".$row->plan_setting."' ");
	$row_price = $query_price->row();
	echo $row_price->id;*/
	
	$show_park = "display:none;";
	$show_person = "display:none;";
	$show_com = "display:none;";
	$query_price = $this->db->query("select * from shop_country_com_list_price where i_shop_country_com_list = '".$row->plan_id."' ");
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
//		echo $row_price->s_topic_en;
	}
	
	$total = intval($row->price_person_total) + intval($row->price_park_total);
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
	    	<span class="font-16"><?=$row->price_person_unit;?>x<?=$row->pax;?> = <?=number_format($row->price_person_total,2);?> บาท</span>
	    </div>
	</ons-list-item>
	
	<ons-list-item style="<?=$show_park;?>">
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">ค่าจอด</span>
	    </div>
	    <div class="right">
	    	<span class="font-16"><?=number_format($row->price_park_total,2);?> บาท</span>
	    </div>
	</ons-list-item>
	
	<ons-list-item  style="<?=$show_com;?>">
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">ค่าคอม</span>
	    </div>
	    <div class="right">
	    	<span class="font-16"><?=$row->commission_persent." %";?> = 0.00 บาท</span>
	    </div>
	</ons-list-item>
	
	<ons-list-item>
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">รวม</span>
	    </div>
	    <div class="right">
	    	<span class="font-16"><?=number_format($total,2);?> บาท</span>
	    </div>
	</ons-list-item>

	<ons-list-item>
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">สถานะ</span>
	    </div>
	    <div class="right">
	    	<span class="font-16 txt-red"><ons-icon style="margin-left: -30px;position: absolute;" icon="md-spinner" spin="" size="26px" class="ons-icon zmdi zmdi-spinner"></ons-icon> <span>รอดำเนินการ</span></span>
	    </div>
	</ons-list-item>

	<ons-list-item>
	    <div class="center list-pd-r">
	    	<button type="button" class="button--large--cta" style="width: 95%; margin: 0 auto;" onclick="approvePayDriver();">ยืนยันการจ่ายเงิน</button>
	    </div>
	    <!--<div class="right">
	    	<span class="font-16 txt-red">ยังไม่จ่ายเงิน</span>
	    </div>-->
	</ons-list-item>
</div>
