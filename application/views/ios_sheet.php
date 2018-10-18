<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta charset="utf-8">
		<title></title>
	</head>
  <?php 
if($this->Mobile_model->version('iPad')){
    // Code to run for the Apple iOS platform.
$fontmobile=0;
$detectname='iPad';
$menu_ion_class = "icon-menu-ios";
$border_menu_color = "#ccc";
}
if($this->Mobile_model->version('iPhone')){
    // Code to run for the Apple iOS platform.
$fontmobile=0;
$detectname='iPhone';
$menu_ion_class = "icon-menu-ios";
$border_menu_color = "#ccc";
}
if($this->Mobile_model->version('Android')){
    // Code to run for the Apple iOS platform.
$fontmobile=6;
$detectname='Android';
$menu_ion_class = "icon-menu-android";
$border_menu_color = "#eee";
}
else {
$fontmobile=6;	
$detectname='Other';
$menu_ion_class = "icon-menu-ios";
$border_menu_color = "#ccc";
}
$border_menu_color = "border-bottom: 1px solid ".$border_menu_color;
?>
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
//		modal.show();
		var today = "<?=date('Y-m-d');?>";
		var base_url = "<?=base_url();?>";
		var detect_user = $.cookie("detect_user");
   	  	var class_user = $.cookie("detect_userclass");
      	var username = $.cookie("detect_username");
      	var get_order_id = '<?=$_GET[order_id];?>';
        var status = '<?=$_GET[status];?>';
        var open_ic = '<?=$_GET[open_ic];?>';
        var detect_mb = "<?=$detectname;?>";
	</script>
	<ons-navigator swipeable id="myNavigator" page="page1.html"></ons-navigator>

	<template id="page1.html">
	  	<ons-page id="page1">
	    
	    <div id="body_popup1">
	    	
	    </div>
	    
	  	</ons-page>
	</template>
	
	<template id="popup2.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
               
            </ons-toolbar>
            <div id="body_popup2">
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>
	</body>
	<script>
		window.fn = {};
		window.fn.toggleMenu = function() {
        document.getElementById('appSplitter').left.toggle();
    };
    window.fn.loadView = function(index) {
        document.getElementById('appTabbar').setActiveTab(index);
        document.getElementById('sidemenu').close();
    };
    window.fn.loadLink = function(url) {
        window.open(url, '_blank');
    };
    window.fn.pushPage = function(page, anim) {
        console.log(page);
        if(page.id=="option.html"){
			console.log("option");
			if(page.open=="car_brand"){
				$.ajax({
	            url: "main/data_car_brand", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {
	            	var d1 = [],d2 = [];
	            	$.each(res, function( index, value ) {
					  	if(value.popular>0){
							d1.push(value);
						}else{
							d2.push(value);
						}
					});
					var param = { data2 : d2, data1 : d1};
					console.log(param);
	                $.post("component/cpn_car_brand",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="car_type"){
				$.ajax({
	            url: "main/data_car_type", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_car_type",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="car_color"){
				$.ajax({
	            url: "main/data_car_color", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_car_color?plate=0",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="plate_color"){
				$.ajax({
	            url: "main/data_car_plate", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_car_plate",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="car_province"){
				$.ajax({
	            url: "main/data_car_province", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
	            	console.log(res);
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_user_province?type=car",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="user_province"){
				$.ajax({
	            url: "main/data_user_province", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
	            	console.log(res);
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_user_province?type=user",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="bank_list"){
				$.ajax({
	            url: "main/data_bank_list", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
	            	console.log(res);
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_bank_list",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="car_ins"){
				$.ajax({
	            url: "main/data_car_ins_list", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
	            	console.log(res);
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_car_ins",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
		}
        if (anim) {
            document.getElementById('myNavigator').pushPage(page.id, {
                data: {
                    title: page.title
                },
                animation: anim
            });
        } 
		else {
            document.getElementById('myNavigator').pushPage(page.id, {
                data: {
                    title: page.title
                }
            });
        }
    };
	</script>
<script src="<?=base_url();?>assets/custom.js?<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/shop.js?v=<?=time();?>"></script>
<?php   $lng_map = $google_map_api_lng;?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&libraries=places&language=<?= $lng_map; ?>"></script>
</html>