<?
        $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $res[phone_edit] = $db->select_query("SELECT * FROM contact_phone_driver where id='".$_GET[id]."'  ");
		$arr[phone_edit] = $db->fetch($res[phone_edit])
 ?>

   <div class="topicname"><i class="fa  fa-phone"></i>&nbsp;เบอร์โทรศัพท์</div>
   <div>
   
   
                    <input name="phone" type="text" class="form-control" id="phone"  OnKeyPress="return chkNumber(this)"  value="<?=$arr[phone_edit][phone]?>" maxlength="12"   required="true"    >
					
					<input name="id" type="hidden" class="form-control" id="id"    value="<?=$arr[phone_edit][id]?>"   required="true"    >
					<div style="padding-top:3px; " ><font color="#FF9900"><i class="fa  fa-warning"></i> กรอกได้เฉพาะตัวเลขเท่านั้น</font></div>
</div>
			  
			     <div class="topicname"><i class="fa  fa-user"></i>&nbsp;ชื่อผู้ติดต่อ</div>
   <div>
                    <input class="form-control" type="text" name="name" id="name"   required="true"  onkeypress="UserEnter(this,event)"    value="<?=$arr[phone_edit][name]?>"   >
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
            if ($arr[category][id] == $arr[phone_edit][type]) {
                echo " Selected";
            }
            echo ">" . $arr[category][name] . "</option>";
        }
?>
            </select>
		   
		      </div>