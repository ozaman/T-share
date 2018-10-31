<?php 
	$query = $this->db->query("select id, name, nickname, phone from web_driver where status = 1 and id != '".$_COOKIE[detect_user]."' order by id desc");
	$index = 0;
 	foreach ($query->result() as $key1=>$row){
 		
 		foreach($_POST[online] as $key2=>$value){
			if($row->id==$value){
				$data[$index] = $row;
			}else{
				$data2[$index] = $row;
			}
		}
 		
 		$index++;
 	}
 	
?>
<div style="padding: 5px 6px;">
	<ons-row>
	  <ons-col style="padding: 5px;"><input type="text" placeholder="ค้นหาจากชื่อ" value="" class="font-17 search-taxi-list" id="search_dv_name" onkeyup="searchDvName(this.value);"  /></ons-col>
	  <ons-col style="padding: 5px;"><input type="text" placeholder="ค้นหาจากเบอร์โทร" value="" class="font-17 search-taxi-list" id="search_dv_phone" onkeyup="searchDvPhone(this.value);"  /></ons-col>
	</ons-row>
</div>
<?php 
	if(count($data)>0){ ?>
		<ons-list>
			<ons-list-header>ออนไลน์</ons-list-header>
			<?php foreach ($data as $row){ ?>
		    <ons-list-item style="padding: 0 0 0 10px;" id="list_id_<?=$row->id;?>" onclick="openDetailDv('<?=$row->id;?>','<?=$row->nickname;?>');">
		      <div class="left">
		        <ons-icon icon="md-face" style="font-size: 26px;" class="list-item__icon" id="icon_online_<?=$row->id;?>"></ons-icon>
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
<?php	}
?>

<?php 
	if(count($data2)>0){ ?>
		<ons-list>
			<ons-list-header>ออฟไลน์</ons-list-header>
			<?php foreach ($data2 as $row){ ?>
		    <ons-list-item style="padding: 0 0 0 10px;" id="list_id_<?=$row->id;?>" onclick="openDetailDv('<?=$row->id;?>','<?=$row->nickname;?>');">
		      <div class="left">
		        <ons-icon icon="md-face" style="font-size: 26px;" class="list-item__icon" id="icon_online_<?=$row->id;?>"></ons-icon>
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
<?php	}
?>