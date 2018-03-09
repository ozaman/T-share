 
 
 
 
 <? if($_GET[action]=='view'){ ?>
 
 
 
 
  <div style="margin-top:10px;">
  
 
 
  <?
  
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

 
              
 $res[shop] = $db->select_query("SELECT * FROM  product_price_list_all where plan_setting=".$_GET[plan_setting]."   and status=1 and id=".$_GET[id]."   order by sort_country desc limit 1 ");
 
 
                      
$arr[shop] = $db->fetch($res[shop]);
  
 $pay= $arr[shop][$_GET[pay]];
 $income= $arr[shop][$_GET[income]];
  
  ?>
 
 
 
 
 
 
                   
  <script>
  
  
  
  
       if(document.getElementById('to_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>').value=="cash") {
 
     $('#to_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>').css('color', '#FF0000');
	 } else {
		 
	$('#to_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>').css('color', '#000000');
		 
		 
	 }
	 
  
  
  
  
  
  
  
  
  
   $("#to_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>").change(function(){ 
  
 
  
       if(document.getElementById('to_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>').value=="cash") {
 
     $('#to_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>').css('color', '#FF0000');
	 } else {
		 
	$('#to_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>').css('color', '#000000');
		 
		 
	 }
	 
  
 
 
   var url_price= "empty_style.php?name=content/load/list/payment&file=pay_select&op=save_pay&save=<?=$_GET[income]?>&id=<?=$_GET[id]?>";
  
  url_price =url_price+"&data="+document.getElementById('to_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>').value;
 
  $('#save_payment_status').load(url_price);
  
 
 
 
 
 
 
  
 
 	  });
 
  
  
  
  
  
  
  
  
  
  
  
 
 //// 
     if(document.getElementById('pay_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>').value=="1") {
 
     $('#pay_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>').css('background-color', '#29BDB6');
	 } else {
		 
	$('#pay_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>').css('background-color', '#F68E56');	 
		 
		 
	 }
	 
	 
	 
 
  $("#pay_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>").change(function(){ 
  
 
 
 
 
 
     if(document.getElementById('pay_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>').value=="1") {
 
     $('#pay_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>').css('background-color', '#29BDB6');
	 } else {
		 
	$('#pay_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>').css('background-color', '#F68E56');	 
		 
		 
	 }
 

 
  
  
  var url_price= "empty_style.php?name=content/load/list/payment&file=pay_select&op=save_pay&save=<?=$_GET[pay]?>&id=<?=$_GET[id]?>";
  
  url_price =url_price+"&data="+document.getElementById('pay_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>').value;
 
  $('#save_payment_status').load(url_price);
  
 
 
 
	  });
	  
	  
	  
  
  </script>
 
 
 
 
 
 
 
 
 
                   
   
 
 
 
 
  
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td><select  name="pay_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>" id="pay_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>" style="width:100%; font-size:16px; padding:5px; height:40px; color:#FFFFFF"  class="form-control">
 
   
          <option value="1" <? if($pay==1){ echo ' selected="selected"';}?>  >T Share</option>
          <option value="2"  <? if($pay==2){ echo ' selected="selected"';}?>  >ผู้บริการ</option>
 
        </select></td>
    </tr>
    <tr>
      <td>
 
      
   <select  name="to_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>" id="to_<?=$_GET[pay_type]?>_<?=$_GET[pay_name]?>_<?=$_GET[id]?>" style="width:100%; font-size:16px; padding:5px; height:40px"  class="form-control">
   
          <option value="cash" <? if($income=='cash'){ echo ' selected="selected"';}?> >เงินสด</option>
          <option value="bank" <? if($income=='bank'){ echo ' selected="selected"';}?>>โอนเงิน</option>
 
        </select></td>
    </tr>
  </tbody>
</table>
</div>
  
  
  
  
  <script>
  
  
  
 
  
  
 
 
	  
  
  </script>
  
  
  
  
  
  
  
  
  
  <? } ?>

 <?
    if($_GET[op] == "save_pay"){
		  

	//////////////////////////////////////////// óź Form
  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
  $db->update_db('product_price_list_all', array(
 
 	$_GET[save]=>"$_GET[data]"
 
 )," id='".$_GET[id]."' ");
		
 
  }

 
 ?>
 
 
  
 
 
 
 