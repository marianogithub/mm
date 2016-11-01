<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/controller/base/observacionexpteBase.php';

/**
  * 
  */
class Controller_Observacionexpte extends ObservacionexpteBase {
	function __construct($request, $response) {
		parent::__construct($request, $response);
		$this->urlVolver = "Expedientes";
        $this->isAdmin = false;
	}

	protected function obtenerExpediente($idExpediente) {
		return ORM::factory("expedientes")->getExpediente($idExpediente);
	}
}
?>