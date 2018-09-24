filterDateShop($('#date_shop_ic').val());

function filterDateShop(val) {
    console.log(val);

    $.post("page/call_page?date=" + val, {
        path: "statement/shop_ic"
    }, function(ele) {
        $('#shop_ic').html(ele);
    });

}

function filterDateTrans(val) {
    console.log(val);

    renderTransferJob();

}

function openDetailOrder(id, invoice) {
    fn.pushPage({
        'id': 'popup1.html',
        'title': 'รายละเอียดรายการ'
    }, 'lift-ios');

    /*$.post("shop/detail_shop_his",{ invoice: invoice},function(ele){
    	$('#body_popup1').html(ele);
    });*/
    $.post("page/call_page?order_id=" + id, {
        path: "statement/shop_ic_bill"
    }, function(ele) {
        $('#body_popup1').html(ele);
    });
}

function openDetailTrans(id, idorder) {
	console.log(id+" ||" +idorder);
    fn.pushPage({
        'id': 'popup1.html',
        'title': 'รายละเอียดรายการ'
    }, 'lift-ios');
	var param = {
		idorder : idorder
	};
	$.ajax({
    url: "api/transfer_booking_byid", // point to server-side PHP script 
    dataType: 'json', // what to expect back from the PHP script, if anything
    data: param,
    type: 'post',
    success: function(res) {
	       console.log(res);
	       if(res.status==200){
		   		 $.post("page/icome_trans_detail", {data : res.data.result[0]} , function(ele) {
			        $('#body_popup1').html(ele);
			    });
		   }
	    }
	});
}

function renderTransferJob(){
	var date = $('#date_trans_ic').val();
	var param = {
    driver: $.cookie("detect_user"),
    date: $('#date_trans_ic').val(),
    driver_checkcar: 0
};
console.log(param);
$.ajax({
    url: "api/transfer_booking", // point to server-side PHP script 
    dataType: 'json', // what to expect back from the PHP script, if anything
    data: param,
    type: 'post',
    success: function(res) {
       console.log(res);
       if(res.status==200){
	   		 $.post("page/icome_trans_list", {data : res.data.result} , function(ele) {
		        $('#trans_ic').html(ele);
		    });
	   }
    }
});
}