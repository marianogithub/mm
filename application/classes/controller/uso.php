<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
 *
 */
class Controller_Uso extends App_Controller_Template {
    function __construct($request, $response) {
        parent::__construct($request, $response);

        $this->titulo			= "Uso";
        $this->encabezado		= "Uso";
        $this->nombreColumnas	= Array( "Nombre", "Uso General", "Editar", "Eliminar" );
        $this->nombreTabla		= "uso";
        $this->nombreTablaAsociada = "usogeneral";
        $this->formulario		= "forms/usoForm";
        $this->listado			= "lists/usoList";
    }

    function action_index() {
        $this->listar();
    }
    function action_save() {
        if(isset($_POST[ "id" ])){
            if( $_POST[ "id" ] == null ) {
                $objeto = ORM::factory( $this->nombreTabla );
            } else {
                $objeto = ORM::factory( $this->nombreTabla, $_POST[ "id" ] );
            }
            $objeto->nombre = $_POST[ "nombre" ];
            $objeto->idusogeneral = $_POST[ "idusogeneral" ];

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
        }else{
            $this->listar();
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
        $usosgenerales = ORM::factory($this->nombreTablaAsociada)->find_all();

        $this->template->head = View::factory( $this->head )
            ->bind( "visor", $this->visorHead );
        $this->template->body = View::factory( $this->formulario )
            ->bind("visor", $this->visor)
            ->bind("usosgenerales", $usosgenerales);
    }
}
?>