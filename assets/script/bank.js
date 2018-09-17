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

function readURL(input, id, type) {
   
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {

            $('#pv_' + id).attr('src', e.target.result);

           /* var data = new FormData($('#form_addcar')[0]);
            data.append('fileUpload', $('#' + id)[0].files[0]);
            if (type == "add") {
                var param_id = $('#rand').val();
            } else {
                var param_id = $('#id_carall').val();
                $('#' + id + '_check_upload_' + num).val(1);
            }
            var url_upload = "application/views/upload_img/upload.php?id=" + param_id + "&type=car_img&num=" + num;
            console.log(url_upload);
            $.ajax({
                url: url_upload, // point to server-side PHP script 
                dataType: 'json', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: 'post',
                success: function(php_script_response) {
                    console.log(php_script_response);
                    $('#box_img_' + id).fadeIn(200);

                },
                error: function(e) {
                    console.log(e)
                }
            });*/
        }
        reader.readAsDataURL(input.files[0]);

    }

}