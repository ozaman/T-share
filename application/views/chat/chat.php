<!-- <script src="/socket.io/socket.io.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script> -->
<?php 
$_where = array();
$_where['id'] = $_COOKIE[detect_user];
// $_where['status'] = 1;
$user = $this->Main_model->rowdata(TBL_WEB_DRIVER,$_where);


?>

<div style="float:left;width:100px;border-right:1px solid black;height:300px;padding:10px;overflow:scroll-y;">
	<b>ROOMS</b>
	<div id="rooms"></div>
</div>
<!-- <div style="float:left;width:300px;height:250px;overflow:scroll-y;padding:10px;">
	
	<input id="data" style="width:200px;" />
	
</div> -->
<div id="shopee-chat-embedded" style="z-index: 1000; position: fixeds; right: 10px; bottom: 0;" class="shopee-chat-root ember-application"><div id="ember306" class="ember-view">    
	<div class="shopee-chat-container expanded">

		<div class="conversation-window">
			<!-- <div class="chat-header">

				<div class="user-menu ember-view" id="online_ser_me" >

					<div class="online_ser_me" style="width: 30px;
    height: 30px;
    /* display: inline-block; */
    border: 2px solid #32bf38;
    margin: 5px 3px;
    padding: 3px;
    border-radius: 50px;
    display: inline-block;">
						<img src="../data/pic/driver/small/<?=$user->username;?>.jpg?v=1541241764"  class="online_ser_img">
						<div class="boll_ofline_ser " id=""></div>
					</div>
					<span><?=$user->name;?></span>
				
					</div>
				</div> -->
				<div id="ember549" class="chat-window ember-view"><!---->
					<div id="ember560" class="chat-content shopee-chat__scrollable chat-content ember-view">
						<div class="shopee-chat__scrollable-inner">

							<!-- <div id="ember697" class="chat-message ember-view"><div class="shopee-chat-grid"> -->
								<div id="online_ser"></div>
				<!-- </div>
				</div> -->
			<!-- 	<div id="ember726" class="chat-message ember-view"><div class="shopee-chat-grid">
					<div class="col-1">
						<div class="avatar">
							<img src="//cf.shopee.co.th/file/a11f0af894b74bcd870ea8af4a36b2a7_tn" height="37">
						</div>
					</div>
					<div class="col-15 message-content reverse">
						<div class="chat-bubble from">
							<div class="overflow-wrapper">
								ได้รับสินค้าหรือยังครับ
							</div>
						</div>
						<div class="timestamp">
							09-02-2018 11:47
						</div>
					</div>
				</div>
			</div>

				<div id="ember728" class="chat-message ember-view">
					<div class="shopee-chat-grid">
						<div class="col-15 message-content ">
							<div class="chat-bubble to">
								<div class="overflow-wrapper">
									ได้รับเรียบร้อยแล้วครับ
								</div>
							</div>
							<div class="timestamp">
								09-02-2018 11:48
							</div>
						</div>
						<div class="col-1">
							<div class="avatar">
								<img src="//cf.shopee.co.th/file/8be478795103c875c924bdd65849615d_tn">
							</div>
						</div>
					</div>
				</div>
			-->




		</div>
	</div>
	
    <input type="file" multiple="" accept=".png,.jpg,.jpeg,.gif" style="display:none;"></div>
</div>
</div>
<div class="liquid-modal liquid-modal--closed">
	<div class="liquid-child">
		<div class="lm-container">
			<div role="dialog" class="lf-dialog">
				<!---->            </div>
			</div>
			<span class="lf-overlay"></span>
		</div>
	</div></div></div>
	<script>
setTimeout(function(){
	// socket2.on('connect', function(){
        // call the server-side function 'adduser' and send one parameter (value of prompt)
        // socket.emit('addroom', prompt("What's your name?"));
        socket2.emit('addroom', '<?=$_COOKIE[detect_user];?>');
          // $.ajax({
          //               url: 'chat/search_user?id='+'<?=$_COOKIE[detect_user];?>', 
          //               dataType: 'json',
          //               type: 'POST',
          //               success: function(res){
          //                   var img = res.username;
          //                   textomline = '<div class="default_ser" id="online_ser_'+res.id+'" onclick="switchRoom('+res.id+')" >'
          //                   +'<img src="../data/pic/driver/small/'+img+'.jpg?v=1541241764"  class="online_ser_img">'
          //                   +'<div class="boll_ofline_ser " id="boll_online_ser_'+res.id+'"></div>'
          //                   +'<div class="boll_ofline_ " id="boll_online_name'+res.name+'"></div>'
          //                   +'</div>';
          //                   $('#online_ser_me').append(textomline);
          //               }
          //           });
    // });
    // 
   

// Execution is BLOCKED until request finishes.

// it_works is available
// alert(it_works);
}, 1000);


    var ddd;
 // socket.on('user image', image);
    // listener, whenever the server emits 'updaterooms', this updates the room the client is in
    socket2.on('updateroom', function(rooms, current_room) {
        // $('#online_ser').remove()
        $('#online_ser').empty();
        var roomssli = [];
        var roomsf = [];
        console.log('****************** room *********************')
        console.log(rooms)
        var sunnumservice = 3;
        console.log(current_room)
        var roomlenght = rooms.length;
        console.log(roomlenght+'-----------roomlenght---------')
        roomsf = [164,153];
        // roomssli = [164,153,472];
        var numf =roomsf.length;
        console.log(roomsf.length+'------------roomsf.length------')
        // $('#rooms').empty();
        var textomline = '';


        for (var i = 0; i < sunnumservice; i++) {
            if (i<roomlenght) {

                $.ajax({
                    url: 'chat/search_user?id='+rooms[i],
                    dataType: 'json',
                    type: 'POST',
                     // data: req,
                    success: function(res){
                        var img = res.username;
                        textomline += '<div><table "width="100%" onclick="switchRoom('+res.id+')">'
                            +'<tr>'
                            +'<td width="50">'
                        +'<div class="online_ser" id="online_ser_'+res.id+'"  >'
                        +'<img src="../data/pic/driver/small/'+img+'.jpg?v=1541241764"  class="online_ser_img">'
                        +'<div class="boll_online_ser " id="boll_online_ser_'+res.id+'"></div>'
                        // +'<span class=" " id="'+res.name+'"></span>'
                        +'</div>'
                            +'</td>'
                            +'<td width="100%"><div class=" " id="" style="display:inline-block"><span>'+res.name+'</span></div>'
                             +'<div class="_5bon"><div class="_568z"><div class="_568-"></div><span aria-label="กำลังใช้งานอยู่" style="background: rgb(66, 183, 42); border-radius: 50%; display: inline-block; height: 6px; margin-left: 4px; width: 6px;"></span></div></div></td>'
                            +'</tr>'
                            +'</table></div>';

        // console.log(textomline)
         // $('#online_ser').html(textomline);



                    }
                    ,  async: false
                });


            }
            for (var x = 0; x < numf; x++) {
                // console.log(rooms[i] +'=='+ roomsf[x])
                if (parseInt(rooms[i]) == parseInt(roomsf[x])) {
                    var index = roomsf.indexOf(rooms[i]);
                    // console.log(index+'***index')
                    console.log('incase')
                    roomsf.splice(x, 1);
                }
            }
        }
        console.log('**********roomssli***********')
        var chkon = roomsf.length;
        console.log(chkon)
        console.log(roomsf)

        if (chkon != 0) {
            for (var x = 0; x < chkon; x++) {
                    $.ajax({
                        url: 'chat/search_user?id='+roomsf[x], 
                        dataType: 'json',
                        type: 'POST',
                        success: function(res){
                            var img = res.username;
                            ddd = res.username
                            textomline += '<div><table "width="100%" onclick="switchRoom('+res.id+')">'
                            +'<tr>'
                            +'<td width="50">'
                            +'<div class="default_ser" id="online_ser_'+res.id+'"  >'
                            +'<img src="../data/pic/driver/small/'+img+'.jpg?v=1541241764"  class="online_ser_img">'
                            +'<div class="boll_ofline_ser " id="boll_online_ser_'+res.id+'"></div>'

                            +'</div>'
                            +'</td>'
                            +'<td width="100%"><div class=" " id="" style="display:inline-block"><span>'+res.name+'</span></div>'
                            +'<div class="_5bon"><div class="_568z"><div class="_568-"></div><span aria-label="กำลังใช้งานอยู่" style="background: #FF9800; border-radius: 50%; display: inline-block; height: 6px; margin-left: 4px; width: 6px;"></span></div></div></td>'
                            +'</tr>'
                            +'</table></div>';
                           // calluser();
        // console.log(textomline)
                        }, async: false
                    });
            }
        }



         $('#online_ser').html(textomline);
    });

// function calluser() {
// 	alert(ddd)
// 	 // $('#online_ser').html(textomline);
// }
    


</script>
<style>


</style>