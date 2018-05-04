<?php
if($_GET[query]=='province'){ ?>
	<select class="form-control mobileSelect" id="province" name="province" data-animation="zoom" data-theme="white" data-title="<table><tr><td width='110'><span class='font-22 text-cap'><?=t_select_province;?></span></td><td><input type='text' value='' class='form-control filter_province' style='height:35px;margin-top:-7px;' onkeyup='filterProvince()' /></td></tr></table>" >
                      	<option value="">- <?=t_select;?> -</option>
                      	
                      	<?php 
                      
                      	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                                  $res[pv] = $db->select_query("SELECT * FROM web_province where area = '".$_GET[area]."' ORDER BY ".$province." asc  ");
                                   while($arr[pv] = $db->fetch($res[pv])) { 
                                   $txt = explode("/",$arr[pv][$province]);
                                   if($_GET[province]==$txt[0]){
								   		$selected_pv = 'selected';
								   }else{
								   		$selected_pv = '';
								   }
                                   ?>
                             <option value="<?=$txt[0];?>" <?=$selected_pv;?> class="<?=$arr[pv][area];?>" ><?=$txt[0];?></option> 
                      	 <? } ?>
                     </select>
                     <script type="text/javascript">
                                $(function(){
                                    
                                    $('#province').mobileSelect({
									    onClose: function(){        
									        console.log('onClose: '+this.val());
									    },
									    onOpen: function(){
									        console.log('onOpen: '+this.val());
									         $('.mobileSelect-container:visible').find('.mobileSelect-control').each (function() {
									 			if($(this).text()=='- <?=t_select;?> -'){
													$(this).hide();
												}else{
													$(this).show();
													
												}
											});
									    },
									    buttonSave: '<?=t_confirm;?>',
                           				buttonCancel: '<?=t_cancelled;?>'
									});
									
                                })
                     </script>
<? }

if($_GET[query]=='car_type'){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
    $res[programtour] = $db->select_query("SELECT * from  ".TB_carall_type."  ");?>
    <div >
    <div class="list-container"> 
    <ul class="w3-ul w3-card-4">
    <?
    while ($arr[programtour] = $db->fetch($res[programtour])){ ?>
    	
	    <li class="w3-display-container font-24" onclick="selectCarType('<?=$arr[programtour][id];?>','<?=$arr[programtour][$place_shopping];?>');"><?=$arr[programtour][$place_shopping];?> </li>
	 
    <? } ?>
     </ul>
    </div>
    </div>
<? }

if($_GET[query]=='car_brand'){
	$cars = array("TOYOTA", "ISUZU"
                           ,"MITSUBISHI"
                           ,"MAZDA"
                           ,"NISSAN"
                           ,"SUZUKI"
                           ,"HINO"
                           ,"LEXUS"
                           ,"DAIHATSU"
                           ,"SUBARU"
                           ,"MITSUOKA"
                           ,"MERCEDES-BENZ"
                           ,"BMW"
                           ,"AUDI"
                           ,"VOLKSWAGEN"
                           ,"PEUGEOT"
                           ,"PORSCHE"
                           ,"OPEL"
                           ,"SMART"
                           ,"MCLAREN"
                           ,"WIESMANN"
                           ,"CHEVROLET"
                           ,"JEEP"
                           ,"FORD"
                           ,"CHRYSLER"
                           ,"DODGE"
                           ,"HUMMER"
                           ,"PONTIAC"
                           ,"BUICK"
                           ,"OLDSMOBILE"
                           ,"INFINITI"
                           ,"AMC"
                           ,"LINCOLN"
                           ,"TESLA"
                           ,"CADILLAC"
                           ,"MINI"
                           ,"ROVER"
                           ,"LAND ROVER"
                           ,"ASTON MARTIN"
                           ,"JAGUAR"
                           ,"ROLLS-ROYCE"
                           ,"BENTLEY"
                           ,"AUSTIN"
                           ,"MG"
                           ,"LONDON TAXI"
                           ,"TRIUMPH"
                           ,"ALFA ROMEO"
                           ,"FIAT"
                           ,"MASERATI"
                           ,"LOTUS"
                           ,"FERRARI"
                           ,"LAMBORGHINI"
                           ,"KIA"
                           ,"MUSSO"
                           ,"DAEWOO"
                           ,"HYUNDAI"
                           ,"SSANGYONG"
                           ,"CITROEN"
                           ,"RENAULT"
                           ,"VOLVO"
                           ,"SAAB"
                           ,"THAI RUNG"
                           ,"PROTON"
                           ,"NAZA"
                           ,"SEAT"
                           ,"TATA"
                           ,"HOLDEN"
                           ,"CHERY"
                           ,"DFSK"
                           ,"FOTON"
                           ,"SKODA"
                           );
                           ?> 
    <table width="100%" style="padding-bottom: 5px;">
    <tr>
    	
    	<td><input type='text' value='' class='form-control filter_brand font-24' style='height:35px;margin-top:-7px;' onkeyup='filterBrand()' placeholder="<?=t_search;?>" /></td>
    </tr>
    </table>                       
    <div >
    <div class="list-container"> 
    <ul class="w3-ul w3-card-4">
    <?
    foreach($cars as $value){?>
    	
	    <li class="w3-display-container font-24" onclick="selectCarBrand('<?=$value;?>','<?=$value;?>');"><?=$value;?> </li>
	 
    <? } ?>
     </ul>
    </div>
    </div><?

}

if($_GET[query]=='car_color'){
	?>
    <div >
    <div class="list-container"> 
    <ul class="w3-ul w3-card-4">
    <?
    $color[t_white] = "White";
    $color[t_black] = "Black";
    $color[t_yellow] = "#e8e813";
    $color[t_green] = "#00a65a";
    $color[t_red] = "Red";
    $color[t_gray] = "Gray";
    $color[t_bronce_gold] = "#715e0f";
    $color[t_silver] = "Silver";
//    echo json_encode($color);
    foreach($color as $key=>$val){ ?>
		<li class="w3-display-container font-24" onclick="selectCarColor('<?=$key;?>','<?=$key;?>');"><?=$key;?> 
		<span style="padding-right:20px;" class=" w3-right">
		<button style="box-shadow:1px 1px 2px #ddd;background-color:<?=$val;?>;width:40px;height:20px;border-radius:15px;" class="btn btn-sm"></button>
		</span> 
		</li>
		
	<? }
   ?>
 
     </ul>
    </div>
    </div>
<?
}

if($_GET[query]=='plate_color'){
	?>
    <div >
    <div class="list-container"> 
    <ul class="w3-ul w3-card-4">
    <?
    $color[t_black] = "Black";
    $color[t_yellow] = "#e8e813";
    $color[t_green] = "#00a65a";
    $color[t_red] = "Red";
   
//    echo json_encode($color);
    foreach($color as $key=>$val){ ?>
		<li class="w3-display-container font-24" onclick="selectPlateColor('<?=$key;?>','<?=$key;?>');"><?=$key;?> 
		<span style="padding-right:20px;" class=" w3-right">
		<button style="box-shadow:1px 1px 2px #ddd;background-color:<?=$val;?>;width:40px;height:20px;border-radius:15px;" class="btn btn-sm"></button>
		</span> 
		</li>
		
	<? }
   ?>
 
     </ul>
    </div>
    </div>
<?
}

if($_GET[query]=='region'){
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
    $res[region] = $db->select_query("SELECT * FROM web_area  ORDER BY ".$place_shopping." asc ");
   ?>
   <div class="list-container"> 
    <ul class="w3-ul w3-card-4">
    <?
    while ($arr[region] = $db->fetch($res[region])){ ?>
    	
	    <li class="w3-display-container font-24" onclick="selectProvince('<?=$arr[region][id];?>','<?=$arr[region][$place_shopping];?>');"><?=$arr[region][$place_shopping];?> </li>
	 
    <? } ?>
     </ul>
    </div>
<? }

if($_GET[query]=='province_new'){
	if($_GET[region]!=""){
		$where_area = "and area = '".$_GET[region]."'";
	}
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
    $res[pv_new] = $db->select_query("SELECT id, ".$province." FROM web_province where id>0 ".$where_area." ORDER BY ".$province." asc  ");
   ?>
   <table width="100%" style="padding-bottom: 5px;">
    <tr>
    	
    	<td><input type='text' value='' class='form-control filter_province font-24' style='height:35px;margin-top:-7px;' onkeyup='filterProvince()' placeholder="<?=t_search;?>" /></td>
    </tr>
    </table>          
   <div class="list-container"> 
    <ul class="w3-ul w3-card-4">
    <?
    while ($arr[pv_new] = $db->fetch($res[pv_new])){ ?>
    	
	    <li class="w3-display-container font-24" onclick="selectProvince('<?=$arr[pv_new][id];?>','<?=$arr[pv_new][$province];?>');"><?=$arr[pv_new][$province];?> </li>
	 
    <? } ?>
     </ul>
    </div>
<? }

if($_GET[query]=='find_area_id'){
	
}
?>