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
?>
<div align="center">
		<img src="../data/pic/place/<?=$row->program;?>_logo.jpg" class="box-img-product" />
		<div style="margin: 5px;"><span class="font-16" style="color: #868383;"><?=$row_product->topic_th;?></span></div>
	</div>
<div style="padding: 10px 0px;">
	
	<p class="intro">
		<span class="font-22" style="color: #110000;"><b>ค่าหัว + ค่าจอด</b></span>
		<!--<span class="font-16 txt-center">คุณได้รับค่าตอบแทนจากการส่งแขกแล้ว</span>-->
	</p>
</div>

<div style="padding: 0px 0px; background-color:#fff; ">
	<ons-list-item>
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">ค่าหัว</span>
	    </div>
	    <div class="right">
	    	<span class="font-16">200x4 = 800.00 บาท</span>
	    </div>
	</ons-list-item>
	<ons-list-item>
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">ค่าจอด</span>
	    </div>
	    <div class="right">
	    	<span class="font-16">1100.00 บาท</span>
	    </div>
	</ons-list-item>
	<ons-list-item>
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">รวม</span>
	    </div>
	    <div class="right">
	    	<span class="font-16">1900.00 บาท</span>
	    </div>
	</ons-list-item>
	<ons-list-item>
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">สถานะ</span>
	    </div>
	    <div class="right">
	    	<span class="font-16 txt-red">ยังไม่จ่ายเงิน</span>
	    </div>
	</ons-list-item>
</div>
