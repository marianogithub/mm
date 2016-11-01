<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
 *
 */
class Controller_Zonascargadas extends App_Controller_Template {
    function __construct($request, $response) {
        parent::__construct($request, $response);

        $this->titulo			= "Zonas Cargadas";
        $this->encabezado		= "Zonas Cargadas";
        $this->nombreColumnas	= Array( "Zona", "Usos", "Lote Mínimo", "Altura Máxima", "Ancho Mínimo",
                                         "Retiro", "Viviendas Permitidas", "Galpón", "FOS", "FOT","Cumplir Ordenanza","Ensanche o Apertura",
                                         "Afectacion Limites", "Actividades Complejas","Iniciar Expediente", "Fuerza Motriz", "Estacionamiento","Espacio Ocupar",
                                         $this->labelABM->editarLabel, $this->labelABM->eliminarLabel );
        $this->nombreTabla		= "zonascargadas";
        //$this->nombreTablaAsociada = "numerozona";
        $this->formulario		= "forms/zonasCargadasForm";
        $this->listado			= "lists/zonasCargadasList";
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
            $objeto->idnumerozona = $_POST[ "idnumerozona" ];
            $objeto->idlote = $_POST[ "idlote" ];
            $objeto->idaltura = $_POST[ "idaltura" ];
            $objeto->idancho = $_POST[ "idancho" ];
            $objeto->idretiro = $_POST[ "idretiro" ];
            $objeto->idvivienda = $_POST[ "idvivienda" ];
            $objeto->idgalpon = $_POST[ "idgalpon" ];
            $objeto->idfos = $_POST[ "idfos" ];
            $objeto->idfot = $_POST[ "idfot" ];
            $objeto->idcumplirordenanza = $_POST[ "idcumplirordenanza" ];
            $objeto->idensancheapertura = $_POST[ "idensancheapertura" ];
            $objeto->idafectacionlimite = $_POST[ "idafectacionlimite" ];
            $objeto->idactividadcompleja = $_POST[ "idactividadcompleja" ];
            $objeto->idiniciarexpediente = $_POST[ "idiniciarexpediente" ];
            $objeto->idfuerzamotriz = $_POST[ "idfuerzamotriz" ];
            $objeto->idestacionamiento = $_POST[ "idestacionamiento" ];
            $objeto->idespacioocupar = $_POST[ "idespacioocupar" ];



            try {
                if( sizeof( $objeto->getErrores() ) == 0 ) {
                    $objeto->save();
                }
            } catch (Exception $e) {
                $objeto->addError( $e->getMessage() );
            }

            if( sizeof( $objeto->getErrores() ) == 0 ) {
                $this->redirigirAlListado(null);
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
        $numerozonas = ORM::factory("numerozona")->find_all();
        $lotes = ORM::factory("lote")->find_all();
        $alturas = ORM::factory("altura")->find_all();
        $anchos = ORM::factory("ancho")->find_all();
        $retiros = ORM::factory("retiro")->find_all();
        $viviendas = ORM::factory("vivienda")->find_all();
        $galpones = ORM::factory("galpon")->find_all();
        $fos = ORM::factory("fos")->find_all();
        $fot = ORM::factory("fot")->find_all();
        $cumplirordenanzas = ORM::factory("cumplirordenanza")->find_all();
        $ensancheaperturas = ORM::factory("ensancheapertura")->find_all();
        $limites = ORM::factory("afectacionlimite")->find_all();
        $actividadcomplejas = ORM::factory("actividadcompleja")->find_all();
        $iniciarexpedientes = ORM::factory("iniciarexpediente")->find_all();
        $fuerzamotrices = ORM::factory("fuerzamotriz")->find_all();
        $estacionamientos = ORM::factory("estacionamiento")->find_all();
        $espacioocupados = ORM::factory("espacioocupar")->find_all();

        $this->template->head = View::factory( $this->head )
            ->bind( "visor", $this->visorHead );
        $this->template->body = View::factory( $this->formulario )
            ->bind("visor", $this->visor)
            ->bind("numerozonas", $numerozonas)
            ->bind("lotes", $lotes)
            ->bind("alturas", $alturas)
            ->bind("anchos", $anchos)
            ->bind("retiros", $retiros)
            ->bind("viviendas", $viviendas)
            ->bind("galpones", $galpones)
            ->bind("fos", $fos)
            ->bind("fot", $fot)
            ->bind("cumplirordenanzas", $cumplirordenanzas)
            ->bind("ensancheaperturas", $ensancheaperturas)
            ->bind("limites", $limites)
            ->bind("actividadcomplejas", $actividadcomplejas)
            ->bind("iniciarexpedientes", $iniciarexpedientes)
            ->bind("fuerzamotrices", $fuerzamotrices)
            ->bind("estacionamientos", $estacionamientos)
            ->bind("espacioocupados", $espacioocupados)
        ;
    }
}
?>