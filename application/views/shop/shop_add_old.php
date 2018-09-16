<style>
    .text-input--material{
	background-image : none;
}
.res-input {
    position: absolute;
    right: 30px;
/*    margin-top: 10px;*/
    font-size: 28px;
    z-index: 2;
    /* display: block !important; */
}
</style>
<?php 
$select = "SELECT t1.*, t2.txt_color,t2.plate_color FROM web_carall as t1 left join web_car_plate as t2 on t1.i_plate_color = t2.id where t1.drivername  = '".$_COOKIE['detect_user']."'  ";
$query = $this->db->query($select);

$sql_dv = "SELECT name,phone,phone2 FROM web_driver  WHERE id = ".$_COOKIE['detect_user']." ";
$query_dv = $this->db->query($sql_dv);
$data_dv = $query_dv->row();
$user_id = $_COOKIE['detect_user'];


$sql_place = "SELECT * FROM shopping_product  WHERE id='".$_GET[place]."' ";
$query_place = $this->db->query($sql_place);
$data_place = $query_place->row();

?>
<div style="height: 100%;">
    <form name="form_booking" id="form_booking">
    <input type="hidden" value="1" name="program" id="program" />
    <ons-card>

        <div class="form-group">
        	<span class="font-18">เลือกรถส่งแขก</span>
            <div style="padding: 0px;margin-top: 0px;">
			<?php 
	  			foreach($query->result() as $val){ 
	  			$bg_plate_color = "background-color: ".$val->plate_color;
//	  			$text_plate_color = "background-color: ".$val->txt_color;
	  			?>
	  				
	  				<a id="car_<?=$val->id;?>" class="a-select-car" style="text-decoration:none; margin-top:30px;" onclick="selectCarShops('<?=$val->id;?>','<?=$val->car_type;?>');">
		<input type="hidden" id="value_car_<?=$val->id;?>" data-plate_num="<?=$val->plate_num;?>" />
    	<table width="100%" border="0" cellspacing="2" cellpadding="2" id="div_car_<?=$val->id;?>" style="border: 0px solid #ddd;background-color: #f6f6f6;">
               <tbody>
                  <tr>
                     <td>
                        <table width="100%" cellpadding="1" cellspacing="2">
                           <tbody>
                           <tr>
                           <td width="100" align="center" style="border: solid 2px; height:20px; color:#DADADA; padding:5px; padding-right:0px;border-radius:5px;<?=$bg_plate_color;?>"><font color="<?=$val->txt_color;?></font>" class="font-28"><b><?=$val->plate_num;?><br>
                                 <font class="font-14"><?=$val->province;?></font></b></font>
                              </td>
                           </tr>
                        </tbody>
                        </table>
                        
                     </td>
                     <td width="50" align="center">
                      <label class="container">
					  <input type="checkbox" name="car" id="car_use_<?=$val->id;?>" value="1">
					  <span class="checkmark"></span>
					</label>
                     </td>
                  </tr>
               </tbody>
            </table>
    	</a>
	  					
	  		<?	}
			?>
                

            </div>
            <script>
			   function selectCarShops(id,cartype){
				    $('input[type="checkbox"]').prop('checked', false); // Unchecks it
				    $('#car_use_'+id).prop('checked', true); // Checks it
				    var plate_num = $('#value_car_'+id).data('plate_num');
				    $('#car_type').val(cartype);
				    
				    console.log(plate_num);
				    $('#car_plate').val(plate_num);
				    $('#car_id').val(id);
				    $('#txt_car_type').val($("#car_type option:selected").text());
				}
 			</script>
		<input value="" id="car_id" name="check_use_car_id" type="hidden" />
        </div>
        <table width="100%" border="0" cellspacing="4" cellpadding="4" style="border-bottom : 0px solid #DADADA;" id="row_place_1">
            <tr>
                <td width="110">
                    <img src="../data/pic/place/1_logo.jpg" width="100px" alt="" style=" border-radius:  15px; border: 1px solid #ddd; margin-bottom:5px;">
                </td>
                <td>
                    <div class="element_to_find">
                        <span class="font-18" style="color:#3b5998">ดิวตี้ฟรี </span><br>
                        <span class="font-18" style="color:#333333">
                            <b>
                                คิงส์ พาวเวอร์ (ภูเก็ต) </b></span><b>
                            <br>
                            <input type="hidden" value=" " id="1">
                        </b></div><b>
                        <a class="font-18" style="display: none;">
                            <strong id="txt_sh_1">แสดงรายละเอียด</strong>
                            <span id="icon_sh_1"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                        </a>
                        <input type="hidden" id="check_click_1" value="0">
                    </b>
                </td>
            </tr>
        </table>
		
        <div class="form-group">
            <span class="font-18">ประเภทรถ</span>
            <input type="hidden" value="" name="txt_car_type" id="txt_car_type" />
            <select class="select-input font-16" name="car_type" id="car_type" style="border-radius: 0px;padding: 5px;    width: 100%;">
                <option value="0"> กรุณาเลือกประเภทรถ</option>
                <?php 
            	 $sql = "select * from web_car_use_type where status = 1 ";
				 $query = $this->db->query($sql);
            	 foreach($query->result() as $val){ ?>
                <option value="<?=$val->id;?>">
                    <?=$val->name_th;?>
                </option>
                <?    }
            	?>
            </select>

        </div>
        <div class="form-group">
            <label class="font-18">ป้ายทะเบียนรถ</label>
            <ons-row>
                <!--<input id="name-input" float maxlength="20"  style="width: 100%;" />-->
                <ons-input id="car_plate" name="car_plate" float maxlength="20" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
            </ons-row>
        </div>

        <div class="form-group">

            <ons-list-item tappable ">
        <label class=" left">
                <ons-checkbox class="checkbox-color" name="persion_china" input-id="persion_china" value="0" onclick="selectnation(1)"></ons-checkbox>
                </label>
                <label class="center" for="persion_china">
                    <img src="assets/images/flag/China.png" width="25" height="25" alt="">&nbsp; แขกจีน
                </label>
            </ons-list-item>

            <ons-list-item tappable>
                <label class="left">
                    <ons-checkbox class="checkbox-color" name="persion_other" input-id="persion_other" value="0" onclick="selectnation2(1)"></ons-checkbox>
                </label>
                <label class="center" for="persion_other">
                    <img src="assets/images/flag/Other.png" width="25" height="25" alt="">&nbsp; ต่างชาติ
                </label>
            </ons-list-item>

        </div>

        <div class="form-group">
            <label class="font-18">จำนวนคน</label>
            <ons-row>
                <ons-col>
                    <ons-input id="adult" name="adult" type="number" pattern="\d*" placeholder="ผู้ใหญ่" maxlength="20" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
                </ons-col>
                &nbsp;
                &nbsp;
                <ons-col>
                    <ons-input id="child" name="child" type="number" pattern="\d*" placeholder="เด็ก" maxlength="20" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
                </ons-col>
            </ons-row>
        </div>

        <div class="form-group">
            <span class="font-18">เวลาถึงโดยประมาณ(นาที)</span>
            <select class="select-input font-16" name="time_select" id="time_select" style="border-radius: 0px;padding: 5px;width: 100%; width: 100%;">
                <option value="0">- เลือกนาที -</option>
                <?php 
            		$mm = 5;
            		for($i=5;$i<=60;$i+=5){
						?>
                <option value="<?=$i;?>">
                    <?=$i." นาที";?>
                </option>
                <?
//						$mm+=5;
					}
            	?>
                <option value="over">มากกว่า 60 นาที</option>
            </select>
            <div id="box_over_mm" style="display: none;"><span style="font-size: 13px;padding: 7px;">กรุณากรอก</span>
                <!--<input type="number"  pattern="\d*" class="form_input" id="orver_mm" style="">-->
                <ons-input id="orver_mm" type="number" pattern="\d*" name="orver_mm" maxlength="20" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
            </div>
            <input type="hidden" class="form_input" id="time_num" name="time_num" value="0">
            <script>
                $('#time_select').change(function(){
            		if($(this).val()=="over"){
						$('#box_over_mm').show();
						$( "#orver_mm" ).focus();
						
					}else{
						$('#box_over_mm').hide();
						$('#time_num').val($(this).val());
					}
					
            	});
            	
            	$('#orver_mm').keyup(function(){
            		if($('#time_select').val()=="over"){
						$('#time_num').val($(this).val());
					}
            	});
            </script>
        </div>

        <div class="form-group">
            <label class="font-18">เบอร์โทรศัพท์</label>
            <ons-row>
                <i class="material-icons res-input" onclick="$('#dri_phone').val('');$('#dri_phone_x').hide();" id="dri_phone_x" style="display: block;">close</i>
                <ons-input id="dri_phone" name="dri_phone" type="number" pattern="\d*" maxlength="20" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;" onkeyup="hideRes('dri_phone');" placeholder="" value="<?=$data_dv->phone;?>"></ons-input>
            </ons-row>
        </div>


        <div id="testScroll">
         <!-- Agent Issu -->  
         <div class="" id="show_payment_detail" style="margin-top:10px;padding:5px;   border-radius: 10px; border: 1px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ; ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tbody>
                  <tr>
                     <td>
                        <div class="font-22" style="color:#3b5998"><b>ค่าตอบแทน</b></div>
                     </td>
                     <td width="50" style="display: none;" id="row_accept_payment">
                        <!-- <img src="images/checked.png" width="35px"> -->
                     </td>
                  </tr>
               </tbody>
            </table>
            <div>
               <table width="100%" border="0" cellspacing="1" cellpadding="5" style="">
                  <tbody>
                     <tr>
                                                <td width="100%">
                           <input name="plan_setting" type="hidden" class="form-control" id="plan_setting" value="0">
                                                      <script>
                              ///
                              $('#show_price_plan_1').click(function(){  
                              $( "#main_load_mod_popup_4" ).toggle();
                              var url_load_1= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=1&plan=1&lat=7.872888&lng=98.360599&type=stop";
                              $('#load_mod_popup_4').html(load_main_mod);
                              $('#load_mod_popup_4').load(url_load_1); 
                              });
                           </script>                    
                           <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 1px;padding: 10px 0px;" onclick="ClickPay(1)">
                              <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                 <tbody>
                                    <tr>
                                       <td width="30" rowspan="2" align="center" style="display: none;">
                                          <!-- <input type="radio" name="price_plan" class="price_plan_select genaral" value="1" id="price_plan_1" /> -->
                                       </td>
                                       <td class="font-16"><b> ค่าจอด + ค่าหัว</b> </td>
                                       <!--<td width="35" rowspan="2" valign="middle"><a id="show_price_plan_1"><i class="fa fa-search" style=" color:#666666;font-size:18px;"> </i></a></td>-->
                                    </tr>
                                    <tr>
                                       <td>
                                                                                                                              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                             <tbody>
                                                <tr>
                                                   <td width="75"> <img src="assets/images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;"><span class="font-14">&nbsp;จีน  </span></td>
                                                   <td>
                                                      <span style="display:show">ค่าจอด  <b>1100</b>&nbsp;</span>
                                                      <span style="display:show">ค่าหัว  <b>200</b>&nbsp;</span>
                                                      <span style="display:none">ค่าคอมมิชชั่น  <b>0 %</b>&nbsp;</span>
                                                      &nbsp;
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                           
                                                                                    <!-- <table width="100%" border="0" cellspacing="1" cellpadding="1" >
                                             <tbody>
                                                <tr>
                                                   <td width="80"><img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-14">&nbsp;ต่างชาติ</td>
                                                   <td>
                                                      <span style="display:noneshow">ค่าจอด  <b>200</b>&nbsp;</span>
                                                      <span style="display:noneshow">ค่าหัว  <b>0</b>&nbsp;</span>
                                                      <span style="display:none">ค่าคอมมิชชั่น  <b>0 %</b>&nbsp;</span>
                                                      &nbsp;
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table> -->
                                           
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                                                      <script>
                              ///
                              $('#show_price_plan_2').click(function(){  
                              $( "#main_load_mod_popup_4" ).toggle();
                              var url_load_1= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=1&plan=2&lat=7.872888&lng=98.360599&type=stop";
                              $('#load_mod_popup_4').html(load_main_mod);
                              $('#load_mod_popup_4').load(url_load_1); 
                              });
                           </script>                    
                          <!--  <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 1px;padding: 10px 0px;" onclick="ClickPay(2);">
                              <table width="100%" border="0" cellspacing="1" cellpadding="3" >
                                 <tbody>
                                    <tr>
                                       <td width="30" rowspan="2" align="center">
                                         
                                       <td class="font-16"><b> ค่าคอมมิชชั่น</b> </td>
                                       <td width="35" rowspan="2"><a id="show_price_plan_2"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
                                    </tr>
                                    <tr>
                                       <td>
                                                                                     
                                                                                    <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                             <tbody>
                                                <tr>
                                                   <td width="80"><img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/>
                                                      <span class="font-14">ต่างชาติ</span>
                                                   </td>
                                                   <td>
                                                      <span style="display:none">ค่าจอด  <b>200</b>&nbsp;</span>
                                                      <span style="display:none">ค่าหัว   <b>0</b>&nbsp;</span>
                                                      <span style="display:noneshow">ค่าคอมมิชชั่น   <b>5 %</b>&nbsp;</span>
                                                      &nbsp;
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                           
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div> -->
                                                      <script>
                              ///
                              $('#show_price_plan_3').click(function(){  
                              $( "#main_load_mod_popup_4" ).toggle();
                              var url_load_1= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=1&plan=25&lat=7.872888&lng=98.360599&type=stop";
                              $('#load_mod_popup_4').html(load_main_mod);
                              $('#load_mod_popup_4').load(url_load_1); 
                              });
                           </script>                    
                           <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 0px;padding: 10px 0px;" onclick="ClickPay(3);">
                              <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                 <tbody>
                                    <tr>
                                       <td width="30" rowspan="2" align="center" style="display: none;">
                                          <!-- <input type="radio" name="price_plan" class="price_plan_select genaral" value="2" id="price_plan_3" /></td> -->
                                       </td><td class="font-16"><b> ค่าจอด + ค่าคอมมิชชั่น </b></td>
                                       <!--<td width="35" rowspan="2"><a id="show_price_plan_3"><i class="fa fa-search" style=" color:#666666;font-size:18px;"> </i></a></td>-->
                                    </tr>
                                    <tr>
                                       <td>
                                                                                                                              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                             <tbody>
                                                <tr>
                                                   <td width="75"> <img src="assets/images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;">
                                                      <span class="font-14">&nbsp;จีน </span>
                                                   </td>
                                                   <td>
                                                      <span style="display:noneshow">ค่าจอด  <b>600</b>&nbsp;</span>
                                                      <span style="display:none">ค่าหัว  <b>0</b>&nbsp;</span>
                                                      <span style="display:noneshow">ค่าคอมมิชชั่น  <b>5 %</b>&nbsp;</span>
                                                      &nbsp;
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                           

                                                                                    <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                             <tbody>
                                                <tr>
                                                   <td width="80">
                                                      <img src="assets/images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"><span class="font-14">&nbsp;ต่างชาติ</span>
                                                   </td>
                                                   <td>
                                                      <span style="display:noneshow">ค่าจอด<b>200</b>&nbsp;</span>
                                                      <span style="display:none">ค่าหัว<b>200</b>&nbsp;</span>
                                                      <!-- <span style="display:noneshow">ค่าคอมมิชชั่น<b>5 %</b>&nbsp;</span> -->
                                                      &nbsp;
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                           
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                                                      <!--</select>-->
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
    </ons-card>
	</form>
    <div style="padding: 0px 10px;">
        <ons-button style="background-color: #fff;" modifier="outline" class="button-margin button button--outline button--large" onclick="submitShop();">ยืนยันข้อมูล</ons-button>
    </div>

</div>