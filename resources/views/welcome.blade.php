<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('859917d252b6e36ab94f', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('notification');
    channel.bind('test.notification', function(data) {
      alert(JSON.stringify(data.message));
    });

    $(document).on('click', '#send', function() {
        var message = $('#message').val();
        // console.log('Sending message:', message);
        $.get('/send-message', { message: message });
    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
    <div id="messages"></div>
    <input type="text" id="message" placeholder="Type a message">
    <button id="send">Send</button>
</body>