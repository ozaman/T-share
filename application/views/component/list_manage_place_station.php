<ons-list>
<?php
$where = array();
$this->db->select('id, topic, i_station_owner');
$where[status] = 1;
$where[pro] = $_POST[pv];
$where[aum] = $_POST[amp];
//      $this->db->limit(10);
$query = $this->db->get_where(TBL_WEB_TRANSFERPLACE_NEW,$where);
?>
<ons-list-header class="list-header" style="font-size: 14px;">รายชื่อสถานที่ - <span id="checkboxes-header"><?=$query->num_rows();?> สถานที่</span></ons-list-header>
<?php
$num_old_select = 0;
foreach ($query->result() as $row) {
  if ($row->i_station_owner == $_GET[station]) {
    $selected_pl = "checked";
    $num_old_select += 1;
  }
  else {

    $selected_pl = "";
  }

  if ($row->i_station_owner > 0 and $row->i_station_owner != $_GET[station]) {
    $h_owner = '<button type="button" class="button font-14" style="padding: 0px 5px;" onclick="viewOwnerPlace('.$row->id.');">มีแล้ว</button>';
    $ds_checkbox = "disabled";
    $bg = "background: #eee;";
    $func_1 = "";
    $func_0 = "";
    $tappable = "";
    $t = 0;
  }
  else {
    $h_owner = '';
    $ds_checkbox = "";
    $bg = "background: #fff;";
    $func_1 = "selectPlacetoOwner('placebox-".$row->id."', 1, ".$row->id.");";
    $func_0 = "selectPlacetoOwner('placebox-".$row->id."', 0, ".$row->id.");";
    $tappable = "tappable";
    $t = 1;
  }
  ?>
  <ons-list-item <?=$tappable;?> id="item_list_place_<?=$row->id;?>" style="<?=$bg;?>" >
    <label class="left" style="margin-left: 15px;" onclick="selectPlacetoOwner('placebox-<?=$row->id;?>', 0, <?=$row->id;?>);">
      <ons-checkbox <?=$ds_checkbox;?>  <?=$selected_pl;?> class="checkbox-color" name="place_selected[<?=$row->id;?>]" input-id="placebox-<?=$row->id;?>" value="<?=$row->topic;?>"></ons-checkbox>
    </label>
    <label class="center"  style="padding: 16px 6px 16px 0;"  onclick="<?=$func_1;?>">
      <span class="font-16 txt_place"  role="<?=$row->id;?>"><?=$row->topic;?></span>
    </label>
    <div class="right">
      <?=$h_owner;?>
    </div>
  </ons-list-item>
<?php }
?>
</ons-list>