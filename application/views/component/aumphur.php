
<ons-list id="kitten-list" class="list">
  <ons-list-header class="list-header"><b class="font-14">เขต/อำเภอ</b></ons-list-header>
  <?php
  foreach ($_POST[data][area] as $val) {
    ?>
    <ons-list-item id="item_aumphur_<?=$val[id];?>" class="list-item" onclick="selectAumphur('<?=$val[id];?>');" data-name="<?=$val[name_th];?>">
      <div class="left list-item__left">
          <!--<img class="list-item__thumbnail" src="https://placekitten.com/g/54/41">-->
          <!--<span class="brand-small list-item__thumbnail" style="<?=$img_pos;?>" ></span>-->
      </div>
      <div class="center list-item__center"><?=$val[name_th];?></div>
    </ons-list-item>

  <?php }
  ?>
</ons-list>