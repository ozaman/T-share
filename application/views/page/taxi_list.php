<?php 
	$query = $this->db->query("select id, name, nickname, phone from web_driver where status = 1 and id != '".$_COOKIE[detect_user]."' order by id desc");
	$index = 0;
	$num = $query->num_rows();
	
	foreach ($_POST[online] as $key=>$val){
		$arr_post[$val] = $val;
	}
	
 	foreach ($query->result() as $row){
 		
 		if($arr_post[$row->id]==$row->id){
			$data[$index] = $row;
		}else{
			$data2[$index] = $row;
		}
 		/*foreach($_POST[online] as $value){
			if($row->id==$value){
				$data[$index] = $row;
			}else{
				$data2[$index] = $row;
			}
		}*/
 		
 		$index++;
 	}
// 	echo json_encode($_POST[online][0]);
?>
<div style="padding: 5px 6px;">
	<ons-row>
	  <ons-col style="padding: 5px;"><input type="text" placeholder="ค้นหาจากชื่อ" value="" class="font-17 search-taxi-list" id="search_dv_name" onkeyup="searchDvName(this.value);"  /></ons-col>
	  <ons-col style="padding: 5px;"><input type="text" placeholder="ค้นหาจากเบอร์โทร" value="" class="font-17 search-taxi-list" id="search_dv_phone" onkeyup="searchDvPhone(this.value);"  /></ons-col>
	</ons-row>
	<ons-row>
	  <ons-col style="padding: 5px;"><input type="text" placeholder="ค้นหาจากชื่อผู้ใช้" value="" class="font-17 search-taxi-list" id="search_dv_username" onkeyup="searchDvUserName(this.value);"  /></ons-col>
	</ons-row>
	<h3>จำนวนสมาชิก <?=$num;?> คน</h3>
</div>

<?php 
	if(count($data)>0){ ?>
		<ons-list>
			<ons-list-header>ออนไลน์</ons-list-header>
			<?php 
			$run_num = 1 ;
			foreach ($data as $key=>$row){ ?>
		    <ons-list-item style="padding: 0 0 0 10px;" id="list_id_<?=$row->id;?>" >
		      <div class="left" onclick="openDetailDv('<?=$row->id;?>','<?=$row->nickname;?>');">
		        <span style="width: 15px;"><?=$run_num++;?></span>&nbsp;<ons-icon icon="md-face" style="font-size: 26px;" class="list-item__icon" id="icon_online_<?=$row->id;?>"></ons-icon>
		      </div>
		      <div class="center" onclick="openDetailDv('<?=$row->id;?>','<?=$row->nickname;?>');">
		        <span class="sp_name" role="<?=$row->id;?>"><?=$row->name;?>&nbsp;<?=$row->nickname;?></span>
		        <span style="display: none;" class="sp_username" role="<?=$row->id;?>"><?=$row->username;?>&nbsp;<?=$row->username;?></span>
		      </div>
		      <div class="right">
		        <a href="tel:<?=$row->phone;?>" class="sp_phone" role="<?=$row->id;?>" ><?=$row->phone;?></a>
		      </div>
		    </ons-list-item>
		    <?php } ?>
		</ons-list>
<?php	}
?>

<?php 
//	$run_num2 = 1 ;
	if(count($data2)>0){ ?>
		<ons-list>
			<ons-list-header>ออฟไลน์</ons-list-header>
			<?php foreach ($data2 as $key2=>$row){ ?>
		    <ons-list-item style="padding: 0 0 0 10px;" id="list_id_<?=$row->id;?>">
		      <div class="left"  onclick="openDetailDv('<?=$row->id;?>','<?=$row->nickname;?>');">
		       <span style="width: 20px;"><?=$run_num++;?></span> <ons-icon icon="md-face" style="font-size: 26px;" class="list-item__icon" id="icon_online_<?=$row->id;?>"></ons-icon>
		      </div>
		      <div class="center"  onclick="openDetailDv('<?=$row->id;?>','<?=$row->nickname;?>');">
		        <span class="sp_name" role="<?=$row->id;?>"><?=$row->name;?>&nbsp;<?=$row->nickname;?></span>
		        <span style="display: none;" class="sp_username" role="<?=$row->id;?>"><?=$row->username;?>&nbsp;<?=$row->username;?></span>
		      </div>
		      <div class="right">
		        <a href="tel:<?=$row->phone;?>"  class="sp_phone"  role="<?=$row->id;?>" ><?=$row->phone;?></a>
		      </div>
		    </ons-list-item>
		    <?php } ?>
		</ons-list>
<?php	}
?>
<!--<ons-list>
			<ons-list-header>ออฟไลน์</ons-list-header>
			<?php 
			$run_num = 1;
			foreach ($query->result() as $key1=>$row){ ?>
		    <ons-list-item style="padding: 0 0 0 10px;" id="list_id_<?=$row->id;?>" onclick="openDetailDv('<?=$row->id;?>','<?=$row->nickname;?>');">
		      <div class="left">
		       <span style="width: 30px;"><?=$run_num++;?></span> <ons-icon icon="md-face" style="font-size: 26px;" class="list-item__icon" id="icon_online_<?=$row->id;?>"></ons-icon>
		      </div>
		      <div class="center">
		        <span class="sp_name" role="<?=$row->id;?>"><?=$row->name;?>&nbsp;<?=$row->nickname;?></span>
		      </div>
		      <div class="right">
		        <span class="sp_phone"  role="<?=$row->id;?>" ><?=$row->phone;?></span>
		      </div>
		    </ons-list-item>
		    <?php } ?>
		</ons-list>-->