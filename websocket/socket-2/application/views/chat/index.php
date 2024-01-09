<!DOCTYPE html>
<html>
<head>
    <title>WebSocket Chat</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/reconnecting-websocket@4.4.0/dist/reconnecting-websocket.min.js"></script>
</head>
<body>

<input type="text" id="message" placeholder="Type your message">
<button onclick="sendMessage()">Send</button>
<div id="chat"></div>

<script>
    const socket = new ReconnectingWebSocket('ws://localhost:8080');

    socket.onopen = (event) => {
        console.log('WebSocket connection opened:', event);
    };

    socket.onmessage = (event) => {
        const chatDiv = document.getElementById('chat');
        chatDiv.innerHTML += '<p>' + event.data + '</p>';
    };

    socket.onclose = (event) => {
        console.log('WebSocket connection closed:', event);
    };

    function sendMessage() {
        const messageInput = document.getElementById('message');
        const message = messageInput.value;
        socket.send(message);
        messageInput.value = '';
    }
</script>

</body>
</html>
