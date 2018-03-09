 <style type="text/css">
<!--
.topictransfer { padding-top:10px; font-size:16px; font-weight:normal; color: <?=$main_color?> ; 
 
}
.style1 {font-size: 16px}
.style2 {font-size: 16}
-->
</style> 
  <?
 
if($_GET[day] != ''){
	$_GET[day] = $_GET[day];
}else{
$_GET[day] = date('Y-m-d');
}
 //echo $_SESSION['admin_user_dv'];
//  echo $_GET[server];
?>
 
 <?
 
 ///
$data_sale="where drivername='".$user_id."' and transfer_date='".$_GET[day]."' and status = 'CONFIRM'";
 
///  $data_sale="where drivername='".$user_id."'  and status = 'CONFIRM'";
 
 //$row_complete = $db->num_rows(TB_order,"id","drivername='".$user_id."' and transfer_date='".$_GET[day]."' and status = 'CONFIRM' group by carno  ");

//
 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$query = "SELECT SUM(car_price) FROM transfer_report_all $data_sale "; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
$pay= $row['SUM(car_price)'];
}
 number_format( $pay , 2 );
 
  


?>
 
<table width="100%"   style="padding:10px; margin-bottom:10px ; background-color:#FFFFFF;border: solid 1px #DADADA; font-size:22px;"    >
                 
                                    <tr>
                                       <td height="40" style="font-size:24px;" > &nbsp;&nbsp;<?
$eng_date=strtotime($_GET[day]); 
echo $_GET[day]; 
									   ?> 
									   </td>
                                    </tr>
 
			  
  </table>
							 
							
							
 

      <div class="row" style="height:auto; ">
				 

        <div class="col-md-12" >
	  <div class="box box-danger" style="padding:10px;  border: solid 2px #ECF0F5; font-size:26px" onmouseover="this.style.border='solid 2px #FF6600';" onmouseout="this.style.border='solid 2px #ECF0F5';" id="booking_<?=$arr[project][invoice];?>">
	  <center><b>
	  <?
	  $payall=$pay_th+$pay_cn;
	   echo number_format( $pay , 2 );
	  ?>
	  &nbsp;&nbsp;บาท
	  </b></center>
	  </div>  
   
              
  </div>  


    
<?

$db->closedb ();
?>  </div>  
 