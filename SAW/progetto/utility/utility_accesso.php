<?php
    session_start();

    function logout(){
        session_destroy();
        header("Location: index.php");
    }

    function set_login() {
        $_SESSION['logged'] = true;
    }

    function isLogged() {
        return $_SESSION['logged'];
    }

    function set_info_accesso($row){
        $_SESSION['immagine_profilo'] = $row['immagine_profilo'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['cognome'] = $row['cognome'];
        $_SESSION['data_nascita'] = $row['data_nascita'];
        $_SESSION['sesso'] = $row['sesso'];
        $_SESSION['mail'] = $row['mail'];
    }

    function checklogin(){
        if(isLogged()) header("location: pagina_privata.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = test_input($_POST['username']);
            $psw = sha1(test_input($_POST['psw']));

            $condition = 'username=' . $username . ' AND password =' . $psw . "'";
            $res = get_info("utenti", "*", $condition);

            if(!$res){
                $_SESSION['loginerr'] = " non ti sei loggato con successo: username e/o password non corrette";
            }else {

                if (mysqli_num_rows($res) == 1) {
                    set_login();
                    $row = mysqli_fetch_assoc($res);

                    set_info_accesso($row);

                    header("Location: pagina_privata.php");
                } else {
                    $_SESSION['loginerr'] = " non ti sei loggato con successo: username e/o password non corrette";
                }
            }
        }
    }

    /**
     * @param $value = il nome(id) assegnato al campo del form
     * @param $err = errore (eventuale) del campo
     * @param $input = variabile che conterrà il valore del campo del form
     */
    function validated($value, &$err, &$input, &$checkvalidated){
        if (!isset($_POST[$value]) || empty($_POST[$value])) {
            $err = "Name is required";
            $checkvalidated = false;
        } else {
            $input = test_input($_POST[$value]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$input)) $err = "Only letters and white space allowed";
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = mysqli_real_escape_string($GLOBALS['con'],$data);
        return $data;
    }

    function QueryRegistration($username, $psw, $email){

        $elem = array($username,$psw, $email);

        $key = array("username", "password", "mail");

        if(!insert_info("utenti", $key, $elem)){
            $_SESSION['error'] = "INSERT per registrazione non è andata a buon fine";
            header("Location: pagina_errore.php");
            exit();
        }
    }


?>