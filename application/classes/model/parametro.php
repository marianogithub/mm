<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/model/modelo.php';
require_once 'application/classes/util/dateUtil.php';
require_once 'application/classes/util/labelABM.php';
/**
 *
 */
//// Importante el nombre de nuestra  clase debe de llevar la siguiente sintaxis
////  Model_<Nombre_de_la_tabla>
class Model_Parametro extends Modelo
{
	protected $_table_names_plural = false;
/// Ojo con esto este campo es true por default pero hace que Kohana maneje a su gusto
/// Los nombres de la tablas agregándole "s" o "es" a las mismas
/// Es decir trata de pluralizar el nombre automáticamente, puede que sea muy útil
/// Pero en lo personal no me gusta prefiero yo usar lo nombres a mi gusto
/// Por ello con esta indicación le decimos a kohana:
/// "Deja el nombre de la tabla como se llama la clase y no le hagas cambios"

	protected $_primary_key = 'idparametro';      // default: id
	protected $_sorting  = array( 'idparametro' => 'ASC' );

	public $nombresistema = "nombresistema";
	public $mensajehello = "mensajehello";
	public $abreviaturasistema = "abreviaturasistema";
	public $pathLogo = "pathLogo";
	public $minDateFechaInspeccion = "minDateFechaInspeccion";
	public $paginaInicial = "paginaInicial";
	public $leyendaCargaDatos = "leyendaCargaDatos";
	public $firmasCargaDatos = "firmasCargaDatos";
    public $pie = "pie";
    public $valorIndice = "valorIndice";
    public $derechoBocas = "derechoBocas";
    public $derechoRecintos = "derechoRecintos";
    public $numerozona = "numerozona";
    public $etiquetasABM = "etiquetasABM";
    public $tipoObraRelevada = "tipoObraRelevada";

	public function getValor( $nombre ) {
		$valor = null;

		$parametro = ORM::factory( $this->_table_name )->where( "nombre", "=", $nombre )->find_all();
		if( sizeof( $parametro ) == 1 ) {
			$valor = $parametro[0]->valor;
		}

		return $valor;
	}

	public function getNombreSistema() {
		return $this->getValor( $this->nombresistema );
	}
	public function getMensajeHello() {
		return $this->getValor( $this->mensajehello );
	}
	public function getAbreviaturaSistema() {
		return $this->getValor( $this->abreviaturasistema );
	}
	public function getMinDateFechaInspeccion() {
		return $this->getValor( $this->minDateFechaInspeccion );
	}
	public function getPaginaInicial() {
		return $this->getValor( $this->paginaInicial );
	}
	public function getLeyendaCargaDatos() {
		return $this->getValor( $this->leyendaCargaDatos );
	}
	public function getFirmasCargaDatos() {
		return $this->getValor( $this->firmasCargaDatos );
	}
    public function getPie() {
        return $this->getValor( $this->pie );
    }
    public function getValorIndice() {
        return $this->getValor( $this->valorIndice );
    }
    public function getDerechoBocas() {
        return $this->getValor( $this->derechoBocas );
    }
    public function getDerechoRecintos() {
        return $this->getValor( $this->derechoRecintos );
    }
    public function getNumerosZona() {
        $numeros = array();
        $numeroZonaStr = $this->getValor( $this->numerozona );
        try{
            $digitos = intval(explode(";", $numeroZonaStr)[0]);     //cantidad de digitos a mostrar
            $cantidad = intval(explode(";", $numeroZonaStr)[1]);    //cantidad de numeros a mostrar
            $inicial = intval(explode(";", $numeroZonaStr)[2]);     //valor a partir del cual empieza a contar
            for($i = 0; $i < $cantidad; $i++){
                array_push($numeros, str_pad(strval($i + $inicial), $digitos, "0", STR_PAD_LEFT) );
            }
        }catch (Exception $e){

        }
        return $numeros;
    }
    public function getLabelABM() {
        $labels = new LabelABM();
        $etiquetasABM = $this->getValor( $this->etiquetasABM );
        $attributes = explode(";", $etiquetasABM);

        if($attributes != null && sizeof($attributes) > 0) {
            foreach($attributes as $attribute) {
                try{
                    $attributeStr = explode(":", $attribute);
                    $attributeName = $attributeStr[0];
                    $attributeValue = $attributeStr[1];
                    $labels->$attributeName = $attributeValue;
                }catch (Exception $e){

                }
            }
        }

        return $labels;
    }
    public function getTipoObraRelevada() {
        $tipoObraRelevada = $this->getValor( $this->tipoObraRelevada );
        return $tipoObraRelevada == null ? "" : $tipoObraRelevada;
    }

	public function getMensajeBienvenida( $usuario ) {
		$mensaje = "";

		$mensaje = $this->getMensajeHello();
		if( $mensaje != null ) {
			$mensaje = str_replace( "{nombre}", $usuario->nombre, $mensaje );
			$mensaje = str_replace( "{apellido}", $usuario->apellido, $mensaje );
			$mensaje = str_replace( "{username}", $usuario->user->username, $mensaje );
			$fecha = date( DateUtil::$formatoFechaVista );
			$mensaje = str_replace( "{fecha}", $fecha, $mensaje );
		}

		return $mensaje;
	}
}
?>