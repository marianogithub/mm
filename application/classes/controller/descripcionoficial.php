<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
  * 
  */
class Controller_Descripcionoficial extends App_Controller_Template {
    private $errores;
    private $noElegido = "-1";
    private $tablaGremio;
    private $tablaSector;
    private $tablaObservacion;
	function __construct($request, $response) {
		parent::__construct($request, $response);

        $this->titulo			= "Descripción Oficial";
        $this->encabezado		= "Descripción Oficial";
        $this->nombreColumnas	= Array( "Gremio Observación", "Sector", "Observación", "Nombre", $this->labelABM->editarLabel, $this->labelABM->eliminarLabel );
        $this->nombreTabla		= "Descripcionoficial";
        $this->tablaGremio	= "gremioobservacion";
        $this->tablaSector	= "sectoroficial";
        $this->tablaObservacion = "Observacionoficial";
        $this->formulario		= "";//"forms/observacionOficialForm";
        $this->listado			= "lists/descripcionOficialList";

	}

	function action_index() {
        $listado = array();
        //gremio
        $gremios = ORM::factory($this->tablaGremio)->find_all();
        //si el gremio viene por la url...
        $parametros = $this->request->param( Parametros::$params );
        $idGremio = Parametros::getValueFromParam( $parametros, Parametros::$params );
        if($idGremio == null) {
            $idGremio = isset($_POST[ "idgremioobs"]) ? $_POST[ "idgremioobs"] : $gremios[0];
        }
        //sector
        $sectoroficial = ORM::factory($this->tablaSector)->where("idgremioobs", "=", $idGremio)->find_all();
        //si el sector viene por el GET...
        $idSector = Parametros::getValueFromParam( $parametros, "idSector" );
        //si el sector viene por el POST...
        if($idSector == null && isset($_POST[ "idsectoroficial"])) {
            $idSector = $_POST[ "idsectoroficial"];
        }
        //verificamos que sea un idSector valido...
        if($idSector == null || strcmp($this->noElegido,$idSector) == 0) {
            $idSector =  sizeof($sectoroficial) > 0 ? $sectoroficial[0] : null;
        }
        //observacion
        $observaciones = ORM::factory($this->tablaObservacion)->where("idsectoroficial", "=", $idSector)->find_all();
        //si la observacion viene por el GET...
        $idObservacion = Parametros::getValueFromParam( $parametros, "idObservacion" );
        //si la observacion viene por el POST...
        if($idObservacion == null && isset($_POST[ "idobservacionoficial"])) {
            $idObservacion = $_POST[ "idobservacionoficial"];
        }
        //verificamos que sea un idObservacion valido...
        if($idObservacion == null || strcmp($this->noElegido,$idObservacion) == 0) {
            $idObservacion =  sizeof($observaciones) > 0 ? $observaciones[0] : null;
        }
        if($idObservacion != null) {
            $listado = ORM::factory($this->nombreTabla)->where("idobservacionoficial", "=", $idObservacion)->find_all();
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
            ->bind( "idObservacion", $idObservacion )
            ->bind( "gremios", $gremios )
            ->bind( "sectoroficial", $sectoroficial )
            ->bind( "observaciones", $observaciones )
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
        //observacion
        if(strcmp($this->noElegido,$_POST[ "idobservacionoficial" ]) != 0) {
            $observacion = ORM::factory( $this->tablaObservacion, $_POST[ "idobservacionoficial" ]);
            if($observacion->pk() != null) {
                $objeto->idobservacionoficial = $observacion->pk();
            } else {
                array_push($this->errores,"La Observación no existe");
            }
        } else {
            array_push($this->errores,"La Observación es obligatoria");
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
            $this->redirigirAlListado("/index/id=" . $observacion->sector->idgremioobs .
                "&idSector=" . $observacion->idsectoroficial .
                "&idObservacion=" . $observacion->pk()
            );
		} else {
            $this->action_index();
		}
	}

    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
        $parametros = $this->request->param( Parametros::$params );
        $id = Parametros::getValueFromParam( $parametros, Parametros::$params );
        $objeto = ORM::factory( $this->nombreTabla, $id );
        $idGremio = $objeto->observacion->sector->idgremioobs;
        $idSector = $objeto->observacion->idsectoroficial;
        $idObservacion = $objeto->idobservacionoficial;
        if($idGremio != null && $idSector != null && $idObservacion != null) {
            parent::action_delete(null, false, null);
        }
        $this->redirigirAlListado(
            $idGremio != null && $idSector != null && $idObservacion != null ?
            ( "/index/id=" . $idGremio .
                "&idSector=" . $idSector .
                "&idObservacion=" . $idObservacion
            )
            : null
        );
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