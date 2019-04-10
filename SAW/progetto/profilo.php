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

<?php //echo $_SESSION['immagine_profilo'];?>

<div class="redgradient lololo">
	<div class="profbox">
		<div class="ck"><img id="immagine" src="" class="profimg" data-toggle="modal"  href="immagine_profilo.php" data-target="#myModal">
		<br>Clicca sull'immagine <br>per cambiarla!
		</div>
		<ul class="tees">
			<li class="uno"> Username: <span class="qua"><?php echo $_SESSION['username'];?></span></li>
			<li class="uno"> Email: <span class="qua"><?php echo $_SESSION['mail'];?></span> </li>
			<li> Nome: <span class="qua"><?php echo $_SESSION['nome'];?></span></li>
			<li> Cognome: <span class="qua"><?php echo $_SESSION['cognome'];?></span> </li>
			<li> Sesso: <span class="qua"><?php echo $_SESSION['sesso'];?></span></li>
			<li> Età: <span class="qua"><?php echo $_SESSION['eta'];?></span></li>
		</ul>
		<div class="txtc">
			<button class="whitebolo spz" data-toggle="modal"  href="mod_profilo.php" data-target="#myModal2">Modifica Profilo</button>
			<button class="whitebolo spz" data-toggle="modal"  href="mod_password.php" data-target="#myModal3">Modifica Password</button>
			<button class="bolo spz" data-toggle="modal"  href="canc_profilo.php" data-target="#myModal4">Cancella Profilo</button>
		</div>
	</div>
</div>

<?php
include_once 'footer.php';
?>
