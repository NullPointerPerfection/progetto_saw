<?php
    session_start();
    //include 'utility/debug.php';
    include 'utility/connessione.php';
    include 'utility/utility.php';
    include_once 'utility/dbaux.php';
?>

<?php
checklogin();
?>

<div id="risultato">
    <?php
        if(isset($_SESSION['loginerr'])){
            echo $_SESSION['loginerr'];
        }
    ?>
</div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="login">
    <ul>
        <li>
            <label for="username">usrname</label>
            <input type="text" placeholder="Username" id="username" name="username" required>
        </li>
        <li>
            <label for="pwd">Password</label>
            <input type="password" name="psw" id="psw" />
        </li>
    </ul>
    <p><input type="image" src="img/button.png" alt="Log in" id="submit" /></p>
</form>