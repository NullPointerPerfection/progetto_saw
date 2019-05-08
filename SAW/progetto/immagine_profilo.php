<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" style="text-align: center;">Cambia immagine del profilo</h4>
            </div>			
            <div class="modal-body">

                        <img src="img/profilo/1.png" class="imp">
                        <img src="img/profilo/2.png" class="imp">
                        <img src="img/profilo/3.png" class="imp">
                        <img src="img/profilo/4.png" class="imp">
                        <img src="img/profilo/5.png" class="imp">
                        <img src="img/profilo/6.png" class="imp">
                        <img src="img/profilo/7.png" class="imp">
                        <img src="img/profilo/8.png" class="imp">
                        <img src="img/profilo/9.png" class="imp">
                        <img src="img/profilo/10.png" class="imp">
                        <img src="img/profilo/11.png" class="imp">
                        <img src="img/profilo/12.png" class="imp">
                        <img src="img/profilo/13.png" class="imp">
                        <img src="img/profilo/14.png" class="imp">
                        <img src="img/profilo/15.png" class="imp">
                        <img src="img/profilo/16.png" class="imp">
                        <img src="img/profilo/17.png" class="imp">
                        <img src="img/profilo/18.png" class="imp">
                 
            </div>			
<script>
	$(document).ready(function(){
		$('.imp').click(function(){
			$.get('change_img.php', {path: this.src}, function(msg){
				$('#immagine').html(msg);
				window.location.reload(false);
				});
			})
		});
</script>
</body>
</html>
