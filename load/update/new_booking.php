 

 
<script>
 
 
 setInterval(function() {
 //alert(0);
 var url_check_booking_update = "go.php?name=load/update/booking&file=new&driver=<?=$user_id?>";
 $('#check_new_online_booking').load(url_check_booking_update);
 //alert(0);
  
}, 5000); // 60000 milliseconds = one minute
 
	</script>
	<div id="check_new_online_booking"></div>
 