 
  
   <form id="frmUpload" action="popup.php?name=load/qrcode&file=upload" method="post" enctype="multipart/form-data" onsubmit="return clickupload<?=$_GET[type] ?>();" target="uploadtarget<?=$_GET[type] ?>">
  
 
  <div  class="modal fade" id="showmap<?=$_GET[type] ?>" role="dialog"   aria-labelledby="myModalLabel"    >
        <div class="modal-dialog modal-sm"  >

            <!-- Modal content-->
            <div class="modal-content" style="padding:5px; " > 
 
                    <h4 class="modal-title" style="font-size:26px; height:15px;   font-family:Arial, Helvetica, sans-serif; text-transform:uppercase"><center><b>qr code <?=$_GET[type] ?></b></center></h4>
 
                <div class="modal-body" > 
<script language="javascript">
function clickupload<?=$_GET[type] ?>() {
  
   var imgVal = $('#fileupload<?=$_GET[type] ?>').val(); 
        if(imgVal=='') 
        { 
alert( 'กรุณาเลือกไฟล์ที่ต้องการอัพโหลด' ) 
		  
return false ;
        } 
 document.getElementById('btnbtclose<?=$_GET[type] ?>').click();
alert('อัพโหลดสำเร็จ'); 
		
		

 

/*
if ( document.getElementById('fileupload').value=="")
{
 swal( 'ระบุ File ที่ Upload' ) ;
return false ;
}
*/


 ///swal('อัพโหลดสำเร็จ'); 
 
///$('#showmap<?=$_GET[type] ?>').modal('hide');
 //$('#showmap<?=$_GET[type] ?>').modal('hide');

    	var url_<?=$_GET[type] ?>= "popup.php?name=load/qrcode&file=button&userid=<?=$arr[web_user][post_date];?>&type=<?=$_GET[type] ?>";
$('#pic_<?=$_GET[type] ?>').load(url_<?=$_GET[type] ?>);
    	var url_popup_<?=$_GET[type] ?> = "popup.php?name=load/qrcode&file=pic&userid=<?=$arr[web_user][post_date];?>&type=<?=$_GET[type] ?>";
$('#popup_<?=$_GET[type] ?>').load(url_popup_<?=$_GET[type] ?>);
 
// $('#btnbtclose<?=$_GET[type] ?>').click();

}
</script>
 
<iframe id="uploadtarget" name="uploadtarget" src="" style="width:200px;height:00px;border:0"></iframe>
<br>

 <div style="padding-top:5px;  "><b>เลือกไฟล์ QR CODE ที่จะอัพโหลด</b> </div>
  <div style="padding-right:15px; margin-top:10px; "><input id="fileupload<?=$_GET[type] ?>" name="fileupload" type="file" style="width:260px; "> </div>



                </div>
                <div class="modal-footer">
				                 
					<input id="btnUpload" type="submit"  class="btn btn-primary"   data-backdrop="false" value="อัพโหลด">
					 <button type="button" class="btn btn-default" data-dismiss="modal" data-backdrop="false" id="btnbtclose<?=$_GET[type] ?>">ปิด</button>
					<input name="userid" type="hidden" id="userid"   value="<?=$_GET[userid] ?>"> 
					<input name="type" type="hidden" id="type"   value="<?=$_GET[type] ?>"> 
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