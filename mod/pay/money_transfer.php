
<<<<<<< HEAD
<div  id="load_money" style="display: none;" > 
=======
<!-- <div id="box_body_mode">
    
</div> -->

<div  id="load_money" style="display: nones;" >

  <div  style="padding-top:0px; padding:5px;margin-top: 50px; ">
<div>
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
    <td width="49%"><div id="transfer_money" onclick="withdraw_money()" style="background: #fff;
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
            
</div> 
</div>

<div id="load_body_mode" style="display: none">
>>>>>>> 2f1f57989a9245fc85e18f05ef95bdbd3c977720
  
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
 	// $('#load_money').show();
 	// $('#load_money').html('');
 	// $('#load_money').html('');
 	$('.text-topic-action-mod').html('โอนเงิน');
 	
	var url_load = "go.php?name=load/pay&file=index_detail";
	
	// //  //$('#load_th').load('load/page/loading.php');
 		
	// // //$('#load_money').html(load_money);
	  
	// //   //$('#load_money').load(load_money);
  $('#load_body_mode').show()
	  $.post( url_load, function( data ) {
  $('#load_body_mode').html(data);
  });
	 function transfer_money(){
$('#main_load_mod_popup').show();
    $('#load_body_mode').html('');
    
    var url_load = "go.php?name=load/pay&file=index_detail";
    
      //$('#load_body_mode').load(load_money);
     $.post( url_load, function( data ) {
    $('#load_body_mode').html(data);
  });
  } 
  function request_money(){
    $('#main_load_mod_popup').show();
    $('#load_body_mode').html(' ');
    
    var url_load = "go.php?name=load/pay&file=index_request";
    $.post( url_load, function( data ) {
    $('#load_body_mode').html(data);
  });
      
    //   $('#load_body_mode').load(load_money);
    //  // $.post( url_load, function( data ) {
    // $('#load_body_mode').html(load_money);
  }
  function withdraw_money(){
    $('#main_load_mod_popup').show();
    $('#load_body_mode').html(' ');
    
    var url_load = "go.php?name=load/pay&file=index_withdraw";
    $.post( url_load, function( data ) {
    $('#load_body_mode').html(data);
  });
      
    //   $('#load_body_mode').load(load_money);
    //  // $.post( url_load, function( data ) {
    // $('#load_body_mode').html(load_money);
  }  
 	 </script>

 <!-- index_withdraw -->