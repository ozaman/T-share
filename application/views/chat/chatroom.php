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
<div id="t-share-chat-embedded" style="z-index: 1000; position: fixeds; right: 10px; bottom: 0;" class="t-share-chat-root ember-application"><div id="ember306" class="ember-view">    
	<div class="t-share-chat-container expanded">

		<div class="conversation-window">
			
				<div id="ember549" class="chat-window ember-view"><!---->
					<div id="ember560" class="chat-content t-share-chat__scrollable chat-content ember-view" style="padding: 0px 25px;">
						<div class="t-share-chat__scrollable-inner">

							<!-- <div id="ember697" class="chat-message ember-view"><div class="t-share-chat-grid"> -->
								<div id="conversation"></div>
			



		</div>
	</div>
	<div class="chat-panel" data-ember-action="" data-ember-action-561="561">
		<!-- <textarea placeholder="พิมพ์ข้อความ" maxlength="5000" id="data" class="ember-text-area ember-view"></textarea> -->
		<div class="chat-toolbar">
			<div class="clearfix" style="    padding: 0 5px;">
          
            <table width="100%">
            	<tr>
            		<td>
            			<input type="test" class="form-control" placeholder="พิมพ์ข้อความ" maxlength="5000" id="data" class="ember-text-area ember-view" style="font-size: 16px;
            			width: 100%;
            			height: 38px;
            			padding: 0px 10px;
            			border: 1px solid #ccc;
            			border-radius: 5px;
            			">
            		</td>
            		<td valign="center"> 
            			<input  class="t-share-chat__primary" type="button" id="datasend" value="ส่ง" style="    cursor: pointer;
            			width: 40px;
            			text-align: center;
            			padding: 9px 13px;
            			margin: 0px 2px 0;
            			border-radius: 4px;
            			border: none;
            			background: linear-gradient(#0076ff,#0076ff);">
            			<!-- <button  class="t-share-chat__primary" id="datasend">ส่ง</button> -->
            			<!-- <i class="fa fa-paper-plane"  id="datasend" aria-hidden="true"></i> -->
            		</td>
            		<td valign="center"><div class="filebutton"><input type="file" id="imagefile" accept="image/*"><i class="fa fa-plus-square-o" style="margin: auto;
            		cursor: pointer;
            		/* width: 28px; */
            		text-align: center;
            		padding: 0 0;
            		margin: 0px 0 0;
            		border-radius: 4px;
            		border: none;
            		color: #9E9E9E;
            		font-size: 45px;
            		margin-top: 3px;
            		/* background: linear-gradient(#0076ff,#0076ff); */
            		"></i></div></td>
            	</tr>
            </table>
           <!--  <div class="right">
            	<input  class="t-share-chat__primary" type="button" id="datasend" value="send" />
            	<!-- <button data-ember-action="" data-ember-action-570="570">ส่ง</button>
            	</div> -->
            </div>
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
	
        socket2.emit('addroom', detect_user);

         
}, 50);
socket2.on('updateroom', function(rooms, current_room) {
        // $('#online_ser').remove()
        $('#user_tochat').empty();
        
        var roomlenght = rooms.length;
        var textomline = '';
        var ckroomuse = '<?=$_GET[room];?>'
        var chekhane = false;
        for (var i = 0; i < roomlenght; i++) {
            if (ckroomuse == rooms[i]) {
                chekhane == true;
                $.ajax({
                    url: 'chat/search_user?id='+rooms[i],
                    dataType: 'json',
                    type: 'POST',
                     // data: req,
                    success: function(res){
                        var img = res.username;
                        textomline = '<div><table "width="100%" >'
                            +'<tr>'
                            +'<td width="50">'
                        +'<div class=""  style="width: 30px; height: 30px;display: inline-block; margin: 3px 3px;    border-radius: 50px;"  >'
                        +'<img src="../data/pic/driver/small/'+img+'.jpg?v=1541241764"  class="online_ser_img">'
                        +'<div class="boll_online_user_room "></div>'
                        // +'<span class=" " id="'+res.name+'"></span>'
                        +'</div>'
                            +'</td>'
                            +'<td width="100%"><div class=" " id="" style="display:inline-block"><span style="font-size: 15px;color: #616161;">'+res.name+'</span></div>'
                             +'</td>'
                            +'</tr>'
                            +'</table></div>';
                    }
                    ,  async: false
                });


            }
          
        }
        if (chekhane == false) {
           
                    $.ajax({
                        url: 'chat/search_user?id='+ckroomuse,
                        dataType: 'json',
                        type: 'POST',
                        success: function(res){
                            var img = res.username;
                          
                            textomline = '<div><table "width="100%" >'
                            +'<tr>'
                            +'<td width="50">'
                            +'<div class="" style="width: 30px; height: 30px;display: inline-block; margin: 3px 3px;    border-radius: 50px;"  >'
                            +'<img src="../data/pic/driver/small/'+img+'.jpg?v=1541241764"  class="online_ser_img">'
                           +'<div class="boll_online_user_room "></div>'

                            +'</div>'
                            +'</td>'
                            +'<td width="100%"><div class=" " id="" style="display:inline-block"><span  style="display:inline-block"><span style="font-size: 15px;color: #616161;">'+res.name+'</span></div>'
                            +'</td>'
                            +'</tr>'
                            +'</table></div>';
                        }, async: false
                    });
            
        }



         $('#user_tochat').html(textomline);
    });

socket2.on('updatechat', function (username, data) {
        utc = '';
        utc = new Date().toLocaleString(); //'<?=date('Y-m-d H:i:s');?>'+' dsdsds'; //new Date().toJSON().slice(0,10).replace(/-/g,'/');

        console.log(username)
        console.log(detect_user)
        // if (username == 'SERVER') {


        //     msg = '<div id="ember726" class="chat-message ember-view">'
        //     +'<div class="t-share-chat-grid">'
        //     +'<div class="col-1">'
        //             // +'<span>'+res.nickname+'</span>'
        //             +'<div class="avatar">'

        //             +'<img src="<?=base_url();?>assets/images/service2.png?v=<?=time();?>" style="height: 37px;">'
        //             +'</div>'
        //             +'</div>'
        //             +'<div class="col-15 message-content reverse">'
        //             +'<div class="chat-bubble from">'
        //             +'<div class="overflow-wrapper">'
        //             +data
        //             +'</div>'
        //             +'</div>'
        //             +'<div class="timestamp">'
        //             + utc
        //             +'</div>'
        //             +'</div>'
        //             +'</div>'
        //             +'</div>';


            // $('#conversation').append(msg);
        // }
        // else{
            $.ajax({
            url: 'chat/search_user?id='+username, //Controller where search is performed
            dataType: 'json',
            type: 'POST',
            // data: req,
            success: function(res){
                console.log(res)
                img = res.username;
                if (username != detect_user) {


                    msg = '<div id="ember726" class="chat-message ember-view">'
                    +'<div class="t-share-chat-grid">'
                    +'<div class="col-1">'
                    // +'<span>'+res.nickname+'</span>'
                    +'<div class="avatar">'

                    +'<img src="../data/pic/driver/small/'+img+'.jpg" height="37">'
                    +'</div>'
                    +'</div>'
                    +'<div class="col-15 message-content reverse">'
                    +'<div class="chat-bubble from">'
                    +'<div class="overflow-wrapper">'
                    +data
                    +'</div>'
                    +'</div>'
                    +'<div class="timestamp">'
                    + utc
                    +'</div>'
                    +'</div>'
                    +'</div>'
                    +'</div>';
                }
                else{

                    msg = '<div id="ember728" class="chat-message ember-view">'
                    +'<div class="t-share-chat-grid">'
                    +'<div class="col-15 message-content ">'
                    + '<div class="chat-bubble to">'
                    +'<div class="overflow-wrapper">'
                    +data
                    +'</div>'
                    + '</div>'
                    +'<div class="timestamp">'
                    + utc
                    +'</div>'
                    +'</div>'
                    +'<div class="col-1">'
            // +'<span>'+res.nickname+'</span>'
            +'<div class="avatar">'
            
            +'<img src="../data/pic/driver/small/'+img+'.jpg">'
            +'</div>'
            +'</div>'
            +'</div>'
            +'</div>';
        }
        $('#conversation').append(msg);
        $('.t-share-chat-root').get(0).scrollTop = 10000000;

    }
});
        // }
        
        
        





        // $('#conversation').append('<b>'+username + ':</b> ' + data + '<br>');
    });
    socket2.on('come image', function (username, base64Image) {
        console.log(username)
        console.log(base64Image)
        utc = '';
        utc = new Date().toLocaleString(); //'<?=date('Y-m-d H:i:s');?>'+' dsdsds'; //new Date().toJSON().slice(0,10).replace(/-/g,'/');

        console.log(username)
        
        $.ajax({
            url: 'chat/search_user?id='+username, //Controller where search is performed
            dataType: 'json',
            type: 'POST',
            // data: req,
            success: function(res){
                console.log(res)
                msg = '';
                img = res.username;
                if (username != name) {


                    msg = '<div id="ember726" class="chat-message ember-view">'
                    +'<div class="t-share-chat-grid">'
                    +'<div class="col-1">'
                    // +'<span>'+res.nickname+'</span>'
                    +'<div class="avatar">'

                    +'<img src="../data/pic/driver/small/'+img+'.jpg" height="37">'
                    +'</div>'
                    +'</div>'
                    +'<div class="col-15 message-content reverse">'
                    +'<div class=" from">'
                    +'<div class="overflow-wrapper cf">'
                    +'<img class="chat_gallery_items" onclick="chat_gallery_items(this)"  src="' + base64Image + '" data-high-res-src="'+base64Image+'" alt="" style="width:150px; border-radius: 10px;pointer-events: auto;z-index:100;cursor:pointer">'
                    +'</div>'
                    +'</div>'
                    +'<div class="timestamp">'
                    + utc
                    +'</div>'
                    +'</div>'
                    +'</div>'
                    +'</div>';
                }
                else{

                    msg = '<div id="ember728" class="chat-message ember-view">'
                    +'<div class="t-share-chat-grid">'
                    +'<div class="col-15 message-content ">'
                    + '<div class=" to">'
                    +'<div class="overflow-wrapper cf">'
                    +'<img class="chat_gallery_items" onclick="chat_gallery_items(this)" src="' + base64Image + '" data-high-res-src="'+base64Image+'" alt="" style="width:150px; border-radius: 10px;pointer-events: auto;z-index:100;cursor:pointer"/>'
                    +'</div>'
                    + '</div>'
                    +'<div class="timestamp">'
                    + utc
                    +'</div>'
                    +'</div>'
                    +'<div class="col-1">'
            // +'<span>'+res.nickname+'</span>'
            +'<div class="avatar ">'
            
            +'<img src="../data/pic/driver/small/'+img+'.jpg" >'
            +'</div>'
            +'</div>'
            +'</div>'
            +'</div>';
        }
        $('#conversation').append(msg);
        $('.t-share-chat-root').get(0).scrollTop = 10000000;
    }
});
        

    });
 

    // on load of page
    var viewer = ImageViewer();
    $('.chat_gallery_items').click(function () {
        console.log('aaaaa')
        var imgSrc = this.src,
        highResolutionImage = $(this).data('high-res-img');

        viewer.show(imgSrc, highResolutionImage);
    });
    $(function(){
        
        // when the client clicks SEND
        $('#datasend').click( function() {
            var message = $('#data').val();
            if (message != '') {
                socket2.emit('sendchat', message);
                $('#data').val('');
            }
            
            // tell server to execute 'sendchat' and send along one parameter
            
        });

        // when the client hits ENTER on their keyboard
        $('#data').keypress(function(e) {
            if(e.which == 13) {
                $(this).blur();
                $('#datasend').focus().click();
            }
        });
        $('#imagefile').bind('change', function(e){
            var data = e.originalEvent.target.files[0];
            var reader = new FileReader();
            reader.onload = function(evt){
        // image('me', evt.target.result);

        socket2.emit('user image', evt.target.result);
    };
    reader.readAsDataURL(data);

});


    });

	

</script>
<style>
    .boll_online_user_room{
        width: 10px;
    height: 10px;
    background: #32bf38;
    border-radius: 50px;
    position: relative;
    margin-top: -12px;
    margin-left: 20px;
    }
</style>