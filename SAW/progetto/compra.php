<?php
include_once 'header.php';
?>

<?php
include_once 'navbar.php';
?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

    <div id="risultati"></div>

    <input type="text" id="input">
    <button id="bot">fai partire la ricerca</button>


    <script>
        $(document).ready(function(){ //prototipo metodo ajax per ricerca
            $('#bot').click(function () {
                var val = $("#input").val();
                $.get("motore_ricerca.php", { ricerca: 'ricerca', barra: val }, function(msg){
                    $('#risultati').html(msg);
                });
            });
        });
 /*
        $(document).ready(function(){ //prototipo metodo ajax per ricerca
            $('#invio').click(function () {
                var username = $("#username").val();
                var psw = $("#psw").val();
                $.post("sign_in.php", { username: username, psw: psw }, function(msg){
                    $('#risultati').html(msg);
                });
            });
        });*/
    </script>


    <script>
        $( document ).ready(function() {
            $('#compra').addClass("activ");
            $('#home').removeClass("activ");
            $('#chisiamo').removeClass("activ");
        });
    </script>
<?php
include_once 'footer.php';
?>