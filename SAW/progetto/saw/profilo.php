<?php session_start();
include_once 'header.php';
?>

<?php
include_once 'navbar.php';
?>



<div class="redgradient lololo">
	<div class="profbox">
		<img src="img/anti.png" class="profimg">
		<ul class="tees">
			<li class="uno"> Username: <span class="qua"><?php echo $_SESSION['username'];?></span></li>
			<li class="uno"> Email: <span class="qua"><?php echo $_SESSION['mail'];?></span> </li>
			<li> Nome: <span class="qua"><?php echo $_SESSION['nome'];?></span></li>
			<li> Cognome: <span class="qua"><?php echo $_SESSION['cognome'];?></span> </li>
			<li> Sesso: <span class="qua"><?php echo $_SESSION['sesso'];?></span></li>
			<li> Età: <span class="qua"><?php echo $_SESSION['eta'];?></span></li>
		</ul>
		<div class="txtc">
			<button class="whitebolo spz">Modifica Profilo</button>
			<button class="whitebolo spz">Modifica Password</button>
			<button class="bolo spz">Cancella Profilo</button>
		</div>
	</div>
</div>

<?php
include_once 'footer.php';
?>
