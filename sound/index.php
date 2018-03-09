 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="firefox=1,IE=edge,chrome=1">
  
</head>
<body>


<div style="position: relative; padding: 100px;">




 

 
</div>
 
 
<script src="sound/js/ion.sound.js"></script> 
 

 


<script>

 
$( document ).ready(function() {
 
        ion.sound({
            sounds: [
			////// alert chat
			  {name: "alert_msg_new"},
			  
			  
			  ////
			
			    {name: "inphone"},
			
                {name: "checkin"},
				  {name: "checkguest_new"},
				    {name: "checkguest_old"},
					 {name: "new_work"},
					  {name: "cancel_work"},
					  {name: "welcome"},
					  {name: "change_work"},
					  
					  ////////
					   {name: "register_new"},
					      {name: "taxi_work_new"},
					  ///
					  
 
					  
					  
                {name: "new"}
				
				
	 
				
            ],
            path: "sound/",
            preload: true,
			///ready_callback: true,
            volume: 5.0
        });
		
		 
		////// chat
		


        $("#play_checkin").on("click", function(){
		   ion.sound.play("checkin");
        });
        $("#play_checkguest_new").on("click", function(){
		   ion.sound.play("checkguest_new");
        });
		 $("#play_checkguest_old").on("click", function(){
		   ion.sound.play("checkguest_old");
        });
		 $("#play_new_work").on("click", function(){
		   ion.sound.play("new_work");
        });
		
		$("#play_cancel_work").on("click", function(){
		   ion.sound.play("cancel_work");
        });
		
		
 		 $("#play_change_work").on("click", function(){
		   ion.sound.play("change_work");
        });
 		 $("#play_new").on("click", function(){
		   ion.sound.play("new");
        }); 
		
		 $("#play_welcome").on("click", function(){
		   ion.sound.play("welcome");
        });
		
		$("#play_alert_msg_new").on("click", function(){
		   ion.sound.play("alert_msg_new");
        }); 
		
	 	$("#play_in_phone").on("click", function(){
			
					 
		   ion.sound.play("inphone");
        }); 
		
		

 
	
		//////////////	 taxi
		
		$("#play_register_new").on("click", function(){
		  ion.sound.play("register_new");
        });
		
 
		 $("#play_taxi_work_new").on("click", function(){
			 

		   ion.sound.play("taxi_work_new");
        });
		
		//////////////
		
		
	/// 	  ion.sound.play("taxi_work_new");
 
	});

</script>
 
 
<audio id="audio" src="sound/taxi_work_new.mp3" controls >
</audio>
<script type="text/javascript"> 
    window.onload = function() {
        var audioPlayer = document.getElementById("audio");
      //  audioPlayer.load();
      //  audioPlayer.play();
    };
    </script> 

 
 
 


 
<button id="play_checkin">checkin</button>
<button id="play_checkguest_new">checkguest_new</button>
<button id="play_checkguest_old">checkguest_old</button>
<button id="play_new_work">new_work</button>
<button id="play_cancel_work">cancel_work</button>
<button id="play_change_work">change_work</button>
<button id="play_welcome">welcome</button>
<button class="love" id="play_new">new</button>

<button class="love" id="play_alert_msg_new">chat new</button>
<button class="love" id="play_in_phone">chat phone</button>



<button class="love" id="play_register_new">สมัครคนขับใหม่</button>
<button class="love" id="play_taxi_work_new">งานแทกซี่ใหม่</button


 
></body>
</html>  
 