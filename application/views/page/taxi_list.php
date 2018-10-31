<?php 
	$query = $this->db->query("select * from web_driver where status = 1 and user_class = 'taxi' order by id desc");
//	echo json_encode($_POST[online]);
?>
<div style="padding: 5px 6px;">
	<ons-row>
	  <ons-col style="padding: 5px;"><input type="text" placeholder="ค้นหาจากชื่อ" value="" class="font-17 search-taxi-list" id="search_dv_name" onkeyup="searchDvName(this.value);"  /></ons-col>
	  <ons-col style="padding: 5px;"><input type="text" placeholder="ค้นหาจากเบอร์โทร" value="" class="font-17 search-taxi-list" id="search_dv_phone" onkeyup="searchDvPhone(this.value);"  /></ons-col>
	</ons-row>
</div>
<ons-list>
	<ons-list-header>รายชื่อสมาชิก</ons-list-header>
	<?php foreach ($query->result() as $row){ ?>
    <ons-list-item style="padding: 0 0 0 14px;" id="list_id_<?=$row->id;?>">
      <div class="left">
        <ons-icon icon="md-face" class="list-item__icon" id="icon_online_<?=$row->id;?>"></ons-icon>
      </div>
      <div class="center">
        <span class="sp_name" role="<?=$row->id;?>"><?=$row->name;?>&nbsp;<?=$row->nickname;?></span>
      </div>
      <div class="right">
        <span class="sp_phone"  role="<?=$row->id;?>" ><?=$row->phone;?></span>
      </div>
    </ons-list-item>
    <?php } ?>
</ons-list>