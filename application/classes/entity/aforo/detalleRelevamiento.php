<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 31/08/14
 * Time: 13:04
 */
require_once 'application/classes/util/numberUtil.php';

class DetalleRelevamiento{
    private $nombre = "Relevamiento";
    private $porcentaje;
    private $valor;

    public function __construct($porcentaje, $valor) {
        $this->porcentaje = $porcentaje;
        $this->valor = $valor;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function getPorcentaje() {
        return $this->porcentaje;
    }
    public function getValor() {
        return NumberUtil::formatFloat($this->valor == null ? 0 : $this->valor);
    }
}
?>