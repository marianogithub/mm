<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/controller/base/adicionalesBase.php';

/**
  * 
  */
class Controller_Adicionalesadmin extends AdicionalesBase {
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