<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
  * 
  */
class Controller_Derecho extends App_Controller_Template {
    private $destinos;
	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Derecho";
		$this->encabezado		= "Derecho";
		$this->nombreColumnas	= Array( "Artículo", "Inciso", "Item", "Apartado", "Destino", "CC", "Límite Inferior", "Límite Inferior", "Editar", "Eliminar" );
		$this->nombreTabla		= "Derecho";
		$this->formulario		= "forms/derechoForm";
		$this->listado			= "lists/derechoList";
	}

	function action_index() {
		$this->listar();
	}
	function action_save() {
		if( $_POST[ "id" ] == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
		} else {
			$objeto = ORM::factory( $this->nombreTabla, $_POST[ "id" ] );
		}
		$objeto->Art = $_POST[ "Art" ];
        $objeto->Inc = $_POST[ "Inc" ];
        $objeto->It = $_POST[ "It" ];
        $objeto->Ap = $_POST[ "Ap" ];
        $objeto->Destino = isset($_POST[ "Destino" ]) ? $_POST[ "Destino" ] : "";
        $objeto->CC = strcmp(trim($_POST[ "CC" ]),"") == 0 ? null : $_POST[ "CC" ];
        $objeto->puntajeinferior = strcmp(trim($_POST[ "puntajeinferior" ]),"") == 0 ? null : $_POST[ "puntajeinferior" ];
        $objeto->puntajesuperior = strcmp(trim($_POST[ "puntajesuperior" ]),"") == 0 ? null : $_POST[ "puntajesuperior" ];

        if(strcmp($objeto->Destino, "") == 0) {
            $objeto->addError( "El Destino es obligatorio" );
        }
		try {
            if( sizeof( $objeto->getErrores() ) == 0 ) {
                $objeto->save();
            }
		} catch (Exception $e) {
			$objeto->addError( $e->getMessage() );
		}

		if( sizeof( $objeto->getErrores() ) == 0 ) {
			$this->listar();
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
		$this->irAlFormulario( null );
	}

	private function irAlFormulario( $objeto ) {
		$this->iniciarVistas( $this );
		$this->template = View::factory( 'templates/template' );

		if( $objeto == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
		}

		$this->visor->setObjeto( $objeto );
        $this->destinos = array();
        $this->agregarDestinos("destino", "nombredestino");
        $this->agregarDestinos("permisorotura", "descripcion");
        $this->agregarDestinos("obrasadicional", "descripcion");
        $this->agregarDestinos("agua", "descripcion");
        $this->agregarDestinos("cloacas", "descripcion");
        sort($this->destinos, SORT_NATURAL | SORT_FLAG_CASE);

		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = View::factory( $this->formulario )
            ->bind("visor", $this->visor)
            ->bind("destinos", $this->destinos);
	}

    private function agregarDestinos($nombreTabla, $nombreColumna) {
        $nuevosDestinos = DB::select($nombreColumna)
            ->from($nombreTabla)
            ->execute();

        foreach($nuevosDestinos as $nuevoDestino) {
            $this->destinos[sizeof($this->destinos)] = $nuevoDestino[$nombreColumna];
        }
    }
}
?>