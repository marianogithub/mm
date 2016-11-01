<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';
require_once 'application/classes/util/dateUtil.php';

/**
  * 
  */
class Controller_InspeccionesBase extends App_Controller_Template {
	protected $idExpediente = null;
	protected $urlVolver = null;
	protected $isAdmin = false;

	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Inspecciones Solicitadas";
		$this->encabezado		= "Inspecciones Solicitadas";
		$this->nombreColumnas	= Array(  "Fecha Solicitada", "Fecha Efectiva Insp.", "Gremio", "Tipo Inspección", "Nivel",
				"Cartel de Obra", "Sector", "Comentarios", "Total/Parcial", "Estado", "Inspector",
				"Editar", "Eliminar" );
		$this->nombreTabla		= "inspecciones";
		$this->nombreTablaAsociada	= "Gremioobservacion";
		$this->formulario		= "forms/inspeccionesForm";
		$this->listado			= "lists/inspeccionesList";

		$this->isAdmin = false;
	}

	function action_index() {
		if( $this->idExpediente == null ) {
			$parametros = $this->request->param( Parametros::$params );
			$this->idExpediente = Parametros::getValueFromParam( $parametros, Parametros::$params );
		}
		$expediente = $this->obtenerExpediente($this->idExpediente);
		$this->listar(ORM::factory($this->nombreTabla)->getInspeccionesSolicitadas($this->idExpediente));

		$this->template->body
			->bind( "expediente", $expediente )
			->bind( "idexpte", $this->idExpediente )
			->bind( "controllerVolver", $this->urlVolver );
	}

	protected function obtenerExpediente($idExpediente) {
		return null;
	}

	function action_save()
	{
		$dateUtil = new DateUtil();
		if( $_POST[ "id" ] == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
			$objeto->fechasolicitud = date( DateUtil::$formatoFechaBD );
			$objeto->estado = null;
			$objeto->inspector = null;
			//$objeto->comentsinspector = null;
		} else {
			$objeto = ORM::factory( $this->nombreTabla, $_POST[ "id" ] );
		}
        if($this->isAdmin) {
            $objeto->estado = isset($_POST[ "estado" ]) ? $_POST[ "estado" ] : "";
            $objeto->inspector = isset($_POST[ "inspector" ]) ? $_POST[ "inspector" ] : "";
            $objeto->comentsinspector = isset($_POST[ "comentsinspector" ]) ? $_POST[ "comentsinspector" ] : ""; 
        }

		if(isset($_POST[ "idexpte"])) {
			$objeto->idexpte = $_POST[ "idexpte" ];
			$expediente = $this->obtenerExpediente($objeto->idexpte);
			if($expediente == null) {
				$objeto->addError( "El expediente no es valido" );
			}
		} else {
			$objeto->addError( "El expediente es obligatorio" );
		}
		$objeto->fechainspeccion = strcmp("", trim($_POST["fechainspeccion"])) == 0 ? null : $dateUtil->stringVistaToStringBD($_POST["fechainspeccion"]);
		$objeto->idgremioobs = $_POST[ "idgremioobs" ];			//gremioobservacion
		if(strcmp("0", $objeto->idgremioobs) == 0) {
			$objeto->addError( "El Gremio es obligatorio" );
		}
		if(isset($_POST[ "idlistado" ])) {
			$objeto->idlistado = $_POST[ "idlistado" ];			//inspecciones de obra
		} else {
			$objeto->addError( "El tipo de inspecciÃ³n es obligatorio" );
		}
		$objeto->idnivel = $_POST[ "idnivel" ];					//nivel
		$objeto->cartel = $_POST[ "cartel" ];					//cartel
		$objeto->sector = $_POST[ "sector" ];					//sector
		$objeto->comentarios = $_POST[ "comentarios" ];			//comentarios
		$objeto->total = $_POST[ "total" ];						//total
		//comentarios de la inspección
		$objeto->comentsinspector = $_POST[ "test" ];	// luego de la inspección.

		try {
			if( sizeof( $objeto->getErrores() ) == 0 ) {
				$objeto->save();
			}
		} catch (Exception $e) {
			$objeto->addError( $e->getMessage() );
		}

		if( sizeof( $objeto->getErrores() ) == 0 ) {
			$this->idExpediente = $objeto->idexpte;
			$this->action_index();
		} else {
			$this->irAlFormulario( $objeto );
		}
	}

	function action_edit() {
		$parametros = $this->request->param( Parametros::$params );
		$id = Parametros::getValueFromParam( $parametros, Parametros::$params );

		$this->irAlFormulario( ORM::factory( $this->nombreTabla, $id ) );
	}

	function action_new() {
		$parametros = $this->request->param( Parametros::$params );
		$this->idExpediente = Parametros::getValueFromParam( $parametros, Parametros::$params );
		$this->irAlFormulario( null );
	}

    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
		//PARTE GENERICA
		$parametros = $this->request->param( Parametros::$params );
		$id = Parametros::getValueFromParam( $parametros, Parametros::$params );
		$objeto = ORM::factory( $this->nombreTabla, $id );
		if(!is_null($objeto)) {
			$this->idExpediente = $objeto->idexpte;
			$expediente = $this->obtenerExpediente($objeto->idexpte);
			if(!is_null($expediente)) {
				$objeto->delete();
			}
		}
		$this->action_index();
	}

	private function irAlFormulario( $objeto ) {
        $fechaSolicitud = $objeto == null ? date(DateUtil::$formatoFechaVista) : $objeto->getFechasolicitudStr();
        $this->encabezado = "Inspección Solicitada el $fechaSolicitud";
        $this->iniciarVistas( $this );
        $this->template = View::factory( 'templates/template' );
        $parametro = ORM::factory( "parametro" );
        $minDateFechaInspeccion = $parametro->getMinDateFechaInspeccion();

        $idgremioobs = null;
        $gremioObservaciones = ORM::factory( $this->nombreTablaAsociada )->getGremiosExternos();
        $niveles = ORM::factory( "nivel" )->find_all();
		if( $objeto == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
			$idgremioobs = $gremioObservaciones[0]->pk();
			$objeto->idexpte = $this->idExpediente;
            $objeto->fechainspeccion = date(DateUtil::$formatoFechaBD);
		} else {
			$idgremioobs = $objeto->inspeccionobra->idgremioobs;
		}
		$inspeccionesObra = ORM::factory( "Inspeccionesobra" )->getInspeccionesFiltradas($idgremioobs);


		$this->visor->setObjeto( $objeto );
        $totales = array("Total", "Parcial");
        $estados = array("","Aceptada","Rechazada");

        // $fechaEfectivaInspeccion = $objeto == null ? date(DateUtil::$formatoFechaVista) : $objeto->getFechaEfectivainspeccionStr();

		$body = View::factory( $this->formulario )->bind( "visor", $this->visor )
		->bind( "gremioObservaciones", $gremioObservaciones )
		->bind( "niveles", $niveles )
        ->bind( "totales", $totales )
        ->bind( "estados", $estados)
		->bind( "inspeccionesObra", $inspeccionesObra )
		->bind( "minDateFechaInspeccion", $minDateFechaInspeccion )
		->bind( "comentsinspector" , $comentsinspector )
		//->bind( "fechaEfectivaInspeccion",$fechaEfectivaInspeccion)
		->bind( "isAdmin", $this->isAdmin );
		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = $body;
	}
}
?>