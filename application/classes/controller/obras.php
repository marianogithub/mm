<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/controller/base/obrasBase.php';

/**
  * 
  */
class Controller_Obras extends Controller_ObrasBase {
	function __construct($request, $response) {
		parent::__construct($request, $response);
		$this->urlVolver = "Expedientes";
	}
}
?>