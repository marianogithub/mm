<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/controller/base/adicionalesBase.php';

/**
  * 
  */
class Controller_Adicionalestemporal extends AdicionalesBase {
	function __construct($request, $response) {
		parent::__construct($request, $response);
        $this->urlVolver = "Temporales";
        $this->urlVolverLabel = "Volver a Datos Cargados";
	}
}
?>