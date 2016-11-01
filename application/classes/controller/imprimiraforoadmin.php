<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/controller/base/imprimirAforoBase.php';

/**
  * 
  */
class Controller_Imprimiraforoadmin extends Controller_ImprimirAforoBase {
	function __construct($request, $response) {
		parent::__construct($request, $response);
		$this->urlVolver = "Expedientesadmin";
		$this->isAdmin = true;
	}

	protected function obtenerExpediente($idExpediente) {
		return ORM::factory("expedientes", $idExpediente);
	}
}
?>