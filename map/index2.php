

<script>
  Permissions.query('geolocation').then(function(result) {
    if (result.status == 'granted') {
      showLocalNewsWithGeolocation();
    } else if (result.status == 'prompt') {
      showButtonToEnableLocalNews();
    }
    // Don't do anything if the permission was denied.
  });
</script>

<script>
  navigator.permissions.query({name:'geolocation'})
  .then(function(permissionStatus) {  
    console.log('geolocation permission state is ', permissionStatus.state);

    permissionStatus.onchange = function() {  
      console.log('geolocation permission state has changed to ', this.state);
    };
  });
</script>
 <input name="dd" type="button" id="chat-notification-button">