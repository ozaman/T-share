<?php
$this->db->select('t1.id, t1.province, t1.amphur, t2.name_th as pv_name, t3.name_th as amp_name, t2.country');
$where['t1.status'] = 1;
$where['t1.id'] = $_GET[station];
$this->db->from(TBL_PLACE_CAR_STATION_OTHRET.' as t1');
$this->db->join(TBL_WEB_PROVINCE.' as t2','t1.province = t2.id');
$this->db->join(TBL_WEB_AMPHUR.' as t3','t1.amphur = t3.id');
$this->db->where($where);
$query = $this->db->get();
$st_data = $query->row();
?>
<ons-row style="padding: 5px;">
  <ons-row>
    <ons-col style=" margin: 7px;">
      <div style="border-radius: 10px;padding: 8px; background-color: rgba(3,3,3,.09);" onclick="fn.pushPage({'id': 'option.html', 'title': 'จังหวัด', 'open': 'user_province'}, 'lift-ios')">
        <span id="txt_user_province" class="font-16" style="color: #000;margin-left: 0px;"><?=$st_data->pv_name;?></span>
      </div>
    </ons-col>
    <ons-col style=" margin: 7px;">
      <div style="border-radius: 10px;padding: 8px; background-color: rgba(3,3,3,.09);" onclick="selectAumphurManagePlace();">
        <span id="txt_amphur" class="font-16" style="color: #000;margin-left: 0px;"><?=$st_data->amp_name;?></span>
      </div>
    </ons-col>
  </ons-row>
  <ons-row>
    <ons-col style="padding: 4px 7px;margin-bottom: 3px;">
      <div align="center">
        <input onkeyup="searchPlaceService(this.value);" type="search" class="search-input" placeholder="ค้นหา" id="search_place_service" style="height: 36px !important;width: 100%;">
      </div>
    </ons-col>
  </ons-row>
</ons-row>
<form id="form_select_place">
  <input type="hidden" name="station" id="station" value="<?=$_GET[station];?>">
  <input type="hidden" name="amphur" id="amphur" value="<?=$st_data->amphur;?>">
  <input type="hidden" name="province" id="province" value="<?=$st_data->province;?>">
  <input type="hidden" name="country" id="country" value="<?=$st_data->country;?>">
<!--  <input type="hidden" name="select_place_id" id="select_place_id" value="">-->
  
  <div id="pl_owner_list">

    <ons-list>
      <?php
      $where = array();
      $this->db->select('id, topic, i_station_owner');
      $where[status] = 1;
      $where[pro] = $st_data->province;
      $where[aum] = $st_data->amphur;
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
  </div>
</ons-list>
</div>
</form>
<input type="hidden" id="chk_toast_run" value="<?=$num_old_select;?>"/>