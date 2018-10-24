<?php 
$query = $this->db->query("SELECT t1.*, t2.topic_th as name_type FROM place_car_station_other as t1 left join place_car_station_type as t2 on t1.type = t2.id where t1.member = ".$_COOKIE[detect_user]);
$row = $query->row();

 ?>
<div class="card" id="box_zoon" onclick="//checformadd('box_time')">
    <ons-list-header class="list-header font-17"><?=$row->name_type;?></ons-list-header>
    <?php 
    if($row->type==1){ ?>
	<table class="tb_form" width="100%" id="box_form_ass" style="display: nones;" cellpadding="3" cellspacing="3">
	      <tr>
	        <td width="35%">ชื่อสมาคม</td>
	        <td>
	          <span class="font-17"><?=$row->topic_th;?></span>
	        </td>
	      </tr>
	      <tr>
	        <td width="35%">ที่อยู่สมาคม</td>
	        <td>
	          <?=$row->address;?>
	        </td>
	      </tr>
	      <tr>
	        <td width="35%">ชื่อนายกสมาคม</td>
	        <td>
	          <?=$row->leader;?>
	        </td>
	      </tr>
	    </table>	
	<? }
	else if($row->type==2){
    ?>
    <table class="tb_form" width="100%" id="box_form_com" style="display: nones;" cellpadding="3" cellspacing="3">
	      <tr>
	        <td width="35%">ชื่อบริษัท</td>
	        <td>
	          <span class="font-17"><?=$row->topic_th;?></span>
	        </td>
	      </tr>
	      <tr>
	        <td width="35%">ที่อยู่</td>
	        <td>
	          <span class="font-17"><?=$row->address;?></span>
	        </td>
	      </tr>
	      <tr>
	        <td width="35%">เบอร์โทร</td>
	        <td>
	          <span class="font-17"><?=$row->phone;?></span>
	        </td>
	      </tr>
	      <tr>
	        <td width="35%">ชื่อเจ้าของบริษัท</td>
	        <td>
	          <span class="font-17"><?=$row->leader;?></span>
	        </td>
	      </tr>
	      <tr>
	        <td width="35%">เบอร์ออฟฟิศ</td>
	        <td>
	          <span class="font-17"><?=$row->phone_company;?></span>
	        </td>
	      </tr>
	    </table>
	<?php } 
	else if($row->type==3){ ?>
	<table  class="tb_form" width="100%" id="box_form_queue" style="display: nones;" cellpadding="3" cellspacing="3">
	   <tr>
	        <td width="35%">ชื่อคิว</td>
	        <td>
	          <span class="font-17"><?=$row->topic_th;?></span>
	        </td>
	      </tr>
	      <tr>
	        <td width="30%">ที่อยู่</td>
	        <td>
	          <span class="font-17"><?=$row->address;?></span>
	        </td>
	      </tr>
	      <tr>
	        <td width="30%">ชื่อหัวหน้าคิว</td>
	        <td>
	          <span class="font-17"><?=$row->leader;?></span>
	        </td>
	      </tr>
	      <tr>
	        <td width="30%">เบอร์หัวหน้าคิว</td>
	        <td>
	          <span class="font-17"><?=$row->leader_phone;?></span>
	        </td>
	      </tr>
	    </table>
	<?php	}
	else{ ?>
	<!--<table width="100%">
      <tr>
      	<td width="80" class="font-17">ชื่อ</td>
        <td align="center">
          <span class="font-17" ><?=$row->topic_th;?></span>
        </td>
      </tr>
    </table>-->
	<?php }
	?>
    
  </div>
