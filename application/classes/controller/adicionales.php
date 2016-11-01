<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/controller/base/adicionalesBase.php';

/**
  * 
  */
class Controller_Adicionales extends AdicionalesBase {
	function __construct($request, $response) {
		parent::__construct($request, $response);
		$this->urlVolver = "Expedientes";
	}
}
?>