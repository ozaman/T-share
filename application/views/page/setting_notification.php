<?php 
	$query = $this->db->query("select * from app_user_setting");
	$check_row = $query->num_rows();
	if($check_row>0){
		$row = $query->row();
		if($row->i_noti_shop==1){
			$checked_shop = "checked";
		}else{
			$checked_shop = "";
		}
		if($row->i_noti_transfer==1){
			$checked_trans = "checked";
		}else{
			$checked_trans = "";
		}
		if($row->i_noti_wallet==1){
			$checked_wallet = "checked";
		}else{
			$checked_wallet = "";
		}
	}else{
		$checked_shop = "checked";
		$checked_trans = "checked";
		$checked_wallet = "checked";
	}
	
?>
<ons-list>
    <ons-list-header>รายการตั้งค่าแจ้งเตือน</ons-list-header>
      <ons-list-item>
        <label class="center" for="" style="padding: 0 0 0 14px;">
          งานส่งแขก<span id="switch-status"></span>
        </label>
        <div class="right">
          <ons-switch id="model-switch" input-id="switch1" <?=$checked_shop;?>></ons-switch>
        </div>
      </ons-list-item>
      <ons-list-item>
        <label id="enabled-label" class="center" for=""  style="padding: 0 0 0 14px;">
          งานให้บริการรถ
        </label>
        <div class="right">
          <ons-switch id="disabled-switch" input-id="switch2" <?=$checked_trans;?>></ons-switch>
        </div>
      </ons-list-item>
      <ons-list-item>
        <label id="enabled-label" class="center" for=""  style="padding: 0 0 0 14px;">
          กระเป๋าเงิน เติมเงิน/ถอนเงิน
        </label>
        <div class="right">
          <ons-switch id="disabled-switch" input-id="switch2" <?=$checked_wallet;?>></ons-switch>
        </div>
      </ons-list-item>
</ons-list>