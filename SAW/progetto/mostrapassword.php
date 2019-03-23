<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<label for="password"> <span class="uno">P</span>assword:<br> </label>
<input class="boxes pwd" type="password" placeholder="" id="psw" name="psw" required title="Almeno 8 caratteri, tra cui una lettera maiuscola e un numero." pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">

<span class="input-group-btn">
            <button id="box" class="btn btn-default reveal" type="button"><i id="occhio" class="glyphicon glyphicon-eye-open"></i></button>
          </span>

<script>
    $("#box").on('click',function() {
        var $pwd = $("#psw");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
            $('#occhio').addClass("glyphicon-eye-close");
            $('#occhio').removeClass("glyphicon-eye-open");

        } else {
            $pwd.attr('type', 'password');
            $('#occhio').removeClass("glyphicon-eye-close");
            $('#occhio').addClass("glyphicon-eye-open");
        }
    });
</script>