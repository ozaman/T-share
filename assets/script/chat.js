

function loadcontactChat() {


    $.ajax({
        url: 'chat/search_user?id='+detect_user,
        dataType: 'json',
        type: 'POST',

        success: function(res){
          if (res.s_service == 'service') {
fn.pushPage({
                'id': 'chatroom.html',
                'title': ''
            }, 'lift-ios');
    //  $('#body_popup1').html(progress_circle);

    $.post("chat/chatroom?room=" + detect_user, function(ele) {
        modal.hide();
        $('#boby_chatroom').html(ele);
        socket2.emit('switchRoom', room);

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

(function() {





})();