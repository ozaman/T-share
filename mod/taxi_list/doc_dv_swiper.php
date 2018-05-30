  <link rel="stylesheet" href="js/swiper_slide/dist/css/swiper.min.css" />
  <style>

    .swiper-container {
      width: 100%;
      height: 100%;
    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
	.bg-color{
		background-color : #000000;
	}
	.txt-caption{
    	position: absolute;
    	color: #fff;
    	bottom: 0px;
    	padding: 10px 5px;
    	margin-bottom : 50px;
    	font-size: 22px;
	}
  </style>

  <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
  <? 
if($_GET[type]=='idcard'){
	$path = 'id_card';
}else if($_GET[type]=='iddriving'){
	$path = 'id_driving';
}
$files = "../data/pic/driver/".$path."/".$_GET[driver_id]."_".$_GET[type].".jpg";
 $pic_qr = file_exists($files); 

  ?>
      <div class="swiper-slide bg-color">
      <img src="<?=$files;?>" width="100%" />
      
      <div class="txt-caption"><span><?=$_GET[caption];?></span></div>
      </div>

    </div>
  </div>
  <!-- Swiper JS -->
  <script src="js/swiper_slide//dist/js/swiper.min.js"></script>
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container');
  </script>

