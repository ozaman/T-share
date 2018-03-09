<?php 
if($_GET[status]=='CANCEL'){

if($_GET[type]=='1'){ ?>
	<div style="border: 1px solid #ddd; padding: 5px;  box-shadow: 1px 1px 5px #ddd;border-radius:10px;background-color:#fff;">
		<font class="font-24" style="color:#ff0000">
     
     		<b> แขกลงทะเบียนไม่ได้</b></font>
	</div>
	
<? }
if($_GET[type]=='2'){ ?>
	<div style="border: 1px solid #ddd; padding: 5px;  box-shadow: 1px 1px 5px #ddd;border-radius:10px;background-color:#fff;">
		<font class="font-24" style="color:#ff0000">
     
     		<b> แขกไม่ไป</b></font>
	</div>
	
<? }
if($_GET[type]=='3'){ ?>
<div style="border: 1px solid #ddd; padding: 5px;  box-shadow: 1px 1px 5px #ddd;border-radius:10px;background-color:#fff;">
		<font class="font-24" style="color:#ff0000">
     
     		<b> เลือกสถานที่ผิด</b></font>
	</div>
<? }

}
else if($_GET[status]=='NEW'){ ?>
	<font class="font-24" style="color:#0099CC;" > <b> ใหม่ </b></font>
<? }
else if($_GET[status]=='CONFIRM'){ ?>
	<font class="font-24" style="color:#0099CC;" > <b> สำเร็จ </b></font>
<? }
?>