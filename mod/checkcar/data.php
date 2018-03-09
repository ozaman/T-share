<style type="text/css">
<!--
.topicname { padding-top:10px; padding-left:0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #666666 ; text-align:left;  
 
}
 

 
-->
</style>  <?
        $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $res[other] = $db->select_query("SELECT * FROM " . TB_carall . "  where  id=".$carnumber."");
  
    $arr[other] = $db->fetch($res[other]);
            $res[aum]   = $db->select_query("SELECT * FROM " .TB_carall_type." WHERE id='" . $arr[other][car_type] . "' ");
            $arr[aum]   = $db->fetch($res[aum]);
 
 
			
			
			
			if($arr[aum][topic_en]=='Car'){
			$arr[aum][topic_en]='รถเก๋ง';
			}
			if($arr[aum][topic_en]=='Van'){
			$arr[aum][topic_en]='รถตู้';
			}
			
			
            //$res[cartype] = $db->select_query("SELECT * FROM ".TB_carall." WHERE id='".$arr[category][car_type]."' ");
            //$arr[cartype] = $db->fetch($res[cartype);
            $res[admin] = $db->select_query("SELECT * FROM " . TB_admin . " WHERE id='" . $arr[other][company] . "' ");
            $arr[admin] = $db->fetch($res[admin]);
 
         //  
  
     
?>

 <div class="box box-default">
 
   <div class="box-header with-border">
          <h2 class="box-title"><span class="font_28"><b>ข้อมูลและประกันภัยรถ</b></span></h2>
 
   </div>
     <div class="box-body"  style="margin-top:-10px; padding 0px">
     <table width="100%" cellpadding="1" cellspacing="2"  style="margin-left:0px;  margin-right: 0px; margin-top:10px;box-shadow: 0px -5px 10px #B4B4B4;" >
       <?

if($_GET[company_tran] == ''){
	$_GET[company_tran] = 283;
}

if($_GET[company_tran] != ''){
	
	$company_tran = " and company = '".$_GET[company_tran]."' ";

}

if($_GET[status] != ''){
	
	$status = " and status = '".$_GET[status]."' ";

}



 

	$res[category] = $db->select_query("SELECT * FROM ".TB_admin." WHERE id='".$arr[other][company]."' ");
	$arr[category] = $db->fetch($res[category]);

	$res[car_type] = $db->select_query("SELECT * FROM ".TB_carall_type." WHERE id='".$arr[other][car_type]."' ");
	$arr[car_type] = $db->fetch($res[car_type]);


 





	//Comment Icon
 

?>
       <? if($arr[other][plate_color]=="Green"){
	 
	 $plate_color="009999"; } ?>
       <? if($arr[other][plate_color]=="Yellow"){
	 
	 $plate_color="FFCC00"; } ?>
       <? if($arr[other][plate_color]=="Black"){
	 
	 $plate_color="FFFFFF"; } ?>
       <? if($arr[other][plate_color]=="Red"){
	 
	 $plate_color="FF0000"; } ?>
  <td width="80" align="center" bgcolor="#<?=$plate_color?>" style="border: solid 1px; color:#CCCCCC; padding:5px;"><font color="#<? if($arr[other][plate_color]=="Green"){
	 
	 echo "FFFFFF"; } ?>"  class="font_38"><b><? echo $arr[other][plate_num];?><br>
              <font   class="font_22"><? echo $arr[other][province];?></font></b></font></td>
  </tr>
  <?

 

?>
     </table> 
<form id="edit_form"  name="edit_form" action="popup.php?name=checkcar/file&file=upload_pic&type=repair" method="post" enctype="multipart/form-data"   target="uploadtarget">

 <!-- iCheck -->
 
		          
			      
 
                    <div class="topicname" style="display:none "><i class="fa  fa-wrench"></i>&nbsp;รายการตรวจเช็ค</div>
                    <table width="100%"  border="0" cellspacing="2" cellpadding="2"  style="display:none ">
                      <tr>
					   <td style="width:150px; height:50px; "> 
 
<input name="GroupedSwitches"  type="checkbox" id="TheCheckBox2" value="1" data-off-text="ชำรุด" data-on-text="สมบูรณ์"   >
 
			 
			 </td>
			 
                        <td style="padding-bottom:10px; font-size:22px; font-weight:bold; padding-left:10px; ">หม้อน้ำ</td>
					  </tr>
						 
						  <tr>
                   <td style="width:150px; height:50px; "> 
						<input name="GroupedSwitches"  type="checkbox" id="TheCheckBox2" value="1" data-off-text="ชำรุด" data-on-text="สมบูรณ์"   ></td>
						
                        <td style="padding-bottom:10px; font-size:22px; font-weight:bold;padding-left:10px;">น้ำมันเครื่อง</td>
                      
						</tr>
						
						<tr>
						<td style="width:150px; height:50px; "> 
						 
						 <input name="GroupedSwitches"  type="checkbox" id="TheCheckBox2" value="1" data-off-text="ชำรุด" data-on-text="สมบูรณ์"   ></td>
                        <td style="padding-bottom:10px; font-size:22px; font-weight:bold;padding-left:10px; ">ลมยาง</td>
						</tr>
						<tr>
						
                      <td style="width:150px; height:50px; "> 
					  
					  <input name="GroupedSwitches"  type="checkbox" id="TheCheckBox2" value="1" data-off-text="ชำรุด" data-on-text="สมบูรณ์"   ></td>
						  <td style="padding-bottom:10px; font-size:22px; font-weight:bold;padding-left:10px; ">ที่ปัดน้ำฝน</td>
                        
                      </tr>
                    </table>
 
 <div class="topicname"  style="display:none "><i class="fa  fa-automobile"></i>&nbsp;ข้อมูลรถ</div><table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td class="font_22"> 
 
            
   </td>
  </tr>
  <tr>
    <td>
	
	<style>
	.tdtable  td {height:30px;}
	
	</style><br>

	<table width="100%"  border="0" cellspacing="2" cellpadding="2"  class="tdtable">
      <tr>
        <td width="80"  class="font_18"><strong>ประเภท</strong></td>
        <td  class="font_18"><? echo "" . $arr[aum][topic_en] . "  (" . $arr[other][car_num] . ") "; ?></td>
      </tr>
      <tr>
        <td  class="font_18"><strong>บริษัท</strong></td>
      <td  class="font_18"><?= $arr[admin][company] ?>
        &nbsp;</td>
      </tr>
      <tr>
        <td class="font_18"><strong>ยี่ห้อ</strong></td>
      <td class="font_18"><?echo $arr[other][car_brand];?></td>
      </tr>
      <tr>
        <td class="font_18"><strong>รุ่น</strong></td>
        <td class="font_18"><?echo $arr[other][car_sub_brand];?></td>
      </tr>
      <tr>
         
      </tr>
    </table>
	<br></td>
  </tr>
</table> 


              
			  <div class="topicname"><i class="fa  fa-automobile"></i>&nbsp;บริษัทประกันภัย</div>
			  <div class="font_18"><?=$arr[other][insure_company];?>
			  
			                      <div class="topicname"><i class="fa  fa-wrench"></i>&nbsp;หมายเลขประกันภัย</div>
								 
								   <div class="font_18"><?=$arr[other][insure_num];?></div>
                                 
                                  <div class="topicname"><i class="fa  fa-phone"></i>&nbsp;เบอร์โทรศัพท์ประกันภัย</div>
								   <div class="font_30"><b><?=$arr[other][insure_phone];?></b> </div>

 

			 
			  
			  
		 
					
			  
			  
		   
					
   
 
		
		 
 
		 
 
 
 
 

  
  <div  id="send_user_data"></div>
  
  
    <div style="margin-top:10px;"  > </div>
        
  </div>
  
    <!----- ปิด row-->
   
  </div>
     </div>  
  	
 	 
  <script>
     
 /// check login

$("#submit_data").click(function(){ 
 
 
 
if(document.getElementById('detail').value=="") {
swal('กรุณากรอกรายละเอียด'); 
document.getElementById('detail').focus() ; 
return false ;
}


 $('#file_upload_submit').click();
 
 $.post('popup.php?name=checkcar&file=savedata&type=repair&id=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   $('#send_user_data').html(response);
  });
  
  
 });
 </script> 
 
 <iframe id="uploadtarget" name="uploadtarget" src="" style="width:1px;height:1px;border:0"></iframe>
 </form> 
 