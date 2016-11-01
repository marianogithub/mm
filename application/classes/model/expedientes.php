<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/model/modelo.php';
require_once 'application/classes/security/User.php';

//// Importante el nombre de nuestra  clase debe de llevar la siguiente sintaxis
////  Model_<Nombre_de_la_tabla>
class Model_Expedientes extends Modelo {
	protected $_table_names_plural = false;
/// Ojo con esto este campo es true por default pero hace que Kohana maneje a su gusto
/// Los nombres de la tablas agregándole "s" o "es" a las mismas
/// Es decir trata de pluralizar el nombre automáticamente, puede que sea muy útil
/// Pero en lo personal no me gusta prefiero yo usar lo nombres a mi gusto
/// Por ello con esta indicación le decimos a kohana:
/// "Deja el nombre de la tabla como se llama la clase y no le hagas cambios"

	protected $_primary_key = 'id';      // default: id

	protected $_sorting  = array( 'definitivo' => 'DESC', 'expnumero' => 'ASC' );

	protected $_belongs_to = array(
		'usuario' => array(
				'model' => 'Usuario',
				'foreign_key' => 'idusuario' )
	);

    protected $_has_many =
        array( 'obras' => array(
            'model' => 'obras',
            'foreign_key' => 'expediente'
        )
    );

	public function getExpnumeroDefinitivoStr() {
		$expnumeroDefinitivo = "Temporal";
		if(!is_null($this->definitivo) && $this->definitivo == 1) {
			if(!is_null($this->expnumero) && strcmp("", $this->expnumero) != 0) {
				$expnumeroDefinitivo = $this->expnumero;
			} else {
				$expnumeroDefinitivo = "Expediente sin numero";
			}
		}

		return $expnumeroDefinitivo;
	}

	public function getTitulo() {
		$titulo = "Expediente " . ($this->definitivo == 0 ? "Temporal" : "Definitivo");
		$titulo .= (!is_null($this->expnumero) && strcmp("", $this->expnumero) != 0) ? (" - N� " . $this->expnumero) : "";
		$titulo .= (!is_null($this->titular) && strcmp("", $this->titular) != 0) ? (" - " . $this->titular) : "";
	
		return $titulo;
	}

	public function getEncabezado() {
		$encabezado = "";

		if($this->definitivo == 1) {
			$encabezado .= (!is_null($this->expnumero) && strcmp("", $this->expnumero) != 0) ? ("N� " . $this->expnumero) : "Sin N�mero";
		}
		$encabezado .= (strcmp("", $encabezado) != 0) ? " - " : "";
		$encabezado .= (!is_null($this->titular) && strcmp("", $this->titular) != 0) ? ($this->titular) : "Sin Titular";
	
		return $encabezado;
	}

	public function getExpediente($idExpediente) {
		$expediente = null;
		$usuario = User::getInstance()->getUsuario();
		if($idExpediente != null) {
			$idusuario = $usuario->idusuario;

			$expedientes = ORM::factory($this->_table_name)
				->where($this->_primary_key, "=", $idExpediente)
				->and_where("idusuario", "=", $idusuario)
				->find_all();
			if(sizeof($expedientes) == 1) {
				$expediente = $expedientes[0];
			}
		}
	
		return $expediente;
	}

	public function getCantidadInspecciones() {
		return ORM::factory("inspecciones")
		->where("idexpte", "IS NOT", null)
		->and_where("idexpte", "=", $this->pk())
		->count_all();
	}

	public function getCantidadObras() {
		return ORM::factory("obras")
		->where("expediente", "IS NOT", null)
		->and_where("expediente", "=", $this->pk())
		->count_all();
	}

    public function getCantidadAdicionales() {
        return ORM::factory("adicionales")
            ->where("expediente", "IS NOT", null)
            ->and_where("expediente", "=", $this->pk())
            ->count_all();
    }

	public function getCantidadMovimientos() {
		return ORM::factory("movimiento")
		->where("idexpte", "IS NOT", null)
		->and_where("idexpte", "=", $this->pk())
		->count_all();
	}

	public function getCantidadObservaciones() {
		return ORM::factory("observacionexpte")
		->where("expte", "IS NOT", null)
		->and_where("expte", "=", $this->pk())
		->count_all();
	}

	public function getCantidadFactibilidad() {
		return ORM::factory("factibilidad")
			->where("idexpediente", "IS NOT", null)
			->and_where("idexpediente", "=", $this->pk())
			->count_all();
	}

	public function getTemporalesSolicitados($titular, $distritoFiltro) {
		$usuario = User::getInstance()->getUsuario();
		$idusuario = $usuario->idusuario;
	
		$expedientes = ORM::factory($this->_table_name)
		->where("idusuario", "=", $idusuario)
		->and_where("definitivo", "=", "0");
		if(strcmp("", trim($titular)) != 0) {
			$expedientes->and_where("titular", "like", "%$titular%");
		}
		if(strcmp("", trim($distritoFiltro)) != 0) {
			$expedientes->and_where("distritot", "like", "%$distritoFiltro%");
		}
	
		return $expedientes->find_all();
	}

	public function getExpedientesSolicitados($titular, $expnumero, $distritoFiltro) {
		$usuario = User::getInstance()->getUsuario();
		$idusuario = $usuario->idusuario;

		$expedientes = ORM::factory($this->_table_name)
			->where("idusuario", "=", $idusuario)
			->and_where("definitivo", "=", "1");
		if(strcmp("", trim($titular)) != 0) {
			$expedientes->and_where("titular", "like", "%$titular%");
		}
		if(strcmp("", trim($expnumero)) != 0) {
			$expedientes->and_where("expnumero", "like", "%$expnumero%");
		}
		if(strcmp("", trim($distritoFiltro)) != 0) {
			$expedientes->and_where("distritot", "like", "%$distritoFiltro%");
		}

		return $expedientes->find_all();
	}

	public function getExpedientes($definitivo,$titular, $expnumero, $distritoFiltro) {
		$expedientes = ORM::factory($this->_table_name)->where($this->_primary_key, "IS NOT", null);
		if( $definitivo != null &&
			(strcmp("0", trim($definitivo)) == 0 || strcmp("1", trim($definitivo)) == 0)) {
			$expedientes->and_where("definitivo", "=", $definitivo);
		}
		if(strcmp("", trim($titular)) != 0) {
			$expedientes->and_where("titular", "like", "%$titular%");
		}
		if(strcmp("", trim($expnumero)) != 0) {
			$expedientes->and_where("expnumero", "like", "%$expnumero%");
		}
		if(strcmp("", trim($distritoFiltro)) != 0) {
			$expedientes->and_where("distritot", "like", "%$distritoFiltro%");
		}
	
		return $expedientes->find_all();
	}
}
?>