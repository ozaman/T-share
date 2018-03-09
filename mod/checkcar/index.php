<style type="text/css">
<!--
.topicname { padding-top:10px; padding-left:0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #666666 ; text-align:left;  
 
}
 

 
-->
</style>  

 <div class="box box-default">
 
   <div class="box box-default">
          <h2 class="box-title"><span class="font_24"><b>ตรวจเช็คสภาพรถ</b></span></h2>
 
   </div>
     <div class="box-body"  style="margin-top:-10px; padding 0px">
  
<form id="edit_form"  name="edit_form" action="popup.php?name=checkcar/file&file=upload_pic&type=carcare" method="post" enctype="multipart/form-data"   target="uploadtarget">

 <!-- iCheck -->
 
		          <div class="topicname"><i class="fa  fa-automobile"></i>&nbsp;ข้อมูลรถ</div><table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td><select name="car" id="car"  class="form-control"  style="font-size:20px; font-weight:bold; height:45px;" onchange="return find_transfer_status_check();" >
		  <option value="" selected="selected">-- กรุณาเลือก --</option>
 
            <?
        $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $res[category] = $db->select_query("SELECT * FROM " . TB_carall . "  where company=276 or company=283 or company=284 order by company,car_num asc");
        ;
        while ($arr[category] = $db->fetch($res[category])) {
            $res[aum]   = $db->select_query("SELECT * FROM " . TB_carall_type . " WHERE id='" . $arr[category][car_type] . "' ");
            $arr[aum]   = $db->fetch($res[aum]);
            $res[aum]   = $db->select_query("SELECT * FROM " . TB_carall_type . " WHERE id='" . $arr[category][car_type] . "' ");
            $arr[aum]   = $db->fetch($res[aum]);
			
			if($arr[aum][topic_en]=='Car'){
			$arr[aum][topic_en]='รถเก๋ง';
			}
			if($arr[aum][topic_en]=='Van'){
			$arr[aum][topic_en]='รถตู้';
			}
			
			
            //$res[cartype] = $db->select_query("SELECT * FROM ".TB_carall." WHERE id='".$arr[category][car_type]."' ");
            //$arr[cartype] = $db->fetch($res[cartype);
            $res[admin] = $db->select_query("SELECT * FROM " . TB_admin . " WHERE id='" . $arr[category][company] . "' ");
            $arr[admin] = $db->fetch($res[admin]);
            echo "<option value=\"" . $arr[category][id] . "\"";
            if ($arr[category][id] == $arr[web_user][car_num]) {
                echo " Selected";
            }
            echo ">" . $arr[category][car_num] . "  ( " . $arr[aum][topic_en] . " )  -  " . $arr[admin][company] . "</option>";
        }
        $db->closedb();
?>
          </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
			        <link rel="stylesheet" href="plugins/iCheck/all.css">
 <script src="plugins/iCheck/icheck.min.js"></script>

<script>
 
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
 
                    <div class="topicname"><i class="fa  fa-wrench"></i>&nbsp;รายการตรวจเช็ค</div>
                    <table width="100%"  border="0" cellspacing="2" cellpadding="2" >
                      <tr>
					   <td style="width:30px; height:40px; "> 
  
<input name="water"  type="checkbox" id="TheCheckBox2" value="1" data-off-text="ชำรุด" data-on-text="สมบูรณ์"  >
 
			 
			 </td>
			 
                        <td valign="middle" style="padding-bottom:2px; font-size:22px; font-weight:bold; padding-left:10px; ">หม้อน้ำเติมแล้ว</td>
					  </tr>
						 
						  <tr>
                   <td style="width:30px; height:40px; "> 
						<input name="oil"  type="checkbox" id="TheCheckBox2" value="1" data-off-text="ชำรุด" data-on-text="สมบูรณ์"   ></td>
						
                        <td valign="middle" style="padding-bottom:2px; font-size:22px; font-weight:bold;padding-left:10px;">น้ำมันเครื่องเช็คแล้ว</td>
                      
						</tr>
						
						<tr>
						<td style="width:30px; height:40px; "> 
						 
						 <input name="rubber"  type="checkbox" id="TheCheckBox2" value="1" data-off-text="ชำรุด" data-on-text="สมบูรณ์"   ></td>
                        <td valign="middle" style="padding-bottom:2px; font-size:22px; font-weight:bold;padding-left:10px; ">ลมยางเช็คแล้ว</td>
						</tr>
						<tr>
						
                      <td style="width:30px; height:40px; "> 
					  
					  <input name="rain"  type="checkbox" id="TheCheckBox2" value="1" data-off-text="ชำรุด" data-on-text="สมบูรณ์"   ></td>
						  <td valign="middle" style="padding-bottom:2px; font-size:22px; font-weight:bold;padding-left:10px; ">น้ำที่ปัดน้ำฝนเช็คแล้ว</td>
                        
                      </tr>
  </table>
              
			  
			                      <div class="topicname"><i class="fa  fa-automobile"></i>&nbsp;ภาพถ่ายรถ</div>
                     <p>
                                    <input type="file" class="form-control" name="pic_file_1" id="pic_file_1" />
</p>
                                  <p>
                                    <input type="file" class="form-control" name="pic_file_2" id="pic_file_2" />
      </p>
                                  <p>
                                    <input type="file" class="form-control" name="pic_file_3" id="pic_file_3" /> 
      </p>
                                  <p>
                                    <input type="file" class="form-control" name="pic_file_4" id="pic_file_4" />
      </p>
                                  <p>
                                    <input type="file" class="form-control" name="pic_file_5" id="pic_file_5" />    
  </p>
     
                
				
				 
		      
                     <div class="topicname"><i class="fa  fa-pencil-square"></i>&nbsp;รายละเอียดเพิ่มเติม</div>

				  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="padding-right:5px; "><textarea name="detail" rows="5" class="form-control" id="detail" onKeyPress="PasswordEnter(this,event)" required="true"></textarea></td>
    </tr>
</table>

			 
			  
			  
		 
					
			  
			  
		   
					
   
 
		
		 
 
		 
 
 
 
 

  
  <div  id="send_user_data"></div>
  
  
    <div style="margin-top:10px;"  >
 <table width="100%"  border="0" cellspacing="2" cellpadding="2" >
  <tr>
    <td width="150" style="padding:5 px;"><button id="submit_user_network" type="button" class="btn btn-block btn-primary" style="width:140px ">บันทึกข้อมูล</button></td>
    <td style="padding:5px;"><button type="reset" class="btn btn-block btn-default"  style="width:140px ">รีเซ็ต</button>
	<input name="file_upload_submit"  id="file_upload_submit" type="submit" style="display:none">
	
	
	</td>
  </tr>
</table>
 
  </div>
        
  </div>
  
    <!----- ปิด row-->
   
  </div>
     </div>  
  	
 
  <script>
       
  
  
  
  
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
 $('#file_upload_submit').click();
 
 $.post('popup.php?name=checkcar&file=savedata&type=carcare&id=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   $('#send_user_data').html(response);
  });
  
  
 });
 </script> 
 
  <iframe id="uploadtarget" name="uploadtarget" src="" style="width:1px;height:1px;border:0"></iframe>
 </form> 
 