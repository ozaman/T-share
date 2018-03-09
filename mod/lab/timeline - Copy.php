 <? 
 $clock_color="#009999;font-size:26px";
  $no_clock_color="#999999;font-size:26px";
  $time_color="#009999";
  $spin=" fa-spin 2x";
 ?>
 
 
 <style type="text/css">
<!--
.topictransfer { padding-top:10px; font-size:16px;  font-weight:normal; color: <?=$main_color?> ; 
 
}
.style1 {font-size: 16px}
.style2 {font-size: 16}
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
 //echo $_SESSION['data_user_name'];
//  echo $_GET[server];


?>
 
 <?
 
 
if($_GET[find]=="day"){
 $daywork= $_GET[day];
}


if($_GET[find]=="guest"){
$findwork= "and guest_name like '%".$_POST[guest]."%'";
}

if($_GET[find]=="phone"){
$findwork= "and guest_phone like '%".$_POST[phone]."%'";
}

if($_GET[find]=="plane"){
$findwork= "and air like '%".$_POST[plane]."%'";
}

if($_GET[find]=="vc"){
$findwork= "and invoice like '%".$_POST[invoice]."%'";
}



//if($_GET[find]=="company"){

if($_POST[part]=='all'){
$findpart= "and agent > 0";
}
if($_POST[part]=='golden'){
$findpart= "and agent <> 13 and cartype<>2 ";
}
if($_POST[part]=='ctrip'){
$findpart= "and agent = 13 and cartype<>2 ";
}

if($_POST[part]=='join'){
$findpart= "and agent > 0 and cartype=2 ";
}

// }
 $daywork= $_GET[day];
 
 

////echo $findpart;
  
 
$select_order="id,invoice,program,orderid,pickup_place,to_place,carno,cartype,drivername,air,airin_time,airout_h,airout_m,airout_time,driver_remark,total,guest_name,guest_phone,server";
$admincompany="1";
$agent="13";
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
		mysql_query("SET NAMES UFT8"); 
		mysql_query("SET character_set_results=utf-8"); 
$res[project] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."  where id > 0  $findpart  and admin_company =1  and transfer_date='". $daywork."'  and status = 'CONFIRM'  and airout_time <>''  and carno >0 and drivername > 0  $findwork  group by invoice order by  airout_time ASC limit  10 ");
//  $res[project] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."  where drivername='".$user_id."' and transfer_date='". $daywork."'   order by  airout_time ASC  ");
$rows[project] = $db->rows($res[project]);

if($rows[project]){	
}else{
	$rows[project] = 0;
}

/// map th

/// map cn


 
$row_no = $db->num_rows(TB_transfer_report_all,"id","drivername='".$user_id."' and transfer_date='".$daywork."' and status = 'CONFIRM' and driver_complete  ='0' group by driver_complete,invoice order by driver_complete desc   ");
$row_yes = $db->num_rows(TB_transfer_report_all,"id","drivername='".$user_id."' and transfer_date='".$daywork."' and status = 'CONFIRM' and driver_complete  ='1' group by driver_complete,invoice order by driver_complete desc ");
 
?>
 
 
 <div class="row" style="height:auto; padding:0px; margin-right:-10px; ">
				 
<?

$i=1;
while($arr[project] = $db->fetch($res[project])){



$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

if ($arr[project][server]=='th'){
$res[gg_map] = $db->select_query("SELECT id,map,transferplace_type,star FROM ".TB_transferplace_new."  ");
} 
if ($arr[project][server]=='cn'){
$res[gg_map] = $db->select_query("SELECT id,map,transferplace_type,star FROM ".TB_transferplace_cn_new."  ");
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
$res[gg_map] = $db->select_query("SELECT id,topic,province,amphur FROM ".TB_transferplace_cn."  ");
}
 while($arr[gg_map] = $db->fetch($res[gg_map])){
		$arr_t_topic[$arr[gg_map][id]] = $arr[gg_map][topic];
		$arr_t_province[$arr[gg_map][id]] = $arr[gg_map][province];
		$arr_t_amphur[$arr[gg_map][id]] = $arr[gg_map][amphur];
	}
 
 
	 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[product] = $db->select_query("SELECT cartype,area,admin_company,topic_en,topic_th FROM web_transferproduct WHERE id='".$arr[project][program]."' ");
	$arr[product] = $db->fetch($res[product]);
  
	$res[place] = $db->select_query("SELECT topic FROM ".TB_transferplace." WHERE id='".$arr[project][pickup_place]."' ");
	$arr[place] = $db->fetch($res[place]);
	$res[to] = $db->select_query("SELECT topic FROM ".TB_transferplace." WHERE id='".$arr[project][to_place]."' ");
	$arr[to] = $db->fetch($res[to]);
	
		$res[showlogo] = $db->select_query("SELECT id,company,company_or FROM ".TB_admin." WHERE id='".$arr[project][agent]."' ");
	$arr[showlogo] = $db->fetch($res[showlogo]);
	
			$res[drivername] = $db->select_query("SELECT id,nickname,post_date FROM ".TB_driver." WHERE id='".$arr[project][drivername]."' ");
	$arr[drivername] = $db->fetch($res[drivername]);
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

<span class="font_35" style="font-size:28px; margin-left:15px; width:100%; background-color: #FC9A35; color:#FFFFFF;box-shadow: 1px 1px 5px #999999; border:1px solid #EAD0B6; "><table width="100%"  border="0" cellspacing="1" cellpadding="1" >
  <tr>
    <td width="100" style="font-size:28px; margin-left:15px;  color:#FFFFFF "><b><center><? echo $daywork;   ?></b></td>
  </tr>
</table><center>
 </center>
              </span>   
			  <? $row_all=$row_no+$row_yes?>
			  <div style="margin-top:15px; margin-left:5px; margin-bottom:-10px; "><center>
			  <a class="btn btn-app" style="padding:5px; height:35px; width:29%;font-size:18px; " id="btn-all-<? echo $daywork;?>" >
                <span class="badge" style="border-radius: 25px;padding:5px; height:25px; width:25px; padding-top:3px; font-size:18px;border:1px solid #FFFFFF; "><b><?=$row_all?></b></span>
        <b> ทั้งหมด</b>
              </a>   <a class="btn btn-app" style="padding:5px; height:35px;width:29%;font-size:18px;			  
			  <? if($row_no>0 and $row_no<>$row_all){?> color:#E33621 <? } ?> <? if($row_no==$row_all){?> background-color:DD4B39;color:#FFFFFF <? } ?>  
			  ">
                <span class="badge bg-red" style="border-radius: 25px;padding:5px; height:25px; width:25px; padding-top:3px; font-size:18px;border:1px solid #FFFFFF; " ><b><?=$row_no?></b></span>
      <b>   ไม่สำเร็จ</b>
              </a>   <a class="btn btn-app" style="padding:5px; height:35px; width:29%; font-size:18px;  
			    <? if($row_yes>0 and $row_yes<>$row_all){?> color:#0B9191 <? } ?>    <? if($row_yes>0 and $row_yes==$row_all){?> background-color:1CC1A4;color:#FFFFFF <? } ?>  
			  ">
                <span class="badge bg-green" style="border-radius: 25px;padding:5px; height:25px; width:25px; padding-top:3px; font-size:18px;border:1px solid #FFFFFF; "><b><?=$row_yes?></b></span>
     <b>    สำเร็จ</b>
              </a>  
			</center>  
 
			</div>
			  
			  
			  
            </li>
		   <script>
 $("#btn-all-<? echo $daywork;?>").click(function(){
// alert(55);
 $('.<? echo $daywork;?>').hide(); 

});
 
			</script>
			<? } ?>
			
 
			<?
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$rowcar = $db->num_rows(TB_transfer_report_all,"id","transfer_date='".$daywork."' and carno=".$arr[project][carno]." and status = 'CONFIRM'  ");
			
			?>
 
            <!-- timeline item -->
            <li style="margin-top: -5px; margin-left:0px;"  >
              
              <div class="timeline-item" style="margin-left:40px;  margin-right: 0px; margin-top:10px;box-shadow: 0px -5px 10px #B4B4B4;" > 
			  
			  
			  
             
<? if($i==1){?>

 
             <table width="100%" border="0" cellspacing="2" cellpadding="2" style="margin-top: 20px ">
			 <? } ?>
			 
			 <? if($i<>1){?>
             <table width="100%" border="0" cellspacing="2" cellpadding="2" style="margin-top: 30px; height:40px; ">
			 <? } ?>
   <tr>
    <td width="40"  style="background-color:#F6F6F6 ">
		<a  rel="external" href="?name=view&file=show&id=<?=$arr[project][id];?>&day=<?=$daywork;?>&carno=<?=$arr[project][carno];?>&cartype=<?= $arr[product][cartype];?>&car_list=<?=$i;?>&sv=<?=$arr[project][server];?>">
	
	<div class="cirnumbershow<? 	if(1=="1"){ ?>ok<? } ?>" id="cir_<?=$arr[project][invoice];?>"  ><table width="100%"  border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td style="font-size:24px; color:#FFFFFF; font-weight:bold "><center><?=$arr[project][carno];?></center><? //=$arr[project][server];?></td>
  </tr>
</table>
</div> 

</a>


</td>
    <td width="80" height="30" style="background-color:#F3F3F3; padding-top:5px;   ">
		
	
	
	<? if($arr[product][cartype] == 2){  
	
	$work_type="จอย";
	
	?>
      <table width="100%"  border="0" cellspacing="0" cellpadding="0" >
        <tr>
           <td style="font-size:24px ; color:#009999; color:#444444; color:#006699  "><i class="fa fa-users"></i></td>
          <td  style="font-size:16px ; font-weight:bold; margin-left:-10px;">จอย </td>
        </tr>
      </table>
      <? }else{ 
	  $work_type="ไพรเวท";
	  
	  ?>
      <table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td style="font-size:26px ; color:#009999; color:#444444;"><i class="fa fa-user"></i></td>
          <td  style="font-size:16px ; font-weight:bold">ไพรเวท</td>
        </tr>
      </table>
    <? } ?></td>
    <td valign="middle" style="font-size:16px ; font-weight:bold; padding-top:5px;"> 
	
						<? if($arr[product][area] == 'In'){ 
						$work_area="รับเข้า";
						
						?> 
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr> 
 <td style="font-size:26px ; color: #3399CC; color:#444444  " width="35">&nbsp;<i class="fa   fa-plane " style=" -webkit-transform:rotateX(180deg);
  -moz-transform:rotateX(180deg);
  -o-transform:rotateX(180deg);
  -ms-transform:rotateX(180deg); "></i></td>
    <td style="font-size:16px ; font-weight:bold">&nbsp;รับเข้า</td>
  </tr>
</table>  
						  
						 
						   
						   <?  } elseif($arr[product][area] == 'Out'){
						   $work_area="ส่งออก";
						    ?>
						   
						   <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr> 
 <td style="font-size:26px ;color: #3399CC; color:#444444  " width="35">&nbsp;<i class="fa   fa-plane "></i></td>
    <td style="font-size:16px ; font-weight:bold">&nbsp;ส่งออก</td>
  </tr>
</table>  
 
						  
	 <? }elseif($arr[product][area] == 'Point'){ 
	 
	  $work_area="พ้อยท์ทูพ้อยท์";
	 ?>  
						<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr> 
 <td style="font-size:26px ; color: #3399CC; color:#444444  " width="35">&nbsp;<i class="fa   fa-share-alt"></i></td>
    <td style="font-size:16px ; font-weight:bold">&nbsp;พ้อยท์ทูพ้อยท์</td>
  </tr>
</table>  
						  
						   <? }else{ 
						   $work_area="เซอร์วิส";
						   
						   ?> 
												<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr> 
 <td style="font-size:22px ; color: #3399CC; color:#444444 " width="35">&nbsp;<i class="fa  fa-taxi"></i></td>
    <td style="font-size:16px ; font-weight:bold">&nbsp;เซอร์วิส</td>
  </tr>
</table>
						
						   <? } ?> </td>
						<?
						/*
						if( $arr[project][server] == 'cn'){
	$link_vc = "http://www.t-bookingcn.com/";
	$db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

$res[remark] = $db->select_query("SELECT id,remark,adult,child,baby,admin_company FROM ".TB_order."  where invoice='".$arr[project][invoice]."'  ");
 $arr[remark] = $db->fetch($res[remark]);
}else{
	$link_vc = "http://www.t-booking.com/";
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

$res[remark] = $db->select_query("SELECT  id,remark,adult,child,baby,admin_company FROM  ".TB_order."  where invoice='".$arr[project][invoice]."'  ");
$arr[remark] = $db->fetch($res[remark]);
}
*/
						?>   
						
			
			<? 
			 
			if($arr[project][agent]=='13' and  $arr[product][cartype] <>'2'){
			$carpart="Ctrip";			
			}
				if($arr[project][agent]=='13' and  $arr[product][cartype] =='2'){
			$carpart="Join";			
			}
			
			if($arr[project][agent]<>'13' and  $arr[product][cartype] <>'2'){
			$carpart="Golden";			
			}
				if($arr[project][agent]<>'13' and  $arr[product][cartype] =='2'){
			$carpart="Join";			
			}
			/*
			if($arr[remark][admin_company]<>'1' and  $arr[product][cartype] <>'2'){
			$carpart="Private";			
			}
			 
			*/
			?>

  <td width="50" valign="middle" style="font-size:16px ; font-weight:bold; padding-top:5px; padding-right:5px;">  <a href="<?=$link_vc;?>/print.php?name=admin/voucher&file=transfer&no=<? echo $arr[project][vc_id];?>&order=<? echo $arr[project][orderid];?>&code=<? echo $arr[project][vc_code];?>" target="_blank"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:22px ; color: #3399CC; color:#444444 " width="35">&nbsp;<i class="fa  fa-search-plus"></i></td>
        <td style="font-size:16px ; font-weight:bold">&nbsp;ดู</td>
      </tr>
    </table></a></td>
   </tr>
</table>
             



<div class="btn-startwork" ><?echo $arr[project][airout_time];?>&nbsp;&nbsp; จัดการงาน  <font  color="#FFFF66">    </font></div> 
 
 <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><? // echo $arr[project][cartype];?>
	
<div  style="margin-top:25px; font-size:22px; font-weight:bold;   padding:10px; margin-right:18px;  width:100%; ">

<select name="drivername"  onchange="img_driver('<?=$name;?>',this.value)" id="drivername<?=$_GET[data_for]?>"  class="chosen-selects"  style="font-size:22px; padding-bottom: 1px; background-color:#FFFDE9; height:40px; width:100%;" chosen width="'100%'">
                      <option value="" selected="selected">-- กรุณาเลือก --</option>
                      <?
                      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                      $res[category] = $db->select_query("SELECT * FROM ".TB_driver." where id > 0 and status=1    and nickname<>'' and company<>'' ORDER BY abs(company) asc, convert(nickname using tis620)  desc");
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
 </div>
	<div  style="margin-top:0px; font-size:22px; font-weight:bold;  padding:0PX; margin-right:18px; height: 50px;">
  <select name="drivername[]"  onchange="img_driver('<?=$name;?>',this.value)" id="drivername<?=$_GET[data_for]?>"  class="form-control"  style="font-size:36px; padding-bottom: 0px; background-color:#FFFDE9;height: 56px;">
                      <option value=""  >-- กรุณาเลือก --</option>
                      <?
                      ///$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
		mysql_query("SET NAMES UFT8"); 
		mysql_query("SET character_set_results=utf-8"); 
$res[work] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."   where id > 0  $findpart  and admin_company =1   and transfer_date='". $daywork."'  and status = 'CONFIRM'  and airout_time <>'' and  carno >0 and drivername > 0  $findwork  order by  carno,airout_time ASC limit 1000 ");
while ($arr[work] = $db->fetch($res[work])){

	//$res[company] = $db->select_query("SELECT id,company FROM web_admin where id='".$arr[category][company]."'   ");
  //  $arr[company] = $db->fetch($res[company]);
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
	   echo "<option value=\"".$arr[category][id]."\"";
	   if($arr[work][carno] == $arr[project][carno]){echo " Selected";}
	   echo ">".$carpart." ".$arr[work][carno]."    </option>";
	   }
                      $db->closedb ();
                      ?>
  </select>
  
    </div></td>
    <td width="100"><div id="img_driver_<?=$arr[project][id];?>" style="margin-top:25px; ">
                        <?
 $filename = "../../admin/file/driver/pic/" . $arr[drivername][post_date] . ".jpg";
if(file_exists($filename)) {

$file_exists = 1;  
}else{
	$url = "http://t-booking.com/admin/file/driver/pic/" . $arr[drivername][post_date] . ".jpg";

$response = get_headers($url, 1);
$file_exists = (strpos($response[0], "404") === false);  
}	
                      
                       // if(file_exists($file_exists)) {
                        if($file_exists) {
                          // Ǩͺ
                          ?>              
                          
    <img src="../../admin/file/driver/pic/<?=$arr[drivername][post_date];?>.jpg"  width="80"   border="0"  class="IMGSHOP"   />
                          <?
                        }
                        else {
                          ?>              
                          <img src="admin/file/driver/pic/no.jpg"  width="80" border="0"  class="IMGSHOP"   />
    <?
                        } ?> </div></td>
  </tr>
</table>






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
				<div  style="margin-top:2px; font-size:22px; font-weight:bold; background-color:#F6F6F6; padding:5PX; padding-left:17px; display:none "><?=$carpart?>&nbsp;&nbsp;<?=$arr[project][carno];?></div>
				
				
  <div  style="margin-top:0px; font-size:16px; font-weight:normal; padding:5PX ; padding-left:17px; "><?=$arr[product][topic_en] ?></div>
                </div>
 
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li style="display:none " class="show_pickupplace">
              <i class="fa  fa-map-marker bg-blue" style="z-index:1; color:#FFFFFF "></i>

              <div class="timeline-item"  style="margin-left:40px; margin-right: 0px;background-color:FFFFFF;">
                <span class="time" style="font-size:16px"><i class="fa fa-clock-o  <? 	if($arr[project][driver_topoint_date]<>""){ echo $spin; } ?>" style="color:<? 	if($arr[project][driver_topoint_date]<>""){ echo $clock_color;} else {  echo $no_clock_color; }?>" ></i> 
				       <div  style="font-size:16px; margin-top:-22px; margin-left:25px;">     
					   
					 
							<? 	if($arr[project][driver_topoint_date]<>""){ ?><font color="<?=$time_color;?>"><b>
			  <? echo ThaiTimeConvert($arr[project][driver_topoint_date]- 25200,'1','short'); ?></b></font>
<? }   else { ?> </font><font style="font-size:13px "><? echo "&nbsp;ยังไม่มี"; } ?></font>			 
			
			</div>
				 
				</span>

                <h3 class="timeline-header" style="padding-top:10px; padding-bottom:5px; "><a>สถานที่รับ</a></h3>
				<div class="timeline-body"  style="padding-top:5px; padding-bottom:5px;  "><table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><? if($arr_t_topic[$arr[project][pickup_place]] != ''){ ?>
                                   <? echo $arr_t_topic[$arr[project][pickup_place]];?> (
                                   <?=$arr_t_province[$arr[project][pickup_place]];?>
      /
      <?=$arr_t_amphur[$arr[project][pickup_place]];?>
      )
      <? } ?></td>
  </tr>
</table>

				
				

				
                </div>
				
				
              </div>
            </li>
 
			
            <!-- END timeline item -->
			
			<?
			 if($arr[product][area] == 'In'){ 
			 
			 $work_airin="เที่ยวบิน".$arr[project][air]. "";
			  ?>
			   <!-- timeline item -->
            <li style="display:nones " class="show_air_in">
              <i class="fa  fa fa-plane"  style=" -webkit-transform:rotateX(180deg);
  -moz-transform:rotateX(180deg);
  -o-transform:rotateX(180deg);
  -ms-transform:rotateX(180deg); z-index:1 "></i>

              <div class="timeline-item" style="margin-left:40px; margin-right: 0px;background-color:FFFFFF;">
                <span class="time" style="font-size:16px"> <? echo $arr[project][airin_time];?></span>

                <div class="timeline-header"  style="padding-top:10px; padding-bottom:5px; "><a ><font color="#666666">เที่ยวบิน</font></a> <B><? // echo $arr[project][airin_time];?></B></div>

                <div class="timeline-body"  style="padding-top:5px; padding-bottom:5px; "> <?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?>
                </div>
				

				
				
 
              </div>
            </li>
			<? } 
			
						if($arr[product][area] <> 'In'){ 
			
			$work_airin="";
			}
			
			?>
			
			
			
			
			
            <!-- timeline item -->
            <li  style="display:nones " class="show_guest" >
              <i class="fa  fa-users bg-green"  style="z-index:1 "></i>

              <div class="timeline-item" style="margin-left:40px; margin-right: 0px;background-color:FFFFFF;">
                <span class="time" style="font-size:16px"><i class="fa fa-clock-o <? 	if($arr[project][driver_pickup_date]<>""){ echo $spin; } ?>" 
				style="color:<? 	if($arr[project][driver_pickup_date]<>""){ echo $clock_color;} else {  echo $no_clock_color; }?>">
				
				</i> 
				 
				        <div  style="font-size:16px; margin-top:-22px; margin-left:25px;">      
			<? 	if($arr[project][driver_pickup_date]<>""){ ?><font color="<?=$time_color;?>"><b>
			  <? echo ThaiTimeConvert($arr[project][driver_pickup_date]- 25200,'1','short'); ?> </b></font>
			<? }   else { ?> </font><font style="font-size:13px "><? echo "&nbsp;ยังไม่มี"; } ?></font>
 
			
				</div>
				
				</span>



                <div class="timeline-header"  style="padding-top:10px; padding-bottom:5px; "  ><a ><font >รับแขก</font></a> <span class="font_26" style="margin-top:-5px; position:absolute "><B >&nbsp;&nbsp;<? echo $arr[project][airout_time];?></B></span></div>
 
                <div class="timeline-header"  style="padding-top:10px; padding-bottom:5px; "  >
				 
				  <table width="100%"  border="0" cellspacing="2" cellpadding="2" style="border-bottom: solid  0px #999999; margin-bottom:0px; ">
                    <tr>
                      <td width="120" valign="middle">  <?  include ("mod/lab/popup_guest.php");?>
					  
					  <?
if($arr[project][driver_topoint] > 0){
	if($arr[project][driver_pickup] > 0){
?>

<script>
$('#iconchk_s2_<?=$arr[project][id];?>').attr("src", "images/yes.png");
$('#checkstep_2_<?=$arr[project][id];?>').addClass("checkinstep_active");
 $('#tab_pickup_<?=$arr[project][id];?>').removeClass("tab_alert");
                    </script>
                          <table  cellpadding="0" cellspacing="0">
                            <tr id="tr_btn_pickup1<?=$arr[project][id];?>"  style="display: none<? if($arr[project][driver_pickup] == 1){ ?> 1  <? } ?>">
                              <td><button style=" color: #fffbfb;" class="btnstatus"  data-target="#popup_chk_guest_<?=$arr[project][id];?>" data-toggle="modal" data-backdrop="static" data-keyboard="false"   data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>"   data_report_id="<?=$arr[project][report_id];?>" data_sv="<?=$arr[project][server];?>"   col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>1" data_val="1"  <? if($arr[project][driver_pickup] == 1){ ?> disabled="disabled"  <? } ?> > เช็คชื่อแขก</button></td>
                            </tr>
                            <tr height="5" id="cc_tr_pickup<?=$arr[project][id];?>" <? if($arr[project][driver_pickup] > 0){ ?> style="display: none"  <? } ?> ></tr>
                            <tr id="tr_btn_pickup2<?=$arr[project][id];?>"  style="display: none<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>">
                              <td><button style="background-color: #ff2b2b; color: #fffbfb;" class="btnstatus" data-target="#popup_chk_guest_<?=$arr[project][id];?>" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>"   data_report_id="<?=$arr[project][report_id];?>" data_sv="<?=$arr[project][server];?>"  col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>2" data_val="2" <? if($arr[project][driver_pickup] == 2){ ?> disabled="disabled"  <? } ?> > ไม่เจอแขก</button></td>
                            </tr>
                          </table>
                          <?		
	}else{
?>
                          <table  cellpadding="0" cellspacing="0">
                            <tr id="tr_btn_pickup1<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 1){ ?> 1  <? } ?>">
                              <td><button style=" color: #fffbfb;" class="btnstatus" data-target="#popup_chk_guest_<?=$arr[project][id];?>" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>"   data_report_id="<?=$arr[project][report_id];?>" data_sv="<?=$arr[project][server];?>"  col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>1" data_val="1"  > เช็คชื่อแขก</button></td>
                            </tr>
                            <tr height="5" id="cc_tr_pickup<?=$arr[project][id];?>" <? if($arr[project][driver_pickup] > 0){ ?> style="display: none"  <? } ?> ></tr>
                            <tr id="tr_btn_pickup2<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>">
                              <td><button style="background-color: #ff2b2b; color: #fffbfb;" class="btnstatus"  data-target="#popup_chk_no_guest_<?=$arr[project][id];?>" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>"   data_report_id="<?=$arr[project][report_id];?>" data_sv="<?=$arr[project][server];?>"  col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>2" data_val="2"  > ไม่เจอแขก</button></td>
                            </tr>
                          </table>
                          <?		
	}
?>
                          <? }
else{ ?>
                          <table  cellpadding="0" cellspacing="0">
                            <tr id="tr_btn_pickup1<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 1){ ?> 1  <? } ?>">
                              <td><button style=" color: #fffbfb;" class="btnstatus"  data-target="#popup_chk_guest_<?=$arr[project][id];?>" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>"   data_report_id="<?=$arr[project][report_id];?>" data_sv="<?=$arr[project][server];?>"  col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>1" data_val="1" <? if($arr[project][driver_pickup] == 1){ ?> disabled="disabled"  <? } ?> > เช็คชื่อแขก</button></td>
                            </tr>
                            <tr height="5" id="cc_tr_pickup<?=$arr[project][id];?>" <? if($arr[project][driver_pickup] > 0){ ?> style="display: none"  <? } ?> ></tr>
                            <tr id="tr_btn_pickup2<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>">
                              <td><button style="background-color: #ff2b2b; color: #fffbfb;" class="btnstatus" data-target="#popup_chk_no_guest_<?=$arr[project][id];?>" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>"   data_report_id="<?=$arr[project][report_id];?>" data_sv="<?=$arr[project][server];?>"  col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>2" data_val="2" <? if($arr[project][driver_pickup] == 2){ ?> disabled="disabled"  <? } ?> > ไม่เจอแขก</button></td>
                            </tr>
                          </table>
                          <? } ?>
                          <? if(1==0){ ?>
                          <div  id="no_guest<?=$arr[project][id];?>"  style=" display:none<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>">
                            <button type="button" class="btn btn-default"  style=" padding:5px; "   data-toggle="modal" data-backdrop="static" data-keyboard="false" >สาเหตุไม่พบแขก</button>
                          </div>
                          <? } ?>
                      </td>
                      <td><div id="mappickup_<?=$arr[project][id];?>">
					  
					  
					  
					  </div>
                          <? if($arr[project][driver_pickup] != 0 && $arr[project][driver_pickup] != ''){ ?>
                          <? if($arr[project][driver_pickup] == 2){ $txt_pick_g = "ไม่เจอแขก"; }else{ $txt_pick_g = "เช็คชื่อแขก";   }?>
                          <script type="text/javascript">
 $('#iconchk_s2_<?=$arr[project][id];?>').attr("src", "images/yes.png");
$('#checkstep_2_<?=$arr[project][id];?>').addClass("checkinstep_active");
 $('#tab_pickup_<?=$arr[project][id];?>').removeClass("tab_alert");
 
 $(document).ready(function(){
	var url_map<?=$arr[project][id];?> = "popup.php?name=map&file=view&sv=<?=$_GET[sv];?>&bookid=<?=$arr[project][id];?>&type=driver_pickup&data_val=<?=$arr[project][driver_topoint];?>";
$('#mappickup_<?=$arr[project][id];?>').load(url_map<?=$arr[project][id];?>);

   $('#show_price<?=$arr[project][id];?>').show();
  });
                    </script>
                          <?	
		}
		?></td>
                    </tr>
                  </table>
                </div>
 

                <div class="timeline-body"  style="padding-top:5px; padding-bottom:5px; ">
 
				<table width="100%"  border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px; ">
  <tr>
    <td width="25"><i class="fa  fa-recycle" style="color:#999999; font-size:20px"></i></td>
    <td style="color:#666666;font-size:16px">เอเย่นต์ &nbsp;<?echo $arr[showlogo][company];?> <? if($arr[showlogo][company_or]<>""){ ?>
	
	 
	 &nbsp;<? echo $arr[showlogo][company_or];?>
	 
	 <? } ?></td>
  </tr>
</table>
 
				<table width="100%"  border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px; ">
  <tr>
    <td width="25"><i class="fa  fa-users" style="color:#999999; font-size:16px"></i></td>
    <td style="color:#666666;font-size:16px"> <?
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
    <td width="25"><i class="fa  fa-phone" style="color:#999999; font-size:20px"></i></td>
    <td style="color:#666666;font-size:16px"><b><?=$arr[project][guest_phone];?></b></td>
  </tr>
</table>

				<? } ?>
 
				<?=$arr[project][guest_name]?>
				
				 
                </div>
 
              </div>
            </li>
            <!-- END timeline item -->
			 
			<!-- timeline item -->
            <li style="display:none " class="show_toplace">
              <i class="fa fa-map-marker bg-blue"  style="z-index:1 "></i></i>

              <div class="timeline-item" style="margin-left:40px; margin-right: 0px;background-color:FFFFFF;">
                <span class="time" style="font-size:16px"><i class="fa fa-clock-o <? 	if($arr[project][driver_complete_date]<>""){ echo $spin; } ?>" style="color:<? 	if($arr[project][driver_complete_date]<>""){ echo $clock_color;} else {  echo $no_clock_color; }?>"></i>   
				
				  <div  style="font-size:16px; margin-top:-22px; margin-left:25px;">
				<? 	if($arr[project][driver_complete_date]<>""){ ?><font color="<?=$time_color;?>"><b>
			  <? echo ThaiTimeConvert($arr[project][driver_complete_date]- 25200,'1','short'); ?> </b>
			<? }   else { ?> </font><font style="font-size:13px "><? echo "&nbsp;ยังไม่มี"; } ?></font>
			</div>
			</span>

                <h3 class="timeline-header"  style="padding-top:10px; padding-bottom:5px; "><a >สถานที่ส่ง</a></h3>

                <div class="timeline-body"  style="padding-top:5px; padding-bottom:5px; ">
				

				<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><? if($arr_t_topic[$arr[project][to_place]] != ''){ ?>
                                   <? echo $arr_t_topic[$arr[project][to_place]];?> (
                                   <?=$arr_t_province[$arr[project][to_place]];?>
      /
      <?=$arr_t_amphur[$arr[project][to_place]];?>
      )
      <? } ?></td>
  </tr>
</table>

				

                </div>
 
              </div>
            </li>
            <!-- END timeline item -->
			
			
            
			
			
            <!-- /.timeline-label -->
			
			
			<? if($arr[product][area] == 'Out'){  
			
			  $work_airout="เที่ยวบิน".$arr[project][air]. "";
			
			?>
			   <!-- timeline item -->
          <li style="display:none " class="show_air_out">
              <i class="fa  fa fa-plane"  style="z-index:1 "></i>

              <div class="timeline-item" style="margin-left:40px; margin-right: 0px;background-color:FFFFFF;">
                <span class="time" style="font-size:16px">  <? echo $arr[project][airin_time];?></span>

                <div class="timeline-header"  style="padding-top:10px; padding-bottom:5px; "><a ><font color="#666666">เที่ยวบิน</font></a> <B></B></div>

                <div class="timeline-body"  style="padding-top:5px; padding-bottom:5px; "> <?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?>
                </div>
 
              </div>
 </li>
			<? }
			
			 
			
			 ?>
			 
            <!-- END timeline item -->
			
			
			 
			
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
             <li style="display:none " class="show_price">
              <i class="fa fa-thumbs-up bg-green"  style="z-index:1; background-color:#FF6600 "></i>

              <div class="timeline-item" style="margin-left:40px; margin-right: 0px;background-color:FFFFFF;">
                <span class="time" style="font-size:24px; color:<?=$price_color?>; margin-top:-5px"> <b> <?=number_format( $arr[project][car_price]+0 , 2 );?></b></span>

                <div class="timeline-header"  style="padding-top:10px; padding-bottom:5px; "><font color="#666666" style="font-size:16px"><a href="?name=pay&file=pay" target="_blank" >เบี้ยเที่ยว</a></font> <B></B> &nbsp;<font color="<?=$price_color?>"  style="font-size:16px"><?=$price_text?>&nbsp;</font ></div>
               <a href="?name=pay&file=pay" target="_blank" ><div class="timeline-body"  style="padding-top:5px; padding-bottom:5px; padding-left:10px;font-size:18px; color:#666666  "> ดูเบี้ยเที่ยวทั้งหมด
                </div></a>
         </div>
            </li>
			<? }
			
			 
			
			 ?>
            <!-- timeline item -->
          
            <!-- END timeline item -->
            <!-- timeline item -->
     

 
 
            <!-- END timeline item -->
            <li style="margin-bottom:-30px; ">
              <i></i>
            </li>
			
          </ul>
 

<?
$i++;	
}
$db->closedb ();
?>  </div>  

   
  <?
$ok_button_color="#0ACB68";
$no_button_color="#F50202";

?>

<style>
.btnstatus{ box-shadow: 1px 1px 5px #999999; border:0px solid #FFFFFF; 
border-radius: 5px;padding:5px; height:40px; font-size:16px; width:100px; margin-right:15px; background-color:#367FA9;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF;

}
.btnstatus:hover{

background-color:#999999;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF; border:0px solid #FFFFFF; 
}


.btn-modal-ok{ box-shadow: 1px 1px 5px #999999; border:0px solid #FFFFFF; 
border-radius: 5px;padding:5px; font-size:22px; width:120px; background-color:<?=$ok_button_color?>;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF

}
.btn-modal-ok:hover{

background-color:#999999;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF
}

.btn-modal-no{ box-shadow: 1px 1px 5px #999999; border:0px solid #FFFFFF; 
border-radius: 5px;padding:5px; font-size:22px;  width:120px; background-color:<?=$no_button_color?>;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF
}

.btn-modal-no:hover{
background-color:#999999;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF
}
 
</style> 
  
  
  
  <?
$ok_button_color="#0CD314";
$no_button_color="#F50202";

?>
 

 <script>
  // Approve - Reject image
 
 
 
 
  $(".btnstatus").click(function(){
  



var col_name = $(this).attr('col_name');
var data_id = $(this).attr("data_id");
var data_val = $(this).attr("data_val");
var data_vc = $(this).attr("data_vc");
var data_report_id = $(this).attr("data_report_id");
var data_sv = $(this).attr("data_sv");

var data_cartype = $(this).attr("data_cartype");
var data_date = $(this).attr("data_date");
var data_carno = $(this).attr("data_carno");
var data_drivername = $(this).attr("data_drivername");

 ////alert(data_drivername);
 
    document.getElementById('vc').value=$(this).attr("data_vc");
 
//alert(data_id);
if(col_name == 'driver_topoint'){
 	var currentdate = new Date(); 
    var datetime = "" 
    	+ currentdate.getFullYear() + "-" 
        + (currentdate.getMonth()+1)  + "-" 
        + currentdate.getDate() + "<br /> " 
        + currentdate.getHours() + ":"  
        + currentdate.getMinutes() + ":" 
        + currentdate.getSeconds();

var currenttime = <?=time();?>; 
var bookimgtime = parseInt(<?=$time_booking;?>); 
 	currenttime = currenttime / 1000;
//alert(bookimgtime +' - '+currenttime);

//$('#test_time').html(bookimgtime +' - '+currenttime);			
	if(bookimgtime < currenttime){
		$("#dialog_remark_topoint").dialog({ resizable: false, modal: true, width: '90%', 
	minHeight: 200,
	     buttons: {
			"บันทึก": function () {
				
				
				if($('#driver_remark_topoint').val() == 0){
					//alert('กรุณาเลือกสาเหตุที่ไม่เจอแขก');
					$('#driver_remark_topoint').focus();
					return false;
				}
				driver_remark = $('#driver_remark_topoint').val();
				if(confirm("คุณแน่ใจหรือไม่ว่ามาถึงสถานที่รับแขกแล้ว") == true){
				$('#date_topiont'+data_id).html(datetime);
				$.post("popup.php?name=lab&file=action", { col_name : col_name ,data_id: data_id ,data_val : data_val,driver_remark : driver_remark ,data_sv: data_sv,data_cartype:data_cartype, data_date:data_date,data_drivername:data_drivername,data_carno:data_carno    }, function(theResponse){ 
				var msg = theResponse;	$('#show_data_res'+data_id).html(msg);
					});
				$('#sub_complete'+data_id).show();
				$('#btn_pickup'+data_id+data_val).attr('disabled', true);
				$('#cc_tr_pickup'+data_id).hide(); 
				$('#tr_btn_pickup'+data_val).show();
				$('#tr_btn_pickup1').hide();
 
				
				$(this).dialog("close");
				}
			}
		}
	});
	}else{
 
 ////////// 
 
 
   $('#btn_confirm_topoint_'+data_id).click(function(){ 
 
 /// สั่ง action ทำงาน ส่งข้อมูล
  $('#sub_see_guest'+data_id).fadeIn( "slow" );  
		$('#btn_topoint'+data_id).attr('disabled', true);
		//$('#btn_topoint'+data_id).css("height", "30px"); 

   	$('#date_topiont'+data_id).html(datetime);
	
 $.post("popup.php?name=lab&file=action", { col_name : col_name ,data_id: data_id ,data_vc: data_vc,data_report_id: data_report_id ,data_sv: data_sv,data_cartype:data_cartype, data_date:data_date,data_drivername:data_drivername,data_carno:data_carno    }, function(theResponse){ var msg = theResponse;	
  $('#show_data_res'+data_id).html(msg);	});	
    
 
	});
	}
	
	
}
 

if(col_name == 'driver_pickup'){
 

 
var currentdate = new Date(); 
    var datetime = "" 
    	+ currentdate.getFullYear() + "-" 
        + (currentdate.getMonth()+1)  + "-" 
        + currentdate.getDate() + " <br />" 
        + currentdate.getHours() + ":"  
        + currentdate.getMinutes() + ":" 
        + currentdate.getSeconds();
if(data_val == 1){

$('#btn_guest_yes_'+data_id).click(function(){ 

 $('#popup_chk_guest_'+data_id).hide();
 });	
 
 
 $('#btn_close_guest_'+data_id).click(function(){ 
 $('.modal').modal('hide');
 });	

  $('#btn_confirm_guest_'+data_id).click(function(){ 
    $('.modal').modal('hide');
	 //alert(0);
	   ////// สั่ง action ทำงาน
$('#tr_btn_pickup'+data_val).show();
	$('#tr_btn_pickup2').hide();
	$('#date_pickup'+data_id).html(datetime);
	$.post("popup.php?name=lab&file=action", { col_name : col_name ,data_id: data_id ,data_val : data_val,data_sv: data_sv ,data_report_id: data_report_id ,data_vc: data_vc,data_cartype:data_cartype, data_date:data_date,data_drivername:data_drivername,data_carno:data_carno  }, function(theResponse){
 
	
		var msg = theResponse;
  		$('#show_data_res'+data_id).html(msg);
	
	});	
	
	$('#sub_complete'+data_id).show();
	$('#btn_pickup'+data_id+data_val).attr('disabled', true);
	$('#cc_tr_pickup'+data_id).hide(); 
	$('#tr_btn_pickup2'+data_id).hide(); 
	
	//$('#btn_pickup'+data_id+data_val).css("height", "30px");
  
  ////// ปิด action


   });
	

}
else{
	
	
   $('#btn_guest_no_'+data_id).click(function(){ 
				
 

				driver_remark = $('#driver_remark_noguest').val();
									if($('#driver_remark_noguest').val() == 0){
					alert('กรุณาเลือกสาเหตุที่ไม่เจอแขก');
					$('#driver_remark_noguest').focus();
					return false;
				} else {
 $('#popup_chk_no_guest_'+data_id).hide();
//$('#popup_chk_no_guest_'+data_id).modal('toggle');

 ///// หาแขกไม่เจอ
  $('#btn_confirm_no_guest_'+data_id).click(function(){ 
 
	$( "#btn_upload" ).click();
$('.modal').modal('hide');
 
 var data_vc =  document.getElementById('vc').value;
var driver_remark = $('#driver_remark_noguest').val();
var driver_remark_detail = $('#driver_remark_noguest_other').val();
	 
	//alert(driver_remark_detail);  
	  /////
	  /*
	   $.post('popup.php?name=lab&file=action&id=<?=$arr[web_user][id]?>',
	   
	   $('#no_guest_form').serialize(),function(response){
   $('#send_data').html(response);
  });
  */
	 //// 


	  $('#date_pickup'+data_id).html(datetime);
				$.post("popup.php?name=lab&file=action", { col_name : col_name ,data_id: data_id ,data_vc: data_vc ,data_report_id: data_report_id ,data_val : data_val ,driver_remark : driver_remark ,data_sv: data_sv ,driver_remark : driver_remark ,driver_remark_detail : driver_remark_detail,data_cartype:data_cartype, data_date:data_date,data_drivername:data_drivername,data_carno:data_carno   }, function(theResponse){ 
				var msg = theResponse;	$('#show_data_res'+data_id).html(msg);
					});
				$('#sub_complete'+data_id).fadeIn( "slow" );
				$('#btn_pickup'+data_id+data_val).attr('disabled', true);
				$('#cc_tr_pickup'+data_id).hide(); 
				$('#tr_btn_pickup'+data_val).show();
				$('#tr_btn_pickup1').hide();
				$('#no_guest'+data_id).show();
 ///
  	});
 ///
 }
///
 	});
	
} 
 	
   	
  	

}
if(col_name == 'driver_complete'){
/////
 

 $('#btn_confirm_complete_'+data_id).click(function(){ 
///
 
	   ////// สั่ง action ทำงาน
   $('#iconchk_s3').attr("src", "images/yes.png");
  $('#checkstep_3').addClass("checkinstep_active");
 /////
 $('#btn_complete'+data_id).attr('disabled', true);
 
 	var currentdate = new Date(); 
    var datetime = "" 
    	+ currentdate.getFullYear() + "-" 
        + (currentdate.getMonth()+1)  + "-" 
        + currentdate.getDate() + "" 
        + currentdate.getHours() + ":"  
        + currentdate.getMinutes() + ":" 
        + currentdate.getSeconds();
   	$('#date_complete'+data_id).html(datetime);
 $.post("popup.php?name=lab&file=action", { col_name : col_name ,data_id: data_id ,data_sv: data_sv,data_report_id: data_report_id ,data_vc: data_vc,data_cartype:data_cartype, data_date:data_date,data_drivername:data_drivername,data_carno:data_carno   }, function(theResponse){ 
 var msg = theResponse;	$('#show_data_res'+data_id).html(msg);  });		
   
	   
	 
	 
	});
 

	 
	
}
/* 
   var app_rej = '0';
   if($(this).hasClass('approve')){
      $(this).addClass('reject btn-warning');
      $(this).removeClass('approve btn-success');
      $(this).html('<i class="fa fa-times"></i>');
      app_rej = '0';
  }else if($(this).hasClass('reject')){
      $(this).removeClass('reject btn-warning');
      $(this).addClass('approve btn-success');
      $(this).html('<i class="fa fa-check"></i>');
      app_rej = '1';
  }
  if( col_name == 'in_transfer' ){
  	if(app_rej == '1'){
		$('.sub_in_transfer_'+pro_id).show();
	}else{
		$('.sub_in_transfer_'+pro_id).hide();
	}
  } 
//*
 $.post("index.php?name=admin/product/option", { col_name: col_name ,pro_id : pro_id , app_rej : app_rej  }, function(theResponse){ 	});
//   */ 
  });
 

  $(".btn_map").click(function(){


   var col_name = $(this).attr('col_name');
   var data_id = $(this).attr("data_id");
   var data_val = $(this).attr("data_val");
   var data_lat = $(this).attr("data_lat");
   var data_lng = $(this).attr("data_lng");
   var data_title = $(this).attr("data_title");
 
  $.post("popup.php?name=view&file=map", { col_name : col_name ,data_id: data_id ,data_val: data_val,data_lat: data_lat,data_lng: data_lng    }, function(theResponse){ 
 var msg = theResponse;	
 $('#show_data_map').html(msg);	
  
$("#dialog_map").dialog({ 
title: data_title, 
resizable: false, 
modal: true, width: '90%', 
	minHeight: 200,
	     buttons: {
			"ปิด": function () {
				
				$(this).dialog("close");
				}
		}
	});	
	
	
	});
 });	
 
 


// });
</script>
 

<style>
 .iframe-popup {
       border: none;
    top: 0; right: 0;
    bottom: 0; left: 0;
    width: 100%;
    height: 50%;
}
 
 </style>


 
 <!------ end---->  

    <style>
  /* Tooltip */
  .test + .tooltip > .tooltip-inner {
      background-color: #006699; text-align:left;
      color: #FFFFFF; 
      border: 0px solid #FF3300; 
 
      font-size: 13px;
  }
  /* Tooltip on top */
  .test + .tooltip.top > .tooltip-arrow {
      border-top: 5px solid #FF3300;
  }
  /* Tooltip on bottom */
  .test + .tooltip.bottom > .tooltip-arrow {
      border-bottom: 5px solid blue;
  }
  /* Tooltip on left */
  .test + .tooltip.left > .tooltip-arrow {
      border-left: 5px solid red;
  }
  /* Tooltip on right */
  .test + .tooltip.right > .tooltip-arrow {
      border-right: 5px solid black;
  }
  .test { width:500px: }
  </style>
  <style>
 .modal {
  text-align: center;
  padding: 0!important;
}

.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px;
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}
 </style>