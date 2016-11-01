<?php
require_once 'application/classes/entity/aforo/aforoEntity.php';

/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 31/08/14
 * Time: 13:04
 */
class AforoAdicional extends AforoEntity {
    private $permiso;
    private $adicional;
    private $agua;
    private $cloaca;

    public function __construct() {
        parent::__construct();
    }

    public function addPermiso($derecho, $dimension, $unidad, $valor) {
        $this->permiso = $this->crearDetalle($derecho, null, $dimension, $unidad, $valor, null);
    }
    public function addAdicional($derecho, $dimension, $unidad, $valor) {
        $this->adicional = $this->crearDetalle($derecho, null, $dimension, $unidad, $valor, null);
    }
    public function addAgua($derecho, $dimension, $unidad, $valor) {
        $this->agua = $this->crearDetalle($derecho, null, $dimension, $unidad, $valor, null);
    }
    public function addCloacas($derecho, $dimension, $unidad, $valor) {
        $this->cloaca = $this->crearDetalle($derecho, null, $dimension, $unidad, $valor, null);
    }

    public function getValorPermiso() {
        return $this->getValorDetalle($this->permiso);
    }
    public function getValorAdicional() {
        return $this->getValorDetalle($this->adicional);
    }
    public function getValorAgua() {
        return $this->getValorDetalle($this->agua);
    }
    public function getValorCloaca() {
        return $this->getValorDetalle($this->cloaca);
    }

    public function getPermiso() {
        return $this->permiso;
    }
    public function getAdicional() {
        return $this->adicional;
    }
    public function getAgua() {
        return $this->agua;
    }
    public function getCloaca() {
        return $this->cloaca;
    }

    public function getTotal() {
        $total = 0;

        $total += $this->getValorPermiso();
        $total += $this->getValorAdicional();
        $total += $this->getValorAgua();
        $total += $this->getValorCloaca();

        return $total;
    }
}
?>