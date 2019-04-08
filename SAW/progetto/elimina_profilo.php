<?php

session_start();

include_once 'utility/utility_accesso.php';

if(!isLogged()){
    $_SESSION['error'] = 'non puoi eliminare il profilo perchè non sei loggato, per favore riprova più tardi';
    header("Location: pagina_errore.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(delete("utenti", 'username', $_SESSION['username'])) {
        session_destroy();
        header('Location: home.php');
        exit();
    }
    else{
        $_SESSION['error'] = 'cè stato un problema nella query di cancellazione, per favore riprova più tardi';
        header("Location: pagina_errore.php");
        exit();
    }
}
?>