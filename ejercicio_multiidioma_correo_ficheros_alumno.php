﻿<?php
//gestion del idioma
require('includes/language.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<div class="contenedor">
    <!--include del header-->
    <?php include('includes/header.html');?>
    <!--incude navbar-->
    <?php include('includes/navbar.html');?>
	<section>
		<form name='formulario' method='post' action='#'>
			<label><?=$nombre?></label>
			<input type='text' name='nombre'><br><br><br>
			<label><?=$correo?></label>
            <input type='email' name='correo'><br><br><br>
            <label><?=$mensaje?></label>
			<textarea name='mensaje'></textarea><br><br><br>
			<center>
				<input type='submit' value='<?=$enviar?>' name='enviar'><br><br>
			</center><br><br>
		</form>
  		<article>
  			<!--lectura fichero contenido-->
  			<?php
					if(file_exists($url_contenido)){
						readfile($url_contenido);
					}
			?>
  		</article>
	</section>
	<section>
		<table>
			<tr><th id='rem'><?=$remitente?></th><th id='cor'><?=$correo?></th><th id='msg'><?=$mensaje?></th><tr>
		</table>
	</section>
	</div>
</body>
</html>
