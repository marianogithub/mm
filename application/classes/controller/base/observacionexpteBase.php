<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';
require_once 'application/classes/util/dateUtil.php';

/**
  * 
  */
class ObservacionexpteBase extends App_Controller_Template {
	private $idExpediente = null;
	protected $urlVolver = null;
    protected $isAdmin = false;

	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Observaciones de Expediente";
		$this->encabezado		= "Observaciones";
		$this->nombreColumnas	= Array(
				"Fecha Observación",
				"Observación",
				"Fecha Aprobación",
				"Profesional",
				"Estado"
        );
		$this->ayudaColumnas	= Array(
				"Fecha en la que se realizó la observación",
				null,
				"Fecha en la que se aprobó la observación",
				"Profesional encargado de realizar la observación",
				null,
				null,
                //null,
        );
		$this->nombreTabla		= "observacionexpte";
		$this->formulario		= "forms/observacionexpteForm";
		$this->listado			= "lists/observacionexpteList";
	}

	function action_index() {
		if( $this->idExpediente == null ) {
			$parametros = $this->request->param( Parametros::$params );
			$this->idExpediente = Parametros::getValueFromParam( $parametros, Parametros::$params );
		}
		$expediente = $this->obtenerExpediente($this->idExpediente);
		$this->listar(ORM::factory($this->nombreTabla)->getObservaciones($this->idExpediente));

		$this->template->body
			->bind( "expediente", $expediente )
			->bind( "idexpte", $this->idExpediente )
			->bind("ayudaColumnas", $this->ayudaColumnas)
			->bind( "controllerVolver", $this->urlVolver )
            ->bind( "isAdmin", $this->isAdmin );
	}

	protected function obtenerExpediente($idExpediente) {
		return null;
	}

	function action_save() {
        $this->idExpediente = $_POST[ "expediente" ];
        if($this->isAdmin) {
            if( $_POST[ "id" ] == null ) {
                $objeto = ORM::factory( $this->nombreTabla );
            } else {
                $objeto = ORM::factory( $this->nombreTabla, $_POST[ "id" ] );
            }
            $objeto->expte = $_POST[ "expediente" ];
            $expediente = $this->obtenerExpediente($objeto->expediente);
            if(is_null($expediente)) {
                $objeto->addError( "El expediente no es valido" );
            }
            $idgremioobs = isset($_POST[ "idgremioobs"]) && $_POST[ "idgremioobs"] != 0 ? $_POST[ "idgremioobs"] : null;
            $conectorGremio = $_POST[ "conectorGremio" ];
            $gremio = null;
            $idsectoroficial = isset($_POST[ "idsectoroficial"]) && $_POST[ "idsectoroficial"] != 0 ? $_POST[ "idsectoroficial"] : null;
            $conectorSector = $_POST[ "conectorSector" ];
            $sector = null;
            $idobservacionoficial = isset($_POST[ "idobservacionoficial"]) && $_POST[ "idobservacionoficial"] != 0 ? $_POST[ "idobservacionoficial"] : null;
            $conectorObservacion = $_POST[ "conectorObservacion" ];
            $observacion = null;
            $iddescripcion = isset($_POST[ "iddescripcion"]) && $_POST[ "iddescripcion"] != 0 ? $_POST[ "iddescripcion"] : null;
            $conectorDescripcion = $_POST[ "conectorDescripcion" ];
            $descripcion = null;
            $iddetalle = isset($_POST[ "iddetalle"]) && $_POST[ "iddetalle"] != 0 ? $_POST[ "iddetalle"] : null;
            $detalle = null;

            if($idgremioobs == null) {
                $objeto->addError( "El 'Gremio Observación' es obligatorio" );
            } else {
                $gremio = ORM::factory("Gremioobservacion", $idgremioobs);
                if($gremio == null){
                    $objeto->addError( "El Gremio elegido no existe: '$idgremioobs'" );
                }
            }
            if($idsectoroficial == null) {
                $objeto->addError( "El 'Sector Oficial' es obligatorio" );
            } else {
                $sector = ORM::factory("Sectoroficial", $idsectoroficial);
                if($sector == null){
                    $objeto->addError( "El Sector elegido no existe: '$idsectoroficial'" );
                }
            }
            if($idobservacionoficial == null) {
                $objeto->addError( "La 'Observación Oficial' es obligatoria" );
            } else {
                $observacion = ORM::factory("Observacionoficial", $idobservacionoficial);
                if($observacion == null){
                    $objeto->addError( "La Observación elegida no existe: '$idobservacionoficial'" );
                }
            }
            if($iddescripcion == null) {
                $objeto->addError( "La 'Descripcion Oficial' es obligatoria" );
            } else {
                $descripcion = ORM::factory("Descripcionoficial", $iddescripcion);
                if($descripcion == null){
                    $objeto->addError( "La descripción elegida no existe: '$iddescripcion'" );
                }
            }
            if($iddetalle == null) {
                $objeto->addError( "El 'Detalle' es obligatorio" );
            } else {
                $detalle = ORM::factory("Detalle", $iddetalle);
                if($detalle == null){
                    $objeto->addError( "El Detalle elegido no existe: '$iddetalle'" );
                }
            }

            try {
                if( sizeof( $objeto->getErrores() ) == 0 ) {
                    $objeto->gremio = $gremio->nombre;
                    //creamos la observacion.-
                    $objeto->observacion = $gremio->nombre . $conectorGremio;
                    $objeto->observacion .= $sector->nombre . " " . $conectorSector . " ";
                    $objeto->observacion .= $observacion->nombre . " " . $conectorObservacion . " ";
                    $objeto->observacion .= $descripcion->nombre . " " . $conectorDescripcion . " ";
                    $objeto->observacion .= $detalle->nombre;
                    //profesional.-
                    $objeto->profesional = $_POST[ "profesional" ];
                    //estado.-
                    $objeto->estado = $_POST[ "estado" ];
                    //fecha de observacion: hoy
                    $dateUtil = new DateUtil();
                    $objeto->fechaobs = date( DateUtil::$formatoFechaBD );
                    //fecha de aprobacion.-
                    $objeto->fechaaprobacion = strcmp("", trim($_POST["fechaaprobacion"])) == 0 ? null : $dateUtil->stringVistaToStringBD($_POST["fechaaprobacion"]);
                    $objeto->save();
                }
            } catch (Exception $e) {
                $objeto->addError( $e->getMessage() );
            }

            if( sizeof( $objeto->getErrores() ) == 0 ) {
                $this->action_index();
            } else {
                $this->irAlFormulario( $objeto );
            }
        } else {
            $this->action_index();
        }
	}
    function action_edit() {
        //$parametros = $this->request->param( Parametros::$params );
        //$id = Parametros::getValueFromParam( $parametros, Parametros::$params );
        //$this->irAlFormulario( ORM::factory( $this->nombreTabla, $id ) );
        $this->action_index();
    }

    function action_new() {
        if($this->isAdmin) {
            $parametros = $this->request->param( Parametros::$params );
            $this->idExpediente = Parametros::getValueFromParam( $parametros, Parametros::$params );
            $this->irAlFormulario( null );
        } else {
            $this->action_index();
        }
    }

    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
        if($this->isAdmin) {
            //PARTE GENERICA
            $parametros = $this->request->param( Parametros::$params );
            $id = Parametros::getValueFromParam( $parametros, Parametros::$params );
            $objeto = ORM::factory( $this->nombreTabla, $id );
            if(!is_null($objeto)) {
                $this->idExpediente = $objeto->expediente;
                $expediente = $this->obtenerExpediente($objeto->expediente);
                if(!is_null($expediente)) {
                    $objeto->delete();
                }
            }
        }
        $this->action_index();
    }

    private function irAlFormulario( $objeto ) {
        $this->iniciarVistas( $this );
        $this->template = View::factory( 'templates/template' );

        $idgremioobs = isset($_POST[ "idgremioobs"]) && $_POST[ "idgremioobs"] != 0 ? $_POST[ "idgremioobs"] : null;
        $idsectoroficial = isset($_POST[ "idsectoroficial"]) && $_POST[ "idsectoroficial"] != 0 ? $_POST[ "idsectoroficial"] : null;
        $idobservacionoficial = isset($_POST[ "idobservacionoficial"]) && $_POST[ "idobservacionoficial"] != 0 ? $_POST[ "idobservacionoficial"] : null;
        $iddescripcion = isset($_POST[ "iddescripcion"]) && $_POST[ "iddescripcion"] != 0 ? $_POST[ "iddescripcion"] : null;
        $iddetalle = isset($_POST[ "iddetalle"]) && $_POST[ "iddetalle"] != 0 ? $_POST[ "iddetalle"] : null;

        $gremioObservaciones = ORM::factory( "Gremioobservacion" )->find_all();
        $sectoroficial = array();
        $observacionoficial = array();
        $descripcionoficial = array();
        $detalle = array();

        if($idgremioobs != null) {
            $sectoroficial = $this->consultar("idsector", "nombre", "sectoroficial", "idgremioobs", $idgremioobs);
            if($idsectoroficial != null) {
                $observacionoficial = $this->consultar("idobservacion", "nombre", "observacionoficial", "idsectoroficial", $idsectoroficial);
                if($idobservacionoficial != null) {
                    $descripcionoficial = $this->consultar("iddescripcion", "nombre", "descripcionoficial", "idobservacionoficial", $idobservacionoficial);
                    if($iddescripcion != null) {
                        $detalle = $this->consultar("iddetalle", "nombre", "detalle", "iddescripcion", $iddescripcion);
                    }
                }
            }
        }

        if( $objeto == null ) {
            $objeto = ORM::factory( $this->nombreTabla );
            $objeto->expte = $this->idExpediente;
            $objeto->profesional = isset($_POST[ "profesional" ]) ? $_POST[ "profesional" ] : "";
            $objeto->estado = isset($_POST[ "estado" ]) ? $_POST[ "estado" ] : "";
            if(isset($_POST[ "fechaaprobacion" ]) && strcmp("", trim($_POST["fechaaprobacion"])) != 0) {
                $dateUtil = new DateUtil();
                $objeto->fechaaprobacion = $dateUtil->stringVistaToStringBD($_POST["fechaaprobacion"]);
            } else {
                $objeto->fechaaprobacion = null;
            }
        }


        $this->visor->setObjeto( $objeto );

        $body = View::factory( $this->formulario )
            ->bind( "visor", $this->visor )
            ->bind( "isAdmin", $this->isAdmin )
            ->bind( "idgremioobs", $idgremioobs )
            ->bind( "idsectoroficial", $idsectoroficial )
            ->bind( "idobservacionoficial", $idobservacionoficial )
            ->bind( "iddescripcion", $iddescripcion )
            ->bind( "iddetalle", $iddetalle )
            ->bind( "gremioObservaciones", $gremioObservaciones )
            ->bind( "sectoroficial", $sectoroficial )
            ->bind( "observacionoficial", $observacionoficial )
            ->bind( "descripcionoficial", $descripcionoficial )
            ->bind( "detalle", $detalle );
        $this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
        $this->template->body = $body;
    }

    private function consultar($idColumna, $nombreColumna, $tabla, $fk, $idFk) {
        $resultado = array();

        if($idFk != null) {
            $resultado =  DB::select($idColumna,$nombreColumna)
                ->from($tabla)
                ->where($fk, '=', $idFk)
                ->execute();
        }

        return $resultado;
    }
}
?>