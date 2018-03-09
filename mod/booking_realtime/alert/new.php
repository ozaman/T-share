   
<script>
navigator.serviceWorker.register('js/sw.js');

function showNotifications() {
	
 
	
  Notification.requestPermission(function(result) {
    if (result === 'granted') {
      navigator.serviceWorker.ready.then(function(registration) {
        registration.showNotification('มีงานส่งแขกเข้ามาใหม่', {
          body: 'กรุณาตรวจสอบด้วยค่ะ',
          icon: 'mini.png',
		  badge: 'king.png',
          requireInteraction: true,
		  
          tag: 'require-interaction'
        });


/*
        registration.showNotification('requireInteraction: false', {
          body: 'Does not require interaction',
          icon: '../images/touch/chrome-touch-icon-192x192.png',
          requireInteraction: false,
          tag: 'no-require-interaction'
        });
		
		*/
		
      });
    }
  });
}

 showNotifications();


/*
 setTimeout(function () {
 showNotifications();
}, 10000); //w
*/





if ('serviceWorker' in navigator && 'PushManager' in window) {
  console.log('Service Worker and Push is supported');
  
  //alert('Service Worker and Push is supported');

  navigator.serviceWorker.register('sw.js')
  .then(function(swReg) {
    console.log('Service Worker is registered', swReg);

    swRegistration = swReg;
  })
  .catch(function(error) {
    console.error('Service Worker Error', error);
  });
} else {
  console.warn('Push messaging is not supported');
  pushButton.textContent = 'Push Not Supported';
}

</script>
 