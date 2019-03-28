<?php
include_once 'header.php';
?>

<?php
include_once 'navbar.php';
?>


<div id="risultati"></div>


    <script>
        $(document).ready(function(){ //prototipo metodo ajax per ricerca
            $('#invio').click(function () {
                var username = $("#username").val();
                var psw = $("#psw").val();
                $.post("sign_in.php", { username: username, psw: psw }, function(msg){
                    $('#risultati').html(msg);
                });
            });
        });
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