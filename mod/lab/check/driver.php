<?
$_GET[id];
?>
<div class="alert alert-danger alert-dismissible" style="color:#FF0000; font-size:18px; margin-bottom:-5px; padding:5px;"><li class="fa fa-warning"></li>&nbsp;&nbsp;มีการเปลี่ยนแปลงคนขับ</div>
<? if($_GET[dvold]==$_GET[dvnew]){ ?>
<script>
$('#load_driver<?=$_GET[id];?>').hide();
</script>
<? } ?>
