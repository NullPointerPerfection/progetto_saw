<?php 
include_once 'header.php';
?>

<?php
include_once 'navbar.php';
?>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"><div class="modal-content"></div></div></div> 
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"><div class="modal-content"></div></div></div> 
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"><div class="modal-content"></div></div></div> 
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"><div class="modal-content"></div></div></div> 

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/js/bootstrap.min.js"></script>

<?php

include_once 'utility/utility_accesso.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $key = array();
    $elem = array();

    if(control($elem, test_input($_POST['username']))){
        $key[] = "username";
        $_SESSION['username'] = test_input($_POST['username']);
    }

    if(control($elem, test_input($_POST['email']))){
        $key[] = "mail";
        $_SESSION['mail'] = test_input($_POST['email']);
    }

    if(control($elem, test_input($_POST['nome']))){
        $key[] = "nome";
        $_SESSION['nome'] = test_input($_POST['nome']);
    }

    if(control($elem, test_input($_POST['cognome']))){
        $key[] = "cognome";
        $_SESSION['cognome'] = test_input($_POST['cognome']);
    }
    if(control($elem, test_input($_POST['eta']))){
        $key[] = "eta";
        $_SESSION['eta'] = test_input($_POST['eta']);
    }

    if(!Query_update("utenti", $key, $elem, 'username', $_SESSION['username'])){
        $_SESSION['error'] = "errore nella update dei dati del profilo utente";
        header('Location: pagina_errore.php');
        exit();
    }

}

function control(&$array, $value){
    if(isset($value) && !empty($value)) {
        $array[] = $value;
        return true;
    }
    return false;
}
?>


<div class="redgradient lololo">
	<div class="profbox">
		<div id="immagine" class="ck"><img src="<?php echo $_SESSION['immagine_profilo'];?>" class="profimg" data-toggle="modal"  href="immagine_profilo.php" data-target="#myModal">
		<br>Clicca sull'immagine <br>per cambiarla!
		</div>
		<ul class="tees">
			<li class="uno"> Username: <span class="qua"><?php echo $_SESSION['username'];?></span></li>
			<li class="uno"> Email: <span class="qua"><?php echo $_SESSION['mail'];?></span> </li>
			<li> Nome: <span class="qua"><?php echo $_SESSION['nome'];?></span></li>
			<li> Cognome: <span class="qua"><?php echo $_SESSION['cognome'];?></span> </li>
			<li> Età: <span class="qua"><?php echo $_SESSION['eta'];?></span></li>
		</ul>
		<div class="txtc">
			<button class="whitebolo spz" data-toggle="modal"  href="mod_profilo.php" data-target="#myModal2">Modifica Profilo</button>
			<button class="whitebolo spz" data-toggle="modal"  href="mod_password.php" data-target="#myModal3">Modifica Password</button>
			<button class="bolo spz" data-toggle="modal"  href="canc_profilo.php" data-target="#myModal4">Cancella Profilo</button>
		</div>
	</div>
</div>

<script>
        $( document ).ready(function() {
            $('#home').removeClass("activ");
            $('#homeM').removeClass("activ");
            $('#compra').removeClass("activ");
            $('#compraM').removeClass("activ");
            $('#chisiamo').removeClass("activ");
            $('#chisiamoM').removeClass("activ");
            $('#carrelloM').removeClass("activ");
            $('#profiloM').addClass("activ");
            $('#carrello2M').removeClass("activ");
            $('#profilo2M').addClass("activ");
            
        });
</script>

<?php
include_once 'footer.php';
?>

<?php 
	function EchoMsg($msg){
		echo '<script type="text/javascript"> alert("'.$msg.'");</script>';
	}
	if(isset($_SESSION['nopsw']) && !empty($_SESSION['nopsw'])){
		EchoMsg($_SESSION['nopsw']);
		$_SESSION['nopsw']=null;
	}
?>


