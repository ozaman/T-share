<?php 
		$select = "SELECT * FROM order_booking where drivername = '".$_COOKIE[detect_user]."' order by transfer_date desc ";
		$query = $this->db->query($select); ?>

<div>		
<?php	foreach ($query->result() as $row){ ?>
       	<ons-card  class="card">
			<?=$row->id." ".$row->transfer_date;?>
		</ons-card>
<?php		}
?>
</div>