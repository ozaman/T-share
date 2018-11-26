<div style="padding: 10px 10px;">
  <ons-button style="background-color: #fff;" modifier="outline" class="button-margin button button--outline button--large" onclick="addServiceArea();"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มบริการพื้นที่</ons-button>
</div>
<div style="padding: 0px 10px;margin-bottom: 3px;">
  <table>
    <tr>
      <td><div style="width: 15px; height: 15px; background-color: #ccc; border: 1px solid #afafaf; border-radius: 10px; box-shadow: 1px 1px 2px #afafaf;"></div> </td>
      <td>สถานปิด</td>
      <td width="10"></td>
      <td><div style="width: 15px; height: 15px; background-color: #fff; border: 1px solid #afafaf; border-radius: 10px; box-shadow: 1px 1px 2px #afafaf;"></div> </td>
      <td>สถานเปิด</td>
    </tr>
  </table>
</div>
<ons-list>
  <ons-list-header style="font-size: 14px;">บริการตามพื้นที่</ons-list-header>
  <?php
  $this->db->select('*');
//  $where[i_status] = 1;
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
    
    if($row->i_status == 1){
      $bg_color = "background-color:#fff";
    }else{
      $bg_color = "background-color:#eeeeee";
    }
    ?>

    <ons-list-item style="border-bottom: 1px solid #ddd;<?=$bg_color;?>">
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
        <i class="fa fa-ellipsis-h font-22" aria-hidden="true" onclick="showSheetAreaService(<?=$row->id;?>, <?=$_GET[station];?>, '<?=$amp_to->name_th;?>', '<?=$row->i_status;?>')"></i>
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
<input type="hidden" value="" id="id_del_ser" />
<template id="confirm_del_place.html">
  <ons-alert-dialog id="confirm_del_place-dialog" modifier="rowfooter">
    <div class="alert-dialog-title"></div>
    <div class="alert-dialog-content">
      คุณต้องการลบรายการนี้หรือไม่
    </div>
    <div class="alert-dialog-footer">
      <ons-alert-dialog-button onclick="document.getElementById('confirm_del_place-dialog').hide();">ยกเลิก</ons-alert-dialog-button>
      <ons-alert-dialog-button onclick="confirmDelSer();document.getElementById('confirm_del_place-dialog').hide();"><b style="color:#FF0000;">ลบ</b></ons-alert-dialog-button>
    </div>
  </ons-alert-dialog>
</template>