<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
  * 
  */
class Controller_Zona extends App_Controller_Template {
    private $iddistrito = null;
	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Zonas";
		$this->encabezado		= "Zonas";
		$this->nombreColumnas	= Array( "Nombre", "Calles", "Editar", "Eliminar" );
		$this->nombreTabla		= "zona";
        $this->nombreTablaAsociada		= "distritos";
		$this->formulario		= "forms/zonaForm";
		$this->listado			= "lists/zonaList";
	}

	function action_index() {
        if( $this->iddistrito == null ) {
            $parametros = $this->request->param( Parametros::$params );
            $this->iddistrito = Parametros::getValueFromParam( $parametros, Parametros::$params );
        }
        $distrito = ORM::factory($this->nombreTablaAsociada, $this->iddistrito);
        $this->encabezado = "Zonas del Distrito '".$distrito->nombredistrito."'";
        $zonas = $distrito->getZonas();
		$this->listar($zonas);
        $this->template->body
            ->bind( "iddistrito", $this->iddistrito );
	}

	function action_save() {
		if( $_POST[ "id" ] == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
		} else {
			$objeto = ORM::factory( $this->nombreTabla, $_POST[ "id" ] );
		}
        $objeto->iddistrito = $_POST[ "iddistrito" ];
		$objeto->nombre = $_POST[ "nombre" ];

		try {
			$objeto->save();
		} catch (Exception $e) {
			$objeto->addError( $e->getMessage() );
		}

		if( sizeof( $objeto->getErrores() ) == 0 ) {
            $this->iddistrito = $objeto->iddistrito;
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
        $this->iddistrito = Parametros::getValueFromParam( $parametros, Parametros::$params );
		$this->irAlFormulario( null );
	}

    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
        //PARTE GENERICA
        $parametros = $this->request->param( Parametros::$params );
        $id = Parametros::getValueFromParam( $parametros, Parametros::$params );
        $objeto = ORM::factory( $this->nombreTabla, $id );
        if(!is_null($objeto)) {
            $this->iddistrito = $objeto->iddistrito;
            $objeto->delete();
        }
        $this->action_index();
    }

	private function irAlFormulario( $objeto ) {
		$this->template = View::factory( 'templates/template' );

		if( $objeto == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
            $objeto->iddistrito = $this->iddistrito;
		}
        $distrito = ORM::factory($this->nombreTablaAsociada, $objeto->iddistrito);
        $this->encabezado = "Zona del Distrito '".$distrito->nombredistrito."'";

        $this->iniciarVistas( $this );
		$this->visor->setObjeto( $objeto );

		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = View::factory( $this->formulario )->bind( "visor", $this->visor );
	}
}
?>