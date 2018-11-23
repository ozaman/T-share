<?php
$where = array();
$this->db->select('id, topic');
$where[status] = 1;
$where[pro] = $_POST[pv];
$where[aum] = $_POST[amp];
$query = $this->db->get_where(TBL_WEB_TRANSFERPLACE_NEW,$where);
?>
<ons-list-header class="list-header" style="font-size: 14px;">รายชื่อสถานที่ - <span id="checkboxes-header"><?=$query->num_rows();?> สถานที่</span></ons-list-header>
<?php foreach ($query->result() as $row) {
  ?>
  <ons-list-item tappable id="item_list_place_<?=$row->id;?>" >
    <label class="left" style="margin-left: 15px;" onclick="selectPlacetoOwner('placebox-<?=$row->id;?>', 0, <?=$row->id;?>);">
      <ons-checkbox  <?=$selected_pl;?> class="checkbox-color" name="place_selected[<?=$row->id;?>]" input-id="placebox-<?=$row->id;?>" value="<?=$row->topic;?>"></ons-checkbox>
    </label>
    <label class="center"  style="padding: 16px 6px 16px 0;"  onclick="selectPlacetoOwner('placebox-<?=$row->id;?>', 1, <?=$row->id;?>);">
      <span class="font-16 txt_place"  role="<?=$row->id;?>"><?=$row->topic;?></span>
    </label>
  </ons-list-item>
<?php }
?>