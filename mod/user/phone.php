<style type="text/css">
<!--
.topicname { padding-top:10px; padding-left:0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #666666 ; text-align:left;  
 
}
 .pad_top_5 { padding-top:5px;  
 
 }

 
-->
</style>  
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  
 <div class="box box-default">

 <!--ss-->
 
 
 
   <div class="box box-default">
          <h2 class="box-title"><span class="font_24"><b>เบอร์โทรศัพท์ส่วนตัว</b></span></h2>
 
   </div>
    <!--แสดงผล-->
	
    <div class="box-body" >
         <div class="row" style="margin-top:-10px; ">
  <div class="box-body" >
  <?=$backpage_color?>
  
  <div class="btn-group" style="margin-left:5px; ">
  <button id="submit_load_phone" type="button" class="btn btn-block btn-primary" style="width:160px; "><i class="fa fa-phone"></i> เบอร์โทรศัพท์ทั้งหมด</button>
       </div>
	    <div class="btn-group">
  <button type="reset" class="btn btn-block btn-default"  style="width:140px; position: static" data-toggle="modal" data-target="#form_add_phone"><i class="fa fa-user-plus"></i> เพิ่มเบอร์โทรศัพท์</button> </div>
  
	 
</div>
  </div>

<!--แสดงผล-->
<div id="load_phone_data" > <?  include "mod/load/phone/all.php" ;?></div>
 
	
	
  <!----- ปิด row-->
   
  </div>
    </div>
	  </div>
	   
	  <form id="add_form"  name="add_form"  method="post" enctype="multipart/form-data"   >
  
 
  <div class="modal fade"  id="form_add_phone" role="dialog"   aria-labelledby="myModalLabel"    >
        <div class="modal-dialog modal-sm"  >

            <!-- Modal content-->
            <div class="modal-content" style="padding:5px; " > 
 
                    <h4 class="modal-title" style="font-size:26px; height:15px;   font-family:Arial, Helvetica, sans-serif; text-transform:uppercase"><center><b>เพิ่มเบอร์โทรศัพท์ใหม่</b></center></h4>
 
                <div class="modal-body" >  
   <div class="topicname"><i class="fa  fa-phone"></i>&nbsp;เบอร์โทรศัพท์</div>
   <div>
                    <input name="phone" type="text" class="form-control" id="phone"   OnKeyPress="return chkNumber(this)" maxlength="12"   required="true"   >
					<div style="padding-top:3px; " ><font color="#FF9900"><i class="fa  fa-warning"></i> กรอกได้เฉพาะตัวเลขเท่านั้น</font></div>
              </div>
			  
			     <div class="topicname"><i class="fa  fa-user"></i>&nbsp;ชื่อผู้ติดต่อ</div>
   <div>
                    <input class="form-control" type="text" name="name" id="name"   required="true"  onkeypress="UserEnter(this,event)"    >
					
              </div>
			  
			  			     <div class="topicname"><i class="fa  fa-users"></i>&nbsp;ชื่อกลุ่ม</div>
   <div>
                 <select name="type" id="type" class="form-control select2" >
				      <option value="" selected>-- กรุณาเลือกกลุ่ม --</option>
              <?
        $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        //$res[category] = $db->select_query("SELECT * FROM ".TB_transfercompany." ORDER BY id ");
		mysql_query("SET NAMES utf8"); 
        $res[category] = $db->select_query("SELECT * FROM contact_phone_group where status=1  ");
						
 
        while ($arr[category] = $db->fetch($res[category])) {
            echo "<option value=\"" . $arr[category][id] . "\"";
            if ($arr[category][id] == $arr[member][company]) {
                echo " Selected";
            }
            echo ">" . $arr[category][name] . "</option>";
        }
?>
            </select>
		   
		      </div>
           </div>
		   
		   <div id="send_user_data"> </div>
                <div class="modal-footer pad_top_5">
				 
					 <button type="button" class="btn btn-primary" data-dismiss="modal"  data-id="55"   id="submit_phone">บันทึกข้อมูล</button>
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
 	function chkNumber(ele)
	{
 	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) 
	
	
	
	return false;
 
	
 
 
	
	

	}
	//else { alert(55); }   
	   /*
	   var url_phone = "go.php?name=load/phone&file=all";
	$('#load_phone_data').show();
	$('#load_phone_data').load('load/page/loading.php');
 $('#load_phone_data').load(url_phone); 
	   */
	   
	    $("#submit_load_phone").click(function(){ 
	  
	      var url_phone = "go.php?name=load/phone&file=all";
	$('#load_phone_data').show();
	$('#load_phone_data').load('load/page/loading.php');
 $('#load_phone_data').load(url_phone); 
	   
	   });
	   
	   
	   
	   $("#submit_phone").click(function(){ 
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



 
 $.post('popup.php?name=user&file=savedata&type=phone_add&id=<?=$arr[web_user][id]?>',$('#add_form').serialize(),function(response){
   $('#send_user_data').html(response);
  });
 
  
 });
	   
	   </script>
	   
	   
	   <style>
	   
	   .btn-primary{ background-color:<?=$backpage_color?>
		   
	   }
	   
	   .btn-block{ background-color:<?=$backpage_color?>}
	   
	   </style>