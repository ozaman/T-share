 
<input name="old_drivername" type="hidden" id="old_drivername<? echo $arr[project][id];?>" style="width:120px; FONT-SIZE:13px; " value="<? echo $arr[project][drivername];?>" />

<input name="work_type" type="hidden" id="work_type<? echo $arr[project][id];?>" style="width:120px; FONT-SIZE:13px; " value="0" />
<input name="old_carno" type="hidden" id="old_carno<? echo $arr[project][id];?>" style="width:120px; FONT-SIZE:13px; " value="<? echo $arr[project][carno];?>" />

<input name="change_carno" type="hidden" id="change_carno<? echo $arr[project][id];?>" style="width:120px; FONT-SIZE:13px; " value="<? echo $arr[project][carno];?>" />

<input name="change_drivername" type="hidden" id="change_drivername<? echo $arr[project][id];?>" style="width:120px; FONT-SIZE:13px; " value="<? echo $arr[project][drivername];?>" />

 
<div  style="margin-top: 10px; font-size:22px; font-weight:bold;   padding:10px; margin-right:18px;  width:100%; <? if($arr[project][cartype] == 2){  ?>display:nones<? } ?>">
<? if($arr[project][cartype] == 2){  ?>
<script>
$('#drivername<?=$arr[project][id];?>').attr('disabled', true);
 $('#drivername<?=$arr[project][id];?>').addClass("no-select");
</script>
<? } ?>

<select name="drivername"   id="drivername<?=$arr[project][id];?>"    style="font-size:18px; padding-bottom: 1px; background-color:#FFFDE9; height:40px; width:100%;" chosen width="'100%'">
 
                      <?
                      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                      $res[category] = $db->select_query("SELECT * FROM ".TB_driver." where  status=1    and  main_company=1 ORDER BY abs(company) asc, convert(nickname using tis620)  desc  ");
while ($arr[category] = $db->fetch($res[category])){

	$res[company] = $db->select_query("SELECT id,company FROM web_admin where id='".$arr[category][company]."'   ");
    $arr[company] = $db->fetch($res[company]);
 
 
   
	   echo "<option value=\"".$arr[category][id]."\"";
	   if($arr[category][id] == $arr[project][drivername]){echo " Selected";}
	   echo ">".$arr[category][nickname]."  (".$arr[company][company].")</option>";
	   }
                      $db->closedb ();
                      ?>
  </select>
  <div id="load_driver<?=$arr[project][id];?>" style=" padding-top:5px; display:none "></div>
</div>
 


<div  style="margin-top: -5px; font-size:22px; font-weight:bold;   padding:10px; margin-right:18px; padding-bottom:1px;  width:100%;<? if($arr[project][cartype] <> 2){  ?>display:none<? } ?>s  ">

<? if($arr[project][cartype] <> 2){  ?>
<script>
$('#carno<?=$arr[project][id];?>').attr('disabled', true);
 $('#carno<?=$arr[project][id];?>').addClass("no-select");
</script>
<? } ?>


 
	
 
	
  <select name="carno"   id="carno<?=$arr[project][id];?>"    style="font-size:22px; padding-bottom: 0px; padding:0px; background-color:#FFFDE9;height: 45px; width:100%">
         
                      <?
    
                      ///$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
		mysql_query("SET NAMES UFT8"); 
		mysql_query("SET character_set_results=utf-8"); 
///$res[work] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."   where id > 0  $findpart  and admin_company =1   and transfer_date='". $daywork."'  and status = 'CONFIRM'  and airout_time <>'' and  carno >0 and drivername > 0  $findwork  order by  carno,airout_time ASC  limit 1 ");

$res[work] = $db->select_query("SELECT * FROM transfer_report_all   where transfer_date='". $daywork."'  and status = 'CONFIRM'  and airout_time <>'' and  carno >0 and drivername > 0  $findpart    order by  carno,airout_time ASC    ");

while ($arr[work] = $db->fetch($res[work])){

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

 $res[dv] = $db->select_query("SELECT id,nickname FROM web_driver where id='".$arr[work][drivername]."'   ");
  $arr[dv] = $db->fetch($res[dv]);
  /*
  if($arr[work][agent]=='13' and  $arr[work][cartype] <>'2'){
			$carpart="Ctrip";			
			}
				if($arr[work][agent]=='13' and  $arr[work][cartype] =='2'){
			$carpart="Join";			
			}
			
			if($arr[work][agent]<>'13' and  $arr[work][cartype] <>'2'){
			$carpart="Golden";			
			}
				if($arr[work][agent]<>'13' and  $arr[work][cartype] =='2'){
			$carpart="Join";			
			}
   
				*/  
	   echo "<option value=\"".$arr[work][id]."\"";
	   if($arr[work][id] == $arr[project][id]){echo " Selected";}
	   echo ">".$carpart." ".$arr[work][carno]."    (".$arr[dv][nickname].")  </option>";
	   }
                      $db->closedb ();
                      ?>
  </select>
  <div id="load_carno<?=$arr[project][id];?>" style=" padding-top:5px; display:none "></div>
 
    </div> 
   

	
	
	<script>
	
document.getElementById('numbercar_<?=$arr[project][id];?>').value ==2;
	 
	 
	 
	 
	$('#edit_<?=$arr[project][id];?>').attr('disabled', true);
	
	$('#drivername<?=$arr[project][id];?>').change(function(){
	
	document.getElementById('work_type<?=$arr[project][id];?>').value = 'driver' ;
	
	
		$('#carno<?=$arr[project][id];?>').attr('disabled', true);
	 $('#carno<?=$arr[project][id];?>').addClass("no-select");
	
	
	 var drivernew = $(drivername<?=$arr[project][id];?>).val();
	  var driverold = $(old_drivername<? echo $arr[project][id];?>).val();
	
 		   var url_driver = "popup.php?name=lab/check&file=work&part=<?=$carpart?>&type=driver&id=<? echo $arr[project][id];?>&dvold="+driverold+"&dvnew="+drivernew;
		   
		 $('#load_driver<?=$arr[project][id];?>').show();
		///   alert(name);
	  $('#load_driver<?=$arr[project][id];?>').load(url_driver);
 
  
    });
					
					</script>
					
					
					
					<script>
	$('#carno<?=$arr[project][id];?>').change(function(){
	document.getElementById('work_type<?=$arr[project][id];?>').value = 'guest' ;
	
	$('#drivername<?=$arr[project][id];?>').attr('disabled', true);
	 $('#drivername<?=$arr[project][id];?>').addClass("no-select");
	 
	 var carnonew = $(carno<?=$arr[project][id];?>).val();
	  var carnoold = $(old_carno<? echo $arr[project][id];?>).val();
	
 		   var url_carno= "popup.php?name=lab/check&file=work&part=<?=$carpart?>&type=car&id=<? echo $arr[project][id];?>&carold="+carnoold+"&carnew="+carnonew;
		   
		 $('#load_carno<?=$arr[project][id];?>').show();
		///   alert(name);
	  $('#load_carno<?=$arr[project][id];?>').load(url_carno);
 
  
    });
 
 $("#edit_<?=$arr[project][id];?>").click(function(){
	 var carnonew = $(carno<?=$arr[project][id];?>).val();
	  var carnoold = $(old_carno<? echo $arr[project][id];?>).val();
	  	 var drivernew = $(drivername<?=$arr[project][id];?>).val();
	  var driverold = $(old_drivername<? echo $arr[project][id];?>).val();
	  var work= $(work_type<? echo $arr[project][id];?>).val();
	

var url_all= "popup.php?name=lab/check&file=work&part=<?=$carpart?>&type=complete&id=<? echo $arr[project][id];?>&carold="+carnoold+"&carnew="+carnonew+"+&dvold="+driverold+"&dvnew="+drivernew+"&work="+work;
		   
$('#data_popup_<?=$arr[project][id];?>').load(url_all);
	 });
	 
	 
	  $("#reset_<?=$arr[project][id];?>").click(function(){
	  
	  document.getElementById('work_type<?=$arr[project][id];?>').value = '0' ;
	  
	   $('#edit_<?=$arr[project][id];?>').removeClass("btn-editwork-active");
	   $('#carno<?=$arr[project][id];?>').removeClass("no-select");
	     $('#drivername<?=$arr[project][id];?>').removeClass("no-select");
		 
		  $('#carno<?=$arr[project][id];?>').attr('disabled', false);
		  $('#drivername<?=$arr[project][id];?>').attr('disabled', false);
	   
	   
	   $('#edit_<?=$arr[project][id];?>').attr('disabled', true);
 
	  document.getElementById('drivername<?=$arr[project][id];?>').value = <? echo $arr[project][drivername];?> ;
	  document.getElementById('change_drivername<?=$arr[project][id];?>').value = <? echo $arr[project][drivername];?> ;
	 document.getElementById('carno<?=$arr[project][id];?>').value = <? echo $arr[project][id];?>;
	  document.getElementById('change_carno<?=$arr[project][id];?>').value = <? echo $arr[project][carno];?>;
	 
	  $('#load_carno<?=$arr[project][id];?>').hide();
	    $('#load_driver<?=$arr[project][id];?>').hide();
		
		 
	
 
	 });
	 
 
					
  $("#btn_confirm_change_<?=$arr[project][id];?>").click(function(){
  
 ///  alert(document.getElementById('work_type<? echo $arr[project][id];?>').value);
 
	   $('#edit_<?=$arr[project][id];?>').removeClass("btn-editwork-active");
	//   $('#carno<?=$arr[project][id];?>').removeClass("no-select");
	   //  $('#drivername<?=$arr[project][id];?>').removeClass("no-select");
		 
		//  $('#carno<?=$arr[project][id];?>').attr('disabled', false);
		//  $('#drivername<?=$arr[project][id];?>').attr('disabled', false);
	   
	   
	   $('#edit_<?=$arr[project][id];?>').attr('disabled', true);
 
	  //document.getElementById('drivername<?=$arr[project][id];?>').value = <? echo $arr[project][drivername];?> ;
	 //document.getElementById('number_<?=$arr[project][id];?>').value = document.getElementById('carno<?=$arr[project][id];?>').value ;
	 
	  $('#load_carno<?=$arr[project][id];?>').hide();
	    $('#load_driver<?=$arr[project][id];?>').hide();
		
		
		  var url="popup.php?name=lab/action&file=action&action=change_work&data_id=<?=$arr[project][id];?>";
	url=url+"&type="+document.getElementById('work_type<? echo $arr[project][id];?>').value;
	
 
	
	
	url=url+"&carno="+document.getElementById('change_carno<? echo $arr[project][id];?>').value;
 
	url=url+"&old_carno="+document.getElementById('old_carno<? echo $arr[project][id];?>').value;
	
	url=url+"&drivername="+document.getElementById('change_drivername<? echo $arr[project][id];?>').value;
 	url=url+"&old_drivername="+document.getElementById('old_drivername<? echo $arr[project][id];?>').value;
 
	  
	  
	  
   $("#send_data_work<?=$arr[project][id];?>").load(url);
 
 
	 });
					
					
					
					</script>
					
 
					 <style>
					 .no-select {
     font-family:Arial, Helvetica, sans-serif;background-color: #666666;   color: #999999;  
 }
					 
					 
					 </style>
					 <div id="send_data_work<?=$arr[project][id];?>" style="display:none "></div>