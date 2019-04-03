<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title> Azkanta Dream </title>
    <link rel="stylesheet" type="text/css" href="css/carousel.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <link rel="stylesheet" type="text/css" href="css/test3.css">

    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link rel="stylesheet" type="text/css" href="css/font.css">
</head>

<body>

<div class="module">
	<div class="alfa">
		<div class="tyy uno titolo"> 
			Azkanta Dream</div>
		<div class="kylo"> -
		<span class="uno">I</span>nserisci i tuoi dati per effettuare il <span class="uno">login</span>:-
		</div>
		<br><br>

        <?php
            echo $_SESSION['error'];
        ?>
	<form class="formaggio" action="sign_up.php" method="post">
		<label for="username"> <span class="uno">U</span>sername:<br> </label>
		<input class="boxes" type="text" placeholder="" id="username" name="username" required> <br><br>
		<?php if(isset($_SESSION["usernameErr"]) && !empty($_SESSION["usernameErr"])) echo $_SESSION["usernameErr"]; ?>

		<label for="password"> <span class="uno">P</span>assword:<br> </label>
		<input class="boxes" type="text" placeholder="" id="psw" name="psw" required title="Almeno 8 caratteri, tra cui una lettera maiuscola e un numero."
		 pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"> <br><br>
		<?php if(isset($_SESSION["pswErr"]) && !empty($_SESSION["pswErr"])) echo $_SESSION["pswErr"]; ?>

		<button class="bottoni" type="submit"> Login </button>
		<br><br> <div class="kylobot"> <span class="uno">N</span>on hai un profilo? Clicca <a href="register.php" class="lil"> qui </a>. </div>
	</form>
	</div> <br><br>
</div>

<?php
include_once 'footer.php';
?>
