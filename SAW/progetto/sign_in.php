<?php
session_start();
include_once 'utility/utility_accesso.php';
include_once 'utility/debug.php';
include_once 'utility/dbaux.php';

if(isLogged()) header("location: pagina_privata.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = test_input($_POST['username']);
    $psw = sha1(test_input($_POST['psw']));

    $condition = 'username=' . $username . ' AND password =' . $psw . "'";
    $res = get_info("utenti", "*", $condition);

    if(!$res){
        echo " non ti sei loggato con successo: username e/o password non corrette";
    }else {

        if (mysqli_num_rows($res) == 1) {
            set_login();
            $row = mysqli_fetch_assoc($res);

            set_info_accesso($row);

            header("Location: pagina_privata.php");
            exit();
        } else {
            echo " non ti sei loggato con successo: username e/o password non corrette";
        }
    }
}
?>