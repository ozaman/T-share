
 

 <div id="booking_action" style="display:nones"></div>
 
 
		<?
 
 
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
,outdate

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

,status

,driver_topoint
,driver_pickup
,driver_complete

,driver_topoint_date
,driver_pickup_date
,driver_complete_date
,product_area

";


 
 
 
 
 $daywork= $_GET[day];

if($_GET[day]==''){
	
	$_GET[day] = date('Y-m-d');
	
}
		 
		 
		 
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM  order_booking  where transfer_date='".$_GET[day]."' order by id desc  ");
	///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
	while($arr[project] = $db->fetch($res[project])){  
	
			mysql_query("SET NAMES utf8"); 
        $res[type] = $db->select_query("SELECT * FROM contact_phone_group where id= '".$arr[project][type]."'  ");
						
 
 $arr[type] = $db->fetch($res[type]);
 
 		$bgcolor = ($i++ & 1) ? '#FFFFFF' : '#F6F6F6'; 
 
	
	
	?>
  <script>
		 
	
 
	 
 

		 
  $("#booking_confirm_<?=$arr[project][id]?>").click(function(){ 
  

 
  var url_<?=$arr[project][id]?> = "popup.php?name=booking&file=savedata&action=confirm&type=driver&id=<?=$arr[project][id]?>";
 
 $('#booking_action').load(url_<?=$arr[project][id]?>); 
 
  $('#status_<?=$arr[project][id]?>').html('<font style="font-size:22; color:#339900"><b>CONFIRM</font>'); 
 
		 });
		 
 

		 
		 
		 </script>      
         
         
         
         
         
 <script>
		 
 
 

		 
  $("#booking_cancel_<?=$arr[project][id]?>").click(function(){ 
  
 
  var url_<?=$arr[project][id]?> = "popup.php?name=booking&file=savedata&action=cancel&type=driver&id=<?=$arr[project][id]?>";
 
 $('#booking_action').load(url_<?=$arr[project][id]?>); 
 
  $('#status_<?=$arr[project][id]?>').html('<font style="font-size:22; color:#FF0000"><b>CANCEL</font>'); 
 
		 });
		 
 

		 
		 
		 </script>      
         
         
         
 

   <div class="col-md-6" style="padding:0px;"> 
   <div style="padding:10px;   background:<? echo $bgcolor; ?>   ">
     <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="60" valign="top" style="display:none"> 
              
              
              
              
              
 
			  
			  
	    </td>
    <td class="font_16">
    
    <div style="padding-bottom:10px; ">
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="100"><div class="btn-group">
     
                 
      
      
                  <button type="button" class="btn btn-warning" style="height:40; padding-left:5px; padding-right:5px; " data-toggle="dropdown"><i class="fa fa-gear"></i>&nbsp;จัดการ</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="height:40; padding-left:5px; padding-right:5px; "  >
                    <span class="caret"></span>
      
                  </button>
                  <ul class="dropdown-menu" role="menu"  style="background-color:<?=$main_color?>">
                  
                 <li><a  href="?name=booking&file=edit&action=confirm&id=<?=$arr[project][id];?>"  style="color:#FFFFFF; font-size:18px"><i class="fa fa-edit"></i>แก้ไข</a></li>
  
                  
                  
                  
                    <li><a  id="booking_confirm_<?=$arr[project][id]?>" class="font_20" style="color:#FFFFFF; font-size:18px"><i class="fa fa-check-square"></i>ยืนยัน</a></li>
                    
                       <li><a id="booking_cancel_<?=$arr[project][id]?>" class="font_20" style="color:#FFFFFF; font-size:18px"><i class="fa fa-trash"></i>ยกเลิก</a></li>
                       
                       
 <li><a id="booking_cancel_<?=$arr[project][id]?>" class="font_20" style="color:#FFFFFF; font-size:18px"><i class="fa fa-trash"></i>ยกเลิก</a></li> 
                 
      
      
               
                    
 
                  </ul>
              </div></td>
      <td id="status_<?=$arr[project][id]?>"><font color=""></font>
	 
     <font style="font-size:22; color:<? 
	 
	 
	                   if($arr[project][status] == "CANCEL" ) { 
                          echo "#ff0000" ;
                        }
	 
                        /////////////
                        if($arr[project][status] == "NEW" ) { 
                          echo "#0099CC" ;
                        }
                        /////////////
                        if($arr[project][status] == "CONFIRM" ) {
                          echo "#339900" ;
                        }?>">
     
     <b> <?=$arr[project][status]?>
      
      </td>
    </tr>
  </tbody>
</table>

              
    
    </div>
    
    
    
    
    <b>
      <div style="font-size:14px; color:#009999; padding-bottom:10px; ">
        <div  align="left" style="font-size:18px;padding-bottom:10px; "> <font color="#999999" ><i class="fa  fa  fa-map-marker"></i></font>&nbsp;&nbsp;<b><? echo $arr[project][name_pickup_place] ?><br>
        
        <div style="display:none">
          <font color="#666666" class="font_14"> (<? echo $arr[project][name_pickup_place_area] ?> | <? echo $arr[project][name_pickup_place_province] ?>)       <div>
          
          
          </div>
      </div>
    <div style="padding-bottom:3px; ">
      <table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tbody>
          <tr>
            <td width="110"  class="font_16"><font color="#999999"><i class="fa  fa-clock-o"></i></font>&nbsp;<b>วันที่/เวลาส่ง</td>
            <td class="font_16"><?=$arr[project][outdate];?>&nbsp;&nbsp;<?=$arr[project][airout_time];?></td>
          </tr>
          <tr>
            <td  class="font_16"><font color="#999999" ><i class="fa  fa-user"></i></font>&nbsp;&nbsp;<b>จำนวนแขก</td>
            <td class="font_16"> 
              <?
 
	
	 if($arr[project][adult]>0){ ?>
ผู้ใหญ่ :
<?=$arr[project][adult];?>&nbsp;
<? } ?>
<? if($arr[project][child]>0){ ?>
เด็ก :
<?=$arr[project][child];?>
<? } ?>
<? if($arr[project][baby]>0){ ?>
ทารก :
<?=$arr[project][baby];?>
<? } ?>
            </span></td>
          </tr>
          <tr>
            <td class="font_16"><font color="#999999" ><i class="fa  fa-flag"></i></font>&nbsp;&nbsp;<b>สัญชาติ</td>
            <td><span style="height:35px;"><img src="images/flag/China Flag.png" width="20" alt="" style="margin-top:-5px;"/> จีน</span></td>
          </tr>
        </tbody>
      </table>
  </div> 
      </td>
    </tr>
</table>
  
     </div>
     </div>
	 
	 
	 
	 
 <? } ?>  
  