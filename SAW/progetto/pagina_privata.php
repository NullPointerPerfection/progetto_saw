<?php
    session_start();
    include_once 'utility/debug.php';
    include_once 'utility/utility_accesso.php';

    if(isLogged())
        echo "PAGINA PRIVATA";
    else {
        header("location: home.php");
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

<?php
if(isset($_SESSION['prova']))
echo $_SESSION['prova'];

else echo "prova non settata";
if(isset($_SESSION['username']) && !empty($_SESSION['username'])) echo $_SESSION['username'];

else echo "variabile non settata";

?>


</body>
</html>