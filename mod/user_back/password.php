<style type="text/css">
<!--
.topicname { padding-top:10px; padding-left:0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #666666 ; text-align:left;  
 
}
 

 
-->
</style>  

 <div class="box box-default">
 
   <div class="box box-default">
          <h2 class="box-title">เปลี่ยนรหัสผ่านผู้ใช้งาน</h2>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
 
          </div>
   </div>
   
  
<form method="post" action="" id="edit_form" name="edit_form"  enctype="multipart/form-data" >
  <div class="box-body" >
         <div class="row">
 <div class="col-md-12">

<div>
                    <div class="topicname"><i class="fa  fa-unlock-alt"></i>&nbsp;&nbsp;กรอกรหัสผ่านใหม่</div>
                    </div>
 
		      </div> <div class="col-md-6"><div>
		      <input type="text" name="newpassword" id="newpassword"     value="<?=$arr[web_user][password];?>"   class="form-control"  >
    </div>
	    
			        </div>
					
   
		  <!----- ปิด col--> </div> <!---->
		
		 
 
		 
 
 
 
 

  
  <div  id="send_user_data"></div>
  
  
    <div style="margin-top:10px;"  >
 <table width="100%"  border="0" cellspacing="2" cellpadding="2" >
  <tr>
    <td width="150" style="padding:5 px;"><button id="submit_user_password" type="button" class="btn btn-block btn-primary" style="width:140px ">บันทึกข้อมูล</button></td>
    <td style="padding:5px;"><button type="reset" class="btn btn-block btn-default"  style="width:140px ">รีเซ็ต</button></td>
  </tr>
</table>
 
      </div>
        
  </div>
  
    <!----- ปิด row-->
  </div>
  	
  
 <script>
  

$("#submit_user_password").click(function(){ 

var makpass=$("#newpassword").val().length;
 
 
if(document.getElementById('newpassword').value=="") {
swal('กรุณากรอกรหัสผ่านใหม่'); 
document.getElementById('newpassword').focus() ; 
return false ;
}

if( makpass < 6) {
swal('รหัสผ่านต้องมี 6 ตัวขึ้นไป'); 
document.getElementById('newpassword').focus() ; 
return false ;
}
 
   
 $.post('popup.php?name=user&file=savedata&type=password&id=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   $('#send_user_data').html(response);
  });
 
  
 });
 </script> 
 </form> 
    </div>
 