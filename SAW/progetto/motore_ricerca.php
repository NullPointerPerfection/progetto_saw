<?php

    session_start();
    include_once 'utility/utilityOrder.php';
    include_once 'utility/utility.php';


if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $metodo = $_GET['ricerca']; //valore di controllo, con la chiamata ajax settare il valore a seconda di quale chiamata viene effettuata (ricerca, ordinamento, filtro per categorie)

        switch ($metodo){
            case 'tutto':
				$segno = $_GET['segno']; //valore ascendente/discendente
                $ordinamento = $_GET['order'];//il valore dell'ordinamento selezionato
                if(strpos($ordinamento, 'Nome') !== false)
                    $ordinamento = 'nome';
                else
                    $ordinamento = 'prezzo';
                echo print_array(displayAll($ordinamento, $segno));
                break;
            case 'ricerca':
                $segno = $_GET['segno']; //valore ascendente/discendente
                $ordinamento = $_GET['order'];//il valore dell'ordinamento selezionato
                $id = $_GET['barra']; //TO BE CHANGE...quando si faranno i form i nomi saranno da cambiare
                if(strpos($ordinamento, 'Nome') !== false)
                    $ordinamento = 'nome';
                else
                    $ordinamento = 'prezzo';
                if(empty($_GET['categorie'])) echo "<div class='nores'>-NESSUN RISULTATO-<br><img src='img/Castellan.png'></div>";
                else{
					$categ = $_GET['categorie']; //array con tutte le categorie attive
					echo print_array(my_search($id, $ordinamento,$segno, $categ));
				}
                break;

        }
    }else{
        echo "nessun risultato";
    }
?>
