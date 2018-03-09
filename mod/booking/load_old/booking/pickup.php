 
 
     <div class="<?= $coldata?>"  >
     
 <div  style="padding:5px;   border-radius: 5px; border: 1px solid #ddd;background-color:#FFFFFF;  margin-bottom: 0px; box-shadow: 0px  0px 0px #DADADA  ; margin-top: 10px;">      
     
     
     
 
     <div class="topicname">แจ้งรอรับแขก</div>
            
 

<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
    
       <td width="25%">
          
      <? if($arr[project][wait_status]=='area'){?>
    <script>
	
 
		$("#selet_check_to_place").show();
	$("#selet_check_to_airport").hide();
	
 
	
	</script>
    
    
    <? } ?>
    
      
       
       <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
    
      <td width="30">
 
 
 
 
       
      
    
      <input     name="check_wait_input" type="radio" id="check_wait_area" style="height:25px; width:25px;" value="area" 
  <? if($arr[project][wait_status]=='area'){?>    checked="checked" <? } ?>
  
      
     
    >
    
 
      
      </td>
      <td><div   style="color:#3D8CBC;"  class="font-26" ><b>รอ</div></td>
    </tr>
  </tbody>
</table>

 
</td>



    
    
      <td width="35%">
        
        
        
        
        <table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tbody>
            <tr>
              
              <td width="30">
                
                <a  class="btn-check-confirm"  value="CANCEL" data="check_cancel">  
                  <input   name="check_wait_input" type="radio" id="check_wait_no" style="height:25px; width:25px;" value="CANCEL"
      
   <? if($arr[project][wait_status]=='no'){?>   checked="checked" <? } ?>
    
    
     >    </a>
                
                
                
                
                </td>
              <td><div   style="color:#ff0000; "  class="font-26"><b>ไม่รอ</div></td>
              </tr>
            </tbody>
  </table>
        
        
        
        
        
        
</td>

 
      </tr>
  </tbody>
</table>
 
  
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
    
      <td width="30">
      
 
 
      <input      name="check_wait_input" type="radio" id="check_wait_out" style="height:25px; width:25px;" value="CONFIRM" 
      
  <? if($arr[project][wait_status]=='out'){?>     checked="checked" <? } ?>
      
    >
      
      </td>
      <td><div   style="color:#1B7E5A;"  class="font-26" ><b>ไปกับรถคิงส์ พาวเวอร์</div></td>
    </tr>
  </tbody>
</table>
 
 
 
 
 
 
 
 
 
 
 
 
 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="display:none;border-top: 1px solid #ddd;"  id="selet_check_to_place"  >
  <tbody>
    <tr>
      <td width="50%" style=" padding-right:5px;">                    
        <div class="topicname"><center>รอบส่งกลับ
          <table width="100%" border="0" cellspacing="0" cellpadding="0" >
            <tbody>
              <tr>
                <td class="font-24"><span style="height:35px;"></span>
                  <select class="form-control"  name="transfer_time" id="transfer_time" >
                    <option value="">- เลือกรอบ-</option>
                    <?
  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
                                    //$res[category] = $db->select_query("SELECT * FROM ".TB_transferplace." where pro < 4 and status = 1 ORDER BY topic ");
                                  ///  $res[category] = $db->select_query("SELECT * FROM  guest_nation  ORDER BY id  ");
								  
					  $res[category] = $db->select_query("SELECT * FROM time_pickup_round  where type='area'  ORDER BY  start_h  asc");
                       
                                  while($arr[category] = $db->fetch($res[category])) {
 
                                    echo "<option value=\"".$arr[category][id]."\"";
                                    if($arr[category][id] == $arr[project][transfer_time]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][start_h].":".$arr[category][start_m]." </option>";
                                  }
                                  $db->closedb ();
                                  ?>
                    </select></td>
                </tr>
              </tbody>
            </table>
        </div></td>
      <td width="50%"><div class="topicname"><center>ส่งกลับที่
          <table width="100%" border="0" cellspacing="0" cellpadding="0" >
          <tbody>
            <tr>
              <td class="font-24"><span style="height:35px;"></span>
                <select class="form-control"  name="to_place_area" id="to_place_area" >
                  <option value="">- เลือกพื้นที่ -</option>
                  <?
  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
               //$res[category] = $db->select_query("SELECT * FROM ".TB_transferplace." where pro < 4 and status = 1 ORDER BY topic ");
            ///  $res[category] = $db->select_query("SELECT * FROM  guest_nation  ORDER BY id  ");
								  
					  $res[category] = $db->select_query("SELECT * FROM web_area where dutyfree=1  ORDER BY  id  desc");
                       
                                  while($arr[category] = $db->fetch($res[category])) {
 
                                    echo "<option value=\"".$arr[category][id]."\"";
                                    if($arr[category][id] == $arr[project][back_to_place]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][name_th]." </option>";
                                  }
                                  $db->closedb ();
                                  ?>
                </select></td>
            </tr>
          </tbody>
        </table>
      </div></td>
      </tr>
  </tbody>
</table>







 
 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="display:none;border-top: 1px solid #ddd;"  id="selet_check_to_airport">
  <tbody>
    <tr>
      <td width="50%" align="center" style=" padding-right:5px;">                    
        <div class="topicname"><center>รอบไปสนามบิน
          <table width="100%" border="0" cellspacing="0" cellpadding="0" >
            <tbody>
              <tr>
                <td class="font-24"><span style="height:35px;"></span>
                  <select class="form-control"  name="transfer_time_airport" id="transfer_time_airport" >
                    <option value="">- เลือกรอบ-</option>
                    <?
  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
                                    //$res[category] = $db->select_query("SELECT * FROM ".TB_transferplace." where pro < 4 and status = 1 ORDER BY topic ");
                                  ///  $res[category] = $db->select_query("SELECT * FROM  guest_nation  ORDER BY id  ");
								  
					  $res[category] = $db->select_query("SELECT * FROM time_pickup_round  where type='out'  ORDER BY  start_h  asc");
                       
                                  while($arr[category] = $db->fetch($res[category])) {
 
                                    echo "<option value=\"".$arr[category][id]."\"";
                                    if($arr[category][id] == $arr[project][cancel_type]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][start_h].":".$arr[category][start_m]." </option>";
                                  }
                                  $db->closedb ();
                                  ?>
                    </select></td>
                </tr>
              </tbody>
            </table>
        </div></td>
      <td width="50%" align="center"><div class="topicname" style="margin-top: 0px; padding-bottom:5px;"><center>สนามบิน</div>
          <table width="100%" border="0" cellspacing="0" cellpadding="0" >
          <tbody>
            <tr>
              <td class="font-24"><div style="height:40px;   border-radius: 2px; border: 0px solid #ddd; padding-left:5px; margin-top: 0px;">
              
              
              
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="45"><i class="flaticon-takeoff-the-plane" style=" font-size:34px; " ></i> </td>
      <td><span style="margin-top:-5px; " class="font-26">ภูเก็ต</span></td>
    </tr>
  </tbody>
</table>
 
              
               
              
              </div>
              
              
                </td>
            </tr>
          </tbody>
        </table>
      </td>
      </tr>
  </tbody>
</table>







 <span class="font-24"><b><font color="#FF0000"  style="display:none">
  
ว่าง 5 ที่นั่ง


</font>
 
</span>






    </div>

          </div>
 
					
  
  
  
   <input name="check_wait_status" type="hidden"  required="true" class="form-control" id="check_wait_status" style="padding:4px 2px;width:100%;"   value="<?=$arr[project][wait_status]?>"   >
 
  
<script type="text/javascript" src="js/dialog/main.js"></script>
 
 	   
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="plugins/iCheck/square/red.css">
    <link rel="stylesheet" href="plugins/iCheck/square/green.css">
  
  <script src="plugins/iCheck/icheck.min.js"></script>
  
  
  
  
  
  
  <script>
 
 


  $(function () {
	  
    $('#check_wait_area').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  
  
    $(function () {
	  
    $('#check_wait_out').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-green',
      increaseArea: '20%' // optional
    });
  });
  
  
  
 
    $(function () {
    $('#check_wait_no').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-red',
      increaseArea: '20%' // optional
    });
	
	
	
  });
  
   
</script>
      
 