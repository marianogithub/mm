<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/controller/base/inspeccionesBase.php';

/**
  * 
  */
class Controller_Inspecciones extends Controller_InspeccionesBase {
	function __construct($request, $response) {
		parent::__construct($request, $response);
		$this->urlVolver = "Expedientes";
	}

	protected function obtenerExpediente($idExpediente) {
		return ORM::factory("expedientes")->getExpediente($idExpediente);
	}
}
?>