<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
 *
 */
class Controller_Numerozona extends App_Controller_Template {
    function __construct($request, $response) {
        parent::__construct($request, $response);

        $this->titulo			= "Números de Zona";
        $this->encabezado		= "Número de Zona";
        $this->nombreColumnas	= Array( "Número", "Zona", "Editar", "Eliminar" );
        $this->nombreTabla		= "numerozona";
        $this->nombreTablaAsociada = "zonas";
        $this->formulario		= "forms/numeroZonaForm";
        $this->listado			= "lists/numeroZonaList";
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
            $objeto->numero = $_POST[ "numero" ];
            $objeto->idzonas = $_POST[ "idzonas" ];

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
        $zonas = ORM::factory($this->nombreTablaAsociada)->find_all();
        $numeros = ORM::factory("parametro")->getNumerosZona();

        $this->template->head = View::factory( $this->head )
            ->bind( "visor", $this->visorHead );
        $this->template->body = View::factory( $this->formulario )
            ->bind("visor", $this->visor)
            ->bind("zonas", $zonas)
            ->bind("numeros", $numeros);
    }
}
?>