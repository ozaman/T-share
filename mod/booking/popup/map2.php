  <? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?>
<?
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[shop] = $db->select_query("SELECT * FROM  shopping_product where id=".$_GET[shop_id]."  ORDER BY id  ");
                      
 $arr[shop] = $db->fetch($res[shop]) ;

?>
 
 
 
 
<style>
	.load_preview_map {
 
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	 overflow:hidden;
	background: url('images/loading.gif') 50% 50% no-repeat rgb(249,249,249); background-color:#FFFFFF
}
</style>

<script>
$('#dv_map').addClass("load_preview_map");
</script>
 
 
 
 <? if($_GET[lat]<>0){ ?>
 
 <script>

 $(".text-topic-action-mod-4" ).html("<?=$arr[shop][topic_th]?> (นำทาง)");

  </script> 

 <br>

 
 <div id="dv_map">
 <iframe width="100%"  height="100%"  frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?key=<?=$google_api?>&destination=<?=$arr[shop][address]?>&origin=<?=$_GET[lat]?>,<?=$_GET[lng]?>&center=<?=$_GET[lat]?>,<?=$_GET[lng]?>&avoid=tolls|highways&zoom=12" allowfullscreen></iframe>
 
 </div>
 
 <? } ?>
 
 
  <? if($_GET[lat]==0){ ?>
 
 <script>

 $(".text-topic-action-mod-4" ).html("<?=$arr[shop][topic_th]?> (แผนที่)");

  </script> 

<div id="dv_map">
 
<iframe 
  width="100%"
  height="100%"
  frameborder="0" style="border:0; display:nones"
  src="https://www.google.com/maps/embed/v1/place?key=<?=$google_api?>
    &q=<?=$arr[shop][address]?>&zoom=16" allowfullscreen>
</iframe>

</div>
 <? } ?>