<?php 
$google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";
$query = $this->db->query("select * from shopping_product where id = '".$_GET[id]."' ");
$row_product = $query->row();
/*echo json_encode($row_product);
exit;*/
 if($row_product->lat>0 and $row_product->lng>0){
 	$url = "https://www.google.com/maps/embed/v1/directions?key=".$google_api."&destination=".$row_product->address."&origin=".$row_product->lat.",".$row_product->lng."&center=".$row_product->lat.",".$row_product->lng."&avoid=tolls|highways&zoom=14";
 }else{
 	$url = "https://www.google.com/maps/embed/v1/place?key=".$google_api."&q=".$row_product->address."&zoom=16";
 }
?>

<style>
	.load_preview_map {
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	 overflow:hidden;
/*	background: url('images/loading.gif') 50% 50% no-repeat rgb(249,249,249); */
	background-color:#FFFFFF
}
</style>
 
 
 <div id="dv_map" class="load_preview_map">
 <iframe width="100%"  height="100%"  frameborder="0" style="border:0" src="<?=$url;?>" allowfullscreen></iframe>
 </div>
