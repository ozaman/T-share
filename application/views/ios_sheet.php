<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta charset="utf-8">
		<title></title>
	</head>
  
  <link rel="stylesheet" href="<?=base_url();?>assets/onsenui/css/onsenui.css?v=<?=time()?>">
  <link rel="stylesheet" href="<?=base_url();?>assets/onsenui/css/onsen-css-components.css?v=<?=time()?>">
  <script src="<?=base_url();?>assets/onsenui/js/onsenui.min.js?v=<?=time()?>"></script>
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/ultimate/flaticon.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/airport/flaticon.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/payment/css/fontello.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/icomoon/demo-files/demo.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/app/css/app-icon.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/app-new/css/app-icon.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/extra.main.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/custom.css?v=<?=time()?>">
    
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://www.welovetaxi.com:3443/socket.io/socket.io.js?v=<?=time();?>"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  <script src="<?=base_url();?>assets/plugin/moment.js?v=<?=time()?>"></script>
	<body>
	<ons-modal direction="up">
	    <div style="text-align: center;">
	        <p sty>
	            <ons-icon icon="md-spinner" size="25px" spin></ons-icon> <span size="18px">Loading...</span>
	        </p>
	    </div>
	</ons-modal>
	<script>
		var modal = document.querySelector('ons-modal');
		modal.show();
		var today = "<?=date('Y-m-d');?>";
		var base_url = "<?=base_url();?>";
		var detect_user = $.cookie("detect_user");
   	  	var class_user = $.cookie("detect_userclass");
      	var username = $.cookie("detect_username");
	</script>
	<ons-navigator swipeable id="myNavigator" page="page1.html"></ons-navigator>

	<template id="page1.html">
	  	<ons-page id="page1">
	    
	    <div id="body_popup1">
	    	
	    </div>
	    
	  	</ons-page>
	</template>

	</body>
<script src="<?=base_url();?>assets/custom.js?<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/shop.js?v=<?=time();?>"></script>

</html>