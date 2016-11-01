<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 31/08/14
 * Time: 13:04
 */
require_once 'application/classes/util/numberUtil.php';

class DetalleAforo{
    private $derecho;
    private $trabajo;
    private $dimension;
    private $unidad;
    private $valor;
    private $puntaje;

    public function __construct($derecho, $trabajo, $dimension, $unidad, $valor, $puntaje) {
        $this->derecho = $derecho;
        $this->trabajo = $trabajo;
        $this->dimension = $dimension;
        $this->unidad = $unidad;
        $this->valor = $valor;
        $this->puntaje = $puntaje;
    }

    public function getDerecho() {
        return $this->derecho;
    }
    public function getTrabajo() {
        return $this->trabajo;
    }
    public function getDimension() {
        return $this->dimension;
    }
    public function getUnidad() {
        return $this->unidad;
    }
    public function getValor() {
        return NumberUtil::formatFloat($this->valor == null ? 0 : $this->valor);
    }
    public function getPuntaje() {
        return $this->puntaje;
    }
}
?>