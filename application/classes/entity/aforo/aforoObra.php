<?php
require_once 'application/classes/entity/aforo/aforoEntity.php';
require_once 'application/classes/entity/aforo/detalleRelevamiento.php';

/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 31/08/14
 * Time: 13:04
 */
class AforoObra extends AforoEntity {
    private $obra;
    private $boca;
    private $recinto;
    //RELEVAMIENTOS
    private $porcentajeRelevamiento;
    private $relevamientoObra;
    private $relevamientoBoca;
    private $relevamientoRecinto;

    public function __construct($porcentajeRelevamiento) {
        parent::__construct();
        $this->porcentajeRelevamiento = $porcentajeRelevamiento;
    }

    public function addObra($derecho, $trabajo, $dimension, $unidad, $valor, $puntaje) {
        $this->obra = $this->crearDetalle($derecho, $trabajo, $dimension, $unidad, $valor, $puntaje);
        $this->relevamientoObra = $this->crearRelevamiento($valor);
    }
    public function addBoca($derecho, $trabajo, $dimension, $unidad, $valor) {
        $this->boca = $this->crearDetalle($derecho, $trabajo, $dimension, $unidad, $valor, null);
        $this->relevamientoBoca = $this->crearRelevamiento($valor);
    }
    public function addRecinto($derecho, $trabajo, $dimension, $unidad, $valor) {
        $this->recinto = $this->crearDetalle($derecho, $trabajo, $dimension, $unidad, $valor, null);
        $this->relevamientoRecinto = $this->crearRelevamiento($valor);
    }

    private function crearRelevamiento($valor) {
        $relevamiento = null;
        if($this->porcentajeRelevamiento != null && $valor > 0) {
            $valorRelevamiento = $valor * $this->porcentajeRelevamiento / 1000;
            $relevamiento = new DetalleRelevamiento($this->porcentajeRelevamiento, $valorRelevamiento);
        }
        return $relevamiento;
    }

    public function getValorObra() {
        return $this->getValorDetalle($this->obra);
    }
    public function getValorBoca() {
        return $this->getValorDetalle($this->boca);
    }
    public function getValorRecinto() {
        return $this->getValorDetalle($this->recinto);
    }

    //aforos
    public function getObra() {
        return $this->obra;
    }
    public function getBoca() {
        return $this->boca;
    }
    public function getRecinto() {
        return $this->recinto;
    }
    //relevamientos
    public function getRelevamientoObra() {
        return $this->relevamientoObra;
    }
    public function getRelevamientoBoca() {
        return $this->relevamientoBoca;
    }
    public function getRelevamientoRecinto() {
        return $this->relevamientoRecinto;
    }
    private function getValorRelevamiento($relevamiento) {
        return ($relevamiento != null && $relevamiento->getValor() != null) ? $relevamiento->getValor() : 0;
    }

    public function getTotal() {
        $total = 0;

        $total += $this->getValorObra();
        $total += $this->getValorRelevamiento($this->relevamientoObra);
        $total += $this->getValorBoca();
        $total += $this->getValorRelevamiento($this->relevamientoBoca);
        $total += $this->getValorRecinto();
        $total += $this->getValorRelevamiento($this->relevamientoRecinto);

        return $total;
    }
}
?>