 <script src="js/talk.js"></script>  
 
  
 <? 
 $clock_color="#009999;font-size:22px";
  $no_clock_color="#999999;font-size:22px";
  $time_color="#009999";
  $spin=" fa-spin 2x";
 ?>
 
 
 <style type="text/css">
<!--
.topictransfer { padding-top:10px; font-size:16px;  font-weight:normal; color: #3C8DBC ; 
 
}
.style1 {font-size: 16px}
.style2 {font-size: 16}
.tab-work-ok-<?=$daywork?> {

}
.tab-work-no-<?=$daywork?> {

}


.no-click {
  pointer-events: none;
}


.timeline-checkin { padding-left:10px; font-size:16px;  font-weight:normal; color: #3C8DBC ; 
 
}
 

-->
</style> 
  <?
 /*
if($daywork != ''){
	$daywork = $daywork;
}else{
$daywork = "2016-07-12";
}

*/
 //echo $_SESSION['data_user_driver'];
//  echo $_GET[server];



$talk_speed="rate: 1.0";
?>
 
 <?
 
 
 
 
 
if($_GET[find]=="day"){
 $daywork= $_GET[day];
}

 $daywork;
  $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
 $res[drivername] = $db->select_query("SELECT id,nickname,post_date,company FROM ".TB_driver." WHERE id='".$_SESSION['data_user_id']."' ");
	$arr[drivername] = $db->fetch($res[drivername]);
 
	///echo $arr[project][id];
	
 $res[companydriver] = $db->select_query("SELECT admin_company FROM ".TB_admin." WHERE id='".$arr[drivername][company]."'    "); 
$arr[companydriver] = $db->fetch($res[companydriver]);
	
	
	
	
 
	///echo $arr[project][id];
	$admin_company = $arr[companydriver][admin_company];
	if($arr[companydriver][admin_company]==5) {
  $find_date="and outdate='". $daywork."'";
	} 
	
		else {
  $find_date="and transfer_date='". $daywork."'";
	} 
	//echo $find_date;
	//echo $driver_id;
//$find_date="and out_date='". $daywork."'";
	
 
$select_order="
id
,invoice
,program
,orderid
,vc_id
,pickup_place
,to_place
,carno
,cartype
,drivername
,air
,airin_time
,airout_h
,airout_m
,airout_time
,driver_remark
,total,
guest_name
,guest_phone
,server
,car_price
,agent
 
,product_name
,product_name_th
,extra_service_name_th

,name_pickup_place
,name_pickup_place_area
,name_pickup_place_province

,name_to_place
,name_to_place_area
,name_to_place_province
,read_msg

,driver_topoint
,driver_pickup
,driver_complete
,driver_checkcar

,driver_topoint_date
,driver_pickup_date
,driver_complete_date
,driver_checkcar_date
,product_area
,adult
,child
,baby
,change_work_status
,transfer_date
,outdate
,numcar

";

 
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
		mysql_query("SET NAMES UFT8"); 
		mysql_query("SET character_set_results=utf-8"); 
$res[project] = $db->select_query("SELECT $select_order FROM ".TB_transfer_report_all."  where drivername='".$driver_id."'  $find_date and status = 'CONFIRM'  and airout_time <>'' group by invoice order by  airout_time ASC ");
//  $res[project] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."  where drivername='".$driver_id."' and transfer_date='". $daywork."'   order by  airout_time ASC  ");
$rows[project] = $db->rows($res[project]);

if($rows[project]){	
}else{
	$rows[project] = 0;
}

/// map th

/// map cn
 
 $row_no = $db->num_rows(TB_transfer_report_all,"id","drivername='".$driver_id."'   $find_date and status = 'CONFIRM' and driver_checkcar  ='0' group by driver_checkcar,invoice order by driver_checkcar desc   ");
$row_yes = $db->num_rows(TB_transfer_report_all,"id","drivername='".$driver_id."'  $find_date  and status = 'CONFIRM' and driver_checkcar  ='1' group by driver_checkcar,invoice order by driver_checkcar desc ");
 
?>
 

 <div class="row" style="height:auto; padding:0px; margin-right:-10px; ">
				 
<?

$i=1;
while($arr[project] = $db->fetch($res[project])){

$transfer_date_show = $arr[project][transfer_date];
$outdate_bkk = $arr[project][outdate];

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

/*
if ($arr[project][server]=='th'){
$res[gg_map] = $db->select_query("SELECT id,map,transferplace_type,star FROM ".TB_transferplace_new."  ");
} 
if ($arr[project][server]=='cn'){
$res[gg_map] = $db->select_query("SELECT id,map,transferplace_type,star FROM ".TB_transferplace_new."  ");
//$res[gg_map] = $db->select_query("SELECT id,map,transferplace_type,star FROM ".TB_transferplace_cn_new."  ");
}

	while($arr[gg_map] = $db->fetch($res[gg_map])){
		$arr_map[$arr[gg_map][id]] = $arr[gg_map][map];
		$arr_type[$arr[gg_map][id]] = $arr[gg_map][transferplace_type];
		$arr_star[$arr[gg_map][id]] = $arr[gg_map][star];
	}
 
 if ($arr[project][server]=='th'){
$res[gg_map] = $db->select_query("SELECT id,topic,province,amphur FROM ".TB_transferplace."  ");
} 
 if ($arr[project][server]=='cn'){
$res[gg_map] = $db->select_query("SELECT id,topic,province,amphur FROM ".TB_transferplace."  ");
//$res[gg_map] = $db->select_query("SELECT id,topic,province,amphur FROM ".TB_transferplace_cn."  ");

}
 while($arr[gg_map] = $db->fetch($res[gg_map])){
		$arr_t_topic[$arr[gg_map][id]] = $arr[gg_map][topic];
		$arr_t_province[$arr[gg_map][id]] = $arr[gg_map][province];
		$arr_t_amphur[$arr[gg_map][id]] = $arr[gg_map][amphur];
	}
	
https://translate.google.com/translate_tts?tl=en&q=Hello

 
	 $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[product] = $db->select_query("SELECT cartype,area,admin_company,topic_en,topic_th FROM web_transferproduct WHERE id='".$arr[project][program]."' ");
	$arr[product] = $db->fetch($res[product]);
  
	$res[place] = $db->select_query("SELECT topic FROM ".TB_transferplace." WHERE id='".$arr[project][pickup_place]."' ");
	$arr[place] = $db->fetch($res[place]);
	$res[to] = $db->select_query("SELECT topic FROM ".TB_transferplace." WHERE id='".$arr[project][to_place]."' ");
	$arr[to] = $db->fetch($res[to]);
	
	*/
	 $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
		$res[showlogo] = $db->select_query("SELECT id,company,company_or FROM ".TB_admin." WHERE id='".$arr[project][agent]."' ");
	$arr[showlogo] = $db->fetch($res[showlogo]);
	

	
	//////////
 
//for($i=1;$i<=6;$i++){
?>

        <div class="col-md-12" >
	  <div class="box box-danger" style="padding:10px; height:320px;  border: solid 2px #ECF0F5;display:none" onmouseover="this.style.border='solid 2px #FF6600';" onmouseout="this.style.border='solid 2px #ECF0F5';" id="booking_<?=$arr[project][invoice];?>"  >
	  
	 
		 
	  </div>  
   
              
  </div>  
 
   <!-- The time line -->
          <ul class="timeline" style="margin-left:5px;">
            <!-- timeline time label -->
			
			<? if($i==1){?>
            <li class="time-label" style="margin-right:25px; color:#FF0000; margin-left:-5px; " >

<span class="font_35" style="font-size:28px; margin-left:15px; width:100%; background-color: #FC9A35; color:#FFFFFF;box-shadow: 1px 1px 5px #999999; border:3px solid #FFFFFF;  border-radius: 15px;"><table width="100%"  border="0" cellspacing="1" cellpadding="1" >
  <tr>
    <td width="100" style="font-size:26px; margin-left:15px;  color:#FFFFFF "><b><center><? echo $daywork;   ?></b></td>
  </tr>
</table><center>
 </center>
              </span>   
			  <? $row_all=$row_no+$row_yes?>
			  <div style="margin-top:15px; margin-left:5px; margin-bottom:-10px; "><center>
			  <a  id="btn-all-<? echo $daywork;?>" class="btn btn-app" style="padding:5px; height:35px; width:29%;font-size:14px;border-radius: 15px; " >
                <span class="badge" style="border-radius: 25px;padding:5px; height:25px; width:25px; padding-top:5px; font-size:13px;border:1px solid #FFFFFF; "><b><?=$row_all?></b></span>
        <b> ทั้งหมด</b>
              </a>   
			  
			  <script>
 
 $("#btn-no-<? echo $daywork;?>").click(function(){
///    alert(55);
 $('.tab-no-<? echo $daywork;?>').show(); 
 $('.tab-yes-<? echo $daywork;?>').hide(); 

});

 $("#btn-yes-<? echo $daywork;?>").click(function(){
///    alert(55);
 $('.tab-yes-<? echo $daywork;?>').show(); 
 $('.tab-no-<? echo $daywork;?>').hide(); 

});

 $("#btn-all-<? echo $daywork;?>").click(function(){
///    alert(55);
 $('.tab-yes-<? echo $daywork;?>').show(); 
 $('.tab-no-<? echo $daywork;?>').show(); 

});
			</script>
			
			  
			  <a  id="btn-no-<? echo $daywork;?>" class="btn btn-app" style="padding:5px; height:35px;width:29%;font-size:14px;border-radius: 15px;			  
			  <? if($row_no>0 and $row_no<>$row_all){?> color:#E33621 <? } ?> <? if($row_no==$row_all){?> background-color:DD4B39;color:#FFFFFF <? } ?> "  >
                <span class="badge bg-red" style="border-radius: 25px;padding:5px; height:25px; width:25px; padding-top:5px; font-size:13px;border:1px solid #FFFFFF; " ><b><?=$row_no?></b></span>
      <b>   ไม่สำเร็จ</b>
              </a>   <a  id="btn-yes-<? echo $daywork;?>" class="btn btn-app" style="padding:5px; height:35px; width:29%; font-size:14px;  border-radius: 15px;
			    <? if($row_yes>0 and $row_yes<>$row_all){?> color:#0B9191 <? } ?>    <? if($row_yes>0 and $row_yes==$row_all){?> background-color:1CC1A4;color:#FFFFFF <? } ?>  
			  ">
                <span class="badge bg-green" style="border-radius: 25px;padding:5px; height:25px; width:25px; padding-top:5px; font-size:14px;border:1px solid #FFFFFF; "><b><?=$row_yes?></b></span>
     <b>    สำเร็จ</b>
              </a>  
			</center>  
 
 		  
			</div>
			  
			  
			  
            </li>

			<? } ?>
            
 
 
 
    
            <li style="margin-top: -5px; margin-left:0px;"  class="<? if($arr[project][driver_complete]=="1"){ ?>tab-yes-<? echo $daywork;?><? } ?><? if($arr[project][driver_complete]<>"1"){ ?>tab-no-<? echo $daywork;?><? } ?>"> 
         
              <div  style="margin-left:40px;  margin-right: 0px; margin-top: -10px;box-shadow: 0px  0px 10px #B4B4B4; border-top-right-radius: 10px; border-top-left-radius:  10px"  class="<? if($arr[project][driver_complete]=="1"){ ?>tab-yes-<? echo $daywork;?><? } ?><? if($arr[project][driver_complete]<>"1"){ ?>tab-no-<? echo $daywork;?><? } ?>"  > 
			  
             
<? if($i==1){?>
             <table width="100%" border="0" cellspacing="2" cellpadding="2" style="margin-top: 20px ">
			 <? } ?>
			 
			 <? if($i<>1){?>
             <table width="100%" border="0" cellspacing="2" cellpadding="2" style="margin-top: 30px; height:40px; ">
			 <? } ?>
   <tr>
    <td width="30"  style="background-color:#F6F6F6 ">
    
    
    
    
    
		<a  id="number_confirm_start_work_<?=$arr[project][id];?>">
	
	<div class="cirnumbershow<? 	if($arr[project][driver_complete]=="1"){ ?>ok<? } ?>" id="cir_<?=$arr[project][id];?>"  ><table width="100%"  border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td style="font-size:30px; color:#FFFFFF; font-weight:bold "><center><?=$i;?></center><? //=$arr[project][server];?></td>
  </tr>
</table>
</div> 

</a>




</td>
    <td width="80" height="30" style="background-color:#F3F3F3; padding-top:5px;   ">
		
 
	
	<? if($arr[project][cartype] == 2){  
	
	$work_type="join";
	
	?>
	
	
	
      
      <table width="100%"  border="0" cellspacing="0" cellpadding="0" >
        <tr>
           <td style="font-size:22px ; color:#009999; color:#444444"><i class="fa fa-users"></i></td>
          <td  style="font-size:14px ; font-weight:bold; margin-left:-10px;">จอย </td>
        </tr>
      </table>
      <? }else{ 
	  $work_type="ไพรเวท";
	  
	  ?>
      <table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td style="font-size:22px ; color:#009999; color:#444444;"><i class="fa fa-user"></i></td>
          <td  style="font-size:14px ; font-weight:bold">ไพรเวท</td>
        </tr>
      </table>
    <? } ?></td>
    <td valign="middle" style="font-size:14px ; font-weight:bold; padding-top:5px;"> 
  
						<? if($arr[project][product_area] == 'In'){ 
						$work_area="รับเข้า";
						$music_type="รับเข้าจาก..";
						 $music_service="รับเข้าจาก";
  					 $work_f="เที่ยวบิน..".$arr[project][air]. "";
			  ?>
 
 
						 
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr> 
 <td style="font-size:22px ; color: #3399CC; color:#444444  " width="30">&nbsp;<i class="fa   fa-plane " style=" -webkit-transform:rotateX(180deg);
  -moz-transform:rotateX(180deg);
  -o-transform:rotateX(180deg);
  -ms-transform:rotateX(180deg); "></i></td>
    <td style="font-size:14px ; font-weight:bold">&nbsp;รับเข้า</td>
  </tr>
</table>  
						  
						 
						   
						   <?  } elseif($arr[project][product_area] == 'Out'){
						   $work_area="ส่งออก";
						   $music_type="ส่งออกจาก..";
						   
						    $music_service="ส่งออกจาก";
						    
						   $work_f="เที่ยวบิน..".$arr[project][air]. "";
						    ?>
						   
						   <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr> 
 <td style="font-size:22px ;color: #3399CC; color:#444444  " width="30">&nbsp;<i class="fa   fa-plane "></i></td>
    <td style="font-size:14px ; font-weight:bold">&nbsp;ส่งออก</td>
  </tr>
</table>  
 
						  
	 <? }elseif($arr[project][product_area] == 'Point'){ 
	 
	  $work_area="พ้อยท์ทูพ้อยท์";
	  $music_service="รับจาก";
	 ?>  
						<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr> 
 <td style="font-size:22px ; color: #3399CC; color:#444444  " width="30">&nbsp;<i class="fa   fa-share-alt"></i></td>
    <td style="font-size:14px ; font-weight:bold">&nbsp;พ้อยท์</td>
  </tr>
</table>  
						  
	  <? }else{ 
						   $work_area="เซอร์วิส";
						   $music_service="งานใช้รถใน";
						   
						   ?> 
 
 
 <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr> 
 <td style="font-size:20px ; color: #3399CC; color:#444444 " width="30">&nbsp;<i class="fa  fa-taxi"></i></td>
    <td style="font-size:14px ; font-weight:bold">&nbsp;เซอร์วิส</td>
  </tr>
</table>
						
						   <? } ?> </td>
						<?
						if( $arr[project][server] == 'cn'){
	$link_vc = "http://www.t-bookingcn.com";
	$db->connectdb_cn(DB_NAME,DB_USERNAME,DB_PASSWORD);

$res[remark] = $db->select_query("SELECT id,remark,adult,child,baby,admin_company FROM ".TB_order."  where invoice='".$arr[project][invoice]."'  ");
 $arr[remark] = $db->fetch($res[remark]);
}else{
	$link_vc = "http://www.t-booking.com";
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

$res[remark] = $db->select_query("SELECT  id,remark,adult,child,baby,admin_company FROM  ".TB_order."  where invoice='".$arr[project][invoice]."'  ");
$arr[remark] = $db->fetch($res[remark]);
}

						?>   
						
			
			<? 
			 
			if($arr[project][agent]=='13' and  $arr[project][cartype] <>'2'){
			$carpart="Ctrip";			
			$music_carpart="ซีทริป";			
			}
				if($arr[project][agent]=='13' and  $arr[project][cartype] =='2'){
			$carpart="Join";			
			$music_carpart="Join";			
			}
			
			if($arr[project][agent]<>'13' and  $arr[project][cartype] <>'2'){
			$carpart="Golden";			
			$music_carpart="Golden";
			}
				if($arr[project][agent]<>'13' and  $arr[project][cartype] =='2'){
			$carpart="Join";			
			$music_carpart="จอย";
			}
			
			/*
			if($arr[remark][admin_company]<>'1' and  $arr[project][cartype] <>'2'){
			$carpart="Private";			
			$music_carpart="Private";
			
			//$carpart="Golden";			
			}
			 */
			// $music_carpart="โกลเด้น";
  			
			?>
						<?  if($arr[project][product_area] <> 'Out' and $arr[project][product_area]<>'In'){
						   $music_type="รับจาก..";
						 
						   $work_f="เที่ยวบิน.".$arr[project][air]. "";
						   }
						    ?>
 
						   
   
   </tr>
</table>



<?
if($driver_car_use_status=='start'){
$check_car_status=1;
} else {

$check_car_status=0;
}


?>



				 						
			  <script> 
 
							$("#confirm_start_work_<?=$arr[project][id];?>").show();
							$("#confirm_new_work_<?=$arr[project][id];?>").hide();
							
 
 
 
  $('#number_confirm_start_work_<?=$arr[project][id];?>').click(function(){   
 
  $('#confirm_start_work_<?=$arr[project][id];?>').click();
  
  });
 
 
  ///// เปิด งาน
 $('#confirm_start_work_<?=$arr[project][id];?>').click(function(){   
 var check_gps = document.getElementById('check_data_status_gps_lat_old').value;
 
 
 var check_usecar = <?=$check_car_status?>;
 
 
 if(check_gps==0 ){
  
 $( "#load_alert_gps_show" ).toggle();
 }
 

 
 else {
///   $( ".bottom_popup" ).slideToggle();
  $( "#load_data_main_popup" ).toggle();
 
 	var url_chat_<? echo $arr[project][id];?> = "load_data_mod.php?name=view&file=show&daytype=<?=$_GET[daytype]?>&id=<?=$arr[project][id];?>&day=<?=$transfer_date_show;?>&carno=<?=$arr[project][carno];?>&cartype=<?= $arr[project][cartype];?>&car_list=<?=$i;?>&sv=<?=$arr[project][server];?>&admin_company=<?=$admin_company;?>&outdate_bkk=<?=$outdate_bkk;?>";

 $('#load_data_main_popup').html(load_main_mod); 
 //$('#load_data_main_popup').load(url_chat_<? echo $arr[project][id];?>); 

 
  //var url_checkin = "go.php?name=action&file=action "; 
 
$.post(url_chat_<? echo $arr[project][id];?>,$('#form_popup_send_data').serialize(),

function(response){ $('#load_data_main_popup').html(response); });
 




		
		} 

 
 
     	});
 
 
 
 ////// สลับงาน
 
 
  ///// เปิด งาน
 $('#change_new_work_<?=$arr[project][id];?>').click(function(){   

  $( "#load_data_manage_work_show" ).toggle();
 
 var url_chat_<? echo $arr[project][id];?> = "load_page_show.php?name=lab/action&file=send_work&id=<?=$arr[project][id];?>&day=<?=$transfer_date_show;?>&carno=<?=$arr[project][carno];?>&cartype=<?= $arr[project][cartype];?>&car_list=<?=$i;?>&sv=<?=$arr[project][server];?>&vc=<?=$arr[project][invoice];?>&admin_company=<?=$admin_company;?>&outdate_bkk=<?=$outdate_bkk;?>&day=<?=$transfer_date_show;?>";
 
 $('#load_data_manage_work_show').html(load_main_mod); 
/// $('#load_data_manage_work_show').load(url_chat_<? echo $arr[project][id];?>); 
 
 
 $.post(url_chat_<? echo $arr[project][id];?>,$('#form_popup_send_data').serialize(),

function(response){ $('#load_data_manage_work_show').html(response); });
 
 
     	});
 
 
 					 
							</script>   
				 
 
 
 <div id="load_confirm_new_work_<?=$arr[project][id];?>" > </div>
  
<script>
$("#confirm_new_work_<?=$arr[project][id];?>").show();
</script>
 
 
 


<table width="100%" border="0" cellspacing="2" cellpadding="2" id="main_edit_work_<?=$arr[project][id];?>" style="border-radius: 15px;" class="tab_alertd">
  <tbody>
 <tr id="tr_confirm_start_work_<?=$arr[project][id];?>" style="display:nones">
      <td><a id="confirm_start_work_<?=$arr[project][id];?>" ><div class="btn-startwork" style="background-color: #3C8DBC;border-radius: 15px; margin:0px;"  ><? //echo $arr[project][airout_time];?><font class="font_20"><center><? echo $arr[project][airout_time];?>&nbsp;&nbsp;จัดการงาน</font>
</center>
 </div> </a> </td>
    </tr>
    <tr id="tr_change_new_work_<?=$arr[project][id];?>" style="display:none" class="change_new_work">
      <td>
      
 <div id="btn_change_new_work_<?=$arr[project][id];?>" >
      
 <div class="btn-startwork bg-green" style="background-color: #FC9A35;border-radius: 15px;margin:0px;"  id="change_new_work_<?=$arr[project][id];?>" ><? //echo $arr[project][airout_time];?><center><font class="font_20 "><span  id="change_new_work_text_<?=$arr[project][id];?>">ส่งงานให้คนอื่น</span></font> </div>  
 
 </div>
 
 
 <script>
 /*
$('#btn_change_new_work_<?=$arr[project][id];?>').addClass('no-click');
/// $('#btn_change_new_work_<?=$arr[project][id];?>').addClass('tab_alert');


$('#change_new_work_text_<?=$arr[project][id];?>').html('รอการตอบรับ');
*/

</script>
 
 </td>
    </tr>
    <tr style="display:none">
 
    
      <td id="time_change_new_work_<?=$arr[project][id];?>" style="display:none" class="font_22"><div id="time_reply_new_work_<?=$arr[project][id];?>" ></div></td>
    </tr>
    <tr style="display:none">
      <td id="status_change_new_work_<?=$arr[project][id];?>2" style="display:nones">
      
     <div class="btn-startwork" style="background-color: #666666;border-radius: 15px;margin:0px;"  id="change_้รก_work_<?=$arr[project][id];?>" ><? //echo $arr[project][airout_time];?><center><font class="font_20 "><span  id="change_new_work_text_<?=$arr[project][id];?>">ประวัติการรับงาน</span></font> </div>    
      
      
      </td>
    </tr>
  </tbody>
</table>


 


 <? if($driver_id > '0'){ ?>

 
 
  <? if($arr[project][driver_topoint]==1){ ?>
 
  <script>
 $('#tr_change_new_work_<?=$arr[project][id];?>').hide();
 $('#tr_change_new_work_<?=$arr[project][id];?>').show();
   </script>
 
 <? } ?>
 
 
 
   <? if($arr[project][driver_topoint]==0){ ?>
 
  <script>
 $('#tr_change_new_work_<?=$arr[project][id];?>').show();
   </script>
   
  <? } ?>
 
   <? } ?>
 
  
 <style>
.timeline-header a {
font-size:18px; color:#006699; font-weight:bold; padding:3px;
}
.timeline-header {
font-size:18px; color:#006699; font-weight:bold; padding:3px;
}
.timeline-l { padding:5px;margin-left:20px;
}
 
</style>
               
			   
			   
			    <div class="timeline-body"> 
 
<div  style=" font-size:20px; font-weight:bold; background-color:#FFFFFF; padding:1px;border-radius: 0px; color:367FA9; margin:5px;margin-top:10px; display:nones ">
<div style="display:none ">
<table width="100%"  border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td style="font-size:18px; font-weight:bold; background-color:#367FA9; padding:5px;border-radius: 2px; ">
<table width="100%"  border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="20"><i class="fa  fa-comment" style="color:#FFFFFF; font-size:26px;margin-top:3px;"></i></td>
    <td style="color:#FFFFFF; font-size:14px;padding:5px;">3 ข้อความจากผู้ใช้บริการ</td>
  </tr>
  <tr>
    <td><i class="fa  fa-plane" style="color:#FFFFFF; font-size:26px;margin-top:3px; 	
  -webkit-transform:rotateX(180deg);
  -moz-transform:rotateX(180deg);
  -o-transform:rotateX(180deg);
  -ms-transform:rotateX(180deg); "	></i></td>
    <td style="color:#FFFFFF; font-size:14px; padding:5px;">เที่ยวบินล่าช้า 2 ชั่วโมง 45  นาที</td>
  </tr>
  
  
  
  <tr>
    <td><i class="fa  fa-clock-o" style="color:#FFFFFF; font-size:26px;margin-top:3px;"></i></td>
 <td style="color:#FFFFFF; font-size:14px; padding:5px;">ใช้รถก่อนเวลา 1 ชั่วโมง 30  นาที<br><font color="#FFFFCC">
15.30</font></td>
  </tr>
  
    <tr>
    <td><i class="fa  fa-map-marker" style="color:#FFFFFF; font-size:26px;margin-top:3px; margin-left:3px;"></i></td>
 <td style="color:#FFFFFF; font-size:14px; padding:5px;">ผู้ใช้บริการพร้อมขึ้นรถ</td>
  </tr>
  
  
</table>
	
	
	
	</td>
    </tr>
</table>
</div>
</div>



<div  style=" font-size:20px; font-weight:bold; background-color:#FFFFFF; padding:1PX;border-radius: 0px; color:367FA9; margin:5px;margin-top:0px; ">

<table width="100%"  border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td style="font-size:18px; font-weight:bold; background-color:#FFFFFF; padding:5px;border-radius: 5px; color:367FA9 "><?=$carpart?>  <?=$arr[project][carno];?>&nbsp;&nbsp;</td>
    <td width="100" align="right" style="font-size:18px; font-weight:bold; background-color:#FFFFFF; padding:5PX;border-radius: 5px; color:367FA9 "><a href="<?=$link_vc;?>/print.php?name=admin/voucher&file=transfer&no=<? echo $arr[project][vc_id];?>&order=<? echo $arr[project][orderid];?>&code=<? echo $arr[project][vc_code];?>" target="_blank" style="font-size:16px; font-weight:bold; background-color:#FFFFFF; padding:5PX;border-radius: 5px; color:999999 "><?=$arr[project][invoice];?></a></td>
  </tr>
</table>

</div>





<div  style="margin-top:5px; font-size:16px; font-weight:bold; background-color:#F6F6F6; padding:5PX; text-transform:capitalize ">



 
  <?
  $string_to_replace     = array ("-" ,"," , " ");
$string_after_replace  = array (" ส่งที่ " ,"" , "" ,);
$pro_name_th       = str_replace($string_to_replace , $string_after_replace ,$arr[project][product_name_th], $count);   
 
  ?>
  
    <?
$string_service     = array ("คนขับ" ,"พร้อม" , " ");
$string_after_service  = array ("คนขับรถ" ,"" , "" ,);
$service_name_th       = str_replace($string_service , $string_after_service ,$arr[project][extra_service_name_th], $count);   
 
  ?>
  
    <?
 
$string_to     = array ("/", "【" , "】");
$string_after  = array (" - " , "<font color='#006699'>[", "]</font>");
$pro_name_th_cut = str_replace($string_to , $string_after ,$arr[project][product_name_th], $count);   
$pro_name_en_cut= str_replace($string_to , $string_after ,$arr[project][product_name], $count);   
  ?>
  
 
 
 
 
  <?=$pro_name_en_cut?>&nbsp;  <font color="#666666"> <?=$pro_name_th_cut?></font>
  
  
  <br>

<?
/// รับเข้า

 if($arr[project][cartype] <>2 and  $arr[project][product_area]=='In'){
	 
$wait='2 ชั่วโมง กรณีเที่ยวบินไม่ล่าช้า'; 
 }
 
  if($arr[project][cartype] ==2 and  $arr[project][product_area]=='In'){
	 
$wait='45 นาที กรณีเที่ยวบินไม่ล่าช้า'; 

/// 2017-12-28
 }
 

/// ส่งออก
 if($arr[project][cartype] <>2 and  $arr[project][product_area]=='Out'){	 
$wait='30 นาที '; 

/// 
if($arr[companydriver][admin_company]==5 and $arr[project][cartype] <>2 and  $arr[project][product_area]=='Out') { 
$wait='1 ชั่วโมง';
 }

 }
 
  if($arr[project][cartype] ==2 and  $arr[project][product_area]=='Out'){	 
$wait='15 นาที'; 
 }

 

///
  if( $arr[project][product_area]=='Point'){	 
$wait='30 นาที '; 
 }


///
  if( $arr[project][product_area]=='Service'){	 
$wait='1 ชั่วโมง หรือจนกว่าแขกยกเลิก';   
 }


?>

<? if($arr[companydriver][admin_company]==1 or $arr[companydriver][admin_company]==5) { ?>



<div style="margin-top:10px; margin-left:-3px;">
<font  color="#F26522" style="font-size: 16px; color:#F26522" ><i class="icon-new-uniF13C" style="font-size: 20px; color:#F26522" ></i>รอ&nbsp;<?=$wait?></font>

<? } ?>
  
  </div>
  
  
  
  </div>
				
				
 
                </div>
 
 
 
 
 
 
 
 
 
<!-- timeline item -->
 
 
            <? if($arr[project][numcar] > 1){ ?>
      
			<li  class="<? if($arr[project][driver_complete]=="1"){ ?>tab-yes-<? echo $daywork;?><? } ?><? if($arr[project][driver_complete]<>"1"){ ?>tab-no-<? echo $daywork;?><? } ?>">
            
            
   <i class="fa  fa-car bg-red" style="z-index:1; color:#FFFFFF;   "></i>
   
   
              <div class="timeline-item"  style="margin-left:40px; margin-right: 0px;background-color:FFFFFF;border-radius: 15px; ">

  <span class="time" style="font-size:16px"><div style="position:absolute; margin-left:-60px; "><a  onclick="responsiveVoice.speak('<?=$music_service?><?=$pro_name_th   ?>  <? echo $service_name_th;?>', 'Thai Female', {<?=$talk_speed?>});" style="margin-left:25px; padding:5px;"><i class="fa fa-volume-up faa-pulse animated fa-4x; " style="font-size:22px; color:#666666 ; display:none" id="btn_sound_pickupplace"></i></a> </div> 
 
 
 
 
 
 <div  style="font-size:16px; margin-top:-20px; margin-left:25px;"><b>
					   
  </b>
			
		</div>
				 				
				</span>
                
 

  <h3 class="timeline-header" style="padding-top:10px; padding-bottom:5px; "><a style="color:#ED1C24">วิ่งร่วมกับเพื่อนอีก   <?=$arr[project][numcar]-1;?> คน</a></h3>
                
				<div class="timeline-body"  style="padding-top:5px; padding-bottom:5px;  "><table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td> 
<? include("mod/load/today/sub/multicar.php");?> 





 	  </td>
  </tr>
</table>
 
				
                </div>
				
				
              </div>
            </li>
            <!-- END timeline item -->
 

 
 <? } ?>
 
 
 
 
 
 
  <!-- timeline item -->
 
 
               
      
			<li  class="<? if($arr[project][driver_complete]=="1"){ ?>tab-yes-<? echo $daywork;?><? } ?><? if($arr[project][driver_complete]<>"1"){ ?>tab-no-<? echo $daywork;?><? } ?>">
            
            
   <i class="fa  fa-dashboard bg-blue" style="z-index:1; color:#FFFFFF;   "></i>
   
   
              <div class="timeline-item"  style="margin-left:40px; margin-right: 0px;background-color:FFFFFF;border-radius: 15px; ">

  <span class="time" style="font-size:16px"><div style="position:absolute; margin-left:-60px; "><a  onclick="responsiveVoice.speak('<?=$music_service?><?=$pro_name_th   ?> บริการนี้รวมถึง <? echo $service_name_th;?>', 'Thai Female', {<?=$talk_speed?>});" style="margin-left:25px; padding:5px;"><i class="fa fa-volume-up faa-pulse animated fa-4x; " style="font-size:22px; color:#666666 ; display:none" id="btn_sound_pickupplace"></i></a> </div> 
 
 
 <div  style="font-size:16px; margin-top:-20px; margin-left:25px;"><b>
					   
  </b>
			
		</div>
				 				
				</span>

  <h3 class="timeline-header" style="padding-top:10px; padding-bottom:5px; "><a>บริการนี้รวมถึง</a></h3>
                
				<div class="timeline-body"  style="padding-top:5px; padding-bottom:5px;  "><table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td> 
<? echo $service_name_th;?>





 	  </td>
  </tr>
</table>
 
				
                </div>
				
				
              </div>
            </li>
            <!-- END timeline item -->
            
            
            
            
            <!-- timeline item -->
            <li class="<? if($arr[project][driver_complete]=="1"){ ?>tab-yes-<? echo $daywork;?><? } ?><? if($arr[project][driver_complete]<>"1"){ ?>tab-no-<? echo $daywork;?><? } ?>">
              <i class="fa  fa-map-marker bg-blue" style="z-index:1; color:#FFFFFF "></i>

              <div class="timeline-item"  style="margin-left:40px; margin-right: 0px;background-color:FFFFFF;border-radius: 15px;">
 
 <? if($arr[project][product_area] == 'In'){ 
 
 	$work_area="รับเข้า";
 $music_type="รับเข้าจาก..";
  $work_f="เที่ยวบิน..".$arr[project][air]. "";
					 }
			  ?>
  
   <? if($arr[project][pickup_place]==193){  
	  
  
	   	 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$res[terminalair] = $db->select_query("SELECT id,terminal FROM airport_detail  WHERE air_name='".$arr[project][air]."' or  air_name like '%".$arr[project][air]."%'  or air_f like '%".$arr[project][air]."'   ");
$arr[terminalair] = $db->fetch($res[terminalair]);
 
if($arr[terminalair][terminal]==1){
$music_terminal="..อาคารใหม่";
} 
if($arr[terminalair][terminal]==3){
$music_terminal="..อาคารเก่า";
} 
 }
 
	  ?>
  
 
 
                <span class="time" style="font-size:16px">
				 <div style="position:absolute; margin-left:-60px; "><a  onclick="responsiveVoice.speak('<?=$music_carpart?>,ตู้ที่<?=$arr[project][carno];?>,งาน<?=$work_type?>,<?=$work_area?>,จำนวนแขก<? echo $arr[project][total];?>คน,<?=$music_type?> <? echo $arr[project][name_pickup_place] ?>  <? if($arr[project][product_area] == 'In'){ ?>	<?=$music_terminal?><? } ?>.. <? if($arr[project][product_area] == 'In'){ ?>	<? echo $work_f; ?>	 เวลา <? echo $arr[project][airin_h];?>.<? echo $arr[project][airin_m];?> น<? } ?> ', 'Thai Female', {<?=$talk_speed?>});" style="margin-left:25px; padding:5px;"><i class="fa fa-volume-up faa-pulse animated fa-4x" style="font-size:22px; color:#666666 " id="btn_sound_pickupplace"></i></a> </div>
				
				<!--------load_time_topoint------>
				

				
				<div id="load_time_topoint_<?=$arr[project][id]?>"> 
 
				 <i class="fa fa-clock-o  <? 	if($arr[project][driver_topoint]==1){ echo $spin; } ?>" style="color:<? 	if($arr[project][driver_topoint]==1){ echo $clock_color;} else {  echo $no_clock_color; }?>" ></i> 
     <div  style="font-size:16px; margin-top:-20px; margin-left:25px;">     
 
 <? 	if($arr[project][driver_topoint]==1){ ?><font color="<?=$time_color;?>"><b>
			  <? echo ThaiTimeConvert($arr[project][driver_topoint_date]- 25200,'1','short'); ?></b></font>
<? }   else { ?> </font><font style="font-size:13px "><? echo "&nbsp;ยังไม่มี"; } ?></font>			 
			</div>
 
 </div>
 
 </span>
                
                
 
                
                
 
 
 

<h3 class="timeline-header text-alert" style="padding-top:10px; padding-bottom:5px; "><div id="load_step_topoint_<?=$arr[project][id]?>" > <a id="timeline_btn_topoint_<?=$arr[project][id];?>">สถานที่รับ</a></div></h3>
                
           
				<div class="timeline-body "  style="padding-top:5px; padding-bottom:5px;  "><table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><? echo $arr[project][name_pickup_place] ?><font color="#666666"> (<? echo $arr[project][name_pickup_place_area] ?> | <? echo $arr[project][name_pickup_place_province] ?>)
	   
 
	  </td>
  </tr>
</table>

 
                </div>
	 	
                
              </div>
            </li>
 
 
			
			<?
			 if($arr[project][product_area] == 'In'){ 
			 
			 $work_airin="เที่ยวบิน".$arr[project][air]. "";
			  ?>
			   <!-- timeline item -->
            <li  class="<? if($arr[project][driver_complete]=="1"){ ?>tab-yes-<? echo $daywork;?><? } ?><? if($arr[project][driver_complete]<>"1"){ ?>tab-no-<? echo $daywork;?><? } ?>">
              <i class="fa  fa fa-plane"  style=" -webkit-transform:rotateX(180deg);
  -moz-transform:rotateX(180deg);
  -o-transform:rotateX(180deg);
  -ms-transform:rotateX(180deg); z-index:1 "></i>

              <div class="timeline-item" style="margin-left:40px; margin-right: 0px;background-color:FFFFFF;border-radius: 15px;">
                <span class="time" style="font-size:16px"> <? echo $arr[project][airin_time];?></span>

                <div class="timeline-header"  style="padding-top:10px; padding-bottom:5px; "><a ><font color="#666666">เที่ยวบิน</font></a> <B>&nbsp; 
				
				 <?  if( $arr[project][agent]=='13'){?><font color="#006699"><a   data-toggle="modal" data-target="#mysignctrip<? echo $arr[project][id];?>">(ป้าย Ctrip) <? } ?></a>
				<div id="mysignctrip<? echo $arr[project][id];?>" class="modal fade" role="dialog" style="background-color:FFFFFF;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
 
      </div>
      <div class="modal-body" >
        <img src="images/sign/ctrip.jpg"  align="absmiddle" />
      </div>
 
    </div>

  </div>
</div> 
 

				 <?  if( $arr[project][agent]<>'13'){?><font color="#006699"><a  data-toggle="modal" data-target="#mysignagent<? echo $arr[project][id];?>">(ป้าย Agent) <? } ?></a>
				
				<div id="mysignagent<? echo $arr[project][id];?>" class="modal fade" role="dialog" style="background-color:FFFFFF;">
  <div class="modal-dialog">

 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
 
      </div>
      <div class="modal-body">
        <img src="images/sign/all.jpg"  align="absmiddle" />
      </div>
 
    </div>

  </div>
</div> 

				
				
				
				
				</font>
				
				
				<? // echo $arr[project][airin_time];?></B></div>
				
				
				
				

                <div class="timeline-body"  style="padding-top:5px; padding-bottom:5px; "> <?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?>
                </div>
 
              </div>
            </li>
			<? } 
			
						if($arr[project][product_area] <> 'In'){ 
			
			$work_airin="";
			}
			
			?>
			
			
			
			
			
 
            <li  class="<? if($arr[project][driver_complete]=="1"){ ?>tab-yes-<? echo $daywork;?><? } ?><? if($arr[project][driver_complete]<>"1"){ ?>tab-no-<? echo $daywork;?><? } ?>">
              <i class="fa  fa-users bg-green"  style="z-index:1 "></i>




              <div class="timeline-item" style="margin-left:40px; margin-right: 0px;background-color:FFFFFF;border-radius: 15px">
                <span class="time" style="font-size:16px">
				<div style="position:absolute; margin-left:-60px; "><a  onclick="responsiveVoice.speak('รับแขกเวลา<? echo $arr[project][airout_h];?>.<? echo $arr[project][airout_m];?> น   จำนวนแขก<? echo $arr[project][total];?>คน', 'Thai Female', {<?=$talk_speed?>});" style="margin-left:25px; padding:5px;"><i class="fa fa-volume-up faa-pulse animated fa-4x" style="font-size:22px; color:#666666 " id="btn_sound_guest"></i></a> </div>
 
 
 <div id="load_time_pickup_<?=$arr[project][id]?>"> 
 
				<i class="fa fa-clock-o <? 	if($arr[project][driver_pickup]==1){ echo $spin; } ?>" 
				style="color:<? 	if($arr[project][driver_pickup]==1){ echo $clock_color;} else {  echo $no_clock_color; }?>" >
				
				</i> 
 
 
				        <div  style="font-size:16px; margin-top:-20px; margin-left:25px;">      
			<? 	if($arr[project][driver_pickup] > 0){ ?><font color="<?=$time_color;?>"><b>
			  <? echo ThaiTimeConvert($arr[project][driver_pickup_date]- 25200,'1','short'); ?> </b></font>
			<? }   else { ?> </font><font style="font-size:13px "><? echo "&nbsp;ยังไม่มี"; } ?></font>
 
			
				</div>
				</div>
				
				
				
				</span>

                <div class="timeline-header"  style="padding-top:10px; padding-bottom:5px; ">
                
         
       <span id="load_step_pickup_<?=$arr[project][id]?>" > <a id="timeline_btn_topoint_<?=$arr[project][id];?>">รับแขก</a></span>  
         
   
                
                
                
                <span class="font_16" style="margin-top: 2px; position:absolute "><B >&nbsp;&nbsp;<? echo $arr[project][airout_time];?></B></span>
				
				</div>
                
                
<div id="load_step_check_pickup_<?=$arr[project][id]?>"  style="display:none">

 
</div>
 
                

                <div class="timeline-body"  style="padding-top:5px; padding-bottom:5px; ">
 
				<table width="100%"  border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px; ">
  <tr>
    <td width="25" valign="top" style="margin-top:10px; "><i class="fa  fa-recycle" style="color:#999999; font-size:16px;margin-top:3px;"></i></td>
    <td valign="top" style="color:#666666;font-size:14px"><font color="#000000"> เอเย่นต์ &nbsp;<? echo $arr[showlogo][company];?> <? if($arr[showlogo][company_or]<>""){ ?>
	
	
	
	 &nbsp;<? echo $arr[showlogo][company_or];?>
	 
	 <? } ?></td>
  </tr>
</table>
				
				<table width="100%"  border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px; ">
  <tr>
    <td width="25"><i class="fa  fa-users" style="color:#999999; font-size:14px"></i></td>
    <td style="color:#666666;font-size:16px"><font color="#000000"> <?
	/*
	$arr[remark][adult]=2;
	$arr[remark][child]=1;
	$arr[remark][baby]=1;
	*/
	
	 if($arr[project][adult]>0){ ?>
	ผู้ใหญ่ : 
	<?=$arr[project][adult];?> &nbsp;
	<? } ?>
	
		<? if($arr[project][child]>0){ ?>
	 เด็ก : 
	<?=$arr[project][child];?> &nbsp;
	<? } ?>
	
	<? if($arr[project][baby]>0){ ?>
	 ทารก : 
	<?=$arr[project][baby];?> 
	<? } ?>
 </td>
  </tr>
</table>
<? if($arr[project][guest_phone]<>''){?>   
<table width="100%"  border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px; ">
  <tr>
    <td width="25"><i class="fa  fa-phone" style="color:#999999; font-size:16px"></i></td>
    <td style="color:#666666;font-size:16px"><b><?=$arr[project][guest_phone];?>
 </b></td>
  </tr>
</table>

				<? } ?>
 
				<?=$arr[project][guest_name]?>
                </div>
 
              </div>
            </li>
            
            
            
            
            
            
            
            
            
            
 
			<? $music_type="ส่งที่..";
			?>
			 <? if($arr[project][to_place]==193){  
	  
  
	   	 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$res[terminalair] = $db->select_query("SELECT id,terminal FROM airport_detail  WHERE air_name='".$arr[project][air]."' or  air_name like '%".$arr[project][air]."%'  or air_f like '%".$arr[project][air]."'   ");
$arr[terminalair] = $db->fetch($res[terminalair]);
 
if($arr[terminalair][terminal]==1){
$music_terminal="..อาคารใหม่";
} 
if($arr[terminalair][terminal]==3){
$music_terminal="..อาคารเก่า";
} 
 }
 
	  ?>
			
            <li class="<? if($arr[project][driver_complete]=="1"){ ?>tab-yes-<? echo $daywork;?><? } ?><? if($arr[project][driver_complete]<>"1"){ ?>tab-no-<? echo $daywork;?><? } ?>">
  <i class="fa fa-map-marker bg-blue"  style="z-index:1 "></i></i>

              <div class="timeline-item" style="margin-left:40px; margin-right: 0px;background-color:FFFFFF;border-radius: 15px;">
                <span class="time" style="font-size:16px">
				<div style="position:absolute; margin-left:-60px; "><a  onclick="responsiveVoice.speak('<?=$music_type?>.  <? echo $arr[project][name_to_place] ?><? if($arr[project][product_area] == 'Out'){ ?>	<?=$music_terminal?><? } ?>.. <? if($arr[project][product_area] == 'Out'){ ?>	<? echo $work_f; ?>	 เวลา <? echo $arr[project][airin_h];?>.<? echo $arr[project][airin_m];?> น<? } ?>', 'Thai Female', {<?=$talk_speed?>});" style="margin-left:25px; padding:5px;"><i class="fa fa-volume-up faa-pulse animated fa-4x" style="font-size:22px; color:#666666 " id="btn_sound_toplace"></i></a> </div>
 
  <div id="load_time_complete_<?=$arr[project][id]?>"> 
 
 
				<i class="fa fa-clock-o <? 	if($arr[project][driver_complete]==1){ echo $spin; } ?>" style="color:<? 	if($arr[project][driver_complete]==1){ echo $clock_color;} else {  echo $no_clock_color; }?>"></i>   
				
				  <div  style="font-size:16px; margin-top:-20px; margin-left:25px;">
				<? 	if($arr[project][driver_complete]==1){ ?><font color="<?=$time_color;?>"><b>
			  <? echo ThaiTimeConvert($arr[project][driver_complete_date]- 25200,'1','short'); ?> </b>
			<? }   else { ?> </font><font style="font-size:13px "><? echo "&nbsp;ยังไม่มี"; } ?></font>
			</div>
			</div>
 
			
			</span>

                <h3 class="timeline-header"  style="padding-top:10px; padding-bottom:5px; "><div id="load_step_complete_<?=$arr[project][id]?>" > <a id="timeline_btn_complete_<?=$arr[project][id];?>">ถึงสถานที่ส่ง</a></div></h3>

                <div class="timeline-body"  style="padding-top:5px; padding-bottom:5px; ">
							
							

				<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><? echo $arr[project][name_to_place] ?><font color="#666666">&nbsp;(<? echo $arr[project][name_to_place_area] ?> | <? echo $arr[project][name_to_place_province] ?>)
	
	<? if($arr[project][name_to_place]=='Phuket Airport'){   ?>
<br />
<font color="#FF0000">อาคารผู้โดยสารใหม่

<?
	   
 
 }
 
	  ?>
				
	  
	 
	  
	  
 
	    
	  
	  
	  
	  </td>
  </tr>
</table> 


                </div>
 
              </div>
            </li>
 
			
			<? if($arr[project][product_area] == 'Out'){  
 
			
			  $work_airout="เที่ยวบิน".$arr[project][air]. "";
			
			?>
		 
            <li  class="<? if($arr[project][driver_complete]=="1"){ ?>tab-yes-<? echo $daywork;?><? } ?><? if($arr[project][driver_complete]<>"1"){ ?>tab-no-<? echo $daywork;?><? } ?>">
              <i class="fa  fa fa-plane"  style="z-index:1 "></i>

              <div class="timeline-item" style="margin-left:40px; margin-right: 0px;background-color:FFFFFF;border-radius: 15px;">
                <span class="time" style="font-size:16px">  <? echo $arr[project][airin_time];?></span>

                <div class="timeline-header"  style="padding-top:10px; padding-bottom:5px; "><a  id="timeline_button_air_<?=$arr[project][id]?>"><font color="#666666">เที่ยวบิน</font></a> <B></B></div>
                
                
        <?  $arr[project][air];
		
	//	$arr[project][air]='FD3006';
		
		?>        
 <script>
 $('#timeline_button_air_<?=$arr[project][id]?>').click(function(){  
 

//////




///////////
$( "#popup_work_preview_air_timeline" ).toggle();

//$('#tab_to_<?=$_POST[data_id]?>').removeClass("tab_alert");
//$('#load_work_preview_map_timeline').addClass("map-page-loader");

 $("#head_full_popup_air_timeline").html('เที่ยวบิน&nbsp;<? echo $arr[project][air];?>');
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  
 ///$("#load_work_preview_map_timeline").html('<iframe width="100%"  height="100%"  frameborder="0" style="border:0"  src="https://maps.google.com/maps?q=<?=$data_lat?>,<?=$data_lng?>&z=15&output=embed&key=<?=$google_api?>"></iframe>');
  
$("#load_work_preview_air_timeline").html('<iframe width="100%"  height="100%"  frameborder="0" style="border:0;margin-top: 0px"   src="https://www.airportia.com/flights/<? echo $arr[project][air];?>" allowfullscreen></iframe>');

//  $("#load_work_preview_air_timeline").html('<iframe src="load/map.php?map=<? echo $arr[project][air];?>" width="100%"  height="100%"  frameborder="0" style="border:0"></iframe>');
  
    // $("#load_work_preview_air_timeline").load('https://www.google.co.th/search?q=fd3006');
 
 
 

});




 
 </script>
   

                <div class="timeline-body"  style="padding-top:5px; padding-bottom:5px; text-transform:uppercase "> <? echo $arr[project][air];?> / <? echo $arr[project][airin_time];?>
                </div>
 
              </div>
            </li>
			<? }
			
			 
			
			 ?>
			 
  
			
			
			 
			
			<? if(1 == '1'){  
			
			//// $arr[project][driver_complete] == '1'
			
			  $work_airout="เที่ยวบิน".$arr[project][air]. "";
			  
			  if($arr[project][driver_pickup]  > '0'){ 
			  
			  $price_color="#333333";
			  $price_text="ชำระแล้ว";
			  }
			  
			 if($arr[project][driver_pickup]  < '1'){ 
			    $price_color="#DE0B0B";
				 $price_text="ค้างชำระ";
				
			  }
			
			?>
			   <!-- timeline item -->
         	
			
 
            <li  class="<? if($arr[project][driver_checkcar]=="1"){ ?>tab-yes-<? echo $daywork;?><? } ?><? if($arr[project][driver_checkcar]<>"1"){ ?>tab-no-<? echo $daywork;?><? } ?>">
              <i class="fa  fa-briefcase bg-green"  style="z-index:1 "></i>




              <div class="timeline-item" style="margin-left:40px; margin-right: 0px;background-color:FFFFFF;border-radius: 15px">
                <span class="time" style="font-size:16px">
				<div style="position:absolute; margin-left:-60px; "><a  onclick="responsiveVoice.speak('รับแขกเวลา<? echo $arr[project][airout_h];?>.<? echo $arr[project][airout_m];?> น   จำนวนแขก<? echo $arr[project][total];?>คน', 'Thai Female', {<?=$talk_speed?>});" style="margin-left:25px; padding:5px;"><i class="fa fa-volume-up faa-pulse animated fa-4x" style="font-size:22px; color:#666666 " id="btn_sound_guest"></i></a> </div>
 
 
 <div id="load_time_checkcar_<?=$arr[project][id]?>"> 
 
				<i class="fa fa-clock-o <? 	if($arr[project][driver_checkcar]==1){ echo $spin; } ?>" 
				style="color:<? 	if($arr[project][driver_checkcar]==1){ echo $clock_color;} else {  echo $no_clock_color; }?>" >
				
				</i> 
 
 
				        <div  style="font-size:16px; margin-top:-20px; margin-left:25px;">      
			<? 	if($arr[project][driver_pickup] > 0){ ?><font color="<?=$time_color;?>"><b>
			  <? echo ThaiTimeConvert($arr[project][driver_pickup_date]- 25200,'1','short'); ?> </b></font>
			<? }   else { ?> </font><font style="font-size:13px "><? echo "&nbsp;ยังไม่มี"; } ?></font>
 
			
				</div>
				</div>
				
				
				
				</span>

                <div class="timeline-header"  style="padding-top:10px; padding-bottom:5px; "><span id="load_step_checkcar_<?=$arr[project][id]?>" > <a id="timeline_btn_checkcar_<?=$arr[project][id];?>">ถึงสถานที่ส่ง</a></span><span class="font_16" style="margin-top: 2px; position:absolute "></span>
				
				</div>

                <div class="timeline-body"  style="padding-top:5px; padding-bottom:5px; display:none ">
 
		 
				 
<? if($arr[project][guest_phone]<>''){?>   
 

				<? } ?>
 
				<? ///=$arr[project][guest_name]?>
                </div>
 
              </div>
            </li>
            
            
            
            
            
            
            
               <!-- timeline item -->
            <li class="<? if($arr[project][driver_complete]=="1"){ ?>tab-yes-<? echo $daywork;?><? } ?><? if($arr[project][driver_complete]<>"1"){ ?>tab-no-<? echo $daywork;?><? } ?>" >
              <i class="fa fa-thumbs-up bg-green"  style="z-index:1; background-color:#FF6600 "></i>
              <div class="timeline-item" style="margin-left:40px; margin-right: 0px;background-color:FFFFFF;border-radius: 15px;" id="show_price_<?= $arr[project][id];?>">
 
                <span class="time" style="font-size:24px; color:<?=$price_color?>; margin-top:-5px"> <b> <?=number_format( $arr[project][car_price]+0 , 0 );?></b></span><span style="position:absolute;   right:80px; margin-top:8px "><a  onclick="responsiveVoice.speak('ค่าเที่ยว,<?= $arr[project][car_price];?> บาท ,  ขอบคุณค่ะ', 'Thai Female', {<?=$talk_speed?>});" style="margin-left:25px; padding:5px;"><i class="fa fa-volume-up faa-pulse animated fa-4x" style="font-size:22px; color:#666666 " id="btn_sound_price"></i></a> </span> 


                <div class="timeline-header"  style="padding-top:10px; padding-bottom:5px; " >
 
				<font color="#666666" style="font-size:16px"><a >ค่าเที่ยว</a></font> <B></B> &nbsp;<font color="<?=$price_color?>"  style="font-size:16px; margin-top:-25px;"><?=$price_text?>&nbsp;</font >
 
				</div>
 
         </div>
            </li>
            
            
            
            
            
            
            
            
			<? }
			
			 
			
			 ?>
   
 
 
 
    
            <li style="margin-bottom:-30px; " >
              <i></i>
            </li>
			
          </ul>
          
          
          
          
          
          
          
          
 
 <script >
 
  	var load_time_topoint_<?=$arr[project][id]?> = "load_small.php?name=load/today/sub&file=time&sv=<?=$_GET[sv];?>&bookid=<?=$arr[project][id];?>&type=driver_topoint&driver_topoint=<?=$arr[project][driver_topoint];?>&driver_topoint_date=<?=$arr[project][driver_topoint_date];?>";
 $('#load_time_topoint_<?=$arr[project][id]?>').load(load_time_topoint_<?=$arr[project][id]?>);
 
   </script>
   
   <script >
 
  	var load_time_pickup_<?=$arr[project][id]?> = "load_small.php?name=load/today/sub&file=time&sv=<?=$_GET[sv];?>&bookid=<?=$arr[project][id];?>&type=driver_pickup&driver_pickup=<?=$arr[project][driver_pickup];?>&driver_pickup_date=<?=$arr[project][driver_pickup_date];?>";
 $('#load_time_pickup_<?=$arr[project][id]?>').load(load_time_pickup_<?=$arr[project][id]?>);
 
   </script>
   
   
   
   <script >
 
  	var load_time_complete_<?=$arr[project][id]?> = "load_small.php?name=load/today/sub&file=time&sv=<?=$_GET[sv];?>&bookid=<?=$arr[project][id];?>&type=driver_complete&driver_complete=<?=$arr[project][driver_complete];?>&driver_complete_date=<?=$arr[project][driver_complete_date];?>";
 $('#load_time_complete_<?=$arr[project][id]?>').load(load_time_complete_<?=$arr[project][id]?>);
 
   </script>
   
   
      <script >
 
  	var load_time_checkcar_<?=$arr[project][id]?> = "load_small.php?name=load/today/sub&file=time&sv=<?=$_GET[sv];?>&bookid=<?=$arr[project][id];?>&type=driver_checkcar&driver_checkcar=<?=$arr[project][driver_checkcar];?>&driver_checkcar_date=<?=$arr[project][driver_checkcar_date];?>";
 $('#load_time_checkcar_<?=$arr[project][id]?>').load(load_time_checkcar_<?=$arr[project][id]?>);
 
   </script>
   
 
   
 <script >
 
  	var load_show_price_<?=$arr[project][id]?> = "load_small.php?name=load/today/sub&file=price&driver_price=<?=$arr[project][driver_pickup];?>&id=<?=$arr[project][id];?>&price=<?=$arr[project][car_price];?>";
 $('#show_price_<?=$arr[project][id]?>').load(load_show_price_<?=$arr[project][id]?>);
 
   </script>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
 <script >
 
  	var load_step_topoint_<?=$arr[project][id]?> = "load_small.php?name=load/today/sub&file=step&sv=<?=$_GET[sv];?>&bookid=<?=$arr[project][id];?>&type=driver_topoint&status=<?=$arr[project][driver_topoint];?>&driver_topoint_date=<?=$arr[project][driver_topoint_date];?>";
 $('#load_step_topoint_<?=$arr[project][id]?>').load(load_step_topoint_<?=$arr[project][id]?>);
 
   </script>
   
   <script >
 
  	var load_step_pickup_<?=$arr[project][id]?> = "load_small.php?name=load/today/sub&file=step&sv=<?=$_GET[sv];?>&bookid=<?=$arr[project][id];?>&type=driver_pickup&status=<?=$arr[project][driver_pickup];?>&driver_pickup_date=<?=$arr[project][driver_pickup_date];?>";
 $('#load_step_pickup_<?=$arr[project][id]?>').load(load_step_pickup_<?=$arr[project][id]?>);
 
   </script>
   
   
      <script >
 
  	var load_step_check_pickup_<?=$arr[project][id]?> = "load_small.php?name=load/today/sub&file=step_guest&sv=<?=$_GET[sv];?>&bookid=<?=$arr[project][id];?>&type=driver_pickup&status=<?=$arr[project][driver_pickup];?>&driver_pickup_date=<?=$arr[project][driver_pickup_date];?>";
 $('#load_step_check_pickup_<?=$arr[project][id]?>').load(load_step_check_pickup_<?=$arr[project][id]?>);
 
   </script>
   
   
   
   <script >
 
  	var load_step_complete_<?=$arr[project][id]?> = "load_small.php?name=load/today/sub&file=step&sv=<?=$_GET[sv];?>&bookid=<?=$arr[project][id];?>&type=driver_complete&status=<?=$arr[project][driver_complete];?>&driver_complete_date=<?=$arr[project][driver_complete_date];?>&daytype=<?=$_GET[daytype]?>&day=<?=$transfer_date_show;?>";
 $('#load_step_complete_<?=$arr[project][id]?>').load(load_step_complete_<?=$arr[project][id]?>);
 
   </script>
   
   
      <script >
 
  	var load_step_checkcar_<?=$arr[project][id]?> = "load_small.php?name=load/today/sub&file=step&sv=<?=$_GET[sv];?>&bookid=<?=$arr[project][id];?>&type=driver_checkcar&status=<?=$arr[project][driver_checkcar];?>&driver_checkcar_date=<?=$arr[project][driver_checkcar_date];?>&daytype=<?=$_GET[daytype]?>&day=<?=$transfer_date_show;?>";
 $('#load_step_checkcar_<?=$arr[project][id]?>').load(load_step_checkcar_<?=$arr[project][id]?>);
 
   </script>
   
   
   
 
   
      <script >
	  
	  /*
 
  	var load_show_price_<?=$arr[project][id]?> = "load_small.php?name=load/today/sub&file=price&driver_price=<?=$arr[project][driver_pickup];?>&id=<?=$arr[project][id];?>&price=<?=$arr[project][car_price];?>";
 $('#show_price_<?=$arr[project][id]?>').load(load_show_price_<?=$arr[project][id]?>);
 */
   </script>
   
   
   
   
   
   
				

<?
$i++;	
}
$db->closedb ();
?>  </div>  
 
			
 <style>
 body {
	background-color: #f6f6f6;
}
 
 </style>
 <?   ///include "load/loading/page_sub.php" ; ?> 