<?php

    session_start();
    include_once 'utility/utilityOrder.php';
    include_once 'utility/utility.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $metodo = $_GET['ricerca']; //valore di controllo, con la chiamata ajax settare il valore a seconda di quale chiamata viene effettuata (ricerca, ordinamento, filtro per categorie)

        switch ($metodo){
            case 'ricerca':
                $id = $_GET['barra']; //TO BE CHANGE...quando si faranno i form i nomi saranno da cambiare
                echo print_array(my_search($id));
                break;
            case 'ordinamento':
                $order = $_GET['ordine']; //TO BE CHANGE... come sopra...(i valori possibili sono: crescente/decrescente )
                echo print_array(filtroOrdinamento($order));
                break;
            case 'filtro':
                $box = $_GET['categoria'];//come sopra
                echo print_array(filtroCheckBox($box));
                break;
        }
    }else{
        echo "nessun risultato";
    }

?>