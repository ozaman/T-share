
<form method="post" id="add_group_form" name="add_group_form"  enctype="multipart/form-data">




<?
 $rand = substr(str_shuffle('123456789012345678901234567890'),0,30);
?>
 
 
<script>
$('.back-full-popup-button-add-group').click(function(){  

  var url_save = "go.php?name=livechat/all/save&file=add_group&type=del_group&time=<?=$rand;?>";
 
 $('#save_data_add_new_group').load(url_save); 
 
 $( "#load_data_manage_work_show" ).toggle(); 
});


</script> 



<script>
 /// check login

$("#td_btn_add_group").click(function(){ 
 
 
if(document.getElementById('group_name').value=="") {
alert('กรุณากรอกรหัสผ่าน'); 
document.getElementById('group_name').focus() ; 
return false ;
}
 
 
 

 var url_save = "go.php?name=livechat/all/save&file=add_group&type=save_add_group&time=<?=$rand;?>";
 
 
 $.post(url_save,$('#add_group_form').serialize(),function(response){
   $('#save_data_add_new_group').html(response);
   
   
   
   
   
  });
  
  
  
  
  
 });
 </script> 











 
<script type="text/javascript" src="js/dialog/main.js"></script>
 
	  
			  
		   
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <script src="plugins/iCheck/icheck.min.js"></script>








 
 
  <div class="back-full-popup" style="width:100%; margin-left:-10px; "> 
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div class="back-full-popup-button-add-group" ><?=$popup_icon_left_arow;?></div></td>
  <td   >
  
  <div style="font-size:18px; color:#FFFFFF " > เพิ่มกลุ่มสนทนา</b></div></td>
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
				 <input class="form-control" type="text" name="find_user" id="find_user"   required="true"  onkeypress="UserEnter(this,event)" value="<?=$arr[member][password];?>"  placeholder="ค้นหา" style="height:40px;"   >
        </div>
              <!-- /.form-group -->			  
 
         <br />
		 
       

				<table width="100%" border="0" cellspacing="1" cellpadding="1">
                   <tr>
                     <td><input class="form-control" type="text" name="group_name" id="group_name"     value="<?=$arr[member][password];?>"  placeholder="สร้างกลุ่มใหม่" style="height:40px; width:100%" /></td>
                     <td width="50" id="show_btn_add_group" style="display:none" >	<div id="td_btn_add_group">
					 		
 			 
 <button class="input-group-addon" style="background-color:#999999; width:50px;" id="btn_add_group"><i class="fa  fa-plus" style="font-size:24px; color:#FFFFFF"></i></button>
 				
						    </div>
					 </td>
                   </tr>
        </table>
              
			  
 		  
		  
			  
<span class="input-group">
<input  type="hidden" name="all_user" id="all_user"   required="true"  onkeypress="UserEnter(this,event)" value="0"  placeholder="ค้นหา"  >
</span>


<div id="load_data_add_new_group" style="padding-top:10px"></div>

<div id="save_data_add_new_group" style=" display:noned"> 

</div>
			  
			  
              <!-- /.form-group -->			  
 
         <br />
		 
		 
		 
		 
	  </td>
  </tr>
</table>

   
   
 
 	 
 </div>			
		
		
		
	 <?
 
$db->connectdb(DB_NAME_CHAT_CONTACT, DB_USERNAME, DB_PASSWORD);  
$limit = 100 ;
 $SUMPAGE = $db->num_rows('chat_group',"id","$SQLwhere");
$page=$_GET[page];
if (empty($page)){
	$page=1;
}


$rt = $SUMPAGE%$limit ;
$totalpage = ($rt!=0) ? floor($SUMPAGE/$limit)+1 : floor($SUMPAGE/$limit); 
$goto = ($page-1)*$limit ;

$res[chat] = $db->select_query("SELECT * FROM  chat_group  ORDER BY id ASC ");
$count=0;

while($arr[chat] = $db->fetch($res[chat])){

$bgcolor = ($i++ & 1) ? '' : ''; 
 


if($arr[chat][class_name]=='customer'){

$web_data="web_book_agent";
 
}

if($arr[chat][class_name]=='callcenter'){

$web_data="web_admin";

}






if($arr[chat][class_name]=='driver'){

$web_data="web_driver";
}

if($arr[chat][class_name]=='agent'){

$web_data="web_admin";

}

if($arr[chat][class_name]=='supplier'){

$web_data="web_admin";


}






	//if ($count==0) { echo "<TR>"; }
	
 

?>


<script>
 
 /// check login
 

 /*
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
     radioClass: 'iradio_square-blue',
  increaseArea: '20%' // optional
    });
  });
  */
</script>

	<script>
 
	
	///$('#div_btn_send_text_store').hide();
	$("#check_user_<?=$arr[chat][id]?>" ).click(function() {
	
 
 
	if( document.getElementById("check_user_<?=$arr[chat][id]?>").checked ==true){
	
 
 var url_save = "go.php?name=livechat/all/save&file=add_group&id=<?=$arr[chat][id]?>&type=add_group&action=add&time=<?=$rand;?>";
 
 $('#save_data_add_new_group').load(url_save); 
 
 
 
	
	}
	 
		if( document.getElementById("check_user_<?=$arr[chat][id]?>").checked == false){
	
 var url_save = "go.php?name=livechat/all/save&file=add_group&id=<?=$arr[chat][id]?>&type=add_group&action=delete&time=<?=$rand;?>";
 
 $('#save_data_add_new_group').load(url_save); 
 
	
	}
	
	
	
//	alert(document.getElementById('check_user_<?=$arr[chat][id]?>').value);
	
	///$('.text_class').css('background-color', '<?=$bgcolor ?>');
	//$('#div_btn_send_text_store').show();
	
 
///  document.getElementById('message_store').value='<?=$arr[category][id]?>';
 /// $('#div_text_<?=$arr[category][id]?>').css('background-color', '#F6F6F6');
 
 
});
	
 	</script>







 <div style="background-color:<?=$bgcolor?> ; margin-top:0px; border-bottom:solid 1px; color:#E6E6E6; padding-bottom:5px;"  id="message_main_<?=$arr[chat][id]?>" >
 
 
 
 
 <table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="39"><table width="32" border="0" cellpadding="0"   cellspacing="0" style="border:solid 0px; border-color:#DADADA">
      <tr>
        <td width="40">
		
		
			    <?
$filename = "../data/images/logo//".$arr[chat][company].".jpg";
if (file_exists($filename)) { // Ǩͺ
?>
		<img src="../data/images/logo/<?=$arr[chat][company];?>.jpg?v=<?=time()?>" width="30" height="30" border="0" class="mainpic_index"  style="border:solid 1px; border-color:#DADADA;border-radius:5px;" />
		
		
	    <? }else { ?>
 
		
		
				<img src="../data/images/nologo.png" width="30" height="30" border="0" class="mainpic_index"  style="border:solid 1px; border-color:#DADADA;border-radius:5px;" />
		
		
        <?
}
?>
		
		
		
		
		
		
		

		
		
		
		</td>
      </tr>
    </table></td>
    <td    valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:40px;" >   <div id="message_user_<?=$arr[chat][id]?>" style="font-size:14px; color:#000000; font-weight:bold ">
                              <?= $arr[chat][name] ?></div>                        </td>
                      </tr>
                      <tr>
                        <td  style="text-transform:capitalize; font-size:12px; color:#999999"><?= $arr[chat][class_name] ?></td>
                      </tr>
                    </table>
    </td>
    <td width="50" align="right" id="div_check_user_<?=$arr[chat][id]?>" style="width:20px; height:20px;">  
 
      <input name="check_user_<?=$arr[chat][id]?>"  type="checkbox" id="check_user_<?=$arr[chat][id]?>"   value="1" style="width:20px; height:20px; box-shadow:none"> </td>
  </tr>
</table>

 
 
 
 
 </div>			
				 
 <p>
   <?
}
 
$db->closedb ();
//������ʴ��������
?>	
		
		
		
		
		
				 
 
   <br />
   <br />
 </p>
 <p>&nbsp;</p>
 <p><br />
   <br />
   
   
   
    
 </p>
 </form>