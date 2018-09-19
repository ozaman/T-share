filterDateShop($('#date_shop_ic').val());
function filterDateShop(val){
	console.log(val);
	
	$.post("page/call_page?date="+val,{ path: "statement/shop_ic" },function(ele){
    	$('#shop_ic').html(ele);
    });
	
}

function filterDateTrans(val){
	console.log(val);
	
	$.post("page/call_page?date="+val,{ path: "statement/trans_ic" },function(ele){
    	$('#trans_ic').html(ele);
    });
	
}

function openDetailOrder(id, invoice){
	fn.pushPage({
        'id': 'popup1.html',
        'title': 'รายละเอียดรายการ'
    }, 'lift-ios');
    
     /*$.post("shop/detail_shop_his",{ invoice: invoice},function(ele){
    	$('#body_popup1').html(ele);
    });*/
    $.post("page/call_page?order_id="+id,{ path: "statement/shop_ic_bill" },function(ele){
    	$('#body_popup1').html(ele);
    });
}