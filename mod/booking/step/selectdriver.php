<table width="100%" border="0" cellspacing="0" cellpadding="0"  style="">
   <tr>
      <td><b class="font-28" style="color:#16B3B1">กรุณาเลือกคนขับรถ</b></td>
   </tr>
   <tr>
      <td>
         <table width="100%" border="0" cellspacing="0" cellpadding="0" >
  
    <tr>
      <td class="font-24"><span style="height:35px;"></span>
      
       
       <select class="form-control"  name="selectdri" id="selectdri" onchange="selectdriss()" style="display:noneg;border-radius: 25px " >  
        <option value="0"> กรุณาเลือกคนขับรถ</option>
        <?
  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
                                    //$res[category] = $db->select_query("SELECT * FROM ".TB_transferplace." where pro < 4 and status = 1 ORDER BY topic ");
                                  ///  $res[category] = $db->select_query("SELECT * FROM  guest_nation  ORDER BY id  ");
                          
                 $res[category] = $db->select_query("SELECT * FROM  web_driver where status=1  ORDER BY name asc");
                       
                                  while($arr[category] = $db->fetch($res[category])) {
 
                                    echo "<option onclick='getdriver(".$arr[ategory][id].")'"."value=\"".$arr[category][id]."\"";
                                    // if($arr[category][id] == $arr[product][pickup_place]) {
                                    //   echo " Selected";
                                    // }
                                    echo ">".$arr[category][name].'('.$arr[category][nickname].") </option>";
                                  }
                                  $db->closedb ();
                                  ?>
        
      </select>
      
      
      
      
      
      
      
      
      
      
      
      </td>
      </tr>

</table>
      </td>
   </tr>
</table>
