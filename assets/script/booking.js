






function booking() {
  if(detect_user == 153 || detect_user == 164 || detect_user == 129){

  //    fn.pushPage({
  //   'id': 'transfer.html',
  //   'title': 'ให้บริการรถ',
  //   'key': 'transfer'
  // })
  
   fn.pushPage({
    'id': 'book_trans.html',
    'title': 'จองรถ',
    'key': 'book_trans'
  })
  // fn.pushPage({
  //       'id': 'booking.html',
  //       'title': 'ส่งแขก',
  //       'key': 'shop'
  //     })
  var url = "booking/index";
  // $('#check_open_worktbooking').val(1);
  $.post(url, function (html) {
    $('#body_booking').html(html);
  });
    
  }
  else{
    ons.notification.alert({
    message: 'ยังไม่เปิดให้บริการ',
    title: "ขอภัย",
    buttonLabel: "ตกลง"
  })
  .then(function () {});
  
    return false;
  }


  
  
}