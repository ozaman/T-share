<div style="padding: 10px 10px;">
    <ons-button style="background-color: #fff;" modifier="outline" class="button-margin button button--outline button--large" onclick="addBank();">เพิ่มข้อมูลบัญชี</ons-button>
</div>

<?php 
		$sql = "SELECT * FROM web_bank_driver";
      	$query_bank = $this->db->query($sql);
      	
      	foreach($query_bank->result()  as $row){ ?>
			<ons-card class="card">
				<div>
					
				</div>
			</ons-card>
<?php		}
?>


