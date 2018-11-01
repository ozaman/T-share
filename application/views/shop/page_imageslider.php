<?php 
$_where = array();
 $_where[product_id] = $_GET[shop_id];
 $_select = array('*');
 $_order = array();
 $_order[i_index] = 'asc';
 $FILE_IMG = $this->Main_model->fetch_data('','',TBL_SHOP_DOCCUMENT_FILE_IMG,$_where,$_select,$_order);

 ?>
 <!-- <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>


  <div class="fb-share-button" 
    data-href="https://www.your-domain.com/your-page.html" 
    data-layout="button_count">
  </div> -->
  <section>
   <ul class="social_box table" id="social-btn" data-type="news"> 
    <li class="table-cell bg_fb"> 
      <a href="https://www.facebook.com/sharer.php?u=http://www.siamsport.co.th/football/premierleague/view/98011" target="_blank" class="set-share-social" data-type="facebook" id="facebook-shear"> <span class="fa fa-facebook"></span> </a> 
    </li> 
      <li class="table-cell bg_line"> 
        <a href="https://timeline.line.me/social-plugin/share?url=http://www.siamsport.co.th/football/premierleague/view/98011" target="_blank" class="set-share-social" data-type="line" id="line-shear"> <span class="fa fa-faceboo"></span> </a> 
      </li> 
      <li class="table-cell bg_mail"> <a href="https://twitter.com/intent/tweet?text=กำหนดการพระราชทานน้ำหลวงอาบศพและสวดอภิธรรมคุณวิชัย&amp;url=http://www.siamsport.co.th/football/premierleague/view/98011&amp;via=siamsport_news" target="_blank" class="set-share-social" data-type="twitter"> <span class="fa fa-twitter"></span> </a> 
      </li> 
      </ul>
       </section>
 <span class="left" style="position: absolute; z-index: 5;">
           
          <ons-toolbar-button onclick="prev()">
            <ons-icon icon="md-chevron-left" style="    font-size: 31px;
    margin-top: 40vh;"></ons-icon>
        </ons-toolbar-button>
    </span>
    <span class="pull-right" style="right: 0px; position: absolute; z-index: 5;">
      <ons-toolbar-button onclick="next()">
        <ons-icon icon="md-chevron-right" style="    font-size: 31px;
    margin-top: 40vh;"></ons-icon>
    </ons-toolbar-button>
</span>
 <ons-carousel fullscreen swipeable auto-scroll overscrollable id="carousel">
  
    
<?php
foreach($FILE_IMG as $key=>$row){
?>
    <ons-carousel-item style="">
      <!-- <div style="text-align: center; font-size: 30px; margin-top: 20px; color: #fff;"> -->
        <img src="https://www.welovetaxi.com/app/data/pic/place/<?=$row->s_name;?>" width="100%">
      <!-- </div> -->
    </ons-carousel-item>
    
 <?php } ?>

 </ons-carousel>
 <style type="text/css">
   .social_box > li {
    width: 25%;
    height: 60px;
    text-align: center;
    background-color: #000;
    color: #fff;
    position: relative;
}
 </style>
