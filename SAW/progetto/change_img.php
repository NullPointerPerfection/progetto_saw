<?php
session_start();

include_once 'utility/utility_accesso.php';

if(!isLogged()){
    $_SESSION['error'] = 'Non puoi cambiare immagine perchè non sei loggato, per favore riprova più tardi';
    header("Location: pagina_errore.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $str = substr($_GET['path'], strpos($_GET['path'], 'img'));

    $_SESSION['immagine_profilo'] = $str;
    Query_update("utenti", array('immagine'), array($_SESSION['immagine_profilo']), 'username', $_SESSION['username'] );
    echo "<img class='profimg' data-toggle='modal'  href='immagine_profilo.php' data-target='#myModal' src='".$str."'>
    <br>Clicca sull'immagine <br>per cambiarla!";

}else{
    header('Location: home.php');
    exit();
}

?>
