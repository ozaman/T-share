 
 

<script>
 
 
 setInterval(function() {
 //alert(0);
 var url_check_user_online_to = "go.php?name=load/update/checkin&file=to&driver=<?=$user_id?>";
 $('#check_new_online_to').load(url_check_user_online_to);
 //alert(0);
  
}, 5000); // 60000 milliseconds = one minute
 
 
  setInterval(function() {
 //alert(0);
 var url_check_complete = "go.php?name=load/update/checkin&file=complete&driver=<?=$user_id?>";
 $('#check_new_online_complete').load(url_check_complete);
 //alert(0);
  
}, 5000); // 60000 milliseconds = one minute



 
 
	</script>
	<div id="check_new_online_to"></div>
     <div id="check_new_online_complete"></div>
 