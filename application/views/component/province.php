

<div style="text-align: center; margin: 7px;" onclick="">
  <ons-search-input placeholder="ค้นหา" style="width: 90%;" onkeyup="searchPlaceService(this.value, 'item_list_place_');">
    <input type="search" class="search-input" placeholder="ค้นหา" id="search_place_service" style="height: 40px !important;">
  </ons-search-input>
</div>
<ons-list id="kitten-list" class="list">
  <ons-list-header class="list-header"><b class="font-14">สถานที่</b></ons-list-header>
  <?php
  foreach ($_POST[data] as $val) {
    ?>
  <ons-list-item id="item_list_place_<?=$val[id];?>" class="list-item" onclick="selectPlaceAll(<?=$val[id];?>);" data-name="<?=$val[name_th];?>">
      <div class="left list-item__left">
      </div>
      <div class="center list-item__center"><span class="txt_place" role="<?=$val[id];?>"><?=$val[name_th];?></span></div>
    </ons-list-item>

  <?php }
  ?>
</ons-list>