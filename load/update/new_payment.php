 
 

<script>
 
 
 setInterval(function() {
 //alert(0);
 var url_check_user_online_payment = "go.php?name=load/update/checkin&file=payment&driver=<?=$user_id?>";
 $('#check_new_online_payment').load(url_check_user_online_payment);
 //alert(0);
  
}, 5000); // 60000 milliseconds = one minute
 
 
 
	</script>
 
     <div id="check_new_online_payment"></div>
 