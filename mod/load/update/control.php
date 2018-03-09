<? if($_GET[sound_alert]=='checkin' ){ ?>

<script>
 $("#play_new").click();
setTimeout(function () {
 $("#play_checkin").click();
}, 3000);  
   </script>

<script>
setInterval(function() {
 var url_check_sound_checkin = "load_auto.php?name=load/update/sound&file=checkin";
 $('#play_sound_checkin').load(url_check_sound_checkin);
}, 20000); // 60000 milliseconds = one minute
 </script>
<div id="play_sound_checkin"></div>
<? } ?>


<? if($_GET[sound_alert]=='checkguest' ){ ?>


<script>
 $("#play_new").click();
setTimeout(function () {
 $("#play_checkguest_<?=$_GET[terminal]?>").click();
}, 3000);  
   </script>

<script>
setInterval(function() {
 var url_check_sound_checkguest = "load_auto.php?name=load/update/sound&file=checkguest&terminal=<?=$_GET[terminal]?>";
 $('#play_sound_checkguest').load(url_check_sound_checkguest);
}, 15000); // 60000 milliseconds = one minute
</script>
<div id="play_sound_checkguest"></div>
<? } ?>

<? if($_GET[sound_alert]=='newwork' ){ ?>

<script>
 $("#play_new").click();
setTimeout(function () {
 $("#play_new_work").click();
}, 3000);  
   </script>

<script>
setInterval(function() {
 var url_check_sound_newwork = "load_auto.php?name=load/update/sound&file=newwork";
 $('#play_sound_newwork').load(url_check_sound_newwork);
}, 20000); // 60000 milliseconds = one minute
</script>
<div id="play_sound_newwork"></div>
<? } ?>


<? if($_GET[sound_alert]=='cancelwork' ){ ?>

<script>
 $("#play_new").click();
setTimeout(function () {
 $("#play_cancel_work").click();
}, 3000);  
   </script>

<script>
setInterval(function() {
 var url_check_sound_newwork = "load_auto.php?name=load/update/sound&file=cancelwork";
 $('#play_sound_cancelwork').load(url_check_sound_cancelwork);
}, 20000); // 60000 milliseconds = one minute
</script>
<div id="play_sound_cancelwork"></div>
<? } ?>



