<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 31/08/14
 * Time: 11:36
 */
class CalculoAforo {
    protected $parametro;
    protected $valorIndice;
    protected $derecho;

    function __construct() {
        //obtenemos el valor indice de la tabla parametro.-
        $this->parametro = ORM::factory("parametro");
        $this->valorIndice = $this->parametro->getValorIndice();
        $this->valorIndice = $this->valorIndice == null ? 1 : $this->valorIndice;

        $this->derecho = ORM::factory("derecho");
    }

    protected function obtenerDerecho($nombreDestino, $puntaje){
        return $this->derecho->getDerechoPorDestino($nombreDestino, $puntaje);
    }

    protected function calcularCoeficiente($derecho){
        $cc = 1;

        if($derecho != null) {
            $cc = $derecho->CC != null ? $derecho->CC : 1;
        }

        return $cc;
    }
}
?>