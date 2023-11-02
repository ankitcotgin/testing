<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="jquery.timepicker.min.css">
  <script src="jquery.timepicker.min.js"></script>
</head>
<body>

<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>My First Bootstrap Page</h1>
  <p><input type="text" name="timepicker" class="timepicker"></p> 
</div>
<script>
    $(document).ready(function(){
        $('input.timepicker').timepicker({
          timeFormat: 'h:mm p',
          defaultTime: new Date(),
          // interval: 60,
          // minTime: '10',
          // maxTime: '11:00pm',
          // startTime: '10:00',
          dynamic: true,
          dropdown: true,
          scrollbar: false
        });
    });
</script>
</body>
</html>
