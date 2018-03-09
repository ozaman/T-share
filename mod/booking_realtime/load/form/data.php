 
 <script>
 
 
 
 
 
$('#btn_show_hide_data_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-up" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;ซ่อน</span>');
 
 
 
  $('#btn_show_hide_data_<?=$arr[project][invoice];?>').click(function() {
 
 ///// tool status
 var tool_status = $( "#table_show_hide_data_<?=$arr[project][invoice];?>" ).is(":hidden");
 
// $("#table_show_hide_data_<?=$arr[project][invoice];?>" ).show(); 
 
 if(tool_status==true){
	 
$("#table_show_hide_data_<?=$arr[project][invoice];?>" ).show(); 

 $('#btn_show_hide_data_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-up" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;ซ่อน</span>');
 
	 
 } else {
	 
	$("#table_show_hide_data_<?=$arr[project][invoice];?>" ).hide();  
	
 $('#btn_show_hide_data_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-down" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;แสดง</span>');
	
	 
 }
 
 
  });
 </script>
 
 
 
 
<div  class="box-bottom-line"  style="padding-top:10px;" 
><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td height="30" class="font-28 "><font color="<?=$text_topic_color?>" ><b> ข้อมูลช็อปปิ้ง</font></td>
      <td width="70" valign="top"><div id="btn_show_hide_data_<?=$arr[project][invoice];?>" class="font-24"></div></td>
    </tr>
  </tbody>
</table>
</div>
 


<table width="100%" border="0" cellpadding="1" cellspacing="5" style="display:nones" id="table_show_hide_data_<?=$arr[project][invoice];?>">
 
  <tr>
    <td width="120"  class="font-22"><font color="#333333"></font><b>เลขจอง</td>
    <td class="font-22"><?=$arr[project][invoice];?>
      &nbsp;&nbsp;</td>
  </tr>
  <tbody>
    <tr>
      <td  class="font-22"><font color="#333333"><b>วันที่ </td>
      <td class="font-22"><?=$arr[project][transfer_date];?>
        &nbsp;&nbsp;</td>
    </tr>
    <tr>
      <td    class="font-22"><font color="#333333"><b>เวลาถึง</td>
      <td class="font-22">
	  
	  
 
	  
 
	<? //=  $time_to= date('H:i',$arr[project][ondate_time]); ?>
    
    
 
	  
 
        <?=$arr[project][airout_h];?>:<?=$arr[project][airout_m];?>
 
 <div></td>
    </tr>
    <tr>
      <td  class="font-22"><font color="#333333" ><b>จำนวน</td>
      <td class="font-22"><?
 
	
	 if($arr[project][adult]>0){ ?>
        ผู้ใหญ่ :
        <?=$arr[project][adult];?>
        &nbsp;
        <? } ?>
        <? if($arr[project][child]>0){ ?>
        เด็ก :
        <?=$arr[project][child];?>
        <? } ?>
        <?
  	   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
            
                  $res[category] = $db->select_query("SELECT * FROM  web_country  where id=".$arr[project][nation]."  ORDER BY id  ");
                      
                       $arr[category] = $db->fetch($res[category]) ;
					   
  
  ?>
        </span></td>
    </tr>
    <tr>
      <td class="font-22"><font color="#333333" ><b>สัญชาติ&nbsp;<img src="images/flag/<?=$arr[category][name_en]?>.png" width="30" height="30" alt="" style="margin-top:-5px;"/></td>
      <td class="font-22"><span style="height:35px;">
        <?

					   
					   
					   echo $arr[category][name_th];
	 
	 ?>
      </span></td>
    </tr>
    <? if($data_user_class<>'Staxi'){ ?>
    <? } ?>
    <? if($data_user_class=='taxi'){ ?>
    <? } ?>
  </tbody>
</table>
