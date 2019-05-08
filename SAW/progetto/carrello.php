
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
$carrello= unserialize($_SESSION['carrello']);
?>

<div class="carlo redgradient">
	<div class="carlo2" id="risultati">
		<?php echo $carrello->printAll();
		?>
	</div>
	
	
	<div class="carlo3">
		<div class="carr">CARRELLO</div>
		<div class="ina">Prezzo totale: </div>
		<input type="text" placeholder="Codice promozionale">
		<br><br>
		<button class="whitebolo">Compra</button>
		<button id="all" onclick= "elim()" class="bolo boloauto">Elimina tutto</button>
	</div>
	

	
<script>
	
	
		function elim(){
				$.get("script.php", { query: "deleteAll"}, function(msg){
					$('#risultati').html(msg );
				});
			}
	
		function abcde(value, ident){
		//var str = "#" + ident;	
		$.get("script.php", { prodotto: value, query: "delete"}, function(msg){
			$('#risultati').html(msg);
			});
		}

</script>



<script>
        $( document ).ready(function() {
            $('#compra').removeClass("activ");
            $('#compraM').removeClass("activ");
            $('#chisiamo').removeClass("activ");
            $('#chisiamoM').removeClass("activ");
            $('#home').removeClass("activ");
            $('#homeM').removeClass("activ");
            $('#carrelloM').addClass("activ");
            $('#profiloM').removeClass("activ");
            $('#carrello2M').addClass("activ");
            $('#profilo2M').removeClass("activ");
            
        });
        
        
</script>

<?php
include_once 'footer.php';
?>
