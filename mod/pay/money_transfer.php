<?php 
 include('../../includes/class.mysql.php');

  
  $db = New DB();
  $db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
  
  mysql_query("SET NAMES uft8"); 
  mysql_query("SET character_set_results=uft-8");
//   // $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
//   $res[project] = $db->select_query("SELECT id FROM  web_driver  where  username ='".$_POST[driver]."'");
// $arr[project] = $db->fetch($res[project]);
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[deposit] = $db->select_query("SELECT balance FROM  deposit where username  = '".$_COOKIE["app_remember_user"]."' ");
                      
 $arr[deposit] = $db->fetch($res[deposit]) ;
 if($arr[deposit] == ''){
  echo 'sssssssssssssssssssss';
  $balance = 0;

 }
 else{
  $balance = $arr[deposit][balance];

 }
 $arr[deposit]
 // $date = new DateTime();
 // echo $date->format('H:i')
 ?>
<!-- <div id="box_body_mode">
    
</div> -->
<script >
 
  
    var balance = <?= $balance;?>;
  var balance_final = balance.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")+ ' '+ 'บาท';
  $('#balance_final').html(balance_final)
  
  
</script>

<div  id="load_money" style="display: nones;" >

  <div  style="padding-top:0px; padding:5px;margin-top: 50px; ">
<div>
<table width="100%"  border="0" cellspacing="0" cellpadding="0"  >
  <tr align="center">
    <td width="49%">
      <div id="transfer_money" onclick="transfer_money()" class="btn_no_active btn_active"><span class="font-22">เติมเงิน</span></div>
      </td>
        <td width="2%"></td>
    <td width="49%" >
      <div id="requet_money" onclick="request_money()" class="btn_no_active"><span class="font-22"><? echo t_transfer_notice?></span></div>
      </td>
   
  </tr>
  <tr align="center">
    <td width="49%"><div id="withdraw_money" onclick="withdraw_money()" class="btn_no_active"><span class="font-22">ถอนเงิน</span></div></td>
        <td width="2%"></td>
    <td width="49%" ><div id="history_money" onclick="history_money()" class="btn_no_active"><span class="font-22"><? echo t_history?></span></div></td>
   
  </tr>
   <tr align="center">
       <td colspan="3" width="100%">
            <div style="    border-radius: 9px;
    padding: 8px 0;
    box-shadow: 0 5px 7px 0 rgba(0, 0, 0, 0), 0 3px 1px -4px rgba(0,0,0,0.012), 0 3px 6px 0;

 " align="center">
<span class="font-26 text-cap"><span class="font-22">ยอดเงินของคุณ  </span><span style="margin-left: 10px" id="balance_final" class="font-22"></span></div>
            </td>
    </tr>
</table>
</div>
            
</div> 
</div>

<div id="load_body_mode" style="display: none">

  
</div>
	

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
 	$('.text-topic-action-mod').html('ถอน-โอน-แจ้งโอน');
 	
	var url_load = "go.php?name=load/pay&file=index_detail";
	
	// //  //$('#load_th').load('load/page/loading.php');
 		
	// // //$('#load_money').html(load_money);
	  
	// //   //$('#load_money').load(load_money);
  $('#load_body_mode').show()
	  $.post( url_load, function( data ) {
  $('#load_body_mode').html(data);
  });
	 function transfer_money(){
     $('#transfer_money').addClass('btn_active')
     // $('#transfer_money').removeClass('btn_no_active')
     $('#requet_money').removeClass('btn_active')
     $('#withdraw_money').removeClass('btn_active')
     $('#history_money').removeClass('btn_active')
     

$('#main_load_mod_popup').show();
    $('#load_body_mode').html('');
    
    var url_load = "go.php?name=load/pay&file=index_detail";
    
      //$('#load_body_mode').load(load_money);
     $.post( url_load, function( data ) {
    $('#load_body_mode').html(data);
  });
  } 
  function request_money(){
    $('#requet_money').addClass('btn_active')
    $('#transfer_money').removeClass('btn_active')    
     $('#withdraw_money').removeClass('btn_active')
     $('#history_money').removeClass('btn_active')

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
    $('#withdraw_money').addClass('btn_active')
    $('#requet_money').removeClass('btn_active')
    $('#transfer_money').removeClass('btn_active') 
     $('#history_money').removeClass('btn_active')

    $('#main_load_mod_popup').show();
    $('#load_body_mode').html(' ');
    
    var url_load = "go.php?name=load/pay&file=index_withdraw";
    $.post( url_load, function( data ) {
    $('#load_body_mode').html(data);
  });
  }
    function history_money(){
    
    $('#history_money').addClass('btn_active')
   
    $('#requet_money').removeClass('btn_active')
    $('#transfer_money').removeClass('btn_active')    
     $('#withdraw_money').removeClass('btn_active')
     
    
    $('#main_load_mod_popup').show();
    $('#load_body_mode').html(' ');
    
    var url_load = "go.php?name=load/pay&file=index_logs";
    $.post( url_load, function( data ) {
    $('#load_body_mode').html(data);
  });
      
    //   $('#load_body_mode').load(load_money);
    //  // $.post( url_load, function( data ) {
    // $('#load_body_mode').html(load_money);
  }
   function sendwithdraw() {
      console.log('in case')

     
      var amount = $('#amount_w').val();     
      var bank = $('#pay_bank').val(); 
      var bank_name = $('#bank_name').val(); 
      var bank_number = $('#bank_number').val(); 
      $.ajax({
            type: 'POST',
            url: 'mod/load/pay/savedata_withdraw.php',
            data: {'amount':amount,'bank':bank,'bank_name': bank_name,'bank_number': bank_number,'driver':'<?=$_COOKIE["app_remember_user"];?>','action':'money_withdraw' },
            //contentType: "application/json",
            //dataType: 'json',
            success: function(data) {
                console.log(data)
                  alert('รอยืนยันการตรวจสอบการโอนเงิน')
                  $('#main_load_mod_popup').toggle();
                   $('#main_load_mod_popup').show(500);
   var url_load= "load_page_mod.php?name=pay&file=money_transfer"
//    var url_load= "load_page_mod.php?name=transfer_order&file=work_list&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>";
    
    
    $('#load_mod_popup').html(load_main_mod);
   
    $('#load_mod_popup').load(url_load); 
               }
             });
    }  
 	 </script>
<style >
  .btn_active{
        background: #3b5998;
    font-size: 18px;
    border-radius: 25px;
    color: #fff;
    padding: 5px 30px;
    border: 1px solid #3b5998;
    margin-bottom: 8px;

  }
  .btn_no_active{
       
    font-size: 18px;
    border-radius: 25px;
    
    padding: 5px 30px;
    border: 1px solid #3b5998;
    margin-bottom: 8px;
  }
</style>
 <!-- index_withdraw -->