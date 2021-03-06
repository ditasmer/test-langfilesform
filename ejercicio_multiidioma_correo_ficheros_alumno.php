﻿<?php
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
			throw new Exception($avisonombre, 1);
		}
		if($correo_form == ''){
			throw new Exception($avisocorreo, 1);
		}
		if($mensaje_form == ''){
			throw new Exception($avisomensaje, 1);	
		}
		//guardar datos en fichero externo 
		//construccion del mesnaje: Nom remitent; correu; missatge
		$mensaje_nuevo = "$nombre_form; $correo_form; $mensaje_form\n";
		//verifica si existe el fichero
		if(file_exists('files/mensajes.txt')){
			//Escritura avanzada de ficheros, abrir fichero
			$fichero = fopen('files/mensajes.txt', 'a+');
			//escribir
			fwrite($fichero, $mensaje_nuevo);
			//cerrar
			fclose($fichero);
		}
		
		//si todo ha ido bien, limpiar campos
		$correo_form = '';
		$nombre_form = '';
		$mensaje_form = '';
	} catch(Exception $e){
		//tratamiento de errores
		$error = $e->getMessage();
	}
}
//MUESTRA TABLA DE MENSAJES
$contenido_tabla = '';
//valida que existe el fichero
if(file_exists('files/mensajes.txt')){
	//lectura linia a linea en array
	$arrayLineas = file('files/mensajes.txt');
	//print_r($arrayLineas);
	$array_fila = '';
	foreach ($arrayLineas as $linea) {
		//extraer datos separados por caracter ;
		$array_fila = explode(';', $linea);
		//print_r($array_fila);
		$contenido_tabla .= '<tr>';
		$td = '';
		//extraer dato columna por linea
		foreach ($array_fila as $dato_columna) {
			//echo $dato_columna;
			$td .= "<td>$dato_columna</td>";
		}
		$contenido_tabla .= $td;
		$td = '';
		$contenido_tabla .= '</tr>';
	}
	//echo $contenido_tabla;
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
			<input type='text' name='nombre_form' value='<?=$nombre_form?>' /><br><br><br>
			<label><?=$correo?></label>
            <input type='email' name='correo_form' value='<?=$correo_form?>' /><br><br><br>
            <label><?=$mensaje?></label>
			<textarea name='mensaje_form' /><?=$mensaje_form?></textarea><br><br><br>
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
			<tr>
				<th id='rem'><?=$remitente?></th>
				<th id='cor'><?=$correo?></th>
				<th id='msg'><?=$mensaje?></th>
			</tr>
			<?=$contenido_tabla ?>
		</table>
	</section>
	</div>
</body>
</html>
