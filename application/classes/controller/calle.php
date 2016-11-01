<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
  * 
  */
class Controller_Calle extends App_Controller_Template {
    private $idzona = null;
	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Calles";
		$this->encabezado		= "Calles";
		$this->nombreColumnas	= Array( "Nombre", "Editar", "Eliminar" );
		$this->nombreTabla		= "calle";
        $this->nombreTablaAsociada = "zona";
		$this->formulario		= "forms/calleForm";
		$this->listado			= "lists/calleList";
	}

	function action_index() {
        if( $this->idzona == null ) {
            $parametros = $this->request->param( Parametros::$params );
            $this->idzona = Parametros::getValueFromParam( $parametros, Parametros::$params );
        }
        $zona = ORM::factory($this->nombreTablaAsociada, $this->idzona);
        $iddistrito = $zona->iddistrito;
        $this->encabezado = "Calles de la Zona '".$zona->nombre."'";
        $calles = $zona->getCalles();
        $this->listar($calles);
        $this->template->body
            ->bind( "iddistrito", $iddistrito )
            ->bind( "idzona", $this->idzona );
	}

	function action_save() {
		if( $_POST[ "id" ] == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
		} else {
			$objeto = ORM::factory( $this->nombreTabla, $_POST[ "id" ] );
		}
        $objeto->idzona = $_POST[ "idzona" ];
		$objeto->nombre = $_POST[ "nombre" ];

		try {
			$objeto->save();
		} catch (Exception $e) {
			$objeto->addError( $e->getMessage() );
		}

		if( sizeof( $objeto->getErrores() ) == 0 ) {
            $this->idzona = $objeto->idzona;
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
        $this->idzona = Parametros::getValueFromParam( $parametros, Parametros::$params );
		$this->irAlFormulario( null );
	}

    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
        //PARTE GENERICA
        $parametros = $this->request->param( Parametros::$params );
        $id = Parametros::getValueFromParam( $parametros, Parametros::$params );
        $objeto = ORM::factory( $this->nombreTabla, $id );
        if(!is_null($objeto)) {
            $this->idzona = $objeto->idzona;
            $objeto->delete();
        }
        $this->action_index();
    }

	private function irAlFormulario( $objeto ) {
		$this->template = View::factory( 'templates/template' );

		if( $objeto == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
            $objeto->idzona = $this->idzona;
		}
        $zona = ORM::factory($this->nombreTablaAsociada, $objeto->idzona);
        $this->encabezado = "Calle de la Zona '".$zona->nombre."'";

		$this->iniciarVistas( $this );
		$this->visor->setObjeto( $objeto );

		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = View::factory( $this->formulario )->bind( "visor", $this->visor );
	}
}
?>