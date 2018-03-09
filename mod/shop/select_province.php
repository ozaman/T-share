<? if($_GET[op]==""){ ?>
<style>
	.my-padding{
    /* margin-top: 55px; */
    /* padding: 17px; */
    padding-left: 15px;
    padding-top: 15px;
    padding-right: 15px;
    padding-bottom: 20px;
    }
</style> <?  include ("bootstrap/css/css.php");?>

<div class="my-padding" style="margin-top: 40px;"> 
	<table width="100%">
		
		<tr style="display: nones;" id="row_select_region" class="area_select">
			<td>
				<select class="form-control" id="select_region" name="select_region" style="margin-top: 0px;border-radius:10px;" >
					<option value="0">- เลือกภูมิภาค -</option>	
					<?
                          $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                                  $res[region] = $db->select_query("SELECT * FROM web_area where shopping_product>0 ORDER BY topic_th asc ");
                                   while($arr[region] = $db->fetch($res[region])) {
                                if($arr[project][region]==$arr[region][id]){
								  	$selected_region = "selected";
								  }else{
								  	$selected_region = "";
								  }
				$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
				$num_place = $db->select_query("SELECT sum(num_place) as num_all FROM shopping_place_num where area = '".$arr[region][id]."' and status = 1 group by area ");
				$num_place = $db->fetch($num_place)		  
                                  ?>
                    <option value="<?=$arr[region][id];?>" <?=$selected_region;?>><?=$arr[region][topic_th]." : ".$num_place[num_all]." สถานที่";?></option>
                 	<? }  $db->closedb ();?>
				</select>
			</td>
		</tr>
		<tr style="display: nones;" id="row_select_pv" class="area_select">
			<td>
				<div id="html_pv"></div>
			</td>
		</tr>
		
		<tr id="row_last_btn" style="display: nones;">
			<td>
				<button class="btn btn-block btn-primary"     id="submit_select_pv" style="width:100%;margin-top: 10px; height:50px; background-color:<?=$main_color?>; color:#FFFFFF"><strong>ตกลง</strong> </button>
			</td>
		</tr>
	</table>
</div>

<script>

	$('#checkbox_pv_btn').click();
	setTimeout(function(){ 
	$('#province_text_select').text($('#txt_pv_fr').val()); 
	var txt_pv = $('#txt_pv_fr').val();
	var url = "mod/shop/select_province.php?op=get_id_province";
	$.post( url,{txt_pv:txt_pv}, function( data ) {
			  	var obj = JSON.parse(data);
			  	console.log(obj);
			  	if(obj==false){
					$( "#select_region").val(0);
					 $('#select_region').change();
				}else{
					var province = obj.id;
				  	var area = obj.area;
				  	$('#province_id').val(province);
					  $( "#select_region").val(area);
					  $('#select_region').change();
				}
			 	
				
			});
	}, 200);
	
	
	$('#select_region').change(function(){
		var area = $(this).val();
		var province_id = $('#province_id').val();
		var url = "mod/shop/select_province.php?op=get_select_province&area="+area+"&province="+province_id;
		$.post( url, function( data ) {
			$('#html_pv').html(data);
		});

	});
	
	
	
	$('#submit_select_pv').click(function(){
			 console.log('select province');
			 var province = $('#select_pv').val();
			 var province_name = $('#txt_pv_fr').val();
			 if(province==0 || province==""){
			 	alert('กรุณาเลือกจังหวัด');
			 	return;
			 }
			 openMainShop(province,province_name);
	});


	
</script>

<? }
if($_GET[op]=="get_id_province"){
include('../../includes/class.mysql.php');
$db = New DB();
$db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
$str = $_POST[txt_pv]; //กรุงเทพมหานคร
if(strlen($str)>7){
	$txt = mb_substr($str,0,7, "utf-8");
}else{
	$txt = $_POST[txt_pv];
}
$th = "name_th LIKE '%".$txt."%'";
$en = "or name LIKE '%".$txt."%'";
$cn = "or name_cn LIKE '%".$txt."%'";
$pv[province] = $db->select_query("SELECT id,name_th,name_cn,name,area FROM web_province where ".$th." ".$en." ".$cn."   ");
$pv[province] = $db->fetch($pv[province]);

echo json_encode($pv[province]);
}

if($_GET[op]=="get_select_province"){
include('../../includes/class.mysql.php');
$db = New DB();
$db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
	 ?>
<select class="form-control" id="select_pv" name="select_pv" style="margin-top: 10px;border-radius:10px;" >
<option value="0">- เลือกจังหวัด -</option>	
					<?php 
					$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                    $res[pv] = $db->select_query("SELECT * FROM web_province where area = '".$_GET[area]."'   and shopping_product>0 ORDER BY name_th asc  ");
                      
                	while($arr[pv] = $db->fetch($res[pv])) { 
					
//////////// 
	 
                	if($_GET[province]==$arr[pv][id]){
						$selected = "selected";
					}else{
						$selected = "";
					}
					$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
				$num_place = $db->select_query("SELECT sum(num_place) as num_all FROM shopping_place_num where province = '".$arr[pv][id]."' and status = 1 group by province ");
				$num_place = $db->fetch($num_place)
                	?>
                    <option value="<?=$arr[pv][id];?>" class="<?=$arr[pv][area];?>" <?=$selected;?> ><?=$arr[pv][name_th]." : ".$num_place[num_all]." สถานที่";?></option>
                   <?  }
					?>
				</select>	
<? }
?>