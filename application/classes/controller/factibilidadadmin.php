<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/base/factibilidadBase.php';

/**
 *
 */
class Controller_Factibilidadadmin extends Controller_FactibilidadBase {
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