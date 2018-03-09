	<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
				                   
<select name="driver_zone" id="driver_zone" style="width:100%; font-size:16px; padding:5px; height:40px" >
          
          <option value="">- เลือกพื้นที่ -</option>
          
  <?
                                  $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                         
                                    //$res[category] = $db->select_query("SELECT * FROM ".TB_transferplace." where pro < 4 and status = 1 ORDER BY topic ");
                                    $res[category] = $db->select_query("SELECT * FROM web_amphur where PROVINCE_ID=".$_GET[province]."   ORDER BY id  limit 100 ");
                      
                                  while($arr[category] = $db->fetch($res[category])) {
 
                                    echo "<option value=\"".$arr[category][id]."\"";
                                    if($arr[category][id] == $arr[web_driver_edit][driver_zone]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][name_th]." </option>";
                                  }
                                  $db->closedb ();
                                  ?>
 
          </select>