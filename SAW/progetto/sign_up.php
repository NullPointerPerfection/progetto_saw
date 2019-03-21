<?php
session_start();

//include_once 'utility/debug.php';
include 'utility/connessione.php';
include 'utility/utility.php';
include_once 'utility/utility_accesso.php';
include_once 'utility/dbaux.php';

if(isLogged()) header("location: pagina_privata.php");

$_SESSION["emailErr"] = $_SESSION["usernameErr"] = $_SESSION["pswErr"] = $_SESSION["repswErr"] = "";
$email = $username = $psw = $repsw = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $checkvalidated = true;

    validated('username',$usernameErr,$username, $checkvalidated);

    if (empty($_POST["email"])) {
        $_SESSION["emailErr"] = "Email is required";
        $checkvalidated = false;
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["emailErr"] = "Invalid email format";
            $checkvalidated = false;
        }
    }

    if (empty($_POST["psw"])) {
        $_SESSION["pswErr"] = "psw is required";
        $checkvalidated = false;
    } else {
        if($_POST["psw"] != $_POST["psw-repeat"]){
            $_SESSION["repswErr"] = "password non corrispondono";
            $checkvalidated = false;
        }else {
            $psw = test_input($_POST["psw"]);
            // check if psw address is well-formed
            if (!preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $psw)) {
                $_SESSION["pswErr"] = "UpperCase, LowerCase and Number";
                $checkvalidated = false;
            }
            $psw = sha1($psw);
        }
    }

    if(!autenticazione($username)){
        $_SESSION["usernameErr"] = "username already exist";
        $checkvalidated = false;
    }

    if($checkvalidated) {
        QueryRegistration($username, $psw, $email);
        $condition = 'username=' . $username;
        $res = get_info("utenti", "*", $condition);
        $row = mysqli_fetch_assoc($res);
        set_info_accesso($row);
        set_login();
        header("Location: pagina_privata.php");
        exit();
    }
}

function autenticazione($username){
    $condition = 'username=' . $username;
    $res = get_info("utenti","username", $condition);
    return (mysqli_num_rows($res) == 0); //ritorna vero se non c'è username nel database
}
?>