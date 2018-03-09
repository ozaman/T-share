




<style>
  .mynumber{
  

  /*	display:block;*/

	width:100%;

		height:40px;

	text-align:center;

	border:1px solid #CCCCCC;

	text-decoration:none;
	margin-right:3px;

	background-color:#FFFFFF;

	color:#000000;

	float:left;

	font-size:24px; text-align:center;

	 
			-moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px; padding:5px; padding-bottom:20px;

  }





 .mynumber-active{
  

  	display:block;

	width:100%;

	 height:40px;

	text-align:center;

	border:1px solid <?=$main_color?>;

	text-decoration:none;
	margin-right:3px;

	background-color:#FFFDE0;

	color:#000000;

	float:left;

	font-size:26px; text-align:center;

 
			-moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px; cursor:none;

  }







</style>











<script>

 $(".text-topic-action-mod-4" ).html("ใช้เวลาเดินทาง");
 
 
 
 
   $(".mynumber").removeClass("mynumber-active");
 
 

 $("#number_<?=$_GET[id]?>").addClass("mynumber-active");
 ///$("#time_number").removeClass("border-alert");
 
 
  </script> 
 
 
 <?

 

  date_default_timezone_set("Asia/Bangkok");
 
 //$time_finish=$time_finish-25200;
  $time_finish=strtotime("19:00:00");
 
 /// 
   date_default_timezone_set('UTC'); 

 $time_start=time();





 
  $time_complete =$time_finish-$time_start;
  
  
  
  
/// $time_open= date('H:i:s',$time_complete);
  
 $time_open= date('H.i',$time_complete);
  
  
  
  
  
  
  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
   $all_time = $db->num_rows('use_time',"id","channel <= ".$time_open."");
   
   $all_time_check=$all_time-1;
 
 ?>
 


    <TABLE cellSpacing=0 cellPadding=5 width=100% border=0  >
      <TBODY>
        <TR>
          <TD width="100%" vAlign=top>

		  <div>
		    <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                
              </tr>
            </table>
		  </div><br>

			<TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0 style="margin-top:30px"> 
            
            
 <? if(1==1){ 
 
 $res[alltime] = $db->select_query("SELECT * FROM  use_time   where channel <= ".$time_open."  ORDER BY id desc LIMIT 1  ");
 
 $arr[alltime] = $db->fetch($res[alltime]);
 
 
 
 
 ?>
 
 <div  style="margin-top:50px; color:#FF0000" class="font-28"><center>เกิน <?= $arr[alltime][name]?>  ใช้บริการไม่ได้</div>
 
 
 
 
 <? } ?>
 
<?
 
 
 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 

$res[news] = $db->select_query("SELECT * FROM  use_time   where channel <= ".$time_open."  ORDER BY id aSC    ");
$count=0;
while($arr[news] = $db->fetch($res[news])){
	
 

	if ($count==0) { echo "<TR bgcolor=".$bgcolor.">"; }
	//������Ǵ���� 

?>
			<td  cellpadding="3"   valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
              <tr>
                <td > 
                
                         
<script>


$("#number_<?=$arr[news][id] ?>").click(function(){ 


    var url_load_time= "popup.php?name=booking/load&file=time_topoint&id=<?=$arr[news][id] ?>";
 
 
 
 $('#send_booking_data').load(url_load_time); 



 

 
  $('#time_number').html('<?=$arr[news][name] ?>');
  
  
  $('#detail_step_1').html('<br><?=$arr[news][name] ?>');
  
  

  
  
  
  $('#time').val(<?=$arr[news][id] ?>);
  
  
   $(".mynumber").removeClass("mynumber-active");
   
   
   
  
   $("#number_<?=$arr[news][id] ?>").addClass("mynumber-active");
 
  
 $( "#load_mod_popup_4" ).toggle();
 
 $("#time_number").removeClass("border-alert");
 
  $("#time_number").addClass("border-alert-no");
 
 
  $( "#submit_booking_step_1" ).hide();
  
  
   $( "#div_submit_booking_step_1" ).hide();
 

});     
                
                
       </script>         
                
                
 
                <div class="mynumber" id="number_<?=$arr[news][id] ?>" >
                
                
                <?=$arr[news][name] ?>
                
                      </div>
                
                </td>
              </tr>
            </table></TD>
<?
$count++;
if (($count%1) == 0) { echo ""; $count=0; }
}
$db->closedb ();
//������ʴ��������
?>
			</TABLE>
				<!-- End News -->
          </TD>
        </TR>
      </TBODY>
    </TABLE>
<br>
<br>
<br>
