<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/model/modelo.php';
/**
 *
 */
//// Importante el nombre de nuestra  clase debe de llevar la siguiente sintaxis
////  Model_<Nombre_de_la_tabla>
class Model_Distritos extends Modelo {

	protected $_table_names_plural = false;
/// Ojo con esto este campo es true por default pero hace que Kohana maneje a su gusto
/// Los nombres de la tablas agregándole "s" o "es" a las mismas
/// Es decir trata de pluralizar el nombre automáticamente, puede que sea muy útil
/// Pero en lo personal no me gusta prefiero yo usar lo nombres a mi gusto
/// Por ello con esta indicación le decimos a kohana:
/// "Deja el nombre de la tabla como se llama la clase y no le hagas cambios"

	protected $_primary_key = 'iddistrito';      // default: id

	protected $_sorting  = array( 'nombredistrito' => 'ASC' );

    /*protected $_has_many =
        array( 'zonas' => array(
            'model' => 'zona',
            'foreign_key' => 'iddistrito'
        )
    );*/

    public function getCantidadZonas() {
        return ORM::factory("zona")
            ->where("iddistrito", "=", $this->pk())
            ->count_all();
    }

    public function getZonas() {
        return ORM::factory("zona")
            ->where("iddistrito", "=", $this->pk())
            ->find_all();
    }
}
?>