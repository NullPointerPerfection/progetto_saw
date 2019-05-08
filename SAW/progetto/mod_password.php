<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" style="text-align: center;">Modifica Password</h4>
            </div>			
            <div class="modal-body">


                <form action="change_pswd.php" method="post" id="login" style="text-align: center;">
                        <input name="psw" type="text" placeholder="Old password" required>
                        <br><br>
                        <input name="new" type="text" placeholder="New password" required>
                        <br><br>
                        <input name="conf" type="text" placeholder="Confirm password" required>
						<br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                        <button type="submit" class="btn btn-primary">Salva</button>
                    </div>		

                </form>
            </div>			

</body>
</html>
