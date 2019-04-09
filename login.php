<?php
session_start();
include_once 'headerreg.php';
?>

<div class="module">
	<div class="alfa">
		<div class="tyy uno titolo"> 
			Azkanta Dream</div>
		<div class="kylo"> -
		<span class="uno">I</span>nserisci i tuoi dati per effettuare il <span class="uno">login</span>:-
		</div>
		<br><br>

	<form class="formaggio" action="sign_in.php" method="post">
		<label for="username"> <span class="uno">U</span>sername:<br> </label>
		<input class="boxes" type="text" placeholder="" id="username" name="username" required> <br><br>
		<?php if(isset($_SESSION["usernameErr"]) && !empty($_SESSION["usernameErr"])) echo $_SESSION["usernameErr"]; ?>

		<label for="password"> <span class="uno">P</span>assword:<br> </label>
		<input class="boxes" type="text" placeholder="" id="psw" name="psw" required> <br><br>
		<?php if(isset($_SESSION["pswErr"]) && !empty($_SESSION["pswErr"])) echo $_SESSION["pswErr"]; ?>

		<button class="bottoni" type="submit"> Login </button>
		<br><br> <div class="kylobot"> <span class="uno">N</span>on hai un profilo? Clicca <a href="register.php" class="lil"> qui </a>. </div>
	</form>
	</div> <br><br>
</div>

<?php
include_once 'footer.php';
?>
