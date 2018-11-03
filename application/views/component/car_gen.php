<ons-list id="kitten-list" class="list">
	      <ons-list-header class="list-header"><b class="font-14" id="car_brand_in_gen">ที่นิยม</b></ons-list-header>
<?php 
	foreach($_POST[data] as $val){ 
//		$img_pos = "background-position: ".$val[img];
	?>
	    <ons-list-item id="item_car_gen_<?=$val[id];?>" class="list-item" onclick="selectCarGen('<?=$val[id];?>');" data-name="<?=$val[name_en];?>">
	            <div class="left list-item__left">
	                <!--<img class="list-item__thumbnail" src="https://placekitten.com/g/54/41">-->
	               <!-- <span class="brand-small list-item__thumbnail" style="<?=$img_pos;?>" ></span>-->
	            </div>
	            <div class="center list-item__center"><?=$val[name_en];?></div>
	    </ons-list-item>

<?php }
?>
	
</ons-list>