<script>
	function js_yyyy_mm_dd_hh_mm_ss () {
     now = new Date();
     year = "" + now.getFullYear();
     month = "" + (now.getMonth() + 1); if (month.length == 1) { month = "0" + month; }
     day = "" + now.getDate(); if (day.length == 1) { day = "0" + day; }
     hour = "" + now.getHours(); if (hour.length == 1) { hour = "0" + hour; }
     minute = "" + now.getMinutes(); if (minute.length == 1) { minute = "0" + minute; }
     second = "" + now.getSeconds(); if (second.length == 1) { second = "0" + second; }
     return year + "/" + month + "/" + day + " " + hour + ":" + minute + ":" + second;
   }
	function CheckTime(d1,d2){
//   		console.log(d1+" = "+d2);
          datetime1 = d1; 
          datetime2 = d2;
          //Set date time format
          var startDate = new Date(datetime1);
          var endDate   = new Date(datetime2);
          var seconds = (endDate.getTime() - startDate.getTime()) / 1000;
          //Calculate time
          var days = Math.floor(seconds / (3600*24));
          var hrs_d   = Math.floor((seconds - (days * (3600*24))) / 3600);
          var hrs   = Math.floor(seconds / 3600);
          var mnts = Math.floor((seconds - (hrs * 3600)) / 60);
          var secs = seconds - (hrs * 3600) - (mnts * 60);
         	//old
         	var hrs_d_bc = hrs_d;
         	var mnts_bc = mnts;
         	var secs_bc = secs;
          //Add 0 if one digit
          if(hrs_d<10) hrs_d = "0" + hrs_d;
          if(mnts<10) mnts = "0" + mnts;
          if(secs<10) secs = "0" + secs;
         	var final_txt, day_txt, h_txy, m_txt, old_txt;
         	if(days==0){
   		day_txt = '';
   	}else{
   		day_txt = days+' วัน';
   	}
   	if(hrs_d_bc==0){
   		h_txy = '';
   	}else{
   		h_txy = ' '+hrs_d_bc+' ชม.';
   	}
   	if(mnts_bc==0){
   		m_txt = '';
   	}else{
   		m_txt = ' '+mnts_bc+' นาที';
   	}
   	final_txt = day_txt + h_txy + m_txt
          old_txt = days + ' ' + hrs_d + ':' + mnts + ':' + secs;
          return  final_txt+"ที่ผ่านมา";
      }
	
</script>
<style>
	.time-post-shop {
    margin-right: 10px;
    border: 1px solid #333;
    padding: 5px;
    position: absolute;
    z-index: 1;
    right: 0px;
    background-color: #fff;
    margin-top: -60px;
}
.box-shop{
	padding: 17px 10px;
	border-radius: 8px;
	border: 1px solid #3b5998;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 1px 5px 0 rgba(0,0,0,.12), 0 3px 1px -2px rgba(0,0,0,.2);
}
</style>
<?php 
		foreach ($_POST[data] as $key=>$val){
		
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[shop] = $db->select_query("SELECT $place_shopping FROM shopping_product  WHERE id='".$val[program]."' ");
		$arr[shop] = $db->fetch($res[shop]);
		if($val[status]=='CANCEL'){
			 if($val[cancel_type]=='1'){
				$status_txt = '<strong><font color="#ff0000">'.t_customer_no_register.'</font></strong>';
			}
			else if($val[cancel_type]=='2'){
				$status_txt = '<strong><font color="#ff0000">'.t_customer_not_go.'</font></strong>';
			}
			else if($val[cancel_type]=='3'){
				$status_txt = '<strong><font color="#ff0000">'.t_wrong_selected_place.'</font></strong>';
			}
		}
		else if($val[status]=='NEW'){
			$status_txt = '<strong><font color="#3b5998">'.t_new.'</font></strong>';
		}
		else if($val[status]=='COMPLETED'){
			$status_txt = '<strong><font color="#54c23d">'.t_success.'</font></strong>';
		}
	?>
	<div style="padding: 5px 0px;margin: 25px 0px;">
	<div class="box-shop" onclick="openDetailBooking('<?=$key;?>');">
		<table width="100%">
      		<tr>
      			<td width="80%" ><span class="font-24"><?=$arr[shop][$place_shopping];?></span></td>
      			<td width="20%" align="center" rowspan="2"><span class="font-22" id="status_book_<?=$val[id];?>"><?=$status_txt;?></span></td>
      		</tr>
      		<tr>
      			<td colspan="2">
      			<span class="font-20"><?=$val[invoice];?>&nbsp;:&nbsp;<?=$val[transfer_date]." ";?><font color="#ff0000;"><?=$val[airout_h].":".str_pad($val[airout_m], 2, '0', STR_PAD_LEFT)." ".t_n;?></font></span>
      			<span class="font-20 time-post-shop" id="txt_date_diff_<?=$val[id];?>">-</span>

      			</td>
      			
      		</tr>
      	</table>
	</div>
	</div>
	
	<script>
		var d1 = "<?=date('Y/m/d H:m:s',$val[post_date]);?>";
		var d2 = js_yyyy_mm_dd_hh_mm_ss();
		console.log(d1+" = "+d2);
		$('#txt_date_diff_<?=$val[id];?>').text(CheckTime(d1,d2));
	</script>
<?  	
		} ?>