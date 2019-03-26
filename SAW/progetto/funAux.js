function signin(){
    window.location.href = "register.php";
}

$("#test").click(function(){
    $("#pink").toggle();
});

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

$("#reg").click(function(){
    window.location = "register.php";
});

