<?
 
  if($_GET[driver_price]  == '1'){ 
			  
			  $price_color="#333333";
			  $price_text="ชำระแล้ว";
			  }
			  
			 if($_GET[driver_price]  == '0'){ 
			    $price_color="#DE0B0B";
				 $price_text="ค้างชำระ";
				
			  }

?>
				
				
				
  <span class="time" style="font-size:24px; color:<?=$price_color?>; margin-top:-5px"> <b> <?=number_format( $_GET[price]+0 , 0 );?></b></span><span style="position:absolute;   right:80px; margin-top:8px "><a  onclick="responsiveVoice.speak('ค่าเที่ยว,<?= $_GET[price];?> บาท ,  ขอบคุณค่ะ', 'Thai Female', {rate: 0.9});" style="margin-left:25px; padding:5px;"><i class="fa fa-volume-up faa-pulse animated fa-4x" style="font-size:22px; color:#666666 " id="btn_sound_price"></i></a> </span> 


                <div class="timeline-header"  style="padding-top:10px; padding-bottom:5px; " >
 
				<font color="#666666" style="font-size:16px"><a >ค่าเที่ยว</a></font> <B></B> &nbsp;<font color="<?=$price_color?>"  style="font-size:16px; margin-top:-25px;"><?=$price_text?>&nbsp;</font >
 
				
				</div>
				