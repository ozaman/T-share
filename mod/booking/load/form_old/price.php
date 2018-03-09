
  <style>
 .div-all-price{
	 padding:3px;   border-radius: 8px; border:  1px solid #ddd;background-color:#FFFDE9;     margin-bottom: 10px; margin-top:0px; box-shadow: 0px  0px 0px #DADADA  ;
	 
 }

  </style>


<?
 $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);

if($_GET[id]<>''){

 
$res[project] = $db->select_query("SELECT * FROM  order_booking  where  id='".$_GET[id]."' ");
$arr[project] = $db->fetch($res[project]);

}




 
 
 
 
 
 
   $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[project][plan_id]."   ");
             
  $arr[price] = $db->fetch($res[price]);
 
  
 $show_park=$arr[price][price_park];
 $show_person=$arr[price][price_person];
 $show_commision=$arr[price][price_commision];
  
  
  
  
  if($show_park==1){	  
$status_show_park='show';	   	  
  }
    
  if($show_park==0){	  
$status_show_park='hide';	  	  
  }
  
  
    
  if($show_person==1){	  
$status_show_person='show';	   	  
  }
  
 if($show_person==0){	  
$status_show_person='hide';	    	  
  }
  
   if($show_commision==1){	  
$status_show_commision='show';	   	  
  }
  
    if($show_commision==0){	  
 $status_show_commision='hide';	  
  }
   
  //echo $arr[place][price_plan];
 
  
 
 
 
 
 
 
 
?>

 
 <script>
 
  
$('#btn_show_hide_price_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-up" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;ซ่อน</span>');
 
  $('#btn_show_hide_price_<?=$arr[project][invoice];?>').click(function() {
	  
 
 
 ///// tool status
 var tool_status = $( "#table_show_hide_price_<?=$arr[project][invoice];?>" ).is(":hidden");
 
// $("#table_show_hide_price_<?=$arr[project][invoice];?>" ).show(); 
 
 if(tool_status==true){
	 
$("#table_show_hide_price_<?=$arr[project][invoice];?>" ).show(); 

 $('#btn_show_hide_price_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-up" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;ซ่อน</span>');
 
	 
 } else {
	 
	$("#table_show_hide_price_<?=$arr[project][invoice];?>" ).hide();  
	
 $('#btn_show_hide_price_<?=$arr[project][invoice];?>').html('<i class="fa fa-angle-down" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;แสดง</span>');
	
	 
 }
 
 
  });
 </script>
 
 
<style>
.payment-menu{
    border-radius: 50%; background-color:#59AA47; display: block;  
 
    padding: 12px; 
    width: 50px;
    height: 50px; 
 
	 color:#FFFFFF;  font-size:10px;  
	border: solid 2px #FFFFFF;
 
    text-align: center;
	vertical-align: middle;  box-shadow: 0px  0px 10px #DADADA  ; margin-left: -5px;  

}

</style>
 
 
 
<div  class="box-bottom-line"  style="padding-top:10px;" 
><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td height="30" class="font-28 "><font color="<?=$text_topic_color?>" ><b> รายได้  <font color="#FF0000">&nbsp; </font></td>
      <td width="70" valign="top"><div id="btn_show_hide_price_<?=$arr[project][invoice];?>" class="font-24"></div></td>
    </tr>
  </tbody>
</table>
</div>

 <?
 $arr[project][register_pax]=$arr[project][pax];
 ?>
 
 
 
<script>
  
$('#main_td_price_park_<?=$arr[project][id];?>').<?=$status_show_park?>();
$('#main_td_price_person_<?=$arr[project][id];?>').<?=$status_show_person?>();
$('#main_td_price_com_<?=$arr[project][id];?>').<?=$status_show_commision?>();
 
 
  </script>
 
 

<table width="100%" border="0" cellpadding="1" cellspacing="3" id="table_show_hide_price_<?=$arr[project][invoice];?>">
  <tbody>
 
    <tr style="display:nones">
      <td colspan="3" class="font-26">
 <table width="100%" border="0" cellspacing="2" cellpadding="2" class="div-all-price" style="background-color:#FFFFFF">
  <tbody>
    <tr>
      <td colspan="2" class="font-26"><b><a id="show_plan_setting_<?=$arr[project][id];?>"><?=$arr[price][topic_th]?></a></b></td>
      </tr>
    <tr>
      <td width="70"  class="font-22"><b>สัญชาติ</td>
      <td class="font-22"><b> <img src="images/flag/China.png" width="30" height="30" alt="" style="margin-top:-5px;"/> จีน</td>
    </tr>
  </tbody>
</table>
      
      
      
      
     
      
      
      
      </td>
     
    </tr>
    
 
    
    
    
    <tr id="main_td_price_park_<?=$arr[project][id];?>">
      <td colspan="3" class="font-22">
      
       <?  include ("mod/booking/load/form/price/park.php");?>
  
      </td>
    </tr>
 


    <tr id="main_td_price_person_<?=$arr[project][id];?>ห">

      <td colspan="3" class="font-22">
<?  include ("mod/booking/load/form/price/person.php");?>

</td>
    </tr>
    
 
    <tr id="main_td_price_com_<?=$arr[project][id];?>">
      <td colspan="3" class="font-22">
      
      <?  include ("mod/booking/load/form/price/com.php");?>
      
      
      
      
      </td>
    </tr>
    
    
    
    
        <tr id="main_td_price_all_<?=$arr[project][id];?>">
      <td colspan="3" class="font-22">
      
      <?  /// include ("mod/booking/load/form/price/com.php");?>
      
      
      
      
      </td>
    </tr>
    
    
    
    
    
 
 
  </tbody>
</table>
