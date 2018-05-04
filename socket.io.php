44444444444
<div id="load_booking_data">

</div>
<!--<script src="http://103.13.30.65:8080/socket.io/socket.io.js?v=<?=time();?>"></script>-->
<script src="js/socket.io/socket.io.js?v=<?=time();?>"></script>
    <!-- <script src="socket.io/socket.io.js"></script> -->
<script src="js/socket.io/jquery-latest.min.js?v=<?=time();?>"></script>
<script>
	var res_socket ;
	var socket = io.connect('http://103.13.30.65:8080');
        //on message received we print all the data inside the #container div
        socket.on('notification', function (data) {
        res_socket = data.transfer[0];
        if($('#check_open_worktbooking').val()==1){
//			readDataBooking();
		}
        
//        $('.list-container').remove();	
        console.log(data.transfer)
       
       //* 
       var num = 1;
       $.each(data.transfer[0],function(index,res){
		  //var program = res.progream.topic_en;
		  var program = 'aaaa';
          
          var component = 
          '<div class="list-container">'
	         +'<div class="w3-ul w3-card-4" style="box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 1px 5px 0 rgba(0,0,0,.12), 0 3px 1px -2px rgba(0,0,0,.2);">'
	            +'<div class="w3-bar" onclick="">'
	               +'<span class="ico-pos font-24"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>'
	               		+'<div class="w3-bar-item">'
	                  		+'<table width="100%">'
			                     +'<tbody>'
			                        +'<tr>'
			                           +'<td width="90%"><span class="font-24">'+num+'. '+program+'</span></td>'
			                           +'<td width="20%" align="center" rowspan="2"></td>'
			                        +'</tr>'
			                        +'<tr>'
			                           +'<td><span class="font-20">S00106&nbsp;:&nbsp;2018-04-28 15:00 </span></td>'
			                           +'<td></td>'
			                        +'</tr>'
			                     +'</tbody>'
			                  +'</table>'
	               		+'</div>'
	            +'</div>'
	         +'</div>'
	      +'</div>';
	      $('#load_booking_data').append(component);
	      num++;
        });
        //*/
	});
</script>