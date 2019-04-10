<?php
session_start();

include_once 'utility/utility_accesso.php';

if(!isLogged()){
    $_SESSION['error'] = 'non puoi eliminare il profilo perchè non sei loggato, per favore riprova più tardi';
    header("Location: pagina_errore.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION['immagine_profilo'] = $_POST['img'];
    header('Location: profilo.php');
    exit();


}else{
    header('Location: home.php');
    exit();
}

?>