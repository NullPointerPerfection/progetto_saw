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
	<div class="carlo2" id="risultati">
	</div>
	
	
	
	<div class="carlo3">
	<div id="carlo4"></div>
		
		<input id="ricerca" name="ricerca" type="text" placeholder="Ricerca..."><button id="bot"><i class="glyphicon glyphicon-search"></i></button>
		<br><br>
		<select class="slk" id="ord">
		  <option value="NomeC">Ordina per nome - A/Z</option>
		  <option value="NomeD">Ordina per nome - Z/A</option>
		  <option value="PrezzoC">Ordina per prezzo - crescente</option>
		  <option value="PrezzoD">Ordina per prezzo - decrescente</option>
		</select>
		<br><br>
		<form name="modulo" class="ckbx">
		<input type="checkbox" id="k" onclick="SelezTT(this)" checked> Seleziona tutto <br>
		<input class="xxx" id="mycheck" type="checkbox" name="MyCheck" onclick="check(this)" value="Armi" checked> Armi <br>
		<input class="xxx" id="mycheck" type="checkbox" name="MyCheck" onclick="check(this)" value="Arte" checked> Arte <br>
		<input class="xxx" id="mycheck" type="checkbox" name="MyCheck" onclick="check(this)" value="Fiale" checked> Fiale <br>
		<input class="xxx" id="mycheck" type="checkbox" name="MyCheck" onclick="check(this)" value="Gioielli" checked> Gioielli <br>
		<input class="xxx" id="mycheck" type="checkbox" name="MyCheck" onclick="check(this)" value="Libri" checked> Libri <br>
		<input class="xxx" id="mycheck" type="checkbox" name="MyCheck" onclick="check(this)" value="Strumenti" checked> Strumenti <br>
		<input class="xxx" id="mycheck" type="checkbox" name="MyCheck" onclick="check(this)" value="Vestiti" checked> Vestiti <br>
		<input class="xxx" id="mycheck" type="checkbox" name="MyCheck" onclick="check(this)" value="Altro" checked> Altro <br>
		</form>
	</div>
	
	<div class="cover">		</div>

		<div class="centercover">
	</div>
	
<script>
	
	function motore(){
		var segno;
            if($('#ord').val() === 'NomeC' || $('#ord').val() === 'PrezzoC')
                segno = 'ASC';
            else
                segno = 'DESC';

            var mycheck = new Array();
            $("#mycheck:checked").each(function() {
                mycheck.push($(this).val());
            });

            $.get("motore_ricerca.php", { ricerca: 'ricerca', barra: $('#ricerca').val(), order: $('#ord').val(), segno: segno, categorie: mycheck }, function(msg){
                $('#risultati').html(msg);
            });
	}
	
	$(".xxx").change(function(){motore()});
	$("#ord").click(function(){motore()});
	
	
	function abcd(value, ident){
		var str = "#" + ident;		
		$.get("script.php", { prodotto: value, query: "insert"}, function(msg){
			$(str).fadeIn('slow', function(){
			$(str).html(msg);
            $(str).delay(1000).fadeOut(); });
		});
	}
	
	 $(document).ready(function () {	
		
		 $('.slk').change(function () {
                $.get("motore_ricerca.php", { ricerca: 'ordinamento', ordine: $(this).val() }, function(msg){
                    $('#risultati').html(msg);
                });

            });
            	 	 
           if($('#k').prop('checked')==true){
			   var segno;
				   if($('#ord').val() === 'NomeC' || $('#ord').val() === 'PrezzoC')
					segno = 'ASC';
				else
					segno = 'DESC';
					
					var str = $('#ricerca').val();
					
			var mycheck = new Array();
				$("#mycheck:checked").each(function() {
					mycheck.push($(this).val());
				});
			   $.get("motore_ricerca.php", { ricerca: 'ricerca', barra: str,  order: $('#ord').val(), segno: segno, categorie: mycheck }, function(msg){
                    $('#risultati').html(msg);
               });
			}
        });
	
	$('#bot').click(function (e) {
                var str = $('#ricerca').val();
                var segno;
				   if($('#ord').val() === 'NomeC' || $('#ord').val() === 'PrezzoC')
					segno = 'ASC';
				else
					segno = 'DESC';
					var mycheck = new Array();
						$("#mycheck:checked").each(function() {
							mycheck.push($(this).val());
						});
                $.get("motore_ricerca.php", { ricerca: 'ricerca', barra: str,  order: $('#ord').val(), segno: segno, categorie: mycheck }, function(msg){
                    $('#risultati').html(msg);
                });
            }); 
	
	
function SelezTT(k){
	if(k.checked){
		var i = 0;
		var modulo = document.modulo.elements;
		for (i=0; i<modulo.length; i++)
			if(modulo[i].type == "checkbox")
				modulo[i].checked = true;
			var segno;
				   if($('#ord').val() === 'NomeC' || $('#ord').val() === 'PrezzoC')
					segno = 'ASC';
				else
					segno = 'DESC';
					
					var str = $('#ricerca').val();
					
			var mycheck = new Array();
				$("#mycheck:checked").each(function() {
					mycheck.push($(this).val());
				});
			   $.get("motore_ricerca.php", { ricerca: 'ricerca', barra: str,  order: $('#ord').val(), segno: segno, categorie: mycheck }, function(msg){
                    $('#risultati').html(msg);
               });
	} 
	else{
		var i = 0;
		var modulo = document.modulo.elements;
		for (i=0; i<modulo.length; i++)
			if(modulo[i].type == "checkbox")
				modulo[i].checked = false;
		$('#risultati').html("<div class='nores'>-NESSUN RISULTATO-<br><img src='img/Castellan.png'></div>");
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
		$.get("motore_ricerca.php", {ricerca: 'filtroChecked', categoria: $(this).val()}, function(msg){
				$('#risultati').html(msg);
			});
	}
	else{ 
		document.getElementById('k').checked = false; 
		$.get("motore_ricerca.php", {ricerca: 'filtroCheckedOut', categoria: $(this).val()}, function(msg){
				$('#risultati').html(msg);
			});
	}		
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
            $('#carrelloM').removeClass("activ");
            $('#profiloM').removeClass("activ");
            $('#carrello2M').removeClass("activ");
            $('#profilo2M').removeClass("activ");
        });
</script>

<?php
include_once 'footer.php';
?>
