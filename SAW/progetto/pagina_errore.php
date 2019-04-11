<?php
session_start();
include_once 'utility/utility_accesso.php';
include_once 'utility/utility_DB.php';
include_once 'utility/utilityOrder.php';



echo $_SESSION['error'];


//echo print_array(my_search("oggetto"));

function print_array($array){
    $res = "";
    foreach ($array as $value)
        $res .= $value;
    return $res;
}


/*
$elem = array("oggetto prova 1","42", "nessuna descrizione", "disponibile", "a", "img/logo1.png");
$elem1 = array("oggetto prova 2","43", "nessuna descrizione", "disponibile", "a", "img/logo2.png");


$key = array("nome", "prezzo", "descrizione", "disponibilità", "categoria", "path_img");

insert_info("articoli", $key, $elem);
insert_info("articoli", $key, $elem1);*/


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

$utente = "andrea sei mitico";

/*$elem1 = array("andrea","43", "nessuna descrizione", "disponibile", "a", "img/logo2.png");


$key = array("nome", "prezzo", "descrizione", "disponibilità", "categoria", "path_img");


if(Query_insert("articoli", $key, $elem1)) echo "query insert riuscita";
else echo "insert non riuscita";*/
?>

<?php
echo $utente;
?>

<?php
echo $utente." ancora più grande";
?>




