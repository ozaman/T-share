<div style="display:none ">
<a  id="alert_auto_new_work" data-target="#popup_alert_new_work" data-toggle="modal"  data-backdrop="static" data-keyboard="false">new_work</a>
<a  id="alert_auto_cancel_work" data-target="#popup_alert_cancel_work" data-toggle="modal"  data-backdrop="static" data-keyboard="false">cancel_work</a>

<a  id="alert_auto_checkin" data-target="#popup_alert_lab_checkin" data-toggle="modal"  data-backdrop="static" data-keyboard="false">checkin</a>
<a  id="alert_auto_checkguest" data-target="#popup_alert_lab_checkguest" data-toggle="modal"  data-backdrop="static" data-keyboard="false">checkguest</a>
</div>

<?
///echo $arr[web_driver][alert_new_work];


 if($arr[web_driver][alert_new_work]==1) {

// echo "<embed src=music/player.swf width=0 height=0  param=param name=wmode allowscriptaccess=always flashvars=file=music/new.mp3&type=mp3&stretch=none&autostart=true&displayclick=none&repeat=1></embed>";
   
   /*
   $db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);
         $db->update_db(TB_driver, array(
                "alert_new_work" =>0
        ), " id=".$driver_id."");
        $db->closedb();
		
		*/
    
   ?>
   <div class="alert alert-danger alert-dismissible" style="color:#FF0000; font-size:20px; margin-bottom:-5px; padding:5px; margin-left:1px; margin-bottom:10px;"><li class="fa fa-warning"></li>&nbsp;&nbsp;มีงานใหม่เข้ามา</font></div>
   
 
   
   <script>
         if(document.getElementById('check_status_new_work').value=='0'){
		//   $("#alert_auto_new_work").click();
		
 
var url="load_auto.php?name=load/update&file=control&sound_alert=newwork&terminal=<?=$arr[project][id];?>";
 //$("#load_sound_new_work").load(url);
 ///$("#popup_alert_new_work").modal();
///  $("#alert_auto_new_work").click();

  document.getElementById('check_status_new_work').value ='1';
	}
 
   </script>
   <? } ?>
 
      


  <? if($arr[web_driver][alert_cancel_work]==1) {

// echo "<embed src=music/player.swf width=0 height=0  param=param name=wmode allowscriptaccess=always flashvars=file=music/new.mp3&type=mp3&stretch=none&autostart=true&displayclick=none&repeat=1></embed>";
   
   /*
   $db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);
         $db->update_db(TB_driver, array(
                "alert_new_work" =>0
        ), " id=".$driver_id."");
        $db->closedb();
		
		*/
    
   ?>
   <div class="alert alert-danger alert-dismissible" style="color:#FF0000; font-size:20px; margin-bottom:-5px; padding:5px; margin-left:1px; margin-bottom:10px;"><li class="fa fa-warning"></li>&nbsp;&nbsp;มีการยกเลิกงาน</font></div>
   
 
   
   <script>
         if(document.getElementById('check_status_cancel_work').value=='0'){

var url="load_auto.php?name=load/update&file=control&sound_alert=cancelwork&terminal=<?=$arr[project][id];?>";
  //$("#load_sound_cancel_work").load(url);
 /// $("#alert_auto_cancel_work").click();
 
 $("#popup_alert_cancel_work").modal();
  document.getElementById('check_status_cancel_work').value ='1';
	}
 
   </script>
   <? } ?>


	  
	  
	  
    
   
   
   
 
     <? if($arr[web_driver][alert_lab_call]==1) {	 
///  echo "<embed src=music/player.swf width=0 height=0  param=param name=wmode allowscriptaccess=always flashvars=file=music/car-horn.mp3&type=mp3&stretch=none&autostart=true&displayclick=none&repeat=1></embed>";
    ?>
      <div class="alert alert-danger alert-dismissible" style="color:#FF0000; font-size:20px; margin-bottom:-5px; padding:5px; margin-left:1px; margin-bottom:10px;"><li class="fa fa-warning"></li>&nbsp;&nbsp;เตรียมพร้อมรับแขกที่จุดนัดพบ</font></div>
   <script>
 
   if(document.getElementById('check_status_auto_checkin').value=='0'){
 
var url="load_auto.php?name=load/update&file=control&sound_alert=checkin&terminal=<?=$arr[web_driver][alert_lab_call_terminal];?>";
   $("#load_sound_lab_checkin").load(url);
   
var url_lab="load_auto.php?name=load/update&file=terminal&terminal=<?=$arr[web_driver][alert_lab_call_terminal];?>";
$("#terminal_lab").load(url_lab); 
   
    $("#alert_auto_checkin").click();   
      document.getElementById('check_status_auto_checkin').value ='1';
	}
 
   </script>
   <? } ?>
   
   
   
      <? if($arr[web_driver][alert_lab_call]==2) {
	  
 
	  /*
   $db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);
         $db->update_db(TB_driver, array(
                "alert_lab_call" =>0
        ), " id=".$driver_id."");
        $db->closedb();
		
		*/
    
   ?>
      <div class="alert alert-danger alert-dismissible" style="color:#FF0000; font-size:20px; margin-bottom:-5px; padding:5px; margin-left:1px; margin-bottom:10px;"><li class="fa fa-warning"></li>&nbsp;&nbsp;แขกมาถึงจุดนัดพบแล้ว</font></div>
   <script>
      if(document.getElementById('check_status_auto_checkguest').value=='0'){


var url="load_auto.php?name=load/update&file=control&sound_alert=checkguest&terminal=<?=$arr[web_driver][alert_lab_call_terminal];?>";
  $("#load_sound_lab_checkguest").load(url);
  var url_lab="load_auto.php?name=load/update&file=terminal&terminal=<?=$arr[web_driver][alert_lab_call_terminal];?>";
$("#terminal_guest").load(url_lab); 

  $("#alert_auto_checkguest").click();
      document.getElementById('check_status_auto_checkguest').value ='1';
	}
   
      setTimeout(function () {


// $("#auto_lab_call_check").click();
}, 5000); //w
   </script>
   <? } ?>


   
   
   
 