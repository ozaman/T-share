
<?php 
//print_r(json_encode($_POST[data]));
?>
<div style="text-align: center; margin: 7px;" onclick="">
  <ons-search-input placeholder="ค้นหา" style="width: 90%;" onkeyup="searchPlaceService(this.value, 'item_car_province_');">
    <input type="search" class="search-input" placeholder="ค้นหา" id="search_place_service" style="height: 40px !important;">
  </ons-search-input>
</div>
<ons-list id="kitten-list" class="list">
  <ons-list-header class="list-header"><b class="font-14">สถานที่</b></ons-list-header>
  <?php
  // echo 'sasasasas';
  foreach ($_POST[data] as $val) {
    // echo '12';
     
    ?>
  <ons-list-item id="item_user_province_<?=$val[id];?>" class="list-item" onclick="selectUserProvince(<?=$val[id];?>,'<?=$val[code];?>');" data-name="<?=$val[name_th];?>">
      <div class="left list-item__left">
      </div>
      <div class="center list-item__center"><span class="txt_place" role="<?=$val[id];?>"><?=$val[name_th];?></span></div>
    </ons-list-item>

  <?php }
  ?>
</ons-list>