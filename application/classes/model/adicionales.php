<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/model/modelo.php';
require_once 'application/classes/business/aforo/calculoAforoAdicional.php';

//// Importante el nombre de nuestra  clase debe de llevar la siguiente sintaxis
////  Model_<Nombre_de_la_tabla>
class Model_Adicionales extends Modelo {
	protected $_table_names_plural = false;
/// Ojo con esto este campo es true por default pero hace que Kohana maneje a su gusto
/// Los nombres de la tablas agregándole "s" o "es" a las mismas
/// Es decir trata de pluralizar el nombre automáticamente, puede que sea muy útil
/// Pero en lo personal no me gusta prefiero yo usar lo nombres a mi gusto
/// Por ello con esta indicación le decimos a kohana:
/// "Deja el nombre de la tabla como se llama la clase y no le hagas cambios"

	protected $_primary_key = 'idadicional';      // default: id

	protected $_sorting  = array( 'idadicional' => 'ASC' );

	protected $_belongs_to = array(
        'permisoRotura' => array(
            'model' => 'Permisorotura',
            'foreign_key' => 'idpermiso' ),
        'reparacion' => array(
            'model' => 'Reparacion',
            'foreign_key' => 'idreposicion' ),
		'adicional' => array(
			'model' => 'Obrasadicional',
			'foreign_key' => 'idobrasadicional' ),
		'agua' => array(
				'model' => 'Agua',
				'foreign_key' => 'idagua' ),
		'cloacas' => array(
				'model' => 'Cloacas',
				'foreign_key' => 'idcloacas' )
	);

    public function getPermisoStr() {
        $valor = "";

        if($this->idpermiso != null) {
            $valor = $this->permisoRotura->descripcion . ": " . $this->mlpermiso;
        }

        return $valor;
    }
    public function getReparacionStr() {
        $valor = "";

        if($this->idreposicion != null) {
            $valor = $this->reparacion->descripcion . ": " . $this->mlreposicion;
        }

        return $valor;
    }

    public function getAdicionalStr() {
        $valor = "";

        if($this->idobrasadicional != null) {
            $valor = $this->adicional->descripcion . ": " . $this->unidadobraadicional;
        }

        return $valor;
    }

    public function getAguaStr() {
        $valor = "";

        if($this->idagua != null) {
            $valor = $this->agua->descripcion . ": " . $this->unidadagua;
        }

        return $valor;
    }

    public function getCloacasStr() {
        $valor = "";

        if($this->idcloacas != null) {
            $valor = $this->cloacas->descripcion . ": " . $this->unidadcloacas;
        }

        return $valor;
    }

    public function obtenerAforos() {
        $aforoAdicional = new CalculoAforoAdicional($this);
        return $aforoAdicional->calcularAforos();
    }

	public function getAdicionalesSolicitados($idExpediente) {
		$adicionales = ORM::factory($this->_table_name)
			->where("expediente", "=", $idExpediente)
			->find_all();

		return $adicionales;
	}
}
?>