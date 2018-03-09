 <br />
 
 
 
 
 
 
 <? if($_GET[op] == ""){ ?>

   
<?
 include("mod/content/menu/contact.php");
?> 
 

<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tbody>
    <tr>
      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tbody>
    <tr>
      <td valign="top"><table width="100%" cellspacing="2" cellpadding="1" >
    <tr bgcolor="#990000" height=25>
     <td width="50" align="center" bgcolor="#999999"><CENTER>
       <font color="#FFFFFF">แก้ไข</font>     
     </CENTER></td>
     <td width="50" align="center" bgcolor="#999999"><font color="#FFFFFF">ลบ</font></td>
      
     
     <td height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">ชื่อ</font></td>
     
   
     <td width="200" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">เบอร์โทรศัพท์</font></td>
     <!--<td width="200" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">อีเมล</font></td>-->
     <td width="200" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">ไอดี Line</font></td>
     <td width="199" align="center" bgcolor="#999999"><font color="#FFFFFF">ผู้ดูแล</font></td>
     <td width="199" align="center" bgcolor="#999999"><font color="#FFFFFF">ตำแหน่ง</font></td>
     
     </tr>  
  <?
  
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[contact] = $db->select_query("SELECT * FROM shopping_contact  WHERE product_id='".$_GET[contact]."' and type<>'zello'  ORDER BY  id  ASC  ");
while($arr[contact] = $db->fetch($res[contact])){
	
	
	
 $res[product] = $db->select_query("SELECT * FROM shopping_product WHERE id='".$_GET[contact]."' ");
 $arr[product] = $db->fetch($res[product]);
 
  $res[con_type] = $db->select_query("SELECT * FROM shopping_contact_type WHERE id='".$arr[contact][usertype]."' ");
  $arr[con_type] = $db->fetch($res[con_type]);
 
 $res[con_type_ad] = $db->select_query("SELECT * FROM shopping_contact_admin_type WHERE id='".$arr[contact][admintype]."' ");
  $arr[con_type_ad] = $db->fetch($res[con_type_ad]);
	
/*if($arr[contact][usertype]=='op'){
	
$type='พนักงานต้อนรับ';
	
}

if($arr[contact][usertype]=='sale'){
	

$type='ฝ่ายขาย';
	
}
	*/
	
	
	
	 
	 $res[com] = $db->select_query("SELECT * FROM shopping_contact WHERE id='".$arr[contact][main]."' ");
 $arr[type] = $db->fetch($res[com]);
 

 
 

			///////////////
 
 
 

	//Comment Icon
	if($arr[contact][enable_comment]){
		$CommentIcon = " <IMG SRC=\"images/icon/suggest.gif\" WIDTH=\"13\" HEIGHT=\"9\" BORDER=\"0\" ALIGN=\"absmiddle\">";
	}else{
		$CommentIcon = "";
	}
			$bgcolor = ($i++ & 1) ? $bg1 : $bg2; 
 
?> 

 
 
     <tr  bgcolor='<?=$bgcolor?>'>
       <td height="30" align="center">
       
       
       
 
       
       
        <script>
	 
 
 
 $("#btn_menu_edit_contact_<? echo $arr[contact][id];?>").click(function(){
 
			 
 $('#topic_edit').html('แก้ไข <? echo $arr[contact][name];?>');
			 
  var url_page_type_<? echo $arr[contact][id];?>= "go.php?name=content/load&file=contact&op=sub_edit&contact=<? echo $_GET[contact];?>&id=<? echo $arr[contact][id];?>&main=<? echo $arr[product][main];?>&sub=<? echo $arr[product][sub];?>";
 
  $('#show_data_page').load(url_page_type_<? echo $arr[contact][id];?>);
 
 
	   });
	   
 
	   </script>
       
       
       
       
       
       
       
       
       <a  id="btn_menu_edit_contact_<? echo $arr[contact][id];?>"   >
         <i class="fa  fa-edit" style="width:40px; font-size:30px; color:#666666"  ></i>
         
         </a> 
 
     </td>
     
 
     
     
 
     
     
     
     <td align="center">
       
 
       
       <script>
 
 $( document ).ready(function() {
		
		
 $("#btn_menu_del_contact_<? echo $arr[contact][id];?>").click(function(){ 
  
 
 
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่าต้องการลบ <? echo $arr[contact][name];?>",
		type: "error",
		showCancelButton: true,
		animation:  false ,
		
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'ใช่',
		cancelButtonText: "ไม่ใช่",
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
	 
 
///

 
  $.post('go.php?name=content/load&file=contact&op=sub_del&id=<? echo $arr[contact][id];?>',$('#myform_main').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });  
  
 
 
 setTimeout(function () {
 $("#all_contact").click();
 
}, 1000); //w

 
///
 
	//  alert('dd');
    } else {
      swal("Cancelled", "", "error");
    }
	});
	   
	    

});

});
		 
		</script>
       <a  id="btn_menu_del_contact_<? echo $arr[contact][id];?>"><i class="fa  fa-trash" style="width:40px; font-size:30px; color:#FF0000"  ></i> </a>
       

     </td>
     <td align="center">  
       <? echo $arr[contact][name];?> </td>
         <td align="center">
           
  <? echo $arr[contact][phone];?> 
      </td>
      <!-- <td align="center">  <?=$arr[contact][email];?>  </td>-->
       <td align="center">  <?=$arr[contact][line_id];?>  </td>
       <td align="center">  <?=$arr[con_type_ad][name_th];?>  </td>
         <td align="center"><? echo $arr[con_type][name_th];?>  </td>
         </tr>
	  <TR>
		  <TD colspan="29" height="1" class="dotline"></TD>
	  </TR>
  <?
 } 
?>
   </table></td>
    </tr>
  </tbody>
</table></td>
    </tr>
  </tbody>
</table>



 <? } ?>




<? 
if($_GET[op] == "sub_add"){
	//////////////////////////////////////////// ó Form
 

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projecttype] = $db->select_query("SELECT * FROM shopping_contact where   id=".$_GET[main]."  ");
$arr[projecttype] = $db->fetch($res[projecttype]);
	
 
	
?>

   <?
 include("mod/content/menu/contact.php");
?> 
 

  <FORM NAME="myform"   id="myform"   enctype="multipart/form-data">
  

  
 
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%">
       <br> 
        <div class="div-menu-contact">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" >
          <tbody>
              <tr>
                <td width="180" class="font-24"><a id="new_contact_form"><i class="fa  fa-plus-circle" style="width:24px; font-size:20px;"  ></i><strong>เพิ่มรายชื่อใหม่</strong></a></td>
                <td class="font-24"><a id="new_contact_list"><i class="fa  fa-user" style="width:24px; font-size:20px;"  ></i><strong>เลือกจากรายชื่อที่มี</strong></a></td>
              </tr>
            </tbody>
          </table>
          </div>
          <br>
          
   
  <script>
	 
 
 $("#new_contact_form").click(function(){
 
   $('#show_add_new_contact').show();
   
      $('#show_add_new_list').hide();
	  
 $('#show_add_new_topic').html('เพิ่มรายชื่อใหม่'); 
	  
	  
 
	   });
	   
	   
	    $("#new_contact_list").click(function(){
 
   $('#show_add_new_contact').hide();
   
      $('#show_add_new_list').show();
	   $('#show_add_new_topic').html('เลือกจากรายชื่อที่มี'); 
	  
	  
 
	   });
	   
	   
	   
 /// list
 
 var url_page_type_add= "empty_style.php?name=content/load/list&file=contact_select&op=sub_add_type_admin&main=<?=$_GET[main];?>&sub=<?=$_GET[sub];?>&contact=<?=$_GET[contact];?>";
 
 $('#load_show_add_new_list').load(url_page_type_add);
	   
 
   $("#submit_find_contact_name").click(function(){
 ///	    $("#new_contact_list").click(function(){
   $.post('go.php?name=content/load/list&file=contact_select&op=find&id=<?=$_GET[id];?>&contact=<?=$_GET[contact];?>',$('#myform').serialize(),function(response){
  $('#load_show_add_new_list').html(response);  });
     });
	 
	 
	 
	 
	 
	 
		    $("#new_contact_list_find").click(function(){ 
	 
	  var url_page_type_add= "empty_style.php?name=content/load/list&file=contact_select&op=sub_add_type_admin&main=<?=$_GET[main];?>&sub=<?=$_GET[sub];?>&contact=<?=$_GET[contact];?>";
 
 $('#load_show_add_new_list').load(url_page_type_add);
	 
	      });
 
	   </script>
       
 
       
       
       
       
       
  <div id="show_add_new_topic" class="font-32"  style="font-weight:bold"  >
เพิ่มรายชื่อใหม่
 </div> 
 
 
 
 
 <div id="show_add_new_list" style="display:none">
 
   <form action="" name="myform"  id="myform" method="post">
 
 <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td width="150" class="font-30"><b><a id="new_contact_list_find">T Share <i class="fa  fa-search" style="width:24px; font-size:20px;"  ></i></a></td>
      <td width="220"  class="font-22"><strong>ค้นหาจากข้อมูลส่วนตัว :</strong></td>
      <td width="210"><input name="find_contact_name" type="text" class="form-control" id="find_contact_name" style="width:300px; background:#FFFFFF" value="" placeholder="ชื่อ, อีเมล์, เบอร์โทรศัพท์" /></td>
      <td>  <button type="button" class="btn btn-info"   id="submit_find_contact_name"   >        <span id="txt_btn_save">
                 ค้นหา
                  </span>
                </button></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

</form>

 <div id="load_show_add_new_list"> <?
  ///include("mod/content/load/list/contact_select.php");
 ?></div>
 

 </div>
 
 
 
 
 
 


 
 

 
          <table width="100%" border="0" cellspacing="2" cellpadding="2" id="show_add_new_contact" style="display:nones">
  <tbody>
    <tr>
      <td width="650" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
	 
		          <tr>
		            <td width="120"><strong>ชื่อ :</strong></td>
		            <td><input name="name" type="text" class="form-control" id="name" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][topic_en];?>" /></td>
          </tr>
			<tr>
          <td><strong>ผู้ดูแล :</strong></td>
          <td><select  class="form-control" name="admintype" id="admintype" style="width:500px;; font-size:16px; padding:5px; height:40px" >
			<option value="0" >-- เลือกผู้ดูแล --</option>
            <option value="1" >T Share</option>
            <option value="2" >ผู้ให้บริการ</option>
            </select></td>
          </tr>
		          <tr>
		            <td><strong>ตำแหน่ง :</strong></td>
		            <td><select  class="form-control" name="usertype" id="usertype" style="width:500px;; font-size:16px; padding:5px; height:40px" >
		             <option value="">-- เลือกตำแหน่ง --</option>
		            <?php
		            $res[con_type] = $db->select_query("SELECT * FROM shopping_contact_type where status = 1 ");
					while($arr[con_type] = $db->fetch($res[con_type])){
						
					?>
                    <option value="<?=$arr[con_type][id]?>"><?=$arr[con_type][name_th];?></option>
                   <? }
		             ?>
                  </select>
                  
                  
                  </td>
          </tr>
		          <tr>
		            <td><strong>เบอร์โทรศัพท์ :</strong></td>
		            <td><input name="phone" type="text" class="form-control" id="phone" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][phone];?>" /></td>
          </tr>
		            <tr>
		            <td><strong>เบอร์โทรศัพท์ 2 :</strong></td>
		            <td><input name="phone_2" type="text" class="form-control" id="phone_2" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][phone_2];?>" /></td>
		            </tr>
				  <tr>
		            <td><strong>อีเมล :</strong></td>
		            <td><input name="email" type="text" class="form-control" id="email" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][email];?>" /></td>
          </tr>
		            <tr>
		            <td><strong>อีเมลสำรอง :</strong></td>
		            <td><input name="email_2" type="text" class="form-control" id="email_2" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][email_2];?>" /></td>
		            </tr>
		            <tr>
		            <td><strong>ไอดี Line :</strong></td>
		            <td><input name="line_id" type="text" class="form-control" id="line_id" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][line_id];?>" /></td>
		            </tr>
		            <tr>
		            <td><strong>ไอดี WeChat :</strong></td>
		            <td><input name="wechat_id" type="text" class="form-control" id="wechat_id" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][wechat_id];?>" /></td>
		            </tr>
		             <tr>
		            <td><strong>ไอดี Skype :</strong></td>
		            <td><input name="skype_id" type="text" class="form-control" id="skype_id" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][skype_id];?>" /></td>
		            </tr>
		            <tr>
		            <td><strong>ไอดี WhatsApp :</strong></td>
		            <td><input name="whatsapp_id" type="text" class="form-control" id="whatsapp_id" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][whatsapp_id];?>" /></td>
		            </tr>
		            <tr>
		            <td><strong>ไอดี Zello :</strong></td>
		            <td><input name="zello_id" type="text" class="form-control" id="zello_id" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][zello_id];?>" /></td>
		            </tr>
          <tr>
            <td>&nbsp;</td>  
            <td>       
              <button type="button" class="btn btn-primary btn-lg"   id="submit_data"   >
                <span id="txt_btn_save">
                  บันทึกข้อมูล
              </span>
              </button>
                      <script>
  $("#submit_data").click(function(){
	  
 
   if(document.getElementById('name').value=="") {
alert('กรุณากรอกชื่อ'); 
document.getElementById('name').focus() ; 
return false ;
}

	  
   if(document.getElementById('phone').value=="") {
alert('กรุณากรอกเบอร์โทรศัพท์'); 
document.getElementById('phone').focus() ; 
return false ;
}

if(document.getElementById('email').value=="") {
alert('กรุณากรอก Email หลัก'); 
document.getElementById('email').focus() ; 
return false ;
}

 	 
 
  $.post('go.php?name=content/load&file=contact&op=sub_add_action&id=<?=$_GET[id];?>&contact=<?=$_GET[contact];?>',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
   
  
   var url_page_type= "go.php?name=content/load&file=contact&main=<?=$_GET[main];?>&sub=<?=$_GET[sub];?>&contact=<?=$_GET[contact];?>";
	  
 
 $('#show_data_page').load(url_page_type);
	  
	  
  
  
			   });
			  </script>
              
              
            </td>
          </tr>
        </table></td>
      <td width="250" valign="top"> 
 
 <?
 $rand = substr(str_shuffle('123456789012345678901234567890'),0,30);
 ?>

 
 
 <div class="take_photo" ><center>
  <script>
 /////////  id driving
 $("#icon_camera_id_logo").click(function(){  
 
  document.getElementById('upload_pic_type').value='id_logo';
 
  $("#load_chat_camera").click(); 
  
  });
  
 </script>
 
 <input class="form-control" type="hidden" name="check_photo_id_logo" id="check_photo_id_logo"   onkeypress="PasswordEnter(this,event)"   value="0" >
 <input class="form-control" type="hidden" name="check_code" id="check_code"   onkeypress="PasswordEnter(this,event)"   value="<?=$rand ?>" >
  
 <input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"  required="true" onkeypress="PasswordEnter(this,event)"   value="" >  
 

<i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_logo"></i><br>
เลือกภาพถ่าย
<div style="padding:5px;">
  
  <div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_logo" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
  
  
  </div>
    
 

    

 

</div>
 
 
  
 </td>
      <td valign="top"><img name="image_id_logo"   src="mod/content/nophoto.png?v=<?=time()?>"     id="image_id_logo"  style="width:140px; padding:5px; margin-top:  7px;border-radius:15px;border: 3px solid #ddd "  /></td>
    </tr>
  </tbody>
</table>
 


</td>
    </tr>
    </table>
  
</FORM>
  
<?
 
}


?>


 
 
 
 
 
 <?
 
 
 if($_GET[op] == "sub_edit"){
	//////////////////////////////////////////// ó Form
 
		//֧
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[contact] = $db->select_query("SELECT * FROM shopping_contact  WHERE id='".$_GET[id]."' ");
		$arr[contact] = $db->fetch($res[contact]);
		
		
		
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[product] = $db->select_query("SELECT * FROM shopping_product where   id=".$arr[contact][product_id]."  ");
$arr[product] = $db->fetch($res[product]);
 
?>
   
   
   <?
 include("mod/content/menu/contact.php");
?> 
 
 
 
 
<FORM NAME="myform" id="myform"   enctype="multipart/form-data">
 
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td width="650" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
        <tr>
          <td><strong>ผู้ดูแล :</strong></td>
          <td><select  class="form-control" name="admintype" id="admintype" style="width:500px;; font-size:16px; padding:5px; height:40px" >
            <option value="0" >-- เลือกผู้ดูแล --</option>
            <?php
		            $res[con_type_ad] = $db->select_query("SELECT * FROM shopping_contact_admin_type where status = 1 ");
					while($arr[con_type_ad] = $db->fetch($res[con_type_ad])){
						if($arr[contact][admintype]==$arr[con_type_ad][id]){
							$selected = 'selected';
						}else{
							$selected = '';
						}
					?>
            <option value="<?=$arr[con_type_ad][id];?>" <?=$selected;?> ><?=$arr[con_type_ad][name_th];?></option>
            <? }
		             ?>
            </select></td>
        </tr>
           <tr>
		            <td><strong>ตำแหน่ง :</strong></td>
		            <td><select  class="form-control" name="usertype" id="usertype" style="width:500px;; font-size:16px; padding:5px; height:40px" >
		             <option value="">-- เลือกตำแหน่ง --</option>
		            <?php
		            $res[con_type] = $db->select_query("SELECT * FROM shopping_contact_type where status = 1 ");
					while($arr[con_type] = $db->fetch($res[con_type])){
						if($arr[contact][usertype]==$arr[con_type][id]){
							$selected = 'selected';
						}else{
							$selected = '';
						}
					?>
                    <option value="<?=$arr[con_type][id];?>" <?=$selected;?> ><?=$arr[con_type][name_th];?></option>
                   <? }
		             ?>
                  </select>
                  
                  
                  </td>
		            </tr>
           <tr>
             <td><strong>ชื่อ :</strong></td>
             <td><input name="name" type="text" class="form-control" id="name" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][name];?>" /></td>
           </tr>
          
        <tr>
          <td><strong>เบอร์โทรศัพท์ :</strong></td>
          <td><input name="phone" type="text" class="form-control" id="phone" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][phone];?>" /></td>
          </tr>
           <tr>
		            <td><strong>เบอร์โทรศัพท์สำรอง :</strong></td>
		            <td><input name="phone_2" type="text" class="form-control" id="phone_2" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][phone_2];?>" /></td>
		            </tr>
            <tr>
		            <td><strong>อีเมล :</strong></td>
		            <td><input name="email" type="text" class="form-control" id="email" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][email];?>" /></td>
		            </tr>
		            <tr>
		            <td><strong>อีเมลสำรอง :</strong></td>
		            <td><input name="email_2" type="text" class="form-control" id="email_2" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][email_2];?>" /></td>
		            </tr>
		            <tr>
		            <td><strong>ไอดี Line :</strong></td>
		            <td><input name="line_id" type="text" class="form-control" id="line_id" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][line_id];?>" /></td>
		            </tr>
		            <tr>
		            <td><strong>ไอดี WeChat :</strong></td>
		            <td><input name="wechat_id" type="text" class="form-control" id="wechat_id" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][wechat_id];?>" /></td>
		            </tr>
		             <tr>
		            <td><strong>ไอดี Skype :</strong></td>
		            <td><input name="skype_id" type="text" class="form-control" id="skype_id" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][skype_id];?>" /></td>
		            </tr>
		            <tr>
		            <td><strong>ไอดี WhatsApp :</strong></td>
		            <td><input name="whatsapp_id" type="text" class="form-control" id="whatsapp_id" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][whatsapp_id];?>" /></td>
		            </tr>
		            <tr>
		            <td><strong>ไอดี Zello :</strong></td>
		            <td><input name="zello_id" type="text" class="form-control" id="zello_id" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][zello_id];?>" /></td>
		            </tr>
        <tr>
          <td width="120">&nbsp;</td> 
          <td><button type="button" class="btn btn-primary btn-lg"   id="submit_data"   > <span id="txt_btn_save"> บันทึกข้อมูล </span> </button>
            <script>
  $("#submit_data").click(function(){
	  
 
 		 
  $.post('go.php?name=content/load&file=contact&op=sub_edit_action&id=<?=$_GET[id];?>',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
   var url_page_type= "go.php?name=content/load&file=contact&main=<?=$_GET[main];?>&sub=<?=$_GET[sub];?>&contact=<?=$arr[contact][product_id];?>";
	  
 
 $('#show_data_page').load(url_page_type);
	  
 
 
 
  
			   });
			  </script>
            </td>
          </tr>
      </table></td>
      <td width="250" valign="top"><?
 $rand = substr(str_shuffle('123456789012345678901234567890'),0,30);
 ?>
        <div class="take_photo" >
          <center>
          <script>
 /////////  id driving
 $("#icon_camera_id_logo").click(function(){  
 
  document.getElementById('upload_pic_type').value='id_logo';
 
  $("#load_chat_camera").click(); 
  
  });
  
        </script>
          <input class="form-control" type="hidden" name="check_photo_id_logo" id="check_photo_id_logo"   onkeypress="PasswordEnter(this,event)"   value="0" >
          <input class="form-control" type="hidden" name="check_code" id="check_code"   onkeypress="PasswordEnter(this,event)"   value="<?=$rand ?>" >
          <input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"  required="true" onkeypress="PasswordEnter(this,event)"   value="" >
          <i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_logo"></i><br>
          เลือกภาพถ่าย
          <div style="padding:5px;">
            <div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
              <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_logo" style="width:0%;border-radius:5px;border:none"></div>
            </div>
          </div>
        </div></td>
      <td valign="top"><img name="image_id_logo"   
      
      
 <? if($arr[contact][pic_photo]==1){ ?>

 src="../data/pic/user/contact/<?=$_GET[id];?>_photo.jpg?v=<?=time()?>" 

<? }   else {?>
 
 src="mod/content/nophoto.png?v=<?=time()?>"  
      
    <? } ?>  
      
         id="image_id_logo"  style="width:140px; padding:5px; margin-top:  7px;border-radius:15px;border: 3px solid #ddd "  /></td>
    </tr>
  </tbody>
</table>
</td>
        </tr>
    </table></td>
      </tr>
    </table>
    </FORM>
	
<? } ?>




<?

 if($_GET[op] == "sub_add_action"  ){
	//////////////////////////////////////////// ó Database
 
		//include("includes/class.resizepic.php");
 
	
		//ӡŧҵ
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   
////////////////
		$db->add_db('shopping_contact',array(
 
 
 		"pic_photo"=>"$_POST[check_photo_id_logo]",
		 "product_id"=>"$_GET[contact]",
			
			"name"=>"$_POST[name]",
			
			"usertype"=>"$_POST[usertype]",
 			"admintype"=>"$_POST[admintype]",
		"phone"=>"$_POST[phone]",
		"phone_2"=>"$_POST[phone_2]",
		"email"=>"$_POST[email]",	
		"email_2"=>"$_POST[email_2]",	
		"line_id"=>"$_POST[line_id]",	
		"wechat_id"=>"$_POST[wechat_id]",	
		"skype_id"=>"$_POST[skype_id]",	
		"whatsapp_id"=>"$_POST[whatsapp_id]",	
		"zello_id"=>"$_POST[zello_id]",	
 
		));
		
		
		$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
 
$next_increment     = 0;
$qShowStatus        = "SHOW TABLE STATUS LIKE 'shopping_contact'";
$qShowStatusResult  = mysql_query($qShowStatus) or die ( "Query failed: " . mysql_error() . "<br/>" . $qShowStatus );
$row = mysql_fetch_assoc($qShowStatusResult);

$last_id = $row['Auto_increment']-1;



if($_POST[check_photo_id_logo]==1){ 

@copy ("../data/fileupload/store/place/".$_POST[check_code]."_id_logo.jpg", "../data/pic/user/contact/".$last_id."_photo.jpg" );    
 @unlink ("../data/fileupload/store/place/".$_POST[check_code]."_id_logo.jpg" ); 	
}
		
		
		
		
		
		
		
		
		
		
 }


?>


 
 
 
 
<?

 if($_GET[op] == "sub_add_all_action"  ){
	//////////////////////////////////////////// ó Database
 
		//include("includes/class.resizepic.php");
 
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

			while(list($key, $value) = each ($_POST['list'])
 
		
		){
			
			
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[contact] = $db->select_query("SELECT * FROM shopping_contact  WHERE  id='".$value."'  ");
$arr[contact] = $db->fetch($res[contact]);
			
	
	
	
		//ӡŧҵ
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   
////////////////
		$db->add_db('shopping_contact',array(
 
 		"pic_photo"=>$arr[contact][pic_photo],
		 "product_id"=>$_GET[id],
			
			"name"=>$arr[contact][name],
			
			"usertype"=>$arr[contact][usertype],
 			"admintype"=>$arr[contact][admintype],
		"phone"=>$arr[contact][phone],
		"phone_2"=>$arr[contact][phone_2],
		"email"=>$arr[contact][email],
		"email_2"=>$arr[contact][email_2],
		"line_id"=>$arr[contact][line_id],
		"wechat_id"=>$arr[contact][wechat_id],
		"skype_id"=>$arr[contact][skype_id],
		"whatsapp_id"=>$arr[contact][whatsapp_id],
		"zello_id"=>$arr[contact][zello_id],
 
		));
		
 
		
		}
		
		
		
		
 }


?>

 
 
 
 
 
 
 
 
 
 
<?
 if($_GET[op] == "sub_edit_action"  ){
	//////////////////////////////////////////// ó Database Edit
 
 
				//ӡ䢢ŧҵ
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		
		$result = $db->update_db('shopping_contact',array(
 
			"name"=>"$_POST[name]",
			
			"usertype"=>"$_POST[usertype]",
			"admintype"=>"$_POST[admintype]",
 
		"phone"=>"$_POST[phone]",
		"phone_2"=>"$_POST[phone_2]",
 		"email"=>"$_POST[email]",	
		"email_2"=>"$_POST[email_2]",	
		"line_id"=>"$_POST[line_id]",	
		"wechat_id"=>"$_POST[wechat_id]",	
		"skype_id"=>"$_POST[skype_id]",	
		"whatsapp_id"=>"$_POST[whatsapp_id]",	
		"zello_id"=>"$_POST[zello_id]",	

 
		)," id=$_GET[id] ");
	 
		
		
$last_id = $_GET[id];
 

if($_POST[check_photo_id_logo]==1){ 


	  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('shopping_contact', array(
 
			  "pic_photo" => "1"
 
		)," id='".$_GET[id]."' ");


@unlink ("../data/pic/user/contact/".$last_id."_photo.jpg" ); 	

@copy ("../data/fileupload/store/place/".$_POST[check_code]."_id_logo.jpg", "../data/pic/user/contact/".$last_id."_photo.jpg" );    
 @unlink ("../data/fileupload/store/place/".$_POST[check_code]."_id_logo.jpg" ); 	
}

//echo json_encode($result);
		
	}
 
 
 ?>
 
 
 
 
 
 <?
  if($_GET[op] == "sub_del"){
	//////////////////////////////////////////// óź Form
 
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->del('shopping_contact'," id='".$_GET[id]."' "); 
	 
		$db->closedb ();
  }
?>
 
 <? 
 	if($_GET[op]=="sub_add_type"){ 
 	include("mod/content/menu/contact.php");
 	?>

	<form id="add_type_form">
	<table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td width="650" valign="top">
      <table width="100%" border="0" cellspacing="3" cellpadding="3">

		          <tr>
		            <td width="30" align="center"><strong>ชื่อตำแหน่ง ไทย :</strong></td>
		            <td><input name="name_th" type="text" class="form-control" id="name_th" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][topic_en];?>" /></td>
		            </tr>
		            <tr>
		            <td width="30" align="center"><strong>ชื่อตำแหน่ง อังกฤษ :</strong></td>
		            <td><input name="name_en" type="text" class="form-control" id="name_en" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][topic_en];?>" /></td>
		            </tr> 
		            <tr>
		            <td width="30" align="center"><strong>ชื่อตำแหน่ง จีน :</strong></td>
		            <td><input name="name_cn" type="text" class="form-control" id="name_cn" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][topic_en];?>" /></td>
		            </tr> 

				  <tr>
				  	<td>   <button type="button" class="btn btn-primary btn-lg"   id="submit_data"   >
                <span id="txt_btn_save">
                  บันทึกข้อมูล
                  </span>
                </button></td>
				  </tr>
       
        </table></td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
    </table>	
	</form>
	<br />
	<?
	 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[type] = $db->select_query("SELECT * FROM shopping_contact_type where status = 1  ");
	
	 ?>
	
  
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ลำดับ</th>
        <th>ชื่อไทย</th>
        <th>ชื่ออังกฤษ</th>
        <th>ชื่อจีน</th>
        <th>สถานะ</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <? $num = 1;
    while($arr[type] = $db->fetch($res[type])){ 
    	if($arr[type][status]==1){
			$status = "เปิด";
		}else{
			$status = "ปิด";
		}
    ?>
    <form id="edit_form_<?=$arr[type][id];?>" name="edit_form_<?=$arr[type][id];?>" method="post">
      <tr id="row_edit_<?=$arr[type][id];?>">
        <td><?=$num;?></td>
        <td>
        <input type="text" name="name_th_<?=$arr[type][id];?>" id="name_th_<?=$arr[type][id];?>" value="<?=$arr[type][name_th];?>" style="display: none;"/><span id="text_th_<?=$arr[type][id];?>"><?=$arr[type][name_th];?></span>
        </td>
        <td><input type="text" id="name_en_<?=$arr[type][id];?>" value="<?=$arr[type][name_en];?>" style="display: none;"/><span id="text_en_<?=$arr[type][id];?>"><?=$arr[type][name_en];?></span></td>
        <td><input type="text" id="name_cn_<?=$arr[type][id];?>" value="<?=$arr[type][name_cn];?>" style="display: none;"/><span id="text_cn_<?=$arr[type][id];?>"><?=$arr[type][name_cn];?></span></td>
        <td><span id="text_status_<?=$arr[type][id];?>"><?=$status;?></span></td>
        <td width="20"><button class="btn btn-xs btn-info" onclick="editType('<?=$arr[type][id];?>')" id="edit_btn_<?=$arr[type][id];?>">แก้ไข</button><button class="btn btn-xs btn-success" onclick="saveEditType('<?=$arr[type][id];?>')" id="save_edit_btn_<?=$arr[type][id];?>" style="display: none;">บันทึก</button></td>
        <td width="20"><button class="btn btn-xs" id="del_btn_<?=$arr[type][id];?>" onclick="delType('<?=$arr[type][id];?>')">ลบ</button><button id="restore_btn_<?=$arr[type][id];?>" class="btn btn-xs btn-warning" onclick="restoreType('<?=$arr[type][id];?>')" style="display: none;">กู้คืน</button></td>
      </tr>
      </form>
      <? $num++; } ?>
    </tbody>
  </table>

<script>
	$('#txt_btn_save').click(function(){
		var url = 'mod/content/load/save_type_contact.php?action=add';
		$.post( url,$( '#add_type_form' ).serialize(), function( data ) {
//		  $( ".result" ).html( data );
			console.log(data);
			if(data==1){
				$('#add_type_contact').click();
			}
			
		});
		
		
	});
	function editType(id){
//		var url = 'mod/content/load/save_type_contact.php?action=edit';
		$('#name_th_'+id).show();
		$('#text_th_'+id).hide();
		
		$('#name_en_'+id).show();
		$('#text_en_'+id).hide();
		
		$('#name_cn_'+id).show();
		$('#text_cn_'+id).hide();
		
		$('#edit_btn_'+id).hide();
		$('#save_edit_btn_'+id).show();
		
		
	}
	function saveEditType(id){
	
		var url = 'mod/content/load/save_type_contact.php?action=edit&id='+id;
		var name_th = $('#name_th_'+id).val();
		var name_en = $('#name_en_'+id).val();
		var name_cn = $('#name_cn_'+id).val();
		$.post( url,{ name_th: name_th, name_en: name_en, name_cn: name_cn }, function( data ) {
			console.log(data);
			if(data==1){
				$('#name_th_'+id).hide();
				$('#text_th_'+id).text(name_th);
				$('#text_th_'+id).show();
				
				$('#name_en_'+id).hide();
				$('#text_en_'+id).text(name_en);
				$('#text_en_'+id).show();
				
				$('#name_cn_'+id).hide();
				$('#text_cn_'+id).text(name_cn);
				$('#text_cn_'+id).show();
				
				$('#row_edit_'+id).css('background-color','rgba(133, 255, 91, 0.23)');
				setTimeout(function(){ $('#row_edit_'+id).css('background-color','#fff'); }, 3000);
				
				$('#edit_btn_'+id).show();
				$('#save_edit_btn_'+id).hide();
			}
			
		});
	}
	function delType(id){
		
		var url = 'mod/content/load/save_type_contact.php?action=del&id='+id;
		$.post( url, function( data ) {
			console.log(data);
			if(data==1){
				$('#del_btn_'+id).hide();
				$('#restore_btn_'+id).show();
				$('#row_edit_'+id).css('background-color','rgba(234, 39, 39,  0.2)');
				$('#text_status_'+id).text('ปิด');
			}
			
		});	
	}
	function restoreType(id){
		var url = 'mod/content/load/save_type_contact.php?action=restore&id='+id;
		$.post( url, function( data ) {
			console.log(data);
			if(data==1){
				$('#restore_btn_'+id).hide();
				$('#del_btn_'+id).show();
				$('#row_edit_'+id).css('background-color','#fff');
				$('#text_status_'+id).text('เปิด');
			}
			
		});	
	}
</script>
	
		
 <?	}
 ?>
 
 <? 
 	if($_GET[op]=="sub_add_type_admin"){ 
 	include("mod/content/menu/contact.php");
 	?>

	<form id="add_type_form">
	<table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td width="650" valign="top">
      <table width="100%" border="0" cellspacing="3" cellpadding="3">

		          <tr>
		            <td width="30" align="center"><strong>ชื่อตำแหน่ง ไทย :</strong></td>
		            <td><input name="name_th" type="text" class="form-control" id="name_th" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][topic_en];?>" /></td>
		            </tr>
		            <tr>
		            <td width="30" align="center"><strong>ชื่อตำแหน่ง อังกฤษ :</strong></td>
		            <td><input name="name_en" type="text" class="form-control" id="name_en" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][topic_en];?>" /></td>
		            </tr> 
		            <tr>
		            <td width="30" align="center"><strong>ชื่อตำแหน่ง จีน :</strong></td>
		            <td><input name="name_cn" type="text" class="form-control" id="name_cn" style="width:500px; background:#FFFFFF" value="<? echo $arr[contact][topic_en];?>" /></td>
		            </tr> 

				  <tr>
				  	<td>   <button type="button" class="btn btn-primary btn-lg"   id="submit_data"   >
                <span id="txt_btn_save">
                  บันทึกข้อมูล
                  </span>
                </button></td>
				  </tr>
       
        </table></td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
    </table>	
	</form>
	<br />
	<?
	 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[type] = $db->select_query("SELECT * FROM shopping_contact_admin_type where status = 1  ");
	
	 ?>
	
  
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ลำดับ</th>
        <th>ชื่อไทย</th>
        <th>ชื่ออังกฤษ</th>
        <th>ชื่อจีน</th>
        <th>สถานะ</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <? $num = 1;
    while($arr[type] = $db->fetch($res[type])){ 
    	if($arr[type][status]==1){
			$status = "เปิด";
		}else{
			$status = "ปิด";
		}
    ?>
    <form id="edit_form_<?=$arr[type][id];?>" name="edit_form_<?=$arr[type][id];?>" method="post">
      <tr id="row_edit_<?=$arr[type][id];?>">
        <td><?=$num;?></td>
        <td>
        <input type="text" name="name_th_<?=$arr[type][id];?>" id="name_th_<?=$arr[type][id];?>" value="<?=$arr[type][name_th];?>" style="display: none;"/><span id="text_th_<?=$arr[type][id];?>"><?=$arr[type][name_th];?></span>
        </td>
        <td><input type="text" id="name_en_<?=$arr[type][id];?>" value="<?=$arr[type][name_en];?>" style="display: none;"/><span id="text_en_<?=$arr[type][id];?>"><?=$arr[type][name_en];?></span></td>
        <td><input type="text" id="name_cn_<?=$arr[type][id];?>" value="<?=$arr[type][name_cn];?>" style="display: none;"/><span id="text_cn_<?=$arr[type][id];?>"><?=$arr[type][name_cn];?></span></td>
        <td><span id="text_status_<?=$arr[type][id];?>"><?=$status;?></span></td>
        <td width="20"><button class="btn btn-xs btn-info" onclick="editType('<?=$arr[type][id];?>')" id="edit_btn_<?=$arr[type][id];?>">แก้ไข</button><button class="btn btn-xs btn-success" onclick="saveEditType('<?=$arr[type][id];?>')" id="save_edit_btn_<?=$arr[type][id];?>" style="display: none;">บันทึก</button></td>
        <td width="20"><button class="btn btn-xs" id="del_btn_<?=$arr[type][id];?>" onclick="delType('<?=$arr[type][id];?>')">ลบ</button><button id="restore_btn_<?=$arr[type][id];?>" class="btn btn-xs btn-warning" onclick="restoreType('<?=$arr[type][id];?>')" style="display: none;">กู้คืน</button></td>
      </tr>
      </form>
      <? $num++; } ?>
    </tbody>
  </table>

<script>
	$('#txt_btn_save').click(function(){
		var url = 'mod/content/load/save_type_contact_admin.php?action=add';
		$.post( url,$( '#add_type_form' ).serialize(), function( data ) {
//		  $( ".result" ).html( data );
			console.log(data);
			if(data==1){
				$('#add_type_contact_add').click();
			}
			
		});
		
		
	});
	function editType(id){
//		var url = 'mod/content/load/save_type_contact.php?action=edit';
		$('#name_th_'+id).show();
		$('#text_th_'+id).hide();
		
		$('#name_en_'+id).show();
		$('#text_en_'+id).hide();
		
		$('#name_cn_'+id).show();
		$('#text_cn_'+id).hide();
		
		$('#edit_btn_'+id).hide();
		$('#save_edit_btn_'+id).show();
		
		
	}
	function saveEditType(id){
	
		var url = 'mod/content/load/save_type_contact_admin.php?action=edit&id='+id;
		var name_th = $('#name_th_'+id).val();
		var name_en = $('#name_en_'+id).val();
		var name_cn = $('#name_cn_'+id).val();
		$.post( url,{ name_th: name_th, name_en: name_en, name_cn: name_cn }, function( data ) {
			console.log(data);
			if(data==1){
				$('#name_th_'+id).hide();
				$('#text_th_'+id).text(name_th);
				$('#text_th_'+id).show();
				
				$('#name_en_'+id).hide();
				$('#text_en_'+id).text(name_en);
				$('#text_en_'+id).show();
				
				$('#name_cn_'+id).hide();
				$('#text_cn_'+id).text(name_cn);
				$('#text_cn_'+id).show();
				
				$('#row_edit_'+id).css('background-color','rgba(133, 255, 91, 0.23)');
				setTimeout(function(){ $('#row_edit_'+id).css('background-color','#fff'); }, 3000);
				
				$('#edit_btn_'+id).show();
				$('#save_edit_btn_'+id).hide();
			}
			
		});
	}
	function delType(id){
		
		var url = 'mod/content/load/save_type_contact_admin.php?action=del&id='+id;
		$.post( url, function( data ) {
			console.log(data);
			if(data==1){
				$('#del_btn_'+id).hide();
				$('#restore_btn_'+id).show();
				$('#row_edit_'+id).css('background-color','rgba(234, 39, 39,  0.2)');
				$('#text_status_'+id).text('ปิด');
			}
			
		});	
	}
	function restoreType(id){
		var url = 'mod/content/load/save_type_contact_admin.php?action=restore&id='+id;
		$.post( url, function( data ) {
			console.log(data);
			if(data==1){
				$('#restore_btn_'+id).hide();
				$('#del_btn_'+id).show();
				$('#row_edit_'+id).css('background-color','#fff');
				$('#text_status_'+id).text('เปิด');
			}
			
		});	
	}
</script>
	
		
 <?	}
 ?>
 
  
 