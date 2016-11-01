<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/base/factibilidadBase.php';

/**
 *
 */
class Controller_Factibilidadtemporal extends Controller_FactibilidadBase {
    function __construct($request, $response) {
        parent::__construct($request, $response);
        $this->urlVolver = "Temporales";
        $this->urlVolverLabel = "Volver a Datos Cargados";
    }
}
?>