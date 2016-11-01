<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
 *
 */
class Controller_Zonascargadasuso extends App_Controller_Template {
    private $errores;
    function __construct($request, $response) {
        parent::__construct($request, $response);

        $this->titulo			= "Usos de Zonas Cargadas";
        $this->encabezado		= "Usos para la Zona Cargada";
        $this->nombreColumnas	= Array( "Uso", $this->labelABM->eliminarLabel );
        $this->nombreTabla		= "zonascargadasuso";
        $this->nombreTablaAsociada = "uso";
        $this->formulario		= "";//"forms/zonasCargadasForm";
        $this->listado			= "lists/zonasCargadasUsoList";
        $this->errores = array();
    }

    function action_index() {
        $parametros = $this->request->param( Parametros::$params );
        $id = Parametros::getValueFromParam( $parametros, Parametros::$params );
        $zonasCargadas = ORM::factory( "zonascargadas", $id );
        $listado = array();
        $usos = ORM::factory($this->nombreTablaAsociada)->find_all();
        if($zonasCargadas->pk() != null){
            $listado = ORM::factory($this->nombreTabla)->where("idzonascargadas", "=", $id)->find_all();
        } else {
            array_push($this->errores, "La zona cargada no existe: '$id'");
        }
        $this->listar($listado);
        $this->template->body
            ->bind( "errores", $this->errores )
            ->bind( "listado", $listado )
            ->bind( "usos", $usos )
            ->bind( "zonasCargadas", $zonasCargadas )
        ;
    }

    function action_save() {
        $objeto = ORM::factory( $this->nombreTabla );
        /*if( $_POST[ "id" ] == null ) {
            $objeto = ORM::factory( $this->nombreTabla );
        } else {
            $objeto = ORM::factory( $this->nombreTabla, $_POST[ "id" ] );
        }*/
        $objeto->idzonascargadas = $_POST[ "idzonascargadas" ];
        $objeto->iduso = $_POST[ "iduso" ];

        try {
            if( sizeof( $this->errores ) == 0 ) {
                $objeto->save();
            }
        } catch (Exception $e) {
            array_push($this->errores, $e->getMessage());
        }

        if( sizeof( $this->errores ) == 0 ) {
            $this->redirigirAlListado("/index/id=" . $objeto->idzonascargadas);
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
            $this->redirigirAlListado("/index/id=" . $objeto->idzonascargadas);
        } else {
            $this->redirigirAlListado(null);
        }
    }

    function action_edit() {
        /*$parametros = $this->request->param( Parametros::$params );
        $id = Parametros::getValueFromParam( $parametros, Parametros::$params );

        $this->irAlFormulario( ORM::factory( $this->nombreTabla, $id ) );
        */
        $this->action_index();
    }
    function action_new() {
        //$this->irAlFormulario( null );
        $this->action_index();
    }
}
?>