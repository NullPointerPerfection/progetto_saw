<?php
    session_start();

    include 'utility/connessione.php';
    include 'utility/utility.php';
    include_once 'utility/utility_accesso.php';

    if(isLogged()) header("location: pagina_privata.php");

    $emailErr = $usernameErr = $pswErr = $repswErr = "";
    $email = $username = $psw = $repsw = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $checkvalidated = true;

        validated('username',$usernameErr,$username, $checkvalidated);

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $checkvalidated = false;
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $checkvalidated = false;
            }
        }

        if (empty($_POST["psw"])) {
            $pswErr = "psw is required";
            $checkvalidated = false;
        } else {
            if(!$_POST["psw"] == $_POST["psw-repeat"]){
                $repswErr = "password non corrispondono";
                $checkvalidated = false;
            }else {
                $psw = test_input($_POST["psw"]);
                // check if psw address is well-formed
                if (!preg_match("^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$", $psw)) {
                    $pswErr = "UpperCase, LowerCase and Number";
                    $checkvalidated = false;
                }
                $psw = sha1($psw);
            }
        }

        if(!autenticazione($username)){
            $usernameErr = "username already exist";
            $checkvalidated = false;
        }

        if($checkvalidated) {
            QueryRegistration($username, $psw);
            $condition = 'username=' . $username . ' AND password =' . $psw . "'";
            $res = get_info("utenti", "*", $condition);
            $row = mysqli_fetch_assoc($res);
            set_info_accesso($row);
        }
    }

    function autenticazione($username){
        $condition = 'username=' . $username;
        $res = get_info("utenti","username", $condition);
        return (mysqli_num_rows($res) == 0); //ritorna vero se non c'è username nel database
    }
?>

<html>
<head>
    <title> Sign In </title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link rel="stylesheet" type="text/css" href="css/font.css">

</head>
<body>

<div class="module">
    <div class="alfa">
        <div class="tyy uno titolo"> Azkanta Dream</div>
        <div class="kylo"> -<span class="uno">I</span>nserisci i tuoi dati per registrarti:-</div>
        <br><br>
        <form class="formaggio" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="email"> <span class="uno">E</span>-mail:<br> </label>
            <input class="boxes" type="email" placeholder="" id="email" required> <br><br>
            <?php echo $emailErr; ?>

            <label for="username"> <span class="uno">U</span>sername:<br> </label>
            <input class="boxes" type="text" placeholder="" id="username" required> <br><br>
            <?php echo $usernameErr; ?>


            <label for="password"> <span class="uno">P</span>assword:<br> </label>
            <input class="boxes" type="text" placeholder="" id="psw" required title="Almeno 8 caratteri, tra cui una lettera maiuscola e un numero."
                   pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"> <br><br>
            <?php echo $pswErr; ?>


            <label for="password"> <span class="uno">C</span>onferma <span class="uno">P</span>assword:<br> </label>
            <input class="boxes" type="text" placeholder="" id="psw-repeat" required title="Almeno 8 caratteri, tra cui una lettera maiuscola e un numero."
                   pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"> <br><br>
            <?php echo $repswErr; ?>


            <button class="bottoni" type="submit"> Registrati </button>
            <br><br> <div class="kylobot"> <span class="uno">S</span>ei gia registrato? Clicca <a href="login.html" class="lil"> qui </a>. </div>
        </form>
    </div>

</body>
</html>