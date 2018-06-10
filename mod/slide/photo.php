<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="description" content="SlidesJS is a simple slideshow plugin for jQuery. Packed with a useful set of features to help novice and advanced developers alike create elegant and user-friendly slideshows.">
  <meta name="author" content="Nathan Searles">
  <!-- SlidesJS Required (if responsive): Sets the page width to the device width. -->
  <meta name="viewport" content="width=device-width">
  <!-- End SlidesJS Required -->
  <!-- CSS for slidesjs.com example -->
  <link rel="stylesheet" href="example.css">
  <link rel="stylesheet" href="font-awesome.min.css">
  <!-- End CSS for slidesjs.com example -->
  <!-- SlidesJS Optional: If you'd like to use this design -->
  <style>
    body {
      -webkit-font-smoothing: antialiased;
      font: normal 15px/1.5 "Helvetica Neue", Helvetica, Arial, sans-serif;
      color: #232525;
      padding-top: 50px;
      background-color: #000000;
    }
    #slides,
    #slides2,
    #slides3 {
      display: nones;
      margin-bottom:50px;
    }
    .slidesjs-navigation {
      margin-top:3px;
    }
    .slidesjs-pagination {
      margin: 6px 0 0;
      float: right;
      list-style: none;
    }
    .slidesjs-pagination li {
      float: left;
      margin: 0 1px;
    }
    .slidesjs-pagination li a { margin-top:10px;
      display: block;
      width: 13px;
      height: 0;
      padding-top: 13px;
      background-image: url(images/pagination.png);
      background-position: 0 0;
      float: left;
      overflow: hidden; display:nones;
    }
    .slidesjs-pagination li a.active,
    .slidesjs-pagination li a:hover.active {
      background-position: 0 -13px
    }
    .slidesjs-pagination li a:hover {
      background-position: 0 -26px
    }
    a:link,
    a:visited {
      color: #FFF
    }
    a:hover,
    a:active {
      color: #F7941D
    }
    .navbar {
      overflow: hidden
    }
  </style>
  <!-- End SlidesJS Optional-->
  <!-- SlidesJS Required: These styles are required if you'd like a responsive slideshow -->
  <style>
    #slides {
      display: none
    }
    .container {
      margin: 0 auto
    }
    /* For tablets & smart phones */
    @media (max-width: 767px) {
      body {
	padding-left: 0px;
	padding-right: 0px;
	background-color: #000000;
      }
      .container {
        width: auto
      }
    }
    /* For smartphones */
    @media (max-width: 480px) {
      .container {
        width: auto
      }
    }
    /* For smaller displays like laptops */
    @media (min-width: 768px) and (max-width: 979px) {
      .container {
        width: 724px
      }
    }
    /* For larger displays */
    @media (min-width: 1200px) {
      .container {
        width: 1170px
      }
    }
  </style>
  <!-- SlidesJS Required: -->
</head>
<?php 
$get_lng           = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
$get_lng           = $get_lng[0];
$check_lng_browser = explode('-', $get_lng);
$check_lng_browser = $check_lng_browser[0];
if ($check_lng_browser == 'ch' or $check_lng_browser == 'zh' or $check_lng_browser == 'sh') {
    $keep = 'cn';
} else if ($check_lng_browser == 'th') {
    $keep = 'th';
} else {
    $keep = 'en';
}
switch ($_COOKIE['lng']) {
    case "th":
        //echo "PAGE th";
        include("../../includes/lang/th/t_share_2.php"); //include check session DE
        $province           = "name_th";
        $place_shopping     = "topic_th";
        $google_map_api_lng = "th";
        break;
    case "cn":
        //echo "PAGE cn";
        include("../../includes/lang/cn/t_share_2.php");
        $province           = "name_cn";
        $place_shopping     = "topic_cn";
        $google_map_api_lng = 'zh-CN';
        break;
    case "en":
        //echo "PAGE EN";
        include("../../includes/lang/en/t_share_2.php");
        $google_map_api_lng = "en";
        $place_shopping     = "topic_en";
        $province           = "name";
        break;
    default:
        //echo "PAGE EN - Setting Default";
        include("../../includes/lang/" . $keep . "/t_share_2.php"); //include EN in all other cases of different lang detection
        //        $google_map_api_lng = $keep;
        $province           = "name_" . $keep;
        $place_shopping     = "topic_" . $keep;
        $google_map_api_lng = $keep;
        break;
}
?>
<body>
<!-- SlidesJS Required: Start Slides -->
  <!-- The container is used to define the width of the slideshow -->
  <div style="padding:5px; font-size:20px; color:#F7941D"> <center>
    <strong> <? echo t_time_taking_photo." ".date('Y-m-d H:i:s',$_GET[date]).t_n; ?></strong>
     </center>
     </div>   
  <div class="container">
    <div id="slides1">
		<?php 
		$path = '../../../data/fileupload/store/'.$_GET[type].'_'.$_GET[id].'.jpg?v='.time();
		if($_GET[type]=='doc_pay'){
			$path = '../../../data/fileupload/doc_pay_driver/'.$_GET[plan].'_'.$_GET[id].'.jpg?v='.time();
		}
		if($_GET[tb]=='1'){
			$path = '../../../data/fileupload/store/tbooking/'.$_GET[type].'_'.$_GET[id].'.jpg?v='.time();
		}
		?>
      <img src="<?=$path;?>" style="width:100%"  >
   <!--  <a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left" style="font-size:20px; padding-right:20px; margin-top:10px;" ></i></a>&nbsp;&nbsp;&nbsp;
      <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right"  style="font-size:20px; margin-right:0px;"></i></a>-->
    </div>
  </div>      
<!-- End SlidesJS Required: Start Slides -->
  <!-- SlidesJS Required: Link to jQuery -->
  <script src="jquery-main.js"></script>
  <!-- End SlidesJS Required -->
  <!-- SlidesJS Required: Link to jquery.slides.js -->
  <script src="jquery.slides.min.js"></script>
  <!-- End SlidesJS Required -->
  <!-- SlidesJS Required: Initialize SlidesJS with a jQuery doc ready -->
  <script>
    $(function() {
      $('#slides').slidesjs({
        width: 940,
        height: 1200,
        navigation: false
      });
      /*
        To have multiple slideshows on the same page
        they just need to have separate IDs
      */
      $('#slides2').slidesjs({
        width: 940,
        height: 1000,
        navigation: false,
        start: 3,
        play: {
          auto: true
        }
      });
      $('#slides3').slidesjs({
        width: 940,
        height: 1000,
        navigation: false
      });
    });
  </script>
  <!-- End SlidesJS Required -->
</body>
</html>