

 <?
 
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
  	$res[driver] = $db->select_query("SELECT * FROM web_driver  WHERE id='".$_GET[driver]."' ");
	$arr[driver] = $db->fetch($res[driver]);
	
	$bank=$arr[driver][pay_bank_name];
	$bank_sub=$arr[driver][pay_bank_sub];
	$bank_number=$arr[driver][pay_bank_number];
	
  
  ?> 
 
  
  
  
  
  
  
  
 
          
          
          
       
 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="div-all-palce" style="margin-top:10px;">
  <tbody>
    <tr>
      <td width="50" rowspan="3" valign="middle"> 
      
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td align="center"> <input name="check_confirm" type="radio" id="check_confirm" style="height:25px; width:25px;" value="CONFIRM" 
      
      <? if(1==1){?>    checked="checked" <? } ?>></td>
    </tr>
    <tr>
      <td align="center"><img src="images/bank/<?=$bank?>.png" width="40" /> </td>
    </tr>
  </tbody>
</table>

      
      
          
	 
 
		  
		  </td>
      <td width="80" class="font-22"><strong> ธนาคาร </strong></td>
      <td class="font-20"><?=$bank;?></td>
    </tr>
    <tr>
      <td class="font-22"><strong>สาขา</strong></td>
      <td><span class="font-20">
        <?=$bank_sub;?>
      </span></td>
    </tr>
    <tr>
      <td class="font-20"><strong>เลขที่บัญชี</strong></td>
      <td><?=$bank_number?></td>
    </tr>
  </tbody>
</table>
    
          
          
          
          
          
          
          
          </span>
        
        
      <div class="font-26" style="margin-top:10px;"><i class="fa fa-plus-circle"  style="color:<?=$main_color?>" ></i>  เพิ่มบัญชีธนาคารใหม่</div>  
        
 <script type="text/javascript" src="js/dialog/main.js"></script>
 
 	   
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="plugins/iCheck/square/red.css">
    <link rel="stylesheet" href="plugins/iCheck/square/green.css">
  
  <script src="plugins/iCheck/icheck.min.js"></script>
  
  
  
 
 <br>




<script>
 
 /// check login
 


  $(function () {
	  
    $('#check_new').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  
  
    $(function () {
	  
    $('#check_confirm').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-green',
      increaseArea: '20%' // optional
    });
  });
  
  
  
 
    $(function () {
    $('#check_cancel').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-red',
      increaseArea: '20%' // optional
    });
	
	
	
  });
  
  
  
  
  
  
</script>
      