<?php
if ($_GET[date] == "") {
  $date = date('Y-m-d');
}
else {
  $date = $_GET[date];
}

$date = explode("-",$date);
$year = $date[0];
$month = $date[1];
//echo $year." ".$month;
$select = "SELECT t1.*,t2.topic_th as product_name FROM order_booking as t1 left join shopping_product as t2 on t1.program = t2.id where t1.status LIKE 'COMPLETED' and t1.drivername = '".$_COOKIE[detect_user]."' and (MONTH(t1.transfer_date) = '".$month."' and YEAR(t1.transfer_date) = '".$year."')  order by t1.transfer_date desc  ";
//		echo $select;
$query = $this->db->query($select);
$befordate = '';
$i = 0;
$num = $query->num_rows();
if ($num < 1) {
  ?>
  <div class="font-22" style="color: #ff0000;text-align: center;padding: 0px; margin-top: -10px;" id="no_work_div"><strong>ไม่มีงาน</strong></div>
<?php }?>
<ons-list id="body_list_ic_shop" >	 
  <?php
  foreach ($query->result() as $row) {
    $tras_d_time = date_create($row->transfer_date);

    $total_price_all = $row->price_park_unit + (intval($row->price_person_unit) * intval($row->pax_regis)) + intval($row->total_commission);
//    echo $row->total_commission;
//    exit();
    if ($befordate != $row->transfer_date) {
      $befordate = $row->transfer_date;
      ?>
      <ons-list-header style="font-size: 14px;font-weight: 500;"><?="วันที่ ".date_format($tras_d_time,"Y-m-d");?></ons-list-header>
    <?php }?>
    <ons-list-item tappable style=" padding: 7px 5px;" onclick="openDetailOrder('<?=$row->id;?>', '<?=$row->invoice;?>');">
      <div class="center list-item__center" style="background-image: none;">
        <table width="100%">
          <tr>
              <!--<td width="70"><?=$row->invoice;?></td>-->
            <td width="190">
              <span class="font-16"><?=$row->product_name;?></span><br/>
              <span class="font-14"><?=date('Y-m-d h:i',$row->post_date);?></span>
            </td>
            <td >
              <span class="font-16">รับเงินสด</span>
            </td>
            <td align="right"><b class="font-16"><?=$total_price_all." บ.";?></b></td>
          </tr>
        </table>
      </div>
    </ons-list-item>

  <?php }
  ?>
</ons-list>