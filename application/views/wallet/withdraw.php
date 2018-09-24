<?php 
		$sql = "SELECT t1.*,t2.name_th as bank_list, t2.img as bank_img FROM web_bank_driver as t1 left join web_bank_list as t2 on t1.bank_id = t2.id order by status_often desc, status desc ";
      	$query_bank = $this->db->query($sql);
?>
<form id="withdraw_money_form" name="withdraw_money_form" enctype="multipart/form-data">
<input type="hidden" value="<?=$_COOKIE['detect_user'];?>" name="driver" id="driver" />
	<input type="hidden" value="<?=$_COOKIE['detect_username'];?>" name="username" id="username" />
<ons-card class="card">
<ons-list-header>เลือกธนาคารที่จะโอน</ons-list-header>
	<?php 
		foreach ($query_bank->result()  as $row){ ?>
			<ons-list-item tappable onclick="$('#box_submit').show();">
	        <label class="left">
	          <ons-radio class="radio-fruit" input-id="radio-<?=$row->id;?>" value="<?=$row->id;?>" name="bank_user"></ons-radio>
	        </label>
	        <label for="radio-<?=$row->id;?>" class="center">
	        <table>
	        	<tr>
	        		<td width="40"><img src="assets/images/bank/<?=$row->bank_img;?>" class="logo-bank" style="width: 30px;"></td>
	        		<td width="100"><?=$row->bank_list;?></td>
	        		<td><?=$row->bank_number;?></td>
	        	</tr>
	        </table>
	        </label>
	      </ons-list-item>
	<?php	}
	?>
</ons-card>

<ons-card class="card">
<ons-list-header>รายละเอียด</ons-list-header>
<div style="
    text-align: left;
    margin-top: 10px;
    font-size: 19px;
    font-weight: 600;
    color: red;" class="font-16">***หมายเหตุ</div>
    <ul style="padding-left: 25px; margin: 10px 0px;" class="recheck font-15">
            <li> ทุกการเบิกเงินจะดำเนินการภายใน 24 ชม</li>
            <li> ยอดเงินเข้าบัญชีไม่เกิน 6 โมงเย็น</li>
            <li> การทำรายการถอนเงินในวันหยุด เงินจะเข้าบัญชี ในวันที่ธนาคารเปิดทำการ</li>
          </ul>
          
      <ons-list-item class="input-items">
        <div class="left">
          <span class="font-16">จำนวนเงิน</span>
        </div>
        <label class="center" style="background-image: none;">
        <ons-input id="amount-input" type="number" pattern="\d*" float maxlength="20" placeholder="" style="border: 1px solid #ccc;
    padding: 3px 15px;
    border-radius: 20px;
    width: 100%;" name="amount_wd"></ons-input>
      </label>
      </ons-list-item>     
</ons-card>
</form>
<div style="padding: 10px 10px;display: none;" id="box_submit">
    <ons-button style="background-color: #fff;" modifier="outline" class="button-margin button button--outline button--large" onclick="alertWithdraw();">ถอนเงิน</ons-button>
</div>

<!--<template id="withdraw-dialog.html">
  <ons-alert-dialog id="submit-withdraw-dialog" modifier="rowfooter">
    <div class="alert-dialog-title">Alert</div>
    <div class="alert-dialog-content">
      This dialog was created from a template
    </div>
    <div class="alert-dialog-footer">
      <ons-alert-dialog-button onclick="document.getElementById('submit-withdraw-dialog').hide();">Cancel</ons-alert-dialog-button>
      <ons-alert-dialog-button onclick="submitWithdraw()">OK</ons-alert-dialog-button>
    </div>
  </ons-alert-dialog>
</template>-->