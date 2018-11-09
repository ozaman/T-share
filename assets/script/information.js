function openDetailInfo(id, topic) {
  
  $.ajax({
    url: "information/query_info?id=" + id,
    dataType: 'json',
    type: 'post',
    success: function (data) {
      makeReadInformation(id);
      $('#body_modal_info').html(data.s_detail);
      welcom_modal.show({animation: 'fade'});
    }
  });
}

function makeReadInformation(id) {
  
    var data = {
        i_active: 1
    };
    $.ajax({
        url: "information/read_info?id=" + id, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        type: 'post',
        data: data,
        success: function(res) {
            console.log(res);
            if (res.read_user.result == true) {
                $('.list_info_'+id).css('background-color','#fff');
                $('#tr_icon_read_'+id).hide();
                countReadInformation(id);
            }
        }
    });
}

function countReadInformation(id){
  $.ajax({
        url: "information/count_info?id=" + id, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        type: 'post',
        success: function(res) {
            console.log(res);
//            alert(res);
            $('#num_read_all_'+id).text(res);
          }
    });
}

function viewReaderList(id){
  fn.pushPage({
        'id': 'popup1.html',
        'title': 'ผู้อ่านข่าวนี้'
    }, 'lift-ios');
    $.post("page/call_page?id="+id, {
        path: "page/info_reader_list"
    }, function(ele) {
        $('#body_popup1').html(ele);
    });
}

function searchTopicInfo(txt_ip){
//		console.log(txt_ip);
	  	$('.txt_topic').each(function() {
			var txt_name = $(this).text();
			var row_id = $(this).attr('role');
            
			 if (txt_name.toUpperCase().indexOf(txt_ip.toUpperCase()) > -1) {
		       	$('.list_info_'+row_id).show();
                console.log(txt_name+" || "+txt_ip);
		      } else {
		        $('.list_info_'+row_id).hide();
		      }
		});
}