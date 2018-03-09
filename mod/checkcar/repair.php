 
 <script src="mod/checkcar/isFileInputSupported.js"></script>
     <link rel="stylesheet" href="mod/checkcar/styles.css">
 
    <script>
      // Add 'fileinput' class to html if supported
      if (isFileInputSupported) {
        document.documentElement.className += " fileinput";
      }
    </script>
 

<style>
  .speech {border: 1px solid #DDD; width: 300px; padding: 0; margin: 0}
  .speech input {border: 0; width: 240px; }
  .speech img {float: right; width: 40px }
</style>
 
<!-- Search Form -->

 
<!-- HTML5 Speech Recognition API -->
<script>
  function startDictation() {
 
    if (window.hasOwnProperty('webkitSpeechRecognition')) {
 
      var recognition = new webkitSpeechRecognition();
 
      recognition.continuous = false;
      recognition.interimResults = false;
 
      recognition.lang = "th-TH";
      recognition.start();
 
      recognition.onresult = function(e) {
        document.getElementById('transcript').value
                                 = e.results[0][0].transcript;
        recognition.stop();
    //    document.getElementById('labnol').submit();
      };
 
      recognition.onerror = function(e) {
        recognition.stop();
      }
 
    }
  }
</script>


<script>
$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
		
		 
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
 
    input.trigger('fileselect', [numFiles, label]);
  });

 

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {
 
         var input = $(this).parents('.input-group').find(':text'),
		//  var button = $(this).parents('.input-group').find(':button'),
		   // var input = $(this).parents('.input-group').find(':image'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;
 
 



          if( input.length ) {
		   
        input.val("ถ่ายภาพสำเร็จ");
		 input.css({"background": "#fa1431","color": "#337AB7", });
		 input.addClass("form-control");
		 button.addClass("btn-modal-no");
		
		
          } else {
           if( log ) alert(log);
          }

      });
  });
  
});

</script>
<style type="text/css">
<!--
.topicname { padding-top:10px; padding-left:0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #666666 ; text-align:left;  
 
}
 

 
-->
</style>  

 <div class="box box-default">
 
   <div class="box-header with-border">
          <h2 class="box-title"><span class="font_28"><b>แจ้งซ่อมรถ</b></span></h2>
 
   </div>
 <!-- iCheck -->
 
		          
			      
 
     <form id="edit_form"  name="edit_form" action="popup.php?name=checkcar/file&file=upload_pic&type=repair" method="post" enctype="multipart/form-data"   target="uploadtarget">
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


<style>
#testel {
  width: 100px;
  height: 100px;
  background: red;
}

.fileinput #testel {
  background: green;
}


</style><div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        <i class="fa  fa-camera"></i>&nbsp;ถ่ายภาพ<input type="file" class="form-control" name="photo_checkguest_<?=$arr[project][id];?>_1" id="photo_checkguest_<?=$arr[project][id];?>_1" accept="image/*"  capture="camera"  style="display: none;"/> 
                    </span>
                </label>
                <input type="text" class="form-control" value="ยังไม่มีภาพถ่าย" readonly  style="padding-left:5px; padding-right:5px; width:160px" id="url_photo_checkguest_<?=$arr[project][id];?>_1">&nbsp;<button type="button" class="btn btn-default" data-toggle="modal"   style="padding-left:5px; padding-right:5px; width:30px" id="del_photo_checkguest_<?=$arr[project][id];?>_1"><i class="fa  fa-trash" style="font-size:20px; "></i></button>
 
 				 <script>
 
$('#del_photo_checkguest_<?=$arr[project][id];?>_1').click(function(){  
document.getElementById('photo_checkguest_<?=$arr[project][id];?>_1').value='';
document.getElementById('url_photo_checkguest_<?=$arr[project][id];?>_1').value='ยังไม่มีภาพถ่าย';
$('#url_photo_checkguest_<?=$arr[project][id];?>_1').css({"background": "#fa1431","color": "#333333", });

     	});
					
					</script> 
            </div> 

			
			<div class="input-group" style="margin-top:10px; ">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        <i class="fa  fa-camera"></i>&nbsp;ถ่ายภาพ<input type="file" class="form-control" name="photo_checkguest_<?=$arr[project][id];?>_2" id="photo_checkguest_<?=$arr[project][id];?>_2" accept="image/*"  capture="camera"  style="display: none;"/> 
                    </span>    
                </label>
                <input type="text" class="form-control" value="ยังไม่มีภาพถ่าย" readonly  style="padding-left:5px; padding-right:5px; width:160px" id="url_photo_checkguest_<?=$arr[project][id];?>_2">&nbsp;<button type="button" class="btn btn-default" data-toggle="modal"   style="padding-left:5px; padding-right:5px; width:30px" id="del_photo_checkguest_<?=$arr[project][id];?>_2"><i class="fa  fa-trash" style="font-size:20px; "></i></button>
				
				 <script>
 
$('#del_photo_checkguest_<?=$arr[project][id];?>_2').click(function(){  
document.getElementById('photo_checkguest_<?=$arr[project][id];?>_2').value='';
document.getElementById('url_photo_checkguest_<?=$arr[project][id];?>_2').value='ยังไม่มีภาพถ่าย';
$('#url_photo_checkguest_<?=$arr[project][id];?>_2').css({"background": "#fa1431","color": "#333333", });
     	});
					
					</script> 
 
				
            </div>
										
										
 

			                      <div class="topicname"><i class="fa  fa-automobile"></i>&nbsp;ภาพถ่ายรถ</div>
                                  <div class="input-group">
                                    <label class="input-group-btn"> <span class="btn btn-primary"> <i class="fa  fa-camera"></i>&nbsp;ถ่ายภาพ
                                      <input type="file" class="form-control" name="photo_checkguest_<?=$arr[project][id];?>_12" id="photo_checkguest_<?=$arr[project][id];?>_12" accept="image/*"  capture="camera"  style="display: none;"/>
                                    </span> </label>
                                    <input name="text" type="text" class="form-control" id="text"  style="padding-left:5px; padding-right:5px; width:160px" value="ยังไม่มีภาพถ่าย" readonly="readonly" />
                                    &nbsp;
                                    <button type="button" class="btn btn-default" data-toggle="modal"   style="padding-left:5px; padding-right:5px; width:30px" id="del_photo_checkguest_<?=$arr[project][id];?>_1"><i class="fa  fa-trash" style="font-size:20px; "></i></button>
                                    <script>
 
$('#del_photo_checkguest_<?=$arr[project][id];?>_1').click(function(){  
document.getElementById('photo_checkguest_<?=$arr[project][id];?>_1').value='';
document.getElementById('url_photo_checkguest_<?=$arr[project][id];?>_1').value='ยังไม่มีภาพถ่าย';
$('#url_photo_checkguest_<?=$arr[project][id];?>_1').css({"background": "#fa1431","color": "#333333", });

     	});
					
					              </script>
                                  </div>
                                  <p>&nbsp;รายละเอียด อาการเสีย </p>
                                  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="padding-right:5px; "><textarea name="detail" rows="5" class="form-control" id="detail" onKeyPress="PasswordEnter(this,event)" required="true"></textarea></td>
    </tr>
</table>

			 
			  
			  
		 
					
			  
			  
		   
					
   
 
		
		 
 
		 
 
 
 
 

  
  <div  id="send_user_data"></div>
  
  
    <div style="margin-top:10px;"  >
 <table width="100%"  border="0" cellspacing="2" cellpadding="2" >
  <tr>
    <td width="150" style="padding:5 px;"><button id="submit_data" type="button" class="btn btn-block btn-primary" style="width:140px ">ส่งข้อมูล</button></td>
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

$("#submit_data").click(function(){ 
 
 
 
if(document.getElementById('detail').value=="") {
swal('กรุณากรอกรายละเอียด'); 
document.getElementById('detail').focus() ; 
return false ;
}


 $('#file_upload_submit').click();
 
 $.post('popup.php?name=checkcar&file=savedata&type=repair&id=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   $('#send_user_data').html(response);
  });
  
  
 });
 </script> 
 
 <iframe id="uploadtarget" name="uploadtarget" src="" style="width:200px;height:50px;border:0"></iframe>
 </form> 
 