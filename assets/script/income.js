filterMonth($('#month').val());
function filterMonth(val){
	console.log(val);
	
	$.post("page/call_page?date="+val,{ path: "statement/list_shop_ic" },function(ele){
    	$('#body_list_ic_shop').html(ele);
    });
	
}

function openDetailOrder(id, invoice){
	fn.pushPage({
        'id': 'popup1.html',
        'title': invoice
    }, 'lift-ios');
    
   /* $.ajax({
	        url: "main/data_bank_list", // point to server-side PHP script 
	        dataType: 'json', // what to expect back from the PHP script, if anything
	        type: 'post',
	        success: function(res) {	
	            console.log(res);
				var param = { data : res };
				console.log(param);
	            $.post("component/cpn_bank_list",param,function(el){
					$('#body_option').html(el);
				});
	        }
	});
    $.post("page/call_page",{ path: "statement/list_shop_ic" },function(ele){
    	$('#body_list_ic_shop').html(ele);
    });*/
    
     $.post("shop/detail_shop_his",{ invoice: invoice},function(ele){
    	$('#body_popup1').html(ele);
    });
}