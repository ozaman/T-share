<div style="padding: 10px 10px;">
  <ons-button style="background-color: #fff;" modifier="outline" class="button-margin button button--outline button--large" onclick="addServiceArea();"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มบริการพื้นที่</ons-button>

</div>
<ons-list>
  <ons-list-header style="font-size: 14px;">บริการตามพื้นที่</ons-list-header>
  <?php
  $this->db->select('*');
  $where[i_status] = 1;
  $where[i_type] = 1; // พื้นที่ 
  $where[i_station] = $_GET[station];
  $query = $this->db->get_where(TBL_PLACE_CAR_STATION_SERVICE,$where);

  foreach ($query->result() as $row) {

    if ($row->i_type_from == 3) {
      $this->db->select('topic_th as topic');
      $this->db->from(TBL_PLACE_CAR_STATION_OTHRET);
      $this->db->where('id',$row->i_place_from);
      $query_st = $this->db->get();
      $station = $query_st->row();
      $from = $station->topic;
    }
    else if ($row->i_type_from == 2) {
      $this->db->select('topic');
      $this->db->from(TBL_WEB_TRANSFERPLACE_NEW);
      $this->db->where('id',$row->i_place_from);
      $query_st = $this->db->get();
      $station = $query_st->row();
      $from = $station->topic." ".$row->i_place_from;
    }

    $this->db->select('name_th');
    $this->db->where('id',$row->i_place_to);
    $query = $this->db->get(TBL_WEB_AMPHUR);
    $amp_to = $query->row();

    $this->db->select('id');
    $this->db->where('i_station',$_GET[station]);
    $this->db->where('i_main',$row->id);
    $this->db->where('i_type',2); // สถานที่
    $query = $this->db->get(TBL_PLACE_CAR_STATION_SERVICE);
    $num_place_each = $query->num_rows();
    ?>

    <ons-list-item style="border-bottom: 1px solid #ddd;">
      <div class="left" style="padding-left: 5px;padding-right: 0px;width: 8%;">
        <span class="font-16">(<?=$num_place_each;?>)</span>
      </div>
      <div class="center" style=" padding: 10px 6px 10px 3px;width: 82%;background-image: none;">
        <table width="100%">
          <tr>
            <td width="15px;">
              <div style=" padding-right: 5px;">
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
            </td>
            <td>
              <div style="padding-left: 0px;">
                <div style="padding: 3px 0px;"><span class="list-item__title font-16"><?=$from;?></span></div>

                <div style="padding: 3px 0px;"><span class="list-item__title font-16"><?=$amp_to->name_th;?></span></div>
              </div>
            </td>
            <td align="right" width="70px">
              <div>
                <span class="font-16"><?=$row->i_price;?> บ.</span>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <div class="right" style="width: 10%; background-image: none;">
        <i class="fa fa-ellipsis-h font-22" aria-hidden="true" onclick="showSheetAreaService(<?=$row->id;?>, <?=$_GET[station];?>, '<?=$amp_to->name_th;?>')"></i>
      </div>
  <!--      <div class="right button" style="padding: 14px; background-color: #0076ffc9;border-radius: 0px;margin: 0;" onclick="managePlaceEachAmphur(<?=$row->id;?>, <?=$_GET[station];?>, '<?=$amp_to->name_th;?>');">
        <span class="font-16"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
      </div>
      <div class="right button" style="padding: 9px; background-color: #ff5722;border-radius: 0px;margin: 0;" onclick="">
        <span class="font-16"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
      </div>-->
    </ons-list-item>

  <?php }?>
</ons-list>