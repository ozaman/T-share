<style>
	.mynumber
	{
		display: block;
		width: 100%;
		height: 40px;
		text-align: center;
		border: 1px solid #CCCCCC;
		text-decoration: none;
		margin-right: 3px;
		background-color: #FFFFFF;
		color: #000000;
		float: left;
		font-size: 30px;
		text-align: center;
		line-height: 40px;
		-moz-border-radius: 10px;
		-webkit-border-radius: 10px;
		border-radius: 10px;
	}
	.mynumber-active
	{
		display: block;
		width: 100%;
		height: 40px;
		text-align: center;
		border: 1px solid <?=$main_color?>;
		text-decoration: none;
		margin-right: 3px;
		background-color: #FFFDE0;
		color: #000000;
		float: left;
		font-size: 30px;
		text-align: center;
		line-height: 40px;
		-moz-border-radius: 10px;
		-webkit-border-radius: 10px;
		border-radius: 10px;
	}
</style>
<script>
	$(".text-topic-action-mod-4" ).html("ชั่วโมง");
	$(".mynumber").removeClass("mynumber-active");
	$("#number_<?=$_GET[id]?>").addClass("mynumber-active");
</script>

<?php
$day_now =  date('D');
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[shop] = $db->select_query("SELECT * FROM  shopping_open_time where product_id=".$_GET[product_id]." and product_day = '$day_now'     ");
$arr[shop] = $db->fetch($res[shop]) ;
if($arr[shop][open_always] == 1){
$finish_h =  "23";
$finish_m =  "59";
}else{
$finish_h =  $arr[shop][finish_h]*1;
$finish_m =  $arr[shop][finish_m];
}

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
				</div>
				<TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0 style="margin-top:40px">
					<?php
					
					$time_h_now = date('H')*1;
					for($i=$time_h_now;$i<=$finish_h;$i++){
						$bgcolor = ($c++ & 1) ? '#FFFFFF' : '#FFF';
						if($count==0){ echo "<TR bgcolor=".$bgcolor.">"; }
						if($i < 10){
							$i = "0".$i;
						}
						?>
						<td  valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
								<tr>
									<td >
										<script>
											$("#number_<?=$i?>").click(function(){
													$('#time_h_number').html('<?=$i?>');
													$('#airout_h').val(<?=$i?>);
													$(".mynumber").removeClass("mynumber-active");
													var num_a=$('#airout_h').val();
													$("#number_<?=$i?>").addClass("mynumber-active");
													$( "#load_mod_popup_4" ).toggle();
													if(<?=$i?> > 0){
														$("#time_h_number").removeClass("border-alert");
														$("#time_h_number").addClass("border-alert-no");
													}
													if(document.getElementById('airout_h').value=="0" ) {
														$("#time_h_number").removeClass("border-alert-no");
														$("#time_h_number").addClass("border-alert");
														///
														return false ;
													}
												});
										</script>
										<div class="mynumber" id="number_<?=$i?>" >
											<?=$i?>
										</div>
									</td>
								</tr>
							</table></TD>
						<?
						$count++;
						if(($count%2) == 0){ echo ""; $count=0; }
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