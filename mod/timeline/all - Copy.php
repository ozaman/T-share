 <style type="text/css">
<!--
.topictransfer { padding-top:10px; font-size:16px; font-weight:normal; color: <?=$main_color?> ; 
 
}
.style1 {font-size: 16px}
.style2 {font-size: 16}
-->
</style> 
  <?
 
if($_GET[day] != ''){
	$_GET[day] = $_GET[day];
}else{
$_GET[day] = "2016-07-13";
}
 //echo $_SESSION['data_user_name'];
//  echo $_GET[server];
?>
 
 <?
if($_GET[server]=="th"){
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}
if($_GET[server]=="cn"){
$db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[web_user] = $db->select_query("SELECT * FROM web_driver WHERE username='".$_SESSION['data_user_name']."'    "); 
$arr[web_user] = $db->fetch($res[web_user]);
$user_id =  $_SESSION['data_user_id'];

$res[gg_map] = $db->select_query("SELECT id,map,transferplace_type,star FROM ".TB_transferplace_new."  ");
	while($arr[gg_map] = $db->fetch($res[gg_map])){
		$arr_map[$arr[gg_map][id]] = $arr[gg_map][map];
		$arr_type[$arr[gg_map][id]] = $arr[gg_map][transferplace_type];
		$arr_star[$arr[gg_map][id]] = $arr[gg_map][star];
	}
 
$res[gg_map] = $db->select_query("SELECT id,topic,province,amphur FROM ".TB_transferplace."  ");
	while($arr[gg_map] = $db->fetch($res[gg_map])){
		$arr_t_topic[$arr[gg_map][id]] = $arr[gg_map][topic];
		$arr_t_province[$arr[gg_map][id]] = $arr[gg_map][province];
		$arr_t_amphur[$arr[gg_map][id]] = $arr[gg_map][amphur];
	}

 

$res[project] = $db->select_query("SELECT * FROM ".TB_order."  where drivername='".$user_id."' and transfer_date='".$_GET[day]."'   order by airin_h ASC,airin_time ASC  ");
$rows[project] = $db->rows($res[project]);
if($rows[project]){	
}else{
	$rows[project] = 0;
}
$row_processing = $db->num_rows(TB_order,"id","drivername='".$user_id."' and transfer_date='".$_GET[day]."' and status = 'CONFIRM' and driver_complete  ='0' group by carno  ");
$row_complete = $db->num_rows(TB_order,"id","drivername='".$user_id."' and transfer_date='".$_GET[day]."' and status = 'CONFIRM' and driver_complete  ='1' group by carno  ");
?>
<? if($_GET[server]=="th"){ ?>
<table width="100%"   style="padding:10px; margin-bottom:10px ; background-color:#FFFFFF;border: solid 1px #DADADA; font-size:22px;"    >
                 
                                    <tr>
                                       <td height="40" style="font-size:14px;" > &nbsp;&nbsp;<?
$eng_date=strtotime($_GET[day]); 
echo thai_date($eng_date); 
									   ?> 
									   </td>
                                    </tr>
 
			  
  </table>
							<? } ?>
							
							
<table width="100%" style="margin-top:-20px; ">
             
                        <tr>
                          <td colspan="2" >
                           <h1 style="font-family:Arial, Helvetica, sans-serif; font-size:22px; " >
						   <img src="images/flag/<?=$_GET[server]?>.png" align="absmiddle"/><b> ทั้งหมด  <?=$rows[project];?> งาน</b></h1>
						   
						    
						   
                              <table width="100%"   style="padding:10px; background-color:#FFFFFF;  border: solid 1px #DADADA; font-size:22px;"    >
                 
                                    <tr>
                                       <th width="150" height="40" >
									 <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"><div class="bg-blue" style="width:30px; height:30px; border-radius: 50%; padding-top:5px; margin-left:5px;"><span  ><center style="font-size:20px; color:#FFFFFF; font-family:Arial, Helvetica, sans-serif; font-weight:bold; margin-top:0px;" ><?=$row_complete;?></center> </span> </div></td>
    <td style="font-size:16px; padding-left: 2px;" ><b>สำเร็จ</b></td>
  </tr>
</table>
   
       </th>
                                       <td  >
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"><div class="bg-red" style="width:30px; height:30px; border-radius: 50%; padding-top:5px; margin-left:5px;"><span  ><center style="font-size:20px; color:#FFFFFF; font-family:Arial, Helvetica, sans-serif; font-weight:bold; margin-top:0px;" ><?=$row_processing;?></center> </span> </div></td>
    <td style="font-size:16px; padding-left: 2px;" ><b>ไม่สำเร็จ</b></td>
  </tr>
</table> </td>
                                    </tr>
              
                            </table>
                        </td>
                        </tr>
 
</table>
				 <br>

      <div class="row" style="height:auto; padding:0px; margin-right:-10px; ">
				 
<?

$i=1;
while($arr[project] = $db->fetch($res[project])){
	 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[product] = $db->select_query("SELECT cartype,area FROM web_transferproduct WHERE id='".$arr[project][program]."' ");
	$arr[product] = $db->fetch($res[product]);
	$res[book] = $db->select_query("SELECT * FROM ".TB_book_agent." WHERE id='".$arr[project][orderid]."' ");
	$arr[book] = $db->fetch($res[book]);
/*
	$res[place] = $db->select_query("SELECT topic FROM ".TB_transferplace." WHERE id='".$arr[project][pickup_place]."' ");
	$arr[place] = $db->fetch($res[place]);
	$res[to] = $db->select_query("SELECT topic FROM ".TB_transferplace." WHERE id='".$arr[project][to_place]."' ");
	$arr[to] = $db->fetch($res[to]);
	//////////
 */
//for($i=1;$i<=6;$i++){
?>



 

        <div class="col-md-12" >
	  <div class="box box-danger" style="padding:10px; height:320px;  border: solid 2px #ECF0F5;display:none" onmouseover="this.style.border='solid 2px #FF6600';" onmouseout="this.style.border='solid 2px #ECF0F5';" id="booking_<?=$arr[project][invoice];?>"  >
	  
	  <a rel="external" href="?name=view&file=show&day=<?=$_GET[day];?>&carno=<?=$arr[project][carno];?>&car_list=<?=$i;?>&sv=<?=$_GET[server]?>">
 
	  <script>
 $("#booking_<?=$arr[project][invoice];?>").mouseover(
  function () {
    $("#cir_<?=$arr[project][invoice];?>").addClass("cirnumber_active");
  } 
);
   $("#booking_<?=$arr[project][invoice];?>").mouseleave(
  function () {
    $("#cir_<?=$arr[project][invoice];?>").removeClass("cirnumber_active");
  });
 </script>
 
                  <table width="100%"  style="display:none ">
                   
                        <tr>
                           <td  > 
 <div style="font-size:24px; background-color:#FFFFFF; margin-top:-5px; border-bottom: solid 1px #999999" >
 
 
						   <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="30"  style="background-color:#F6F6F6 "><div class="cirnumber" id="cir_<?=$arr[project][invoice];?>"><table width="100%"  border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td style="font-size:26px; color:#FFFFFF; font-weight:bold "><center><?=$i;?></center></td>
  </tr>
</table>
</div> </td>
    <td width="90" style="background-color:#F6F6F6 "><? if($arr[product][cartype] == 2){  ?>
      <table width="100%"  border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td><img src="images/users.png"  align="absmiddle"    /></td>
          <td  style="font-size:14px ; font-weight:bold">ร่วม </td>
        </tr>
      </table>
      <? }else{ ?>
      <table width="100%"  border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td><img src="images/user.png" align="absmiddle"    /></td>
          <td  style="font-size:14px ; font-weight:bold">ส่วนตัว</td>
        </tr>
      </table>
      <? } ?></td>
    <td width="150" valign="middle" style="font-size:14px ; font-weight:bold"> &nbsp;  
	
						<? if($arr[product][area] == 'In'){ ?> 
						  <img src="images/car/in.png" height="20" align="absmiddle"     />  รับเข้า
						  
						   <? }elseif($arr[product][area] == 'Out'){ ?>
						   <img src="images/car/out.png" height="20" align="absmiddle"   />  ส่งออก
						  
						   <? }elseif($arr[product][area] == 'Point'){ ?>  
						   <img src="images/car/to.png" height="20" align="absmiddle"   /> พ้อยท์ทูพ้อยท์
						  
						   <? }else{ ?> 
						   <img src="images/car/truck.png" height="20" align="absmiddle"   />  เซอร์วิส
						 
						   <? } ?></td>
    <td align="right" ><? if($arr[project][driver_complete] > 0){   ?> 
	<img src="images/icon/accept.png"  align="bottom"   /> 
	
	 <? } ?></td>
  </tr>
</table>

						</div>   
						   
						   
						   </td>
						</tr>
						<tr>
                           <td  ><table width="100%"  border="0" cellspacing="2" cellpadding="2">
                             <tr>
                   
                             </tr>
                             <tr>
                               <td><div class="topictransfer"><i class="fa  fa-map-marker" style="color:#c1c1c1"></i> สถานที่รับ
                                 
                               </div></td>
                             </tr>
                             <tr >
                               <td><div  align="left">
                                   <? if($arr_t_topic[$arr[project][pickup_place]] != ''){ ?>
                                   <? echo $arr_t_topic[$arr[project][pickup_place]];?> (
                                   <?=$arr_t_province[$arr[project][pickup_place]];?>
      /
      <?=$arr_t_amphur[$arr[project][pickup_place]];?>
      )
      <? } ?>
                               </div></td>
                             </tr>
                             <tr>
                               <td><div class="topictransfer"><i class="fa  fa-clock-o" style="color:#c1c1c1"></i> รับแขก</div></td>
                             </tr>
                             <tr >
                               <td><div  align="left"><B><?echo $arr[project][airout_time];?></B></div></td>
                             </tr>
                             <tr style="display: none<? if($arr[product][area] == 'In'){ echo "1"; } ?>">
                               <td><div class="topictransfer"><i class="fa  fa-plane" style="color:#c1c1c1"></i> เที่ยวบิน</div></td>
                             </tr>
                             <tr  style="display: none<? if($arr[product][area] == 'In'){ echo "1"; } ?>">
                               <td><div  align="left"><?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?></div></td>
                             </tr>
                             <tr >
                               <td><div class="topictransfer"><i class="fa  fa-map-marker" style="color:#c1c1c1"></i> สถานที่ส่ง</div></td>
                             </tr>
                             <tr >
                               <td ><div  align="left">
                                   <? if($arr_t_topic[$arr[project][to_place]] != ''){ ?>
                                   <? echo $arr_t_topic[$arr[project][to_place]];?> (
                                   <?=$arr_t_province[$arr[project][to_place]];?>
      /
      <?=$arr_t_amphur[$arr[project][to_place]];?>
      )
      <? } ?>
                               </div></td>
                             </tr>
                             <tr style="display: none<? if($arr[product][area] == 'Out'){ echo "1"; } ?>">
                               <td><div class="topictransfer"><i class="fa  fa-plane" style="color:#c1c1c1"></i> เที่ยวบิน</div></td>
                             </tr>
                             <tr  style="display: none<? if($arr[product][area] == 'Out'){ echo "1"; } ?>">
                               <td><div  align="left"><?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?></div></td>
                             </tr>
                           </table>
                          </td>
                        </tr>
        
    </table>
        </a>   
		
		
		
		
		////////////////////////////////////////////////////////////
		
		
		
		
		
		/////////////////////////////////
	  </div>  
   
              
  </div>  

 
   <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
			
			<? if($i==1){?>
            <li class="time-label">
                  <span class="bg-red font_35" style="font-size:28px; margin-left:15px; ">
<? 
 
$eng_date=strtotime(date('Y-m-d'));  echo  date('Y-m-d');   ?> 
                  </span>
            </li>
			<? } ?>
            <!-- /.timeline-label -->
			
			<div style="display:none" >งานที่ 1</div><br>

			
			
			
			
            <!-- timeline item -->
            <li>
             

              <div class="timeline-item" style="margin-left:40px;  margin-right: 0px; margin-top:">
             

             <table width="100%" border="0" cellspacing="2" cellpadding="2" style="margin-top: 30px ">
  <tr>
    <td width="30"  style="background-color:#F6F6F6 "><div class="cirnumber" id="cir_<?=$arr[project][invoice];?>"><table width="100%"  border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td style="font-size:30px; color:#FFFFFF; font-weight:bold "><center><?=$i;?></center></td>
  </tr>
</table>
</div> </td>
    <td width="90" style="background-color:#F6F6F6 "><? if($arr[product][cartype] == 2){  ?>
      <table width="100%"  border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td><img src="images/users.png"  align="absmiddle"    /></td>
          <td  style="font-size:14px ; font-weight:bold">ร่วม </td>
        </tr>
      </table>
      <? }else{ ?>
      <table width="100%"  border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td><img src="images/user.png" align="absmiddle"    /></td>
          <td  style="font-size:14px ; font-weight:bold">ส่วนตัว</td>
        </tr>
      </table>
      <? } ?></td>
    <td width="150" valign="middle" style="font-size:14px ; font-weight:bold"> &nbsp;  
	
						<? if($arr[product][area] == 'In'){ ?> 
						  <img src="images/car/in.png" height="20" align="absmiddle"     />  รับเข้า
						  
						   <? }elseif($arr[product][area] == 'Out'){ ?>
						   <img src="images/car/out.png" height="20" align="absmiddle"   />  ส่งออก
						  
						   <? }elseif($arr[product][area] == 'Point'){ ?>  
						   <img src="images/car/to.png" height="20" align="absmiddle"   /> พ้อยท์ทูพ้อยท์
						  
						   <? }else{ ?> 
						   <img src="images/car/truck.png" height="20" align="absmiddle"   />  เซอร์วิส
						 
						   <? } ?></td>
    <td align="right" ><? if($arr[project][driver_complete] > 0){   ?> 
	<img src="images/icon/accept.png"  align="bottom"   /> 
	
	 <? } ?></td>
  </tr>
</table>

             <table width="100%"  border="0" cellspacing="2" cellpadding="2" style="display:none ">
               <tr> </tr>
               <tr>
                 <td><div class="topictransfer"><i class="fa  fa-map-marker" style="color:#c1c1c1"></i> สถานที่รับ </div></td>
               </tr>
               <tr >
                 <td><div  align="left">
                     <? if($arr_t_topic[$arr[project][pickup_place]] != ''){ ?>
                     <? echo $arr_t_topic[$arr[project][pickup_place]];?> (
                     <?=$arr_t_province[$arr[project][pickup_place]];?>
        /
        <?=$arr_t_amphur[$arr[project][pickup_place]];?>
        )
        <? } ?>
        <?
	  $res[phone] = $db->select_query("SELECT id,phone FROM ".TB_transferplace." where id=".$arr[project][pickup_place]."  ");
	 $arr[phone] = $db->fetch($res[phone]);
		   
	  ?>
        <? if($arr[phone][phone]<>""){ 

$string_to_replace     = array ("-" ,"," , " ");
$string_after_replace  = array ("" ,"" , "" ,);
$arr[phone][phone]       = str_replace($string_to_replace , $string_after_replace , $arr[phone][phone] , $count);   



?>
        <br>
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="bottom" style="width:20px;color:<?=$main_color?>; font-size:18px;"><b><i class="fa  fa-phone" ></i></b></td>
            <td><div style=" padding-top:5px;  color:<?=$main_color?>;" ><b> <a href="tel:<? echo $arr[phone][phone] ;?>" target="_blank"  style="font-size:18px;"> <? echo $arr[phone][phone] ;?></a></b> </div></td>
          </tr>
        </table>
        <? } ?>
                 </div></td>
               </tr>
               <tr>
                 <td><div class="topictransfer"><i class="fa  fa-clock-o" style="color:#c1c1c1"></i> รับแขก</div></td>
               </tr>
               <tr >
                 <td><div  align="left"><B><?echo $arr[project][airout_time];?></B></div></td>
               </tr>
               <tr style="display: none<? if($arr[product][area] == 'In'){ echo "1"; } ?>">
                 <td><div class="topictransfer"><i class="fa  fa-plane" style="color:#c1c1c1"></i> เที่ยวบิน</div></td>
               </tr>
               <tr  style="display: none<? if($arr[product][area] == 'In'){ echo "1"; } ?>">
                 <td><div  align="left"><?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?></div></td>
               </tr>
               <tr >
                 <td><div class="topictransfer"><i class="fa  fa-map-marker" style="color:#c1c1c1"></i> สถานที่ส่ง</div></td>
               </tr>
               <tr >
                 <td ><div  align="left">
                     <? if($arr_t_topic[$arr[project][to_place]] != ''){ ?>
                     <? echo $arr_t_topic[$arr[project][to_place]];?> (
                     <?=$arr_t_province[$arr[project][to_place]];?>
        /
        <?=$arr_t_amphur[$arr[project][to_place]];?>
        )
        <? } ?>
        <?
	  $res[phoneto] = $db->select_query("SELECT id,phone FROM ".TB_transferplace." where id=".$arr[project][to_place]."  ");
	 $arr[phoneto] = $db->fetch($res[phoneto]);
		   
	  ?>
        <? if($arr[phoneto][phone]<>""){ 

$string_to_replace     = array ("-" ,"," , " ");
$string_after_replace  = array ("" ,"" , "" ,);
$arr[phoneto][phone]      = str_replace($string_to_replace , $string_after_replace , $arr[phoneto][phone] , $count);   



?>
        <br>
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="bottom" style="width:20px;color:<?=$main_color?>; font-size:18px;"><b><i class="fa  fa-phone" ></i></b></td>
            <td><div style=" padding-top:5px;  color:<?=$main_color?>;" ><b> <a href="tel:<? echo $arr[phoneto][phone] ;?>" target="_blank"  style="font-size:18px;"> <? echo $arr[phoneto][phone] ;?></a></b> </div></td>
          </tr>
        </table>
        <? } ?>
                 </div></td>
               </tr>
               <tr style="display: none<? if($arr[product][area] == 'Out'){ echo "1"; } ?>">
                 <td><div class="topictransfer"><i class="fa  fa-plane" style="color:#c1c1c1"></i> เที่ยวบิน</div></td>
               </tr>
               <tr  style="display: none<? if($arr[product][area] == 'Out'){ echo "1"; } ?>">
                 <td><div  align="left"><?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?></div></td>
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
 
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">จัดการใบงานรถ</a>
                  <a class="btn btn-danger btn-xs">ดูวอเชอร์</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa  fa-map-marker bg-gray-light" style="z-index:1; color:#FFFFFF "></i>

              <div class="timeline-item"  style="margin-left:40px; margin-right: 0px;">
                <span class="time"><i class="fa fa-clock-o"></i> รอการอัพเดท</span>

                <h3 class="timeline-header"><a >สถานที่รับ</a></h3>
				<div class="timeline-body"  style="padding-top:2px; padding-bottom:10px; "><? if($arr_t_topic[$arr[project][pickup_place]] != ''){ ?>
                                   <? echo $arr_t_topic[$arr[project][pickup_place]];?> (
                                   <?=$arr_t_province[$arr[project][pickup_place]];?>
      /
      <?=$arr_t_amphur[$arr[project][pickup_place]];?>
      )
      <? } ?>

				
                </div>
				
				
              </div>
            </li>
 
			
            <!-- END timeline item -->
            <!-- timeline item -->
            <li  >
              <i class="fa  fa-users bg-aqua"  style="z-index:1 "></i>

              <div class="timeline-item" style="margin-left:40px; margin-right: 0px;">
                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                <div class="timeline-header"><a href="#"><font color="#666666">รับแขก</font></a> <B><?echo $arr[project][airout_time];?></B></div>

                <div class="timeline-body"><?=$arr[book][guest]?>
                </div>
 
              </div>
            </li>
            <!-- END timeline item -->
			
			<!-- timeline item -->
            <li>
              <i class="fa fa-map-marker bg-blue"  style="z-index:1 "></i></i>

              <div class="timeline-item" style="margin-left:40px; margin-right: 0px;">
                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                <h3 class="timeline-header"><a href="#">สถานที่ส่ง</a></h3>

                <div class="timeline-body">
				
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
                              <tr style="display: none<? if($arr[product][area] == 'Out'){ echo "1"; } ?>">
                               <td><div class="topictransfer"><i class="fa  fa-plane" style="color:#c1c1c1"></i> เที่ยวบิน</div></td>
                             </tr>
                             <tr  style="display: none<? if($arr[product][area] == 'Out'){ echo "1"; } ?>">
                               <td><div  align="left"><?echo $arr[project][air];?> / <?echo $arr[project][airin_out];?></div></td>
                             </tr>
</table>
				
				
<? if($arr_t_topic[$arr[project][to_place]] != ''){ ?>
                                   <? echo $arr_t_topic[$arr[project][to_place]];?> (
                                   <?=$arr_t_province[$arr[project][to_place]];?>
      /
      <?=$arr_t_amphur[$arr[project][to_place]];?>
      )
      <? } ?>
                </div>
 
              </div>
            </li>
            <!-- END timeline item -->
			
			
            <!-- timeline time label -->
			<? if(1==0){ ?>
            <li class="time-label">
                  <span class="bg-green">
                    3 Jan. 2014
                  </span>
            </li>
			<? } ?>
            <!-- /.timeline-label -->
            <!-- timeline item -->
          
            <!-- END timeline item -->
            <!-- timeline item -->
    

     

 
 
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
 

<?
$i++;	
}
$db->closedb ();
?>  </div>  

 <? if($_GET[server]=="sssth"){ ?>

<script>
 
 
	/*
	var url_place_th = "go.php?name=load/all&file=all&server=th&day="+$("#date_report").val()+"";
	$('#load_th').show();
	$('#load_th').load('load/page/loading.php');
	$('#load_th').load(url_place_th); 
	*/
 
 
 
var url_place_cn = "go.php?name=load/all&file=all&server=cn&day="+$("#date_report").val()+"";
	$('#load_cn').show();
	$('#load_cn').load('load/page/loading.php');
	$('#load_cn').load(url_place_cn); 
	 
	//// cn
		
	//$('.loader').show();
  
</script>
<? } ?>
 