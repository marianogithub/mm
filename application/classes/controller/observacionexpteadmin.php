<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/controller/base/observacionexpteBase.php';

/**
  * 
  */
class Controller_Observacionexpteadmin extends ObservacionexpteBase {
	function __construct($request, $response) {
		parent::__construct($request, $response);
		$this->urlVolver = "Expedientesadmin";
        $this->isAdmin = true;
        array_push($this->nombreColumnas,"Eliminar");
        array_push($this->ayudaColumnas,null);
	}

	protected function obtenerExpediente($idExpediente) {
		return ORM::factory("expedientes", $idExpediente);
	}
}
?>