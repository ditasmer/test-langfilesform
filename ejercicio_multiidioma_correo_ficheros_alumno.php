<?php
//gestion del idioma
require('includes/language.php');

//VALIDA FORMULARIO
//ini vars
$correo_form = '';
$nombre_form = '';
$mensaje_form = '';
$error = '';
//comprobamos que exise Enviar 
if(isset($_POST['enviar'])){
	//si existe, leemos y evaluamos nombre, correo, mensaje
	$nombre_form = trim($_POST['nombre_form']);
	$correo_form = trim($_POST['correo_form']);
	$mensaje_form = trim($_POST['mensaje_form']);	
	//validar try catch datos
	try{
		if($nombre_form == ''){
			throw new Exception("Nombre obligatorio", 1);
		}
		if($correo_form == ''){
			throw new Exception("Correo obligatorio", 1);
		}
		if($mensaje_form == ''){
			throw new Exception("Mensaje obligatorio", 1);	
		}
	} catch(Exception $e){
		//tratamiento de errores
		$error = $e->getMessage();
	}
}

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
			<input type='text' name='nombre_form' /><br><br><br>
			<label><?=$correo?></label>
            <input type='email' name='correo_form' /><br><br><br>
            <label><?=$mensaje?></label>
			<textarea name='mensaje_form' /></textarea><br><br><br>
			<!--zona de mensajes-->
			<span><?=$error?></span><br><br>
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
