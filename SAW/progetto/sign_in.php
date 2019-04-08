<?php
session_start();
include_once 'utility/utility_accesso.php';
include_once 'utility/debug.php';
include_once 'utility/dbaux.php';
include_once 'utility/utility.php';
if(isLogged()) header("location: pagina_privata.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = test_input($_POST['username']);
    $psw = sha1(test_input($_POST['psw']));

    $condition = 'username= \'' . $username . '\' AND password =\'' . $psw . "'";
    $res = get_info("utenti", "*", $condition);

    if(!$res){
        $_SESSION['error'] = " non ti sei loggato con successo: username e/o password non corrette";
        header("Location: login.php");
        exit();
    }else {

        if (mysqli_num_rows($res) > 0) {
            set_login();
            $row = mysqli_fetch_assoc($res);

            $_SESSION['prova'] = mysqli_num_rows($row);

            set_info_accesso($row);

            header("Location: pagina_privata.php");
            exit();
        } else {
            $_SESSION['error'] = " non ti sei loggato con successo: username e/o password non corrette";
            header("Location: login.php");
            exit();
        }
    }
}
?>