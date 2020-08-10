<?php

    
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
    <nav>
      <a href="#">Inici</a><a href="#">Productes</a><a href="#">Contacte</a>
    </nav>
	<section>
		<form name='formulario' method='post' action='#'>
			<label>Nom</label>
			<input type='text' name='nombre'><br><br><br>
			<label>Correu</label>
            <input type='email' name='correo'><br><br><br>
            <label>Missatge</label>
			<textarea name='mensaje'></textarea><br><br><br>
			<center>
				<input type='submit' value='Enviar' name='enviar'><br><br>
			</center><br><br>
		</form>
  		<article>
  			<h1>SECCIÓ DE CONTINGUT</h1>
            <img src="img/bombilla.jpg">
            <p>Aquest text s'hi troba en català i s'hi te que mostrar als dos idiomes que hi ha seleccionables a la pàgina</p>
  		</article>
	</section>
	<section>
		<table>
			<tr><th id='rem'>Remitent</th><th id='cor'>Correu</th><th id='msg'>Missatge</th><tr>
		</table>
	</section>
	</div>
</body>
</html>
