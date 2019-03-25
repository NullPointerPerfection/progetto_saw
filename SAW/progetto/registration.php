<?php
    session_start();
    ?>

<html>
<head>
    <title> Sign In </title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link rel="stylesheet" type="text/css" href="css/font.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>

<div class="module">
    <div class="alfa">
        <div class="tyy uno titolo"> Azkanta Dream</div>
        <div class="kylo"> -<span class="uno">I</span>nserisci i tuoi dati per registrarti:-</div>
        <br><br>

        <form class="formaggio" action="sign_up.php" method="POST">
            <label for="email"> <span class="uno">E</span>-mail:<br> </label>
            <input class="boxes" type="email" placeholder="" id="email" name="email" required> <br><br>
            <?php echo $_SESSION["emailErr"]; ?>

            <label for="username"> <span class="uno">U</span>sername:<br> </label>
            <input class="boxes" type="text" placeholder="" id="username" name="username" required> <br><br>
            <?php echo $_SESSION["usernameErr"]; ?>

            <label for="password"> <span class="uno">P</span>assword:<br> </label>
            <input class="boxes" type="password" placeholder="" id="psw" name="psw" required title="Almeno 8 caratteri, tra cui una lettera maiuscola e un numero." pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">

            <br><br>
            <?php echo $_SESSION["pswErr"]; ?>

            <div class="container">

            <label for="password"> <span class="uno">C</span>onferma <span class="uno">P</span>assword:<br> </label>
            <input class="boxes" type="password" placeholder="" id="psw-repeat" name="psw-repeat" required title="Almeno 8 caratteri, tra cui una lettera maiuscola e un numero."
                   pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"> <br><br>
            <?php echo $_SESSION["repswErr"]; ?>
            </div>

            <button class="bottoni" type="submit"> Registrati </button>

            <br><br> <div class="kylobot"> <span class="uno">S</span>ei gia registrato? Clicca <a href="login.html" class="lil"> qui </a>. </div>
        </form>
    </div>


</body>
</html>