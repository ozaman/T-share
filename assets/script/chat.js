function loadcontactChat() {
	// $('#shop_add').html(ele2);
            // var pass = {
            //     date: moment().format('YYYY-MM-DD'),
            //     driver: $.cookie("detect_user"),
            //     type: 'his'
            // };
            // console.log(pass);
            // var urlcounthis = ""
            $.ajax({
                url: "chat/contactChat",
                // data: pass,
                type: 'post',
                success: function(res) {
                    // console.log(res);
                    $('#body_contact').html(res)
                    // $('ons-tab[page="shop_history.html"]').attr('badge', res);
                }
            });
}


(function() {
 
    

    

  })();