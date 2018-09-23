<?php 
	
	$data = $this->Main_model->rowdata('deposit_history', array('id' => $_GET[deposit_id]), '');
	if($data->type=="ADD"){
		$text_type = "เติมเงิน (แจ้งโอน)";
	}else if($data->type=="WITHDRAW"){
		$text_type = "ถอนเงิน (แจ้งถอน)";
	}
	$txt_bank = $data->bank_number;
?>

<div style="padding: 0px 10px; background-color:#fff; ">
	<ons-list-item>
	    <table width="100%">
	    	<tr>
	    		<td><span class="font-14" style="color: #908e8e;">ประเภท</span></td>
	    	</tr>
	    	<tr>
	    		<td><span class="font-18"><?=$text_type;?></span></td>
	    	</tr>
	    </table>
	</ons-list-item>
	<ons-list-item>
	    <table width="100%">
	    	<tr>
	    		<td colspan="2"><span class="font-14" style="color: #908e8e;">ธนาคาร</span></td>
	    	</tr>
	    	<tr>
	    		<td><span class="font-18"><?=$data->deposit_bank;?></span></td>
	    		<td><span class="font-18"><?=$txt_bank;?></span></td>
	    	</tr>
	    </table>
	</ons-list-item>
	<ons-list-item>
	    <table width="100%">
	    	<tr>
	    		<td colspan="2"><span class="font-14" style="color: #908e8e;">เวลาโอน</span></td>
	    	</tr>
	    	<tr>
	    		<td><span class="font-18"><?=$data->deposit_date." ".$data->deposit_time;?></span></td>
	    	</tr>
	    </table>
	</ons-list-item>
	<ons-list-item>
	    <table width="100%">
	    	<tr>
	    		<td colspan="2"><span class="font-14" style="color: #908e8e;">จำนวนเงิน</span></td>
	    	</tr>
	    	<tr>
	    		<td><span class="font-18"><?=number_format($data->deposit,2)." บาท";?></span></td>
	    	</tr>
	    </table>
	</ons-list-item>
	<ons-list-item>
	    <table width="100%">
	    	<tr>
	    		<td colspan="2"><span class="font-14" style="color: #908e8e;">สลิป</span></td>
	    	</tr>
	    	<tr><td><!--<img src="../data/fileupload/pay/slip_trans_76.jpg?v=1537616185" style="width: 200px;" />--><button class="button" onclick="reference()">open</button></td>
	    	</tr>
	    </table>
	</ons-list-item>
</div>