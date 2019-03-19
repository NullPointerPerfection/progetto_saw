<?php

session_start();

    function getimg(){
        if(isset($_SESSION['path'])){
            return $_SESSION['path'];
        }else{
            return 'img/man5.jpg';
        }
    }
?>