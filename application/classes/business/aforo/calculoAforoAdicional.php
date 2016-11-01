<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/entity/aforo/aforoAdicional.php';
require_once 'application/classes/business/aforo/calculoAforo.php';
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 31/08/14
 * Time: 11:36
 */
class CalculoAforoAdicional extends CalculoAforo {
    private $obraAdicional;
    //destinos.-
    private $permiso;
    private $adicional;
    private $agua;
    private $cloacas;
    //derechos.-
    private $permisoDerecho;
    private $adicionalDerecho;
    private $aguaDerecho;
    private $cloacasDerecho;
    //coeficientes.-
    private $ccPermiso;
    private $ccAdicional;
    private $ccAgua;
    private $ccCloacas;

    function __construct($adicionalParam) {
        parent::__construct();
        $this->obraAdicional = $adicionalParam;

        //destinos.-
        if($adicionalParam->idpermiso != null) {
            $this->permiso = $adicionalParam->permisoRotura;
            $this->permisoDerecho = $this->obtenerDerecho($this->permiso->descripcion, null);
        }
        if($adicionalParam->idobrasadicional != null) {
            $this->adicional = $adicionalParam->adicional;
            $this->adicionalDerecho = $this->obtenerDerecho($this->adicional->descripcion, null);
        }
        if($adicionalParam->idagua != null) {
            $this->agua = $adicionalParam->agua;
            $this->aguaDerecho = $this->obtenerDerecho($this->agua->descripcion, null);
        }
        if($adicionalParam->idcloacas != null) {
            $this->cloacas = $adicionalParam->cloacas;
            $this->cloacasDerecho = $this->obtenerDerecho($this->cloacas->descripcion, null);
        }

        //coeficientes.-
        $this->ccPermiso = $this->calcularCoeficiente($this->permisoDerecho);
        $this->ccAdicional = $this->calcularCoeficiente($this->adicionalDerecho);
        $this->ccAgua = $this->calcularCoeficiente($this->aguaDerecho);
        $this->ccCloacas = $this->calcularCoeficiente($this->cloacasDerecho);
    }

    public function calcularAforos() {
        //valores.-
        $aforoPermiso = $this->calcularPermiso();
        $aforoAdicional = $this->calcularAdicional();
        $aforoAgua = $this->calcularAgua();
        $aforoCloacas = $this->calcularCloacas();

        //detalles.-
        $aforo = new AforoAdicional();
        $aforo->addPermiso($this->permisoDerecho, "Metro Lineal", $this->obraAdicional->mlpermiso, $aforoPermiso);
        $aforo->addAdicional($this->adicionalDerecho, $this->adicional != null ? $this->adicional->dimension : "", $this->obraAdicional->unidadobraadicional, $aforoAdicional);
        $aforo->addAgua($this->aguaDerecho, "Unidad", $this->obraAdicional->unidadagua, $aforoAgua);
        $aforo->addCloacas($this->cloacasDerecho, "Unidad", $this->obraAdicional->unidadcloacas, $aforoCloacas);

        return $aforo;
    }

    private function calcularPermiso() {
        return $this->obraAdicional->mlpermiso * $this->valorIndice * $this->ccPermiso;
    }
    private function calcularAdicional() {
        return $this->obraAdicional->unidadobraadicional * $this->valorIndice * $this->ccAdicional;
    }
    private function calcularAgua() {
        return $this->obraAdicional->unidadagua * $this->valorIndice * $this->ccAgua;
    }
    private function calcularCloacas() {
        return $this->obraAdicional->unidadcloacas * $this->valorIndice * $this->ccCloacas;
    }
}
?>