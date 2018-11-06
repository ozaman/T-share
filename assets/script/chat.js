

function loadcontactChat() {
console.log(detect_user)

    $.ajax({
        url: 'chat/search_user?id='+detect_user,
        dataType: 'json',
        type: 'POST',

        success: function(res){
          if (res.s_service == 'service') {
// fn.pushPage({
//                 'id': 'chatroom.html',
//                 'title': ''
//             }, 'lift-ios');
    //  $('#body_popup1').html(progress_circle);

    $.post("chat/chatroom?room=" + detect_user, function(ele) {
        modal.hide();
        $('#body_contact').html(ele);
        // socket2.emit('switchRoom', room);

        //        console.log(array_rooms);
    });
          }
          else{
            $.ajax({
                url: "chat/contactChat",

                type: 'post',
                success: function(res) {
                    // console.log(res);
                    $('#body_contact').html(res)
                    // $('ons-tab[page="shop_history.html"]').attr('badge', res);
                }
            });
        }


    }
    ,  async: false
});
	// $('#shop_add').html(ele2);
            // var pass = {
            //     date: moment().format('YYYY-MM-DD'),
            //     driver: $.cookie("detect_user"),
            //     type: 'his'
            // };
            // console.log(pass);
            // var urlcounthis = ""
            
        }
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
//        $('.page').animate({
   
//       scrollTop: $(document).height()+10000000
//     }, 500);
//     }
// });
$('.t-share-chat__scrollable').animate({
   
      scrollTop: 10000000
    }, 500);
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
        console.log($('').height())
// $('.page').animate({
   
//       scrollTop: $(document).height()+10000000
//     }, 500);
//     }
// });
$('.t-share-chat__scrollable').animate({
   
      scrollTop: 10000000
    }, 500);
    }
});
        

    });


(function() {




})();