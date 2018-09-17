console.log("Bank Page");
function addBank(){
	 fn.pushPage({
        'id': 'popup1.html',
        'title': 'เพิ่มข้อมูลบัญชี'
    }, 'lift-ios')
    var url = "page/call_page";
    $.post(url, {
        path: "bank/bank_add"
    }, function(ele) {
        $('#body_popup1').html(ele);
    });
}
function selectBankList(id) {
    console.log(id);
    var txt = $('#item_bank_list_' + id).data('name');
    /*$('#img_plate_color_show').attr('src', "assets/images/car/plate/" + img);*/
    $('#bank').val(id);
    $('#txt_bank').text(txt);
    /*$('#plate_color_txt').val(val);
    $('#txt_plate_color').text(val);
    $('#img_plate_color_show').show();*/
    $('ons-back-button').click();
}