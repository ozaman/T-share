<input type="hidden" value="<?=$_GET[amp_to_id];?>" id="amp_select_to" />
<div style="padding: 10px 10px;">
  <ons-button style="background-color: #fff;" modifier="outline" class="button-margin button button--outline button--large" onclick="addServicePlace(<?=$_GET[amp_to_id];?>);"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มบริการสถานที่</ons-button>
</div>
<ons-list>
  <ons-list-header style="font-size: 14px;">บริการตามสถานที่</ons-list-header>
  <?php
  $this->db->select('*');
  $where[i_status] = 1;
  $where[i_type] = 2; // พื้นที่ 
  $where[i_station] = $_GET[station];
  $where[i_sub_amphur] = $_GET[amp_to_id];
  $query = $this->db->get_where(TBL_PLACE_CAR_STATION_SERVICE,$where);

  foreach ($query->result() as $row) {

    $this->db->select('topic_th');
    $this->db->from(TBL_PLACE_CAR_STATION_OTHRET);
    $this->db->where('id',$_GET[station]);
    $query_st = $this->db->get();
    $station = $query_st->row();

    $this->db->select('name_th');
    $this->db->where('id',$row->i_place_to);
    $query = $this->db->get(TBL_WEB_AMPHUR);
    $amp_to = $query->row();

    $this->db->select('id');
    $this->db->where('i_sub_amphur',$row->id);
    $this->db->where('i_type',2); // สถานที่
    $query = $this->db->get(TBL_PLACE_CAR_STATION_SERVICE);
    $num_place_each = $query->num_rows();
    ?>

    <ons-list-item style="border-bottom: 1px solid #ddd;">
      <div class="left" style="padding-left: 5px;padding-right: 0px;width: 40px;">
        <span class="font-16">(<?=$num_place_each;?>)</span>
      </div>
      <div class="center" style=" padding: 10px 6px 10px 3px;width: 230px;">

        <ons-list-item>
          <div class="center" style="background-image: none;padding: 0px;">
            <div style="position: absolute;">
              <div style="width: 8px;
                   height: 8px;
                   border-radius: 5px;
                   background: #555;"></div>
              <div style="width: 1px;
                   height: 22px;
                   background: #afafaf;margin-left: 4px;"></div>
              <div style="width: 8px;
                   height: 8px;
                   border-radius: 5px;
                   background: #3b5998;"></div>
            </div>
            <div style="padding-left: 15px;">
              <div style="padding: 3px 0px;"><span class="list-item__title font-17"><?=$station->topic_th;?></span></div>

              <div style="padding: 3px 0px;"><span class="list-item__title font-17"><?=$amp_to->name_th;?></span></div>
            </div>
          </div>
          <div class="right " style="background-image: none;padding: 0px;">
            <span class="font-17"><?=$row->i_price;?> บ.</span>
          </div>
        </ons-list-item>  
      </div>
      <div class="right button" style="padding: 9px; background-color: #ff5722;border-radius: 0px;margin: 0;" onclick="">
        <span class="font-16">แก้ไข</span>
      </div>
    </ons-list-item>

  <?php }?>
</ons-list>