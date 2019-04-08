<!DOCTYPE html>
<html>
<head>
    <title> Azkanta Dream </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/carousel.css">
    <link rel="stylesheet" type="text/css" href="css/test.css">
    <link rel="stylesheet" type="text/css" href="css/compra.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	
<?php
include_once 'navbar.php'; 
?>

<div class="carlo redgradient">
	<div class="carlo2">
		
		
		
		<div class="ogg">
		<img src="img/Inv_trinket-berserk_charm" class="lx"> 
		<div class="und"><span class="vegas">Berserk Charm:</span>
			<div class="desc">I also like to side-step this bug whenever possible. </div>
			<div class="prez">Prezzo: <span class="vegas">20$</span></div>
			<div class="amma"> Disponibilità limitata</div>
		</div>
		</div>
		<div class="ogg">
		<img src="img/Inv_trinket-bleed_charm" class="lx"> 
		<div class="und"><span class="vegas">Berserk Charm:</span>
			<div class="desc">I also like to side-step this bug whenever possible. </div>
			<div class="prez">Prezzo: <span class="vegas">20$</span></div>
			<div class="amma"> Disponibilità limitata</div>
		</div>
		</div>
		<div class="ogg">
		<img src="img/Inv_trinket-blight_charm" class="lx"> 
		<div class="und"><span class="vegas">Berserk Charm:</span>
			<div class="desc">I also like to side-step this bug whenever possible. </div>
			<div class="prez">Prezzo: <span class="vegas">20$</span></div>
			<div class="amma"> Disponibilità limitata</div>
			</div>
		</div>
		<div class="ogg">
		<img src="img/Inv_trinket-blood_charm" class="lx"> 
		<div class="und"><span class="vegas">Berserk Charm:</span>
			<div class="desc">I also like to side-step this bug whenever possible. </div>
			<div class="prez">Prezzo: <span class="vegas">20$</span></div>
			<div class="amma"> Disponibilità limitata</div>
		</div>
		</div>
		<div class="ogg">
		<img src="img/Inv_trinket-chirurgeons_charm" class="lx"> 
		<div class="und"><span class="vegas">Berserk Charm:</span>
			<div class="desc">I also like to side-step this bug whenever possible. </div>
			<div class="prez">Prezzo: <span class="vegas">20$</span></div>
			<div class="amma"> Disponibilità limitata</div>
			</div>
		</div>
		<div class="ogg">
		<img src="img/Inv_trinket-dazzling_charm" class="lx"> 
		<div class="und"><span class="vegas">Berserk Charm:</span>
			<div class="desc">I also like to side-step this bug whenever possible. </div>
			<div class="prez">Prezzo: <span class="vegas">20$</span></div>
			<div class="amma"> Disponibilità limitata</div>
		</div>
		</div>
		<div class="ogg">
		<img src="img/Inv_trinket-debuff_charm" class="lx"> 
		<div class="und"><span class="vegas">Berserk Charm:</span>
			<div class="desc">I also like to side-step this bug whenever possible. </div>
			<div class="prez">Prezzo: <span class="vegas">20$</span></div>
			<div class="amma"> Disponibilità limitata</div>
			</div>
		</div>
		<div class="ogg">
		<img src="img/Inv_trinket-disease_charm" class="lx"> 
		<div class="und"><span class="vegas">Berserk Charm:</span>
			<div class="desc">I also like to side-step this bug whenever possible. </div>
			<div class="prez">Prezzo: <span class="vegas">20$</span></div>
			<div class="amma"> Disponibilità limitata</div>
		</div>
		</div>
	</div>
	
	
	
	<div class="carlo3">
		<form name="modulo"><br><br>
		<input type="text" placeholder="Ricerca..."><button><i class="glyphicon glyphicon-search"></i></button>
		<br><br>
		<select>
		  <option value="NomeC">Ordina per nome - A/Z</option>
		  <option value="NomeD">Ordina per nome - Z/A</option>
		  <option value="PrezzoC">Ordina per prezzo - crescente</option>
		  <option value="PrezzoD">Ordina per prezzo - decrescente</option>
		</select>
		<br><br>
		<input type="checkbox" id="k" onclick="SelezTT(this)"> k
		<input type="checkbox" name="MyCheck" onclick="check(this)"> a <br><br>
		<input type="checkbox" name="MyCheck" onclick="check(this)"> b 
		<input type="checkbox" name="MyCheck" onclick="check(this)"> c <br><br>
		<input type="checkbox" name="MyCheck" onclick="check(this)"> d 
		<input type="checkbox" name="MyCheck" onclick="check(this)"> e <br><br>
		</form>
	</div>
	
<script>
function SelezTT(k){
	if(k.checked){
		var i = 0;
		var modulo = document.modulo.elements;
		for (i=0; i<modulo.length; i++)
			if(modulo[i].type == "checkbox")
				modulo[i].checked = true;
	} 
	else{
		var i = 0;
		var modulo = document.modulo.elements;
		for (i=0; i<modulo.length; i++)
			if(modulo[i].type == "checkbox")
				modulo[i].checked = false;
	}
}

function check(check){
	var value = check.checked;
	var modulo =  document.getElementsByName('MyCheck');
	if(value) {
		for (i = 0; i < modulo.length; i++)
			if (modulo[i].type == "checkbox")
				if(modulo[i].checked == false) return;
		document.getElementById('k').checked = true;
	}
	else document.getElementById('k').checked = false;          
}
</script>

<script>
        $( document ).ready(function() {
            $('#compra').addClass("activ");
            $('#compraM').addClass("activ");
            $('#chisiamo').removeClass("activ");
            $('#chisiamoM').removeClass("activ");
            $('#home').removeClass("activ");
            $('#homeM').removeClass("activ");
        });
</script>

<?php
include_once 'footer.php';
?>
