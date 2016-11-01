<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/entity/aforo/aforoObra.php';
require_once 'application/classes/business/aforo/calculoAforo.php';

/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 31/08/14
 * Time: 11:36
 */
class CalculoAforoObra extends CalculoAforo {
    private $obra;
    //destinos.-
    private $destino;
    //trabajo.-
    private $trabajo;
    //derechos.-
    private $derechoObra;
    private $derechoBocas;
    private $derechoRecintos;
    //porcentaje de relevamiento.-
    private $porcentajeRelevamiento;

    function __construct($obraParam) {
        parent::__construct();
        $this->obra = $obraParam;
        $this->porcentajeRelevamiento = null;
        //destinos.-
        if($obraParam->iddestino != null){
            $this->destino = $obraParam->destinoObj;
            $this->derechoObra = $this->obtenerDerecho($this->destino->nombredestino, $this->obra->puntaje);
            //porcentaje de relevamiento.-
            $this->obtenerPorcentajeRelevamiento();
        }
        //trabajo.-
        $this->trabajo = $obraParam->trabajoObj;
        //derechos.-
        $this->derechoBocas = $this->obtenerDerecho($this->parametro->getDerechoBocas(), null);
        $this->derechoRecintos = $this->obtenerDerecho($this->parametro->getDerechoRecintos(), null);
    }

    public function calcularAforos() {
        //AFORO = valor obra * % de trabajo.-
        $aforoObra = $this->calcularAforoValorObra();
        $aforoBocas = $this->calcularAforoBocas();
        $aforoRecintos = $this->calcularAforoRecintos();

        //detalles.-
        $aforo = new AforoObra($this->porcentajeRelevamiento);
        $aforo->addObra($this->derechoObra, $this->trabajo, "m2", $this->obra->getSuperficieTotal(), $aforoObra, $this->obra->puntaje);
        $aforo->addBoca($this->derechoBocas, $this->trabajo, "Bocas", $this->obra->bocas, $aforoBocas);
        $aforo->addRecinto($this->derechoRecintos, $this->trabajo, "Recintos", $this->obra->recintos, $aforoRecintos);
        return $aforo;
    }

    private function obtenerPorcentajeRelevamiento() {
        if(strcmp($this->parametro->getTipoObraRelevada(), $this->obra->tipoobra) == 0) {
            $superficieTotal = $this->obra->getSuperficieTotal();
            if($superficieTotal > 0){
                $proporcion = 1;
                if($superficieTotal < $this->destino->coeficienteSuperficie){
                    $proporcion = $superficieTotal / $this->destino->coeficienteSuperficie;
                }
                $this->porcentajeRelevamiento = $proporcion * 1000;
            }
        }
    }
    private function calcularAforoValorObra() {
        //AFORO = valor obra * % de trabajo.-
        return $this->calcularValorObra() * $this->obtenerPorcentajeTrabajo();
    }
    private function calcularAforoBocas() {
        //AFORO BOCAS = Nº bocas * valor indice * VI * % de trabajo.-
        return $this->obra->bocas * $this->valorIndice * $this->calcularCoeficiente($this->derechoBocas) * $this->obtenerPorcentajeTrabajo();
    }
    private function calcularAforoRecintos() {
        //AFORO RECINTOS = Nº recintos * valor indice * VI * % de trabajo.-
        return $this->obra->recintos * $this->valorIndice * $this->calcularCoeficiente($this->derechoRecintos) * $this->obtenerPorcentajeTrabajo();
    }

    private function calcularValorObra() {
        //VALOR OBRA = superficie * valor indice * coeficiente.-
        return $this->obra->getSuperficieTotal() * $this->valorIndice * $this->calcularCoeficiente($this->derechoObra);
    }

    private function obtenerPorcentajeTrabajo(){
        return $this->trabajo->porcentaje / 100;
    }
}
?>