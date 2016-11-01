<?php
defined('SYSPATH') OR die('No Direct Script Access');

//datos del expediente.-
$expnumero = $_POST["expnumero"];
if(strcmp("", trim($expnumero)) == 0) {
	$objeto->expnumero = null;
} else {
	if(is_numeric($expnumero)) {
		$objeto->expnumero = $expnumero;
	} else {
		$objeto->addError("El numero de expediente es invalido: '$expnumero'" );
	}
}
$objeto->definitivo = isset($_POST[ "definitivo"]) ? 1 : 0;
?>