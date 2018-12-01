<?php
$thai_month_arr = array(
    "0" => "",
    "1" => "มกราคม",
    "2" => "กุมภาพันธ์",
    "3" => "มีนาคม",
    "4" => "เมษายน",
    "5" => "พฤษภาคม",
    "6" => "มิถุนายน",
    "7" => "กรกฎาคม",
    "8" => "สิงหาคม",
    "9" => "กันยายน",
    "10" => "ตุลาคม",
    "11" => "พฤศจิกายน",
    "12" => "ธันวาคม"
);
if (count($_POST[data]) < 1) {
  ?>
  <div class="font-22" style="color: #ff0000;text-align: center;padding: 0px; margin-top: -10px;" id="no_work_div"><strong>ไม่มีงาน</strong></div>
<?php 
exit();
}

$mount = explode("-",$_GET[date]);
$mount = $mount[1];
?>
  <div>
    <span class="font-17"><?=$thai_month_arr[$mount];?> <?=count($_POST[data]);?> งาน </span>
  </div>      
<ons-list id="body_list_ic_shop" >	

  <?php
  $befordate = '';
  foreach ($_POST[data] as $row) {
    $total = intval($row[cost]) - intval($row[s_cost]);
    if ($row[s_status_pay] == 0) {
      $type_pay_txt = "เงินสด";
    }
    else {
      $type_pay_txt = "เข้ากระเป๋า";
    }

    if ($befordate != $row[ondate]) {
      $befordate = $row[ondate];
      ?>
      <ons-list-header style="font-size: 14px;font-weight: 500;"><?="วันที่ ".$row[ondate];?></ons-list-header>
  <?php }?>
    <div style="border-bottom: 0px solid #ccc; padding: 15px 5px;" onclick="openDetailTrans('<?=$row[id];?>', '<?=$row[idorder];?>');">
      <table width="100%">
        <tr>
          <td>
            <span class="font-16"><?=$row[pickup_place][topic];?></span><br/>
            <span class="font-16"><?=$row[to_place][topic];?></span>
          </td>
          <td align="right" width="120"><b><?=number_format($total,2);?></b><br/><span class="font-16"><?=$type_pay_txt;?></span></td>
        </tr>
        <!--<tr>
            <td></td>
        </tr>-->
      </table>
    </div>

  <?php }
  ?>

</ons-list>