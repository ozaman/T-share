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
    var it_works = false;

$.ajax({
  type: "POST",
  url: 'chat/search_user?id=153',
  success: function (data) {
    it_works = true;
  }, 
  async: false // <- this turns it into synchronous
});

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
        roomsf = [164,153,472];
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
                        textomline += '<table "width="100%">'
                            +'<tr>'
                            +'<td width="50">'
                        +'<div class="online_ser" id="online_ser_'+res.id+'" onclick="switchRoom('+res.id+')" >'
                        +'<img src="../data/pic/driver/small/'+img+'.jpg?v=1541241764"  class="online_ser_img">'
                        +'<div class="boll_online_ser " id="boll_online_ser_'+res.id+'"></div>'
                        // +'<span class=" " id="'+res.name+'"></span>'
                        +'</div>'
                            +'</td>'
                            +'<td width="100%"><div class=" " id="" style="display:inline-block"><span>'+res.name+'</span></div>'
                             +'<div class="_5bon"><div class="_568z"><div class="_568-"></div><span aria-label="กำลังใช้งานอยู่" style="background: rgb(66, 183, 42); border-radius: 50%; display: inline-block; height: 6px; margin-left: 4px; width: 6px;"></span></div></div></td>'
                            +'</tr>'
                            +'</table>';

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
                            textomline += '<table "width="100%">'
                            +'<tr>'
                            +'<td width="50">'
                            +'<div class="default_ser" id="online_ser_'+res.id+'" onclick="switchRoom('+res.id+')" >'
                            +'<img src="../data/pic/driver/small/'+img+'.jpg?v=1541241764"  class="online_ser_img">'
                            +'<div class="boll_ofline_ser " id="boll_online_ser_'+res.id+'"></div>'

                            +'</div>'
                            +'</td>'
                            +'<td width="100%"><div class=" " id="" style="display:inline-block"><span>'+res.name+'</span></div>'
                            +'<div class="_5bon"><div class="_568z"><div class="_568-"></div><span aria-label="กำลังใช้งานอยู่" style="background: #FF9800; border-radius: 50%; display: inline-block; height: 6px; margin-left: 4px; width: 6px;"></span></div></div></td>'
                            +'</tr>'
                            +'</table>';
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
    function chat_gallery_items(item) {
        console.log(item)
        var imgSrc = item.src,
        highResolutionImage = $(this).data('high-res-img');

        viewer.show(imgSrc, highResolutionImage);
    }
    function image (from, base64Image) {
        console.log(from)
        console.log(base64Image)
        $('#lines').append($('<p>').append($('<b>').text(from), '<img src="' + base64Image + '"/>'));
    }
    function switchRoom(room){
        console.log(room)
         modal.show();
    fn.pushPage({
        'id': 'chatroom.html',
        'title': ''
    }, 'lift-ios');
    //  $('#body_popup1').html(progress_circle);

    $.post("chat/chatroom?room=" + room, function(ele) {
        modal.hide();
        $('#boby_chatroom').html(ele);
 socket2.emit('switchRoom', room);

        //        console.log(array_rooms);
    });
       
    }


</script>
<style>
/*FF9800,32bf38*/
.default_ser{
	width: 45px;
	height: 45px;
	display: inline-block;
	/*border: 1px solid #FF9800;*/
	margin: 5px 3px;
	padding: 3px;
	border-radius: 50px;
}
.online_ser{
	width: 45px;
	height: 45px;
	display: inline-block;
	/*display: inline-block;*/
	/*border: 2px solid #32bf38;*/
	margin: 5px 3px;
	padding: 3px;
	border-radius: 50px;
}
.ofline_ser{
	width: 45px;
	height: 45px;
	display: inline-block;
	/*border: 2px solid #FF9800;*/
	margin: 5px 3px;
	padding: 3px;
	border-radius: 50px;
}
.boll_online_ser{
	    width: 13px;
    height: 13px;
    background: #32bf38;
    border-radius: 50px;
    position: relative;
    margin-top: -11px;
    margin-left: 25px;
}
.boll_ofline_ser{
	    width: 13px;
    height: 13px;
    background: #FF9800;
    border-radius: 50px;
    position: relative;
    margin-top: -11px;
    margin-left: 25px;
}
.online_ser_img{
	width: 100%;
	height: 100%;
	border-radius: 50px;

}
._5bon {
    float: right;
    line-height: 32px;
    margin: 0 1px 0 4px;
    text-align: right;
}

.shopee-chat-root .ic_block{background-position:-17px 0;width:16px;height:16px}
.shopee-chat-root .ic_chat{background-position:0 -34px;width:28px;height:28px}
.shopee-chat-root .ic_emoji{background-position:-51px -21px;width:20px;height:20px}
.shopee-chat-root .ic_emoji.active,.shopee-chat-root .ic_emoji_click{background-position:-51px 0;width:20px;height:20px}
.shopee-chat-root .ic_model_close{background-position:-51px -42px;width:18px;height:18px}
.shopee-chat-root .ic_msg{background-position:-72px -19px;width:20px;height:20px}
.shopee-chat-root .ic_msg.active,.shopee-chat-root .ic_msg_click{background-position:-72px -59px;width:20px;height:20px}
.shopee-chat-root .ic_order{background-position:-34px 0;width:16px;height:19px}
.shopee-chat-root .ic_order.active,.shopee-chat-root .ic_order_click{background-position:-34px -37px;width:15px;height:18px}
.shopee-chat-root .ic_pic{background-position:-41px -63px;width:20px;height:18px}
.shopee-chat-root .ic_pic.active,.shopee-chat-root .ic_pic_click{background-position:0 -63px;width:20px;height:18px}
.shopee-chat-root .ic_product{background-position:-72px 0;width:20px;height:18px}
.shopee-chat-root .ic_product.active,.shopee-chat-root .ic_product_click{background-position:-72px -40px;width:20px;height:18px}
.shopee-chat-root .ic_report{background-position:0 0;width:16px;height:16px}
.shopee-chat-root .ic_user{background-position:-34px -20px;width:15px;height:16px}
.shopee-chat-root .webchat_close{background-position:-17px -17px;width:16px;height:16px}
.shopee-chat-root .webchat_search{background-position:0 -17px;width:16px;height:16px}
.shopee-chat-root .ic_block{background-position:-139px -138px}
.shopee-chat-root .ic_chat{background-position:0 0}
.shopee-chat-root .ic_emoji{background-position:-98px -74px}
.shopee-chat-root .ic_emoji.active,.shopee-chat-root .ic_emoji_click{background-position:0 -57px}
.shopee-chat-root .ic_model_close{background-position:-39px -135px}
.shopee-chat-root .ic_msg{background-position:-57px 0}
.shopee-chat-root .ic_msg.active,.shopee-chat-root .ic_msg_click{background-position:-57px -41px}
.shopee-chat-root .ic_order{background-position:-139px 0}
.shopee-chat-root .ic_order.active,.shopee-chat-root .ic_order_click{background-position:-76px -135px}
.shopee-chat-root .ic_pic{background-position:0 -98px}
.shopee-chat-root .ic_pic.active,.shopee-chat-root .ic_pic_click{background-position:-98px -37px}
.shopee-chat-root .ic_product{background-position:-98px 0}
.shopee-chat-root .ic_product.active,.shopee-chat-root .ic_product_click{background-position:-41px -98px}
.shopee-chat-root .ic_report{background-position:-139px -39px}
.shopee-chat-root .ic_user{background-position:-107px -135px}
.shopee-chat-root .webchat_close{background-position:-139px -72px}
.shopee-chat-root .webchat_search{background-position:-139px -105px}
.shopee-chat-root .webchat_search_black{background-position:0 -135px}}
.lm-container{overflow:hidden;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;-ms-flex-pack:center;justify-content:center;top:0;left:0;z-index:24}
.lf-overlay{top:0;left:0;background-color:#000;opacity:.5;z-index:23}
.lf-dialog{position:relative;border:0;width:100%;max-width:none;padding:0;margin-left:auto;margin-right:auto;background:0}@keyframes modal-fade{0%{opacity:0}100%{opacity:1}}
.TW .shopee-chat-root{font-family:'Source Sans Pro',"文泉驛正黑","WenQuanYi Zen Hei","Hiragino Sans GB","儷黑 Pro","LiHei Pro","Heiti TC","微軟正黑體","Microsoft JhengHei UI","Microsoft JhengHei",san-serif}
.shopee-chat-root,ul.context-menu-list{font-family:'Source Sans Pro','Helvetica Neue',Helvetica,RobotoRegular,'Droid Sans',Arial,sans-serif}ul.context-menu-list{position:absolute;display:block;list-style:none;background:#fff;padding:0;box-shadow:0 1px 2px rgba(0,0,0,.2)}ul.context-menu-list>li{cursor:pointer;font-size:12px;padding:13px 10px;border:1px solid transparent;width:100px}ul.context-menu-list>li:hover{background:#f5f5f5;border:1px solid #e8e8e8}
.shopee-chat-root{font-size:14px}
.shopee-chat-root *{box-sizing:border-box}
.shopee-chat-root a{text-decoration:none;color:#ff5722}
.shopee-chat-root .liquid-modal{display:none;transform:none!important;z-index:25;position:absolute;left:0;top:0;width:100%;height:100%}
.shopee-chat-root .liquid-modal--open{display:block;animation:modal-fade .25s ease-in-out}
.shopee-chat-root button,.shopee-chat-root input[type=button],.shopee-chat-root input[type=submit],.shopee-chat-root input[type=reset]{idth: 100%;
	cursor: pointer;
	text-align: center;
	padding: 5px 13px;
	margin: 0px 0 0;
	border-radius: 4px;
	border: none;

	background:linear-gradient(#0076ff,#0076ff)}
	.shopee-chat-root button.shopee-chat__primary,.shopee-chat-root input[type=button].shopee-chat__primary,.shopee-chat-root input[type=submit].shopee-chat__primary,.shopee-chat-root input[type=reset].shopee-chat__primary{color:#fff;background:#0076ff}
	.shopee-chat-root button .disabled,.shopee-chat-root button:disabled,.shopee-chat-root input[type=button] .disabled,.shopee-chat-root input[type=button]:disabled,.shopee-chat-root input[type=submit] .disabled,.shopee-chat-root input[type=submit]:disabled,.shopee-chat-root input[type=reset] .disabled,.shopee-chat-root input[type=reset]:disabled{background:#a6a6a6!important}
	.shopee-chat-root hr{margin:0;padding:0}
	.shopee-chat-root .text-left{text-align:left}
	.shopee-chat-root .text-center{text-align:center}
	.shopee-chat-root .text-right{text-align:right}
	.shopee-chat-root .shopee-chat-tabs{height:30px;display:-ms-flexbox;display:flex;border-bottom:1px solid #eaeaea}
	.shopee-chat-root .shopee-chat-tabs__tab{text-align:center;line-height:30px;height:30px;-ms-flex:1;flex:1}
	.shopee-chat-root .shopee-chat-tabs__tab--active{border-bottom:2px solid #00bfa5;color:#00bfa5}
	.shopee-chat-root .shopee-chat-no-unread{-ms-flex:1;flex:1;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;-ms-flex-pack:center;justify-content:center;-ms-flex-align:center;align-items:center;color:#aaa}
	.shopee-chat-root .shopee-chat-no-unread img{margin-bottom:10px}
	.shopee-chat-root .shopee-chat-button-group button,.shopee-chat-root .shopee-chat-button-group input[type=button],.shopee-chat-root .shopee-chat-button-group input[type=submit],.shopee-chat-root .shopee-chat-button-group input[type=reset]{display:block;width:100%;border-radius:0;padding:.8em 0;margin:0;background:#fff;color:#ff5722}
	.shopee-chat-root .shopee-chat-button-group>*+*{border-left:1px solid transparent}
	.shopee-chat-root .shopee-chat__scrollable{max-height:100%;overflow:auto}
	.shopee-chat-root .lf-overlay,.shopee-chat-root .lm-container{position:absolute}
	.shopee-chat-root .lf-dialog{border:0;border-radius:8px;box-shadow:0 1.6rem 3.2rem rgba(0,0,0,.09);max-width:none;padding:0;width:286px;overflow:hidden;background:#fff}
	.shopee-chat-root .lf-dialog .center{text-align:center}
	.shopee-chat-root .lf-dialog .lm-title{width:100%;height:38px;line-height:38px;padding:0 16px;border-bottom:.1rem solid #e8e8e8;font-size:16px;text-align:center;color:#ff5722}
	.shopee-chat-root .lf-dialog .lm-close{position:absolute;top:0;right:0;padding:10px}
	.shopee-chat-root .lf-dialog .lm-content{padding:10px}
	.shopee-chat-root .lf-dialog .lm-content .offer-product-model,.shopee-chat-root .lf-dialog .lm-content .offer-product-name{margin-bottom:5px;word-wrap:break-word;color:rgba(4,4,4,.87)}
	.shopee-chat-root .lf-dialog .lm-content .offer-product-model{color:rgba(0,0,0,.54)}
	.shopee-chat-root .lf-dialog .lm-actions button,.shopee-chat-root .lf-dialog .lm-content .offer-quantity{color:#ff5722}
	.shopee-chat-root .lf-dialog .lm-content .currency-symbol,.shopee-chat-root .lf-dialog .lm-content .offer-price{color:#ff5722;font-size:24px}
	.shopee-chat-root .lf-dialog .lm-content .shopee-chat__offer-button{float:none;height:36px!important;line-height:26px!important;display:block;width:90%;margin:0 auto}
	.shopee-chat-root .lf-dialog .lm-actions{width:100%;position:relative;z-index:0}
	.shopee-chat-root .shopee-chat__price-before{color:#bababa;text-decoration:line-through;margin-right:.5em}
	.shopee-chat-root .shopee-chat__price-after{color:#ff5722}
	.shopee-chat-root .shopee-chat__link{background:#fff;box-shadow:0 0 1px rgba(0,0,0,.3);height:80px}
	.shopee-chat-root .shopee-chat__link .shopee-chat__price{font-size:24px!important}
	.shopee-chat-root .no-stuff{margin-top:120px;text-align:center;line-height:2;color:rgba(0,0,0,.54)}
	.shopee-chat-root [data-ember-action]{cursor:pointer}
	.shopee-chat-root .link-offer{-ms-flex:0 0 45px;flex:0 0 45px;height:45px;line-height:40px;width:140px;padding-left:10px;background:#f1f1f1;border-top:1px solid #ddd}
	.shopee-chat-root .link-offer.active{background:#ff5722;color:#fff}
	.shopee-chat-root .shopee-chat-close-button{display:block;width:45px;height:35px;line-height:35px;position:absolute;color:#fff;right:0;top:0;text-align:center;padding:17px 16.5px}
	.shopee-chat-root .shopee-chat-close-button span{display:block;width:100%;height:0;border-top:1px solid #fff}
	.shopee-chat-root .shopee-chat-header-text{display:block;width:300px;color:#fff;height:35px;line-height:35px;text-align:center;font-size:18px;margin:0 auto}
	.shopee-chat-root .arrow-down{display:inline-block;position:relative;top:-2px;width:0;height:0;border-left:5px solid transparent;border-right:5px solid transparent;border-top:5px solid #fff;transition:transform .35s ease}
	.shopee-chat-root .arrow-down.active{transform:rotate(180deg)}
	.shopee-chat-root .header-search{width:119px;color:#fff;margin:5px 0 0 10px}
	.shopee-chat-root .header-search.chat-input input{border:none;background:#029e89}
	.shopee-chat-root .header-search.chat-input input::-webkit-input-placeholder{color:#fff}
	.shopee-chat-root .header-search.chat-input input::-moz-placeholder{color:#fff}
	.shopee-chat-root .header-search.chat-input input:-moz-placeholder{color:#fff}
	.shopee-chat-root .header-search.chat-input input:-ms-input-placeholder{color:#fff}
	.shopee-chat-root .shopee-chat__order-item{background:#fff;width:100%;margin-bottom:5px;color:#000;overflow:hidden;cursor:default!important}
	.shopee-chat-root .shopee-chat__order-item .shopee-chat__order-info{padding:0 10px}
	.shopee-chat-root .shopee-chat__order-item .shopee-chat__order-info .shopee-chat__status{line-height:30px}
	.shopee-chat-root .shopee-chat__order-item .shopee-chat__order-footer{padding:8px 10px;color:#757575}
	.shopee-chat-root .shopee-chat__order-item .shopee-chat__status{color:#ff5722;font-size:16px}
	.shopee-chat-root .shopee-chat__order-item+.shopee-chat-button-group{margin-bottom:1.5em}
	.shopee-chat-root .shopee-chat__order-item hr{border:0;height:1px;background:#f0f0f0}
	.shopee-chat-root .shopee-chat__unavailable-msg{background:#fff;width:auto;margin:10px 10px 0;padding:1.3em 0;text-align:center;color:#21211d}
	.shopee-chat-root .popover-button{float:left;width:50px;text-align:center;color:#000;color:rgba(0,0,0,.6);margin:0 8px}
	.shopee-chat-root .popover-button,.shopee-chat-root .popover-button-inner{font-size:10px}
	.shopee-chat-root .popover-button-inner.disabled,.shopee-chat-root .popover-button.disabled{opacity:.5;pointer-events:none}
	.shopee-chat-root .popover-button-inner>.ic,.shopee-chat-root .popover-button>.ic{height:19px;display:block;margin:0 auto}
	.shopee-chat-root .popup-parent{display:inline-block;position:relative}
	.shopee-chat-root .popup-parent hr{position:relative;background:#eee;border:0;height:1px;left:-1000px;width:3000px}
	.shopee-chat-root .popup-parent>.shopee-chat-popover{position:absolute;font-size:14px;border:1px solid #ddd;box-shadow:0 2px 2px rgba(0,0,0,.15);border-radius:4px;width:370px;height:400px;bottom:calc(100% + 10px);left:50%;margin-left:-185px;z-index:9999999}
	.shopee-chat-root .popup-parent>.shopee-chat-popover:after,.shopee-chat-root .popup-parent>.shopee-chat-popover:before{top:100%;left:50%;border:solid transparent;content:" ";height:0;width:0;position:absolute;pointer-events:none}
	.shopee-chat-root .popup-parent>.shopee-chat-popover:after{border-color:rgba(240,240,240,0);border-top-color:#f0f0f0;border-width:10px;margin-left:-10px}
	.shopee-chat-root .popup-parent>.shopee-chat-popover:before{border-color:rgba(221,221,221,0);border-top-color:#ddd;border-width:11px;margin-left:-11px}
	.shopee-chat-root .popup-parent>.shopee-chat-popover.order-popup{background:#f0f0f0}
	.shopee-chat-root .popup-parent>.shopee-chat-popover.order-popup .shopee-chat__popup-tabs{border-bottom:1px solid #f0f0f0}
	.shopee-chat-root .popup-parent .popup-child{width:370px;height:400px;border-radius:4px;overflow:hidden}
	.shopee-chat-root .shopee-chat-container{display:block;overflow:hidden;box-shadow:0 -2px 10px rgba(0,0,0,.25);border-radius:8px 8px 0 0}
	.shopee-chat-root .shopee-chat-container.collapsed{background:#00bfa5;text-align:center;width:100px;height:50px;line-height:50px;right:0;bottom:0;border-left:1px solid #00a68f;border-right:1px solid #00a68f;color:#fff}
	.shopee-chat-root .shopee-chat-container.expanded{background:#eee;right:0;bottom:0}
	.shopee-chat-root .shopee-chat__offer-button{cursor:pointer;text-align:center;border:1px solid #ff5722;margin-left:1px;float:right;padding:6px 10px;border-radius:4px;color:#ff5722;line-height:1em}
	.shopee-chat-root .shopee-chat__offer-button.reject{border:1px solid #000;color:#000}
	.shopee-chat-root .shopee-chat__offer-button+.shopee-chat__offer-button{margin-right:5px}
	.shopee-chat-root .chat-menu{top:35px;position:absolute;background:#fff;z-index:9999;width:calc(100% - 140px);box-shadow:0 1px 2px rgba(0,0,0,.05)}
	.shopee-chat-root .scam-alert{background:#fffaeb;border:1px solid #feecb6;position:relative;z-index:1;height:48px;display:-ms-flexbox;display:flex;-ms-flex-pack:distribute;justify-content:space-around;padding:4px 0;-ms-flex-align:center;align-items:center}
	.shopee-chat-root .scam-alert__text{font-size:12px;color:#67541F}
	.shopee-chat-root .scam-alert__close{padding:10px}
	.shopee-chat-root .badge{display:inline-block;background:#ff5722;color:#fff;height:20px;line-height:20px;padding:0 4px;min-width:20px;border-radius:3rem;text-align:center;opacity:0;font-size:12px}
	.shopee-chat-root .badge.active{opacity:1}
	.shopee-chat-root .buddy-list{
		position:absolute;overflow:hidden;width:0px;top:0;bottom:0;left:0;background:#fff;z-index:1;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column
	}
	.shopee-chat-root .buddy-list .list{position:relative;overflow:hidden;-ms-flex:1;flex:1;border-right:1px solid #ddd;border-left:1px solid #ddd;display:-ms-flexbox;display:flex}
	.shopee-chat-root .buddy-list .list>.ember-view>.ember-view{right:-17px!important}
	.shopee-chat-root .conversation-window{position:absolute;overflow:hidden;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;height:100%;background:#f6f6f6;top:0;left:0;right:0;padding-left:0px}
	.shopee-chat-root .chat-header{background: #ffffff;
		-ms-flex: 0 0 35px;
		flex: 0 0 50px;
		height: 57px;
		width: 100%;
		/* border-right: 1px solid #00ab93; */
	/* border-top: 1px solid #00ab93; */}
	.shopee-chat-root .chat-header.first{border-left:1px solid #00ab93}
	.shopee-chat-root .chat-content{-ms-flex:1;flex:1;padding:5px;overflow-y:auto;overflow-x:hidden}
	.shopee-chat-root .chat-panel{-ms-flex:0 0 125px;flex:0 0 65px;/*height:125px;*/border-top:1px solid #e8e8e8}
	.shopee-chat-root .chat-panel textarea{display:block;width:100%;outline:0;border:0;padding:10px;resize:none}
	.shopee-chat-root .chat-input:after,.shopee-chat-root .clearfix:after,.shopee-chat-root .shopee-chat-grid:after{display:table;content:'';clear:both}
	.shopee-chat-root .chat-panel textarea::-webkit-input-placeholder{color:#bababa}
	.shopee-chat-root .chat-panel textarea::-moz-placeholder{color:#bababa}
	.shopee-chat-root .chat-panel textarea:-ms-input-placeholder{color:#bababa}
	.shopee-chat-root .chat-panel textarea:-moz-placeholder{color:#bababa}
	.shopee-chat-root .chat-panel .chat-toolbar{    bottom: 6px;
		/* padding: 9px; */
		position: absolute;
		width: 100%;
		/* height: 45px; */
		/* padding: 4px 10px 6px 5px; */
	/* background: #fff; */}
	.shopee-chat-root .chat-section-header{margin:20px 10px 0;color:#757575}
	.shopee-chat-root .divider{width:100%;height:24px;position:relative;text-align:center}
	.shopee-chat-root .divider .line{position:absolute;left:0;top:0;width:100%;height:12px;border-bottom:.1rem solid #e8e8e8}
	.shopee-chat-root .divider .label{position:relative;padding:0 1rem;color:#bababa;height:24px;line-height:24px;background-color:#fafafa;z-index:2}
	.shopee-chat-root .clearfix .left{float:left}
	.shopee-chat-root .clearfix .right{float:right}
	.shopee-chat-root .shopee-chat-grid>[class*=col-]{float:left;margin-left:0;margin-right:0}
	.shopee-chat-root .shopee-chat-grid>[class*=col-].right{float:right}
	.shopee-chat-root .shopee-chat-grid.with-gap{width:auto;margin-left:-16px;margin-right:-16px}
	.shopee-chat-root .shopee-chat-grid.with-gap>[class*=col-]{padding-left:16px;padding-right:16px}
	.shopee-chat-root .col-16{width:100%!important}
	.shopee-chat-root .col-15{width:93.75%!important}
	.shopee-chat-root .col-14{width:87.5%!important}
	.shopee-chat-root .col-13{width:81.25%!important}
	.shopee-chat-root .col-12{width:75%!important}
	.shopee-chat-root .col-11{width:68.75%!important}
	.shopee-chat-root .col-10{width:62.5%!important}
	.shopee-chat-root .col-9{width:56.25%!important}
	.shopee-chat-root .col-8{width:50%!important}
	.shopee-chat-root .col-7{width:43.75%!important}
	.shopee-chat-root .col-6{width:37.5%!important}
	.shopee-chat-root .col-5{width:31.25%!important}
	.shopee-chat-root .col-4{width:25%!important}
	.shopee-chat-root .col-3{width:18.75%!important}
	.shopee-chat-root .col-2{width:12.5%!important}
	.shopee-chat-root .col-1{width:6.25%!important}
	.shopee-chat-root .chat-input{overflow:hidden;position:relative}
	.shopee-chat-root .chat-input .chat-input-prefix{height:25px;line-height:25px;vertical-align:middle;margin:0 0 0 10px;position:absolute;top:0;left:0}
	.shopee-chat-root .chat-input .chat-input-prefix .ic{margin:4px 0}
	.shopee-chat-root .chat-input input,.shopee-chat-root .chat-input textarea{width:100%;height:25px;-webkit-appearance:none;-moz-appearance:none;appearance:none;display:block;padding:0 8px 0 30px;border-radius:100px;outline:0;border:1px solid #ddd}
	.shopee-chat-root .chat-input input::-webkit-input-placeholder,.shopee-chat-root .chat-input textarea::-webkit-input-placeholder{color:#C4BABA}
	.shopee-chat-root .chat-input input::-moz-placeholder,.shopee-chat-root .chat-input textarea::-moz-placeholder{color:#C4BABA}
	.shopee-chat-root .chat-input input:-moz-placeholder,.shopee-chat-root .chat-input textarea:-moz-placeholder{color:#C4BABA}
	.shopee-chat-root .chat-input input:-ms-input-placeholder,.shopee-chat-root .chat-input textarea:-ms-input-placeholder{color:#C4BABA}
	.shopee-chat__popup-tabs{margin:0;padding:0;list-style:none;width:100%;background:#fff}
	.shopee-chat__popup-tabs:after{content:'';display:table;clear:both}
	.shopee-chat__popup-tabs>li{float:left;height:38px;border-bottom:2px solid transparent;line-height:38px}
	.shopee-chat__popup-tabs>li.active{color:#ff5722;border-bottom-color:#ff5722}
	.shopee-chat__user{height:30px;line-height:30px;color:#757575}
	.shopee-chat__user img{display:inline-block;width:20px;height:20px;border-radius:100%;overflow:hidden;margin:0 5px 0 0;vertical-align:middle}
	.shopee-chat-root .chat-message{padding:10px 0}
	.shopee-chat-root .chat-message .avatar{width:37px;height:37px;border-radius:100%;overflow:hidden}
	.shopee-chat-root .chat-message .avatar img{width:100%}
	.shopee-chat-root .chat-message .shopee-chat-message-failed{position:absolute;left:-24px;top:0;width:16px;height:16px;border-radius:50%;background:#ff5722;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;-ms-flex-align:center;align-items:center;-ms-flex-pack:center;justify-content:center}
	.shopee-chat-root .chat-message .shopee-chat-message-failed__exmark-1{width:2px;height:6px;background:#fff}
	.shopee-chat-root .chat-message .shopee-chat-message-failed__exmark-2{width:2px;height:2px;border-radius:50%;background:#fff;margin-top:2px}
	.shopee-chat-root .chat-message .message-content{text-align:right;padding-right:10px;position:relative}
	.shopee-chat-root .chat-message .message-content .sticker-bubble{position:relative;display:inline-block}
	.shopee-chat-root .chat-message .message-content .response-grid{height:26px;line-height:26px;text-align:left;color:#fff;background:#ff5722;padding-left:10px;font-size:12px}
	.shopee-chat-root .chat-message .message-content .response-grid.status-3,.shopee-chat-root .chat-message .message-content .response-grid.status-4{background:#bcc5c2}
	.shopee-chat-root .chat-message .message-content .arrow{position:relative}
	.shopee-chat-root .chat-message .message-content .arrow:after{left:100%;right:0;top:10px;content:" ";height:0;width:0;position:absolute;pointer-events:none;border:6px solid rgba(255,255,255,0);border-left-color:#fff;border-right-color:rgba(255,255,255,0);z-index:2}
	.shopee-chat-root .chat-message .message-content.reverse{text-align:left;padding-left:20px;padding-right:0}
	.shopee-chat-root .chat-message .message-content.reverse .shopee-chat-message-failed{left:auto;right:-24px}
	.shopee-chat-root .chat-message .message-content.reverse .arrow:after{right:100%;left:0;border-left-color:rgba(255,255,255,0);border-right-color:#fff}
	.shopee-chat-root .chat-message .message-content .shopee-chat__product-item:not(.display-only):hover{background:#fff}
	.shopee-chat-root .chat-message .failed-message-detail__content{height:30px;margin:0 2px;padding:0 4px;border-radius:4px;background-color:#ddd;display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;color:#686868;font-size:12px}
	.shopee-chat-root .chat-message .failed-message-detail__content--non-flex{height:auto;display:block;padding:10px}
	.shopee-chat-root .chat-message .failed-message-detail .shopee-chat-message-failed{position:static;background:#fff;margin-right:8px}
	.shopee-chat-root .chat-message .failed-message-detail .shopee-chat-message-failed__exmark-1,.shopee-chat-root .chat-message .failed-message-detail .shopee-chat-message-failed__exmark-2{background:#00bfa5}
	.shopee-chat-root .chat-message .offer-bubble{display:inline-block;width:260px;border-radius:8px;position:relative;text-align:left;float:none!important;background:#fff;clear:both;box-shadow:0 1px 1px rgba(0,0,0,.1)}
	.shopee-chat-root .chat-message .overflow-wrapper{overflow:hidden}
	.shopee-chat-root .chat-message .chat-bubble,.shopee-chat-root .chat-message .image-bubble{display:inline-block;border-radius:8px;padding:8px 10px;float:none!important;box-shadow:0 1px 1px rgba(0,0,0,.1);max-width:320px;word-wrap:break-word;position:relative}
	.shopee-chat-root .chat-message .chat-bubble.to,.shopee-chat-root .chat-message .image-bubble.to{background:#00bfa5;text-align:left;color:#fff}
	.shopee-chat-root .chat-message .chat-bubble.from,.shopee-chat-root .chat-message .image-bubble.from,.shopee-chat-root .chat-message .image-bubble.to{background:#fff}
	.shopee-chat-root .chat-message .offer-product-name{white-space:nowrap;color:rgba(0,0,0,.87);overflow:hidden;text-overflow:ellipsis;height:16px;line-height:16px}
	.shopee-chat-root .chat-message .offer-price{color:#ff5722;height:16px;line-height:16px}
	.shopee-chat-root .chat-message .offer-price.status-2,.shopee-chat-root .chat-message .offer-price.status-3{color:rgba(0,0,0,.54)}
	.shopee-chat-root .chat-message .offer-status{color:#000}
	.shopee-chat-root .chat-message .status-2{color:#ff5722}
	.shopee-chat-root .chat-message .status-3,.shopee-chat-root .chat-message .status-4{color:rgba(0,0,0,.54)}
	.shopee-chat-root .chat-message .timestamp{color:#999;font-size:10px;margin:.5em 0}
	.shopee-chat__offer-status{position:absolute;right:12px;bottom:10px}
	.shopee-chat__offer-status.status-2{color:#ff5722}
	.shopee-chat__offer-status.status-3,.shopee-chat__offer-status.status-4{color:rgba(0,0,0,.54)}
	.shopee-chat__offer-overlay{position:absolute;top:0;right:0;height:70px;width:300px;text-align:right;padding:10px 10px 0 0;background:linear-gradient(to right,rgba(255,255,255,0) 0,#fff 50%)}
	.shopee-chat__offer-overlay .shopee-chat__offer-quantity{color:#ff5722;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;padding:0 0 5px}
	.shopee-chat__offer-overlay .shopee-chat__offer-quantity .shopee-chat__offer-price{font-size:16px}
	.shopee-chat__offer-item{background:#fff;width:auto;margin:10px 10px 0;outline:#f0f0f0 solid 1px;position:relative}
	.shopee-chat__offer-item hr{border:0;height:1px;background:#f0f0f0;margin:0}
	.shopee-chat__offer-item .shopee-chat__user{padding:0 10px}
	.shopee-chat__product-item{width:100%;min-height:70px;padding:10px;text-align:left}
	.shopee-chat__product-item:after{content:'';display:table;clear:both}
	.shopee-chat__product-item:not(.display-only):hover{background:#ffeaea;cursor:pointer}
	.shopee-chat__product-item .shopee-chat__image{float:left;width:50px;height:50px;margin-right:10px;background-repeat:no-repeat;background-position:center;background-size:contain;border:1px solid #e8e8e8;border-radius:2px}
	.shopee-chat__product-item .shopee-chat__image+.shopee-chat__info{padding-left:60px}
	.shopee-chat__product-item .shopee-chat__info{float:none;display:block}
	.shopee-chat__product-item .shopee-chat__name{display:block;width:100%}
	.shopee-chat__product-item .shopee-chat__price{color:#ff5722}
	.shopee-chat__product-item--greyout .shopee-chat__price,.shopee-chat__product-item--greyout .shopee-chat__price-after{color:#595959}
	.shopee-chat__product-item--greyout .shopee-chat__image,.shopee-chat__product-item--greyout .shopee-chat__name,.shopee-chat__product-item--greyout .shopee-chat__price{opacity:.5}
	.shopee-chat__product-status-label{float:right;background:#7A8A88;color:#fff;text-align:center;padding:2px 8px;border-radius:20px}
	.shopee-chat-popover.product-popup{background:#fff}
	.shopee-chat-popover.product-popup .shopee-chat__product-item{border-bottom:1px solid rgba(0,0,0,.09)}
	.shopee-chat-popover.product-popup .shopee-chat__price{font-size:12px}
	.shopee-chat-popover.product-popup .shopee-chat__info .shopee-chat__name span:hover{text-decoration:underline}
	.shopee-chat-popover.product-popup hr{margin:0}
	.shopee-chat-popover.product-popup .shopee-chat__popup-tabs>li{width:33.33%}
	.shopee-chat-popover.product-popup .product-panel{padding:10px 10px 0}
	.shopee-chat-popover.product-popup .product-panel:after{content:'';display:table;clear:both}
	.shopee-chat-popover.product-popup .product-panel .select{float:right;position:relative}
	.shopee-chat-popover.product-popup .product-panel .select:after{content:'';position:absolute;top:50%;right:10px;width:0;height:0;border-width:6px 4px;border-color:#ff5722 transparent transparent;border-style:solid;margin:-2px 0 0}
	.shopee-chat-popover.product-popup .product-panel select{-webkit-appearance:none;-moz-appearance:none;appearance:none;height:25px;border-radius:0 100px 100px 0;border:1px solid #ddd;outline:0;padding-left:15px;width:100px;text-align:center;background:#fff}
	.shopee-chat-popover.product-popup .product-panel .chat-input-prefix,.shopee-chat-popover.product-popup .product-panel input{height:30px}
	.shopee-chat-popover.sticker-popup{background:#f8f8f8;margin-left:-20px!important;height:227px!important;width:375px!important}
	.shopee-chat-popover.sticker-popup--tab{height:263px!important}
	.shopee-chat-popover.sticker-popup .popup-child{height:auto!important}
	.shopee-chat-popover.sticker-popup:after,.shopee-chat-popover.sticker-popup:before{margin-left:-175px!important}
	.shopee-chat-popover.sticker-popup .sticker-panel{background:#fff;padding:10px}
	.shopee-chat-popover.sticker-popup .sticker-tabs{display:-ms-flexbox;display:flex;height:36px;width:100%}
	.shopee-chat-popover.sticker-popup .sticker-tab{display:-ms-flexbox;display:flex;width:60px;height:36px;-ms-flex-align:center;align-items:center;-ms-flex-pack:center;justify-content:center}
	.shopee-chat-popover.sticker-popup .sticker-tab:hover{background:#fbfbfb}
	.shopee-chat-popover.sticker-popup .sticker-tab.active{background:#fff}
	.shopee-chat-popover.sticker-popup .webchat-sticker{float:left;width:25%;height:78px}
	.shopee-chat-popover.sticker-popup .webchat-sticker-description{margin:2px 0 4px;font-size:10px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
	.shopee-chat-root .buddy-item{display:block;height:50px;line-height:50px;width:100%;text-decoration:none;transition:background .25s ease;color:grey;padding:0 4px;border-bottom:1px solid #efefef;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}
	.shopee-chat-root .buddy-item:after{content:'';display:table;clear:both}
	.shopee-chat-root .buddy-item .shopee-chat__avatar{float:left;width:30px;height:30px;position:relative;top:11px}
	.shopee-chat-root .buddy-item .shopee-chat__avatar img{display:block;border-radius:50%;overflow:hidden}
	.shopee-chat-root .buddy-item .shopee-chat__name{float:left;width:70%;margin-left:4px;text-overflow:ellipsis;overflow:hidden}
	.shopee-chat-root .buddy-item .shopee-chat__close{position:absolute;display:none;width:10px;height:10px;right:5px;top:-14px;font-size:10px}
	.shopee-chat-root .buddy-item.active{color:#fff;background:grey}
	.shopee-chat-root .buddy-item:hover:not(.active){background:#f5f5f5}
	.shopee-chat-root .buddy-item:hover .shopee-chat__close{display:block}
	.product-order-card{background:#fff;position:relative;box-shadow:0 1px 2px rgba(0,0,0,.12);margin:0 -15px}
	.product-order-card .shopee-chat__offer-button{position:absolute;bottom:10px;right:10px}
	.chat-window{
		display:-ms-flexbox;
		display:flex;
	-ms-flex-direction:column;
	flex-direction:column;
	-ms-flex:1;flex:1;min-height:1px;
	background: #ffffff;
}
	.filebutton input#imagefile {
		position: absolute;
		top: 0;
		right: 0;
		width: 50px;
		height: 100%;
		opacity: 0;
		margin: 0;
	}
	#send-message input {
		border: none;
		height: 40px;
		position: relative;
		font-size: 14px;
		color: #777;
		border-top: 1px solid #ddd;
		border-bottom: 1px solid #ddd;
		box-shadow: inset 0 2px 10px rgba(0, 0, 0, .1);
		padding: 0 10px;
		line-height: 30px;
		vertical-align: middle;
		width: 580px;
		z-index: 100;
	}

</style>