<?php
    session_start();
    include_once 'utility/debug.php';
    include_once 'utility/utility_accesso.php';

    if(isLogged())
        echo "PAGINA PRIVATA";
    else {
        header("location: home.html");
        exit();
    }
?>

<html>
<head>
</head>
<body>

<form method="POST">
    <button type="submit" name="invio"> Loguot </button>
</form>

<?php
    if(isset($_POST['invio']))
        logout();
?>

</body>
</html>