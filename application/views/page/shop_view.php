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
<div style="height: 100%;">
<ons-card >

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
            <select class="select-input font-16" name="car_type" id="car_type"  style="border-radius: 0px;padding: 5px;">
            <option value="0"> กรุณาเลือกประเภทรถ</option>
            <?php 
            	 $sql = "select * from web_carall_type where status = 1 ";
				 $query = $this->db->query($sql);
            	 foreach($query->result() as $val){ ?>
			      <option value="<?=$val->id;?>"><?=$val->topic_th;?></option>  	
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
        <label class="left">
          <ons-checkbox class="checkbox-color" name="persion_china" input-id="persion_china" value="0" onclick="selectnation(1)"></ons-checkbox>
        </label>
        <label class="center" for="persion_china" >
          <img src="assets/images/flag/China.png" width="25" height="25" alt="">&nbsp; แขกจีน
        </label>
      </ons-list-item>
      
        <ons-list-item tappable >
        <label class="left">
          <ons-checkbox class="checkbox-color" name="persion_other" input-id="persion_other" value="0" onclick="selectnation2(1)"></ons-checkbox>
        </label>
        <label class="center" for="persion_other" >
          <img src="assets/images/flag/Other.png" width="25" height="25" alt="">&nbsp; ต่างชาติ
        </label>
      </ons-list-item>
    
		</div>

		<div class="form-group">
			<label class="font-18">จำนวนคน</label>
			<ons-row>
  				<ons-col>
  					<ons-input id="adult" name="adult" type="number"  pattern="\d*"  placeholder="ผู้ใหญ่" maxlength="20" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
  				</ons-col>
  				&nbsp;
  				&nbsp;
  				<ons-col>
  					<ons-input id="child" name="child" type="number"  pattern="\d*" placeholder="เด็ก" maxlength="20" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
  				</ons-col>
  			</ons-row>
		</div>
		
		<div class="form-group">
       		<span class="font-18">เวลาถึงโดยประมาณ(นาที)</span>
            <select class="select-input font-16" name="time_select" id="time_select"  style="border-radius: 0px;padding: 5px;width: 100%;">
            <option value="0">- เลือกนาที -</option>
            	<?php 
            		$mm = 5;
            		for($i=5;$i<=60;$i+=5){
						?>
						<option value="<?=$i;?>"><?=$i." นาที";?></option>
						<?
//						$mm+=5;
					}
            	?>
            	<option value="over">มากกว่า 60 นาที</option>
            </select>
             <div id="box_over_mm" style="display: none;"><span style="font-size: 13px;padding: 7px;">กรุณากรอก</span>
            <!--<input type="number"  pattern="\d*" class="form_input" id="orver_mm" style="">-->
            <ons-input id="orver_mm"  type="number"  pattern="\d*"  name="orver_mm" maxlength="20" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
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
            <ons-input id="dri_phone" name="dri_phone" type="number" pattern="\d*" maxlength="20" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;" onkeyup="hideRes('dri_phone');" placeholder=""></ons-input>
            </ons-row>
        </div>
        
        <div id="testScroll">
         <!-- Agent Issu -->  
         <div class="" id="show_payment_detail" style="margin-top:10px;padding:5px;   border-radius: 10px; border: 1px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ; ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tbody>
                  <tr>
                     <td>
                        <div class="font-18" style=""><b>ค่าตอบแทน</b></div>
                     </td>
                     <td width="50" style="display: none;" id="row_accept_payment">
                        <img src="assets/images/checked.png" width="35px">
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
                           <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 1px;" onclick="ClickPay(1)">
                              <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                 <tbody>
                                    <tr>
                                       <td width="30" rowspan="2" align="center">
                                          <!-- <input type="radio" name="price_plan" class="price_plan_select genaral" value="1" id="price_plan_1" /> -->
                                       </td>
                                       <td class="font-18"><b> ค่าจอด + ค่าหัว</b> </td>
                                       <td width="35" rowspan="2" valign="middle"><a id="show_price_plan_1"><i class="fa fa-search" style=" color:#666666;font-size:18px;"> </i></a></td>
                                    </tr>
                                    <tr>
                                       <td>
                                                                                                                              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                             <tbody>
                                                <tr>
                                                   <td width="75"> <img src="assets/images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;"><span class="font-18">&nbsp;จีน  </span></td>
                                                   <td>
                                                      <span style="display:show">ค่าจอด  <b>1100</b>&nbsp;</span>
                                                      <span style="display:show">ค่าหัว  <b>200</b>&nbsp;</span>
                                                      <span style="display:none">ค่าคอมมิชชั่น  <b>0 %</b>&nbsp;</span>
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
                                                      <script>
                              ///
                              $('#show_price_plan_2').click(function(){  
                              $( "#main_load_mod_popup_4" ).toggle();
                              var url_load_1= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=1&plan=2&lat=7.872888&lng=98.360599&type=stop";
                              $('#load_mod_popup_4').html(load_main_mod);
                              $('#load_mod_popup_4').load(url_load_1); 
                              });
                           </script>                    
                                                      <script>
                              ///
                              $('#show_price_plan_3').click(function(){  
                              $( "#main_load_mod_popup_4" ).toggle();
                              var url_load_1= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=1&plan=25&lat=7.872888&lng=98.360599&type=stop";
                              $('#load_mod_popup_4').html(load_main_mod);
                              $('#load_mod_popup_4').load(url_load_1); 
                              });
                           </script>                    
                           <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 0px;" onclick="ClickPay(3);">
                              <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                 <tbody>
                                    <tr>
                                       <td width="30" rowspan="2" align="center">
                                          <!-- <input type="radio" name="price_plan" class="price_plan_select genaral" value="2" id="price_plan_3" /></td> -->
                                       </td><td class="font-18"><b> ค่าจอด + ค่าคอมมิชชั่น </b></td>
                                       <td width="35" rowspan="2"><a id="show_price_plan_3"><i class="fa fa-search" style=" color:#666666;font-size:18px;"> </i></a></td>
                                    </tr>
                                    <tr>
                                       <td>
                                                                                                                              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                             <tbody>
                                                <tr>
                                                   <td width="75"> <img src="assets/images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;">
                                                      <span class="font-18">&nbsp;จีน </span>
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
                                                      <img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"><span class="font-18">&nbsp;ต่างชาติ</span>
                                                   </td>
                                                   <td>
                                                      <span style="display:noneshow">ค่าจอด<b>200</b>&nbsp;</span>
                                                      <span style="display:none">ค่าหัว<b>200</b>&nbsp;</span>
                                                      <span style="display:noneshow">ค่าคอมมิชชั่น<b>5 %</b>&nbsp;</span>
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

<ons-card class="card">
    <ons-button modifier="outline" class="button-margin button button--outline button--large" onclick="submitShop();" >ยืนยันข้อมูล</ons-button>
</ons-card>
<script>
    
    if (class_user == 'lab') {
        var url_load = "go.php?name=shop/shop_new&file=booking_lab&driver=153&place=1";
    } else {
        var url_load = "go.php?name=shop/shop_new&file=booking&driver=153&place=1";
    }
   /* $.post(url_load, function(data) {
        // $('#main_load_mod_popup').toggle();
        $('#databook').html(data);
    });*/
    var hideAlertDialog = function() {
		  document
		    .getElementById('submit-my-alert-dialog')
		    .hide();
		};
    var submitShop = function() {
			/*$('.hidden-image-data').val(imageData);
		  	if($('input[name="name_th"]').val()==""){

				 ons.notification.alert({message: 'กรุณากรอกชื่อจริง',title:"ข้อมูลไม่ครบ"})
				  .then(function() {
				    $('input[name="name_th"]').focus();
				  });
				
				return false;
			}
			if($('input[name="nickname"]').val()==""){

				ons.notification.alert({message: 'กรุณากรอกชื่อเล่น',title:"ข้อมูลไม่ครบ"})
				  .then(function() {
				    $('input[name="nickname"]').focus();
				  });
				return false;
			}
			if($('input[name="address"]').val()==""){

				ons.notification.alert({message: 'กรุณากรอกที่อยู่ของคุณ',title:"ข้อมูลไม่ครบ"})
				  .then(function() {
				    $('input[name="address"]').focus();
				  });
				return false;
			}
			if($('input[name="phone"]').val()==""){

				ons.notification.alert({message: 'กรุณากรอกเบอร์โทรศัพท์',title:"ข้อมูลไม่ครบ"})
				  .then(function() {
				    $('input[name="phone"]').focus();
				  });
				return false;
			}
			if($('#valid_type_plate').val()==1){

				ons.notification.alert({message: 'ทะเบียนรถนี้ถูกใช้แล้ว ไม่สามารถใช้ซ้ำได้',title:"ข้อมูลไม่ครบ"})
				  .then(function() {
				    $('input[name="plate_num"]').focus();
				  });
				return false;
			}
			if($('#valid_type_phone').val()==1){

				ons.notification.alert({message: 'เบอร์โทรนี้ถูกใช้แล้ว ไม่สามารถใช้ซ้ำได้',title:"ข้อมูลไม่ครบ"})
				  .then(function() {
				    $('input[name="plate_num"]').focus();
				  });
				return false;
			}
			if($('input[name="image-data"]').val()==""){

				ons.notification.alert({message: 'กรุณาเลือกรูปประจำตัวของคุณ',title:"ข้อมูลไม่ครบ"})
				  .then(function() {
				    $('input[name="image-data"]').focus();
				  });
				return false;
			}
			if($('#valid_type_idc').val()==1){
					ons.notification.alert({message: 'เลขบัตรประชาชนของคุณไม่ถูกต้อง',title:"ผิดพลาด"});
					return false;
				}
				else if($('#valid_type_idc').val()==2){

					ons.notification.alert({message: 'เลขบัตรประชาชนของคุณถูกใช้แล้ว ไม่สามารถใช้ซ้ำได้',title:"ผิดพลาด"});
					return false;
				}*/
		  var dialog = document.getElementById('submit-my-alert-dialog');

		  if (dialog) {
		    dialog.show();
		  } else {
		    ons.createElement('submit-alert-dialog.html', { append: true })
		      .then(function(dialog) {
		        dialog.show();
		      });
		  }
		};
</script>
</div>

