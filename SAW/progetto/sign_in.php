<?php
session_start();
include_once 'utility/utility_accesso.php';
include_once 'utility/debug.php';
include_once 'utility/utility_DB.php';
if(isLogged()) header("location: profilo.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST['username']);
    $psw = sha1(test_input($_POST['psw']));
	QueryLogin($username, $psw);
}
?>
