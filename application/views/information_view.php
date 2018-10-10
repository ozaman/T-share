<ons-carousel id="carousel" fullscreen swipeable auto-scroll overscrollable initial-index="0">
      <ons-carousel-item class="carousel-item" style="background-color: gray">
        <div class="color-tag">Gray</div>
      </ons-carousel-item>
      <ons-carousel-item class="carousel-item" style="background-color: #085078">
        <div class="color-tag">Blue</div>
      </ons-carousel-item>
      <ons-carousel-item class="carousel-item" style="background-color: #373B44">
        <div class="color-tag">Dark</div>
      </ons-carousel-item>
      <ons-carousel-item class="carousel-item" style="background-color: #D38312">
        <div class="color-tag">Orange</div>
      </ons-carousel-item>
    </ons-carousel>

    <div class="dots">
      <span id="dot0" class="dot" onclick="fn.swipe(this)">
        &#9679;
      </span>
      <span id="dot1" class="dot" onclick="fn.swipe(this)">
        &#9675;
      </span>
      <span id="dot2" class="dot" onclick="fn.swipe(this)">
        &#9675;
      </span>
      <span id="dot3" class="dot" onclick="fn.swipe(this)">
        &#9675;
      </span>
    </div>

    <script>
      ons.getScriptPage().onInit = function () {
//        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
        const carousel = document.getElementById('carousel');
        carousel.addEventListener('postchange', function () {
          var index = carousel.getActiveIndex();
          const dots = document.querySelectorAll('.dot');
          for (dot of dots) {
            dot.innerHTML = dot.id === 'dot' + index ? '&#9679;' : '&#9675;';
          }
        });
        window.fn.swipe = function (target) {
          carousel.setActiveIndex(Number(target.id.slice(-1)));
        }
      }
    </script>

    <style>
      .carousel-item {
        display: flex;
        justify-content: space-around;
        align-items: center;
      }

      .color-tag {
        color: #fff;
        font-size: 48px;
        font-weight: bold;
        text-transform: uppercase;
      }

      .dots {
        text-align: center;
        font-size: 30px;
        color: #fff;
        position: absolute;
        bottom: 40px;
        left: 0;
        right: 0;
      }

      .dots > span {
        cursor: pointer;
      }
    </style>