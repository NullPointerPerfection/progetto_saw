<?php
session_start();
include_once 'utility/utility_accesso.php';
include_once 'utility/dbaux.php';
include_once 'utility/utilityOrder.php';



echo $_SESSION['error'];

echo print_r($_SESSION['query']);

echo "<br>";

echo "<br>";

echo $_SESSION['select'];
/*
$elem = array("non deve essere trovato","42", "nessuna descrizione", "disponibile", "a", "nessuna");

$key = array("nome", "prezzo", "descrizione", "disponibilità", "categoria", "path_img");

    if(insert_info("articoli", $key,$elem)){

        echo print_array(my_search("oggetto"));
    }else{
        echo "insert fallita";
    }


    function print_array($array){
        $res = "";
        foreach ($array as $value)
            $res .= $value;
        return $res;
    }*/
/*
<script>
    $(document).ready(function(){
        $('#invio').click(function () {
            var username = $("#username").val();
            var psw = $("#psw").val();
            $.post("sign_in.php", { username: username, psw: psw }, function(msg){
                if(msg != null)
                    window.location("login.php");
            });
        });
    });
</script>*/

?>


