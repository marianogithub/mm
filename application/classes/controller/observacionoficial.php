<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
  * 
  */
class Controller_Observacionoficial extends App_Controller_Template {
    private $errores;
    private $sectorNoElegido = "-1";
	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Observación Oficial";
		$this->encabezado		= "Observación Oficial";
		$this->nombreColumnas	= Array( "Gremio Observación", "Sector", "Nombre", $this->labelABM->editarLabel, $this->labelABM->eliminarLabel );
		$this->nombreTabla		= "Observacionoficial";
        $this->nombreTablaAsociada = "SectorOficial";
		$this->formulario		= "";//"forms/observacionOficialForm";
		$this->listado			= "lists/observacionOficialList";

	}

	function action_index() {
        $listado = array();
        //gremio
        $gremios = ORM::factory("gremioobservacion")->find_all();
        //si el gremio viene por la url...
        $parametros = $this->request->param( Parametros::$params );
        $idGremio = Parametros::getValueFromParam( $parametros, Parametros::$params );
        if($idGremio == null) {
            $idGremio = isset($_POST[ "idgremioobs"]) ? $_POST[ "idgremioobs"] : $gremios[0];
        }
        //sector
        $sectoroficial = ORM::factory($this->nombreTablaAsociada)->where("idgremioobs", "=", $idGremio)->find_all();
        //si el sector viene por el GET...
        $idSector = Parametros::getValueFromParam( $parametros, "idSector" );
        //si el sector viene por el POST...
        if($idSector == null && isset($_POST[ "idsectoroficial"])) {
            $idSector = $_POST[ "idsectoroficial"];
        }
        //verificamos que sea un idSector valido...
        if($idSector == null || strcmp($this->sectorNoElegido,$idSector) == 0) {
            $idSector =  sizeof($sectoroficial) > 0 ? $sectoroficial[0] : null;
        }
        if($idSector != null) {
            $listado = ORM::factory($this->nombreTabla)->where("idsectoroficial", "=", $idSector)->find_all();
        }
        $id = "";
        $nombre = isset($_POST[ "nombre"]) ? $_POST[ "nombre"] : "";
        if(isset($_POST[ "id"]) && strcmp("", $_POST[ "id"]) != 0) {
            $id = $_POST[ "id" ];
            $objeto = ORM::factory( $this->nombreTabla, $id);
            $nombre = $objeto->nombre;
        }

        $this->listar($listado);
        $this->errores = $this->errores == null ? array() : $this->errores;
        $this->template->body
            ->bind( "errores", $this->errores )
            ->bind( "idGremio", $idGremio )
            ->bind( "idSector", $idSector )
            ->bind( "gremios", $gremios )
            ->bind( "sectoroficial", $sectoroficial )
            ->bind( "nombre", $nombre )
            ->bind( "id", $id )
        ;
	}

	function action_save() {
        $this->errores = array();
		if( $_POST[ "id" ] == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
		} else {
			$objeto = ORM::factory( $this->nombreTabla, $_POST[ "id" ] );
		}
		$objeto->nombre = $_POST[ "nombre" ];
        if(strcmp($this->sectorNoElegido,$_POST[ "idsectoroficial" ]) != 0) {
            $objetoAsociado = ORM::factory( $this->nombreTablaAsociada, $_POST[ "idsectoroficial" ]);
            if($objetoAsociado->pk() != null) {
                $objeto->idsectoroficial = $objetoAsociado->pk();
            } else {
                array_push($this->errores,"El Sector no existe");
            }
        } else {
            array_push($this->errores,"El Sector es obligatorio");
        }

		try {
            if( sizeof( $this->errores ) == 0 ) {
                $objeto->save();
            }
		} catch (Exception $e) {
            array_push($this->errores,$e->getMessage());
		}

		if( sizeof($this->errores) == 0 ) {
			//$this->listar();
            $this->redirigirAlListado("/index/id=" . $objetoAsociado->idgremioobs . "&idSector=" . $objetoAsociado->pk());
		} else {
            $this->action_index();
		}
	}

    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
        $parametros = $this->request->param( Parametros::$params );
        $id = Parametros::getValueFromParam( $parametros, Parametros::$params );
        $objeto = ORM::factory( $this->nombreTabla, $id );
        $idGremio = $objeto->sector->idgremioobs;
        $idSector = $objeto->idsectoroficial;
        if($idGremio != null && $idSector != null) {
            parent::action_delete(null, false, null);
        }
        $this->redirigirAlListado($idGremio != null && $idSector != null ? ("/index/id=" . $idGremio . "&idSector=" . $idSector) : null);
    }

	function action_edit() {
        $this->action_index();
		//$parametros = $this->request->param( Parametros::$params );
        //$id = Parametros::getValueFromParam( $parametros, Parametros::$params );
        //$this->irAlFormulario( ORM::factory( $this->nombreTabla, $id ) );
	}
	function action_new() {
        $this->action_index();
        //$parametros = $this->request->param( Parametros::$params );
        //$id = Parametros::getValueFromParam( $parametros, Parametros::$params );
        //$objeto = ORM::factory( $this->nombreTabla );
        //$objeto->idsectoroficial = $id;
        //$this->irAlFormulario( $objeto );
	}

	/*private function irAlFormulario( $objeto ) {
		$this->iniciarVistas( $this );
		$this->template = View::factory( 'templates/template' );

		if( $objeto == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
		}

		$this->visor->setObjeto( $objeto );
        $asociados = ORM::factory($this->nombreTablaAsociada)->find_all();

        $this->template->head = View::factory( $this->head )
            ->bind( "visor", $this->visorHead );
		$this->template->body = View::factory( $this->formulario )
            ->bind("visor", $this->visor)
            ->bind("asociados", $asociados);
	}*/
}
?>