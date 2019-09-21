<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('8fe74877e244daa818ac', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('test-channel');
    channel.bind('test-event', function(data) {
      alert(JSON.stringify(data));
    });
    
    var channel2 = pusher.subscribe('test2-channel');
    channel2.bind('test2-event', function(data) {
      alert(JSON.stringify(data));
    });

  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
</body>