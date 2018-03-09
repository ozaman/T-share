 

<!DOCTYPE html>
<!-- saved from url=(0051)https://googlechrome.github.io/samples/permissions/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description" content="Sample illustrating the use of the Permissions API.">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Permissions API Sample</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="https://googlechrome.github.io/samples/images/touch/chrome-touch-icon-192x192.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-title" content="Permissions API Sample">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon-precomposed" href="https://googlechrome.github.io/samples/images/apple-touch-icon-precomposed.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="icon" href="https://googlechrome.github.io/samples/images/favicon.ico">

    <link rel="stylesheet" href="./Permissions API Sample_files/main.css">
  </head>

  <body>
    <h1>Permissions API Sample</h1>

    <p>Available in <a href="https://www.chromestatus.com/feature/6376494003650560">Chrome 43+</a></p>

    <p>The Permissions API allows a web application to be aware of the status of a given permission, to know whether it is granted, denied or if the user will be asked whether the permission should be granted.</p>

    <!-- // [START code-block] -->
    <h3>Permissions</h3>

    <div><b>Geolocation:</b> <span id="geolocation">denied</span></div>
    <div><b>Notifications:</b> <span id="notifications">granted</span></div>
    <div><b>Midi:</b> <span id="midi">granted</span></div>
    <div><b>Midi SysEx:</b> <span id="midi-sysex">granted</span></div>

    <p>
      </p><fieldset>
        <legend>Requests</legend>
        <button id="getPositionBtn">Geolocation</button>
        <button id="getNotificationBtn">Notifications</button>
        <button id="getMidiBtn">Midi SysEx</button>
      </fieldset>
    <p></p>

    <div class="output">
      <pre id="log">update permission for geolocation with denied
update permission for notifications with granted
update permission for midi with granted
update permission for midi-sysex with granted
</pre>
    </div>


	<script>
    (function () {
      function log() {
        document.querySelector('#log').textContent += Array.prototype.join.call(arguments, '') + '\n';
      }

      function updatePermission(name, state) {
        log('update permission for ' + name + ' with ' + state);
        document.getElementById(name).textContent = state;
      }

      function init() {

        var getPosBtn = document.querySelector('#getPositionBtn');
        var getNotBtn = document.querySelector('#getNotificationBtn');
        var getMidBtn = document.querySelector('#getMidiBtn');

        // Check for Geolocation API permissions
        navigator.permissions.query({name:'geolocation'}).then(function(p) {
          updatePermission('geolocation', p.state);

          p.onchange = function() {
            updatePermission('geolocation', this.state);
          };
        });

        // Check for Notifications API permissions
        navigator.permissions.query({name:'notifications'}).then(function(p) {
          updatePermission('notifications', p.state);
          p.onchange = function() {
            updatePermission('notifications', this.state);
          };
        });

        // Check for Midi/Midi SysEx permissions
        navigator.permissions.query({name:'midi', sysex:false}).then(function(p) {
          updatePermission('midi', p.state);
          p.onchange = function() {
            updatePermission('midi', this.state);
          };
        });

        navigator.permissions.query({name:'midi', sysex:true}).then(function(p) {
          updatePermission('midi-sysex', p.state);
          p.onchange = function() {
            updatePermission('midi-sysex', this.state);
          };
        });

        getPosBtn.addEventListener('click', function() {
          navigator.geolocation.getCurrentPosition(function(position) {
		    alert(55);
            log('Geolocation permissions granted');
            log('Latitude:' + position.coords.latitude);
            log('Longitude:' + position.coords.longitude);
          });
        });

        getNotBtn.addEventListener('click', function() {
		
          Notification.requestPermission(function(result) {
		
            if (result === 'denied') {
              log('Permission wasn\'t granted.');
              return;
            } else if (result === 'default') {
              log('The permission request was dismissed.');
              return;
            }
            log('Permission was granted for notifications');
          });
        });

        getMidBtn.addEventListener('click', function() {
          navigator.requestMIDIAccess({sysex:true});
        });
      }

      init();
    })();
    </script>
    <!-- // [END code-block] -->

     
  

</body></html>