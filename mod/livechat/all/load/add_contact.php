
  <script>
 
$('.back-full-popup-button').click(function(){  

$( "#load_data_manage_work_show" ).toggle(); 
   	});
 
					
					</script> 
  <div class="back-full-popup" style="width:100%; margin-left:-10px; "> 
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div class="back-full-popup-button" ><?=$popup_icon_left_arow;?></div></td>
  <td   >
  
  <div style="font-size:18px; color:#FFFFFF " > เพิ่มผู้ติดต่อ</b></div></td>
    <td width="25" align="right"   ><div style="font-size:22px; color:#FFFFFF; display:none " ><i class='fa  fa-search' id='icon_chat_find'></i> </div></td>
    <td width="30" align="right"   >
	
	<div class="dropdown"  style="display:none">
	
	<div style="font-size:22px; color:#FFFFFF "data-toggle="dropdown" >
	<i class='fa  fa-plus' id='icon_chat_plus'></i>
	
	</div>




	 <ul class="dropdown-menu" style="background-color:<?=$main_color?>; color:#FFFFFF;width:200px; margin-left:-180px; margin-top:10px;">
<a ><div  class="drop-sub-menu-link-chat"><i class="fa  fa-user-plus drop-menu-icon-chat" style="color:#FFFFFF;font-size:24px; margin-top:-5px; margin-right:10px;"></i><span  class="drop-sub-menu-span" style="color:#FFFFFF; margin-left:40px;">เพิ่มผู้ติดต่อ</span></font></b></div></a>
<a><div  class="drop-sub-menu-link-chat"><i class="fa   fa-qrcode drop-menu-icon-chat" style="color:#FFFFFF;font-size:26px;"></i> <span  class="drop-sub-menu-span" style="color:#FFFFFF; margin-left:40px;">สแกน QR CODE </font></b>  </div></a>


<a><div  class="drop-sub-menu-link-chat"><i class="fa fa-question-circle drop-menu-icon-chat" style="color:#FFFFFF;font-size:26px;"></i> <span  class="drop-sub-menu-span" style="color:#FFFFFF; margin-left:40px;">วิธีการใช้งาน </font></b>  </div></a>
 
    </ul>
	
	
	</div>
	
	
	</td>
  </tr>
</table>
</div>


<!--เมนู--->

 
 
 
 
 <?  // include ("mod/livechat/all/update/check.php");?> 



<div id="load_data_chat_online_all"></div>

 
 <div style="padding-right:0px; margin-top:30px; "> 

 
   
   <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td> 			
             
           
                <div class="input-group">
				<span class="input-group-addon"><i class="fa  fa-search" style="font-size:24px"></i></span>
				 <input class="form-control" type="text" name="find_user" id="find_user"   required="true"  onkeypress="UserEnter(this,event)" value="<?=$arr[member][password];?>"  placeholder="ค้นหาจากรายชื่อ หรือ ID" style="height:40px;"   >
              </div>
              <!-- /.form-group -->			  
 
         <br /></td>
  </tr>
  <tr>
    <td>
	
	<div style="border-bottom:solid 1px; color:#E6E6E6; padding-bottom:10px;">
	
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="50"><table width="50" border="0" cellpadding="0"   cellspacing="0" style="border:solid 0px; border-color:#DADADA">
      <tr>
        <td width="50">  
             <a class="btn btn-social-icon btn-dropbox" style="width:40px; height:40px;  border:none"><i class="fa fa-users" style="font-size:28px; margin-top:3px;"></i></a></td>
      </tr>
    </table></td>
    <td width="1707" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td >   <div id="message_user_<?=$arr[chat][id]?>" style="font-size:16px; color:#000000; font-weight:bold ">
                              รายชื่อผู้ติดต่อทั้งหมด</div>                        </td>
                      </tr>
                      <tr>
                        <td ><div style="display:nones; font-size:14px; padding-top:5px; color:#333333;" >
						
						  ดูรายชื่อผู้ติดต่อทั้งหมดในระบบ</div>					 </td>
                      </tr>
                    </table></td>
    <td width="80">  </td>
  </tr>
</table>
	</div></td>
  </tr>
  <tr>
    <td><div style="border-bottom:solid 1px; color:#E6E6E6; padding-bottom:10px; padding-top:10px;">
	
	<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="50"><table width="50" border="0" cellpadding="0"   cellspacing="0" style="border:solid 0px; border-color:#DADADA">
      <tr>
        <td width="50">  
             <a class="btn btn-social-icon btn-google" style="width:40px; height:40px; border:none"><i class="fa fa-qrcode" style="font-size:36px; margin-top:3px;"></i></a></td>
      </tr>
    </table></td>
    <td width="1707" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td >   <div id="message_user_<?=$arr[chat][id]?>" style="font-size:16px; color:#000000; font-weight:bold ">
                              สแกน QR CODE</div>                        </td>
                      </tr>
                      <tr>
                        <td ><div style="display:nones; font-size:14px; padding-top:5px;; color:#333333 " >
						
						  สแกน QR CODE จากมือถือหรือเอกสาร</div>					 </td>
                      </tr>
                    </table></td>
    <td width="80">  </td>
  </tr>
</table>
	
	</div> </td>
  </tr>
  <tr>
    <td>
 
	
	
	
	
	
	<div style="border-bottom:solid 1px; color:#E6E6E6; padding-bottom:10px; margin-top:-5px;">
      <table width="100%" border="0" cellspacing="3" cellpadding="3">
        <tr>
          <td width="50"><table width="50" border="0" cellpadding="0"   cellspacing="0" style="border:solid 0px; border-color:#DADADA">
              <tr>
                <td width="50"><a class="btn btn-social-icon btn-google" style="width:40px; height:40px; border:none; background-color:#009999"><i class="fa fa-lock" style="font-size:36px; margin-top:3px;"></i></a></td>
              </tr>
          </table></td>
          <td width="1707" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td ><div id="div" style="font-size:16px; color:#000000; font-weight:bold "> ส่งรหัสเชิญชวน</div></td>
              </tr>
              <tr>
                <td ><div style="display:nones; font-size:14px; padding-top:5px;; color:#333333 " > ส่งรหัสผ่านเชิญสมาชิกที่อยู่ใกล้เคียง</div></td>
              </tr>
          </table></td>
          <td width="80">  </td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>

   
   
 
 	 
 </div>			
				 
 
   <br />
   <br />
 </p>
 <p>&nbsp;</p>
 <p><br />
   <br />
   
   
   
    
 </p>
 