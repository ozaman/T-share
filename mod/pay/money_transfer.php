<div  style="padding-top:0px; padding:5px;margin-top: 50px; ">

<table width="100%"  border="0" cellspacing="0" cellpadding="0"  >
  <tr align="center">
    <td width="49%">
      <div id="transfer_money" onclick="transfer_money()" style="background: #3b5998;
        font-size: 18px;
        border-radius: 25px;
        color: #fff;
        padding: 5px 30px;
        border: 2px solid #3b5998;    margin-bottom: 8px; "><? echo t_transfers?></div>
      </td>
        <td width="2%"></td>
    <td width="49%" >
      <div id="requet_money" onclick="request_money()" style="
        background: #fff;
        font-size: 18px;
        border-radius: 25px;
        color: #3b5998;
        padding: 5px 30px;
        border: 2px solid #3b5998;    margin-bottom: 8px;"><? echo t_transfer_notice?></div>
      </td>
   
  </tr>
  <tr align="center">
    <td width="49%"><div id="transfer_money" onclick="()" style="background: #fff;
        font-size: 18px;
        border-radius: 25px;
         color: #3b5998;
        padding: 5px 30px;
        border: 2px solid #3b5998; ">ถอนเงิน</div></td>
        <td width="2%"></td>
    <td width="49%" ><div id="requet_money" onclick="()" style="
        background: #fff;
        font-size: 18px;
        border-radius: 25px;
        color: #3b5998;
        padding: 5px 30px;
        border: 2px solid #3b5998;"><? echo t_history?></div></td>
   
  </tr>
</table>
            
</div>
<div id="box_body_mode">
    
</div>
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

 