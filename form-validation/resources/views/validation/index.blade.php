<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ajax Form submit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
</head>

<body>
    <div class="container mt-3">
        <div id="messageresponse" style="display: none"></div>
        <form method="POST">
          {{ csrf_field() }}
          <div class="mb-3 mt-3">
            <label for="title">Title: <span id="title-message" class="text-danger" style="display: none"></span></label>
            <input type="text"  class="form-control" placeholder="Enter Title" name="title" id="title">
          </div>
          <div class="mb-3">
            <label for="mobile">Mobile: <span id="mobile-message" class="text-danger" style="display: none"></span></label>
            <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile Number" name="mobile">
          </div>
          <div class="mb-3">
            <label for="altmobile">Alternate Mobile: <span id="altmobile-message" class="text-danger" style="display: none"></span></label>
            <input type="text" class="form-control" id="altmobile" placeholder="Enter Alternate Mobile Number" name="altmobile">
          </div>
          <button class="btn btn-primary" id="submit">Submit</button>
          <button class="btn btn-primary" id="loading" style="display: none;">Loading....</button>
        </form>
    </div>
    <script type="text/javascript">
        $(document).on('click', '#submit', function(e) {
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var title = $("#title").val();
            var mobile = $("#mobile").val();
            var altmobile = $("#altmobile").val();
            $('#title-message').empty();
            $('#mobile-message').empty();
            if (title == "") {
                $('#title-message').show();
                $('#title-message').html('Enter Title');
                $('#title').focus();
                return false;
            } else if (!title.match(/^[a-zA-Z ]*$/)) {
                $('#title-message').show();
                $('#title-message').html('Title should be alphabetic');
                $('#title').focus();
                return false;
            }  else {
                //loading
                $('#submit').hide();
                $('#loading').show();
                //loading
                $.ajax({
                    url: "{{ route('store') }}",
                    method: 'POST',
                    data: {
                        _token: _token,
                        title: title,
                        mobile: mobile,
                        altmobile: altmobile
                    },
                    success: function(data) {
                        if (!$.isEmptyObject(data.success)) {
                            $('#messageresponse').show();
                            $('#messageresponse').html('<p class="text-success">Post created successfully</p>');
                            $('#submit').show();
                            $('#loading').hide();
                        } else {
                            $('#messageresponse').empty();
                            $.each(data.errors, function(key, value) {
                                $('#messageresponse').show();
                                $('#messageresponse').append('<p class="text-danger">' + value + '</p>');
                                $('#submit').show();
                                $('#loading').hide();
                            });
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>
