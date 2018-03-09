<div id="load_work_preview_map" style="margin-top: 0px; height:100%; overflow:hidden;  " class="map-page-loader">
	<iframe width="100%" height="100%" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&amp;q=<?=$_GET[lat];?>,<?=$_GET[lng];?>&amp;zoom=14" allowfullscreen="">
		
	</iframe>
</div>
<script >
	console.log(<?=$_GET[lat];?>)
	console.log(<?=$_GET[lng];?>)
	$(".text-topic-action-mod-2" ).html("ถึงสถานที่รับแขก");
</script>