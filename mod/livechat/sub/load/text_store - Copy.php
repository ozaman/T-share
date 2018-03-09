<select name="message_store" size="1"   id="message_store"    style="font-size:20px; padding-bottom: 1px; padding: 5px;  background-color:#FFFFFF; height:50px; width:100%;" chosen width="'100%'">
	<option value="" selected>-- เลือกข้อความ --</option>
  <?  
$db->connectdb(DB_NAME_CHAT,DB_USERNAME,DB_PASSWORD);
$res[category] = $db->select_query("SELECT * FROM  message_data_store  ORDER BY id asc");
while ($arr[category] = $db->fetch($res[category])){
 
	   echo "<option value=\"".$arr[category][id]."\"";
	   if($arr[category][id] == $_GET[type]){echo " Selected";}
	   echo ">".$arr[category][topic_th]." </option>";
	   }
                      $db->closedb ();
                      ?>
    </select>