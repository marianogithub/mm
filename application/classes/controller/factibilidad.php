<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/base/factibilidadBase.php';

/**
 *
 */
class Controller_Factibilidad extends Controller_FactibilidadBase {
    function __construct($request, $response) {
        parent::__construct($request, $response);
        $this->urlVolver = "Expedientes";
    }
}
?>