
<!--<link href="1/ninja-slider.css" rel="stylesheet" type="text/css" />
    <script src="1/ninja-slider.js" type="text/javascript"></script>-->
    <link href="load/popup/1/ninja-slider.css?v=<?=time();?>" rel="stylesheet" type="text/css" />
    <script src="load/popup/1/ninja-slider.js?v=<?=time();?>" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <style>
        
        a {color:#1155CC;}
        ul li {padding: 10px 0;}
        ul {height: 100% !important;}
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
 
 <div style="font-size: 0px!important; color: #000000 !important;">

    <div id="ninja-slider" style="display: nones;background: #000;">
        <div class="slider-inner" style="margin-top:10px;height: 90%">
            <ul style="height: 100% !important;">
            <? if($_GET[pic1]==1){ ?>
                <li>
                    <a class="ns-img" href="../data/pic/place/<?=$id?>_book.jpg"></a>
                    <div class="caption" style="text-align:center;"><span style="font-size: 20px;color: #fff;"><?=$row[text_pic_book];?></span></div>
                </li>
               <? 	} ?>
               
             <? if($_GET[pic2]==1){ ?>
                <li><a class="ns-img" href="../data/pic/place/<?=$id?>_book_2.jpg"></a>
                    <div class="caption">@colerise</div>
                </li>
                <? 	} ?>
                
            <? if($_GET[pic3]==1){ ?>
                <li>
                    <a href="/"><img class="ns-img" src="../data/pic/place/<?=$id?>_book_3.jpg" style="cursor:pointer;" /></a>
                    <div class="caption">@colerise</div>
                </li>
             <? 	} ?>
               <!-- <li>
                    <a class="ns-img" href="../../../data/pic/place/23_logo.jpg"></a>
                    <div class="caption cap1">RESPONSIVE</div>
                    <div class="caption cap1 cap2">TOUCH·FRIENDLY</div>
                    <div class="caption">@colerise</div>
                </li>-->
            </ul>
            <div class="fs-icon" title="Expand/Close"></div>
        </div>
    </div>
    <!--end-->
<!-- </div> --> 
 </div>
 <script>
$(".button-close-popup-pic-place").click(function(){   
 
 
 
 $( "#alert_show_pic_place" ).hide();
 
  });
 
 </script>