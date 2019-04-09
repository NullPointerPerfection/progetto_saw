<?php
session_start();
include_once 'utility/utility_accesso.php';
include_once 'utility/dbaux.php';
include_once 'utility/utilityOrder.php';



echo $_SESSION['error'];

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
    }

?>


