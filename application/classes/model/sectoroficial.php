<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/model/modelo.php';
/**
 *
 */
//// Importante el nombre de nuestra  clase debe de llevar la siguiente sintaxis
////  Model_<Nombre_de_la_tabla>
class Model_Sectoroficial extends Modelo
{
	protected $_table_names_plural = false;
/// Ojo con esto este campo es true por default pero hace que Kohana maneje a su gusto
/// Los nombres de la tablas agregÃ¡ndole "s" o "es" a las mismas
/// Es decir trata de pluralizar el nombre automáticamente, puede que sea muy Ãºtil
/// Pero en lo personal no me gusta prefiero yo usar lo nombres a mi gusto
/// Por ello con esta indicación le decimos a kohana:
/// "Deja el nombre de la tabla como se llama la clase y no le hagas cambios"

	protected $_primary_key = 'idsector';      // default: id

	protected $_sorting  = array( 'idgremioobs' => 'ASC', 'nombre' => 'ASC' );

    protected $_belongs_to = array(
        'gremio' => array(
            'model' => 'Gremioobservacion',
            'foreign_key' => 'idgremioobs' )
    );
}
?>