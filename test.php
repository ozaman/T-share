<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<body>
<button class="show">go</button>
<button class="hide">back</button>
<br/>
<div class="w3-container w3-center " style="margin-top: 25px;border: 1px solid" id="div1">
  <h1>Animation 1 !</h1>
  <p>The w3-animate-right class slides in an element from the right.</p>
</div>

<div class="w3-container w3-center w3-animate-right" style="display: none;margin-top: 25px;border: 1px solid" id="div2">
  <h1>Animation 2 !</h1>
  <p>The w3-animate-right class slides in an element from the right.</p>
</div>
<script>
	$('.show').click(function(){
		$('#div1').hide();
		$('#div2').show();
	});
	$('.hide').click(function(){
		$('#div2').hide();
		$('#div1').addClass('w3-animate-left');
		$('#div1').show();
	});
</script>
</body>
</html>
