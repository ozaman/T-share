  <link rel="stylesheet" href="js/swiper_slide/dist/css/swiper.min.css" />
  <style>
   /* html, body {
      position: relative;
      height: 100%;
    }
    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;
    }*/
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
    	margin-bottom : 20px;
    	font-size: 22px;
	}
  </style>
  <? 
$id = $_GET[id];
//$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);            
//$query = $db->select_query("SELECT text_pic_book,text_pic_book_2,text_pic_book_3 FROM  shopping_product where id = '".$id."'  ");
//$$query_show = $db->fetch($query);
$conn = new mysqli('localhost', 'admin_MANbooking', '252631MANbooking', 'admin_app');
$sql = "SELECT text_pic_book,text_pic_book_2,text_pic_book_3 FROM  shopping_product where id = '".$id."'  ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 ?>
  <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <? if($_GET[pic1]==1){ ?>
      <div class="swiper-slide bg-color">
      <img src="../data/pic/place/<?=$id?>_book.jpg" width="100%" />
      <div class="txt-caption"><span><?=$row[text_pic_book];?></span></div>
      </div>
      <? } ?>
      <? if($_GET[pic2]==1){ ?>
      <div class="swiper-slide bg-color">
      <img src="../data/pic/place/<?=$id?>_book_2.jpg.jpg" width="100%" />
      <div class="txt-caption"><span><?=$row[text_pic_book_2];?></span></div>
      </div>
      <? } ?>
      <? if($_GET[pic3]==1){ ?>
      <div class="swiper-slide bg-color">
      <img src="../data/pic/place/<?=$id?>_book_3.jpg" width="100%" />
      <div class="txt-caption"><span><?=$row[text_pic_book_3];?></span></div>
      </div>
      <? 	} ?>
      <!--<div class="swiper-slide">Slide 3</div>
      <div class="swiper-slide">Slide 4</div>
      <div class="swiper-slide">Slide 5</div>
      <div class="swiper-slide">Slide 6</div>
      <div class="swiper-slide">Slide 7</div>
      <div class="swiper-slide">Slide 8</div>
      <div class="swiper-slide">Slide 9</div>
      <div class="swiper-slide">Slide 10</div>-->
    </div>
  </div>
  <!-- Swiper JS -->
  <script src="js/swiper_slide//dist/js/swiper.min.js"></script>
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container');
  </script>

