<?php
//array de idiomas permitidos
$array_idiomas = ['es', 'ca'];

//definir un idioma por defecto
$idioma = 'es';
echo $idioma;

//definir el idioma por seleccion del usuario enlaces header
//peticiones que llegan por URL son GET SIEMPRE
if(isset($_GET['idioma'])){
//verifica que es idioma permitido, si no existe deja el idioma por defecto = es
//busca contenido "x" en array escalar 
	if(in_array($_GET['idioma'], $array_idiomas)){
		$idioma = $_GET['idioma'];	
	}
}

//include de idioma seleccionado entre ""
include("includes/traductions_$idioma.php");
?> 