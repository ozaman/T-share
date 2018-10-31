<?php 
	$query = $this->db->query("select * from web_driver where status = 1 and user_class = 'taxi' order by id desc");
?>
<ons-list>
	<ons-list-header>รายชื่อสมาชิก</ons-list-header>
	<?php foreach ($query->result() as $row){ ?>
    <ons-list-item style="padding: 0 0 0 14px;">
      <div class="left">
        <ons-icon icon="md-face" class="list-item__icon"></ons-icon>
      </div>
      <div class="center">
        <?=$row->name;?>&nbsp;<?=$row->nickname;?>
      </div>
    </ons-list-item>
    <?php } ?>
</ons-list>