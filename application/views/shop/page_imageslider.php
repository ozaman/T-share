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
    <link href="<?=base_url();?>assets/photoswipe/site17e2.css?v=4.1.1-1.0.4" rel="stylesheet" />
    <link href="<?=base_url();?>assets/photoswipe/photoswipe17e2.css?v=4.1.1-1.0.4" rel="stylesheet" />
    <link href="<?=base_url();?>assets/photoswipe/default-skin/default-skin17e2.css?v=4.1.1-1.0.4" rel="stylesheet" />
    
    
      <script src="<?=base_url();?>assets/photoswipe/photoswipe.min17e2.js?v=4.1.1-1.0.4"></script>
      <script src="<?=base_url();?>assets/photoswipe/photoswipe-ui-default.min17e2.js?v=4.1.1-1.0.4"></script>
      <!-- <span class="pull-right"><i class="fa fa-share-square-o" aria-hidden="true"></i></span> -->
   <ul class="social_box table" id="social-btn" data-type="news"> 
    <li class="table-cell bg_fb"> 
      <a href="https://www.facebook.com/sharer.php?u=https://www.welovetaxi.com/app/data/pic/place/<?=$FILE_IMG[0]->s_name;?>" target="_blank" class="set-share-social" data-type="facebook" id="facebook-shear"> <span class="fa fa-facebook" style="color: #FFF;"></span> </a> 
    </li> 
    <li class="table-cell bg_line"> 
      <a href="https://timeline.line.me/social-plugin/share?url=https://www.welovetaxi.com/app/data/pic/place/<?=$FILE_IMG[0]->s_name;?>" target="_blank" class="set-share-social" data-type="line" id="line-shear"> <span class="fa fa-faceboo" style="font-family: inherit;
    color: #FFF;
    font-size: 17px;
    font-weight: 600;">LINE</span> </a> 
    </li> 
    <li class="table-cell bg_mail"> <a href="https://twitter.com/intent/tweet?url=https://www.welovetaxi.com/app/data/pic/place/<?=$FILE_IMG[0]->s_name;?>" target="_blank" class="set-share-social" data-type="twitter"> <span class="fa fa-twitter" style="color: #FFF;"></span> </a> 
    </li> 

  </ul>
</section>
<!-- <span class="left" style="position: absolute; z-index: 5;">

  <ons-toolbar-button onclick="prev()">
    <ons-icon icon="md-chevron-left" style="    font-size: 31px;
    margin-top: 40vh;"></ons-icon>
  </ons-toolbar-button>
</span> -->
<!-- <span class="pull-right" style="right: 0px; position: absolute; z-index: 5;">
  <ons-toolbar-button onclick="next()">
    <ons-icon icon="md-chevron-right" style="    font-size: 31px;
    margin-top: 40vh;"></ons-icon>
  </ons-toolbar-button>
</span> -->
<style>
  .arrow{
        display: inline-block;
    width: 12px;
    height: 12px;
    background: #333;
    border-radius: 50px;
  }
  .arrow_s{
        background: #9E9E9E;
  }
</style>
<div style="text-align: center;
    z-index: 5555;
    position: absolute;
    width: 100%;
    height: 50px;
    bottom: 0;">
<?php
 foreach($FILE_IMG as $key=>$row){

    ?>
<div class="arrow" id="arrow_<?=$key;?>" ></div>
<?php } ?>
</div>
<ons-carousel fullscreen swipeable auto-scroll overscrollable id="carousel" class="gallery">


  <?php
  foreach($FILE_IMG as $key=>$row){

    ?>

    <ons-carousel-item style="">
      <a href="https://www.welovetaxi.com/app/data/pic/place/<?=$row->s_name;?>" data-size="1600x1600" data-med="https://www.welovetaxi.com/app/data/pic/place/<?=$row->s_name;?>" data-med-size="1024x1024" data-author="Folkert Gorter" class="demo-gallery__img--mainss">
      <!-- <div style="text-align: center; font-size: 30px; margin-top: 20px; color: #fff;"> -->
        <img src="https://www.welovetaxi.com/app/data/pic/place/<?=$row->s_name;?>" width="100%">
        <!-- </div> -->
      </a>
      </ons-carousel-item>

    <?php } ?>

  </ons-carousel>
  <style type="text/css">
  .social_box{
        margin: 5px;
    text-align: center;
    list-style: none;
    padding-left: 0;
  }
  .social_box > li {
       display: inline-block;
   width: 25%;
   /* height: 60px; */
   text-align: center;
   color: #fff;
   position: relative;
   padding: 5px;
   border-radius: 4px;
   margin: auto;
 }
 .bg_fb{
  background: #3F51B5;
  color: #fff;

}
.bg_mail{
  background: #1da1f2;
  color: #fff;
}

.bg_line{
  background: #00b900;

  color: #fff;
}
</style>
<script type="text/javascript">
    
    (function() {
 $('#arrow_0').addClass('arrow_s');
    var initPhotoSwipeFromDOM = function(gallerySelector) {

      var parseThumbnailElements = function(el) {
          var thumbElements = el.childNodes,
              numNodes = thumbElements.length,
              items = [],
              el,
              childElements,
              thumbnailEl,
              size,
              item;

          for(var i = 0; i < numNodes; i++) {
              el = thumbElements[i];

              // include only element nodes 
              if(el.nodeType !== 1) {
                continue;
              }

              childElements = el.children;

              size = el.getAttribute('data-size').split('x');

              // create slide object
              item = {
            src: el.getAttribute('href'),
            w: parseInt(size[0], 10),
            h: parseInt(size[1], 10),
            author: el.getAttribute('data-author')
              };

              item.el = el; // save link to element for getThumbBoundsFn

              if(childElements.length > 0) {
                item.msrc = childElements[0].getAttribute('src'); // thumbnail url
                if(childElements.length > 1) {
                    item.title = childElements[1].innerHTML; // caption (contents of figure)
                }
              }


          var mediumSrc = el.getAttribute('data-med');
                if(mediumSrc) {
                  size = el.getAttribute('data-med-size').split('x');
                  // "medium-sized" image
                  item.m = {
                      src: mediumSrc,
                      w: parseInt(size[0], 10),
                      h: parseInt(size[1], 10)
                  };
                }
                // original image
                item.o = {
                  src: item.src,
                  w: item.w,
                  h: item.h
                };

              items.push(item);
          }

          return items;
      };

      // find nearest parent element
      var closest = function closest(el, fn) {
          return el && ( fn(el) ? el : closest(el.parentNode, fn) );
      };

      var onThumbnailsClick = function(e) {
          e = e || window.event;
          e.preventDefault ? e.preventDefault() : e.returnValue = false;

          var eTarget = e.target || e.srcElement;

          var clickedListItem = closest(eTarget, function(el) {
              return el.tagName === 'A';
          });

          if(!clickedListItem) {
              return;
          }

          var clickedGallery = clickedListItem.parentNode;

          var childNodes = clickedListItem.parentNode.childNodes,
              numChildNodes = childNodes.length,
              nodeIndex = 0,
              index;

          for (var i = 0; i < numChildNodes; i++) {
              if(childNodes[i].nodeType !== 1) { 
                  continue; 
              }

              if(childNodes[i] === clickedListItem) {
                  index = nodeIndex;
                  break;
              }
              nodeIndex++;
          }

          if(index >= 0) {
              openPhotoSwipe( index, clickedGallery );
          }
          return false;
      };

      var photoswipeParseHash = function() {
        var hash = window.location.hash.substring(1),
          params = {};

          if(hash.length < 5) { // pid=1
              return params;
          }

          var vars = hash.split('&');
          for (var i = 0; i < vars.length; i++) {
              if(!vars[i]) {
                  continue;
              }
              var pair = vars[i].split('=');  
              if(pair.length < 2) {
                  continue;
              }           
              params[pair[0]] = pair[1];
          }

          if(params.gid) {
            params.gid = parseInt(params.gid, 10);
          }

          return params;
      };

      var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
          var pswpElement = document.querySelectorAll('.pswp')[0],
              gallery,
              options,
              items;

        items = parseThumbnailElements(galleryElement);

          // define options (if needed)
          options = {

              galleryUID: galleryElement.getAttribute('data-pswp-uid'),

              getThumbBoundsFn: function(index) {
                  // See Options->getThumbBoundsFn section of docs for more info
                  var thumbnail = items[index].el.children[0],
                      pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                      rect = thumbnail.getBoundingClientRect(); 

                  return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
              },

              addCaptionHTMLFn: function(item, captionEl, isFake) {
            if(!item.title) {
              captionEl.children[0].innerText = '';
              return false;
            }
            captionEl.children[0].innerHTML = item.title +  '<br/><small>Photo: ' + item.author + '</small>';
            return true;
              },
          
          };


          if(fromURL) {
            if(options.galleryPIDs) {
              // parse real index when custom PIDs are used 
              // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
              for(var j = 0; j < items.length; j++) {
                if(items[j].pid == index) {
                  options.index = j;
                  break;
                }
              }
            } else {
              options.index = parseInt(index, 10) - 1;
            }
          } else {
            options.index = parseInt(index, 10);
          }

          // exit if index not found
          if( isNaN(options.index) ) {
            return;
          }



        var radios = document.getElementsByName('gallery-style');
        for (var i = 0, length = radios.length; i < length; i++) {
            if (radios[i].checked) {
                if(radios[i].id == 'radio-all-controls') {

                } else if(radios[i].id == 'radio-minimal-black') {
                  options.mainClass = 'pswp--minimal--dark';
                  options.barsSize = {top:0,bottom:0};
              options.captionEl = false;
              options.fullscreenEl = false;
              options.shareEl = false;
              options.bgOpacity = 0.85;
              options.tapToClose = true;
              options.tapToToggleControls = false;
                }
                break;
            }
        }

          if(disableAnimation) {
              options.showAnimationDuration = 0;
          }

          // Pass data to PhotoSwipe and initialize it
          gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);

          // see: http://photoswipe.com/documentation/responsive-images.html
        var realViewportWidth,
            useLargeImages = false,
            firstResize = true,
            imageSrcWillChange;

        gallery.listen('beforeResize', function() {

          var dpiRatio = window.devicePixelRatio ? window.devicePixelRatio : 1;
          dpiRatio = Math.min(dpiRatio, 2.5);
            realViewportWidth = gallery.viewportSize.x * dpiRatio;


            if(realViewportWidth >= 1200 || (!gallery.likelyTouchDevice && realViewportWidth > 800) || screen.width > 1200 ) {
              if(!useLargeImages) {
                useLargeImages = true;
                  imageSrcWillChange = true;
              }
                
            } else {
              if(useLargeImages) {
                useLargeImages = false;
                  imageSrcWillChange = true;
              }
            }

            if(imageSrcWillChange && !firstResize) {
                gallery.invalidateCurrItems();
            }

            if(firstResize) {
                firstResize = false;
            }

            imageSrcWillChange = false;

        });

        gallery.listen('gettingData', function(index, item) {
            if( useLargeImages ) {
                item.src = item.o.src;
                item.w = item.o.w;
                item.h = item.o.h;
            } else {
                item.src = item.m.src;
                item.w = item.m.w;
                item.h = item.m.h;
            }
        });

          gallery.init();
      };

      // select all gallery elements
      var galleryElements = document.querySelectorAll( gallerySelector );
      for(var i = 0, l = galleryElements.length; i < l; i++) {
        galleryElements[i].setAttribute('data-pswp-uid', i+1);
        galleryElements[i].onclick = onThumbnailsClick;
      }

      // Parse URL and open gallery if it contains #&pid=3&gid=1
      var hashData = photoswipeParseHash();
      if(hashData.pid && hashData.gid) {
        openPhotoSwipe( hashData.pid,  galleryElements[ hashData.gid - 1 ], true, true );
      }
    };

    initPhotoSwipeFromDOM('.gallery');

  })();

  </script>



    
    

    



    <!-- analytics -->
    <script>
    (function() {

      var url = window.location.href.toLowerCase();
      if(url.indexOf('photoswipe') === -1) {
        return;
      } 

      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-49016964-1', 'photoswipe.com');
      ga('send', 'pageview');

      function trackJavaScriptError(e) {
        e = e || window.event;
        if(!e || !e.message || !e.lineno){ 
          return true; 
        }
        var errMsg = e.message;
        var errSrc = e.filename + ': ' + e.lineno;
        ga('send', 'event', 'JavaScript Error', errMsg, errSrc, { 'nonInteraction': 1 });
      }

      if (window.addEventListener) {
        window.addEventListener('error', trackJavaScriptError, false);
      } else if (window.attachEvent) {
        window.attachEvent('onerror', trackJavaScriptError);
      } else {
        window.onerror = trackJavaScriptError;
      }


      (function (d, w, c) {
          (w[c] = w[c] || []).push(function() {
              try {
                  w.yaCounter24301471 = new Ya.Metrika({id:24301471,
                          webvisor:false,
                          clickmap:false});
              } catch(e) { }
          });

          var n = d.getElementsByTagName("script")[0],
              s = d.createElement("script"),
              f = function () { n.parentNode.insertBefore(s, n); };
          s.type = "text/javascript";
          s.async = true;
          s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

          if (w.opera == "[object Opera]") {
              d.addEventListener("DOMContentLoaded", f, false);
          } else { f(); }
      })(document, window, "yandex_metrika_callbacks");

    })();
    </script>

