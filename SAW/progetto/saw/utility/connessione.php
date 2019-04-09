<?php
    $host = "localhost"; //l'indirizzo del server uni
    $user = "daniele"; //ci andrà la matricola
    $pwd = "daniele98"; //la password del gruppo
    $dbname = "prova";
    $con = mysqli_connect($host,$user,$pwd);
    if(!isset($con)) header("Location: index.php");
    $db_selected = mysqli_select_db($con,$dbname);
    if(!$db_selected) header("Location: index.php");
?>
