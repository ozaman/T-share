<div style="padding: 10px 10px;">
  <ons-button style="background-color: #fff;" modifier="outline" class="button-margin button button--outline button--large" onclick="addPlaceOwner('<?=$_GET[station];?>');"><i class="fa fa-check-square-o" aria-hidden="true"></i> เลือกสถานที่</ons-button>
</div>
<?php
//$this->db->select('*');
//$where[i_status] = 1;
//$where[i_station] = $_GET[station];
//$query = $this->db->get_where(TBL_PLACE_CAR_STATION_MANAGE,$where);

$this->db->select('id, topic');
$where[status] = 1;
$where[i_station_owner] = $_GET[station];
$query = $this->db->get_where(TBL_WEB_TRANSFERPLACE_NEW,$where);
?>
<ons-list>
  <ons-list-header style="font-size: 14px;">สถานที่ที่ดูแล</ons-list-header>
  <?php
  $num = 1;
  foreach ($query->result() as $row) {
//    $this->db->select('*');
//    $query = $this->db->get_where(TBL_PLACE_CAR_STATION_MANAGE,$where);
    ?>
    <ons-list-item>
      <div class="left" style="margin-left: 10px;"><?=$num++;?></div>
      <div class="center"><?=$row->topic;?></div>
      <div class="right">ลบ</div>
    </ons-list-item>
  <?php
}
?>
 </ons-list>