<?php

session_start();
    include_once 'mysql.php';




if ($_SERVER["REQUEST_METHOD"] === "GET") {
	$metodo = $_GET['query'];
    //$carrello = $_SESSION['carrello'];

    $carrello = unserialize($_SESSION['carrello']);
    switch ($metodo){
        case 'deleteAll':
            $carrello->deleteAll('utente' ,$_SESSION['username']);
            $_SESSION['carrello'] = serialize($carrello);
            break;
        case 'delete':
        $carrello->delete($_GET['prodotto']);
			 echo $carrello->printAll();
		 
                    $_SESSION['carrello'] = serialize($carrello);

            break;
        case 'insert':
        if($carrello->insert(null, array($_SESSION['username'],$_GET['prodotto'])))
			echo 'Aggiunto al carrello';
		else echo 'Articolo già nel carrello';
		            $_SESSION['carrello'] = serialize($carrello);

          break;
        default:
			echo "?????"; exit;
    }
}else{
    echo "carrello vuoto"; exit;
}
?>
