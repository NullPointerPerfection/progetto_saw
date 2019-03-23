<?php
session_start();
include_once 'utility/utility_accesso.php';

echo $_SESSION['error'];

?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>






                <input type="password" class="pwd" value="iamapassword">
                <span class="input-group-btn">
            <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
          </span>



<script>
    $(".reveal").on('click',function() {
        var $pwd = $(".pwd");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
        } else {
            $pwd.attr('type', 'password');
        }
    });
</script>

</body>
</html>
