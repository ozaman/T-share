<?php 
	$query = $this->db->query("select * from app_user_setting where i_user = ".$_COOKIE[detect_user]);
	$check_row = $query->num_rows();
	if($check_row>0){
		$row = $query->row();
		if($row->i_noti_shop==1){
			$checked_shop = "checked";
			$val_shop = 0;
		}else{
			$checked_shop = "";
			$val_shop = 1;
		}
		if($row->i_noti_transfer==1){
			$checked_trans = "checked";
			$val_trans = 0;
		}else{
			$checked_trans = "";
			$val_trans = 1;
		}
		if($row->i_noti_wallet==1){
			$checked_wallet = "checked";
			$val_wallet = 0;
		}else{
			$checked_wallet = "";
			$val_wallet = 1;
		}
	}else{
		$checked_shop = "checked";
		$checked_trans = "checked";
		$checked_wallet = "checked";
		$val_wallet = 0;
		$val_trans = 0;
		$val_shop = 0;
		$data[i_user] = $_COOKIE[detect_user];
		$result = $this->db->insert('app_user_setting', $data);
	}
//	echo $check_row."+++";
?>
<ons-list>
    <ons-list-header>รายการตั้งค่าแจ้งเตือน</ons-list-header>
      <ons-list-item>
        <label class="center" for="" style="padding: 0 0 0 14px;">
          งานส่งแขก<span id="switch-status"></span>
        </label>
        <div class="right">
          <ons-switch id="model-switch" input-id="switch1" <?=$checked_shop;?> onchange="switchSetting('i_noti_shop','onoff_shop');"></ons-switch>
          <input type="hidden" value="<?=$val_shop;?>" id="onoff_shop" />
        </div>
      </ons-list-item>
      <ons-list-item>
        <label id="enabled-label" class="center" for=""  style="padding: 0 0 0 14px;">
          งานให้บริการรถ
        </label>
        <div class="right">
          <ons-switch id="disabled-switch" input-id="switch2" <?=$checked_trans;?> onchange="switchSetting('i_noti_transfer','onoff_trans');"></ons-switch>
          <input type="hidden" value="<?=$val_trans;?>" id="onoff_trans" />
        </div>
      </ons-list-item>
      <ons-list-item>
        <label id="enabled-label" class="center" for=""  style="padding: 0 0 0 14px;">
          กระเป๋าเงิน เติมเงิน/ถอนเงิน
        </label>
        <div class="right">
          <ons-switch id="disabled-switch" input-id="switch2" <?=$checked_wallet;?> onchange="switchSetting('i_noti_wallet','onoff_wallet');"></ons-switch>
          <input type="hidden" value="<?=$val_wallet;?>" id="onoff_wallet" />
        </div>
      </ons-list-item>
</ons-list>