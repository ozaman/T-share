<?php
//echo $_POST[station];
//exit;
$where = array();
$this->db->select('*');
$where[i_status] = 1;
$where[i_station] = $_POST[station];
$query = $this->db->get_where(TBL_PLACE_CAR_STATION_OWNER,$where);
$res = $query->result();

$where = array();
$this->db->select('t1.topic_th, t1.id, t1.province, t1.amphur, t2.name_th as pv_name, t3.name_th as amp_name, t2.country');
$where['t1.status'] = 1;
$where['t1.id'] = $_POST[station];
$this->db->from(TBL_PLACE_CAR_STATION_OTHRET.' as t1');
$this->db->join(TBL_WEB_PROVINCE.' as t2','t1.province = t2.id');
$this->db->join(TBL_WEB_AMPHUR.' as t3','t1.amphur = t3.id');
$this->db->where($where);
$query = $this->db->get();
$st_data = $query->row();
?>
<!--<div style="text-align: center; margin: 7px;" onclick="">
  <ons-search-input placeholder="ค้นหา" style="width: 90%;" onkeyup="searchPlaceService(this.value);">
    <input type="search" class="search-input" placeholder="ค้นหา" id="search_place_service" style="height: 40px !important;">
  </ons-search-input>
</div>-->

<ons-list>
  <ons-list-header class="list-header"><b class="font-14">สังกัด</b></ons-list-header>
  <ons-list-item id="item_list_place_s_<?=$st_data->id;?>" class="list-item" onclick="selectPlaceFrom(<?=$st_data->id;?>, 3);" data-name="<?=$st_data->topic_th." (".$st_data->amp_name.")";?>">
    <div class="left list-item__left">
    </div>
    <div class="center list-item__center"><span class="txt_s_place" role="<?=$st_data->id;?>"><?=$st_data->topic_th." (".$st_data->amp_name.")";?></span></div>
  </ons-list-item>

  <ons-list-header class="list-header"><b class="font-14">สถานที่</b></ons-list-header>
  <?php
  foreach ($res as $val) {
    ?>
    <ons-list-item id="item_list_place_f_<?=$val->i_place;?>" class="list-item" onclick="selectPlaceFrom(<?=$val->i_place;?>, 2);" data-name="<?=$val->s_name;?>">
      <div class="left list-item__left">
      </div>
      <div class="center list-item__center"><span class="txt_f_place" role="<?=$val->i_place;?>"><?=$val->s_name;?></span></div>
    </ons-list-item>

  <?php }
  ?>
</ons-list>