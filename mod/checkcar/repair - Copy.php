 <img src="" id="image">
<input id="input" type="file" onchange="handleFiles()">
<script>

function handleFiles()
{
    var filesToUpload = document.getElementById('input').files;
    var file = filesToUpload[0];

    // Create an image
    var img = document.createElement("img");
    // Create a file reader
    var reader = new FileReader();
    // Set the image once loaded into file reader
    reader.onload = function(e)
    {
        img.src = e.target.result;

        var canvas = document.createElement("canvas");
        //var canvas = $("<canvas>", {"id":"testing"})[0];
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);

        var MAX_WIDTH = 400;
        var MAX_HEIGHT = 300;
        var width = img.width;
        var height = img.height;

        if (width > height) {
          if (width > MAX_WIDTH) {
            height *= MAX_WIDTH / width;
            width = MAX_WIDTH;
          }
        } else {
          if (height > MAX_HEIGHT) {
            width *= MAX_HEIGHT / height;
            height = MAX_HEIGHT;
          }
        }
        canvas.width = width;
        canvas.height = height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0, width, height);

        var dataurl = canvas.toDataURL("image/png");
        document.getElementById('image').src = dataurl;     
    }
    // Load files into file reader
    reader.readAsDataURL(file);

///alert(dataurl);
    // Post the data
   
    var fd = new FormData();
    fd.append("name", "some_filename.jpg");
    fd.append("image", dataurl);
    fd.append("info", "lah_de_dah");
   
}</script>
<!-- Modal -->
  <div class="modal fade" id="popup_pic" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Preview Image</h4>
        </div>
        <div class="modal-body">
         <canvas id="canvas"  width="640" height="480"></canvas>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
 
 <script src="mod/checkcar/isFileInputSupported.js"></script>
     <link rel="stylesheet" href="mod/checkcar/styles.css">
 
    <script>
      // Add 'fileinput' class to html if supported
      if (isFileInputSupported) {
        document.documentElement.className += " fileinput";
      }
    </script>
 

<style>
  .speech {border: 1px solid #DDD; width: 300px; padding: 0; margin: 0}
  .speech input {border: 0; width: 240px; }
  .speech img {float: right; width: 40px }
</style>
 
<!-- Search Form -->

 
<!-- HTML5 Speech Recognition API -->
<script>
  function startDictation() {
 
    if (window.hasOwnProperty('webkitSpeechRecognition')) {
 
      var recognition = new webkitSpeechRecognition();
 
      recognition.continuous = false;
      recognition.interimResults = false;
 
      recognition.lang = "th-TH";
      recognition.start();
 
      recognition.onresult = function(e) {
        document.getElementById('transcript').value
                                 = e.results[0][0].transcript;
        recognition.stop();
    //    document.getElementById('labnol').submit();
      };
 
      recognition.onerror = function(e) {
        recognition.stop();
      }
 
    }
  }
</script>


<script>
$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
		
		 
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
 
    input.trigger('fileselect', [numFiles, label]);
  });

 

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {
 
         var input = $(this).parents('.input-group').find(':text'),
		//  var button = $(this).parents('.input-group').find(':button'),
		   // var input = $(this).parents('.input-group').find(':image'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;
 
 



          if( input.length ) {
		   
        input.val("ถ่ายภาพสำเร็จ");
		 input.css({"background": "#fa1431","color": "#337AB7", });
		 input.addClass("form-control");
		 button.addClass("btn-modal-no");
		
		
          } else {
           if( log ) alert(log);
          }

      });
  });
  
});

</script>
<style type="text/css">
<!--
.topicname { padding-top:10px; padding-left:0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #666666 ; text-align:left;  
 
}
 

 
-->
</style>  






<table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td align="center" id="show_camera"><video id="video"  autoplay width="350" height="500"></video></td>
  </tr>
  <tr>
    <td align="center"><br>
<button id="snap"  type="button" class="btn btn-block btn-primary"  style="width:150px; " data-target="#popup_pic" data-toggle="modal" data-backdrop="false" data-keyboard="false"><i class="fa  fa-camera"></i>&nbsp;ถ่ายภาพ</button></td>
  </tr>
  <tr>
    <td align="center" id="show_pic"></td>
  </tr>
</table>







 
 
 
 
 
 
 
 
 
<style>
  .modal-backdrop {
   display: none;  
}

.modal.fade:not(.in) .modal-dialog {
box-shadow:none;  top:0;
    background-color:#000000
    -webkit-transform: translate3d(-50%, 0, 0);
    transform: translate3d(-50%, 0, 0);  
 
}

.modal {
box-shadow:none;
    background-color:#FFFFFF; z-index:99999;   
 
 
}
.modal {
box-shadow:none;
    background-color:#FFFFFF; z-index:99999;   
	
	
 
}

.modal-dialog { margin-top:30px;
 

}
.modal-content {
 box-shadow:none;  border:none;     

}
body.modal-open { 
  padding-right: 0 !important; 
 
}
body.modal-open {
    overflow: visible;
    position: absolute;
    width: 100%;
    height:100%;
}
 </style>
<script>
// Grab elements, create settings, etc.
var video = document.getElementById('video');

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        video.src = window.URL.createObjectURL(stream);
        video.play();
    });
}

/* Legacy code below: getUserMedia 
else if(navigator.getUserMedia) { // Standard
    navigator.getUserMedia({ video: true }, function(stream) {
        video.src = stream;
        video.play();
    }, errBack);
} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
    navigator.webkitGetUserMedia({ video: true }, function(stream){
        video.src = window.webkitURL.createObjectURL(stream);
        video.play();
    }, errBack);
} else if(navigator.mozGetUserMedia) { // Mozilla-prefixed
    navigator.mozGetUserMedia({ video: true }, function(stream){
        video.src = window.URL.createObjectURL(stream);
        video.play();
    }, errBack);
}
*/

// Elements for taking the snapshot
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var video = document.getElementById('video');

// Trigger photo take
document.getElementById("snap").addEventListener("click", function() {

 
	context.drawImage(video, 0, 0, 380,200 );
});

</script>