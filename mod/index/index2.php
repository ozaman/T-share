<div style="background-color:<?=$main_color;?>; height:120px; width:110%; margin-left:-10px; margin-left:-10px; margin-top:-10px;   ">
  <br>
  <table width="100%" border="0" cellspacing="2" cellpadding="2" style="margin-left:-5px;">
    <tbody>
      <tr style="display: none;">
        <td align="center" class="font-24"><font color="#FFFFFF">ยินดีต้อนรับเข้าสู่  <font color="#FFFFF"><B>T Share </B></font></font> </td>
      </tr>
      <tr  style="display:nones">
     <td align="center" class="font-24"><font color="#FFFFFF">วันที่&nbsp;<?=date("Y-m-d");?>&nbsp;เวลา  <span id="load_data_time"></span>  </font> </td>
      </tr>
      <tr>
      	<td align="center" class="font-24">
      	<font color="#FFFFFF"><span>คุณอยู่จังหวัด </span> <span id="province_text"></span></font>
      <!--	<span style="color: #fff;"><i class="fa fa-refresh" aria-hidden="true"></i></span>-->
      	</td>
      </tr>
            <tr>
     <td align="center" class="font-22"><font color="#FFFFFF"> </font> </td>
      </tr>
      
    </tbody>
  </table>
</div>
 

 <script>
 setInterval(function() {
 var url_check_data_time = "load_blank.php?name=load/update&file=time&driver=<?=$driver_id?>";
 
  
 $('#load_data_time').load(url_check_data_time);
 
  
}, 1000); // 60000 milliseconds = one minute
 
	</script>
 
 
 
 <style>
 .icon { padding-top: 20px; } 
p {
	font-family: Arial, Helvetica, sans-serif; font-size:18px;
}
 
 body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}

</style>
<style>
.tool-icon-chat {
  width:100%;border-radius: 20px; 
 }
 
 .tool-icon-text {
 padding:5px; width:100%;border-radius: 15px; height:60px; background-color:#FFFFFF; font-size:32px; color: <?=$maincolor?>;
 }
 
 
 
  .tool-icon-text:hover{  
 padding:5px; width:100%;border-radius: 15px; height:60px; border:2px solid <?=$maincolor?>;background-color:#FFFFFF; box-shadow: 0px 0px 10px #999999; color:<?=$maincolor?>;
 }
 
 .tool-td-chat {
 padding:5px;border-radius: 15px; padding-bottom:10px;
 }
 
 
 
.circle-menu{
    border-radius: 50%; background-color:<?=$main_color?>; display: block;  
 
    padding: 10px; 
    width: 50px;
    height: 50px; 
 
	 color:#FFFFFF;  font-size:24px;  
	border: solid 2px #FFFFFF;
 
    text-align: center;
	vertical-align: middle; 

}

.btn-default{
	
border-radius: 20px;
	
	box-shadow: 0px  0px 5px #DADADA;  border:none;
}

 

</style>

 





<?

if($data_user_class=='taxi'){
	 
	 
	 $filter="drivername=".$user_id." ";
 } else { 
	 
	 $filter=""; 
	 
 }
	
 
/// $_GET[day]='2017-07-20';

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
	 $all_work = $db->num_rows('order_booking',"id","$filter");
?>

 
 
 
 
 <div  style="margin-top:-40px; width:100%; padding-right:0px;">
 
 
 <? //=$_SESSION['data_user_type']?>
 
 
 
 <? ///=$data_driver_name?>
 
 
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
    
      <td width="50%" align="center" class="tool-td-chat"> 
        
        
        
 
  <center>
        
 
        
 <button type="button" class="btn btn-default "  id="index_menu_shopping" style="width:100%;">
          
  
          
        <center>
            
          <div  class="circle-menu" style="background-color:#34A0E7"><i class="icon-new-uniF14D"  ></i></div>
            
          <span style="padding-bottom:20px;" class="font-20">ส่งแขก</span>
            
            
  </center>
          
  </button>
        
        
      </td>
      <td align="center" class="tool-td-chat"><span data-toggle="tooltip" class="badge"   style="position:absolute; margin-left:10px; border-radius: 20px; height:25px; width:25px; background-color:#FF0000; padding-top:3px;border: solid 2px #FFFFFF; display:none " id="number_bottom_chat3"  ><span  class="font-20" >
        <?=$all_work?>
        </span></span>
        <center>
        <button type="button" class="btn btn-default "  id="index_menu_shopping_history" style="width:100%;">
          <center>
            <div  class="circle-menu" style="background-color:#F7941D"><i class="fa fa-history"  ></i></div>
            <span style="padding-bottom:20px;" class="font-20"> ประวัติส่งแขก</span>
          </center>
        </button>
<script>    

 
 $('#index_menu_shopping_history').click(function(){  

$( "#load_mod_popup" ).toggle();
 
  var url_load = "load_page_mod.php?name=booking&file=all";
 $('#load_mod_popup').html(load_main_mod);
 $.post( url_load, function( data ) {
  $('#load_mod_popup').html(data);
});

/* $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); */
 
});
 








</script>
        
        
        
        </td>
    
    
 
    </tr>
    
    <tr>
    
    
      <td width="50%" align="center" class="tool-td-chat"> 
      
      
      
      
            <span data-toggle="tooltip" class="badge"   style="position:absolute; margin-left:10px; border-radius: 20px; height:25px; width:25px; background-color:#ff0000; padding-top:3px;border: solid 2px #FFFFFF; display:NONE " id="number_bottom_chat"  ><span  class="font-20" >0</span> </span>
      
      
      <center>
     
 
 
      <button type="button" class="btn btn-default "  id="index_menu_transfer"   style="width:100%">
      
 
 


    <center>
  
  <div  class="circle-menu" ><center><i class="icon-new-uniF10A-9" style="font-size:30px; margin-left:-7px;  "  ></i></div>
  
 <span style="padding-bottom:20px;" class="font-20">งานรับ-ส่ง </span>
    </center>




</button> 

 
    
    </td>
      <td align="center" class="tool-td-chat"><span data-toggle="tooltip" class="badge"   style="position:absolute; margin-left:10px; border-radius: 20px; height:25px; width:25px; background-color:#ff0000; padding-top:3px;border: solid 2px #FFFFFF;  display:NONE " id="number_bottom_chat2"  ><span  class="font-20" > 0 </span></span>
        <center>
        <button type="button" class="btn btn-default "   id="index_menu_tour"   style="width:100%">
          <center>
            <div  class="circle-menu"  style="background-color:#8DC63F"><i class="fa fa-suitcase"  ></i></div>
            <span style="padding-bottom:20px;" class="font-20">จองทัวร์ </span>
          </center>
        </button></td>
    
    </tr>
    <tr>
      <td align="center" class="tool-td-chat"><center>
        <button type="button" class="btn btn-default "   id="index_menu_income"   style="width:100%">
          <center>
            <div  class="circle-menu"  style="background-color:#34A0E7"  > <i class="icon-new-uniF121-10" style="margin-left:-3px;"></i></div>
            <span style="padding-bottom:20px;" class="font-20">รายรับ</span>
          </center>
      </button></td>
      <td align="center" class="tool-td-chat">
      
 
 
        <button type="button" class="btn btn-default "  id="index_menu_payment"   style="width:100%">
        <center>
          <div  class="circle-menu" style=" background-color:#FF0000"><i class="demo-icon icon-money-payment" style="margin-left:-5px; font-size:28px;"></i> </div>
          <span style="padding-bottom:20px;" class="font-20">รายจ่าย</span>
          </center>
        </button>
        
        
        
 </td>
    </tr>
    <tr>
      <td width="50%" align="center" class="tool-td-chat">   
        
        <button type="button" class="btn btn-default "  id="index_menu_account"   style="width:100%">
 
      <center>
  
  <div  class="circle-menu" style=" background-color:#00AEEF"><i class="fa fa-user"   ></i></div>
  
 <span style="padding-bottom:20px;" class="font-20">บัญชีของฉัน</span>
      </center>

  
  </button>  
        
 
        
        
        
        
        
        
      </td>
      <td width="50%" align="center" class="tool-td-chat">
      
      <button type="button" class="btn btn-default "  id="index_menu_setting"   style="width:100%">
 


  <center>
  
  <div  class="circle-menu" ><i class="fa fa-cog"  ></i></div>
  
 <span style="padding-bottom:20px;" class="font-20">เครื่องมือช่วยเหลือ</span>
</div>   

</center>



 </button></td>
    </tr>
    
    
  </tbody>
</table>


 <div>









<table width="100%" border="0" cellspacing="2" cellpadding="2" style="padding:5px; display:none" >
  <tbody>
     <tr>
       <td colspan="2"></td>
     </tr>
     
     <tr>
       <td width="120" class="font-22"><strong>ชื่อ-นามสกุล</strong></td>
       <td class="font-22"><?=$arr[web_user][name]?> (<?=$arr[web_user][nickname]?>)</td>
     </tr>
     
     
     <tr style="display:none">
       <td width="120" class="font-22"><strong>ชื่อเล่น</strong></td>
       <td class="font-22">s</td>
     </tr>
     
          <tr>
       <td width="120" class="font-22"><strong>โทรศัพท์</strong></td>
       <td class="font-22">
	   
	   <a href="tel:<?=$arr[web_user][phone]?>">
	   
	   <?=$arr[web_user][phone]?>
       </a>
       </td>
     </tr>
          <tr>
            <td width="120" class="font-22"><strong>ชื่อเข้าระบบ</strong></td>
            <td class="font-22"> 
              <b><?=$arr[web_user][username]?>
 </td>
          </tr>
          <tr>
            <td class="font-22"><strong>รหัสผ่าน</strong></td>
            <td class="font-22"> 
              <?=$arr[web_user][password]?><b>
            </td>
          </tr>
          
          
 
 
   </tbody>
 </table>

<br>


 


 
<? 
///// head
///include "load/popup/place.php" ;
 ?>


  <style>
.popup-open {
    overflow: hidden;
} 
.css-small-popup {
    /* left: 0px; */
    /* right: 0px; */
    /* bottom: 0px; */
    top: 50px;
   /* margin-top: 95px;
    margin-left: 30px;*/
/*    margin: 40px;*/
	  margin: 15% auto;
    position : relative;
    width: 85%;
    height: auto%;
    z-index: 9999;
    /* padding: 30px; */
    background-color: #fff;
    border: 2px solid #cccccc;
    border-radius: 10px;
}
.background-smal-popup{
	width: 100%;
	height: 100%;
	z-index: 9990;
	background-color: rgba(0, 0, 0, 0.45);
	top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
}
.close-small-popup{
/*	position : relative;*/
/*	right : 50px;
	top : 95px;*/
	z-index : 10000;
	color : #000000;
	width: 100%;
	/*margin-left: -10px;
	margin-top: 5px;*/
}
.css-full-popup2{
	position: fixed;
	width: 100%;
	z-index: 9999;
	background-color: #ffff;
	height: 100%;
/*	margin-top: 48px;*/
}
</style>


<div class="background-smal-popup" id="load_mod_popup_select_pv" style="position: fixed; overflow: auto;display: none;">

<div class="css-full-popup2">
<div class="back-full-popup" style="z-index: 1;"> 
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td width="40"><div class="close-small-popup"><i class="fa fa-close" style="font-size:22px; color:#FFFFFF "></i></div></td>
  <td><div style="font-size:22px; color:#FFFFFF " id="text_small_popup" class="text-topic-action-mod-small-popup">เลือกภูมิภาค/จังหวัด</div></td>
    <td width="50" align="right"><div style="font-size:22px; color:#FFFFFF " id="head_full_popup_icon"><i class="fa " style="font-size:30px; color:; "></i></div></td>
  </tr>
</tbody></table>
</div>	
	  <div id="body_load_select_pv" style="overflow: auto;margin-top:45px; ">
	 </div>
	 
</div>

 
<input type="hidden" value="" id="txt_pv_fr"/>
<input type="hidden" value="" id="area"/>
<input type="hidden" value="" id="province_id"/>

</div>


 
<script>


 function openMainShop(province,province_name){
 	console.log(province+" : "+province_name);
 	$('body').css('overflow','auto');
// 	return;
// 	$('#load_mod_popup_select_pv').hide();
	if($("#load_mod_popup_select_pv").hasClass('zindex-small-popup')==true){
//		alert('00');
		$('.close-small-popup').click();
	}else{
		$("#load_mod_popup" ).toggle();
	}
 	  var url_load= "load_page_mod.php?name=shop&file=maintype&id=1&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop&province="+province+"&province_name="+province_name;
	  
	  $('#load_mod_popup').html(load_main_mod);
	 
	  $('#load_mod_popup').load(url_load);
 }
			 
  $('.close-small-popup').click(function(){
  		$('#load_mod_popup_select_pv').hide();
  		$('.background-smal-popup').removeClass('zindex-small-popup');
  		$('body').css('overflow','auto');
  });
 
 

$('#index_menu_shopping').click(function(){  

 	$('body').css('overflow','hidden');
/* $("#load_mod_popup" ).toggle();
 
  var url_load= "load_page_mod.php?name=shop&file=maintype&id=1&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup').html(load_main_mod);
 
  $('#load_mod_popup').load(url_load); */
  
$("#load_mod_popup_select_pv" ).toggle();
//  var url_load= "empty_style.php?name=shop&file=select_province&id=1&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  var url_load= "empty_style.php?name=shop&file=select_province_new&id=1&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
//   $('#body_load_select_pv').html(load_main_mod);
   $('#body_load_select_pv').html('<div align="center" style="padding:40px;margin-left:10px;margin-top:30px;"><img src="images/loader.gif" /></div>');
   
   
   
   $.post( url_load, function( data ) {
   	   $('#body_load_select_pv').html(data);
	   var txt = $('#province_text').text();
		$('#txt_pv_fr').val(txt);
	
	});
 
 	
 	});
 
  
  
  
  
 $('#index_menu_history_shopping').click(function(){  
  
 $( "#load_mod_popup_2" ).toggle();
 
  var url_load= "load_page_mod_2.php?name=booking&file=all&shop_id=<?=$arr[project][id]?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup_2').html(load_main_mod);
  /// $('#load_mod_data').html(load_main_mod);
   
   
  $('#navload_topic').html('ไปที่หน้าแรก');
  
  $('#load_mod_popup_2').load(url_load); 
  
 
 });
 
 ///// food
 
 $('#index_menu_food').click(function(){  
 
 $("#load_mod_popup" ).toggle();
 
  var url_load= "load_page_mod.php?name=shop&file=main&id=2&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup').html(load_main_mod);
 
  $('#load_mod_popup').load(url_load); 
 
 
 	});
	
	
 
 $('#index_menu_history_food').click(function(){  
 
  alert('กำลังจะเปิดให้บริการ');
 
 	});
 
 
  $('#index_menu_transfer').click(function(){  
 
  alert('กำลังจะเปิดให้บริการ');
 
 	});
 
 
  
  $('#index_menu_history_transfer').click(function(){  
 
  alert('กำลังจะเปิดให้บริการ');
 
 });
 
 
 
 
   $('#index_menu_tour').click(function(){  
 
  alert('กำลังจะเปิดให้บริการ');
 
 	});
 
 
  
  $('#index_menu_history_tour').click(function(){  
 
  alert('กำลังจะเปิดให้บริการ');
 
 });
 
 
 ////// income 
 
 $('#index_menu_income').click(function(){  
  
 $( "#load_mod_popup_2" ).toggle();
 
  var url_load= "load_page_mod_2.php?name=booking/account&file=index&shop_id=<?=$arr[project][id]?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup_2').html(load_main_mod);
  /// $('#load_mod_data').html(load_main_mod);
   
   
  $('#navload_topic').html('ไปที่หน้าแรก');
  
  $('#load_mod_popup_2').load(url_load); 
  
 
 });
 
   $('#index_menu_payment').click(function(){  
 
  alert('กำลังจะเปิดให้บริการ');
 
 });
 
 
  $('#index_menu_account').click(function(){  
 
  alert('กำลังจะเปิดให้บริการ');
 
 });
 
 
   $('#index_menu_setting').click(function(){  
 
  alert('กำลังจะเปิดให้บริการ');
 
 });
 
 
 
 
					
 </script>  
 
 
 
 
 
 
     <div id="tab_chk_qr" class="tab-pane fade">
	
   <?
 //include("mod/load/show/step/qr_scan.php");
  /// include("mod/load/show/step/index.html");
 ?>
    </div>
    
    
    
    
    
    
    
    <script>
 
 /*
 
	 var url = 'https://maps.google.com/maps/api/geocode/json?latlng='+position.coords.latitude+','+position.coords.longitude+'&sensor=false';
	 
	 alert(url);
   
$.getJSON(url, function (data) {

    for(var i=0;i<1;i++) {
        var adress = data.results[i].formatted_address;

	  $( "#now_province" ).html(adress);
    }
});
 */
 

</script>

    
    
    
    
    
    
    
    
    
    
<script>
//$( document ).ready(function() {
	geolocatCall();

	/*setInterval(function(){ 
		geolocatCall();
	 }, 1000000);*/
	
function geolocatCall(){
	if (navigator.geolocation) {
	        navigator.geolocation.getCurrentPosition(showPosition);
	    } else { 
	       	console.log('ปิดตำแหน่ง');
	    }
}	   
	     
function showPosition(position) {
	
	// https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyCx4SLk_yKsh0FUjd6BgmEo-9B0m6z_xxM
	
	 var url = 'https://maps.google.com/maps/api/geocode/json?latlng='+position.coords.latitude+','+position.coords.longitude+'&sensor=false&language=th&key=AIzaSyCx4SLk_yKsh0FUjd6BgmEo-9B0m6z_xxM';
//	 var url = 'https://maps.google.com/maps/api/geocode/json?latlng=9.13824,99.32175&sensor=false';
    console.log(position.coords.latitude+" : "+position.coords.longitude);
    $.post( url, function( data ) {
 
		
		if(data.status=="OVER_QUERY_LIMIT"){
			console.log('OVER_QUERY_LIMIT');
 
			
		}else{
			console.log(data.results);
    		console.log(data.results.length-2);
			console.log(data.results[data.results.length-2].address_components[0].long_name);
			var province = data.results[data.results.length-2].address_components[0].long_name;
		 
			
			$('#province_text').text(province);
			$('#now_province').val(province);
			updatePlaceNum(province);
	
		}
		
	});
}   


//});
function updatePlaceNum(province){
	
	var url = "mod/shop/select_province_new.php?op=get_id_province_only";
		 $.post( url,{txt_pv  :province} ,function( data ) {
		  	var obj = JSON.parse(data);
			  	console.log(obj);
			  	var province = obj.id;
				var area = obj.area;
				var url2 = "mod/shop/update_num_place.php?op=update_all&province="+province+'&area='+area;
				 $.post( url2, function( data2 ) {
				  	console.log(data2);
				}); 
		});  
	
		
}	

</script>

 



<div></div>



<input  name="now_province"  type="hidden" class="form-control"  id="now_province" value=""   />