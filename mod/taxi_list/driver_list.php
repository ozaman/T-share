<script>
$('#text_mod_topic_action').text('รายชื่อสมาชิก Taxi');
</script>

<!--<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css" />-->
<div style="padding: 0px;  margin-top: 55px;margin-bottom: 30px;">

<table class="table" width="100%">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric" width="30">#</th>
      <th>ชื่อเล่น</th>
      <th>เบอร์โทร</th>
    </tr>
  </thead>
  <tbody>
<?php 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[dv] = $db->select_query("SELECT * FROM web_driver order by id desc ");
while($arr[dv] = $db->fetch($res[dv])){ 
 $d1 = "2018-03-24";
 $d2 = date('Y-m-d',$arr[dv][post_date]);
?>

	<tr >
		<td onclick="openDetailDv('<?=$arr[dv][id];?>','<?=$arr[dv][nickname];?>');"><?=$arr[dv][id];?></td>
		<td onclick="openDetailDv('<?=$arr[dv][id];?>','<?=$arr[dv][nickname];?>');"><?=$arr[dv][nickname];?></td>
		<td><a href="tel:<?=$arr[dv][phone];?>"><?=$arr[dv][phone];?></a></td>
	</tr>

<? }
?>
</tbody>
 </table>
 </div>
 
 <div id="broModal" class="modal" style="font-size: 0px!important; color: #000000 !important;">
      <span class="close" style="position: fixed;
         color: #f4f4f4;
         right: 15px;
         font-size: 40px; display: none;
         " id="closeModal" >&times;</span>
      <i class="fa fa-times" aria-hidden="true" style="position: fixed;
         color: #f4f4f4;
         right: 15px;
         font-size: 40px;
         z-index: 9000;
         margin-top : 10px;
         " id="close_modal" onclick="$('#broModal').hide();$('#material_dialog').show();$('#main_load_mod_popup .back-full-popup').show();"></i>
         <style>
         	.swiper-container {
      width: 100%;
      height: 100%;
    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
         </style>
      <div class="modal-content" id="img01"> 
      
      </div>
   </div>
 
 <script>
 	function openDetailDv(id,name){
		console.log(id);
		
		$('#material_dialog').show();
		$('#dialoglLabel').text(name);
		$('#load_modal_body').html('<br/><br/><br/>');
		var url = "empty_style.php?name=taxi_list&file=driver_detail";
		$.post(url,{ id : id },function(res){
			$('#load_modal_body').html(res);
		});
	}
	function viewDocument(dv_id,type,caption){

		$('#material_dialog').hide();
		$('#main_load_mod_popup .back-full-popup').hide();
		$('#broModal').show();
		var load_img = "mod/taxi_list/doc_dv_swiper.php?type="+type+"&driver_id="+dv_id+"&caption="+caption;
		console.log(load_img);
		$('#img01').load(load_img);
	}
 </script>