<div  style="padding-top:0px; padding:5px; ">


 
						
<table width="100%"  border="0" cellspacing="2" cellpadding="2"  >
  <tr align="center">
    <td width="20%" bgcolor="#999999"  style="color:#FFFFFF; padding:8px; font-size: 16px; "><b><? echo t_today?></b></td>
    <td width="10%" bgcolor="#999999" style="color:#FFFFFF; padding:8px; font-size: 16px; "><b><? echo t_jobs?></td>
    <td width="30%" bgcolor="#999999" style="color:#FFFFFF; padding:8px; font-size: 16px; "><b> <? echo t_expenses?></td>
    <td width="30%" bgcolor="#999999" style="color:#FFFFFF; padding:8px; font-size: 16px; "><span style="font-size: 16px;color:#FFFFFF; padding:2px; "><b><? echo t_total?> </span></td>
  </tr>
</table>
						
 						

 <?
 include('../../includes/class.mysql.php');
	
 //// bkk 6000
 //// krb
 $date = $_GET[date];

//echo $_GET[driver];

//$unixTimestamp = mktime(0, 0, 0, date($_GET[date]));
$day = (int)substr($date, 8, 2);
$month = (int)substr($date, 6, 2);
if ($month < 10) {
	$month = '0'.$month;
	# code...
}
$year = (int)substr($date, 0, 4);
//echo $year." ".$month." ".$day;
//echo $unixTimestamp;

 $date_finish = date('Y-m-d',strtotime("+0 day")); 
$date_finish_plus = date('Y-m-d',strtotime("+1 day")); 


  $no    = "$year-$month";
  
   $no_acc    = "acc_$year_$month";
  
 $data_sale = "where dayall like '%" . $no;
       $allpage   = "dayall like '%" . $no;
	   

//echo "SELECT * FROM date_loop  where dayall like '%' '".$no."' '%'";

// $data_sale = "where dayall like '%" . $no . "%'   $saleuser";
      // $allpage   = "dayall like '%" . $no . "%'   $saleuser";
$data_sale = "where dayall like '%" . $no . "%'   $saleuser";
	   

 $db = New DB();
  $db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
 
 
 $res[deposit] = $db->select_query("SELECT  * FROM  deposit WHERE username = '".$_GET[driver]."' ");
$arr[deposit] = $db->fetch($res[deposit]);
 
$deposit = $arr[deposit][deposit];
///// start date

$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);

$res[startdate] = $db->select_query("SELECT * FROM date_loop  where dayall like '%' '".$no."' '%'"); 

$arr[startdate] = $db->fetch($res[startdate]);
 

  $day_start=$arr[startdate][dayall];

  //echo $day_start;
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[timeline] = $db->select_query("SELECT * FROM date_loop  $data_sale and  dayall   < '".$date_finish_plus."' order by  id  asc  limit 31");
while($arr[timeline] = $db->fetch($res[timeline])){
	$bgcolor = ($i++ & 1) ? '#FFFFFF' : '#FFFDE9'; 

	$daywork=$arr[timeline][dayall];
 // echo $_GET[driver];
$db = New DB();
	$db->connectdb('admin_booking','admin_MANbooking','252631MANbooking');
$res[drivername] = $db->select_query("SELECT * FROM  ap_order WHERE arrival_date = '".$daywork."' and  driver = '".$_GET[driver]."' ");
$arr[drivername] = $db->fetch($res[drivername]);

//echo $arr[drivername][id]
$find_date="and arrival_date='". $daywork."'";
$find_date_today="and arrival_date BETWEEN '". $day_start."' AND '". $daywork."'";

$db = New DB();
	$db->connectdb('admin_booking','admin_MANbooking','252631MANbooking');
$row_yes = $db->num_rows("ap_order","id","driver='".$_GET[driver]."' $find_date and guest_topoint = 1");

$row_all = $db->num_rows("ap_order","id","driver='".$_GET[driver]."' $find_date and guest_topoint = 1 ");


$data_sale="where driver='".$_GET[driver]."'  $find_date and guest_topoint = 1";

//  $data_sale="where driver='".$arr[drivername][driver]."'  $find_date and guest_topoint = 1  group by invoice ";
 
 
$data_sale_today="where driver='".$_GET[driver]."'  $find_date_today and guest_topoint = 1";


// $data_ot="where driver='".$arr[drivername][driver]."' $find_date ";


//  $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
// $query = "SELECT  total_price  FROM  ap_order $data_sale "; 
// $result = mysql_query($query) or die(mysql_error());
// // Print out result
// $pay = 0;
// while($row = mysql_fetch_array($result)){
// //$pay= $row['SUM(car_price)'];

// $pay += $row['total_price'];

// }
 



//  $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
// $query = "SELECT SUM(cost) FROM history_transfer_ot $data_ot "; 
// $result = mysql_query($query) or die(mysql_error());
// // Print out result
// while($row = mysql_fetch_array($result)){
// $payot= $row['SUM(cost)'];
// }
 
 
 ////
$db = New DB();
	$db->connectdb('admin_booking','admin_MANbooking','252631MANbooking');
$query = "SELECT SUM(total_price), SUM(cost_a_nett)  FROM  ap_order $data_sale "; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
$pay_advance= $row['SUM(total_price)'] - $row['SUM(cost_a_nett)'];
}

 
 $db = New DB();
	$db->connectdb('admin_booking','admin_MANbooking','252631MANbooking');
$query = "SELECT  cost_a_nett,total_price  FROM ap_order $data_sale_today "; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
$pay_total = 0;
while($row = mysql_fetch_array($result)){
//$pay= $row['SUM(car_price)'];

  $pay_total += $row['total_price'] - $row['cost_a_nett'];

}

	
	
	
	
?>

 

 <div >
	<table width="100%"  border="0" cellspacing="2" cellpadding="2">
  		<tr align="center">
    		<td width="20%" style="height:35px;background-color:<?=$bgcolor ?> "  class="font_18" >
    			<? //=$arr[timeline][dayall]?>
    			<?=$i?>
    			
    		</td>
    		<td width="10%"  class="font_18" style="background-color:<?=$bgcolor ?> ">    
    			<? if($row_yes==0){?>
						<font color="#FF0000"> - </font>
				<? }  else {?>
        			<div style=" background: #3b5998;
    color: #fff;
    padding: 5px 15px;
    border-radius: 8px;" onclick="opencheckwork('<?=$daywork ?>','<?=$_GET[driver]?>')"><?=$row_yes?></div>
        			
        
        		<? } ?>
    		</td>
    		<td width="30%" align="right"  class="font_18" style="padding-right:10px;background-color:<?=$bgcolor ?> ">
    			
	
	<? if($pay_advance>0){
	
	
	 
	?>
	
	<a  data-toggle="modal" data-target="#myModal<?=$arr[projectnew][id];?>" ><font class="font_18"  color="#333"><?=$pay_advance?></font></a>
 
	<div id="myModal<?=$arr[projectnew][id];?>" class="modal fade" role="dialog">
  <div class="modal-dialog"   style="max-width:350px; ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
 
        <h4 class="modal-title"><?=$arr[projectnew][product_name_th];?></h4>
      </div>
      <div class="modal-body">
        <p>งานใช้รถเพิ่ม <?=$arr[projectnew][use_car_overtime];?> ชั่วโมง</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div>

  </div>
</div>
	
	<? } ?> 
	<? if($row_all==0){?>
	<font color="#FF0000"> - </font>
		<? } ?>
 
	
	
	
			</td>
    		<td width="30%" align="right"  class="font_18" style="padding-right:10px;background-color:<?=$bgcolor ?> ">
   					<?= number_format( $pay_total , 0 );?>
    		</td>
  		</tr>
	</table>

 </div>
 <? }  ?>	
<table width="100%"  border="0" cellpadding="2" cellspacing="2"  style="background-color:#F6F6F6;border:  dotted 1px #999999;  ">
   <tr  >
     <td  class="font_18" style="height:30px; padding-left:5px; "><? echo t_total_expenses?></td>
     <td width="40%" align="right"  class="font_24" style="padding-right:10px; color: #006699 "><?= number_format($pay_total , 0 );?>
     </td>
   </tr>
 </table>
 <table width="100%"  border="0" cellspacing="2" cellpadding="2">
   <tr  >
     <td  class="font_18" style="height:30px;  padding-left:5px;"><? echo t_balances?></td>
     <td width="40%" align="right"  class="font_24" style="padding-right:10px; color:#FF0000 "><?= number_format(  $deposit-$pay_total , 0 );?>
     </td>
   </tr>
 </table>

 
 
 <style >
 	.font_18{
 		font-size: 16px !important;
 	}
 </style>
 <script >
 	function opencheckwork(start,dri) {
 		//alert(start+'_'+dri);

 		var url_load= "load_page_mod_2.php?name=booking&file=all_job_history&date="+start;	  
	  console.log(url_load);
	  
	  $('#load_mod_popup').html(load_main_mod);
	  
	  $('#load_mod_popup').load(url_load);
	 // $.post( url_load, function( data ) {
  $('#load_mod_popup').html(data);
//});
 
// 	  $("#main_load_mod_popup_1" ).toggle();
	  
// 	  var url_load= "load_page_mod_1.php?name=transfer_order&file=work_list_job_history&date="+start+"&transfer_work=true";
// //	  var url_load= "load_page_mod.php?name=transfer_order&file=work_list&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>";
	  
// 	  console.log(url_load);
// 	  $('#load_mod_popup_1').html(load_main_mod);
	 
// 	  $('#load_mod_popup_1').load(url_load); 
 
 	
 		// body...
 	}
 </script>

 