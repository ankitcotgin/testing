<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mt-5 pt-3 pb-3 bg-white from-wrapper">
                <div class="container">
                    <h3>Chat</h3>
                    <hr>
                    <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 mb-3">
                        <ul id="user-list" class="list-group"></ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-8">
                        <div class="row">
                        <div class="col-12">
                            <div class="message-holder">
                                <div id="messages" class="row"></div>
                            </div>
                            <div class="form-group">
                            <textarea id="message-input" class="form-control" name="" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button id="send" class="btn float-right  btn-primary">Send</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        //design 
        $(function () {
            scrollMsgBottom()
        })
        
        function scrollMsgBottom(){
          var d = $('.message-holder');
                    d.scrollTop(d.prop("scrollHeight"));
        }

        function getImages(){
          const imgs = {
            'Mary' : 'mary.jpg',
            'Jon' : 'jon.jpg',
            'Alex' : 'alex.jpg',
          }

          return imgs
        }

        $(function () {
            var conn = new WebSocket('ws://localhost:8080?access_token=123123');
            conn.onopen = function(e) {
                console.log("Connection established!");
            };

            conn.onmessage = function(e) {
              console.log(e.data);
              
              var data = JSON.parse(e.data)
              console.log(e.data);
              if ('users' in data){
                updateUsers(data.users)
              } else if('message' in data){
                newMessage(data)
              }

            };

            $('#send').on('click', function () {
                var msg = $('#message-input').val()
                if(msg.trim() == '')
                  return false
                conn.send(msg);
                myMessage(msg)
                $('#message-input').val('')
            })
        })

        function newMessage(msg){
          const imgs = getImages()
          
          html = `<div class="col-8 msg-item left-msg">
                    <div class="msg-img">
                        <p>From</p>
                    </div>
                    <div class="msg-text">
                      <span class="author">` + msg.author + `</span> <span class="time">` + msg.time + `</span><br>
                      <p>` + msg.message + `</p>
                    </div>
                  </div>`
          $('#messages').append(html)
          scrollMsgBottom()
        
        }

        function myMessage(msg){
          var name = 'Ankit'
          const imgs = getImages()
          var date = new Date;
          var minutes = date.getMinutes();
          var hour = date.getHours();
          var time = hour + ':' + minutes
          html = `<div class="col-8 msg-item right-msg offset-4">
                    <div class="msg-img">
                        <p>To</p>
                    </div>
                    <div class="msg-text">
                      <span class="author">Me</span> <span class="time">` + time + `</span><br>
                      <p>` + msg + `</p>
                    </div>
                  </div>`
          $('#messages').append(html)
          scrollMsgBottom()
        }

        function updateUsers(users){
          var html = ''
          var myId = 'Ankit Jaiswal';
          
          
          for (let index = 0; index < users.length; index++) {
            if(myId != users[index].c_user_id)
            html += '<li class="list-group-item">'+ users[index].c_name +'</li>'
          }

          if(html == ''){
            html = '<p>The Chat Room is Empty</p>'
          }
          

          $('#user-list').html(html)
          

        }
        //design end

        // Use JavaScript to send messages via WebSocket
        // Ankit
            // var conn = new WebSocket('ws://localhost:8080');

            // conn.onopen = function(e) {
            //     console.log("Connection established!");
            // };

            // conn.onmessage = function(e) {
            //     var messagechat = document.getElementById('messagechat');
            //     messagechat.innerHTML += '<p>' + e.data + '</p>';
            // };
        // Ankit
        // conn.onmessage = function(e) {
        // var data = JSON.parse(e.data);
        // var showmessage = document.getElementById('messagechat');

        //     // Update showmessage div with the received message
        //     showmessage.innerHTML += '<div class="row"><div class="col-6">' + data.sender + '</div><div class="col-6">' + data.message + '</div></div>';
        // };

        // Ankit
        // $('#send').on('click', function() {
        //     var receiverId = $('#receiverId').val();
        //     var message = $('#message-input').val();
        //     var data = {
        //         receiverId: receiverId,
        //         message: message
        //     };
        //     conn.send(JSON.stringify(data));
            $.ajax({
                type: 'POST',
                url: '<?= base_url('chat/sendMessage') ?>',
                data: data,
                dataType: 'json',
                success: function(response) {
                    // Handle the response if needed
                }
            });
        // });
        // Ankit
    </script>
</body>

</html>