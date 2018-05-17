
<div  id="load_money" style="display: none;" > 
  
</div>
	


 
 
 <style >
 	.font_18{
 		font-size: 16px !important;
 	}
 </style>
 <script >
  var check_lang = '<?=$_COOKIE["lng"];?>';
  if (check_lang == 'th') {
        $('.text-topic-action-mod').html('โอนเงิน');
      }
      else if (check_lang == 'cn') {
       $('.text-topic-action-mod').html('转账');
      }
       else if (check_lang == 'en' || check_lang == undefined) {
        $('.text-topic-action-mod').html('Transfers money');
      }
 	$('#load_money').show();
 	$('#load_money').html('');
 	$('#load_money').html('');
 	//$('.text-topic-action-mod').html('โอนเงิน');
 	
	var load_money = "go.php?name=load/pay&file=index_transfer";
	
	 //$('#load_th').load('load/page/loading.php');
 		
	//$('#load_money').html(load_money);
	  
	  $('#load_money').load(load_money);
	 // $.post( url_load, function( data ) {
 // $('#load_money').html(load_money);
	 function transfer_money(){

    $('#load_money').html('');
    
    var load_money = "go.php?name=load/pay&file=index_transfer";
    
      $('#load_money').load(load_money);
     // $.post( url_load, function( data ) {
    //$('#load_money').html(load_money);
  } 
  function request_money(){
    $('#load_money').html('');
    
    var load_money = "go.php?name=load/pay&file=index_request";
   
      
      $('#load_money').load(load_money);
     // $.post( url_load, function( data ) {
    //$('#load_money').html(load_money);
  } 
 	 </script>

 