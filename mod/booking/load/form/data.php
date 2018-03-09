 
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
 
<?
 if($arr[project][status]=='CONFIRM'){ 
 
 $status_show=1;
 }

?>
 
 
 
 
 
<div  class="box-bottom-line"  style="padding-top:10px;" 
><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td height="30" class="font-28 "><font color="<?=$text_topic_color?>" ><b> ข้อมูลการจอง</font></td>
      <td width="80" valign="top" align="right"><div id="btn_show_hide_data_<?=$arr[project][invoice];?>" class="font-28 hidden-click"></div></td>
    </tr>
  </tbody>
</table>
</div>
 


<table width="100%" border="0" cellpadding="1" cellspacing="3" style="display:nones" id="table_show_hide_data_<?=$arr[project][invoice];?>">
 
  <tr>
    <td width="100"  class="font-22"><font color="#333333"></font><b>เลขจอง</td>
    <td class="font-22"><strong><?=$arr[project][invoice];?></strong>
      &nbsp;&nbsp;</td>
  </tr>
  <tbody>
    <tr>
      <td  class="font-22"><font color="#333333"><b>วันที่ </td>
      <td class="font-22"><strong><?=$arr[project][transfer_date];?></strong>
        &nbsp;&nbsp;</td>
    </tr>
    <tr>
      <td    class="font-22"><font color="#333333"><b>เวลาถึง</td>
      <td class="font-22">
	  
	  
 
	  
 
	<? //=  $time_to= date('H:i',$arr[project][ondate_time]); ?>
    
    
 
	  
 
       <strong> <?=$arr[project][airout_h];?>:<?=str_pad($arr[project][airout_m], 2, '0', STR_PAD_LEFT)." น.";?></strong>
 
 </td>
    </tr>
    <tr>
      <td  class="font-22"><font color="#333333" ><b>จำนวน</td>
      <td class="font-22"><strong><?
 
	
	 if($arr[project][adult]>0){ ?>
        ผู้ใหญ่ :
        <?=$arr[project][adult];?>
        &nbsp;
        <? } ?>
        <? if($arr[project][child]>0){ ?>
        เด็ก :
        <?=$arr[project][child];?>
        <? } ?>
        
        </strong>
 </td>
    </tr>
    <tr style="display:none<?=$status_show?>">
      <td  class="font-22"><font color="#333333" ><b>ชื่อแขก</td>
      <td class="font-22">
	  
	  <? if($arr[project][guest_name]<>''){ ?>
	    <?=$arr[project][guest_name];?>
        
        <? } if($arr[project][guest_name]==''){ ?>
        

        
        <font color="#FF0C10">ดูในพาสปอร์ต
	          <? } ?>
	  
	</td>
    </tr>

    <tr style="display:none<?=$status_show?>">
      <td class="font-22"><font color="#333333" ><b>สัญชาติ&nbsp;<img src="images/flag/<?=$arr[category][name_en]?>.png" width="30" height="30" alt="" style="margin-top:-5px;"/></td>
      <td class="font-22"><span style="height:35px;">
        <?

  echo $arr[category][name_th];
	 
	 ?>
      </span></td>
    </tr>
    
    
 
     <? if($arr[project][passport_pic]==0){ ?>
        <tr style="display:none<?=$status_show?>">
      <td  class="font-22"><font color="#333333" ><b>พาสปอร์ต</td>
      <td class="font-22">
 
      
      <font color="#FF0000" >
      ไม่มีภาพถ่าย
      
 
      </td>
    </tr>
    
        <? } ?>
    
    
    
 
  </tbody>
</table>
