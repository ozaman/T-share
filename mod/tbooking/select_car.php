<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css" />
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<?php 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[car] = $db->select_query("SELECT * FROM web_carall  where drivername='".$_GET[user_id]."' and status=1 order by id desc  ");
/*while($arr[car] = $db->fetch($res[car])){
	echo $arr[car][car_brand]."<br/>";
}*/
?>
<div style="padding: 5px">
	<a id="car_11" style="text-decoration:none; margin-top:30px;">
            <table width="100%" border="0" cellspacing="2" cellpadding="2" id="div_car_11">
               <tbody>
                  <tr>
                     <td>
                        <table width="100%" cellpadding="1" cellspacing="2">
                           <tbody><tr>
                                                                                                                                                                                    <td width="100" align="center" bgcolor="#009999" style="border: solid 2px; height:20px; color:#DADADA; padding:5px; padding-right:0px;border-radius:5px;"><font color="#FFFFFF" class="font-28"><b>กขค555 <br>
                                 <font class="font-20">ภูเก็ต</font></b></font>
                              </td>
                           </tr>
                        </tbody></table>
                        <div class="font-24" style="display: none;">
                           <b>รถเก๋ง  FORD</b>
                        </div>
                     </td>
                     <td valign="top" style="display: none;">
                        <img src="../data/pic/car/11_1.jpg?v=1512809452" width="100%" border="0" style="margin-top: 3px;border-radius:5px;">
                     </td>
                     <td width="50" align="center">
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
						  <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input">
						  <span class="mdl-checkbox__label"></span>
						</label>
                     </td>
                  </tr>
               </tbody>
            </table>
         </a>

</div>
