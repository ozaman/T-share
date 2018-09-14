<style>
   .drivertable{        
   border-radius:5px; margin-top:10px; margin-bottom:10px;
   border:0px solid #999999; background-color:#FFFFFF; 
   box-shadow: 0px 1px 5px #DADADA;  }
   .tdtable  td {height:26px;}
   .img-car{
   height: 60px;
   width: auto;
   }
</style>
<div style="padding: 15px;">
   <div style="padding: 0px 0px;">
      <ons-button style="background-color: #fff;" modifier="outline" class="button-margin button button--outline button--large" onclick="addCar();">เพิ่มรถ</ons-button>
   </div>
   <?php 
      //	$sql_car = "select * from web_car_all where drivername = '".$_COOKIE[detect_username]."' ";
      	$sql = "SELECT t1.*, t2.txt_color,t2.plate_color, t3.name_th as car_type_txt FROM web_carall as t1 left join web_car_plate as t2 on t1.i_plate_color = t2.id left join web_car_use_type as t3 on t1.car_type = t3.id where t1.drivername  = '".$_COOKIE['detect_user']."'  ";
      	$query_car = $this->db->query($sql);
      	/*foreach ($query_car->result() as $row){
      		$data[] = $row;
      	}
      	echo json_encode($data);*/
      ?>
   <div style="margin-top: 10px;">
      <?php 
         foreach ($query_car->result()  as $row){
         	
         	$bg_plate = "background-color: ".$row->plate_color;
//         	$bg_plate = "background-color: #000;";
         	
         	$sql_carcolor = "SELECT name_th FROM web_car_color  WHERE id = ".$row->i_car_color." ";
	  		$query_carcolor = $this->db->query($sql_carcolor);
	  		$carcolor = $query_carcolor->row();
	  		
         ?>
      <div class="col-md-6" style="padding-left: 0px;padding-right: 0px;padding-bottom: 30px;">
         <div style="padding:5px;   border-radius: 6px; border: 1px solid #ddd;box-shadow:1px 1px 3px #ddd  ; background:#FFFFFF   ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tbody>
                  <tr>
                     <td valign="middle" class="font-16">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tbody>
                              <tr>
                                 <td width="50%" height="50%" align="center" class="tool-td-chat">
                                    <button type="button" class="button button--outline" id="edit_car_38" onclick="editCar('<?=$row->id;?>');" style="width:100%">
                                       <center>
                                          <div class="font-30"><i class="fa fa-edit" style="color:#3b5998"></i></div>
                                          <span style="padding-bottom:20px;" class="font-16"> แก้ไขข้อมูลรถ </span>
                                       </center>
                                    </button>
                                 </td>
                              </tr>
                              <tr>
                                 <td width="50%" height="50%" align="center" class="tool-td-chat">
                                    <button type="button" class="button button--outline" id="use_car_38" onclick="use_often('<?=$row->id;?>','close');" style="width:100%">
                                       <center>
                                          <div class="font-30"><i class="fa fa-times-circle" style="color: #FF0000"></i></div>
                                          <span style="padding-bottom:20px;" class="font-16">เลิกใช้ประจำ  </span>
                                       </center>
                                    </button>
                                 </td>
                              </tr>
                              <tr>
                                 <td width="50%" height="50%" align="center" class="tool-td-chat">
                                    <button type="button" class="button button--outline" onclick="cancelCar('<?=$row->id;?>')" style="width:100%">
                                       <center>
                                          <div class="font-30"><i class="fa fa-trash " style="color:#FF0000"></i></div>
                                          <span style="padding-bottom:20px;" class="font-16">  เลิกใช้งาน  </span>
                                       </center>
                                    </button>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                     <td width="60%" valign="top" style="padding-left:5px">
                        <table width="100%" cellpadding="1" cellspacing="2" style="margin-top:0px;  margin-right: 0px; margin-bottom:0px; margin-right:0px; ">
                           <tbody>
                              <tr>
                                 <td width="80" height="70" align="center" bgcolor="#009999" style="border: solid 2px; height:70px; color:#DADADA; padding:10px; padding-right:10px;border-radius:10px;<?=$bg_plate;?>"><font color="<?=$row->txt_color;?>" class="font-32"><b><?=$row->plate_num;?><br> 
                                    <font class="font-16"><?=$row->province;?></font></b></font>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                           <tbody>
                              <tr>
                                 <td width="50" class="font-16"><strong>ประเภท</strong></td>
                                 <td class="font-16"><?=$row->car_type_txt;?></td>
                              </tr>
                              <tr>
                                 <td class="font-16"><strong>ยี่ห้อ</strong></td>
                                 <td class="font-16"><?=$row->car_brand;?></td>
                              </tr>
                              <!--<tr>
                                 <td class="font-16"><strong>รุ่น</strong></td>
                                 <td class="font-16"></td>
                              </tr>-->
                              <tr>
                                 <td class="font-16"><strong>สีรถ</strong></td>
                                 <td class="font-16"><?=$carcolor->name_th;?></td>
                              </tr>
                              <tr>
                                 <td class="font-16"><strong>สถานะ</strong></td>
                                 <td class="font-16">
                                    <font color="#3b5998"><strong>เปิดใช้งาน</strong></font>
                                    <span style="font-size: 12px;"><b>(ใช้งาน)</b></span>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
            <table width="100%" border="0" cellspacing="1" cellpadding="5" style="margin-top:-15px;">
               <tbody>
                  <tr style="display:nones">
                     <td width="33%" align="center" ><img class="<?=$arr[project][id];?>_pic_car_1 img-car" src="assets/images/nopic.png"     border="0"      style="margin-top:15px;border-radius:5px;" /></td>
                     <td width="33%" align="center" ><img class="<?=$arr[project][id];?>_pic_car_2 img-car" src="assets/images/nopic.png"   border="0"      style="margin-top:15px;border-radius:5px;" /></td>
                     <td width="33%" align="center" ><img class="<?=$arr[project][id];?>_pic_car_3 img-car" src="assets/images/nopic.png"    border="0"      style="margin-top:15px;border-radius:5px;" /></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      <script>
         checkPicCar('<?=$row->id;?>');
      </script>
      <?php }  ?>
   </div>
</div>