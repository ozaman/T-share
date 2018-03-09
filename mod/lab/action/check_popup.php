
  <div class="modal fade"  id="popup_chk_guest_<?=$arr[project][id];?>" role="dialog"   aria-labelledby="myModalLabel"  title="เช็คชื่อแขก"   >

 <div class="modal-dialog"  >

            <!-- Modal  class="modal fade" content-->
            <div class="modal-content" style="padding:5px; border-radius: 15px;" > 
                    <h4 class="modal-title" style="font-size:26px; height:15px;   font-family:Arial, Helvetica, sans-serif; text-transform:uppercase"><center><b>เช็คชื่อแขก</b></center></h4>
 
                <div class="modal-body" >  
<table  style="width:100% " >
          
									<tr style=" display:none<? if($chk_logo==1){echo "show";} ?>">
                                       <td colspan="2"><div  align="left">
									   <? if($chk_logo==1){ ?>
									   <img src="../admin/file/logo/crop/<?=$arr[project][agent];?>.jpg" name="view01" height="80" border="0"       />
									   <br />
									   <? } ?>
									   </div></td>
                                    </tr>
									<tr>
                                       <td  ><div class="topictransfer">เอเย่นต์</div></td>
                                       
                                    </tr>
									<tr>
									  <td class="gay5"><?echo $arr[showlogo][company];?></td>
			    </tr>
									<tr>
                                       <td class="gay5"><div class="topictransfer">ชื่อแขก</div></td>
                                    </tr>
									<tr>
									  <td class="gay5"><? echo $arr[project][guest_name];?></td>
			    </tr>
									<tr>
                                       <td class="gay5"><div class="topictransfer">เบอร์โทรศัพท์แขก</div></td>
                                    </tr>
									<tr>
									  <td class="gay5"><? echo $arr[project][guest_phone];?></td>
			    </tr>
									<tr>
                                       <td class="gay5"><div class="topictransfer">วอเชอร์</div></td>
                                    </tr>
									<tr>
									  <td class="gay5"><?echo $arr[project][invoice];?></td>
			    </tr>
									<tr>
                                       <td class="red5"><div class="topictransfer">หมายเหตุ</div></td>
                                    </tr>
									<tr>
									  <td class="red5"><?echo $arr[project][remark];?></td>
			    </tr> 
                          
            </table>
 
                </div>
                <div class="modal-footer">
				                 
<center>
					 <button type="button" class="btn-modal-no" data-dismiss="modal" data-backdrop="static" >ไม่ถูกต้อง</button>&nbsp;
					 
					 <button type="button" class="btn-modal-ok"   data-dismiss="modal"  style="background-color:<?=$ok_button_color?> "    id="btn_guest_yes_<? echo $arr[project][id];?>" data-target="#popup_confirm_guest_<?=$arr[project][id];?>" data-toggle="modal" data-backdrop="static" data-keyboard="false">ถูกต้อง</button>
					 
 </center>
                </div>
            </div>
        </div>
 
</div>	


<!--  End Guest -->						
 
  <div   class="modal fade" id="popup_chk_no_guest_<?=$arr[project][id];?>" role="dialog"   aria-labelledby="myModalLabel"  title="เช็คชื่อแขก"   >

 <div class="modal-dialog"  >

            <!-- Modal  class="modal fade" content-->
            <div class="modal-content" style="padding:5px; " > 
                    <h4 class="modal-title" style="font-size:26px; height:15px;   font-family:Arial, Helvetica, sans-serif; text-transform:uppercase"><center><b>สาเหตุที่ไม่เจอแขก</b></center></h4>
 
                <div class="modal-body" >  
		   <form id="frmUpload" action="popup.php?name=action&file=upload_pic" method="post" enctype="multipart/form-data"   target="uploadtarget">
<table border="0"  style="width:100%; ">
	<tr>
		<td><div class="topictransfer">สาเหตุ</div> 
		  <select name="driver_remark_noguest" id="driver_remark_noguest"  class="form-control" >
	  <option value="0">---- กรุณาเลือกสาเหตุที่ไม่เจอแขก ----</option>
  <?
  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[remark_noguest] = $db->select_query("SELECT * FROM web_driver_remark WHERE status='1' and type = '2' ");
while($arr[remark_noguest] = $db->fetch($res[remark_noguest])){
?>	
	  <option value="<?=$arr[remark_noguest][id];?>"><?=$arr[remark_noguest][topic_th];?></option>
  <? } ?>	
            </select>		</td>
	</tr>
	<tr>
		<td><div class="topictransfer">ระบุสาเหตุอื่น ๆ </div>
		
		

		
		
		
		<input class="form-control"  type="text"  name="driver_remark_noguest_other" id="driver_remark_noguest_other"/></td>
	</tr>
	<tr>
		<td><div class="topictransfer">รูปภาพประกอบ (ถ้ามี)</div> 
	    <div style="padding-bottom:5px; "><input type="file" class="form-control" name="driver_remark_noguest_file_1" id="driver_remark_noguest_file_1" /></div>
		<div style="padding-bottom:5px; "><input type="file" class="form-control" name="driver_remark_noguest_file_2" id="driver_remark_noguest_file_2" /></div>
		<div style="padding-bottom:5px; "><input type="file" class="form-control" name="driver_remark_noguest_file_3" id="driver_remark_noguest_file_3" /></div>
		<div style="padding-bottom:5px; "><input type="file" class="form-control" name="driver_remark_noguest_file_4" id="driver_remark_noguest_file_4" /></div>
		<div style="padding-bottom:5px; "><input type="file" class="form-control" name="driver_remark_noguest_file_5" id="driver_remark_noguest_file_5" /></div>
		<div style=" display:none "><input id="btn_upload" type="submit"  class="btn btn-primary"   data-backdrop="static" value="อัพโหลด">
		<input  name="vc"  type="text" class="form-control" id="vc" value="0"/></div></td>
	</tr>
</table>
</form>
</div> 

 
                <div class="modal-footer">
				                 <center>

					 <button type="button" class="btn-modal-no" data-dismiss="modal" data-backdrop="static" >ปิด</button>
					 <button type="button" class="btn-modal-ok"   data-target="#popup_confirm_no_guest_<?=$arr[project][id];?>" data-toggle="modal" data-backdrop="static" data-keyboard="false"  id="btn_guest_no_<? echo $arr[project][id];?>">บึนทึกข้อมูล</button></center>
 
                </div>
            </div>
        </div>
 
</div>	










<div    class="modal fade" id="popup_topoint_<?=$arr[project][id];?>" role="dialog"   aria-labelledby="myModalLabel"    >

 <div class="modal-dialog"  >

            <!-- Modal  class="modal fade" content-->
            <div class="modal-content" style="padding:5px;border-radius: 15px;  " > 
			
			<div style="font-size:140px; color:#999999; padding-top:20px;"><center><i class="fa   fa-automobile"></i></center></div>
			
			
			
                    <h4 class="modal-title" style="font-size:30px; height:15px;   font-family:Arial, Helvetica, sans-serif; text-transform:uppercase">
					
					
					<center><b> คุณแน่ใจหรือไม่</b></center></h4>
 
                <div class="modal-body" >  
		  
		<center>
<div style="padding:2px; font-size:22px; margin-top:20px; color:#999999 ">ว่ารถมาถึงสนามบินแล้ว</div>

<div style="padding:2px; font-size:22px; margin-top:10px; margin-bottom:10px; color:#000000 ">กรุณาเลือกจุดรับแขก</div>
<select name="terminal<?=$arr[project][id];?>"   id="terminal<?=$arr[project][id];?>"    style="font-size:30px; padding-bottom: 1px; background-color:#FFFDE9; height:40px; width:250px;" chosen width="'100%'">
  <option value="old" >อาคารเก่า</option>
  <option value="new"  selected>อาคารใหม่</option>
    
  </select>


</div> 

 
                <div class="modal-footer" style="margin-top:-10px;">
				       <center>
					 <button type="button" class="btn btn-modal-no" data-dismiss="modal" data-backdrop="static" >ไม่แน่ใจ</button>
					 <button type="button" class="btn btn-modal-ok"   data-dismiss="modal" data-backdrop="static" id="btn_confirm_topoint_<? echo $arr[project][id];?>" >แน่ใจ</button>
 </center>          
                </div>
            </div>
        </div>
 
</div>	



 
</div>

























<div    class="modal fade" id="popup_complete_<?=$arr[project][id];?>" role="dialog"   aria-labelledby="myModalLabel"    >

 <div class="modal-dialog"  >

            <!-- Modal  class="modal fade" content-->
            <div class="modal-content" style="padding:5px;border-radius: 15px;  " > 
			
			<div style="font-size:140px; color:#999999; padding-top:20px;"><center><i class="fa   fa-automobile"></i></center></div>
			
			
			
                    <h4 class="modal-title" style="font-size:30px; height:15px;   font-family:Arial, Helvetica, sans-serif; text-transform:uppercase">
					
					
					<center><b> คุณแน่ใจหรือไม่</b></center></h4>
 
                <div class="modal-body" >  
		  
		<center><div style="padding:2px; font-size:22px; margin-top:20px; color:#999999 ">ว่ามาถึงสถานที่ส่งแขกแล้ว</div>
		  
		  
</div> 

 
                <div class="modal-footer" style="margin-top:-10px;">
				       <center>
					 <button type="button" class="btn btn-modal-no" data-dismiss="modal" data-backdrop="static" >ไม่แน่ใจ</button>
					 <button type="button" class="btn btn-modal-ok"   data-dismiss="modal" data-backdrop="static" id="btn_confirm_complete_<? echo $arr[project][id];?>" >แน่ใจ</button>
 </center>          
                </div>
            </div>
        </div>
 
</div>	



 
</div>





















<div    class="modal fade" id="popup_confirm_guest_<?=$arr[project][id];?>" role="dialog"   aria-labelledby="myModalLabel"    >

 <div class="modal-dialog"  >

            <!-- Modal  class="modal fade" content-->
            <div class="modal-content" style="padding:5px;border-radius: 15px;  " > 
			
			<div style="font-size:140px; color:#999999; padding-top:20px;"><center><i class="fa   fa-users"></i></center></div>
			
			
			
                    <h4 class="modal-title" style="font-size:30px; height:15px;   font-family:Arial, Helvetica, sans-serif; text-transform:uppercase">
					
					
					<center><b> คุณแน่ใจหรือไม่</b></center></h4>
 
                <div class="modal-body" >  
		  
		<center><div style="padding:2px; font-size:22px; margin-top:20px; color:#999999 ">ว่าเช็คชื่อแขกถูกต้องแล้ว</div>
		  
		  
</div> 

 
                <div class="modal-footer" style="margin-top:-10px;">
				       <center>
					 <button type="button" class="btn btn-modal-no" data-dismiss="modal" data-backdrop="static"  id="btn_close_guest_<? echo $arr[project][id];?>">ไม่แน่ใจ</button>
					 <button type="button" class="btn btn-modal-ok"     data-dismiss="modal"  data-backdrop="static" id="btn_confirm_guest_<? echo $arr[project][id];?>" >แน่ใจ</button>
 </center>          
                </div>
            </div>
        </div>
 
</div>	



 
</div>















<div    class="modal fade" id="popup_confirm_no_guest_<?=$arr[project][id];?>" role="dialog"   aria-labelledby="myModalLabel"    >

 <div class="modal-dialog"  >

            <!-- Modal  class="modal fade" content-->
            <div class="modal-content" style="padding:5px;border-radius: 15px;  " > 
			
			<div style="font-size:140px; color:#999999; padding-top:20px;"><center><i class="fa   fa-users"></i></center></div>
			
			
			
                    <h4 class="modal-title" style="font-size:30px; height:15px;   font-family:Arial, Helvetica, sans-serif; text-transform:uppercase">
					
					
					<center><b> คุณแน่ใจหรือไม่</b></center></h4>
 
                <div class="modal-body" >  
		  
		<center><div style="padding:2px; font-size:22px; margin-top:20px; color:#999999 ">ว่าไม่เจอแขก</div>
		  
		  
</div> 

 
                <div class="modal-footer" style="margin-top:-10px;">
				       <center>
					 <button type="button" class="btn btn-modal-no" data-dismiss="modal" data-backdrop="static" id="btn_no_no_guest_<? echo $arr[project][id];?>" >ไม่แน่ใจ</button>
					 <button type="button" class="btn btn-modal-ok"   data-dismiss="modal" data-backdrop="static" id="btn_confirm_no_guest_<? echo $arr[project][id];?>" >แน่ใจ</button>
 </center>          
                </div>
            </div>
        </div>
 
</div>	



 
</div>
















<!--  End Guest -->						
 
  <div   class="modal fade" id="popup_change_<?=$arr[project][id];?>" role="dialog"   aria-labelledby="myModalLabel"  title="เช็คชื่อแขก"   >

 <div class="modal-dialog"  style="width:300px"  >

            <!-- Modal  class="modal fade" content-->
            <div class="modal-content" style="padding:5px;border-radius: 10px;  " > 
 
 
                 <div class="modal-body" id="data_popup_<?=$arr[project][id];?>"  style="margin-top:-30px; ">   
 
</div> 

 
                <div class="modal-footer"  style="margin-top:-10px; ">
				                 <center>

					 <button type="button" class="btn-modal-no" data-dismiss="modal" data-backdrop="static" >ปิด</button>
					 <button type="button" class="btn-modal-ok"   data-target="#popup_confirm_edit_<?=$arr[project][id];?>" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-dismiss="modal"   id="btn_guest_no_<? echo $arr[project][id];?>">บึนทึกข้อมูล</button></center>
 
                </div>
            </div>
        </div>
 
</div>	











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


<div    class="modal fade" id="popup_confirm_edit_<?=$arr[project][id];?>" role="dialog"   aria-labelledby="myModalLabel"    >

 <div class="modal-dialog"  style="width:300px"  >

            <!-- Modal  class="modal fade" content-->
            <div class="modal-content" style="padding:5px;border-radius: 10px;  " > 
			
			<div style="font-size:140px; color:#999999; padding-top:20px;"><center><i class="fa   fa-users"></i></center></div>
			
			
			
                    <h4 class="modal-title" style="font-size:30px; height:15px;   font-family:Arial, Helvetica, sans-serif; text-transform:uppercase">
					
					
					<center><b> คุณแน่ใจหรือไม่</b></center></h4>
 
                <div class="modal-body" >  
		  
		<center><div style="padding:2px; font-size:22px; margin-top:20px; color:#999999 ">ว่าต้องการเปลี่ยนแปลงงาน</div>
		  
		  
</div> 

 
                <div class="modal-footer" style="margin-top:-10px;">
				       <center>
<button type="button" class="btn btn-modal-no" data-dismiss="modal" data-backdrop="static" id="btn_no_no_guest_<? echo $arr[project][id];?>" >ไม่แน่ใจ</button>
<button type="button" class="btn btn-modal-ok"   data-dismiss="modal" data-backdrop="static" id="btn_confirm_change_<? echo $arr[project][id];?>" >แน่ใจ</button>
 </center>          
                </div>
            </div>
        </div>
 
</div>