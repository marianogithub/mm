<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';
require_once 'application/classes/util/dateUtil.php';

/**
  * 
  */
class Controller_ObrasBase extends App_Controller_Template {
	private $idExpediente = null;
	protected $urlVolver = null;
    protected $urlVolverLabel = "Volver a Expedientes";
	protected $isAdmin = false;

	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Obras Solicitadas";
		$this->encabezado		= "Obras Solicitadas";
		$this->nombreColumnas	= Array( "Nivel", "Sup Cubierta/Aleros", "Bocas Eléctricas", "Potencia (Kw)", "Recintos Sanitarios",
				"Tipo Obra", "Destino", "Trabajo Profesional", "Puntaje", "Estado", "Nº Recibo Pago", "Fecha Pago", "Aforos",
                "Editar", "Eliminar" );
		$this->nombreTabla		= "obras";
		$this->nombreTablaAsociada	= "Gremioobservacion";
		$this->formulario		= "forms/obrasForm";
		$this->listado			= "lists/obrasList";

		$this->isAdmin = false;
	}

	function action_index() {
		if( $this->idExpediente == null ) {
			$parametros = $this->request->param( Parametros::$params );
			$this->idExpediente = Parametros::getValueFromParam( $parametros, Parametros::$params );
		}
		$expediente = $this->obtenerExpediente($this->idExpediente);
		$this->listar(ORM::factory($this->nombreTabla)->getObrasSolicitadas($this->idExpediente));

		$this->template->body
			->bind( "expediente", $expediente )
			->bind( "idexpte", $this->idExpediente )
			->bind( "controllerVolver", $this->urlVolver )
            ->bind( "controllerVolverLabel", $this->urlVolverLabel );
	}

    protected function obtenerExpediente($idExpediente) {
        return ORM::factory("expedientes")->getExpediente($idExpediente);
    }

	function action_save() {
		$dateUtil = new DateUtil();
		if( $_POST[ "id" ] == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
		} else {
			$objeto = ORM::factory( $this->nombreTabla, $_POST[ "id" ] );
		}
        if($this->isAdmin) {
            $fechaPago = isset($_POST[ "fechapago" ]) ? $_POST[ "fechapago" ] : "";
            $objeto->fechapago = strcmp("", trim($fechaPago)) == 0 ? null : $dateUtil->stringVistaToStringBD($fechaPago);
            $objeto->estadoobra = isset($_POST[ "estadoobra" ]) ? $_POST[ "estadoobra" ] : "";
            $objeto->nrorecibo = isset($_POST[ "nrorecibo" ]) ? $_POST[ "nrorecibo" ] : "";
        }

		if(isset($_POST[ "expediente"])) {
			$objeto->expediente = $_POST[ "expediente" ];
			$expediente = $this->obtenerExpediente($objeto->expediente);
			if(is_null($expediente)) {
				$objeto->addError( "El expediente no es valido" );
			}
		} else {
			$objeto->addError( "El expediente es oblitatorio" );
		}

		//tipo de obra
		if(isset($_POST[ "tipoobra" ])) {
			$objeto->tipoobra = $_POST[ "tipoobra" ];
		} else {
			$objeto->addError( "El tipo de obra es obligatorio" );
		}
		//destino
		if(isset($_POST[ "iddestino" ])) {
			$objeto->iddestino = $_POST[ "iddestino" ];
		} else {
			$objeto->addError( "El destino es obligatorio" );
		}
		//trabajo
		if(isset($_POST[ "idtrabajo" ])) {
			$objeto->idtrabajo = $_POST[ "idtrabajo" ];
		} else {
			$objeto->addError( "El trabajo es obligatorio" );
		}
		//nivel
		if(isset($_POST[ "nivel" ])) {
			$objeto->nivel = $_POST[ "nivel" ];
		} else {
			$objeto->addError( "El Nivel es obligatorio" );
		}

		$objeto->sup = $_POST[ "sup" ];
		$objeto->supaleros = $_POST[ "supaleros" ];
		$objeto->bocas = $_POST[ "bocas" ];
		$objeto->potencia = $_POST[ "potencia" ];
		$objeto->recintos = $_POST[ "recintos" ];
		$objeto->puntaje = $_POST[ "puntaje" ];

		try {
			if( sizeof( $objeto->getErrores() ) == 0 ) {
				$objeto->save();
			}
		} catch (Exception $e) {
			$objeto->addError( $e->getMessage() );
		}

		if( sizeof( $objeto->getErrores() ) == 0 ) {
			$this->idExpediente = $objeto->expediente;
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
			$this->idExpediente = $objeto->expediente;
			$expediente = $this->obtenerExpediente($objeto->expediente);
			if(!is_null($expediente)) {
				$objeto->delete();
			}
		}
		$this->action_index();
	}

	private function irAlFormulario( $objeto ) {
		$this->iniciarVistas( $this );
		$this->template = View::factory( 'templates/template' );

		$niveles = ORM::factory( "nivel" )->find_all();
		$tiposobra = ORM::factory( "tipodeobra" )->find_all();
		$destinos = ORM::factory( "destino" )->find_all();
		$trabajos = ORM::factory( "trabajo" )->order_by("idtrabajo")->find_all();
		if( $objeto == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
			$objeto->expediente = $this->idExpediente;
		}


		$this->visor->setObjeto( $objeto );

		$body = View::factory( $this->formulario )
            ->bind( "visor", $this->visor )
			->bind( "niveles", $niveles )
			->bind( "tiposobra", $tiposobra )
			->bind( "destinos", $destinos )
			->bind( "trabajos", $trabajos )
			->bind( "isAdmin", $this->isAdmin );
		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = $body;
	}
}
?>