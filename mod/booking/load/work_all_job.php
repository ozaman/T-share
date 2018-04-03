
<?php 
  mysql_query("SET NAMES utf8"); 
  mysql_query("SET character_set_results=utf-8");
  $db->connectdb(DB_NAME_BOOK,DB_USERNAME,DB_PASSWORD);
  $res[order] = $db->select_query("SELECT * FROM ap_order where id = '".$_GET[order_id]."' ");
  $arr[order] = $db->fetch($res[order]);
  $db->closedb();
//  $address_form = findAddress($arr[order][lat_from],$arr[order][lng_from]);
//  $address_to = findAddress($arr[order][lat_to],$arr[order][lng_to]);
  
   
   if($arr[order][adult]>0){
    $adult_txt = 'ผู้ใหญ่ : '.$arr[order][adult];
   }
   if($arr[order][child]>0){
    $child_txt = 'เด็ก : '.$arr[order][child];
   }
   $url_map_form = 'https://www.google.co.th/maps?q='.$arr[order][lat_from].",".$arr[order][lng_from];
   $url_map_to = 'https://www.google.co.th/maps?q='.$arr[order][lat_to].",".$arr[order][lng_to];
   
   if($arr[order][fashion]=="Realtime"){
    $tr_flight_none = 'display:none;';
   }
   
   if($arr[order][phone]=='0'){
    $phone_none = 'display:none;';
   }
   if($arr[order][arrival_flight]=='0'){
    $flight_none = 'display:none;';
   }
   
/*  $res[place] = $db->select_query("SELECT topic FROM web_transferplace_new where id = '".$arr[order][place]."' ");
  $arr[place] = $db->fetch($res[place]);
  
  $res[to_place] = $db->select_query("SELECT topic FROM web_transferplace_new where id = '".$arr[order][to_place]."' ");
  $arr[to_place] = $db->fetch($res[to_place]);*/
  
  
  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
  $res[driver] = $db->select_query("SELECT * FROM web_driver where username = '".$_COOKIE[app_remember_user]."' ");
  $arr[driver] = $db->fetch($res[driver]);
  $db->closedb();
  
  $curl_post_data = '{"product_id" : "'.$arr[order][product].'"}';
      $curl_response = '';
      $headers = array();
//      $url = "http://services.t-booking.com/Product_dashboard/normal";                               
      $url = "http://services.t-booking.com/Product_dashboard/normal";                               
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
      curl_setopt($curl, CURLOPT_HTTPHEADER , array(
           'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
      ));
      curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_REFERER, $url);
      curl_setopt($curl, CURLOPT_URL, $url);  
      curl_setopt($curl, CURLOPT_POST, 1);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
      $curl_response = curl_exec($curl);
      curl_close($curl);
      $json_product = json_decode($curl_response);
  
  if($json_product[0]->area=='In'){
    $area = 'รับเข้า';
    $font_icon_area = '<i class="fa fa-plane " style="-webkit-transform:rotateX(180deg);
                           -moz-transform:rotateX(180deg);
                           -o-transform:rotateX(180deg);
                           -ms-transform:rotateX(180deg);"></i>';
                           
  }else if ($json_product[0]->area=='Out'){
    $area = 'ส่งออก';
    $font_icon_area = '<i class="fa fa-plane "></i>';
  }else if ($json_product[0]->area=='Point'){
    $area = 'Point to Point';
    $font_icon_area = '<i class="fa fa-map-marker"></i>';
  }else if ($json_product[0]->area=='Service'){
    $area = 'บริการ';
    $font_icon_area = '<i class="fa fa-car "></i>';
  }
?>
<script>
  var objpd = JSON.parse('<?=json_encode($json_product);?>');
  console.log(objpd);
  $(".text-topic-action-mod-1" ).html("รับส่ง <?=$arr[order][invoice];?>");
</script>
<style>
  .topictransfer1 {
    padding-top: 8px;
    font-family: Arial, Helvetica, sans-serif;
    padding-left: 0x;
    padding-bottom: 5px;
    margin-left: 5px;
    font-size: 16px;
    font-weight: bold;
    color: #444444;
    text-align: left;
}
.font_16 {
    font-size: 16px !important;
    font-family: Arial, Helvetica, sans-serif;
}






.checkinstep_pass{
  border-radius: 50%;
    background-color: #CCCCCC;
    padding: 5px;
    width: 45px;
    height: 45px;
    text-align: justify;
    color: #FFFFFF;
    font-size: 30px;
    font-weight: bold;
    margin-left: -5px;
  border:solid 2px #03b34f
}
</style>
<div style="">
  <div style="padding:15px 0px; margin: auto;" id="body_to_append">
<span style="font-size: 16px;"><? ?></span>
   <div class="assas_<?=$_GET[order_id];?>" style="margin-left:0px;  margin-right: 0px; margin-top:0px;box-shadow: 0px -5px 5px #f6f6f6; padding:5px;border: 1px solid #3b5998;border-radius: 15px;">
   <table width="100%" border="0" cellspacing="2" cellpadding="2">
      <tbody>
         <tr>
            <td width="60" style="background-color:#F6F6F6 ">
               <div id="cir_1">
                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                     <tbody>
                        <tr>
                           <td height="35" class="boxnumber" style="font-size:18px; color:#FFFFFF; background-color: #006699 ; font-weight:bold ;border-radius: 0px;" id="">
                              <center>
                                 <span id="place_number_190914">1</span> | 1    
                              </center>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </td>
            <td width="100" height="30" valign="top" style="background-color:#F3F3F3; padding-top:5px; padding-left:10px;  ">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                     <tr>
                        <td style="font-size:24px ; color:#009999; color:#444444;"><i class="fa fa-user"></i></td>
                        <td style="font-size:14px ; font-weight:bold"><? echo t_private ?></td>
                     </tr>
                  </tbody>
               </table>
            </td>
            <td valign="middle" style="font-size:16px ; font-weight:bold; padding-top:5px;">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                     <tr>
                        <td style="font-size:24px ; color: #3399CC; color:#444444  " width="35" >&nbsp;<?=$font_icon_area;?></td>
                        <td style="font-size:14px ; font-weight:bold">&nbsp;<?=$area;?></td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
      </tbody>
   </table>
  
   <div style="margin-top:10px; font-size:22px; font-weight:bold; background-color:#F6F6F6; padding:5PX;border-radius: 10px; ">Golden&nbsp;&nbsp;151&nbsp;<span style="font-size:16px; margin-top: 30px; "> ( <?=$arr[order][arrival_date];?> )</span></div>
   <div style="margin-top:10px;padding:5px;    ">
      <div class="show_product_detail_all" style="display: nones;">
         <font class="font_16"><b>
         <?=$json_product[0]->topic_en;?>&nbsp; &nbsp;<br/><font color="#666666"> <?=$json_product[0]->topic_th;?></font></b></font>
      </div>
      <font class="font_16">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
               <tr>
                  <td>
                     <div style="background-color:#F6F6F6; margin-top:5px; margin-bottom:5px; padding: 2px 0px 2px 0px;border-radius: 10px;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tbody>
                              <tr>
                                 <td valign="top">
                                    <div class="topictransfer1" style=" margin-top: -2px; margin-left:"><i class="fa  fa-map-marker" style="color:#c1c1c1"></i> <span class="font_16"><? echo t_pick_up_place ?></span></div>
                                 </td>
                                 <td width="40">
                                    <a class="test" data-toggle="tooltip" title="แสดงแผนที่นำทาง" 
                                    href="<?=$url_map_form;?>" target="_blank"> 
                                    <i class="icon-new-uniF13A-7" style=" font-size:28px; color:#3C8DBC"></i>
                                    </a>
                                 </td>
                                 <td width="40" style="padding-right:10px; ">                                                                                      <a href="tel:076351166" target="_blank" class="test" data-toggle="tooltip" title="โทรออก"> <i class="icon-new-uniF152-4" style=" font-size:24px; color:#3C8DBC"></i></a>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td>
                     <div align="left" style="font-size:16px; "> <span id="address_form"></span>             
                        <br>
                        <font color="#FF0000" style="font-size:18px">
                        </font>              
                        <font color="#666666" class="font_16"> <!--(Phuket Airport | Phuket) -->
                        
                        </font>
                     </div>
                     <font color="#666666" class="font_16">
                     </font>
                  </td>
               </tr>
               <tr>
                  <td id="show_guest_detail" class="show_guest_detail_all" style="display: table-cell;">
                     <br>
                     <table width="100%" border="0" cellspacing="2" cellpadding="4" style="margin-left:-8px;">
                        <tbody>
                           <tr>
                              <td width="20" valign="top"><i class="icon-new-uniF10E-5" style="color:#666666; font-size:18px;"></i></td>
                              <td width="100" valign="top" class="td-text"><b><? echo t_pick_up_customer ?></b></td>
                              <td valign="top" class="td-text"><?=$arr[order][arrival_time];?></td>
                           </tr>
                           <tr style="<?=$tr_flight_none;?>">
                              <td valign="top"><i class="icon-new-uniF104" style="color:#666666; font-size:18px;"></i></td>
                              <td width="100" valign="top" class="td-text"><b>เที่ยวบิน</b></td>
                              <td valign="top" class="td-text"><?=$arr[order][arrival_flight];?> /</td>
                           </tr>
                           <tr>
                              <td valign="top"><i class="icon-new-uniF137" style="color:#666666; font-size:18px;"></i></td>
                              <td width="100" valign="top" class="td-text"><b><? echo t_agents ?></b></td>
                              <td valign="top" class="td-text">Agent Test Program.</td>
                           </tr>
                           <tr>
                              <td valign="top"><i class="icon-new-uniF12B-3" style="color:#666666; font-size:18px"></i></td>
                              <td valign="top" class="td-text"><b>จำนวน</b></td>
                              <td valign="top" class="td-text"> <?=$adult_txt." ".$child_txt;?>
                              </td>
                           </tr>
                           <tr>
                              <td valign="top"><i class="icon-new-uniF109-14" style="color:#666666; font-size:18px"></i></td>
                              <td valign="top" class="td-text"><b><? echo t_customer_name ?></b></td>
                              <td valign="top" class="td-text"><?=$arr[order][guest_english];?></td>
                           </tr>
                           <tr style="<?=$phone_none;?>">
                              <td valign="top"><i class="icon-new-uniF152-4" style="color:#666666; font-size:18px"></i></td>
                              <td valign="top" class="td-text"><b><? echo t_phone ?></b></td>
                              <td valign="top" class="td-text"><b><?=$arr[order][phone];?></b></td>
                           </tr>
                           <tr>
                              <td valign="top"><i class="icon-app-uniF111" style="color:#666666; font-size:18px"></i></td>
                              <td valign="top" class="td-text"><b><? echo t_voucher_number ?></b></td>
                              <td valign="top" class="td-text"><a href="<?=$arr[order][voucher_url];?>" target="_blank"><span class="span-detail1"> <font color="#00808B" style="font-size:18px; font-weight:bold ">
                                 <?=$arr[order][invoice];?></font></span></a>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     <br>
                  </td>
               </tr>
         <tr>
            <td id="show_guest_detail2" class="show_guest_detail_all" style="display: table-cell;">
                     <table width="100%" border="0" cellspacing="2" cellpadding="4" style="margin-left:-8px;">
                        <tbody>
                           <tr>
                              <td width="20" valign="top"><i class="fa fa-car" style="color:#666666; font-size:18px;"></i></td>
                              <td width="100" valign="top" class="td-text"><b><? echo t_type_of_vehicle ?></b></td>
                              <td valign="top" class="td-text"><?=$json_product[0]->car_topic_th." ".$json_product[0]->pax_th;?></td>
                           </tr>
                        </tbody>
                     </table>
                     <br>
                  </td>
         </tr>
               <tr>
                  <td></td>
               </tr>
               <tr>
                  <td>
                     <div style="background-color:#F6F6F6; margin-top:5px; margin-bottom:5px; padding: 2px 0px 2px 0px;border-radius: 10px;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tbody>
                              <tr>
                                 <td valign="top">
                                    <div class="topictransfer1" style=" margin-top:-2px;"><i class="fa  fa-map-marker" style="color:#c1c1c1"></i> <span class="font_16"><? echo t_drop_place ?></span></div>
                                 </td>
                                 <td width="40">
                                    <div>
                                       <a class="test" data-toggle="tooltip" title="แสดงแผนที่นำทาง" 
                                       href="<?=$url_map_to;?>" target="_blank">
                                       <i class="icon-new-uniF13A-7" style=" font-size:28px; color:#3C8DBC"></i> </a>
                                    </div>
                                 </td>
                                 <td width="40" style="padding-right:10px; ">
                                    <div>
                                       <a href="tel:+6676380500" target="_blank" class="test" data-toggle="tooltip" title="โทรออก"><i class="icon-new-uniF152-4" style=" font-size:24px; color:#3C8DBC"></i></a>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td>
                     <div align="left" style="font-size:16px; "> <span id="address_to"></span>       
                        <font color="#666666" class="font_16"> <!--(Patong | Phuket)--> 
                        </font>
                     </div>
                     <font color="#666666" class="font_16">
                     </font>
                  </td>
               </tr>

            </tbody>
         </table>
      </font>
   </div>
   <font class="font_16">   
   </font>
   <div id="status_job" style="background: #ddd; 

    background: #ddd;
    border-radius: 10px;
    padding: 8px;">
    <table width="100%" border="0" cellpadding="1" cellspacing="1" id="table_show_hide_checkin_<?=$arr[order][invoice];?>">
 
 
 <tr id="step_driver_topoint_<?=$arr[order][invoice];?>">
  <td class="font-22">
      
 <?  include ("mod/booking/load/form/checkin/topoint_job.php");?>
  
  </td>
  </tr>
  
  
  
  
 <tr id="step_guest_receive_<?=$arr[order][invoice];?>" style="display:none">
 
 
    <td class="font-22">
    
    
    
     <?  include ("mod/booking/load/form/checkin/driver_pickup_job.php");?>
    
 
    
    
    
    </td>
  </tr>
  
  
 <tr id="step_guest_register_<?=$arr[order][invoice];?>" style="display:none">
    <td class="font-22">
    
     <?  include ("mod/booking/load/form/checkin/guest_topoint.php");?>
    
 
    </td>
  </tr>
  
  
 <tr id="step_driver_pay_report_<?=$arr[order][invoice];?>" style="display:none">
    <td class="font-22">
    
     <?  include ("mod/booking/load/form/checkin/check_car.php");?>
    
 
    </td>
  </tr>
  
 
 
</table>
    
   
</div>



</div>
    
  </div>  
</div>

<style>
   .btnstatus-checkin {
    box-shadow: 1px 1px 5px #999999;
    border: 0px solid #FFFFFF;
    border-radius: 25px;
    padding: 5px;
    height: 40px;
    font-size: 20px;
    width: 100%;
    margin-right: 15px;
    background-color: #3b5998;
    font-family: Arial, Helvetica, sans-serif;
    color: #FFFFFF;
}
.btnstatus-checkin_complete{
    box-shadow: 1px 1px 5px #999999;
    border: 0px solid #FFFFFF;
    border-radius: 25px;
    padding: 5px;
    height: 40px;
    font-size: 20px;
    width: 100%;
    margin-right: 15px;
    background-color: #4CAF50;
    font-family: Arial, Helvetica, sans-serif;
    color: #FFFFFF;
}
.btnstatus-checkin-red {
    box-shadow: 1px 1px 5px #999999;
    border: 0px solid #FFFFFF;
    border-radius: 25px;
    padding: 5px;
    height: 40px;
    font-size: 20px;
    width: 100%;
    margin-right: 15px;
    background-color: #ff2b2b;
    font-family: Arial, Helvetica, sans-serif;
    color: #FFFFFF;
}









 

.step-booking-small {
    border-radius: 50%; background-color: #FF9933;
 
    padding: 5px; 
    width: 40px;
    height: 40px; 
  text-align: justify; color:#FFFFFF;   font-size:20px; font-weight:bold; margin-top:-10px; text-align:center;
  border: solid 4px #FFFFFF;
 
     background: #f39c12 !important;
 
 
  color: #fff;
}



.step-booking-small-no {
    border-radius: 50%; background-color: #FF9933;
 
    padding: 5px; 
    width: 40px;
    height: 40px; 
  text-align: justify; color:#FFFFFF;   font-size:20px; font-weight:bold; margin-top:-10px; text-align:center;
  border: solid 4px #FFFFFF;
 
     background: #999999 !important;
 
 
  color: #fff;
}


.step-booking {
    border-radius: 50%; background-color: #FF9933;
 
    padding: 10px; 
    width: 60px;
    height: 60px; 
  text-align: justify; color:#FFFFFF;   font-size:30px; font-weight:bold;   text-align:center; margin-left:-5px;
  border: solid 3px #F6F6F6;
   box-shadow: 0 0 10px 3px #E8E6E6;   
     background: #FF0000 !important;
 
  color: #fff;
}


.step-booking-active {
    border-radius: 50%;
    padding: 10px;
    width: 50px;
    height: 51px;
    text-align: justify;
    color: #FFFFFF;
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    margin-left: -5px;
    border: solid 3px #F6F6F6;
    box-shadow: 0 0 10px 3px #E8E6E6;
    background: #00b74f !important;
    color: #fff;
}

 

 

</style>
<script>
   function driver_to_place_map(lat,lng){
      console.log(lat)
      console.log(lng)
    
       $("#main_load_mod_popup_2" ).toggle();
     
     var url_load= "load_page_mod_2.php?name=transfer_order&file=map_driver_place&lat="+lat+"&lng="+lng;    
     console.log(url_load);
     
     $('#load_mod_popup_2').html(load_main_mod);
     
     $('#load_mod_popup_2').load(url_load); 
   }
   // function driver_to_place(vc){
      
   // }
   function driver_pickup(vc){
      $("#sub_complete_"+vc).show()

   }
   
  function ViewPhoto(id,type,date){
    var url = 'load_page_photo.php?name=booking/load/form&file=iframe_photo&id='+id+'&type='+type+'&date='+date;
    console.log(url);
    $( "#load_mod_popup_photo" ).toggle();
    
    $('#load_mod_popup_photo').html(load_main_mod);
      
      
   $('#load_mod_popup_photo').load(url); 
   
//   $('#text_mod_topic_action_photo-txt').text('crfdfdsdsf'); 

  }  
   function driver_topoint(vc){ 
  
  console.log(vc)
      console.log($('#lat').val())
      console.log($('#lng').val())
      // $("#sub_see_guest_"+vc).show()
      // console.log('in case driver to place')
      // $.ajax({
      //       type: 'POST',
      //       url: 'mod/transfer_order/update_driver_picup.php',
      //       data: {'invoice':vc,'lat':$('#lat').val(),'lng': $('#lng').val() },
      //       //contentType: "application/json",
      //       dataType: 'json',
      //       success: function(data) {
      //           console.log(data)
      //           location.reload()
      //       }
      //   });
    // if($('#topoint_check_click').val()!=1){
   $( "#main_load_mod_popup_3" ).toggle();
 
  var url_load= "load_page_mod_3.php?name=transfer_order&file=checkin_popup_job&id="+vc+"&type=driver_topoint&lat="+$('#lat').val()+"&lng="+$('#lng').val();
  console.log(url_load);
  $('#load_mod_popup_3').html(load_main_mod);
  /// $('#load_mod_data').html(load_main_mod);
 
  $('#load_mod_popup_3').load(url_load); 
    // }else{
      
    // }
  
  
     } 

</script>
<?php 
/// fucntion php
function findAddress($lat,$lng) {
    
  $url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lng."&sensor=true&language=th";  
  
  $headers = array();
  $headers[] = 'Content-Type: application/json';
  $headers[] = 'API-KEY: ea1b6d331a20b66041369a63251410d4ec748f27';
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
  curl_setopt($curl, CURLOPT_HTTPHEADER , array(
       'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
  ));
  curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

  curl_setopt($curl, CURLOPT_REFERER, $url);
  curl_setopt($curl, CURLOPT_URL, $url);  

  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
  $curl_response = curl_exec($curl);
  //echo $curl_response;
  curl_close($curl);

  $message = iconv("incoming-charset", "utf-8", $curl_response);
  $aaaa = json_decode($curl_response);

//echo $aaaa->results[0]->formatted_address;
    
    return $aaaa->results[0]->formatted_address;
}
?>  

<script>
  
  var url_form = "https://maps.googleapis.com/maps/api/geocode/json?latlng=<?=$arr[order][lat_from];?>,<?=$arr[order][lng_from];?>&sensor=true&language=th";  
  $.post( url_form, function( data ) { 
    console.log(data);
    
    if(data.status!="OK"){
      $('#address_form').text('<?=$arr[order][address_en_from];?>');
      return;
    }
    $('#address_form').text(data.results[0].formatted_address);
  });
  
  var url_to = "https://maps.googleapis.com/maps/api/geocode/json?latlng=<?=$arr[order][lat_to];?>,<?=$arr[order][lng_to];?>&sensor=true&language=th";  
  $.post( url_to, function( data ) { 
    console.log(data);
    
    if(data.status!="OK"){
      $('#address_to').text('<?=$arr[order][address_en_to];?>');
      return;
    }
    $('#address_to').text(data.results[0].formatted_address);
  });
</script>