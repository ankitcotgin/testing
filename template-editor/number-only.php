<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Only numbers input textbox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-3">Only numbers input textbox</h1>
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="number" class="form-label">Number</label>
                    <input type="number" class="form-control w-50" id="number" placeholder="123456">
                    <div class="alert alert-danger d-none mt-3 w-50" id="number-message">Only numbers allowed.</div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#number").keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    $('#number-message').addClass('d-block').removeClass('d-none');
                    return false;
                } else {
                    $('#number-message').addClass('d-none').removeClass('d-block');
                }
            });
        });
    </script>
</body>
</html>