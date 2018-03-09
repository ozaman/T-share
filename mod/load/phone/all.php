 
		<?
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[private_phone] = $db->select_query("SELECT * FROM  contact_phone_driver  where driver_id= '".$user_id."' ");
	///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
	while($arr[private_phone] = $db->fetch($res[private_phone])){  
	
			mysql_query("SET NAMES utf8"); 
        $res[type] = $db->select_query("SELECT * FROM contact_phone_group where id= '".$arr[private_phone][type]."'  ");
						
 
 $arr[type] = $db->fetch($res[type]);
 
 		$bgcolor = ($i++ & 1) ? '#FFFFFF' : '#F6F6F6'; 
 
	
	
	?>
	
 
   <div class="col-md-3">
   <div style="padding:10px; margin-left:-20px; background:<? echo $bgcolor; ?>   ">
   <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="80"><div class="btn-group">
                  <button type="button" class="btn btn-warning" style="height:60; padding-left:5px; padding-right:5px; " data-toggle="dropdown">จัดการ</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="height:60; padding-left:5px; padding-right:5px; "  >
                    <span class="caret"></span>
      
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="tel:<?=$arr[private_phone][phone];?>" id="call_<?=$arr[private_phone][id]?>"><i class="fa fa-phone"></i>โทรออก</a></li>
                    <li><a  id="edit_<?=$arr[private_phone][id]?>" data_id="<?=$arr[private_phone][id];?>" class="list-phone-edit" data-toggle="modal" data-target="#form_edit_phone"><i class="fa fa-edit"></i>แก้ไข</a></li>
                    <li><a id="delete_<?=$arr[private_phone][id]?>" data_id="<?=$arr[private_phone][id];?>"  data_phone="<?=$arr[private_phone][phone];?>"class="list-phone-delete"><i class="fa fa-trash"></i>ลบ</a></li>
 
                  </ul>
              </div>
			  
			  
	    </td>
    <td class="font_16"><b><div style="padding-bottom:3px; "><?=$arr[private_phone][name];?></div></b><?=$arr[private_phone][phone];?>	<div style="font-size:14px; color:#009999 "><?=$arr[type][name]?></div> </td>
    </tr>
</table>
  
     </div>
     </div>
	 
	 
	 
	 
 <? } ?>  
  <script>
$(".list-phone-edit").click(function(){
var data_id = $(this).attr("data_id");
///alert(data_id);

	   var url_phone = "go.php?name=load/phone&file=edit&id="+data_id;
 
 $('#load_phone_edit').load(url_phone); 


 });
 
  $("#submit_phone_edit").click(function(){ 
//$('#file_upload_line').click();
 
 
if(document.getElementById('phone').value=="") {
document.getElementById('phone').focus() ; 
swal('กรุณากรอกเบอร์โทรศัพท์'); 

return false ;
}

if(document.getElementById('name').value=="") {
document.getElementById('name').focus() ; 
swal('กรุณากรอกชื่อผู้ติดต่อ'); 
return false ;
}

if(document.getElementById('type').value=="") {
document.getElementById('type').focus() ; 
swal('กรุณาเลือกกลุ่ม'); 
return false ;
}



 
 $.post('popup.php?name=user&file=savedata&type=phone_edit&id=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   $('#send_user_data_edit').html(response);
  });
  
 
 
  
 });
	   
 
 
   </script>  
   
   
    <form id="edit_form"  name="edit_form"  method="post" enctype="multipart/form-data"   >
  
 
  <div class="modal fade"  id="form_edit_phone" role="dialog"   aria-labelledby="myModalLabel"    >
        <div class="modal-dialog modal-sm"  >

            <!-- Modal content-->
            <div class="modal-content" style="padding:5px; " > 
 
                    <h4 class="modal-title" style="font-size:26px; height:15px;   font-family:Arial, Helvetica, sans-serif; text-transform:uppercase"><center><b>แก้ไขเบอร์โทรศัพท์</b></center></h4>
 
                <div class="modal-body"  id="load_phone_edit"  >  
				 
           </div>
		   
		   <div id="send_user_data_edit"> </div>
                <div class="modal-footer pad_top_5">
				 
					 <button type="button" class="btn btn-primary" data-dismiss="modal"  data-id="55"   id="submit_phone_edit">บันทึกข้อมูล</button>
					 <button type="button" class="btn btn-default" data-dismiss="modal" data-backdrop="false" id="btnbtclose">ปิด</button>
 
                </div>
            </div>
        </div>
    </div>


 
  
 
<style>
 .iframemap {
 
  
    border: none;
    top: 0; right: 0;
    bottom: 0; left: 0;
    width: 100%;
    height: 100%;
}
 
 </style> 
 </form>
 
 
 
 <script>
$(".list-phone-delete").click(function(){
 
 var data_id = $(this).attr("data_id");
  var data_phone = $(this).attr("data_phone");
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่" ,
		text: "ว่าต้องการลบเบอร์โทรศัพท์&nbsp;"+data_phone ,
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#339933',
		confirmButtonText: 'ต้องการ',
		cancelButtonText: "ไม่ต้องการ",
		// timer: 2000,
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
		type: "success",
      swal("Amend Complete!", "Your Voucher No.<? echo $arr[news][id];?> has been Amend!", "success");
	  
  var url_phone = "popup.php?name=user&file=savedata&type=phone_delete&id="+data_id;
 
 $('#load_phone_data').load(url_phone); 
	 
	 
    } else {
    swal("ไม่", "ยกเลิกการลบเบอร์โทรศัพท์", "error");
     }
	});
 
});
 

</script>