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

    $.post("page/call_page?date=" + val, {
        path: "statement/trans_ic"
    }, function(ele) {
        $('#trans_ic').html(ele);
    });

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

function renderTransferJob(){
	var date = $('#date_trans_ic').val();
	var param = {
    driver: $.cookie("detect_user"),
    date: '2018-09-20',
    driver_checkcar: 0
};
console.log(param);
$.ajax({
    url: "api/transfer_hisorty", // point to server-side PHP script 
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