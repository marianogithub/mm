<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/model/modelo.php';
/**
 *
 */
//// Importante el nombre de nuestra  clase debe de llevar la siguiente sintaxis
////  Model_<Nombre_de_la_tabla>
class Model_Numerozona extends Modelo
{
	protected $_table_names_plural = false;
/// Ojo con esto este campo es true por default pero hace que Kohana maneje a su gusto
/// Los nombres de la tablas agregándole "s" o "es" a las mismas
/// Es decir trata de pluralizar el nombre autom�ticamente, puede que sea muy útil
/// Pero en lo personal no me gusta prefiero yo usar lo nombres a mi gusto
/// Por ello con esta indicaci�n le decimos a kohana:
/// "Deja el nombre de la tabla como se llama la clase y no le hagas cambios"

	protected $_primary_key = 'idnumerozona';      // default: id

	protected $_sorting  = array( 'idzonas' => 'ASC', 'numero' => 'ASC' );

    protected $_belongs_to = array(
        'zona' => array(
            'model' => 'zonas',
            'foreign_key' => 'idzonas' )
    );

    public function getNumeroZonaStr() {
        return $this->numero . " - " . $this->zona->nombre;
    }
}
?>