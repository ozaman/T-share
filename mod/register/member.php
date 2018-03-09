<style type="text/css">
<!--
.topicname { padding-top:10px; padding-left:0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #666666 ; text-align:left;  
 
}
 .pad_top_5 { padding-top:5px;  
 
 }

 
-->
</style>  
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <style type="text/css">
  .form-control {margin-left:10px; padding-left:10px; }
  </style>

<div class="box box-default">

 <!--ss-->
 
 
   <div class="box-header with-border">
          <h2 class="box-title"><span class="font_24"><b>เพื่อนร่วมงาน</b></span></h2>

 
   </div>
    <!--แสดงผล-->
	
 
 
  
  
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td width="50%"> 
  <button id="submit_load_member" type="button" class="btn btn-block btn-primary" style="width:100%; "><i class="fa fa-member"></i> ทั้งหมด</button>
        
       </td>
      <td width="50%">	     
  <button type="reset" id="submit_load_new_member" class="btn btn-default"  style="width:100%;"  ><i class="fa fa-user-plus"></i> เพิ่มเพื่อน</button>  </td>
    </tr>
  </tbody>
</table>


<form method="post" action="" id="edit_form" name="edit_form"  enctype="multipart/form-data" >

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
  <tbody>
    <tr>
      <td><input class="form-control" type="text" name="member_name" id="member_name"   value=""    ></td>
      <td width="100" align="right"><button id="submit_find_member" type="button" class="btn btn-block btn-success" style="width:80px; "><i class="fa fa-member"></i> ค้นหา</button></td>
    </tr>
  </tbody>
</table>

  </form>

       
       

  
  
  
  
  
  
 

<!--แสดงผล-->
<div id="load_member_data" > <?  include "mod/register/load/all.php" ;?></div>
 
	 
  <!----- ปิด row-->
   
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
	   var url_member = "go.php?name=load/member&file=all";
	$('#load_member_data').show();
	$('#load_member_data').load('load/page/loading.php');
 $('#load_member_data').load(url_member); 
	   */
	   
	    $("#submit_load_member").click(function(){ 
	  
	      var url_member = "go.php?name=register/load&file=all";
	$('#load_member_data').show();
	
	 $('#load_member_data').html(load_main_icon_big);
	///$('#load_member_data').load('load/page/loading.php');
 $('#load_member_data').load(url_member); 
	   
	   });
	   
	   
	   
	   $("#submit_member").click(function(){ 
//$('#file_upload_line').click();
 
 
if(document.getElementById('member').value=="") {
document.getElementById('member').focus() ; 
swal('กรุณากรอกเพื่อนร่วมงาน'); 

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



 
 $.post('popup.php?name=user&file=savedata&type=member_add&id=<?=$arr[web_user][id]?>',$('#add_form').serialize(),function(response){
   $('#send_user_data').html(response);
  });
 
  
 });
 
 
 
 ///// find 
 
 
 
	   
	   
	   $("#submit_find_member").click(function(){ 
//$('#file_upload_line').click();
 
 
if(document.getElementById('member_name').value=="") {
document.getElementById('member_name').focus() ; 
alert('กรุณากรอกชื่อ'); 

return false ;
}

 $('#load_member_data').html(load_main_icon_big);
 
 
 
 $.post('popup.php?name=register/load&file=all&id=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   $('#load_member_data').html(response);
   
    
   
   
  });
 
  
 });
 
 
 
 
 
 
	   
	   </script>
       
	 <script>
 
$('#submit_load_new_member').click(function(){  

 
 
  
 ///$( "#load_data_manage_work" ).toggle();
 
 
 $( "#load_data_manage_work" ).toggle(); 
 
 
 
  var url_load= "register_member.php?name=register&file=profile_new";
  
 alert(url_load);
  
  ///$('#load_data_manage_work').html(load_main_mod);
  $('#load_data_manage_work').load('register_member.php?name=register&file=profile_new'); 
  
  
  
  
 

 
 	});
 
					
 </script> 
 
       
       
	   
	   
	   <style>
	   
	   .btn-primary{ background-color:<?=$backpage_color?>
		   
	   }
	   
	   .btn-block{ background-color:<?=$backpage_color?>}
	   
	   </style>