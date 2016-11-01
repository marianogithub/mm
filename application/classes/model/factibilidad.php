<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/model/modelo.php';
/**
 *
 */
//// Importante el nombre de nuestra  clase debe de llevar la siguiente sintaxis
////  Model_<Nombre_de_la_tabla>
class Model_Factibilidad extends Modelo
{
    protected $_table_names_plural = false;
/// Ojo con esto este campo es true por default pero hace que Kohana maneje a su gusto
/// Los nombres de la tablas agregÃ¡ndole "s" o "es" a las mismas
/// Es decir trata de pluralizar el nombre automáticamente, puede que sea muy Ãºtil
/// Pero en lo personal no me gusta prefiero yo usar lo nombres a mi gusto
/// Por ello con esta indicación le decimos a kohana:
/// "Deja el nombre de la tabla como se llama la clase y no le hagas cambios"

	protected $_primary_key = 'idfactibilidad';      // default: id

	protected $_sorting  = array( 'idnumerozona' => 'ASC' );

    protected $_belongs_to = array(
        'numerozona' => array(
            'model' => 'numerozona',
            'foreign_key' => 'idnumerozona' ),
        'uso' => array(
            'model' => 'uso',
            'foreign_key' => 'iduso' ),
        'lote' => array(
            'model' => 'lote',
            'foreign_key' => 'idlote' ),
        'altura' => array(
            'model' => 'altura',
            'foreign_key' => 'idaltura' ),
        'ancho' => array(
            'model' => 'ancho',
            'foreign_key' => 'idancho' ),
        'retiro' => array(
            'model' => 'retiro',
            'foreign_key' => 'idretiro' ),
        'vivienda' => array(
            'model' => 'vivienda',
            'foreign_key' => 'idvivienda' ),
        'galpon' => array(
            'model' => 'galpon',
            'foreign_key' => 'idgalpon' ),
        'fos' => array(
            'model' => 'fos',
            'foreign_key' => 'idfos' ),
        'fot' => array(
            'model' => 'fot',
            'foreign_key' => 'idfot' ),
        'cumplida' => array(
            'model' => 'cumplirordenanza',
            'foreign_key' => 'idcumplirordenanza' ),
        'ensanche' => array(
            'model' => 'ensancheapertura',
            'foreign_key' => 'idensancheapertura' ),
        'afectacionlimite' => array(
            'model' => 'afectacionlimite',
            'foreign_key' => 'idafectacionlimite' ),
        'actividadcompleja' => array(
            'model' => 'actividadcompleja',
            'foreign_key' => 'idactividadcompleja' ),
        'iniciarexpediente' => array(
            'model' => 'iniciarexpediente',
            'foreign_key' => 'idiniciarexpediente' ),
        'fuerzamotriz' => array(
            'model' => 'fuerzamotriz',
            'foreign_key' => 'idfuerzamotriz' ),
        'estacionamiento' => array(
            'model' => 'estacionamiento',
            'foreign_key' => 'idestacionamiento' ),
        'espacioocupar' => array(
            'model' => 'espacioocupar',
            'foreign_key' => 'idespacioocupar' ),
        'expediente' => array(
            'model' => 'expedientes',
            'foreign_key' => 'idexpediente' )
    );

    public function tieneFactibilidad($idexpediente) {
        $factibilidad = ORM::factory($this->_table_name)
            ->where("idexpediente", "=", $idexpediente)
            ->find_all();
        return sizeof($factibilidad) > 0;
    }
}
?>