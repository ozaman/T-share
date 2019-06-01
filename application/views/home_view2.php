<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
  <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
  <script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
</head>
<body>
  <a class="button" onclick="performClick2('xxxwww100');"><b>aaaaaaaaa</b></a><br/><br/><br/>
      <input type="file" accept="image/*" id="xxxwww100"  >
        <br/><br/><br/>
        <a href="https://www.welovetaxi.com/app/test.php">9999999999999999999999999</a>
        <script>
          function performClick2(elemId) {

            //console.log(elemId);
            var elem = document.getElementById(elemId);
            if (elem && document.createEvent) {
              var evt = document.createEvent("MouseEvents");
              evt.initEvent("click", true, false);
              elem.dispatchEvent(evt);
//                  alert(elemId);
            }
          }
          function sssssssssssssssss(elemId) {
          $("#"+elemId).click();
//            alert(elemId);
        }
              
          function ddd(){
            console.log(1);
          }
              
        </script>
  <ons-button onclick="$('#xxxwww100').click();">Click me!</ons-button>
</body>
</html>