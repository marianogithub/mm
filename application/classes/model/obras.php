<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/model/modelo.php';
require_once 'application/classes/business/aforo/calculoAforoObra.php';

//// Importante el nombre de nuestra  clase debe de llevar la siguiente sintaxis
////  Model_<Nombre_de_la_tabla>
class Model_Obras extends Modelo {
	protected $_table_names_plural = false;
/// Ojo con esto este campo es true por default pero hace que Kohana maneje a su gusto
/// Los nombres de la tablas agregándole "s" o "es" a las mismas
/// Es decir trata de pluralizar el nombre automáticamente, puede que sea muy útil
/// Pero en lo personal no me gusta prefiero yo usar lo nombres a mi gusto
/// Por ello con esta indicación le decimos a kohana:
/// "Deja el nombre de la tabla como se llama la clase y no le hagas cambios"

	protected $_primary_key = 'idobra';      // default: id

	protected $_sorting  = array( 'idobra' => 'ASC' );

	protected $_belongs_to = array(
		'nivelObj' => array(
			'model' => 'Nivel',
			'foreign_key' => 'nivel' ),
        'destinoObj' => array(
            'model' => 'destino',
            'foreign_key' => 'iddestino' ),
        'trabajoObj' => array(
            'model' => 'trabajo',
            'foreign_key' => 'idtrabajo' )
		
	);

	public function getFechaPagoStr() {
		return $this->fechaToStr( $this->fechapago );
	}

	public function getObrasSolicitadas($idExpediente) {
		$obras = array();

		$obras = ORM::factory($this->_table_name)
			->where("expediente", "=", $idExpediente)
			->find_all();

		return $obras;
	}

    public function getSuperficieTotal() {
        //superficie: superficie + superficie aleros / 2
        return $this->sup + ($this->supaleros * 0.5);
    }

    public function obtenerAforos() {
        $aforoObra = new CalculoAforoObra($this);
        return $aforoObra->calcularAforos();
    }
}
?>