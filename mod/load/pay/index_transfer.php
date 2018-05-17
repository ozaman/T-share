<<<<<<< HEAD
<div  style="padding-top:0px; padding:5px;margin-top: 50px; ">

<table width="100%"  border="0" cellspacing="0" cellpadding="0"  >
  <tr align="center">
    <td width="49%"><div id="transfer_money" onclick="transfer_money()" style="background: #3b5998;
        font-size: 18px;
        border-radius: 25px;
        color: #fff;
        padding: 5px 30px;
        border: 2px solid #3b5998; "><? echo t_transfers?></div></td>
        <td width="2%"></td>
    <td width="49%" ><div id="requet_money" onclick="request_money()" style="
        background: #fff;
        font-size: 18px;
        border-radius: 25px;
        color: #3b5998;
        padding: 5px 30px;
        border: 2px solid #3b5998;"><? echo t_transfer_notice?></div></td>
   
  </tr>
</table>
            
</div>
<div style="font-size: 18px;
    font-weight: 600;
    padding: 0px 10px;
    margin-top: 15px;"><? echo t_transferred_account_details?></div>
<div  style="margin-top: 15px;
    padding: 5px;
    border: 1px solid #3b5998;
    border-radius: 15px;
">
=======
>>>>>>> 2f1f57989a9245fc85e18f05ef95bdbd3c977720


<div id="load_body_mode" style="display: none">
  
</div>
<script >
  $('#load_body_mode').show();
  $('#load_body_mode').html('');
 
<<<<<<< HEAD
 ?>
						
<table width="100%"  border="0" cellspacing="2" cellpadding="2"  >
  <tr >
     
     <td>
      <table>
        <tr>
          <td width="80" class="font_18" style="height:30px;  padding-left:5px;"><? echo t_bank_name?></td>
          <td width=""   class="font_16" style="padding-right:10px; color:#FF0000;font-size: 16px;">
           <!--  <img src="https://scontent.fbkk10-1.fna.fbcdn.net/v/t1.0-1/p50x50/10897014_10152997534378545_3525821504956963563_n.jpg?oh=70839c63656c22249e06f3e5e4b812c3&oe=5B40AF5A"> -->
             ไทยภานิชย์(SCB)         
              </td>
          
        </tr>
        <tr>
          <td width="80" class="font_18" style="height:30px;  padding-left:5px;"><? echo t_account_number?></td>
          <td width=""   class="font_16" style="padding-right:10px; color:#FF0000;font-size: 16px;">8572088605
          </td>
          
        </tr>
        <tr>
            <td width="80" class="font_18" style="height:30px;  padding-left:5px;"><? echo t_account_name?></td>
            <td width=""   class="font_16" style="padding-right:10px; color:#FF0000;font-size: 16px;">goldenbeachgroup
            </td>
        </tr>
      </table>
      
     </td>
  </tr>
</table>
						
 	</div>
  <div>
     <table>
        <tr>
          <td width="" class="font_18" style="height:30px;  padding-left:5px;"><? echo t_your_balance?></td>
          <td width=""   class="font_16" style="padding-left: 20px; color:#FF0000;font-size: 16px;"><div style="font-size: 16px;">
           <!--  <img src="https://scontent.fbkk10-1.fna.fbcdn.net/v/t1.0-1/p50x50/10897014_10152997534378545_3525821504956963563_n.jpg?oh=70839c63656c22249e06f3e5e4b812c3&oe=5B40AF5A"> -->
          <span> <?= number_format( $arr[price][deposit] , 0 );?> </span></div>
            </td>
          
        </tr>
        
  </div>
  <script>
$('.text-topic-action-mod').html('<?echo t_transfers ?>');
  </script>
=======
  $('.text-topic-action-mod').html('โอนเงิน');
  $('#main_load_mod_popup').show();
  var url_load = "go.php?name=load/pay&file=index_detail";
  
   //$('#load_th').load('load/page/loading.php');
    
  
  //     $.post( url_load, function( data ) {
  //   $('#load_body_mode').html(data);
  // });

</script>

>>>>>>> 2f1f57989a9245fc85e18f05ef95bdbd3c977720
