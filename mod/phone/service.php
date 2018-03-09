 
<style type="text/css">
<!--
.topicname { padding-top:10px; padding-left:0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #666666 ; text-align:left;  
 
}
 

 
-->
</style>  

 <div class="box box-default">
 
   <div class="box box-default">
          <h2 class="box-title"><span class="font_24"><b>ศูนย์บริการและประกันภัย</b></span></h2>
 
   </div>
     <div class="box-body"  style="margin-top:-10px; padding 0px">
  
<form method="post" action="" id="edit_form" name="edit_form"  enctype="multipart/form-data" >

 <!-- iCheck -->
 
		          
			      
 
                    <div class="topicname" style="display:none "><i class="fa  fa-wrench"></i>&nbsp;รายการตรวจเช็ค</div>
                    <table width="100%"  border="0" cellspacing="2" cellpadding="2"  style="display:none ">
                      <tr>
					   <td style="width:150px; height:50px; "> 
 
<input name="GroupedSwitches"  type="checkbox" id="TheCheckBox2" value="1" data-off-text="ชำรุด" data-on-text="สมบูรณ์"   >
 
			 
			 </td>
			 
                        <td style="padding-bottom:10px; font-size:22px; font-weight:bold; padding-left:10px; ">หม้อน้ำ</td>
					  </tr>
						 
						  <tr>
                   <td style="width:150px; height:50px; "> 
						<input name="GroupedSwitches"  type="checkbox" id="TheCheckBox2" value="1" data-off-text="ชำรุด" data-on-text="สมบูรณ์"   ></td>
						
                        <td style="padding-bottom:10px; font-size:22px; font-weight:bold;padding-left:10px;">น้ำมันเครื่อง</td>
                      
						</tr>
						
						<tr>
						<td style="width:150px; height:50px; "> 
						 
						 <input name="GroupedSwitches"  type="checkbox" id="TheCheckBox2" value="1" data-off-text="ชำรุด" data-on-text="สมบูรณ์"   ></td>
                        <td style="padding-bottom:10px; font-size:22px; font-weight:bold;padding-left:10px; ">ลมยาง</td>
						</tr>
						<tr>
						
                      <td style="width:150px; height:50px; "> 
					  
					  <input name="GroupedSwitches"  type="checkbox" id="TheCheckBox2" value="1" data-off-text="ชำรุด" data-on-text="สมบูรณ์"   ></td>
						  <td style="padding-bottom:10px; font-size:22px; font-weight:bold;padding-left:10px; ">ที่ปัดน้ำฝน</td>
                        
                      </tr>
                    </table>
              
			   

  
  <div  id="send_user_data"></div>
  <select name="drivername"  onchange="img_driver('<?=$name;?>',this.value)" id="drivername<?=$_GET[data_for]?>"  class="chosen-selects"  style="font-size:22px; padding-bottom: 1px; background-color:#FFFFFF; height:40px; width:100%;" chosen width="'100%'">
                      <option value="0" selected="selected">-- ทุกประเภท --</option>
					    <option value="1">-- ศูนย์บริการซ่อมรถ --</option>
						 <option value="2">-- บริษัทประกันภัย --</option>
                      <?
					  /*
                      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                      $res[category] = $db->select_query("SELECT * FROM ".TB_driver." where id > 0 and status=1    and nickname<>'' and company<>'' ORDER BY abs(company) asc, convert(nickname using tis620)  desc");
while ($arr[category] = $db->fetch($res[category])){

	$res[company] = $db->select_query("SELECT id,company FROM web_admin where id='".$arr[category][company]."'   ");
    $arr[company] = $db->fetch($res[company]);
 
 
   
	   echo "<option value=\"".$arr[category][id]."\"";
	   if($arr[category][id] == $arr[project][drivername]){echo " Selected";}
	   echo ">".$arr[category][nickname]."  (".$arr[company][company].")</option>";
	   }
                      $db->closedb ();
					  */
                      ?>
  </select>
  <?
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$res[private_phone] = $db->select_query("SELECT * FROM  web_transferplace_service ");
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
                    <li><a href="tel:<?=$arr[private_phone][phone_off];?>" id="call_<?=$arr[private_phone][id]?>"><i class="fa fa-phone"></i>โทรออก</a></li>
 
 
                  </ul>
              </div>
			  
			  
	    </td>
    <td class="font_16"><b><div style="padding-bottom:3px; "><?=$arr[private_phone][service_company];?></div></b><?=$arr[private_phone][phone_off];?>	<div style="font-size:18px; color:#009999 "><?=$arr[type][name]?></div> </td>
    </tr>
</table>
  
     </div>
  </div>
	 
	 
	 
	 
 <? } ?>  
 
  
    <div style="margin-top:10px; display:none"   >
 <table width="100%"  border="0" cellspacing="2" cellpadding="2" >
  <tr>
    <td width="150" style="padding:5 px;"><button id="submit_user_network" type="button" class="btn btn-block btn-primary" style="width:140px ">ส่งข้อมูล</button></td>
    <td style="padding:5px;"><button type="reset" class="btn btn-block btn-default"  style="width:140px ">รีเซ็ต</button></td>
  </tr>
</table>
 
  </div>
        
  </div>
  
    <!----- ปิด row-->
   
  </div>
     </div>  
  	
 	<div id="popup_line"></div> 
	<div id="popup_zello"></div> 
	<div id="popup_wechat"></div> 
	<div id="popup_skype"></div> 
  <script>
      	var url_zello= "popup.php?name=load/qrcode&file=button&userid=<?=$arr[web_user][post_date];?>&type=zello";
$('#pic_zello').load(url_zello);
    	var url_popup_zello = "popup.php?name=load/qrcode&file=pic&userid=<?=$arr[web_user][post_date];?>&type=zello";
$('#popup_zello').load(url_popup_zello);
  
    	var url_line = "popup.php?name=load/qrcode&file=button&userid=<?=$arr[web_user][post_date];?>&type=line";
$('#pic_line').load(url_line);
    	var url_popup_line = "popup.php?name=load/qrcode&file=pic&userid=<?=$arr[web_user][post_date];?>&type=line";
$('#popup_line').load(url_popup_line);




    	var url_wechat= "popup.php?name=load/qrcode&file=button&userid=<?=$arr[web_user][post_date];?>&type=wechat";
$('#pic_wechat').load(url_wechat);
    	var url_popup_wechat = "popup.php?name=load/qrcode&file=pic&userid=<?=$arr[web_user][post_date];?>&type=wechat";
$('#popup_wechat').load(url_popup_wechat);
//alert(url_popup_1);

    	var url_skype= "popup.php?name=load/qrcode&file=button&userid=<?=$arr[web_user][post_date];?>&type=skype";
$('#pic_skype').load(url_skype);
    	var url_popup_skype = "popup.php?name=load/qrcode&file=pic&userid=<?=$arr[web_user][post_date];?>&type=skype";
$('#popup_skype').load(url_popup_skype);



//alert(00);
 
  
  
  
  
  
  
  
  
  
 /// check login

$("#submit_user_network").click(function(){ 
//$('#file_upload_line').click();

 
/*
if(document.getElementById('username').value=="") {
swal('กรุณากรอกชื่อผู้ใช้งาน'); 
document.getElementById('username').focus() ; 
return false ;
}
 */
 $.post('popup.php?name=user&file=savedata&type=network&id=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   $('#send_user_data').html(response);
  });
  
  
 });
 </script> 
 
 
 </form> 
 