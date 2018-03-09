
<script>
   $('.back-full-popup-button').click(function(){     
   $( "#load_data_manage_work_show" ).toggle();
 	});
		
  
  </script>
  
  
  <style>
  
  .form_topic_td { font-size:16px; padding-top:5px; margin-bottom:-2px; color:#666666; 
  
  
  }
  
  
  </style>



 <div class="back-full-popup" style="width:100%; margin-left:-10px; z-index:999999 "> 
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div class="back-full-popup-button" ><?=$popup_icon_left_arow;?></div></td>
  <td   >
  
  <div style="font-size:18px; color:#FFFFFF " ><b>แก้ไขข้อมูลส่วนตัว</b></div></td>
    <td width="25" align="right"   ><div style="font-size:22px; color:#FFFFFF; display:none " ><i class='fa  fa-user' id='icon_chat_find'></i> </div></td>
    <td width="70" align="right"   >
	
	 
<button type="button" class="btn"     data-backdrop="static" id="btn_send_gps_point" style="padding:1px; width:60px;   background-color: #FFCC00;font-size:16px; margin-top: -2px; color:#FFFFFF " >    บันทึก</button>
 
	
	
	</td>
  </tr>
</table>
</div>

 

 



<div  style="margin-top:20px; padding:0px" >


<form name="send_data_form" id="send_data_form"  method="post" action="" enctype="multipart/form-data"  >
 
  <!-- /.container --> 
 
 
  
  
 
		
<script>


////// ส่งข้อความปกติ
$('#btn_submit_data').click(function() {

// check_data_form();

 

 if(document.getElementById('username').value=="") {
alert("กรุณากรอกชื่อผู้ใช้งาน") ;
document.getElementById('username').focus() ;
 return false ;
}
 
if(document.getElementById('password').value=="") {
alert("กรุณากรอกรหัสผ่าน") ;
document.getElementById('password').focus() ;
return false ;
}

if(document.getElementById('company').value=="") {
alert("กรุณากรอกชื่อบริษัท") ;
document.getElementById('company').focus() ;
return false ;
}


 if(document.getElementById('email').value=="") {
alert("กรุณากรอก email") ;
document.getElementById('email').focus() ;
 return false ;
}
 
 

/*
 
 var url="load_data.php?name=<?=$_GET[name]?>&file=<?=$_GET[file]?>&op=<?=$_GET[op]?>&action=<?=$_GET[data]?>&id=<?=$_GET[id]?>";
 
 
 $.post(url,$('#send_data_form').serialize(),function(response){
 
 $('#main_popup_send_data').html(response);  });
 

 
 
 
 $('#main_popup_close').click();
 
  showcontent('?name=<?=$_GET[name]?>&file=<?=$_GET[file]?>');
 */

 
 });
</script> 
		
		
		
		
		
		
	<div class="box box-default"  style="width:100%; border:none; margin-left:10px;padding:0px" >
 
        <!-- /.box-header -->
        <div class="box-body"  style="width:100%;padding:0px" >
          <div class="row"  style="width:100%;padding:0px" >
		  
		  
		    <!-- /.box-header -->
		  
 
 
          
	  <!-- Text input fa-lock-->      
		  
            <div class="col-md-6" style="background-color:#F6F6F6; padding-top:10px; padding-bottom:10px; width:100%">
	 <table width="100%" border="0" cellspacing="3" cellpadding="3" s>
              <tr>
                <td width="60"><table width="60" border="0" cellpadding="0"   cellspacing="0" style="border:solid 0px; border-color:#DADADA">
                    <tr>
                      <td width="60"><img src="../data/images/user/driver.png?v=<?=time()?>" width="50" height="50" border="0" class="mainpic_index"  style="border:solid 1px; border-color:#DADADA;border-radius:5px;" /></a> </td>
                    </tr>
                </table></td>
                <td width="1721" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td ><div id="message_user_<?=$arr[chat][id]?>" style="font-size:14px; color:#000000; font-weight:bold ">
                          Chokdee somchue</div></td>
                    </tr>
                    <tr>
                      <td ><div style="display:nones; font-size:14px; padding-top:5px; " id="message_last_<?=$arr[chat][id]?>">
                           ID :  Chokdee99
                      </div></td>
                    </tr>
                  </table>
                </td>
                <td width="60" align="center" valign="top" > 
                   
                    <table width="100%" border="0" cellspacing="1" cellpadding="1" style="margin-top:-10px">
                    <tr>
                      <td align="center"> <i class="fa   fa-qrcode" style="color:#333333;font-size:26px;"></i></td>
                    </tr>
                    <tr>
                      <td align="center" style="font-size:12px">QR</td>
                    </tr>
                  </table></td>
              </tr>
            </table>
 
 
 </div>
 
  

   <div class="col-md-6" style="display:none">
         
               <label class="form_topic_td"><?='Chat Id';?></label> 
      
          <div class="input-group"> <span class="input-group-addon">
		  <i class="fa fa-user"></i></span>
            <input name="username"  type="text" class="form-control" id="username" value="Tbchat01"  >
          </div>
              <!-- /.form-group -->			  
            </div>
            <!-- /.col -->
			

 
			
			  <div class="col-md-6"  >				
             
                <label class="form_topic_td"><?='รหัสผ่าน';?></label>
                <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				 <input class="form-control" type="password" name="password" id="password"   required="true"  onkeypress="UserEnter(this,event)" value="Chokdee somchue"  style="font-size:18px"   >
              </div>
              <!-- /.form-group -->			  
 
            </div>
            <!-- /.col -->
			
 
			
			
			
			
            <!-- Form Name -->
        
    
      <!-- Text input-->
			
			
			
			
			
			
			
			
			  <!-- Text input-->
			  <div class="col-md-6">				
             
                <label class="form_topic_td"><?=profile_name;?></label>
                <div >
<input class="form-control" type="text" name="phone" id="phone"   required="true"  onkeypress="UserEnter(this,event)" value="Chokdee somchue">  
              </div>
              <!-- /.form-group -->			  
 
            </div>
            <!-- /.col -->
			
			
			
			
			
			
			
			
						  <!-- Text input-->
		    <div class="col-md-6">				
             
              <label class="form_topic_td"></label>
		    </div>
            <div class="col-md-12">
              <!-- /.form-group -->
</div>
            <!-- /.col -->	
			
 	
			
			
			  <div class="col-md-6">			
			
              <div class="form-group">
<label class="form_topic_td"> <?=profile_country;?></label>
           <select name="province" id="province" class="form-control">
				
				
				
  <?

$db->connectdb(DB_NAME_CHAT,DB_USERNAME,DB_PASSWORD);

$res[category] = $db->select_query("SELECT * FROM  web_country where status=1  ORDER BY name_en asc");
 
while ($arr[category] = $db->fetch($res[category])){

	   echo "<option value=\"".$arr[category][id]."\"";
 
	   if($_SESSION['lang'] == "en"){echo ">".$arr[category][name_en]." </option>";}
	   if($_SESSION['lang'] == "cn"){echo ">".$arr[category][name_cn]."</option>";}
	   if($_SESSION['lang'] == "th"){echo ">".$arr[category][name_th]."</option>";}
	   if($_SESSION['lang'] == "jp"){echo ">".$arr[category][name_jp]."</option>";}
	   if($_SESSION['lang'] == "kr"){echo ">".$arr[category][name_kr]."</option>";}

}

 

?>
  
          </select>
              </div>
              <!-- /.form-group -->
			  
 
            </div>
            <!-- /.col -->
            <!-- /.col -->
<div class="col-md-6">
              <div class="form-group">
<label class="form_topic_td"> <?=profile_phone;?></label>
                
                <label></label>
                <input class="form-control" type="text" name="phone" id="phone"   required="true"  onkeypress="UserEnter(this,event)" value="0869992563">
              </div> 
			   <!-- /.form-group -->			  
            </div>
            <!-- /.col -->
            <!-- /.col -->
<div class="col-md-6">
              <div class="form-group">
<label class="form_topic_td"> <?=profile_email;?></label>
                
                <label></label>
                <input class="form-control" type="text" name="email" id="email"   required="true"  onkeypress="UserEnter(this,event)" value="chockdee99@gmail.com">
              </div> 
			   <!-- /.form-group -->			  
            </div>
            <!-- /.col -->
			
			
 
			
			
			
			
			
			
			
			
			
			
			
			
			
			
          </div>
		  
		  
		  
		  
		  
		  
		  
		  
          <!-- /.row -->
        </div>
		
        <!-- /.box-body -->
        </div>
		
   
 


  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="100%">&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="3" cellpadding="3">
        <tr>          </tr>
        
      </table></td>
    </tr>
  </table>
  
  
  
  
 
</FORM>

</div>
<br />
<br />
  <style>
  .textmain_left_menu  {
  font-size:20px; font-family:Arial, Helvetica, sans-serif;color:#666666;
  }
  
    .textsub_left_menu  {
  font-size:16px;  font-family:Arial, Helvetica, sans-serif;
  }
  
      .textsub_left_menu:hover  {
  font-size:16px;  font-family:Arial, Helvetica, sans-serif; color:<?=$main_color?>;
  }
  .l-menu-li {
  
  border-bottom:  solid 1px #999999;
  }
  
    .l-menu-li-icon { 
	font-size:24px; padding-right:30px; color:<?=$main_color?>;
   }
   
  </style>