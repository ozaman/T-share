<!DOCTYPE html>

<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css" />
<style>

.container {
  overflow: hidden;
  width: 400px;
  height: 400px;
  margin: 0 auto;
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
  cursor: crosshair
}
</style>



<div class="container"> 
<img src="../../../data/fileupload/doc_place/king.jpg" style="width:inherit;height:inherit" /> 
</div>


<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.js"></script> 
<script src="../../js/beepPanZoom.js"></script> 
<script>
$(".container").beepPanZoom();
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

