<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
 *
 */
class Controller_FactibilidadBase extends App_Controller_Template {
    protected $urlVolver = null;
    protected $urlVolverLabel = "Volver a Expedientes";
    protected $isAdmin = false;
    private $errores;

    function __construct($request, $response) {
        parent::__construct($request, $response);

        $this->titulo			= "Factibilidad";
        $this->encabezado		= "Factibilidad";
        $this->nombreColumnas	= Array( "Uso", "Lote Mínimo", "Altura Máxima", "Ancho Mínimo",
                                         "Retiro", "Viviendas Permitidas", "Galpón", "FOS", "FOT","Cumplir Ordenanza","Ensanche o Apertura",
            "Afectacion Limites", "Actividades Complejas","Iniciar Expediente", "Fuerza Motriz", "Estacionamiento","Espacio Ocupar" );
        $this->nombreTabla		= "factibilidad";
        $this->nombreTablaAsociada = "zonascargadasuso";
        $this->formulario		= "forms/zonasCargadasForm";
        $this->listado			= "lists/factibilidadList";

        $this->isAdmin = false;
        $errores = array();
    }

    function action_index() {
        $expediente = null;
        $listado = array();
        $zonasCargadasUso = array();

        $parametros = $this->request->param( Parametros::$params );
        $idExpediente = Parametros::getValueFromParam( $parametros, Parametros::$params );
        $expediente = $this->obtenerExpediente($idExpediente);
        $idnumerozonaParam = Parametros::getValueFromParam( $parametros, "idnumerozona" );

        //todos los numeros
        $numerozonas = ORM::factory( "numerozona" )->find_all();
        //numero elegido por el usuario
        $idnumerozona = null;
        if(isset($_POST[ "idnumerozona" ])) {
            $idnumerozona =  $_POST[ "idnumerozona" ];
        } else if($idnumerozonaParam != null) {
            $idnumerozona =  $idnumerozonaParam;
        } else if(sizeof($numerozonas) > 0) {
            $idnumerozona =  $numerozonas[0];
        }

        //id del expediente
        if($expediente->pk() != null && $idnumerozona != null) {
            //$listado = ORM::factory( $this->nombreTabla )->where("idexpediente", "=", $expediente->pk())->and_where("idnumerozona", "=", $idnumerozona)->find_all();
            $listado = ORM::factory( $this->nombreTabla )->where("idexpediente", "=", $expediente->pk())->find_all();
            $zonasCargadas = DB::select("idzonascargadas")->from("zonascargadas")->where("idnumerozona", "=", $idnumerozona)->execute();
            if($zonasCargadas != null && sizeof($zonasCargadas) > 0) {
                $idZonasCargadas = array();
                foreach ($zonasCargadas as $zonaCargada) {
                    array_push($idZonasCargadas, $zonaCargada);
                }
                $zonasCargadasUso = ORM::factory( $this->nombreTablaAsociada )->where("idzonascargadas", "IN", $idZonasCargadas)->find_all();
            }
        }

        $this->listar($listado);
        $this->template->body
            ->bind( "idnumerozona", $idnumerozona )
            ->bind( "numerozonas", $numerozonas )
            ->bind( "zonasCargadasUso", $zonasCargadasUso )
            ->bind( "expediente", $expediente )
            ->bind( "controllerVolver", $this->urlVolver )
            ->bind( "controllerVolverLabel", $this->urlVolverLabel )
            ->bind( "errores", $this->errores )
        ;
    }

    function action_save() {
        $parametros = $this->request->param( Parametros::$params );
        $idExpediente = Parametros::getValueFromParam( $parametros, Parametros::$params );
        if($idExpediente != null){
            $expediente = $this->obtenerExpediente($idExpediente);
            $idzonascargadasuso = Parametros::getValueFromParam( $parametros, "idzonascargadasuso" );
            if($idzonascargadasuso != null && $expediente != null){
                $zonascargadasuso = ORM::factory( $this->nombreTablaAsociada, $idzonascargadasuso );
                $objeto = ORM::factory( $this->nombreTabla );
                if(!$objeto->tieneFactibilidad($idExpediente)) {
                    $objeto->iduso = $zonascargadasuso->iduso;
                    $objeto->idnumerozona = $zonascargadasuso->zonacargada->idnumerozona;
                    $objeto->idlote = $zonascargadasuso->zonacargada->idlote;
                    $objeto->idaltura = $zonascargadasuso->zonacargada->idaltura;
                    $objeto->idancho = $zonascargadasuso->zonacargada->idancho;
                    $objeto->idretiro = $zonascargadasuso->zonacargada->idretiro;
                    $objeto->idvivienda = $zonascargadasuso->zonacargada->idvivienda;
                    $objeto->idgalpon = $zonascargadasuso->zonacargada->idgalpon;
                    $objeto->idfos = $zonascargadasuso->zonacargada->idfos;
                    $objeto->idfot = $zonascargadasuso->zonacargada->idfot;
                    $objeto->idcumplirordenanza = $zonascargadasuso->zonacargada->idcumplirordenanza;
                    $objeto->idensancheapertura = $zonascargadasuso->zonacargada->idensancheapertura;
                    $objeto->idafectacionlimite = $zonascargadasuso->zonacargada->idafectacionlimite;
                    $objeto->idactividadcompleja = $zonascargadasuso->zonacargada->idactividadcompleja;
                    $objeto->idiniciarexpediente = $zonascargadasuso->zonacargada->idiniciarexpediente;
                    $objeto->idfuerzamotriz = $zonascargadasuso->zonacargada->idfuerzamotriz;
                    $objeto->idestacionamiento = $zonascargadasuso->zonacargada->idestacionamiento;
                    $objeto->idespacioocupar = $zonascargadasuso->zonacargada->idespacioocupar;

                    //expediente
                    $objeto->idexpediente = $idExpediente;

                    try {
                        if( sizeof( $objeto->getErrores() ) == 0 ) {
                            $objeto->save();
                        }
                    } catch (Exception $e) {
                        $objeto->addError( $e->getMessage() );
                    }
                }
                $this->redirigirAlListado("/index/id=" . $idExpediente . "&idnumerozona=" . $zonascargadasuso->zonacargada->idnumerozona);
            } else {
                $this->redirigirAlListado("/index/id=" . $idExpediente);
            }
        } else {
            $this->redirigirAlListado(null);
        }
    }

    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
        $parametros = $this->request->param( Parametros::$params );
        $id = Parametros::getValueFromParam( $parametros, Parametros::$params );
        $objeto = ORM::factory( $this->nombreTabla, $id );
        if($objeto->pk() != null) {
            parent::action_delete(null, false, null);
            $this->redirigirAlListado("/index/id=" . $objeto->idexpediente . "&idnumerozona=" . $objeto->idnumerozona);
        } else {
            $this->redirigirAlListado(null);
        }
    }

    function action_edit() {
        $this->redirigirAlListado(null);
    }
    function action_new() {
        $this->redirigirAlListado(null);
    }

    protected function obtenerExpediente($idExpediente) {
        return ORM::factory("expedientes")->getExpediente($idExpediente);
    }
}
?>