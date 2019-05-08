<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" style="text-align: center;">Cambia elementi del profilo</h4>
            </div>			
            <div class="modal-body">

                <form action="profilo.php" method="post" id="login" style="text-align: center;">
                        <label for="username"> Username: </label> <br>
                        <input name="username" type="text">
                        <br><br>
                        <label for="email"> Email: </label> <br>
                        <input name="email" type="email">
                        <br><br>
                        <label for="username"> Nome: </label> <br>
                        <input name="nome" type="text">
                        <br><br>
                        <label for="username"> Cognome: </label> <br>
                        <input name="cognome" type="text">
                        <br><br>
                        <label for="username"> Età: </label> <br>
                        <input name="eta" type="text">
                        <br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                        <button type="submit" class="btn btn-primary">Salva</button>
                    </div>		

                </form>
            </div>			

</body>
</html>
