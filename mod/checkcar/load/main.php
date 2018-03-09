<table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td style="display:none"> </td>
  </tr>
  <tr>
    <td  style="padding-top:10px; "><div  id="send_user_datas"></div>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%">
	<?
	$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$res[chkcar] = $db->select_query("SELECT * FROM  driver_use_car  where drivername='".$arr[web_user][id]."'  order by id desc limit 1 ");
$arr[chkcar] = $db->fetch($res[chkcar]);
	
	?>
	
<? if($arr[chkcar][type]<>'start'){ ?>
	
	<button id="submit_start" type="button" class="btn btn-block btn-primary" style="width:100%; font-size:20px; background-color: #00CC66; border:2px solid #FFFFFF; border-radius:5px;">เริ่มใช้รถ</button>
	
	
	<? } ?>
	
		<? if($arr[chkcar][type]=='start'){ ?>
	
		<button   type="button" class="btn btn-block btn-primary" style="width:100%; font-size:20px;  background-color: #CCCCCC   ; border:2px solid #FFFFFF; border-radius:5px; ">เริ่มใช้รถ</button>
		
		<? } ?>
	
	
	</td>
    <td width="50%">
	
 
	
	<? if($arr[chkcar][type]=='start'){ ?>
	<button id="submit_stop" type="button" class="btn btn-block btn-primary" style="width:100%; font-size:20px; background-color: #FF0000   ; border:2px solid #FFFFFF; border-radius:5px;">หยุดใช้รถ</button>
	
	<? } ?>
	
		<? if($arr[chkcar][type]<>'start'){ ?>
	<button   type="button" class="btn btn-block btn-primary" style="width:100%; font-size:20px;  background-color: #CCCCCC   ; border:2px solid #FFFFFF; border-radius:5px; ">หยุดใช้รถ</button>
	
	<? } ?>
	
	</td>
  </tr>
</table>
</td>
  </tr>
</table>



<script>

/// check use car








 /// check login
 
 
 

$("#submit_start").click(function(){ 



$( "#load_data_manage_work_show" ).toggle();
 
 	var url_chat_<? echo $arr[project][id];?> = "load_page_show.php?name=checkcar&file=popup_checkcar_start&id=<?=$arr[project][id];?>&day=<?=$daywork;?>&carno=<?=$arr[project][carno];?>&cartype=<?= $arr[project][cartype];?>&car_list=<?=$i;?>&sv=<?=$arr[project][server];?>";
/// $( "#load_data_manage_work" ).toggle();
//    $('#load_data_manage_work_show').html(load_main_mod);
		$('#load_data_manage_work_show').load(url_chat_<? echo $arr[project][id];?>); 
 

if(document.getElementById('car_number').value=="") {
swal('กรุณาเลือกรถที่ต้องการขับ'); 
document.getElementById('car_number').focus() ; 
return false ;
}
 
 $.post('popup.php?name=user&file=savedata&type=selectcar&id=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   $('#send_user_data').html(response);
  });
 
 
 });
 
 
 ///////////
 
 
  

$("#submit_stop").click(function(){ 

 

$( "#load_data_manage_work_show" ).toggle();
 
 	var url_chat_<? echo $arr[project][id];?> = "load_page_show.php?name=checkcar&file=popup_checkcar_stop&id=<?=$arr[project][id];?>&day=<?=$daywork;?>&carno=<?=$arr[project][carno];?>&cartype=<?= $arr[project][cartype];?>&car_list=<?=$i;?>&sv=<?=$arr[project][server];?>";
/// $( "#load_data_manage_work" ).toggle();
//    $('#load_data_manage_work_show').html(load_main_mod);
		$('#load_data_manage_work_show').load(url_chat_<? echo $arr[project][id];?>); 
 

if(document.getElementById('car_number').value=="") {
swal('กรุณาเลือกรถที่ต้องการขับ'); 
document.getElementById('car_number').focus() ; 
return false ;
}
 
 $.post('popup.php?name=user&file=savedata&type=selectcar&id=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   $('#send_user_data').html(response);
  });
 
 
 });
 
 ////////////
 
 
 
 
 
 
 

 
 
 </script> 