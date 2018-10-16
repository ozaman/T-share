<div style="padding: 5px 0px;">
     <ons-list-header class="list-header"> ข้อมูลการเช็คอิน คนขับ</ons-list-header>
   
   <!-- <span class="text-cap font-20"> ข้อมูลการเช็คอิน คนขับ</span> -->
   <div class="div-all-checkin">
      <table width="100%" border="0" cellspacing="2" cellpadding="0" class=" border-alert" id="box_driver_topoint">
         <tbody>
            <tr>
               <td width="50" rowspan="2">
                  <div class="step-booking" id="number_driver_topoint">1</div>
                  <div style="position:absolute; margin-top:-40px; margin-left: -5px;">
                     <img src="assets/images/no.png" align="absmiddle" id="iconchk_driver_topoint">
                  </div>
               </td>
               <td colspan="2">
                  <button id="btn_driver_topoint" onclick="btn_driver_topoint('<?=$arr[book][id];?>')" type="button" class="btn  btn-info " style="width:100%;text-align:left;padding:5px; background-color:#3b5998;  border-radius: 20px; border:none;color: #fff; "><span class="font-20 text-cap"><i class="icon-new-uniF12D-1" style="width:10px;"></i>  แจ้งถึงสถานที่ส่งแขก</span></button>
               </td>
            </tr>
            <tr>
               <td style="height:30px;">
                  <div id="status_driver_topoint">
                     <div class="font-16">
                        <i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">รอดำเนินการ</font></strong>
                     </div>
                  </div>
               </td>
               <td width="30">
                  <table width="100%">
                     <tbody>
                        <tr>
                           <td>
                              <i id="driver_topoint_locat_off" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">location_on</i>
                              <i id="driver_topoint_locat_on" onclick="openPointMaps('driver_topoint','<?=$arr[book][id];?>');" class="material-icons" style="color: rgb(59, 89, 152); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(59, 89, 152); display: none;">location_on</i>
                           </td>
                           <td>
                              <i id="photo_driver_topoint_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
                              <i id="photo_driver_topoint_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="viewPhotoShop('<?=$arr[book][id];?>','driver_topoint','<?=$arr[book][driver_topoint_date];?>');">photo_camera</i>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
         </tbody>
      </table>
      <input type="hidden" value="<?=$arr[book][driver_topoint];?>" id="driver_topoint_check_click">
      <input type="hidden" id="check_code" value="<?=$arr[book][id];?>">
   </div>
</div>
<div style="width: 100%;height: 5px;background-color: #ddd ;margin: 10px 0px;" ></div>
<div style="padding: 5px 0px;">
   <span class="text-cap font-20"> ข้อมูลการเช็คอิน พนักงาน</span>
   <table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="1" id="table_show_hide_checkin_S00085">
      <tbody>
         <tr id="step_guest_receive" style="display:none">
            <td class="font-16">
               <div class="div-all-checkin">
                  <table width="100%" border="0" cellspacing="2" cellpadding="0" class="" id="box_guest_receive">
                     <tbody>
                        <tr>
                           <td width="50" rowspan="2">
                              <div class="step-booking" id="number_guest_receive">2</div>
                              <div style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="assets/images/no.png" align="absmiddle" id="iconchk_guest_receive"></div>
                           </td>
                           <td colspan="2">
                              <button id="btn_guest_receive" onclick="btn_guest_receive('<?=$arr[book][id];?>')" type="button" class="btn  btn-info " style="width:100%;text-align:left;padding:5px; background-color:#3b5998;  border-radius: 20px; border:none;color: #fff; "><span class="font-20 text-cap"><i class="icon-new-uniF159-5" style="width:10px;"></i>  พนักงานรับแขก</span></button>
                              <input type="hidden" value="<?=$arr[book][check_guest_receive];?>" id="guest_receive_check_click">
                           </td>
                        </tr>
                        <tr>
                           <td style="height:30px;">
                              <div id="status_guest_receive">
                                 <div class="font-16"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">รอดำเนินการ</font></strong></div>
                              </div>
                           </td>
                           <td width="30">
                              <table width="100%">
                                 <tbody>
                                    <tr>
                                       <td>
                                          <i id="guest_receive_locat_off" class="material-icons" style="color: #3b59987a;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 1px #3b59987a;display: nones;">location_on</i>
                                          <i id="guest_receive_locat_on" onclick="openPointMaps('guest_receive','<?=$arr[book][id];?>');" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;">location_on</i>
                                       </td>
                                       <td>
                                          <i id="photo_guest_receive_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
                                          <i id="photo_guest_receive_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="viewPhotoShop('<?=$arr[book][id];?>','guest_receive','<?=$arr[book][guest_receive_date];?>');">photo_camera</i>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
	      
            </td>
         </tr>
         <tr id="step_guest_register" style="display:none">
            <td class="font-16">
               <div class="div-all-checkin">
                  <table width="100%" border="0" cellspacing="2" cellpadding="0" id="box_guest_register">
                     <tbody>
                        <tr>
                           <td width="50" rowspan="2">
                              <div class="step-booking" id="number_guest_register">3</div>
                              <div style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="assets/images/no.png" align="absmiddle" id="iconchk_guest_register"></div>
                           </td>
                           <td colspan="2"><button id="btn_guest_register" onclick="btn_guest_register('<?=$arr[book][id];?>')" type="button" class="btns  btn-info " style="width:100%;text-align:left;padding:5px; background-color:#3b5998;  border-radius: 20px; border:none;color: #fff; "><span class="font-20 text-cap"><i class="icon-new-uniF116-6" style="width:10px;"></i>แขกลงทะเบียน</span></button></td>
                        </tr>
                        <tr>
                           <td style="height:30px;">
                              <div id="status_guest_register">
                                 <div class="font-16"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">รอดำเนินการ</font></strong></div>
                              </div>
                              <input type="hidden" value="<?=$arr[book][check_guest_register];?>" id="guest_register_check_click">
                           </td>
                           <td width="30">
                              <table width="100%">
                                 <tbody>
                                    <tr>
                                       <td>
                                          <i id="guest_register_locat_off" class="material-icons" style="color: #3b59987a;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 1px #3b59987a;display: nones;">location_on</i>
                                          <i id="guest_register_locat_on" onclick="openPointMaps('guest_register','<?=$arr[book][id];?>');" class="material-icons location" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;">location_on</i>
                                       </td>
                                       <td>
                                          <i id="photo_guest_register_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
                                          <i id="photo_guest_register_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="viewPhotoShop('<?=$arr[book][id];?>','guest_register','<?=$arr[book][guest_register_date];?>');">photo_camera</i>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                            
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>	      
            </td>
         </tr>
         <tr id="step_driver_pay_report" style="display:none">
            <td class="font-16">
               <div class="div-all-checkin">
                  <table width="100%" border="0" cellspacing="2" cellpadding="0">
                     <tbody>
                        <tr>
                           <td width="50" rowspan="2">
                              <div class="step-booking" id="number_driver_pay_report">4</div>
                              <div style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="assets/images/no.png" align="absmiddle" id="iconchk_driver_pay_report"></div>
                           </td>
                           <td colspan="2">
                              <button id="btn_driver_pay_report" onclick="btn_driver_pay_report('<?=$arr[book][id];?>')" type="button" class="btn  btn-info " style="width:100%;text-align:left;padding:5px; background-color:#3b5998;  border-radius:  20px; border:none;color: #fff;"><span class="font-20 text-cap"><i class="icon-new-uniF121-10" style="width:10px;"></i> แจ้งยอดรายได้</span></button>
                           </td>
                        </tr>
                        <tr>
                           <input type="hidden" value="<?=$arr[book][check_driver_pay_report];?>" id="driver_pay_report_check_click">
                           <td style="height:30px;">
                              <div id="status_driver_pay_report">
                                 <div class="font-16"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">รอดำเนินการ</font></strong></div>
                              </div>
                           </td>
                           <td width="30">
                              <table width="100%">
                                 <tbody>
                                    <tr>
                                       <td>
                                       
                                       </td>
                                       <td>
                                          <i id="photo_driver_pay_report_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
                                          <i id="photo_driver_pay_report_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="viewPhotoShop('<?=$arr[book][id];?>','driver_pay_report','<?=$arr[book][driver_pay_report_date];?>');">photo_camera</i>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>  
               </div>
            </td>
         </tr>
      </tbody>
   </table>
</div>