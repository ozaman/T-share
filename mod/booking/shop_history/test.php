<?php 
//echo json_encode($_POST[data]);
//echo count($_POST[data]);
?>
<script>
	var obj = JSON.parse('<?=json_encode($_POST[data]);?>');
	console.log(obj);
</script>