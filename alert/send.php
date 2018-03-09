 <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase.js"></script>
 
 <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase-messaging.js"></script>



 <script>
 var to = '735683540189';
var key = 'AIzaSyBbUdRyfXHCU7MzuOej7Pco4U87hXlBmxk';
var notification = {
  'title': 'Portugal vs. Denmark',
  'body': '5 to 1',
  'icon': 'firebase-logo.png',
  'click_action': 'http://localhost:8081'
};

fetch('https://fcm.googleapis.com/fcm/send', {
  'method': 'POST',
  'headers': {
    'Authorization': 'key=' + key,
    'Content-Type': 'application/json'
  },
  'body': JSON.stringify({
    'notification': notification,
	
    'to': to
  })
}).then(function(response) {
  console.log(response);
}).catch(function(error) {
  console.error(error);
})
 
 </script>