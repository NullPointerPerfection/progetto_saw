<?php
	session_start();
	include_once "utility/utility_accesso.php";?>

<div class="incima">
    <div class="mezzo">
        <a class="azk" href="home.php"> <span class="noprob uno"> Azkanta Dream</span> </a>
    </div>
    <div>
        <ul class="ulgin">
            <li class="nasc opulence" id="home"><a href="home.php" class="rad"><span class="uno">H</span>ome</a></li>
            <li class="nasc opulence" id="compra"><a href="compra.php" class="rad"><span class="uno">C</span>ompra</a></li>
            <li class="nasc opulence mdx" id="chisiamo"><a href="chisiamo.php" class="rad"><span class="uno">C</span>hi <span class="uno">S</span>iamo</a></li>
            <li class="menn opulence mdx ryd" id="menu"><i class="glyphicon glyphicon-th-list"></i></a></li>
            <li class="nascper opulence login loggg ryd" id="test">
				<?php if(isLogged()){ 
					echo $_SESSION['username']; 
					echo "<img class='toppro' src='".$_SESSION['immagine_profilo']."'>";
				}
				else echo "<span class='uno'>A</span>rea <span class='uno'>P</span>ersonale";?> 
				</li>
        </ul>
    </div>
</div>

<?php
if(isLogged()){
	echo '
	<div class="hidfix" id="pink">
		<div class="bbk ina">
			<div class="ricena" id="profiloM"><a href="profilo.php" class="rad">Profilo</a></div>
			<div class="ricena" id="carrelloM"><a href="carrello.php" class="rad">Carrello</a></div>
			<div class="ricena" id="logoutM"><a class="rad">Log Out</a></div>
		</div>
    </div>
    ';
	}else{ echo '
<div class="hidfix" id="pink">
    <div class="bbk">
        <p class="cstxt jum"><span class="uno">E</span>segui il <span class="uno">L</span>ogin:</p>
        <br>
        <form action="sign_in.php" method="post">
        <input class="inlo" type="text" placeholder="Username" name="username" id="username" required> <br><br>
        <input class="inlo" type="password" placeholder="Password" name="psw" id="psw" required>
        <span class="input-group-btn">
            <button id="box" class="eyesh" type="button"><i id="occhio" class="glyphicon glyphicon-eye-open"></i></button>
          </span><br>
        <button class="bolo" type="submit">Accedi</button>
        <button class="whitebolo" id="reg">Registrati</button> <br> </form>
        <p class="baba"> Hai dimenticato la password? <br><a href="chisiamo.php" class="uno">Clicca qui</a> per riceverla via mail!</p>
    </div>
</div>';}
?>
<div class="tend" id="orange">
	<div class="ricena" id="homeM"><a href="home.php" class="rad">Home</a></div>
	<div class="ricena" id="compraM"><a href="compra.php" class="rad">Compra</a></div>
	<div class="ricena" id="chisiamoM"><a href="chisiamo.php" class="rad">Chi Siamo</a></div>
	
	<?php
		if(!isLogged()){
			echo '
	<div class="aper ricena" id="loginM"><a href="login.php" class="rad">Login</a></div>
	<div class="aper ricena" id="registratiM"><a href="registrati.php" class="rad">Registrati</a></div>';} else { echo'
	<div class="aper ricena" id="profilo2M"><a href="profilo.php" class="rad">Profilo</a></div>
	<div class="aper ricena" id="carrello2M"><a href="carrello.php" class="rad">Carrello</a></div>
	<div class="aper ricena" id="logoutM"><a class="rad">Log Out</a></div>';} ?>
</div>



<script>
	
	$(document).on('click', function (e) {
        if(!$('#pink').hidden && $(e.target).closest("#test").length === 0)
            if ($(e.target).closest("#pink").length === 0)
                $("#pink").hide();
    });
    $(document).on('click', function (e) {
        if(!$('#orange').hidden && $(e.target).closest("#menu").length === 0)
            if ($(e.target).closest("#orange").length === 0)
                $("#orange").hide();
    });
    
    
    var lastWidth = $(window).width();

	$(window).resize(function(){
	   if($(window).width()!=lastWidth){
		  $('#orange').css({"right": $('#test').outerWidth()});
		  lastWidth = $(window).width();
	   }
	})     
	$(document).ready( function(){
		$('#orange').css({"right": $('#test').outerWidth()});
	});
</script>

