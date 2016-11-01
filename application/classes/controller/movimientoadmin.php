<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/controller/base/movimientoBase.php';

/**
  * 
  */
class Controller_Movimientoadmin extends Controller_MovimientoBase {
function __construct($request, $response) {
		parent::__construct($request, $response);
		$this->urlVolver = "Expedientesadmin";
	}

	protected function obtenerExpediente($idExpediente) {
		return ORM::factory("expedientes", $idExpediente);
	}
}
?>