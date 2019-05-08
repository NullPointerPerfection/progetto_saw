<?php
session_start();
include_once 'headerreg.php';
?>

<div class="module">
	<div class="alfa">
		<div class="tyy uno titolo"> 
			Azkanta Dream</div>
		<div class="kylo"> -
		<span class="uno">I</span>nserisci i tuoi dati per <span class="uno">registrarti</span>:-
		</div>
		<br><br>

	<form class="formaggio" action="sign_up.php" method="post">
		<label for="email"> <span class="uno">E</span>-mail:<br> </label>
		<input class="boxes" type="email" placeholder="" id="email" name="email" required> <br><br>
		<?php if(isset($_SESSION["emailErr"]) && !empty($_SESSION["emailErr"])) echo $_SESSION["emailErr"]; ?>

		<label for="username"> <span class="uno">U</span>sername:<br> </label>
		<input class="boxes" type="text" placeholder="" id="username" name="username" required> <br><br>
		<?php if(isset($_SESSION["usernameErr"]) && !empty($_SESSION["usernameErr"])) echo $_SESSION["usernameErr"]; ?>

		<label for="password"> <span class="uno">P</span>assword:<br> </label>
		<input class="boxes" type="text" placeholder="" id="psw" name="psw" required title="Almeno 8 caratteri, tra cui una lettera maiuscola e un numero."
		 pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"> <br><br>
		<?php if(isset($_SESSION["pswErr"]) && !empty($_SESSION["pswErr"])) echo $_SESSION["pswErr"]; ?>

		<label for="password"> <span class="uno">C</span>onferma <span class="uno">P</span>assword:<br> </label>
		<input class="boxes" type="text" placeholder="" id="psw-repeat" name="psw-repeat" required title="Almeno 8 caratteri, tra cui una lettera maiuscola e un numero."
		 pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"> <br><br>
		<?php if(isset($_SESSION["repswErr"]) && !empty($_SESSION["repswErr"])) echo $_SESSION["repswErr"]; ?>

		<button class="bottoni" type="submit"> Registrati </button>
		<br><br> <div class="kylobot"> <span class="uno">S</span>ei gia registrato? Clicca <a href="login.php" class="lil qui"> qui </a>. </div>
	</form>
	</div> <br><br>
</div>

<?php
include_once 'footer.php';
?>
