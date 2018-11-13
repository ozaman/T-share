

<ons-list id="kitten-list" class="list">
	      <ons-list-header class="list-header"><b class="font-14">ทั้งหมด</b></ons-list-header>
<?php 
	foreach($PROVINCE as $val){ 
		// print_r($val->topic_th);
		// $img_pos = "background-position: ".$val[img];
	?>
	    <ons-list-item id="item_province_<?=$val->id;?>" class="list-item" onclick="selectprovince('<?=$val->id;?>');" data-name="<?=$val->name_th;?>">
	            <div class="left list-item__left">
	                <!--<img class="list-item__thumbnail" src="https://placekitten.com/g/54/41">-->
	                <!-- <span class="brand-small list-item__thumbnail" style="" ></span> -->
	            </div>
	            <div class="center list-item__center"><?=$val->name_th;?></div>
	    </ons-list-item>

<?php }
?>
	
</ons-list>

<?php 
 // echo json_encode($MAIN);
?>