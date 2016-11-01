<?php
require_once 'application/classes/entity/aforo/detalleAforo.php';

/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 31/08/14
 * Time: 13:04
 */
class AforoEntity{

    public function __construct() {
    }

    protected function crearDetalle($derecho, $trabajo, $dimension, $unidad, $valor, $puntaje) {
        return new DetalleAforo($derecho, $trabajo, $dimension, $unidad, $valor, $puntaje);
    }

    protected function getValorDetalle($detalleAforo) {
        return ($detalleAforo != null && $detalleAforo->getValor() != null) ? $detalleAforo->getValor() : 0;
    }
}
?>