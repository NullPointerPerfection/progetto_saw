<?php

session_start();

include_once 'utility/utility_accesso.php';
    include_once 'utility/utility_DB.php';
require_once "utility/connessione.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
    $newpsw = sha1($_POST['new']);
    $confpsw = sha1($_POST['conf']);
	$password;
	$query = "SELECT password FROM utenti WHERE username = '".$_SESSION['username']."';";
	$res = mysqli_query($con,$query);
	$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
	$password = $row['password'];
	
    if( $password === sha1(trim($_POST['psw']))){
        if($newpsw === $confpsw){
            $_SESSION['password'] = $newpsw;
            Query_update("utenti", array("password"), array($newpsw), 'username', $_SESSION['username']);
            header("Location: profilo.php");
            exit();
        }
            $_SESSION['nopsw'] = "La conferma della password è diversa dalla nuova password.";
			header('Location: profilo.php');
			exit();
    }
    $_SESSION['nopsw'] = "Non hai scritto la tua password in modo corretto, riprova.";
    $_SESSION['nopsw'] = $_SESSION['password'] ."---". sha1($_POST['psw']);
    header('Location: profilo.php');
    exit();
}

header('Location: home.php');
exit();

?>
