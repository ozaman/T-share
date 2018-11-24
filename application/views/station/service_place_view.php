<input type="hidden" value="<?=$_GET[amp_to_id];?>" id="amp_select_to" />
<div style="padding: 10px 10px;">
  <ons-button style="background-color: #fff;" modifier="outline" class="button-margin button button--outline button--large" onclick="addServicePlace(<?=$_GET[amp_to_id];?>);"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มบริการสถานที่</ons-button>
</div>
<ons-list>
  <ons-list-header style="font-size: 14px;">บริการตามสถานที่</ons-list-header>
  <?php
  $this->db->select('*');
  $where[i_status] = 1;
//  $where[i_type] = 2; // พื้นที่ 
  $where[i_station] = $_GET[station];
  $where[i_main] = $_GET[amp_to_id];
  $query = $this->db->get_where(TBL_PLACE_CAR_STATION_SERVICE,$where);

  foreach ($query->result() as $row) {
    if ($row->i_type_from == 3) {
      $this->db->select('topic_th as topic');
      $this->db->from(TBL_PLACE_CAR_STATION_OTHRET);
      $this->db->where('id',$row->i_place_from);
      $query_st = $this->db->get();
      $from = $query_st->row()->topic;
    }
    else if ($row->i_type_from == 2) {
      $this->db->select('topic');
      $this->db->from(TBL_WEB_TRANSFERPLACE_NEW);
      $this->db->where('id',$row->i_place_from);
      $query_st = $this->db->get();
      $from = $query_st->row();
      $from = $query_st->row()->topic;
    }

    $this->db->select('topic');
    $this->db->from(TBL_WEB_TRANSFERPLACE_NEW);
    $this->db->where('id',$row->i_place_to);
    $query_pl = $this->db->get();
    $place_to = $query_pl->row();

    ?>

    <ons-list-item style="border-bottom: 1px solid #ddd;">
      <div class="left" style="padding-left: 5px;padding-right: 0px;width: 3%;">
       
      </div>
      <div class="center" style=" padding: 10px 6px 10px 3px;width: 87%;background-image: none;">
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

                <div style="padding: 3px 0px;"><span class="list-item__title font-16"><?=$place_to->topic;?></span></div>
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
      <div class="right" style="width: 10%;background-image: none;">
        <i class="fa fa-ellipsis-h font-22" aria-hidden="true" onclick="showSheetPlaceService(<?=$row->id;?>, <?=$_GET[station];?>, '<?=$amp_to->name_th;?>')"></i>
      </div>
    </ons-list-item>

  <?php }?>
</ons-list>