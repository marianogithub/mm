<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/controller/base/imprimirAforoBase.php';

/**
  * 
  */
class Controller_Imprimiraforo extends Controller_ImprimirAforoBase {
	function __construct($request, $response) {
		parent::__construct($request, $response);
		$this->urlVolver = "Expedientes";
	}
}
?>