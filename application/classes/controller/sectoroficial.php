<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
  * 
  */
class Controller_Sectoroficial extends App_Controller_Template {
	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Sector Oficial";
		$this->encabezado		= "Sector Oficial";
		$this->nombreColumnas	= Array( "Gremio Observación", "Nombre", $this->labelABM->editarLabel, $this->labelABM->eliminarLabel );
		$this->nombreTabla		= "sectoroficial";
        $this->nombreTablaAsociada = "gremioobservacion";
		$this->formulario		= "forms/sectorOficialForm";
		$this->listado			= "lists/sectorOficialList";
	}

	function action_index() {
        $gremios = ORM::factory($this->nombreTablaAsociada)->find_all();
        //si el gremio viene por la url...
        $parametros = $this->request->param( Parametros::$params );
        $idGremio = Parametros::getValueFromParam( $parametros, Parametros::$params );
        if($idGremio == null) {
            $idGremio = isset($_POST[ "idgremioobs"]) ? $_POST[ "idgremioobs"] : $gremios[0];
        }
		$this->listar(ORM::factory($this->nombreTabla)->where("idgremioobs", "=", $idGremio)->find_all());
        $this->template->body
            ->bind( "idGremio", $idGremio )
            ->bind( "gremios", $gremios );
	}

	function action_save() {
		if( $_POST[ "id" ] == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
		} else {
			$objeto = ORM::factory( $this->nombreTabla, $_POST[ "id" ] );
		}
		$objeto->nombre = $_POST[ "nombre" ];
        $objeto->idgremioobs = $_POST[ "idgremioobs" ];

		try {
            if( sizeof( $objeto->getErrores() ) == 0 ) {
                $objeto->save();
            }
		} catch (Exception $e) {
			$objeto->addError( $e->getMessage() );
		}

		if( sizeof( $objeto->getErrores() ) == 0 ) {
			//$this->listar();
            $this->redirigirAlListado("/index/id=" . $objeto->idgremioobs);
		} else {
			$this->irAlFormulario( $objeto );
		}
	}

    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
        $parametros = $this->request->param( Parametros::$params );
        $id = Parametros::getValueFromParam( $parametros, Parametros::$params );
        $objeto = ORM::factory( $this->nombreTabla, $id );
        $idGremio = $objeto->idgremioobs;
        if($idGremio != null) {
            parent::action_delete(null, false, null);
        }
        $this->redirigirAlListado($idGremio != null ? ("/index/id=" . $idGremio) : null);
    }

	function action_edit() {
		$parametros = $this->request->param( Parametros::$params );
		$id = Parametros::getValueFromParam( $parametros, Parametros::$params );

		$this->irAlFormulario( ORM::factory( $this->nombreTabla, $id ) );
	}
	function action_new() {
        $parametros = $this->request->param( Parametros::$params );
        $id = Parametros::getValueFromParam( $parametros, Parametros::$params );
        $objeto = ORM::factory( $this->nombreTabla );
        $objeto->idgremioobs = $id;

		$this->irAlFormulario( $objeto );
	}

	private function irAlFormulario( $objeto ) {
		$this->iniciarVistas( $this );
		$this->template = View::factory( 'templates/template' );

		if( $objeto == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
		}

		$this->visor->setObjeto( $objeto );
        $gremios = ORM::factory($this->nombreTablaAsociada)->find_all();

        $this->template->head = View::factory( $this->head )
            ->bind( "visor", $this->visorHead );
		$this->template->body = View::factory( $this->formulario )
            ->bind("visor", $this->visor)
            ->bind("gremios", $gremios);
	}
}
?>